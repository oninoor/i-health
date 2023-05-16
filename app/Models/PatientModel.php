<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

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

  public function getDatatableData($start, $length, $searchValue, $columnOrder, $orderDirection)
  {

    $builder = $this->table('patients');
    if (!empty($searchValue)) {
      $builder->like('no_rm', $searchValue);
      $builder->orLike('nik', $searchValue);
      $builder->orLike('name', $searchValue);
    }
    $this->getDataTableOrder($builder, $columnOrder, $orderDirection);
    $builder->limit($length, $start);
    $patients = $builder->get()->getResultArray();

    return $patients;
  }

  private function getDataTableOrder($builder, $columnOrder, $orderDirection)
  {
    if ($columnOrder == 1) {
      return $builder->orderBy('no_rm', $orderDirection);
    } elseif ($columnOrder == 2) {
      return $builder->orderBy('name', $orderDirection);
    } elseif ($columnOrder == 3) {
      return $builder->orderBy('nik', $orderDirection);
    } else {
      $builder->orderBy('patient_id', $orderDirection);
    }
  }

  public function getDatatableTotal($searchValue)
  {
    $builder = $this->table('patients');
    if (!empty($searchValue)) {
      $builder->like('no_rm', $searchValue);
      $builder->orLike('nik', $searchValue);
      $builder->orLike('name', $searchValue);
    }
    return $builder->countAllResults();
  }

  public function insertPatient($data)
  {
    try {
      $data['no_rm'] = $this->generateNoRm();

      $this->save($data);

      if ($this->affectedRows() < 1) {
        throw new \Exception('Data pendaftaran gagal disimpan.');
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
