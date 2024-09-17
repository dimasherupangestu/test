<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
.bg-blue {
    color: var(--warna_5) !important;
}

.contentgame {
    color: #000;
    font-size: 12px;
    background: #d9d9d99c;
    padding: 1.5rem;
    border-radius: 9px;
}

.contentgame p {
    color: #000 !important;
}

h5.pb-2,
h5.mb-2 {
    color: .h5, h5
}


.h3,
h3 {
    font-size: 25px;
}

.cutoffbank {
    filter: grayscale(1);
    pointer-events: none;

}

@media (max-width: 900px) {
    .hanz-modal {
        margin-left: 30% !important;
    }
}

.cutoffbank p {
    font-size: 10px !important;
    line-height: 13px;
    margin-bottom: 0.5rem !important;
    margin-right: 1rem !important;
    margin-left: 1rem !important;
    font-weight: 600;
}

.accordion-button {
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

.accordion-button iconify-icon.pl-1 {
    transform: rotateX(177deg);
    transition: 0.2s ease;
}

.accordion-button.collapsed iconify-icon.pl-1 {
    transform: rotateX(0deg);
    transition: 0.2s ease;
}

.single-payment .radio-nominal:checked + label {
    border: 2px solid var(--warna_4) !important;
    box-shadow: 0 0 200px rgb(255 179 0 / 29%) inset !important;
    transition: 0.3s ease;
}

.accordion-button[aria-expanded="true"] {
    border: 1px solid var(--warna_4);
    box-shadow: 0 0 200px rgb(255 179 0 / 29%) inset;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
}

.method-accordion .accordion-button {
    padding: 0px 0px;
}

/* .accordion-collapse.collapsing {
    border: 1px solid var(--warna_4);
    border-top: 0;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.accordion-collapse.collapse.show {
    border: 1px solid var(--warna_4);
    border-top: 0;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
} */

.text-end {
    text-align: right !important;
}

.accordion {
    --bs-accordion-color: #000;
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


.accordion-button {
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


.boks {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 6px;
}

.col-sm-4,
.col-6 {
    padding-right: 8px;
    padding-left: 8px;
}

.circle-primary {
    border: 4px solid #fff;
    background-color: #141414;
    height: 41px;
    width: 40px;
}


.mb-1,
.my-1 {
    margin-bottom: 0.75rem !important;
}

.border-top {
    border-top: 1px solid #ffffff00 !important;
}

.border-top:checked+label {
    border-top: 1px solid #141414 !important;
}


.discount-price {
    font-size: 10px;
    color: red;
    font-weight: 500;
    font-style: italic;
    text-decoration: line-through
}

.icon-diamondx {
    height: 4.6rem;
}

.accordion-button iconify-icon.pl-1 {
    transform: rotateX(177deg);
    transition: 0.2s ease;
}

.accordion-button.collapsed iconify-icon.pl-1 {
    transform: rotateX(0deg);
    transition: 0.2s ease;
}

.single-payment .radio-nominal+label[for="method-balance"], .single-payment .radio-nominal+label[for="method-2"] {
    padding-bottom: 20px;
    padding-top: 20px;
    border: 2px solid transparent;
    border-radius: 6px;
}

.method-accordion .accordion-button {
    padding: 0px 0px;
}

.radio-nominal+label .row .col-1 .rounded-radio svg circle {
    fill: #0000;
    transition: 0.3s ease;
}

.radio-nominal:checked+label .row .col-1 .rounded-radio svg circle {
    fill: var(--warna_4);
}

.bg-banner {
    width: 100%;
    height: 480px;
}

.container-min-banner {
    margin-top: -380px;
}

@media (max-width:480px) {
    .bg-banner {
        width: 100%;
        height: 425px;
    }

    .harga-price-method {
        font-weight: 600;
        font-size: 11px;
    }

    .text-method {
        font-size: 13px;
    }
}

button.accordion-button {
    outline: none !important;
    border: 1px solid #0000;
    background-color: var(--warna_6);
    border-radius: 6px;
    padding: 7px 20px;
    font-weight: 600;
}

@media (min-width:481px) {
    .bg-banner {
        width: 100%;
        height: 425px;
    }

    button.accordion-button {
         padding: 7px 20px; 
    }

    .harga-price-method {
        font-weight: 600;
        font-size: 14px;
    }
}

.total-price-box {
    position: fixed;
    width: 100%;
    bottom: 0;
    background: var(--warna_4);
    z-index: 999;
    padding: 10px 10px;
}

#nominal-text {
    font-size: 16px;
}

.btn-beli {
    background: linear-gradient(180deg, #2D2D2D 0%, #2D2D2D 0.01%, #232323 100%);
    border-radius: 10px;
    font-size: 12px;
    padding: 9px 9px 9px 19px;
}

.flex-col {
    flex-direction: column;
}
</style>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-4 pb-5">
    <div class="content" style="min-height: 580px;">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?= $this->include('header-user'); ?>
            <div class="col-sm-6">

                
                <?php if ($users['level'] == 'Member'): ?>
                <div class="section card-body rounded-2xl flex justify-between items-center bg-blue mb-4">
                    <div class="row" style="align-items: baseline;">
                        <div class="pl-4">
                            <i class="fa fa-info-circle" aria-hidden="true" width="30px" class="gap-4"></i>
                        </div>
                        <div class="col">
                            <p style="color: var(--warna_5) !important;">Hi <strong>
                                    <?= $users['username']; ?>
                                </strong>, Kamu
                                belum memiliki paket Reseller, <strong>Upgrade Reseller</strong> sekarang untuk
                                mendapatkan harga produk yang lebih murah!. <strong>*Upgrade Reseller yang sudah dibayar tidak
                                    bisa dikembalikan*</strong></p>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <div class="pb-4">
                    <div class="float-right mt-2">
                        <a href="<?= base_url(); ?>/user/membership/riwayat">
                            <h6 style="color: var(--warna_5);"><i class="fa fa-history mr-2"></i> Riwayat</h6>
                        </a>
                    </div>
                    <h5>Upgrade Reseller</h5>
                    <span class="strip-primary"></span>
                </div>
                
                <div class="pt-3 pb-3" hidden>
				    <a href="<?= base_url(); ?>/user" class="btn btn-warning btn-block" style="font-weight: 600;width:10rem">Kembali</a>
				</div>
				
				<?= alert(); ?>

                <div class="pb-3">
                    <div class="section rounded-2xl">
                        <div class="card-body rounded-2xl">
                            <div class="col-12 pb-3 items-center border-b">
                                <a id="judulgame" style="font-size:1.1rem;font-weight:600;">Upgrade Reseller </a>
                            </div>
                            <div class="card-body">
                                <div class="row pt-3 mb-2  pl-3 pr-3">
                                    <?php if ($users['level'] == 'Platinum'): ?>
                                          <style>
                                            #div-product-Platinum {
                                                  display:none !important;
                                              }
                                          </style>
                                    <?php endif ?>
                                    <?php if ($users['level'] == 'Gold'): ?>
                                          <style>
                                              #div-product-Gold {
                                                  display:none !important;
                                              }
                                          </style>
                                    <?php endif ?>
                                    <?php if ($users['level'] == 'Silver'): ?>
                                          <style>
                                              #div-product-Silver {
                                                  display:none !important;
                                              }
                                          </style>
                                    <?php endif ?>
                                    
                                    <?php foreach ($level as $loop): ?>
                                    <div class="col-sm-6 col-12" id="div-product-<?= $loop['level']; ?>" style="padding: 0px 5px 0px 5px;display: flex;">
                                        <input type="radio" for="product-<?= $loop['level']; ?>" id="product-<?= $loop['level']; ?>" class="radio-nominale"
                                            name="product" value="<?= $loop['level']; ?>" onchange="get_price(this.value);">
                                        <label class="rounded-2xl" for="product-<?= $loop['level']; ?>"
                                            style="display: flex;justify-content: space-between;  place-items: center;padding:1.5rem;">
                                            <div>
                                                <a style="display: flex;font-weight: bold;font-size: 16px;"
                                                    for="product-<?= $loop['level']; ?>"><?= $loop['alias']; ?></a>
                                                <a style="font-style: italic;;font-size: 13px;">
                                                   <?= 'Rp ' . number_format($loop['price'], 0, ',', '.'); ?>
                                                </a>
                                            </div>
                                            <img onerror="this.style.display='none'"
                                                src="<?= base_url(); ?>/assets/images/<?= $loop['image']; ?>" loading="lazy"
                                                class="icon-diamondx pr-3">
                                            </input>
                                        </label>
                                    </div>
                                   <?php endforeach ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="section section-game"
                        style="border: 0px;box-shadow: none!important;background:var(--warna_2);">
                        <div class="body-games shadow-form">
                            <h5>Pilih Pembayaran</h5>
                            <?php if ($pay_balance === 'Y'): ?>
                            <div class="mt-3 mb-3" id="bsaldo">
                                <div class="accordion-button single-payment">
                                    <input class="radio-nominal" type="radio" name="method" value="balance"
                                        id="method-balance">
                                    <label for="method-balance" class="mb-0">
                                        <div class="row">
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <div class="pb-0">
                                                    <img src="<?= base_url(); ?>/assets/images/new-assets/HIDDENPAY1.webp" width="40px" class="mx-auto d-block bhahah"></img>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <div>
                                                    <div> HiddenPay</div>
                                                    <div style="color: var(--warna_4);">Saldo: Rp
                                                        <?= number_format($users['balance'], 0, ',', '.'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="mt-2 text-right">
                                                    <p class="mb-2 harga-price-method" id="price-method-balance"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <?php endif ?>
                            
                                <?php
                                $count = 0;
                                foreach ($accordion_data as $category => $methods):
                                    $count++;
                                    ?>
                                <?php if ($category === 'QRIS'): ?>
                                <?php foreach ($methods as $method): ?>
                                <div class="mt-3 mb-3" id="bbank">
                                    <div class="accordion-button single-payment">
                                        <input class="radio-nominal" type="radio" name="method"
                                            value="<?= $method['id']; ?>" id="method-<?= $method['id']; ?>">
                                        <label for="method-<?= $method['id']; ?>"
                                            id="method-<?= $method['id']; ?>-label" class="mb-0">
                                            <div class="row">
                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                                    <div class="pb-0">
                                                        <img src="<?= base_url(); ?>/assets/images/new-assets/qris-white.svg" width="100%" style="
    filter: invert(1);
">
                                                    </div>
                                                </div>

                                                <div class="col-4 d-flex align-items-center">
                                                    <div> <?= $category; ?></div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="mt-2 text-right">
                                                        <p class="mb-2 harga-price-method"
                                                            id="price-method-<?= $method['id']; ?>"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else:?>
                                <div class="accordion-item mb-3 boks">
                                    <h2 class="accordion-header mb-0" id="heading-bank">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse<?= $count; ?>"
                                            aria-expanded="false" aria-controls="collapse<?= $count; ?>"
                                            aria-labelledby="<?= $count; ?>" data-bs-parent="#bbank">
                                            <div class="left">
                                                <?php if ($category == 'Bank Transfer'): ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/mdi_bank.svg"
                                                    class="mr-3" style="
    filter: invert(1);
"></img>&nbsp<?= $category; ?>
                                                <?php elseif ($category == 'Virtual Account'): ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/vabank-white.svg"
                                                    class="mr-3" style="
    filter: invert(1);
"></img>&nbsp<?= $category; ?>
                                                <?php elseif ($category == 'E-Wallet'): ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/e-wallet.svg"
                                                    class="mr-3" style="
    filter: invert(1);
"></img>&nbsp<?= $category; ?>
                                                <?php elseif ($category == 'Convenience Store'): ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/store.svg"
                                                    class="mr-3" style="
    filter: invert(1);
"></img>&nbsp<?= $category; ?>
                                                <?php elseif ($category == 'Pulsa'): ?>
                                                <img src="<?= base_url(); ?>/assets/images/new-assets/cell-phone.png"
                                                    class="mr-3" width="23" style="
    filter: invert(1);
"></img>&nbsp<?= $category; ?>
                                                <?php endif ?>
                                            </div>
                                            <iconify-icon class="pl-1" inline icon="subway:down-2"
                                                style="margin-left: auto;"></iconify-icon>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $count; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="heading<?= $count; ?>" data-bs-parent="#bbank">
                                        <div class="accordion-body">

                                            <?php foreach ($methods as $method): ?>
                                            <div class="method-accordion mb-0" id="bbank">
                                                <button class="accordion-button">
                                                    <input class="radio-nominal" type="radio" name="method"
                                                        value="<?= $method['id']; ?>" id="method-<?= $method['id']; ?>">
                                                    <label for="method-<?= $method['id']; ?>"
                                                        id="method-<?= $method['id']; ?>-label" class="mb-0">
                                                        <div class="row">
                                                            <div class="col-1 d-flex align-items-center pr-4">
                                                                <div class="rounded-radio mr-2 pb-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="12" viewBox="0 0 12 12" fill="none">
                                                                        <circle cx="6" cy="6" r="5.77941" stroke="white"
                                                                            stroke-width="0.441176" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 pl-0 d-flex align-items-center">
                                                                <div class="mr-2 pb-0">
                                                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>"
                                                                        class="mr-3" width=" 60px"></img>
                                                                </div>
                                                            </div>

                                                            <div class="col-3 d-flex align-items-center px-0">
                                                                <div class="text-method"> <?= $method['method']; ?>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-4 p-0 d-flex align-items-center justify-content-end">
                                                                <div class="mr-2 mt-2">
                                                                    <p class="mb-2 harga-price-method"
                                                                        id="price-method-<?= $method['id']; ?>"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </button>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            
                            <!--<div class="d-flex gap-2 pt-5">-->
                            <!--    <h5>Kode Voucher</h5><i style="opacity:0.5"> (Opsional)</i>-->
                            <!--</div>-->
                            <!--<div class="form-group pt-3">-->
                            <!--    <input type="text" name="voucher" placeholder="Masukkan kode voucher"-->
                            <!--        class="form-control w-80">-->
                            <!--    <div class="d-flex justify-content-end">-->
                            <!--        <button class="btn btn-primary mt-3 d-flex align-items-center gap-2" type=" button"-->
                            <!--            onclick="cek_voucher();"><svg xmlns="http://www.w3.org/2000/svg" width="16"-->
                            <!--                height="12" viewBox="0 0 16 12" fill="none">-->
                            <!--                <path-->
                            <!--                    d="M2 0C1.60218 0 1.22064 0.158035 0.93934 0.43934C0.658035 0.720644 0.5 1.10218 0.5 1.5V4.5C0.897825 4.5 1.27936 4.65804 1.56066 4.93934C1.84196 5.22064 2 5.60218 2 6C2 6.39782 1.84196 6.77936 1.56066 7.06066C1.27936 7.34196 0.897825 7.5 0.5 7.5V10.5C0.5 10.8978 0.658035 11.2794 0.93934 11.5607C1.22064 11.842 1.60218 12 2 12H14C14.3978 12 14.7794 11.842 15.0607 11.5607C15.342 11.2794 15.5 10.8978 15.5 10.5V7.5C15.1022 7.5 14.7206 7.34196 14.4393 7.06066C14.158 6.77936 14 6.39782 14 6C14 5.60218 14.158 5.22064 14.4393 4.93934C14.7206 4.65804 15.1022 4.5 15.5 4.5V1.5C15.5 1.10218 15.342 0.720644 15.0607 0.43934C14.7794 0.158035 14.3978 0 14 0H2ZM10.625 2.25L11.75 3.375L5.375 9.75L4.25 8.625L10.625 2.25ZM5.6075 2.28C6.3425 2.28 6.935 2.8725 6.935 3.6075C6.935 3.95958 6.79514 4.29723 6.54618 4.54618C6.29723 4.79514 5.95958 4.935 5.6075 4.935C4.8725 4.935 4.28 4.3425 4.28 3.6075C4.28 3.25543 4.41986 2.91777 4.66882 2.66882C4.91777 2.41986 5.25543 2.28 5.6075 2.28ZM10.3925 7.065C11.1275 7.065 11.72 7.6575 11.72 8.3925C11.72 8.74457 11.5801 9.08223 11.3312 9.33118C11.0822 9.58014 10.7446 9.72 10.3925 9.72C9.6575 9.72 9.065 9.1275 9.065 8.3925C9.065 8.04042 9.20486 7.70277 9.45382 7.45382C9.70277 7.20486 10.0404 7.065 10.3925 7.065Z"-->
                            <!--                    fill="#333333" />-->
                            <!--            </svg> Gunakan Voucher</button>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>

                <div class="pb-3" hidden>
                    <div class="section">
                        <div class="card-body rounded-2xl">
                            <div class="col-12 pb-3 items-center border-b">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                    height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                                    </path>
                                </svg>
                                <a id="judulgame" style="font-size:1.1rem;font-weight:600;" class="pl-2">Informasi
                                    Pembayaran </a>
                            </div>
                            <div class="card-body">
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <h5 class="font-bold">Detail</h5>
                                </div>
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <dt class="text-sm font-medium">Harga Upgrade Reseller</dt>
                                    <dd class="mt-1 text-sm font-bold sm:col-span-2 sm:mt-0">Rp 500.000</dd>
                                </div>
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <dt class="text-sm font-medium">Sistem Pembayaran</dt>
                                    <dd class="mt-1 text-sm font-bold sm:col-span-2 sm:mt-0"
                                        style="color: var(--warna_3)">Manual</dd>
                                </div>
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <dt class="text-sm font-medium">Total Pembayaran</dt>
                                    <dd class="mt-1 text-sm font-bold sm:col-span-2 sm:mt-0">Rp 502.500</dd>
                                </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-3 pt-3 text-center">
                    <button type="button" class="btn btn-primary" onclick="process_order();">Upgrade Reseller Sekarang
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="modal fade" id="modal-detail">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content animated bounceIn" style="background: var(--warna_2);">
                            <div class="card-header border-bottom-0">
                                <h5 class="">Detail Pembelian</h5>
                            </div>
                            <div class="modal-body pt-0">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-loading" >
                    <div class="modal-dialog modal-dialog-centered text-center" style="max-width: 100px;">
                        <img src="<?= base_url(); ?>/assets/images/loading.gif" alt="" width="150"
                            style="border-radius: 40px;">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
<input type="hidden" id="product_id" value="0">
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
                        <script>
                // Menambahkan event listener untuk menyimpan nilai input pada setiap perubahan
                document.querySelectorAll('input[name="user_id"], input[name="zone_id"], input[name="email_order"]').forEach(function(input) {
                  input.addEventListener('input', function() {
                    var gameName = '<?= $games['games']; ?>'; // Ambil nama game dari halaman yang sedang dimuat
                    localStorage.setItem(gameName + '-' + this.name, this.value);
                  });
                });
                
                // Memuat nilai terakhir yang disimpan pada saat halaman dimuat
                window.addEventListener('load', function() {
                  var gameName = '<?= $games['games']; ?>'; // Ambil nama game dari halaman yang sedang dimuat
                  document.querySelectorAll('input[name="user_id"], input[name="zone_id"], input[name="email_order"]').forEach(function(input) {
                    var savedValue = localStorage.getItem(gameName + '-' + input.name);
                    if (savedValue) {
                      input.value = savedValue;
                    }
                  });
                });
            </script>
<script type="text/javascript">
$(document).ready(function() {
    // Set the initial price
    var initialPrice = $('input[name="product"]:checked').siblings('label').find('.currency-idr').text();
    $('#nominal-text').text(initialPrice);

    // Handle product radio button change event
    $('input[name="product"]').on('change', function() {
        // Check if the radio button is checked
        if ($(this).is(':checked')) {
            // Get the price from the selected product
            var price = $(this).siblings('label').find('.currency-idr').text();
            // Set the price to the nominal-text element if method radio button is not checked
            if (!$('input[name="method"]').is(':checked')) {
                $('#nominal-text').text(price);
            }
        }
    });

    // Handle method radio button change event
    $('input[name="method"]').on('change', function() {
        // Check if the radio button is checked
        if ($(this).is(':checked')) {
            // Get the price from the selected method
            var price = $(this).siblings('label').find('.harga-price-method').text();
            // Set the price to the nominal-text element
            $('#nominal-text').text(price);
        }
    });

    // Observe changes to harga-price-method elements using MutationObserver
    var hargaPriceMethodObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            // Get the changed price element
            var changedPriceElement = $(mutation.target);
            // Check if the changed price element is part of the selected method radio button
            if (changedPriceElement.parents('label').siblings('input[name="method"]').is(
                    ':checked')) {
                // Get the new price from the changed price element
                var newPrice = changedPriceElement.text();
                // Set the price to the nominal-text element
                $('#nominal-text').text(newPrice);
            }
        });
    });

    // Observe all harga-price-method elements for changes
    $('.harga-price-method').each(function() {
        hargaPriceMethodObserver.observe(this, {
            subtree: true,
            characterData: true,
            childList: true
        });
    });
});

