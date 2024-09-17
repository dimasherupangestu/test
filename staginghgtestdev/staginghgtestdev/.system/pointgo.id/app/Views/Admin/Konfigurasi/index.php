<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <?= alert(); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Umum</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Nama Website</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $web['name']; ?>" name="name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Judul</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $web['title']; ?>" name="title" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Logo</label>
                                <div class="col-md-8">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-3 rounded" width="100">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <small>Ukuran 512 x 512px</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Keywords</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $web['keywords']; ?>" name="keywords" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Deskripsi</label>
                                <div class="col-md-8">
                                    <textarea name="descriptiona"><?= $web['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row" hidden>
                                <label class="col-md-4 col-form-label text-white">Komisi Referal</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="<?= $komisi_ref; ?>" name="komisi_ref" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="umum">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Settingan Markup Harga (Bot Auto Update) Vocagame</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Markup Harga Jual Publik (Dalam
                                    Persentase)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $margin_voca['publik_voca']; ?>"
                                        name="margin_voca_publik" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Markup Harga Jual Silver (Dalam
                                    Persentase)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $margin_voca['silver_voca']; ?>"
                                        name="margin_voca_silver" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Markup Harga Jual Gold (Dalam
                                    Persentase)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $margin_voca['gold_voca']; ?>"
                                        name="margin_voca_gold" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Markup Harga Jual Platinum (Dalam
                                    Persentase)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $margin_voca['platinum_voca']; ?>"
                                        name="margin_voca_platinum" autocomplete="off">
                                </div>
                            </div>


                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol"
                                    value="margin_voca">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Pop Up</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Judul Pop Up</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $popup['title']; ?>" name="popup_title" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Deskripsi Popup</label>
                                <div class="col-md-8">
                                    <textarea name="popup_desc"><?= $popup['desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Gambar Popup</label>
                                <div class="col-md-8">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $popup['image']; ?>" alt="" class="mb-3 rounded" width="100">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="popup_image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <small>Ukuran 1000 x 1000px</small>
                                </div>
                            </div>
                            <div class="text-right mb-3">
                                <button class="btn btn-danger" type="submit" name="tombol" value="delete_img_popup">Hapus Gambar PopUp</button>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Status Popup</label>
                                <div class="col-md-8">
                                    <select name="popup_status" class="form-control">
                                        <option value="On" <?= $popup['status'] == 'On' ? 'selected' : ''; ?>>On</option>
                                        <option value="Off" <?= $popup['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="popup">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Video</h5>
                        <p>Input ID Videonya saja, Contoh Link https://www.youtube.com/watch?v=JXHhr9VQoOs, ID Videonya adalah <b>JXHhr9VQoOs</b></code></p>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Video</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $video; ?>" name="video" autocomplete="off">
                                </div>
                            </div>

                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="video">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Pop Up</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Judul Pop Up</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $popup['popuptitle']; ?>" name="popuptitle" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Gambar Pop Up (Opsional)</label>
                                <div class="col-md-8">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $popup['gambarpopup']; ?>" alt="" class="mb-3 rounded" width="100">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="gambarpopup">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <small>Ukuran 512 x 512px</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Deskripsi Popup</label>
                                <div class="col-md-8">
                                    <textarea name="popupdescription"><?= $popup['popupdescription']; ?></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="popup">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Banner</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Tambah Banner</label>
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile-banner"
                                            name="image">
                                        <label class="custom-file-label" for="customFile-banner">Choose file</label>
                                    </div>
                                    <small>Ukuran 1280 × 586px</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">URL Banner</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="#" name="url" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol"
                                    value="banner">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-white m-0">
                        <tr>
                            <th>No</th>
                            <th>Banner</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        <?php $no = 1; foreach ($banner as $loop): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt=""
                                    width="120">
                            </td>
                            <td><?= $loop['url']; ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    onclick="hapus('<?= base_url(); ?>/admin/konfigurasi/banner/delete/<?= $loop['id']; ?>');">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        <?php if (count($banner) == 0): ?>
                        <tr>
                            <td colspan="3" align="center">Tidak ada banner</td>
                        </tr>
                        <?php endif ?>
                    </table>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Waktu Expired Flash Sale</h5>
                        <form action="" method="POST">
                            <p> Masukkdan dalam format: 'YYYY-MM-DD HH:mm:ss'</p>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $expired; ?>" name="expired" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="expired">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Flash Sale</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">

                                <label class="col-md-4 col-form-label text-white">Judul Flash Sale</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Background</label>
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile-banner" name="image">
                                        <label class="custom-file-label" for="customFile-banner">Choose file</label>
                                    </div>
                                    <small>Ukuran 1280 × 586px</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 text-white">Games</label>
                                <div class="col-md-8">
                                    <select name="games_id" class="form-control" onchange="fetchProducts(this.value)">
                                        <option value="">Pilih salah satu</option>
                                        <?php foreach ($games as $loop): ?>
                                        <option value="<?= $loop['id']; ?>"><?= $loop['games']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 text-white">Produk</label>
                                <div class="col-md-8">
                                    <select name="product_id" class="form-control">
                                        <option value="">Pilih Produk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Flashsale Ribbon</label>
                                <div class="col-md-8">
                                    <select name="flashsale_part" class="form-control">
                                        <option value="">Pilih salah satu</option>
                                        <option value="Y">On</option>
                                        <option value="N">Off</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Jumlah Limit Flashsale</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="limitflashsale" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="flashsale">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-white m-0">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Background</th>
                            <th>Produk</th>
                            <th>Flashsale Ribbon</th>
                            <th>Harga Promo</th>
                            <th>Harga Coret</th>
                            <th>Limit</th>
                            <th>Action</th>
                        </tr>
                        <?php $no = 1; 
                        foreach ($joinflashsale as $loop): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $loop['title']; ?></td>
                            <td>
                                <img src="<?= base_url(); ?>/assets/images/flashsale/<?= $loop['image']; ?>" alt="" width="120">
                            </td>
                            <td><?= $loop['product']; ?></td>
                            <td><?= $loop['flashsale_part']; ?></td>
                            <td>Rp <?= number_format($loop['price'],0,',','.'); ?></td>
                            <td>Rp <?= number_format($loop['discount_price'],0,',','.'); ?></td>
                            <td><?= $loop['limitflashsale']; ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="hapus('<?= base_url(); ?>/admin/konfigurasi/flashsale/delete/<?= $loop['id']; ?>');">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </table>
                </div>

                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Digiflazz</h5>
                        <form action="" method="POST">
                            <p>Silahkan arahkan Callback URL/IPN ke <code><?= base_url(); ?>/sistem/status</code></p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Username</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $digi['user']; ?>" name="user" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $digi['key']; ?>" name="key" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="digi">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="card" >
                    <div class="card-body">
                        <h5 class="mb-3">Vocagame</h5>
                        <form action="" method="POST">
                            <p>Silahkan arahkan Callback URL/IPN ke <code><?= base_url(); ?>/sistem/statusvoca</code>
                            </p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Merchant ID</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $voca['merchant']; ?>"
                                        name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Secret Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $voca['secret']; ?>"
                                        name="secret" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Callback Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $voca['callback']; ?>"
                                        name="callback" autocomplete="off">
                                </div>
                            </div>

                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="voca">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" >
                    <div class="card-body">
                        <h5 class="mb-3">Api Games</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Merchant ID</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $ag['merchant']; ?>" name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Secret Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $ag['secret']; ?>" name="secret" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="ag">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Bang Jeff</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $bangjeff['api']; ?>" name="api" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="bangjeff">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" >
                    <div class="card-body">
                        <h5 class="mb-3">Lapakgaming</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $lapakgaming['api']; ?>" name="api" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="lapakgaming">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">VIP Reseller</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api ID</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $vr['id']; ?>" name="id" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $vr['key']; ?>" name="key" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="vr">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Bigmedia</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">User ID</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $bm['id']; ?>" name="id" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $bm['key']; ?>" name="key" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="bm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Tokovoucher</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Member Code</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tv['merchant']; ?>" name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Secret Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tv['secret']; ?>" name="secret" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Signature</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tv['signature']; ?>" name="signature" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="tv">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Tokopay</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Merchant</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tokopay['merchant']; ?>" name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Secret Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tokopay['secret']; ?>" name="secret" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="tokopay">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" >
					<div class="card-body">
						<h5 class="mb-3">Linkqu</h5>
						<form action="" method="POST">
							<p>Silahkan arahkan Callback VA ke <code><?= base_url(); ?>/sistem/callback/linkiquuu</code></p>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-white">username linkqu</label>
								<div class="col-md-8">
									<input type="text" class="form-control" value="<?= $linkqu['username_linkqu']; ?>" name="username_linkqu" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-white">pin linkqu</label>
								<div class="col-md-8">
									<input type="text" class="form-control" value="<?= $linkqu['pin_linkqu']; ?>" name="pin_linkqu" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-white">id linkqu</label>
								<div class="col-md-8">
									<input type="text" class="form-control" value="<?= $linkqu['id_linkqu']; ?>" name="id_linkqu" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-white">secret linkqu</label>
								<div class="col-md-8">
									<input type="text" class="form-control" value="<?= $linkqu['secret_linkqu']; ?>" name="secret_linkqu" autocomplete="off">
								</div>
							</div>
							<div class="text-right">
								<button class="btn text-white" type="reset">Batal</button>
								<button class="btn btn-primary" type="submit" name="tombol" value="linkqu">Simpan</button>
							</div>
						</form>
					</div>
				</div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Tripay</h5>
                        <form action="" method="POST">
                            <p>Silahkan arahkan Callback ke <code><?= base_url(); ?>/sistem/callback/tripay</code></p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tripay['key']; ?>" name="key" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Private Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tripay['private']; ?>" name="private" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Kode Merchant</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $tripay['merchant']; ?>" name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="tripay">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Duitku</h5>
                        <form action="" method="POST">
                            <p>Silahkan arahkan Callback ke <code><?= base_url(); ?>/sistem/callback/duitku</code></p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $duitku['key']; ?>" name="key" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Kode Merchant</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $duitku['merchant']; ?>" name="merchant" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="duitku">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Xendit</h5>
                        <form action="" method="POST">
                            <p>Silahkan arahkan Callback ke <code><?= base_url(); ?>/sistem/callback/cbxendit/qriswallet</code></p>
                            <p>Silahkan arahkan Callback ke <code><?= base_url(); ?>/sistem/callback/cbxendit/varetail</code></p>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Secret Api Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $xendit['api']; ?>" name="api" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Callback Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $xendit['callback']; ?>" name="callback" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="xendit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Whatsapp Fonnte</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Token</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $wa_token; ?>" name="wa_token" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="wa">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card" hidden>
                    <div class="card-body">
                        <h5 class="mb-3">Wapisender</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Api key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $wapi['api']; ?>" name="api" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Device Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $wapi['device']; ?>" name="device" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="wapi">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                <div class="card" >
                    <div class="card-body">
                        <h5 class="mb-3">Linkwa Generator (Khusus Pesanan)</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">No Whatsapp</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $wagenerator['nowa']; ?>" name="nowa" id="nowaInput" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Pesan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="<?= $wagenerator['wapesan']; ?>" name="wapesan" autocomplete="off">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="wagenerator">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Sosial Media</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Whatsapp</label>
                                <div class="col-md-8">
                                    <input type="url" class="form-control" value="<?= $sm['wa']; ?>" name="wa" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Instagram</label>
                                <div class="col-md-8">
                                    <input type="url" class="form-control" value="<?= $sm['ig']; ?>" name="ig" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">YouTube</label>
                                <div class="col-md-8">
                                    <input type="url" class="form-control" value="<?= $sm['yt']; ?>" name="yt" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Facebook</label>
                                <div class="col-md-8">
                                    <input type="url" class="form-control" value="<?= $sm['fb']; ?>" name="fb" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-white">Tiktok</label>
                                <div class="col-md-8">
                                    <input type="url" class="form-control" value="<?= $sm['tw']; ?>" name="tw" autocomplete="off">
                                </div>
                            </div>

                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Syarat & Ketentuan</h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <textarea name="page_sk"><?= $page_sk; ?></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn text-white" type="reset">Batal</button>
                                <button class="btn btn-primary" type="submit" name="tombol" value="sk">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
$("#customFile").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings("label[for=customFile]").addClass("selected").html(fileName);
});

$("#customFile-banner").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings("label[for=customFile-banner]").addClass("selected").html(fileName);
});

