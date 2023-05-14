<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diseases extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'disease_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'lvl_hierarchy' => [
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => true,
			],
			'loc_class' => [
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => true,
			],
			'type_termi_code' => [
				'type' => 'CHAR',
				'constraint' => 1,
				'null' => true,
			],
			'chapter' => [
				'type' => 'CHAR',
				'constraint' => 2,
				'null' => true,
			],
			'block' => [
				'type' => 'CHAR',
				'constraint' => 3,
				'null' => true,
			],
			'code1' => [
				'type' => 'CHAR',
				'constraint' => 6,
				'null' => true,
			],
			'code2' => [
				'type' => 'CHAR',
				'constraint' => 7,
				'null' => true,
			],
			'code3' => [
				'type' => 'CHAR',
				'constraint' => 8,
				'null' => true,
			],
			'title' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reff_mt1' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reff_mt2' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reff_mt3' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reff_mt4' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
			'reff_mb' => [
				'type' => 'CHAR',
				'constraint' => 255,
				'null' => true,
			],
		]);
		$this->forge->addKey('disease_id', true);
		$this->forge->createTable('diseases');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('diseases');
	}
}
