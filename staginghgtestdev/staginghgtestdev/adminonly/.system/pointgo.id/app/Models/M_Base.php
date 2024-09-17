<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Base extends Model
{
    
    public function data_update_atomic($table, $id, $incrementValue)
    {
        // Mengatur tingkat isolasi transaksi menjadi SERIALIZABLE
        $this->db->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    
        // Memulai transaksi
        $this->db->transStart();
    
        try {
            // Mengunci baris untuk memastikan tidak ada race condition
            $query = $this->db->query("SELECT balance FROM $table WHERE id = ? FOR UPDATE", [$id]);
            $result = $query->getRow();
    
            if ($result) {
                // Memastikan saldo mencukupi
                if ($result->balance >= -$incrementValue) {
                    // Melakukan operasi atomik untuk mengupdate saldo
                    $this->db->query("UPDATE $table SET balance = balance + ? WHERE id = ?", [$incrementValue, $id]);
    
                    // Menyelesaikan transaksi
                    $this->db->transComplete();
    
                    if ($this->db->transStatus() === FALSE) {
                        // Rollback transaksi jika terjadi kesalahan saat commit
                        $this->db->transRollback();
                        return false;
                    }
    
                    return true;
                } else {
                    // Rollback transaksi jika saldo tidak mencukupi
                    $this->db->transRollback();
                    return false;
                }
            } else {
                // Rollback transaksi jika data tidak ditemukan
                $this->db->transRollback();
                return false;
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $this->db->transRollback();
            return false;
        }
    }
    
	public function qontak_otp($phone, $otp) {
	    
	    $phone = preg_replace('/^0?8/', '628', $phone);

        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://service-chat.qontak.com/api/open/v1/broadcasts/whatsapp/direct",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode([
            'to_number' => $phone,
            'to_name' => 'Pointgo ' . $phone,
            'message_template_id' => 'eb3e1377-c6d4-4ece-83a9-8ce55e91831a',
            'channel_integration_id' => '1a08e79e-d7e2-4453-82fe-3c043e7ec757',
            'language' => [
                'code' => 'id'
            ],
            'parameters' => [
                'body' => [
                        [
                                        'key' => '1',
                                        'value' => ''.$otp.'',
                                        'value_text' => ''.$otp.''
                        ]
                ],
                'buttons' => [
                        [
                                        'index' => '0',
                                        'type' => 'url',
                                        'value' => ''.$otp.''
                        ]
                ]
            ]
          ]),
          CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ZJcHC5Tsw91EhRV3xukYcQedTxOx61l2GeY1iktTShs",
            "Content-Type: application/json"
          ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        $log_file_name = 'log_qontak_otp_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . ($response) . "\n"); // Include time in the log message
fclose($file);

            }


    public function getValueColumn2byValueColumn1($table, $levelColumn, $level, $priceColumn)
    {
        // Menggunakan builder query untuk menentukan tabel
        $query = $this->db->table($table)
                         ->where($levelColumn, $level)
                         ->get();
    
        // Memeriksa apakah ada hasil dari query
        if ($query->getNumRows() > 0) {
            // Mengambil hasil query dan mengembalikan harga
            $result = $query->getRow();
            return $result->$priceColumn;
        } else {
            // Mengembalikan nilai default jika tidak ada hasil
            return 0; // Ganti dengan nilai default yang sesuai
        }
    }
    
    public function get_paginated_data_OLD($table, $offset, $limit)
    {
        return $this->db->table($table)
            ->orderBy('id', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }

	public function random_string($length = 24)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

    public function compareProductsVoca($a, $b)
    {
    // Hanya membandingkan produk yang memiliki status "available"
    if ($a['isActive'] !== true || $b['isActive'] !== true) {
        return 0;
    }

    // Menentukan prioritas pengurutan berdasarkan nama produk
    $a_name = $a['name'];
    $b_name = $b['name'];

    // Menentukan prioritas urutan berdasarkan nama produk
    if (strpos($a_name, 'Twilight Pass') !== false) {
        return -1;
    }

    if (strpos($b_name, 'Twilight Pass') !== false) {
        return 1;
    }

    if (strpos($a_name, 'Weekly Diamond Pass') !== false && strpos($b_name, 'Weekly Diamond Pass') !== false) {
        // Mengambil harga/price produk
        $a_price = $a['price'];
        $b_price = $b['price'];

        if ($a_price == $b_price) {
            return 0;
        }

        return ($a_price < $b_price) ? -1 : 1;
    }

    if (strpos($a_name, 'Weekly Diamond Pass') !== false) {
        return -1;
    }

    if (strpos($b_name, 'Weekly Diamond Pass') !== false) {
        return 1;
    }

	if (strpos($a_name, 'Membership') !== false && strpos($b_name, 'Membership') !== false) {
        // Mengambil harga/price produk
        $a_price = $a['price'];
        $b_price = $b['price'];

        if ($a_price == $b_price) {
            return 0;
        }

        return ($a_price < $b_price) ? -1 : 1;
    }

    if (strpos($a_name, 'Membership') !== false) {
        return -1;
    }

    if (strpos($b_name, 'Membership') !== false) {
        return 1;
    }

    // Mengambil harga/price produk
    $a_price = $a['price'];
    $b_price = $b['price'];

    if ($a_price == $b_price) {
        return 0;
    }

    return ($a_price < $b_price) ? -1 : 1;
}

    public function voca_order($games, $product, $userid, $zoneid, $orderid, $price)
	{

	$merchantId = $this->u_get('voca_merchantid');
    $secretKey = $this->u_get('voca_secretkey');
    $reference = $orderid;
    $endpoint = "/transaction/".$reference;
    // $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);
    
    // Generate the HMAC-SHA256 signature
    $signature = hash_hmac('sha256', $merchantId . $endpoint, $secretKey);

    $callback =  base_url() . '/sistem/callbackvoca';
        
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api-bisnis.vocagame.com/v1/core/transaction?signature=' . $signature . '',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode(array(
        "productId" => $games,
        "productItemId" => $product,
        "data" => array(
            "userId" => $userid,
            "zoneId" => $zoneid
        ),
        "reference" => $reference,
        "callbackUrl" => $callback
    )),
			CURLOPT_HTTPHEADER => array(
			    'Content-Type: application/json',
				'X-Merchant: ' . $merchantId . ''
			),
		));
		
		$log_data = date('Y-m-d H:i:s') . " - Request\n" .
                "Body: {\n" .
                "\t\"productId\": \"".$games."\",\n" .
                "\t\"productItemId\": \"".$product."\",\n" .
                "\t\"data\": \"".$userid." . ".$zoneid."\",\n" .
                "\t\"price\": ".$price.",\n" .
                "\t\"reference\": \"".$reference."\",\n" .
                "\t\"callbackUrl\": \"".$callback."\"\n" .
                "}\n\n";
    
        // Menyimpan log request ke dalam file
        $log_file = fopen(WRITEPATH . 'logs/log_Request_voca' . date("j.n.Y") . '.txt', "a");
        fwrite($log_file, $log_data);
        fclose($log_file);


    
        $response = curl_exec($curl);
        curl_close($curl);
        
        // Menyimpan response ke dalam variabel
        $log_data = date('Y-m-d H:i:s') . " - Response\n" . $response . "\n\n";
        
        // Menyimpan log response ke dalam file
        $log_file = fopen(WRITEPATH . 'logs/log_Response_Voca' . date("j.n.Y") . '.txt', "a");
        fwrite($log_file, $log_data);
        fclose($log_file);
        
        $result = json_decode($response, true);
                             
            return $result;
	}

	public function getTopSalesProduct($start_date = null, $end_date = null, $limit = 20)
	{

		$where = "status = 'Success'";
		if ($start_date && $end_date) {
			$where .= " AND date BETWEEN '{$start_date}' AND '{$end_date}'";
		}

		$query = $this->db->query("
        SELECT 
            product_id, 
            product, 
            games_id, 
            price, 
            raw_price, 
            provider, 
            COUNT(*) as total_sales,
            SUM(price) as sales,
            SUM(raw_price) as modal
        FROM orders
        WHERE {$where}
        GROUP BY product_id
        ORDER BY total_sales DESC, product_id ASC
        LIMIT {$limit}
    ");

		$results = $query->getResult();

		// Convert each object to an array
		$data = array();
		foreach ($results as $row) {
			$data[] = (array) $row;
		}

		return $data;
	}

	public function getTopSalesGames($start_date = null, $end_date = null, $limit = 20)
	{
		$where = "o.status = 'Success'";
		if ($start_date && $end_date) {
			$where .= " AND o.date BETWEEN '{$start_date}' AND '{$end_date}'";
		}

		$query = $this->db->query("
        SELECT 
            g.id as games_id, 
            g.games as games, 
            COUNT(*) as total_sales, 
            SUM(o.price) as sales,
            SUM(o.raw_price) as modal
        FROM orders o
        JOIN product p ON o.product_id = p.id
        JOIN games g ON p.games_id = g.id
        WHERE {$where}
        GROUP BY g.id
        ORDER BY total_sales DESC, g.id ASC
        LIMIT {$limit}
    ");

		$results = $query->getResult();

		// Convert each object to an array
		$data = array();
		foreach ($results as $row) {
			$data[] = (array) $row;
		}

		return $data;
	}

	public function compareProductsDigi($a, $b)
	{
		preg_match('/\d+/', $a['product_name'], $a_matches);
		preg_match('/\d+/', $b['product_name'], $b_matches);
		$a_num = intval($a_matches[0]);
		$b_num = intval($b_matches[0]);

		if ($a_num == $b_num) {
			return 0;
		}
		return ($a_num < $b_num) ? -1 : 1;
	}


	public function priorityProduct($a, $b)
	{
		$priority = ['Mobile Legends', 'Free Fire']; // Array dengan urutan prioritas produk

		// Mendapatkan index produk a dan b dalam array priority
		$a_index = array_search($a['product'], $priority);
		$b_index = array_search($b['product'], $priority);

		// Jika produk a dan b ditemukan dalam array priority
		if ($a_index !== false && $b_index !== false) {
			// Mengurutkan berdasarkan urutan prioritas
			return $a_index - $b_index;
		}

		// Mengurutkan berdasarkan id produk secara default jika tidak ditemukan dalam array priority
		return $a['id'] - $b['id'];
	}

	public function compareProducts($a, $b)
	{
		preg_match('/\d+/', $a['name'], $a_matches);
		preg_match('/\d+/', $b['name'], $b_matches);
		$a_num = intval($a_matches[0]);
		$b_num = intval($b_matches[0]);

		if ($a_num == $b_num) {
			return 0;
		}
		return ($a_num < $b_num) ? -1 : 1;
	}


	// CRUD Table
	public function select_distinct($table, $field)
	{
		return $this->db->table($table)->select($field)->distinct()->orderBy($field, 'ASC')->get()->getResultArray();
	}
	public function all_data($table, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}

	public function data_where_2($table, $conditions)
	{
		return $this->db->table($table)->where($conditions)->get()->getResultArray();
	}

	public function all_data_random($table, $limit = null, $where = null)
	{
		if ($limit) {
			return $this->db->table($table)->where($where)->orderBy('id', 'RANDOM')->limit($limit)->get()->getResultArray();
			if ($where) {
				return $this->db->table($table)->orderBy('id', 'RANDOM')->limit($limit)->get()->getResultArray();
			}
		} else {
			return $this->db->table($table)->orderBy('id', 'RANDOM')->get()->getResultArray();
		}
	}

	public function join_table_2($primary_table, $secondary_table, $primary_key, $foreign_key, $select = '*', $where = null, $order_by = null)
	{
		$query = $this->db->table($primary_table);
		$query->select($select);
		$query->join($secondary_table, "{$primary_table}.{$primary_key} = {$secondary_table}.{$foreign_key}", 'left');

		if ($where) {
			$query->where($where);
		}
		if ($order_by) {
			$query->orderBy($order_by);
		}
		return $query->get()->getResultArray();
	}

	public function join_table_3($primary_table, $secondary_table, $tertiary_table, $primary_key, $secondary_key, $tertiary_key, $select = '*', $where = null, $order_by = null)
	{
		$builder = $this->db->table($primary_table);
		$builder->select($select);
		$builder->join($secondary_table, "{$secondary_table}.id = {$primary_table}.{$secondary_key}");
		$builder->join($tertiary_table, "{$tertiary_table}.id = {$primary_table}.{$tertiary_key}");
		if ($where) {
			$builder->where($where);
		}
		if ($order_by) {
			$builder->orderBy($order_by);
		}
		$query = $builder->get();
		return $query->getResultArray();
	}






	public function all_data_order($table, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}


	public function jumlah($table, $column, $where = null)
	{

		if ($where) {
			return $this->db->table($table)->where($where)->selectSum($column, 'sumQuantities')->get()->getRow()->sumQuantities;
		} else {
			return $this->db->table($table)->selectSum($column, 'sumQuantities')->get()->getRow()->sumQuantities;
		}

	}

	public function data_insert($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}
	public function data_where($table, $field, $value)
	{
		return $this->db->table($table)->where($field, $value)->get()->getResultArray();
	}
	public function data_where_array($table, $data, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->where($data)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->get()->getResultArray();
		}
	}

	public function data_where_array_limit($table, $data, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->where($data)->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}
	
	public function data_where_array_limit_asc($table, $data, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->where($data)->orderBy('id', 'ASC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->orderBy('id', 'ASC')->get()->getResultArray();
		}
	}


	public function data_update($table, $data, $id)
	{
		return $this->db->table($table)->set($data)->where('id', $id)->update();
	}
	public function data_delete($table, $id)
	{
		return $this->db->table($table)->delete(['id' => $id]);
	}
	public function data_like($table, $filed, $data)
	{
		return $this->db->table($table)->like($filed, $data)->orderBy('id', 'DESC')->get()->getResultArray();
	}
	public function data_truncate($table)
	{
		return $this->db->table($table)->truncate();
	}
	public function data_avg($table, $filed, $data, $distinct = false)
	{
		if ($distinct === true) {
			return $this->db->table($table)->select('date')->where($filed . ' >=', $data[0])->where($filed . ' <=', $data[1])->distinct()->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($filed . ' >=', $data[0])->where($filed . ' <=', $data[1])->get()->getResultArray();
		}
	}
	public function data_count($table, $where = null)
	{
		if ($where) {
			return $this->db->table($table)->where($where)->countAllResults();
		} else {
			return $this->db->table($table)->countAllResults();
		}
	}

	public function data_count_new($table, $where = null, $column = '*')
	{
		if ($where) {
			return $this->db->table($table)->where($where)->countAllResults($column);
		} else {
			return $this->db->table($table)->countAllResults($column);
		}
	}

	public function images($file, $path = null)
	{
		if ($file->getError() == 0) {
			if (in_array(strtolower($file->getClientExtension()), ['jpg', 'jpeg', 'png', 'webp'])) {
				$name = $file->getRandomName();

				$file->move($path, $name);

				return $name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function u_get($key)
	{
		return $this->db->table('utility')->where('u_key', $key)->get()->getResultArray()[0]['u_value'];
	}
	public function u_update($key, $value)
	{
		return $this->db->table('utility')->set(['u_value' => $value])->where('u_key', $key)->update();
	}
	public function data_update_plus($satuan, $tipe, $jumlah)
	{
		if ($satuan === 'Angka') {
			return $this->db->table('services')->set('price', 'price' . $tipe . $jumlah, false)->update();
		} else {
			foreach ($this->db->table('services')->get()->getResultArray() as $service) {
				$total_up = ($jumlah / 100) * $service['price'];
				$this->db->table('services')->set('price', 'price' . $tipe . $total_up, false)->where('id', $service['id'])->update();
			}
		}
	}
	public function upload_file($file, $path, $custome_name = false, $ex = ['png', 'jpeg', 'jpg', 'webp'], $get_original = false)
	{
		if ($file) {
			if ($file->getError() == 0) {
				if (in_array(strtolower($file->getClientExtension()), $ex)) {
					if ($custome_name === false) {
						$nama_file = $file->getRandomName();
					} else {
						$nama_file = $custome_name . '.' . $file->getClientExtension();
					}

					$file->move($path, $nama_file);

					if ($get_original) {
						return [
							'name' => $nama_file,
							'original' => $file->getClientName(),
						];
					} else {
						return $nama_file;
					}

				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function post($link, $data)
	{
		$ch = curl_init();
		curl_setopt_array(
			$ch,
			array(
				CURLOPT_URL => $link,
				CURLOPT_POST => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER => false,
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
			)
		);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		return $result;
	}

	public function wa($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => "https://api.fonnte.com/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => [
					'target' => $phone,
					'message' => $message,
					'delay' => '1',
					'schedule' => '0',
					'countryCode' => '62',
				],
				CURLOPT_HTTPHEADER => [
					"Authorization: " . $this->u_get('wa_token'),
				],
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function fonnte_pending($phone, $product, $orderid, $method)
	{

		$message = "
HALO CUYY!!

Ini rincian orderan yang tadi dipesen ya, coba dicek dulu sebelum bayar.

- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Lengkapnya bisa dicek langsung liat link yang ada dibawah ini 👇🏻
" . base_url() . "/payment/" . $orderid . "

Jangan lupa dibayar ye! order doang kaga bayar, kayak cintamu singgah doang tapi gak berlayar🤭

~MINGO
												";
// 		$curl = curl_init();
// 		curl_setopt_array(
// 			$curl,
// 			array(
// 				CURLOPT_URL => "https://api.fonnte.com/send",
// 				CURLOPT_RETURNTRANSFER => true,
// 				CURLOPT_ENCODING => "",
// 				CURLOPT_MAXREDIRS => 10,
// 				CURLOPT_TIMEOUT => 0,
// 				CURLOPT_FOLLOWLOCATION => true,
// 				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 				CURLOPT_CUSTOMREQUEST => "POST",
// 				CURLOPT_POSTFIELDS => [
// 					'target' => $phone,
// 					'message' => $message,
// 					'delay' => '1',
// 					'schedule' => '0',
// 					'countryCode' => '62',
// 				],
// 				CURLOPT_HTTPHEADER => [
// 					"Authorization: " . $this->u_get('wa_token'),
// 				],
// 			)
// 		);
// 		$response = curl_exec($curl);
// 		curl_close($curl);
// 		sleep(1); #do not delete!
	}

	public function fonnte_sukses($phone, $product, $orderid, $method)
	{

		$message = "
CUYY!!

Pesanannya udah berhasil kita kirimin ya, coba dicek akunnya.

Kalo belum masuk atau ada yang kurang bisa langsung lapor ke MINGO, tapi jangan spam nanti diblock langsung 😡

Lengkapnya bisa dicek langsung liat link yang ada dibawah ini 👇🏻
" . base_url() . "/payment/" . $orderid . "

Ditunggu orderan selanjutnya, awas aja gak beli lagi, MINGO anggap udah miskin 😎

◾FOLLOW SOSMED KITA!
Instagram : @pointgoid
Tiktok : @pointgo.id

~MINGO
												";

// 		$curl = curl_init();
// 		curl_setopt_array(
// 			$curl,
// 			array(
// 				CURLOPT_URL => "https://api.fonnte.com/send",
// 				CURLOPT_RETURNTRANSFER => true,
// 				CURLOPT_ENCODING => "",
// 				CURLOPT_MAXREDIRS => 10,
// 				CURLOPT_TIMEOUT => 0,
// 				CURLOPT_FOLLOWLOCATION => true,
// 				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 				CURLOPT_CUSTOMREQUEST => "POST",
// 				CURLOPT_POSTFIELDS => [
// 					'target' => $phone,
// 					'message' => $message,
// 					'delay' => '1',
// 					'schedule' => '0',
// 					'countryCode' => '62',
// 				],
// 				CURLOPT_HTTPHEADER => [
// 					"Authorization: " . $this->u_get('wa_token'),
// 				],
// 			)
// 		);
// 		$response = curl_exec($curl);
// 		curl_close($curl);
// 		sleep(1); #do not delete!
	}

	public function watsap($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => "https://api.watsap.id/send-message",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => [
					'id_device' => $this->u_get('watsap_device'),
					'api-key' => $this->u_get('watsap_api'),
					'no_hp' => $phone,
					'pesan' => $message
				],
				CURLOPT_HTTPHEADER => [
					"Content-Type: application/json ",
				],
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}


	public function watsap_pending($phone, $product, $orderid, $method)
	{

		$message = "
Halo kak,

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;


	}

	public function watsap_sukses($phone, $product, $orderid, $method)
	{

		$message = "
Pesanan anda telah berhasil kami kirimkan, silakan cek Akun Anda

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	public function watsap_manual($phone, $product, $orderid, $method, $harga)
	{

		$message = "
Ada Pesanan dengan METODE PEMBAYARAN MANUAL

Berikut adalah rincian pesanannya :
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "
- Harga : " . $harga . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	public function wapisender($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => [
					'api_key' => $this->u_get('wapi_api'),
					'device_key' => $this->u_get('wapi_device'),
					'destination' => $phone,
					'message' => $message,
				],
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}


	public function wapisender_pending($phone, $product, $orderid, $method)
	{

		$message = "
Halo kak,

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";
		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => [
					'api_key' => $this->u_get('wapi_api'),
					'device_key' => $this->u_get('wapi_device'),
					'destination' => $phone,
					'message' => $message,
				],
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}


	public function elasticmail_sender_success($email, $product, $orderid, $method)
{
    $subject = "POINTGO - Pesanan ".$orderid." Berhasil dikirimkan ";
    
    $orders = $this->data_where('orders', 'order_id', $orderid);

    $data = array(
        'from' => 'info@pointgo.id', // Replace with your sender email address
        'fromName' => 'POINTGO', // Replace with your sender name
        'apikey' => '07DD4C3AA0B186166F6F6F9910F240ED2FF9B13B4C1EA366E87267CD54CAD58BA1E00653681C4900DA4C2441FD3A1C59', 
        'subject' => $subject,
        'to' => $email,
        'isTransactional' => true,
        'template' => 'Pointgo Email', // Replace with the name of your template in Elastic Email
        'merge_username' => $orders[0]['nickname'],
        'merge_orderid' => $orderid,
        'merge_date' => $orders[0]['date_create'],
        'merge_method' => $orders[0]['method'],
        'merge_statusbayar' => 'Sudah Dibayar',
        'merge_statusorder' => 'Sukses',
        'merge_price' => 'Rp ' . number_format($orders[0]['price'], 0, ',', '.') . '  ' ,
        'merge_namaproduk' => $product,
        'merge_namagames' => $orders[0]['games'],
    );

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => "https://api.elasticemail.com/v2/email/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($data),
        )
    );

    $response = curl_exec($curl);
    curl_close($curl);

    // Do something with the $response if needed
    // For example, you can log the response or handle errors

    sleep(1); // Do not delete!
}




	public function wapisender_sukses($phone, $product, $orderid, $method)
	{

		$message = "
Pesanan anda telah berhasil kami kirimkan, silakan cek Akun Anda

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => [
					'api_key' => $this->u_get('wapi_api'),
					'device_key' => $this->u_get('wapi_device'),
					'destination' => $phone,
					'message' => $message,
				],
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function df_order($product, $customer, $refid)
	{

		$df_user = $this->u_get('digi-user');
		$df_key = $this->u_get('digi-key');

		$post_data = json_encode([
			'username' => $df_user,
			'buyer_sku_code' => $product,
			'customer_no' => $customer,
			'ref_id' => $refid,
			'sign' => md5($df_user . $df_key . $refid),
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
		return $result;
	}

	public function bj_order_1($product_id, $userid, $zoneid, $order_id)
	{

		$bj_api = $this->u_get('bangjeff-api');

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://bangjeff.com/api/v2/order',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => '{
            "product_data_id": ' . $product_id . ',
            "trxid": ' . $order_id . ',
            "dataId": [
					{
						"name": "ID",
						"value": "' . $userid . '"
					},
					{
						"name": "Server",
						"value": "' . $zoneid . '"
					}
				]
        }',
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json',
					'Authorization: ' . $bj_api . ''
				),
			)
		);

		$result = curl_exec($curl);
		$resultjson = json_decode($result, true);
		return $resultjson;


	}

	public function bj_order_2($product_id, $userid, $order_id)
	{


		$bj_api = $this->u_get('bangjeff-api');

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://bangjeff.com/api/v2/order',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => '{
            "product_data_id": ' . $product_id . ',
            "trxid": ' . $order_id . ',
            "dataId": [
					{
						"name": "ID",
						"value": "' . $userid . '"
					}
				]
        }',
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json',
					'Authorization: ' . $bj_api . ''
				),
			)
		);

		$result = curl_exec($curl);
		$resultjson = json_decode($result, true);
		return $resultjson;
	}

	public function vr_order($product, $userid, $zoneid)
	{

		$vr_id = $this->u_get('vr-id');
		$vr_key = $this->u_get('vr-key');
		$signe = $vr_id . $vr_key;
		$sign = md5($signe);
		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://vip-reseller.co.id/api/game-feature',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('key' => $vr_key, 'sign' => $sign, 'type' => 'order', 'service' => $product, 'data_no' => $userid, 'data_zone' => $zoneid),
			)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);

		return $result;
	}

	public function pvr_order($product, $userid)
	{

		$vr_id = $this->u_get('vr-id');
		$vr_key = $this->u_get('vr-key');
		$signe = $vr_id . $vr_key;
		$sign = md5($signe);
		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://vip-reseller.co.id/api/prepaid',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('key' => $vr_key, 'sign' => $sign, 'type' => 'order', 'service' => $product, 'data_no' => $userid),
			)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);

		return $result;
	}

	public function bm_order($product, $userid, $zoneid)
	{

		$bm_id = $this->u_get('bm-id');
		$bm_key = $this->u_get('bm-key');
		$signe = $bm_id . $bm_key;
		$sign = md5($signe);
		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://bigmedia.id/api/game-feature',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('key' => $bm_key, 'sign' => $sign, 'type' => 'order', 'service' => $product, 'data_no' => $userid, 'data_zone' => $zoneid),
			)
		);

		$result = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($result, true);

		return $result;
	}

	public function pbm_order($product, $userid)
	{

		$bm_id = $this->u_get('bm-id');
		$bm_key = $this->u_get('bm-key');
		$signe = $bm_id . $bm_key;
		$sign = md5($signe);
		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://bigmedia.id/api/prepaid',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => array('key' => $bm_key, 'sign' => $sign, 'type' => 'order', 'service' => $product, 'data_no' => $userid),
			)
		);

		$result = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($result, true);

		return $result;
	}

