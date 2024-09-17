<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Memberlevel extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Admin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Membership Level',
            'account' => $this->M_Base->all_data('member_level'),
        ]);

        return view('Admin/Memberlevel/index', $data);
    }

    public function add() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlentities($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlentities($this->request->getPost('password')))),
                'balance' => addslashes(trim(htmlentities($this->request->getPost('balance')))),
                'wa' => addslashes(trim(htmlentities($this->request->getPost('wa')))),
                'level' => addslashes(trim(htmlentities($this->request->getPost('level')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
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
            } else {

                $find_user = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($find_user) === 0) {
                    $this->M_Base->data_insert('users', array_merge($data_post, [
                        'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
                        'ref' => $this->M_Base->random_string(5),
                        'ref_by' => '',
                        'status' => 'On',
                        'date_create' => date('Y-m-d G:i:s'),
                    ]));

                    $this->session->setFlashdata('success', 'Membership Level berhasil ditambahkan <br> Username : ' . $data_post['username'] . '<br>Password : ' . $data_post['password'] . '<br>Saldo : ' . number_format($data_post['balance'],0,',','.'));
                    return redirect()->to(base_url() . '/admin/memberlevel');
                } else {
                    $this->session->setFlashdata('error', 'Username sudah digunakan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Membership Level',
        ]);

        return view('Admin/Memberlevel/add', $data);
    }

    public function edit($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $member_level = $this->M_Base->data_where('member_level', 'id', $id);

            if (count($member_level) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'alias' => addslashes(trim(htmlspecialchars($this->request->getPost('alias')))),
                        'price' => addslashes(trim(htmlspecialchars($this->request->getPost('price')))),
                    ];

                    if (empty($data_post['alias']) OR empty($data_post['price'])) {
                        $this->session->setFlashdata('error', 'Nomor wa tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];
                        $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/');
                        $this->M_Base->data_update('member_level', $data_post, $id);
                        
                        if ($image) {
                            $file = 'assets/images/' . $member_level[0]['image'];

                            if (file_exists($file)) {
                                unlink($file);
                            }
                        } else {
                            $image = $member_level[0]['image'];
                        }
                        
                        $this->M_Base->data_update('member_level', array_merge($data_post, [
                            'image' => $image,
                        ]), $id);

                        $this->session->setFlashdata('success', 'Data Member berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Member Level',
                    'member_level' => $member_level[0],
                ]);

                return view('Admin/Memberlevel/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
    
    public function api($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {
                if ($account[0]['level'] == 'Gold') {
                    if ($this->request->getPost('tombol')) {
                        $data_post = [
                            'ip_white' => addslashes(trim(htmlentities($this->request->getPost('ip_white')))),
                        ];
    
                        if (empty($data_post['ip_white'])) {
                            $this->session->setFlashdata('error', 'Whitelist IP tidak boleh kosong');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {
                            
                            if (empty($account[0]['api_key'])) {
                                $api_key = bin2hex(random_bytes(56));
                                $data_post['api_key'] = $api_key;
                            }
                            
                            $this->M_Base->data_update('users', $data_post, $id);
    
                            $this->session->setFlashdata('success', 'Data API pengguna berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
    
                    $data = array_merge($this->base_data, [
                        'title' => 'Edit API Pengguna',
                        'account' => $account[0],
                    ]);
    
                    return view('Admin/Memberlevel/api', $data);
                } else {
                    $this->session->setFlashdata('error', 'Level Kurang Tinggi');
                    return redirect()->to(base_url() . '/Admin/Memberlevel');
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }


    public function delete($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $account = $this->M_Base->data_where('users', 'id', $id);

            if (count($account) === 1) {
                $this->M_Base->data_delete('users', $id);

                $this->session->setFlashdata('success', 'Data Membership Level berhasil dihapus');
                return redirect()->to(base_url() . '/admin/memberlevel');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function reset($id = null) {

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

                $this->session->setFlashdata('success', 'Password Member Level berhasil direset : ' . $password);
                return redirect()->to(base_url() . '/admin/memberlevel/edit/' . $id);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}