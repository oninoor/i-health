<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Drugs extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'drug_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'CHAR',
				'constraint' => 255,
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => 5000,
				'null' => true,
			],
			'unit' => [
				'type' => 'CHAR',
				'constraint' => 255,
			],
			'contents_per_unit' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
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
		$this->forge->addKey('drug_id', true);
		$this->forge->createTable('drugs');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('drugs');
	}
}
