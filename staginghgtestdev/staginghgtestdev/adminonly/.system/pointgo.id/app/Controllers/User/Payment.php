<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Payment extends BaseController {

    public function index($order_id = null) {
        if ($this->users === false) {
            return redirect()->to(base_url());
        } elseif ($order_id === null) {

            if ($this->request->getPost('order_id')) {
                $orders = $this->M_Base->data_where('orders', 'order_id', $this->request->getPost('order_id'));

                if (count($orders) == 1) {
                    if ($orders[0]['order_id'] === $this->request->getPost('order_id')) {
                        return redirect()->to(base_url() . '/payment/' . $orders[0]['order_id']);
                    } else {
                        $this->session->setFlashdata('error', 'No Transaksi tidak ditemukan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'No Transaksi tidak ditemukan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

    		$data = array_merge($this->base_data, [
	    		'title' => 'Pembayaran',
                'menu_active' => 'Cek',
	    	]);

	        return view('User/Payment/index', $data);

    	} else {
    		$orders = $this->M_Base->data_where('orders', 'order_id', $order_id);

    		if (count($orders) === 1) {

                $method = $this->M_Base->data_where('method', 'id', $orders[0]['method_id']);
                $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);

                $instruksi = count($method) == 1 ? $method[0]['instruksi'] : '-';
                $publik = count($product) == 1 ? $product[0]['price'] : '-';
                $silver = count($product) == 1 ? $product[0]['price_silver'] : '-';
                $gold = count($product) == 1 ? $product[0]['price_gold'] : '-';

    			$data = array_merge($this->base_data, [
		    		'title' => 'Detail Pembayaran',
		    		'price' => [
                        'publik' => $publik,
                        'silver' => $silver,
                        'gold' => $gold,
                    ],
		    		'poppay' => [
                        'poppay' => $this->M_Base->u_get('pop_pay_image'),
                        'status' => $this->M_Base->u_get('pop_pay_status'),
                    ],
		    		'orders' => array_merge($orders[0], [
                        'instruksi' => $instruksi,
                    ]),
                    'menu_active' => 'Cek',
		    	]);
		    	
		    	if ($orders[0]['provider'] == 'AG') {
		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                
                    if (count($product) == 1) {
                        
                            $ag_merchant = $this->M_Base->u_get('ag-merchant');
                            $ag_key = $this->M_Base->u_get('ag-secret');
                            $signe = ''.$ag_merchant.':'.$ag_key.':'.$orders[0]['order_id'].'';

                            $post_data = json_encode([
                                'ref_id' => $orders[0]['order_id'],
                                'merchant_id' => $ag_merchant,
                                'signature' => md5($signe),
                            ]);
            
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, 'https://v1.apigames.id/v2/transaksi/status');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                            $result = curl_exec($ch);
                            $result = json_decode($result, true);
                            
                            if (isset($result)) {
                                if ($result['status'] == 0) {
                                    $this->M_Base->data_update('orders', [
										'status' => 'Pending',
										'ket' =>$result['error_msg'],
									], $orders[0]['id']);
                                } else {
                                    if ($result['data']['status'] == 'Sukses') {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Success',
										'ket' => $result['data']['status'],
									], $orders[0]['id']);
                                    } else if ($result['data']['status'] == 'Pending') {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Pending',
										'ket' => $result['data']['status'],
									], $orders[0]['id']);
                                    } else {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Processing',
										'ket' => $result['data']['status'],
									], $orders[0]['id']);
                                    }
                                    
                                }
                            } 
                        
                    }
		    	    
		    	}

		    	else if ($orders[0]['provider'] == 'DF') {
		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);

		    	    if ($orders[0]['status'] == 'Processing') {
                
                        if (count($product) == 1) {
                            
                            $df_user = $this->M_Base->u_get('digi-user');
                            $df_key = $this->M_Base->u_get('digi-key');
                            
                            $post_data = json_encode([
                                'username' => $df_user,
                                'buyer_sku_code' => $product[0]['sku'],
                                'customer_no' => $orders[0]['user_id'] . $orders[0]['zone_id'],
                                'ref_id' => $orders[0]['order_id'],
                                'sign' => md5($df_user.$df_key.$orders[0]['order_id']),
                            ]);
                
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                            $result = curl_exec($ch);
                            $result = json_decode($result, true);
                            
                            if (isset($result['data'])) {
                                
                                if ($result['data']['status'] == 'Gagal') {
                                    $this->M_Base->data_update('orders', [
                                        'ket' => $result['data']['message'],
                                        'status' => 'Canceled',
                                    ], $orders[0]['id']);
        
                                    if (!empty($orders[0]['username'])) {
                                        $users = $this->M_Base->data_where('users', 'username', $orders[0]['username']);
        
                                        if (count($users) === 1) {
                                            $this->M_Base->data_update('users', [
                                                'balance' => $users[0]['balance'] + $orders[0]['price'],
                                            ], $users[0]['id']);
                                        }
                                    }
                                } else {
                                    
                                    if ($result['data']['status'] == 'Sukses') {
                                        $note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                                        $this->M_Base->data_update('orders', [
                                            'status' => 'Success',
                                            'ket' => $note,
                                        ], $orders[0]['id']);
        
                                    }
                                }
                            }
                            
                        }
    		    	    }
		    	}

                else if ($orders[0]['provider'] == 'TV') {
		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                
                    if (count($product) == 1) {
                        
                            $tv_merchant = $this->M_Base->u_get('tv-merchant');
                            $tv_key = $this->M_Base->u_get('tv-secret');
                            $signe = ''.$tv_merchant.':'.$tv_key.':'.$orders[0]['order_id'].'';
                            $md5signe = md5($signe);
            
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://api.tokovoucher.id/v1/transaksi/status?ref_id='.$orders[0]['order_id'].'&member_code='.$tv_merchant.'&signature='.$md5signe.'',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                                CURLOPT_POSTFIELDS => '',
                                CURLOPT_HTTPHEADER => array(
                                    'Content-Type: application/x-www-form-urlencoded'
                                ),
                            ));
                            
                            $result = curl_exec($curl);
                            $result = json_decode($result, true);
                            
                                if ($result['status'] === 0) {
                                    $this->M_Base->data_update('orders', [
										'status' => 'Pending',
										'ket' =>$result['error_msg'],
									], $orders[0]['id']);
                                } else {
                                    if ($result['status'] === 'sukses') {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Success',
										'ket' => $result['sn'],
									], $orders[0]['id']);
                                    } else if ($result['status'] === 'pending') {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Pending',
										'ket' => $result['sn'],
									], $orders[0]['id']);
                                    } else {
                                        $this->M_Base->data_update('orders', [
										'status' => 'Processing',
										'ket' => $result['sn'],
									], $orders[0]['id']);
                                    }
                                    
                                }
                            
                        
                    }
		    	    
		    	}
		    	
		    	else if ($orders[0]['provider'] == 'BM') {
		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                    if ($orders[0]['status'] == 'Finished') {
                        
                    if (count($product) == 1) {
                            
                            $bm_id = $this->M_Base->u_get('bm-id');
                    		$bm_key = $this->M_Base->u_get('bm-key');
                    		$signe = $bm_id.$bm_key;
                    		$sign = md5($signe);
                    		$curl = curl_init();
                    							
                    		curl_setopt_array($curl, array(
                    			CURLOPT_URL => 'https://bigmedia.id/api/game-feature',
                    			CURLOPT_RETURNTRANSFER => true,
                    			CURLOPT_ENCODING => '',
                    			CURLOPT_MAXREDIRS => 10,
                    			CURLOPT_TIMEOUT => 0,
                    			CURLOPT_FOLLOWLOCATION => true,
                    			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    			CURLOPT_CUSTOMREQUEST => 'POST',
                    			CURLOPT_POSTFIELDS => array('key' => $bm_key, 'sign' => $sign, 'type' => 'status', 'trxid' => $orders[0]['trx_id']),
                    		));
                    
                    		$result = curl_exec($curl);
                    		$result = json_decode($result, true);
                            
                            if (is_array($result)) {
								if ($result['result'] == 'true') {
									
									
									$status = 'Success';
									$ket = $result['data'][0]['note'];
									

								} else  if ($result['result'] == 'false') {
								    
									$ket = $result['message'];
									$status = 'Processing';

								} else {
									$ket = '';
								}
                            }
								
							$this->M_Base->data_update('orders', [
    							'status' => $status,
    							'ket' => $ket,
    						], $orders[0]['id']);
                            
                        
                    }
		    	}
		    	    
		    	}
		    	
		    	else if ($orders[0]['provider'] == 'VR') {
		    	    
		    	    if ($orders[0]['status'] == 'Finished') {
		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                
                    if (count($product) == 1) {
                            
                            $vr_id = $this->M_Base->u_get('vr-id');
                    		$vr_key = $this->M_Base->u_get('vr-key');
                    		$signe = $vr_id.$vr_key;
                    		$sign = md5($signe);
                    		$curl = curl_init();
                    							
                    		curl_setopt_array($curl, array(
                    			CURLOPT_URL => 'https://vip-reseller.co.id/api/game-feature',
                    			CURLOPT_RETURNTRANSFER => true,
                    			CURLOPT_ENCODING => '',
                    			CURLOPT_MAXREDIRS => 10,
                    			CURLOPT_TIMEOUT => 0,
                    			CURLOPT_FOLLOWLOCATION => true,
                    			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    			CURLOPT_CUSTOMREQUEST => 'POST',
                    			CURLOPT_POSTFIELDS => array('key' => $vr_key, 'sign' => $sign, 'type' => 'status', 'trxid' => $orders[0]['trx_id']),
                    		));
                    
                    		$result = curl_exec($curl);
                    		$result = json_decode($result, true);
                            
                                if (is_array($result)) {
								if ($result['result'] == 'true') {
									
									
									$status = 'Finished';
									$ket = $result['data'][0]['note'];
									

								} else  if ($result['result'] == 'false') {
								    
									$ket = $result['message'];
									$status = 'Processing';

								} else {
									$ket = '';
								}
                            }
								
							$this->M_Base->data_update('orders', [
    							'status' => $status,
    							'ket' => $ket,
    						], $orders[0]['id']);
                            
                        
                    }
		    	    }
		    	    
		    	}
		    	
