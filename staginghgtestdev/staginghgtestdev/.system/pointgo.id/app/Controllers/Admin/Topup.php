<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Topup extends BaseController
{

    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        if ($this->admin['level'] == 'Admin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Topup',
            'topup' => $this->M_Base->all_data('topup'),
        ]);

        return view('Admin/Topup/index', $data);
    }
    
    public function pending()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Topup Pending',
        ]);

        return view('Admin/Topup/pending', $data);
    }

    public function canceled()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Topup Canceled',
        ]);

        return view('Admin/Topup/canceled', $data);
    }

    public function success()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Topup Success',
        ]);

        return view('Admin/Topup/success', $data);
    }
    
    public function get_topup_data()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $topups = $this->M_Base->data_where_array_limit('topup', [
            
        ], 30000);

        $data = array();
        foreach ($topups as $index => $topup) {
            
            if (strlen($topup['method']) > 16) {
                $topup['method'] = $topup['method'] = substr($topup['method'], 0, 13) . '...';
            } 

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $topupDate = strtotime($topup['date_create']); // Tanggal pada order
            
            if ($topupDate > $targetDate) {
                if ($topup['saldosb'] == 0 || $topup['saldost'] == 0) {
                    $datax = $topup['username'];
                } else {
                    $datax = $topup['username'];
                }
            } else {
                $datax = $topup['username'];
            }
            
            
            
            $fee = $topup['fee'];
            $product_price = $topup['amount'] - $fee;
            
            if ($topup['payment_gateway'] == 'Xendit') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 10000;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 5000;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
			
			if ($topup['payment_gateway'] == 'Linkqu') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 1500;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 1500;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
            $date = date_create($topup['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($topup['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'id' => $topup['id'],
                'date_create' => $formattedDate,
                'time' => $time,
                'topup_id' => $topup['topup_id'],
                'username' => $datax,
                'product' => 'Topup Saldo',
                'method' => $topup['method'] ,
                'amount' => 'Rp ' . number_format($topup['amount'], 0, ',', '.'),
                'status' => $topup['status'],
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
    
    public function get_topup_data_pending()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $topups = $this->M_Base->data_where_array_limit('topup', [
            'status' => 'Pending',
        ], 30000);

        $data = array();
        foreach ($topups as $index => $topup) {
            
            if (strlen($topup['method']) > 16) {
                $topup['method'] = $topup['method'] = substr($topup['method'], 0, 13) . '...';
            } 

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $topupDate = strtotime($topup['date_create']); // Tanggal pada order
            
            if ($topupDate > $targetDate) {
                if ($topup['saldosb'] == 0 || $topup['saldost'] == 0) {
                    $datax = $topup['username'];
                } else {
                    $datax = $topup['username'];
                }
            } else {
                $datax = $topup['username'];
            }
            
            
            
            $fee = $topup['fee'];
            $product_price = $topup['amount'] - $fee;
            
            if ($topup['payment_gateway'] == 'Xendit') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 10000;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 5000;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
			
			if ($topup['payment_gateway'] == 'Linkqu') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 1500;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 1500;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
            $date = date_create($topup['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($topup['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'id' => $topup['id'],
                'date_create' => $formattedDate,
                'time' => $time,
                'topup_id' => $topup['topup_id'],
                'username' => $datax,
                'product' => 'Topup Saldo',
                'method' => $topup['method'] ,
                'amount' => 'Rp ' . number_format($topup['amount'], 0, ',', '.'),
                'status' => $topup['status'],
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

    public function get_topup_data_canceled()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $topups = $this->M_Base->data_where_array_limit('topup', [
            'status' => 'Canceled',
        ], 30000);

        $data = array();
        foreach ($topups as $index => $topup) {
            
            if (strlen($topup['method']) > 16) {
                $topup['method'] = $topup['method'] = substr($topup['method'], 0, 13) . '...';
            } 

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $topupDate = strtotime($topup['date_create']); // Tanggal pada order
            
            if ($topupDate > $targetDate) {
                if ($topup['saldosb'] == 0 || $topup['saldost'] == 0) {
                    $datax = $topup['username'];
                } else {
                    $datax = $topup['username'];
                }
            } else {
                $datax = $topup['username'];
            }
            
            
            
            $fee = $topup['fee'];
            $product_price = $topup['amount'] - $fee;
            
            if ($topup['payment_gateway'] == 'Xendit') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 10000;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 5000;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
			
			if ($topup['payment_gateway'] == 'Linkqu') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 1500;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 1500;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
            $date = date_create($topup['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($topup['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'id' => $topup['id'],
                'date_create' => $formattedDate,
                'time' => $time,
                'topup_id' => $topup['topup_id'],
                'username' => $datax,
                'product' => 'Topup Saldo',
                'method' => $topup['method'] ,
                'amount' => 'Rp ' . number_format($topup['amount'], 0, ',', '.'),
                'status' => $topup['status'],
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

    public function get_topup_data_success()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $topups = $this->M_Base->data_where_array_limit('topup', [
            'status' => 'Success',
        ], 30000);

        $data = array();
        foreach ($topups as $index => $topup) {
            
            if (strlen($topup['method']) > 16) {
                $topup['method'] = $topup['method'] = substr($topup['method'], 0, 13) . '...';
            } 

            $targetDate = strtotime('2023-07-11 11:11:00'); // Tanggal target
            $topupDate = strtotime($topup['date_create']); // Tanggal pada order
            
            if ($topupDate > $targetDate) {
                if ($topup['saldosb'] == 0 || $topup['saldost'] == 0) {
                    $datax = $topup['username'];
                } else {
                    $datax = $topup['username'];
                }
            } else {
                $datax = $topup['username'];
            }
            
            
            
            $fee = $topup['fee'];
            $product_price = $topup['amount'] - $fee;
            
            if ($topup['payment_gateway'] == 'Xendit') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 10000;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 5000;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
			
			if ($topup['payment_gateway'] == 'Linkqu') {
				if (in_array($topup['payment_type'], array('QRIS'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Virtual Account'))) {
					$product_price = ($topup['amount'] - 4440)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('E-Wallet'))) {
					$product_price = ($topup['amount'] / 1.015)-$topup['uniq'];
				} else if (in_array($topup['payment_type'], array('Convenience Store'))) {
					
					if ($topup['method_code'] == 'INDOMARET') {
						$fee = 1500;
					}
					if ($topup['method_code'] == 'ALFAMART') {
						$fee = 1500;
					}

					$product_price = ($topup['amount'] - $fee-$topup['uniq']);

				} else {
					$product_price = ($topup['amount']-$topup['uniq']);
				}
			}
            $date = date_create($topup['date_create']);
            $formattedDate = date_format($date, 'Y-m-d');
            $time = substr($topup['date_create'], 11);

            $data[$index] = array(
                'no' => $index + 1,
                'id' => $topup['id'],
                'date_create' => $formattedDate,
                'time' => $time,
                'topup_id' => $topup['topup_id'],
                'username' => $datax,
                'product' => 'Topup Saldo',
                'method' => $topup['method'] ,
                'amount' => 'Rp ' . number_format($topup['amount'], 0, ',', '.'),
                'status' => $topup['status'],
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
            $topup = $this->M_Base->data_where('topup', 'id', $id);

            if (count($topup) === 1) {

                if ($this->request->getPost('tombol')) {
                    $this->M_Base->data_update('topup', [
                        'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                        'amount' => addslashes(trim(htmlspecialchars($this->request->getPost('amount')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                    ], $id);
                    
                    $oldLog = $topup[0]['log'];
                    $newLog = '[' . date('Y-m-d G:i:s') . '] Edit Topup dari status ' . $topup[0]['status'] . ' ke '.$this->request->getPost('status') . 
                    'Saldo Deposit dari' . $topup[0]['amount'] . ' ke Saldo '. $this->request->getPost('amount'). ' oleh ' . $this->admin['level'] . ' ' . $this->admin['username'];
                    $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                    
                    $this->M_Base->data_update('topup', [
                        'log' => $log,
                    ], $id);

                    $this->session->setFlashdata('success', 'Data topup berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Topup',
                    'topup' => $topup[0],
                ]);

                return view('Admin/Topup/edit', $data);
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
            $topup = $this->M_Base->data_where('topup', 'id', $id);

            if (count($topup) === 1) {
                $this->M_Base->data_delete('topup', $id);

                $this->session->setFlashdata('success', 'Data topup berhasil dihapus');
                return redirect()->to(base_url() . '/admin/topup');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function detail($topup_id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $topup = $this->M_Base->data_where('topup', 'topup_id', $topup_id);

            if (count($topup) === 1) {

                echo '
                <table class="table table-white table-striped">
                    <tr>
                        <th>Topup ID</th>
                        <td>' . $topup[0]['topup_id'] . '</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>' . $topup[0]['username'] . '</td>
                    </tr>
                    <tr>
                        <th>Metode</th>
                        <td>' . $topup[0]['method'] . '</td>
                    </tr>
                    <tr>
                        <th>Jumlah Total yang dibayarkan</th>
                        <td>Rp ' . number_format($topup[0]['amount'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Nilai Deposit</th>
                        <td>Rp ' . number_format($topup[0]['amount']-$topup[0]['fee']-$topup[0]['uniq'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Fee Payment Gateway</th>
                        <td>Rp ' . number_format($topup[0]['fee'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Kode Unik</th>
                        <td>Rp ' . number_format($topup[0]['uniq'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>' . $topup[0]['status'] . '</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>' . $topup[0]['date_create'] . '</td>
                    </tr>
                </table>
                <small class="px-2 py-2">
Log : <br>
' . $topup[0]['log'] . '</td>
</small>
                ';
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function accept($id = null)
    {

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $topup = $this->M_Base->data_where('topup', 'id', $id);

            if (count($topup) === 1) {

                if ($topup[0]['status'] === 'Pending') {

                    $users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);
                    
                    
                    
                    if (count($users) === 1) {
                        
                        $saldosb =  $users[0]['balance'];
                        $saldost = $saldosb + $topup[0]['amount'] - $topup[0]['uniq'] - $topup[0]['fee'];
                    
                        $this->M_Base->data_update('topup', [
                            'status' => 'Success',
                            'saldosb' => $saldosb,
                            'saldost' => $saldost
                        ], $topup[0]['id']);
                        
                        $oldLog = $topup[0]['log'];
                        $newLog = '[' . date('Y-m-d G:i:s') . '] Approve Topup ' .
                        'Saldo Sebelum : ' . $saldosb . ' ke Saldo Sesudah '. $saldost . ' oleh ' . $this->admin['level'] . ' ' . $this->admin['username'];
                        $log = $oldLog ? $oldLog . "\n" . $newLog : $newLog;
                        
                        $this->M_Base->data_update('topup', [
                            'log' => $log,
                        ], $topup[0]['id']);

                        $this->M_Base->data_update('users', [
                            'balance' => $users[0]['balance'] + $topup[0]['amount'] - $topup[0]['uniq'] - $topup[0]['fee'],
                        ], $users[0]['id']);

                        $this->session->setFlashdata('success', 'Topup berhasil diterima');
                        return redirect()->to(base_url() . '/admin/topup');
                    } else {
                        $this->session->setFlashdata('error', 'Username penerima tidak ditemukan');
                        return redirect()->to(base_url() . '/admin/topup/edit/' . $id);
                    }
                } else {
                    $this->session->setFlashdata('error', 'Data topup sudah berstatus ' . $topup[0]['status']);
                    return redirect()->to(base_url() . '/admin/topup/edit/' . $id);
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}