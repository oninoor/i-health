<?php

namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
  protected $mailer;

  public function __construct()
  {
    $this->mailer = new PHPMailer(true);

    // konfigurasi SMTP
    $this->mailer->isSMTP();
    $this->mailer->Host       = 'i-health.flaener.com';                 // Set the SMTP server to send through
    $this->mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
    $this->mailer->Username   = 'info@i-health.flaener.com';            // SMTP username
    $this->mailer->Password   = 'info11442233';                         // SMTP password
    $this->mailer->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $this->mailer->Port       = 465;

    // konfigurasi email
    $this->mailer->setFrom('info@i-health.flaener.com', 'E-Konsul RSD Kalisat'); // ganti dengan email dan nama anda
    $this->mailer->isHTML(true);
  }

  public function send($to, $subject, $body)
  {
    try {
      // konfigurasi penerima email dan subjek email
      $this->mailer->addAddress($to);
      $this->mailer->Subject = $subject;

      // konfigurasi isi email
      $this->mailer->Body = $body;

      // kirim email
      $this->mailer->send();

      return true;
    } catch (Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }
}