// Helper function to parse number from string
function parseNumber(str) {
    return parseInt(str.replace(/[^\d]/g, ''));
}
</script>

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
  fbq('track', 'ViewContent');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={938473200580408}&ev=ViewContent&noscript=1"/>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={9532506813488688}&ev=ViewContent&noscript=1"/>
       <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={584979920420062}&ev=ViewContent&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


<script>
// Get the value of the diamonds parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const diamonds = urlParams.get('diamonds');

// If the diamonds parameter is present, find the corresponding radio button and check it
if (diamonds) {
    const radio = document.querySelector(`input[type=radio][value="${diamonds}"]`);
    if (radio) {
        radio.checked = true;
        // Scroll to the selected product
        const productDiv = radio.closest('.col-sm-4');
        if (productDiv) {
            const rect = productDiv.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            if (rect.bottom > windowHeight) {
                // The bottom of the product div is below the bottom of the viewport,
                // so adjust the scroll position to align the bottom of the div with
                // the bottom of the viewport
                window.scrollTo(0, window.scrollY + rect.bottom - windowHeight);
            } else if (rect.top < 0) {
                // The top of the product div is above the top of the viewport,
                // so adjust the scroll position to align the top of the div with
                // the top of the viewport
                window.scrollTo(0, window.scrollY + rect.top);
            }
        }
    }
}
</script>

