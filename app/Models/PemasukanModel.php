<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanModel extends Model
{
    protected $table = 'pemasukan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi', 'tanggal', 'bulan', 'dept', 'income', 'created_at', 'updated_at'];
}
