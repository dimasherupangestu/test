<?php

namespace App\Controllers;

class User extends BaseController {

    public function index() {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            if ($this->request->getPost('btn_password')) {
                $data_post = [
                    'passwordl' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordl')))),
                    'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                    'passwordbb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordbb')))),
                ];

                if (empty($data_post['passwordl'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['passwordb'])) {
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
                } else if (!password_verify($data_post['passwordl'], $this->users['password'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', [
                        'password' => password_hash($data_post['passwordb'], PASSWORD_DEFAULT),
                    ], $this->users['id']);

                    $this->session->setFlashdata('success', 'Password berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                ];

                if (empty($data_post['wa'])) {
                    $this->session->setFlashdata('error', 'Nomor whatsapp tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['wa']) < 10 OR strlen($data_post['wa']) > 14) {
                    $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', $data_post, $this->users['id']);

                    $this->session->setFlashdata('success', 'Data berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
            
            $games = [];
            foreach (($this->M_Base->all_data_order('category', 'sort')) as $category) {
                $find_games = (array_reverse($this->M_Base->all_data_order('games', 'sort')));

                if (count($find_games) !== 0) {

                    $games_x = [];
                    foreach (($find_games) as $x) {
                        if ($x['category'] == $category['category']) {
                            $games_x[] = $x;
                        }
                    }

                    $games[] = [
                        'category' => $category['category'],
                        'games' => $games_x,
                    ];
                }
            }

        	$data = array_merge($this->base_data, [
        		'title' => 'Beranda',
                'orders' => $this->M_Base->data_count('orders', ['username' => $this->users['username']]),
                'games' => $games,
                'banner' => $this->M_Base->all_data('banner', 3),
        	]);

            return view('User/index', $data);
        }
    }
    
    public function search()
{
    $searchQuery = $this->request->getPost('searchQuery');
    $games = $this->M_Base->data_like('games', 'games', $searchQuery, ['status' => 'On'], 'games ASC');
    $searchResultsHtml = '';
    $lastCategory = '';
    foreach ($games as $game) {
        if ($game['status'] == 'On') {
        if ($game['category'] !== $lastCategory) {
            $searchResultsHtml .= '<div class="category-item p-3 ml-2 col-12" hidden><h6 class="mb-0" style="text-transform: uppercase;" hidden>' . $game['category'] . '</h6></div>';
            $lastCategory = $game['category'];
        }
        $searchResultsHtml .= '<hr class="dropdown-divider"hidden> <li class="game-item"><a class="dropdown-item" href="' . base_url() . '/user/games/' . $game['slug'] . '">
            <div class="row">
                <div class="col-3">
                    <img src="' . base_url() . '/assets/images/games/' . $game['image'] . '" alt="' . $game['games'] . '" width="60" class="img-fluid">
                </div>
                <div class="col-9 "style="color: #fff;">
                    <div class="row">
                        <div class="col-md-12">
                            <b>' . $game['games'] . '</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small style="color:var(--warna_text) !important;">Instant</small>
                        </div>
                    </div>
                </div>
            </div>
        </a></li><hr class="dropdown-divider">';
    }}
    echo $searchResultsHtml;
}
    
    public function settings()
    {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            
            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                ];

                if (empty($data_post['wa']) or empty($data_post['name']) or empty($data_post['email'])) {
                    $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 14) {
                    $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', $data_post, $this->users['id']);

                    $this->session->setFlashdata('success', 'Data berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
                
            }

            if ($this->request->getPost('btn_password')) {
                $data_post = [
                    'passwordl' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordl')))),
                    'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                    'passwordbb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordbb')))),
                ];

                if (empty($data_post['passwordl'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['passwordb'])) {
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
                } else if (!password_verify($data_post['passwordl'], $this->users['password'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', [
                        'password' => password_hash($data_post['passwordb'], PASSWORD_DEFAULT),
                    ], $this->users['id']);

                    $this->session->setFlashdata('success', 'Password berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
            
            if ($this->request->getPost('btn_ganti_pin')) {
                $data_post = [
                    'pin_lama' => addslashes(trim(htmlspecialchars($this->request->getPost('pin_lama')))),
                    'pin_baru' => addslashes(trim(htmlspecialchars($this->request->getPost('pin_baru')))),
                    'pin_baru2' => addslashes(trim(htmlspecialchars($this->request->getPost('pin_baru2')))),
                ];

                if (empty($data_post['pin_lama'])) {
                    $this->session->setFlashdata('error', 'PIN lama tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['pin_baru'])) {
                    $this->session->setFlashdata('error', 'PIN baru tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['pin_baru2'])) {
                    $this->session->setFlashdata('error', 'Konfirmasi PIN tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (!preg_match('/^[0-9]+$/', $data_post['pin_baru'])) {
                    $this->session->setFlashdata('error', 'PIN hanya boleh berisi angka');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (!ctype_digit($data_post['pin_baru'])) {
                    $this->session->setFlashdata('error', 'PIN hanya boleh berisi angka');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['pin_baru']) < 6) {
                    $this->session->setFlashdata('error', 'PIN minimal 6 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['pin_baru']) > 6) {
                    $this->session->setFlashdata('error', 'PIN maksimal 6 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if ($data_post['pin_baru'] !== $data_post['pin_baru2']) {
                    $this->session->setFlashdata('error', 'Konfirmasi PIN tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (!password_verify($data_post['pin_lama'], $this->users['pin'])) {
                    $this->session->setFlashdata('error', 'PIN lama tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', [
                        'pin' => password_hash($data_post['pin_baru'], PASSWORD_DEFAULT),
                    ], $this->users['id']);

                    $this->session->setFlashdata('success', 'PIN berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

            $data = array_merge($this->base_data, [
                'title' => 'Settings',
                'username' => $users[0]['username'],
            ]);


            return view('User/settings', $data);
        }
    }
    
    public function get_riwayat_pesanan()
    {
         if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
        $orders = array_reverse($this->M_Base->data_where('orders', 'username', $this->users['username']));
        $data = array();
        foreach ($orders as $index => $order) {
            
            $date = date_create($order['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($order['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'order_id' => '<a href="' . base_url() . '/user/payment/' . $order['order_id'] . '"><b>' . $order['order_id'] . '</b></a>',
                'product' => $order['product'],
                'user_id' => $order['user_id'],
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'status' => $order['status'],
            );

            
        }

        $response = array(
            'total' => count($data),
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
        }
    }
    
    public function get_riwayat_topup()
    {
         if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
        $topups = array_reverse($this->M_Base->data_where('topup', 'username', $this->users['username']));
        $data = array();
        foreach ($topups as $index => $topup) {
            
            $date = date_create($topup['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($topup['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'topup_id' => '<a href="' . base_url() . '/user/topup/' . $topup['topup_id'] . '"><b>' . $topup['topup_id'] . '</b></a>',
                'method' => $topup['method'],
                'amount' => 'Rp ' . number_format($topup['amount'], 0, ',', '.'),
                'status' => $topup['status'],
                'date_create' => $topup['date_create'],
            );

            
        }

        $response = array(
            'total' => count($data),
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
        }
    }

    public function riwayat() {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $data = array_merge($this->base_data, [
                'title' => 'Riwayat',
                'riwayat' => $this->M_Base->data_where('orders', 'username', $this->users['username']),
            ]);

            return view('User/riwayat', $data);
        }
    }

    public function referal() {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $data = array_merge($this->base_data, [
                'title' => 'Referal',
                'komisi_ref' => $this->M_Base->u_get('komisi_ref'),
                'user_ref' => $this->M_Base->data_where('users', 'ref_by', $this->users['username']),
            ]);

            return view('User/referal', $data);
        }
    }

    public function topup($topup_id = null)
    {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($topup_id === null) {
                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'nominal' => addslashes(trim(htmlspecialchars($this->request->getPost('nominal')))),
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                    ];

                    if (empty($data_post['nominal'])) {
                        $this->session->setFlashdata('error', 'Nominal tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['method'])) {
                        $this->session->setFlashdata('error', 'Metode tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if ($data_post['nominal'] < 10000) {
                        $this->session->setFlashdata('error', 'Topup minimal Rp 10.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if ($data_post['nominal'] > 10000000) {
                        $this->session->setFlashdata('error', 'Topup maksimal Rp 10.000.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);

                        if (count($method) === 1) {
                            if ($method[0]['status'] == 'On') {

                                $topup_id = date('Ymd') . rand(0000, 9999);

                                $uniq = $method[0]['uniq'] == 'Y' ? rand(000, 999) : 0;

                                $amount = $data_post['nominal'] + $uniq;

                                if ($method[0]['provider'] == 'Duitku') {

                                    if (in_array($method[0]['code'], array('SP', 'NQ'))) {
                                        $amount = $amount * 1.007;
                                    }

                                    if ($method[0]['code'] == 'LQ') {
                                        $amount = $amount * 1.0078;
                                    }

                                }

                                if ($method[0]['provider'] == 'Linkqu') { 
                                                
                                    if ($method[0]['type'] == 'QRIS') { 
                                        $fee = ($amount*0.007) ; 
                                        $amount = $amount + $fee;
                                    }  else if ($method[0]['type'] == 'Virtual Account') { 
                                        
                                        
                                        if ( in_array($method[0]['code'], array('013','022,','011')) ) { 
                                                $fee = 2500 ;
                                        } else if ( in_array($method[0]['code'], array('008','002,','490','451')) ) { 
                                                $fee = 3000 ;
                                        } else {
                                            $fee = 3500 ;
                                        } 
                                        
                                        $amount = $amount + $fee ;  
                                        
                                    } else if ($method[0]['type'] == 'E-Wallet') { 
                                        $fee = ($amount*0.018)+1000 ;
                                        
                                        if ($method[0]['code'] == 'PAYSHOPEE') { 
                                            $fee = ($amount*0.023)+1000 ; 
                                        }
                                        $amount = $amount + $fee;
                                        
                                    } else if ($method[0]['type'] == 'Convenience Store') { 
                                        $fee = 1500 ; 
                                        $amount = $amount + $fee ;  
                                    } else { 
                                        $amount = $amount ;  
                                    }
                                     
                                }

                                $amount = ceil($amount);

                                if ($method[0]['provider'] == 'Tripay') {

                                    $data = [
                                        'method' => $method[0]['code'],
                                        'merchant_ref' => $topup_id,
                                        'amount' => $amount,
                                        'customer_name' => $this->users['username'],
                                        'customer_email' => 'email@domain.com',
                                        'customer_phone' => $this->users['wa'],
                                        'order_items' => [
                                            [
                                                'sku' => 'DS',
                                                'name' => 'Topup Saldo',
                                                'price' => $amount,
                                                'quantity' => 1,
                                            ]
                                        ],
                                        'return_url' => base_url(),
                                        'expired_time' => (time() + (24 * 60 * 60)),
                                        // 24 jam
                                        'signature' => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant') . $topup_id . $amount, $this->M_Base->u_get('tripay-private'))
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
                                    $paymentAmount = $amount;
                                    $paymentMethod = $method[0]['code']; // VC = Credit Card
                                    $merchantOrderId = $topup_id; // dari merchant, unik
                                    $productDetails = 'Web Top Up Pointgo';
                                    $email = 'email123123@domain.com'; // email pelanggan anda
                                    $phoneNumber = $this->users['wa']; // nomor telepon pelanggan anda (opsional)
                                    $customerVaName = $this->users['username']; // tampilan nama pada tampilan konfirmasi bank
                                    $callbackUrl = base_url() . '/sistem/callback/duitku'; // url untuk callback
                                    $returnUrl = base_url() . '/user'; // url untuk redirect
                                    $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit
                                    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

                                    $item1 = array(
                                        'name' => 'Topup Saldo Pointgo',
                                        'price' => $paymentAmount,
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
                                        'callbackUrl' => $callbackUrl,
                                        'returnUrl' => $returnUrl,
                                        'signature' => $signature,
                                        'expiryPeriod' => $expiryPeriod
                                    );

                                    $params_string = json_encode($params);
                                    //echo $params_string;
                                    // $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
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

                                    $log_file_name = 'log_topup_duitku_' . date("j.n.Y") . '.txt'; // Include time in the log file name
                                    $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
                                    fwrite($file, date('Y-m-d H:i:s') . ' ' . $params_string . $request . "\n"); // Include time in the log message
                                    fclose($file);

                                    if ($httpCode == 200) {
                                        $result = json_decode($request, true);

                                        if (array_key_exists('vaNumber', $result)) {
                                            $payment_code = $result['vaNumber'];
                                        } else {
                                            $payment_code = $result['paymentUrl'];
                                        }
                                    } else {
                                        $result = json_decode($request, true);
                                        $this->session->setFlashdata('error', 'Result : ' . $httpCode);
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }

                                } else if ($method[0]['provider'] == 'Linkqu') {

                                    $username_linkqu =  $this->M_Base->u_get('username_linkqu'); 
                                    $pin_linkqu =  $this->M_Base->u_get('pin_linkqu');
                                    $id_linkqu =  $this->M_Base->u_get('id_linkqu'); 
                                    $secret_linkqu =  $this->M_Base->u_get('secret_linkqu');
                                    $serverKey = $this->M_Base->u_get('signkey_linkqu');
                                    //$url = 'https://gateway-dev.linkqu.id'; // Sandbox
                                    $url = 'https://gateway.linkqu.id'; // Production

                                    $paymentAmount = $amount;
                                    $paymentMethod = $method[0]['code']; // VC = Credit Card
                                    $merchantOrderId = $topup_id; // dari merchant, unik
                                    $productDetails = 'Web Top Up';
                                    $letters = range('a', 'z'); // an array containing all letters of the alphabet
                                    shuffle($letters); // shuffle the array to randomize the order of the letters
                                    $random_letters = implode('', array_slice($letters, 0, 10)); // take the first 5 letters and join them into a string
                                    $email = $random_letters.'@gmail.com'; // email pelanggan anda
                                    $phoneNumber = $this->users['wa'];  // nomor telepon pelanggan anda (opsional)
                                    
                                    
                                    if ($this->users == false) {
                                    $namaweb = $this->M_Base->u_get('web-name');
                                    $customerVaName = $namaweb.' '.$topup_id;
                                    
                                    } else {
                                        $customerVaName = $this->users['username']; 
                                    }
                                    
                                    $callbackUrl = base_url() . '/sistem/callback/linkqu'; // url untuk callback
                                    $returnUrl = base_url() . '/user' ; // url untuk redirect
                                    $imageUrl = base_url() . '/assets/images/games/' . $games[0]['image']; // url untuk redirect
                                    $date_sk = date('YmdHis');
                                    $expired = date('YmdHis', strtotime($date_sk . ' +1 day'));
                                    $methodcurl = "POST";
                                    $regex = "/[^0-9a-zA-Z]/";

                                    if ($method[0]['type'] == 'QRIS') {
                                        $path = '/transaction/create/qris';
                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                    } else if ($method[0]['type'] == 'Virtual Account') {
                                        $path = '/transaction/create/va';
                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                    } else if ($method[0]['type'] == 'E-Wallet') {
                                        $path = '/transaction/create/paymentewallet';
                                        if ($method[0]['code'] == 'PAYOVO') {
                                            $path = '/transaction/create/ovopush';
                                        }
                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $phoneNumber . $id_linkqu));
                                    } else if ($method[0]['type'] == 'Convenience Store') {
                                        $path = '/transaction/create/retail';
                                        $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
                                    }

                                    $valuesign = $path . $methodcurl . $value;

                                    $signature = hash_hmac('sha256', $valuesign, $serverKey);
                                    
                                    
                                    if ($method[0]['type'] == 'Virtual Account') { 
                                        
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                          CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/va',
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => '',
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 0,
                                          CURLOPT_FOLLOWLOCATION => true,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => 'POST',
                                          CURLOPT_POSTFIELDS =>'{
                                        	"amount" : '.$paymentAmount.',
                                        	"partner_reff" : "'.$merchantOrderId.'",
                                        	"customer_id" : "'.$phoneNumber.'",
                                        	"customer_name" : "'.$customerVaName.'",
                                        	"expired" : "'.$expired.'",
                                        	"username" : "'.$username_linkqu.'",
                                        	"pin" : "'.$pin_linkqu.'",
                                        	"customer_phone" : "'.$phoneNumber.'",
                                        	"customer_email" : "'.$email.'",
                                            "bank_code" : "'.$paymentMethod.'",
                                                        "signature" : ' . $signature . '
                                        }',
                                          CURLOPT_HTTPHEADER => array(
                                            'client-id: '.$id_linkqu.' ',
                                            'client-secret: '.$secret_linkqu.''
                                          ),
                                        ));

                                        $result = json_decode(curl_exec($curl), true);
                                        
                                        if ($result['response_code'] == 00) {
                                            $payment_code = $result['virtual_account'];
                                        } else {
                                            $payment_code = $result['response_desc'];
                                        }
                                        
                                        
                                        
                                        
                                    } else if ($method[0]['type'] == 'E-Wallet') {
                                        
                                        if ($method[0]['code'] == 'PAYOVO') {
                                            
                                            $curl = curl_init();

                                            curl_setopt_array($curl, array(
                                              CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/ovopush',
                                              CURLOPT_RETURNTRANSFER => true,
                                              CURLOPT_ENCODING => '',
                                              CURLOPT_MAXREDIRS => 10,
                                              CURLOPT_TIMEOUT => 0,
                                              CURLOPT_FOLLOWLOCATION => true,
                                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                              CURLOPT_CUSTOMREQUEST => 'POST',
                                              CURLOPT_POSTFIELDS =>'{
                                            	"amount" : '.$paymentAmount.',
                                            	"partner_reff" : "'.$merchantOrderId.'",
                                            	"customer_id" : "'.$phoneNumber.'",
                                            	"customer_name" : "'.$customerVaName.'",
                                            	"expired" : "'.$expired.'",
                                            	"username" : "'.$username_linkqu.'",
                                            	"pin" : "'.$pin_linkqu.'",
                                                "retail_code" : "PAYOVO",
                                            	"customer_phone" : "'.$phoneNumber.'",
                                            	"customer_email" : "'.$email.'",
                                                "ewallet_phone" : "'.$phoneNumber.'",
                                                "bill_title" : "'.$productDetails.'"
                                            "bank_code" : "'.$paymentMethod.'",
                                                        "signature" : ' . $signature . '
                                            }',
                                              CURLOPT_HTTPHEADER => array(
                                                'client-id: '.$id_linkqu.' ',
                                                'client-secret: '.$secret_linkqu.''
                                              ),
                                            ));
                                            
                                            
                                            $result = json_decode(curl_exec($curl), true);
                                            
                                            
                                            if ($result['response_code'] == 00) {
                                                $payment_code = "Cek Notifikasi di Aplikasi OVO anda untuk melakukan Pembayaran";
                                            } else {
                                                $payment_code = $result['response_desc'];
                                            }
                                            
                                           
                                            
                                        } else {
                                         $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                          CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/paymentewallet',
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => '',
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 0,
                                          CURLOPT_FOLLOWLOCATION => true,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => 'POST',
                                          CURLOPT_POSTFIELDS =>'{
                                        	"amount" : '.$paymentAmount.',
                                        	"partner_reff" : "'.$merchantOrderId.'",
                                        	"customer_id" : "'.$phoneNumber.'",
                                        	"customer_name" : "'.$customerVaName.'",
                                        	"expired" : "'.$expired.'",
                                        	"username" : "'.$username_linkqu.'",
                                        	"pin" : "'.$pin_linkqu.'",
                                            "retail_code" : "'.$paymentMethod.'",
                                        	"customer_phone" : "'.$phoneNumber.'",
                                        	"customer_email" : "'.$email.'",
                                            "ewallet_phone" : "'.$phoneNumber.'",
                                            "bill_title" : "'.$productDetails.'",
                                            "bank_code" : "'.$paymentMethod.'",
                                                        "signature" : ' . $signature . '
                                        }',
                                          CURLOPT_HTTPHEADER => array(
                                            'client-id: '.$id_linkqu.' ',
                                            'client-secret: '.$secret_linkqu.''
                                          ),
                                        ));
                                        
                                        $result = json_decode(curl_exec($curl), true);
                                        
                                        
                                        if ($result['response_code'] == 00) {
                                            $payment_code = $result['url_payment'];
                                        } else {
                                            $payment_code = $result['response_desc'];
                                        }
                                        
                                        
                                        }
                                        
                                        
                                        
                                    } else if ($method[0]['type'] == 'Convenience Store') { 
                                        
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                          CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/retail',
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => '',
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 0,
                                          CURLOPT_FOLLOWLOCATION => true,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => 'POST',
                                          CURLOPT_POSTFIELDS =>'{
                                        	"amount" : '.$paymentAmount.',
                                        	"partner_reff" : "'.$merchantOrderId.'",
                                        	"customer_id" : "'.$phoneNumber.'",
                                        	"customer_name" : "'.$customerVaName.'",
                                        	"expired" : "'.$expired.'",
                                        	"username" : "'.$username_linkqu.'",
                                        	"pin" : "'.$pin_linkqu.'",
                                            "retail_code" : "'.$paymentMethod.'",
                                        	"customer_phone" : "'.$phoneNumber.'",
                                        	"customer_email" : "'.$email.'",
                                            "bank_code" : "'.$paymentMethod.'",
                                                        "signature" : ' . $signature . '
                                        }',
                                          CURLOPT_HTTPHEADER => array(
                                            'client-id: '.$id_linkqu.' ',
                                            'client-secret: '.$secret_linkqu.''
                                          ),
                                        ));
                                        
                                        $result = json_decode(curl_exec($curl), true);
                                        
                                        if ($result['response_code'] == 00) {
                                            $payment_code = $result['payment_code'];
                                        } else {
                                            $payment_code = $result['response_desc'];
                                        }
                                        
                                        
                                        
                                        
                                    } else if ($method[0]['type'] == 'QRIS') {
                                       
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                          CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/qris',
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => '',
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 0,
                                          CURLOPT_FOLLOWLOCATION => true,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => 'POST',
                                          CURLOPT_POSTFIELDS =>'{
                                        	"amount" : '.$paymentAmount.',
                                        	"partner_reff" : "'.$merchantOrderId.'",
                                        	"customer_id" : "'.$phoneNumber.'",
                                        	"customer_name" : "'.$customerVaName.'",
                                        	"expired" : "'.$expired.'",
                                        	"username" : "'.$username_linkqu.'",
                                        	"pin" : "'.$pin_linkqu.'",
                                        	"customer_phone" : "'.$phoneNumber.'",
                                        	"customer_email" : "'.$email.'",
                                                        "signature" : ' . $signature . '
                                        }',
                                          CURLOPT_HTTPHEADER => array(
                                            'client-id: '.$id_linkqu.' ',
                                            'client-secret: '.$secret_linkqu.''
                                          ),
                                        ));
                                        
                                        $result = json_decode(curl_exec($curl), true);
                                        
                                        if ($result['response_code'] == 00) {
                                            $payment_code = $result['imageqris'];
                                        } else {
                                            $payment_code = $result['response_desc'];
                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                    }


                                              
                                } else if ($method[0]['provider'] == 'Tokopay') {
      
                                    $merchant_id = $this->M_Base->u_get('tokopay-merchant'); // dari duitku
                                    $apiKey = $this->M_Base->u_get('tokopay-secret-key'); // dari duitku
                                    $amount = $amount;
                                    $kode_channel = $method[0]['code'];
                                    $reff_id = $topup_id;
                                    $productDetails = 'Web Top Up';
                                    $email = $topup_id.'@pointgo.id'; // email pelanggan anda
                                    $phoneNumber = $this->users['wa']; // nomor telepon pelanggan anda (opsional)
                                    $customerVaName = 'pointgo ' . $topup_id; // tampilan nama pada tampilan konfirmasi bank
                                    $callbackUrl = base_url() . '/sistem/callback/TokoPayPoInGOo1239als08207'; // url untuk callback
                                    $returnUrl = base_url() . '/user'; // url untuk redirect
                                    $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
                                    $expired_ts = time() + $expiryPeriod;
                                    $signature = md5($merchant_id . ':' . $apiKey . ':' . $reff_id);

                                    $item1 = array(
                                        'product_code' => 'TOPUP',
                                        'name' => $productDetails,
                                        'price' => $amount
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
                                    
                                       $log_file_name = 'log_tokopay_depo_' . date("j.n.Y") . '.txt'; // Include time in the log file name
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

                                $saldosb = $this->users['balance'];
                                $saldost = $saldosb + $amount;

                                $this->M_Base->data_insert('topup', [
                                    'username' => $this->users['username'],
                                    'topup_id' => $topup_id,
                                    'method_id' => $method[0]['id'],
                                    'method_code' => $method[0]['code'],
                                    'method' => $method[0]['method'],
                                    'payment_gateway' => $method[0]['provider'],
                                    'payment_type' => $method[0]['type'],
                                    'amount' => $amount,
                                    'status' => 'Pending',
                                    'payment_code' => $payment_code,
                                    'date_create' => date('Y-m-d G:i:s'),
                                    'fee' => $fee,
                                ]);

                                $this->session->setFlashdata('success', 'Request Deposit');
                                return redirect()->to(base_url() . '/user/topup/' . $topup_id);

                            } else {
                                $this->session->setFlashdata('error', 'Metode tidak tersedia');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Metode tidak ditemukan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
                }

                $all_method = $this->M_Base->data_where('method', 'status', 'On');

                        $accordion_data = [];

                        foreach ($all_method as $method) {
                            if (!isset($accordion_data[$method['type']])) {
                                $accordion_data[$method['type']] = [];
                            }
                            array_push($accordion_data[$method['type']], array('method' => $method['method'], 'image' => $method['image'], 'id' => $method['id'], 'code' => $method['code']));
                        }
                $category = [];

                $data = array_merge($this->base_data, [
                    'title' => 'Top Up',
                    'method' => $this->M_Base->data_where('method', 'status', 'On'),
                    'watujuan' => $this->M_Base->u_get('wa_token'),
                    'accordion_data' => $accordion_data,
                ]);

                return view('User/Topup/index', $data);
            } else {
                $topup = $this->M_Base->data_where_array('topup', [
                    'topup_id' => $topup_id,
                    'username' => $this->users['username'],
                ]);

                if (count($topup) === 1) {

                    $find_method = $this->M_Base->data_where('method', 'id', $topup[0]['method_id']);

                    $instruksi = count($find_method) == 1 ? $find_method[0]['instruksi'] : '-';
                    $images = count($find_method) == 1 ? $find_method[0]['image'] : '-';
                    $namarek = count($find_method) == 1 ? $find_method[0]['namarek'] : '-';

                    $data = array_merge($this->base_data, [
                        'title' => 'Top Up',
                        'topup' => array_merge($topup[0], [
                            'instruksi' => $instruksi,
                            'images' => $images,
                            'namarek' => $namarek,
                        ]),
                    ]);

                    return view('User/Topup/detail', $data);
                } else {
                    if ($topup_id === 'riwayat') {
                        $data = array_merge($this->base_data, [
                            'title' => 'Top Up',
                            'topup' => array_reverse($this->M_Base->data_where('topup', 'username', $this->users['username'])),
                        ]);

                        return view('User/Topup/riwayat', $data);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                }
            }
        }
    }
    
    public function tabelharga() {


        $product = [];
        $data_product = $this->M_Base->data_where_array_3('product', [
                            'status' => 'On',
                        ], 'price');
                        
                foreach (array_reverse($data_product) as $loop) {

                    $games = $this->M_Base->data_where_array('games', [
                        'id' => $loop['games_id'],
                        'status' => 'On',
                    ]);

                    if (count($games) == 1) {
                        
                        if ($loop['price_silver'] == 0) {
                            $loop['price_silver'] = $loop['price'] ;
                        }
                        
                        if ($loop['price_gold'] == 0) {
                            $loop['price_gold'] = $loop['price'] ;
                        }

                        $product[] = [
                            'games' => $games[0]['games'],
                            'image' => $games[0]['image'],
                            'product' => $loop['product'],
                            'games1' => $this->M_Base->all_data('games'),
                            'id' => $loop['id'],
                            'sku' => $loop['sku'],
                            'status' => $loop['status'],
                            'price' => [
                                'member' => $loop['price'],
                                'silver' => $loop['price_silver'],
                                'gold' => $loop['price_gold'],
                            ],
                        ];
                    }

                }
        
        $data = array_merge($this->base_data, [
    		'title' => 'Tabel Harga Member',
            'tabel' => $product,
            'games1' => $this->M_Base->all_data('games'),
            'menu_active' => 'tabelharga',
    	]);

        return view('User/tabelharga', $data);
    } 
    
    public function laporan()
    {
        if ($this->users == false) {
            return redirect()->to(base_url());
        }

        
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $id_games_value = $this->request->getGet('games_id');
        $games_value = $this->request->getGet('games');
        $pick_provider = $this->request->getGet('pick_provider');
        $pick_method = $this->request->getGet('pick_method');
        $pick_status = $this->request->getGet('pick_status');
        
        $gamesx = [];
        
        
        foreach ($this->M_Base->getSalesGames($start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $this->users) as $loopx) {
            $gamesx[] = [
                'games_id' => $loopx['games_id'],
                'games' => $loopx['games'],
                'total_sales' => $loopx['total_sales'],
                'sales' => $loopx['sales'],
                'profit' => $loopx['profit'],
            ];
        }

        $data = array_merge($this->base_data, [
            'title' => 'Laporan',
            'gamesx' => $gamesx,
            'pick_games' => $this->M_Base->data_orders_no_duplicate_users('orders', $this->users, 'games_id', 'games'),
            'pick_provider' => $this->M_Base->data_orders_no_duplicate_users('orders', $this->users, 'provider'),
            'pick_status' => $this->M_Base->data_orders_no_duplicate_users('orders', $this->users, 'status'),
            'pick_method' => $this->M_Base->data_orders_no_duplicate_users('orders', $this->users, 'method_id', 'method'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'id_games_value' => $id_games_value,
            'games_value' => $games_value,
            'provider_value' => $pick_provider,
            'games_value' => $games_value,
            'method_value' => $pick_method,
            'status_value' => $pick_status,
        ]);

        return view('User/laporan', $data);
    }
    
    public function filteredData()
    {
    // Ambil parameter filter dari URL
    $start_date = $this->request->getGet('start_date');
    $end_date = $this->request->getGet('end_date');
    $id_games_value = $this->request->getGet('games_id');
    $games_value = $this->request->getGet('games');
    $pick_provider = $this->request->getGet('pick_provider');
    $pick_method = $this->request->getGet('pick_method');
    $pick_status = $this->request->getGet('pick_status');

    // Panggil fungsi getSalesGames dengan parameter filter
    $filteredData = $this->M_Base->getSalesGames($start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status);

    // Kembalikan data dalam format JSON
    return $this->response->setJSON($filteredData);
}

    public function exportDataFilter()
    {
        // Ambil parameter filter dari URL jika diperlukan
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $id_games_value = $this->request->getGet('games_id');
        $games_value = $this->request->getGet('games');
        $pick_provider = $this->request->getGet('pick_provider');
        $pick_method = $this->request->getGet('pick_method');
        $pick_status = $this->request->getGet('pick_status');
    
        // Panggil method exportAllData untuk mengambil semua kolom data sesuai filter
        $data = $this->M_Base->exportAllData($start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $this->users);
    
        // Set header respons sebagai CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data.csv"');
    
        // Output data CSV ke respons
        $output = fopen('php://output', 'w');
        $firstRow = true;
    
        foreach ($data as $row) {
        if ($firstRow) {
            // Header kolom (nama kolom dari tabel)
            $columns = array_keys($row);

            // Mengecualikan kolom yang tidak ingin diekspor
            $columnsToExclude = ['saldosb', 'saldost', 'log', 'date_process', 'product_id', 'method_id', 'games_id', 'ket', 'payment_code'];
            $columns = array_diff($columns, $columnsToExclude);

            fputcsv($output, $columns);
            $firstRow = false;
        }

        // Data baris
        // Mengecualikan kolom yang tidak ingin diekspor
        $row = array_diff_key($row, array_flip($columnsToExclude));
        fputcsv($output, $row);
    }
    
        fclose($output);
}

    public function get_orders_data()
    {
            if ($this->users == false) {
            return redirect()->to(base_url());
        }
        
        $search = $_GET['search'] ?? '';
        $offset = $_GET['offset'] ?? 0;
        $limit = $_GET['limit'] ?? 10;
        
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $id_games_value = $this->request->getGet('games_id');
        $games_value = $this->request->getGet('games');
        $pick_provider = $this->request->getGet('pick_provider');
        $pick_method = $this->request->getGet('pick_method');
        $pick_status = $this->request->getGet('pick_status');
    
        $orders = $this->M_Base->get_paginated_and_filter('orders', $search, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $offset, $limit, $this->users);
        
        $tableData = $orders['rows'];
    
        $totalRows = $orders['total'];
        
        $allorders = $this->M_Base->all_data('orders');
    
            $data = array();
            foreach ($tableData as $index => $order) {
                if ($order['zone_id'] == 1) {
                    $order['zone_id'] = '';
                }
    
                if (is_array($order['user_id'])) {
                    $order['user_id'] = '';
                }
    
                if (strlen($order['user_id']) > 25) {
                    $order['user_id'] = 'Klik No Transaksi  ';
                } else {
                    $order['user_id'] = $order['user_id'];
                    // hide the data here
                }
    
                if (strlen($order['method']) > 16) {
                    $order['method'] = $order['method'] = substr($order['method'], 0, 13) . '...';
                } 
    
                $datax = $order['username'];
               
                
                $fee = $order['fee'] + $order['uniq'];
                $product_price = $order['price'] - $fee;
                if ($order['zone_id'] == 1 || $order['zone_id'] == '') {
                    $order['zone_id'] = '';
                    $zoneid = '';
                } else {
                    $zoneid = $order['zone_id'].'  <i class="fa fa-clone pl-2 clip" onclick="copy_zoneid('.$order['zone_id'].')" data-clipboard-text="'.$order['zone_id'].'"></i></b><br>';
                }
                $userid = $order['user_id'].'  <i class="fa fa-clone pl-2 clip" onclick="copy_userid('.$order['user_id'].')" data-clipboard-text="'.$order['user_id'].'"></i></b><br>';
                
                
                $date = date_create($order['date_create']);
                $formattedDate = date_format($date, 'Y-m-d');
                $time = substr($order['date_create'], 11);
    
                $data[$index] = array(
                    'no' => $index + 1,
                    'id' => $order['id'],
                    'date_create' => $formattedDate,
                    'time' => $time,
                    'username' => $datax,
                    'games' => $order['games'],
                    'product' => $order['product'] . ' | ' . $order['provider'],
                    'order_id' => $order['order_id'],
                    'trx_id' => $order['trx_id'],
                    'fee' => 'Rp ' . number_format($fee, 0, ',', '.'),
                    'raw_price' => 'Rp ' . number_format($order['raw_price'], 0, ',', '.'),
                    'product_price' => 'Rp ' . number_format($product_price, 0, ',', '.'),
                    'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                    'tujuan' => $order['user_id'] . $order['zone_id'],
                    'keterangan' => $order['ket'],
                    'method' => $order['method'] ,
                    'status' => $order['status'],
                );
                
            }
    
            $response = array(
                'total' => $totalRows,
                'rows' => $data
            );
    
            header('Content-Type: application/json');
        echo json_encode($response);
    }
}