<script>
<!-- 
var enableDisable = function() {
    var UTC_hours = new Date().getUTCHours(); //Don't add 1 here       
    var day = new Date().getUTCDay(); //Use UTC here also

    if (day != 1 && UTC_hours >= 15 && UTC_hours < 20) {
        $('#price-method-3').replaceWith("Bank sedang offline, kembali online pukul 03.00 WIB");

        $('#method-3-label').addClass('cutoffbank');



    } else {
        $('#method-3-label').removeClass('cutoffbank');
    }
};

setInterval(enableDisable, 1000 * 60);
enableDisable();
// 
-->
</script>
<script>
$('.currency-idr').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(monetary_value);
    $(this).text(i);
});

$('.currency-idr-2').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(monetary_value);
    $(this).text(i);
});

function parseNumber(strg) {
    var strg = strg || "";
    var decimal = '.';
    strg = strg.replace(/[^0-9$.,]/g, '');
    if (strg.indexOf(',') > strg.indexOf('.')) decimal = ',';
    if ((strg.match(new RegExp("\\" + decimal, "g")) || []).length > 1) decimal = "";
    if (decimal !== "" && (strg.length - strg.indexOf(decimal) - 1 == 3) && strg.indexOf("0" + decimal) !== 0) decimal =
        "";
    strg = strg.replace(new RegExp("[^0-9$" + decimal + "]", "g"), "");
    strg = strg.replace(',', '.');
    return parseFloat(strg);
}



