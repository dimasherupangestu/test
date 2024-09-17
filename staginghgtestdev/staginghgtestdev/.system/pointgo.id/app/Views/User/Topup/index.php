<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<!-- Facebook Pixel Code -->

<!-- End Facebook Pixel Code -->
<style>
.cutoffbank {
filter: grayscale(1);
pointer-events: none;

}

body {
    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
    background-size: contain;
}

.cutoffbank p {
font-size: 10px !important;
line-height: 13px;
margin-bottom: 0.5rem !important;
margin-right: 1rem !important;
margin-left: 1rem !important;
font-weight: 600;
}


button.accordion-button.single-payment:focus {
border: 1px solid var(--warna_4);
box-shadow: 0 0 200px rgb(123 172 103 / 47%) inset;
transition: 0.3s ease;
}

.accordion-button[aria-expanded="true"] {
border: 1px solid var(--warna_4);
box-shadow: 0 0 200px rgb(123 172 103 / 47%) inset;
border-bottom-left-radius: 0px;
border-bottom-right-radius: 0px;
}

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


.boks {
box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
border-radius: 6px;
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
box-shadow: 0 0 200px rgb(123 172 103 / 47%) inset !important;
transition: 0.3s ease;
}

.accordion-button[aria-expanded="true"] {
border: 1px solid var(--warna_4);
box-shadow: 0 0 200px rgb(123 172 103 / 47%) inset;
border-bottom-left-radius: 0px;
border-bottom-right-radius: 0px;
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

@media (max-width:480px) {
.harga-price-method {
    font-weight: 600;
    font-size: 11px;
}

.text-method {
    font-size: 8px;
}
}

@media (min-width:481px) {
button.accordion-button {
    /* padding: 7px 20px; */
}

.harga-price-method {
    font-weight: 600;
    font-size: 14px;
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
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content" style="min-height: 580px;">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <?= $this->include('header-user'); ?>
            <div class="col-sm-6">
                <a class="box-back" onclick="goBack()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.4375 18.75L4.6875 12L11.4375 5.25M5.625 12H19.3125" stroke="var(--warna_4)"
                            stroke-opacity="0.6" stroke-width="2.15625" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
                <?= alert(); ?>
                <div class="pb-3">
                    <div class="section">
                        <div class="body-games shadow-form">
                            <div class="position-absolute mt-1" style="right: 35px;">
                                <a href="<?= base_url(); ?>/user/topup/riwayat?status=Pending">
                                    <h6 class=" text-secondary-pointgo"><i class="fa fa-history mr-2"></i> Riwayat
                                    </h6>
                                </a>
                            </div>
                            <h5 class="text-center pb-4">Top-up</h5>

                            <form action="" method="POST" onsubmit="handleFormSubmit(event);">
                                <div class="form-group">
                                    <label class="text-dark">Nominal Topup</label>
                                    <input type="number" step="10000" class="form-control" autocomplete="off" name="nominal"
                                        placeholder="Masukkan Nominal" >
                                        <small class="text-warning">* Nominal harus merupakan kelipatan 10.000</small>
                                </div>
                                
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
                                                    <div class="col-3 pl-0 d-flex align-items-center">
                                                        <div class="mr-2 pb-0">
                                                            <!--<img src="<?= base_url(); ?>/assets/images/new-assets/qris-white.svg"-->
                                                            <!--    class="mr-3 ml-3" style="fill: invert(1);"></img>-->
                                                                <svg class="mr-3 ml-3" width="66" height="24" viewBox="0 0 66 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_558_1884)">
                                                                <path d="M62.369 14.7097V12.6441V8.51613H56.1755H52.0475V6.45058H62.369V2.32258H52.0475H45.8539V6.45058V8.51613V12.6441H52.0475H56.1755V14.7097H45.8539V18.8377H56.1755H62.369V14.7097ZM64.001 13.4183V20.129C64.001 20.2653 63.9453 20.3985 63.8493 20.4945C63.7533 20.5905 63.6201 20.6462 63.4839 20.6462H56.7732V21.6774H64.5151C64.6514 21.6774 64.7845 21.6217 64.8805 21.5257C64.9765 21.4297 65.0323 21.2965 65.0323 21.1603V13.4183H64.001ZM8.2591 0H0.517161C0.380903 0 0.247742 0.0557419 0.151742 0.151742C0.0557419 0.247742 0 0.380903 0 0.517161V8.2591H1.03123V1.54839C1.03123 1.41213 1.08697 1.27897 1.18297 1.18297C1.27897 1.08697 1.41213 1.03123 1.54839 1.03123H8.2591V0ZM14.8862 24H19.0142V14.7097H14.8862V24ZM18.5001 2.32258H8.69265V6.45058H14.8862V12.6441H19.0142V2.83665C19.0142 2.70039 18.9585 2.56723 18.8625 2.47123C18.7665 2.37523 18.6333 2.31948 18.497 2.31948L18.5001 2.32258ZM6.63019 2.32258H3.01626C2.88 2.32258 2.74684 2.37832 2.65084 2.47432C2.55484 2.57032 2.4991 2.70348 2.4991 2.83974V18.3236C2.4991 18.4599 2.55484 18.593 2.65084 18.689C2.74684 18.785 2.88 18.8408 3.01626 18.8408H12.8237V14.7128H6.63019V2.32568V2.32258ZM8.69574 12.6441H12.8237V8.51613H8.69574V12.6441ZM9.72697 9.54735H11.7925V11.6129H9.72697V9.54735ZM21.0828 2.32258V6.45058H33.4699V8.51613H25.2108H21.0828V12.6441V18.8377H25.2108V12.7061L31.4044 18.8377H37.5979L31.135 12.6441H33.4668H37.5948V8.51613V6.45058V2.32258H33.4668H21.0797H21.0828ZM39.6635 18.8377H43.7915V2.32258H39.6635V18.8377Z" fill=" #92C154"/>
                                                                </g>
                                                                <defs>
                                                                <clipPath id="clip0_558_1884">
                                                                <rect width="65.0323" height="24" fill="#92C154"/>
                                                                </clipPath>
                                                                </defs>
                                                                </svg>

                                                        </div>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center">
                                                        <div> <?= $category; ?></div>
                                                    </div>
                                                    <div class="col-5 p-0">
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
	                                                        lass="mr-3"style="filter: invert(1);"></img>&nbsp<?= $category; ?>
                                                    <?php elseif ($category == 'Virtual Account'): ?>
                                                    <!--<img src="<?= base_url(); ?>/assets/images/new-assets/vabank-white.svg"-->
	                                                   <!--     lass="mr-3"style="filter: invert(1);"></img>&nbsp<?= $category; ?>-->
	                                                   <svg class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_558_1933)">
                                                        <path d="M22 10V17C22 17.7956 21.6839 18.5587 21.1213 19.1213C20.5587 19.6839 19.7956 20 19 20H5C4.20435 20 3.44129 19.6839 2.87868 19.1213C2.31607 18.5587 2 17.7956 2 17V10H22ZM18 14H15C14.7348 14 14.4804 14.1054 14.2929 14.2929C14.1054 14.4804 14 14.7348 14 15C14 15.2652 14.1054 15.5196 14.2929 15.7071C14.4804 15.8946 14.7348 16 15 16H18C18.2652 16 18.5196 15.8946 18.7071 15.7071C18.8946 15.5196 19 15.2652 19 15C19 14.7348 18.8946 14.4804 18.7071 14.2929C18.5196 14.1054 18.2652 14 18 14ZM19 4C19.7956 4 20.5587 4.31607 21.1213 4.87868C21.6839 5.44129 22 6.20435 22 7V8H2V7C2 6.20435 2.31607 5.44129 2.87868 4.87868C3.44129 4.31607 4.20435 4 5 4H19Z" fill="#92C154"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_558_1933">
                                                        <rect width="24" height="24" fill="#92C154"/>
                                                        </clipPath>
                                                        </defs>
                                                        </svg> &nbsp<?= $category; ?>

                                                    <?php elseif ($category == 'E-Wallet'): ?>
                                                    <!--<img src="<?= base_url(); ?>/assets/images/new-assets/e-wallet.svg"-->
	                                                   <!--     lass="mr-3"style="filter: invert(1);"></img>&nbsp<?= $category; ?>-->
	                                                   <svg class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 4.80002C0 3.48002 1.08 2.40002 2.4 2.40002H20.4C20.7183 2.40002 21.0235 2.52645 21.2485 2.7515C21.4736 2.97654 21.6 3.28176 21.6 3.60002V4.80002H2.4V6.00002H22.8C23.1183 6.00002 23.4235 6.12645 23.6485 6.3515C23.8736 6.57654 24 6.88176 24 7.20002V19.2C24 19.8365 23.7471 20.447 23.2971 20.8971C22.847 21.3472 22.2365 21.6 21.6 21.6H2.4C1.76348 21.6 1.15303 21.3472 0.702944 20.8971C0.252856 20.447 0 19.8365 0 19.2V4.80002ZM19.8 15.6C20.2774 15.6 20.7352 15.4104 21.0728 15.0728C21.4104 14.7353 21.6 14.2774 21.6 13.8C21.6 13.3226 21.4104 12.8648 21.0728 12.5272C20.7352 12.1897 20.2774 12 19.8 12C19.3226 12 18.8648 12.1897 18.5272 12.5272C18.1896 12.8648 18 13.3226 18 13.8C18 14.2774 18.1896 14.7353 18.5272 15.0728C18.8648 15.4104 19.3226 15.6 19.8 15.6Z" fill="#92C154"/>
                                                        </svg> &nbsp<?= $category; ?>

                                                    <?php elseif ($category == 'Convenience Store'): ?>
                                                    <!--<img src="<?= base_url(); ?>/assets/images/new-assets/store.svg"-->
	                                                   <!--     lass="mr-3"style="filter: invert(1);"></img>&nbsp<?= $category; ?>-->
	                                                   <svg class="mr-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 6V4H20V6H4ZM4 20V14H3V12L4 7H20L21 12V14H20V20H18V14H14V20H4ZM6 18H12V14H6V18Z" fill="#92C154"/>
                                                        </svg> &nbsp<?= $category; ?>

                                                    <?php elseif ($category == 'Pulsa'): ?>
                                                    <img src="<?= base_url(); ?>/assets/images/new-assets/cell-phone-green.png"class="mr-3" width="23">
                                                     </img>&nbsp<?= $category; ?>
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
                                                            value="<?= $method['id']; ?>"
                                                            id="method-<?= $method['id']; ?>">
                                                        <label for="method-<?= $method['id']; ?>"
                                                            id="method-<?= $method['id']; ?>-label" class="mb-0">
                                                            <div class="row" style="pointer-events: none;">
                                                                <div class="col-1 d-flex align-items-center pr-4">
                                                                    <div class="rounded-radio mr-2 pb-0">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="12" height="12"
                                                                            viewBox="0 0 12 12" fill="none">
                                                                            <circle cx="6" cy="6" r="5.77941"
                                                                                stroke="white"
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

                                                                <div class="col-3 d-flex align-items-center">
                                                                    <div class="text-method">
                                                                        <?= $method['method']; ?>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-4 p-0 d-flex align-items-center justify-content-end">
                                                                    <div class="mr-2 mt-2">
                                                                        <p class="mb-2 harga-price-method"
                                                                            id="price-method-<?= $method['id']; ?>">
                                                                        </p>
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
                                
                                <div class="d-block pt-4">
                                    <button class="btn btn-primary btn-block" type="submit" name="tombol"
                                        value="submit">Topup
                                        Sekarang</button>
                                </div>
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

<script>
function adjustToNearestMultiple(input) {
    var value = parseInt(input.value);

    var nearestMultiple = Math.round(value / 10000) * 10000;

    input.value = nearestMultiple;
}
</script>

<script>
function handleFormSubmit(event) {
var targetButton = event.submitter;

if (targetButton.value === 'submit') {
    return;
} else {
    event.preventDefault();
}
}
</script>
<?php $this->endSection(); ?>