CKEDITOR.replace('popup_desc');
CKEDITOR.replace('descriptiona');
CKEDITOR.replace('page_sk', {
    height: 500,
});
</script>
<script>
function fetchProducts(gameId) {
    $.ajax({
        url: "<?php echo base_url('admin/konfigurasi/getproduk'); ?>",
        type: "post",
        data: {
            gameId: gameId
        },
        dataType: "json",
        success: function(response) {
            var productSelect = document.getElementsByName("product_id")[0];
            productSelect.innerHTML = "<option value=''>Pilih Produk</option>";
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.value = response[i].product_id;
                option.text = response[i].product;
                productSelect.add(option);
            }
        }
    });
}
</script>
<script>
  // Ambil elemen input
  var nowaInput = document.getElementById('nowaInput');

  // Tambahkan event listener untuk mendeteksi perubahan nilai input
  nowaInput.addEventListener('input', function() {
    // Ambil nilai input
    var inputValue = nowaInput.value;

    // Periksa apakah nilai input dimulai dengan '08'
    if (inputValue.startsWith('08')) {
      // Jika ya, ubah nilai input menjadi '628' + sisa karakter setelah '08'
      nowaInput.value = '628' + inputValue.substring(2);
    }
  });
</script>
<?php $this->endSection(); ?>