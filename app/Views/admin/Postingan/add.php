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
                                <h5 class="mb-3">Tambah Postingan</h5>


                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-10">
                                        <label class="col-form-label col-md-4 text-dark">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <label class="col-form-label col-md-4 text-dark">Judul Post</label>
                                        <input type="text" class="form-control" autocomplete="off" name="title">
                                    </div>
                                    <div class="mb-10">
                                        <label class="col-form-label col-md-4 text-dark">Nama Game</label>
                                        <input type="text" class="form-control" autocomplete="off" name="game">
                                    </div>
                                    <div class="mb-10">
                                        <label class="col-form-label col-md-4 text-dark">Kategori</label>
                                        <?php
                                        $categories = ['Popular', 'Upcoming Event', 'Standard', 'Promo'];
                                        foreach ($categories as $category): ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category; ?>">
                                                <label class="form-check-label"><?= $category; ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="mb-20">
                                        <label col-form-label col-md-4 text-white>Konten</label>
                                        <textarea name="content"></textarea>
                                    </div>
                                    <button class="btn btn-primary mt-3 py-3 w-100" type="submit" name="tombol" value="submit">Simpan</button>
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

    <?php if (session()->getFlashdata('error')): ?>
        Swal.fire({
            title: 'Gagal!',
            text: '<?= session()->getFlashdata('error'); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>
<?php $this->endSection(); ?>