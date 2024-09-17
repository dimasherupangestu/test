<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{

    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }


        $data = array_merge($this->base_data, [
            'title' => 'Pesanan',
        ]);

        return view('Admin/Pesanan/index', $data);
    }

    public function getOrderCounts()
{
    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    }

    $pendingCount = $this->M_Base->data_count('orders', ['status' => 'Pending']);
    $processingCount = $this->M_Base->data_count('orders', ['status' => 'Processing']);
    $canceledCount = $this->M_Base->data_count('orders', ['status' => 'Canceled']);
    $successCount = $this->M_Base->data_count('orders', ['status' => 'Success']);
    $pendingTopup = $this->M_Base->data_count('topup', ['status' => 'Pending']);

    $orderCounts = [
        'pendingCount' => $pendingCount,
        'pendingTopup' => $pendingTopup,
        'processingCount' => $processingCount,
        'canceledCount' => $canceledCount,
        'successCount' => $successCount,
    ];

    echo json_encode($orderCounts);
}

    public function pending()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Pending',
        ]);

        return view('Admin/Pesanan/pending', $data);
    }

    public function processing()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Processing',
        ]);

        return view('Admin/Pesanan/processing', $data);
    }

    public function canceled()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Canceled',
        ]);

        return view('Admin/Pesanan/canceled', $data);
    }

    public function success()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Success',
        ]);

        return view('Admin/Pesanan/success', $data);
    }
    
    public function expired()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Expired',
        ]);

        return view('Admin/Pesanan/expired', $data);
    }
    
    public function topup()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Topup',
        ]);

        return view('Admin/Pesanan/topup', $data);
    }

    public function manual()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Manual',
        ]);

        return view('Admin/Pesanan/manual', $data);
    }
    
    public function backuporders()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan Backup',
        ]);

        return view('Admin/Pesanan/backuporders', $data);
    }
    
    public function get_orders_data_backup()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

          // Get the requested page number and number of records per page
     // Get the requested page number and number of records per page
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;

    // Retrieve a subset of data from the database based on offset and limit
    $orders = $this->M_Base->get_paginated_data_orders_backup('orders_backup', $offset, $limit);
    
    $allorders = $this->M_Base->all_data('orders_backup');

        $data = array();
        foreach ($orders as $index => $order) {
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
                'method' => $order['method'] ,
                'status' => $order['status'],
            );
            
        }

        $response = array(
            'total' => count($allorders),
            'rows' => $data
        );

        header('Content-Type: application/json');
    echo json_encode($response);
    }
    
    public function get_orders_data()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
    $search = $_GET['search'] ?? '';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;
    
    $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

    $orders = $this->M_Base->get_paginated_data('orders', $search, $offset, $limit, [
        'date_create >=' => $sevenday
    ]);
    
    $tableData = $orders['rows'];

    $totalRows = $orders['total'];
    
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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

    public function get_orders_data_pending()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

        $orders = $this->M_Base->data_where_array_limit('orders', [
            'status' => 'Pending',
            'date_create >=' => $sevenday,
        ], 40000);

        $data = array();
        foreach ($orders as $index => $order) {
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

            //copy

            if (strlen($order['method']) > 16) {
                $order['method'] = $order['method'] = substr($order['method'], 0, 13) . '...';
            } 

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $orderDate = strtotime($order['date_create']); // Tanggal pada order
            
            if ($orderDate > $targetDate) {
                if ($order['saldosb'] == 0 || $order['saldost'] == 0) {
                    $datax = $order['username'];
                } else {
                    $datax = $order['username'] . '<br> Saldo Sebelum : ' . 'Rp ' . number_format($order['saldosb'], 0, ',', '.') . '<br> Saldo Sesudah : ' . 'Rp ' . number_format($order['saldost'], 0, ',', '.');
                }
            } else {
                $datax = $order['username'];
            }
            
            if ($order['trx_id'] == $order['order_id']) {
                $order['trx_id'] = '';
            }
            
            
            
            $fee = $order['fee'] + $order['uniq'];
            $product_price = $order['price'] - $fee + $order['diskon'];
            
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
                'status' => $order['status'],
            );

            
        }

        $response = array(
            'total' => count($data),
            'totalNotFiltered' => count($data),
            'rows' => $data
        );

        echo json_encode($response);
        //end copy
    }

    public function get_orders_data_processing()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $orders = $this->M_Base->data_where_array_limit('orders', [
            'status' => 'Processing',
        ]);

        $data = array();
        foreach ($orders as $index => $order) {
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

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $orderDate = strtotime($order['date_create']); // Tanggal pada order
            
            if ($orderDate > $targetDate) {
                if ($order['saldosb'] == 0 || $order['saldost'] == 0) {
                    $datax = $order['username'];
                } else {
                    $datax = $order['username'] . '<br> Before : ' . 'Rp ' . number_format($order['saldosb'], 0, ',', '.') . '<br> After : ' . 'Rp ' . number_format($order['saldost'], 0, ',', '.');
                }
            } else {
                $datax = $order['username'];
            }
            
            if ($order['trx_id'] == $order['order_id']) {
                $order['trx_id'] = '';
            }
            
            
            
            $fee = $order['fee'] + $order['uniq'];
            $product_price = $order['price'] - $fee;
            
            if ($order['payment_gateway'] == 'Xendit') {
				if (in_array($order['payment_type'], array('QRIS'))) {
					$product_price = ($order['price'] / 1.015)-$order['uniq'];
				} else if (in_array($order['payment_type'], array('Virtual Account'))) {
					$product_price = ($order['price'] - 4440)-$order['uniq'];
				} else if (in_array($order['payment_type'], array('E-Wallet'))) {
					$product_price = ($order['price'] / 1.015)-$order['uniq'];
				} else if (in_array($order['payment_type'], array('Convenience Store'))) {
					
					if ($order['method_code'] == 'INDOMARET') {
						$fee = 10000;
					}
					if ($order['method_code'] == 'ALFAMART') {
						$fee = 5000;
					}

					$product_price = ($order['price'] - $fee-$order['uniq']);

				} else {
					$product_price = ($order['price']-$order['uniq']);
				}
			}
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
                'tujuan' => $order['user_id'] .'('. $order['zone_id'].')',
                'keterangan' => $order['ket'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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

    public function get_orders_data_canceled()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

        $orders = $this->M_Base->data_where_array_limit('orders', [
            'status' => 'Canceled',
            'date_create >=' => $sevenday,
        ]);

        $data = array();
        foreach ($orders as $index => $order) {
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

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $orderDate = strtotime($order['date_create']); // Tanggal pada order
            
            if ($orderDate > $targetDate) {
                if ($order['saldosb'] == 0 || $order['saldost'] == 0) {
                    $datax = $order['username'];
                } else {
                    $datax = $order['username'] . '<br> Saldo Sebelum : ' . 'Rp ' . number_format($order['saldosb'], 0, ',', '.') . '<br> Saldo Sesudah : ' . 'Rp ' . number_format($order['saldost'], 0, ',', '.');
                }
            } else {
                $datax = $order['username'];
            }
            
            if ($order['trx_id'] == $order['order_id']) {
                $order['trx_id'] = '';
            }
            
            
            
            $fee = $order['fee'] + $order['uniq'];
            $product_price = $order['price'] - $fee + $order['diskon'];
            
           
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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
    
    public function get_orders_data_expired()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
    $search = $_GET['search'] ?? '';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;
    
    $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

    $orders = $this->M_Base->get_paginated_data('orders', $search, $offset, $limit, [
        'status' => 'Expired',
        'date_create >=' => $sevenday
    ]);
    
    $tableData = $orders['rows'];

    $totalRows = $orders['total'];
    

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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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
    
    public function get_orders_data_success()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
    $search = $_GET['search'] ?? '';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;
    
    $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

    $orders = $this->M_Base->get_paginated_data('orders', $search, $offset, $limit, [
        'status' => 'Success',
        'date_create >=' => $sevenday
    ]);
    
    $tableData = $orders['rows'];

    $totalRows = $orders['total'];
    
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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
    
    public function get_orders_data_topup()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
    $search = $_GET['search'] ?? '';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;
    
    $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

    $orders = $this->M_Base->get_paginated_data('orders', $search, $offset, $limit, [
        'provider !=' => 'Manual',
        'date_create >=' => $sevenday
    ]);
    
    $tableData = $orders['rows'];

    $totalRows = $orders['total'];
    
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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

    public function get_orders_data_manual()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
    $search = $_GET['search'] ?? '';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 10;
    
    $sevenday = date('Y-m-d H:i:s', strtotime('-7 days'));

    $orders = $this->M_Base->get_paginated_data('orders', $search, $offset, $limit, [
        'provider' => 'Manual',
        'date_create >=' => $sevenday
    ]);
    
    $tableData = $orders['rows'];

    $totalRows = $orders['total'];
    
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
                'diskon' => 'Rp ' . number_format($order['diskon'], 0, ',', '.'),
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] ,
                'payment_gateway' => $order['payment_gateway'] ,
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


    public function proses($id = null)
    {

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                        'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                        'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                        'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                    ];

                    if (empty($data_post['user_id'])) {
                        $this->session->setFlashdata('error', 'ID Player harus diisi');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['product'])) {
                        $this->session->setFlashdata('error', 'Produk belum dipilih');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {

                        if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                            $customer_no = $data_post['user_id'] . $data_post['zone_id'];
                        } else {
                            $customer_no = $data_post['user_id'];
                        }

                        $status = 'Processing';

                        if ($data_post['provider'] === 'DF') {

                            $result = $this->M_Base->df_order($data_post['product'], $customer_no, $orders[0]['order_id']);

                            if (isset($result['data'])) {
                                if ($result['data']['status'] == 'Gagal') {
                                    $ket = $result['data']['message'];
                                } else {
                                    $ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                                }
                            } else {
                                $ket = 'Failed Order';
                            }

                        } else if ($orders[0]['provider'] == 'LG') {

                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                $data_post['zone_id'] = $data_post['zone_id'];
                            } else {
                                $data_post['zone_id'] = '';
                            }

                            $result = $this->M_Base->lg_order($data_post['product'], $data_post['user_id'], $data_post['zone_id'], $orders[0]['order_id']);

                            if ($result['code'] == 'SUCCESS') {
                                if (isset($result['data'])) {
                                    $ket = $result['code'];
                                    $trx = $result['data']['tid'];

                                }
                            } else {
                                $ket = $result['code'];
                            }

                        } else if ($orders[0]['provider'] == 'VG') {

                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                $data_post['zone_id'] = $data_post['zone_id'];
                            } else {
                                $data_post['zone_id'] = '';
                            }

                            $productid = $this->M_Base->data_where_array('product', [
                                'sku' => $data_post['product'],
                                'provider' => 'VG',
                            ]);			
                            
                            $result =   $this->M_Base->voca_order($productid[0]['product_id'], $data_post['product'], $data_post['user_id'], $data_post['zone_id'],               $orders[0]['order_id'], $productid[0]['raw_price']);
                                                        

                            if (isset($result['error'])) {
                                $ket = $result['error'].', '. $result['message'];
                                $trx = $orders[0]['order_id'];
                            } else {
                                $status = 'Processing';
                                $ket = $result['message'];
                                $trx = $result['data']['invoiceId'];
                            }

                        } else if ($data_post['provider'] === 'BJ') {

                            if (!empty($orders[0]['zone_id']) and $orders[0]['zone_id'] != 1) {

                                $resultjson = $this->M_Base->bj_order_1($data_post['games_id'], $data_post['product'], $data_post['user_id'], $data_post['zone_id']);

                            } else {

                                $resultjson = $this->M_Base->bj_order_2($data_post['games_id'], $data_post['product'], $data_post['user_id']);

                            }

                            if ($resultjson) {
                                if ($resultjson['success'] == 'true') {
                                    $status = 'Success';
                                    $ket = $resultjson['data']['invoice_number'];

                                    $this->M_Base->fonnte_sukses($data_post['wa'], $data_post['product'], $data_post['order_id'], "Sukses");

                                } else if ($resultjson['success'] == 'false') {
                                    $status = 'Pending';
                                    $ket = $resultjson['error'];
                                } else {
                                    $ket = 'Failed Order';
                                }
                            }


                        } else if ($data_post['provider'] === 'ARG') {
                            
                            $product = $this->M_Base->data_where_array('product', [
                                'sku' => $data_post['product'],
                                'provider' => 'ARG',
                            ]);
                            

                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                            
                                $resultjson = $this->M_Base->arg_order_1($product[0]['product_id'], $data_post['product'], $data_post['user_id'], $data_post['zone_id'], $order_id);
                                    
                            } else  {
                                
                                $resultjson = $this->M_Base->arg_order_2($product[0]['product_id'], $data_post['product'], $data_post['user_id'], $order_id);
                            }
                            
                             if ($resultjson) {
                                if ($resultjson ['success'] == true) {
                                    $status = 'Processing';
                                    $ket = 'Pesanan sedang di proses';
                                    $trx = $resultjson['data']['invoice_number'];
                    
                                 } elseif ($resultjson['success'] == false) {
                                    $status = 'Processing';
                                    $ket = $resultjson['error'];
                                    $trx = $resultjson['data']['invoice_number'];
                                 } else {
                                     $ket = $resultjson['error'];
                                     $trx = $order_id;
                                 }
                                 
                             } 



                        } else if ($data_post['provider'] === 'PBM') {
                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                $data_post['zone_id'] = $data_post['zone_id'];
                            } else {
                                $data_post['zone_id'] = '';
                            }

                            $result = $this->M_Base->pbm_order($data_post['product'], $data_post['user_id']);

                            if ($result) {
                                if ($result['result'] == 'true') {
                                    $status = 'Success';
                                    $ket = $result['data']['note'];
                                    $trx = $result['data']['trxid'];
                                    $this->M_Base->fonnte_sukses($data_post['wa'], $data_post['product'], $data_post['order_id'], "Sukses");

                                } else if ($result['result'] == 'false') {
                                    $status = 'Pending';
                                    $ket = $result['message'];

                                } else {
                                    $ket = 'Failed Order';
                                }
                            }



                        } else if ($data_post['provider'] === 'AG') {

                            $result = $this->M_Base->ag_v1_order($data_post['product'], $customer_no, $orders[0]['order_id']);

                            if (isset($result)) {
                                if ($result['status'] == 0) {
                                    $ket = $result['error_msg'];
                                } else {
                                    $ket = $result['data']['status'];
                                    if ($result['data']['status'] == 'Sukses') {
                                        $status = 'Success';

                                        $this->M_Base->fonnte_sukses($data_post['wa'], $data_post['product'], $data_post['order_id'], "Sukses");
                                    }

                                }
                            } else {
                                $ket = 'Failed Order';
                            }

                            //

                        } else {
                            $this->session->setFlashdata('error', 'Provider tidak dikenali');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }

                        $oldLog = $order[0]['log'];
                        $newLog = '[' . date('Y-m-d G:i:s') . '] Proses Manual ke ' . ' ' .$data_post['provider']. ' oleh ' . $this->admin['level'] . ' ' . $this->admin['username'] ;
                        $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                        
                        $this->M_Base->data_update('orders', [
                            'log' => $log,
                            'status' => $status,
                            'ket' => $ket,
                            'trx_id' => $trx,
                        ], $id);

                        $this->session->setFlashdata('success', 'Pesanan berhasil direorder');
                        return redirect()->to(base_url() . '/admin/pesanan');
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Proses Pesanan',
                    'orders' => $orders[0],
                    'product' => $this->M_Base->all_data('product'),
                ]);

                return view('Admin/Pesanan/proses', $data);

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function edit($id = null)
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {

                if ($this->request->getPost('tombol')) {
                    $this->M_Base->data_update('orders', [
                        'username' => $this->request->getPost('username'),
                        'wa' => $this->request->getPost('wa'),
                        'product' => $this->request->getPost('product'),
                        'method' => $this->request->getPost('method'),
                        'user_id' => $this->request->getPost('user_id'),
                        'zone_id' => $this->request->getPost('zone_id'),
                        'nickname' => $this->request->getPost('nickname'),
                        'status' => $this->request->getPost('status'),
                        'ket' => $this->request->getPost('ket'),
                    ], $id);

                    $oldLog = $orders[0]['log'];
                    $newLog = '[' . date('Y-m-d G:i:s') . '] Edit Pesanan dari status ' . $orders[0]['status'] . ' ke '.$this->request->getPost('status') . ' oleh ' . $this->admin['level'] . ' ' . $this->admin['username'];
                    $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                    
                    $this->M_Base->data_update('orders', [
                        'log' => $log,
                    ], $id);


                    $this->session->setFlashdata('success', 'Data pesanan berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Pesanan',
                    'orders' => $orders[0],
                ]);





                return view('Admin/Pesanan/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function approve($id = null)
{
    if ($this->admin['level'] == 'Customer Service') {
        $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        return redirect()->to(base_url() . '/hello');
    }

    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    } else if (!is_numeric($id)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    } else {
            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {
                
                
                $oldLog = $orders[0]['log'];
                $newLog = '[' . date('Y-m-d G:i:s') . '] ' . $orders[0]['status'] . ' ke Success oleh ' . $this->admin['level'] . ' ' . $this->admin['username'];

                $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                
                $this->M_Base->data_update('orders', [
                    'status' => 'Success',
                    'log' => $log,
                ], $id);
                
                // $this->M_Base->woowa_sukses($orders[0]['wa'], $orders[0]['product'], $orders[0]['order_id'], $orders[0]['method']);

                $this->session->setFlashdata('success', 'Data pesanan berhasil diganti');
                return redirect()->to(base_url() . '/admin/pesanan/processing');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function cancel($id = null)
{
    if ($this->admin['level'] == 'Customer Service') {
        $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        return redirect()->to(base_url() . '/hello');
    }

    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    } else if (!is_numeric($id)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    } else {
            $orders = $this->M_Base->data_where('orders', 'id', $id);
            
            

            if (count($orders) === 1) {
                $this->M_Base->data_update('orders', [
                        'status' => 'Canceled',
                    ], $id);
                    
                
                $oldLog = $orders[0]['log'];

                // Buat log baru yang akan ditambahkan
                $newLog = '[' . date('Y-m-d G:i:s') . '] ' . $orders[0]['status'] . ' ke Canceled oleh ' . $this->admin['level'] . ' ' . $this->admin['username'] ;
                
                

                if (!empty($orders[0]['username'])) {
                    
                    $newLog = '[' . date('Y-m-d G:i:s') . '] ' . $orders[0]['status'] . ' ke Canceled dan Refund Saldo oleh ' . $this->admin['level'] . ' ' . $this->admin['username'] ;
                    
                    
                    $balance = $orders[0]['price'];
                     $topup_id = date('Ymd') . rand(0000, 9999);
    
                    $this->M_Base->data_insert('topup', [
                        'topup_id' => $topup_id,
                        'username' => $orders[0]['username'],
                        'amount' => $balance,
                        'method' => 'Refund Saldo',
                        'status' => 'Success',
                        'date_create' => date('Y-m-d G:i:s'),
                    ]);
    
                    $user = $this->M_Base->data_where('users', 'username', $orders[0]['username']);
                    $newBalance = $user[0]['balance'] + $balance;
    
                    $this->M_Base->data_update('users', [
                        'balance' => $newBalance,
                    ], $user[0]['id']);
                }
            
                $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                
                $this->M_Base->data_update('orders', [
                    'status' => 'Canceled',
                    'log' => $log,
                ], $id);

                $this->session->setFlashdata('success', 'Data pesanan berhasil diganti');
                return redirect()->to(base_url() . '/admin/pesanan/processing');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
    
    public function approvePending($id = null)
{
    if ($this->admin['level'] == 'Customer Service') {
        $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        return redirect()->to(base_url() . '/hello');
    }

    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    } else if (!is_numeric($id)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    } else {
        $order = $this->M_Base->data_where('orders', 'id', $id);

        if (count($order) === 1) {
            $provider = $order[0]['provider'];

            if ($provider !== 'Manual') {
                // Redirect to processing page
                return redirect()->to(base_url() . '/admin/pesanan/proses/' . $id);
            } else {
                
                $oldLog = $order[0]['log'];
                $newLog = '[' . date('Y-m-d G:i:s') . '] ' . $order[0]['status'] . ' ke Processing oleh ' . $this->admin['level'] . ' ' . $this->admin['username'] ;
                $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                
                $this->M_Base->data_update('orders', [
                    'status' => 'Processing',
                    'log' => $log,
                ], $id);

                $this->session->setFlashdata('success', 'Data pesanan berhasil diganti');
                return redirect()->to(base_url() . '/admin/pesanan/pending');
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

public function cancelPending($id = null)
{
    if ($this->admin['level'] == 'Customer Service') {
        $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        return redirect()->to(base_url() . '/hello');
    }

    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    } else if (!is_numeric($id)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    } else {
        $order = $this->M_Base->data_where('orders', 'id', $id);

        if (count($order) === 1) {
            $provider = $order[0]['provider'];

            $oldLog = $order[0]['log'];
            $newLog = '[' . date('Y-m-d G:i:s') . '] ' . $order[0]['status'] . ' ke Canceled oleh ' . $this->admin['level'] . ' ' . $this->admin['username'] ;
            $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
            
            $this->M_Base->data_update('orders', [
                'status' => 'Canceled',
                'log' => $log,
            ], $id);

            $this->session->setFlashdata('success', 'Data pesanan berhasil diganti');
                return redirect()->to(base_url() . '/admin/pesanan/pending');

        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

    public function delete($id = null)
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }
        
        if ($this->admin['level'] == 'Admin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            // $orders = $this->M_Base->data_where('orders', 'id', $id);

            // if (count($orders) === 1) {
            //     $this->M_Base->data_delete('orders', $id);

            //     $this->session->setFlashdata('success', 'Data pesanan berhasil dihapus');
            //     return redirect()->to(base_url() . '/admin/pesanan');
            // } else {
            //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            // }
        }
    }

    public function detail($order_id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $orders = $this->M_Base->data_where('orders', 'order_id', $order_id);

            if (count($orders) === 1) {

                $target = '';
                if ($orders[0]['zone_id'] == 'joki') {
                    $target .= '<div class="mb-3">';
                    $target .= '<button onclick="copyTable()" class="btn btn-primary btn-sm">Copy Data Joki</button>';
                    $target .= '</div>';
                    $target .= '<table id="myTable">';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        if (!in_array($key, ['request_hero_awawawaw'])) {
                            $target .= '
            <tr>
                <th style="padding-right:10px">' . str_replace([
                    'rank_awal',
					'rank_tujuan',
                    'request_hero',
                    'email',
                    'password',
                    
                    'login_via',
                    'jumlah_star_poin',
                    ], [
                    'Rank Awal : ',
					'Rank Tujuan :',
                    'Request hero : ',
                    'Email : ',
                    'Password :',
                    'Login Via : ',
                    'jumlah Star / Poin :',
                    ], $key) . '</th>
                <td class="pl-4">
                    ' . $value . '
                </td>
            </tr>';
                        }
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'jokicl') {
                    $target .= '<div class="mb-3">';
                    $target .= '<button onclick="copyTable()" class="btn btn-primary btn-sm">Copy Data Joki</button>';
                    $target .= '</div>';
                    $target .= '<table id="myTable">';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        if (!in_array($key, ['user_id'])) {
                            $target .= '
            <tr>
                <th style="padding-right:10px">' . str_replace ([
                                'catatan_joki',
                                'request_hero',
                                'email',
                                'password',
                                'login_via',
                                'wa',
                                'jumlah_star_poin',
                            
                            ], [

                                'Catatan : ',
                                'Request Hero : ',
                                'Email : ',
                                'Password :',
                                'Login Via :',
                                'Jumlah Star / Poin : ',
                                'Jumlah Star / Poin : ',
                                
                            ], $key) . '</th>
                <td class="pl-4">
                    ' . $value . '
                </td>
            </tr>';
                        }
                    }
                    $target .= '</table>';
                    
                    // JOKI GENDONG
                    
                } else if ($orders[0]['zone_id'] == 'jokigendong') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                            'id',
                            'nickname',
                            'role',
                            'catatan',
                            'tanggal',
                            'jam',
                            'jumlah_star_poin',
                        ], [
                            'id : ',
                            'nickname : ',
                            'role : ',
                            'catatan : ',
                            'tanggal : ',
                            'jam : ',
                            'Jumlah Star / Win : ',
                        ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'jokimc') {
                    $target .= '<div class="mb-3">';
                    $target .= '<button onclick="copyTable()" class="btn btn-primary btn-sm">Copy Data Joki</button>';
                    $target .= '</div>';
                    $target .= '<table id="myTable">';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        if (!in_array($key, ['user_id'])) {
                            $target .= '
            <tr>
                <th style="padding-right:10px">' . str_replace ([
                                'rank_awal',
                                'rank_tujuan',
                                'catatan_joki',
                                'email',
                                'password',
                                'login_via',
                                'wa',
                                'jumlah_star_poin',
                            
                            ], [
                                'Rank Saat Ini : ',
                                'Rank Tujuan : ',
                                'Catatan : ',
                                'Email : ',
                                'Password :',
                                'Login Via :',
                                'Jumlah Star / Poin : ',
                                'Jumlah Star / Poin : ',
                                
                            ], $key) . '</th>
                <td class="pl-4">
                    ' . $value . '
                </td>
            </tr>';
                        }
                    }
                    $target .= '</table>';
                    
                    // JASA INFLUENCER
            
                }else if ($orders[0]['zone_id'] == 'js-universal') {
                    $target .= '<div class="mb-3">';
                    $target .= '<button onclick="copyTable()" class="btn btn-primary btn-sm">Copy Data</button>';
                    $target .= '</div>';
                    $target .= '<table id="myTable">';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        if (!in_array($key, ['user_id'])) {
                            $target .= '
            <tr>
                <th style="padding-right:10px">' . str_replace ([
                                'username',
                                'link',
                                'komen',
                            
                            ], [
                                'Username : ',
                                'Link Postingan : ',
                                'Request Komen : ',
                                
                            ], $key) . '</th>
                <td class="pl-4">
                    ' . $value . '
                </td>
            </tr>';
                        }
                    }
                    $target .= '</table>';
                    
                    // ROOM TOURNAMENT
            
                } else if ($orders[0]['zone_id'] == 'skinml') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                        <tr>
                            <th>' . str_replace([
                                'email',
                                'login_via',
                                'request_hero',
                                'catatan_joki',
                                'nickname',
                            ], [
                                    'User ID',
                                    'Server ID',
                                    'Nama Hero',
                                    'Nama Skin / Item',
                                    'Nickname',
                                ], $key) . '</th>
                            <td class="pl-4">
                                ' . $value . '
                            </td>
                        </tr>
                        ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'growtopia') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                        <tr>
                            <th>' . str_replace([
                                'grow_id',
                                'nama_world',
                                'jumlah_star_poin',
                            ], [
                                    'Grow ID : ',
                                    'Nama World : ',
                                    'Jumlah : ',
                                ], $key) . '</th>
                            <td class="pl-4">
                                ' . $value . '
                            </td>
                        </tr>
                        ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'videomontage') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                        <tr>
                            <th>' . str_replace([
                                'email',
                                'password',
                                'request_hero',
                                'catatan_videomontage',
                                'nickname',
                                'login_via',
                                'record_via',
                                'contoh_video',
                                'jumlah_menit',
                            ], [
                                    'Email',
                                    'Password',
                                    'Request Hero',
                                    'Catatan',
                                    'Nickname',
                                    'Login Via',
                                    'Record Via',
                                    'Contoh Video',
                                    'Jumlah Menit',
                                ], $key) . '</th>
                            <td class="pl-4">
                                ' . $value . '
                            </td>
                        </tr>
                        ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'topuplogin') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                            ], [
                                    'Email',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-ragnarox') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-dragonhunter') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-fourgods') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-genshinimpact') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-ninokuni') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-neverafter') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                                'password',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                    'Password',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-clashofclans') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginapex') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginefootball') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginff') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logingenshin') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginml') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginninokuni') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'character',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'server',
                                    'character',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginpokemon') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginraven') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logintiktok') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logintower') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'login_via',
                                'region',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Login Via',
                                    'Region',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginwildrift') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'tournament') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'id',
                                'server',
                                'jam',
                                'tanggal',
                            ], [
                                    'id',
                                    'server',
                                    'jam',
                                    'tanggal',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'jokigendong') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'id',
                                'nickname',
                                'role',
                                'tanggal',
                                'jam',
                                'catatan',
                                'jumlah_star_poin',
                            ], [
                                    'id',
                                    'nickname',
                                    'role',
                                    'tanggal',
                                    'jam',
                                    'catatan',
                                    'Jumlah Star / Win',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else {
                    if (!empty($orders[0]['zone_id']) and $orders[0]['zone_id'] != 1) {
                        $target = $orders[0]['user_id'] . ' (' . $orders[0]['zone_id'] . ')';
                    } else {
                        $target = $orders[0]['user_id'];
                    }
                }

                echo '
                <style>#myTable tbody td {
    font-size: 0.8rem !important;
}</style>
                <button onclick="copyTable()" class="btn btn-success btn-sm mx-2 my-2">Copy Data</button>


                <table class="table table-white table-striped">
                    <tr>
                        <th>No Transaksi</th>
                        <td>' . $orders[0]['order_id'] . '</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>' . $orders[0]['username'] . '</td>
                    </tr>
                    <tr>
                        <th>Whatsapp</th>
                        <td>' . $orders[0]['wa'] . '</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>' . $orders[0]['email_order'] . '</td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td id="namaproduk">' . $orders[0]['games'] . ' - ' . $orders[0]['product'] . '</td>
                    </tr>
                    <tr>
                        <th>ID Player</th>
                        <td>' . $target . '</td>
                    </tr>
                    <tr>
                        <th>Nickname</th>
                        <td>' . $orders[0]['nickname'] . '</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp ' . number_format($orders[0]['price'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>' . $orders[0]['status'] . '</td>
                    </tr>
                    <tr>
                        <th>Voucher</th>
                        <td>' . $orders[0]['voucher'] . '</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>' . $orders[0]['ket'] . '</td>
                    </tr>
                    <tr>
                        <th>Metode</th>
                        <td>' . $orders[0]['method'] . '</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>' . $orders[0]['date_create'] . '</td>
                    </tr>
                </table>
              
<small class="px-2 py-2">
Log : <br>
' . $orders[0]['log'] . '</td>
</small>



                ';
                if (in_array($orders[0]['status'], array('Pending', 'Processing', 'Canceled'))) {
                    echo '
                	<div class="p-2">
	                	<a href="' . base_url() . '/admin/pesanan/proses/' . $orders[0]['id'] . '" class="btn btn-primary w-100">Proses Manual</a>
	                </div>
                	';
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}