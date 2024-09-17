<?= $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Tambah Games</h5>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Games</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="games">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Gambar</label>
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-image" name="image">
                                                <label class="custom-file-label" for="games-image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label class="col-form-label col-md-4 text-white">Gambar Info Petunjuk</label>
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-infoimage" name="infoimage">
                                                <label class="custom-file-label" for="games-infoimage">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kategori</label>
                                        <div class="col-md-8">
                                            <select name="category" class="form-control">
                                                <?php foreach ($category as $loop): ?>
                                                    <option value="<?= $loop['category']; ?>"><?= $loop['category']; ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Games Provider</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="code">
                                            <p>Kode Games Lapakgaming diisi sesuai code di link ini <a href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning" target="_blank">disini</a> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Provider Games</label>
                                        <div class="col-md-8">
                                            <select name="provider" class="form-control">
                                                <option value="default">General</option>
                                                <option value="AG">Api Games</option>
                                                <option value="LG">Lapakgaming</option>
                                                <option value="VG">Vocagame</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Urutan</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" autocomplete="off" name="sort">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Deskripsi</label>
                                        <div class="col-md-8">
                                            <textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Sistem Target</label>
                                        <div class="col-md-8">
                                            <select name="target" class="form-control">
                                                <option value="default">Default</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Validasi Player</label>
                                        <div class="col-md-8">
                                            <select name="check_status" class="form-control">
                                                <option value="N">Tidak</option>
                                                <option value="Y">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Validasi</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="check_code">
                                            <small>Kosongkan jika tidak menggunakan sistem validasi player</small><br>
                                            <small>Kode validasi bisa di cek <a href="https://hanz-digital.gitbook.io/admin-web-top-up-game/panduan-admin/kode-validasi-cek-id-game" class="text-warning" target="_blank">disini</a></small>

                                        </div>
                                    </div>

                                    <h5 class="mb-3">---Custom Sistem Target---</h5>
                                    <p>Hanya aktif untuk Sistem Target "Custom Sistem Target"</p>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Jumlah Kolom</label>
                                        <div class="col-md-8">
                                            <select name="st_col" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Judul Sistem Target</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="st_title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Deskripsi Sistem Target</label>
                                        <div class="col-md-8">
                                            <textarea name="st_desc" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Placeholder Input 1 (User ID) </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="st1_text" value="">
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <label class="col-form-label col-md-4 text-white">Tipe Data Input 1</label>
                                        <div class="col-md-8">
                                            <select name="st1_type" class="form-control">
                                                <option value="text">Text</option>
                                                <option value="number">Number</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Placeholder Input 2 (Server ID) </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="st2_text" value="">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Tipe Data Input 2</label>
                                        <div class="col-md-8">
                                            <select name="st2_type" class="form-control">
                                                <option value="text">Text</option>
                                                <option value="number">Number</option>
                                                <option value="dropdown">Dropdown List Server</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Data List Server (Jika Tipe Data Dropdown List Server)</label>
                                        <div class="col-md-8">
                                            <textarea name="st2_data" id="" cols="30" rows="25" class="form-control"></textarea>
                                            <br>
                                            <p>Masukkan dalam format : value1///name1,value2///name2,value3///name3,value4///name4</p>
                                            <p>Contoh : America///America,Asia///Asia,Europe///Europe,TW_HK_MO///TW_HK_MO</p>
                                            <p>Note : Value dan Name terkadang bisa berbeda untuk Games/Provider tertentu, harap check dan ikuti detail penamaan server di Web Provider dengan klik Kanan Inspect pada bagian dropdown list server</p>
                                            <p>Data Server Lapakgaming dapat dicopy sesuai link ini <a href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning" target="_blank">disini</a> </p>
                                        </div>


                                    </div>

                                    <a href="<?= base_url(); ?>/admin/games" class="btn btn-warning float-left">Kembali</a>
                                    <div class="text-right">
                                        <button class="btn text-white" type="reset">Batal</button>
                                        <button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('st_desc');
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<?php $this->endSection(); ?>