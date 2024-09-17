<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Membership extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }
        
        if ($this->admin['level'] == 'Product Development') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }
        
        if ($this->admin['level'] == 'Admin') {
            $this->session->setFlashdata('error', 'Anda tidak memiliki akses untuk melihat halaman ini.');
            return redirect()->to(base_url() . '/hello');
        }


    	$data = array_merge($this->base_data, [
    		'title' => 'Membership',
            'membership' => $this->M_Base->all_data('membership'),
    	]);

        return view('Admin/Membership/index', $data);
    }

    public function edit($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $membership = $this->M_Base->data_where('membership', 'id', $id);

            if (count($membership) === 1) {

                if ($this->request->getPost('tombol')) {
                    $this->M_Base->data_update('membership', [
                        'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                        'amount' => addslashes(trim(htmlspecialchars($this->request->getPost('amount')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                    ], $id);

                    $this->session->setFlashdata('success', 'Data Member berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Membership',
                    'membership' => $membership[0],
                ]);

                return view('Admin/Membership/edit', $data);
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
            $membership = $this->M_Base->data_where('member_level', 'id', $id);

            if (count($membership) === 1) {
                $this->M_Base->data_delete('member_level', $id);

                $this->session->setFlashdata('success', 'Data Member berhasil dihapus');
                return redirect()->to(base_url() . '/admin/membership');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function detail($topup_id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $membership = $this->M_Base->data_where('member_level', 'topup_id', $topup_id);

            if (count($membership) === 1) {

                echo '
                <table class="table table-white table-striped">
                    <tr>
                        <th>Topup ID</th>
                        <td>'.$membership[0]['topup_id'].'</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>'.$membership[0]['username'].'</td>
                    </tr>
                    <tr>
                        <th>Metode</th>
                        <td>'.$membership[0]['method'].'</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp '.number_format($membership[0]['amount'],0,',','.').'</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>'.$membership[0]['status'].'</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>'.$membership[0]['date_create'].'</td>
                    </tr>
                </table>
                ';
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function accept($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $membership = $this->M_Base->data_where('member_level', 'id', $id);

            if (count($membership) === 1) {

                if ($membership[0]['status'] === 'Pending') {

                    $users = $this->M_Base->data_where('users', 'username', $membership[0]['username']);

                    if (count($users) === 1) {
                        $this->M_Base->data_update('member_level', [
                            'status' => 'Success',
                        ], $membership[0]['id']);

                        $this->M_Base->data_update('users', [
                            'balance' => $users[0]['balance'] + $membership[0]['amount'],
                        ], $users[0]['id']);

                        $this->session->setFlashdata('success', 'Topup berhasil diterima');
                        return redirect()->to(base_url() . '/admin/membership');
                    } else {
                        $this->session->setFlashdata('error', 'Username penerima tidak ditemukan');
                        return redirect()->to(base_url() . '/admin/membership/edit/' . $id);
                    }
                } else {
                    $this->session->setFlashdata('error', 'Data topup sudah berstatus ' . $membership[0]['status']);
                    return redirect()->to(base_url() . '/admin/membership/edit/' . $id);
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}