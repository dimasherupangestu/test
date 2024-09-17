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
				<div class="content">
				    <div class="container">
				        <div class="row">
				            <div class="col-md-12">

				                <?= $this->include('header-admin'); ?>

				                <div class="row justify-content-center">
				                    <div class="col-md-10">
				                        <div class="card">
				                            <div class="card-body">
				                                <h5 class="mb-3">Tambah Admin</h5>
				                                <?= alert(); ?>
				                                <form action="" method="POST">
				                                    <div class="form-group row">
				                                        <label class="col-form-label col-md-4 text-white">Username</label>
				                                        <div class="col-md-8">
				                                            <input type="text" class="form-control" autocomplete="off" name="username">
				                                        </div>
				                                    </div>
				                                    <div class="form-group row">
				                                        <label class="col-form-label col-md-4 text-white">Password</label>
				                                        <div class="col-md-8">
				                                            <input type="text" class="form-control" autocomplete="off" name="password">
				                                        </div>
				                                    </div>
				                                    <div class="form-group row">
				                                        <label class="col-form-label col-md-4 text-white">Level</label>
				                                        <div class="col-md-8">
				                                            <select name="level" class="form-control">
				                                                <option value="Customer Service">Customer Service</option>
				                                                <option value="Admin">Admin</option>
				                                                <option value="Superadmin">Superadmin</option>
				                                                <option value="Product Development">Product Development</option>
				                                            </select>
				                                        </div>
				                                    </div>
				                                    <a href="<?= base_url(); ?>/admin/admin" class="btn btn-warning float-left">Kembali</a>
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
				<?php $this->endSection(); ?>