public function ag_v1_order($product, $customer, $orderid) {
	    $ag_merchant = $this->u_get('ag-merchant');
        $ag_key = $this->u_get('ag-secret');
        $signe = ''.$ag_merchant.':'.$ag_key.':'.$orderid.'';
        $apisigncb = md5($signe);
        
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://v1.apigames.id/v2/transaksi?ref_id='.$orderid.'&merchant_id='.$ag_merchant.'&produk='.$product.'&tujuan='.$customer.'&signature='.$apisigncb.'&server_id=',
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
										
        return $result;
	}
	
	public function ag_v2_order($product, $userid, $zoneid, $orderid) {
	    $ag_merchant = $this->u_get('ag-merchant');
        $ag_key = $this->u_get('ag-secret');
        $signe = ''.$ag_merchant.':'.$ag_key.':'.$orderid.'';
        $apisigncb = md5($signe);
        
        if (!empty($zoneid) AND $zoneid != 1) {
			$zoneid = $zoneid;
		} else {
			$zoneid = '';
		}
        
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://v1.apigames.id/v2/transaksi?ref_id='.$orderid.'&merchant_id='.$ag_merchant.'&produk='.$product.'&tujuan='.$userid.'&signature='.$apisigncb.'&server_id='.$zoneid.' ',
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
		
		$log_file_name = 'log_ag_mbase_' . date("j.n.Y") . '.txt'; // Include time in the log file name
$file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
fwrite($file, date('Y-m-d H:i:s') . ' ' . ($result) . "\n"); // Include time in the log message
fclose($file);

		$result = json_decode($result, true);
										
        return $result;
	}

	public function tv_order($product, $userid, $zoneid, $orderid)
	{


		$tv_merchant = $this->u_get('tv-merchant');
		$tv_key = $this->u_get('tv-secret');
		$signe = '' . $tv_merchant . ':' . $tv_key . ':' . $orderid . '';

		$post_data = json_encode([
			'ref_id' => $orderid,
			'member_code' => $tv_merchant,
			'produk' => $product,
			'tujuan' => $userid,
			'server_id' => $zoneid,
			'signature' => md5($signe),
		]);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.tokovoucher.id/v1/transaksi');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		return $result;
	}

	public function lg_order($product, $userid, $zoneid, $orderid)
	{

		$curl = curl_init();

		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => 'https://www.lapakgaming.com/api/order',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $this->u_get('lapakgaming-api')),
				CURLOPT_POSTFIELDS => '{
            "user_id": "' . $userid . '",
            "additional_id": "' . $zoneid . '",
            "count_order": 1,
            "product_code": "' . $product . '",
            "partner_reference_id": "' . $orderid . '"
        }',
			)
		);

		$response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response, true);

		return $result;
	}
	
	public function data_orders_no_duplicate($table, ...$columns)
    {
        $builder = $this->db->table($table);
    
        foreach ($columns as $column) {
            $builder->select($column);
        }

        $firstColumn = array_shift($columns);
        $builder->groupBy($firstColumn);
    
        $query = $builder->get();
    
        return $query->getResultArray();
    }
	
	public function getSalesGames($table, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $users = false)
    {
        if (is_null($start_date) || is_null($end_date) || is_null($id_games_value) || is_null($pick_provider) || is_null($pick_method) || is_null($pick_status)) {
                return [];
            }
        $query = $this->db->table($table)
            ->select([
                'games_id',
                'games',
                'provider',
                'method_id',
                'method',
                'COUNT(*) as total_sales',
                'SUM(price) as sales',
                'SUM(price - raw_price) - COALESCE(SUM(fee), 0) as profit',
                'status',
                "CONCAT(" . $this->db->escape($start_date) . ", ' - ', " . $this->db->escape($end_date) . ") AS range_date",
            ]);
    
        // Filter berdasarkan id_games_value jika ada
        if ($id_games_value !== 'all') {
            $query->where('games_id', $id_games_value);
        }
    
        // Filter berdasarkan tanggal jika ada
        if (!is_null($start_date) && !is_null($end_date)) {
            $query->where('date_create BETWEEN ' . $this->db->escape($start_date) . ' AND ' . $this->db->escape($end_date));
        }
    
        // Filter berdasarkan games_value jika ada
        if (!is_null($games_value)) {
            $query->where('games', $games_value);
        }
    
        // Filter berdasarkan pick_provider jika ada
        if ($pick_provider !== 'all') {
            $query->where('provider', $pick_provider);
        }
    
        // Filter berdasarkan pick_method jika ada
        if ($pick_method !== 'all') {
            $query->where('method_id', $pick_method);
        }
    
        // Filter berdasarkan pick_status jika ada
        if ($pick_status !== 'all') {
            $query->where('status', $pick_status);
        }
        
        // Add the user filter if $users is provided and not false
        if ($users !== false && isset($users['username'])) {
            $query->where('username', $users['username']);
        }
    
        $query->groupBy('games_id');
        
        $result = $query->get();
        
        if (!$result) {
            $error = $this->db->error();
            print_r($error);
            return [];
        }
        
        if ($result) {
            return $result->getResultArray();
        } else {
            return [];
        }
    }
    
    public function exportAllData($table, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $users = false)
    {
        $query = $this->db->table($table);
    
    
        // Filter berdasarkan tanggal jika ada
        if (!is_null($start_date) && !is_null($end_date)) {
            $query->where('date_create BETWEEN ' . $this->db->escape($start_date) . ' AND ' . $this->db->escape($end_date));
        }
    
        if ($id_games_value !== 'all') {
            $query->where('games_id', $id_games_value);
        }
    
        if (!is_null($games_value)) {
            $query->where('games', $games_value);
        }
    
        // Filter berdasarkan pick_provider jika ada
        if ($pick_method !== 'all') {
            $query->where('method_id', $pick_method);
        }
    
        // Filter berdasarkan pick_status jika ada
        if ($pick_status !== 'all') {
            $query->where('status', $pick_status);
        }
        
        // Add the user filter if $users is provided and not false
        if ($users !== false && isset($users['username'])) {
            $query->where('username', $users['username']);
        }
    
        $result = $query->get();
        
        if (!$result) {
            $error = $this->db->error();
            print_r($error);
            return [];
        }
        
        if ($result) {
            return $result->getResultArray();
        } else {
            return [];
        }
}

    public function get_paginated_and_filter($table, $search, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $offset, $limit, $users = false)
    {
    if (is_null($start_date) || is_null($end_date) || is_null($id_games_value) || is_null($pick_provider) || is_null($pick_method) || is_null($pick_status)) {
        return []; // Return an empty array if any filter is missing
    }

    // Initialize the query without any limitations
    $query = $this->db->table($table);

    // If there is a search query, add the search condition to the query
    if (!empty($search)) {
        // Get the list of columns in the table
        $tableColumns = $this->db->getFieldNames($table);

        // Build the search condition for each column
        $query->groupStart();
        foreach ($tableColumns as $column) {
            $query->orLike($column, $search);
        }
        $query->groupEnd();
    }

    // Add date filter if provided
    if (!is_null($start_date) && !is_null($end_date)) {
        $query->where('date_create BETWEEN ' . $this->db->escape($start_date) . ' AND ' . $this->db->escape($end_date));
    }

    // Add filter based on other parameters if provided
    if ($id_games_value !== 'all') {
        $query->where('games_id', $id_games_value);
    }

    if (!is_null($games_value)) {
        $query->where('games', $games_value);
    }

    // Filter based on pick_provider if provided
    if ($pick_provider !== 'all') {
        $query->where('provider', $pick_provider);
    }

    // Filter based on pick_method if provided
    if ($pick_method !== 'all') {
        $query->where('method_id', $pick_method);
    }

    if ($pick_status !== 'all') {
        $query->where('status', $pick_status);
    }

    // Add the user filter if $users is provided and not false
    if ($users !== false && isset($users['username'])) {
        $query->where('username', $users['username']);
    }

    // Count the total data based on search and filters
    $totalRows = $query->countAllResults(false);

    // Limit the results based on offset and limit
    $query->orderBy('id', 'DESC')->limit($limit, $offset);

    // Get the data based on search and filters
    $result = $query->get()->getResultArray();

    return array(
        'total' => $totalRows,
        'rows' => $result
    );
}
    
    public function get_paginated_data($table, $search, $offset, $limit = null, $conditions = null)
    {
        // Inisialisasi query tanpa batasan
        $query = $this->db->table($table);
    
        // Jika ada kueri pencarian, tambahkan kondisi pencarian ke dalam kueri
        if (!empty($search)) {
            // Mendapatkan daftar kolom dalam tabel
            $tableColumns = $this->db->getFieldNames($table);
    
            // Membangun kondisi pencarian untuk setiap kolom
            $query->groupStart();
            foreach ($tableColumns as $column) {
                $query->orLike($column, $search);
            }
            $query->groupEnd();
        }
    
        // Menambahkan filter berdasarkan kondisi yang diberikan
        if (!empty($conditions) && is_array($conditions)) {
            foreach ($conditions as $column => $value) {
                $query->where($column, $value);
            }
        }
    
        // Menghitung total data sesuai dengan kondisi pencarian
        $totalRows = $query->countAllResults(false);
    
        // Batasi hasil sesuai dengan offset dan limit jika limit diberikan
        if (!is_null($limit)) {
            $query->orderBy('id', 'DESC')->limit($limit, $offset);
        }
    
        // Dapatkan data sesuai dengan kondisi pencarian
        $result = $query->get()->getResultArray();
    
        return array(
            'total' => $totalRows,
            'rows' => $result
        );
    }

}