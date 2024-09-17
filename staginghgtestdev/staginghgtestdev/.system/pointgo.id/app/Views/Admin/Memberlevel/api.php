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
								
								<?= $this->include('header-admin'); ?>

								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="card">
											<div class="card-body">
												<h5 class="mb-3">Edit API Pengguna</h5>
												<?= alert(); ?>
												<form action="" method="POST" enctype="multipart/form-data">
													
													<div class="form-group row">
                                                        <label class="col-form-label col-md-4 text-white">API Key</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="api_key" value="<?= $account['api_key'] ?>" readonly>
                                                            <small>API Key akan digenerate secara otomatis jika masih kosong</small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Whitelist IP</label>
														<div class="col-md-8">
															<input type="text" class="form-control" name="ip_white" autocomplete="off" value="<?= $account['ip_white']; ?>">
															<small>Jika IP lebih dari 1, pisahkan dengan koma. Contoh: 192.168.1.1,192.168.1.2</small>
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