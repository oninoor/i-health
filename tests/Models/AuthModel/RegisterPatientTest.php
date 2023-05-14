<?php

use \App\Models\AuthModel;
use \App\Models\PatientModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\CIDatabaseTestCase;

class AuthModelTest extends CIDatabaseTestCase
{
    protected $refresh = true;
    protected $authModel;
    protected $patientModel;
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authModel = new AuthModel();
        $this->patientModel = new PatientModel();
        $this->db = \Config\Database::connect();
        $this->db->disableForeignKeyChecks();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->db->enableForeignKeyChecks();
    }

    public function testRegisterPatient()
    {
        $medicalRecordNumber = '00000001';
        $nik = '6205384601191365';
        $password = '11442233';

        $result = $this->authModel->registerPatient($medicalRecordNumber, $nik, $password);

        $this->assertTrue($result);
        $this->seeInDatabase('patients', [
            'patien_id' => 1,
            'password' => $this->authModel->hashPassword($password),
            'active' => 'active',
        ]);
    }
}
