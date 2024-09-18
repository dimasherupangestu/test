<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['id', 'order_id', 'username', 'wa', 'product_id', 'product', 'price', 'user_id', 'zone_id', 'nickname', 'method_id', 'method', 'games', 'games_id', 'status', 'ket', 'payment_code', 'provider', 'date', 'date_create', 'date_process', 'voucher', 'payment_type', 'payment_gateway', 'method_code', 'raw_price', 'trx_id', 'saldosb', 'saldost'];

    public function data_count()
    {
        return $this->select('product_id, COUNT(*) as count')->where('status', 'success')->groupBy('product_id')->get()->getResultArray();
    }

    public function getRevenue($productId)
    {
        return $this->selectSum('price')
            ->where(['product_id' => $productId, 'status' => 'success'])
            ->get()
            ->getRowArray()['price'];
    }

    public function getCost($productId)
    {
        return $this->selectSum('raw_price')
            ->where(['product_id' => $productId, 'status' => 'success'])
            ->get()
            ->getRowArray()['raw_price'];
    }
}
