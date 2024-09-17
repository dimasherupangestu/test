<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index()
    {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $data = array_merge($this->base_data, [
                'title' => 'Beranda',
                'menu_active' => 'Beranda',
                'username' => $this->users['username'],
                'orders' => $this->M_Base->data_count('orders', ['username' => $this->users['username']]),
                'jumlahorder' => $this->M_Base->jumlah('orders', 'price', [
                    'status' => 'Success',
                    'username' => $this->users['username'],
                ]) + $this->M_Base->jumlah('orders', 'price', [
                    'status' => 'Finished',
                    'username' => $this->users['username'],
                ]),
                'riwayat' => $this->M_Base->data_where('orders', 'username', $this->users['username']),
                'riwayatpen' => $this->M_Base->data_count('orders', [
                    'status' => 'Pending',
                    'username' => $this->users['username'],
                ]) + $this->M_Base->data_count('orders', [
                    'status' => 'Processing',
                    'username' => $this->users['username'],
                ]),
                'jumlahsukses' => $this->M_Base->data_count('orders', [
                    'status' => 'Success',
                    'username' => $this->users['username'],
                ]) + $this->M_Base->data_count('orders', [
                    'status' => 'Processing',
                    'username' => $this->users['username'],
                ]),

            ]);


            return view('User/index', $data);
        }
    }

    public function editprofile()
    {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            
            if ($this->request->getPost('namalengkap')) {
                $data_post = [
                    'fullname' => addslashes(trim(htmlspecialchars($this->request->getPost('fullname')))),
                ];

                if (empty($data_post['fullname'])) {
                    $this->session->setFlashdata('error', 'Nama Lengkap masih kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', $data_post, $this->users['id']);

                    $this->session->setFlashdata('success', 'Nama Lengkap berhasil disimpan');
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

            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                ];

                if (empty($data_post['wa'])) {
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
            
            

            $data = array_merge($this->base_data, [
                'title' => 'Edit Profile',
                'username' => $users[0]['username'],
                'fullname' => $users[0]['fullname'],
            ]);


            return view('User/editprofile', $data);
        }
    }

//     public function membership($topup_id = null)
//     {

//         if ($this->users === false) {
//             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
//         } else {
//             if ($topup_id === null) {
//                 if ($this->request->getPost('tombol')) {
//                     $data_post = [
//                         'level' => addslashes(trim(htmlspecialchars($this->request->getPost('level')))),
//                         'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
//                     ];

//                     if (empty($data_post['level'])) {
//                         $this->session->setFlashdata('error', 'Pilihan Level tidak boleh kosong');
//                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                     } else if (empty($data_post['method'])) {
//                         $this->session->setFlashdata('error', 'Metode tidak boleh kosong');
//                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                     } else {
                        
//                         if ($data_post['method'] === 'balance') {
//                             $method = [
//                                     [
//                                         'id' => 10001,
//                                         'status' => 'On',
//                                         'provider' => 'Balance',
//                                         'method' => 'Saldo Akun',
//                                         'uniq' => 'N',
//                                     ]
//                                 ];
//                         } else {
//                             $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
//                         }
                                    
//                         $member_level = $this->M_Base->data_where('member_level', 'level', $data_post['level']);;

//                         if (count($method) === 1) {
//                             if ($method[0]['status'] == 'On') {

//                                 $topup_id = 'UPGRADE' . date('Ymd') . rand(000, 999);

//                                 $uniq = $method[0]['uniq'] == 'Y' ? rand(000, 999) : 0;

//                                 $amount = $member_level[0]['price'] + $uniq;

//                                 $amount = ceil($amount);

//                                 // Biaya dibebankan ke merchant
//                                 if ($method[0]['provider'] == 'Duitku') {

//                                     if (in_array($method[0]['code'], array('SP', 'NQ'))) {
//                                         $amount = ($amount * 1.007);
//                                     }

//                                     if ($method[0]['code'] == 'LQ') {
//                                         $amount = ($amount * 1.0078);
//                                     }

//                                 }

//                                 if ($method[0]['provider'] == 'Linkqu') { 
                                                
//                                     if ($method[0]['type'] == 'QRIS') { 
//                                         $fee = ($amount*0.007) ; 
//                                         $amount = $amount + $fee;
//                                     }  else if ($method[0]['type'] == 'Virtual Account') { 
                                        
                                        
//                                         if ( in_array($method[0]['code'], array('013','022,','011')) ) { 
//                                                 $fee = 2500 ;
//                                         } else if ( in_array($method[0]['code'], array('008','002,','490','451')) ) { 
//                                                 $fee = 3000 ;
//                                         } else {
//                                             $fee = 3500 ;
//                                         } 
                                        
//                                         $amount = $amount + $fee ;  
                                        
//                                     } else if ($method[0]['type'] == 'E-Wallet') { 
//                                         $fee = ($amount*0.018)+1000 ;
                                        
//                                         if ($method[0]['code'] == 'PAYSHOPEE') { 
//                                             $fee = ($amount*0.023)+1000 ; 
//                                         }
//                                         $amount = $amount + $fee;
                                        
//                                     } else if ($method[0]['type'] == 'Convenience Store') { 
//                                         $fee = 1500 ; 
//                                         $amount = $amount + $fee ;  
//                                     } else { 
//                                         $amount = $amount ;  
//                                     }
                                     
//                                 }

//                                 $amount = ceil($amount);
//                                 if ($method[0]['provider'] == 'Ipaymu') {

//                                     if ($method[0]['type'] == 'QRIS') {
//                                         $amount = ($amount * 1.007);
//                                     }
//                                     if ($method[0]['type'] == 'Virtual Account') {
//                                         $fee = 4000;
//                                         $amount = $amount + $fee;
//                                     }
//                                     if ($method[0]['type'] == 'E-Wallet') {
//                                         $amount = ($amount * 1.02);
//                                     }
//                                     if ($method[0]['type'] == 'Convenience Store') {
//                                         $fee = 4000;
//                                         $amount = $amount + $fee;
//                                     } else {
//                                         $amount = $amount;
//                                     }

//                                 }
                                
//                                 if ($method[0]['provider'] == 'Smartlink') {

//                                     if (in_array($method[0]['code'], array('VA_BNI', 'VA_BRI', 'VA_BNC', 'VA_CIMB', 'VA_MANDIRI', 'VA_PERMATA'))) {
//                                         $amount = ($amount + 3500);
//                                     }

//                                     if ($method[0]['code'] == 'WALLET_QRIS') {
//                                         $amount = ($amount * 1.01);
//                                     }

//                                     if ($method[0]['code'] == 'WALLET_SHOPEEPAY') {
//                                         $amount = ($amount * 1.045);
//                                     }

//                                     if ($method[0]['code'] == 'WALLET_OVO') {
//                                         $amount = ($amount * 1.035);
//                                     }

//                                     if ($method[0]['code'] == 'WALLET_DANA') {
//                                         $amount = ($amount * 1.02);
//                                     }

//                                     if ($method[0]['code'] == 'WALLET_LINKAJA') {
//                                         $amount = ($amount * 1.02);
//                                     }

//                                     if ($method[0]['code'] == 'CC_VISA') {
//                                         $amount = ($amount * 1.0275);
//                                     }

//                                     if (in_array($method[0]['code'], array('OTC_ALFAMART', 'OTC_INDOMARET'))) {
//                                         $amount = ($amount + 3500);
//                                     }

//                                 }
//                                 // end
//                                 $status = 'Pending';
                                
//                                 if ($method[0]['provider'] == 'Tripay') {

//                                     $data = [
//                                         'method' => $method[0]['code'],
//                                         'merchant_ref' => $topup_id,
//                                         'amount' => $amount,
//                                         'customer_name' => $this->users['username'],
//                                         'customer_email' => 'email@domain.com',
//                                         'customer_phone' => $this->users['wa'],
//                                         'order_items' => [
//                                             [
//                                                 'sku' => 'DS',
//                                                 'name' => 'Topup Saldo',
//                                                 'price' => $amount,
//                                                 'quantity' => 1,
//                                             ]
//                                         ],
//                                         'return_url' => base_url(),
//                                         'expired_time' => (time() + (24 * 60 * 60)),
//                                         // 24 jam
//                                         'signature' => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant') . $topup_id . $amount, $this->M_Base->u_get('tripay-private'))
//                                     ];

//                                     $curl = curl_init();

//                                     curl_setopt_array($curl, [
//                                         CURLOPT_FRESH_CONNECT => true,
//                                         CURLOPT_URL => 'https://tripay.co.id/api/transaction/create',
//                                         CURLOPT_RETURNTRANSFER => true,
//                                         CURLOPT_HEADER => false,
//                                         CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $this->M_Base->u_get('tripay-key')],
//                                         CURLOPT_FAILONERROR => false,
//                                         CURLOPT_POST => true,
//                                         CURLOPT_POSTFIELDS => http_build_query($data),
//                                         CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
//                                     ]);

//                                     $result = curl_exec($curl);
//                                     $result = json_decode($result, true);

//                                     if ($result) {
//                                         if ($result['success'] == true) {
//                                             if (array_key_exists('qr_url', $result['data'])) {
//                                                 $payment_code = $result['data']['qr_url'];
//                                             } else {
//                                                 if ($result['data']['pay_code']) {
//                                                     $payment_code = $result['data']['pay_code'];
//                                                 } else {
//                                                     $payment_code = $result['data']['checkout_url'];
//                                                 }
//                                             }
//                                         } else {
//                                             $this->session->setFlashdata('error', 'Result : ' . $result['message']);
//                                             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                         }
//                                     } else {
//                                         $this->session->setFlashdata('error', 'Gagal terkoneksi ke Tripay');
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     }

