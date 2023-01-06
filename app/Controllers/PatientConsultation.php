<?php

namespace App\Controllers;

class PatientConsultation extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Daftar Konsultasi']),
      'page_title' => view('partials/page-title', ['title' => 'Daftar Konsultasi', 'li_1' => 'I-Health', 'li_2' => 'Daftar Konsultasi'])
    ];
    return view('patient-register', $data);
  }

  public function show_appointment()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Pilih Jadwal Konsultasi']),
      'page_title' => view('partials/page-title', ['title' => 'Pilih Jadwal Konsultasi', 'li_1' => 'Daftar', 'li_2' => 'Jadwal'])
    ];
    return view('patient-appointment', $data);
  }
}
