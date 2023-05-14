<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Holidays extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'holiday_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'doctor_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'date' => [
				'type' => 'DATE',
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
		$this->forge->addKey('holiday_id', true);
		$this->forge->addForeignKey('doctor_id', 'employess', 'employee_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('holidays');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('holidays', 'doctor_id');
		$this->forge->dropTable('holidays');
	}
}
