<?php

namespace App\Controllers;

class Sistem extends BaseController
{
    
    public function statustripay(){
        $curl = curl_init();

        curl_setopt_array($curl, [
            // CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => 'https://tripay.co.id/api/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $this->M_Base->u_get('tripay-key')],
            CURLOPT_FAILONERROR => false,
            CURLOPT_POST => true,
            // CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ]);

        $result = curl_exec($curl);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        
        echo empty($error) ? $response : $error;
    }
    
    public function statuslinkqu()
{
    $url = 'https://gateway.linkqu.id'; // Production
    $username_linkqu = $this->M_Base->u_get('username_linkqu');
    $pin_linkqu = $this->M_Base->u_get('pin_linkqu');
    $id_linkqu = $this->M_Base->u_get('id_linkqu');
    $secret_linkqu = $this->M_Base->u_get('secret_linkqu');
    $serverKey = $this->M_Base->u_get('signkey_linkqu');

    $fifteenMinutesAgo = date('Y-m-d H:i:s', strtotime('-10 minutes'));
    $twoDaysAgo = date('Y-m-d H:i:s', strtotime('-3 hours'));

    $orders2 = $this->M_Base->data_where_array('orders', [
        'status' => 'Pending',
        'payment_gateway' => 'Linkqu',
        'date_create >=' => $twoDaysAgo,
        'date_create <' => $fifteenMinutesAgo
    ]);

    $orderChunks = array_chunk($orders2, 50); // Memecah pesanan menjadi chunk dengan ukuran 10

    foreach ($orderChunks as $chunk) {
        $curlHandles = [];

        foreach ($chunk as $order) {
            $curl = curl_init();
            $urlWithParams = $url . '/linkqu-partner/transaction/payment/checkstatus?username=' . $username_linkqu . '&partnerreff=' . $order['order_id'];

            curl_setopt_array($curl, [
                CURLOPT_URL => $urlWithParams,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'client-id: ' . $id_linkqu . ' ',
                    'client-secret: ' . $secret_linkqu . ''
                ],
            ]);

            $curlHandles[$order['order_id']] = $curl;
        }
        
        sleep(1);

        $multiHandle = curl_multi_init();

        foreach ($curlHandles as $curl) {
            curl_multi_add_handle($multiHandle, $curl);
        }

        $running = null;

        do {
            curl_multi_exec($multiHandle, $running);
        } while ($running > 0);

        foreach ($curlHandles as $order_id => $curl) {
            $result = curl_multi_getcontent($curl);
            $info = curl_getinfo($curl);

            if ($info['http_code'] === 200) {
                $log_file_name = 'log_cekstatus_linkqu' . date("j.n.Y") . '.txt';
                $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
                fwrite($file, date('Y-m-d H:i:s') . ' ' . $result . "\n");
                fclose($file);

                $result = json_decode($result, true);

                if (isset($result['data']['status_trx']) && $result['data']['status_trx'] === 'success') {
                    $id = $order_id;
                    $orders = $this->M_Base->data_where_array('orders', [
                        'order_id' => $order_id,
                        'status' => 'Pending',
                        'payment_gateway' => 'Linkqu'
                    ]);

                    if (count($orders) === 1) {
                        $status = 'Processing';
                        $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
                        $trx = $id;

                        echo json_encode([
                            'response' => 'OK, Pembayaran sudah diterima website',
                        ]);

                        if (count($product) === 1) {
                            switch ($orders[0]['provider']) {
                                case 'DF':
                                case 'LG':
                                case 'BJ':
                                case 'TV':
                                    $this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
                                    break;
                                case 'VG':
                                
                                case 'BM':
                                case 'PBM':
                                case 'AG':
                                case 'Manual':
                                    $this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
                                    break;
                                default:
                                    $ket = 'Provider tidak ditemukan';
                            }
                        } else {
                            $ket = 'Produk tidak ditemukan';
                        }

                        $this->M_Base->data_update('orders', [
                            'status' => $status,
                            'ket' => $ket,
                            'trx_id' => $trx,
                        ], $orders[0]['id']);
                    } else {
                        $topup = $this->M_Base->data_where_array('topup', [
                            'topup_id' => $id,
                            'status' => 'Pending',
                        ]);

                        if (count($topup) === 1) {
                            $users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

                            if (count($users) === 1) {
                                $topupx = ($topup[0]['amount'] - $topup[0]['fee']);
                                $this->M_Base->data_update('users', [
                                    'balance' => $users[0]['balance'] + $topupx,
                                ], $users[0]['id']);

                                $this->M_Base->data_update('topup', [
                                    'status' => 'Success',
                                ], $topup[0]['id']);

                                echo json_encode([
                                    'success' => true,
                                    'msg' => 'Berhasil {TOPUP}',
                                ]);
                            } else {
                                echo json_encode([
                                    'success' => false,
                                    'msg' => 'Pengguna tidak ditemukan',
                                ]);
                            }
                        }
                    }
                }
            } else {
                // Penanganan jika permintaan tidak berhasil (HTTP code bukan 200)
            }

            curl_multi_remove_handle($multiHandle, $curl);
            curl_close($curl);
        }

        curl_multi_close($multiHandle);
    }
}

	public function statusapigames10() {

        $ag_merchant = $this->M_Base->u_get('ag-merchant');
        $ag_key = $this->M_Base->u_get('ag-secret');
    
    $orderss = array_reverse($this->M_Base->data_where_array_limit('orders', [
            'status' => 'Processing',
        ], 30));
        
        foreach($orderss as $order) {
            if ($order['provider'] == 'AG') {
                if ($order['method'] !== 'API Saldo Akun Seller Digiflazz' ){
                        
                        $signe = ''.$ag_merchant.':'.$ag_key.':'.$order['order_id'].'';

                        $post_data = json_encode([
                            'ref_id' => $order['order_id'],
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
									'status' => 'Processing',
									'ket' =>$result['error_msg'],
								], $order['id']);
								
							
    								
                            } else {
                                if ($result['data']['status'] == 'Sukses') {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $result['data']['sn'],
								], $order['id']);
								
								if (!empty($order['email_order'])){
                                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                                    }
								
    							
								
                                } else {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Processing',
									'ket' => $result['data']['status'],
								], $order['id']);
								
								
                                }
                            }
                        } 
                    }
                    else {
                        $signe = ''.$ag_merchant.':'.$ag_key.':'.$order['trx_id'].'';

                        $post_data = json_encode([
                            'ref_id' => $order['trx_id'],
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
									'status' => 'Processing',
									'ket' =>$result['error_msg'],
								], $order['id']);
								
								if ($order['method'] == 'API Saldo Akun Seller Digiflazz' ){
    								    $this->M_Base->sendPayloadDf($order['trx_id'], 'Canceled') ;
    							}
    								
                            } else {
                                if ($result['data']['status'] == 'Sukses') {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $result['data']['sn'],
								], $order['id']);
								
    								if ($order['method'] == 'API Saldo Akun Seller Digiflazz' ){
    								    $this->M_Base->sendPayloadDf($order['trx_id'], 'Success') ;
    								}
								
                                } else {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Processing',
									'ket' => $result['data']['status'],
								], $order['id']);
								
								
                                }
                            }
                        } 
                    }
                    
            }
        }
    }

	
	public function statusapigames() {

        $ag_merchant = $this->M_Base->u_get('ag-merchant');
        $ag_key = $this->M_Base->u_get('ag-secret');
        
        $orders2 = ($this->M_Base->data_where_array_limit('orders', [
            'status' => 'Processing',
            'provider' => 'AG',
            // 'ket' => 'SUCCESS',
        ],20));
                        
        foreach($orders2 as $order) {
            if ($order['provider'] == 'AG') {
                if ($order['method'] !== 'API Saldo Akun Seller Digiflazz' ){
                        
                        $signe = ''.$ag_merchant.':'.$ag_key.':'.$order['order_id'].'';

                        $post_data = json_encode([
                            'ref_id' => $order['order_id'],
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
									'status' => 'Processing',
									'ket' =>$result['error_msg'],
								], $order['id']);
								
							
    								
                            } else {
                                if ($result['data']['status'] == 'Sukses') {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $result['data']['sn'],
								], $order['id']);
								
								if (!empty($order['email_order'])){
                                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                                    }
								
    							
								
                                } else {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Processing',
									'ket' => $result['data']['status'],
								], $order['id']);
								
								
                                }
                            }
                        } 
                    }
                    else {
                        $signe = ''.$ag_merchant.':'.$ag_key.':'.$order['trx_id'].'';

                        $post_data = json_encode([
                            'ref_id' => $order['trx_id'],
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
									'status' => 'Processing',
									'ket' =>$result['error_msg'],
								], $order['id']);
								
								if ($order['method'] == 'API Saldo Akun Seller Digiflazz' ){
    								    $this->M_Base->sendPayloadDf($order['trx_id'], 'Canceled') ;
    							}
    								
                            } else {
                                if ($result['data']['status'] == 'Sukses') {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $result['data']['sn'],
								], $order['id']);
								
    								if ($order['method'] == 'API Saldo Akun Seller Digiflazz' ){
    								    $this->M_Base->sendPayloadDf($order['trx_id'], 'Success') ;
    								}
								
                                } else {
                                    $this->M_Base->data_update('orders', [
									'status' => 'Processing',
									'ket' => $result['data']['status'],
								], $order['id']);
								
								
                                }
                            }
                        } 
                    }
                    
            }
        }
    }
    
	public function product()
	{

		$silver = 4;
		$gold = 3;

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');

		$post_data = json_encode([
			'cmd' => 'prepaid',
			'username' => $df_user,
			'sign' => md5($df_user . $df_key . "pricelist"),
		]);


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		if (count($result['data']) > 1) {
			// Urutkan produk berdasarkan mereknya
			usort($result['data'], array($this->M_Base, 'compareProductsDigi'));
			$counters = array();

			foreach ($result['data'] as $loop) {

				$games = $this->M_Base->data_where_array('games', [
					'code' => $loop['brand'],
					'provider' => 'DF'
				]);

				$product = $this->M_Base->data_where('product', 'sku', $loop['buyer_sku_code']);

				if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {


					if (count($games) === 1) {
						if (count($product) === 1) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_update('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'On',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' update ON <br>';

						} elseif (count($product) === 0) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_insert('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'price' => $loop['price'] * 110 / 100,
								'price_silver' => ($loop['price'] / 100 * ($silver + 100)),
								'price_gold' => ($loop['price'] / 100 * ($gold + 100)),
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'On',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							]);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' Insert ON <br>';
						}


					}
				} else {
					if (count($games) === 1) {
						if (count($product) === 1) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_update('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'Off',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' Update OFF <br>';

						}
					}
				}
			}

		}

	}
	
	public function statustesiplg()
	{

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'icanhazip.com',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => '',
			)
		);

		$result = curl_exec($curl);
		echo $result;
		$result = json_decode($result, true);


	}
	public function productbj()
	{

		foreach ($this->M_Base->data_where('games', 'status', 'On') as $games) {

			$curl = curl_init();

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => 'https://bangjeff.com/api/v2/products?id=' . $games['id'] . '',
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
				)
			);
			$result = curl_exec($curl);
			$result = json_decode($result, true);

			if (count($result['data']['product_data']) > 1) {
				foreach ($result['data']['product_data'] as $loop) {

					$gamesx = $this->M_Base->data_where('games', 'id', $result['data']['id']);

					$product = $this->M_Base->data_where_array('product', [
						'sku' => $loop['id'],
						'provider' => 'BJ'
					]);

					if ($loop['active'] == 1) {
						if (count($gamesx) === 1) {
							if (count($product) === 1) {
								$this->M_Base->data_update('product', [
									'games_id' => $loop['product_id'],
									'product' => $loop['name'],
									'price' => $loop['price'],
									'raw_price' => $loop['price'],
									'provider' => 'BJ',
									'sku' => $loop['id'],
									'status' => 'On',
								], $product[0]['id']);

							}
							if (count($product) === 0) {

								$this->M_Base->data_insert('product', [
									'games_id' => $loop['product_id'],
									'product' => $loop['name'],
									'price' => $loop['price'],
									'raw_price' => $loop['price'],
									'provider' => 'BJ',
									'sku' => $loop['id'],
									'status' => 'On',
									'sort' => 99,
									'check_status' => 'N',
									'check_code' => '',
								]);
							}


							echo $loop['name'] . ' Success <br>';
						}


					} else if ($loop['active'] == 0) {
						if (count($gamesx) === 1) {
							if (count($product) === 1) {
								$this->M_Base->data_update('product', [
									'games_id' => $loop['product_id'],
									'product' => $loop['name'],
									'price' => $loop['price'],
									'raw_price' => $loop['price'],
									'provider' => 'BJ',
									'sku' => $loop['id'],
									'status' => 'Off',
								], $product[0]['id']);

							}
							if (count($product) === 0) {

								$this->M_Base->data_insert('product', [
									'games_id' => $loop['product_id'],
									'product' => $loop['name'],
									'price' => $loop['price'],
									'raw_price' => $loop['price'],
									'provider' => 'BJ',
									'sku' => $loop['id'],
									'status' => 'Off',
									'sort' => 99,
									'check_status' => 'N',
									'check_code' => '',
								]);
							}


							echo $loop['name'] . ' Success <br>';
						}


					}

				}
			}
		}
	}