//                                 } else if ($method[0]['provider'] == 'Smartlink') {

//                                     $username1 =  $this->M_Base->u_get('smartlink-user'); 
//                                     $password1 =  $this->M_Base->u_get('smartlink-pass');
//                                     $auth = base64_encode($username1 . ':' . $password1);
//                                     $paymentAmount = $amount;
//                                     $paymentMethod = $method[0]['code']; 
//                                     $merchantOrderId = $topup_id; // dari merchant, unik
//                                     $productDetails = 'Web Topup' . $this->users['username'];
//                                     $email = $topup_id.'@camatstore.com'; // email pelanggan anda
//                                     $phoneNumber = $this->users['wa']; // nomor telepon pelanggan anda (opsional)
//                                     if ($this->users == false) {
                                    
//                                     $customerVaName = 'Camat Store  ' . $topup_id ;

//                                     } else {
//                                         $customerVaName = $this->users['username']; 
//                                     }
//                                     $callbackUrl = base_url() . '/sistem/callback/smartlink'; // url untuk callback
//                                     $returnUrl = base_url() . '/user'; // url untuk redirect
//                                     $expiryPeriod =  (1 * 60 * 60); 
//                                     $expiryTime = time() + $expiryPeriod;
//                                     $expiryISO = gmdate('Y-m-d\TH:i:s\+00:00', $expiryTime);
//                                     $signature = md5($merchantCode.$merchantOrderId.$paymentAmount.$apiKey);
                                    
//                                     //$url = 'https://payment-service-sbx.pakar-digital.com/api/payment/create-order'; // Sandbox
//                                     $url = 'https://payment-service.pakar-digital.com/api/payment/create-order'; // Production

