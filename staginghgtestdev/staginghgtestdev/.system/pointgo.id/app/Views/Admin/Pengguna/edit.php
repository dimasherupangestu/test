<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>
<style>
.form-control:disabled,
.form-control[readonly] {
    background-color: rgba(158, 158, 158, 0.33);
    opacity: 1;
    border: none;
    color: #b7b7b7 !important;
}
</style>
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
                                <h5 class="mb-3">Edit Pengguna</h5>
                                <?= alert(); ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Username</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" value="<?= $account['username']; ?>">
                                            <small>Username tidak dapat diganti</small>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Nama Lengkap</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="fullname"  value="<?= $account['fullname']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="tipe-manual">
                                        <label class="col-form-label col-md-4 text-white">Saldo</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" autocomplete="off" name="balance" value="<?= $account['balance']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="tipe-manual">
                                        <label class="col-form-label col-md-4 text-white">Whatsapp</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" autocomplete="off" name="wa" value="<?= $account['wa']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Level</label>
                                        <div class="col-md-8">
                                            <select name="level" class="form-control">
                                                <option value="Member" <?= $account['level'] == 'Member' ? 'selected' : ''; ?>>Member Biasa</option>
                                                <option value="Silver" <?= $account['level'] == 'Silver' ? 'selected' : ''; ?>>Reseller Silver</option>
                                                <option value="Gold" <?= $account['level'] == 'Gold' ? 'selected' : ''; ?>>Reseller Gold</option>
                                                <option value="Platinum" <?= $account['level'] == 'Platinum' ? 'selected' : ''; ?>>Reseller Platinum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Status</label>
                                        <div class="col-md-8">
                                            <select name="status" class="form-control">
                                                <option value="On" <?= $account['status'] == 'On' ? 'selected' : ''; ?>>On</option>
                                                <option value="Off" <?= $account['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label class="col-form-label col-md-4 text-white">API Key</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="<?= $account['api_key']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Password</label>
                                        <div class="col-md-8">
                                            <button class="btn btn-success" type="button" id="btn-reset">Reset Password</button>
                                        </div>
                                    </div>
                                    <a href="<?= base_url(); ?>/admin/pengguna" class="btn btn-warning float-left">Kembali</a>
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
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
$("#btn-reset").on('click', function() {
    Swal.fire({
        title: 'Reset password?',
        text: "Password pengguna akan direset",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Reset password'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= base_url(); ?>/admin/pengguna/reset/<?= $account['id']; ?>';
        }
    });
});
</script>
<?php $this->endSection(); ?>