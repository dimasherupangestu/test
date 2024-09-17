<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
button.accordion-button {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
    background-color: #ffffff !important;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.text-end {
    text-align: right !important;
}

.icon-diamondx {
    height: 2.5rem;
    float: right;
}

.pembayaran {
    border-radius: 12px;
    border: 1px solid rgba(189, 252, 80, 0.10);
    background: rgba(189, 252, 80, 0.10);
    color: var(--warna_5) !important;
    text-align: end;
    font-weight: 300;
    font-size: 14px;
    padding: 10px;
    text-align: center;
}

.pembayaran.pending {
    border-radius: 12px;
    border: 1px solid rgba(189, 252, 80, 0.10);
    background: rgb(255 255 255 / 83%);
    color: #7fb85a !important;
    font-weight: 600;
    font-size: 14px;
    padding: 10px;
    text-align: center;
}

.accordion {
    --bs-accordion-color: #6c757d;
    --bs-accordion-bg: #fff;
    --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
    --bs-accordion-border-color: var(--bs-border-color);
    --bs-accordion-border-width: 1px;
    --bs-accordion-border-radius: 0.375rem;
    --bs-accordion-inner-border-radius: calc(0.375rem - 1px);
    --bs-accordion-btn-padding-x: 1.25rem;
    --bs-accordion-btn-padding-y: 1rem;
    --bs-accordion-btn-color: var(--bs-body-color);
    --bs-accordion-btn-bg: var(--bs-accordion-bg);
    --bs-accordion-btn-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='var%28--bs-body-color%29'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-icon-width: 1.25rem;
    --bs-accordion-btn-icon-transform: rotate(-180deg);
    --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
    --bs-accordion-btn-active-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-focus-border-color: #86b7fe;
    --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    --bs-accordion-body-padding-x: 1.25rem;
    --bs-accordion-body-padding-y: 1rem;
    --bs-accordion-active-color: #0c63e4;
    --bs-accordion-active-bg: #e7f1ff;
}

.accordion-button::after {
    flex-shrink: 0;
    width: var(--bs-accordion-btn-icon-width);
    height: var(--bs-accordion-btn-icon-width);
    margin-left: auto;
    content: "";
    background-image: var(--bs-accordion-btn-icon);
    background-repeat: no-repeat;
    background-size: var(--bs-accordion-btn-icon-width);
    transition: var(--bs-accordion-btn-icon-transition);
}

.accordion-body {
    padding: var(--bs-accordion-body-padding-y) var(--bs-accordion-body-padding-x);
    background: #fefefe;
}

.accordion-button {
    box-shadow: none !important;
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
    font-size: 1rem;
    color: var(--bs-accordion-btn-color);
    text-align: left;
    background-color: var(--bs-accordion-btn-bg);
    border: 0;
    border-radius: 0;
    overflow-anchor: none;
    transition: var(--bs-accordion-transition);
}

.accordion-button.collapsed::after {
    background: url(/assets/images/downward-arrow.png) top/cover;
}

.accordion-button:not(.collapsed)::after {
    background: url(/assets/images/downward-arrow.png) top/cover;
}

.red.accordion-button.collapsed::after {
    background: url(/assets/images/downward-arrow-red.png) top/cover;
}

.red.accordion-button:not(.collapsed)::after {
    background: url(/assets/images/downward-arrow-red.png) top/cover;
}

.boks {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 6px;
}

.col-sm-4,
.col-6 {
    padding-right: 8px;
    padding-left: 8px;
}

@media (max-width: 480px) {
    .search-desktop {
        display: none;
    }
}

