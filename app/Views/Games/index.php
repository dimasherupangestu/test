<?php $this->extend('layout/template'); ?>

<?php $this->section('css'); ?>

<style>
    body {
        background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
        background-size: contain;
        /*background-repeat: no-repeat;*/
    }

    .back-to-top {
        bottom: 75px !important;
    }

    .fab-container {
        bottom: 125px !important;
    }

    .contentgame {
        color: #000;
        font-size: 12px;
        background: #d9d9d99c;
        padding: 1.5rem;
        border-radius: 9px;
    }

    .section {
        /*background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;*/
        background: #fff !important;
        box-shadow: 0 0px 7px 0 rgb(0 0 0 / 50%);
    }

    .body-games {
        /*background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;*/
        background: #fff !important;
    }

    .contentgame p {
        color: #000 !important;
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

    button.accordion-button {
        outline: none !important;
        border: 1px solid #0000;
        border-radius: 6px;
        padding: 7px 20px;
        font-weight: 600;
        background: #ffffffcf;
    }

    .single-payment .radio-nominal:checked+label {
        border: 2px solid var(--warna_4) !important;
        box-shadow: 0 0 200px rgb(182 187 43 / 47%) inset !important;
        transition: 0.3s ease;
    }



    .accordion-button[aria-expanded="true"] {
        border: 1px solid var(--warna_4);
        box-shadow: 0 0 200px rgb(182 187 43 / 47%) inset !important;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
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


    .accordion-body {
        background: var(--warna_6);
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
        border: 1px solid var(--warna_4);
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
        border-radius: 10px;
        overflow-anchor: none;
        transition: var(--bs-accordion-transition);
        border: 2px solid #BEBEBE;
    }


    .boks {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        border-radius: 6px;
        border: 2px solid #BEBEBE;
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
        color: red !important;
        font-weight: 500;
        font-style: italic;
        text-decoration: line-through
    }

    .icon-diamondx {
        height: 2.5rem;
    }

    .accordion-button iconify-icon.pl-1 {
        transform: rotateX(177deg);
        transition: 0.2s ease;
    }

    .accordion-button.collapsed iconify-icon.pl-1 {
        transform: rotateX(0deg);
        transition: 0.2s ease;
    }

    .single-payment .radio-nominal+label[for="method-balance"],
    .single-payment .radio-nominal+label[for="method-2"] {
        padding-bottom: 20px;
        padding-top: 20px;
        /*border: 2px solid rgb(238 237 237);*/
        /*border: 2px solid #BEBEBE;*/
        border-radius: 6px;
        box-shadow: 0 0px 7px 0 rgb(236 227 215 / 73%);
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

    .bg-banner-new {
        width: auto;
        height: 350px;
        border-radius: 20px 20px 0 0;
        box-shadow: 0 0px 7px 0 rgb(0 0 0 / 50%);
        /*border-left: 2px solid #fff; border-top: 2px solid #fff; border-right: 2px solid #fff;*/
    }

    .bg-banner-new-2 {
        width: auto;
        height: 280px;
        border-radius: 20px 20px 0 0;
        border-left: 2px solid #fff;
        border-top: 2px solid #fff;
        border-right: 2px solid #fff;
    }

    @media (max-width:768px) {
        .bg-banner-new {
            display: none;
            width: auto;
            height: 140px;
            border-radius: 20px 20px 20px 20px;
            border-left: 2px solid #fff;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
        }

    }

    @media (min-width:320px) and (max-width:768px) {
        .bg-banner-new-2 {
            width: auto;
            height: 140px;
            border-left: 2px solid #fff;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
            border-bottom: 2px solid #fff;
            border-radius: 20px 20px 20px 20px;
        }

        .mobile-img {
            display: none;
        }

        .bg-product-1 {
            display: none;
        }

        .bg-banner-new-2 {
            width: auto;
            height: 180px;
            border-radius: 20px 20px 0 0;
            border-left: 2px solid #fff;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
        }
    }

    @media (min-width:769px) {
        .bg-banner-new-2 {
            width: auto;
            display: none;
            height: 140px;
            border-left: 2px solid #fff;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;

        }

        .bg-product-2 {
            display: none;
        }

    }


    .container-min-banner {
        margin-top: -380px;
    }

    @media (max-width:480px) {
        /*.bg-banner {*/
        /*    width: 100%;*/
        /*    height: 425px;*/
        /*}*/

        .harga-price-method {
            font-weight: 600;
            font-size: 11px;
        }

        .text-method {
            font-size: 13px;
        }
    }

    @media (min-width:481px) {
        .bg-banner {
            width: 100%;
            height: 425px;
        }

        button.accordion-button {
            /* padding: 7px 20px; */
        }

        .harga-price-method {
            font-weight: 600;
            font-size: 14px;
        }
    }

    .form-row p {
        color: #fff !important;
    }

    .total-price-box {
        position: fixed;
        width: 100%;
        bottom: 0;
        background: var(--warna_3);
        z-index: 999;
        padding: 10px 10px;
    }

    .voucher-box {
        position: fixed;
        width: 100%;
        bottom: 62px;
        background: #c5a040;
        z-index: 999;
        border-radius: 10px 10px 0px 0px;
        box-shadow: 0px 17px 39px 9px rgb(0 0 0 / 40%);
        overflow: hidden !important;
    }

    .voucher-box .collapse {
        transition: height 0.5s ease !important;
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

    .pl-10 {
        border-radius: 10px 0px 0px 10px !important;
    }

    .pl-9 {
        border-radius: 0px 10px 10px 0px !important;
    }

    .border-b {
        border-bottom: 1px solid #ffffff80;
    }

    @media (max-width:575px) {
        .resp {
            display: none !important;
        }

        .fab-container {
            display: none !important;
        }
    }

    @media (min-width: 575px) {
        .voucher-box {
            display: none;
        }
    }

    @media (max-width: 575px) {
        .back-to-top {
            bottom: 115px !important;
        }

        .balancedisc {
            font-size: 10px !important;
        }
    }

    .icon-voucher {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%) !important;
        color: #6c757d;
    }

    .rotate {
        transition: transform 0.3s ease-in-out !important;
    }

    .vc {
        padding: 10px !important;
    }

    .image-modal {
        position: absolute;
        display: inline-block;
    }

    .image-modal img {
        max-width: 100%;
        height: auto;
    }

    .image-modal .modal-body img {
        max-width: none;
    }

    .image-tooltip {
        position: relative;
        display: inline-block;
    }

    .image-tooltip img {
        display: none;
        position: absolute;
        top: 125%;
        left: 310%;
        transform: translateX(-50%);
        z-index: 1;
        border-radius: 10px;
    }

    @media (min-width: 1000px) {
        .image-tooltip:hover img {
            display: block;
        }
    }

    .balancedisc {
        font-size: 13px;
        color: red !important;
        font-weight: 500;
        font-style: italic;
        text-decoration: line-through;
    }

    .diskon-flashsale {
        position: relative;
        padding: 0.25rem 0.75rem;
        width: 215px;
        height: 28px;
        color: #fff;
        font-weight: bold;
        font-size: .75rem;
        font-style: italic;
        line-height: 1.25rem;
        border-radius: 20px;
        border-left: 3px solid #fff;
        border-bottom: 3px solid #fff;
        background: linear-gradient(45deg, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, rgba(255, 255, 255, 0.9) 50%, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956);
        background-size: 700% 200%;
        animation: gradientAnimation 1.5s linear infinite;
        display: justify-content-center;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }

    }

    @media (max-width: 2560px) {
        .diskon-flashsale {
            font-size: 3px;
            padding: 0.2rem 0.5rem;
            height: 28px;
            line-height: 1rem;
            border-radius: 15px;
            width: auto;
        }
    }

    @media (max-width: 375px) {
        .diskon-flashsale {
            padding-left: 0rem;
            padding-right: 0rem;
            width: 120px;
            height: 28px;
            font-size: .75rem;
            width: auto;
        }
    }

    .limitflashsaletxt2 {
        width: max-content;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
        /* Sesuaikan ukuran font sesuai kebutuhan */
        text-align: center;
        z-index: 1;
        text-shadow: 1px 1px #000000;
    }

    @media screen and (max-width: 768px) {
        .limitflashsaletxt2 {
            font-size: 10px;
        }
    }

    @media screen and (max-width: 425px) {
        .limitflashsaletxt2 {
            font-size: 10px;
        }
    }

    @media screen and (max-width: 1024px) {
        .limitflashsaletxt2 {
            font-size: 9px;
        }
    }

    .ribbon {
        position: absolute;
        top: 10px;
        right: 0;
        background-color: #FF3956;
        color: #000;
        padding: 5px 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        margin-right: 0.3rem;
        border-radius: 20px 0 0 20px;
        /*border-left: solid 3px #FFFFFF;*/
        /*border-bottom: solid 3px #FFFFFF;*/
        background: linear-gradient(45deg, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29, rgba(255, 255, 255, 0.9) 80%, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29, #F9CF29);
        background-size: 700% 200%;
        animation: gradientAnimation 1.5s linear infinite;
    }

    .flashsale .ribbon {
        background-color: #f39c12;
    }

    .text-ribbon {
        /*text-shadow: 1px 1px #000000;*/
        font-weight: 600;
        font-style: italic;
    }

    .flashsale-ribbon {
        position: absolute;
        top: 0;
        left: 0;
        color: #fff;
        padding: 5px 15px;
    }

    @media (max-width:555px) {
        .flashsale-ribbon img {
            width: 45%;
        }
    }

    .flashsale .flashsale-ribbon {
        background-color: #f39c12;
    }

    .text-ribbon-flashsale {
        text-shadow: 1px 1px #000000;
        font-weight: bold;
        font-style: italic;
    }



    @media(min-width:768px) {
        .fixed-position {
            /*position: fixed;*/
            left: 0;
            top: 10;
        }
    }

    .fixed-position-2 {
        /*position: fixed;*/
        margin-left: auto;
    }

    .hidden {
        display: none;
    }

    .hidden2 {
        display: none;
    }

    .hidden3 {
        display: none;
    }

    .hidden4 {
        display: none;
    }


    .tab-category.nav-pills .nav-link {
        color: var(--warna_hitam);
        border: 1px solid var(--warna_hitam);
        border-radius: 10px;
        background: #f9f9f9;
    }

    /* Untuk browser berbasis WebKit */
    .tab-category::-webkit-scrollbar {
        width: 10px;
        /* Atur lebar scrollbar */
    }

    .tab-category::-webkit-scrollbar-thumb {

        border-radius: 5px;
        /* Atur border-radius sesuai kebutuhan */
        border: 3px solid var(--warna_7);
    }

    .tab-category.nav-pills .nav-link:hover {
        color: var(--warna_7);
        border: 1px solid var(--warna_hitam);
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: var(--warna_7);
        background: var(--warna_3);
        border: 1px solid var(--warna_hitam);
    }

    .nav-pills .nav-link {
        margin: 0px !important;
        font-size: 11px;
    }


    .popup-warning {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background: var(--warna_3);
        /*background: url('<?= base_url(); ?>/assets/images/bg-kalkulator-3-HG.webp');*/
        background-position: cover;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 2px solid #fff;
        transition: opacity 0.3s ease;

    }



    .popup-content {
        text-align: center;

    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 30px;
        color: var(--warna_7);
    }

    .close:hover {
        color: var(--warna_7);
    }

    @media (max-width:450px) {
        .popup-img {
            width: 15%;
            position: center;
        }

        .popup-warning {
            width: 80%;
        }
    }


    .login-bt {
        background: var(--warna_7);
        /*background: linear-gradient(45deg, #F7FF1E, #A6E923, #49D037, #00B349, #009658, #007762);*/
        /*box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);*/
        border-radius: 10px;
        font-size: 12px;
        color: var(--warna_text);
        font-weight: 600;
        border: none;
        padding: 10px 100px 10px 100px;
        margin-top: 30px;
    }

    .signup-bt {
        background: var(--warna_7);
        border-radius: 10px;
        font-size: 12px;
        color: var(--warna_text);
        font-weight: 600;
        border: none;
        padding: 10px 100px 10px 100px;
        margin-top: 30px;
    }

    @media (max-width:575px) {
        .login-bt {
            padding: 10px 50px 10px 50px;
        }

        .signup-bt {
            padding: 10px 50px 10px 50px;
        }
    }

    p {
        color: #333333 !important;
    }

    .card-body-2 {
        background: var(--warna_3);
        border-radius: 11px 11px 0 0;
        padding-left: 1rem;
        padding-top: 1rem;
        padding-bottom: 0.75rem;
    }

    p.col-12.mt-2 {
        color: #333333 !important;
    }

    #comment-section {
        justify-content: space-between;
        padding: 20px;
        gap: 1rem;
    }

    #comment-section button {
        font-size: 16px;
        border-radius: 20px;
        padding: 20px;
        border: none;
        background: var(--warna_3);
        height: auto;
        color: #fff;
    }

    .active-comment-button {
        background: var(--warna_10) !important;
        color: white;
    }

    div:where(.swal2-container) div:where(.swal2-popup) {
        display: none;
        position: relative;
        box-sizing: border-box;
        grid-template-columns: minmax(0, 100%);
        width: 50em !important;
        max-width: 100%;
        padding: 0 0 1.25em;
        border: none;
        border-radius: 30px !important;
        background: #fff;
        color: #545454;
        font-family: inherit;
        font-size: .9rem !important;
    }

    @media (max-width:480px) {
        div:where(.swal2-container) div:where(.swal2-popup) {
            max-height: 100% !important;
            height: 30rem !important;
        }

        div:where(.swal2-container) h2:where(.swal2-title) {
            font-size: 1.6em !important;
        }
    }

    div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
        border: 0;
        border-radius: .25em;
        background: initial;
        background-color: var(--warna_5) !important;
        color: #fff;
        font-size: 1em;
    }

    div:where(.swal2-icon).swal2-info {
        border-color: var(--warna_5) !important;
        color: var(--warna_5) !important;
    }

    .swiper-slide.sold-out {
        pointer-events: none;
        filter: grayscale(100%);
        cursor: not-allowed;
    }
