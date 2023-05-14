<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\JWT;

class AuthModel extends Model
{
  protected $patientModel;
  protected $jwt;

  public function __construct()
  {
    $this->patientModel = new PatientModel();
    $this->jwt = new JWT(config('JWT'));
  }

  public function updatePatientRegistration(string $medicalRecordNumber, string $identity_number, string $password)
  {
    $this->patientModel->checkIfPatientIsExistAndUnregistered($medicalRecordNumber, $identity_number);
    $patientData = $this->patientModel->findPatientByNoRm($medicalRecordNumber);

    $data = [
      'patient_id' => $patientData->patient_id,
      'password'  => $this->hashPassword($password),
      'active'    => 'active'
    ];
    $this->patientModel->save($data);

    if ($this->patientModel->affectedRows() < 1) {
      throw new \Exception('Data pendaftaran gagal disimpan.');
    }
  }

  public function hashPassword(string $password)
  {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
  }

  public function authenticateUser(string $medicalRecordNumber, string $password)
  {
    $this->patientModel->checkIfPatientIsExistAndActive($medicalRecordNumber);
    $patientData = $this->patientModel->findPatientByNoRm($medicalRecordNumber);

    if (!password_verify($password, $patientData->password)) {
      throw new \Exception('Password tidak sesuai.');
    }
  }

  public function generateRecoveryTokenAndUpdate($patient_id)
  {
    $token = $this->jwt->create(['patient_id' => $patient_id], false);

    $data = [
      'patient_id' => $patient_id,
      'reset_hash' => $token
    ];
    $this->patientModel->save($data);

    return $token;
  }
}
