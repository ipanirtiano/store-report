<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auth extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_users'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
			],
			'username' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'level' => [
				'type'           => 'VARCHAR',
				'constraint'     => 10
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     => true
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('auth');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('auth');
	}
}
