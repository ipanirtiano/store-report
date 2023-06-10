<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_user', 'nama_lengkap', 'email', 'phone', 'departemen', 'created_at', 'updated_at'];

    public function getNumRows()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'booking_meet_room');
        $query = mysqli_query($conn, "SELECT * FROM users");
        $count = mysqli_num_rows($query);

        return $count;
    }
}
