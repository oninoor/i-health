<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Schedules extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'doctor_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true
			],
			'day' => [
				'type' => 'ENUM',
				'constraint' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
			],
			'start_time' => [
				'type' => 'TIME'
			],
			'end_time' => [
				'type' => 'TIME'
			],
			'break_start_time' => [
				'type' => 'TIME'
			],
			'break_end_time' => [
				'type' => 'TIME'
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('doctor_id', 'employees', 'employee_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('doctor_schedules');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('doctor_schedules');
	}
}
