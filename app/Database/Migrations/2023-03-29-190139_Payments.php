<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payments extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id' => [
				'type' => 'BIGINT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'consultation_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true
			],
			'amount' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'status' => [
				'type' => 'ENUM',
				'constraint' => ['pending', 'settlement', 'cancel', 'deny', 'expire', 'refund', 'chargeback', 'pending_refund', 'partial_refund'],
				'default' => 'pending'
			],
			'transaction_time' => [
				'type' => 'DATETIME'
			],
			'transaction_id' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'transaction_status' => [
				'type' => 'ENUM',
				'constraint' => ['pending', 'settlement', 'cancel', 'deny', 'expire', 'refund', 'chargeback', 'pending_refund', 'partial_refund'],
				'default' => 'pending'
			],
			'fraud_status' => [
				'type' => 'ENUM',
				'constraint' => ['accept', 'challenge', 'deny'],
				'default' => 'accept'
			],
			'raw_response' => [
				'type' => 'TEXT'
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

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('consultation_id', 'consultations', 'consultation_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('payments');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropForeignKey('payments', 'consultation_id');
		$this->forge->dropTable('payments');
	}
}
