<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Edit Flash Sale</h5>

                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-white">Judul Flash Sale</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="title" value="<?= old('title', $post['title']) ?>">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-white">Background</label>
                                        <div class="col-md-8">
                                            <img src="<?= base_url(); ?>/assets/images/flashsale/<?= $post['image'] ?>"
                                                alt="" width="140" class="mb-3 rounded">
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
                                                <?php foreach ($games as $game) : ?>
                                                    <option value="<?= $game['id']; ?>" <?= $game['id'] == $post['games_id'] ? 'selected' : ''; ?>>
                                                        <?= $game['games']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Produk</label>
                                        <div class="col-md-8">
                                            <select name="product_id" class="form-control">
                                                <option value="">Pilih Produk</option>
                                                <?php foreach ($product as $pro) : ?>
                                                    <option value="<?= $pro['id']; ?>" <?= $pro['id'] == $post['product_id'] ? 'selected' : ''; ?>>
                                                        <?= $pro['product']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-white">Flashsale Ribbon</label>
                                        <div class="col-md-8">
                                            <select name="flashsale_part" class="form-control">
                                                <option value="">Pilih salah satu</option>
                                                <option value="Y" <?= isset($post['flashsale_part']) && $post['flashsale_part'] == 'Y' ? 'selected' : ''; ?>>On</option>
                                                <option value="N" <?= isset($post['flashsale_part']) && $post['flashsale_part'] == 'N' ? 'selected' : ''; ?>>Off</option>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
    CKEDITOR.replace('content');
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<?php $this->endSection(); ?>