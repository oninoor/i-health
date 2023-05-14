<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prescribtions extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'prescribtion_id' => [
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
			'drug' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
			],
			'dosage' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'amount' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'consumption' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'conditions' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'moment' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'note' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'quantity' => [
				'type' => 'INT',
				'constraint' => 11,
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
		$this->forge->addKey('prescribtion_id', true);
		$this->forge->addForeignKey('consultation_id', 'consultations', 'consultation_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('prescriptions');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('prescriptions', 'consultation_id');
		$this->forge->dropTable('prescriptions');
	}
}
