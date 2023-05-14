<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\PatientModel;

class PatientSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create('id_ID');
		$patientModel = new PatientModel();

		for ($i = 0; $i <= 1000; $i++) {
			$data = [
				'nik' => $faker->nik,
				'no_rm' => str_pad((int)$i + 1, 8, '0', STR_PAD_LEFT),
				'name' => $faker->name,
				'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
				'birth_date' => $faker->dateTimeBetween('-60 years', '-1 years')->format('Y-m-d'),
				'address' => $faker->address,
				'mobile_phone' => $faker->numerify('08##########'),
				'marital_status' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Duda', 'Janda']),
				'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katholik', 'Hindu', 'Buddha', 'Konghucu', 'Penganut Kepercayaan', 'Lainnya']),
				'email' => $faker->email,
				'role' => 'patient',
				'active' => 'unregistered',
				'created_at' => $this->createdAtTimestamp(),
				'updated_at' => $this->updatedAtTimestamp(),

			];

			$patientModel->insert($data);
		}
	}

	private function createdAtTimestamp()
	{
		$patientModel = new PatientModel();

		$faker = Factory::create('id_ID');
		$initialCreatedAt = $faker->dateTimeBetween('2000-01-01 00:00:00', '2011-01-01 00:00:00')->format('Y-m-d H:i:s');
		$createdAtTimestamp = $initialCreatedAt;

		$hourInSeconds = 60 * 60;
		$yearInSeconds = 365 * 24 * 60 * 60;

		$lastCreatedAt = $patientModel->select('created_at')
			->orderBy('patient_id', 'DESC')
			->limit(1)
			->get()
			->getRow();

		if ($lastCreatedAt) {
			$createdAtTimestamp = strtotime($lastCreatedAt->created_at) + rand($hourInSeconds, $yearInSeconds);
			$createdAtTimestamp = $createdAtTimestamp < time() ? date('Y-m-d H:i:s', $createdAtTimestamp) : date('Y-m-d H:i:s', time());
		}

		return $createdAtTimestamp;
	}

	private function updatedAtTimestamp()
	{
		$currentTimestamp = time();
		return date('Y-m-d H:i:s', $currentTimestamp);
	}
}
