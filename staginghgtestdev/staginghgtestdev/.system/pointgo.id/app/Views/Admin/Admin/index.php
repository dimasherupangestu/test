				<?php $this->extend('templateadmin'); ?>

				<?php $this->section('css'); ?>
				<style>
.card {
    background-color: #ffffff !important;
}

.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-weight: 600;
    color: #000 !important;
}

p {
    color: #000 !important;
}

.text-white {
    color: #000 !important;
}

body {
    color: #000000 !important;
}

.table-white tr th,
.table-white tr td {
    color: #000 !important;
    border-color: #242f3a;
}
				</style>
				<?php $this->endSection(); ?>

				<?php $this->section('content'); ?>
				<div class="content" style="min-height: 580px;">
				    <div class="container">
				        <div class="row">
				            <div class="col-md-12">

				                <?= $this->include('header-admin'); ?>

				                <div class="card">
				                    <div class="card-body">
				                        <h5 class="mb-3">Admin</h5>
				                        <a href="<?= base_url(); ?>/admin/admin/add" class="btn btn-primary">Tambah Akun</a>
				                        <?= alert(); ?>
				                    </div>
				                    <div class="table-responsive">
				                        <table class="table-white table table-striped">
				                            <tr>
				                                <th width="10">No</th>
				                                <th>Username</th>
				                                <th>Status</th>
				                                <th>Level</th>
				                                <th>Terdaftar</th>
				                                <th>Action</th>
				                            </tr>
				                            <?php $no = 1;
											foreach ($account as $loop): ?>
				                            <tr>
				                                <td><?= $no++; ?></td>
				                                <td><?= $loop['username']; ?></td>
				                                <td><?= $loop['status']; ?></td>
				                                <td><?= $loop['level']; ?></td>
				                                <td><?= $loop['date_create']; ?></td>
				                                <td width="10">
				                                    <a href="<?= base_url(); ?>/admin/admin/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
				                                    <button type="button" onclick="hapus('<?= base_url(); ?>/admin/admin/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
				                                </td>
				                            </tr>
				                            <?php endforeach ?>
				                        </table>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<?php $this->endSection(); ?>

				<?php $this->section('js'); ?>
				<?php $this->endSection(); ?>