<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Patients extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'patient_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nik' => [
				'type'       => 'CHAR',
				'constraint' => 16,
			],
			'no_rm' => [
				'type'       => 'VARCHAR',
				'constraint' => 8,
			],
			'name' => [
				'type'       => 'CHAR',
				'constraint' => 255,
			],
			'gender' => [
				'type'       => 'CHAR',
				'constraint' => 10,
			],
			'birth_date' => [
				'type'       => 'DATE',
				'null'			 => 'true',
			],
			'address' => [
				'type'       => 'CHAR',
				'constraint' => 255,
			],
			'mobile_phone' => [
				'type'       => 'CHAR',
				'constraint' => 20,
			],
			'marital_status' => [
				'type'       => 'ENUM("Belum Menikah","Menikah","Duda","Janda","Lainnya")',
				'default' => 'Lainnya',
			],
			'religion' => [
				'type' => 'ENUM("Islam","Kristen","Katholik","Hindu","Buddha","Konghucu","Penganut Kepercayaan","Lainnya")',
				'default' => 'Lainnya',
			],
			'email' => [
				'type'       => 'CHAR',
				'constraint' => 100,
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => 5000,
				'null'       => true,
			],
			'role' => [
				'type' => 'ENUM("patient","doctor","nurse","admin")',
				'default' => 'patient',
			],
			'active' => [
				'type' => 'ENUM("unregistered","active","blocked")',
				'default' => 'unregistered',
			],
			'reset_pw' => [
				'type'       => 'INT',
				'constraint' => 11,
				'null'       => true,
			],
			'reset_hash' => [
				'type'       => 'CHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'reset_at' => [
				'type'       => 'DATETIME',
				'null'       => true,
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

		$this->forge->addKey('patient_id', true);
		$this->forge->createTable('patients');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('patients');
	}
}
