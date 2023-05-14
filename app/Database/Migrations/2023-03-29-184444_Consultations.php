<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Consultations extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'consultation_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'patient_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'doctor_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'anamnesa' => [
				'type' => 'VARCHAR',
				'constraint' => 5000,
			],
			'diagnose' => [
				'type' => 'VARCHAR',
				'constraint' => 5000,
				'null' => true
			],
			'date' => [
				'type' => 'DATE',
				'null' => true,
			],
			'time' => [
				'type' => 'TIME',
				'null' => true,
			],
			'status' => [
				'type' => 'ENUM("pending","active","completed","cancelled")',
				'default' => 'pending',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('consultation_id', true);
		$this->forge->addForeignKey('patient_id', 'patients', 'patient_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('doctor_id', 'employees', 'employee_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('consultations');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('consultations', 'patient_id');
		$this->forge->dropForeignKey('consultations', 'doctor_id');
		$this->forge->dropTable('consultations');
	}
}
