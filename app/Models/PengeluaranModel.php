<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'pengeluaran';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi', 'tanggal', 'bulan', 'ket_biaya', 'jumlah', 'created_at', 'updated_at'];
}
