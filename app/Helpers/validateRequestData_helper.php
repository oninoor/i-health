<?php

use CodeIgniter\Validation\Exceptions\ValidationException;

function validateRequestData(array $dataToValidate, string $ruleGroup)
{
  $validation = \Config\Services::validation();

  if (!$validation->run($dataToValidate, $ruleGroup)) {
    throw new ValidationException('Data yang anda masukkan tidak valid.');
  }
}
