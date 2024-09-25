<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_Base;
use App\Models\ProductModel;

class Konfigurasi extends BaseController
{


    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->admin['level'] !== 'Superadmin' && $this->admin['level'] !== 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }

        if ($this->request->getPost('tombol')) {
            if ($this->request->getPost('tombol') == 'umum') {

                $this->M_Base->u_update('web-title', $this->request->getPost('title'));
                $this->M_Base->u_update('web-name', $this->request->getPost('name'));
                $this->M_Base->u_update('web-keywords', $this->request->getPost('keywords'));
                $this->M_Base->u_update('web-description', $this->request->getPost('descriptiona'));
                $this->M_Base->u_update('komisi_ref', $this->request->getPost('komisi_ref'));

                $logo = $this->M_Base->upload_file($this->request->getFiles()['logo'], 'assets/images/');
                if ($logo) {
                    $this->M_Base->u_update('web-logo', $logo);
                }

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'popup') {

                $this->M_Base->u_update('popup_title', $this->request->getPost('popup_title'));
                $this->M_Base->u_update('popup_desc', $this->request->getPost('popup_desc'));
                $this->M_Base->u_update('popup_date', date('Y-m-d G:i:s'));
                $this->M_Base->u_update('popup_status', $this->request->getPost('popup_status'));

                $popup = $this->M_Base->upload_file($this->request->getFiles()['popup_image'], 'assets/images/');
                if ($popup) {
                    $this->M_Base->u_update('popup_image', $popup);
                }


                $this->session->setFlashdata('success', 'Data Pop Up berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'tokopay') {
                $this->M_Base->u_update('tokopay-merchant', $this->request->getPost('merchant'));
                $this->M_Base->u_update('tokopay-secret-key', $this->request->getPost('secret'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'delete_img_popup') {

                $this->M_Base->u_update('popup_image', '-');

                $this->session->setFlashdata('success', 'Gambar Pop Up berhasil dihapus');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'banner') {

                $data_post = [
                    'url' => $this->request->getPost('url'),
                ];

                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/banner/');

                if ($image) {
                    $this->M_Base->data_insert('banner', [
                        'image' => $image,
                        'url' => $data_post['url'],
                    ]);

                    $this->session->setFlashdata('success', 'Banner berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->session->setFlashdata('error', 'Gambar banner tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            } else if ($this->request->getPost('tombol') == 'expired') {
                $this->M_Base->u_update('flashsale_expired', $this->request->getPost('expired'));
                $this->session->setFlashdata('success', 'Data Flashsale berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'flashsale') {

                $data_post = [
                    'title' => $this->request->getPost('title'),
                    'games_id' => $this->request->getPost('games_id'),
                    'product_id' => $this->request->getPost('product_id'),
                    // 'part' => $this->request->getPost('part'),
                ];

                $data_flashsale = [
                    'limitflashsale' => $this->request->getPost('limitflashsale')
                ];

                $data_flashsale_part = [
                    'flashsale_part' => $this->request->getPost('flashsale_part')
                ];

                $productModel = new ProductModel();
                $productModel->update($data_post['product_id'], ['limitflashsale' => $data_flashsale['limitflashsale']]);
                $productModel->update($data_post['product_id'], ['flashsale_part' => $data_flashsale_part['flashsale_part']]);

                // var_dump($data_post);

                if (empty($data_post['title'])) {
                    $this->session->setFlashdata('error', 'flashsale kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/flashsale/');

                    if ($image) {

                        $this->M_Base->data_insert('flashsale', array_merge($data_post, [
                            'image' => $image,
                        ]));

                        $this->session->setFlashdata('success', 'flashsale berhasil ditambahkan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $this->session->setFlashdata('error', 'Gambar flashsale tidak sesuai');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Konfigurasi',
            'tripay' => [
                'key' => $this->M_Base->u_get('tripay-key'),
                'private' => $this->M_Base->u_get('tripay-private'),
                'merchant' => $this->M_Base->u_get('tripay-merchant'),
            ],

            'flashsale' => $this->M_Base->all_data('flashsale'),
            'joinflashsale' => $this->M_Base->join_table_2('flashsale', 'product', 'product_id', 'id', 'flashsale.*, product.product, product.price, product.discount_price, product.discount_number, product.limitflashsale, product.flashsale_part'),
            'duitku' => [
                'key' => $this->M_Base->u_get('duitku-key'),
                'merchant' => $this->M_Base->u_get('duitku-merchant'),
            ],
            'xendit' => [
                'api' => $this->M_Base->u_get('xendit_api'),
                'callback' => $this->M_Base->u_get('xendit_token'),
            ],
            'ag' => [
                'merchant' => $this->M_Base->u_get('ag-merchant'),
                'secret' => $this->M_Base->u_get('ag-secret'),
            ],
            'tokopay' => [
                'merchant' => $this->M_Base->u_get('tokopay-merchant'),
                'secret' => $this->M_Base->u_get('tokopay-secret-key'),
            ],
            'popup' => [
                'title' => $this->M_Base->u_get('popup_title'),
                'desc' => $this->M_Base->u_get('popup_desc'),
                'date' => $this->M_Base->u_get('popup_date'),
                'status' => $this->M_Base->u_get('popup_status'),
                'image' => $this->M_Base->u_get('popup_image'),
            ],
            'linkqu' => [
                'username_linkqu' => $this->M_Base->u_get('username_linkqu'),
                'pin_linkqu' => $this->M_Base->u_get('pin_linkqu'),
                'id_linkqu' => $this->M_Base->u_get('id_linkqu'),
                'secret_linkqu' => $this->M_Base->u_get('secret_linkqu'),
            ],
            'wapi' => [
                'api' => $this->M_Base->u_get('wapi_api'),
                'device' => $this->M_Base->u_get('wapi_device'),

            ],
            'margin' => [
                'publik' => $this->M_Base->u_get('margin_publik'),
                'silver' => $this->M_Base->u_get('margin_silver'),
                'gold' => $this->M_Base->u_get('margin_gold'),
                'platinum' => $this->M_Base->u_get('margin_platinum'),
            ],
            'tv' => [
                'merchant' => $this->M_Base->u_get('tv-merchant'),
                'secret' => $this->M_Base->u_get('tv-secret'),
                'signature' => $this->M_Base->u_get('tv-signature'),
            ],
            'margin_voca' => [
                'publik_voca' => $this->M_Base->u_get('margin_voca_publik'),
                'platinum_voca' => $this->M_Base->u_get('margin_voca_platinum'),
                'silver_voca' => $this->M_Base->u_get('margin_voca_silver'),
                'gold_voca' => $this->M_Base->u_get('margin_voca_gold'),
            ],
            'voca' => [
                'merchant' => $this->M_Base->u_get('voca_merchantid'),
                'api' => $this->M_Base->u_get('voca_apikey'),
                'secret' => $this->M_Base->u_get('voca_secretkey'),
                'callback' => $this->M_Base->u_get('voca_callbackkey'),
            ],
            'vr' => [
                'id' => $this->M_Base->u_get('vr-id'),
                'key' => $this->M_Base->u_get('vr-key'),
            ],
            'bm' => [
                'id' => $this->M_Base->u_get('bm-id'),
                'key' => $this->M_Base->u_get('bm-key'),
            ],
            'digi' => [
                'user' => $this->M_Base->u_get('digi-user'),
                'key' => $this->M_Base->u_get('digi-key'),
            ],
            'wagenerator' => [
                'nowa' => $this->M_Base->u_get('nowa'),
                'wapesan' => $this->M_Base->u_get('wapesan'),
            ],
            'okeconnect' => [
                'memberid' => $this->M_Base->u_get('memberid-oc'),
                'pin' => $this->M_Base->u_get('pin-oc'),
                'password' => $this->M_Base->u_get('password-oc'),
            ],
            'bangjeff' => [
                'api' => $this->M_Base->u_get('bangjeff-api'),
            ],
            'lapakgaming' => [
                'api' => $this->M_Base->u_get('lapakgaming-api'),
            ],
            'warunkgamer' => [
                'key' => $this->M_Base->u_get('warunkgamer-key'),
            ],
            'games' => array_reverse($this->M_Base->all_data_order('games', 'games')),
            'product' => array_reverse($this->M_Base->all_data_order('product', 'product')),
            'banner' => $this->M_Base->all_data('banner'),
            'page_sk' => $this->M_Base->u_get('page_sk'),
            'expired' => $this->M_Base->u_get('flashsale_expired'),
            'video' => $this->M_Base->u_get('video'),
            'wa_token' => $this->M_Base->u_get('wa_token'),
            'komisi_ref' => $this->M_Base->u_get('komisi_ref'),
            'cm' => [
                'key' => $this->M_Base->u_get('cm_key'),
                'rek' => $this->M_Base->u_get('cm_rek'),
                'rek-bni' => $this->M_Base->u_get('cm_rek_bni'),
                'rek-mandiri' => $this->M_Base->u_get('cm_rek_mandiri'),

            ],
        ]);

        return view('Admin/Konfigurasi/index', $data);
    }

    public function edit($id = null)
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->admin['level'] == 'Customer Service') {
            $this->session->setFlashdata('error', 'Anda tidak diizinkan mengakses halaman ini');
            return redirect()->to(base_url() . 'admin/hello');
        } else {

            $post = $this->M_Base->data_where('flashsale', 'id', $id);

            if (!empty($post)) {
                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'title' => $this->request->getPost('title'),
                        'games_id' => $this->request->getPost('games_id'),
                        'product_id' => $this->request->getPost('product_id'),
                    ];

                    $data_flashsale = [
                        'limitflashsale' => $this->request->getPost('limitflashsale')
                    ];

                    $data_flashsale_part = [
                        'flashsale_part' => $this->request->getPost('flashsale_part')
                    ];

                    $productModel = new ProductModel();
                    $productModel->update($data_post['product_id'], ['limitflashsale' => $data_flashsale['limitflashsale']]);
                    $productModel->update($data_post['product_id'], ['flashsale_part' => $data_flashsale_part['flashsale_part']]);


                    // Validasi Input
                    if (empty($data_post['title'])) {
                        $this->session->setFlashdata('error', 'Judul postingan tidak boleh kosong');
                        return redirect()->back()->withInput();
                    } elseif (empty($data_post['games_id'])) {
                        $this->session->setFlashdata('error', 'Game tidak boleh kosong');
                        return redirect()->back()->withInput();
                    }

                    // Upload Image
                    $image = $this->M_Base->images($this->request->getFile('image'), 'assets/images/flashsale/');

                    if ($image) {
                        // Hapus gambar lama jika ada
                        if (!empty($post[0]['image'])) {
                            $image_old = 'assets/images/flashsale/' . $post[0]['image'];
                            if (is_file($image_old) && file_exists($image_old)) {
                                unlink($image_old);
                            }
                        }
                    } else {
                        // Tetap gunakan gambar lama jika tidak ada upload baru
                        $image = $post[0]['image'];
                    }

                    // Update Data
                    $this->M_Base->data_update('flashsale', array_merge($data_post, [
                        'image' => $image
                    ]), $id);

                    $this->session->setFlashdata('success', 'flashsale berhasil diedit');
                    return redirect()->to(base_url() . 'admin/konfigurasi');
                }
            } else {
                $this->session->setFlashdata('error', 'Data tidak ditemukan');
                return redirect()->to(base_url() . 'admin/konfigurasi');
            }

            $data = array_merge($this->base_data, [
                'title' => 'Edit Postingan',
                'post' => $post[0],
                'games' => array_reverse($this->M_Base->all_data_order('games', 'games')),
                'product' => array_reverse($this->M_Base->all_data_order('product', 'product')),


            ]);

            return view('Admin/konfigurasi/edit', $data);
        }
    }

    public function banner($action = null, $id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if ($action === 'delete') {
            if (is_numeric($id)) {
                $this->M_Base->data_delete('banner', $id);

                $this->session->setFlashdata('success', 'Banner berhasil dihapus');
                return redirect()->to(base_url() . '/admin/konfigurasi');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function flashsale($action = null, $id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if ($action === 'delete') {
            if (is_numeric($id)) {
                $this->M_Base->data_delete('flashsale', $id);

                $this->session->setFlashdata('success', 'flashsale berhasil dihapus');
                return redirect()->to(base_url() . '/admin/konfigurasi');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getproduk()
    {
        $gameId = $this->request->getPost('gameId');
        $products = $this->M_Base->join_table_2('product', 'games', 'games_id', 'id', 'product.id as product_id, product.product, product.limitflashsale, product.flashsale_part', array('games_id' => $gameId));
        echo json_encode($products);
    }
}
