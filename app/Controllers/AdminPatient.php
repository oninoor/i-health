<?php

namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\Validation\Exceptions\ValidationException;
use Exception;

class AdminPatient extends BaseController
{
  protected $patientModel;
  protected $validation;
  protected $session;

  public function __construct()
  {
    $this->session = session();
    $this->patientModel = new PatientModel();
    $this->validation = \Config\Services::validation();
  }

  public function index()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Pasien']),
      'page_title' => view('partials/page-title', ['title' => 'Pasien', 'li_1' => 'E-Konsul', 'li_2' => 'Pasien'])
    ];
    return view('admin-patients', $data);
  }

  public function getDataPatients()
  {
    try {
      $draw = $this->request->getPost('draw');
      $start = $this->request->getPost('start');
      $length = $this->request->getPost('length');
      $searchValue = $this->request->getPost('search')['value'];
      $columnOrder = $this->request->getPost('order')[0]['column'];
      $orderDirection = $this->request->getPost('order')[0]['dir'];


      $csrfName = csrf_token();
      $csrfHash = csrf_hash();

      $data = $this->patientModel->getDatatableData($start, $length, $searchValue, $columnOrder, $orderDirection);
      $total = $this->patientModel->getDatatableTotal($searchValue);

      return $this->response->setJSON([
        'draw' => $draw,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data,
        $csrfName => $csrfHash,
        'error' => '',
      ]);
    } catch (Exception $e) {
      return $this->response->setJSON([
        'draw' => $draw,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data,
        $csrfName => $csrfHash,
        'error' => $e->getMessage(),
      ]);
    }
  }

  public function showAddPatient()
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Tambah Pasien']),
      'page_title' => view('partials/page-title', ['title' => 'Tambah Pasien', 'li_1' => 'Pasien', 'li_2' => 'Tambah Pasien']),
      'validation' => $this->validation
    ];
    return view('admin-add-patient', $data);
  }

  public function handleAddPatient()
  {
    $request = $this->request->getPost();

    try {
      validateRequestData($request, 'addNewPatientvalidation');

      $this->patientModel->insertPatient($request);

      return notificationAndRedirect('success', 'Data pasien berhasil ditambahkan', '/admin/patients');
    } catch (ValidationException $e) {
      return notificationAndRedirectWithInput('error', $e->getMessage(), '/admin/add-patient');
    } catch (\InvalidArgumentException $e) {
      return notificationAndRedirect('message', $e->getMessage(), '/admin/add-patient');
    } catch (\Exception $e) {
      return notificationAndRedirect('error', $e->getMessage(), '/admin/add-patient');
    }
  }

  public function showPatientDetail($patient_id)
  {
    $data = [
      'title_meta' => view('partials/title-meta', ['title' => 'Detail Pasien']),
      'page_title' => view('partials/page-title', ['title' => 'Detail Pasien', 'li_1' => 'Pasien', 'li_2' => 'Pasien'])
    ];
    return view('admin-patient-detail', $data);
  }
}
