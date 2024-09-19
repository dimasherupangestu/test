<?php

namespace App\Controllers\admin;

use App\Models\GamesModel;
use App\Models\M_Base;

class Games extends \App\Controllers\BaseController
{
    protected $gamesModel;


    public function __construct()
    {
        $this->gamesModel = new GamesModel();
    }

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

    public function getData()
    {
        $limit = $this->request->getGet('limit');
        $offset = $this->request->getGet('offset') ?? 0;
        $search = $this->request->getGet('search') ?? '';
        $sort = $this->request->getGet('sort') ?? 'games';
        $order = $this->request->getGet('order') ?? 'asc';

        // Query ke database untuk mendapatkan games dengan pencarian
        $games = $this->M_Base->getAllGames($search, $limit, $offset, $sort, $order);

        // Total data dengan pencarian
        $total = $this->M_Base->countAllGames($search);

        // Format response JSON
        $data = [
            'total' => $total,
            'rows' => $games,
        ];

        return $this->response->setJSON($data);
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
        }

        $games = $this->M_Base->data_where('games', 'id', $id);

        if (count($games) === 1) {
            $this->M_Base->data_delete('games', $id);

            $this->session->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to(base_url() . '/admin/games');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit($id = null)
    {
        // Check if the admin level is 'Customer Service', redirect with error
        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        // Check if the admin is logged in, otherwise redirect to the login page
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        // If the ID is not valid, throw a PageNotFoundException
        if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Fetch the game data based on the provided ID
        $games = $this->M_Base->data_where('games', 'id', $id);

        // Ensure that the game data exists
        if (count($games) === 1) {

            // Handle form submission
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

                // Validation for required fields
                if (empty($data_post['games'])) {
                    $this->session->setFlashdata('error', 'Nama games tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['category'])) {
                    $this->session->setFlashdata('error', 'Kategori games tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['target'])) {
                    $this->session->setFlashdata('error', 'Sistem target tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                // Default value for 'sort' if not provided
                $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];

                // Handle file uploads
                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/games/');
                $banner_img = $this->M_Base->upload_file($this->request->getFiles()['banner_img'], 'assets/images/games/banner_img/');
                $infoimage = $this->M_Base->upload_file($this->request->getFiles()['infoimage'], 'assets/images/games/infoimage/');

                // If the image is not uploaded, retain the previous image
                $image = $image ?: $games[0]['image'];
                $banner_img = $banner_img ?: $games[0]['banner_img'];
                $infoimage = $infoimage ?: $games[0]['infoimage'];

                // Update the game data in the database
                $this->M_Base->data_update('games', array_merge($data_post, [
                    'image' => $image,
                    'banner_img' => $banner_img,
                    'infoimage' => $infoimage,
                ]), $id);

                // Set a success message and redirect to /admin/games page
                $this->session->setFlashdata('success', 'Games berhasil disimpan');
                return redirect()->to(base_url('/admin/games'));
            }

            // Render the edit form if no form submission is detected
            $data = array_merge($this->base_data, [
                'title' => 'Edit Games',
                'category' => $this->M_Base->all_data('category'),
                'games' => $games[0],
            ]);

            return view('Admin/Games/edit', $data);
        } else {
            // Throw a 404 error if the game is not found
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function create()
    {
        // Cek apakah user sudah login dan memiliki akses yang sesuai
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        // Proses saat form dikirim
        if ($this->request->getPost('tombol')) {
            // Ambil data dari form dan sanitasi input
            $data_post = [
                'games'        => addslashes(trim(htmlspecialchars($this->request->getPost('games')))),
                'category'     => addslashes(trim(htmlspecialchars($this->request->getPost('category')))),
                'sort'         => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                'content'      => $this->request->getPost('content'),
                'target'       => addslashes(trim(htmlspecialchars($this->request->getPost('target')))),
                'check_status' => addslashes(trim(htmlspecialchars($this->request->getPost('check_status')))),
                'check_code'   => addslashes(trim(htmlspecialchars($this->request->getPost('check_code')))),
                'code'         => addslashes(trim(htmlspecialchars($this->request->getPost('code')))),
                'provider'     => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                'st_col'       => addslashes(trim(htmlspecialchars($this->request->getPost('st_col')))),
                'st_title'     => addslashes(trim(htmlspecialchars($this->request->getPost('st_title')))),
                'st_desc'      => $this->request->getPost('st_desc'),
                'st1_text'     => addslashes(trim(htmlspecialchars($this->request->getPost('st1_text')))),
                'st1_type'     => addslashes(trim(htmlspecialchars($this->request->getPost('st1_type')))),
                'st2_text'     => addslashes(trim(htmlspecialchars($this->request->getPost('st2_text')))),
                'st2_type'     => addslashes(trim(htmlspecialchars($this->request->getPost('st2_type')))),
                'st2_data'     => $this->request->getPost('st2_data'),
            ];

            // Validasi input form
            if (empty($data_post['games'])) {
                $this->session->setFlashdata('error', 'Nama games tidak boleh kosong');
            } elseif (empty($data_post['category'])) {
                $this->session->setFlashdata('error', 'Kategori games tidak boleh kosong');
            } elseif (empty($data_post['target'])) {
                $this->session->setFlashdata('error', 'Sistem target tidak boleh kosong');
            } else {
                // Jika validasi lolos, lanjutkan proses
                $data_post['sort'] = empty($data_post['sort']) ? '1' : $data_post['sort'];

                // Upload file gambar
                $image = $this->M_Base->upload_file($this->request->getFile('image'), 'assets/images/games/');
                $banner_img = $this->M_Base->upload_file($this->request->getFile('banner_img'), 'assets/images/games/banner_img/');
                $infoimage = $this->M_Base->upload_file($this->request->getFile('infoimage'), 'assets/images/games/infoimage/');

                // Cek apakah file berhasil diupload
                if ($image) {
                    // Simpan data game ke database
                    $this->M_Base->data_insert('games', array_merge($data_post, [
                        'slug'       => url_title($data_post['games'], '-', true),
                        'image'      => $image,
                        'status'     => 'On',
                        'banner_img' => $banner_img,
                        'infoimage'  => $infoimage,
                    ]));

                    // Set pesan sukses dan redirect
                    $this->session->setFlashdata('success', 'Games berhasil ditambahkan');
                    return redirect()->to(base_url('admin/games'));
                } else {
                    // Jika gambar gagal diupload, tampilkan pesan error
                    $this->session->setFlashdata('error', 'Gagal mengunggah gambar. Pastikan format file benar dan coba lagi.');
                }
            }

            // Jika validasi gagal, kembalikan ke form
            return redirect()->back()->withInput();
        }

        // Data untuk ditampilkan di halaman form
        $data = array_merge($this->base_data, [
            'title'    => 'Tambah Games',
            'category' => $this->M_Base->all_data('category'),
        ]);

        return view('admin/games/create', $data);
    }
}
