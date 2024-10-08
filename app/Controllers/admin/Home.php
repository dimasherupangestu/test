<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index()
    {

        // if ($this->admin == false) {
        //     $this->session->setFlashdata('error', 'Silahkan login dahulu');
        //     return redirect()->to(base_url() . 'admin/login');
        // }


        // if ($this->admin['level'] !== 'Superadmin') {
        //     $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        //     return redirect()->to(base_url() . 'hello');
        // }

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
    public function login()
    {

        // if ($this->admin !== false) {
        //     return redirect()->to(base_url() . '/Admin');
        // }

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
                            return redirect()->to(base_url() . 'admin/hello');
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

    public function logout()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            if ($this->session->get('admin')) {
                $this->session->remove('admin');

                $this->session->setFlashdata('success', 'Logout berhasil');
                return redirect()->to(base_url() . '/admin/login');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
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
}