else if ($orders[0]['provider'] == 'BJ') {
		    	    
    		    	    if ($orders[0]['status'] == 'Success') {
    		    	    $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                    
                        if (count($product) == 1) {
                                
                                $curl = curl_init();
    
                    		curl_setopt_array($curl, array(
                    			CURLOPT_URL => 'https://bangjeff.com/api/statustrx/get?invno='.$orders[0]['trx_id'].'',
                    			CURLOPT_RETURNTRANSFER => true,
                    			CURLOPT_ENCODING => '',
                    			CURLOPT_MAXREDIRS => 10,
                    			CURLOPT_TIMEOUT => 0,
                    			CURLOPT_FOLLOWLOCATION => true,
                    			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    			CURLOPT_CUSTOMREQUEST => 'GET',
                    			CURLOPT_POSTFIELDS => '',
                    			CURLOPT_HTTPHEADER => array(
                    				'Content-Type: application/x-www-form-urlencoded'
                    			),
                    		));
                            $result = curl_exec($curl);
                            $result = json_decode($result, true);
                            
        						if ($result['status'] == 'DONE') {
        							
        							
        							$status = 'Finished';
        							$ket = $result['voucher'] !== '' ? $result['voucher'] : $result['message'];
        							
        
        						} else {
        						    $status = 'Success';
        							$ket = 'Pesanan dalam proses Pengiriman';
        						}
                            
        						
        					$this->M_Base->data_update('orders', [
        						'status' => $status,
        						'ket' => $ket,
        					], $orders[0]['id']);
                            
                        
                    }
		    	    }
		    	    
		    	}
		    	


		        return view('User/Payment/detail', $data);
    		} else {
    			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    		}
    	}
    }
}
