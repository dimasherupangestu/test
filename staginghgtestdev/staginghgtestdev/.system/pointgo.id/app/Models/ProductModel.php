<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $allowedFields = ['id', 'sku', 'product', 'description', 'category_id', 'category', 'brand_id', 'brand', 'img', 'active', 'limitflashsale', 'discount_number','discount_price','flashsale_part'];

    public function data_where_array($where)
    {
        return $this->where($where)->get();
    }
}