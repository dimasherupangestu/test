				<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content" style="min-height: 580px;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin') ?>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Membership Level</h5>
										<a href="<?= base_url() ?>/admin/memberlevel/add" class="btn btn-primary" hidden>Tambah Akun</a>
										<?= alert() ?>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Level</th>
												<th>Alias</th>
												<th>Image</th>
												<th>Harga</th>
												<th>Action</th>
											</tr>
											<?php
                                               $no = 1;
                                               foreach ($account as $loop): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $loop['level'] ?></td>
												<td><?= $loop['alias'] ?></td>
												<td><img src="<?= base_url() ?>/assets/images/<?= $loop['image'] ?>" alt="" width="40" class="mr-1 rounded"></td>
												<td><?= $loop['price'] ?></td>
												<td width="10">
													<a href="<?= base_url() ?>/admin/memberlevel/edit/<?= $loop['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url() ?>/admin/memberlevel/delete/<?= $loop['id'] ?>');" class="btn btn-danger btn-sm" hidden>Hapus</button>
												</td>
											</tr>
											<?php endforeach;
           ?>
											<?php if (count($account) == 0): ?>
											<tr>
												<td colspan="6" align="center">Tidak ada Membership Level</td>
											</tr>
											<?php endif; ?>
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
