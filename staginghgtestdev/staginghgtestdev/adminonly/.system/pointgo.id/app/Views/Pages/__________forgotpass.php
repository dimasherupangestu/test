			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
                .section {
                    max-width: 370px;
					height: auto;
                    margin: auto;
                }

                .text-white {
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
					            <h5 hidden>Lupa Password</h5>
					            <span class="strip-primary" hidden></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">

					                	<?= alert(); ?>

					                   <form role="form" action="" method="POST">
									   <img class="pointgo" src="<?= base_url(); ?>/assets/images/pointgo.svg">
                                       	<h5 class="text-center pb-3">Lupa Password</h5>
                                            <div class="form-group mb-2">
                                                <p class="text-white"><b>Masukkan Username anda</p>
                                                <input type="text" name="username" placeholder="Masukkan Username anda" class="form-control mb-3" required autocomplete="off">
                                            </div>
                                            <button type="submit" name="forgotpass" value="submit" class="btn btn-primary btn-block normal">Reset Password</button>
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