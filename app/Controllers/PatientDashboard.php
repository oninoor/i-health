<?php

namespace App\Controllers;

class PatientDashboard extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Dashboard']),
      'page_title' => view('partials/page-title', ['title' => 'Dashboard', 'li_1' => 'I-Health', 'li_2' => 'Dashboard'])
    ];
    return view('patient-dashboard', $data);
  }
}
