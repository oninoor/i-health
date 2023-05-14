<?php

namespace App\Controllers;

class PatientConsultation extends BaseController
{
  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Daftar Konsultasi']),
      'page_title' => view('partials/page-title', ['title' => 'Daftar Konsultasi', 'li_1' => 'E-Konsul', 'li_2' => 'Daftar Konsultasi'])
    ];
    return view('patient-register', $data);
  }

  public function showBooking()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Pilih Jadwal Konsultasi']),
      'page_title' => view('partials/page-title', ['title' => 'Pilih Jadwal Konsultasi', 'li_1' => 'Daftar', 'li_2' => 'Jadwal'])
    ];
    return view('patient-booking', $data);
  }

  public function showPayment()
  {
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-NgAJRIVkVYyDjylpGBRWwbeC';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
      'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
      )
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Pembayaran']),
      'page_title' => view('partials/page-title', ['title' => 'Pembayaran', 'li_1' => 'Konsultasi', 'li_2' => 'Pembayaran']),
      'snapToken' => $snapToken
    ];
    return view('patient-payment', $data);
  }

  public function showAppointment()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Konsultasi Saya']),
      'page_title' => view('partials/page-title', ['title' => 'Konsultasi Saya', 'li_1' => 'E-Konsul', 'li_2' => 'Konsultasi Saya']),
    ];
    return view('patient-appointment', $data);
  }

  public function showDetailAppointment()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Detail Konsultasi']),
      'page_title' => view('partials/page-title', ['title' => 'Detail Konsultasi', 'li_1' => 'Konsultasi Saya', 'li_2' => 'Detail Konsultasi']),
    ];
    return view('patient-detail-consultation', $data);
  }
}
