<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>

<style>

body {
    background: linear-gradient(to bottom, #E3F0DC, #E3F1DD, #E3F0DC);
    background-size: contain;
    /*background-repeat: no-repeat;*/
}
p strong,ol li ,bold ,p {
    color: #000 !important;
}
strong {
    color: #000 !important;
}
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
    background: rgb(255 255 255 / 83%);
    color: #7fb85a !important;
    text-align: end;
    font-weight: 600;
    font-size: 14px;
    padding: 10px;
    text-align: center;
}

.pembayaran.pending {
    border-radius: 12px;
    border: 1px solid rgba(111, 174, 93, 1);
    background: rgb(241 247 239 / 83%);
    color: #6FAE5D !important;
    text-align: end;
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

li {
    color: var(--warna_2) !important;
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
    max-width: 450px;
    height: auto;
    margin: auto;
    background: #fff!important;
    border: none!important;
    /*box-shadow: 0 0px 7px 0 rgb(0 0 0 / 50%);*/
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
    font-weight: 500;
}

strong {
    color: #fff !important;
}

.background-timer-card {
    border-radius: 12px 12px 0px 0px;
    background: var(--warna_3);
    max-width: 550px;
    height: auto;
    padding: 7px 20px 7px 20px;
}

.background-payment {
    background: #F5F5F5;
    /*border: 1px solid var(--warna_2);*/
    border-radius: 6px;
    padding: 15px;
    /*filter: contrast(0.9);*/
}

@media (max-width: 400px) {
    .qris {
        width: 13.5rem !important;
    }
    h5.m-0 {
        font-size: 18px !important;
    }
}
@media (max-width: 355px) {
    .qris {
        width: 11rem !important;
    }
}
@media (max-width: 280px) {
    .qris {
        width: 8.5rem !important;
    }
}

.qris {
    border-radius: 12px;
    border: 2px solid #76B55C;
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

.card-body-2 {
    background: var(--warna_3);
    border-radius: 11px 11px 0 0 ;
    padding-left: 1rem;
    padding-top: 1rem;
}

.card-body {
    padding-top: 0.5rem !important;
}

.bottom-card {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 0px 0px 10px 10px;
    background: var(--warna_2);
    padding: 10px;
}
                
.checklist-icon {
    position: absolute;
    top: -45px;
    background:#fff; 
    border:10px solid #fff; 
    border-radius:50%;
    /*box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);*/
                
}
            
.clip-circle {
    width: 15%; 
    background: #E2F0DC;
    height: 15%; 
    position: absolute;
}

.left-clip {
    left: -5px;
    clip-path: circle(50% at 0% 50%);
    top: 100px;
}
        
.right-clip {
    right: -5px;
    clip-path: circle(50% at 100% 50%);
    top: 100px;
}

</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<?php 
 if ($orders['payment_gateway'] == 'Tripay') { 
    if ( in_array($orders['method_code'], array('QRISC')) ) { 
         $fee = 800 ; 
         $harga = ($orders['price']*1.007) + $fee ; 
     }  else if ( in_array($orders['method_code'], array('QRIS')) ) { 
		$fee = 750 ; 
         $harga = ($orders['price']*1.007) + $fee ; 
	} else if ( in_array($orders['method_code'], array('OVO','SHOPEEPAY')) ) { 
         $fee = 0 ; 
         $harga = ($orders['price']*1.03) + $fee ; 
     } else if ( in_array($orders['method_code'], array('MYBVA','PERMATAVA','BNIVA','BRIVA','MANDIRIVA','SMSVA','MUAMALATVA','CIMBVA','BSIVA','OCBCVA','DANAMONVA','BNCVA')) ) { 
         $fee = 4250 ; 
         $harga = $orders['price'] + $fee ; 
     } else if ($orders['method_code'] == 'INDOMARET') { 
         $fee = 3500 ; 
         $harga = $orders['price'] + $fee ;  
     } else if ($orders['method_code'] == 'BCAVA') { 
         $fee = 5500 ; 
         $harga = $orders['price'] + $fee ;  
     } else if ( in_array($orders['method_code'], array('ALFAMART','ALFAMIDI')) ) { 
         $fee = 6000 ; 
         $harga = $orders['price'] + $fee ;  
     } else { 
         $harga = $orders['price'] ;  }
    
 } else if ($orders['payment_gateway'] == 'Duitku') { 
     if ( in_array($orders['method_code'], array('SP','NQ')) ) { 
         $harga = ($orders['price']*1) ; 
     } else if ($orders['method_code'] == 'LQ') { 
         $harga = ($orders['price']*1) ; 
     } else if ( in_array($orders['method_code'], array('OV','DA','LA')) ) { 
         $harga = ($orders['price']*1.0167) ; 
     } else if ($orders['method_code'] == 'SA') { 
         $harga = ($orders['price']*1.04) ; 
     }  else if ($orders['method_code'] == 'BC') { 
         $fee = 5000 ; 
         $harga = $orders['price'] + $fee ;
     }  else if ($orders['method_code'] == 'M2') { 
         $fee = 4000 ; 
         $harga = $orders['price'] + $fee ;
     }  else if ( in_array($orders['method_code'], array('VA','I1','B1','BT','A1','BR','NC')) ) { 
         $fee = 3000 ; 
         $harga = $orders['price'] + $fee ; 
     }  else if ($orders['method_code'] == 'FT') { 
         $fee = 2500 ; 
         $harga = $orders['price'] + $fee ;  
     } else if ($orders['method_code'] == 'AG') { 
         $fee = 1500 ; 
         $harga = $orders['price'] + $fee ;  
     } else { 
         $harga = $orders['price'] ;  }
    
 } else if ($orders['payment_gateway'] == 'Xendit') { 
     $harga = $orders['price'];
 
 } else if ($orders['payment_gateway'] == 'Tokopay') {
	if ($orders['method_code'] == 'QRISREALTIME') {
		$harga = ($orders['price'] * 1.017);
	} else if ($orders['method_code'] == 'QRIS') {
		$harga = ($orders['price'] * 1.007)+100;
	}  else if ($orders['method_code'] == 'QRIS_CUSTOM') {
		$harga = ($orders['price'] * 1.007)+250;
	} else if (in_array($orders['method_code'], array('LINKAJA', 'OVOPUSH', 'GOPAY'))) {
		$harga = ($orders['price'] * 1.03);
	} else if (in_array($orders['method_code'], array('ASTRAPAY', 'DANA', 'SHOPEEPAY'))) {
		$harga = ($orders['price'] * 1.0250);
	} else if ($orders['method_code'] == 'VIRGO') {
		$harga = ($orders['price'] * 1.020);
	} else if ($orders['method_code'] == 'PERMATAVA, ') {
		$fee = 2000;
		$harga = $orders['price'] + $fee;
	} else if (in_array($orders['method_code'], array('CIMBVA', 'DANAMONVA'))) {
		$fee = 2500;
		$harga = $orders['price'] + $fee;
	} else if ($orders['method_code'] == 'BRIVA, ') {
		$fee = 2800;
		$harga = $orders['price'] + $fee;
	} else if (in_array($orders['method_code'], array('ALFAMART', 'INDOMARET', 'BNCVA', 'PERMATAVAA'))) {
		$fee = 3000;
		$harga = $orders['price'] + $fee;
	} else if ($orders['method_code'] == 'BNIVA') {
		$fee = 3300;
		$harga = $orders['price'] + $fee;
	} else if (in_array($orders['method_code'], array('BSIVA', 'MANDIRIVA'))) {
		$fee = 3500;
		$harga = $orders['price'] + $fee;
	} else if ($orders['method_code'] == 'BCAVA') {
		$fee = 4200;
		$harga = $orders['price'] + $fee;
	} else if (in_array($orders['method_code'], array('AXIS', 'XL', 'TRI'))) {
		$harga = $orders['price'] = ceil($orders['price'] * 1.25 / 1000) * 1000;;
	} else if ($orders['method_code'] == 'TELKOMSEL') {
		$harga = $orders['price'] = ceil($orders['price'] * 1.32 / 1000) * 1000;;
	} else {
		$harga = $orders['price'];
	}


 } else {
     $harga = $orders['price'] ;
 }

 
?>
<div class="bg-leaf">
			        <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
			        <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
			    </div>
<div class="pt-1">

    <div class="pt-3 pb-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="pt-3 pb-4" hidden>
                        <span class="strip-primary" hidden></span>
                    </div>
                    <?php if ($orders['status'] == 'Pending'): ?>
                    <div class="section mb-2">
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
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="pt-3 pb-4" hidden>
                        <span class="strip-primary" hidden></span>
                    </div>
                    <?php if ($orders['status'] == 'Success'): ?>
                    <div class="section mb-2" style="border-radius:50px">
                        <!--<img class="pointgo2"-->
                        <!--    src="<?= base_url(); ?>/assets/images/new-assets/BG-SUCCESS-7.png" width="100%"-->
                        <!--    style="border-radius: 10px 10px 0px 0px;">-->
                        <div class="card-body" style="border-radius: 0px 0px 12px 12px; margin-top: 3rem;">
                        <div class="left-clip clip-circle"></div>
                        <div class="right-clip clip-circle"></div>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?= base_url(); ?>/assets/images/Checklist-icon.png" height="80" alt="logo icon" class="checklist-icon">
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <img src="<?= base_url(); ?>/assets/images/Logo-Green-Hiddengame.png" height="80" alt="logo icon">
                            </div>
                            <hr style="border: 1px dashed #E5E5E5; margin-bottom: 20px; width:70%">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-center mb-0 text-dark">
                                            <h4 class="text-dark">Pembayaran Berhasil</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-center mb-0 text-dark">
                                            <p class="text-dark"><?= $orders['date_create']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">Detail Layanan</p>
                                            <p class="mb-0 text-dark" style="font-weight:700"><?= $orders['games']; ?> - <?= $orders['product']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">ID Name</p>
                                            <p class="mb-0 text-dark" style="font-weight:700"><?= $orders['nickname']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">No. Transaksi</p>
                                            <p class="mb-0 text-dark" style="font-weight:700"><?= $orders['order_id']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">Harga</p>
                                            <p class="mb-0 text-dark" style="font-weight:700">Rp <?= number_format($harga, 0, ',', '.'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">Ket / No. Token / No. Voucher</p>
                                            <p class="mb-0 text-dark" style="font-weight:700;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 250px;"><i class="fa fa-clone pl-2 clip text-dark"
                                                    onclick="copy_token()" data-clipboard-text="<?= $orders['ket']; ?>"></i> <?= $orders['ket']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-between mb-0 text-dark">
                                            <p class="text-dark text-small-sm mb-1">Metode Pembayaran</p>
                                                <?php if ($orders['method'] === 'Saldo Akun') { ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/HIDDENPAY1.webp" alt="<?= $orders['method']; ?>" class="mb-2 rounded bhahah" width="20%">
                                                <?php } else { ?>
                                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $orders['methodimg']; ?>" alt="<?= $orders['method']; ?>" class="mb-2 rounded" width="40%">
                                                <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="d-flex justify-content-center mb-0 text-dark">
                                            <a  class="btn btn-primary btn-block mt-2" style="cursor:pointer; color:#fff !important; width:75%" href="<?= base_url(); ?>">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--<div class="section mb-3">-->
                    <!--    <div class="card-body accordion" >-->
                    <!--        <h4 class="text-center pb-2 text-white">Customer Service</h4>-->
                    <!--        <img class="mx-auto d-block" src="<?= base_url(); ?>/assets/images/customer-care 1.webp" height="80" width="80">-->
                    <!--        <p class="text-center text-white">Apabila ada Kendala/Pertanyaan terkait pesanan, bisa hubungi kontak dibawah ini.</p>-->
                    <!--         <div class="pb-3 pr-0 pl-0 col-lg-12 col-12">-->
                    <!--            <a  class="btn btn-primary btn-block mt-2" onclick="generateWhatsAppLink()" style="cursor:pointer;"-->
                    <!--                target="_blank">-->
                    <!--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 256 230"><path fill="#000" d="M4.278 5.108C17.561.324 43.861-5.242 73.692 9.68a106.617 106.617 0 0 1 22.126 16.374c10.467-1.891 21.248-2.846 32.192-2.846c32.754 0 63.808 8.584 87.443 24.165c12.233 8.077 21.963 17.653 28.906 28.47c7.725 12.057 11.65 25.013 11.641 38.914c0 13.52-3.916 26.494-11.65 38.543c-6.943 10.826-16.674 20.393-28.906 28.47c-23.626 15.58-54.68 24.155-87.444 24.155c-10.944 0-21.725-.956-32.191-2.846a106.641 106.641 0 0 1-22.126 16.374c-29.842 14.922-56.131 9.356-69.414 4.563c-4.364-1.575-5.702-7.113-2.484-10.444c9.368-9.7 24.867-28.88 21.057-46.314C8.032 152.089 0 133.796 0 114.386c0-19.047 8.031-37.34 22.852-52.52c3.81-17.433-11.689-36.604-21.057-46.304c-3.228-3.332-1.88-8.879 2.483-10.454m122.395 43.631c-57.469 0-104.06 30.15-104.06 67.337c0 16.201 8.842 31.076 23.587 42.695c4.154 13.243 1.72 28.174-7.296 44.786c-.43.803-.83 1.604-1.27 2.397c7.735-.64 15.556-2.769 23.472-6.654a82.432 82.432 0 0 0 16.597-12.345l8.996-8.679c12.309 3.313 25.812 5.146 39.974 5.146c57.468 0 104.059-30.14 104.068-67.346c0-37.187-46.6-67.337-104.068-67.337M76.882 100.6c8.47 0 15.336 6.836 15.336 15.266s-6.866 15.267-15.336 15.267s-15.336-6.836-15.336-15.267c0-8.43 6.866-15.265 15.336-15.265m49.37 0c8.47 0 15.337 6.836 15.337 15.266s-6.867 15.267-15.336 15.267c-8.47 0-15.337-6.836-15.337-15.267c0-8.43 6.866-15.265 15.337-15.265m49.37 0c8.46 0 15.336 6.836 15.336 15.266s-6.866 15.267-15.335 15.267c-8.47 0-15.337-6.836-15.337-15.267c0-8.43 6.866-15.265 15.337-15.265"></path>-->
                    <!--                </svg>Hubungi</a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php if ($orders['status'] !== 'Success'): ?>

        <div class="pt-3 pb-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="section mb-3">
                            <?php if ($orders['payment_type'] !== 'QRIS'): ?>
                            <div class="background-timer-card">
                                <p id="timer" class="col-sm-12 col-12 col-lg-12 timer m-0 text-center"></p>
                            </div>
                            <?php endif ?>
                            <div class="card-body" style="border-radius: 0px 0px 12px 12px !important;">
                                <h5 class="text-center pb-3 text-dark" style="margin-top: 25px; font-size: 20px;">Detail Pesanan</h5>
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class=" mb-4">
                                            <p style="color:#000!important;font-weight: bold;">Detail Layanan</p>
                                            <p class="text-dark"><?= $orders['games']; ?> - <?= $orders['product']; ?></p>
                                        </div>
                                        <div class=" mb-4" style="color: #000!important;">
                                            <p style="color:#000 !important;font-weight: bold;">ID Transaksi</p>
                                            <?= $orders['order_id']; ?> <i class="fa fa-clone pl-2 clip"
                                                onclick="copy_trx()"
                                                data-clipboard-text="<?= $orders['order_id']; ?>" style="color:#000!important;"></i>
                                        </div>
                                        <div class=" mb-4">
                                            <p style="color: #000!important;font-weight: bold;">Keterangan/No. Token/No. Voucher</p>
                                            <p class="text-dark"><?= $orders['ket']; ?><i class="fa fa-clone pl-2 clip"
                                                    onclick="copy_token()"
                                                    data-clipboard-text="<?= $orders['ket']; ?>"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class=" mb-4">
                                            <?php 
											if ($orders['status'] == 'Pending') { 
											$pembayaran = 'Unpaid';
											} else {
												$pembayaran = 'Paid';
											}
										?>
                                            <p style="color:#000!important;font-weight: bold;">Status Pembayaran</p>
                                            <h5
                                                class="pembayaran <?= $orders['status'] == 'Pending' ? 'pending' : ''; ?> " style="font-family: 'Arial', sans-serif;">
                                                <?= $pembayaran; ?></h5>
                                        </div>
                                        <div class=" mb-4">
                                            <p style="color:#000!important;font-weight: bold;">Status Transaksi</p>
                                            <h5
                                                class="pembayaran <?= $orders['status'] == 'Pending' ? 'pending' : ''; ?> " style="font-family: 'Arial', sans-serif;">
                                                <?= $orders['status']; ?></h5>
                                        </div>
                                        <div class=" mb-4">
                                            <p style="color: #000!important;font-weight: bold;">Waktu Transaksi</p>
                                            <p class="text-dark"><?= $orders['date_create']; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12 mt-3 mb-4">
                                        <p style="color:#000!important;font-weight: bold;">Metode Pembayaran</p>
                                        <div class="d-flex align-items-center background-payment">
                                            <img class="pr-3"
                                                src="<?= base_url(); ?>/assets/images/method/<?= $orders['methodimg']; ?>"
                                                width="100">
                                            <p class="m-0" style="color: #000 !important;font-weight: bold;"><?= $orders['method']; ?></p>
                                        </div>
                                    </div>
                                    <?php if ($orders['payment_type'] !== 'QRIS'): ?>
                                    <div class="col-lg-12 col-12 mb-3">
                                        <p style="color:#000!important;font-weight: bold;">Jumlah Pembayaran</p>
                                        <div class="text-center background-payment">
                                            <h5 style="text-align: center;font-size :26px;font-family: 'Arial', sans-serif;" class="text-dark m-0">
                                                Rp<?= number_format($harga, 0, ',', '.'); ?>
                                                <i class="fa fa-clone pl-2 clip" onclick="copy_price()"
                                                    data-clipboard-text="<?= $harga; ?>" style="float: right;"></i>
                                            </h5>
                                        </div>
                                         <p class="text-dark text-center mt-2"><i>Harga sudah termasuk Pajak & Biaya Admin</i></p>
                                    </div>
                                    <?php endif ?>

                                    <?php if (($orders['status'] == 'Pending' && $orders['payment_type'] !== 'QRIS')): ?>

                                    <?php if (($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Xendit')  || ($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Ipaymu') || (in_array($orders['payment_type'], ['Virtual Account']) && $orders['payment_gateway'] == 'Tokopay')): ?>

                                    <?php elseif ($orders['payment_type'] == 'Virtual Account'): ?>

                                    <div class="pb-3 col-lg-12 col-12 "><b class="text-dark"> No Virtual Account</b> <br>

                                        <h5 class="">
                                            <b class="d-block mt-2 text-dark"><?= $orders['payment_code']; ?>
                                                <i class="fa fa-clone pl-2 clip text-dark" onclick="copy_rek()" data-clipboard-text="<?= $orders['payment_code']; ?>">
                                                </i>
                                            </b>
                                        </h5>

                                    </div>

                                    <?php elseif ($orders['payment_type'] == 'Convenience Store' && $orders['payment_gateway'] == 'Ipaymu' || (in_array($orders['payment_type'], ['Convenience Store']) && $orders['payment_gateway'] == 'Tokopay')): ?>

                                    <div class="pb-3 col-lg-12 col-12"><b> No Pembayaran Retail </b> <br>

                                        <h5><b class="d-block mt-2"><?= $orders['payment_code']; ?><i
                                                    class="fa fa-clone pl-2 clip" onclick="copy_rek()"
                                                    data-clipboard-text="<?= $orders['payment_code']; ?>"></i></b></h5>

                                    </div>

                                    <?php elseif ($orders['payment_type'] == 'E-Wallet'): ?>

                                    
                                    <div class="pb-3 col-lg-12 col-12">
                                        <a href="<?= $orders['payment_code']; ?>" class="btn btn-primary btn-block mt-2 d-flex align-items-center justify-content-center"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25c0-.05.01-.09.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/>
                                            </svg>Bayar Sekarang</a>
                                    </div>
                                    

                                    <?php elseif (in_array($orders['payment_type'], ['QRIS']) && $orders['payment_gateway'] == 'Duitku') : ?>

                                    
                                    <div class="pb-3 col-lg-12 col-12">
                                        <a href="<?= $orders['payment_code']; ?>" class="btn btn-primary btn-block mt-2 d-flex align-items-center justify-content-center"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25c0-.05.01-.09.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/></svg>
                                                    Bayar Sekarang </a>
                                    </div>
                                    
                                    <?php elseif ($orders['payment_type'] == 'Pulsa'): ?>

                                   
                                    <div class="pb-3 col-lg-12 col-12">
                                       <a href="<?= $orders['payment_code']; ?>" class="btn btn-primary btn-block mt-2 d-flex align-items-center justify-content-center"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25c0-.05.01-.09.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/></svg>
                                                    Bayar Sekarang </a>
                                    </div>

                                    <?php else: ?>

                                    <div class="pb-3 col-lg-12 col-12"> No Rekening <br>
                                        <h5><b class="d-block mt-2"><?= $orders['payment_code']; ?><i
                                                    class="fa fa-clone pl-2 clip" onclick="copy_rek()"
                                                    data-clipboard-text="<?= $orders['payment_code']; ?>"></i></b></h5>
                                    </div>

                                    <?php endif ?>

                                    <?php endif ?>

                                </div>
                            </div>


                        </div>
                        
                        <?php if ($orders['status'] == 'Pending'): ?>
                        <?php if ($orders['payment_type'] == 'QRIS'): ?>
                        
                        <div class="section mb-3">
                            <div class="background-timer-card">
                                <p id="timer" class="col-sm-12 col-12 col-lg-12 timer m-0 text-center" style="color:#000; padding-bottom: 1rem;"></p>
                            </div>
                            <div class="card-body px-5" style="border-radius: 0px 0px 12px 12px;">
                                <div class="row">
                                    <div class="col-lg-6 col-6 text-left">
                                        <p class=" mb-0" style="color:#000!important;font-weight: bold;">Scan QR CODE dibawah ini</p>
                                    </div>
                                    <div class="col-lg-6 col-6 text-right">
                                        <img src="<?= base_url(); ?>/assets/images/new-assets/qris-white.svg" style="filter: invert(1); ">
                                    </div>

                                    

                                    <?php if (($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Xendit')  || ($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Duitku')): ?>

                                    <div class="pb-3 col-lg-12 col-12">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $orders['payment_code']; ?>&amp;size=250x250"
                                            class="mt-3 mb-1 p-4 bg-white d-block mx-auto qris"
                                            style="border-radius:15px;" alt="" title="" />
                                    </div>

                                    <?php elseif ((in_array($orders['payment_type'], ['QRIS',]) && $orders['payment_gateway'] == 'Tripay') || (in_array($orders['payment_type'], ['QRIS']) && $orders['payment_gateway'] == 'Linkqu') || (in_array($orders['payment_type'], ['QRIS']) && $orders['payment_gateway'] == 'Tokopay')): ?>

                                    <div class="pb-3 col-lg-12 col-12">
                                        <img src="<?= $orders['payment_code']; ?>" class="mt-3 d-block mx-auto qris"
                                            width="250" alt="" title="" />
                                    </div>

                                    <?php else: ?> 

                                    <?php endif ?>
                                 <div class="col-lg-12 col-12 mb-3">
                                        <p class="text-center" style="color:#000!important;font-weight: bold;">Jumlah Pembayaran</p>
                                        <div class="text-center background-payment">
                                            <h5 style="text-align: center;font-size :26px;color: #000!important;font-family: 'Arial', sans-serif;" class=" m-0">
                                                Rp<?= number_format($harga, 0, ',', '.'); ?>
                                                <i class="fa fa-clone pl-2 clip" onclick="copy_price()"
                                                    data-clipboard-text="<?= $harga; ?>" style="float: right;"></i>
                                            </h5>
                                        </div>
                                        <p class="text-center mt-2" style="color:#000!important;font-weight: bold;"><i>Harga sudah termasuk Pajak & Biaya Admin</i></p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php endif ?>
                        <?php endif ?>
                        
                          <div class="section mb-3">
                        <div class="card-body accordion" >
                            <h4 class="text-center pb-2 text-dark">Customer Service</h4>
                            <img class="mx-auto d-block" src="<?= base_url(); ?>/assets/images/customer-care 1.webp" height="80" width="80">
                            <p class="text-center text-dark" style="padding-bottom: 1rem;">Apabila ada Kendala/Pertanyaan terkait pesanan, bisa hubungi kontak dibawah ini.</p>
                             <div class="pb-3 pr-0 pl-0 col-lg-12 col-12">
                                <a  class="btn btn-primary btn-block mt-2" onclick="generateWhatsAppLink()" style="cursor:pointer; color:#fff !important"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 256 230"><path fill="#fff" d="M4.278 5.108C17.561.324 43.861-5.242 73.692 9.68a106.617 106.617 0 0 1 22.126 16.374c10.467-1.891 21.248-2.846 32.192-2.846c32.754 0 63.808 8.584 87.443 24.165c12.233 8.077 21.963 17.653 28.906 28.47c7.725 12.057 11.65 25.013 11.641 38.914c0 13.52-3.916 26.494-11.65 38.543c-6.943 10.826-16.674 20.393-28.906 28.47c-23.626 15.58-54.68 24.155-87.444 24.155c-10.944 0-21.725-.956-32.191-2.846a106.641 106.641 0 0 1-22.126 16.374c-29.842 14.922-56.131 9.356-69.414 4.563c-4.364-1.575-5.702-7.113-2.484-10.444c9.368-9.7 24.867-28.88 21.057-46.314C8.032 152.089 0 133.796 0 114.386c0-19.047 8.031-37.34 22.852-52.52c3.81-17.433-11.689-36.604-21.057-46.304c-3.228-3.332-1.88-8.879 2.483-10.454m122.395 43.631c-57.469 0-104.06 30.15-104.06 67.337c0 16.201 8.842 31.076 23.587 42.695c4.154 13.243 1.72 28.174-7.296 44.786c-.43.803-.83 1.604-1.27 2.397c7.735-.64 15.556-2.769 23.472-6.654a82.432 82.432 0 0 0 16.597-12.345l8.996-8.679c12.309 3.313 25.812 5.146 39.974 5.146c57.468 0 104.059-30.14 104.068-67.346c0-37.187-46.6-67.337-104.068-67.337M76.882 100.6c8.47 0 15.336 6.836 15.336 15.266s-6.866 15.267-15.336 15.267s-15.336-6.836-15.336-15.267c0-8.43 6.866-15.265 15.336-15.265m49.37 0c8.47 0 15.337 6.836 15.337 15.266s-6.867 15.267-15.336 15.267c-8.47 0-15.337-6.836-15.337-15.267c0-8.43 6.866-15.265 15.337-15.265m49.37 0c8.46 0 15.336 6.836 15.336 15.266s-6.866 15.267-15.335 15.267c-8.47 0-15.337-6.836-15.337-15.267c0-8.43 6.866-15.265 15.337-15.265"></path>
                                    </svg>Hubungi</a>
                            </div>
                        </div>
                    </div>
                        
                        
                        <?php if ($orders['status'] == 'Pending'): ?>
                        <div class="section" style="margin-bottom:20px;">
                            <div class="card-body accordion mb-3" id="bbank" style="padding: 10px 0px 10px 0px;}">
                                <div class="card-body">
                                    <h5 class="text-center pb-3 text-dark">Cara Pembayaran</h5>
                                    <p class="text-white htmlspecialchars_decode" style="color: #000!important;font-weight: bold;">
                                        <?= htmlspecialchars_decode($orders['instruksi']); ?>
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
    function generateWhatsAppLink() {
        var phoneNumber = "<?= $orders['nowa']; ?>";
        
        var additionalMessage = "Nomor Pesanan : *<?= $orders['order_id']; ?>*";
        var message = "<?= $orders['wapesan']; ?>";
        
        var whatsappLink = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(additionalMessage + "\n\n" + message);
        
        var lineBreaks = "%0A%0A";
        whatsappLink += lineBreaks;
        
        var additionalLink = "<?= base_url(); ?>/payment/<?= $orders['order_id']; ?>"; // Ganti dengan URL yang diinginkan
        whatsappLink += "Berikut adalah link pesanannya: " + additionalLink;
        
        window.open(whatsappLink);
    }
</script>

<?php if ($orders['status'] == 'Pending'): ?>
   <!-- Facebook Pixel Code -->
   <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  
  fbq('init', '{938473200580408}');
  fbq('init', '{9532506813488688}');
  fbq('init', '{584979920420062}');
  fbq('track', 'AddPaymentInfo');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={938473200580408}&ev=AddPaymentInfo&noscript=1"/>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={9532506813488688}&ev=AddPaymentInfo&noscript=1"/>
	   <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={584979920420062}&ev=AddPaymentInfo&noscript=1"/>
</noscript>
<?php endif ?>

<?php if ($orders['status'] == 'Success'): ?>
   <!-- Facebook Pixel Code -->
   <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  
  fbq('init', '{938473200580408}');
  fbq('init', '{9532506813488688}');
  fbq('init', '{584979920420062}');
  fbq('track', 'Purchase');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={938473200580408}&ev=Purchase&noscript=1"/>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={9532506813488688}&ev=Purchase&noscript=1"/>
	   <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={584979920420062}&ev=Purchase&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<?php endif ?>

    <script>
    //Check if end_time already exists in local storage
    if (localStorage.getItem("end_time-<?= $orders['order_id']; ?>") === null) {
        // if not, set end_time as 24 hours from now
        localStorage.setItem("end_time-<?= $orders['order_id']; ?>", Date.now() + (<?= $orders['expired']; ?> * 60 *
            60 * 1000));
    }
    // get the end_time from local storage
    var end_time = localStorage.getItem("end_time-<?= $orders['order_id']; ?>");
    var timer = document.getElementById("timer-<?= $orders['order_id']; ?>");
    setInterval(function() {
        var time_left = Math.round((end_time - Date.now()) / 1000);
        var hours = Math.floor(time_left / 3600);
        var minutes = Math.floor((time_left % 3600) / 60);
        var seconds = time_left % 60;
        timer.innerHTML = hours + "h" + " : " + minutes + "m" + " : " + seconds + "d";
    }, 1000);
    </script>

    <script>
    function copy_trx() {
        navigator.clipboard.writeText('<?= $orders['order_id']; ?>');

        Swal.fire('Berhasil', 'No Transaksi berhasil di salin', 'success');
    }

    function copy_price() {
        navigator.clipboard.writeText('<?= $harga; ?>');

        Swal.fire('Berhasil', 'Harga berhasil di salin', 'success');
    }

    function copy_rek() {
        navigator.clipboard.writeText('<?= $orders['payment_code']; ?>');

        Swal.fire('Berhasil', 'No Rekening / No VA / Kode Pembayaran berhasil di salin', 'success');
    }

    function copy_token() {
        navigator.clipboard.writeText('<?= $orders['ket']; ?>');

        Swal.fire('Berhasil', 'Keterangan / No Token PLN / Kode Voucher', 'success');
    }
    </script>

    <script>
    //Check if end_time already exists in local storage
    if (localStorage.getItem("end_time_<?= $orders['order_id']; ?>") === null) {
        // if not, set end_time as 24 hours from now
        localStorage.setItem("end_time_<?= $orders['order_id']; ?>", Date.now() + (24 * 60 * 60 * 1000));
    }
    // get the end_time from local storage
    var end_time = localStorage.getItem("end_time_<?= $orders['order_id']; ?>");
    var timer = document.getElementById("timer");
    setInterval(function() {
        var time_left = Math.round((end_time - Date.now()) / 1000);
        var hours = String(Math.floor(time_left / 3600)).padStart(2, '0');
        var minutes = String(Math.floor((time_left % 3600) / 60)).padStart(2, '0');
        var seconds = String(time_left % 60).padStart(2, '0');

        if (time_left <= 0) {
            timer.innerHTML =
                "<span class='text-white' style='color:#fff !important;font-size:17px;'>Pesanan Expired</span>";
            clearInterval(intervalId);
            document.getElementById("waktu").style.display = "none";
        } else {
            timer.innerHTML = `
                      <span style='color:#fff;font-size:14px;'>Silahkan selesaikan pembayaran Anda dalam waktu: <a style="color:#fff;font-size::16px;font-weight:700;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
<path d="M5.25098 0C5.05206 0 4.8613 0.0790176 4.72065 0.21967C4.57999 0.360322 4.50098 0.551088 4.50098 0.75C4.50098 0.948912 4.57999 1.13968 4.72065 1.28033C4.8613 1.42098 5.05206 1.5 5.25098 1.5H11.251C11.4499 1.5 11.6407 1.42098 11.7813 1.28033C11.922 1.13968 12.001 0.948912 12.001 0.75C12.001 0.551088 11.922 0.360322 11.7813 0.21967C11.6407 0.0790176 11.4499 0 11.251 0L5.25098 0ZM1.50098 9.75C1.50098 7.95979 2.21214 6.2429 3.47801 4.97703C4.74388 3.71116 6.46077 3 8.25098 3C10.0412 3 11.7581 3.71116 13.0239 4.97703C14.2898 6.2429 15.001 7.95979 15.001 9.75C15.001 11.5402 14.2898 13.2571 13.0239 14.523C11.7581 15.7888 10.0412 16.5 8.25098 16.5C6.46077 16.5 4.74388 15.7888 3.47801 14.523C2.21214 13.2571 1.50098 11.5402 1.50098 9.75ZM7.50098 11.25C7.50098 11.4489 7.57999 11.6397 7.72065 11.7803C7.8613 11.921 8.05206 12 8.25098 12C8.44989 12 8.64065 11.921 8.78131 11.7803C8.92196 11.6397 9.00098 11.4489 9.00098 11.25V6.75C9.00098 6.55109 8.92196 6.36032 8.78131 6.21967C8.64065 6.07902 8.44989 6 8.25098 6C8.05206 6 7.8613 6.07902 7.72065 6.21967C7.57999 6.36032 7.50098 6.55109 7.50098 6.75V11.25ZM16.282 5.7795C16.1415 5.9203 15.9509 5.99956 15.752 5.99984C15.5532 6.00012 15.3623 5.92141 15.2215 5.781L13.7185 4.284C13.6468 4.21491 13.5895 4.13224 13.5501 4.04079C13.5106 3.94935 13.4898 3.85096 13.4888 3.75138C13.4878 3.6518 13.5067 3.55302 13.5442 3.4608C13.5818 3.36858 13.6374 3.28476 13.7077 3.21425C13.778 3.14373 13.8617 3.08792 13.9538 3.05008C14.0459 3.01224 14.1446 2.99313 14.2442 2.99385C14.3438 2.99457 14.4422 3.01512 14.5338 3.05429C14.6253 3.09346 14.7082 3.15047 14.7775 3.222L16.2805 4.719C16.4213 4.85945 16.5005 5.05007 16.5008 5.24894C16.5011 5.44781 16.4224 5.63866 16.282 5.7795Z" fill="#fff"/>
</svg> ${hours} : ${minutes} : ${seconds}</a></span>
                    `;
        }
    }, 1000);
    </script>

<script>
var status = '<?= $orders['status']; ?>';
var orderId = '<?= $orders['order_id']; ?>';


function checkStatus() {
    $.ajax({
        type: 'POST',
        url: '<?= base_url(); ?>/Payment/checkStatus/' + orderId,
        data: { order_id: orderId },
        dataType: 'json',
        success: function(response) {
            if (response.status !== 'not_found') {
                if (response.status !== status) {
                    location.reload();
                }
            }
        },
        complete: function() {
            // Memeriksa apakah tab aktif sebelum melanjutkan interval
            if (!document.hidden) {
                intervalId = setTimeout(checkStatus, 3000);
            }
        }
    });
}

// Event listener untuk mendeteksi perubahan visibilitas tab
document.addEventListener("visibilitychange", function() {
    if (document.hidden) {
        // Tab tidak aktif, hentikan interval
        clearTimeout(intervalId);
    } else {
        // Tab aktif, jalankan kembali fungsi
        checkStatus();
    }
});

$(document).ready(function() {
    checkStatus();
});
</script>
    <?php $this->endSection(); ?>