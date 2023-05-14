<?php 

use \App\Controllers\AuthPatient;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;

class PatientRegisterTest extends CIUnitTestCase
{
  use ControllerTester;

  public function testRegister()
    {
        $body = [
          'norm' => '00000001',
          'nik' => '6205384601191365',
          'password' => '11442233',
        ];
        
        $result = $this->withBody($body)
            ->controller(AuthPatient::class)
            ->execute('register');

        $this->assertTrue($result->isRedirect());
    }
}