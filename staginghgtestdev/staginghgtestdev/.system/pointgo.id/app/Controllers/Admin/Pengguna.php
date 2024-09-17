<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengguna extends BaseController
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
            'title' => 'Pengguna',
            'account' => $this->M_Base->all_data('users'),
            'jumlah' => $this->db->table('users')->selectSum('balance', 'sumQuantities')->get()->getRow()->sumQuantities,
        ]);

        return view('Admin/Pengguna/index', $data);
    }

    public function get_pengguna_data()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $penggunas = $this->M_Base->all_data('users');
        $data = array();
        foreach ($penggunas as $index => $pengguna) {

            if ($pengguna['level'] == 'Member') {
                $pengguna['level'] = 'Member Biasa';
            }
            elseif ($pengguna['level'] == 'Silver') {
                $pengguna['level'] = 'Reseller Silver';
            }
            elseif ($pengguna['level'] == 'Gold') {
                $pengguna['level'] = 'Reseller Gold';
            }
            elseif ($pengguna['level'] == 'Platinum') {
                $pengguna['level'] = 'Reseller Platinum';
            }

            $data[$index] = array(
                'no' => $index + 1,
                'id' => $pengguna['id'],
                'username' => $pengguna['username'],
                'fullname' => $pengguna['fullname'],
                'date_create' => $pengguna['date_create'],
                'level' => $pengguna['level'],
                'wa' => $pengguna['wa'],
                'balance' => 'Rp ' . number_format($pengguna['balance'], 0, ',', '.'),
                'status' => $pengguna['status'],
            );
        }
        echo json_encode($data);
    }

    public function add()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlentities($this->request->getPost('username')))),
                'fullname' => addslashes(trim(htmlentities($this->request->getPost('fullname')))),
                'password' => addslashes(trim(htmlentities($this->request->getPost('password')))),
                'balance' => addslashes(trim(htmlentities($this->request->getPost('balance')))),
                'wa' => addslashes(trim(htmlentities($this->request->getPost('wa')))),
                'level' => addslashes(trim(htmlentities($this->request->getPost('level')))),
                'pin' => addslashes(trim(htmlspecialchars($this->request->getPost('pin')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['fullname'])) {
                $this->session->setFlashdata('error', 'Nama Lengkap tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['wa'])) {
                $this->session->setFlashdata('error', 'Whatsapp tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['username']) < 6) {
                $this->session->setFlashdata('error', 'Username minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['username']) > 24) {
                $this->session->setFlashdata('error', 'Username maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) < 6) {
                $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) > 24) {
                $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['pin']) < 6) {
                $this->session->setFlashdata('error', 'PIN minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['pin']) > 6) {
                $this->session->setFlashdata('error', 'PIN maksimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['pin'])) {
                $this->session->setFlashdata('error', 'PIN tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {

                $find_user = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($find_user) === 0) {
                    $this->M_Base->data_insert('users', array_merge($data_post, [
                        'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
                        'pin' => password_hash($data_post['pin'], PASSWORD_DEFAULT),
                        'ref' => $this->M_Base->random_string(5),
                        'ref_by' => '',
                        'status' => 'On',
                        'date_create' => date('Y-m-d G:i:s'),
                    ]));

                    $this->session->setFlashdata('success', 'Pengguna berhasil ditambahkan <br> Username : ' . $data_post['username'] . '<br>Password : ' . $data_post['password'] . '<br>Saldo : ' . number_format($data_post['balance'], 0, ',', '.'));
                    return redirect()->to(base_url() . '/admin/pengguna');
                } else {
                    $this->session->setFlashdata('error', 'Username sudah digunakan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Pengguna',
        ]);

        return view('Admin/Pengguna/add', $data);
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
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'balance' => addslashes(trim(htmlspecialchars($this->request->getPost('balance')))),
                        'fullname' => addslashes(trim(htmlspecialchars($this->request->getPost('fullname')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                        'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                        'level' => addslashes(trim(htmlentities($this->request->getPost('level')))),
                    ];

                    if (empty($data_post['status']) or empty($data_post['wa'])) {
                        $this->session->setFlashdata('error', 'Nomor wa tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 14) {
                        $this->session->setFlashdata('error', 'Nomor wa tidak sesuai');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $this->M_Base->data_update('users', $data_post, $id);

                        $this->session->setFlashdata('success', 'Data pengguna berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Pengguna',
                    'account' => $account[0],
                ]);

                return view('Admin/Pengguna/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function topup($id = null)
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {

                if ($this->request->getPost('tombol')) {
                    $users = $this->M_Base->data_where('users', 'username', $this->request->getPost('username'));

                    $topup_id = date('Ymd') . rand(0000, 9999);
                    $amount = addslashes(trim(htmlspecialchars($this->request->getPost('balance'))));
                    $saldosb = $users[0]['balance'];
                    $saldost = $saldosb + $amount;

                    $this->M_Base->data_insert('topup', [
                        'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                        'topup_id' => $topup_id,
                        'method_id' => '10001',
                        'method_code' => 'ADMIN',
                        'method' => 'TOPUP MANUAL BY ADMIN',
                        'amount' => $amount,
                        'status' => 'Success',
                        'payment_code' => 'Success',
                        'saldosb' => $saldosb,
                        'saldost' => $saldost,
                        'date_create' => date('Y-m-d G:i:s'),
                    ]);



                    if (count($users) === 1) {
                        $this->M_Base->data_update('users', [
                            'balance' => $users[0]['balance'] + $amount,
                            'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                            'level' => addslashes(trim(htmlentities($this->request->getPost('level')))),
                        ], $users[0]['id']);
                    }



                    $this->session->setFlashdata('success', 'Topup Manual Berhasil');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                }

                $data = array_merge($this->base_data, [
                    'title' => 'Topup Pengguna',
                    'account' => $account[0],
                ]);

                return view('Admin/Pengguna/topup', $data);
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

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {
                $this->M_Base->data_delete('users', $id);

                $this->session->setFlashdata('success', 'Data pengguna berhasil dihapus');
                return redirect()->to(base_url() . '/admin/pengguna');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function reset($id = null)
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
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {

                $password = $this->M_Base->random_string(6);

                $this->M_Base->data_update('users', [
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ], $id);

                $this->session->setFlashdata('success', 'Password pengguna berhasil direset : ' . $password);
                return redirect()->to(base_url() . '/admin/pengguna/edit/' . $id);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}