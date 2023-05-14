<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diagnoses extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'diagnose_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'consultation_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'disease_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'note' => [
				'type' => 'TEXT',
				'null' => true,
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
		$this->forge->addKey('diagnose_id', true);
		$this->forge->addForeignKey('consultation_id', 'consultations', 'consultation_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('disease_id', 'diseases', 'disease_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('diagnoses');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('diagnoses', 'consultation_id');
		$this->forge->dropForeignKey('diagnoses', 'disease_id');
		$this->forge->dropTable('diagnoses');
	}
}
