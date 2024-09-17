			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
				.sec-rnt {
					background: var(--warna);
				}

				.section {
					max-width: 1400px;
					height: auto;
					margin: auto;
				}
				body {
                    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
                    font-family: 'Poppins', sans-serif;
                }

			</style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="bg-leaf">
                <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
                <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
            </div>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5" style="min-height: 500px;">
			    <div class="container">
			        <div class="row justify-content-center">
			            <div class="pb-5 pb-5-rnt">
			                <div class="pt-3 pb-4">
			                    <h5 hidden>Syarat & Ketentuan</h5>
			                    <span class="strip-primary" hidden></span>
			                </div>
			                <div class="pb-3">
			                    <div class="section">
								<img class="pointgo" src="<?= base_url(); ?>/assets/images/logo-hidden.png">
			                        <div class="card-body content" style="color:#333333 !important">
										<img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="164px" class="pb-4">
										<div class="sk-text" style="color:#333333 !important">
										    <?= $page_sk; ?>
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