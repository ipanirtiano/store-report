<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'store';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi', 'nama_barang', 'kategori', 'tanggal', 'bulan', 'harga_modal', 'harga_jual', 'keuntungan', 'created_at', 'updated_at'];
}