</style>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="bg-leaf">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left" alt="">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
</div>

<!-- <h1 style="display: inline-block;" id="expired_time_flash_sale" class="countdown-time">hallo</h1> -->
<div class="total-price-box">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <p class="text-white mb-0" style="font-weight: 600;">Total</p>
                <h4 class="text-white mb-0" id="nominal-text" style="font-family:sans-serif !important;"></h4>
            </div>
            <div class="col-7 d-flex justify-content-end z-3">
                <div class="text-right d-flex align-items-center">
                    <button type=" button" class="btn btn-beli text-white" onclick="process_order();" id="buyButton">Beli
                        Sekarang <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M8.45882 17.9999C8.93213 18.0005 9.3912 17.8381 9.75882 17.5399L14.8588 13.3299C15.0588 13.1707 15.2203 12.9685 15.3313 12.7382C15.4423 12.5079 15.5 12.2556 15.5 11.9999C15.5 11.7443 15.4423 11.492 15.3313 11.2617C15.2203 11.0314 15.0588 10.8292 14.8588 10.6699L9.75882 6.45995C9.45179 6.21394 9.08182 6.05913 8.69109 6.01316C8.30035 5.9672 7.90456 6.03191 7.54882 6.19995C7.23965 6.33623 6.97623 6.55862 6.79004 6.84057C6.60385 7.12251 6.50275 7.45209 6.49882 7.78995V16.2099C6.50275 16.5478 6.60385 16.8774 6.79004 17.1593C6.97623 17.4413 7.23965 17.6637 7.54882 17.7999C7.83469 17.9299 8.14479 17.9981 8.45882 17.9999Z"
                                fill="var(--warna_4)" />
                            <defs>
                                <linearGradient id="paint0_linear_74_267" x1="10.9994" y1="5.99878" x2="10.9994"
                                    y2="17.9999" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#BDFB50" />
                                    <stop offset="1" stop-color="#99D332" />
                                </linearGradient>
                            </defs>
                        </svg></button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="pb-1">
    <div style="background:" alt="slide " class="bg-banner">
        <!--<div style="background: url(<?= base_url(); ?>/assets/images/games/banner_img/<?= $games['banner_img']; ?>);background-size: 90%; background-repeat:no-repeat; background-position:center;" alt="slide " class="bg-banner">-->
        <style>
            @media (min-width:1170px) {
                .bg-banner {
                    margin-top: 3rem;
                }
            }

            @media (max-width:1000px) {
                .bg-banner {
                    width: 100%;
                    height: 400px;
                }
            }
        </style>
    </div>
</div>

</div>