.section {
    position: relative;
    max-width: 550px;
    height: auto;
    margin: auto;
    background: var(--warna_3) !important;
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

.text-white {
    font-weight: 700;
}

.background-timer-card {
    border-radius: 12px 12px 0px 0px;
    background:  var(--warna_3) !important;
    max-width: 550px;
    height: auto;
    padding: 7px 20px 7px 20px;
}

#timer

.background-payment {
    background: var(--warna_2);
    border: 1px solid var(--warna_2);
    border-radius: 6px;
    padding: 15px;
    filter: contrast(0.9);
}

.qris {
    border-radius: 12px;
    border: 2px solid #FFF;
    background: #FFF;
}

.text-sukses {
    color: #FFF;
    font-size: 13px;
    font-style: normal;
    font-weight: 400;
}

.card-body-purple {
    background: #93c254;
    border-radius: 11px;
    position: relative;
    margin-top: -90px;
    padding: 16px;
}

.bottom-card {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 0px 0px 10px 10px;
    background: #333333;
    padding: 10px;
}

b {
    color: #fff !important;
}
.text-secondary-pointgo {
    color: var(--warna_4) !important;
}

p {
    color: #fff !important;
}
			</style>
			<?php $this->endSection(); ?>

			<?php $this->section('content'); ?>
			<?php
    			if ($topup['payment_gateway'] == 'Tripay') {
    				if (in_array($topup['method_code'], array('QRIS', 'QRISC'))) {
    					$fee = 800;
    					$harga = ($topup['amount'] * 1.007) + $fee;
    				} else if (in_array($topup['method_code'], array('OVO', 'SHOPEEPAY'))) {
    					$fee = 0;
    					$harga = ($topup['amount'] * 1.03) + $fee;
    				} else if (in_array($topup['method_code'], array('BSIVA', 'BNIVA', 'PERMATAVA', 'MANDIRIVA', 'BRIVA'))) {
    					$fee = 4250;
    					$harga = $topup['amount'] + $fee;
    				} else if ($topup['payment_code'] == 'INDOMARET') {
    					$fee = 6500;
    					$harga = ($topup['amount'] * 1.03) + $fee;
    				} else if (in_array($topup['method_code'], array('ALFAMART', 'ALFAMIDI'))) {
    					$fee = 6000;
    					$harga = $topup['amount'] + $fee;
    				} else {
    					$harga = $topup['amount'];
    				}
    
    			} else if ($topup['payment_gateway'] == 'Tokopay') { 
                    if ( in_array($topup['method_code'], array('QRISREALTIME')) ) { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.017) + $fee ; 
                     } else if ( in_array($topup['method_code'], array('QRIS','QRISC')) ) { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.007) + $fee ; 
                     } else if ($topup['payment_code'] == 'SPAY') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.03) + $fee ; 
                     } else if ($topup['payment_code'] == 'DANA') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.02) + $fee ; 
                     } else if ($topup['payment_code'] == 'DANA_CUSTOM') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.03) + $fee ; 
                     } else if ($topup['payment_code'] == 'LINKAJA') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.025) + $fee ; 
                     } else if ($topup['payment_code'] == 'TELKOMSEL') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.26) + $fee ; 
                     } else if ( in_array($topup['method_code'], array('AXIS','XL')) ) { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.25) + $fee ; 
                     } else if ($topup['payment_code'] == 'TRI') { 
                         $fee = 0 ; 
                         $harga = ($topup['amount']*1.29) + $fee ; 
                     } else if ( in_array($topup['method_code'], array('BNIVA','CIMBVA','PERMATAVA','BRIVA','BNCVA','DANAMONVA','BSIVA')) ) { 
                         $fee = 3500 ; 
                         $harga = $topup['amount'] + $fee ; 
                     } else if ( in_array($topup['method_code'], array('ALFAMART','INDOMARET')) ) { 
                         $fee = 3000 ; 
                         $harga = $topup['amount'] + $fee ;  
                     } else if ( in_array($topup['method_code'], array('MANDIRIVA')) ) { 
                         $fee = 4000 ; 
                         $harga = $topup['amount'] + $fee ;  
                     }  else { 
                         $harga = $topup['amount'] ;  }
                    
                } else if ($topup['payment_gateway'] == 'Duitku') {
    				if (in_array($topup['method_code'], array('SP', 'NQ'))) {
    					$harga = ($topup['amount']);
    				} else if ($topup['payment_code'] == 'LQ') {
    					$harga = ($topup['amount']);
    				} else if (in_array($topup['method_code'], array('OV', 'DA', 'LA'))) {
    					$harga = ($topup['amount'] * 1.0167);
    				} else if ($topup['payment_code'] == 'SA') {
    					$harga = ($topup['amount'] * 1.04);
    				} else if ($topup['payment_code'] == 'BC') {
    					$fee = 5000;
    					$harga = $topup['amount'] + $fee;
    				} else if ($topup['payment_code'] == 'M2') {
    					$fee = 4000;
    					$harga = $topup['amount'] + $fee;
    				} else if (in_array($topup['method_code'], array('VA', 'I1', 'B1', 'BT', 'A1', 'BR'))) {
    					$fee = 3000;
    					$harga = $topup['amount'] + $fee;
    				} else if ($topup['payment_code'] == 'FT') {
    					$fee = 2500;
    					$harga = $topup['amount'] + $fee;
    				} else {
    					$harga = $topup['amount'];
    				}
    
    			} else if ($topup['payment_gateway'] == 'Xendit') {
    				$harga = $topup['amount'];
    			} else {
    				$harga = $topup['amount'];
    			}
    			
    		?>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5">
			    <div class="container-fluid pt-3">
			        <div class="row justify-content-center">
			            <div class="col-lg-9">
			                <?php if ($topup['status'] == 'Success'): ?>
			                <div class="section mb-2">
			                    <img class="pointgo2"
			                        src="<?= base_url(); ?>/assets/images/new-assets/BG-SUCCESS-7.png" width="100%"
			                        style="border-radius: 10px 10px 0px 0px;">
			                    <div class="card-body">
			                        <div class="card-body card-body-purple">
			                            <div class="row">
			                                <div class="col-lg-6 col-6">
			                                    <div class="mb-0 text-white">
			                                        <p class="text-white text-small-sm mb-1">Pembelian Anda</p>
			                                        <b class="mb-2 text-white">Rp<?= number_format($harga, 0, ',', '.'); ?><i
			                                                class="fa fa-clone pl-2 clip" onclick="copy_price()"
			                                                data-clipboard-text="<?= $harga; ?>"></i></b>
			                                    </div>
			                                </div>
			                                <div class="col-lg-6 col-6">
			                                    <div class="mb-0 text-white">
			                                        <p class="text-white text-small-sm mb-1">Metode Pembayaran</p>
			                                        <img src="<?= base_url(); ?>/assets/images/method/<?= $topup['images']; ?>" class="mb-2 rounded" width="35%">
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="row">
			                                <div class="col-lg-6 col-6">
			                                    <div class="mb-0 text-white">
			                                        <p class="text-white text-small-sm mb-1">Layanan</p>
			                                        <b class="mb-0 text-white">Topup Saldo HiddenPay</b>
			                                    </div>
			                                </div>
			                                <div class="col-lg-6 col-6">
			                                    <div class="mb-0">
			                                        <p class="text-white text-small-sm mb-1">Rincian Topup</p>
			                                        <b class="mb-0 text-white">Topup Saldo</b>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>

			                        <div class="py-5">
			                            <h5 class="pb-3 text-white">Rincian Pesanan</h5>
			                            <div class="row">
			                                <div class="col-lg-6 col-12">
			                                    <div class=" mb-2">
			                                        <p class="mb-0 text-white">Tanggal Pembayaran</p>
			                                        <b class="text-white"><?= $topup['date_create']; ?></b>
			                                    </div>
			                                </div>
			                                <div class="col-lg-6 col-12">
			                                    <div class="mb-2">
			                                        <p class="mb-0 text-white">Status Transaksi</p>
			                                        <b text-white><?= $topup['status']; ?><i class="fa fa-clone pl-2 clip"
			                                                onclick="copy_token()"
			                                                data-clipboard-text="<?= $topup['status']; ?>"></i></b>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                        <div class="bottom-card d-flex justify-content-center align-items-center text-white">
			                            <p class="text-whitemb-0 text-white mr-1 mb-0">No.Transaksi:
			                            <p class="text-secondary-pointgomb-0 text-white mb-0 text-secondary-pointgo"> <?= $topup['topup_id']; ?></p>
			                            <i class="fa fa-clone pl-2 clip" onclick="copy_trx()"
			                                data-clipboard-text="<?= $topup['topup_id']; ?>"></i>
			                        </div>
			                    </div>
			                </div>
			                <?php endif ?>
			            </div>
			        </div>
			    </div>
			    <?php if ($topup['status'] !== 'Success'): ?>

			    <div class="pt-3 pb-5">
			        <div class="container-fluid">
			            <div class="row justify-content-center">
			                <div class="col-lg-9">
			                    <div class="section mb-3">
			                        <?php if ($topup['status'] == 'Pending'): ?>
			                        <div class="background-timer-card">
			                            <p id="timer" class="col-sm-12 col-12 col-lg-12 timer m-0 text-center"></p>
			                        </div>
			                        <?php endif ?>
			                        <div class="card-body">
			                            <h5 class="text-center pb-3 text-white">Detail Pesanan</h5>
			                            <div class="row">
			                                <div class="col-lg-6 col-12">
			                                    <div class="mb-4">
			                                        <p class="text-white">Detail Layanan</p>
			                                        <p class="text-white">Topup Saldo HiddenPay</p>
			                                    </div>
			                                    <div class="mb-4 text-white">
			                                        <p class="text-white">No.Transaksi</p>
			                                        <?= $topup['topup_id']; ?> <i class="fa fa-clone pl-2 clip"
			                                            onclick="copy_trx()"
			                                            data-clipboard-text="<?= $topup['topup_id']; ?>"></i>
			                                    </div>
			                                </div>
			                                <div class="col-lg-6 col-12">
			                                    <div class="mb-4 text-white">
			                                        <p class="text-white">Status Transaksi</p>
			                                        <h5
			                                            class="pembayaran <?= $topup['status'] == 'Pending' ? 'pending' : ''; ?> ">
			                                            <?= $topup['status']; ?></h5>
			                                    </div>
			                                    <div class="mb-4 text-white">
			                                        <p class="text-white">Waktu Transaksi</p>
			                                        <p class="text-white"><?= $topup['date_create']; ?></p>
			                                    </div>
			                                </div>

			                                <div class="col-lg-12 col-12 mt-3mb-4 text-white">
			                                    <p class="text-white">Metode Pembayaran</p>
			                                    <div class="d-flex align-items-center background-payment" style="background: var(--warna_2);border: 1px solid var(--warna_2);border-radius: 6px;padding: 15px;filter: contrast(0.9);margin-bottom:10px;">
			                                        <img class="pr-3"
			                                            src="<?= base_url(); ?>/assets/images/method/<?= $topup['images']; ?>"
			                                            width="100">
			                                        <p class="text-dark m-0"><?= $topup['method']; ?></p>
			                                    </div>
			                                </div>
			                                <div class="col-lg-12 col-12 mb-3">
			                                    <p class="text-white">Jumlah Pembayaran</p>
			                                    <div class="text-center background-payment" style="background: var(--warna_2);border: 1px solid var(--warna_2);border-radius: 6px;padding: 15px;filter: contrast(0.9);margin-bottom:10px;">
			                                        <h5 style="text-align: center;font-size :26px;" class="text-dark m-0">
			                                            Rp<?= number_format($harga, 0, ',', '.'); ?>
			                                            <i class="fa fa-clone pl-2 clip" onclick="copy_price()"
			                                                data-clipboard-text="<?= $harga; ?>" style="float: right;"></i>
			                                        </h5>
			                                    </div>
			                                </div>

			                                <?php if ($topup['status'] == 'Pending'): ?>

			                                <?php if (($topup['payment_type'] == 'QRIS' && $topup['payment_gateway'] == 'Xendit')  || ($topup['payment_type'] == 'QRIS' && $topup['payment_gateway'] == 'Ipaymu')): ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center"><b> Scan QR CODE dibawah ini</b> <br>
			                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $topup['payment_code']; ?>&amp;size=250x250"
			                                        class="mt-3 mb-1 p-4 bg-white d-block mx-auto qris"
			                                        style="border-radius:15px;" alt="" title="" />
			                                </div>

			                                <?php elseif ((in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Tokopay') || (in_array($topup['payment_type'], ['QRIS',]) && $topup['payment_gateway'] == 'Tripay') || (in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Linkqu')): ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center"><b> Scan QR CODE dibawah ini</b> <br>
			                                    <img src="<?= $topup['payment_code']; ?>" class="mt-3 d-block mx-auto qris"
			                                        width="250" alt="" title="" />
			                                </div>

			                                <?php elseif ($topup['payment_type'] == 'Virtual Account'): ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center"><b> No Virtual Account</b> <br>

			                                    <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i
			                                                class="fa fa-clone pl-2 clip" onclick="copy_rek()"
			                                                data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>

			                                </div>

			                                <?php elseif ($topup['payment_type'] == 'Convenience Store'): ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center"><b> No Pembayaran Retail </b> <br>

			                                    <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i
			                                                class="fa fa-clone pl-2 clip" onclick="copy_rek()"
			                                                data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>

			                                </div>

			                                <?php elseif ($topup['payment_type'] == 'E-Wallet'): ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center">
			                                    <a href="<?= $topup['payment_code']; ?>" class="btn btn-primary btn-block mt-2"
			                                        target="_blank">Bayar Sekarang</a>
			                                </div>

			                                <?php elseif (in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Duitku') : ?>

			                                 <div class="pb-3 col-lg-12 col-12 text-center"><b> Scan QR CODE dibawah ini</b> <br>
			                                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $topup['payment_code']; ?>&amp;size=250x250"
			                                        class="mt-3 mb-1 p-4 bg-white d-block mx-auto qris"
			                                        style="border-radius:15px;" alt="" title="" />
			                                </div>


			                                <?php else: ?>

			                                <div class="pb-3 col-lg-12 col-12 text-center"> No Rekening <br>
			                                    <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i
			                                                class="fa fa-clone pl-2 clip" onclick="copy_rek()"
			                                                data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>
			                                </div>

			                                <?php endif ?>

			                                <?php endif ?>

			                            </div>
			                        </div>


			                    </div>

			                    <?php if ($topup['status'] == 'Pending'): ?>
			                    <div class="section" style="margin-bottom:20px;">
			                        <div class="card-body accordion mb-3" id="bbank" style="padding: 10px 0px 10px 0px;}">
			                            <div class="card-body text-white">
			                                <h5 class="text-center pb-3 text-white">Cara Pembayaran</h5>
			                                <p class="text-white">
			                                    <?= htmlspecialchars_decode($topup['instruksi']); ?>
			                                </p>
			                            </div>
			                        </div>
			                    </div>
			                    <?php endif ?>

			                </div>

			            </div>
			        </div>
			    </div>
			    <?php endif ?>
			</div>
			<?php $this->endSection(); ?>

			<?php $this->section('js'); ?>
			<script>
//Check if end_time already exists in local storage
if (localStorage.getItem("end_time-<?= $topup['topup_id']; ?>") === null) {
    // if not, set end_time as 24 hours from now
    localStorage.setItem("end_time-<?= $topup['topup_id']; ?>", Date.now() + (<?= $topup['expired']; ?> * 60 *
        60 * 1000));
}
// get the end_time from local storage
var end_time = localStorage.getItem("end_time-<?= $topup['topup_id']; ?>");
var timer = document.getElementById("timer-<?= $topup['topup_id']; ?>");
setInterval(function() {
    var time_left = Math.round((end_time - Date.now()) / 1000);
    var hours = Math.floor(time_left / 3600);
    var minutes = Math.floor((time_left % 3600) / 60);
    var seconds = time_left % 60;
    timer.innerHTML = hours + "h" + " : " + minutes + "m" + " : " + seconds + "d";
}, 1000);
			</script>

			<script>
//Check if end_time already exists in local storage
if (localStorage.getItem("end_time_<?= $topup['topup_id']; ?>") === null) {
    // if not, set end_time as 24 hours from now
    localStorage.setItem("end_time_<?= $topup['topup_id']; ?>", Date.now() + (24 * 60 * 60 * 1000));
}
// get the end_time from local storage
var end_time = localStorage.getItem("end_time_<?= $topup['topup_id']; ?>");
var timer = document.getElementById("timer");
setInterval(function() {
    var time_left = Math.round((end_time - Date.now()) / 1000);
    var hours = String(Math.floor(time_left / 3600)).padStart(2, '0');
    var minutes = String(Math.floor((time_left % 3600) / 60)).padStart(2, '0');
    var seconds = String(time_left % 60).padStart(2, '0');

    if (time_left <= 0) {
        timer.innerHTML =
            "<span class='text-white' style='color:#ff0000 !important;font-size:17px;'>Pesanan Expired</span>";
        clearInterval(intervalId);
        document.getElementById("waktu").style.display = "none";
    } else {
        timer.innerHTML = `
                      <span style='color:white;font-size:14px;'>Silahkan selesaikan pembayaran Anda dalam waktu: <a style="color:white;font-size::16px;color:var(--warna_2);font-weight:700;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
<path d="M5.25098 0C5.05206 0 4.8613 0.0790176 4.72065 0.21967C4.57999 0.360322 4.50098 0.551088 4.50098 0.75C4.50098 0.948912 4.57999 1.13968 4.72065 1.28033C4.8613 1.42098 5.05206 1.5 5.25098 1.5H11.251C11.4499 1.5 11.6407 1.42098 11.7813 1.28033C11.922 1.13968 12.001 0.948912 12.001 0.75C12.001 0.551088 11.922 0.360322 11.7813 0.21967C11.6407 0.0790176 11.4499 0 11.251 0L5.25098 0ZM1.50098 9.75C1.50098 7.95979 2.21214 6.2429 3.47801 4.97703C4.74388 3.71116 6.46077 3 8.25098 3C10.0412 3 11.7581 3.71116 13.0239 4.97703C14.2898 6.2429 15.001 7.95979 15.001 9.75C15.001 11.5402 14.2898 13.2571 13.0239 14.523C11.7581 15.7888 10.0412 16.5 8.25098 16.5C6.46077 16.5 4.74388 15.7888 3.47801 14.523C2.21214 13.2571 1.50098 11.5402 1.50098 9.75ZM7.50098 11.25C7.50098 11.4489 7.57999 11.6397 7.72065 11.7803C7.8613 11.921 8.05206 12 8.25098 12C8.44989 12 8.64065 11.921 8.78131 11.7803C8.92196 11.6397 9.00098 11.4489 9.00098 11.25V6.75C9.00098 6.55109 8.92196 6.36032 8.78131 6.21967C8.64065 6.07902 8.44989 6 8.25098 6C8.05206 6 7.8613 6.07902 7.72065 6.21967C7.57999 6.36032 7.50098 6.55109 7.50098 6.75V11.25ZM16.282 5.7795C16.1415 5.9203 15.9509 5.99956 15.752 5.99984C15.5532 6.00012 15.3623 5.92141 15.2215 5.781L13.7185 4.284C13.6468 4.21491 13.5895 4.13224 13.5501 4.04079C13.5106 3.94935 13.4898 3.85096 13.4888 3.75138C13.4878 3.6518 13.5067 3.55302 13.5442 3.4608C13.5818 3.36858 13.6374 3.28476 13.7077 3.21425C13.778 3.14373 13.8617 3.08792 13.9538 3.05008C14.0459 3.01224 14.1446 2.99313 14.2442 2.99385C14.3438 2.99457 14.4422 3.01512 14.5338 3.05429C14.6253 3.09346 14.7082 3.15047 14.7775 3.222L16.2805 4.719C16.4213 4.85945 16.5005 5.05007 16.5008 5.24894C16.5011 5.44781 16.4224 5.63866 16.282 5.7795Z" fill="var(--warna_2)"/>
</svg> ${hours} : ${minutes} : ${seconds}</a></span>
                    `;
    }
}, 1000);
			</script>
			<script>
function copy_trx() {
    navigator.clipboard.writeText('<?= $topup['topup_id']; ?>');

    Swal.fire('Berhasil', 'No Transaksi berhasil di salin', 'success');
}

function copy_price() {
    navigator.clipboard.writeText('<?= $topup['amount']; ?>');

    Swal.fire('Berhasil', 'Harga berhasil di salin', 'success');
}

function copy_rek() {
    navigator.clipboard.writeText('<?= $topup['payment_code']; ?>');

    Swal.fire('Berhasil', 'No Rekening / No VA / Kode Pembayaran berhasil di salin', 'success');
}
			</script>
			<?php $this->endSection(); ?>