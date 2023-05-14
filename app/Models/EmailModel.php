<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Email;

class EmailModel extends Model
{
  protected $email;

  public function __construct()
  {
    $this->email = new Email();
  }

  public function sendEmailForRecoveryPassword($sendTo, $name, $resetToken)
  {
    $subject = 'Reset Password Akun E-Konsul RSD Kalisat';
    $body = $this->setBodyEmailForRecoveryPassword($resetToken, $name);
    $this->email->send($sendTo, $subject, $body);
  }

  private function setBodyEmailForRecoveryPassword($resetToken, $name)
  {
    return '<div style="background-color:#f7f7f7; padding: 20px 0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; background-color:#ffffff;">
      <tr>
        <td style="padding: 30px;">
          <h1 style="font-size: 32px; font-weight: bold; margin-bottom: 24px;">Ubah Password Anda</h1>
          <p style="font-size: 16px; line-height: 24px; margin-bottom: 24px;">Halo ' . $name . ', Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda. Tekan tombol di bawah ini untuk mengatur ulang kata sandi akun Anda. Jika Anda tidak meminta kata sandi baru, Anda dapat dengan aman menghapus email ini.</p>
          <div style="text-align: center;">
            <a href="' . base_url('/auth/reset-password') . '/' . $resetToken . '" style="background-color: #007bff; color: #fff; display: inline-block; font-size: 16px; font-weight: bold; text-align: center; text-decoration: none; padding: 14px 26px; border-radius: 6px;">Reset Password</a>
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding: 30px; border-top: 3px solid #d4dadf;">
          <p style="font-size: 16px; line-height: 24px; margin-bottom: 0;">Hormat kami,<br><strong>E-Konsul RSD Kalisat</strong></p>
        </td>
      </tr>
    </table>
  </div>';
  }
}
