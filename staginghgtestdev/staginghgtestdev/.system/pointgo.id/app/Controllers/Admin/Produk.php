<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Produk extends BaseController
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
    
     public function updateStatus()
    {
    // Pastikan permintaan adalah POST
    if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
        // Ambil ID item dan status baru dari permintaan POST
        $itemId = $this->request->getPost('id');
        $newStatus = $this->request->getPost('status');
        
        // Panggil metode data_update di M_Base untuk melakukan pembaruan status
        $updateResult = $this->M_Base->data_update('product', [
            'Status' => $newStatus,
        ], $itemId);
        
        if ($updateResult) {
            // Kirim respons sukses
            $response = ['success' => true, 'message' => 'Status updated successfully'];
        } else {
            // Kirim respons gagal jika pembaruan gagal
            $response = ['success' => false, 'error' => 'Failed to update status'];
        }
        
        // Kirim respons dalam format JSON
        return $this->response->setJSON($response);
    } else {
        // Tangani permintaan yang tidak valid di sini (misalnya, tidak ada data POST)
        // ...

        // Kirim respons yang sesuai dengan kesalahan
        // ...
    }
    
    // Echo sesuatu untuk memeriksa apakah permintaan mencapai metode ini
    echo 'Reached updateStatus';
}

    public function updateStatusBulkOff($id = null)
    {
        // Panggil metode data_update di M_Base untuk melakukan pembaruan status
        $updateResult = $this->M_Base->data_update('product', [
            'Status' => 'Off',
        ], $id);
        
        if ($updateResult) {
            // Kirim respons sukses
            $response = ['success' => true, 'message' => 'Status updated successfully'];
        } else {
            // Kirim respons gagal jika pembaruan gagal
            $response = ['success' => false, 'error' => 'Failed to update status'];
        }
        
        // Kirim respons dalam format JSON
        return $this->response->setJSON($response);
    }
    
    public function updateStatusBulkOn($id = null)
    {

        // Panggil metode data_update di M_Base untuk melakukan pembaruan status
        $updateResult = $this->M_Base->data_update('product', [
            'Status' => 'On',
        ], $id);
        
        if ($updateResult) {
            // Kirim respons sukses
            $response = ['success' => true, 'message' => 'Status updated successfully'];
        } else {
            // Kirim respons gagal jika pembaruan gagal
            $response = ['success' => false, 'error' => 'Failed to update status'];
        }
        
        // Kirim respons dalam format JSON
        return $this->response->setJSON($response);

    }

    
   public function get_products_data1()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $query = "SELECT p.*, g.games FROM product p JOIN games g ON p.games_id = g.id";
        $products = $this->db->query($query)->getResultArray();
        $data = array();
        foreach ($products as $index => $product) {
            $profit_price = $product['price'] - $product['raw_price'];
            $data[$index] = array(
                'no' => $index + 1,
                'id' => $product['id'],
                'sort' => $product['sort'],
                'games' => $product['games'],
                'product' => $product['product'],
                'sku' => $product['sku'],
                'status' => $product['status'],
                'provider' => $product['provider'],
                'price' => 'Rp ' . number_format($product['price'], 0, ',', '.'),
                'raw_price' => 'Rp ' . number_format($product['raw_price'], 0, ',', '.'),
                'profit_price' => 'Rp ' . number_format($profit_price, 0, ',', '.'),
            );
        }
        echo json_encode($data);
    }
    
    public function get_products_data() {
        
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $search = $_GET['search'] ?? '';
        $offset = $_GET['offset'] ?? 0;
        $limit = $_GET['limit'] ?? 10;

        $status = $_GET['status'] ?? '';
        $provider = $_GET['provider'] ?? '';
        $games = $_GET['games'] ?? '';
        $status = $_GET['status'] ?? '';
        
        
        $products = $this->M_Base->get_paginated_data_product('product', $search, $offset, $limit, $games, $provider, $status);

        $tableData = $products['rows'];

        $totalRows = $products['total'];
        
        $data = array();
        foreach ($tableData as $index => $product) {
            $profit_price = $product['price'] - $product['raw_price'];
            $data[$index] = array(
                'no' => $index + 1,
                'id' => $product['id'],
                'sort' => $product['sort'],
                'games' => $product['games'],
                'product' => $product['product'],
                'sku' => $product['sku'],
                'status' => $product['status'],
                'provider' => $product['provider'],
                'price' => 'Rp ' . number_format($product['price'], 0, ',', '.'),
                'raw_price' => 'Rp ' . number_format($product['raw_price'], 0, ',', '.'),
                'profit_price' => 'Rp ' . number_format($profit_price, 0, ',', '.'),
            );
        }
        $response = array(
            'total' => $totalRows,
            'rows' => $data
        );

        header('Content-Type: application/json');
    echo json_encode($response);
    }


     public function vocagametable()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $product = [];
        foreach ($this->M_Base->all_data('product') as $loop) {
            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

            $nama_games = count($games) == 1 ? $games[0]['games'] : '-';

            $product[] = array_merge($loop, [
                'games' => $nama_games,
            ]);
        }

        
        $categoriesData = $this->M_Base->get_categories_data_voca();

        $data = array_merge($this->base_data, [
            'title' => 'Produk Vocagame',
            'product' => $product,
            'games' => $this->M_Base->data_orders_no_duplicate('games', 'games', 'id'),
            'gameslg' => $this->M_Base->all_data_asc_games('games'),
            'categoriesData' => $categoriesData,
        ]);

        return view('Admin/Produk/vocagametable', $data);
    }
    
    public function addprodukapi_voca() {
        
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
    
        // Ambil data dari request POST
        $game_id = $this->request->getPost('game_id');
        $product = $this->request->getPost('product');
        $sku = $this->request->getPost('sku');
        $product_id = $this->request->getPost('productid');
        $price = $this->request->getPost('price');
    
        // Siapkan data untuk disisipkan ke dalam database
        $dataToInsert = [
            'games_id' => $game_id,
            'product' => $product,
            'product_id' => $product_id,
            'sku' => $sku,
            'status' => 'On',
            'provider' => 'VG',
            'raw_price' => $price,
            'price' => $price*1.05,
            'price_silver' => $price*1.02,
            'price_gold' => $price*1.01,
        ];
    
        // Sisipkan data ke database
        $this->M_Base->data_insert('product', $dataToInsert);
    
        // Kirim respons sukses
        return $this->response->setJSON(['success' => true]);
    }
    
    public function get_products_data_voca()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $search = $_GET['search'] ?? '';
        $offset = $_GET['offset'] ?? 0;
        $limit = $_GET['limit'] ?? 10;
        $games = $_GET['games'] ?? '1';
        
        $products = $this->M_Base->get_paginated_api_data_voca($games, $search, $offset, $limit);

        $tableData = $products['rows'];
        usort($tableData, [$this->M_Base, 'sort_product_api']);

        $totalRows = $products['total'];
        
        $data = array();
        foreach ($tableData as $index => $product) {
            $criteria = array('sku' => $product['id'], 'provider' => 'VG');  // Menggunakan 'code' dari API sebagai SKU
        $local_product_data = $this->M_Base->data_where_array('product', $criteria);

        // Menentukan apakah produk sudah ada di database lokal
        $is_added = count($local_product_data) >= 1 ? 'Y' : 'N';

            $data[$index] = array(
                'no' => $index + 1,
                'product' => $product['name'],
                'sku' => $product['id'],
                'status' => $product['isActive'],
                'provider' => $product['provider_code'],
                'price' => 'Rp ' . number_format($product['price'], 0, ',', '.'),
                'added' => $is_added,
            );
        }
        $response = array(
            'total' => $totalRows,
            'rows' => $data
        );

        header('Content-Type: application/json');
    echo json_encode($response);
    }
    
    public function insert_pergames_product_voca()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        $gamesvoca = $this->request->getPost('gamesvoca');
        $gamesdb = $this->request->getPost('gamesdb');
        
        $this->M_Base->insert_massal_Product_voca($gamesvoca, $gamesdb);

    }

    public function category($page = null, $id = null)
    {

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/Admin/login');
        }

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
                    $this->session->setFlashdata('error', 'Games harus dipilih');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['category'])) {
                    $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {


                    $this->M_Base->data_insert('product_category', array_merge($data_post));

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
                            $this->session->setFlashdata('error', 'Games harus dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['category'])) {
                            $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {

                            $this->M_Base->data_update('product_category', array_merge($data_post), $id);

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

    public function markupharga() {
        if ($this->admin == false) {
                $this->session->setFlashdata('error', 'Silahkan login dahulu');
                return redirect()->to(base_url() . '/Admin/login');
            }
        
        if ($this->admin['level'] == 'Customer Service') {
                $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
                return redirect()->to(base_url() . '/hello');
            }
    
        if ($this->request->getPost('tombol')) {
            $data_post = [
                'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                'tipeharga' => $this->request->getPost('tipeharga'),
                'persentase' => $this->request->getPost('persentase'),
                'nominal' => $this->request->getPost('nominal'),
                'provider' => $this->request->getPost('provider'),
            ];
    
            if (empty($data_post['games_id']) || empty($data_post['tipeharga']) || empty($data_post['provider'])) {
                $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                
                $productWhere = ['status' => 'On'];
                if ($data_post['provider'] != 'all') {
                    $productWhere['provider'] = $data_post['provider'];
                }
                
                if ($data_post['games_id'] != 'all') {
                    $productWhere['games_id'] = $data_post['games_id'];
                }
                
                $priceField = 'price';
                if ($data_post['tipeharga'] == 'silver') {
                    $priceField = 'price_silver';
                } else if ($data_post['tipeharga'] == 'gold') {
                    $priceField = 'price_gold';
                } else if ($data_post['tipeharga'] == 'bronze') {
                    $priceField = 'price_bronze';
                } else if ($data_post['tipeharga'] == 'platinum') {
                    $priceField = 'price_platinum';
                } else if ($data_post['tipeharga'] == 'discount_price') {
                    $priceField = 'discount_price';
                }
    
                foreach ($this->M_Base->data_where_2('product', $productWhere) as $product) {
                    $updateData = [$priceField => ($product['raw_price'] / 100 * ($data_post['persentase'] + 100)) + $data_post['nominal']];
                    if ($data_post['games_id'] != 'all') {
                        $updateData['games_id'] = $games[0]['id'];
                    }
                    
                    $this->M_Base->data_update('product', $updateData, $product['id']);
                }
    
                $this->session->setFlashdata('success', 'Harga Berhasil di Markup');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }
    
        $data = array_merge($this->base_data, [
            'title' => 'Markup Harga Produk',
            'games' => $this->M_Base->all_data('games'),
        ]);
    
        return view('Admin/Produk/markupharga', $data);
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
                'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                'price' => addslashes(trim(htmlspecialchars($this->request->getPost('price')))),
                'price_bronze' => addslashes(trim(htmlspecialchars($this->request->getPost('price_bronze')))),
                'price_silver' => addslashes(trim(htmlspecialchars($this->request->getPost('price_silver')))),
                'price_gold' => addslashes(trim(htmlspecialchars($this->request->getPost('price_gold')))),
                'price_platinum' => addslashes(trim(htmlspecialchars($this->request->getPost('price_platinum')))),
                'raw_price' => addslashes(trim(htmlspecialchars($this->request->getPost('raw_price')))),
                'discount_price' => addslashes(trim(htmlspecialchars($this->request->getPost('discount_price')))),
                'discount_number' => addslashes(trim(htmlspecialchars($this->request->getPost('discount_number')))),
                'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                'sku' => addslashes(trim(htmlspecialchars($this->request->getPost('sku')))),
                'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                'category_id' => addslashes(trim(htmlspecialchars($this->request->getPost('category_id')))),
                'product_id' => addslashes(trim(htmlspecialchars($this->request->getPost('product_id')))),
                'limitflashsale' => addslashes(trim(htmlspecialchars($this->request->getPost('limitflashsale')))),
                'flashsale_part' => addslashes(trim(htmlspecialchars($this->request->getPost('flashsale_part')))),
            ];

            if (empty($data_post['games_id']) or empty($data_post['product']) or empty($data_post['price']) or empty($data_post['provider']) or empty($data_post['sku'])) {
                $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/product/');


                if ($image) {
                    $this->M_Base->data_insert('product', array_merge($data_post, [
                        'image' => $image,
                    ]));

                    $this->session->setFlashdata('success', 'Produk berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                } else if (count($games) === 1) {
                    $this->M_Base->data_insert('product', $data_post);

                    $this->session->setFlashdata('success', 'Produk berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                } else {
                    $this->session->setFlashdata('error', 'Gambar tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Produk',
            'games' => $this->M_Base->all_data('games'),
            'category' => $this->M_Base->all_data('product_category'),
        ]);

        return view('Admin/Produk/add', $data);
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
        } else if (is_numeric($id)) {
            $product = $this->M_Base->data_where('product', 'id', $id);

            if (count($product) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                        'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                        'price' => addslashes(trim(htmlspecialchars($this->request->getPost('price')))),
                        'price_bronze' => addslashes(trim(htmlspecialchars($this->request->getPost('price_bronze')))),
                        'price_silver' => addslashes(trim(htmlspecialchars($this->request->getPost('price_silver')))),
                        'price_gold' => addslashes(trim(htmlspecialchars($this->request->getPost('price_gold')))),
                        'price_platinum' => addslashes(trim(htmlspecialchars($this->request->getPost('price_platinum')))),
                        'raw_price' => addslashes(trim(htmlspecialchars($this->request->getPost('raw_price')))),
                        'discount_price' => addslashes(trim(htmlspecialchars($this->request->getPost('discount_price')))),
                        'discount_number' => addslashes(trim(htmlspecialchars($this->request->getPost('discount_number')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                        'sku' => addslashes(trim(htmlspecialchars($this->request->getPost('sku')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                        'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                        'category_id' => addslashes(trim(htmlspecialchars($this->request->getPost('category_id')))),
                        'product_id' => addslashes(trim(htmlspecialchars($this->request->getPost('product_id')))),
                        'limitflashsale' => addslashes(trim(htmlspecialchars($this->request->getPost('limitflashsale')))),
                        'flashsale_part' => addslashes(trim(htmlspecialchars($this->request->getPost('flashsale_part')))),

                    ];

                    if (empty($data_post['games_id']) or empty($data_post['product']) or empty($data_post['price']) or empty($data_post['provider']) or empty($data_post['sku'])) {
                        $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                        $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/product/');

                        if ($image) {
                            if (count($games) === 1) {
                                $file = 'assets/images/product/' . $product[0]['image'];


                                $this->M_Base->data_update('product', array_merge($data_post, [
                                    'image' => $image,
                                ]), $id);

                                $this->session->setFlashdata('success', 'Produk berhasil disimpan');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }

                        } else if (count($games) === 1) {
                            $this->M_Base->data_update('product', $data_post, $id);

                            $this->session->setFlashdata('success', 'Produk berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                        } else {
                            $this->session->setFlashdata('error', 'Games tidak ditemukan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Produk',
                    'product' => $product[0],
                    'games' => $this->M_Base->all_data('games'),
                    'category' => $this->M_Base->data_where('product_category', 'games_id', $product[0]['games_id']),
                ]);

                return view('Admin/Produk/edit', $data);

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
        } else if (is_numeric($id)) {
            $product = $this->M_Base->data_where('product', 'id', $id);

            if (count($product) === 1) {

                $this->M_Base->data_delete('product', $id);

                $this->session->setFlashdata('success', 'Produk berhasil dihapus');
                return redirect()->to(base_url() . '/admin/produk');

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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

        $this->M_Base->post(base_url() . '/sistem/product', []);

        $this->session->setFlashdata('success', 'Produk berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }

    public function getbj()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/productbj', []);

        $this->session->setFlashdata('success', 'Produk berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }

    public function rawprice()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/rawprice', []);

        $this->session->setFlashdata('success', 'Harga Raw berhasil di update, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }
}