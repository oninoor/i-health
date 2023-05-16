<?php

namespace App\Controllers;

class PatientDashboard extends BaseController
{
  protected $session;

  public function __construct()
  {
    $this->session = session();
  }

  public function index()
  {
    // dd($this->session->get('auth'));
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
      'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'E-Konsul', 'li_2' => 'Dashboard'])
    ];
    return view('patient-dashboard', $data);
  }
}
