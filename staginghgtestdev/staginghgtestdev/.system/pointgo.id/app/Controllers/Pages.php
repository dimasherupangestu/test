<?php

namespace App\Controllers;

class Pages extends BaseController {
    
    public function topsepuluh() {

        $data = array_merge($this->base_data, [
    		'title' => 'Leaderboard',
            'menu_active' => 'leaderboard',
    	]);
    	
        return view('Pages/topsepuluh', $data);
    }
    
    public function get_top_3_daily() {

    $today_ranking = $this->M_Base->data_where_array('today_ranking', []);

  
    usort($today_ranking, function($a, $b) {
        return $b['total'] - $a['total'];
    });

    $top_3_ranking_daily = array_slice($today_ranking, 0, 3);


    $data = array();
    foreach ($top_3_ranking_daily as $index => $today) {
        $data[$index] = array(
            'no' => $index + 1,  
            'id' => $today['id'],
            'fullname' => $monthly['fullname'],
            'username' => $today['username'],
            'total' => 'Rp ' . number_format($today['total'], 0, ',', '.'),
        );
    }

    $response = array(
        'totalNotFiltered' => count($data),
        'rows' => $data
    );

    echo json_encode($response);
}
    
    public function get_top_sepuluh_daily() {
        
        $today_ranking = $this->M_Base->data_where_array_limit('today_ranking', [], 50);
        
        $data = array();
        foreach ($today_ranking as $index => $today) {
          
            $data[$index] = array(
                'no' => $today['no'],
                'id' => $today['id'],
                'fullname' => $monthly['fullname'],
                'username' => $today['username'],
                'total' => 'Rp ' . number_format($today['total'], 0, ',', '.'),
            );
        }
        
        $data = array_reverse($data);
        
        $response = array(
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
    
    }
    
    public function get_top_3_weekly() {

    $weekly_ranking = $this->M_Base->data_where_array('weekly_ranking', []);

  
    usort($weekly_ranking, function($a, $b) {
        return $b['total'] - $a['total'];
    });

    $top_3_ranking_weekly = array_slice($weekly_ranking, 0, 3);


    $data = array();
    foreach ($top_3_ranking_weekly as $index => $weekly) {
        $data[$index] = array(
            'no' => $index + 1,  
            'id' => $weekly['id'],
            'fullname' => $monthly['fullname'],
            'username' => $weekly['username'],
            'total' => 'Rp ' . number_format($weekly['total'], 0, ',', '.'),
        );
    }

    $response = array(
        'totalNotFiltered' => count($data),
        'rows' => $data
    );

    echo json_encode($response);
}
    
    public function get_top_sepuluh_weekly() {
        $weekly_ranking = $this->M_Base->data_where_array_limit('weekly_ranking', [], 50);
        
        $data = array();
        foreach ($weekly_ranking as $index => $weekly) {

            $data[$index] = array(
                'no' => $weekly['no'],
                'id' => $weekly['id'],
                'fullname' => $monthly['fullname'],
                'username' => $weekly['username'],
                'total' => 'Rp ' . number_format($weekly['total'], 0, ',', '.'),
            );
        }
        
        $data = array_reverse($data);
        
        $response = array(
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
    }
    
    public function get_top_3_monthly() {

    $monthly_ranking = $this->M_Base->data_where_array('monthly_ranking', []);

  
    usort($monthly_ranking, function($a, $b) {
        return $b['total'] - $a['total'];
    });

    $top_3_ranking_monthly = array_slice($monthly_ranking, 0, 3);


    $data = array();
    foreach ($top_3_ranking_monthly as $index => $monthly) {
        $data[$index] = array(
            'no' => $index + 1,  
            'id' => $monthly['id'],
            'fullname' => $monthly['fullname'],
            'username' => $monthly['username'],
            'total' => 'Rp ' . number_format($monthly['total'], 0, ',', '.'),
        );
    }

    $response = array(
        'totalNotFiltered' => count($data),
        'rows' => $data
    );

    echo json_encode($response);
}
    
    public function get_top_sepuluh_monthly() {
        
        $monthly_ranking = $this->M_Base->data_where_array_limit('monthly_ranking', [], 50);
        
        $data = array();
        foreach ($monthly_ranking as $index => $monthly) {
          
            $data[$index] = array(
                'no' => $monthly['no'],
                'id' => $monthly['id'],
                'fullname' => $monthly['fullname'],
                'username' => $monthly['username'],
                'total' => 'Rp ' . number_format($monthly['total'], 0, ',', '.'),
            );
        }
        
        $data = array_reverse($data);
        
        $response = array(
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
    }
    
    public function postingan() {

        $data = array_merge($this->base_data, [
    		'title' => 'Artikel',
    		'game' => 'Game',
            'menu_active' => 'postingan',
            'post' => $this->M_Base->all_data('post'),
    	]);


        return view('Pages/postingan', $data);
    }
    
    public function tabelharga() {


    $product = [];
                foreach (array_reverse($this->M_Base->all_data('product')) as $loop) {

                    $games = $this->M_Base->data_where_array('games', [
					'id' => $loop['games_id'],
					'status' => 'On'
				    ]);

                    if (count($games) == 1) {
                        if (($games[0]['status']) == 'On') {
                        
                        if ($loop['price_silver'] == 0) {
                            $loop['price_silver'] = $loop['price'] ;
                        }
                        
                        if ($loop['price_gold'] == 0) {
                            $loop['price_gold'] = $loop['price'] ;
                        }

                        $product[] = [
                            'games_id' => $loop['games_id'],
                            'games' => $games[0]['games'],
                            'image' => $games[0]['image'],
                            'product' => $loop['product'],
                            'id' => $loop['id'],
                            'sku' => $loop['sku'],
                            'status' => $loop['status'],
                            'price' => [
                                'member' => $loop['price'],
                                'silver' => $loop['price_silver'],
                                'gold' => $loop['price_gold'],
                                'platinum' => $loop['price_platinum'],
                            ],
                        ];
                    }
                    }

                }

$all_product = $this->M_Base->data_where_array('product', [
                            'status' => 'On',
                        ], 'sort');

$games_id = [];
foreach ($all_product as $loop) {
    if (!empty($loop['games_id']) and $loop['games_id'] !== 0) {
        $games_id[] = $loop['games_id'];
    }
}

$unique_game_ids = array_unique($games_id);
$games = [];
$product = [];

foreach ($unique_game_ids as $game_id) {
     $data_games = $this->M_Base->data_where_array('games', [
					'id' => $game_id,
					'status' => 'On'
				    ]);

    if (count($data_games) == 1) {
        $games[] = $data_games[0];

        $product[$game_id] = array_reverse(array_merge($this->M_Base->data_where_array('product', [
            'games_id' => $game_id,
            'status' => 'On',
        ], 'sort')));
    }
}
        
        $data = array_merge($this->base_data, [
    		'title' => 'Tabel Harga Member',
            'tabel' => $product,
            'product' => $all_product,
            'games' => $games,
            'products' => $product,
            'menu_active' => 'tabelharga',
    	]);

        return view('Pages/tabelharga', $data);
    }
    
    public function reseller() {

    	$data = array_merge($this->base_data, [
    		'title' => 'Reseller',
            'menu_active' => 'Reseller',
            'price' => [
                'silver' => $this->M_Base->getValueColumn2byValueColumn1('member_level', 'level', 'Silver', 'price'),
                'gold' => $this->M_Base->getValueColumn2byValueColumn1('member_level', 'level', 'Gold', 'price'),
                'platinum' => $this->M_Base->getValueColumn2byValueColumn1('member_level', 'level', 'Platinum', 'price'),
            ],
    	]);

        return view('Pages/reseller', $data);
    }
    
    public function kalkulatorwr() {

        $data = array_merge($this->base_data, [
    		'title' => 'Kalkulator WR',
            'menu_active' => 'kalkulatorwr',
    	]);

        return view('Pages/kalkulatorwr', $data);
    }
    
    public function kalkulatorzodiac(){

        $data = array_merge($this->base_data, [
            'title' => 'Kalkulator Zodiac',
            'menu_active' => 'kalkulatorzodiac',
        ]);

        return view('Pages/kalkulatorzodiac', $data);
    }
    
    public function hpmagicwheel() {

        $data = array_merge($this->base_data, [
    		'title' => 'HP Magic Wheel',
            'menu_active' => 'hpmagicwheel',
    	]);

        return view('Pages/hpmagicwheel', $data);
    }
    
    public function news() {

        $data = array_merge($this->base_data, [
    		'title' => 'News',
            'menu_active' => 'news',
    	]);

        return view('Pages/news', $data);
    }

    public function sk() {

    	$data = array_merge($this->base_data, [
    		'title' => 'Syarat & Ketentuan',
            'page_sk' => $this->M_Base->u_get('page_sk'),
    	]);

        return view('Pages/sk', $data);
    }

    public function price() {

        $product = [];
        foreach (array_reverse($this->M_Base->all_data_order('games', 'sort')) as $game) {
            $data_product = $this->M_Base->data_where_array('product', [
                'games_id' => $game['id']
            ], 'price');

            if (count($data_product) !== 0) {
                $product[] = [
                    'games' => $game['games'],
                    'image' => $game['image'],
                    'product' => array_reverse($data_product),
                ];
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Harga',
            'price' => $product,
            'menu_active' => 'Price',
    	]);

        return view('Pages/price', $data);
    }

    public function method() {

    	$data = array_merge($this->base_data, [
    		'title' => 'Metode',
            'method' => $this->M_Base->all_data('method'),
            'menu_active' => 'Method',
    	]);

        return view('Pages/method', $data);
    }

    public function forgotpass() {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        if ($this->request->getPost('forgotpass')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $users = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($users) === 1) {
                    if ($users[0]['username'] === $data_post['username']) {
                        if ($users[0]['status'] === 'On') {
                            
                            $phone_number = $users[0]['wa'];
                            $token = bin2hex(random_bytes(16));
                            $url = base_url('resetpasslink/' . $token);
                            $message = "Klik tautan ini untuk mereset password Anda, Link hanya berlaku selama 5 Menit : $url";
                            $this->M_Base->wa($phone_number, $message);

                            
                            $this->M_Base->data_update('users', [
                                'token_key' => $token,
                                'token_time' => date('Y-m-d G:i:s'),
                            ], $users[0]['id']);
                
                            $this->session->setFlashdata('success', 'Link Lupa Password telah telah dikirim ke no Whatsapp Anda');
                            return redirect()->to(base_url() . '/forgotpass');
                            
                        } else {
                            $this->session->setFlashdata('error', 'Akun kamu telah dinonaktifkan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Username salah');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username salah');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Reset Password',
            'menu_active' => 'Login',
    	]);

        return view('Pages/forgotpass', $data);
    }

    public function resetpasslink($token) {

        // cek apakah token valid dan masih berlaku
        
        $tokenExists = $this->M_Base->data_where_array('users', [
            'token_key' => $token, 
            'token_time >=' => date('Y-m-d G:i:s', strtotime('-5 minute'))
        ]);


        if (!$tokenExists) {
            return redirect()->to(base_url('forgotpass'))->with('error', 'Token lupa password tidak valid atau sudah kadaluarsa.');
        }
        
        $users = $this->M_Base->data_where('users', 'token_key', $token);
        
        if (count($users) === 1) {
            if ($this->request->getPost('btn_password')) {
                $data_post = [
                    'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                    'passwordbb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordbb')))),
                ];
                
                if (empty($data_post['passwordb'])) {
                    $this->session->setFlashdata('error', 'Password baru tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['passwordbb'])) {
                    $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['passwordb']) < 6) {
                    $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['passwordb']) > 24) {
                    $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if ($data_post['passwordb'] !== $data_post['passwordbb']) {
                    $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
    
        
                     $this->M_Base->data_update('users', [
                        'password' => password_hash($data_post['passwordb'], PASSWORD_DEFAULT),
                    ], $users[0]['id']);
    
                    $this->session->setFlashdata('success', 'Password berhasil disimpan');
                    return redirect()->to(base_url() . '/login');
                }
                
            }
        } else {
                return redirect()->to(base_url('forgotpass'))->with('error', 'Token lupa password tidak valid atau sudah kadaluarsa.');
            }

        $data = array_merge($this->base_data, [
    		'title' => 'Reset Password',
            'users' => $users[0],
    	]);

        return view('Pages/resetpasslink', $data);
    }

    public function register($ref = '') {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        $data_post = [
            'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
            'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
            'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
            'ref' => addslashes(trim(htmlspecialchars($this->request->getPost('ref')))),
        ];

        if ($this->request->getPost('tombol')) {
            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['wa'])) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['passwordb'])) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 14) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (substr($data_post['wa'], 0, 2) != '08') {
                $this->session->setFlashdata('error', 'No. Whatsapp harus diawali 08');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($data_post['password'] !== $data_post['passwordb']) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) < 6) {
                $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) > 24) {
                $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $user_ref = '';

                $data_users = $this->M_Base->data_where('users', 'username', $data_post['username']);
                $data_wa = $this->M_Base->data_where('users', 'wa', $data_post['wa']);

                if (count($data_users) == 0) {
                    if (count($data_wa) == 0) {
                        // $otp_code = rand(100000, 999999);

                        $phone_number = $data_post['wa'];
                        // $message = "Kode OTP Kamu : $otp_code";
                        // $this->M_Base->wa($phone_number, $message);
                        $this->M_Base->data_insert('users', [
                            'username' => $data_post['username'],
                            'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
                            'balance' => 0,
                            'wa' => $data_post['wa'],
                            'ref' => $this->M_Base->random_string(5),
                            'ref_by' => $user_ref,
                            'level' => 'Member',
                            'status' => 'On', // set status to Off initially
                            'date_create' => date('Y-m-d G:i:s'),
                        ]);

                        // $this->session->set('otp_code', $otp_code);
                        // $this->session->set('otp_username', $data_post['username']); // store the username in session
                        $this->session->setFlashdata('success', 'Pendaftaran akun berhasil');
                        return redirect()->to(base_url() . '/register/login');
                    } else {
                        $this->session->setFlashdata('error', 'No WA sudah digunakan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username sudah terdaftar');
                    return redirect()->to(base_url() . '/register');
                }
            }
        }

        if ($this->request->getPost('submit_otp')) {
            $otp_code = $this->session->get('otp_code');
            $otp_username = $this->session->get('otp_username');
            $data_users = $this->M_Base->data_where('users', 'username', $otp_username);
            if ($this->request->getPost('otp') == $otp_code && count($data_users) == 1) {
                $this->M_Base->data_update('users', [
                    'status' => 'On',
                ], $data_users['0']['id']);
                $this->session->setFlashdata('success', 'Verifikasi OTP berhasil');
                return redirect()->to(base_url() . '/login');
            } else {
                $this->session->setFlashdata('error', 'Kode OTP salah');
                return redirect()->to(base_url() . '/register/otp');
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Register',
            'menu_active' => 'Register',
            'ref' => $ref,
            'otp_username' => $this->session->get('otp_username'), // pass the username to the view
        ]);

        if ($this->request->uri->getSegment(2) == 'otp') {
            return view('Pages/registerotp', $data);
        } else {
            return view('Pages/register', $data);
        }
    }
    
    // public function register1($ref = '') {

    //     if ($this->users !== false) {
    //         return redirect()->to(base_url());
    //     }

    //     $data_post = [
    //         'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
    //         'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
    //         'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
    //         'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
    //         'ref' => addslashes(trim(htmlspecialchars($this->request->getPost('ref')))),
    //     ];

    //     if ($this->request->getPost('tombol')) {
    //         if (empty($data_post['username'])) {
    //             $this->session->setFlashdata('error', 'Username tidak boleh kosong');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (empty($data_post['wa'])) {
    //             $this->session->setFlashdata('error', 'No. Whatsapp tidak boleh kosong');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (empty($data_post['password'])) {
    //             $this->session->setFlashdata('error', 'Password tidak boleh kosong');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (empty($data_post['passwordb'])) {
    //             $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 14) {
    //             $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (substr($data_post['wa'], 0, 2) != '08') {
    //             $this->session->setFlashdata('error', 'No. Whatsapp harus diawali 08');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if ($data_post['password'] !== $data_post['passwordb']) {
    //             $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (strlen($data_post['password']) < 6) {
    //             $this->session->setFlashdata('error', 'Password minimal 6 karakter');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else if (strlen($data_post['password']) > 24) {
    //             $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
    //             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //         } else {
    //             $user_ref = '';

    //             $data_users = $this->M_Base->data_where('users', 'username', $data_post['username']);
    //             $data_wa = $this->M_Base->data_where('users', 'wa', $data_post['wa']);

    //             if (count($data_users) == 0) {
    //                 if (count($data_wa) == 0) {
    //                     $otp_code = rand(100000, 999999);

    //                     $phone_number = $data_post['wa'];
    //                     $message = "Kode OTP Kamu : $otp_code";
    //                     $this->M_Base->wa($phone_number, $message);
    //                     $this->M_Base->data_insert('users', [
    //                         'username' => $data_post['username'],
    //                         'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
    //                         'balance' => 0,
    //                         'wa' => $data_post['wa'],
    //                         'ref' => $this->M_Base->random_string(5),
    //                         'ref_by' => $user_ref,
    //                         'level' => 'Member',
    //                         'status' => 'Off', // set status to Off initially
    //                         'date_create' => date('Y-m-d G:i:s'),
    //                     ]);

    //                     $this->session->set('otp_code', $otp_code);
    //                     $this->session->set('otp_username', $data_post['username']); // store the username in session
    //                     // $this->session->setFlashdata('success', 'Pendaftaran akun berhasil');
    //                     return redirect()->to(base_url() . '/register/otp');
    //                 } else {
    //                     $this->session->setFlashdata('error', 'No WA sudah digunakan');
    //                     return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
    //                 }
    //             } else {
    //                 $this->session->setFlashdata('error', 'Username sudah terdaftar');
    //                 return redirect()->to(base_url() . '/register');
    //             }
    //         }
    //     }

    //     if ($this->request->getPost('submit_otp')) {
    //         $otp_code = $this->session->get('otp_code');
    //         $otp_username = $this->session->get('otp_username');
    //         $data_users = $this->M_Base->data_where('users', 'username', $otp_username);
    //         if ($this->request->getPost('otp') == $otp_code && count($data_users) == 1) {
    //             $this->M_Base->data_update('users', [
    //                 'status' => 'On',
    //             ], $data_users['0']['id']);
    //             $this->session->setFlashdata('success', 'Verifikasi OTP berhasil');
    //             return redirect()->to(base_url() . '/login');
    //         } else {
    //             $this->session->setFlashdata('error', 'Kode OTP salah');
    //             return redirect()->to(base_url() . '/register/otp');
    //         }
    //     }

    //     $data = array_merge($this->base_data, [
    //         'title' => 'Register',
    //         'menu_active' => 'Register',
    //         'ref' => $ref,
    //         'otp_username' => $this->session->get('otp_username'), // pass the username to the view
    //     ]);

    //     if ($this->request->uri->getSegment(2) == 'otp') {
    //         return view('Pages/registerotp', $data);
    //     } else {
    //         return view('Pages/register', $data);
    //     }
    // }
    
    public function registerreseller($ref = '') {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }
        
          $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'fullname' => addslashes(trim(htmlspecialchars($this->request->getPost('fullname')))),
                'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
                'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                'ref' => addslashes(trim(htmlspecialchars($this->request->getPost('ref')))),
            ];
        
        if ($this->request->getPost('tombol')) {
            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['fullname'])) {
                $this->session->setFlashdata('error', 'Nama Lengkap tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['wa'])) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['passwordb'])) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['wa']) < 10 OR strlen($data_post['wa']) > 14) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (substr($data_post['wa'], 0, 2) != '08') {
                $this->session->setFlashdata('error', 'No. Whatsapp harus diawali 08');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($data_post['password'] !== $data_post['passwordb']) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) < 6) {
                $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) > 24) {
                $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
            $user_ref = '';
        
            $data_users = $this->M_Base->data_where('users', 'username', $data_post['username']);
        
            if (count($data_users) == 0) {
                $otp_code = rand(100000, 999999);
        
                $phone_number = $data_post['wa'];
                $message = "Kode OTP Kamu : $otp_code";
                $this->M_Base->wa($phone_number, $message);
                $this->M_Base->data_insert('users', [
                    'username' => $data_post['username'],
                    'fullname' => $data_post['fullname'],
                    'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
                    'balance' => 0,
                    'wa' => $data_post['wa'],
                    'ref' => $this->M_Base->random_string(5),
                    'ref_by' => $user_ref,
                    'level' => 'Member',
                    'status' => 'Off', // set status to Off initially
                    'date_create' => date('Y-m-d G:i:s'),
                ]);
                
                $this->session->set('otp_code', $otp_code);
                $this->session->set('otp_username', $data_post['username']); // store the username in session
                $this->session->setFlashdata('success', 'Pendaftaran akun berhasil');
                return redirect()->to(base_url() . '/register/otp');
            } else {
                $this->session->setFlashdata('error', 'Username sudah terdaftar');
                return redirect()->to(base_url() . '/registerreseller');
            }
            
        }
        
        }

        if ($this->request->getPost('submit_otp')) {
            $otp_code = $this->session->get('otp_code');
            $otp_username = $this->session->get('otp_username');
            $data_users = $this->M_Base->data_where('users', 'username', $otp_username);
            if ($this->request->getPost('otp') == $otp_code && count($data_users) == 1) {
                 $this->M_Base->data_update('users', [
                    'status' => 'On',
                ], $data_users['0']['id']);
                $this->session->setFlashdata('success', 'Verifikasi OTP berhasil');
                return redirect()->to(base_url() . '/login');
            } else {
                $this->session->setFlashdata('error', 'Kode OTP salah');
                return redirect()->to(base_url() . '/register/otp');
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Register Reseller',
            'menu_active' => 'Registerreseller',
            'ref' => $ref,
            'otp_username' => $this->session->get('otp_username'), // pass the username to the view
        ]);

        if ($this->request->uri->getSegment(2) == 'otp') {
            return view('Pages/registerotp', $data);
        } else {
            return view('Pages/registerreseller', $data); 
            
        }
    }

    public function login() {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            ];
            
            $recaptchaResponse = trim($this->request->getPost('g-recaptcha-response'));
              $secret= $this->M_Base->u_get('captcha_secret_key');
              $credential = array(
                    'secret' => $secret,
                    'response' => $this->request->getPost('g-recaptcha-response')
                );

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $users = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($users) === 1) {
                    if ($users[0]['username'] === $data_post['username']) {
                        if ($users[0]['status'] === 'On') {
                            if (password_verify($data_post['password'], $users[0]['password'])) {

                                $verify = curl_init();
                                  curl_setopt($verify, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
                                  curl_setopt($verify, CURLOPT_POST, true);
                                  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
                                  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                                  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                                  $response = curl_exec($verify);
                             
                                  $status= json_decode($response, true);
                                   
                                  if($status['success']){ 
                                  $this->session->set('username', $users[0]['username']);

                                    $this->session->setFlashdata('success', 'Login berhasil');
                                  }else{
                                   
                                  $this->session->setFlashdata('error', 'Captcha belum terisi');
                                  return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                  }

                                
                                return redirect()->to(base_url() . '/user');
                            } else {
                                $this->session->setFlashdata('error', 'Username atau password salah');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Akun kamu telah dinonaktifkan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Username atau password salah');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username atau password salah');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Login',
            'menu_active' => 'Login',
            'sitekey' => $this->M_Base->u_get('captcha_site_key'),
    	]);

        return view('Pages/login', $data);
    }
    
    public function loginreseller() {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            ];
            
            $recaptchaResponse = trim($this->request->getPost('g-recaptcha-response'));
              $secret= $this->M_Base->u_get('captcha_secret_key');
              $credential = array(
                    'secret' => $secret,
                    'response' => $this->request->getPost('g-recaptcha-response')
                );

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $users = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($users) === 1) {
                    if ($users[0]['username'] === $data_post['username']) {
                        if ($users[0]['status'] === 'On') {
                            if (password_verify($data_post['password'], $users[0]['password'])) {

                                $verify = curl_init();
                                  curl_setopt($verify, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
                                  curl_setopt($verify, CURLOPT_POST, true);
                                  curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
                                  curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                                  curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                                  $response = curl_exec($verify);
                             
                                  $status= json_decode($response, true);
                                   
                                  if($status['success']){ 
                                  $this->session->set('username', $users[0]['username']);

                                    $this->session->setFlashdata('success', 'Login berhasil');
                                  }else{
                                   
                                  $this->session->setFlashdata('error', 'Captcha belum terisi');
                                  return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                  }

                                
                                return redirect()->to(base_url() . '/user');
                            } else {
                                $this->session->setFlashdata('error', 'Username atau password salah');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Akun kamu telah dinonaktifkan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Username atau password salah');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username atau password salah');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Login Reseller',
            'menu_active' => 'Loginreseller',
            'sitekey' => $this->M_Base->u_get('captcha_site_key'),
    	]);

        return view('Pages/loginreseller', $data);
    }

    public function logout() {

        $this->session->remove('username');

        $this->session->setFlashdata('success', 'Logout berhasil');
        return redirect()->to(base_url() . '/login');
    }
}