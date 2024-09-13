<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Base;

class Produk extends BaseController
{

    public function index()
    {

        // if ($this->admin['level'] == 'Customer Service') {
        //     $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        //     return redirect()->to(base_url() . '/hello');
        // }

        // if ($this->admin == false) {
        //     $this->session->setFlashdata('error', 'Silahkan login dahulu');
        //     return redirect()->to(base_url() . '/admin/login');
        // }

        $product = [];
        foreach ($this->M_Base->all_data('product') as $loop) {
            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

            $nama_games = count($games) == 1 ? $games[0]['games'] : '-';

            $product[] = array_merge($loop, [
                'games' => $nama_games,
            ]);
        }

        $data = array_merge($this->base_data, [
            'title' => 'Produk',
            'product' => $product,
            'gamesFilter' => $this->M_Base->data_orders_no_duplicate('games', 'games', 'id'),
            'providerFilter' => $this->M_Base->data_orders_no_duplicate('product', 'provider'),
            'statusFilter' => $this->M_Base->data_orders_no_duplicate('games', 'status'),
        ]);

        return view('Admin/Produk/index', $data);
    }

    public function category($page = null, $id = null)
    {
        // if ($this->admin['level'] == 'Customer Service') {
        //     $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        //     return redirect()->to(base_url() . '/hello');
        // }

        // if ($this->admin == false) {
        //     $this->session->setFlashdata('error', 'Silahkan login dahulu');
        //     return redirect()->to(base_url() . '/Admin/login');
        // }

        if ($page === null) {

            $category = [];
            foreach ($this->M_Base->all_data('product_category') as $loop) {

                $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

                $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

                $category[] = array_merge($loop, [
                    'games' => $games,
                    'product' => $this->M_Base->data_count('product', [
                        'category_id' => $loop['id'],
                    ]),
                ]);
            }

            $data = array_merge($this->base_data, [
                'title' => 'Kategori Produk',
                'category' => $category,
            ]);

            return view('Admin/Produk/Category/index', $data);
        } else if ($page === 'add') {

            if ($this->request->getPost('tombol')) {

                $data_post = [
                    'games_id' => $this->request->getPost('games_id'),
                    'category' => $this->request->getPost('category'),
                ];

                if (empty($data_post['games_id'])) {
                    // Perubahan: Menggunakan SweetAlert untuk error
                    $this->session->setFlashdata('error', 'Games harus dipilih');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['category'])) {
                    // Perubahan: Menggunakan SweetAlert untuk error
                    $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {

                    $this->M_Base->data_insert('product_category', array_merge($data_post));

                    // Perubahan: Menggunakan SweetAlert untuk success
                    $this->session->setFlashdata('success', 'Kategori berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

            $data = array_merge($this->base_data, [
                'title' => 'Tambah Kategori',
                'games' => array_reverse($this->M_Base->all_data_order('games', 'games')),
            ]);

            return view('Admin/Produk/Category/add', $data);
        } else if ($page === 'edit') {

            if ($id) {

                $product_category = $this->M_Base->data_where('product_category', 'id', $id);

                if (count($product_category) == 1) {

                    if ($this->request->getPost('tombol')) {

                        $data_post = [
                            'games_id' => $this->request->getPost('games_id'),
                            'category' => $this->request->getPost('category'),
                        ];

                        if (empty($data_post['games_id'])) {
                            // Perubahan: Menggunakan SweetAlert untuk error
                            $this->session->setFlashdata('error', 'Games harus dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['category'])) {
                            // Perubahan: Menggunakan SweetAlert untuk error
                            $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {

                            $this->M_Base->data_update('product_category', array_merge($data_post), $id);

                            // Perubahan: Menggunakan SweetAlert untuk success
                            $this->session->setFlashdata('success', 'Kategori berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }

                    $data = array_merge($this->base_data, [
                        'title' => 'Edit Kategori',
                        'category' => $product_category[0],
                        'games' => array_reverse($this->M_Base->all_data_order('games', 'games')),
                    ]);

                    return view('Admin/Produk/Category/edit', $data);
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if ($page === 'delete') {

            if ($id) {

                $product_category = $this->M_Base->data_where('product_category', 'id', $id);

                if (count($product_category) == 1) {

                    $image = $product_category[0]['image'];

                    if (!empty($image)) {

                        $image_file = 'assets/images/category/' . $image;

                        if (file_exists($image_file)) {
                            unlink($image_file);
                        }
                    }

                    $this->M_Base->data_delete('product_category', $id);

                    // Perubahan: Menggunakan SweetAlert untuk success
                    $this->session->setFlashdata('success', 'Kategori berhasil dihapus');
                    return redirect()->to(base_url() . '/Admin/produk/category');
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}
