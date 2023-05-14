<?php

use CodeIgniter\HTTP\URI;
use App\Libraries\JWT;
use App\Models\PatientModel;

function isAuthenticated()
{
  helper(['cookie', 'notificationAndRedirect']);
  $session = \Config\Services::session();

  $authSession = $session->has('auth');
  $authCookieToken = get_cookie('auth_token');

  if (!$authSession && !$authCookieToken) {
    notificationAndRedirect('error', 'Anda sudah logout!', '/auth');
  }

  if (!$authCookieToken) {
    notificationAndRedirect('error', 'Anda sudah logout!', '/auth');
  }

  try {
    $jwt = new JWT(config('JWT'));
    $patientModel = new PatientModel();

    $decodedDataToken = $jwt->verify($authCookieToken);

    $patientData = $patientModel->findPatientById($decodedDataToken->patient_id);
    if (!$patientData) {
      throw new Exception('Data tidak ditemukan, silakan login kembali');
    }

    $session->set('auth', ['patient_id' => $patientData->patient_id, 'patient_name' => $patientData->patient_name]);
  } catch (Exception $e) {
    isCurrentUrlAtAuth() ? '' : notificationAndRedirect('error', $e->getMessage(), '/auth');
  }
}

function isCurrentUrlAtAuth()
{
  $authUrl = [
    'auth',
    'auth/patient-register'
  ];

  $currentUrl = getCurrentUrl();
  return in_array($currentUrl, $authUrl);
}

function getCurrentUrl()
{
  $currentUrl = new URI(uri_string());
  return $currentUrl;
}
