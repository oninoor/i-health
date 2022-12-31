<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Login Pasien Telemedicine RSD Kalisat'])
    ];
    return view('auth-patient-login', $data);
  }

  public function show_reset_password()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Register Pasien Telemedicine RSD Kalisat'])
    ];
    return view('auth-reset-pw', $data);
  }
}
