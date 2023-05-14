<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PatientModel;
use CodeIgniter\Validation\Exceptions\ValidationException;
use App\Libraries\JWT;

class AuthPatient extends BaseController
{
  protected $patientModel;
  protected $authModel;
  protected $validation;
  protected $jwt;
  protected $session;

  public function __construct()
  {
    $this->patientModel = new PatientModel();
    $this->authModel = new AuthModel();
    $this->jwt = new JWT(config('JWT'));
    $this->session = session();
    $this->validation = \Config\Services::validation();
  }

  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Login Pasien E-Konsul RSD Kalisat']),
      'validation' => $this->validation
    ];
    return view('auth-patient-login', $data);
  }

  public function handlePatientLogin()
  {
    $requestData = $this->request->getPost();
    $medicalRecordNumber = $requestData['no_rm'];
    $password = $requestData['password'];
    $remember = isset($requestData['remember-check']);

    try {
      validateRequestData($requestData, 'patienLoginProcess');
      $this->authModel->authenticateUser($medicalRecordNumber, $password);

      $patientData = $this->patientModel->findPatientByNoRm($medicalRecordNumber);
      $this->setLoginSessionAndCookie($patientData->patient_id, $patientData->name, $patientData->role, $remember);

      return notificationAndRedirect('message', 'Login berhasil.', '/patient');
    } catch (ValidationException $e) {
      return notificationAndRedirectWithInput('error', $e->getMessage(), '/auth');
    } catch (\InvalidArgumentException $e) {
      return notificationAndRedirect('message', $e->getMessage(), '/auth');
    } catch (\Exception $e) {
      return notificationAndRedirect('error', $e->getMessage(), '/auth');
    }
  }

  private function setLoginSessionAndCookie(string $patient_id, string $patient_name, string $role, bool $remember)
  {
    $token = $this->jwt->create(['patient_id' => $patient_id], $remember);

    setcookie('auth_token', $token,  $remember ? time() + 604800 : time() + 86400, '/', '', false, false);

    $data = [
      'patient_id'    => $patient_id,
      'patient_name'  => $patient_name,
      'role'          => $role
    ];
    $this->session->set('auth', $data);
  }

  public function showPatientRegister()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Register Pasien E-Konsul RSD Kalisat']),
      'validation' => $this->validation
    ];
    return view('auth-patient-register', $data);
  }

  public function handlePatientRegistration()
  {
    $requestData = $this->request->getPost();
    $medicalRecordNumber = $requestData['no_rm'];
    $identity_number = $requestData['nik'];
    $password = $requestData['password'];

    try {
      validateRequestData($requestData, 'patientRegistrationProcessValidation');
      $this->authModel->updatePatientRegistration($medicalRecordNumber, $identity_number, $password);

      return notificationAndRedirect('message', 'Data berhasil disimpan.', '/auth');
    } catch (ValidationException $e) {
      return notificationAndRedirectWithInput('error', $e->getMessage(), '/auth/patient-register');
    } catch (\InvalidArgumentException $e) {
      return notificationAndRedirect('message', $e->getMessage(), '/auth/patient-register');
    } catch (\Exception $e) {
      return notificationAndRedirect('error', $e->getMessage(), '/auth/patient-register');
    }
  }

  public function handleLogout()
  {
    $this->session->remove('auth');
    setcookie('auth_token', '',  time() - 604800, '/', '', false, false);

    return notificationAndRedirect('message', 'Anda sudah logout.', '/auth');
  }
}
