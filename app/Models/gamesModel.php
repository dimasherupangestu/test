<?php

namespace App\Models;

use CodeIgniter\Model;

class gamesModel extends Model
{
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'games',
        'category',
        'image',
        'banner_img',
        'target',
        'code',
        'provider',
        'status',
        'infoimage',
        'slug',
        'content'
    ];


    public function getGames()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    public function getUniqueCategories()
    {
        return $this->distinct()->select('category')->findAll();
    }
}
