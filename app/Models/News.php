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
        'author',
        'images'
    ];
    protected $useTimestamps = true;
    public function getPosts()
    {
        $builder = $this->db->table('news');
        $builder->select('*');
        $builder->join('user', 'user.email = news.author');
        $query = $builder->get();
        return $query->getResult();
    }
}