//                                     $curl = curl_init();
                                    
//                                     curl_setopt_array($curl, array(
//                                       CURLOPT_URL => $url,
//                                       CURLOPT_RETURNTRANSFER => true,
//                                       CURLOPT_ENCODING => '',
//                                       CURLOPT_MAXREDIRS => 10,
//                                       CURLOPT_TIMEOUT => 0,
//                                       CURLOPT_FOLLOWLOCATION => true,
//                                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                       CURLOPT_CUSTOMREQUEST => 'POST',
//                                       CURLOPT_POSTFIELDS =>'{
//                                         "order_id" : "'.$merchantOrderId.'",
//                                         "amount" : '.$paymentAmount.',
//                                         "description" : "'.$productDetails.'",
//                                         "customer" : {
//                                             "name" : "'.$customerVaName.'",
//                                             "email" : "'.$email.'",
//                                             "phone" : "'.$phoneNumber.'"
//                                         },
//                                         "item" : [
//                                             {
//                                                 "name" : "'.$productDetails.'",
//                                                 "amount" : '.$paymentAmount.',
//                                                 "qty" : 1
//                                             }
//                                         ],
//                                         "channel" : ["'.$paymentMethod.'"],
//                                         "type" : "json",
//                                         "expired_time" : "'.$expiryISO.'",
//                                         "callback_url" : "'.$callbackUrl.'",
//                                         "success_redirect_url" : "'.$returnUrl.'",
//                                         "failed_redirect_url" : "'.$returnUrl.'"
//                                     }',
//                                       CURLOPT_HTTPHEADER => array(
//                                         'Authorization: Basic ' . $auth,
//                                         'Content-Type: application/json'
//                                       ),
//                                     ));
                                    
//                                     $response = curl_exec($curl);
//                                     $logData = json_encode($response);
//                                     $file = fopen(WRITEPATH . 'logs/log_create_smartlink' . date("j.n.Y") . '.txt', "a");
//                                     fwrite($file, $logData . "\n");
//                                     fclose($file);
//                                     curl_close($curl);
//                                     $result = json_decode($response, true);

//                                     if ($result) {
//                                         if ($result['status'] == 'success') {
//                                             $payment_code = $result['data']['payment_url'];
//                                             $trx = $result['data']['transaction_id'];

                                         
                                            
//                                             if (array_key_exists('qr_string', $result['data']['payment_details'])) {
//                                                 $payment_code = $result['data']['payment_details']['qr_string'];
//                                             } else if (array_key_exists('redirect_url_http', $result['data']['payment_details'])) {
//                                                 $payment_code = $result['data']['payment_details']['redirect_url_http'];
//                                             } else if (array_key_exists('payment_code', $result['data']['payment_details'])) {
//                                                 $payment_code = $result['data']['payment_details']['payment_code'];
//                                             } else if (array_key_exists('va_number', $result['data']['payment_details'])) {
//                                                 $payment_code = $result['data']['payment_details']['va_number'];
//                                             }  else {
//                                                 $payment_code = $result['message'];
//                                             }

//                                             if (empty($payment_code)) {
//                                                 $this->session->setFlashdata('error', 'Result : ' . $result['message']);
//                                             }
                                            
//                                         } else {
//                                             $this->session->setFlashdata('error', 'Result : ' . $result['message']);
//                                             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                         }
//                                     } else {
//                                         $this->session->setFlashdata('error', 'Gagal terkoneksi ke Smartlink');
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     }
                                              
//                                 } else if ($method[0]['provider'] == 'Ipaymu') {

//                                     $vaIpaymu = $this->M_Base->u_get('va-ipaymu');
//                                     $apiKey = $this->M_Base->u_get('api-ipaymu');
//                                     $paymentAmount = $amount;
//                                     $paymentMethod = $method[0]['code']; // VC = Credit Card
//                                     $merchantOrderId = $topup_id; // dari merchant, unik
//                                     $productDetails = 'Web Top Up';
//                                     $random_bytes = random_bytes(5);
//                                     $random_string = bin2hex($random_bytes);
//                                     $email = $random_string . '@camatstore.com';
//                                     $phoneNumber = $this->users['wa'] . rand(00, 99);
//                                     $customerVaName = $this->users['username']; // tampilan nama pada tampilan konfirmasi bank
//                                     $callbackUrl = base_url() . '/sistem/callback/ipaymu'; // url untuk callback
//                                     $returnUrl = base_url() . '/user'; // url untuk redirect
//                                     $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
//                                     $date_sk = date('YmdHis');

//                                     if ($method[0]['type'] == 'QRIS') {
//                                         $methodType = 'qris';
//                                     } else if ($method[0]['type'] == 'Virtual Account') {
//                                         $methodType = 'va';
//                                     } else if ($method[0]['type'] == 'Convenience Store') {
//                                         $methodType = 'cstore';
//                                     }

//                                     //$url = 'https://sandbox.ipaymu.com'; // Sandbox
//                                     $url = 'https://my.ipaymu.com'; // Production

//                                     $requestBody = array(
//                                         'name' => $customerVaName,
//                                         'phone' => $phoneNumber,
//                                         'email' => $email,
//                                         'amount' => $paymentAmount,
//                                         'notifyUrl' => $callbackUrl,
//                                         'expired' => '24',
//                                         'expiredType' => 'hours',
//                                         'comments' => $productDetails,
//                                         'referenceId' => $merchantOrderId,
//                                         'paymentMethod' => $methodType,
//                                         'paymentChannel' => $paymentMethod,
//                                     );

//                                     // convert HTTP method to uppercase
//                                     $httpMethod = 'POST'; //method