function get_price(id = null) {

    <?php if ($games['target'] == 'joki'): ?>
    var jumlah = $("#jumlah_star_poin").val();
    <?php elseif ($games['target'] == 'videomontage'): ?>
    var jumlah = $("#jumlah_menit").val();
    <?php else: ?>
    var jumlah = 1;
    <?php endif; ?>


    $("#product_id").val(id);

    $.ajax({
        url: '<?= base_url(); ?>/user/order/get-price/' + id,
        type: 'POST',
        data: 'jumlah=' + jumlah,
        dataType: 'JSON',
        success: function(result) {
            for (let price in result) {
                $("#price-method-" + result[price].method).text('Rp ' + result[price].price);



            }

        }
    });
}

function update_total() {
    get_price($("#product_id").val());
}

function process_order() {

    var product = $("input[name=product]:checked").val();
    var method = $("input[name=method]:checked").val();

    if (product == '' || product == ' ') {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else if (method == '' || method == ' ') {
        Swal.fire('Gagal', 'Pilih metode pembayaran', 'error');
    } else {
        $.ajax({
            url: '<?= base_url(); ?>/user/order/get-detail/' + product,
            data: 'method=' + method ,
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $("#modal-loading").modal('hide');
            },
            success: function(result) {

                $("#modal-loading").modal('hide');

                if (result.status == true) {
                    $("#modal-detail div div .modal-body").html(result.msg);

                    $("#modal-detail").modal('show');
                } else {
                    Swal.fire('Gagal', result.msg, 'error');
                }
            }
        });
    }
}
</script>
<?php $this->endSection(); ?>