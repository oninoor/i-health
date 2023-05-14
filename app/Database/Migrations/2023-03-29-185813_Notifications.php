<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'notification_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'employee_id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'unsigned'   => true,
				'null' 			 => true
			],
			'patient_id' => [
				'type'       => 'INT',
				'constraint' => 11,
				'unsigned'   => true,
				'null' 			 => true
			],
			'title' => [
				'type'       => 'CHAR',
				'constraint' => 255,
				'null'       => true,
			],
			'message' => [
				'type'       => 'TEXT',
				'null'       => true,
			],
			'created_at' => [
				'type'       => 'DATETIME',
				'null'       => true,
			],
			'updated_at' => [
				'type'       => 'DATETIME',
				'null'       => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);

		$this->forge->addKey('notification_id', true);
		$this->forge->addForeignKey('employee_id', 'employess', 'employee_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('patient_id', 'employess', 'patient_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('notifications');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('notifications', 'employee_id');
		$this->forge->dropForeignKey('notifications', 'patient_id');
		$this->forge->dropTable('notifications');
	}
}