//                                     $jsonBody = json_encode($requestBody, JSON_UNESCAPED_SLASHES);
//                                     $requestBody = strtolower(hash('sha256', $jsonBody));
//                                     $stringToSign = strtoupper($httpMethod) . ':' . $vaIpaymu . ':' . $requestBody . ':' . $apiKey;
//                                     $signature = hash_hmac('sha256', $stringToSign, $apiKey);


//                                     $curl = curl_init();

//                                     curl_setopt_array(
//                                         $curl,
//                                         array(
//                                             CURLOPT_URL => '' . $url . '/api/v2/payment/direct',
//                                             CURLOPT_RETURNTRANSFER => true,
//                                             CURLOPT_ENCODING => '',
//                                             CURLOPT_MAXREDIRS => 10,
//                                             CURLOPT_TIMEOUT => 0,
//                                             CURLOPT_FOLLOWLOCATION => true,
//                                             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                             CURLOPT_CUSTOMREQUEST => 'POST',
//                                             CURLOPT_POSTFIELDS => $jsonBody,
//                                             CURLOPT_HTTPHEADER => array(
//                                                 'Accept: application/json',
//                                                 'Content-Type: application/json',
//                                                 'signature: ' . $signature,
//                                                 'va: ' . $vaIpaymu . '',
//                                                 'timestamp: ' . $date_sk . ''
//                                             ),
//                                         )
//                                     );

//                                     $response = curl_exec($curl);
//                                     curl_close($curl);
//                                     $result = json_decode($response, true);

//                                     if ($result['Status'] == 200) {

//                                         $trx = $result['Data']['SessionId'];
//                                         $payment_code = $result['Data']['PaymentNo'];
//                                         $amount = $result['Data']['Total'];
//                                         if ($method[0]['type'] == 'Convenience Store') {
//                                             $ket = $result['Data']['Note'];
//                                         }

//                                     } else {
//                                         $this->session->setFlashdata('error', 'Result : ' . $result['Message']);
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     }



//                                 } else if ($method[0]['provider'] == 'Linkqu') {

//                                     $username_linkqu =  $this->M_Base->u_get('username_linkqu'); 
//                                     $pin_linkqu =  $this->M_Base->u_get('pin_linkqu');
//                                     $id_linkqu =  $this->M_Base->u_get('id_linkqu'); 
//                                     $secret_linkqu =  $this->M_Base->u_get('secret_linkqu');
//                                     $serverKey = $this->M_Base->u_get('signkey_linkqu');
//                                     //$url = 'https://gateway-dev.linkqu.id'; // Sandbox
//                                     $url = 'https://gateway.linkqu.id'; // Production

//                                     $paymentAmount = $amount;
//                                     $paymentMethod = $method[0]['code']; // VC = Credit Card
//                                     $merchantOrderId = $topup_id; // dari merchant, unik
//                                     $productDetails = 'Web Top Up';
//                                     $letters = range('a', 'z'); // an array containing all letters of the alphabet
//                                     shuffle($letters); // shuffle the array to randomize the order of the letters
//                                     $random_letters = implode('', array_slice($letters, 0, 10)); // take the first 5 letters and join them into a string
//                                     $email = $random_letters.'@gmail.com'; // email pelanggan anda
//                                     $phoneNumber = $this->users['wa'];  // nomor telepon pelanggan anda (opsional)
                                    
                                    
//                                     if ($this->users == false) {
//                                     $namaweb = $this->M_Base->u_get('web-name');
//                                     $customerVaName = $namaweb.' '.$topup_id;
                                    
//                                     } else {
//                                         $customerVaName = $this->users['username']; 
//                                     }
                                    
//                                     $callbackUrl = base_url() . '/sistem/callback/linkqu'; // url untuk callback
//                                     $returnUrl = base_url() . '/user' ; // url untuk redirect
//                                     $imageUrl = base_url() . '/assets/images/games/' . $games[0]['image']; // url untuk redirect
//                                     $date_sk = date('YmdHis');
//                                     $expired = date('YmdHis', strtotime($date_sk . ' +1 day'));
//                                     $methodcurl = "POST";
//                                     $regex = "/[^0-9a-zA-Z]/";

//                                     if ($method[0]['type'] == 'QRIS') {
//                                         $path = '/transaction/create/qris';
//                                         $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
//                                     } else if ($method[0]['type'] == 'Virtual Account') {
//                                         $path = '/transaction/create/va';
//                                         $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
//                                     } else if ($method[0]['type'] == 'E-Wallet') {
//                                         $path = '/transaction/create/paymentewallet';
//                                         if ($method[0]['code'] == 'PAYOVO') {
//                                             $path = '/transaction/create/ovopush';
//                                         }
//                                         $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $phoneNumber . $id_linkqu));
//                                     } else if ($method[0]['type'] == 'Convenience Store') {
//                                         $path = '/transaction/create/retail';
//                                         $value = strtolower(preg_replace($regex, "", $paymentAmount . $expired . $paymentMethod . $topup_id . $phoneNumber . $customerVaName . $email . $id_linkqu));
//                                     }

//                                     $valuesign = $path . $methodcurl . $value;

//                                     $signature = hash_hmac('sha256', $valuesign, $serverKey);
                                    
                                    
//                                     if ($method[0]['type'] == 'Virtual Account') { 
                                        
//                                         $curl = curl_init();

