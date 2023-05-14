<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'employee_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nik' => [
				'type' => 'CHAR',
				'constraint' => 16,
			],
			'name' => [
				'type' => 'CHAR',
				'constraint' => 255,
			],
			'gender' => [
				'type' => 'CHAR',
				'constraint' => 10,
			],
			'mobile_phone' => [
				'type' => 'CHAR',
				'constraint' => 20,
			],
			'adress' => [
				'type' => 'CHAR',
				'constraint' => 255,
			],
			'religion' => [
				'type' => 'CHAR',
				'constraint' => 20,
			],
			'specialist' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'polyclinic' => [
				'type' => 'CHAR',
				'constraint' => 50,
			],
			'fee' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => true,
			],
			'email' => [
				'type' => 'CHAR',
				'constraint' => 100,
				'null' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 5000,
				'null' => true,
			],
			'role' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => true,
			],
			'active' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => true,
			],
			'reset_pw' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => true,
			],
			'reset_hash' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reset_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);

		$this->forge->addKey('employee_id', true);
		$this->forge->createTable('employees');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('employees');
	}
}
