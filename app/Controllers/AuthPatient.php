<?php

namespace App\Controllers;

class AuthPatient extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Login Pasien Telemedicine RSD Kalisat'])
    ];
    return view('auth-patient-login', $data);
  }

  public function show_patient_register()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Register Pasien Telemedicine RSD Kalisat'])
    ];
    return view('auth-patient-register', $data);
  }
}