// 	public function productlg()
// 	{
// 		$publik = 5;
// 		$silver = 4;
// 		$gold = 3;
// 		$api_key = $this->M_Base->u_get('lapakgaming-api');

// 		$games = $this->M_Base->data_where('games', 'provider', 'LG');

// 		$curl_options = [
// 			CURLOPT_RETURNTRANSFER => true,
// 			CURLOPT_ENCODING => '',
// 			CURLOPT_MAXREDIRS => 10,
// 			CURLOPT_TIMEOUT => 0,
// 			CURLOPT_FOLLOWLOCATION => true,
// 			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 			CURLOPT_CUSTOMREQUEST => 'GET',
// 			CURLOPT_POSTFIELDS => '',
// 			CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $api_key],
// 		];

// 		$multi_curl = curl_multi_init();
// 		$curls = [];

// 		$chunks = array_chunk($games, 20);

// 		foreach ($chunks as $chunk) {
// 			$multi_curl = curl_multi_init();
// 			$curls = [];
// 			foreach ($chunk as $game) {
// 				$curl = curl_init();
// 				$curl_options[CURLOPT_URL] = 'https://www.lapakgaming.com/api/product?category_code=' . $game['code'];
// 				curl_setopt_array($curl, $curl_options);
// 				curl_multi_add_handle($multi_curl, $curl);
// 				$curls[] = $curl;
// 			}

// 			$active = null;
// 			do {
// 				$status = curl_multi_exec($multi_curl, $active);
// 				curl_multi_select($multi_curl);
// 			} while ($status === CURLM_CALL_MULTI_PERFORM || $active);

// 			foreach ($curls as $index => $curl) {
// 				$result = curl_multi_getcontent($curl);
// 				$result = json_decode($result, true);
// 				curl_multi_remove_handle($multi_curl, $curl);

// 				$game = $chunk[$index];

// 				if (is_array($result['data']['products'])) {
// 					usort($result['data']['products'], [$this->M_Base, 'compareProducts']);
// 				} else {
// 					// If it's not an array, you can either skip this iteration or set $result['data']['products'] to an empty array
// 					$result['data']['products'] = [];
// 				}

// 				$counter = 1;

// 				foreach ($result['data']['products'] as $loop) {

// 					// Limit the number of products processed, if necessary

// 					$product_data = [
// 						'product' => $loop['name'],
// 						'raw_price' => $loop['price'],
// 						'price' => ($loop['price'] / 100 * ($publik + 100)),
// 						'price_bronze' => ($loop['price'] / 100 * ($publik + 100)),
// 						'price_silver' => ($loop['price'] / 100 * ($silver + 100)),
// 						'price_gold' => ($loop['price'] / 100 * ($gold + 100)),
// 						'provider' => 'LG',
// 						'sku' => $loop['code'],
// 						'status' => $loop['status'] == 'available' ? 'On' : 'Off',
// 						'sort' => $counter++,
// 					];

// 					$product = $this->M_Base->data_where_array('product', [
// 						'sku' => $loop['code'],
// 						'provider' => 'LG'
// 					]);

// 					$gamesx = $this->M_Base->data_where('games', 'code', $game['code']);

