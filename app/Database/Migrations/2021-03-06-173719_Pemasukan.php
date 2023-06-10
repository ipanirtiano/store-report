<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemasukan extends Migration
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
			'kode_transaksi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 10,
			],
			'tanggal' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'bulan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'dept' => [
				'type'           => 'VARCHAR',
				'constraint'     => 11
			],
			'income' => [
				'type'           => 'INT',
				'constraint'     => 11
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
		$this->forge->createTable('pemasukan');
	}

	//--------------------------------------------------------------------

	public function down()
	{

		$this->forge->dropTable('pemasukan');
	}
}
