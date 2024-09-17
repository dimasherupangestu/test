<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Home extends BaseController
{


    public function get_sales_profit_by_month()
    {
        $query = $this->db->query("
            SELECT
                DATE_FORMAT(date, '%M %Y') AS `month`,
                SUM(CASE WHEN status IN ('Success', 'Finished') THEN price ELSE 0 END) AS `sales`,
                SUM(CASE WHEN status IN ('Success', 'Finished') THEN price - raw_price ELSE 0 END) AS `profit`
            FROM orders
            GROUP BY
                DATE_FORMAT(date, '%M %Y')
        ");

        return $query->getResultArray();
    }

    public function hello()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }


        $data = array_merge($this->base_data, [
            'title' => 'Hello',
        ]);

        return view('Admin/Home/hello', $data);
    }
    
    public function saldo()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.lapakgaming.com/api/balance',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $this->M_Base->u_get('lapakgaming-api')
				),
        ));
        
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        
        $ag_merchant = $this->M_Base->u_get('ag-merchant');
        $ag_key = $this->M_Base->u_get('ag-secret');
        $signe = ''.$ag_merchant.':'.$ag_key.'';
        $apisigncb = md5($signe);
        
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://v1.apigames.id/merchant/' . $ag_merchant . '/cek-koneksi?engine=unipinbr&signature=' . $apisigncb . '',
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


        $data = array_merge($this->base_data, [
            'title' => 'Saldo Akun',
            'saldolg' => $response['data']['balance'],
            'saldounipinup' => $result['data']['up_balance'],
            'saldounipinuc' => $result['data']['uc_balance'],
        ]);

        return view('Admin/Home/saldo', $data);
    }

    public function newdashboardnew()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

          if ($this->admin['level'] !== 'Superadmin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }


        $products = [];
        foreach ($this->M_Base->getTopSalesProduct() as $loop) {
            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);
            $nama_games = count($games) == 1 ? $games[0]['games'] : '-';

            $product = $this->M_Base->data_where('product', 'id', $loop['product_id']);
            $nama_product = count($product) == 1 ? $product[0]['product'] : '-';
            $sku_product = count($product) == 1 ? $product[0]['sku'] : '-';
            $price_product = count($product) == 1 ? $product[0]['price'] : '-';
            $products[] = array_merge($loop, [
                'games' => $nama_games,
                'image' => $games[0]['image'],
                'nama_product' => $nama_product,
                'price_product' => $price_product,
                'sku_product' => $sku_product,
            ]);
        }

        $gamesx = [];
        foreach ($this->M_Base->getTopSalesGames() as $loopx) {
            $gamesx[] = [
                'games_id' => $loopx['games_id'],
                'games' => $loopx['games'],
                'total_sales' => $loopx['total_sales'],
                'sales' => $loopx['sales'],
                'modal' => $loopx['modal'],
                'image' => $this->M_Base->data_where('games', 'id', $loopx['games_id'])[0]['image']
            ];
        }



        $data = array_merge($this->base_data, [
            'title' => 'New Dashboard',
            'products' => $products,
            'gamesx' => $gamesx,
        ]);

        return view('Admin/Home/newdashboardnew', $data);
    }

    public function newdashboard()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] !== 'Superadmin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        

        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');


        $products = [];
        foreach ($this->M_Base->getTopSalesProduct($start_date, $end_date) as $loop) {
            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);
            $nama_games = count($games) == 1 ? $games[0]['games'] : '-';

            $product = $this->M_Base->data_where('product', 'id', $loop['product_id']);
            $nama_product = count($product) == 1 ? $product[0]['product'] : '-';
            $sku_product = count($product) == 1 ? $product[0]['sku'] : '-';
            $price_product = count($product) == 1 ? $product[0]['price'] : '-';
            $products[] = array_merge($loop, [
                'games' => $nama_games,
                'image' => $games[0]['image'],
                'nama_product' => $nama_product,
                'price_product' => $price_product,
                'sku_product' => $sku_product,
            ]);
        }

        $gamesx = [];
        foreach ($this->M_Base->getTopSalesGames($start_date, $end_date) as $loopx) {
            $gamesx[] = [
                'games_id' => $loopx['games_id'],
                'games' => $loopx['games'],
                'total_sales' => $loopx['total_sales'],
                'sales' => $loopx['sales'],
                'modal' => $loopx['modal'],
                'image' => $this->M_Base->data_where('games', 'id', $loopx['games_id'])[0]['image']
            ];
        }



        $yesterday = date('Y-m-d', strtotime('-1 day')); // tanggal kemarin
        $today = date('Y-m-d'); // tanggal hari ini
        $last_month = date('Y-m', strtotime('-1 month')); // bulan kemarin (format: YYYY-MM)
        $this_month = date('Y-m'); // bulan ini (format: YYYY-MM)

        $trx_success = $this->M_Base->data_count('orders', ['status' => 'Success',]) + $this->M_Base->data_count('orders', ['status' => 'Finished',]);
        $trx_success_yesterday = $this->M_Base->data_count('orders', [
            'status' => 'Success',
            'DATE(date_create)' => $yesterday,
        ]) + $this->M_Base->data_count('orders', [
                'status' => 'Finished',
                'DATE(date_create)' => $yesterday,
            ]);

        $trx_success_today = $this->M_Base->data_count('orders', [
            'status' => 'Success',
            'DATE(date_create)' => $today,
        ]) + $this->M_Base->data_count('orders', [
                'status' => 'Finished',
                'DATE(date_create)' => $today,
            ]);

        $trx_success_last_month = $this->M_Base->data_count('orders', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
        ]) + $this->M_Base->data_count('orders', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
            ]);

        $trx_success_this_month = $this->M_Base->data_count('orders', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
        ]) + $this->M_Base->data_count('orders', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
            ]);


        $trx_sales = $this->M_Base->jumlah('orders', 'price', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'price', ['status' => 'Finished',]);
        $trx_sales_yesterday = $this->M_Base->jumlah('orders', 'price', [
            'status' => 'Success',
            'DATE(date_create)' => $yesterday,
        ]) + $this->M_Base->jumlah('orders', 'price', [
                'status' => 'Finished',
                'DATE(date_create)' => $yesterday,
            ]);
        $trx_sales_today = $this->M_Base->jumlah('orders', 'price', [
            'status' => 'Success',
            'DATE(date_create)' => $today,
        ]) + $this->M_Base->jumlah('orders', 'price', [
                'status' => 'Finished',
                'DATE(date_create)' => $today,
            ]);
        $trx_sales_last_month = $this->M_Base->jumlah('orders', 'price', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
        ]) + $this->M_Base->jumlah('orders', 'price', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
            ]);
        $trx_sales_this_month = $this->M_Base->jumlah('orders', 'price', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
        ]) + $this->M_Base->jumlah('orders', 'price', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
            ]);



        $trx_raw = $this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Finished',]);
        $trx_raw_yesterday = $this->M_Base->jumlah('orders', 'raw_price', [
            'status' => 'Success',
            'DATE(date_create)' => $yesterday,
        ]) + $this->M_Base->jumlah('orders', 'raw_price', [
                'status' => 'Finished',
                'DATE(date_create)' => $yesterday,
            ]);
        $trx_raw_today = $this->M_Base->jumlah('orders', 'raw_price', [
            'status' => 'Success',
            'DATE(date_create)' => $today,
        ]) + $this->M_Base->jumlah('orders', 'raw_price', [
                'status' => 'Finished',
                'DATE(date_create)' => $today,
            ]);
        $trx_raw_last_month = $this->M_Base->jumlah('orders', 'raw_price', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
        ]) + $this->M_Base->jumlah('orders', 'raw_price', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
            ]);
        $trx_raw_this_month = $this->M_Base->jumlah('orders', 'raw_price', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
        ]) + $this->M_Base->jumlah('orders', 'raw_price', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
            ]);
            
        
        $trx_fee = $this->M_Base->jumlah('orders', 'fee', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'fee', ['status' => 'Finished',]);
        $trx_fee_yesterday = $this->M_Base->jumlah('orders', 'fee', [
            'status' => 'Success',
            'DATE(date_create)' => $yesterday,
        ]) + $this->M_Base->jumlah('orders', 'fee', [
                'status' => 'Finished',
                'DATE(date_create)' => $yesterday,
            ]);
        $trx_fee_today = $this->M_Base->jumlah('orders', 'fee', [
            'status' => 'Success',
            'DATE(date_create)' => $today,
        ]) + $this->M_Base->jumlah('orders', 'fee', [
                'status' => 'Finished',
                'DATE(date_create)' => $today,
            ]);
        $trx_fee_last_month = $this->M_Base->jumlah('orders', 'fee', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
        ]) + $this->M_Base->jumlah('orders', 'fee', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $last_month,
            ]);
        $trx_fee_this_month = $this->M_Base->jumlah('orders', 'fee', [
            'status' => 'Success',
            'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
        ]) + $this->M_Base->jumlah('orders', 'fee', [
                'status' => 'Finished',
                'DATE_FORMAT(date_create, "%Y-%m")' => $this_month,
            ]);

        $data = array_merge($this->base_data, [
            'title' => 'New Dashboard',
            'products' => $products,
            'gamesx' => $gamesx,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'trx' => [
                'total' => $trx_success,
                'trx_success_yesterday' => $trx_success_yesterday,
                'trx_success_last_month' => $trx_success_last_month,
                'trx_success_today' => $trx_success_today,
                'trx_success_this_month' => $trx_success_this_month,
                'sales' => $trx_sales,
                'trx_sales_yesterday' => $trx_sales_yesterday,
                'trx_sales_last_month' => $trx_sales_last_month,
                'trx_sales_today' => $trx_sales_today,
                'trx_sales_this_month' => $trx_sales_this_month,
                'profit' => $trx_sales - $trx_raw - $trx_fee,
                'trx_profit_yesterday' => $trx_sales_yesterday - $trx_raw_yesterday - $trx_fee_yesterday,
                'trx_profit_last_month' => $trx_sales_last_month - $trx_raw_last_month - $trx_fee_last_month,
                'trx_profit_today' => $trx_sales_today - $trx_raw_today - $trx_fee_today,
                'trx_profit_this_month' => $trx_sales_this_month - $trx_raw_this_month - $trx_fee_this_month,
            ],
        ]);

        return view('Admin/Home/newdashboard', $data);
    }
    
    public function laporan()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }
        

        
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $id_games_value = $this->request->getGet('games_id');
        $games_value = $this->request->getGet('games');
        $pick_provider = $this->request->getGet('pick_provider');
        $pick_method = $this->request->getGet('pick_method');
        $pick_status = $this->request->getGet('pick_status');
        
        $gamesx = [];
        
        foreach ($this->M_Base->getSalesGames('orders', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status) as $loopx) {
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
            'pick_games' => $this->M_Base->data_orders_no_duplicate('orders', 'games_id', 'games'),
            'pick_provider' => $this->M_Base->data_orders_no_duplicate('orders', 'provider'),
            'pick_status' => $this->M_Base->data_orders_no_duplicate('orders', 'status'),
            'pick_method' => $this->M_Base->data_orders_no_duplicate('orders', 'method_id', 'method'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'id_games_value' => $id_games_value,
            'games_value' => $games_value,
            'provider_value' => $pick_provider,
            'games_value' => $games_value,
            'method_value' => $pick_method,
            'status_value' => $pick_status,
        ]);

        return view('Admin/Home/laporan', $data);
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
    $filteredData = $this->M_Base->getSalesGames('orders', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status);

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
        $data = $this->M_Base->exportAllData('orders', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status);
    
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
            if ($this->admin == false) {
                $this->session->setFlashdata('error', 'Silahkan login dahulu');
                return redirect()->to(base_url() . '/admin/login');
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
    
        $orders = $this->M_Base->get_paginated_and_filter('orders', $search, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $offset, $limit);
        
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
                    'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                    'tujuan' => $order['user_id'] . $order['zone_id'],
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
    
    public function laporanbackup()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }
        
        

        
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $id_games_value = $this->request->getGet('games_id');
        $games_value = $this->request->getGet('games');
        $pick_provider = $this->request->getGet('pick_provider');
        $pick_method = $this->request->getGet('pick_method');
        $pick_status = $this->request->getGet('pick_status');
        
        $gamesx = [];
        
        foreach ($this->M_Base->getSalesGames('orders_backup', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status) as $loopx) {
            $gamesx[] = [
                'games_id' => $loopx['games_id'],
                'games' => $loopx['games'],
                'total_sales' => $loopx['total_sales'],
                'sales' => $loopx['sales'],
                'profit' => $loopx['profit'],
            ];
        }
        
        $query = $this->db->table('orders_backup') 
            ->selectMin('date_create', 'firstDate')
            ->selectMax('date_create', 'lastDate')
            ->get();

        $result = $query->getRow();

        $firstDate = date('d-m-Y', strtotime($result->firstDate));
        $lastDate = date('d-m-Y', strtotime($result->lastDate));

        $data = array_merge($this->base_data, [
            'title' => 'Laporan Backup',
            'gamesx' => $gamesx,
            'pick_games' => $this->M_Base->data_orders_no_duplicate('orders_backup', 'games_id', 'games'),
            'pick_provider' => $this->M_Base->data_orders_no_duplicate('orders_backup', 'provider'),
            'pick_status' => $this->M_Base->data_orders_no_duplicate('orders_backup', 'status'),
            'pick_method' => $this->M_Base->data_orders_no_duplicate('orders_backup', 'method_id', 'method'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'id_games_value' => $id_games_value,
            'games_value' => $games_value,
            'provider_value' => $pick_provider,
            'games_value' => $games_value,
            'method_value' => $pick_method,
            'status_value' => $pick_status,
            'firstDate' => $firstDate,
            'lastDate' => $lastDate,
        ]);

        return view('Admin/Home/laporanbackup', $data);
    }
    
    public function filteredDatabackup()
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
    $filteredData = $this->M_Base->getSalesGames('orders_backup', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status);

    // Kembalikan data dalam format JSON
    return $this->response->setJSON($filteredData);
}

    public function exportDataFilterbackup()
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
        $data = $this->M_Base->exportAllData('orders_backup', $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status);
    
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

    public function get_orders_data_backup()
    {
            if ($this->admin == false) {
                $this->session->setFlashdata('error', 'Silahkan login dahulu');
                return redirect()->to(base_url() . '/admin/login');
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
    
        $orders = $this->M_Base->get_paginated_and_filter('orders_backup', $search, $start_date, $end_date, $id_games_value, $games_value, $pick_provider, $pick_method, $pick_status, $offset, $limit);
        
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
                    'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                    'tujuan' => $order['user_id'] . $order['zone_id'],
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




    public function index()
    {

         if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        
        if ($this->admin['level'] !== 'Superadmin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        


        if ($this->request->getPost('daterange')) {
            $daterange = explode(' - ', $this->request->getPost('daterange'));

            $end_date = fix_date($daterange[0]);
            $start_date = fix_date($daterange[1]);

        } else {
            $end_date = date('Y-m-d', time() - 60 * 60 * 24 * 7);
            $start_date = date('Y-m-d');
        }

        $chart = [];
        foreach ($this->M_Base->data_avg('orders', 'date', [$end_date, $start_date], true) as $date) {
            $chart[] = [
                'tanggal' => $date['date'],
                'total' => $this->M_Base->data_count('orders', ['date' => $date['date']]),
            ];
        }

        $dataku = [];
        foreach ($this->M_Base->data_avg('orders', 'date', [$end_date, $start_date], true) as $date) {


            $dataku[] = array(
                'tanggal' => $date['date'],
                'sales' => $this->M_Base->jumlah('orders', 'price', ['status' => 'Success', 'date' => $date['date'],]) + $this->M_Base->jumlah('orders', 'price', ['status' => 'Finished', 'date' => $date['date'],]),
                'profit' => ($this->M_Base->jumlah('orders', 'price', ['status' => 'Success', 'date' => $date['date'],]) + $this->M_Base->jumlah('orders', 'price', ['status' => 'Finished', 'date' => $date['date'],])) - ($this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Success', 'date' => $date['date'],]) + $this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Finished', 'date' => $date['date'],])),
            );
        }

        $dataku2 = $this->get_sales_profit_by_month();


        $total_users = $this->M_Base->data_count('users', [
            'status' => 'On',
        ]);

        $topup_success = $this->M_Base->data_count('topup', [
            'status' => 'Success',
        ]);

        $yesterday = date('Y-m-d', strtotime('-1 day')); // tanggal kemarin
        $today = date('Y-m-d'); // tanggal hari ini
        $last_month = date('Y-m', strtotime('-1 month')); // bulan kemarin (format: YYYY-MM)
        $this_month = date('Y-m'); // bulan ini (format: YYYY-MM)

        $trx_success = $this->M_Base->data_count('orders', ['status' => 'Success',]) + $this->M_Base->data_count('orders', ['status' => 'Finished',]);
        $trx_sales = $this->M_Base->jumlah('orders', 'price', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'price', ['status' => 'Finished',]);
        $trx_raw = $this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'raw_price', ['status' => 'Finished',]);
        $trx_fee = $this->M_Base->jumlah('orders', 'fee', ['status' => 'Success',]) + $this->M_Base->jumlah('orders', 'fee', ['status' => 'Finished',]);
       


        $data = array_merge($this->base_data, [
            'title' => 'Home',
            'total' => [
                'admin' => $this->M_Base->data_count('admin'),
                'games' => $this->M_Base->data_count('games'),
                'product' => $this->M_Base->data_count('product'),
            ],
            'member' => [
                'users' => $total_users,
                'balance' => $this->M_Base->jumlah('users', 'balance'),
                'topup' => $topup_success,
            ],
            'trx' => [
                'total' => $trx_success,

                'sales' => $trx_sales,

                'profit' => $trx_sales - $trx_raw - $trx_fee,

            ],
            'dataku' => $dataku,
            'dataku2' => $dataku2,
            'chart' => $chart,
            'date_range' => reverse_date($end_date, $start_date),
        ]);

        return view('Admin/Home/index', $data);
    }

    public function password()
    {
        


        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/Admin/login');
        }
        
        if ($this->admin['level'] !== 'Superadmin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->request->getPost('tombol')) {
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
            } else if (!password_verify($data_post['passwordl'], $this->admin['password'])) {
                $this->session->setFlashdata('error', 'Password lama tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['passwordb']) < 6) {
                $this->session->setFlashdata('error', 'Password baru minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['passwordb']) > 24) {
                $this->session->setFlashdata('error', 'Password baru maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($data_post['passwordb'] !== $data_post['passwordbb']) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $this->M_Base->data_update('admin', [
                    'password' => password_hash($data_post['passwordb'], PASSWORD_DEFAULT),
                ], $this->admin['id']);

                $this->session->setFlashdata('success', 'Password berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Ganti Password',
        ]);

        return view('Admin/Home/password', $data);
    }

   public function login()
    {

        if ($this->admin !== false) {
            return redirect()->to(base_url() . '/Admin');
        }
        
        // $twoWeeksAgo = date('Y-m-d H:i:s', strtotime('-4 days'));
    
        // $orders = $this->M_Base->data_where_array('orders', [
        //     'status' => 'Processing',
        //     'date_create <' => $twoWeeksAgo,
        // ]);
    
        // foreach ($orders as $order) {
        //     $this->M_Base->data_update('orders', ['status' => 'Expired'], $order['id']);
        // }
        
        // $orders2 = $this->M_Base->data_where_array('orders', [
        //     'status' => 'Pending',
        //     'date_create <' => $twoWeeksAgo,
        // ]);
    
        // foreach ($orders2 as $order) {
        //     $this->M_Base->data_update('orders', ['status' => 'Expired'], $order['id']);
        // }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $admin = $this->M_Base->data_where('admin', 'username', $data_post['username']);

                if (count($admin) === 1) {
                    if (password_verify($data_post['password'], $admin[0]['password'])) {
                        if ($admin[0]['status'] === 'On') {
                            $this->session->set('admin', $admin[0]['username']);

                            $this->session->setFlashdata('success', 'Login berhasil');
                            return redirect()->to(base_url() . '/hello');
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
        ]);

        return view('Admin/Home/login', $data);
    }
}