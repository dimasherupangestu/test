<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-0">Kelola Postingan</h5>
                        <div class="card-tools">
                            <a href="<?= base_url(); ?>admin/postingan/add" class="btn btn-primary btn-sm">Tambah Postigan</a>
                        </div>
                    </div>
                    <div class="table-responsive" style="font-size: 11px;">
                        <table class="table-white table table-striped">
                            <tr>
                                <th width="10">No</th>
                                <th>Judul</th>
                                <th>Game</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($post as $loop): ?>
                                <tr>
                                    <td align="center"><?= $no++; ?></td>
                                    <td>
                                        <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" alt="" width="80" class="rounded mr-20">
                                        <?= $loop['title']; ?>
                                    </td>
                                    <td><?= $loop['game']; ?></td>
                                    <td><?= $loop['category']; ?></td>
                                    <td><?= $loop['date_create']; ?></td>
                                    <td nowrap>
                                        <a class="btn btn-success btn-sm" href="<?= base_url(); ?>admin/postingan/edit/<?= $loop['id']; ?>">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="hapus('<?= base_url(); ?>admin/postingan/delete/<?= $loop['id']; ?>');">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?php if (count($post) == 0): ?>
                                <tr>
                                    <td align="center" colspan="5">Tidak ada postingan</td>
                                </tr>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
    <?php if (session()->getFlashdata('success')): ?>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('success'); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    <?php elseif (session()->getFlashdata('error')): ?>
        Swal.fire({
            title: 'Gagal!',
            text: '<?= session()->getFlashdata('error'); ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>

    function hapus(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }


    function hapus(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
<?php $this->endSection(); ?>