<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $patientRegistrationProcessValidation = [
		'nik'       => 'required|numeric|exact_length[16]',
		'no_rm'			=> 'required|numeric|exact_length[8]',
		'password'	=> 'required|min_length[8]',
	];
	public $patientRegistrationProcessValidation_errors = [
		'nik' => [
			'required' => 'NIK harus diisi.',
			'numeric' => 'NIK harus berupa angka.',
			'exact_length' => 'NIK harus terdiri dari 16 angka.',
		],
		'no_rm' => [
			'required' => 'Nomor rekam medis harus diisi.',
			'numeric' => 'Nomor rekam medis harus berupa angka.',
			'exact_length' => 'Nomor rekam medis terdiri dari 8 angka.'
		],
		'password' => [
			'required' => 'Password harus diisi.',
			'min_length' => 'Password minimal terdiri dari 8 karakter.',
		]
	];

	public $patienLoginProcess = [
		'no_rm'			=> 'required|numeric|exact_length[8]',
		'password'	=> 'required',
	];
	public $patienLoginProcess_errors = [
		'no_rm' => [
			'required' => 'Nomor rekam medis harus diisi.',
			'numeric' => 'Nomor rekam medis harus berupa angka.',
			'exact_length' => 'Nomor rekam medis terdiri dari 8 angka.'
		],
		'password' => [
			'required' => 'Password harus diisi.',
		]
	];

	public $patientRecoveryPasswordValidation = [
		'email'	=> 'required|valid_email',
	];
	public $patientRecoveryPasswordValidation_errors = [
		'email'	=> [
			'required' => 'Email harus diisi.',
			'valid_email' => 'Email tidak valid.',
		],
	];

	public $resetPasswordValidation = [
		'password'					=> 'required|min_length[8]',
		'password_confirm'	=> 'required|matches[password]'
	];
	public $resetPasswordValidation_errors = [
		'password' => [
			'required' 		=> 'Password harus diisi.',
			'min_length' 	=> 'Password minimal terdiri dari 8 karakter.',
		],
		'password_confirm' => [
			'required' 	=> 'Konfirmasi password harus diisi',
			'matches' 	=> 'Konfirmasi password tidak sesuai dengan password yang dimasukkan'
		]
	];
}
