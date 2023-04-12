<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'email', 'password'];
    protected $useTimestamps = true;

    protected $useAutoIncrement = true;

    protected $useSoftDeletes = false;

    protected $validationRules = [
        'fullname' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]',
    ];
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Email already exists',
        ],
    ];
    protected $skipValidation = false;
}