//                                         curl_setopt_array($curl, array(
//                                           CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/va',
//                                           CURLOPT_RETURNTRANSFER => true,
//                                           CURLOPT_ENCODING => '',
//                                           CURLOPT_MAXREDIRS => 10,
//                                           CURLOPT_TIMEOUT => 0,
//                                           CURLOPT_FOLLOWLOCATION => true,
//                                           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                           CURLOPT_CUSTOMREQUEST => 'POST',
//                                           CURLOPT_POSTFIELDS =>'{
//                                         	"amount" : '.$paymentAmount.',
//                                         	"partner_reff" : "'.$merchantOrderId.'",
//                                         	"customer_id" : "'.$phoneNumber.'",
//                                         	"customer_name" : "'.$customerVaName.'",
//                                         	"expired" : "'.$expired.'",
//                                         	"username" : "'.$username_linkqu.'",
//                                         	"pin" : "'.$pin_linkqu.'",
//                                         	"customer_phone" : "'.$phoneNumber.'",
//                                         	"customer_email" : "'.$email.'",
//                                             "bank_code" : "'.$paymentMethod.'",
//                                                         "signature" : ' . $signature . '
//                                         }',
//                                           CURLOPT_HTTPHEADER => array(
//                                             'client-id: '.$id_linkqu.' ',
//                                             'client-secret: '.$secret_linkqu.''
//                                           ),
//                                         ));

//                                         $result = json_decode(curl_exec($curl), true);
                                        
//                                         if ($result['response_code'] == 00) {
//                                             $payment_code = $result['virtual_account'];
//                                         } else {
//                                             $payment_code = $result['response_desc'];
//                                         }
                                        
                                        
                                        
                                        
//                                     } else if ($method[0]['type'] == 'E-Wallet') {
                                        
//                                         if ($method[0]['code'] == 'PAYOVO') {
                                            
//                                             $curl = curl_init();

//                                             curl_setopt_array($curl, array(
//                                               CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/ovopush',
//                                               CURLOPT_RETURNTRANSFER => true,
//                                               CURLOPT_ENCODING => '',
//                                               CURLOPT_MAXREDIRS => 10,
//                                               CURLOPT_TIMEOUT => 0,
//                                               CURLOPT_FOLLOWLOCATION => true,
//                                               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                               CURLOPT_CUSTOMREQUEST => 'POST',
//                                               CURLOPT_POSTFIELDS =>'{
//                                             	"amount" : '.$paymentAmount.',
//                                             	"partner_reff" : "'.$merchantOrderId.'",
//                                             	"customer_id" : "'.$phoneNumber.'",
//                                             	"customer_name" : "'.$customerVaName.'",
//                                             	"expired" : "'.$expired.'",
//                                             	"username" : "'.$username_linkqu.'",
//                                             	"pin" : "'.$pin_linkqu.'",
//                                                 "retail_code" : "PAYOVO",
//                                             	"customer_phone" : "'.$phoneNumber.'",
//                                             	"customer_email" : "'.$email.'",
//                                                 "ewallet_phone" : "'.$phoneNumber.'",
//                                                 "bill_title" : "'.$productDetails.'"
//                                             "bank_code" : "'.$paymentMethod.'",
//                                                         "signature" : ' . $signature . '
//                                             }',
//                                               CURLOPT_HTTPHEADER => array(
//                                                 'client-id: '.$id_linkqu.' ',
//                                                 'client-secret: '.$secret_linkqu.''
//                                               ),
//                                             ));
                                            
                                            
//                                             $result = json_decode(curl_exec($curl), true);
                                            
                                            
//                                             if ($result['response_code'] == 00) {
//                                                 $payment_code = "Cek Notifikasi di Aplikasi OVO anda untuk melakukan Pembayaran";
//                                             } else {
//                                                 $payment_code = $result['response_desc'];
//                                             }
                                            
                                           
                                            
//                                         } else {
//                                          $curl = curl_init();

//                                         curl_setopt_array($curl, array(
//                                           CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/paymentewallet',
//                                           CURLOPT_RETURNTRANSFER => true,
//                                           CURLOPT_ENCODING => '',
//                                           CURLOPT_MAXREDIRS => 10,
//                                           CURLOPT_TIMEOUT => 0,
//                                           CURLOPT_FOLLOWLOCATION => true,
//                                           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                           CURLOPT_CUSTOMREQUEST => 'POST',
//                                           CURLOPT_POSTFIELDS =>'{
//                                         	"amount" : '.$paymentAmount.',
//                                         	"partner_reff" : "'.$merchantOrderId.'",
//                                         	"customer_id" : "'.$phoneNumber.'",
//                                         	"customer_name" : "'.$customerVaName.'",
//                                         	"expired" : "'.$expired.'",
//                                         	"username" : "'.$username_linkqu.'",
//                                         	"pin" : "'.$pin_linkqu.'",
//                                             "retail_code" : "'.$paymentMethod.'",
//                                         	"customer_phone" : "'.$phoneNumber.'",
//                                         	"customer_email" : "'.$email.'",
//                                             "ewallet_phone" : "'.$phoneNumber.'",
//                                             "bill_title" : "'.$productDetails.'",
//                                             "bank_code" : "'.$paymentMethod.'",
//                                                         "signature" : ' . $signature . '
//                                         }',
//                                           CURLOPT_HTTPHEADER => array(
//                                             'client-id: '.$id_linkqu.' ',
//                                             'client-secret: '.$secret_linkqu.''
//                                           ),
//                                         ));
                                        
//                                         $result = json_decode(curl_exec($curl), true);
                                        
                                        
//                                         if ($result['response_code'] == 00) {
//                                             $payment_code = $result['url_payment'];
//                                         } else {
//                                             $payment_code = $result['response_desc'];
//                                         }
                                        
                                        
//                                         }
                                        
                                        
                                        
//                                     } else if ($method[0]['type'] == 'Convenience Store') { 
                                        
//                                         $curl = curl_init();