// 					if (count($gamesx) === 1) {
// 						if (count($product) === 1) {
// 							$this->M_Base->data_update('product', $product_data, $product[0]['id']);
// 							echo $loop['name'] . ' LG data_update ' . $product_data['status'] . ' <br>';
// 						} elseif (count($product) === 0 && $product_data['status'] === 'On') {
// 							$product_data['games_id'] = $gamesx[0]['id'];
// 							$this->M_Base->data_insert('product', $product_data);
// 							echo $loop['name'] . ' LG data_insert ON <br>';
// 						}
// 					}
// 				}
// 			}
// 			curl_multi_close($multi_curl);
// 		}
// 	}

	public function rawprice()
	{

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');
		$product_digi = $this->M_Base->data_where('product', 'provider', 'DF');
		$product_lg = $this->M_Base->data_where('product', 'provider', 'LG');
		$product_bj = $this->M_Base->data_where('product', 'provider', 'BJ');

		if (count($product_digi) >= 1) {
			$post_data = json_encode([
				'cmd' => 'prepaid',
				'username' => $df_user,
				'sign' => md5($df_user . $df_key . "pricelist"),
			]);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			$result = curl_exec($ch);
			$result = json_decode($result, true);

			if (count($result['data']) > 10) {
				foreach ($result['data'] as $loop) {

					if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {

						$product = $this->M_Base->data_where_array('product', [
							'sku' => $loop['buyer_sku_code'],
							'provider' => 'DF'
						]);


						if (count($product) === 1) {
							$this->M_Base->data_update('product', [
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

						}

						echo $loop['product_name'] . ' digiflazz Success <br>';
					}
				}
			}

		}


        if (count($product_lg) >= 1) {
            
        $api_key = $this->M_Base->u_get('lapakgaming-api');

		$games = $this->M_Base->data_where('games', 'provider', 'LG');

		$curl_options = [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS => '',
			CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $api_key],
		];

		$multi_curl = curl_multi_init();
		$curls = [];

		$chunks = array_chunk($games, 10);

		foreach ($chunks as $chunk) {
			$multi_curl = curl_multi_init();
			$curls = [];
			foreach ($chunk as $game) {
				$curl = curl_init();
				$curl_options[CURLOPT_URL] = 'https://www.lapakgaming.com/api/product?category_code=' . $game['code'];
				curl_setopt_array($curl, $curl_options);
				curl_multi_add_handle($multi_curl, $curl);
				$curls[] = $curl;
			}

			$active = null;
			do {
				$status = curl_multi_exec($multi_curl, $active);
				curl_multi_select($multi_curl);
			} while ($status === CURLM_CALL_MULTI_PERFORM || $active);

			foreach ($curls as $index => $curl) {
				$result = curl_multi_getcontent($curl);
				$result = json_decode($result, true);
				curl_multi_remove_handle($multi_curl, $curl);

				$game = $chunk[$index];

				if (is_array($result['data']['products'])) {
					usort($result['data']['products'], [$this->M_Base, 'compareProducts']);
				} else {
					// If it's not an array, you can either skip this iteration or set $result['data']['products'] to an empty array
					$result['data']['products'] = [];
				}

				$counter = 1;

				foreach ($result['data']['products'] as $loop) {

					// Limit the number of products processed, if necessary

					$product_data = [
						'raw_price' => $loop['price'],
						'provider' => 'LG',
						'status' => $loop['status'] == 'available' ? 'On' : 'Off',
					];

					$product = $this->M_Base->data_where_array('product', [
						'sku' => $loop['code'],
						'provider' => 'LG'
					]);

					$gamesx = $this->M_Base->data_where('games', 'code', $game['code']);

						if (count($product) === 1) {
							$this->M_Base->data_update('product', $product_data, $product[0]['id']);
							echo $loop['name'] . ' LG data_update ' . $product_data['status'] . ' <br>';
						}
					
				}
			}
			curl_multi_close($multi_curl);
		}
            
        }
	}
	
	public function gamesdigi()
	{

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');

		$post_data = json_encode([
			'cmd' => 'prepaid',
			'username' => $df_user,
			'sign' => md5($df_user . $df_key . "pricelist"),
		]);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		if (count($result['data']) > 20) {
			foreach ($result['data'] as $loop) {

				if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {

					$games = $this->M_Base->data_where('games', 'games', $loop['brand']);

					if (count($games) === 1) {


					} else if (count($games) === 0) {

						$this->M_Base->data_insert('games', [
							'games' => $loop['brand'],
							'category' => 'New',
							'image' => '' . url_title($loop['brand'], '-', true) . '.jpg',
							'slug' => url_title($loop['brand'], '-', true),
							'status' => 'Off',
							'code' => $loop['brand'],
							'provider' => 'DF',
							'target' => 'default',
							'check_status' => 'N',
						]);

						echo $loop['brand'] . ' Success <br>';
					}

				}
			}
		}
	}

	public function gamesbj()
	{

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://bangjeff.com/api/v2/products',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => '',
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
				),
			)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);


		if (count($result['data']) > 10) {
			foreach ($result['data'] as $loop) {

				if ($loop['active'] == 1) {

					$games = $this->M_Base->data_where('games', 'id', $loop['id']);

					if (count($games) === 1) {

						$this->M_Base->data_update('games', [
							'slug' => url_title('' . $loop['name'] . '-bjx', '-', true),
							'id' => $loop['id'],
						], $games[0]['id']);

						echo $loop['name'] . ' Success <br>';

					} else if (count($games) === 0) {

						$this->M_Base->data_insert('games', [
							'games' => $loop['name'],
							'slug' => url_title('' . $loop['name'] . '-bjx', '-', true),
							'status' => 'On',
							'category' => 'BangJeff (On) - New',
							'target' => 'default',
							'image' => 'default.jpg',
							'check_status' => 'N',
							'id' => $loop['id'],
						]);

						echo $loop['name'] . ' Success <br>';
					}

				} else if ($loop['active'] == 0) {

					$games = $this->M_Base->data_where('games', 'id', $loop['id']);

					if (count($games) === 1) {

						$this->M_Base->data_update('games', [
							'status' => 'Off',
							'id' => $loop['id'],
							'category' => 'BangJeff (Off)',
						], $games[0]['id']);

						echo $loop['name'] . ' Success <br>';

					}
				}
			}
		}


	}

	public function gameslg()
	{

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://www.lapakgaming.com/api/category',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => '',
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api')
				),
			)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);


		if (count($result['data']['categories']) > 1) {
			foreach ($result['data']['categories'] as $loop) {

				$games = $this->M_Base->data_where('games', 'code', $loop['code']);

				if (count($games) === 1) {

					$this->M_Base->data_update('games', [
						'slug' => url_title('' . $loop['name'] . '-lg', '-', true),
						'code' => $loop['code'],
						'provider' => 'LG',
					], $games[0]['id']);

					echo $loop['name'] . ' Success <br>';

				} else if (count($games) === 0) {

					$this->M_Base->data_insert('games', [
						'games' => $loop['name'],
						'code' => $loop['code'],
						'slug' => url_title('' . $loop['name'] . '-lg', '-', true),
						'status' => 'On',
						'category' => $loop['variant'],
						'target' => 'default',
						'provider' => 'LG',
						'image' => '' . url_title($loop['name'], '-', true) . '.jpg',
						'check_status' => 'N',
					]);

					echo $loop['name'] . ' Success <br>';
				}




			}
		}


	}

	public function statustokovoucher()
	{
		foreach ($this->M_Base->data_where('orders', 'status', 'Processing') as $order) {
			if ($order['provider'] == 'TV') {

				$product = $this->M_Base->data_where('product', 'id', $order['product_id']);

				if (count($product) == 1) {
					$tv_merchant = $this->M_Base->u_get('tv-merchant');
					$tv_key = $this->M_Base->u_get('tv-secret');
					$signe = '' . $tv_merchant . ':' . $tv_key . ':' . $order['order_id'] . '';

					$post_data = json_encode([
						'ref_id' => $order['order_id'],
						'member_code' => $tv_merchant,
						'signature' => md5($signe),
					]);

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'https://api.tokovoucher.id/v1/transaksi/status');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
					$result = curl_exec($ch);
					$result = json_decode($result, true);

					if ($result['status'] = 0) {
						$this->M_Base->data_update('orders', [
							'status' => 'Pending',
							'ket' => $result['error_msg'],
						], $order['id']);
					} else {
						if ($result['status'] = 'sukses') {
							$this->M_Base->data_update('orders', [
								'status' => 'Success',
								'ket' => $result['sn'],
							], $order['id']);
						} else if ($result['status'] = 'pending') {
							$this->M_Base->data_update('orders', [
								'status' => 'Pending',
								'ket' => $result['sn'],
							], $order['id']);
						} else {
							$this->M_Base->data_update('orders', [
								'status' => 'Processing',
								'ket' => $result['sn'],
							], $order['id']);
						}

					}

				}
			}
		}
	}

	public function gameslgdata()
	{

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://www.lapakgaming.com/api/category',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => '',
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api')
				),
			)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);
		$data = $result['data']['categories'];

		// Check if $data is an array and is not empty
		if (is_array($data) && !empty($data)) {
			// Generate HTML table
			$table = '<table>';
			$table .= '<thead style="text-align:left"><tr><th>Kode Games</th><th>Nama Games</th><th>Kategori Games</th><th>Data Server</th></tr></thead>';
			$table .= '<tbody>';
			foreach ($data as $category) {

				if (count($category['servers']) > 0) {
					$server_names = '';
					foreach ($category['servers'] as $server) {
						$server_names .= $server['name'] . '///' . $server['value'] . ',';
					}
					$server_names = rtrim($server_names, ',');
				} else {
					$server_names = '';
				}

				// Apply htmlspecialchars() function to each category property
				$code = htmlspecialchars($category['code']);
				$name = htmlspecialchars($category['name']);
				$variant = htmlspecialchars($category['variant']);
				$server = htmlspecialchars($server_names . "\n");

				// Generate HTML table row for each category
				$table .= '<tr><td>' . $code . '</td><td>' . $name . '</td><td>' . $variant . '</td><td>' . $server . '</td></tr>';
			}
			$table .= '</tbody>';
			$table .= '</table>';

			// Output the HTML table
			echo $table;
		} else {
			echo 'No categories found.';
		}




	}

	public function status()
	{
		foreach ($this->M_Base->data_where('orders', 'status', 'Processing') as $order) {
			if ($order['provider'] == 'DF') {

				$product = $this->M_Base->data_where('product', 'id', $order['product_id']);

				if (count($product) == 1) {
					$df_user = $this->M_Base->u_get('digi-user');
					$df_key = $this->M_Base->u_get('digi-key');

					$post_data = json_encode([
						'username' => $df_user,
						'buyer_sku_code' => $product[0]['sku'],
						'customer_no' => $order['user_id'] . $order['zone_id'],
						'ref_id' => $order['order_id'],
						'sign' => md5($df_user . $df_key . $order['order_id']),
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
							], $order['id']);

						} else {

							if ($result['data']['status'] == 'Sukses') {
								$note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
								$this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $note,
								], $order['id']);

								if ($order['status'] != 'Success') {
                								if (!empty($order['email_order'])){
                                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                                    }
								}

							}
						}
					}
				}
			}

		}
	}

	public function cekstatuslg($orderid)
	{

		$orders = $this->M_Base->data_where('orders', 'order_id', $orderid);
		$order = $orders[0];

		if ($order['provider'] == 'LG') {

			$curl = curl_init();

			curl_setopt_array(
				$curl,
				array(
					CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'] . '',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'GET',
					CURLOPT_POSTFIELDS => '',
					CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api')
					),
				)
			);

			$result = curl_exec($curl);
			echo $result;
			$result = json_decode($result, true);

			if ($result['code'] == 'SUCCESS') {
				if ($result['data']['status'] == 'SUCCESS') {
					$note = $result['data']['transactions'][0]['note'];
					if (strpos($note, 'Sukses Terkirim') !== false) {
						$status = 'Success';
						if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }

					} else {
						$status = 'Processing';
					}
					$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
				} else if ($result['data']['status'] == 'PENDING') {
					$status = 'Processing';
					$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
				} else {
					$ket = $result['code'];
					$status = 'Processing';
				}
				$this->M_Base->data_update('orders', [
					'status' => $status,
					'ket' => $ket,
				], $order['id']);
			} else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST'])) {

				$find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
				$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

				$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

				$this->M_Base->data_update('orders', [
					'status' => 'Processing',
					'ket' => $ket,
					'trx_id' => $trx,
				], $order['id']);

			} else {

				$ket = $result['code'];
				$status = 'Processing';

				$this->M_Base->data_update('orders', [
					'status' => $status,
					'ket' => $ket,
				], $order['id']);

			}


		}


	}
	
	public function gantistatussuccess()
	{
	    
	    $orders2 = $this->M_Base->data_where_array('orders', [
            'status' => 'Processing',
            'provider' => 'LG',
            'ket' => 'PRODUCT_EMPTY',
        ]);
        
        	foreach ($orders2 as $order) {
        	    $this->M_Base->data_update('orders', [
				'status' => 'Success',
				], $order['id']);
        	}
	}

	public function statuslglama()
	{
	    
	    $orders2 = $this->M_Base->data_where_array('orders', [
            'status' => 'Processing',
            'provider' => 'LG',
        ]);
        
		foreach ($orders2 as $order) {
			if ($order['status'] == 'Processing' && $order['provider'] == 'LG') {

				$curl = curl_init();

				curl_setopt_array(
					$curl,
					array(
						CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'] . '',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'GET',
						CURLOPT_POSTFIELDS => '',
						CURLOPT_HTTPHEADER => array(
							'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api')
						),
					)
				);

				$result = curl_exec($curl);
				$result = json_decode($result, true);

				if ($result['code'] == 'SUCCESS') {
					if ($result['data']['status'] == 'SUCCESS') {
						$note = $result['data']['transactions'][0]['note'];
						if (strpos($note, 'Sukses Terkirim') !== false) {
							$status = 'Success';
							if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }

						} else {
							$status = 'Processing';
						}
						$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
					} else if ($result['data']['status'] == 'PENDING') {
						$status = 'Processing';
						$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
					} else {
						$ket = $result['code'];
						$status = 'Processing';
					}
					$this->M_Base->data_update('orders', [
						'status' => $status,
						'ket' => $ket,
					], $order['id']);
				} else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST'])) {

					$find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
					$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

					$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

					$this->M_Base->data_update('orders', [
						'status' => 'Processing',
						'ket' => $ket,
						'trx_id' => $trx,
					], $order['id']);

				} else {

					$ket = $result['code'];
					$status = 'Processing';

					$this->M_Base->data_update('orders', [
						'status' => $status,
						'ket' => $ket,
					], $order['id']);

				}


			}

		}
	}
	
	public function statuslgkosong()
        {
        $orders2 = $this->M_Base->data_where_array('orders', [
            'status' => '',
            'provider' => 'LG',
        ]);
    
        $multiCurl = curl_multi_init();
        $handles = array();
    
        foreach ($orders2 as $order) {
            if ($order['status'] == '' && $order['provider'] == 'LG') {
                $curl = curl_init();
    
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api'),
                        ),
                    )
                );
    
                curl_multi_add_handle($multiCurl, $curl);
                $handles[] = $curl;
            }
        }
    
        $running = null;
        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running);
    
        foreach ($handles as $index => $curl) {
            $result = curl_multi_getcontent($curl);
            $order = $orders2[$index];
    
            $result = json_decode($result, true);
            
            $log_file_name = 'log_lapak_allstatus_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . json_encode($result) . "\n"); // Include time in the log message
fclose($file);
    
            if ($result['code'] == 'SUCCESS') {
                if ($result['data']['status'] == 'SUCCESS') {
    				$note = $result['data']['transactions'][0]['note'];
    				if (strpos($note, 'Sukses Terkirim') !== false) {
    					$status = 'Success';
    					if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
    
    				} else {
    					$status = 'Processing';
    				}
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else if ($result['data']['status'] == 'PENDING') {
    				$status = 'Processing';
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else {
    				$ket = $result['code'];
    				$status = 'Processing';
    			}
    			$this->M_Base->data_update('orders', [
    				'status' => $status,
    				'ket' => $ket,
    			], $order['id']);
    			
            } else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST'])) {
                $find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
				$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

                            $trx = $order['order_id'];
							$ket = $result['code'];
							
				$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

	$log_file_name = 'log_reorder_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $trx.$ket . "\n"); // Include time in the log message
fclose($file);

				$this->M_Base->data_update('orders', [
					'status' => 'Processing',
				], $order['id']);
				
            } else {
                $ket = $result['code'];
				$status = 'Processing';

				$this->M_Base->data_update('orders', [
					'status' => $status,
					'ket' => $ket,
				], $order['id']);
            }
    
            // $this->M_Base->data_update('orders', [
            //     'status' => $status,
            //     'ket' => $ket,
            // ], $order['id']);
    
            curl_multi_remove_handle($multiCurl, $curl);
            curl_close($curl);
        }
    
        curl_multi_close($multiCurl);
    }
    
    public function callbacklg()
	{


		$json = file_get_contents('php://input');
		
		 $log_file_name = 'log_callbacklg_' . date("j.n.Y") . '.txt'; // Include time in the log file name
		$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
		fwrite($file, date('Y-m-d H:i:s') . ' ' . $json . "\n"); // Include time in the log message
		fclose($file);
    				
		$data = json_decode($json, true);
		if ($data) {
			if (is_array($data)) {
				$id = $data['data']['tid'];

				$orders = $this->M_Base->data_where_array('orders', [
					'trx_id' => $id,
				]);

				if (count($orders) === 1) {


					if ($data['data']['status'] == 'SUCCESS') {
						
						$note = $data['data']['transactions'][0]['note'];
						if (strpos($note, 'Sukses Terkirim') !== false) {
							$status = 'Success';
							if (!empty($orders[0]['email_order'])){
								$this->M_Base->elasticmail_sender_success($orders[0]['email_order'], $orders[0]['product'], $orders[0]['order_id'], $orders[0]['method']);
							}
		
						} else {
							$status = 'Processing';
						}
						$ket = $data['data']['transactions'][0]['voucher_code'] !== '' ? $data['data']['transactions'][0]['voucher_code'] : $data['data']['transactions'][0]['note'];
					} else if ($data['data']['status'] == 'REFUNDED') {
						$status = 'Processing';
						$ket = $data['data']['transactions'][0]['voucher_code'] !== '' ? $data['data']['transactions'][0]['voucher_code'] : $data['data']['transactions'][0]['note'];
					} else if ($data['data']['status'] == 'PENDING') {
						$status = 'Processing';
						$ket = $data['data']['transactions'][0]['voucher_code'] !== '' ? $data['data']['transactions'][0]['voucher_code'] : $data['data']['transactions'][0]['note'];
					} else if ($data['code'] == 'INVALID_USER_ID_OR_ADDITIONAL_ID') {
						$status = 'Processing';
						$ket = $data['data']['transactions'][0]['voucher_code'] !== '' ? $data['data']['transactions'][0]['voucher_code'] : $data['data']['transactions'][0]['note'];
					}


					$this->M_Base->data_update('orders', [
						'status' => $status,
						'ket' => $ket,
					], $orders[0]['id']);


				}

			}
		}
	}
    
    public function statuslg()
        {
        $orders2 = ($this->M_Base->data_where_array_limit('orders', [
            'status' => 'Processing',
            'provider' => 'LG',
            // 'ket' => 'SUCCESS',
        ],20));
    
        $multiCurl = curl_multi_init();
        $handles = array();
    
        foreach ($orders2 as $order) {
            if ($order['status'] == 'Processing' && $order['provider'] == 'LG' && $order['trx_id'] !== $order['order_id'] ) {
                $curl = curl_init();
    
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api'),
                        ),
                    )
                );
    
                curl_multi_add_handle($multiCurl, $curl);
                $handles[] = $curl;
            }
        }
    
        $running = null;
        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running);
    
        foreach ($handles as $index => $curl) {
            $result = curl_multi_getcontent($curl);
            $order = $orders2[$index];
    
            $result = json_decode($result, true);
            
            $log_file_name = 'log_lapak_allstatus_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . json_encode($order['order_id'].json_encode($result)) . "\n"); // Include time in the log message
fclose($file);
    
            if ($result['code'] == 'SUCCESS') {
                if ($result['data']['status'] == 'SUCCESS') {
    				$note = $result['data']['transactions'][0]['note'];
    				$status = 'Success';
    					if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
    				
    				echo $order['order_id'].$result['data']['transactions'][0]['note'];
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else if ($result['data']['status'] == 'PENDING') {
    				$status = 'Processing';
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else {
    				$ket = $result['code'].'|'.$result['data']['status'].'|'.$result['data']['transactions'][0]['note'];
    				$status = 'Processing';
    			}
    			$this->M_Base->data_update('orders', [
    				'status' => $status,
    				'ket' => $ket,
    			], $order['id']);
    			
            } else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST'])) {
                $find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
				$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

                            $trx = $order['order_id'];
							$ket = $result['code'];
							
				$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

	$log_file_name = 'log_reorder_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $trx.$ket.$order['order_id'] . "\n"); // Include time in the log message
fclose($file);

                if (empty($trx)) {
                    $trx = $order['trx_id'];;
                }
                
                if (empty($ket)) {
                    $trx = $order['ket'];;
                }

				$this->M_Base->data_update('orders', [
					'status' => 'Processing',
					'ket' => $ket,
					'trx_id' => $trx,
				], $order['id']);
				
            } else {
                $ket = $result['code'].'|'.$result['data']['status'].'|'.$result['data']['transactions'][0]['note'];
				$status = 'Processing';

				$this->M_Base->data_update('orders', [
					'status' => $status,
					'ket' => $ket,
				], $order['id']);
            }
    
            // $this->M_Base->data_update('orders', [
            //     'status' => $status,
            //     'ket' => $ket,
            // ], $order['id']);
    
            curl_multi_remove_handle($multiCurl, $curl);
            curl_close($curl);
        }
    
        curl_multi_close($multiCurl);
    }
    
    public function statuslgasc()
        {
        $orders2 = $this->M_Base->data_where_array_limit_asc('orders', [
            'status' => 'Processing',
            'provider' => 'LG',
            'ket !=' => 'PRODUCT_EMPTY',
        ],20);
    
        $multiCurl = curl_multi_init();
        $handles = array();
    
        foreach ($orders2 as $order) {
            if ($order['status'] == 'Processing' && $order['provider'] == 'LG') {
                $curl = curl_init();
    
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api'),
                        ),
                    )
                );
    
                curl_multi_add_handle($multiCurl, $curl);
                $handles[] = $curl;
            }
        }
    
        $running = null;
        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running);
    
        foreach ($handles as $index => $curl) {
            $result = curl_multi_getcontent($curl);
            $order = $orders2[$index];
    
            $result = json_decode($result, true);
            
            $log_file_name = 'log_lapak_allstatus_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . json_encode($result) . "\n"); // Include time in the log message
fclose($file);
    
            if ($result['code'] == 'SUCCESS') {
                if ($result['data']['status'] == 'SUCCESS') {
    				$note = $result['data']['transactions'][0]['note'];
    				if (strpos($note, 'Sukses Terkirim') !== false) {
    					$status = 'Success';
    					if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
    
    				} else {
    					$status = 'Processing';
    				}
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else if ($result['data']['status'] == 'PENDING') {
    				$status = 'Processing';
    				$ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
    			} else {
    				$ket = $result['code'].'|'.$result['data']['status'].'|'.$result['data']['transactions'][0]['note'];
    				$status = 'Processing';
    			}
    			$this->M_Base->data_update('orders', [
    				'status' => $status,
    				'ket' => $ket,
    			], $order['id']);
    			
            } else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST'])) {
                $find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
				$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

                            $trx = $order['order_id'];
							$ket = $result['code'];
							
				$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

	$log_file_name = 'log_reorder_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $trx.$ket . "\n"); // Include time in the log message
fclose($file);

				$this->M_Base->data_update('orders', [
					'status' => 'Processing',
					'ket' => $ket,
					'trx_id' => $trx,
				], $order['id']);
				
            } else {
                $ket = $result['code'].'|'.$result['data']['status'].'|'.$result['data']['transactions'][0]['note'];
				$status = 'Processing';

				$this->M_Base->data_update('orders', [
					'status' => $status,
					'ket' => $ket,
				], $order['id']);
            }
    
            // $this->M_Base->data_update('orders', [
            //     'status' => $status,
            //     'ket' => $ket,
            // ], $order['id']);
    
            curl_multi_remove_handle($multiCurl, $curl);
            curl_close($curl);
        }
    
        curl_multi_close($multiCurl);
    }
    
    public function statuslgnew()
{
    $orders2 = $this->M_Base->data_where_array('orders', [
        'status' => 'Processing',
        'provider' => 'LG',
    ]);

    // Split the $orders2 array into chunks of 100 data each
    $orderChunks = array_chunk($orders2, 100);

    foreach ($orderChunks as $orderChunk) {
        $multiCurl = curl_multi_init();
        $handles = array();

        foreach ($orderChunk as $order) {
            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api'),
                    ),
                )
            );

            curl_multi_add_handle($multiCurl, $curl);
            $handles[] = $curl;
        }

        $running = null;
        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running);

        foreach ($handles as $index => $curl) {
            $result = curl_multi_getcontent($curl);
            $order = $orderChunk[$index];

            $result = json_decode($result, true);

            $log_file_name = 'log_lapak_allstatus_' . date("j.n.Y") . '.txt'; // Include time in the log file name
            $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
            fwrite($file, date('Y-m-d H:i:s') . ' ' . json_encode($result) . "\n"); // Include time in the log message
            fclose($file);

            if ($result['code'] == 'SUCCESS') {
                if ($result['data']['status'] == 'SUCCESS') {
                    $note = $result['data']['transactions'][0]['note'];
                    if (strpos($note, 'Sukses Terkirim') !== false) {
                        $status = 'Success';
                        	if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
                    } else {
                        $status = 'Processing';
                    }
                    $ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
                } else if ($result['data']['status'] == 'PENDING') {
                    $status = 'Processing';
                    $ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
                } else {
                    $ket = $result['code'];
                    $status = 'Processing';
                }
                $this->M_Base->data_update('orders', [
                    'status' => $status,
                    'ket' => $ket,
                ], $order['id']);
            } else if (in_array($result['code'], ['TID_NOT_FOUND', 'BAD_REQUEST', ''])) {
                $find_sku = $this->M_Base->data_where('product', 'id', $order['product_id']);
				$sku = count($find_sku) == 1 ? $find_sku[0]['sku'] : '-';

                            $trx = $order['order_id'];
							$ket = $result['code'];
							
				$this->processOrder('LG', $sku, $order['user_id'], $order['zone_id'], $order['order_id'], '', '', $status, $ket, $trx);

	$log_file_name = 'log_reorder_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $trx.$ket . "\n"); // Include time in the log message
fclose($file);

				$this->M_Base->data_update('orders', [
					'status' => 'Processing',
					'ket' => $result['code'],
					'trx_id' => $trx,
				], $order['id']);
				
            } else {
                $ket = $result['code'];
                $status = 'Processing';

                $this->M_Base->data_update('orders', [
                    'status' => $status,
                    'ket' => $ket,
                ], $order['id']);
            }

            // $this->M_Base->data_update('orders', [
            //     'status' => $status,
            //     'ket' => $ket,
            // ], $order['id']);

            curl_multi_remove_handle($multiCurl, $curl);
            curl_close($curl);
        }

        curl_multi_close($multiCurl);

        // Pause for 10 seconds before processing the next chunk of orders (rate limiting: 200 hits/10 seconds)
        sleep(10);
    }
}

	
	public function statuslgbaru()
{
    $orders2 = $this->M_Base->data_where_array('orders', [
        'status' => 'Processing',
        'provider' => 'LG',
    ]);

    // Split the $orders2 array into chunks of 100 data each
    $orderChunks = array_chunk($orders2, 100);

    foreach ($orderChunks as $orderChunk) {
        $multiCurl = curl_multi_init();
        $handles = array();

        foreach ($orderChunk as $order) {
            $curl = curl_init();

            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => 'https://www.lapakgaming.com/api/order_status?tid=' . $order['trx_id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api'),
                    ),
                )
            );

            curl_multi_add_handle($multiCurl, $curl);
            $handles[] = $curl;
        }

        do {
            curl_multi_exec($multiCurl, $running);
        } while ($running);

        foreach ($handles as $index => $curl) {
            $result = curl_multi_getcontent($curl);
            $order = $orderChunk[$index];

            // Error handling for the curl request
            if ($result === false) {
                $this->handleCurlError($order['order_id']);
                continue;
            }

            $result = json_decode($result, true);
            $response = json_encode($result);

            // Error handling for the API response
            if (!isset($result['code'])) {
                $this->handleApiResponseError($order['order_id']);
                continue;
            }

            // Process the API response and update order status
            $status = 'Processing';
            $ket = $result['code'];

            if ($result['code'] == 'SUCCESS' && isset($result['data']['status'])) {
                $note = $result['data']['transactions'][0]['note'];
                if (strpos($note, 'Sukses Terkirim') !== false) {
                    $status = 'Success';
                    if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
                }

                $ket = $result['data']['transactions'][0]['voucher_code'] !== '' ? $result['data']['transactions'][0]['voucher_code'] : $result['data']['transactions'][0]['note'];
            }

            $this->M_Base->data_update('orders', [
                'status' => $status,
                'ket' => $ket,
            ], $order['id']);

            curl_multi_remove_handle($multiCurl, $curl);
            curl_close($curl);
        }

        curl_multi_close($multiCurl);

        // Pause for 10 seconds before processing the next chunk of orders (rate limiting: 200 hits/10 seconds)
        sleep(10);
    }
}