<div class="popup-warning" id="popupWarning">
    <div class="text-center mb-3">
        <img src="<?= base_url(); ?>/assets/images/logo-hidden.png" width="6%" class="popup-img">

        <div class="popup-content">
            <span class="close" onclick="closePopupWarning()">&times;</span>
            <p style="text-transform:none; font-weight:700; font-size:.90rem">Ups! Kamu Belum Login Nih</p>
            <a style="font-size: 14px;text-align: center; color:#fff;">Untuk Melanjutkan Pembayaran Silahkan Login atau Daftar Member Hiddengame </a>
            <br>
            <div class="popup-bt">
                <a href="<?= base_url(); ?>/login">
                    <button type="button" class="login-bt">Login</button>
                </a>
                <a href="<?= base_url(); ?>/register">
                    <button type="button" class="signup-bt">Daftar</button>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="container-min-banner pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 fixed-position">
                <div class="bg-product-1" style="margin-bottom:20px; ">
                    <div style="background: url(<?= base_url(); ?>/assets/images/games/banner_img/<?= $games['banner_img']; ?>); background-size:cover; background-repeat:no-repeat" alt="slide " class="bg-banner-new"></div>
                    <div class="" style="background: #fff; border-radius:0px 0px 20px 20px; padding:15px 15px 15px 15px; border-left: 2px solid #fff; border-bottom: 2px solid #fff; border-right: 2px solid #fff;  border-top: 2px solid #fff;  color:#fff; box-shadow: 0 0px 7px 0 rgb(0 0 0 / 50%);">
                        <div style="background: url(<?= base_url(); ?>/assets/images/games/banner_img/<?= $games['banner_img']; ?>); background-size:cover; background-repeat:no-repeat; " alt="slide " class="bg-banner-new-2">
                            <div class="pt-3 pb-2">
                                <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" class="mb-3"
                                    style="display: block;border-radius: 30px !important;border: 3px solid #fff;"
                                    width="110px" height="110px">
                            </div>
                        </div>
                        <div class="mobile-img" style="display:flex; align-items:center">
                            <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" class="mobile-img"
                                style="display: block;border-radius: 30px !important;border: 3px solid #fff;"
                                width="110px" height="110px;">
                            <h5 style="color:#333333; margin-left:10px"><?= $games['games']; ?></h5>
                        </div>
                        <div class="pb-3" style="color:#333333 !important;">
                            <?= $games['content']; ?>
                        </div>
                    </div>
                </div>
                <div class="bg-product-2" style="margin-bottom:20px; ">
                    <div style="background: url(<?= base_url(); ?>/assets/images/games/banner_img/<?= $games['banner_img']; ?>); background-size:cover; background-repeat:no-repeat" alt="slide " class="bg-banner-new-2">
                        <div class="pt-3 pb-2">
                            <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" class="mb-3"
                                style="display: block;border-radius: 99px;border: 3px solid #fff; margin-left:30px; margin-top: 25px"
                                width="90px" height="90px">
                        </div>
                    </div>
                    <div class="bg-product" style="background: #fff; border-radius:0px 0px 20px 20px; padding:15px 15px 15px 15px; border-left: 2px solid #fff; border-bottom: 2px solid #fff; border-right: 2px solid #fff;  border-top: 2px solid #fff;  color:#fff">
                        <h5 style="color:#333333; margin-top:20px"><?= $games['games']; ?></h5>
                        <div class="pb-3" style="color:#333333 !important;">
                            <?= $games['content']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 fixed-position-2">


                <?php if ($games['slug'] == 'jasa-influencer-iben' || $games['slug'] == 'jasa-influencer-ello' || $games['slug'] == 'jasa-influencer-ivan' || $games['slug'] == 'influencer-daffa-ariq'): ?>


                    <div class="pb-3">
                        <div class="section">
                            <div class="body-games shadow-form">
                                <h5 style="color:#333333 !important;">Pilih Produk</h5>
                                <?php if (!empty($category)) : ?>
                                    <div class="container">
                                        <div class="PB-5 pt-5" style="border-radius: 10px;padding: 10px; overflow: hidden; padding-top: 1rem !important;">
                                            <ul class="nav nav-pills tab-category gap-2 pb-2" id="pills-tab" role="tablist" style="flex-wrap: nowrap;justify-content: flex-start;overflow-y: hidden; padding-bottom: 0px;">
                                                <li class="nav-item">
                                                    <a style="white-space: pre;font-weight: 600;" class="nav-link active" id="pills-all-tab" data-category-id="all" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true" onclick="showAllProducts()">All</a>

                                                </li>
                                                <?php foreach ($category as $cat) : ?>
                                                    <li class="nav-item">
                                                        <a style="white-space: pre;font-weight: 600;" class="nav-link" id="pills-<?= url_title($cat['category'], '-', true); ?>-tab" data-category-id="<?= $cat['id']; ?>" data-toggle="pill" href="#pills-<?= url_title($cat['category'], '-', true); ?>" role="tab" aria-controls="pills-<?= url_title($cat['category'], '-', true); ?>" aria-selected="true" onclick="showProductsByCategory(<?= $cat['id']; ?>)"><?= $cat['category']; ?></a>

                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-all" role="tadbpanel" aria-labelledby="pills-all-tab">
                                        <?php foreach ($category as $cat) : ?>
                                            <h3 class="category-title" id="category-title-<?= $cat['id']; ?>" style="text-transform:uppercase; font-size:1.2rem; font-weight:600; color:#81B957"><?= $cat['category']; ?></h3>

                                            <div class="row pl-2 pr-2 row-category" id="product-category-<?= $cat['id']; ?>">
                                                <?php foreach ($products as $key => $value) : ?>
                                                    <?php foreach ($value as $loop) : ?>
                                                        <?php if ($loop['category_id'] != $cat['id']) {
                                                            continue;
                                                        } ?>

                                                        <div id="<?= $loop['id']; ?>" class="col-6 col-lg-4" style="padding-right: 5px;padding-left: 5px;display:grid;" data-flashsale-part="<?= $loop['flashsale_part']; ?>" <?= (strpos(strtolower($loop['product']), 'komen') !== false) ? 'data-komen="true"' : '' ?> <?= (strpos(strtolower($loop['product']), 'like') !== false) ? 'data-like="true"' : '' ?> <?= (strpos(strtolower($loop['product']), 'repost') !== false) ? 'data-repost="true"' : '' ?>>
                                                            <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" data-product-name="<?= $loop['product']; ?>" onchange="get_price(this.value);get_price_and_scroll(this.value);" onclick="toggleElement()">

                                                            <label for="product-<?= $loop['id']; ?>" <?= ($loop['limitflashsale'] > 0) ? 'style="background: linear-gradient(45deg , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, rgba(255, 255, 255, 1) 50%, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD ); 
                                                            background-size: 700% 200%;
                                                            animation: gradientAnimation 1.5s linear infinite;"' : '' ?>>
                                                                <div style="text-align: center;margin-bottom:10px;margin-top:10px;">
                                                                    <?php if (!empty($loop['image'])): ?>
                                                                        <img onerror="this.style.display='none'"
                                                                            src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>"
                                                                            loading="lazy" class="icon-diamondx">

                                                                    <?php endif; ?>
                                                                    <br>
                                                                    <a style="font-size: 14px;font-weight:600;text-align: center;"
                                                                        for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>
                                                                    <br>

                                                                    <?php
                                                                    $price = null;
                                                                    $discountPrice = null;

                                                                    if ($loop['discount_price'] != 0) {
                                                                        if ($users !== false) {
                                                                            switch ($users['level']) {
                                                                                case 'Silver':
                                                                                    $price = !empty($loop['price_silver']) && $loop['price_silver'] !== 0 ? $loop['price_silver'] : $loop['price'];
                                                                                    break;
                                                                                case 'Gold':
                                                                                    $price = !empty($loop['price_gold']) && $loop['price_gold'] !== 0 ? $loop['price_gold'] : $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = !empty($loop['price_platinum']) && $loop['price_platinum'] !== 0 ? $loop['price_platinum'] : $loop['price'];
                                                                                    break;
                                                                                case 'Member':
                                                                                    $price = !empty($loop['price_bronze']) && $loop['price_bronze'] !== 0 ? $loop['price_bronze'] : $loop['price'];
                                                                                    break;
                                                                                default:
                                                                                    $price = $loop['price'];
                                                                                    break;
                                                                            }
                                                                        } else if ($price == 0 or empty($price)) {
                                                                            $price = $loop['price'];
                                                                        } else {
                                                                            $price = $loop['price'];
                                                                        }
                                                                        $discountPrice = $loop['discount_price'];
                                                                    } else {
                                                                        if ($users !== false) {
                                                                            switch ($users['level']) {
                                                                                case 'Silver':
                                                                                    $price = $loop['price_silver'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Gold':
                                                                                    $price = $loop['price_gold'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = $loop['price_platinum'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = $loop['price_platinum'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Member':
                                                                                    $price = $loop['price_bronze'] ?? $loop['price'];
                                                                                    break;
                                                                                default:
                                                                                    $price = $loop['price'];
                                                                                    break;
                                                                            }
                                                                        } else if ($price == 0 or empty($price)) {
                                                                            $price = $loop['price'];
                                                                        } else {
                                                                            $price = $loop['price'];
                                                                        }
                                                                    }

                                                                    ?>

                                                                    <a style="font-size: 12px; font-weight:500;" class="currency-idr">
                                                                        <?= $price; ?>
                                                                    </a>

                                                                    <?php if ($discountPrice != null): ?>
                                                                        <br>
                                                                        <p class="currency-idr-2 discount-price"><?= $discountPrice; ?></p>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($loop['limitflashsale']) && $loop['limitflashsale'] > 0) : ?>
                                                                        <div class="diskon-flashsale">
                                                                            <span class="limitflashsaletxt2">Tersisa : <?= $loop['limitflashsale']; ?></span>
                                                                        </div>
                                                                    <?php elseif (isset($loop['limitflashsale']) && $loop['limitflashsale'] === 0): ?>
                                                                        <div class="diskon-flashsale">
                                                                            <p class="limitflashsaletxt2">Produk Habis :(</p>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <br>
                                                                    <a style=" margin-bottom:10px;"></a>
                                                                </div>
                                                                <!-- Ribbon Promo Diskon -->
                                                                <?php if (isset($loop['discount_number']) && $loop['discount_number'] > 0) : ?>
                                                                    <div class="ribbon">
                                                                        <span class="text-ribbon">-<?= $loop['discount_number']; ?>%</span>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if ($loop['flashsale_part'] == 'Y'  && $loop['limitflashsale'] >= 1): ?>
                                                                    <div class="flashsale-ribbon">
                                                                        <img src="<?= base_url(); ?>/assets/images/flashsale-part.png" style="width:40%">
                                                                    </div>
                                                                <?php endif; ?>
                                                                </input>
                                                            </label>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <div class="<?= count($category) >= 1 ? 'd-none' : ''; ?>">

                                    <div class="row pt-3 pl-2 pr-2 mb-2">
                                        <?php if (count($product) == 0): ?>
                                            <div class="col-12">
                                                <div class="alert alert-warning alert-dismissible mt-2 mb-0" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <strong>Information!</strong> Produk sedang tidak tersedia.
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>

                                        <?php foreach ($product as $loop): ?>
                                            <?php
                                            // if ($loop['flashsale_part'] < 1) : 
                                            ?>
                                            <div id="<?= $loop['id']  ?>" class="col-6 col-lg-4 <?= ($loop['flashsale_part']); ?>" style="padding-right: 5px;padding-left: 5px;display:grid;" data-flashsale-part="<?= $loop['flashsale_part']; ?>">
                                                <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);get_price_and_scroll(this.value, '<?= $loop['product']; ?>');" onclick="toggleElement()">

                                                <label for="product-<?= $loop['id']; ?>" <?= ($loop['limitflashsale'] > 0) ? 'style="background: linear-gradient(45deg , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, rgba(255, 255, 255, 1) 50%, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD ); 
                                                    background-size: 700% 200%;
                                                    animation: gradientAnimation 1.5s linear infinite;"' : '' ?>>
                                                    <div style="text-align: center;margin-bottom:10px;margin-top:10px;">
                                                        <?php if (!empty($loop['image'])): ?>
                                                            <img onerror="this.style.display='none'"
                                                                src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>"
                                                                loading="lazy" class="icon-diamondx">
                                                        <?php endif; ?>
                                                        <br>
                                                        <a style="font-size: 14px;font-weight:600; text-align: center;color:var(--warna_hitam);"
                                                            for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>

                                                        <br>
                                                        <?php
                                                        $price = null;
                                                        $discountPrice = null;

                                                        if ($loop['discount_price'] != 0) {
                                                            if ($users !== false) {
                                                                switch ($users['level']) {
                                                                    case 'Silver':
                                                                        $price = $loop['price_silver'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Gold':
                                                                        $price = $loop['price_gold'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Platinum':
                                                                        $price = $loop['price_platinum'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Member':
                                                                        $price = $loop['price_bronze'] ?? $loop['price'];
                                                                        break;
                                                                    default:
                                                                        $price = $loop['price'];
                                                                        break;
                                                                }
                                                            } else if ($price == 0 or empty($price)) {
                                                                $price = $loop['price'];
                                                            } else {
                                                                $price = $loop['price'];
                                                            }
                                                            $discountPrice = $loop['discount_price'];
                                                        } else {
                                                            if ($users !== false) {
                                                                switch ($users['level']) {
                                                                    case 'Silver':
                                                                        $price = !empty($loop['price_silver']) && $loop['price_silver'] !== 0 ? $loop['price_silver'] : $loop['price'];
                                                                        break;
                                                                    case 'Gold':
                                                                        $price = !empty($loop['price_gold']) && $loop['price_gold'] !== 0 ? $loop['price_gold'] : $loop['price'];
                                                                        break;
                                                                    case 'Platinum':
                                                                        $price = !empty($loop['price_platinum']) && $loop['price_platinum'] !== 0 ? $loop['price_platinum'] : $loop['price'];
                                                                        break;
                                                                    case 'Member':
                                                                        $price = !empty($loop['price_bronze']) && $loop['price_bronze'] !== 0 ? $loop['price_bronze'] : $loop['price'];
                                                                        break;
                                                                    default:
                                                                        $price = $loop['price'];
                                                                        break;
                                                                }
                                                            } else if ($price == 0 or empty($price)) {
                                                                $price = $loop['price'];
                                                            } else {
                                                                $price = $loop['price'];
                                                            }
                                                        }

                                                        ?>

                                                        <a style="font-size: 12px; font-weight:500;color:var(--warna_hitam);" class="currency-idr">
                                                            <?= $price; ?>
                                                        </a>

                                                        <?php if ($discountPrice != null): ?>
                                                            <p class="currency-idr-2 discount-price"><?= $discountPrice; ?></p>
                                                        <?php endif; ?>
                                                        <?php if (isset($loop['limitflashsale']) && $loop['limitflashsale'] > 0) : ?>
                                                            <div class="diskon-flashsale">
                                                                <span class="limitflashsaletxt2">Tersisa : <?= $loop['limitflashsale']; ?></span>
                                                            </div>
                                                        <?php elseif (isset($loop['limitflashsale']) && $loop['limitflashsale'] === 0): ?>
                                                            <div class="diskon-flashsale">
                                                                <p class="limitflashsaletxt2">Produk Habis :(</p>
                                                            </div>
                                                        <?php endif ?>

                                                        <br>
                                                        <a style="margin-bottom:10px;"></a>
                                                    </div>

                                                    <!-- Ribbon Promo Diskon -->
                                                    <?php if (isset($loop['discount_number']) && $loop['discount_number'] > 0) : ?>
                                                        <div class="ribbon">
                                                            <span class="text-ribbon">-<?= $loop['discount_number']; ?>%</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <!-- Ribbon Flashsale -->
                                                    <?php if ($loop['flashsale_part'] == 'Y' && $loop['limitflashsale'] >= 1): ?>
                                                        <div class="flashsale-ribbon">
                                                            <img src="<?= base_url(); ?>/assets/images/flashsale-part.png" style="width:40%">
                                                        </div>
                                                    <?php endif; ?>
                                                    </input>
                                                </label>
                                            </div>
                                            <?php
                                            // endif; 
                                            ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <?php if ($games['slug'] == 'joki-paket-rank'): ?>
                                    <style>
                                        .kuantitibox {
                                            visibility: hidden;
                                        }
                                    </style>
                                <?php endif ?>

                                <!-- COMMENT SECTION -->

                                <!--    <div class="pb-3">-->
                                <!--    <div id="comment-section" style="display:none;">-->
                                <!--        <button id="comment1" value="Selamat Pagi" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Pagi</button>-->
                                <!--        <button id="comment2" value="Selamat Sore" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Sore</button>-->
                                <!--        <button id="comment3" value="Selamat Malam" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Malam</button>-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!-- JOKI RANK ML -->

                                <?php if ($games['target'] == 'joki') : ?>
                                    <div id="kuantitiboxjk" class="hidden3">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-joki" value="1" min="1" id="jumlah_star_poin" name="joki[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari
                                            Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <!-- JOKI CLASSIC -->

                                <?php if ($games['target'] == 'jokicl') : ?>
                                    <div id="kuantitiboxcl" class="hidden">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-jokicl" min="1" value="1" id="jumlah_star_poin" name="jokicl[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <!-- JOKI GENDONG -->

                                <?php if ($games['target'] == 'jokigendong') : ?>
                                    <div id="kuantitiboxgd" class="hidden4">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-jokigendong" value="5" id="jumlah_star_poin" name="jokigendong[jumlah_star_poin]" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka
                                            uang akan hangus</p>
                                    </div>

                                <?php endif ?>

                                <?php if ($games['slug'] == 'paket-joki-gendong-rank'): ?>
                                    <style>
                                        #kuantitibox2 {
                                            visibility: hidden !important;
                                        }
                                    </style>


                                <?php endif ?>

                                <!-- JOKI MAGIC CHESS -->

                                <?php if ($games['slug'] == 'tes-kuantiti-box') : ?>
                                    <style>
                                        #kuantitibox {
                                            visibility: hidden;
                                        }
                                    </style>


                                <?php endif ?>

                                <?php if ($games['target'] == 'jokimc') : ?>
                                    <div id="kuantitiboxmc" class="hidden2">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-jokimc" value="1" min="1" id="jumlah_star_poin" name="jokimc[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari
                                            Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <?php if ($games['target'] == 'videomontage'): ?>
                                    <div class="kuantitibox mt-4">
                                        <h5 class="mb-2">Masukkan Jumlah Menit</h5>
                                        <input type="number" class="form-control name-videomontage" value="1" id="jumlah_menit"
                                            name="videomontage[jumlah_menit]" onchange="update_total();">
                                    </div>
                                <?php endif ?>

                                <?php if ($games['target'] == 'growtopia'): ?>
                                    <div id="kuantitibox" class="kuantitibox2 mt-4 text-dark">
                                        <h5 class="mb-2">Masukkan Quantity</h5>
                                        <input type="number" class="form-control name-growtopia" min="5" value="5"
                                            id="jumlah_star_poin" name="growtopia[jumlah_star_poin]"
                                            onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>


                            </div>
                        </div>
                    </div>

                    <div class="pb-3 " id="">
                        <div class="section">
                            <div class="card-body-2">
                                <div class="cek-pesanan">
                                    <p class="text-left pb-3 text-white" style="font-size:20px; font-weight:600">Masukkan Data Pembelian</p>
                                </div>
                            </div>
                            <div class="body-games shadow-form">
                                <!--<h5 id="judulgame" style="margin-top: 5px;color:#333333 !important;">-->
                                <!--    <?php if ($games['target'] == 'custom'): ?>-->
                                <!--    <?= $games['st_title']; ?>-->
                                <!--    <?php else: ?>-->
                                <!--    User ID-->
                                <!--    <?php endif ?>-->
                                <!--</h5>-->
                                <?php if ($games['target'] == 'custom'): ?>


                                    <div class="form-row pt-3">

                                        <?php if ($games['st_col'] == 1): ?>
                                            <div class="col">
                                                <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                    placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                <input type="hidden" name="zone_id" value="1">
                                            </div>
                                            <p class="col-12 mt-2" style="font-size: 10px;color:var(--warna_2) !important;">
                                                <?= $games['st_desc']; ?>
                                            </p>

                                            <div class="row">
                                                <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                    <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                        <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="background:transparent;">
                                                            <div class="modal-body">
                                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php elseif ($games['st_col'] == 2): ?>

                                            <?php if ($games['st2_type'] == 'dropdown'): ?>
                                                <div class="col">
                                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                        placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                </div>

                                                <div class="col">
                                                    <select name="zone_id" id="Server" class="form-control">
                                                        <option value="<?= $games['st2_text']; ?>"><?= $games['st2_text']; ?></option>
                                                        <?php
                                                        $options = explode(',', $games['st2_data']);
                                                        foreach ($options as $option) {
                                                            $parts = explode('///', $option);
                                                            $value = trim($parts[1]);
                                                            $label = trim($parts[0]);
                                                            echo "<option value=\"$value\">$label</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                        <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                            <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                            <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                        </button>
                                                    </div>
                                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content" style="background:transparent;">
                                                                <div class="modal-body">
                                                                    <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col">
                                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                        placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                </div>

                                                <div class="col">
                                                    <input type="<?= $games['st2_type']; ?>" name="zone_id" class="form-control"
                                                        placeholder="<?= $games['st2_text']; ?>" autocomplete="off">
                                                </div>
                                            <?php endif ?>
                                            <p class="col-12 mt-2" style="font-size: 10px;color:var(--warna_2) !important;">
                                                <?= $games['st_desc']; ?>
                                            </p>

                                            <div class="row">
                                                <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                    <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                        <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="background:transparent;">
                                                            <div class="modal-body">
                                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endif ?>
                                    </div>
                                <?php else: ?>
                                    <?= $this->include('Target/' . $games['target']); ?>
                                    <div class="row">
                                        <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                            <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                            </button>
                                        </div>
                                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="background:transparent;">
                                                    <div class="modal-body">
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if ($games['target'] == 'joki'): ?>
                                    <input type="text" name="wa" placeholder="Masukan No. Whatsapp" class="form-control mt-2" value="" required>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="pb-3 " id="">
                        <div class="section">
                            <div class="card-body-2">
                                <div class="cek-pesanan">
                                    <p class="text-left pb-3 text-white" style="font-size:20px; font-weight:600">Masukkan Data Game</p>
                                </div>
                            </div>
                            <div class="body-games shadow-form">
                                <h5 id="judulgame" style="margin-top: 5px;color:#333333 !important;">
                                    <?php if ($games['target'] == 'custom'): ?>
                                        <?= $games['st_title']; ?>
                                    <?php else: ?>
                                        User ID
                                    <?php endif ?>
                                </h5>
                                <?php if ($games['target'] == 'custom'): ?>


                                    <div class="form-row pt-3">

                                        <?php if ($games['st_col'] == 1): ?>
                                            <div class="col">
                                                <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                    placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                <input type="hidden" name="zone_id" value="1">
                                            </div>
                                            <p class="col-12 mt-2" style="font-size: 10px;color:var(--warna_2) !important;">
                                                <?= $games['st_desc']; ?>
                                            </p>

                                            <div class="row">
                                                <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                    <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                        <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="background:transparent;">
                                                            <div class="modal-body">
                                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php elseif ($games['st_col'] == 2): ?>

                                            <?php if ($games['st2_type'] == 'dropdown'): ?>
                                                <div class="col">
                                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                        placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                </div>

                                                <div class="col">
                                                    <select name="zone_id" id="Server" class="form-control">
                                                        <option value="<?= $games['st2_text']; ?>"><?= $games['st2_text']; ?></option>
                                                        <?php
                                                        $options = explode(',', $games['st2_data']);
                                                        foreach ($options as $option) {
                                                            $parts = explode('///', $option);
                                                            $value = trim($parts[1]);
                                                            $label = trim($parts[0]);
                                                            echo "<option value=\"$value\">$label</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                        <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                            <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                            <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                        </button>
                                                    </div>
                                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content" style="background:transparent;">
                                                                <div class="modal-body">
                                                                    <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col">
                                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control"
                                                        placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                                </div>

                                                <div class="col">
                                                    <input type="<?= $games['st2_type']; ?>" name="zone_id" class="form-control"
                                                        placeholder="<?= $games['st2_text']; ?>" autocomplete="off">
                                                </div>
                                            <?php endif ?>
                                            <p class="col-12 mt-2" style="font-size: 10px;color:var(--warna_2) !important;">
                                                <?= $games['st_desc']; ?>
                                            </p>

                                            <div class="row">
                                                <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                                    <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                        <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content" style="background:transparent;">
                                                            <div class="modal-body">
                                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endif ?>
                                    </div>
                                <?php else: ?>
                                    <?= $this->include('Target/' . $games['target']); ?>
                                    <div class="row">
                                        <div class="col-12" id="imageTooltipContainer" style="display: none;">
                                            <button type="button" class="btn btn-primary btn-sm image-tooltip" id="imageModalButton" style="color:#fff !important">
                                                <i aria-hidden="true" class="fa fa-info-circle mr-1" style="color:#fff"></i>Lihat Panduan
                                                <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" style="width: 650px; height: auto;" id="tooltipImage">
                                            </button>
                                        </div>
                                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="background:transparent;">
                                                    <div class="modal-body">
                                                        <img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage']; ?>" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <?php if ($games['target'] == 'joki'): ?>
                                    <input type="text" name="wa" placeholder="Masukan No. Whatsapp" class="form-control mt-2" value="" required>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <div class="section">
                            <div class="body-games shadow-form">
                                <h5 style="color:#333333 !important;">Pilih Nominal Layanan</h5>
                                <?php if (!empty($category)) : ?>
                                    <div class="container">
                                        <div class="PB-5 pt-5" style="border-radius: 10px;padding: 10px; overflow: hidden; padding-top: 1rem !important;">
                                            <ul class="nav nav-pills tab-category gap-2 pb-2" id="pills-tab" role="tablist" style="flex-wrap: nowrap;justify-content: flex-start;overflow-y: hidden; padding-bottom: 0px;">
                                                <li class="nav-item">
                                                    <a style="white-space: pre;font-weight: 600;" class="nav-link active" id="pills-all-tab" data-category-id="all" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true" onclick="showAllProducts()">All</a>

                                                </li>
                                                <?php foreach ($category as $cat) : ?>
                                                    <li class="nav-item">
                                                        <a style="white-space: pre;font-weight: 600;" class="nav-link" id="pills-<?= url_title($cat['category'], '-', true); ?>-tab" data-category-id="<?= $cat['id']; ?>" data-toggle="pill" href="#pills-<?= url_title($cat['category'], '-', true); ?>" role="tab" aria-controls="pills-<?= url_title($cat['category'], '-', true); ?>" aria-selected="true" onclick="showProductsByCategory(<?= $cat['id']; ?>)"><?= $cat['category']; ?></a>

                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-all" role="tadbpanel" aria-labelledby="pills-all-tab">
                                        <?php foreach ($category as $cat) : ?>
                                            <h3 class="category-title" id="category-title-<?= $cat['id']; ?>" style="text-transform:uppercase; font-size:1.2rem; font-weight:600; color:#81B957"><?= $cat['category']; ?></h3>

                                            <div class="row pl-2 pr-2 row-category" id="product-category-<?= $cat['id']; ?>">
                                                <?php foreach ($products as $key => $value) : ?>
                                                    <?php foreach ($value as $loop) : ?>
                                                        <?php if ($loop['category_id'] != $cat['id']) {
                                                            continue;
                                                        } ?>

                                                        <div id="<?= $loop['id']; ?>" class="col-6 col-lg-4" style="padding-right: 5px;padding-left: 5px;display:grid;" data-flashsale-part="<?= $loop['flashsale_part']; ?>">
                                                            <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" data-product-name="<?= $loop['product']; ?>" onchange="get_price(this.value);get_price_and_scroll(this.value);" onclick="toggleElement()">
                                                            <label for="product-<?= $loop['id']; ?>" <?= ($loop['limitflashsale'] > 0) ? 'style="background: linear-gradient(45deg , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, rgba(255, 255, 255, 1) 50%, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD ); 
                                                            background-size: 700% 200%;
                                                            animation: gradientAnimation 1.5s linear infinite;"' : '' ?>>
                                                                <div style="text-align: center;margin-bottom:10px;margin-top:10px;">
                                                                    <?php if (!empty($loop['image'])): ?>
                                                                        <img onerror="this.style.display='none'"
                                                                            src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>"
                                                                            loading="lazy" class="icon-diamondx">

                                                                    <?php endif; ?>
                                                                    <br>
                                                                    <a style="font-size: 14px;font-weight:600;text-align: center;"
                                                                        for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>
                                                                    <br>

                                                                    <?php
                                                                    $price = null;
                                                                    $discountPrice = null;

                                                                    if ($loop['discount_price'] != 0) {
                                                                        if ($users !== false) {
                                                                            switch ($users['level']) {
                                                                                case 'Silver':
                                                                                    $price = !empty($loop['price_silver']) && $loop['price_silver'] !== 0 ? $loop['price_silver'] : $loop['price'];
                                                                                    break;
                                                                                case 'Gold':
                                                                                    $price = !empty($loop['price_gold']) && $loop['price_gold'] !== 0 ? $loop['price_gold'] : $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = !empty($loop['price_platinum']) && $loop['price_platinum'] !== 0 ? $loop['price_platinum'] : $loop['price'];
                                                                                    break;
                                                                                case 'Member':
                                                                                    $price = !empty($loop['price_bronze']) && $loop['price_bronze'] !== 0 ? $loop['price_bronze'] : $loop['price'];
                                                                                    break;
                                                                                default:
                                                                                    $price = $loop['price'];
                                                                                    break;
                                                                            }
                                                                        } else if ($price == 0 or empty($price)) {
                                                                            $price = $loop['price'];
                                                                        } else {
                                                                            $price = $loop['price'];
                                                                        }
                                                                        $discountPrice = $loop['discount_price'];
                                                                    } else {
                                                                        if ($users !== false) {
                                                                            switch ($users['level']) {
                                                                                case 'Silver':
                                                                                    $price = $loop['price_silver'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Gold':
                                                                                    $price = $loop['price_gold'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = $loop['price_platinum'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Platinum':
                                                                                    $price = $loop['price_platinum'] ?? $loop['price'];
                                                                                    break;
                                                                                case 'Member':
                                                                                    $price = $loop['price_bronze'] ?? $loop['price'];
                                                                                    break;
                                                                                default:
                                                                                    $price = $loop['price'];
                                                                                    break;
                                                                            }
                                                                        } else if ($price == 0 or empty($price)) {
                                                                            $price = $loop['price'];
                                                                        } else {
                                                                            $price = $loop['price'];
                                                                        }
                                                                    }

                                                                    ?>

                                                                    <a style="font-size: 12px; font-weight:500;" class="currency-idr">
                                                                        <?= $price; ?>
                                                                    </a>

                                                                    <?php if ($discountPrice != null): ?>
                                                                        <br>
                                                                        <p class="currency-idr-2 discount-price"><?= $discountPrice; ?></p>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($loop['limitflashsale']) && $loop['limitflashsale'] > 0) : ?>
                                                                        <div class="diskon-flashsale">
                                                                            <span class="limitflashsaletxt2">Tersisa : <?= $loop['limitflashsale']; ?></span>
                                                                        </div>
                                                                    <?php elseif (isset($loop['limitflashsale']) && $loop['limitflashsale'] === 0): ?>
                                                                        <div class="diskon-flashsale">
                                                                            <p class="limitflashsaletxt2">Produk Habis :(</p>
                                                                        </div>
                                                                    <?php endif ?>
                                                                    <br>
                                                                    <a style=" margin-bottom:10px;"></a>
                                                                </div>
                                                                <!-- Ribbon Promo Diskon -->
                                                                <?php if (isset($loop['discount_number']) && $loop['discount_number'] > 0) : ?>
                                                                    <div class="ribbon">
                                                                        <span class="text-ribbon">-<?= $loop['discount_number']; ?>%</span>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if ($loop['flashsale_part'] == 'Y' && $loop['limitflashsale'] >= 1): ?>
                                                                    <div class="flashsale-ribbon">
                                                                        <img src="<?= base_url(); ?>/assets/images/flashsale-part.png" style="width:40%">
                                                                    </div>
                                                                <?php endif; ?>
                                                                </input>
                                                            </label>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <div class="<?= count($category) >= 1 ? 'd-none' : ''; ?>">

                                    <div class="row pt-3 pl-2 pr-2 mb-2">
                                        <?php if (count($product) == 0): ?>
                                            <div class="col-12">
                                                <div class="alert alert-warning alert-dismissible mt-2 mb-0" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <strong>Information!</strong> Produk sedang tidak tersedia.
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>

                                        <?php foreach ($product as $loop): ?>
                                            <?php
                                            $currentTime = date('Y-m-d H:i:s');
                                            $expiredTime = $expired;
                                            $isExpired = strtotime($currentTime) > strtotime($expiredTime);
                                            if ($isExpired == true) {
                                                continue; // Skip rendering if the flash sale has expired
                                            }
                                            ?>
                                            <div id="<?= $loop['id'] ?>" class="col-6 col-lg-4 <?= ($loop['flashsale_part'] >= 1 && $loop['limitflashsale'] >= 1 ? "swiper-slide" : ""); ?>" style="padding-right: 5px;padding-left: 5px;display:grid;" data-flashsale-part="<?= $loop['flashsale_part']; ?>">
                                                <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);get_price_and_scroll(this.value, '<?= $loop['product']; ?>');" onclick="toggleElement()"> <label for="product-<?= $loop['id']; ?>" <?= ($loop['limitflashsale'] > 0) ? 'style="background: linear-gradient(45deg , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, rgba(255, 255, 255, 1) 50%, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD , #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD, #E1EEDD ); 
                                                    background-size: 700% 200%;
                                                    animation: gradientAnimation 1.5s linear infinite;"' : '' ?>>
                                                    <div style="text-align: center;margin-bottom:10px;margin-top:10px;">
                                                        <?php if (!empty($loop['image'])): ?>
                                                            <img onerror="this.style.display='none'"
                                                                src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>"
                                                                loading="lazy" class="icon-diamondx">
                                                        <?php endif; ?>
                                                        <br>
                                                        <a style="font-size: 14px;font-weight:600; text-align: center;color:var(--warna_hitam);"
                                                            for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>
                                                        <br>
                                                        <?php
                                                        $price = null;
                                                        $discountPrice = null;

                                                        if ($loop['discount_price'] != 0) {
                                                            if ($users !== false) {
                                                                switch ($users['level']) {
                                                                    case 'Silver':
                                                                        $price = $loop['price_silver'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Gold':
                                                                        $price = $loop['price_gold'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Platinum':
                                                                        $price = $loop['price_platinum'] ?? $loop['price'];
                                                                        break;
                                                                    case 'Member':
                                                                        $price = $loop['price_bronze'] ?? $loop['price'];
                                                                        break;
                                                                    default:
                                                                        $price = $loop['price'];
                                                                        break;
                                                                }
                                                            } else if ($price == 0 or empty($price)) {
                                                                $price = $loop['price'];
                                                            } else {
                                                                $price = $loop['price'];
                                                            }
                                                            $discountPrice = $loop['discount_price'];
                                                        } else {
                                                            if ($users !== false) {
                                                                switch ($users['level']) {
                                                                    case 'Silver':
                                                                        $price = !empty($loop['price_silver']) && $loop['price_silver'] !== 0 ? $loop['price_silver'] : $loop['price'];
                                                                        break;
                                                                    case 'Gold':
                                                                        $price = !empty($loop['price_gold']) && $loop['price_gold'] !== 0 ? $loop['price_gold'] : $loop['price'];
                                                                        break;
                                                                    case 'Platinum':
                                                                        $price = !empty($loop['price_platinum']) && $loop['price_platinum'] !== 0 ? $loop['price_platinum'] : $loop['price'];
                                                                        break;
                                                                    case 'Member':
                                                                        $price = !empty($loop['price_bronze']) && $loop['price_bronze'] !== 0 ? $loop['price_bronze'] : $loop['price'];
                                                                        break;
                                                                    default:
                                                                        $price = $loop['price'];
                                                                        break;
                                                                }
                                                            } else if ($price == 0 or empty($price)) {
                                                                $price = $loop['price'];
                                                            } else {
                                                                $price = $loop['price'];
                                                            }
                                                        }

                                                        ?>

                                                        <a style="font-size: 12px; font-weight:500;color:var(--warna_hitam);" class="currency-idr">
                                                            <?= $price; ?>
                                                        </a>

                                                        <?php if ($discountPrice != null): ?>
                                                            <p class="currency-idr-2 discount-price"><?= $discountPrice; ?></p>
                                                        <?php endif; ?>

                                                        <?php if (isset($loop['limitflashsale']) && $loop['limitflashsale'] > 0) : ?>
                                                            <div class="diskon-flashsale">
                                                                <!-- <h3 id="expired_time_flash_sale"></h3>   -->
                                                                <span class="limitflashsaletxt2">Tersisa : <?= $loop['limitflashsale']; ?></span>

                                                            </div>
                                                        <?php elseif (isset($loop['limitflashsale']) && $loop['limitflashsale'] === 0): ?>
                                                            <div class="diskon-flashsale">
                                                                <p class="limitflashsaletxt2">Produk Habis :(</p>
                                                            </div>
                                                        <?php endif ?>
                                                        <br>
                                                        <a style="margin-bottom:10px;"></a>
                                                    </div>

                                                    <!-- Ribbon Promo Diskon -->
                                                    <?php if (isset($loop['discount_number']) && $loop['discount_number'] > 0) : ?>
                                                        <div class="ribbon">
                                                            <span class="text-ribbon">-<?= $loop['discount_number']; ?>%</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <!-- Ribbon Flashsale -->
                                                    <?php if ($loop['flashsale_part'] >= 1 && $loop['limitflashsale'] >= 1): ?>
                                                        <div class="flashsale-ribbon">
                                                            <img src="<?= base_url(); ?>/assets/images/flashsale-part.png" style="width:40%">
                                                        </div>
                                                    <?php endif; ?>
                                                    </input>
                                                </label>
                                            </div>
                                            <?php
                                            // endif;
                                            ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <?php if ($games['slug'] == 'joki-paket-rank'): ?>
                                    <style>
                                        .kuantitibox {
                                            visibility: hidden;
                                        }
                                    </style>
                                <?php endif ?>

                                <!-- COMMENT SECTION -->

                                <div class="pb-3">
                                    <div id="comment-section" style="display:none;">
                                        <button id="comment1" value="Selamat Pagi" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Pagi</button>
                                        <button id="comment2" value="Selamat Sore" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Sore</button>
                                        <button id="comment3" value="Selamat Malam" onclick="handleCommentClick(this)">Lorem Ipsum Dolor Sit Amet. Selamat Malam</button>
                                    </div>
                                </div>


                                <!-- JOKI RANK ML -->

                                <?php if ($games['target'] == 'joki') : ?>
                                    <div id="kuantitiboxjk" class="hidden3">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-joki" value="1" min="1" id="jumlah_star_poin" name="joki[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari
                                            Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <!-- JOKI CLASSIC -->

                                <?php if ($games['target'] == 'jokicl') : ?>
                                    <div id="kuantitiboxcl" class="hidden">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-jokicl" min="1" value="1" id="jumlah_star_poin" name="jokicl[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <!-- JOKI MAGIC CHESS -->

                                <?php if ($games['slug'] == 'tes-kuantiti-box') : ?>
                                    <style>
                                        #kuantitibox {
                                            visibility: hidden;
                                        }
                                    </style>


                                <?php endif ?>

                                <?php if ($games['target'] == 'jokimc') : ?>
                                    <div id="kuantitiboxmc" class="hidden2">
                                        <h5 class="mb-2">Masukkan Jumlah (Star/Win)</h5>
                                        <input type="number" class="form-control name-jokimc" value="1" min="1" id="jumlah_star_poin" name="jokimc[jumlah_star_poin]" ondragleave="update_total();" onmouseover="update_total();" onclick="update_total();" onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari
                                            Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>

                                <?php if ($games['target'] == 'videomontage'): ?>
                                    <div class="kuantitibox mt-4">
                                        <h5 class="mb-2">Masukkan Jumlah Menit</h5>
                                        <input type="number" class="form-control name-videomontage" value="1" id="jumlah_menit"
                                            name="videomontage[jumlah_menit]" onchange="update_total();">
                                    </div>
                                <?php endif ?>

                                <?php if ($games['target'] == 'growtopia'): ?>
                                    <div id="kuantitibox" class="kuantitibox2 mt-4 text-dark">
                                        <h5 class="mb-2">Masukkan Quantity</h5>
                                        <input type="number" class="form-control name-growtopia" min="5" value="5"
                                            id="jumlah_star_poin" name="growtopia[jumlah_star_poin]"
                                            onchange="update_total();">
                                        <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka
                                            uang akan hangus</p>
                                    </div>
                                <?php endif ?>


                            </div>
                        </div>
                    </div>

                <?php endif; ?>



                <div class="popup-warning" id="popupWarning">
                    <div class="text-center mb-3">
                        <img src="<?= base_url(); ?>/assets/images/logo-hidden.png" width="6%" class="popup-img">
                        <div class="popup-content">
                            <span class="close" onclick="closePopupWarning()">&times;</span>
                            <p style="text-transform:none; font-weight:700; font-size:.90rem">Ups! Kamu Belum Login Nih</p>
                            <a style="font-size: 14px;text-align: center; color:#fff;">Untuk Melanjutkan Pembayaran Silahkan Login atau Daftar Member Hiddengame </a>
                            <br>
                            <div class="popup-bt">
                                <a href="<?= base_url(); ?>/login">
                                    <button type="button" class="login-bt">Login</button>
                                </a>
                                <a href="<?= base_url(); ?>/register">
                                    <button type="button" class="signup-bt">Daftar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->endSection(); ?>

                <?php $this->section('js'); ?>






                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        function showKomenAlert(callback) {
                            Swal.fire({
                                title: 'Peraturan Order Jasa Komen',
                                html: `
                Berikut adalah beberapa Peraturan Sederhana untuk Order Jasa Komen IG & Tiktok:
                <ul style="text-align:left;">
                    <li>Lengkapi Data Akun Kamu Dengan Teliti (Pastikan Username IG & Tiktok yang Anda masukkan sudah benar dan lengkap).</li>
                    <li>Pilih Jenis Variant Komen yang sudah disiapkan (Sesuaikan dengan kebutuhan Anda).</li>
                    <li>Estimasi waktu untuk komentar IG & Tiktok selama 1x24 jam.</li>
                    <li>Untuk akun IG & Tiktok dianjurkan untuk tidak di private untuk memudahkan proses komen.</li>
                    <li>Dimohon untuk melampirkan Nomor Whatsapp aktif pada halaman pengisian data.</li>
                    <li>Apabila proses komen sudah diselesaikan oleh masing-masing talent yang kalian order maka akan secara langsung di info melalui WA oleh Customer Service HiddenGame.</li>
                </ul>
            `,
                                icon: 'info',
                                confirmButtonText: 'Mengerti'
                            }).then((result) => {
                                if (result.isConfirmed && typeof callback === "function") {
                                    callback();
                                }
                            });
                        }

                        function showLikeAlert(callback) {
                            Swal.fire({
                                title: 'Peraturan Order Jasa Like',
                                html: `
                Berikut adalah beberapa Peraturan Sederhana untuk Order Jasa Like IG & Tiktok:
                <ul style="text-align:left;">
                    <li>Lengkapi Data Akun Kamu Dengan Teliti (Pastikan Username IG & Tiktok yang Anda masukkan sudah benar dan lengkap).</li>
                    <li>Silahkan Lampirkan Link Postingan yang ingin kalian Likes.</li>
                    <li>Diharapkan untuk beberapa postingan tidak mengandung pornografi, sara, judi ataupun kebencian dalam bentuk apapun.</li>
                    <li>Estimasi waktu untuk Proses Like IG & Tiktok selama 1x24 jam.</li>
                    <li>Untuk akun IG & Tiktok dianjurkan untuk tidak di private untuk memudahkan proses Likes.</li>
                    <li>Apabila proses Like sudah diselesaikan oleh masing-masing talent yang kalian order maka akan secara langsung di info melalui WA oleh Customer Service HiddenGame.</li>
                </ul>
            `,
                                icon: 'info',
                                confirmButtonText: 'Mengerti'
                            }).then((result) => {
                                if (result.isConfirmed && typeof callback === "function") {
                                    callback();
                                }
                            });
                        }

                        function showRepostAlert(callback) {
                            Swal.fire({
                                title: 'Peraturan Order Jasa Repost',
                                html: `
                Berikut adalah beberapa Peraturan Sederhana untuk Order Jasa Repost Tiktok:
                <ul style="text-align:left;">
                    <li>Lengkapi Data Akun Kamu Dengan Teliti (Pastikan Username Tiktok yang Anda masukkan sudah benar dan lengkap).</li>
                    <li>Silahkan Lampirkan Link Video yang ingin kalian Repost.</li>
                    <li>Diharapkan untuk beberapa postingan video tidak mengandung pornografi, sara, judi ataupun kebencian dalam bentuk apapun.</li>
                    <li>Untuk akun Tiktok dianjurkan untuk tidak di private untuk memudahkan proses repost.</li>
                    <li>Estimasi waktu untuk Proses Repost Tiktok selama 1x24 jam.</li>
                    <li>Apabila proses Like sudah diselesaikan oleh masing-masing talent yang kalian order maka akan secara langsung di info melalui WA oleh Customer Service HiddenGame.</li>
                </ul>
            `,
                                icon: 'info',
                                confirmButtonText: 'Mengerti'
                            }).then((result) => {
                                if (result.isConfirmed && typeof callback === "function") {
                                    callback();
                                }
                            });
                        }

                        // Event listener untuk elemen dengan data-komen
                        document.querySelectorAll('[data-komen="true"]').forEach(function(element) {
                            element.addEventListener("click", function() {
                                var productId = this.querySelector('input[name="product"]').value;
                                showKomenAlert(function() {
                                    get_price_and_scroll(productId);
                                });
                            });
                        });

                        // Event listener untuk elemen dengan data-like
                        document.querySelectorAll('[data-like="true"]').forEach(function(element) {
                            element.addEventListener("click", function() {
                                var productId = this.querySelector('input[name="product"]').value;
                                showLikeAlert(function() {
                                    get_price_and_scroll(productId);
                                });
                            });
                        });

                        // Event listener untuk elemen dengan data-repost
                        document.querySelectorAll('[data-repost="true"]').forEach(function(element) {
                            element.addEventListener("click", function() {
                                var productId = this.querySelector('input[name="product"]').value;
                                showRepostAlert(function() {
                                    get_price_and_scroll(productId);
                                });
                            });
                        });
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        var timeParsed = '<?= $expired; ?>'.replace(' ', 'T').split(/[^0-9]/);
                        var countDown = new Date(new Date(timeParsed[0], timeParsed[1] - 1, timeParsed[2], timeParsed[3], timeParsed[4], timeParsed[5])).getTime();

                        var x = setInterval(() => {
                            let nowTime = new Date().getTime();
                            var distance = countDown - nowTime;
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            if (distance <= 0) {
                                clearInterval(x);
                                $("#expired_time_flash_sale").text("Flash Sale Berakhir");
                                $(".swiper-slide").addClass("sold-out"); // Disable access to product
                                $(".radio-nominale").attr("disabled", true); // Disable radio buttons
                            } else {
                                $("#expired_time_flash_sale").text("Flash Sale berhasil");
                            }
                        }, 1000);
                    });
                </script>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get the product radio buttons
                        const productRadios = document.querySelectorAll('input[name="product"]');
                        const komenDropdown = document.getElementById('js-universal-komen');

                        // Add event listener to each radio button
                        productRadios.forEach(function(radio) {
                            radio.addEventListener('change', function() {
                                const selectedProduct = this.dataset.productName.toLowerCase();
                                // Check if the selected product contains 'komen'
                                if (selectedProduct.includes('komen')) {
                                    komenDropdown.style.display = 'flex';
                                } else {
                                    komenDropdown.style.display = 'none';
                                    komenDropdown.value = "Tidak Ada"; // Reset the value of the dropdown
                                }
                            });
                        });
                    });
                </script>



                <script>
                    // Fungsi untuk mengubah status produk ke "off"
                    function turnProductOff(productId) {
                        // Kirim permintaan AJAX ke endpoint yang mengubah status produk ke "off"
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "endpoint_url_here", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                // console.log("Status produk telah diubah menjadi off.");
                            }
                        };
                        xhr.send(JSON.stringify({
                            productId: productId,
                            status: "off"
                        }));
                    }

                    // Fungsi untuk mengubah status produk ke "on"
                    function turnProductOn(productId) {
                        // Kirim permintaan AJAX ke endpoint yang mengubah status produk ke "on"
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "endpoint_url_here", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                // console.log("Status produk telah diubah menjadi on.");
                            }
                        };
                        xhr.send(JSON.stringify({
                            productId: productId,
                            status: "on"
                        }));
                    }

                    // Fungsi untuk mengubah status produk berdasarkan flashsale_part
                    function toggleProductStatusByFlashsalePart() {
                        var currentTime = new Date();
                        var currentHour = currentTime.getHours();
                        var currentMinute = currentTime.getMinutes();

                        // Mengambil semua produk dalam dokumen
                        var allProducts = document.querySelectorAll('.col-6');

                        // Iterasi melalui setiap produk
                        allProducts.forEach(function(product) {
                            var flashsalePart = product.dataset.flashsalePart; // Ambil nilai flashsale_part dari data atribut

                            // Jika flashsale_part == 1
                            if (flashsalePart === '1' && currentHour === 10 && currentMinute === 51) {
                                // Panggil fungsi untuk mengubah status produk ke "off"
                                turnProductOff(productId);
                            } else if (flashsalePart === '1' && currentHour === 10 && currentMinute === 52) {
                                // Panggil fungsi untuk mengubah status produk ke "on"
                                turnProductOn(productId);
                            }

                            // Jika flashsale_part == 2
                            if (flashsalePart === '2' && currentHour === 10 && currentMinute === 55) {
                                // Panggil fungsi untuk mengubah status produk ke "off"
                                turnProductOff(productId);
                            } else if (flashsalePart === '2' && currentHour === 10 && currentMinute === 56) {
                                // Panggil fungsi untuk mengubah status produk ke "on"
                                turnProductOn(productId);
                            }

                            // Jika flashsale_part == 3
                            if (flashsalePart === '3' && currentHour === 11 && currentMinute === 20) {
                                // Panggil fungsi untuk mengubah status produk ke "off"
                                turnProductOff(productId);
                            } else if (flashsalePart === '3' && currentHour === 11 && currentMinute === 21) {
                                // Panggil fungsi untuk mengubah status produk ke "on"
                                turnProductOn(productId);
                            }
                        });
                    }

                    // Panggil fungsi untuk mengubah status produk saat halaman dimuat
                    window.onload = function() {
                        toggleProductStatusByFlashsalePart();

                        // Set interval untuk memperbarui status produk setiap menit
                        setInterval(function() {
                            toggleProductStatusByFlashsalePart();
                        }, 60000); // 1 menit dalam milidetik
                    };
                </script>





                <script>
                    // Menambahkan event listener ke elemen luar dari popup
                    document.addEventListener('click', function(event) {
                        var popup = document.getElementById('popupWarning');
                        // Periksa apakah klik dilakukan di luar popup dan popup sedang ditampilkan
                        if (event.target !== popup && !popup.contains(event.target) && popup.style.display === 'block') {
                            closePopupWarning();
                        }
                    });

                    // Memperbarui fungsi showPopupWarning dan closePopupWarning
                    function showPopupWarning() {
                        var popup = document.getElementById('popupWarning');
                        popup.style.display = 'block';
                        disableScroll();
                        hideContent();
                        hideFooter();
                    }

                    function closePopupWarning() {
                        var popup = document.getElementById('popupWarning');
                        popup.style.display = 'none';
                        enableScroll();
                        showContent();
                        showFooter();
                    }


                    var methodBalance = document.getElementById('method-balance');


                    methodBalance.addEventListener('change', function() {
                        <?php if ($users === false): ?>
                            showPopupWarning();
                            methodBalance.checked = false;
                        <?php endif; ?>
                    });

                    function disableScroll() {
                        // Mendapatkan posisi scroll saat ini
                        var scrollPosition = [
                            window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                            window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
                        ];
                        // Mendapatkan ukuran body
                        var body = document.body;
                        // Menyimpan style lama overflow
                        body.style.overflow = 'hidden';
                        // Mengatur posisi scroll kembali ke posisi sebelumnya
                        window.scrollTo(scrollPosition[0], scrollPosition[1]);
                    }

                    function enableScroll() {
                        // Mendapatkan body
                        var body = document.body;
                        // Mengembalikan style overflow ke nilai awalnya
                        body.style.overflow = 'auto';
                    }

                    function hideContent() {
                        var contentElements = document.querySelectorAll('.container-min-banner.pb-5');
                        var contentElements3 = document.querySelectorAll('.voucher-box');
                        var contentElements4 = document.querySelectorAll('.total-price-box');
                        contentElements.forEach(function(element) {
                            element.style.filter = 'blur(5px)';
                        });
                        contentElements3.forEach(function(element) {
                            element.style.filter = 'blur(5px)';
                        });
                        contentElements4.forEach(function(element) {
                            element.style.filter = 'blur(5px)';
                        });

                        document.body.style.Filter = 'blur(5px)';
                    }

                    function showContent() {
                        var contentElements = document.querySelectorAll('.container-min-banner.pb-5');
                        var contentElements3 = document.querySelectorAll('.voucher-box');
                        var contentElements4 = document.querySelectorAll('.total-price-box');
                        contentElements.forEach(function(element) {
                            element.style.filter = 'none';
                        });
                        contentElements3.forEach(function(element) {
                            element.style.filter = 'none';
                        });
                        contentElements4.forEach(function(element) {
                            element.style.filter = 'none';
                        });

                        document.body.style.Filter = 'none';
                    }
                </script>


                <script>
                    function showProductsByCategory(categoryId) {
                        // Menyembunyikan produk yang tidak dipilih
                        var allProducts = document.querySelectorAll('.row-category');
                        allProducts.forEach(function(product) {
                            if (product.id === "product-category-" + categoryId) {
                                product.style.opacity = "1"; // Menampilkan produk yang dipilih
                                product.style.pointerEvents = "auto"; // Mengaktifkan interaksi pengguna pada produk yang dipilih
                                // product.style.display = "block";
                                product.style.display = "flex";
                                product.style.flexWrap = "wrap";
                            } else {
                                product.style.display = "none"; // Menyembunyikan produk yang tidak dipilih
                            }
                        });

                        // Menampilkan judul kategori yang sesuai dengan kategori yang dipilih
                        var allTitles = document.querySelectorAll('.category-title');
                        allTitles.forEach(function(title) {
                            title.style.display = "none"; // Semua judul kategori disembunyikan
                        });
                        var selectedCategoryTitle = document.getElementById("category-title-" + categoryId);
                        if (selectedCategoryTitle) {
                            selectedCategoryTitle.style.display = "block"; // Menampilkan judul kategori yang dipilih
                        }

                    }


                    function showAllProducts() {
                        // Menampilkan semua produk yang memiliki kategori
                        var allProducts = document.querySelectorAll('.row-category');
                        allProducts.forEach(function(product) {
                            product.style.display = "flex"; // Menampilkan semua produk yang memiliki kategori
                            product.style.opacity = "1"; // Set opacity menjadi 1
                            product.style.height = "auto"; // Set height menjadi auto
                        });

                        // Menampilkan semua judul kategori
                        var allTitles = document.querySelectorAll('.category-title');
                        allTitles.forEach(function(title) {
                            title.style.display = "block"; // Tampilkan semua judul kategori
                        });
                    }
                </script>

                <script>
                    function toggleElement() {

                        //JOKI RANK 

                        <?php if ($games['target'] == 'joki') : ?>
                            var targetElement3 = document.getElementById("kuantitiboxjk")
                            var kuantitiboxjk3 = document.getElementById("jumlah_star_poin")
                            let showElement1 = document.getElementById("product-1481");
                            let showElement2 = document.getElementById("product-1483");
                            let showElement3 = document.getElementById("product-1485");

                            if (showElement1.checked || showElement2.checked || showElement3.checked) {
                                kuantitiboxjk.classList.remove("hidden3");
                                kuantitiboxjk3.value = 5;
                                kuantitiboxjk3.min = 5;
                                update_total();

                            } else {
                                kuantitiboxjk.classList.add("hidden3");
                                kuantitiboxjk3.value = 1;
                                kuantitiboxjk3.min = 1

                                resetKuantitiboxjk();
                            }
                        <?php endif ?>

                        //  JOKI CLASSIC
                        <?php if ($games['target'] == 'jokicl') : ?>
                            var targetElement1 = document.getElementById("kuantitiboxcl");
                            var kuantitiboxcl2 = document.getElementById("jumlah_star_poin");
                            let showElement4 = document.getElementById("product-1487");
                            let showElement5 = document.getElementById("product-1488");
                            let showElement6 = document.getElementById("product-1489");

                            if (showElement4.checked || showElement5.checked || showElement6.checked) {
                                kuantitiboxcl.classList.remove("hidden");
                                kuantitiboxcl2.value = 5;
                                kuantitiboxcl2.min = 5;
                                update_total();

                            } else {
                                kuantitiboxcl.classList.add("hidden");
                                kuantitiboxcl2.value = 1;
                                kuantitiboxcl2.min = 1
                                resetKuantitiboxcl();
                            }

                        <?php endif ?>


                        // JOKI MAGIC CHESS
                        <?php if ($games['target'] == 'jokimc') : ?>
                            var targetElement2 = document.getElementById("kuantitiboxmc")
                            var kuantitiboxmc2 = document.getElementById("jumlah_star_poin")
                            let showElement7 = document.getElementById("product-1498");
                            let showElement8 = document.getElementById("product-1499");
                            let showElement9 = document.getElementById("product-1500");
                            let showElement10 = document.getElementById("product-1501");
                            let showElement11 = document.getElementById("product-1502");


                            if (showElement7.checked || showElement8.checked || showElement9.checked || showElement10.checked || showElement11.checked) {
                                kuantitiboxmc.classList.remove("hidden2");
                                kuantitiboxmc2.value = 5;
                                kuantitiboxmc2.min = 5;

                                update_total();

                            } else {
                                kuantitiboxmc.classList.add("hidden2");
                                kuantitiboxmc2.value = 1;
                                kuantitiboxmc2.min = 1

                                resetKuantitiboxmc();
                            }
                        <?php endif ?>
                    }

                    function resetKuantitiboxjk() {
                        <?php if ($games['target'] == 'joki') : ?>
                            var numberInput = document.getElementById('jumlah_star_poin');
                            if (numberInput) {
                                numberInput.value = 1; // Reset input value
                            }
                        <?php endif ?>
                    }

                    function resetKuantitiboxcl() {
                        <?php if ($games['target'] == 'jokicl') : ?>
                            var numberInput = document.getElementById('jumlah_star_poin');
                            if (numberInput) {
                                numberInput.value = 1; // Reset input value
                            }
                        <?php endif ?>
                    }

                    function resetKuantitiboxmc() {
                        <?php if ($games['target'] == 'jokimc') : ?>
                            var numberInput = document.getElementById('jumlah_star_poin');
                            if (numberInput) {
                                numberInput.value = 1; // Reset input value
                            }
                        <?php endif ?>
                    }
                </script>

                <script>
                    var imageModalButton = document.getElementById('imageModalButton');
                    var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

                    var tooltipImage = document.getElementById('tooltipImage');
                    var imageTooltipContainer = document.getElementById('imageTooltipContainer');

                    tooltipImage.onload = function() {
                        imageTooltipContainer.style.display = 'block';
                    };

                    tooltipImage.onerror = function() {
                        imageTooltipContainer.style.display = 'none';
                    };

                    if (tooltipImage.complete && tooltipImage.naturalWidth !== 0) {
                        imageTooltipContainer.style.display = 'block';
                    }

                    imageModalButton.addEventListener('click', function() {
                        if (window.innerWidth <= 1000) {
                            imageModal.show();
                        }
                    });
                </script>

                <script>
                    document.querySelectorAll('input[name="user_id"], input[name="zone_id"], input[name="email_order"]').forEach(function(input) {
                        input.addEventListener('input', function() {
                            var gameName = '<?= $games['games']; ?>';
                            localStorage.setItem(gameName + '-' + this.name, this.value);
                        });
                    });

                    window.addEventListener('load', function() {
                        var gameName = '<?= $games['games']; ?>';
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
                <!--<script>-->
                <!--  !function(f,b,e,v,n,t,s)-->
                <!--  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?-->
                <!--  n.callMethod.apply(n,arguments):n.queue.push(arguments)};-->
                <!--  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';-->
                <!--  n.queue=[];t=b.createElement(e);t.async=!0;-->
                <!--  t.src=v;s=b.getElementsByTagName(e)[0];-->
                <!--  s.parentNode.insertBefore(t,s)}(window, document,'script',-->
                <!--  'https://connect.facebook.net/en_US/fbevents.js');-->

                <!--  fbq('init', '{938473200580408}');-->
                <!--  fbq('init', '{9532506813488688}');-->
                <!--  fbq('init', '{584979920420062}');-->
                <!--  fbq('track', 'ViewContent');-->
                <!--</script>-->
                <!--<noscript>-->
                <!--  <img height="1" width="1" style="display:none" -->
                <!--       src="https://www.facebook.com/tr?id={938473200580408}&ev=ViewContent&noscript=1"/>-->
                <!--  <img height="1" width="1" style="display:none" -->
                <!--       src="https://www.facebook.com/tr?id={9532506813488688}&ev=ViewContent&noscript=1"/>-->
                <!--       <img height="1" width="1" style="display:none" -->
                <!--       src="https://www.facebook.com/tr?id={584979920420062}&ev=ViewContent&noscript=1"/>-->
                <!--</noscript>-->
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
                        <?php elseif ($games['target'] == 'jokicl') : ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php elseif ($games['target'] == 'jokigendong') : ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php elseif ($games['target'] == 'jokimc') : ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php elseif ($games['target'] == 'videomontage'): ?>
                            var jumlah = $("#jumlah_menit").val();
                        <?php elseif ($games['target'] == 'growtopia'): ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php else: ?>
                            var jumlah = 1;
                        <?php endif; ?>


                        $("#product_id").val(id);

                        $.ajax({
                            url: '<?= base_url(); ?>/games/order/get-price/' + id,
                            type: 'POST',
                            data: 'jumlah=' + jumlah,
                            dataType: 'JSON',
                            success: function(result) {
                                for (let price in result) {
                                    $("#price-method-" + result[price].method).text('Rp ' + result[price].price);
                                    if (result[price].price_disc && result[price].price_member) {
                                        var balanceValue = parseNumber(result[price].price_member);
                                        var balancediscValue = parseNumber(result[price].price_disc);
                                        var diskonPersen = ((balancediscValue - balanceValue) / balancediscValue) * 100;
                                        var diskonText = diskonPersen < 0 ? diskonPersen.toFixed(2) + "%" : "-" + diskonPersen.toFixed(2) + "%";
                                        $("#price-disc-method-" + result[price].method).text('Rp ' + result[price].price_disc);
                                        $("#price-member-method-" + result[price].method).text('Rp ' + result[price].price_member);
                                        $("#price-diskon-method-" + result[price].method).text(diskonText);
                                    }

                                    var harga = parseNumber(result[price].price);
                                    var textinfo = (result[price].info);

                                    var balance = document.getElementById("price-member-method-balance");
                                    var balancedisc = document.getElementById("price-disc-method-balancedisc");
                                    var diskonPersen = document.getElementById("price-diskon-method");

                                    var BCATransfer = document.getElementById("price-method-Manual-BCATransfer");
                                    var BNITransfer = document.getElementById("price-method-Manual-BNITransfer");
                                    var BRITransfer = document.getElementById("price-method-Manual-BRITransfer");
                                    var MandiriTransfer = document.getElementById("price-method-Manual-Gopay");
                                    var BCAQRIS = document.getElementById("price-method-Manual-QRIS");

                                    var qrisc = document.getElementById("price-method-Tripay-QRISC");
                                    var qris1 = document.getElementById("price-method-Tripay-QRIS");
                                    var ovo = document.getElementById("price-method-Tripay-OVO");
                                    var tdana = document.getElementById("price-method-Tripay-DANA");
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
                                    var qrisnobud = document.getElementById("price-method-Duitku-NQ");
                                    var qrisspd = document.getElementById("price-method-Duitku-SP");
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
                                    // var vaagd = document.getElementById("price-method-Duitku-AG");
                                    var vabncd = document.getElementById("price-method-Duitku-NC");
                                    var alfamartd = document.getElementById("price-method-Duitku-FT");
                                    var indomaretd = document.getElementById("price-method-Duitku-IR");
                                    var vamandirid = document.getElementById("price-method-Duitku-M2");
                                    var vaarthagrahad = document.getElementById("price-method-Duitku-AG");
                                    var vasampoernad = document.getElementById("price-method-Duitku-S1");

                                    if (qrisd !== null) {
                                        qrisd.innerHTML = 'Rp ' + (Math.round((harga * 1.0078) + 0)).toLocaleString('id-ID');
                                    }
                                    if (qrisnobud !== null) {
                                        qrisnobud.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                                    }
                                    if (qrisspd !== null) {
                                        qrisspd.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                                    }
                                    if (ovod !== null) {
                                        ovod.innerHTML = 'Rp ' + Math.round((harga * 1.0303) + 0.2).toLocaleString('id-ID');
                                    }
                                    if (danad !== null) {
                                        danad.innerHTML = 'Rp ' + Math.round((harga * 1.0167) + 0.2).toLocaleString('id-ID');
                                    }
                                    if (shopeed !== null) {
                                        shopeed.innerHTML = 'Rp ' + Math.round((harga * 1.04) + 0.2).toLocaleString('id-ID');
                                    }
                                    if (linkajad !== null) {
                                        linkajad.innerHTML = 'Rp ' + Math.round((harga * 1.0167) + 0.2).toLocaleString('id-ID');
                                    }
                                    if (vaatmd !== null) {
                                        vaatmd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    // if (vaagd !== null) {
                                    //     vaagd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    // }
                                    if (vabncd !== null) {
                                        vabncd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
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
                                    if (indomaretd !== null) {
                                        indomaretd.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                                    }
                                    if (vamandirid !== null) {
                                        vamandirid.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                                    }
                                    if (vaarthagrahad !== null) {
                                        vaarthagrahad.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                                    }
                                    if (vasampoernad !== null) {
                                        vasampoernad.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                                    }

                                    var qrissl = document.getElementById("price-method-Smartlink-WALLET_QRIS");
                                    var ovosl = document.getElementById("price-method-Smartlink-WALLET_OVO");
                                    var danasl = document.getElementById("price-method-Smartlink-WALLET_DANA");
                                    var shopeesl = document.getElementById("price-method-Smartlink-WALLET_SHOPEEPAY");
                                    var linkajasl = document.getElementById("price-method-Smartlink-WALLET_LINKAJA");
                                    var ccvisasl = document.getElementById("price-method-Smartlink-CC_VISA");
                                    var alfamartsl = document.getElementById("price-method-Smartlink-OTC_ALFAMART");
                                    var indomaretsl = document.getElementById("price-method-Smartlink-OTC_INDOMARET");
                                    var vabnisl = document.getElementById("price-method-Smartlink-VA_BNI");
                                    var vabrisl = document.getElementById("price-method-Smartlink-VA_BRI");
                                    var vabncsl = document.getElementById("price-method-Smartlink-VA_BNC");
                                    var vacimbsl = document.getElementById("price-method-Smartlink-VA_CIMB");
                                    var vamandirisl = document.getElementById("price-method-Smartlink-VA_MANDIRI");
                                    var vapermatasl = document.getElementById("price-method-Smartlink-VA_PERMATA");

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

                                    if (qrisx !== null) {
                                        qrisx.innerHTML = 'Rp ' + (Math.round((harga * 1.0071) + 0)).toLocaleString('id-ID');
                                    }
                                    if (ovox !== null) {
                                        ovox.innerHTML = 'Rp ' + (Math.round(harga * 1.0313)).toLocaleString('id-ID');
                                    }
                                    if (shopeex !== null) {
                                        shopeex.innerHTML = 'Rp ' + (Math.round(harga * 1.0417)).toLocaleString('id-ID');
                                    }
                                    if (danax !== null) {
                                        danax.innerHTML = 'Rp ' + (Math.round(harga * 1.017)).toLocaleString('id-ID');
                                    }
                                    if (linkajax !== null) {
                                        linkajax.innerHTML = 'Rp ' + (Math.round(harga * 1.0313)).toLocaleString('id-ID');
                                    }
                                    if (astrapayx !== null) {
                                        astrapayx.innerHTML = 'Rp ' + (Math.round(harga * 1.017)).toLocaleString('id-ID');
                                    }
                                    if (vabnix !== null) {
                                        vabnix.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vapermatax !== null) {
                                        vapermatax.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vamandirix !== null) {
                                        vamandirix.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vabrix !== null) {
                                        vabrix.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vabcax !== null) {
                                        vabcax.innerHTML = 'Rp ' + (Math.round(harga + 4440)).toLocaleString('id-ID');
                                    }
                                    if (vaBJBx !== null) {
                                        vaBJBx.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vaBSIx !== null) {
                                        vaBSIx.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString('id-ID');
                                    }
                                    if (vaSAHABAT_SAMPOERNA !== null) {
                                        vaSAHABAT_SAMPOERNA.innerHTML = 'Rp ' + (Math.round(harga + 4500)).toLocaleString(
                                            'id-ID');
                                    }
                                    if (indomaretx !== null) {
                                        indomaretx.innerHTML = 'Rp ' + (Math.round(harga + 7800)).toLocaleString('id-ID');
                                    }
                                    if (alfamartx !== null) {
                                        alfamartx.innerHTML = 'Rp ' + (Math.round(harga + 5600)).toLocaleString('id-ID');
                                    }

                                    var tpqris = document.getElementById("price-method-Tokopay-QRIS");
                                    var tpqrisrt = document.getElementById("price-method-Tokopay-QRISREALTIME");
                                    var tpqriscs = document.getElementById("price-method-Tokopay-QRIS_CUSTOM");
                                    var tpbcava = document.getElementById("price-method-Tokopay-BCAVA");
                                    var tpmandiriva = document.getElementById("price-method-Tokopay-MANDIRIVA");
                                    var tpbniva = document.getElementById("price-method-Tokopay-BNIVA");
                                    var tpcimbva = document.getElementById("price-method-Tokopay-CIMBVA");
                                    var tppermatava = document.getElementById("price-method-Tokopay-PERMATAVA");
                                    var tpbriva = document.getElementById("price-method-Tokopay-BRIVA");
                                    var tpbncva = document.getElementById("price-method-Tokopay-BNCVA");
                                    var tpdanamonva = document.getElementById("price-method-Tokopay-DANAMONVA");
                                    var tpbsiva = document.getElementById("price-method-Tokopay-BSIVA");
                                    var tppermatavaa = document.getElementById("price-method-Tokopay-PERMATAVAA");
                                    var tpalfamart = document.getElementById("price-method-Tokopay-ALFAMART");
                                    var tpindomaret = document.getElementById("price-method-Tokopay-INDOMARET");
                                    var tpgopay = document.getElementById("price-method-Tokopay-GOPAY");
                                    var tpovo = document.getElementById("price-method-Tokopay-OVOPUSH");
                                    var tpshopee = document.getElementById("price-method-Tokopay-SHOPEEPAY");
                                    var tpdana = document.getElementById("price-method-Tokopay-DANA");
                                    var tpvirgo = document.getElementById("price-method-Tokopay-VIRGO");
                                    var tpastrapay = document.getElementById("price-method-Tokopay-ASTRAPAY");
                                    var tplinkaja = document.getElementById("price-method-Tokopay-LINKAJA");
                                    var tptelkom = document.getElementById("price-method-Tokopay-TELKOMSEL");
                                    var tpaxis = document.getElementById("price-method-Tokopay-AXIS");
                                    var tpxl = document.getElementById("price-method-Tokopay-XL");
                                    var tptri = document.getElementById("price-method-Tokopay-TRI");
                                    var tpsmartfren = document.getElementById("price-method-Tokopay-SMARTFREN");
                                    var tpdanacs = document.getElementById("price-method-Tokopay-DANA_CUSTOM");
                                    var tpshopeecs = document.getElementById("price-method-Tokopay-SHOPEE_CUSTOM");
                                    var tpovocs = document.getElementById("price-method-Tokopay-OVO_CUSTOM");
                                    var tplinkajacs = document.getElementById("price-method-Tokopay-LINKAJA_CUSTOM");

                                    if (tpqris !== null) {
                                        tpqris.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 100)).toLocaleString('id-ID');
                                    }
                                    if (tpqrisrt !== null) {
                                        tpqrisrt.innerHTML = 'Rp ' + (Math.round(harga * 1.017)).toLocaleString('id-ID');
                                    }
                                    if (tpqriscs !== null) {
                                        tpqriscs.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 250)).toLocaleString('id-ID');
                                    }
                                    if (tpbcava !== null) {
                                        tpbcava.innerHTML = 'Rp ' + (Math.round((harga * 1.01) + 4200)).toLocaleString('id-ID');
                                    }
                                    if (tpmandiriva !== null) {
                                        tpmandiriva.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (tpbniva !== null) {
                                        tpbniva.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (tpcimbva !== null) {
                                        tpcimbva.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                                    }
                                    if (tppermatava !== null) {
                                        tppermatava.innerHTML = 'Rp ' + (Math.round(harga + 2000)).toLocaleString('id-ID');
                                    }
                                    if (tpbriva !== null) {
                                        tpbriva.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    if (tpbncva !== null) {
                                        tpbncva.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    if (tpdanamonva !== null) {
                                        tpdanamonva.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                                    }
                                    if (tpbsiva !== null) {
                                        tpbsiva.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (tppermatavaa !== null) {
                                        tppermatavaa.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    if (tpalfamart !== null) {
                                        tpalfamart.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    if (tpindomaret !== null) {
                                        tpindomaret.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                                    }
                                    if (tpgopay !== null) {
                                        tpgopay.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                                    }
                                    if (tpovo !== null) {
                                        tpovo.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }
                                    if (tpshopee !== null) {
                                        tpshopee.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }
                                    if (tpdana !== null) {
                                        tpdana.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }
                                    if (tplinkaja !== null) {
                                        tplinkaja.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                                    }
                                    if (tpvirgo !== null) {
                                        tpvirgo.innerHTML = 'Rp ' + (Math.round(harga * 1.02)).toLocaleString('id-ID');
                                    }
                                    if (tpastrapay !== null) {
                                        tpastrapay.innerHTML = 'Rp ' + (Math.round(harga * 1.028)).toLocaleString('id-ID');
                                    }
                                    if (tptelkom !== null) {
                                        tptelkom.innerHTML = 'Rp ' + (Math.ceil(harga * 1.32 / 1000) * 1000).toLocaleString('id-ID');
                                    }
                                    if (tpaxis !== null) {
                                        tpaxis.innerHTML = 'Rp ' + (Math.ceil(harga * 1.25 / 1000) * 1000).toLocaleString('id-ID');
                                    }
                                    if (tpxl !== null) {
                                        tpxl.innerHTML = 'Rp ' + (Math.ceil(harga * 1.25 / 1000) * 1000).toLocaleString('id-ID');
                                    }
                                    if (tptri !== null) {
                                        tptri.innerHTML = 'Rp ' + (Math.ceil(harga * 1.25 / 1000) * 1000).toLocaleString('id-ID');
                                    }
                                    if (tpsmartfren !== null) {
                                        tpsmartfren.innerHTML = 'Rp ' + (Math.ceil(harga * 1.25 / 1000) * 1000).toLocaleString('id-ID');
                                    }
                                    if (tpdanacs !== null) {
                                        tpdanacs.innerHTML = 'Rp ' + (Math.round(harga * 1.028)).toLocaleString('id-ID');
                                    }
                                    if (tpshopeecs !== null) {
                                        tpshopeecs.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }
                                    if (tpovocs !== null) {
                                        tpovocs.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }
                                    if (tplinkajacs !== null) {
                                        tplinkajacs.innerHTML = 'Rp ' + (Math.round(harga * 1.025)).toLocaleString('id-ID');
                                    }

                                    if (balance !== null && result[price].price_member) {
                                        balance.innerHTML = 'Rp ' + (Math.round((parseNumber(result[price].price_member)))).toLocaleString('id-ID');
                                    }

                                    if (balancedisc !== null && result[price].price_disc) {
                                        balancedisc.innerHTML = 'Rp ' + (Math.round((parseNumber(result[price].price_disc)))).toLocaleString('id-ID');
                                    }

                                    if (qrissl !== null) {
                                        qrissl.innerHTML = 'Rp ' + (Math.round((harga * 1.01) + 0)).toLocaleString('id-ID');
                                    }
                                    if (ovosl !== null) {
                                        ovosl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                                    }
                                    if (danasl !== null) {
                                        danasl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                                    }
                                    if (shopeesl !== null) {
                                        shopeesl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                                    }
                                    if (linkajasl !== null) {
                                        linkajasl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                                    }
                                    if (ccvisasl !== null) {
                                        ccvisasl.innerHTML = 'Rp ' + (Math.round(harga * 1.0275)).toLocaleString('id-ID');
                                    }
                                    if (alfamartsl !== null) {
                                        alfamartsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (indomaretsl !== null) {
                                        indomaretsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vabnisl !== null) {
                                        vabnisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vabrisl !== null) {
                                        vabrisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vabncsl !== null) {
                                        vabncsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vacimbsl !== null) {
                                        vacimbsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vamandirisl !== null) {
                                        vamandirisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                                    }
                                    if (vapermatasl !== null) {
                                        vapermatasl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
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
                                    if (BCAQRIS !== null) {
                                        BCAQRIS.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 800)).toLocaleString('id-ID');
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
                                    if (tdana) {
                                        tdana.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
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

                        var jumlah_star_poin = document.getElementById("jumlah_star_poin");
                        if (jumlah_star_poin.value < 5) {
                            jumlah_star_poin.value = 5;
                        }
                    }

                    function process_order() {

                        var buyButton = document.getElementById('buyButton');
                        buyButton.disabled = true; // Menonaktifkan tombol

                        <?php if ($games['target'] == 'joki'): ?>
                            var user_id = $('.name-joki').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'jokicl') : ?>
                            var user_id = $('.name-jokicl').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'jokigendong') : ?>
                            var user_id = $('.name-jokigendong').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'jokimc') : ?>
                            var user_id = $('.name-jokimc').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'skinml'): ?>
                            var user_id = $('.name-skinml').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'videomontage'): ?>
                            var user_id = $('.name-videomontage').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'topuplogin'): ?>
                            var user_id = $('.name-topuplogin').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-ragnarox'): ?>
                            var user_id = $('.name-lg-ragnarox').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-dragonhunter'): ?>
                            var user_id = $('.name-lg-dragonhunter').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-fourgods'): ?>
                            var user_id = $('.name-lg-fourgods').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-genshinimpact'): ?>
                            var user_id = $('.name-lg-genshinimpact').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-ninokuni'): ?>
                            var user_id = $('.name-lg-ninokuni').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-neverafter'): ?>
                            var user_id = $('.name-lg-neverafter').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'lg-clashofclans'): ?>
                            var user_id = $('.name-lg-clashofclans').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginapex'): ?>
                            var user_id = $('.name-loginapex').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginefootball'): ?>
                            var user_id = $('.name-loginefootball').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginff'): ?>
                            var user_id = $('.name-loginff').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'logingenshin'): ?>
                            var user_id = $('.name-logingenshin').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginml'): ?>
                            var user_id = $('.name-loginml').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginninokuni'): ?>
                            var user_id = $('.name-loginninokuni').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginpokemon'): ?>
                            var user_id = $('.name-loginpokemon').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginraven'): ?>
                            var user_id = $('.name-loginraven').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'logintiktok'): ?>
                            var user_id = $('.name-logintiktok').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'logintower'): ?>
                            var user_id = $('.name-logintower').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'loginwildrift'): ?>
                            var user_id = $('.name-loginwildrift').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                        <?php elseif ($games['target'] == 'growtopia'): ?>
                            var user_id = $('.name-growtopia').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'tournament'): ?>
                            var user_id = $('.name-tournament').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php elseif ($games['target'] == 'js-universal'): ?>
                            var user_id = $('.name-js-universal').map(function() {
                                return this.value;
                            }).get();
                            user_id = JSON.stringify(user_id);

                            var zone_id = '1';

                        <?php else: ?>
                            var user_id = $("input[name=user_id]").val();
                            var zone_id = $("input[name=zone_id]").val();
                        <?php endif; ?>

                        if (zone_id == undefined) {
                            zone_id = $("select[name=zone_id]").val();
                        }

                        if (user_id == undefined) {
                            user_id = $("select[name=user_id]").val();
                        }

                        var product = $("input[name=product]:checked").val();
                        var method = $("input[name=method]:checked").val();
                        var voucher = $("input[name=voucher]").val();
                        var email_order = $("input[name=email_order]").val();
                        // var recaptchaResponse = grecaptcha.getResponse();
                        var wa = $("input[name=wa]").val();

                        if (wa == undefined) {
                            wa = '';
                        }

                        <?php if ($games['target'] == 'joki'): ?>
                            var jumlah = $("#jumlah_star_poin").val();

                        <?php elseif ($games['target'] == 'jokicl') : ?>
                            var jumlah = $("#jumlah_star_poin").val();

                        <?php elseif ($games['target'] == 'jokigendong') : ?>
                            var jumlah = $("#jumlah_star_poin").val();

                        <?php elseif ($games['target'] == 'jokimc') : ?>
                            var jumlah = $("#jumlah_star_poin").val();

                        <?php elseif ($games['target'] == 'videomontage'): ?>
                            var jumlah = $("#jumlah_menit").val();
                        <?php elseif ($games['target'] == 'growtopia'): ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php else: ?>
                            var jumlah = 1;
                        <?php endif; ?>

                        if (user_id == '' || user_id == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'ID Player harus diisi',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                            buyButton.disabled = false;
                        } else if (zone_id == '' || zone_id == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'ID Player harus diisi',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                            buyButton.disabled = false;
                        } else if (product == '' || product == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Nominal produk harus dipilih',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                            buyButton.disabled = false;
                        } else if (method == '' || method == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Pilih metode pembayaran',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                            buyButton.disabled = false;
                        } else {
                            $.ajax({
                                url: '<?= base_url(); ?>/games/order/get-detail/' + product,
                                data: 'user_id=' + user_id + '&zone_id=' + zone_id + '&method=' + method + '&email_order=' + email_order + '&wa=' + wa +
                                    '&voucher=' + voucher + '&target=<?= $games['target'] ?>' + '&jumlah=' + jumlah,
                                type: 'POST',
                                dataType: 'JSON',
                                beforeSend: function() {
                                    $('#modal-loading').modal('show');
                                },
                                success: function(result) {

                                    $('#modal-loading').modal('hide');

                                    if (result.status == true) {
                                        $("#modal-detail div div .modal-body").html(result.msg);

                                        $("#modal-detail").modal('show');
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal',
                                            text: result.msg,
                                            icon: 'error',
                                            confirmButtonText: 'OKE',
                                            confirmButtonColor: "var(--warna_4)",
                                            didClose: () => {
                                                buyButton.disabled = false; // Aktifkan tombol setelah Swal.fire ditutup
                                            }
                                        });
                                    }
                                }
                            });

                            $('#modal-detail').on('shown.bs.modal', function() {
                                $("#modal-loading").modal('hide');
                            });
                        }

                        $('#modal-detail').on('hidden.bs.modal', function() {
                            buyButton.disabled = false; // Mengaktifkan tombol kembali
                        });
                    }

                    function nonaktif_button() {
                        document.getElementById('1xorder').innerHTML = 'Menunggu...';
                        document.getElementById('1xorder').style.pointerEvents = 'none';
                    }

                    function cek_voucher() {

                        var product = $("input[name=product]:checked").val();
                        var voucher = $("input[name=voucher]").val();

                        <?php if ($games['target'] == 'joki'): ?>
                            var jumlah = $("#jumlah_star_poin").val();
                        <?php elseif ($games['target'] == 'videomontage'): ?>
                            var jumlah = $("#jumlah_menit").val();
                        <?php else: ?>
                            var jumlah = 1;
                        <?php endif; ?>


                        if (voucher == '' || voucher == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Kode voucher harus diisi',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                        } else if (product == '' || product == ' ') {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Nominal produk harus dipilih',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                        } else if (product == undefined) {
                            Swal.fire({
                                title: 'Gagal',
                                text: 'Nominal produk harus dipilih',
                                icon: 'error',
                                confirmButtonText: 'OKE',
                                confirmButtonColor: "var(--warna_4)",


                            });
                        } else {
                            $.ajax({
                                url: '<?= base_url(); ?>/games/voucher/' + product,
                                data: 'voucher=' + voucher + '&jumlah=' + jumlah,
                                type: 'POST',
                                dataType: 'JSON',
                                success: function(result) {
                                    if (result.success) {
                                        Swal.fire({
                                            title: 'Berhasil',
                                            text: result.msg,
                                            icon: 'success',
                                            confirmButtonText: 'OKE',
                                            confirmButtonColor: "var(--warna_4)",


                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal',
                                            text: result.msg,
                                            icon: 'error',
                                            confirmButtonText: 'OKE',
                                            confirmButtonColor: "var(--warna_4)",


                                        });
                                    }
                                }
                            });
                        }
                    }
                </script>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Menanggapi event klik pada elemen <a>
                        $(".nav-link").on("click", function() {
                            // Mengubah ikon dan menambahkan kelas rotasi
                            toggleIcon();
                        });

                        // Fungsi untuk mengubah ikon
                        function toggleIcon() {
                            var icon = $(".nav-link").find("iconify-icon");
                            var currentIcon = icon.attr("icon");

                            // Mengganti ikon berdasarkan keadaan sebelumnya
                            if (currentIcon === "subway:up-2") {
                                icon.attr("icon", "subway:down-2");
                            } else {
                                icon.attr("icon", "subway:up-2");
                            }

                            // Menambahkan atau menghapus kelas rotasi
                            icon.parent().toggleClass("rotate");
                        }
                    });
                </script>

                <script type="text/javascript" defer="defer">
                    <!-- 
                    var enableDisable = function() {
                        var UTC_hours = new Date().getUTCHours(); //Don't add 1 here       
                        var day = new Date().getUTCDay(); //Use UTC here also

                        if (day != 1 && UTC_hours >= 14 && UTC_hours < 20) {
                            document.getElementById('bankbca-on').style.display = 'none';
                            document.getElementById('bankbca-off').style.display = 'block';
                        } else {
                            document.getElementById('bankbca-on').style.display = 'block';
                            document.getElementById('bankbca-off').style.display = 'none';
                        }
                    };

                    setInterval(enableDisable, 1000 * 60);
                    enableDisable();
                    // 
                    -->
                </script>
                <script>
                    // function get_price_and_scroll(productId) {
                    //     // Call your existing function (get_price)
                    //     get_price(productId);

                    //     // Get the product name from the selected input element
                    //     var selectedProduct = document.querySelector('input[name="product"]:checked');
                    //     var productName = selectedProduct ? selectedProduct.getAttribute('data-product-name') : '';

                    //     // Check if the product name contains the word "Komen"
                    //     if (productName.includes("Komen")) {
                    //         document.getElementById('comment-section').style.display = 'flex';
                    //     } else {
                    //         document.getElementById('comment-section').style.display = 'none';
                    //     }

                    //     // Scroll to the "pembayaran-section"
                    //     var pembayaranSection = document.getElementById('pembayaran-section');
                    //     pembayaranSection.scrollIntoView({ behavior: 'smooth' });
                    // }

                    // function handleCommentClick(button) {
                    //     console.log('Comment selected:', button.value);

                    //     // Remove active class from all buttons
                    //     var buttons = document.querySelectorAll('#comment-section button');
                    //     buttons.forEach(function(btn) {
                    //         btn.classList.remove('active-comment-button');
                    //     });

                    //     // Add active class to the clicked button
                    //     button.classList.add('active-comment-button');

                    //     // Additional logic to handle the selected comment if needed
                    // }

                    function get_price_and_scroll(productId) {
                        // Call your existing function (get_price)
                        get_price(productId);

                        // Scroll to the "pembayaran-section"
                        var pembayaranSection = document.getElementById('pembayaran-section');
                        pembayaranSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Mendapatkan product_id dari URL
                        const urlParams = new URLSearchParams(window.location.search);
                        const product_id = urlParams.get('diamonds');

                        // Jika product_id tidak kosong
                        if (product_id) {
                            // Setelah 1 detik, lakukan scroll ke lokasi produk
                            setTimeout(function() {
                                // Cari elemen produk berdasarkan ID yang sesuai dengan product_id
                                const productElement = document.getElementById('product_' + product_id);

                                // Jika elemen produk ditemukan, lakukan scroll ke lokasi elemen tersebut
                                if (productElement) {
                                    window.scrollTo({
                                        top: productElement.offsetTop,
                                        behavior: 'smooth' // Anda juga dapat mengatur 'auto' jika ingin scrollnya tidak halus
                                    });
                                }
                            }, 1000); // Mengatur waktu delay scroll dalam milidetik (dalam contoh ini, 1000 milidetik = 1 detik)
                        }
                    });
                </script>
                <?php $this->endSection(); ?>