//                                         curl_setopt_array($curl, array(
//                                           CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/retail',
//                                           CURLOPT_RETURNTRANSFER => true,
//                                           CURLOPT_ENCODING => '',
//                                           CURLOPT_MAXREDIRS => 10,
//                                           CURLOPT_TIMEOUT => 0,
//                                           CURLOPT_FOLLOWLOCATION => true,
//                                           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                           CURLOPT_CUSTOMREQUEST => 'POST',
//                                           CURLOPT_POSTFIELDS =>'{
//                                         	"amount" : '.$paymentAmount.',
//                                         	"partner_reff" : "'.$merchantOrderId.'",
//                                         	"customer_id" : "'.$phoneNumber.'",
//                                         	"customer_name" : "'.$customerVaName.'",
//                                         	"expired" : "'.$expired.'",
//                                         	"username" : "'.$username_linkqu.'",
//                                         	"pin" : "'.$pin_linkqu.'",
//                                             "retail_code" : "'.$paymentMethod.'",
//                                         	"customer_phone" : "'.$phoneNumber.'",
//                                         	"customer_email" : "'.$email.'",
//                                             "bank_code" : "'.$paymentMethod.'",
//                                                         "signature" : ' . $signature . '
//                                         }',
//                                           CURLOPT_HTTPHEADER => array(
//                                             'client-id: '.$id_linkqu.' ',
//                                             'client-secret: '.$secret_linkqu.''
//                                           ),
//                                         ));
                                        
//                                         $result = json_decode(curl_exec($curl), true);
                                        
//                                         if ($result['response_code'] == 00) {
//                                             $payment_code = $result['payment_code'];
//                                         } else {
//                                             $payment_code = $result['response_desc'];
//                                         }
                                        
                                        
                                        
                                        
//                                     } else if ($method[0]['type'] == 'QRIS') {
                                       
//                                         $curl = curl_init();

//                                         curl_setopt_array($curl, array(
//                                           CURLOPT_URL => ''.$url.'/linkqu-partner/transaction/create/qris',
//                                           CURLOPT_RETURNTRANSFER => true,
//                                           CURLOPT_ENCODING => '',
//                                           CURLOPT_MAXREDIRS => 10,
//                                           CURLOPT_TIMEOUT => 0,
//                                           CURLOPT_FOLLOWLOCATION => true,
//                                           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                           CURLOPT_CUSTOMREQUEST => 'POST',
//                                           CURLOPT_POSTFIELDS =>'{
//                                         	"amount" : '.$paymentAmount.',
//                                         	"partner_reff" : "'.$merchantOrderId.'",
//                                         	"customer_id" : "'.$phoneNumber.'",
//                                         	"customer_name" : "'.$customerVaName.'",
//                                         	"expired" : "'.$expired.'",
//                                         	"username" : "'.$username_linkqu.'",
//                                         	"pin" : "'.$pin_linkqu.'",
//                                         	"customer_phone" : "'.$phoneNumber.'",
//                                         	"customer_email" : "'.$email.'",
//                                                         "signature" : ' . $signature . '
//                                         }',
//                                           CURLOPT_HTTPHEADER => array(
//                                             'client-id: '.$id_linkqu.' ',
//                                             'client-secret: '.$secret_linkqu.''
//                                           ),
//                                         ));
                                        
//                                         $result = json_decode(curl_exec($curl), true);
                                        
//                                         if ($result['response_code'] == 00) {
//                                             $payment_code = $result['imageqris'];
//                                         } else {
//                                             $payment_code = $result['response_desc'];
//                                         }
                                        
                                        
                                        
                                        
                                        
                                        
//                                     }


                                              
//                                 } else if ($method[0]['provider'] == 'Duitku') {

//                                     $merchantCode = $this->M_Base->u_get('duitku-merchant'); // dari duitku
//                                     $apiKey = $this->M_Base->u_get('duitku-key'); // dari duitku
//                                     $paymentAmount = $amount;
//                                     $paymentMethod = $method[0]['code']; // VC = Credit Card
//                                     $merchantOrderId = $topup_id; // dari merchant, unik
//                                     $productDetails = 'Web Top Up';
//                                     $email = 'email@domain.com'; // email pelanggan anda
//                                     $phoneNumber = $this->users['wa']; // nomor telepon pelanggan anda (opsional)
//                                     $customerVaName = $this->users['username']; // tampilan nama pada tampilan konfirmasi bank
//                                     $callbackUrl = base_url() . '/sistem/callback/duitku281230asj2130123'; // url untuk callback
//                                     $returnUrl = base_url() . '/user'; // url untuk redirect
//                                     $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit
//                                     $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

                                    

//                                     $params = array(
//                                         'merchantCode' => $merchantCode,
//                                         'paymentAmount' => $paymentAmount,
//                                         'paymentMethod' => $paymentMethod,
//                                         'merchantOrderId' => $merchantOrderId,
//                                         'productDetails' => $productDetails,
//                                         'customerVaName' => $customerVaName,
//                                         'email' => $email,
//                                         'phoneNumber' => $phoneNumber,
//                                         // 'accountLink' => $accountLink,
//                                         'callbackUrl' => $callbackUrl,
//                                         'returnUrl' => $returnUrl,
//                                         'signature' => $signature,
//                                         'expiryPeriod' => $expiryPeriod
//                                     );

//                                     $params_string = json_encode($params);
//                                     //echo $params_string;
//                                     // $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
//                                     $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
//                                     $ch = curl_init();

//                                     curl_setopt($ch, CURLOPT_URL, $url);
//                                     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//                                     curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
//                                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                                     curl_setopt(
//                                         $ch,
//                                         CURLOPT_HTTPHEADER,
//                                         array(
//                                             'Content-Type: application/json',
//                                             'Content-Length: ' . strlen($params_string)
//                                         )
//                                     );
//                                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

