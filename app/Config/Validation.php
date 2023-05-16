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

	public $addNewPatientvalidation = [
		'nik'             => 'required|numeric|exact_length[16]|is_unique[patients.nik,patient_id,{patient_id}]',
		'name'            => 'required|min_length[3]',
		'gender'          => 'required|in_list[Laki-laki,Perempuan]',
		'birth_date'      => 'required|valid_date',
		'marital_status'  => 'required|in_list[Belum Menikah,Menikah,Duda,Janda]',
		'mobile_phone'    => 'required|min_length[10]',
		'religion'        => 'required|in_list[Islam,Kristen,Katholik,Hindu,Buddha,Konghucu,Penganut Kepercayaan,Lainnya]',
		'role'        		=> 'required|in_list[patient,doctor,nurse,admin]',
		'active'        	=> 'required|in_list[unregistered,active,blocked]',
		'email'           => 'valid_email|is_unique[patients.email,patient_id,{patient_id}]',
		'address'         => 'required|min_length[10]',
	];
	public $addNewPatientvalidation_errors = [
		'nik' => [
			'required' => 'NIK harus diisi.',
			'numeric' => 'NIK harus berupa angka.',
			'exact_length' => 'NIK harus terdiri dari 16 angka.',
			'is_unique' => 'NIK sudah terdaftar.',
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
		'marital_status' => [
			'required' => 'Status perkawinan harus diisi.',
			'in_list' => 'Status perkawinan harus diisi dengan pilihan yang tersedia.'
		],
		'mobile_phone' => [
			'required' => 'Nomor telepon harus diisi.',
			'numeric' => 'Nomor telepon harus berupa angka.',
			'min_length' => 'Nomor telepon minimal terdiri dari 10 angka.'
		],
		'religion' => [
			'required' => 'Agama harus diisi.',
			'in_list' => 'Agama harus diisi dengan pilihan yang tersedia.'
		],
		'role' => [
			'required' => 'Hak akses harus diisi.',
			'in_list' => 'Hak akses harus diisi dengan pilihan yang tersedia.'
		],
		'active' => [
			'required' => 'Status harus diisi.',
			'in_list' => 'Status harus diisi dengan pilihan yang tersedia.'
		],
		'email' => [
			'required' => 'Email harus diisi.',
			'valid_email' => 'Email tidak valid.',
			'is_unique' => 'Email sudah terdaftar.',
		],
		'address' => [
			'required' => 'Alamat harus diisi.',
			'min_length' => 'Alamat minimal terdiri dari 10 karakter.'
		],
	];
}
