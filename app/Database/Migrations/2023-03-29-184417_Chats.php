<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chats extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_chat' => [
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
			'sender' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'receiver' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'message' => [
				'type' => 'TEXT',
			],
			'status' => [
				'type' => 'ENUM("pending","sending","delivered","readed")',
				'default' => 'delivered',
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

		$this->forge->addKey('id_chat', true);
		$this->forge->createTable('chats');
	}

	public function down()
	{
		$this->forge->dropTable('chats');
	}
}