//                                     //execute post
//                                     $request = curl_exec($ch);
//                                     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//                                     if ($httpCode == 200) {
//                                         $result = json_decode($request, true);

//                                         if (array_key_exists('vaNumber', $result)) {
//                                                             $payment_code = $result['vaNumber'];
//                                                         } else if (array_key_exists('qrString', $result)) {
//                                                             $payment_code = $result['qrString'];
//                                                         } else {
//                                                             $payment_code = $result['paymentUrl'];
//                                                         }
//                                     } else {
//                                         $result = json_decode($request, true);
//                                         $this->session->setFlashdata('error', 'Result : ' . $result['statusCode']);
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     }

//                                 } else if ($method[0]['provider'] == 'Tokopay') {
      
//                                     $merchant_id = $this->M_Base->u_get('tokopay-merchant'); // dari duitku
//                                     $apiKey = $this->M_Base->u_get('tokopay-secret-key'); // dari duitku
//                                     $amount = $amount;
//                                     $kode_channel = $method[0]['code'];
//                                     $reff_id = $topup_id;
//                                     $productDetails = 'Web Top Up';
//                                     $email = $topup_id.'@pointgo.id'; // email pelanggan anda
//                                     $phoneNumber = $this->users['wa']; // nomor telepon pelanggan anda (opsional)
//                                     $customerVaName = 'pointgo ' . $topup_id; // tampilan nama pada tampilan konfirmasi bank
//                                     $callbackUrl = base_url() . '/sistem/callback/TokoPayPoInGOo1239als08207'; // url untuk callback
//                                     $returnUrl = base_url() . '/user'; // url untuk redirect
//                                     $expiryPeriod = (24 * 60 * 60); // atur waktu kadaluarsa dalam hitungan menit;
//                                     $expired_ts = time() + $expiryPeriod;
//                                     $signature = md5($merchant_id . ':' . $apiKey . ':' . $reff_id);

//                                     $item1 = array(
//                                         'product_code' => 'TOPUP',
//                                         'name' => $productDetails,
//                                         'price' => $amount
//                                     );

//                                     $items = array($item1);

//                                     $curl = curl_init();

//                                     curl_setopt_array($curl, array(
//                                       CURLOPT_URL => 'https://api.tokopay.id/v1/order',
//                                       CURLOPT_RETURNTRANSFER => true,
//                                       CURLOPT_ENCODING => '',
//                                       CURLOPT_MAXREDIRS => 10,
//                                       CURLOPT_TIMEOUT => 0,
//                                       CURLOPT_FOLLOWLOCATION => true,
//                                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                                       CURLOPT_CUSTOMREQUEST => 'POST',
//                                       CURLOPT_POSTFIELDS =>'{
//                                         "merchant_id": "'.$merchant_id.'",
//                                         "kode_channel": "'.$kode_channel.'",
//                                         "reff_id": "'.$reff_id.'",
//                                         "amount": '.$amount.',
//                                         "customer_name": "'.$customerVaName.'",
//                                         "customer_email": "'.$email.'",
//                                         "customer_phone": "'.$phoneNumber.'",
//                                         "redirect_url": "'.$returnUrl.'",
//                                         "expired_ts": '.$expired_ts.',
//                                         "signature": "'.$signature.'",
//                                         "items": '.json_encode($items).'
//                                     }',
//                                       CURLOPT_HTTPHEADER => array(
//                                         'Merchant-Code: ' . $merchant_id,
//                                         'Authorization: ' . $apiKey,
//                                         'Content-Type: application/json'
//                                       ),
//                                     ));
                                    
//                                     $response = curl_exec($curl);
                                    
//                                       $log_file_name = 'log_tokopay_depo_' . date("j.n.Y") . '.txt'; // Include time in the log file name
// $file = fopen(WRITEPATH . 'logs/' . $log_file_name, "a");
// fwrite($file, date('Y-m-d H:i:s') . ' ' . $response.' |'.$reff_id . "\n"); // Include time in the log message
// fclose($file);

//                                     $result = json_decode($response, true);
                                    
//                                     curl_close($curl);

//                                     if ($result['status'] === 'Success') {

//                                         if (array_key_exists('nomor_va', $result['data'])) {
//                                             $payment_code = $result['data']['nomor_va'];
//                                         } else if (array_key_exists('qr_link', $result['data'])) {
//                                             $payment_code = $result['data']['qr_link'];
//                                         } else if (array_key_exists('ovo_push', $result['data'])) {
//                                             $payment_code = $result['data']['ovo_push'];
//                                         } else {
//                                             $payment_code = $result['data']['checkout_url'];
//                                         }
//                                     } elseif ($result['status'] == 0) {
//                                         $this->session->setFlashdata('error', 'Result : ' . $result['error_msg']);
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     }
        
//                                 } else if ($method[0]['provider'] == 'Manual') {
//                                     $payment_code = $method[0]['rek'];
//                                 } else if ($method[0]['provider'] == 'Balance') {

