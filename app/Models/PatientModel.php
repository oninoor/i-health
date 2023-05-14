<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
  protected $table = 'patients';
  protected $primaryKey = 'patient_id';
  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  protected $useSoftDeletes = true;

  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $allowedFields = [
    'nik',
    'no_rm',
    'name',
    'gender',
    'birth_date',
    'address',
    'mobile_phone',
    'marital_status',
    'religion',
    'email',
    'password',
    'role',
    'active',
    'reset_pw',
    'reset_hash',
    'reset_at',
    'created_at',
    'updated_at'
  ];

  protected $validationRules = [
    'nik'             =>  'required|numeric|exact_length[16]|is_unique[patients.nik,patient_id,{$patient_id}]',
    'no_rm'           => 'required|numeric|exact_length[8]',
    'name'            => 'required|min_length[3]',
    'gender'          => 'required|in_list[Laki-laki,Perempuan]',
    'birth_date'      => 'required|valid_date',
    'address'         => 'required|min_length[10]',
    'phone'           => 'required|min_length[10]',
    'marital_status'  => 'required|in_list[Belum Menikah,Menikah,Duda,Janda]',
    'religion'        => 'required|in_list[Islam,Kristen,Katholik,Hindu,Buddha,Konghucu,Penganut Kepercayaan,Lainnya]',
    'email'           => 'required|valid_email|is_unique[patients.email,patient_id,{$patient_id}]',
    'password'        => 'required|min_length[8]',
  ];
  protected $validationMessages = [
    'nik' => [
      'required' => 'NIK harus diisi.',
      'numeric' => 'NIK harus berupa angka.',
      'exact_length' => 'NIK harus terdiri dari 16 angka.',
      'is_unique' => 'NIK sudah terdaftar.',
    ],
    'no_rm' => [
      'required' => 'Nomor rekam medis harus diisi.',
      'numeric' => 'Nomor rekam medis harus berupa angka.',
      'exact_length' => 'Nomor rekam medis terdiri dari 8 angka.'
    ],
    'name' => [
      'required' => 'Nama pasien harus diisi.',
      'min_length' => 'Nama pasien minimal terdiri dari 3 karakter.'
    ],
    'gender' => [
      'required' => 'Jenis kelamin harus diisi.',
      'in_list' => 'Jenis kelamin harus diisi dengan Laki-laki atau Perempuan.'
    ],
    'birth_date' => [
      'required' => 'Tanggal lahir harus diisi.',
      'valid_date' => 'Tanggal lahir harus valid.'
    ],
    'address' => [
      'required' => 'Alamat harus diisi.',
      'min_length' => 'Alamat minimal terdiri dari 10 karakter.'
    ],
    'phone' => [
      'required' => 'Nomor telepon harus diisi.',
      'numeric' => 'Nomor telepon harus berupa angka.',
      'min_length' => 'Nomor telepon minimal terdiri dari 10 angka.'
    ],
    'marital_status' => [
      'required' => 'Status perkawinan harus diisi.',
      'in_list' => 'Status perkawinan harus diisi dengan pilihan yang tersedia.'
    ],
    'religion' => [
      'required' => 'Agama harus diisi.',
      'in_list' => 'Agama harus diisi dengan pilihan yang tersedia.'
    ],
    'email' => [
      'required' => 'Email harus diisi.',
      'valid_email' => 'Email tidak valid.',
      'is_unique' => 'Email sudah terdaftar.',
    ],
    'password' => [
      'required' => 'Password harus diisi.',
      'min_length' => 'Password minimal terdiri dari 8 karakter.',
    ]
  ];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  public function findPatientById($patient_id)
  {
    $patient = $this->where('patient_id', $patient_id)
      ->get()->getRow();

    return $patient ? $patient : null;
  }

  public function findPatientByEmail($email)
  {
    $patient = $this->where('email', $email)
      ->get()->getRow();

    return $patient ? $patient : null;
  }

  public function findPatientByNoRm($medicalRecordNumber)
  {
    $patient = $this->where('no_rm', $medicalRecordNumber)
      ->get()->getRow();

    return $patient ? $patient : null;
  }

  public function findPatientByIdOrNoRmOrNik($idOrNoRmOrNik)
  {
    $patient = $this->where('patient_id', $idOrNoRmOrNik)
      ->orWhere('no_rm', $idOrNoRmOrNik)
      ->orWhere('nik', $idOrNoRmOrNik)
      ->first();

    return $patient ? $patient : null;
  }

  public function getResetTokenById($patient_id)
  {
    $token = $this->select('reset_hash')->where('patient_id', $patient_id)
      ->get()->getRow();

    return $token ? $token : null;
  }

  public function checkPatientExistByNoRmAndNik(string $medicalRecordNumber, string $identity_number)
  {
    $patient = $this->where('no_rm', $medicalRecordNumber)
      ->where('nik', $identity_number)
      ->first();

    return $patient ? true : false;
  }

  private function generateNoRm()
  {
    $lastNoRm = $this->select('no_rm')
      ->orderBy('patient_id', 'DESC')
      ->limit(1)
      ->get()
      ->getRow();

    $lastNoRmDigits = $lastNoRm ? substr($lastNoRm->no_rm, -8) : '00000001';
    $newNoRmDigits = str_pad((int)$lastNoRmDigits + 1, 8, '0', STR_PAD_LEFT);

    return $newNoRmDigits;
  }

  public function checkIfPatientIsExistAndUnregistered(string $medicalRecordNumber, string $identity_number)
  {
    if (!$this->checkPatientExistByNoRmAndNik($medicalRecordNumber, $identity_number)) {
      throw new \Exception('Data pasien tidak ditemukan.');
    }

    $patient = $this->findPatientByNoRm($medicalRecordNumber);
    if ($patient->active != 'unregistered') {
      throw new \InvalidArgumentException("Anda sudah mendaftar, silakan login");
    }
  }

  public function checkIfPatientIsExistAndActive(string $medicalRecordNumber)
  {
    $patient = $this->findPatientByNoRm($medicalRecordNumber);

    if (!$patient) {
      throw new \Exception('Data pasien tidak ditemukan.');
    }

    if ($patient->active != 'active') {
      throw new \Exception("Tidak dapat login, akun anda belum terdaftar atau diblokir");
    }
  }
}
