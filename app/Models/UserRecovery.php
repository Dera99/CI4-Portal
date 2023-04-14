<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRecovery extends Model
{
    protected $table = 'password_reset_tokens';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'email',
        'token',
        'created_at',
        'updated_at'
    ];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useTimestamps = true;
}