private function handleCurlError($orderId) {
    // Handle the error when curl request fails for an order
    // You can log the error or take appropriate actions.
    // For example: $this->M_Base->data_update('orders', ['status' => 'Error'], $orderId);
    
    	$log_file_name = 'handleCurlError_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $orderId . "\n"); // Include time in the log message
fclose($file);

}

private function handleApiResponseError($orderId) {
    // Handle the error when the API response is not as expected
    // You can log the error or take appropriate actions.
    // For example: $this->M_Base->data_update('orders', ['status' => 'Error'], $orderId);
    $log_file_name = 'handleApiResponseError_lapak_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . $orderId . "\n"); // Include time in the log message
fclose($file);
}




	public function cbxendit($action = null)
	{
		if ($action === 'qriswallet') {
			$xenditXCallbackToken = $this->M_Base->u_get('xendit_token');



			$reqHeaders = getallheaders();
			$xIncomingCallbackTokenHeader = isset($reqHeaders['X-CALLBACK-TOKEN']) ? $reqHeaders['X-CALLBACK-TOKEN'] : "";

			if ($xIncomingCallbackTokenHeader === $xenditXCallbackToken) {
				$json = file_get_contents('php://input');
				$data = json_decode($json, true);

				if ($data) {
					if (is_array($data)) {
						$id = $data['data']['reference_id'];
						$orders = $this->M_Base->data_where_array('orders', [
							'order_id' => $id,
							'status' => 'Pending'
						]);

						if ($data['data']['status'] === 'SUCCEEDED') {

							if (count($orders) === 1) {

								$status = 'Processing';

								echo json_encode([
									'success' => true,
									'message' => 'Pembayaran QR/E-Wallet Berhasil diterima Sistem Website -Hanz',
								]);


								$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
								$trx = $id;

								if (count($product) === 1) {

									switch ($orders[0]['provider']) {
										case 'DF':
										case 'LG':
										case 'BJ':
										case 'TV':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
											break;
										case 'VG':
										
										case 'BM':
										case 'PBM':
										case 'AG':
										case 'Manual':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
											break;
										default:
											$ket = 'Provider tidak ditemukan';
									}


								} else {
									$ket = 'Produk tidak ditemukan';
								}

								$this->M_Base->data_update('orders', [
									'status' => $status,
									'ket' => $ket,
									'trx_id' => $trx,
								], $orders[0]['id']);


							} else {
								$topup = $this->M_Base->data_where_array('topup', [
									'topup_id' => $id,
									'status' => 'Pending',
								]);

								if (count($topup) === 1) {
									$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

									if (count($users) === 1) {
										if ($topup[0]['payment_gateway'] == 'Xendit') {
											if (in_array($topup[0]['payment_type'], array('QRIS'))) {
												$topupx = ($topup[0]['amount'] / 1.007);
											} else if (in_array($topup[0]['payment_type'], array('Virtual Account'))) {
												$topupx = ($topup[0]['amount'] - 5000);
											} else if (in_array($topup[0]['payment_type'], array('E-Wallet'))) {
												$topupx = ($topup[0]['amount'] / 1.015);
											} else if (in_array($topup[0]['payment_type'], array('Convenience Store'))) {
												$topupx = ($topup[0]['amount'] - 6000);
											} else {
												$topupx = ($topup[0]['amount']);
											}

											$this->M_Base->data_update('users', [
												'balance' => $users[0]['balance'] + $topupx,
											], $users[0]['id']);

										} else {
											$this->M_Base->data_update('users', [
												'balance' => $users[0]['balance'] + $topup[0]['amount'],
											], $users[0]['id']);
										}

										$this->M_Base->data_update('topup', [
											'status' => 'Success',
										], $topup[0]['id']);

										echo json_encode([
											'success' => true,
											'msg' => 'Berhasil {TOPUP}',
										]);
									} else {
										echo json_encode([
											'success' => false,
											'msg' => 'Pengguna tidak ditemukan',
										]);
									}
								} else {
									echo json_encode([
										'success' => false,
										'message' => 'Pembayaran belum diterima Sistem',
									]);
								}
							}


						} else if ($data['status'] === 'ACTIVE') {
							echo json_encode([
								'success' => false,
								'message' => 'Kode Pembayaran VA/Retail berhasil dibuat -Hanz',
							]);
						} else {

							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran QR/E-Wallet tidak Berhasil',
							]);
						}

					} else {
						throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
					}
				} else {
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}


			} else {
				// Request is not from xendit, reject and throw http status forbidden
				http_response_code(403);
			}
		} else if ($action === 'varetail') {
			$xenditXCallbackToken = $this->M_Base->u_get('xendit_token');

			$json = file_get_contents('php://input');

			$reqHeaders = getallheaders();
			$xIncomingCallbackTokenHeader = isset($reqHeaders['X-CALLBACK-TOKEN']) ? $reqHeaders['X-CALLBACK-TOKEN'] : "";

			if ($xIncomingCallbackTokenHeader === $xenditXCallbackToken) {
				$data = json_decode($json, true);

				if ($data) {
					if (is_array($data)) {
						$id = $data['external_id'];
						$orders = $this->M_Base->data_where_array('orders', [
							'order_id' => $id,
							'status' => 'Pending'
						]);

						if (!empty($data['payment_id'])) {

							if (count($orders) === 1) {

								$status = 'Processing';

								echo json_encode([
									'success' => true,
									'message' => 'Pembayaran VA Berhasil diterima Sistem Website -Hanz',
								]);


								$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
								$trx = $id;

								if (count($product) === 1) {

									switch ($orders[0]['provider']) {
										case 'DF':
										case 'LG':
										case 'BJ':
										case 'TV':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
											break;
										case 'VG':
										
										case 'BM':
										case 'PBM':
										case 'AG':
										case 'Manual':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
											break;
										default:
											$ket = 'Provider tidak ditemukan';
									}

								} else {
									$ket = 'Produk tidak ditemukan';
								}

								$this->M_Base->data_update('orders', [
									'status' => $status,
									'ket' => $ket,
									'trx_id' => $trx,
								], $orders[0]['id']);


							} else {
								$topup = $this->M_Base->data_where_array('topup', [
									'topup_id' => $id,
									'status' => 'Pending',
								]);

								if (count($topup) === 1) {
									$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

									if (count($users) === 1) {
										$this->M_Base->data_update('users', [
											'balance' => $users[0]['balance'] + $topup[0]['amount'],
										], $users[0]['id']);

										$this->M_Base->data_update('topup', [
											'status' => 'Success',
										], $topup[0]['id']);

										echo json_encode([
											'success' => true,
											'msg' => 'Berhasil {TOPUP}',
										]);
									} else {
										echo json_encode([
											'success' => false,
											'msg' => 'Pengguna tidak ditemukan',
										]);
									}
								} else {
									echo json_encode([
										'success' => false,
										'message' => 'Pembayaran belum diterima Sistem',
									]);
								}
							}


						} else if ($data['status'] === 'ACTIVE') {
							echo json_encode([
								'success' => false,
								'message' => 'Kode Pembayaran VA/Retail berhasil dibuat -Hanz',
							]);
						} else {

							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran VA/Retail tidak Berhasil',
							]);
						}

					} else {
						throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
					}
				} else {
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}


			} else {
				// Request is not from xendit, reject and throw http status forbidden
				http_response_code(403);
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function getbank()
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v2/bank&?page=1&per_page=1");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				"Location: /api/v2/bank",
				"Accept: application/json",
				"Authorization: Bearer " . $this->M_Base->u_get('cm_key')
			)
		);

		$response = curl_exec($ch);
		curl_close($ch);
		echo $response;

	}

	public function mutasijjjjj($bank = null)
	{

		if ($bank) {

			$secret = $this->M_Base->u_get('cm_key'); // ganti dengan secret yang diberikan oleh Moota
			$payload_json = file_get_contents('php://input'); // mendapatkan data payload dari request
			$signature = hash_hmac('sha256', $payload_json, $secret); // menghitung signature dengan secret yang diberikan

			// mendapatkan signature yang dikirimkan oleh Moota dari header "X-Moota-Signature"
			$received_signature = $_SERVER['HTTP_SIGNATURE']; // mendapatkan signature yang dikirimkan oleh Moota dari header "Signature"

			// membandingkan signature yang dikirimkan oleh Moota dengan signature yang dihitung
			if ($signature === $received_signature) {

				$data = json_decode($payload_json, true);

				if (is_array($data)) {
					foreach ($data as $loop) {
						$data_mutasi = $this->M_Base->data_where_array('mutasi', [
							'status' => $loop['type'],
							'keterangan' => $loop['description'],
							'jumlah' => str_replace('.00', '', $loop['amount']),
							'saldo' => str_replace('.00', '', $loop['balance']),
							'bank' => $bank,
						]);

						echo $loop['amount'];

						if (count($data_mutasi) == 0) {
							$this->M_Base->data_insert('mutasi', [
								'bank' => $bank,
								'keterangan' => $loop['description'],
								'status' => $loop['type'],
								'jumlah' => str_replace('.00', '', $loop['amount']),
								'saldo' => str_replace('.00', '', $loop['balance']),
								'date_create' => date('Y-m-d G:i:s'),
							]);
						}

						$orders = $this->M_Base->data_where_array('orders', [
							'price' => str_replace('.00', '', $loop['amount']),
							'status' => 'Pending'
						]);

						if (count($orders) === 1) {

							$status = 'Processing';

							$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
							$trx = $orders[0]['order_id'];

							if (count($product) === 1) {

								switch ($orders[0]['provider']) {
									case 'DF':
									case 'LG':
									case 'BJ':
									case 'TV':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
										break;
									case 'VG':
									
									case 'BM':
									case 'PBM':
									case 'AG':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
										break;
									case 'Manual':
										$status = 'Processing';
										$ket = 'Pesanan siap diproses';
										break;
									default:
										$ket = 'Provider tidak ditemukan';
								}

							} else {
								$ket = 'Produk tidak ditemukan';
							}

							$this->M_Base->data_update('orders', [
								'status' => $status,
								'ket' => $ket,
								'trx_id' => $trx,
							], $orders[0]['id']);

						} else {
							$topup = $this->M_Base->data_where_array('topup', [
								'amount' => str_replace('.00', '', $loop['amount']),
								'status' => 'Pending',
							]);

							if (count($topup) === 1) {
								$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

								if (count($users) === 1) {
									$this->M_Base->data_update('users', [
										'balance' => $users[0]['balance'] + $topup[0]['amount'],
									], $users[0]['id']);

									$this->M_Base->data_update('topup', [
										'status' => 'Success',
									], $topup[0]['id']);

									echo json_encode(['msg' => 'Berhasil {TOPUP}']);
								} else {
									echo json_encode(['msg' => 'Pengguna tidak ditemukan']);
								}
							} else {
								echo json_encode(['msg' => 'Transaksi tidak ditemukan']);
							}
						}
					}
				} else {
					echo $result['error_message'];
				}
			} else {
				// signature tidak valid, hentikan proses
				http_response_code(401); // Unauthorized
				die("Invalid signature");
			}


		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function mutasinewjjjj($bank = null)
	{

		if ($bank) {

			if ($bank === 'bca') {
				$cm_rek = $this->M_Base->u_get('cm_rek');
			} elseif ($bank === 'bri') {
				$cm_rek = $this->M_Base->u_get('cm_rek_bri');
			} elseif ($bank === 'bni') {
				$cm_rek = $this->M_Base->u_get('cm_rek_bni');
			} elseif ($bank === 'mandiri') {
				$cm_rek = $this->M_Base->u_get('cm_rek_mandiri');
			} else {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}


			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://app.moota.co/api/v2/mutation&&&&&&?type=CR&bank=aolk4VZQjJx&start_date=" . date('Y-m-d') . "&end_date=" . date('Y-m-d') . "&tag=&page=1&per_page=999");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);

			curl_setopt(
				$ch,
				CURLOPT_HTTPHEADER,
				array(
					"Location: /api/v2/mutation{?type}&{?bank}&{?tag}&{?start_date}&{?end_date}&{?page}&{?per_page}",
					"Accept: application/json",
					"Authorization: Bearer " . $this->M_Base->u_get('cm_key')
				)
			);

			$response = curl_exec($ch);
			curl_close($ch);

			echo $response;

			// if ($result['current_page'] == 1) {
			// 		foreach ($result['data'] as $loop) {
			// 			$data_mutasi = $this->M_Base->data_where_array('mutasi', [
			// 				'status' => 'CR',
			// 				'keterangan' => $loop['description'],
			// 				'saldo' => $loop['balance'],
			// 				'bank' => $bank,
			// 			]);

			// 			if (count($data_mutasi) == 0) {
			// 				$this->M_Base->data_insert('mutasi', [
			// 					'bank' => $bank,
			// 					'keterangan' => $loop['description'],
			// 					'status' => 'CR',
			// 					'jumlah' => str_replace('.00', '', $loop['amount']),
			// 					'saldo' => str_replace('.00', '', $loop['bank']['balance']),
			// 					'date_create' => date('Y-m-d G:i:s'),
			// 				]);
			// 			}

			// 			$orders = $this->M_Base->data_where_array('orders', [
			// 				'price' => str_replace('.00', '', $loop['amount']),
			// 				'status' => 'Pending'
			// 			]);

			// 			if (count($orders) === 1) {

			// 				$status = 'Processing';

			// 				$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
			// 				$trx = $id;

			// 				if (count($product) === 1) {

			// 					switch ($orders[0]['provider']) {
			// 						case 'DF':
			// 						case 'LG':
			// 						case 'BJ':
			// 						case 'TV':
			// 							$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '',$status, $ket, $trx);
			// 							break;
			// 						case 'VG':
			// 						
			// 						case 'BM':
			// 						case 'PBM':
			// 						case 'AG':
			// 							$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'],$status, $ket, $trx);
			// 							break;
			// 						case 'Manual':
			// 							$status = 'Processing';
			// 							$ket = 'Pesanan siap diproses';
			// 							break;
			// 						default:
			// 							$ket = 'Provider tidak ditemukan';
			// 					}

			// 				} else {
			// 					$ket = 'Produk tidak ditemukan';
			// 				}

			// 				$this->M_Base->data_update('orders', [
			// 					'status' => $status,
			// 					'ket' => $ket,
			// 					'trx_id' => $trx,
			// 				], $orders[0]['id']);

			// 			} else {
			// 				$topup = $this->M_Base->data_where_array('topup', [
			// 					'amount' => str_replace('.00', '', $loop['amount']),
			// 					'status' => 'Pending',
			// 				]);

			// 				if (count($topup) === 1) {
			// 					$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

			// 					if (count($users) === 1) {
			// 						$this->M_Base->data_update('users', [
			// 							'balance' => $users[0]['balance'] + $topup[0]['amount'],
			// 						], $users[0]['id']);

			// 						$this->M_Base->data_update('topup', [
			// 							'status' => 'Success',
			// 						], $topup[0]['id']);

			// 						echo json_encode(['msg' => 'Berhasil {TOPUP}']);
			// 					} else {
			// 						echo json_encode(['msg' => 'Pengguna tidak ditemukan']);
			// 					}
			// 				} else {
			// 					echo json_encode(['msg' => 'Transaksi tidak ditemukan']);
			// 				}
			// 			}
			// 		}
			// } else {
			// 	echo $result['error_message'];
			// }

		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	
	public function expiredorder(){
	    $oneday = date('Y-m-d H:i:s', strtotime('-2 days'));
	   //   $twoWeeksAgo = date('Y-m-d H:i:s', strtotime('-3 days'));
	      $oneWeeksAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
    
        $orders = $this->M_Base->data_where_array('orders', [
            'status' => 'Processing',
            'date_create <' => $oneWeeksAgo,
        ]);
    
        foreach ($orders as $order) {
            $this->M_Base->data_update('orders', ['status' => 'Expired', 'payment_code' => ''], $order['id']);
        }
        
        $orders2 = $this->M_Base->data_where_array('orders', [
            'status' => 'Pending',
            'date_create <' => $oneday,
        ]);
    
        foreach ($orders2 as $order) {
            $this->M_Base->data_update('orders', ['status' => 'Expired', 'payment_code' => ''], $order['id']);
        }
        
        $topup2 = $this->M_Base->data_where_array('topup', [
            'status' => 'Pending',
            'date_create <' => $oneday,
        ]);
    
        foreach ($topup2 as $topup) {
            $this->M_Base->data_update('orders', ['status' => 'Expired', 'payment_code' => ''], $topup['id']);
        }
	}

	public function callback($action = null)
	{
		if ($action === 'tripay71239123023') {

			$json = file_get_contents('php://input');

			$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

			if ($callbackSignature !== hash_hmac('sha256', $json, $this->M_Base->u_get('tripay-private'))) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else if ('payment_status' !== $_SERVER['HTTP_X_CALLBACK_EVENT']) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {

				$data = json_decode($json, true);

				if ($data) {
					if (is_array($data)) {
						$id = $data['merchant_ref'];

						if ($data['status'] === 'PAID') {
							$orders = $this->M_Base->data_where_array('orders', [
								'order_id' => $id,
								'status' => 'Pending'
							]);

							if (count($orders) === 1) {

								$status = 'Processing';

								echo json_encode([
									'success' => true,
									'message' => 'Pembayaran Berhasil diterima Sistem Website',
								]);

								$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
								$trx = $id;

								if (count($product) === 1) {

									switch ($orders[0]['provider']) {
										case 'DF':
										case 'LG':
										case 'BJ':
										case 'TV':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
											break;
										case 'VG':
										
										case 'BM':
										case 'PBM':
										case 'AG':
										case 'Manual':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
											break;
										default:
											$ket = 'Provider tidak ditemukan';
									}

								} else {
									$ket = 'Produk tidak ditemukan';
								}

								$this->M_Base->data_update('orders', [
									'status' => $status,
									'ket' => $ket,
									'trx_id' => $trx,
								], $orders[0]['id']);

							} else {
								$topup = $this->M_Base->data_where_array('topup', [
									'topup_id' => $id,
									'status' => 'Pending',
								]);

								if (count($topup) === 1) {
									$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

									if (count($users) === 1) {
										$this->M_Base->data_update('users', [
											'balance' => $users[0]['balance'] + $topup[0]['amount'],
										], $users[0]['id']);

										$this->M_Base->data_update('topup', [
											'status' => 'Success',
										], $topup[0]['id']);

										echo json_encode([
											'success' => true,
											'msg' => 'Berhasil {TOPUP}',
										]);
									} else {
										echo json_encode([
											'success' => false,
											'msg' => 'Pengguna tidak ditemukan',
										]);
									}
								} else {
									echo json_encode([
										'success' => false,
										'message' => 'Pembayaran belum diterima Sistem',
									]);
								}
							}
						} else if ($data['status'] === 'EXPIRED') {

							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran Expired',
							]);

							$orders = $this->M_Base->data_where_array('orders', [
								'order_id' => $id,
								'status' => 'Expired'
							]);

							$this->M_Base->data_update('topup', [
								'status' => 'Expired',
							], $topup[0]['id']);

						} else {
							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran belum diterima Sistem',
							]);
						}
					} else {
						throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
					}
				} else {
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}
			}
		} else if ($action === 'duitku281230asj2130123') {

			$apiKey = $this->M_Base->u_get('duitku-key'); // API key anda
			$merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : '';
			$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
			$merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : '';
			$productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : '';
			$additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : '';
			$paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : '';
			$resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : '';
			$merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : '';
			$reference = isset($_POST['reference']) ? $_POST['reference'] : '';
			$signature = isset($_POST['signature']) ? $_POST['signature'] : '';

			if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
			$ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
			} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
			}

			$log_file_name = 'log_duitku_incoming_callback' . date("j.n.Y") . '.txt'; // Include time in the log file name
			$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
			fwrite($file, date('Y-m-d H:i:s.v') . ' ' . $ip_address.' | '.$merchantOrderId .' | '.$resultCode . "\n"); // Include time in the log message
			fclose($file);


			if ($resultCode == 00) {
				$id = $merchantOrderId;
				$orders = $this->M_Base->data_where_array('orders', [
					'order_id' => $id,
					'status' => 'Pending'
				]);

				if (count($orders) === 1) {

					$params = $this->M_Base->u_get('duitku-merchant') . $orders[0]['price'] . $orders[0]['order_id'] . $apiKey;
					$calcSignature = md5($params);
				} else {

					$topup = $this->M_Base->data_where_array('topup', [
						'topup_id' => $id,
						'status' => 'Pending',
					]);

					$params = $this->M_Base->u_get('duitku-merchant') . $topup[0]['amount'] . $topup[0]['topup_id'] . $apiKey;
					$calcSignature = md5($params);
				}

				if ($signature == $calcSignature) {

					if (count($orders) === 1) {

						$status = 'Processing';
						
							echo json_encode([
								'response' => 'OK',
							]);
							
							$this->M_Base->data_update('orders', [
    							'status' => $status,
    						], $orders[0]['id']);
							
							$log_file_name = 'log_duitku_incoming_callback' . date("j.n.Y") . '.txt'; // Include time in the log file name
			$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
			fwrite($file, date('Y-m-d H:i:s.v') . ' ' . $ip_address.' | '.$merchantOrderId .' | '.$resultCode. ' Response OK' .  "\n"); // Include time in the log message

			fclose($file);
			
						$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
						$trx = $id;

						if (count($product) === 1) {

							switch ($orders[0]['provider']) {
								case 'DF':
								case 'LG':
								case 'BJ':
								case 'TV':
									$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
									break;
								case 'VG':
								case 'BM':
								case 'PBM':
								case 'AG':
								case 'Manual':
									$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
									break;
								default:
									$ket = 'Provider tidak ditemukan';
							}

						} else {
							$ket = 'Produk tidak ditemukan';
						}

						$this->M_Base->data_update('orders', [
							'status' => $status,
							'ket' => $ket,
							'trx_id' => $trx,
						], $orders[0]['id']);
					} else {
						$topup = $this->M_Base->data_where_array('topup', [
							'topup_id' => $id,
							'status' => 'Pending',
						]);

						if (count($topup) === 1) {
							$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);
							
							$log_file_name = 'log_duitku_incoming_callback' . date("j.n.Y") . '.txt'; // Include time in the log file name
			$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
			fwrite($file, date('Y-m-d H:i:s.v') . ' ' . $ip_address.' | '.$merchantOrderId .' | '.$resultCode. ' Depo OK' .  "\n"); // Include time in the log message

			fclose($file);

							if (count($users) === 1) {
								if ($topup[0]['payment_gateway'] == 'Duitku') {
									if (in_array($topup[0]['method_code'], array('SP', 'NQ'))) {
										$topupx = ($topup[0]['amount'] / 1.007);
									} else if ($topup[0]['method_code'] == 'LQ') {
										$topupx = ($topup[0]['amount'] / 1.0078);
									} else {
										$topupx = ($topup[0]['amount']);
									}

									$this->M_Base->data_update('users', [
										'balance' => $users[0]['balance'] + $topupx,
									], $users[0]['id']);

								} else {
									$this->M_Base->data_update('users', [
										'balance' => $users[0]['balance'] + $topup[0]['amount'],
									], $users[0]['id']);
								}

								$this->M_Base->data_update('topup', [
									'status' => 'Success',
								], $topup[0]['id']);

								echo json_encode([
									'success' => true,
									'msg' => 'Berhasil {TOPUP}',
								]);
							} else {
								echo json_encode([
									'success' => false,
									'msg' => 'Pengguna tidak ditemukan',
								]);
							}
						} else {
							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran belum diterima Sistem',
							]);
						}
					}

				} else {
					// file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}

			}

		} else if ($action === 'linkiquuu') {  
            
            $callback_data = json_decode(file_get_contents('php://input'), true);
            
            $client_id = isset($_SERVER['HTTP_CLIENT_ID']) ? $_SERVER['HTTP_CLIENT_ID'] : null;
            $client_secret =isset($_SERVER['HTTP_CLIENT_SECRET']) ? $_SERVER['HTTP_CLIENT_SECRET'] : '';
            $id_linkqu =  $this->M_Base->u_get('id_linkqu'); 
            $secret_linkqu =  $this->M_Base->u_get('secret_linkqu');
            $username_linkqu =  $this->M_Base->u_get('username_linkqu'); 
            
            $partner_reff = $callback_data['partner_reff'];
            $status = $callback_data['status'];
            $username = $callback_data['username'];
            
            if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
              $ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } else {
              $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            
            $log_file_name = 'log_linkqu_incoming_callback' . date("j.n.Y") . '.txt'; // Include time in the log file name
			$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
			fwrite($file, date('Y-m-d H:i:s') . ' ' . $ip_address.json_encode($callback_data) . "\n"); // Include time in the log message
			fclose($file);
            
            $allowed_ips = array('34.101.73.158');
            
            if (in_array($ip_address, $allowed_ips)) {
                if ($username == $username_linkqu){

                if ($status == 'SUCCESS') {
					$id = $partner_reff;
					$orders = $this->M_Base->data_where_array('orders', [
						'order_id' => $id,
						'status' => 'Pending'
					]);

						
						if (count($orders) === 1) {

						$status = 'Processing';
							$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
							$trx = $id;
							
							echo json_encode([
								'response' => 'OK',
							]);
							
							$this->M_Base->data_update('orders', [
    							'status' => $status,
    						], $orders[0]['id']);
							
							$log_file_name = 'log_linkqu_incoming_callback' . date("j.n.Y") . '.txt'; // Include time in the log file name
			$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
			fwrite($file, date('Y-m-d H:i:s.v') . ' ' . $id.' Response OK' . "\n"); // Include time in the log message
			fclose($file);

							if (count($product) === 1) {

								switch ($orders[0]['provider']) {
									case 'DF':
									case 'LG':
									case 'BJ':
									case 'TV':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
										break;
									case 'VG':
									case 'BM':
									case 'PBM':
									case 'AG':
									case 'Manual':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
										break;
									default:
										$ket = 'Provider tidak ditemukan';
								}
	
							} else {
								$ket = 'Produk tidak ditemukan';
							}

							$this->M_Base->data_update('orders', [
								'status' => $status,
								'ket' => $ket,
								'trx_id' => $trx,
								'payment_code' => ''
							], $orders[0]['id']);
						} else {
							$topup = $this->M_Base->data_where_array('topup', [
								'topup_id' => $id,
								'status' => 'Pending',
							]);
					
					$membership = $this->M_Base->data_where_array('membership', [
								'topup_id' => $id,
								'status' => 'Pending',
							]);

							if (count($topup) === 1) {
							$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

							if (count($users) === 1) {

							    $topupx = ($topup[0]['amount'] - $topup[0]['fee']) ; 
							    
								   $this->M_Base->data_update('users', [
								   'balance' => $users[0]['balance'] + $topupx,
							   ], $users[0]['id']);
							   

								$this->M_Base->data_update('topup', [
									'status' => 'Success',
								], $topup[0]['id']);

								echo json_encode([
									'success' => true,
									'msg' => 'Berhasil {TOPUP}',
								]);
							} else {
								echo json_encode([
									'success' => false,
									'msg' => 'Pengguna tidak ditemukan',
								]);
							}
						} else if (count($membership) === 1) { 
						    $users = $this->M_Base->data_where('users', 'username', $membership[0]['username']);

							if (count($users) === 1) {


								$this->M_Base->data_update('membership', [
									'status' => 'Success',
								], $membership[0]['id']);
                                
                                $this->M_Base->data_update('users', [
									'level' => $membership[0]['level'],
								], $users[0]['id']);

								echo json_encode([
									'success' => true,
									'msg' => 'Berhasil {membership}',
								]);
							} else {
								echo json_encode([
									'success' => false,
									'msg' => 'Pengguna tidak ditemukan',
								]);
							}
							
						} 
						}
			
                    
                } else {
					echo json_encode([
									'success' => false,
									'message' => 'Pembayaran belum diterima Sistem',
								]);
			    }
    		}
            } else {
        		echo json_encode([
									'success' => false,
									'message' => 'IP tidak sesuai',
								]);
        	}
    	} else if ($action === 'Tokopay82927282927491563') {

			$apiKey = $this->M_Base->u_get('tokopay-secret-key'); // API key anda
			$merchantCode = $this->M_Base->u_get('tokopay-merchant');
			
			$callback_data = json_decode(file_get_contents('php://input'), true);
            
            $reff_id = $callback_data['reff_id'];
            $reference = $callback_data['reference'];
            $signature = $callback_data['signature'];
            $status = $callback_data['status'];
            
			
			if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
              $ip_address = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } else {
              $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            
            $log_file_name = 'log_IP_tokopay_' . date("j.n.Y") . '.txt'; // Include time in the log file name
            $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
            fwrite($file, date('Y-m-d H:i:s') . ' ' . $ip_address.'|'.$status.'|'.$reff_id.'|'.$reference . "\n"); // Include time in the log message
            fclose($file);
            
            $allowed_ips = array('178.128.104.179');
            
            if (in_array($ip_address, $allowed_ips)) {


			if ($status == 'Success' OR $status == 'Completed') {
				$id = $reff_id;
				$orders = $this->M_Base->data_where_array('orders', [
					'order_id' => $id,
					'status' => 'Pending'
				]);
				
				$topup = $this->M_Base->data_where_array('topup', [
						'topup_id' => $id,
						'status' => 'Pending',
					]);
					
				$membership = $this->M_Base->data_where_array('membership', [
						'topup_id' => $id,
						'status' => 'Pending',
					]);

				if (count($orders) === 1) {

					$params = $merchantCode . ':' . $apiKey . ':' . $orders[0]['order_id'];
					$calcSignature = md5($params);
				} else if (count($topup) === 1) {
					$params = $merchantCode . ':' . $apiKey . ':' . $topup[0]['topup_id'];
					$calcSignature = md5($params);
				} else if (count($membership) === 1) {
				    $params = $merchantCode . ':' . $apiKey . ':' . $membership[0]['topup_id'];
					$calcSignature = md5($params);
				}

				if ($signature == $calcSignature) {
				    
				   

					if (count($orders) === 1) {
					  

						$status = 'Processing';
						
						$this->M_Base->data_update('orders', [
							'status' => $status,
						], $orders[0]['id']);
						
						$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
						$trx = $id;
						
							echo json_encode([
									'success' => true
								]);

							if (count($product) === 1) {

								switch ($orders[0]['provider']) {
									case 'DF':
									case 'LG':
									case 'BJ':
									case 'TV':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
										break;
									case 'VG':
									case 'BM':
									case 'PBM':
									case 'AG':
									case 'Manual':
										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
										break;
									default:
										$ket = 'Provider tidak ditemukan';
								}
	
							} else {
								$ket = 'Produk tidak ditemukan';
							}

						$this->M_Base->data_update('orders', [
							'status' => $status,
							'ket' => $ket,
							'trx_id' => $trx,
						], $orders[0]['id']);
					} else {

						if (count($topup) === 1) {
							$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

							if (count($users) === 1) {
								if ($topup[0]['payment_gateway'] == 'Tokopay') {
									if (in_array($topup[0]['method_code'], array('SP', 'NQ'))) {
										$topupx = ($topup[0]['amount'] / 1.007);
									} else if ($topup[0]['method_code'] == 'LQ') {
										$topupx = ($topup[0]['amount'] / 1.0078);
									} else {
										$topupx = ($topup[0]['amount']);
									}

									$this->M_Base->data_update('users', [
										'balance' => $users[0]['balance'] + $topupx,
									], $users[0]['id']);

								} else {
									$this->M_Base->data_update('users', [
										'balance' => $users[0]['balance'] + $topup[0]['amount'],
									], $users[0]['id']);
								}

								$this->M_Base->data_update('topup', [
									'status' => 'Success',
								], $topup[0]['id']);

								echo json_encode([
									'status' => true
								]);
							} else {
								echo json_encode([
									'success' => false,
									'msg' => 'Pengguna tidak ditemukan',
								]);
							}
						} else if (count($membership) === 1) { 
						    $users = $this->M_Base->data_where('users', 'username', $membership[0]['username']);

							if (count($users) === 1) {


								$this->M_Base->data_update('membership', [
									'status' => 'Success',
								], $membership[0]['id']);
                                
                                $this->M_Base->data_update('users', [
									'level' => $membership[0]['level'],
								], $users[0]['id']);

								echo json_encode([
									'success' => true,
									'msg' => 'Berhasil {membership}',
								]);
							} else {
								echo json_encode([
									'success' => false,
									'msg' => 'Pengguna tidak ditemukan',
								]);
							}
							
						} else {
							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran belum diterima Sistem',
							]);
						}
					}

				} else {
					// file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}

			}
            }

		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	private function processOrder($provider, $product, $userid, $zoneid, $orderid, $wacust, $method, &$status, &$ket, &$trx)
	{

		if (!empty($zoneid) and $zoneid != 1) {
			$customer_no = $userid . $zoneid;
		} else {
			$customer_no = $userid;
		}

		if ($provider == 'DF') {

			$result = $this->M_Base->df_order($product, $customer_no, $orderid);

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

		} else if ($provider == 'LG') {


			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->lg_order($product, $userid, $zoneid, $orderid);

			if ($result['code'] == 'SUCCESS') {
			    $ket = $result['code'];
					$trx = $result['data']['tid'];
				if (isset($result['data'])) {
					$ket = $result['code'];
					$trx = $result['data']['tid'];

				}
			} else {
				$ket = $result['code'];
				$trx = $result['data']['tid'];
			}

		} else if ($provider == 'BJ') {

			if (!empty($zoneid) and $zoneid != 1) {

				$resultjson = $this->M_Base->bj_order_1($product, $userid, $zoneid, $orderid);

			} else {

				$resultjson = $this->M_Base->bj_order_2($product, $userid, $orderid);
			}

			if ($resultjson) {
				if ($resultjson['success'] == 'true') {
					$status = 'Success';
					$ket = $resultjson['data']['invoice_number'];

					if (empty($ket) or $ket == 0) {
						$ket = 'Pesanan berhasil terkirim';
					}

				} else if ($resultjson['success'] == 'false') {
					$status = 'Pending';
					$ket = $resultjson['error'];
				} else {
					$ket = $result;
				}
			}

		} else if ($provider == 'VR') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->vr_order($product, $userid, $zoneid);

			if ($result) {
				if ($result['result'] == 'true') {
					$status = 'Success';
					$ket = $result['data']['note'];
					$trx = $result['data']['trxid'];

				} else if ($result['result'] == 'false') {
					$status = 'Pending';
					$ket = $result['message'];

				} else {
					$ket = $result;
				}
			}


		} else if ($provider == 'PVR') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->pvr_order($product, $userid);

			if ($result) {
				if ($result['result'] == 'true') {
					$status = 'Success';
					$ket = $result['data']['note'];
					$trx = $result['data']['trxid'];

				} else if ($result['result'] == 'false') {
					$status = 'Pending';
					$ket = $result['message'];

				} else {
					$ket = $result;
				}
			}


		} else if ($provider == 'BM') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->bm_order($product, $userid, $zoneid);

			if ($result) {
				if ($result['result'] == 'true') {
					$status = 'Success';
					$ket = $result['data']['note'];
					$trx = $result['data']['trxid'];

				} else if ($result['result'] == 'false') {
					$status = 'Pending';
					$ket = $result['message'];

				} else {
					$ket = $result;
				}
			}


		} else if ($provider == 'PBM') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->pbm_order($product, $userid);

			if ($result) {
				if ($result['result'] == 'true') {
					$status = 'Success';
					$ket = $result['data']['note'];
					$trx = $result['data']['trxid'];

				} else if ($result['result'] == 'false') {
					$status = 'Pending';
					$ket = $result['message'];

				} else {
					$ket = $result;
				}
			}


		} else if ($provider == 'AG') {

$result = $this->M_Base->ag_v2_order($product, $userid, $zoneid, $orderid);

			if ($result['status'] == 0) {
				$ket = $result['error_msg'];
			} else {

				if ($result['data']['status'] == 'Sukses') {
					$status = 'Success';
					if (!empty($order['email_order'])){
                    $this->M_Base->elasticmail_sender_success($order['email_order'], $order['product'], $order['order_id'], $order['method']);
                    }
				}

				$ket = $result['data']['sn'];
			}

		} else if ($provider == 'TV') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

			$result = $this->M_Base->tv_order($product, $userid, $zoneid, $orderid);

			if (isset($result)) {
				if ($result['status'] = 0) {
					$ket = $result['error_msg'];
				} else {
					$ket = $result['sn'];
					if ($result['status'] = 'sukses') {
						$status = 'Success';
						$ket = $result['sn'];
					}

				}
			} else {
				$ket = 'Failed Order';
			}


		} else if ($provider == 'Manual') {
			$status = 'Processing';
			$ket = 'Pesanan siap diproses';

		} else if ($provider == 'VG') {

			if (!empty($zoneid) and $zoneid != 1) {
				$zoneid = $zoneid;
			} else {
				$zoneid = '';
			}

            $productid = $this->M_Base->data_where_array('product', [
                            'sku' => $product,
                            'provider' => 'VG',
                        ]);			
			
			$result = $this->M_Base->voca_order($productid[0]['product_id'], $product, $userid, $zoneid, $orderid, $productid[0]['raw_price']);
		

             if (isset($result['error'])) {
                $ket = $result['error'].', '. $result['message'];
                 $trx = $orderid;

            } else {
               
                 
                 $status = 'Processing';
                    $ket = $result['message'];
                    $trx = $result['data']['invoiceId'];
            }
             if (empty($ket) OR $ket == null) {
                                                $ket = "SIAP PROSES";
                                            }


    		} else {
    			$ket = 'Provider tidak ditemukan';
    		}
        }
        
    public function gamesvocadata()
	{
    	$merchantId = $this->M_Base->u_get('voca_merchantid');
        $secretKey = $this->M_Base->u_get('voca_secretkey');
        $endpoint = "/products";
        $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bisnis.vocagame.com/v1/core/products?signature=' . $signature . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
    				'X-Merchant: ' . $merchantId . ''
    			),
        ));
        
        $result = curl_exec($curl);
        // echo $result;
        $result = json_decode($result, true);
        
    
        $table = '<table>';
        $table .= '<thead style="text-align:left"><tr><th>ID</th><th>Kode Games</th><th>Nama Games</th><th>Tipe Games</th></tr></thead>';
        $table .= '<tbody>';
        foreach ($result['data'] as $game) {
            $id = htmlspecialchars($game['id']);
            $code = htmlspecialchars($game['code']);
            $name = htmlspecialchars($game['title']);
            $variant = htmlspecialchars($game['type']);
    
            $table .= '<tr><td>' . $id . '</td><td>' . $code . '</td><td>' . $name . '</td><td>' . $variant . '</td></tr>';
        }
        $table .= '</tbody>';
        $table .= '</table>';
    
        echo $table;

	}
	
	public function gamesvocanew()
	{

    	$merchantId = $this->M_Base->u_get('voca_merchantid');
        $secretKey = $this->M_Base->u_get('voca_secretkey');
        $endpoint = "/products";
        $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-bisnis.vocagame.com/v1/core/products?signature=' . $signature . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
    				'X-Merchant: ' . $merchantId . ''
    			),
        ));
    
    	$result = curl_exec($curl);
    	$result = json_decode($result, true);
    	
		if (count($result['data']) > 1) {
			foreach ($result['data'] as $loop) {

				$games = $this->M_Base->data_where('games', 'code', $loop['id']);

				if (count($games) === 1) {

					$this->M_Base->data_update('games', [
						'slug' => url_title('' . $loop['title'] . '-gamex', '-', true),
						'code' => $loop['id'],
						'provider' => 'VG',
					], $games[0]['id']);

					echo $loop['title'] . ' data_update Success <br>';

				} else if (count($games) === 0) {

					$this->M_Base->data_insert('games', [
						'games' => $loop['title'],
						'code' => $loop['id'],
						'slug' => url_title('' . $loop['title'] . '-gamex', '-', true),
						'status' => 'Off',
						'category' => 'Voca New',
						'target' => 'default',
						'provider' => 'VG',
						'image' => '' . url_title($loop['title'], '-', true) . '.jpg',
						'check_status' => 'N',
					]);

					echo $loop['title'] . ' data_insert Success <br>';
				}
			}
		}


	}
	
	public function tesproductvoca()
	{
	    
	$merchantId = $this->M_Base->u_get('voca_merchantid');
    $secretKey = $this->M_Base->u_get('voca_secretkey');
    $productId = 2;
    $endpoint = "/products/$productId/items";
    $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);

	$curl = curl_init();

	curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-bisnis.vocagame.com/v1/core/products/'. $productId .'/items?signature=' . $signature . '',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
				'X-Merchant: ' . $merchantId . ''
			),
    ));

		$result = curl_exec($curl);
		echo ($result);
		$result = json_decode($result, true);

	}
	
	public function productvoca()
	{

		$merchantId = $this->M_Base->u_get('voca_merchantid');
        $secretKey = $this->M_Base->u_get('voca_secretkey');

        $publik = $this->M_Base->u_get('margin_voca_publik');
		$silver = $this->M_Base->u_get('margin_voca_silver');
		$gold = $this->M_Base->u_get('margin_voca_gold');
		$platinum = $this->M_Base->u_get('margin_voca_platinum');

		$games = $this->M_Base->data_where('games', 'provider', 'VG');

		$curl_options = [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS => '',
			CURLOPT_HTTPHEADER => ['X-Merchant: ' . $merchantId],
		];

		$multi_curl = curl_multi_init();
		$curls = [];

		$chunks = array_chunk($games, 20);
		foreach ($chunks as $chunk) {
			$multi_curl = curl_multi_init();
			$curls = [];
			foreach ($chunk as $game) {
			    
			    $endpoint = "/products/" . $game['code'] . "/items";
                $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);
        
				$curl = curl_init();
				$curl_options[CURLOPT_URL] = 'https://api-bisnis.vocagame.com/v1/core/products/'. $game['code'] .'/items?signature=' . $signature . '';
				curl_setopt_array($curl, $curl_options);
				curl_multi_add_handle($multi_curl, $curl);
				$curls[] = $curl;
			}

			$active = null;
			do {
				$status = curl_multi_exec($multi_curl, $active);
				curl_multi_select($multi_curl);
			} while ($status === CURLM_CALL_MULTI_PERFORM || $active);

			foreach ($curls as $index => $curl) {
				$result = curl_multi_getcontent($curl);
				// echo $result;
				$result = json_decode($result, true);
				curl_multi_remove_handle($multi_curl, $curl);

				$game = $chunk[$index];

				if (is_array($result['data'])) {
					$availableProducts = array_filter($result['data'], function ($product) {
						return $product['isActive'] === true;
					});
					usort($availableProducts, [$this->M_Base, 'compareProductsVoca']);
				
					$emptyProducts = array_filter($result['data'], function ($product) {
						return $product['isActive'] === false;
					});
					$result['data'] = array_merge($availableProducts, $emptyProducts);
				} else {
					$result['data'] = [];
				}
				

				$counter = 1;

				foreach ($result['data'] as $loop) {

					$product = $this->M_Base->data_where_array('product', [
						'sku' => $loop['id'],
						'provider' => 'VG',
					]);
					
					$gamesx = $this->M_Base->data_where_array('games', [
						'code' => $game['code'],
						'provider' => 'VG',
					]);

				// 	$gamesx = $this->M_Base->data_where('games', 'code', $game['code']);
					
					

					$product_data = [
                        'product' => $loop['name'],
                        'raw_price' => $loop['price'],
                        'price' => ($loop['price'] / 100 * ($publik + 100)),
                        'price_silver' => ($loop['price'] / 100 * ($silver + 100)),
                        'price_gold' => ($loop['price'] / 100 * ($gold + 100)),
                        'price_platinum' => ($loop['price'] / 100 * ($platinum + 100)),
                        'sku' => $loop['id'],
                        'provider' => 'VG',
                        'status' => $loop['isActive'] === true ? 'On' : 'Off',
                        'sort' => $counter++,
                        'product_id' => $gamesx[0]['code'],
                    ];
                    
                    if (count($gamesx) === 1) {
                        if (count($product) === 1) {
                            if ($product[0]['check_status'] == 'Y') {
                                $this->M_Base->data_update('product', $product_data, $product[0]['id']);
                                echo $loop['name'] . ' LG data_update ' . $product_data['status'] . ' <br>';
                            } elseif ($product[0]['check_status'] == 'N') {
                                unset($product_data['price']);
                                $this->M_Base->data_update('product', $product_data, $product[0]['id']);
                                echo $loop['name'] . ' LG data_update ' . $product_data['status'] . ' (excluding price) <br>';
                            }
                        } elseif (count($product) === 0 && $product_data['status'] === 'On') {
                            $product_data['games_id'] = $gamesx[0]['id'];
                            $this->M_Base->data_insert('product', $product_data);
                            echo $loop['name'] . ' LG data_insert ON <br>';
                        }
                    }

				}
			}
			curl_multi_close($multi_curl);
		}
	}
	
	 public function callbackvoca()
	{


		$json = file_get_contents('php://input');
		
		 $log_file_name = 'log_callbackvoca_' . date("j.n.Y") . '.txt'; // Include time in the log file name
		$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
		fwrite($file, date('Y-m-d H:i:s') . ' ' . $json . "\n"); // Include time in the log message
		fclose($file);
    				
		$data = json_decode($json, true);
		if ($data) {
			if (is_array($data)) {
				$id = $data['reference'];

				$orders = $this->M_Base->data_where_array('orders', [
					'trx_id' => $id,
				]);

				if (count($orders) === 1) {


					if ($data['status'] == 'Success') {
						
						$status = 'Success';
						$ket = $data['sn'];
						
					} else if ($data['status'] == 'Processing') {
						$status = 'Processing';
						$ket = $data['sn'];
						
					} else if ($data['status'] == 'Refunded') {
						$status = 'Processing';
						$ket = 'Refunded '.$data['sn'];
						
					}


					$this->M_Base->data_update('orders', [
						'status' => $status,
						'ket' => $ket,
					], $orders[0]['id']);


				}

			}
		}
	}
	
	public function statusvoca()
	{
	    
	    $merchantId = $this->M_Base->u_get('voca_merchantid');
        $secretKey = $this->M_Base->u_get('voca_secretkey');
        
		foreach ($this->M_Base->data_where('orders', 'status', 'Processing') as $order) {
		    
		    $reference = $order['trx_id'];
            $endpoint = "/transaction/".$reference."/detail";

            $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);
            
            if (
                $order['status'] == 'Processing' &&
                $order['provider'] == 'VG' &&
                $order['trx_id'] !== $order['order_id'] &&
                $order['trx_id'] !== '' &&
                !empty($order['trx_id'])
            ) {


					$curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api-bisnis.vocagame.com/v1/core/transaction/' . $order['trx_id'] . '/detail?signature='.$signature.'',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                      CURLOPT_HTTPHEADER => array(
                        'X-Merchant: ' . $merchantId
                      ),
                    ));
                    

					$result = curl_exec($curl);
					$log_file = fopen(WRITEPATH . 'logs/log_CekStatusVoca' . date("j.n.Y") . '.txt', "a");
fwrite($log_file, $result);
fclose($log_file);
					$result = json_decode($result, true);

					if ($result['message'] == 'Success') {
						if ($result['data']['status'] == 'Success') {
							$status = 'Success';
							$ket = $result['data']['sn'];
							
							$this->M_Base->data_update('orders', [
    							'status' => $status,
    							'ket' => $ket,
    						], $order['id']);
							
						} else if ($result['data']['status'] == 'Refunded') {
							$status = 'Canceled';
							$ket = $result['data']['sn'];
						} else {
							$ket = $result['data']['sn'];
							$status = 'Processing';
						}
						$this->M_Base->data_update('orders', [
							'status' => $status,
							'ket' => $ket,
						], $order['id']);
					} else {

						$ket = $result['message'];
						$status = 'Processing';

						$this->M_Base->data_update('orders', [
							'status' => $status,
							'ket' => $ket,
						], $order['id']);

					}

				
			}

		}
	}
}