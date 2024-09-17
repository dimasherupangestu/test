			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
				.section {
					position: relative;
					max-width: 550px;
					height: auto;
					margin: auto;
				}

				.pointgo {
					position: absolute;
					top: -10px;
					left: -10px;
					width: 45px;
					height: 45px;
					background: var(--warna_3);
					border-radius: 13px 0px 13px 0px;
				}

				.normal {
                    text-transform: none;
                }

                body {
                    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
                    background-size: contain;
                    /*background-repeat: no-repeat;*/
                }
                
                .card-body-2 {
                    background: var(--warna_3);
                    border-radius: 11px 11px 0 0 ;
                    padding-left: 1rem;
                    padding-top: 1rem;
                }

			</style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="bg-leaf">
			        <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
			        <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
			        <!--<img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-bottom-left">-->
			        <!--<img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-bottom-right">-->
			    </div>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-9" >
							<div class="pt-3 pb-4">
								<span class="strip-primary" hidden></span>
							</div>
							<div class="section" >
							<div class="card-body-2">
                                <div class="cek-pesanan">
                                    <h5 class="text-left pb-3 text-white">Cek Status Pesanan</h5>
                                </div>
                            </div>
								<div class="card-body">
                                    <form role="form" class="mb-3 mt-2" action="" method="POST">
                                        <!--<img class="pointgo" src="<?= base_url(); ?>/assets/images/logo-hidden.png">-->
                                        <p style="font-weight: bold;color:#000 !important;">ID Transaksi</p>
                                        <?= alert(); ?>
                                        <div class="form-group mb-3">
                                            <input type="text" name="order_id" placeholder="Masukkan ID Transaksi"
                                                class="form-control" required autocomplete="off">
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary normal" style="color:#fff !important">Cek Pesanan</button>
                                        </div>
                                    </form>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
			<?php $this->endSection(); ?>