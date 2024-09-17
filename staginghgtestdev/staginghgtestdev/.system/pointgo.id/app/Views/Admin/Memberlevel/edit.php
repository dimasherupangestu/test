<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<style>
				.form-control:disabled, .form-control[readonly] {
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
								
								<?= $this->include('header-admin') ?>

								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="card">
											<div class="card-body">
												<h5 class="mb-3">Edit Membership Level</h5>
												<?= alert() ?>
												<form action="" method="POST" enctype="multipart/form-data">
												    <div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Alias</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="alias" value="<?= $member_level['alias'] ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Harga</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="price" value="<?= $member_level['price'] ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Gambar</label>
														<div class="col-md-8">
															<img src="<?= base_url() ?>/assets/images/<?= $member_level['image'] ?>" alt="" width="140" class="mb-3 rounded">
															<div class="custom-file">
															    <input type="file" class="custom-file-input" id="games-image" name="image">
															    <label class="custom-file-label" for="games-image">Choose file</label>
															</div>
														</div>
													</div>
													<a href="<?= base_url() ?>/admin/memberlevel" class="btn btn-warning float-left">Kembali</a>
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
