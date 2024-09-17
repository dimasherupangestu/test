<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Games extends BaseController
{

    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        $games = [];
        foreach ($this->M_Base->all_data('games') as $loop) {
            $games[] = array_merge($loop, [
                'product' => $this->M_Base->data_count('product', [
                    'games_id' => $loop['id']
                ]),
            ]);
        }

        $data = array_merge($this->base_data, [
            'title' => 'Games',
            'games' => $games,
        ]);

        return view('Admin/Games/index', $data);
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
                'games' => addslashes(trim(htmlspecialchars($this->request->getPost('games')))),
                'category' => addslashes(trim(htmlspecialchars($this->request->getPost('category')))),
                'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                'content' => $this->request->getPost('content'),
                'target' => addslashes(trim(htmlspecialchars($this->request->getPost('target')))),
                'check_status' => addslashes(trim(htmlspecialchars($this->request->getPost('check_status')))),
                'check_code' => addslashes(trim(htmlspecialchars($this->request->getPost('check_code')))),
                'code' => addslashes(trim(htmlspecialchars($this->request->getPost('code')))),
                'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                'st_col' => addslashes(trim(htmlspecialchars($this->request->getPost('st_col')))),
                'st_title' => addslashes(trim(htmlspecialchars($this->request->getPost('st_title')))),
                'st_desc' => $this->request->getPost('st_desc'),
                'st1_text' => addslashes(trim(htmlspecialchars($this->request->getPost('st1_text')))),
                'st1_type' => addslashes(trim(htmlspecialchars($this->request->getPost('st1_type')))),
                'st2_text' => addslashes(trim(htmlspecialchars($this->request->getPost('st2_text')))),
                'st2_type' => addslashes(trim(htmlspecialchars($this->request->getPost('st2_type')))),
                'st2_data' => $this->request->getPost('st2_data'),
            ];

            if (empty($data_post['games'])) {
                $this->session->setFlashdata('error', 'Nama games tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['category'])) {
                $this->session->setFlashdata('error', 'Kategori games tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['target'])) {
                $this->session->setFlashdata('error', 'Sistem target tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {

                $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];

                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/games/');
                $banner_img = $this->M_Base->upload_file($this->request->getFiles()['banner_img'], 'assets/images/games/banner_img/');
                $infoimage = $this->M_Base->upload_file($this->request->getFiles()['infoimage'], 'assets/images/games/infoimage/');

                if ($image) {
                    if ($banner_img) {
                        if ($infoimage) {
                            $this->M_Base->data_insert('games', array_merge($data_post, [
                                'slug' => url_title($data_post['games'], '-', true),
                                'image' => $image,
                                'status' => 'On',
                                'banner_img' => $banner_img,
                                'infoimage' => $infoimage,
                            ]));
                        }
                    $this->M_Base->data_insert('games', array_merge($data_post, [
                                'slug' => url_title($data_post['games'], '-', true),
                                'image' => $image,
                                'status' => 'On',
                                'banner_img' => '',
                                'infoimage' => '',
                            ]));
                        } else {
                    $this->M_Base->data_insert('games', array_merge($data_post, [
                        'slug' => url_title($data_post['games'], '-', true),
                        'image' => $image,
                        'status' => 'On',
                        'banner_img' => '',
                        'infoimage' => '',
                    ]));
                }

                    $this->session->setFlashdata('success', 'Games berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->session->setFlashdata('error', 'Gambar tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Games',
            'category' => $this->M_Base->all_data('category'),
        ]);

        return view('Admin/Games/add', $data);
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
            $games = $this->M_Base->data_where('games', 'id', $id);

            if (count($games) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'games' => addslashes(trim(htmlspecialchars($this->request->getPost('games')))),
                        'category' => addslashes(trim(htmlspecialchars($this->request->getPost('category')))),
                        'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                        'content' => $this->request->getPost('content'),
                        'target' => addslashes(trim(htmlspecialchars($this->request->getPost('target')))),
                        'check_status' => addslashes(trim(htmlspecialchars($this->request->getPost('check_status')))),
                        'check_code' => addslashes(trim(htmlspecialchars($this->request->getPost('check_code')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                        'code' => addslashes(trim(htmlspecialchars($this->request->getPost('code')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                        'st_col' => addslashes(trim(htmlspecialchars($this->request->getPost('st_col')))),
                        'st_title' => addslashes(trim(htmlspecialchars($this->request->getPost('st_title')))),
                        'st_desc' => $this->request->getPost('st_desc'),
                        'st1_text' => addslashes(trim(htmlspecialchars($this->request->getPost('st1_text')))),
                        'st1_type' => addslashes(trim(htmlspecialchars($this->request->getPost('st1_type')))),
                        'st2_text' => addslashes(trim(htmlspecialchars($this->request->getPost('st2_text')))),
                        'st2_type' => addslashes(trim(htmlspecialchars($this->request->getPost('st2_type')))),
                        'st2_data' => $this->request->getPost('st2_data'),
                        'discount' => addslashes(trim(htmlspecialchars($this->request->getPost('discount')))),
                    ];

                    if (empty($data_post['games'])) {
                        $this->session->setFlashdata('error', 'Nama games tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['category'])) {
                        $this->session->setFlashdata('error', 'Kategori games tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['target'])) {
                        $this->session->setFlashdata('error', 'Sistem target tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {

                        $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];

                        $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/games/');
                        $banner_img = $this->M_Base->upload_file($this->request->getFiles()['banner_img'], 'assets/images/games/banner_img/');
                        $infoimage = $this->M_Base->upload_file($this->request->getFiles()['infoimage'], 'assets/images/games/infoimage/');

                         if ($image) {
                            $file = 'assets/images/games/' . $games[0]['image'];

                        } else {
                            $image = $games[0]['image'];
                        }
                        if ($banner_img) {
                            $file = 'assets/images/games/banner_img/' . $games[0]['banner_img'];
                        } else {
                            $banner_img = $games[0]['banner_img'];
                        }
                        
                        if ($infoimage) {
                            $file = 'assets/images/games/infoimage/' . $games[0]['infoimage'];
                        } else {
                            $infoimage = $games[0]['infoimage'];
                        }
                        
                        $this->M_Base->data_update('games', array_merge($data_post, [
                            'image' => $image,
                            'banner_img' => $banner_img,
                            'infoimage' => $infoimage,
                        ]), $id);

                        $this->session->setFlashdata('success', 'Games berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Games',
                    'category' => $this->M_Base->all_data('category'),
                    'games' => $games[0],
                ]);

                return view('Admin/Games/edit', $data);

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
            $games = $this->M_Base->data_where('games', 'id', $id);

            if (count($games) === 1) {
                $this->M_Base->data_delete('games', $id);

                $this->session->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->to(base_url() . '/admin/games');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function get()
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/gamesdigi', []);

        $this->session->setFlashdata('success', 'Games berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/games');
    }

    public function getbj()
    {
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/gamesbj', []);

        $this->session->setFlashdata('success', 'Games berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/games');
    }
}