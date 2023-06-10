<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'auth';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_users', 'username', 'password', 'level', 'created_at', 'updated_at'];
}
