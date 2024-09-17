			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			    	<div class="row justify-content-center">
					    <div class="col-lg-9">
					    	<div class="pt-3 pb-4">
					            <h5>Lupa Password</h5>
					            <span class="strip-primary"></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">

					                	<?= alert(); ?>
                                        <p class="text-white"><b>Halo <?= $users['username'] ?>, Silakan tulis Password Baru anda</p>
					                   <form role="form" action="" method="POST">
                                            <div class="form-group mt-2 mb-2">
                                                <p class="text-white">Password Baru anda</p>
                                                <input type="text" name="passwordb" class="form-control" required autocomplete="off">
                                            </div>
                                            <div class="form-group mt-2 mb-2">
                                                <p class="text-white">Konfirmasi Password Baru</p>
                                                <input type="text" name="passwordbb" class="form-control" required autocomplete="off">
                                            </div>
                                            <button type="submit" name="btn_password" value="submit" class="btn btn-primary">Reset Password</button>
                                        </form>


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