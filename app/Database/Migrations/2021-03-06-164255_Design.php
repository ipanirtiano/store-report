<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Design extends Migration
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
			'nama_project' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'tanggal' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'bulan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'harga_modal' => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'harga_jual' => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'keuntungan' => [
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
		$this->forge->createTable('design');
	}

	//--------------------------------------------------------------------

	public function down()
	{

		$this->forge->dropTable('design');
	}
}