//                                     if ($this->users == false) {
//                                         $this->session->setFlashdata('error', 'Silahkan login dahulu');
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     } else if ($this->users['balance'] == 0) {
//                                         $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     } else if ($this->users['balance'] < $amount) {
//                                         $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
//                                         return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                     } else {

//                                         $payment_code = 'Saldo Akun';
//                                         $status = 'Success';
//                                         $method[0]['code'] = 'Balance';

//                                         $this->M_Base->data_update('users', [
//                                             'balance' => $this->users['balance'] - $amount,
//                                             'level' => $data_post['level'],
//                                         ], $this->users['id']);

//                                     }

//                                 } else {
//                                     $this->session->setFlashdata('error', 'Metode tidak terdaftar');
//                                     return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                                 }

//                                 $saldosb = $this->users['balance'];
//                                 $saldost = $saldosb + $amount;

//                                 $this->M_Base->data_insert('membership', [
//                                     'username' => $this->users['username'],
//                                     'topup_id' => $topup_id,
//                                     'method_id' => $method[0]['id'],
//                                     'method_code' => $method[0]['code'],
//                                     'method' => $method[0]['method'],
//                                     'payment_gateway' => $method[0]['provider'],
//                                     'payment_type' => $method[0]['type'],
//                                     'amount' => $amount,
//                                     'status' => $status,
//                                     'fee' => $fee,
//                                     'payment_code' => $payment_code,
//                                     'date_create' => date('Y-m-d G:i:s'),
//                                     'level' => $data_post['level'],
//                                 ]);

//                                 $this->session->setFlashdata('success', 'Upgrade Level');
//                                 return redirect()->to(base_url() . '/user/membership/' . $topup_id);
                                


//                             } else {
//                                 $this->session->setFlashdata('error', 'Metode tidak tersedia');
//                                 return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                             }
//                         } else {
//                             $this->session->setFlashdata('error', 'Metode tidak ditemukan');
//                             return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
//                         }
//                     }
//                 }
                
//                 $all_method = $this->M_Base->data_where('method', 'status', 'On');
//                 $level = $this->M_Base->all_data('member_level');

//                 $accordion_data = [];

//                 foreach ($all_method as $method) {
//                     if (!isset($accordion_data[$method['type']])) {
//                         $accordion_data[$method['type']] = [];
//                     }
//                  array_push($accordion_data[$method['type']], array('method' => $method['method'], 'image' => $method['image'], 'id' => $method['id'], 'code' => $method['code'], 'provider' => $method['provider'], 'tambahan' => $method['tambahan']));

//                 }

//                 $data = array_merge($this->base_data, [
//                     'title' => 'Membership',
//                     'method' => ($all_method),
//                     'level' => array_reverse($level),
//                     'pay_balance' => $this->M_Base->u_get('pay_balance'),
//                     'accordion_data' => $accordion_data,
//                     'menu_active' => 'Membership',
//                 ]);

//                 return view('User/Membership/membership', $data);
                
//             } else {
//                 $topup = $this->M_Base->data_where_array('membership', [
//                     'topup_id' => $topup_id,
//                 ]);

//                 if (count($topup) === 1) {

//                     $find_method = $this->M_Base->data_where('method', 'id', $topup[0]['method_id']);

//                     $instruksi = count($find_method) == 1 ? $find_method[0]['instruksi'] : '-';
//                     $images = count($find_method) == 1 ? $find_method[0]['image'] : '-';
//                     $namarek = count($find_method) == 1 ? $find_method[0]['namarek'] : '-';
                    
//                     $level = $topup[0]['level'];
//                     $find_alias = $this->M_Base->data_where('member_level', 'level', $topup[0]['level']);

//                     $data = array_merge($this->base_data, [
//                         'title' => 'Top Up',
//                         'topup' => array_merge($topup[0], [
//                             'instruksi' => $instruksi,
//                             'images' => $images,
//                             'namarek' => $namarek,
//                         ]),
//                         'level' => $find_alias[0]['alias'],
//                         'menu_active' => 'Topup',
//                     ]);

//                     return view('User/Membership/detail', $data);
//                 } else {
//                     if ($topup_id === 'riwayat') {
//                         $data = array_merge($this->base_data, [
//                             'title' => 'Membership',
//                             'topup' => array_reverse($this->M_Base->data_where('membership', 'username', $this->users['username'])),
//                             'menu_active' => 'Riwayat Membership',
//                         ]);

//                         return view('User/Membership/riwayat', $data);
//                     } else {
//                         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
//                     }
//                 }
//             }
//         }
//     }
    
    public function order($action = null, $id = null)
    {

        if ($action === 'get-price') {
            if (($id)) {
                $member_level = $this->M_Base->data_where('member_level', 'level', $id);

                $jumlah = 1;

                if (count($member_level) == 1) {

                    $product_price = $member_level[0]['price'];
                    
                    $amount = [];
                    foreach ($this->M_Base->all_data('method') as $loop) {

                        $custom_price = $product_price;

                        $amount[] = [
                            'method' => $loop['id'],
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }

                    if ($this->M_Base->u_get('pay_balance') == 'Y') {

                        $custom_price = $product_price;

                        $amount[] = [
                            'method' => 'balance',
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }
                    
                    echo json_encode($amount);
                    
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if ($action == 'get-detail') {

            if ( $this->request->getPost('method') ) {
                $data_post = [
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                ];

                $member_level = $this->M_Base->data_where('member_level', 'level', $id);

                if (count($member_level) === 1) {

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

                                echo json_encode([
                                    'status' => true,
                                    'msg' => '
                                    <form action="" method="POST">

                                        <input type="hidden" name="level" value="' . $id . '">
                                        <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                       

                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Upgrade ke Level :</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $member_level[0]['alias'] . '</td>
                                                </tr>
                                              
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data Anda sudah benar. Kesalahan input data bukan tanggung jawab kami. </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn btn-danger text-white"" type="button" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                        </div>
                                    </form>
                                    ',
                                ]);
                            
                        
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
    
    public function riwayat()
    {

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

    public function referal()
    {

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
                                    $callbackUrl = base_url() . '/sistem/callback/duitku281230asj2130123'; // url untuk callback
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
                                                        } else if (array_key_exists('qrString', $result)) {
                                                            $payment_code = $result['qrString'];
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
}