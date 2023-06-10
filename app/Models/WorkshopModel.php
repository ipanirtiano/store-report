<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkshopModel extends Model
{
    protected $table = 'workshop';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi', 'nama_project', 'tanggal', 'bulan', 'harga_modal', 'harga_jual', 'keuntungan', 'created_at', 'updated_at'];
}
