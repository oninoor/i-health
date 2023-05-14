<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\PatientModel;
use App\Models\EmailModel;
use CodeIgniter\Validation\Exceptions\ValidationException;
use App\Libraries\JWT;
use App\Libraries\Email;
use Exception;

class Auth extends BaseController
{
  protected $patientModel;
  protected $authModel;
  protected $validation;
  protected $jwt;
  protected $session;
  protected $email;
  protected $emailModel;

  public function __construct()
  {
    $this->patientModel = new PatientModel();
    $this->authModel = new AuthModel();
    $this->emailModel = new EmailModel();
    $this->jwt = new JWT(config('JWT'));
    $this->session = session();
    $this->validation = \Config\Services::validation();
    $this->email = new Email();
  }

  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Login Pasien Telemedicine RSD Kalisat']),
      'validation' => $this->validation
    ];
    return view('auth-recoverpw', $data);
  }

  public function handleRecoveryPassword()
  {
    $request = $this->request->getPost();
    try {
      $this->validateRecoveryPassword($request);

      $patient = $this->patientModel->findPatientByEmail($request['email']);
      $resetToken = $this->authModel->generateRecoveryTokenAndUpdate($patient->patient_id);
      $this->emailModel->sendEmailForRecoveryPassword($patient->email, $patient->name, $resetToken);

      return notificationAndRedirect('message', 'Permintaan berhasil, cek email anda.', '/auth');
    } catch (ValidationException $e) {
      return notificationAndRedirectWithInput('error', $e->getMessage(), '/auth/recover-pw');
    } catch (\Exception $e) {
      return notificationAndRedirect('error', $e->getMessage(), '/auth/recover-pw');
    }
  }

  private function validateRecoveryPassword($data)
  {
    validateRequestData($this->request->getPost(), 'patientRecoveryPasswordValidation');

    $patient = $this->patientModel->findPatientByEmail($data['email']);
    if (!$patient) {
      throw new Exception('Data pasien tidak ditemukan.');
    }
  }

  public function showResetPassword($token)
  {
    $output = $this->checkIfResetTokenIsValid($token);
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Register Pasien Telemedicine RSD Kalisat']),
      'token' => $token,
      'error'      => $output['error'],
      'validation' => $this->validation
    ];

    return view('auth-reset-pw', $data);
  }

  private function checkIfResetTokenIsValid($token)
  {
    $patient_id = null;
    $error = null;

    try {
      $decodeToken  = $this->jwt->verify($token);
      $patient_id   = $decodeToken->patient_id;
      $tokenInDb    = $this->patientModel->getResetTokenById($patient_id);

      if ($token != $tokenInDb->reset_hash) {
        throw new \Exception('Token tidak valid, silakan lakukan permintaan reset password ulang.');
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }

    return ['patient_id' => $patient_id, 'error' => $error];
  }

  public function handleResetPassword()
  {
    $request = $this->request->getPost();
    try {
      validateRequestData($this->request->getPost(), 'resetPasswordValidation');
      $output = $this->checkIfResetTokenIsValid($request['token']);
      $patient = $this->patientModel->findPatientById($output['patient_id']);

      if (!$patient) {
        throw new \Exception('Data pasien tidak ditemukan');
      }

      $data = [
        'patient_id'  => $patient->patient_id,
        'password'    => $this->authModel->hashPassword($request['password']),
        'reset_hash'  => null
      ];
      $this->patientModel->save($data);

      return notificationAndRedirect('message', 'Reset password berhasil', '/auth');
    } catch (Exception $e) {
      return notificationAndRedirect('error', $e->getMessage(), '/auth/reset-password/' . $request['token']);
    }
  }
}
