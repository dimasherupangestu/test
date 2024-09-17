<?php

namespace App\Controllers;

class Api extends BaseController {

    public function index ($version = null) {
    
        if ($version === 'v1-alpha') {
            $array = [
                'success' => false,
                'message' => 'parameter tidak sesuai',
            ];
    
            if ($this->request->getPost('api_key')) {
    
                $api_key = addslashes(trim(htmlspecialchars($this->request->getPost('api_key'))));
    
                if (!empty($api_key)) {
    
                    $data_users = $this->M_Base->data_where('users', 'api_key', $api_key);
    
                    if (count($data_users) == 1) {
                        if ($data_users[0]['level'] == 'Gold') {
    
                            if ($data_users[0]['status'] == 'On') {
        
                                if ($this->request->getPost('action')) {
        
                                    $action = addslashes(trim(htmlspecialchars($this->request->getPost('action'))));
        
                                    if ($action === 'profile') {
        
                                        $array['success'] = true;
                                        $array['message'] = 'detail profile ditemukan';
                                        $array['data'] = [
                                            'username' => $data_users[0]['username'],
                                            'balance' => $data_users[0]['balance'],
                                        ];
        
                                    } else if ($action === 'product') {
        
                                        $product = [];
                                        foreach ($this->M_Base->all_data('product') as $loop) {
        
                                            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);
        
                                            if (count($games) == 1) {
        
        
                                                $product[] = [
                                                    'games' => $games[0]['games'],
                                                    'product' => $loop['product'],
                                                    'sku' => $loop['sku'],
                                                    'status' => $loop['status'],
                                                    'price' => [
                                                        'publik' => $loop['price'],
                                                        'silver' => $loop['price_silver'],
                                                        'gold' => $loop['price_gold'],
                                                    ],
                                                    'games_additional' => [
                                                        'category' => $games[0]['category'],
                                                        'product_sort' => $loop['sort'],
                                                        //'content' => $games[0]['content'],
                                                        //'image' => $games[0]['image'],
                                                        //'target' => $games[0]['target'],
                                                        //'sort' => $games[0]['sort'],
                                                        //'check_status' => $games[0]['check_status'],
                                                        //'status' => $games[0]['status'],
                                                        //'check_code' => $games[0]['check_code'],
                                                        //'product_img' => $loop['image'],
                                                    ],
                                                ];
                                            }
        
                                        }
        
                                        $array['success'] = true;
                                        $array['message'] = 'data produk ditemukan';
                                        $array['data'] = $product;
        
                                    } else if ($action === 'status') {
        
                                        if ($this->request->getPost('order_id')) {
        
                                            $order_id = addslashes(trim(htmlspecialchars($this->request->getPost('order_id'))));
        
                                            if (!empty($order_id)) {
        
                                                $orders = $this->M_Base->data_where_array('orders', [
                                                    'order_id' => $order_id,
                                                    'username' => $data_users[0]['username'],
                                                ]);
        
                                                if (count($orders) == 1) {
        
                                                    $array['success'] = true;
                                                    $array['message'] = 'detail pesanan ditemukan';
                                                    $array['data'] = [
                                                        'status' => $orders[0]['status'],
                                                        'note' => $orders[0]['ket'],
                                                    ];
        
                                                } else {
                                                    $array['message'] = 'pesanan tidak ditemukan';
                                                }
                                            } else {
                                                $array['message'] = 'order id diperlukan';
                                            }
                                        } else {
                                            $array['message'] = 'order id diperlukan';
                                        }
                                    } else if ($action === 'order') {
        
                                        if ($this->request->getPost('user_id') AND $this->request->getPost('product')) {
        
                                            $data_post = [
                                                'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                                                'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                                                'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                                            ];
        
                                            if (empty($data_post['user_id'])) {
                                                $array['message'] = 'user_id diperlukan';
                                            } else if (empty($data_post['product'])) {
                                                $array['message'] = 'produk diperlukan';
                                            } else {
        
                                                $product = $this->M_Base->data_where('product', 'sku', $data_post['product']);
        
                                                if (count($product) == 1) {
        
                                                    if ($product[0]['status'] == 'On') {
        
                                                        $games = $this->M_Base->data_where('games', 'id', $product[0]['games_id']);
        
                                                        if (count($games) == 1) {
        
                                                            $alphabet = 'APIE4';
                                                            $order_id = $alphabet . date('Ymd') . rand(0000000,9999999);
                                                            $trx = $order_id;
        
                                                            $price = $product[0]['price'];
        
                                                            if ($data_users[0]['level'] == 'Silver') {
                                                                $price = $product[0]['price_silver'];
                                                             
                                                                
                                                            } else if ($data_users[0]['level'] == 'Gold') {
                                                                
                                                                $price = $product[0]['price_gold'];
                                                                
                                                               
                                                            } else if ($data_users[0]['level'] == 'Member') {
                                                                
                                                                $price = $product[0]['price'];
                                                                
                                                               
                                                            } else {
                                                                $price = $product[0]['price'];
                                                            }
        
                                                            if ($data_users[0]['balance'] > $price) {
        
                                                                $status = 'Processing';
        
                                                                if (!empty($data_post['zone_id']) AND $data_post['zone_id'] != 1) {
                                                                    $customer_no = $data_post['user_id'] . $data_post['zone_id'];
                                                                } else if ($data_post['zone_id'] == 1) {
                                                                    $customer_no = $data_post['user_id'];
                                                                } else {
                                                                    $customer_no = $data_post['user_id'];
                                                                }
        
                                                                if ($product[0]['provider'] == 'DF') {
				                        
                                                                    $result = $this->M_Base->df_order($product[0]['sku'],$customer_no,$order_id);
                                                                    
                                                                    if (isset($result['data'])) {
                                                                        if ($result['data']['status'] == 'Gagal') {
                                                                            $ket = $result['data']['message'];
                                                                        } else {
                                                                            $ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                                                            
                                                                            echo json_encode(['success' => true]);
                                                                        }
                                                                    } else {
                                                                        $ket = 'Failed Order';
                                                                    }
                                                            
                                                                } else if ($product[0]['provider'] == 'LG') {
                                                        
                                                                    if (!empty($data_post['zone_id']) AND $data_post['zone_id'] != 1) {
                                                                        $data_post['zone_id'] = $data_post['zone_id'];
                                                                    } else if ($data_post['zone_id'] == 1) {
                                                                        $data_post['zone_id'] = '';
                                                                    } else if ($data_post['zone_id'] == '(1)') {
                                                                        $data_post['zone_id'] = '';
                                                                    }  else {
                                                                        $data_post['zone_id'] = '';
                                                                    }
                                                            
                                                                    $result = $this->M_Base->lg_order($product[0]['sku'], $data_post['user_id'], $data_post['zone_id'],$order_id);
                                                                    
                                                                    if ($result['code'] == 'SUCCESS') {
                                                                        if (isset($result['data'])) {
                                                                            $status = 'Processing';
                                                                            $ket = 'Pesanan sedang diproses';
                                                                            $trx = $result['data']['tid'];

                                                                    }} else {
                                                                        $ket = $result['code'];
                                                                    }
                                                            
                                                            
                                                                }  else if ($product[0]['provider'] == 'Manual') {
                                                                    
                                                                    $status = 'Processing';
                                                                    $ket = 'Pesanan siap diproses';
                                                                    
                                                                } else if ($product[0]['provider'] == 'AGG') {
                                                
                                                                    $result = $this->M_Base->ag_v1_order($product[0]['sku'], $customer_no, $order_id);
                                                            
                                                                    if ($result['status'] == 0) {
                                                                        $ket = $result['error_msg'];
                                                                    } else {
                                                                        
                                                                        if ($result['data']['status'] == 'Sukses') {
                                                                            $status = 'Success';
                                                                        }
                                                            
                                                                        $ket = $result['data']['sn'];
                                                                    }
                                                            
                                                                } else {
                                                                    $ket = 'Provider tidak ditemukan';
                                                                }
        
                                                                $this->M_Base->data_update('users', [
                                                                    'balance' => $data_users[0]['balance'] - $price,
                                                                ], $data_users[0]['id']);
        
                                                                $this->M_Base->data_insert('orders', [
                                                                    'order_id' => $order_id,
                                                                    'username' => $data_users[0]['username'],
                                                                    'wa' => $data_users[0]['wa'],
                                                                    'product_id' => $product[0]['id'],
                                                                    'product' => $product[0]['product'],
                                                                    'price' => $price,
                                                                    'raw_price' => $product[0]['raw_price'],
                                                                    'user_id' => $data_post['user_id'],
                                                                    'zone_id' => $data_post['zone_id'],
                                                                    'nickname' => '',
                                                                    'method_id' => 10001,
                                                                    'method' => 'API Saldo Akun',
                                                                    'games' => $games[0]['games'],
                                                                    'games_id' => $games[0]['id'],
                                                                    'status' => $status,
                                                                    'ket' => $ket,
                                                                    'voucher' => '',
                                                                    'trx_id' => $trx,
                                                                    'payment_gateway' => '',
                                                                    'payment_type' => '',
                                                                    'payment_code' => 'API Saldo Akun',
                                                                    'provider' => $product[0]['provider'],
                                                                    'date' => date('Y-m-d'),
                                                                    'date_create' => date('Y-m-d G:i:s'),
                                                                    'date_process' => date('Y-m-d G:i:s'),
                                                                ]);
        
                                                                $array['success'] = true;
                                                                $array['message'] = 'pesanan berhasil dibuat';
                                                                $array['data'] = [
                                                                    'order_id' => $order_id,
                                                                ];
        
                                                            } else {
                                                                $array['message'] = 'saldo tidak mencukupi';
                                                            }
                                                        } else {
                                                            $array['message'] = 'games tidak ditemukan';
                                                        }
                                                    } else {
                                                        $array['message'] = 'produk sedang gangguan';
                                                    }
                                                } else {
                                                    $array['message'] = 'produk tidak ditemukan';
                                                }
                                            }
                                        } else {
                                            $array['message'] = 'parameter tidak sesuai';
                                        }
                                    } else {
                                        $array['message'] = 'action tidak dikenali';
                                    }
                                } else {
                                    $array['message'] = 'action diperlukan';
                                }
                            } else {
                                $array['message'] = 'akun telah tersuspend';
                            }
                        } else {
                            $array['message'] = 'Upgrade level akun untuk bisa transaksi API';
                        }
                    } else {
                        $array['message'] = 'api key tidak dikenali';
                    }
                } else {
                    $array['message'] = 'api key diperlukan';
                }
            }
    
            echo json_encode($array);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

}
