<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
p {
    color: #fff;
}

.mb-1,
.my-1 {
    margin-bottom: 0.75rem !important;
}

.container {
    max-width: 1300px;
}

.h3,
h3 {
    font-size: 25px;
}

.accordion-item {
    border-radius: 7px;
}

button.accordion-button {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

.text-end {
    text-align: right !important;
}

.icon-diamondx {
    height: 2.9rem;
    float: right;
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
    background: var(--warna);
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
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.boks {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 6px;
}

.shadow-form {
    box-shadow: 0 4px 80px hsl(0deg 0% 77% / 13%), 0 1.6711px 33.4221px hsl(0deg 0% 77% / 9%), 0 0.893452px 17.869px hsl(0deg 0% 77% / 8%), 0 0.500862px 10.0172px hsl(0deg 0% 77% / 7%), 0 0.266004px 5.32008px hsl(0deg 0% 77% / 5%), 0 0.11069px 2.21381px hsl(0deg 0% 77% / 4%);
}

.badge {
    display: inline-block;
    padding: 7px 10px;
    font-size: 12px;
    font-weight: 500;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: top;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
}

.items-center {
    display: flex;
    place-items: center;
}

.border-b {
    border-bottom: 1px solid white;
}

.icon-voucher {
    padding-left: 1rem;
    align-items: center;
    left: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    pointer-events: none;
    z-index: 20;
    display: flex;
}

.icon-voucher2 {
    color: rgb(156 163 175);
    width: 1.5rem;
}

.pl-10 {
    padding-left: 3rem;
}

.input-group>.form-control:not(:first-child) {
    border-top-left-radius: 999px;
    border-bottom-left-radius: 999px;
}

.input-group .btn {
    box-shadow: none;
    padding: 0.3rem 1.2rem;
    border-radius: 0px 999px 999px 0px;
}

hr {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    margin: 5px;
}

.banner-games {
    width: -webkit-fill-available;
    height: 14rem;
    object-fit: cover;
}

.col-12+p {
    padding-left: 5px;
    color: #b9b9b9;
    font-size: .735rem !important;
}

.bg-blue {
    background: #bfdbfe;
    color: #1d4ed8 !important;
}

.radio-nominale:checked+label,
.radio-nominal:checked+label {
    background: #c1651d;
    color: #fff;
    filter: grayscale(0%);
    border: 2px solid var(--warna_3) !important;
    border-radius: 0.75rem;
}

@media (min-width: 640px) {
    .sm\:py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rems;
    }
}

@media (min-width: 640px) {
    .sm\:gap-3 {
        gap: 0.75rem;
    }
}

@media (min-width: 640px) {
    .sm\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media (min-width: 640px) {
    .sm\:grid {
        display: grid;
    }
}

@media (min-width: 1024px) {
    .lg\:gap-0 {
        gap: 0;
    }

    .lg\:flex-row {
        flex-direction: row !important;
    }
}


@media (min-width: 768px) {
    md\:gap-0 {
        gap: 0;
    }

    .md\:flex-row {
        flex-direction: row !important;
    }

    .gap-3 {
        gap: 0.75rem;
    }
}

.radio-nominale+label {
    background: linear-gradient(163.42deg, rgb(62, 67, 72) -50%, rgba(255, 255, 255, 0) 105.46%);
    border: 2px solid rgba(185, 185, 185, 0.5) !important;
    border-radius: 0.75rem;
}
</style>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-4 pb-5">
    <div class="container">
        <div class="row">
            <?= $this->include('header-user'); ?>
            <div class="col-lg-9 col-10">

                <?= alert(); ?>
                <?php if ($users['level'] == 'Member'): ?>
                <div class="card-body card-gd rounded-2xl flex justify-between items-center bg-blue mb-4">
                    <div class="row" style="align-items: baseline;">
                        <div class="pl-4">
                            <i class="fa fa-info-circle" aria-hidden="true" width="30px" class="gap-4"></i>
                        </div>
                        <div class="col">
                            <p style="color: #1d4ed8 !important;">Hi <strong>
                                    <?= $users['username']; ?>
                                </strong>, Kamu
                                belum memiliki paket membership, <strong>Upgrade membership</strong> sekarang untuk
                                mendapatkan harga produk yang lebih murah!. <strong>*Membership yang sudah dibayar tidak
                                    bisa dikembalikan*</strong></p>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <div class="pb-4">
                    <div class="float-right mt-2">
                        <a href="<?= base_url(); ?>/user/membership/riwayat">
                            <h6><i class="fa fa-history mr-2"></i> Riwayat</h6>
                        </a>
                    </div>
                    <h5>Upgrade Membership</h5>
                    <span class="strip-primary"></span>
                </div>

                <div class="pb-3">
                    <div class="section">
                        <div class="card-body card-gd rounded-2xl">
                            <div class="col-12 pb-3 items-center border-b">
                                <img src="<?= base_url(); ?>/assets/images/step-one.svg" class="pr-2" />
                                <a id="judulgame" style="font-size:1.25rem;font-weight:600;">Upgrade Membership </a>
                            </div>
                            <div class="card-body">
                                <div class="row pt-3 mb-2  pl-3 pr-3">
                                    
                                    <?php foreach ($level as $loop): ?>
                                    <div class="col-sm-6 col-12" style="padding: 0px 5px 0px 5px;display: flex;">
                                        <input type="radio" for="product-<?= $loop['level']; ?>" id="product-<?= $loop['level']; ?>" class="radio-nominale"
                                            name="product" value="<?= $loop['level']; ?>" onchange="get_price(this.value);">
                                        <label class="card-gd rounded-2xl" for="product-<?= $loop['level']; ?>"
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
                    <div class="section" style="border: 0px;background:var(--warna_2);">
                        <div class="card-body card-gd rounded-2xl">
                            <div class="col-12 pb-3 items-center border-b">
                                <img src="<?= base_url(); ?>/assets/images/step-three.svg" class="pr-2" />
                                <a id="judulgame" style="font-size:1.25rem;font-weight:600;">Pilih Pembayaran </a>
                            </div>
                            <?php if ($pay_balance === 'Y'): ?>
                            <div class="accordion mb-3 mt-3 boks" id="bsaldo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header mb-0" id="heading-saldo">
                                        <button class="accordion-button collapsed"
                                            style="background-color: var(--warna);height: 0;padding: 20px;border-radius: 7px;"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-saldo"
                                            aria-expanded="false" aria-controls="collapse-saldo">
                                            <div class="left font-bold">
                                                <i class="fa fa-address-card"></i> Saldo Akun (Member/Reseller)
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse-saldo" class="accordion-collapse collapse"
                                        aria-labelledby="heading-saldo" data-bs-parent="bsaldo">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-lg-4 ceklis">
                                                    <input class="radio-nominal" type="radio" name="method"
                                                        value="balance" id="method-balance">
                                                    <label for="method-balance">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="pb-0">
                                                                    <img src="<?= base_url(); ?>/assets/images/method/balance.png"
                                                                        class="rounded" style="height: 40px;width:auto">
                                                                    <div class=" mx-1 mt-1">
                                                                        <b class="mb-2"
                                                                            style="font-weight: 500;font-size: .875rem;"
                                                                            id="price-method-balance"></b>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>

                                                            <div style="font-size: .75rem;" class="col-12 ">
                                                                <b class="d-block mb-2 mx-1">Saldo Akun
                                                                    (Member/Reseller)</b>
                                                                <b class="d-block"></b>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 text-end " style="border-radius: 0 0 6px 6px;background: #ffffff;">
                                        <img src="<?= base_url(); ?>/assets/images/method/balance.png" alt=""
                                            height="20" style="border-radius:5px" style="border-radius:5px">
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>


                            <div class="accordion mb-3 mt-3 boks" id="bbank">
                                <?php
                                $count = 0;
                                foreach ($accordion_data as $category => $methods):
                                    $count++;
                                    ?>

                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header mb-0">
                                        <button class="accordion-button collapsed"
                                            style="background-color: var(--warna);height: 0;padding: 20px;border-radius: 7px;"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= $count; ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $count; ?>">
                                            <div class="left font-bold">
                                                <?php if ($category == 'Bank Transfer'): ?>
                                                <i class="fa fa-university"></i>&nbsp
                                                <?= $category; ?>
                                                <?php elseif ($category == 'QRIS'): ?>
                                                <i class="fa fa-barcode"></i> &nbsp
                                                <?= $category; ?>
                                                <?php elseif ($category == 'Virtual Account'): ?>
                                                <i class="fa fa-credit-card-alt"></i>&nbsp
                                                <?= $category; ?>
                                                <?php elseif ($category == 'E-Wallet'): ?>
                                                <i class="fa fa-money"></i>&nbsp
                                                <?= $category; ?>
                                                <?php elseif ($category == 'Convenience Store'): ?>
                                                <i class="fa fa-shopping-basket"></i>&nbsp
                                                <?= $category; ?>
                                                <?php elseif ($category == 'Pulsa'): ?>
                                                <i class="fa fa-phone"></i>&nbsp
                                                <?= $category; ?>
                                                <?php endif ?>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $count; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="heading<?= $count; ?>" data-bs-parent="blok<?= $count; ?>">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <?php foreach ($methods as $method): ?>
                                                <div class="col-lg-4 ceklis" id="metode-<?= $method['id']; ?>">
                                                    <input class="radio-nominal" type="radio" name="method"
                                                        value="<?= $method['id']; ?>" id="method-<?= $method['id']; ?>">
                                                    <label for="method-<?= $method['id']; ?>">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="pb-0">
                                                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>"
                                                                        class="rounded" style="height: 40px;width:auto">
                                                                    <div class=" mx-1 mt-1">
                                                                        <b class="mb-2"
                                                                            style="font-weight: 500;font-size: .875rem;"
                                                                            id="price-method-<?= $method['provider']; ?>-<?= $method['code']; ?><?= $method['tambahan']; ?>" ></b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="font-size: .75rem;" class="col-12">
                                                                <b class="d-block mb-2 mx-1">
                                                                    <?= $method['method']; ?>
                                                                </b>
                                                                <b class="d-block"></b>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <?php endforeach; ?>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 text-end " style="border-radius: 0 0 6px 6px;background: #ffffff;">
                                        <?php foreach ($methods as $method): ?>
                                        <img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>"
                                            alt="" height="20" style="border-radius:5px" style="border-radius:5px">
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-3" hidden>
                    <div class="section">
                        <div class="card-body card-gd rounded-2xl">
                            <div class="col-12 pb-3 items-center border-b">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                                    height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                                    </path>
                                </svg>
                                <a id="judulgame" style="font-size:1.25rem;font-weight:600;" class="pl-2">Informasi
                                    Pembayaran </a>
                            </div>
                            <div class="card-body">
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <h5 class="font-bold">Detail</h5>
                                </div>
                                <div class="flex flex-col gap-2 lg:flex-row justify-between text-start lg:items-center">
                                    <dt class="text-sm font-medium">Harga Membership</dt>
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
                    <button type="button" class="btn btn-primary text-white" onclick="process_order();">Upgrade Membership Sekarang
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
                        <div class="modal-content text-white animated bounceIn" style="background: var(--warna_2);">
                            <div class="card-header border-bottom-0">
                                <h5 class="text-white">Detail Pembelian</h5>
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

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>



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



    $("#product_id").val(id);

    $.ajax({
        url: '<?= base_url(); ?>/user/order/get-price/' + id,
        type: 'POST',
        data: '',
        dataType: 'JSON',
        success: function(result) {
            for (let price in result) {
                $("#price-method-" + result[price].method).text('Rp ' + result[price].price);

               var harga = parseNumber(result[price].price);

                var balance = document.getElementById("price-method-balance");

                var BCATransfer = document.getElementById("price-method-Manual-BCATransfer");
                var BNITransfer = document.getElementById("price-method-Manual-BNITransfer");
                var BRITransfer = document.getElementById("price-method-Manual-BRITransfer");
                var MandiriTransfer = document.getElementById("price-method-Manual-MandiriTransfer");

                var qrisc = document.getElementById("price-method-Tripay-QRISC");
                var qris1 = document.getElementById("price-method-Tripay-QRIS");
                var ovo = document.getElementById("price-method-Tripay-OVO");
                var shopee = document.getElementById("price-method-Tripay-SHOPEEPAY");
                var vabsi = document.getElementById("price-method-Tripay-BSIVA");
                var vabni = document.getElementById("price-method-Tripay-BNIVA");
                var vapermata = document.getElementById("price-method-Tripay-PERMATAVA");
                var vamandiri = document.getElementById("price-method-Tripay-MANDIRIVA");
                var vabri = document.getElementById("price-method-Tripay-BRIVA");
                var vabca = document.getElementById("price-method-Tripay-BCAVA");
                var indomaret = document.getElementById("price-method-Tripay-INDOMARET");
                var alfamart = document.getElementById("price-method-Tripay-ALFAMART");
                var alfamidi = document.getElementById("price-method-Tripay-ALFAMIDI");


                var qrisd = document.getElementById("price-method-Duitku-LQ");
                var ovod = document.getElementById("price-method-Duitku-OV");
                var danad = document.getElementById("price-method-Duitku-DA");
                var shopeed = document.getElementById("price-method-Duitku-SA");
                var linkajad = document.getElementById("price-method-Duitku-LA");
                var vaatmd = document.getElementById("price-method-Duitku-A1");
                var vabnid = document.getElementById("price-method-Duitku-I1");
                var dvabri = document.getElementById("price-method-Duitku-BR");
                var vamayd = document.getElementById("price-method-Duitku-VA");
                var vapermatad = document.getElementById("price-method-Duitku-BT");
                var vacimbd = document.getElementById("price-method-Duitku-B1");
                var vaagd = document.getElementById("price-method-Duitku-AG");
                var vabncd = document.getElementById("price-method-Duitku-NC");
                var alfamartd = document.getElementById("price-method-Duitku-FT");
                var vamandirid = document.getElementById("price-method-Duitku-M1");

                var qrislq = document.getElementById("price-method-Linkqu-QRIS");
                var ovolq = document.getElementById("price-method-Linkqu-PAYOVO");
                var danalq = document.getElementById("price-method-Linkqu-PAYDANA");
                var shopeelq = document.getElementById("price-method-Linkqu-PAYSHOPEE");
                var linkajalq = document.getElementById("price-method-Linkqu-PAYLINKAJA");
                var alfamartlq = document.getElementById("price-method-Linkqu-ALFAMART");
                var indomaretlq = document.getElementById("price-method-Linkqu-INDOMARET");
                var vapermatalq = document.getElementById("price-method-Linkqu-013");
                var vacimblq = document.getElementById("price-method-Linkqu-022");
                var vadanamonq = document.getElementById("price-method-Linkqu-011");
                var vamandirilq = document.getElementById("price-method-Linkqu-008");
                var vabrilq = document.getElementById("price-method-Linkqu-002");
                var vaneolq = document.getElementById("price-method-Linkqu-490");
                var vabsilq = document.getElementById("price-method-Linkqu-451");
                var vabnilq = document.getElementById("price-method-Linkqu-009");
                var vabcalq = document.getElementById("price-method-Linkqu-014");
                var vamaybanklq = document.getElementById("price-method-Linkqu-016");


                var qrisx = document.getElementById("price-method-Xendit-ID_DANAqris");
                var ovox = document.getElementById("price-method-Xendit-ID_OVO");
                var danax = document.getElementById("price-method-Xendit-ID_DANAewallet");
                var shopeex = document.getElementById("price-method-Xendit-ID_SHOPEEPAY");
                var linkajax = document.getElementById("price-method-Xendit-ID_LINKAJA");
                var astrapayx = document.getElementById("price-method-Xendit-ID_ASTRAPAY");
                var vabcax = document.getElementById("price-method-Xendit-BCA");
                var vabnix = document.getElementById("price-method-Xendit-BNI");
                var vamandirix = document.getElementById("price-method-Xendit-MANDIRI");
                var vabrix = document.getElementById("price-method-Xendit-BRI");
                var vapermatax = document.getElementById("price-method-Xendit-PERMATA");
                var vaBJBx = document.getElementById("price-method-Xendit-BJB");
                var vaBSIx = document.getElementById("price-method-Xendit-BSI");
                var vaSAHABAT_SAMPOERNA = document.getElementById("price-method-Xendit-SAHABAT_SAMPOERNA");
                var indomaretx = document.getElementById("price-method-Xendit-INDOMARET");
                var alfamartx = document.getElementById("price-method-Xendit-ALFAMART");

                

                if (qrisd !== null) {
                    qrisd.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovod !== null) {
                    ovod.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (danad !== null) {
                    danad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (shopeed !== null) {
                    shopeed.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (linkajad !== null) {
                    linkajad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (vaatmd !== null) {
                    vaatmd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vaagd !== null) {
                    vaagd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabncd !== null) {
                    vabncd.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                }
                if (vabnid !== null) {
                    vabnid.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (dvabri !== null) {
                    dvabri.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vamayd !== null) {
                    vamayd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vapermatad !== null) {
                    vapermatad.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vacimbd !== null) {
                    vacimbd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (alfamartd !== null) {
                    alfamartd.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vamandirid !== null) {
                    vamandirid.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                }

                if (qrisx !== null) {
                    qrisx.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovox !== null) {
                    ovox.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (shopeex !== null) {
                    shopeex.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (danax !== null) {
                    danax.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (linkajax !== null) {
                    linkajax.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (astrapayx !== null) {
                    astrapayx.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (vabnix !== null) {
                    vabnix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vapermatax !== null) {
                    vapermatax.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vamandirix !== null) {
                    vamandirix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vabrix !== null) {
                    vabrix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vabcax !== null) {
                    vabcax.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaBJBx !== null) {
                    vaBJBx.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaBSIx !== null) {
                    vaBSIx.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaSAHABAT_SAMPOERNA !== null) {
                    vaSAHABAT_SAMPOERNA.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (indomaretx !== null) {
                    indomaretx.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }
                if (alfamartx !== null) {
                    alfamartx.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }

                if (qrislq !== null) {
                    qrislq.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovolq !== null) {
                    ovolq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (danalq !== null) {
                    danalq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (shopeelq !== null) {
                    shopeelq.innerHTML = 'Rp ' + (Math.round(harga * 1.023) + 1000).toLocaleString('id-ID');
                }
                if (linkajalq !== null) {
                    linkajalq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (alfamartlq !== null) {
                    alfamartlq.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                }
                if (indomaretlq !== null) {
                    indomaretlq.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                }
                if (vapermatalq !== null) {
                    vapermatalq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vacimblq !== null) {
                    vacimblq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vadanamonq !== null) {
                    vadanamonq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vamandirilq !== null) {
                    vamandirilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabrilq !== null) {
                    vabrilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vaneolq !== null) {
                    vaneolq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabsilq !== null) {
                    vabsilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabnilq !== null) {
                    vabnilq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vabcalq !== null) {
                    vabcalq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vamaybanklq !== null) {
                    vamaybanklq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }


                if (BCATransfer !== null) {
                    BCATransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (BNITransfer !== null) {
                    BNITransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (BRITransfer !== null) {
                    BRITransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (MandiriTransfer !== null) {
                    MandiriTransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }

                if (qrisc !== null) {
                    qrisc.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 800)).toLocaleString('id-ID');
                }
                if (qris1 !== null) {
                    qris1.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 750)).toLocaleString('id-ID');
                }
                if (ovo !== null) {
                    ovo.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (shopee !== null) {
                    shopee.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (vabsi !== null) {
                    vabsi.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabni !== null) {
                    vabni.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabca !== null) {
                    vabca.innerHTML = 'Rp ' + (Math.round(harga + 5500)).toLocaleString('id-ID');
                }
                if (vapermata !== null) {
                    vapermata.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vamandiri !== null) {
                    vamandiri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabri !== null) {
                    vabri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (indomaret !== null) {
                    indomaret.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (alfamart !== null) {
                    alfamart.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }
                if (alfamidi !== null) {
                    alfamidi.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }



            }

        }
    });
}

function update_total() {
    get_price($("#product_id").val());
}

function nonaktif_button() {
    document.getElementById('1xorder').style.visibility = 'hidden';
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