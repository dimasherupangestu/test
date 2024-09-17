			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
                .section {
                    max-width: 370px;
					height: auto;
                    margin: auto;
                }

                .text-dark {
                    font-weight: 700;
                }

                .masuk {
                    color: var(--warna_5) !important;
                    background: transparent;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                }

                .masuk:hover {
                    color: #000 !important;
                    background: var(--warna_3) !important;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                }

                .normal {
                    text-transform: none;
                }

            </style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			    	<div class="row justify-content-center">
					    <div class="col-lg-9">
					    	<div class="pt-3 pb-4">
					            <h5 hidden>Login Reseller</h5>
					            <span class="strip-primary" hidden></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">

					                	<?= alert(); ?>

					                    <form role="form" action="" method="POST">
										<img class="pointgo" src="<?= base_url(); ?>/assets/images/logo-hidden.png">
										<h5 class="text-center pb-3">Login Reseller</h5>
					                        <div class="form-group mb-2">
					                            <p style="color:var(--warna_hitam)!important;font-weight: bold;">Username</p>
					                            <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required autocomplete="off">
					                        </div>
					                        <div class="form-group mb-3">
					                            <p style="color:var(--warna_hitam)!important;font-weight: bold;">Password</p>
					                            <input type="password" name="password" placeholder="Masukkan Password" class="form-control" required>
					                        </div>
					                        <div class="g-recaptcha mt-3 mb-3" data-sitekey="<?= $sitekey ?>" id="recaptcha"></div>
					                        <button type="submit" name="tombol" value="submit" class="btn btn-primary btn-block normal">Masuk Akun Reseller</button>
					                    </form>
					                    <p class="mt-3 text-center" ><a href="<?= base_url(); ?>/forgotpass" style="color: var(--warna_5);">Lupa password?</a></p>
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