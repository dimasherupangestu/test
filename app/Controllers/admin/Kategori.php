<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
{

    public function index()
    {

        // if ($this->admin == false) {
        //     $this->session->setFlashdata('error', 'Silahkan login dahulu');
        //     return redirect()->to(base_url() . '/admin/login');
        // }

        // if ($this->admin['level'] == 'Customer Service') {
        //     $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
        //     return redirect()->to(base_url() . '/hello');
        // }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'category' => addslashes(trim(htmlspecialchars($this->request->getPost('category')))),
                'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
            ];

            if (empty($data_post['category'])) {
                $this->session->setFlashdata('error', 'Nama kategori baru tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];

                $this->M_Base->data_insert('category', $data_post);

                $this->session->setFlashdata('success', 'Kategori baru berhasil ditambahkan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Kategori',
            'kategori' => $this->M_Base->all_data('category'),
        ]);

        return view('Admin/Kategori/index', $data);
    }

    public function edit($id = null)
    {
        if (is_numeric($id)) {
            $kategori = $this->M_Base->data_where('category', 'id', $id);

            if (count($kategori) === 1) {
                if ($this->request->getPost()) {  // Perubahan: Menambahkan cek POST
                    $sort = $this->request->getPost('sort');  // Perubahan: Memastikan POST sort ada

                    if (is_numeric($sort)) {  // Perubahan: Validasi angka
                        $this->M_Base->data_update('category', [
                            'sort' => $sort,
                        ], $id);
                        return json_encode(['status' => 'success', 'message' => 'Urutan berhasil disimpan']);  // Perubahan: Ubah respons jadi JSON
                    } else {
                        return json_encode(['status' => 'error', 'message' => 'Urutan harus berupa angka']);  // Perubahan: Pesan error
                    }
                } else {
                    return json_encode(['status' => 'error', 'message' => 'Data POST tidak ditemukan']);  // Perubahan: Tambah validasi POST
                }
            } else {
                return json_encode(['status' => 'error', 'message' => 'Kategori tidak ditemukan']);  // Perubahan: Ubah respons jadi JSON
            }
        } else {
            return json_encode(['status' => 'error', 'message' => 'ID tidak valid']);  // Perubahan: Ubah respons jadi JSON
        }
    }

    public function delete($id = null)
    {
        if (is_numeric($id)) {
            $kategori = $this->M_Base->data_where('category', 'id', $id);

            if (count($kategori) === 1) {
                $this->M_Base->data_delete('category', $id);
                $this->session->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->to(base_url() . '/admin/kategori');
            } else {
                $this->session->setFlashdata('error', 'Kategori tidak ditemukan');  // Perubahan: Tambah pesan error
                return redirect()->to(base_url() . '/admin/kategori');
            }
        } else {
            $this->session->setFlashdata('error', 'ID tidak valid');  // Perubahan: Tambah pesan error
            return redirect()->to(base_url() . '/admin/kategori');
        }
    }
}
