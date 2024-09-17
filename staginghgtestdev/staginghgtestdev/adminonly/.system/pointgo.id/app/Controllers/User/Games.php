<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Games extends BaseController
{

    public function index($slug = null)
    {
        if ($this->users === false) {
            return redirect()->to(base_url());
        } elseif ($slug) {
            $games = $this->M_Base->data_where('games', 'slug', $slug);

            if (count($games) === 1) {
                if ($games[0]['slug'] === $slug) {

                    $formIdentifier = 'tombol';
                    // $this->clearExpiredFormProcessedStatus($formIdentifier);
                    $currentTime = time();
                    $isFormProcessed = $this->isFormProcessed($formIdentifier);
                    $processedTimestamp = $this->session->get('formProcessedExpiration.' . $formIdentifier);
                    
                    if ($this->request->getPost('tombol')) {
                        
                    if ($this->request->getPost('order_token')) {
                    } else {
                        $this->session->setFlashdata('error', 'Validasi Gagal');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                    
                    $orderToken = $this->request->getPost('order_token');
                        if (!$this->validateOrderToken($orderToken)) {
                            $this->session->setFlashdata('error', 'Invalid Order Token');
                            return redirect()->to(current_url());
                        }
                        
                    if ($isFormProcessed === null OR ($currentTime - $processedTimestamp) > 2) {
                        // valid
                    } else {
                        $this->session->setFlashdata('error', 'Validasi Gagal, Ulangi beberapa saat lagi');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                    
                    $this->setFormProcessed($formIdentifier);

                        $data_post = [
                            'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                            'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                            'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                            'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                            'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                            'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                            'quantity' => addslashes(trim(htmlspecialchars($this->request->getPost('quantity')))),
                        ];

                        $joki = $jokigendong = $skinml = $videomontage = $topuplogin = $loginapex = $loginefootball = $loginff = $logingenshin = $loginml = $loginninokuni = $loginpokemon = $loginraven = $logintiktok = $logintower = $loginwildrift = $tournament = $lgragnarox = $lgdragonhunter = $lgfourgods = $lggenshinimpact = $lgninokuni = $lgneverafter = $lgclashofclans = false;
                        $targets = [
                            'joki' => ['request_hero', 'email', 'password', 'catatan_joki', 'nickname', 'login_via', 'jumlah_star_poin'],
                            'skinml' => ['email', 'login_via', 'nickname', 'request_hero', 'catatan_joki'],
                            'videomontage' => ['email', 'password', 'request_hero', 'catatan_videomontage', 'nickname', 'login_via', 'record_via', 'contoh_video', 'jumlah_menit'],
                            'topuplogin' => ['email', 'password', 'nickname', 'login_via', 'kode_cadangan'],
                            'lg-ragnarox' => ['username', 'server', 'login'],
                            'lg-dragonhunter' => ['username', 'server', 'login'],
                            'lg-fourgods' => ['username', 'server', 'login'],
                            'lg-genshinimpact' => ['username', 'server', 'login'],
                            'lg-ninokuni' => ['username', 'server', 'login'],
                            'lg-neverafter' => ['username', 'server', 'login'],
                            'lg-clashofclans' => ['username', 'login'],
                            'loginapex' => ['email', 'password', 'nickname', 'login_via', 'wa'],
                            'loginefootball' => ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'],
                            'loginff' => ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'],
                            'logingenshin' => ['email', 'password', 'nickname', 'server', 'wa'],
                            'loginml' => ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'],
                            'loginninokuni' => ['email', 'password', 'nickname', 'server', 'character', 'wa'],
                            'loginpokemon' => ['email', 'password', 'nickname', 'login_via', 'wa'],
                            'loginraven' => ['email', 'password', 'nickname', 'server', 'wa'],
                            'logintiktok' => ['email', 'password', 'wa'],
                            'logintower' => ['email', 'password', 'nickname', 'server', 'login_via', 'region', 'wa'],
                            'loginwildrift' => ['email', 'password', 'nickname', 'login_via', 'wa'],
                            'tournament' => ['id', 'server', 'jam', 'tanggal'],
                            'jokigendong' => ['id', 'nickname', 'role', 'tanggal', 'jam', 'catatan', 'jumlah_star_poin'],
                        ];

                        if ($target = $this->request->getPost('target')) {
                            // Check if the target is valid and its values have been posted
                            if (isset($targets[$target]) && $json_user_id = json_decode($this->request->getPost('user_id'), true)) {

                                // Check if all the required values for the target have been posted
                                if (count($json_user_id) === count($targets[$target])) {

                                    // Merge the key-value pairs from the posted data into an array
                                    $user_id = array_combine($targets[$target], array_map(function ($value) {
                                        return addslashes(trim(htmlspecialchars($value)));
                                    }, $json_user_id));

                                    // Set the appropriate flag and data
                                    switch ($target) {
                                        case 'joki':
                                            $joki = true;
                                            $data_post['zone_id'] = 'joki';
                                            break;
                                        case 'skinml':
                                            $skinml = true;
                                            $data_post['zone_id'] = 'skinml';
                                            break;
                                        case 'videomontage':
                                            $videomontage = true;
                                            $data_post['zone_id'] = 'videomontage';
                                            break;
                                        case 'topuplogin':
                                            $topuplogin = true;
                                            $data_post['zone_id'] = 'topuplogin';
                                            break;
                                        case 'lg-ragnarox':
                                            $lgragnarox = true;
                                            $data_post['zone_id'] = 'lg-ragnarox';
                                            break;
                                        case 'lg-dragonhunter':
                                            $lgdragonhunter = true;
                                            $data_post['zone_id'] = 'lg-dragonhunter';
                                            break;
                                        case 'lg-fourgods':
                                            $lgfourgods = true;
                                            $data_post['zone_id'] = 'lg-fourgods';
                                            break;
                                        case 'lg-genshinimpact':
                                            $lggenshinimpact = true;
                                            $data_post['zone_id'] = 'lg-genshinimpact';
                                            break;
                                        case 'lg-ninokuni':
                                            $lgninokuni = true;
                                            $data_post['zone_id'] = 'lg-ninokuni';
                                            break;
                                        case 'lg-neverafter':
                                            $lgneverafter = true;
                                            $data_post['zone_id'] = 'lg-neverafter';
                                            break;
                                        case 'lg-clashofclans':
                                            $lgclashofclans = true;
                                            $data_post['zone_id'] = 'lg-clashofclans';
                                            break;
                                        case 'loginapex':
                                            $loginapex = true;
                                            $data_post['zone_id'] = 'loginapex';
                                            break;
                                        case 'loginefootball':
                                            $loginefootball = true;
                                            $data_post['zone_id'] = 'loginefootball';
                                            break;
                                        case 'loginff':
                                            $loginff = true;
                                            $data_post['zone_id'] = 'loginff';
                                            break;
                                        case 'logingenshin':
                                            $logingenshin = true;
                                            $data_post['zone_id'] = 'logingenshin';
                                            break;
                                        case 'loginml':
                                            $loginml = true;
                                            $data_post['zone_id'] = 'loginml';
                                            break;
                                        case 'loginninokuni':
                                            $loginninokuni = true;
                                            $data_post['zone_id'] = 'loginninokuni';
                                            break;
                                        case 'loginpokemon':
                                            $loginpokemon = true;
                                            $data_post['zone_id'] = 'loginpokemon';
                                            break;
                                        case 'loginraven':
                                            $loginraven = true;
                                            $data_post['zone_id'] = 'loginraven';
                                            break;
                                        case 'logintiktok':
                                            $logintiktok = true;
                                            $data_post['zone_id'] = 'logintiktok';
                                            break;
                                        case 'logintower':
                                            $logintower = true;
                                            $data_post['zone_id'] = 'logintower';
                                            break;
                                        case 'loginwildrift':
                                            $loginwildrift = true;
                                            $data_post['zone_id'] = 'loginwildrift';
                                            break;
                                        case 'tournament':
                                            $tournament = true;
                                            $data_post['zone_id'] = 'tournament';
                                            break;
                                        case 'jokigendong':
                                            $jokigendong = true;
                                            $data_post['zone_id'] = 'jokigendong';
                                            break;
                                    }

                                    $data_post['user_id'] = json_encode($user_id);

                                } else {
                                    $this->session->setFlashdata('error', "Data $target belum lengkap");
                                }

                            } else {
                                $data_post['user_id'] = addslashes(trim(htmlspecialchars($this->request->getPost('user_id'))));
                                $data_post['zone_id'] = addslashes(trim(htmlspecialchars($this->request->getPost('zone_id'))));
                            }

                        }

                        if (empty($data_post['user_id']) or empty($data_post['zone_id'])) {
                            $this->session->setFlashdata('error', 'ID Player harus diisi');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['method'])) {
                            $this->session->setFlashdata('error', 'Metode belum dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['product'])) {
                            $this->session->setFlashdata('error', 'Produk belum dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['wa'])) {
                            $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 15) {
                            $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {
                            $product = $this->M_Base->data_where('product', 'id', $data_post['product']);

                            if (count($product) === 1) {
                                if ($product[0]['status'] == 'On') {

                                    if ($data_post['method'] === 'balance') {
                                        $method = [
                                            [
                                                'id' => 10001,
                                                'status' => 'On',
                                                'provider' => 'Balance',
                                                'method' => 'Saldo Akun',
                                                'uniq' => 'N',
                                            ]
                                        ];
                                    } else {
                                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                                    }

                                    if (count($method) === 1) {
                                        if ($method[0]['status'] == 'On') {

                                            $level = 'Members';
                                            $product_price = $product[0]['price'];




                                            if ($this->users == false) {
                                                $username = '';
                                                $username_tripay = 'Default';
                                            } else {
                                                $username = $this->users['username'];
                                                $username_tripay = $this->users['username'];
                                                $level = $this->users['level'];

                                                if ($level == 'Silver') {
                                                    if ($product[0]['price_silver'] == 0 or $product[0]['price_silver'] < 500 or empty($product[0]['price_silver'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_silver'];
                                                    }

                                                } else if ($level == 'Gold') {

                                                    if ($product[0]['price_gold'] == 0 or $product[0]['price_gold'] < 500 or empty($product[0]['price_gold'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_gold'];
                                                    }

                                                } else if ($level == 'Platinum') {

                                                    if ($product[0]['price_platinum'] == 0 or $product[0]['price_platinum'] < 500 or empty($product[0]['price_platinum'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_platinum'];
                                                    }

                                                } else if ($level == 'Diamond') {

                                                    if ($product[0]['price_diamond'] == 0 or $product[0]['price_diamond'] < 500 or empty($product[0]['price_diamond'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_diamond'];
                                                    }

                                                } else if ($level == 'Member') {

                                                    if ($product[0]['price_bronze'] == 0 or $product[0]['price_bronze'] < 500 or empty($product[0]['price_bronze'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_bronze'];
                                                    }

                                                } else {
                                                    $product_price = $product[0]['price'];
                                                }
                                            }

                                            $status = 'Pending';
                                            $ket = 'Menunggu Pembayaran';

                                            $alphabet = 'INV';
                                            $order_id = $alphabet . date('Ymd') . rand(000000, 999999);
                                            $trx = $order_id;


                                            $uniq = ($method[0]['uniq'] == 'Y') ? rand(000, 999) : 0;

                                            $price = $product_price;

                                            ///

                                            if ($this->M_Base->u_get('pay_balance') == 'Y') {

                                                $level = $this->users['level'];

                                                $price = $product_price;

                                                if ($level == 'Silver') {
                                                    if ($product[0]['price_silver'] == 0 or empty($product[0]['price_silver'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_silver'];
                                                    }

                                                } else if ($level == 'Gold') {

                                                    if ($product[0]['price_gold'] == 0 or empty($product[0]['price_gold'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_gold'];
                                                    }

                                                } else if ($level == 'Platinum') {

                                                    if ($product[0]['price_platinum'] == 0 or empty($product[0]['price_platinum'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_platinum'];
                                                    }

                                                } else if ($level == 'Diamond') {

                                                    if ($product[0]['price_diamond'] == 0 or empty($product[0]['price_diamond'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_diamond'];
                                                    }

                                                } else if ($level == 'Member') {

                                                    if ($product[0]['price_bronze'] == 0 or $product[0]['price_bronze'] < 500 or empty($product[0]['price_bronze'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_bronze'];
                                                    }

                                                } else {
                                                    $product_price = $product[0]['price'];
                                                }

                                            }

                                            ///

                                            if ($joki) {
                                                $price = $price * $user_id['jumlah_star_poin'];

                                                $user_id = json_encode($user_id);
                                            } else if ($jokigendong) {
                                                $price = $price * $user_id['jumlah_star_poin'];

                                                $user_id = json_encode($user_id);
                                            } else if ($videomontage) {
                                                $price = $price * $user_id['jumlah_menit'];

                                                $user_id = json_encode($user_id);
                                            }

                                            if ($this->request->getPost('target') == 'sosmed') {
                                                $price = $price * $data_post['zone_id'];
                                            }
                                            
                                            if ($data_post['quantity'] == 0 or empty($data_post['quantity'])) {
                                                $data_post['quantity'] == 1 ;
                                            }
                                            $price = $price * $data_post['quantity'];


                                            $price = $price + $uniq;

                                            $redirect = false;

                                            $voucher = '';
                                            if ($this->request->getPost('voucher')) {

                                                $voucher = addslashes(trim(htmlspecialchars($this->request->getPost('voucher'))));

                                                $data_voucher = $this->M_Base->data_where_array('voucher', [
                                                    'voucher' => $voucher,
                                                    'status' => 'Active',
                                                ]);

                                                if (count($data_voucher) === 1) {

                                                    if ($product[0]['price'] < $data_voucher[0]['min']) {
                                                        $this->session->setFlashdata('error', 'Minimal nominal transaksi Rp ' . number_format($data_voucher[0]['min'], 0, ',', '.') . ' untuk menggunakan voucher ini');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    } else {

                                                        $orders = $this->M_Base->data_count('orders', [
                                                            'voucher' => $voucher,
                                                        ]);

                                                        if ($orders <= $data_voucher[0]['max_use']) {

                                                            $valid = false;
                                                            if ($data_voucher[0]['type_produk'] == 'all') {
                                                                $valid = true;
                                                            } else {
                                                                if (in_array($product[0]['id'], explode(',', $data_voucher[0]['produk']))) {
                                                                    $valid = true;
                                                                }
                                                            }

                                                            if ($valid == true) {

                                                                $diskon = (($price - $uniq) / 100) * $data_voucher[0]['diskon'];

                                                                if ($diskon > $data_voucher[0]['max_diskon']) {
                                                                    $diskon = $data_voucher[0]['max_diskon'];
                                                                }

                                                                $price -= $diskon;
                                                                $price += $uniq;


                                                            } else {
                                                                $this->session->setFlashdata('error', 'Voucher tidak dapat digunakan untuk nominal ini');
                                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                            }
                                                        } else {
                                                            $this->session->setFlashdata('error', 'Kode voucher telah mencapai limit');
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                    }
                                                } else {
                                                    $this->session->setFlashdata('error', 'Kode voucher tidak ditemukan');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            }
                                            
                                            $fee = 0;

                                            if ($method[0]['provider'] == 'Ipaymu') {

                                                    if ($method[0]['type'] == 'QRIS') {
                                                        $fee = $price * 0.025;
                                                        $price = $price + $fee;

                                                    } else if ($method[0]['type'] == 'Virtual Account') {

                                                        if (in_array($method[0]['code'], array('bca', 'mandiri'))) {
                                                            $fee = 4000;
                                                        } else {
                                                            $fee = 3500;
                                                        }

                                                        $price = $price + $fee;

                                                    } else if ($method[0]['type'] == 'Convenience Store') {

                                                        if ($method[0]['code'] == 'alfamart') {
                                                            $fee = 6500;
                                                        } else {
                                                            $fee = 4000;
                                                        }

                                                        $price = $price + $fee;
                                                    } else {
                                                        $price = $price;
                                                    }

                                                }

                                                if ($method[0]['provider'] == 'Duitku') {

                                                    if (in_array($method[0]['code'], array('SP', 'NQ'))) {
                                                        $price = ($price * 1.007);
                                                    }

                                                    if ($method[0]['code'] == 'LQ') {
                                                        $price = ($price * 1.0078);
                                                    }

                                                }

                                                if ($method[0]['provider'] == 'Linkqu') {

                                                    if ($method[0]['type'] == 'QRIS') {
                                                        $fee = ($price * 0.007);
                                                        $price = $price + $fee;
                                                    } else if ($method[0]['type'] == 'Virtual Account') {
    
    
                                                        if (in_array($method[0]['code'], array('013', '022,', '011'))) {
                                                            $fee = 2500;
                                                        } else if (in_array($method[0]['code'], array('008', '002,', '490', '451'))) {
                                                            $fee = 3000;
                                                        } else {
                                                            $fee = 3500;
                                                        }
    
                                                        $price = $price + $fee;
    
                                                    } else if ($method[0]['type'] == 'E-Wallet') {
                                                        $fee = ($price * 0.018) + 1000;
    
                                                        if ($method[0]['code'] == 'PAYSHOPEE') {
                                                            $fee = ($price * 0.023) + 1000;
                                                        }
                                                        
                                                        $price = $price + $fee;
    
                                                    } else if ($method[0]['type'] == 'Convenience Store') {
                                                        $fee = 1500;
                                                        $price = $price + $fee;
                                                    } else {
                                                        $price = $price;
                                                    }
    
                                                }



                                                $fee = ceil($fee);
                                                $price = ceil($price);


                                                if ($method[0]['provider'] == 'Tripay') {
                                                    $data = [
                                                        'method' => $method[0]['code'],
                                                        'merchant_ref' => $order_id,
                                                        'amount' => $price,
                                                        'customer_name' => $order_id,
                                                        'customer_email' => $order_id.'@hiddengame.id',
                                                        'customer_phone' => '08'. strval(mt_rand(100000000, 999999999)),
                                                        'order_items' => [
                                                            [
                                                                'sku' => $product[0]['sku'],
                                                                'name' => $product[0]['product'],
                                                                'price' => $price,
                                                                'quantity' => 1,
                                                            ]
                                                        ],
                                                        'return_url' => base_url() . '/payment/' . $order_id,
                                                        // url untuk redirect
                                                        'expired_time' => (time() + (24 * 60 * 60)),
                                                        // 24 jam
                                                        'signature' => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant') . $order_id . $price, $this->M_Base->u_get('tripay-private'))
                                                    ];

                                                    $curl = curl_init();

                                                    curl_setopt_array($curl, [
                                                        CURLOPT_FRESH_CONNECT => true,
                                                        CURLOPT_URL => 'https://tripay.co.id/api/transaction/create',
                                                        CURLOPT_RETURNTRANSFER => true,
                                                        CURLOPT_HEADER => false,
                                                        CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $this->M_Base->u_get('tripay-key')],
                                                        CURLOPT_FAILONERROR => false,
                                                        CURLOPT_POST => true,
                                                        CURLOPT_POSTFIELDS => http_build_query($data),
                                                        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
                                                    ]);

                                                    $result = curl_exec($curl);
                                                    
                                                      $log_file_name = 'log_tripay_' . date("j.n.Y") . '.txt'; // Include time in the log file name
                                                        $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
                                                        fwrite($file, date('Y-m-d H:i:s') . ' ' . ($result) . "\n"); // Include time in the log message
                                                        fclose($file);
                                                        
                                                    $result = json_decode($result, true);

                                                    if ($result) {
                                                        if ($result['success'] == true) {
                                                            if (array_key_exists('qr_url', $result['data'])) {
                                                                $payment_code = $result['data']['qr_url'];
                                                            } else {
                                                                if ($result['data']['pay_code']) {
                                                                    $payment_code = $result['data']['pay_code'];
                                                                } else {
                                                                    $payment_code = $result['data']['checkout_url'];
                                                                }
                                                            }

                                                            if (empty($payment_code)) {
                                                                $redirect = true;
                                                                $payment_code = $result['data']['checkout_url'];
                                                            }
                                                        } else {
                                                            $this->session->setFlashdata('error', 'Result : ' . $result['message']);
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                    } else {
                                                        $this->session->setFlashdata('error', 'Gagal terkoneksi ke Tripay');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    }


                                                } else if ($method[0]['provider'] == 'Duitku') {

                                                    $merchantCode = $this->M_Base->u_get('duitku-merchant'); // dari duitku
                                                    $apiKey = $this->M_Base->u_get('duitku-key'); // dari duitku
                                                    $paymentAmount = $price;
                                                    $paymentMethod = $method[0]['code']; // VC = Credit Card
                                                    $merchantOrderId = $order_id; // dari merchant, unik
                                                    $productDetails = $product[0]['product'];
                                                    $email = 'email@domain.com'; // email pelanggan anda
                                                    $phoneNumber = $data_post['wa']; // nomor telepon pelanggan anda (opsional)
                                                    $customerVaName = $username_tripay; // tampilan nama pada tampilan konfirmasi bank
                                                    $callbackUrl = base_url() . '/sistem/callback/duitku281230asj2130123'; // url untuk callback
                                                    $returnUrl = base_url() . '/payment/' . $order_id; // url untuk redirect
                                                    $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
                                                    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

                                                    $item1 = array(
                                                        'name' => $product[0]['product'],
                                                        'price' => $price,
                                                        'quantity' => 1
                                                    );

                                                    $itemDetails = array(
                                                        $item1
                                                    );

                                                    $params = array(
                                                        'merchantCode' => $merchantCode,
                                                        'paymentAmount' => $paymentAmount,
                                                        'paymentMethod' => $paymentMethod,
                                                        'merchantOrderId' => $merchantOrderId,
                                                        'productDetails' => $productDetails,
                                                        'customerVaName' => $customerVaName,
                                                        'email' => $email,
                                                        'phoneNumber' => $phoneNumber,
                                                        // 'accountLink' => $accountLink,
                                                        'itemDetails' => $itemDetails,
                                                        'customerDetail' => $customerDetail,
                                                        'callbackUrl' => $callbackUrl,
                                                        'returnUrl' => $returnUrl,
                                                        'signature' => $signature,
                                                        'expiryPeriod' => $expiryPeriod
                                                    );

                                                    $params_string = json_encode($params);
                                                    //echo $params_string;
                                                    //$url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
                                                    $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
                                                    $ch = curl_init();

                                                    curl_setopt($ch, CURLOPT_URL, $url);
                                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
                                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt(
                                                        $ch,
                                                        CURLOPT_HTTPHEADER,
                                                        array(
                                                            'Content-Type: application/json',
                                                            'Content-Length: ' . strlen($params_string)
                                                        )
                                                    );
                                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                                                    //execute post
                                                    $request = curl_exec($ch);


                                                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                                                    if ($httpCode == 200) {
                                                        $result = json_decode($request, true);

                                                        if (array_key_exists('vaNumber', $result)) {
                                                        $payment_code = $result['vaNumber'];
                                                        } else if (array_key_exists('qrString', $result)) {
                                                            $payment_code = $result['qrString'];
                                                        } else {
                                                            $payment_code = $result['paymentUrl'];
                                                        }
                                                    } else {
                                                        $result = json_decode($request, true);
                                                        $this->session->setFlashdata('error', 'Result : ' . $result['statusMessage']);
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    }

                                                } else if ($method[0]['provider'] == 'Ipaymu') {

                                                    $vaIpaymu = $this->M_Base->u_get('va-ipaymu');
                                                    $apiKey = $this->M_Base->u_get('api-ipaymu');
                                                    $paymentAmount = $price;
                                                    $paymentMethod = $method[0]['code']; // VC = Credit Card
                                                    $merchantOrderId = $order_id; // dari merchant, unik
                                                    $productDetails = $product[0]['product'];
                                                    $random_bytes = random_bytes(5);
                                                    $random_string = bin2hex($random_bytes);
                                                    $email = $random_string . '@gmail.com';
                                                    $phoneNumber = $data_post['wa']; // nomor telepon pelanggan anda (opsional)
                                                    $customerVaName = $username_tripay; // tampilan nama pada tampilan konfirmasi bank
                                                    $callbackUrl = base_url() . '/sistem/callback/ipaymu';
                                                    $returnUrl = base_url() . '/payment/' . $order_id; // url untuk redirect
                                                    $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
                                                    $date_sk = date('YmdHis');

                                                    if ($method[0]['type'] == 'QRIS') {
                                                        $methodType = 'qris';
                                                    } else if ($method[0]['type'] == 'Virtual Account') {
                                                        $methodType = 'va';
                                                    } else if ($method[0]['type'] == 'Convenience Store') {
                                                        $methodType = 'cstore';
                                                    }

                                                    //$url = 'https://sandbox.ipaymu.com'; // Sandbox
                                                    $url = 'https://my.ipaymu.com'; // Production

                                                    $requestBody = array(
                                                        'name' => $customerVaName,
                                                        'phone' => $phoneNumber,
                                                        'email' => $email,
                                                        'amount' => $paymentAmount,
                                                        'paymentMethod' => $methodType,
                                                        'paymentChannel' => $paymentMethod,
                                                        'notifyUrl' => $callbackUrl,
                                                        'expired' => '24',
                                                        'expiredType' => 'hours',
                                                        'comments' => $productDetails,
                                                        'referenceId' => $merchantOrderId
                                                    );

                                                    // convert HTTP method to uppercase
                                                    $httpMethod = 'POST'; //method

                                                    $jsonBody = json_encode($requestBody, JSON_UNESCAPED_SLASHES);
                                                    $requestBody = strtolower(hash('sha256', $jsonBody));
                                                    $stringToSign = strtoupper($httpMethod) . ':' . $vaIpaymu . ':' . $requestBody . ':' . $apiKey;
                                                    $signature = hash_hmac('sha256', $stringToSign, $apiKey);


                                                    $curl = curl_init();

                                                    curl_setopt_array(
                                                        $curl,
                                                        array(
                                                            CURLOPT_URL => '' . $url . '/api/v2/payment/direct',
                                                            CURLOPT_RETURNTRANSFER => true,
                                                            CURLOPT_ENCODING => '',
                                                            CURLOPT_MAXREDIRS => 10,
                                                            CURLOPT_TIMEOUT => 0,
                                                            CURLOPT_FOLLOWLOCATION => true,
                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                            CURLOPT_CUSTOMREQUEST => 'POST',
                                                            CURLOPT_POSTFIELDS => $jsonBody,
                                                            CURLOPT_HTTPHEADER => array(
                                                                'Accept: application/json',
                                                                'Content-Type: application/json',
                                                                'signature: ' . $signature,
                                                                'va: ' . $vaIpaymu . '',
                                                                'timestamp: ' . $date_sk . ''
                                                            ),
                                                        )
                                                    );

                                                    $response = curl_exec($curl);
                                                    curl_close($curl);
                                                    $result = json_decode($response, true);

                                                    if ($result['Status'] == 200) {

                                                        $trx = $result['Data']['SessionId'];
                                                        $payment_code = $result['Data']['PaymentNo'];
                                                        if ($method[0]['type'] == 'Convenience Store') {
                                                            $ket = $result['Data']['Note'];
                                                        }

                                                    } else {
                                                        $this->session->setFlashdata('error', 'Result : ' . $result['Message']);
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    }

                                                } else if ($method[0]['provider'] == 'Linkqu') {

                                                    $username_linkqu = $this->M_Base->u_get('username_linkqu');
                                                    $pin_linkqu = $this->M_Base->u_get('pin_linkqu');
                                                    $id_linkqu = $this->M_Base->u_get('id_linkqu');
                                                    $secret_linkqu = $this->M_Base->u_get('secret_linkqu');
                                                    $serverKey = $this->M_Base->u_get('signkey_linkqu');
                                                    //$url = 'https://gateway-dev.linkqu.id'; // Sandbox
                                                    $url = 'https://gateway.linkqu.id'; // Production

                                                    $paymentAmount = $price;
                                                    $paymentMethod = $method[0]['code']; // VC = Credit Card
                                                    $merchantOrderId = $order_id; // dari merchant, unik
                                                    $productDetails = $product[0]['product'];
                                                    $letters = range('a', 'z'); // an array containing all letters of the alphabet
                                                    shuffle($letters); // shuffle the array to randomize the order of the letters
                                                    $random_letters = implode('', array_slice($letters, 0, 10)); // take the first 5 letters and join them into a string
                                                    $email = $random_letters.'@gmail.com'; // email pelanggan anda
                                                    $phoneNumber = strval(mt_rand(10000000000, 99999999999)); // nomor telepon pelanggan anda (opsional)


                                                    if ($this->users == false) {
                                                        $namaweb = $this->M_Base->u_get('web-name');
                                                        $customerVaName = $namaweb.' '.$order_id;
                                                        

                                                    } else {
                                                        $customerVaName = $this->users['username'];
                                                    }

                                                    $returnUrl = base_url() . '/payment/' . $order_id; // url untuk redirect
                                                    $imageUrl = base_url() . '/assets/images/games/' . $games[0]['image']; // url untuk redirect
                                                    $date_sk = date('YmdHis');
                                                    $expired = date('YmdHis', strtotime($date_sk . ' +1 day'));

                                                    $methodcurl = "POST";
                                                    $regex = "/[^0-9a-zA-Z]/";

                                                    if ($method[0]['type'] == 'QRIS') {
                                                        $path = '/transaction/create/qris';
                                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $order_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                                    } else if ($method[0]['type'] == 'Virtual Account') {
                                                        $path = '/transaction/create/va';
                                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $order_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                                    } else if ($method[0]['type'] == 'E-Wallet') {
                                                        $path = '/transaction/create/paymentewallet';
                                                        if ($method[0]['code'] == 'PAYOVO') {
                                                            $path = '/transaction/create/ovopush';
                                                        }
                                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $order_id . $phoneNumber . $customerVaName . $email . $phoneNumber . $id_linkqu));
                                                    } else if ($method[0]['type'] == 'Convenience Store') {
                                                        $path = '/transaction/create/retail';
                                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $order_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                                    }

                                                    $valuesign = $path . $methodcurl . $value;

                                                    $signature = hash_hmac('sha256', $valuesign, $serverKey);



                                                    if ($method[0]['type'] == 'Virtual Account') {

                                                        $curl = curl_init();

                                                        curl_setopt_array(
                                                            $curl,
                                                            array(
                                                                CURLOPT_URL => '' . $url . '/linkqu-partner/transaction/create/va',
                                                                CURLOPT_RETURNTRANSFER => true,
                                                                CURLOPT_ENCODING => '',
                                                                CURLOPT_MAXREDIRS => 10,
                                                                CURLOPT_TIMEOUT => 0,
                                                                CURLOPT_FOLLOWLOCATION => true,
                                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                CURLOPT_CUSTOMREQUEST => 'POST',
                                                                CURLOPT_POSTFIELDS => '{
                                                            "amount" : ' . $paymentAmount . ',
                                                            "partner_reff" : "' . $order_id . '",
                                                            "customer_id" : "' . $phoneNumber . '",
                                                            "customer_name" : "' . $customerVaName . '",
                                                            "expired" : "' . $expired . '",
                                                            "username" : "' . $username_linkqu . '",
                                                            "pin" : "' . $pin_linkqu . '",
                                                            "customer_phone" : "' . $phoneNumber . '",
                                                            "customer_email" : "' . $email . '",
                                                            "bank_code" : "' . $paymentMethod . '",
                                                            "signature" : ' . $signature . '
                                                        }',
                                                                CURLOPT_HTTPHEADER => array(
                                                                    'client-id: ' . $id_linkqu . ' ',
                                                                    'client-secret: ' . $secret_linkqu . ''
                                                                ),
                                                            )
                                                        );

                                                        $result = json_decode(curl_exec($curl), true);

                                                        if ($result['response_code'] == 00) {
                                                            $payment_code = $result['virtual_account'];
                                                        } else {
                                                            $payment_code = $result['response_desc'];
                                                        }




                                                    } else if ($method[0]['type'] == 'E-Wallet') {

                                                        if ($method[0]['code'] == 'PAYOVO') {

                                                            $curl = curl_init();

                                                            curl_setopt_array(
                                                                $curl,
                                                                array(
                                                                    CURLOPT_URL => '' . $url . '/linkqu-partner/transaction/create/ovopush',
                                                                    CURLOPT_RETURNTRANSFER => true,
                                                                    CURLOPT_ENCODING => '',
                                                                    CURLOPT_MAXREDIRS => 10,
                                                                    CURLOPT_TIMEOUT => 0,
                                                                    CURLOPT_FOLLOWLOCATION => true,
                                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                                                    CURLOPT_POSTFIELDS => '{
                                                                "amount" : ' . $paymentAmount . ',
                                                                "partner_reff" : "' . $order_id . '",
                                                                "customer_id" : "' . $phoneNumber . '",
                                                                "customer_name" : "' . $customerVaName . '",
                                                                "expired" : "' . $expired . '",
                                                                "username" : "' . $username_linkqu . '",
                                                                "pin" : "' . $pin_linkqu . '",
                                                                "retail_code" : "PAYOVO",
                                                                "customer_phone" : "' . $phoneNumber . '",
                                                                "customer_email" : "' . $email . '",
                                                                "ewallet_phone" : "' . $phoneNumber . '",
                                                                "bill_title" : "' . $productDetails . '",
                                                                "signature" : "' . $signature . '"
                                                            }',
                                                                    CURLOPT_HTTPHEADER => array(
                                                                        'client-id: ' . $id_linkqu . ' ',
                                                                        'client-secret: ' . $secret_linkqu . ''
                                                                    ),
                                                                )
                                                            );


                                                            $result = json_decode(curl_exec($curl), true);
                                                            curl_close($curl);

                                                            if ($result['response_code'] == 00) {
                                                                $payment_code = "Cek Notifikasi di Aplikasi OVO anda untuk melakukan Pembayaran";
                                                            } else {
                                                                $payment_code = $result['response_desc'];
                                                            }



                                                        } else {
                                                            $curl = curl_init();

                                                            curl_setopt_array(
                                                                $curl,
                                                                array(
                                                                    CURLOPT_URL => '' . $url . '/linkqu-partner/transaction/create/paymentewallet',
                                                                    CURLOPT_RETURNTRANSFER => true,
                                                                    CURLOPT_ENCODING => '',
                                                                    CURLOPT_MAXREDIRS => 10,
                                                                    CURLOPT_TIMEOUT => 0,
                                                                    CURLOPT_FOLLOWLOCATION => true,
                                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                                                    CURLOPT_POSTFIELDS => '{
                                                            "amount" : ' . $paymentAmount . ',
                                                            "partner_reff" : "' . $order_id . '",
                                                            "customer_id" : "' . $phoneNumber . '",
                                                            "customer_name" : "' . $customerVaName . '",
                                                            "expired" : "' . $expired . '",
                                                            "username" : "' . $username_linkqu . '",
                                                            "pin" : "' . $pin_linkqu . '",
                                                            "retail_code" : "' . $paymentMethod . '",
                                                            "customer_phone" : "' . $phoneNumber . '",
                                                            "customer_email" : "' . $email . '",
                                                            "ewallet_phone" : "' . $phoneNumber . '",
                                                            "bill_title" : "' . $productDetails . '",
                                                            "signature" : "' . $signature . '"
                                                        }',
                                                                    CURLOPT_HTTPHEADER => array(
                                                                        'client-id: ' . $id_linkqu . ' ',
                                                                        'client-secret: ' . $secret_linkqu . ''
                                                                    ),
                                                                )
                                                            );

                                                            $result = json_decode(curl_exec($curl), true);


                                                            if ($result['response_code'] == 00) {
                                                                $payment_code = $result['url_payment'];
                                                            } else {
                                                                $payment_code = $result['response_desc'];
                                                            }


                                                        }


                                                    } else if ($method[0]['type'] == 'Convenience Store') {

                                                        $curl = curl_init();

                                                        curl_setopt_array(
                                                            $curl,
                                                            array(
                                                                CURLOPT_URL => '' . $url . '/linkqu-partner/transaction/create/retail',
                                                                CURLOPT_RETURNTRANSFER => true,
                                                                CURLOPT_ENCODING => '',
                                                                CURLOPT_MAXREDIRS => 10,
                                                                CURLOPT_TIMEOUT => 0,
                                                                CURLOPT_FOLLOWLOCATION => true,
                                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                CURLOPT_CUSTOMREQUEST => 'POST',
                                                                CURLOPT_POSTFIELDS => '{
                                                            "amount" : ' . $paymentAmount . ',
                                                            "partner_reff" : "' . $order_id . '",
                                                            "customer_id" : "' . $phoneNumber . '",
                                                            "customer_name" : "' . $customerVaName . '",
                                                            "expired" : "' . $expired . '",
                                                            "username" : "' . $username_linkqu . '",
                                                            "pin" : "' . $pin_linkqu . '",
                                                            "retail_code" : "' . $paymentMethod . '",
                                                            "customer_phone" : "' . $phoneNumber . '",
                                                            "customer_email" : "' . $email . '",
                                                            "signature" : "' . $signature . '"
                                                        }',
                                                                CURLOPT_HTTPHEADER => array(
                                                                    'client-id: ' . $id_linkqu . ' ',
                                                                    'client-secret: ' . $secret_linkqu . ''
                                                                ),
                                                            )
                                                        );

                                                        $result = json_decode(curl_exec($curl), true);

                                                        if ($result['response_code'] == 00) {
                                                            $payment_code = $result['payment_code'];
                                                        } else {
                                                            $payment_code = $result['error'];
                                                        }




                                                    } else if ($method[0]['type'] == 'QRIS') {

                                                        $curl = curl_init();

                                                        curl_setopt_array(
                                                            $curl,
                                                            array(
                                                                CURLOPT_URL => '' . $url . '/linkqu-partner/transaction/create/qris',
                                                                CURLOPT_RETURNTRANSFER => true,
                                                                CURLOPT_ENCODING => '',
                                                                CURLOPT_MAXREDIRS => 10,
                                                                CURLOPT_TIMEOUT => 0,
                                                                CURLOPT_FOLLOWLOCATION => true,
                                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                CURLOPT_CUSTOMREQUEST => 'POST',
                                                                CURLOPT_POSTFIELDS => '{
                                                            "amount" : ' . $paymentAmount . ',
                                                            "partner_reff" : "' . $order_id . '",
                                                            "customer_id" : "' . $phoneNumber . '",
                                                            "customer_name" : "' . $customerVaName . '",
                                                            "expired" : "' . $expired . '",
                                                            "username" : "' . $username_linkqu . '",
                                                            "pin" : "' . $pin_linkqu . '",
                                                            "customer_phone" : "' . $phoneNumber . '",
                                                            "customer_email" : "' . $email . '",
                                                            "signature" : "' . $signature . '"
                                                        }',
                                                                CURLOPT_HTTPHEADER => array(
                                                                    'client-id: ' . $id_linkqu . ' ',
                                                                    'client-secret: ' . $secret_linkqu . ''
                                                                ),
                                                            )
                                                        );


                                                        $result = json_decode(curl_exec($curl), true);

                                                      


                                                        if ($result['response_code'] == 00) {
                                                            $payment_code = $result['imageqris'];
                                                        } else {
                                                            $payment_code = $result['error'];
                                                        }






                                                    }



                                                } else if ($method[0]['provider'] == 'Balance') {

                                                    if ($this->users == false) {
                                                        $this->session->setFlashdata('error', 'Silahkan login dahulu');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    } else if ($this->users['balance'] == 0) {
                                                        $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    } else if ($this->users['balance'] < $price) {
                                                        $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    } else {

                                                        $combinedString = strtolower($product[0]['product'] . ' ' . $games[0]['games'] . ' ' . $games[0]['category']);
                                                        $keywords = implode('|', ['e-wallet', 'e-money', 'money', 'wallet', 'saldo', 'pulsa' , 'pln', 'ovo', 'dana', 'linkaja', 'gopay', 'shopee', 'pay','saku','grab','tix']);
                                                        $excludeKeywords = implode('|', ['steam']);
                                                        
                                                        if (!preg_match("/$excludeKeywords/i", $combinedString) && preg_match("/$keywords/i", $combinedString)) {
                                                            $this->session->setFlashdata('error', 'Metode pembayaran yang dipilih tidak dapat digunakan untuk produk ini.');
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                        
                                                        $balance = $this->users['balance'] - $price;
                                                        
                                                        if ( ($balance) >  $this->users['balance'] ){
                                                        	$this->session->setFlashdata('error', 'Minus');
                                                        	return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                        
                                                        if ($price <= 0) {
                                                            $this->session->setFlashdata('error', 'Invalid price');
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                        
                                                        // Lakukan update saldo secara atomik
                                                        $update_success = $this->M_Base->data_update_atomic('users', $this->users['id'], -$price);
                                                        
                                                        // Cek hasil update
                                                        if ($update_success) {
                                                            // Ambil data pengguna terbaru setelah update saldo
                                                            $data_users_new = $this->M_Base->data_where('users', 'id', $this->users['id']);
                                                            
                                                            // Hitung saldo sebelum dan sesudah
                                                            $saldosb = $data_users_new[0]['balance'] + $price;
                                                            $saldost = $data_users_new[0]['balance'];
                                                        
                                                            // Lakukan operasi lainnya di sini jika diperlukan
                                                        } else {
                                                            // Jika update gagal, set error message
                                                            $this->session->setFlashdata('error', 'Insufficient balance or transaction error');
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                        
                                                        $payment_code = 'Saldo Akun';
                                                        $status = 'Processing';
                                                        $method[0]['code'] = 'Balance';
                                                        $method[0]['type'] = 'Balance';

                                                        if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                            $customer_no = $data_post['user_id'] . $data_post['zone_id'];
                                                        } else {
                                                            $customer_no = $data_post['user_id'];
                                                        }

                                                        if ($product[0]['provider'] == 'DF') {

                                                            $result = $this->M_Base->df_order($product[0]['sku'], $customer_no, $order_id);

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

                                                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                                $data_post['zone_id'] = $data_post['zone_id'];
                                                            } else {
                                                                $data_post['zone_id'] = '';
                                                            }

                                                            $result = $this->M_Base->lg_order($product[0]['sku'], $data_post['user_id'], $data_post['zone_id'], $order_id);

                                                            if ($result['code'] == 'SUCCESS') {
                                                                if (isset($result['data'])) {
                                                                    $status = 'Processing';
                                                                    $ket = 'Pesanan sedang diproses';
                                                                    $trx = $result['data']['tid'];

                                                                }
                                                            } else {
                                                                $ket = $result['code'];
                                                            }


                                                        } else if ($product[0]['provider'] == 'Manual') {

                                                            $status = 'Processing';
                                                            $ket = 'Pesanan siap diproses';

                                                        } else if ($product[0]['provider'] == 'AG') {

                                                            $result = $this->M_Base->ag_v2_order($product[0]['sku'], $data_post['user_id'], $data_post['zone_id'], $order_id);

                                                            if ($result['status'] == 0) {
                                                                $ket = $result['error_msg'];
                                                            } else {

                                                                if ($result['data']['status'] == 'Sukses') {
                                                                    $status = 'Success';
                                                                }

                                                                $ket = $result['data']['sn'];
                                                            }

                                                        } else if ($product[0]['provider'] == 'VG') {

                                                        if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                            $data_post['zone_id'] = $data_post['zone_id'];
                                                        } else {
                                                            $data_post['zone_id'] = '';
                                                        }

                                                        $result = $this->M_Base->voca_order($product[0]['product_id'], $product[0]['sku'], $data_post['user_id'], $data_post['zone_id'], $order_id, $product[0]['raw_price']);
                                                        

                                                        if (isset($result['error'])) {
                                                            $ket = $result['error'].', '. $result['message'];
                                                             $trx = $order_id;

                                                        } else {
                                                           
                                                             
                                                             $status = 'Processing';
                                                                $ket = $result['message'];
                                                                $trx = $result['data']['invoiceId'];
                                                        }


                                                        } else if ($product[0]['provider'] === 'HS') {

                                                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                                $customerno = $data_post['user_id'] . '|' . $data_post['zone_id'];
                                                            } else {
                                                                $customerno = $data_post['user_id'];
                                                            }

                                                            $hs_key = $this->M_Base->u_get('hopestore-key');

                                                            $result = $this->M_Base->post(
                                                                'https://hopestore.id/api/order',
                                                                [
                                                                    'api_key' => $hs_key,
                                                                    'action' => 'order',
                                                                    'service_id' => $product[0]['sku'],
                                                                    'target' => $customerno,
                                                                    'kontak' => '',
                                                                ]
                                                            );

                                                            if ($result) {
                                                                if ($result['status'] == false) {
                                                                    $ket = $result['msg'];
                                                                } else {
                                                                    $ket = $result['data']['keterangan'] !== '' ? $result['data']['keterangan'] : $result['msg'];
                                                                    $status = 'Processing';
                                                                    $trx = $result['data']['id'];
                                                                }
                                                            } else {
                                                                $ket = 'Failed Order';
                                                            }

                                                        } else {
                                                            $ket = 'Provider tidak ditemukan';
                                                        }


                                                    }

                                                } else if ($method[0]['provider'] == 'Tokopay') {
            
                                                        $merchant_id = $this->M_Base->u_get('tokopay-merchant'); // dari duitku
                                                        $apiKey = $this->M_Base->u_get('tokopay-secret-key'); // dari duitku
                                                        $amount = $price;
                                                        $kode_channel = $method[0]['code'];
                                                        $reff_id = $order_id;
                                                        $productDetails = $product[0]['product'];
                                                        $email = $order_id.'@hiddengame.id'; // email pelanggan anda
                                                        $phoneNumber = $data_post['wa']; // nomor telepon pelanggan anda (opsional)
                                                        $customerVaName = 'hiddengame ' . $order_id; // tampilan nama pada tampilan konfirmasi bank
                                                        $callbackUrl = base_url() . '/sistem/callback/TokoPayPoInGOo1239als08207'; // url untuk callback
                                                        $returnUrl = base_url() . '/payment/' . $order_id; // url untuk redirect
                                                        $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
                                                        $expired_ts = time() + $expiryPeriod;
                                                        $signature = md5($merchant_id . ':' . $apiKey . ':' . $reff_id);
            
                                                        $item1 = array(
                                                            'product_code' => $product[0]['sku'],
                                                            'name' => $product[0]['product'],
                                                            'price' => $price
                                                        );
            
                                                        $items = array($item1);
            
                                                        $curl = curl_init();
    
                                                        curl_setopt_array($curl, array(
                                                          CURLOPT_URL => 'https://api.tokopay.id/v1/order',
                                                          CURLOPT_RETURNTRANSFER => true,
                                                          CURLOPT_ENCODING => '',
                                                          CURLOPT_MAXREDIRS => 10,
                                                          CURLOPT_TIMEOUT => 0,
                                                          CURLOPT_FOLLOWLOCATION => true,
                                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                          CURLOPT_CUSTOMREQUEST => 'POST',
                                                          CURLOPT_POSTFIELDS =>'{
                                                            "merchant_id": "'.$merchant_id.'",
                                                            "kode_channel": "'.$kode_channel.'",
                                                            "reff_id": "'.$reff_id.'",
                                                            "amount": '.$amount.',
                                                            "customer_name": "'.$customerVaName.'",
                                                            "customer_email": "'.$email.'",
                                                            "customer_phone": "'.$phoneNumber.'",
                                                            "redirect_url": "'.$returnUrl.'",
                                                            "expired_ts": '.$expired_ts.',
                                                            "signature": "'.$signature.'",
                                                            "items": '.json_encode($items).'
                                                        }',
                                                          CURLOPT_HTTPHEADER => array(
                                                            'Merchant-Code: ' . $merchant_id,
                                                            'Authorization: ' . $apiKey,
                                                            'Content-Type: application/json'
                                                          ),
                                                        ));
                                                        
                                                        $response = curl_exec($curl);
                                                        
                                                           $log_file_name = 'log_tokopay_' . date("j.n.Y") . '.txt'; // Include time in the log file name
            $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
            fwrite($file, date('Y-m-d H:i:s') . ' ' . $response.' |'.$reff_id . "\n"); // Include time in the log message
            fclose($file);
            
                                                        $result = json_decode($response, true);
                                                        
                                                        curl_close($curl);
            
                                                        if ($result['status'] === 'Success') {
            
                                                            if (array_key_exists('nomor_va', $result['data'])) {
                                                                $payment_code = $result['data']['nomor_va'];
                                                            } else if (array_key_exists('qr_link', $result['data'])) {
                                                                $payment_code = $result['data']['qr_link'];
                                                            } else if (array_key_exists('ovo_push', $result['data'])) {
                                                                $payment_code = $result['data']['ovo_push'];
                                                            } else {
                                                                $payment_code = $result['data']['checkout_url'];
                                                            }
                                                            $trx = $result['data']['trx_id'];
                                                        } elseif ($result['status'] == 0) {
                                                            $this->session->setFlashdata('error', 'Result : ' . $result['error_msg']);
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
            
                                                } else if ($method[0]['provider'] == 'Manual') {
                                                    $payment_code = $method[0]['rek'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Metode tidak terdaftar');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }

                                            if (empty($method[0]['type'])) {
                                                $method[0]['type'] = "";
                                            }
                                            
                                            if (empty($trx) OR $trx == null) {
                                                $trx = $order_id;
                                            }
                                            
                                            $this->M_Base->data_insert('orders', [
                                                'order_id' => $order_id,
                                                'username' => $username,
                                                'wa' => $data_post['wa'],
                                                'fee' => $fee,
                                                'product_id' => $product[0]['id'],
                                                'product' => $data_post['quantity'].'x qty '. $product[0]['product'],
                                                'price' => $price,
                                                'raw_price' => $product[0]['raw_price'],
                                                'user_id' => $data_post['user_id'],
                                                'zone_id' => $data_post['zone_id'],
                                                'nickname' => preg_replace('/[^\p{L}\p{N}\s]/u', '', $data_post['username']),
                                                'method_id' => $method[0]['id'],
                                                'method_code' => $method[0]['code'],
                                                'method' => $method[0]['method'],
                                                'games' => $games[0]['games'],
                                                'games_id' => $games[0]['id'],
                                                'status' => $status,
                                                'ket' => $ket,
                                                'qty' => $data_post['quantity'],
                                                'trx_id' => $trx,
                                                'voucher' => $voucher,
                                                'payment_gateway' => $method[0]['provider'],
                                                'payment_code' => $payment_code,
                                                'payment_type' => $method[0]['type'],
                                                'provider' => $product[0]['provider'],
                                                'date' => date('Y-m-d'),
                                                'date_create' => date('Y-m-d G:i:s'),
                                                'date_process' => date('Y-m-d G:i:s'),
                                            ]);

                                            if (in_array($status, ['Pending', 'Processing'])) {
                                                $this->M_Base->fonnte_pending($data_post['wa'], $product[0]['product'], $order_id, $method[0]['method'], $harga);
                                            }

                                            $this->session->setFlashdata('success', 'Pesanan berhasil dibuat');
                                            if ($redirect == true) {
                                                return redirect()->to($payment_code);
                                            } else {
                                                return redirect()->to(base_url() . '/user/payment/' . $order_id);
                                            }

                                        } else {
                                            $this->session->setFlashdata('error', 'Metode pembayaran sedang gangguan');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } else {
                                        $this->session->setFlashdata('error', 'Metode pembayaran tidak ditemukan');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }

                                } else {
                                    $this->session->setFlashdata('error', 'Produk sedang gangguan');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Produk tidak ditemukan');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                    }

                    $all_product = array_reverse($this->M_Base->data_where_array('product', [
                        'games_id' => $games[0]['id'],
                        'status' => 'On',
                    ], 'sort'));

                    $all_method = $this->M_Base->data_where('method', 'status', 'On');

                    $accordion_data = [];

                    foreach ($all_method as $method) {
                        if (!isset($accordion_data[$method['type']])) {
                            $accordion_data[$method['type']] = [];
                        }
                        array_push($accordion_data[$method['type']], array('method' => $method['method'], 'image' => $method['image'], 'id' => $method['id'], 'code' => $method['code'], 'provider' => $method['provider'], 'tambahan' => $method['tambahan']));
                    }

                    $category_id = [];
                    foreach ($all_product as $loop) {
                        if (!empty($loop['category_id']) and $loop['category_id'] !== 0) {
                            $category_id[] = $loop['category_id'];
                        }
                    }

                    $category = [];
                    $product = [];

                    foreach (array_reverse((array_unique($category_id))) as $loop) {

                        $data_category = $this->M_Base->data_where('product_category', 'id', $loop);

                        if (count($data_category) == 1) {
                            $category[] = $data_category[0];

                            $product[$loop] = array_reverse($this->M_Base->data_where_array('product', [
                                'games_id' => $games[0]['id'],
                                'category_id' => $loop,
                                'status' => 'On',
                            ], 'sort'));
                        }
                    }

                    $data = array_merge($this->base_data, [
                        'title' => $games[0]['games'],
                        'games' => $games[0],
                        'pay_balance' => $this->M_Base->u_get('pay_balance'),
                        'method' => $this->M_Base->data_where('method', 'status', 'On'),
                        'product' => $all_product,
                        'accordion_data' => $accordion_data,
                        'category' => $category,
                        'products' => $product,
                        'popup' => [
                            'title' => $this->M_Base->u_get('popup_title'),
                            'desc' => $this->M_Base->u_get('popup_desc'),
                            'date' => $this->M_Base->u_get('popup_date'),
                            'status' => $this->M_Base->u_get('popup_status'),
                            'image' => $this->M_Base->u_get('popup_image'),
                        ],
                    ]);

                    return view('User/Games/index', $data);

                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function order($action = null, $id = null)
    {

        if ($action === 'get-price') {
            if (is_numeric($id)) {
                $product = $this->M_Base->data_where('product', 'id', $id);

                $jumlah = 1;
                if ($this->request->getPost('jumlah')) {
                    if (is_numeric($this->request->getPost('jumlah'))) {
                        $jumlah = addslashes(trim(htmlspecialchars($this->request->getPost('jumlah'))));
                    }
                }

                if (count($product) == 1) {

                    $level = 'Members';
                    $product_price = $product[0]['price'];

                    if ($this->users !== false) {
                        $level = $this->users['level'];

                        if ($level == 'Silver') {
    
                            if ($product[0]['price_silver'] == 0 or empty($product[0]['price_silver'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_silver'];
                            }
    
    
                        } else if ($level == 'Gold') {
    
                            if ($product[0]['price_gold'] == 0 or empty($product[0]['price_gold'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_gold'];
                            }
    
                        } else if ($level == 'Platinum') {
    
                            if ($product[0]['price_platinum'] == 0 or empty($product[0]['price_platinum'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_platinum'];
                            }
    
                        } else if ($level == 'Diamond') {
    
                            if ($product[0]['price_diamond'] == 0 or empty($product[0]['price_diamond'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_diamond'];
                            }
    
                        } else if ($level == 'Member') {
    
                            if ($product[0]['price_bronze'] == 0 or $product[0]['price_bronze'] < 500 or empty($product[0]['price_bronze'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_bronze'];
                            }
    
                        } else {
                            $product_price = $product[0]['price'];
                        }
                    }

                    $price = [];
                    foreach ($this->M_Base->all_data('method') as $loop) {

                        $custom_price = $product_price;

                        $price[] = [
                            'method' => $loop['id'],
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }

                    if ($this->M_Base->u_get('pay_balance') == 'Y') {

                        $custom_price = $product_price;

                        $price[] = [
                            'method' => 'balance',
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }

                    echo json_encode($price);
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if ($action === 'verify') {
            $enteredPIN = $this->request->getPost('pin');
            $username = $this->users['username'];
            
            $user = $this->M_Base->data_where('users', 'username', $username);
            
            if (!empty($user) && password_verify($enteredPIN, $user[0]['pin'])) {
                echo json_encode(['isValid' => true]);
            } else {
                echo json_encode(['isValid' => false]);
            }
        } else if ($action == 'get-detail') {

            if ($this->request->getPost('user_id') and $this->request->getPost('zone_id') and $this->request->getPost('method') and $this->request->getPost('wa')) {
                $data_post = [
                    'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                    'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                    'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                    'product' => $id,
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                    'voucher' => addslashes(trim(htmlspecialchars($this->request->getPost('voucher')))),
                    'quantity' => addslashes(trim(htmlspecialchars($this->request->getPost('quantity')))),

                ];

                $product = $this->M_Base->data_where('product', 'id', $data_post['product']);

                if (count($product) === 1) {

                    if ($data_post['method'] === 'balance') {
                        $method = [
                            [
                                'method' => 'Saldo Akun',
                            ],
                        ];
                    } else {
                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                    }

                    if (count($method) === 1) {

                        $games = $this->M_Base->data_where('games', 'id', $product[0]['games_id']);

                        if (count($games) == 1) {

                            $price = $this->M_Base->data_where_array('price', [
                                'method_id' => $data_post['method'],
                                'product_id' => $data_post['product'],
                            ]);

                            $real_price = count($price) == 1 ? $price[0]['price'] : $product[0]['price'];

                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                $target = $data_post['user_id'] . $data_post['zone_id'];
                            } else {
                                $target = $data_post['user_id'];
                            }

                            if ($games[0]['check_status'] == 'Y') {

                                $key = '82800b75fa79e65';

                                $url_en = 'aHR0cHM6Ly9hbGZhdGhhbi5teS5pZA==';
                                $url_de = base64_decode($url_en);

                                if (in_array($games[0]['check_code'], array('mobilelegends', 'mobilelegend'))) {
                                    $urlcek = '' . $url_de . '/api/game/mobile-legends/?id=' . $data_post['user_id'] . '&zone=' . $data_post['zone_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('freefire', 'free-fire'))) {
                                    $urlcek = '' . $url_de . '/api/game/free-fire/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('higgsdomino', 'higgs'))) {
                                    $urlcek = '' . $url_de . '/api/game/higgsdomino/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('valorant', 'wildrift'))) {
                                    $encoded = str_replace('%', '%25', urlencode($data_post['user_id']));
                                    $urlcek = '' . $url_de . '/api/game/' . $games[0]['check_code'] . '/?id=' . $encoded . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('azur-lane', 'gensin', 'hyperfront', 'punishing', 'ragnarokm', 'ragnarokx'))) {
                                    $zoneid = $data_post['zone_id'];
                                    $zoneid_mapping = array(
                                        'azur-lane' => array(
                                            'avrora' => '1',
                                            'lexington' => '2',
                                            'Sandy' => '3',
                                            'Washington' => '4',
                                            'Amagi' => '5'
                                        ),
                                        'gensin' => array(
                                            'asia' => 'os_asia',
                                            'usa' => 'os_usa',
                                            'america' => 'os_usa',
                                            'Europe' => 'os_euro',
                                            'euro' => 'os_euro',
                                            'hk' => 'os_cht',
                                            'cht' => 'os_cht'
                                        ),
                                        'hyperfront' => array(
                                            'SEA' => '10000',
                                            'BR' => '10100',
                                            'AU' => '10200',
                                            'NA' => '10300',
                                            'LA' => '10400',
                                            'MENA' => '10600',
                                            'EU' => '10700'
                                        ),
                                        'punishing' => array(
                                            'Asia' => '5000',
                                            'Europe' => '5001',
                                            'America' => '5002'
                                        ),
                                        'ragnarokm' => array(
                                            'Eternal' => '90001',
                                            'Midnight' => '90002',
                                            'Memory' => '90002003'
                                        ),
                                        'ragnarokx' => array(
                                            'Opera Phantom' => '2010',
                                            'Wing of Blessing' => '2011',
                                            'Royal Instrument' => '2012',
                                            'Valhalla' => '2013',
                                            'Gungnir' => '2014',
                                            'Central Plains' => '2015',
                                            'Dark Lord' => '2016',
                                            'Clock Tower' => '2017',
                                            'Comodo' => '2018',
                                            'Temple of Dawn' => '2020',
                                            'Golden Lava' => '2021',
                                            'Highland' => '2022',
                                            'Demon' => '2023',
                                            'Sealed Island' => '2024',
                                            'Sipera' => '2025',
                                            'Silent Ship' => '2030',
                                            'Golden Route' => '2031',
                                            'Sapir' => '2032',
                                            'Rose Red' => '2033',
                                            'Kingdom of Freedom' => '2034',
                                            'Nicola' => '2035',
                                            'Crystal Waterfall' => '2040',
                                            'Bifrost' => '2041',
                                            'Nastia' => '2042',
                                            'Strouf Treasury' => '2043',
                                            'Green Tranquil Pond' => '2044',
                                            'Ingael' => '2045',
                                            'Tome of Glory' => '2050',
                                            'Incense Pavilion' => '2051',
                                            'Carew' => '2052',
                                            'Boulders and Horns' => '2053',
                                            'Exquisite Pond' => '2054',
                                            'Nemesis' => '2055',
                                            'Aldebaran' => '2056',
                                            'Honor of Emperium' => '2057',
                                            'Bright Lotus Pond' => '2060',
                                            'Seocho Market' => '2061',
                                            'Eudora' => '2062',
                                            'Moonlit Temple' => '2063',
                                            'Hidden Wood Ruins' => '2064',
                                            'Dungeon Throne' => '2065',
                                            'Dimension Door' => '2066',
                                            'Ayothaya' => '2070',
                                            'Luzon' => '2071',
                                            'Majapahit' => '2072',
                                            'Garden City' => '2073',
                                            'Manila' => '2074',
                                            'Sukhothai' => '2075',
                                            'Attack On Poring' => '2076',
                                            'Tossakan' => '2080',
                                            'Badang' => '2081',
                                            'Lapulapu' => '2082',
                                            'Gatotkaca' => '2083',
                                            'Srikandi' => '2084',
                                            'Kumpakan' => '2085',
                                            'Angeling' => '2090',
                                            'Deviling' => '2091',
                                            'Ghostring' => '2092',
                                            'Mastering' => '2093',
                                            'Song Tử' => '2100',
                                            'Xử Nữ' => '2101',
                                            'Half Anniversary' => '2110'
                                        ),
                                    );

                                    $game_code = $games[0]['check_code'];
                                    $zoneid = strtolower($zoneid);

                                    if (isset($zoneid_mapping[$game_code])) {
                                        $zoneid_map = $zoneid_mapping[$game_code];
                                        foreach ($zoneid_map as $key => $value) {
                                            if (strpos($zoneid, strtolower($key)) !== false) {
                                                $zoneid = $value;
                                                break;
                                            }
                                        }
                                    }

                                    $urlcek = '' . $url_de . '/' . $game_code . '/?id=' . $data_post['user_id'] . '&server=' . $zoneid . '&key=' . $key . '';

                                } else {
                                    $urlcek = '' . $url_de . '/api/game/' . $games[0]['check_code'] . '/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                }

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => $urlcek,
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

                                if (isset($result['error_msg'])) {

                                    if (in_array($games[0]['check_code'], array('mobilelegends', 'mobilelegend'))) {
                                        $cekkode = 'mobilelegend';
                                    } else if (in_array($games[0]['check_code'], array('freefire', 'free-fire'))) {
                                        $cekkode = 'freefire';
                                    } else if (in_array($games[0]['check_code'], array('higgsdomino', 'higgs'))) {
                                        $cekkode = 'higgs';
                                    }

                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://v1.apigames.id/merchant/M220624ANIH7980TY/cek-username/' . $cekkode . '?user_id=' . $target . '&signature=fe51f2abf7d4796429b92d3fa64568c3',
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

                                    $resultx = curl_exec($curl);
                                    $resultx = json_decode($resultx, true);
                                    $nickname = '';

                                    if ($resultx) {
                                        if ($resultx['status'] == 1) {

                                            $nickname = $resultx['data']['username'];
                                            $orderToken = $this->generateOrderToken();
                                            echo json_encode([
                                                'status' => true,
                                                'msg' => '
                                        <form action="" method="POST">

                                            <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                            <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                            <input type="hidden" name="username" value="' . $result['data']['username'] . '">
                                            <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                            <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                            <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                            <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                            <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">
                                            <input type="hidden" name="quantity" value="' . $data_post['quantity'] . '">
                                            <input type="hidden" name="order_token" value="'.$orderToken.'">

                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nickname:</td>
                                                        <td class="text-left pt-2 pb-2"><b> ' . $nickname . ' </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">UserID:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                            </div>
                                        </form>
                                        ',
                                            ]);

                                        } else if ($resultx['status'] == 0) {
                                            echo json_encode([
                                                'status' => false,
                                                'msg' => 'Usernames tidak Ditemukan',
                                            ]);
                                        }
                                    } else {
                                        echo json_encode([
                                            'status' => false,
                                            'msg' => 'Akuns gagal dicek'
                                        ]);
                                    }
                                } else {
                                    if ($result) {
                                        if (isset($result['nickname'])) {

                                            $nickname = $result['nickname'];
                                            
                                            $orderToken = $this->generateOrderToken();

                                            echo json_encode([
                                                'status' => true,
                                                'msg' => '
                                        <form action="" method="POST">

                                            <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                            <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                            <input type="hidden" name="username" value="' . $result['data']['username'] . '">
                                            <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                            <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                            <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                            <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                            <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">
                                            <input type="hidden" name="quantity" value="' . $data_post['quantity'] . '">
                                            <input type="hidden" name="order_token" value="'.$orderToken.'">

                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nickname:</td>
                                                        <td class="text-left pt-2 pb-2"><b> ' . $nickname . ' </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">UserID:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                            </div>
                                        </form>
                                        ',
                                            ]);

                                        } else {
                                            echo json_encode([
                                                'status' => false,
                                                'msg' => 'Username tidak Ditemukan .xal',
                                            ]);
                                        }
                                    } else {
                                        echo json_encode([
                                            'status' => false,
                                            'msg' => 'Akun gagal dicek .xal'
                                        ]);
                                    }
                                }






                            } else {

                                $html_target = '';

                                if ($this->request->getPost('target')) {
                                    if ($this->request->getPost('target') !== 'joki') {
                                        $html_target = '<tr>
                                            <td class="text-left pt-2 pb-2">UserID:</td>
                                            <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                        </tr>';
                                    }
                                }
                                if ($this->request->getPost('target')) {
                                    if ($this->request->getPost('target') !== 'jokigendong') {
                                        $html_target = '<tr>
                                            <td class="text-left pt-2 pb-2">UserID:</td>
                                            <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                        </tr>';
                                    }
                                }
                                
                                $orderToken = $this->generateOrderToken();

                                echo json_encode([
                                    'status' => true,
                                    'msg' => '
                                    <form action="" method="POST">

                                        <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                        <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                        <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                        <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                        <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                        <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                        <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">
                                        <input type="hidden" name="quantity" value="' . $data_post['quantity'] . '">
                                        <input type="hidden" name="order_token" value="'.$orderToken.'">

                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                </tr>
                                                ' . $html_target . '
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                        </div>
                                    </form>
                                    ',
                                ]);
                            }
                        } else {
                            echo json_encode([
                                'status' => false,
                                'msg' => 'Games tidak ditemukan',
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'status' => false,
                            'msg' => 'Metode pembayaran tidak ditemukan',
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => false,
                        'msg' => 'Produk tidak ditemukan',
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => false,
                    'msg' => 'Pembelian gagal dilakukan',
                ]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function voucher($product_id = null)
    {

        if ($product_id) {
            if (is_numeric($product_id)) {
                if ($this->request->getPost('voucher')) {

                    $voucher = addslashes(trim(htmlspecialchars($this->request->getPost('voucher'))));

                    if (!empty($voucher)) {

                        $array = [
                            'success' => false,
                            'msg' => 'Produk tidak ditemukan',
                        ];

                        $product = $this->M_Base->data_where('product', 'id', $product_id);

                        if (count($product) == 1) {

                            $data_voucher = $this->M_Base->data_where_array('voucher', [
                                'voucher' => $voucher,
                                'status' => 'Active',
                            ]);

                            if (count($data_voucher) === 1) {

                                if ($product[0]['price'] < $data_voucher[0]['min']) {
                                    $array['msg'] = 'Minimal nominal transaksi Rp ' . number_format($data_voucher[0]['min'], 0, ',', '.') . ' untuk menggunakan voucher ini';
                                } else {

                                    $orders = $this->M_Base->data_count('orders', [
                                        'voucher' => $voucher,
                                    ]);


                                    $potongan = (($product[0]['price']) / 100) * $data_voucher[0]['diskon'];

                                    if ($potongan > $data_voucher[0]['max_diskon']) {
                                        $potongan = $data_voucher[0]['max_diskon'];
                                    }

                                    if ($orders <= $data_voucher[0]['max_use']) {

                                        $valid = false;
                                        if ($data_voucher[0]['type_produk'] == 'all') {
                                            $valid = true;
                                        } else {
                                            if (in_array($product[0]['id'], explode(',', $data_voucher[0]['produk']))) {
                                                $valid = true;
                                            }
                                        }

                                        if ($valid == true) {
                                            $array['success'] = true;
                                            $array['msg'] = 'Kode voucher berhasil digunakan, Anda mendapatkan Potongan Harga sebesar Rp ' . number_format($potongan, 0, ',', '.') . '  ';
                                        } else {
                                            $array['msg'] = 'Voucher tidak dapat digunakan untuk nominal ini';
                                        }
                                    } else {
                                        $array['msg'] = 'Kode voucher telah mencapai limit';
                                    }
                                }
                            } else {
                                $array['msg'] = 'Kode voucher tidak ditemukan';
                            }
                        }

                        echo json_encode($array);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}