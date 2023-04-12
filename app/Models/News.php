<?php

namespace App\Models;

use CodeIgniter\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'title',
        'description',
        'category',
        'author',
        'image'
    ];
    protected $useTimestamps = true;
}
