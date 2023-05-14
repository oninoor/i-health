<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;
use App\Libraries\JWT;
use App\Models\PatientModel;
use Exception;

class AuthPatient implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    helper(['cookie', 'notificationAndRedirect']);
    $session = \Config\Services::session();
    $authSession = $session->get('auth');
    $authCookieToken = get_cookie('auth_token');
    $currentUrl = $this->getCurrentUrl();
    $isCurrentUrlAtAuth = $this->isCurrentUrlAtAuth($currentUrl);

    if (!$authCookieToken) {
      if ($isCurrentUrlAtAuth) {
        return;
      }

      return redirect()->to('/logout/patient');
    }

    $this->verifyAuthToken($authCookieToken, $isCurrentUrlAtAuth, $session);

    if ($authSession['role'] != 'patient') {
      return redirect()->back()->with('error', 'Unauthorized');
    }

    if ($isCurrentUrlAtAuth) {
      return redirect()->to('/patient');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }

  private function getCurrentUrl()
  {
    $currentUrl = new URI(current_url());
    return $currentUrl->getPath();
  }

  private function isCurrentUrlAtAuth($currentUrl)
  {
    $authUrl = [
      '/auth',
      '/auth/patient-register',
    ];

    return in_array($currentUrl, $authUrl);
  }

  private function verifyAuthToken($authCookieToken, $isCurrentUrlAtAuth, $session)
  {
    try {
      $jwt = new JWT(config('JWT'));
      $patientModel = new PatientModel();
      $decodedDataToken = $jwt->verify($authCookieToken);
      $patientData = $patientModel->findPatientById($decodedDataToken->patient_id);


      if (!$patientData) {
        throw new Exception('Data tidak ditemukan, silakan login kembali');
      }

      $data = [
        'patient_id'    => $patientData->patient_id,
        'patient_name'  => $patientData->name,
        'role'          => $patientData->role
      ];
      $session->set('auth', $data);
    } catch (Exception $e) {
      if (!$isCurrentUrlAtAuth) {
        return notificationAndRedirect('error', $e->getMessage(), '/auth');
      }
    }
  }
}
