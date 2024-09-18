<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Voucher extends BaseController
{

    public function index()
    {

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Voucher',
            'voucher' => $this->M_Base->all_data('voucher'),
        ]);

        return view('Admin/Voucher/index', $data);
    }

    public function add()
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {

            $data_post = [
                'voucher' => $this->request->getPost('voucher'),
                'diskon' => $this->request->getPost('diskon'),
                'min' => $this->request->getPost('min'),
                'max_diskon' => $this->request->getPost('max_diskon'),
                'max_use' => $this->request->getPost('max_use'),
                'status' => $this->request->getPost('status'),
                'type_produk' => $this->request->getPost('type_produk'),
            ];

            if (empty($data_post['voucher'])) {
                $this->session->setFlashdata('error', 'Kode voucher tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $produk = '';
                if ($this->request->getPost('produk')) {
                    $produk = implode(',', $this->request->getPost('produk'));
                }

                $level = '';
                if ($this->request->getPost('level')) {
                    $level = implode(' , ',  $this->request->getPost('level'));
                }

                $this->M_Base->data_insert('voucher', array_merge($data_post, [
                    'produk' => $produk,
                    'date_create' => date('Y-m-d G:i:s'),
                    'level' => $level,
                ]));

                $this->session->setFlashdata('success', 'Voucher berhasil dibuat');
                return redirect()->to(base_url() . '/admin/voucher');
            }
        }

        $product = [];
        foreach ($this->M_Base->all_data('product') as $loop) {

            $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

            $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

            $product[] = array_merge($loop, [
                'games' => $games,
            ]);
        }
        $voucher = [
            'type_produk' => '',
            'level' => '',
        ];

        $all_levels = $this->M_Base->all_data('member_level');

        $data = array_merge($this->base_data, [
            'title' => 'Buat Voucher',
            'product' => $product,
            'all_levels' => $all_levels,
            'voucher' => $voucher,
        ]);

        return view('Admin/Voucher/add', $data);
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
        }

        if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $voucher = $this->M_Base->data_where('voucher', 'id', $id);
            if (count($voucher) == 1) {
                $this->M_Base->data_delete('voucher', $id);

                $this->session->setFlashdata('success', 'Voucher berhasil di hapus');
                return redirect()->to(base_url() . '/admin/voucher');
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
        } else {

            $voucher = $this->M_Base->data_where('voucher', 'id', $id);

            if (count($voucher) == 1) {

                if ($this->request->getPost('tombol')) {

                    $data_post = [
                        'voucher' => $this->request->getPost('voucher'),
                        'diskon' => $this->request->getPost('diskon'),
                        'min' => $this->request->getPost('min'),
                        'max_diskon' => $this->request->getPost('max_diskon'),
                        'max_use' => $this->request->getPost('max_use'),
                        'status' => $this->request->getPost('status'),
                        'type_produk' => $this->request->getPost('type_produk'),
                    ];


                    if (empty($data_post['voucher'])) {
                        $this->session->setFlashdata('error', 'Voucher harus diisi');
                        return redirect()->to(base_url() . '/admin/voucher/edit/' . $id)->withInput();
                    } else {
                        $produk = '';
                        if ($this->request->getPost('product')) {
                            $produk = implode(',', $this->request->getPost('product'));
                        }
                        $level = '';
                        if ($this->request->getPost('level')) {
                            $level = implode(',', $this->request->getPost('level'));
                        }
                        $this->M_Base->data_update('voucher', array_merge($data_post, [
                            'produk' => $produk,
                            'level' => $level,
                        ]), $id);


                        $this->session->setFlashdata('success', 'Voucher berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $product = [];
                foreach ($this->M_Base->all_data('product') as $loop) {

                    $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

                    $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

                    $product[] = array_merge($loop, [
                        'games' => $games,
                    ]);
                }

                $all_levels = $this->M_Base->all_data('member_level');

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Voucher',
                    'voucher' => $voucher[0],
                    'product' => $product,
                    'all_levels' => $all_levels,
                ]);

                return view('Admin/Voucher/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}
