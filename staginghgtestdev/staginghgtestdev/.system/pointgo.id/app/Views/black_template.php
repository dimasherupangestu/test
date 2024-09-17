<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title; ?> - <?= $web['title']; ?></title>

        <meta name="description" content="<?= strip_tags($web['description']); ?>">
        <meta name="keywords" content="<?= strip_tags($web['keywords']); ?>">
        <meta name="theme-color" content="#32323E" >




        <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/simplebar/css/simplebar.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animate.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/horizontal-menu.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app-style.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style-main.css">



        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

        <style>
            :root {
                --warna: #282828;
                --warna_2: #141414;
                --warna_3: #7294a5;
            }
            
            a {
                color: #fff;
            }
            
            .shadow-navbar {
                box-shadow: 0 100px 80px hsl(0deg 0% 89% / 7%), 0 41.7776px 33.4221px hsl(0deg 0% 89% / 5%), 0 22.3363px 17.869px hsl(0deg 0% 89% / 4%), 0 12.5216px 10.0172px hsl(0deg 0% 89% / 4%), 0 6.6501px 5.32008px hsl(0deg 0% 89% / 3%), 0 2.76726px 2.21381px hsl(0deg 0% 89% / 2%);
            }
            .content {
                min-height: 446px;
                padding-top: 50px;
            }
            .table-white tr th, .table-white tr td {
                color: #ffe7d0;
                border-color: #242f3a;
            }
            .rotateback {
                transform: rotate(-45deg) !important;
                    font-size: 16px;
            }
            .kotakmiring {
                 transform: rotate(45deg); border-radius: 0px !important;display:flex; justify-content: center;height: 25px;width: 25px;
            }
            label {
                font-weight: 500;
                text-transform: none;
            }
            .col-form-label {
                padding-top: calc(.375rem + 3px);
            }
            .card-tools {
                float: right;
                margin-top: -25px;
            }
            .cursor-pointer {
                cursor: pointer;
            }
            .menu-user a {
                padding: 10px 16px;
                border-radius: 5px;
                color: #32323e;
            }
            .menu-user a:hover {
                background: #32323e;
            }
            .menu-user a i {
                font-size: 19px;
                width: 20px;
            }
            .menu-user {
                margin-bottom: 26px;
            }
            .daterangepicker td, .daterangepicker th {
                color: #626262;
            }
            .circle-primary {
                background: #000000;
                color: #212529;
            }
            .bg-footer {
                background-color: var(--warna);
            }
            .bg-theme1, .bg-custom {
                background: var(--warna_2) !important;
                padding: 20px 20px 20px 20px;
            }
            .btn-topup, .back-to-top {
                background: var(--warna_3);
            }
            .section {
                background: var(--warna_2);
            }
            .radio-nominal + label, .radio-nominale + label {
                background: #32323E;
                border: 2px solid;
                border-color: #ffffff00;
                font-size: 14px;
                color: #ffffff;
                font-weight: 600;
                overflow: hidden;
            }
            .radio-nominale:checked + label, .radio-nominal:checked + label {
                background: #32323E;
                color: #ffffff;
                font-size: 14px;
                border: 2px solid #707feb;

            }
            .owl-dot {
                display:none;
            }
            .strip-primary {
                background: #707feb;
            }
            .btn-primary {
                background: #707feb !important;
                border-color:#707feb !important;
            }
            .sidenav {
                background: var(--warna_2);
            }
            .radio-nominal:checked + label, .table-white tr th, .table-white tr td {
                border-color: #707feb;
            }
            .menu-utama div a {
                margin: 0 4px;
            }
            .menu-utama div a:hover, .menu-utama div a.active {
                background: transparent;
                border-radius: 14px 4px;
            }
            .navbar-collapse {
                background: var(--warna_2);
            }
            .menu-list {
                list-style: none;
                padding-left: 0;
            }
            .menu-list li a {
                display: block;
                padding: 10px 0;
                border-bottom: 1px dashed var(--warna_3);
                transition: .4s;
            }
            .menu-list li a:hover {
                padding-left: 6px;
            }
            .row-search {
                margin-right: -12.5px;
                margin-left: -12.5px;
                padding-bottom: 20px; 
            }
            .tes-card {
                padding: 0.2rem;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 10%), 0 2px 4px -1px rgb(0 0 0 / 6%);
                border-radius: 0.5rem;
                text-align: center;
                background: #fff;
                display: block;
                text-decoration: none;
                color: #333;
                height: 120px;
                margin-bottom: 4rem!important;
            }
            .tes-img {
                border-radius: 10px;
                display: block;
                transform: translate(-50%,-70%)!important;
                left: 50%!important;
                position: absolute!important;
                width: 70%;
            }
            .tes-card-title {
                margin-top: 15px;
                padding: 3px;
               padding-bottom: 10px;
                color: #000;
                font-size: 0.75rem;
                letter-spacing: .5px;
                font-weight: 300;
            }
            .card-topup {
                display: none;
            }
            .title-hot {
                    padding-bottom: 3.5rem !important;
            }
            .header img {
                max-width: 300px;
            }
            .header {
                width: 100%;
                height: 200px;
                background: #3D3D3D;
                border-radius: 0 0 1.5rem 1.5rem;
                text-align: center;
                padding-top: 10px;
            }
            .footer {
                background-color: #ffe7d0;
            }
            .content-body {
                padding: 0 16px;
            }
            .form-control {
                display: block;
                width: 100%;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.375rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .carousel {
                position: relative;
                margin-top: 30px;
            }
            .owl-carousel.owl-hidden {
                opacity: 0;
            }
            .owl-carousel.owl-rtl {
                direction: rtl;
            }
            .owl-carousel .owl-stage-outer {
                position: relative;
                overflow: hidden;
                -webkit-transform: translate3d(0,0,0);
            } 
            .owl-carousel .owl-nav.disabled {
                display: none;
            }
            .owl-carousel .owl-item img {
                display: block;
                width: 100%;
            }
            .item .metode {
                margin: 5px 0;
                background: #fff;
                border-radius: 8px;
                padding: 0.75rem;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 10%), 0 2px 4px -1px rgb(0 0 0 / 6%) !important;
            }
            .owl-carousel .owl-item {
                min-height: 1px;
                float: left;
                -webkit-backface-visibility: hidden;
                -webkit-touch-callout: none;
            }
            .sosmed {
                margin-bottom: 20px;
                font-size:25px;
            }
            .sosmed a img {
                width: 24px;
            }
            .menu-bottom {
                position: fixed;
                bottom: 0;
                background: #E2E8F0;
                width: 100%;
                max-width: 480px;
                border-top: 1px solid #E2E8F0;
                padding: 0.25rem 0;
                text-align: center;
                z-index: 2;
                text-decoration: none;
                font-size: 24px;
                font-size: 0.875rem;
                margin-top: -5px;
                font-weight: 400;
                padding-top: 18px;
            }
            .px-2 {
                padding-right: 0.5rem!important;
                padding-left: 0.5rem!important;
            }
            .row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: flex;
                flex-wrap: wrap;
                margin-top: calc(-1 * var(--bs-gutter-y));
                margin-right: calc(-.5 * var(--bs-gutter-x));
                margin-left: calc(-.5 * var(--bs-gutter-x));
            }
            .col-4 {
                flex: 0 0 auto;
                width: 33.33333333%;
            }
            a:hover {
                color: #81a1b1;
                text-decoration: none;
            }
            .menu-bottom i {
                font-size: 24px;
            }
            .mdi-home:before {
                content: "\F2DC";
            }
            .mdi-history:before {
                content: "\F2DC";
            }
            .mdi-account-circle:before {
                content: "\F2DC";
            }
            .mdi:before, .mdi-set {
                display: inline-block;
                font: normal normal normal 24px/1 "Material Design Icons";
                font-size: inherit;
                text-rendering: auto;
                line-height: inherit;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .lb {
                border-top: 7px solid #f18b2b;
            }
            .pb-5 {
                padding-bottom: 4rem!important;
            }
            .section-game {
                background: var(--warna_2);
            }
            .game-desc-1 {
                padding-bottom: 1rem!important;
                padding-left: 15px;
                padding-right: 15px;
            }
            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                color: #212529;
            }
            .body-games {
                background: #141414;
                flex: 1 1 auto;
                padding: 1.25rem;
            }
            .button-beli {
                position: fixed;
                bottom: 0;
                background: #fff;
                width: 100%;
                max-width: 480px;
                border-top: 1px solid #E2E8F0;
                padding: 0.25rem 0;
                text-align: center;
                z-index: 2;
                text-decoration: none;
                font-size: 24px;
                font-size: 0.875rem;
                margin-top: -5px;
                font-weight: 400;
                padding: 24px;
                padding-top: 24px;
            }
            small {
                font-size: 100%;

            }
            .sec-rnt {
                background: #ffe7d0;
            }
            .pb-5-rnt {
                padding: 10px;
            }
            .product-list {
				border-radius: 0.5rem;
				box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
				overflow: hidden;
			}
			.product-list b {
				font-size: 0.85rem;
				font-weight: 600;
			}
			.product-list span {
				font-size: 11px;
				color: #718096;
			}
			.product-list.active {
				border: 1px solid var(--warna_2) !important;
			}
			.product-list.active b {
				margin-top: -53px;
			}
			.radio-nominale:checked + label:after {
                position: absolute;
                top: 0;
                left: 0.782rem;
                width: 28px;
                height: 28px;
                content: "";
                
                text-align: center;
                border-radius: 0 5px 0 0;
            }
            .radio-nominal:checked + label:after {
                position: absolute;
                top: 0;
                left: 0.782rem;
                width: 28px;
                height: 28px;
                content: "";
                
                text-align: center;
                border-radius: 0 5px 0 0;
            }
                    
            }
            .after-payment {
                padding-bottom: 1.5rem!important;
                text-align: center;
            }
            .trims-1 {
                text-align: center;
            }
            .box-back {
                width: 38px;
                height: 38px;
                background: #33333354;
                text-align: center;
                border-radius: 30px;
                display: inline-block;
                transition: 0.5s;
                margin-left: 20px;
                    margin-top: 16px;
                    position: absolute;
            }
                        .box-back i {
                font-size: 22px;
                margin-top: 7px;
                color: #fff;
                z-index:999;
            }
            .fa-angle-left {
                z-index:999
            }
            .pb-3-details {
                    padding-bottom: 0px!important;
                    padding: 0px 10px 0px 10px!important;
                    border-radius: 15px;
            }
            .p-3-detail {
                border-radius: 15px;
            }
            .body-games-details {    
                border-radius: 0px 0px 10px 10px;
                margin-bottom: 8px;
            }
            body {
                background-color: #000;
                color: #ffffff;
            }
            .fab-container {
                position: fixed;
                bottom: 90px;
                right: 10px;
                z-index: 999;
                cursor: pointer;
            }
        
            .img-fluid2 {
                max-width: 100%;
                height: auto;
                padding-bottom: 15px;

            }
        
            .fab-icon-holder {
                width: 45px;
                height: 45px;
                bottom: 140px;
                left: 10px;
                color: #FFF;
                background: #5865f2;
                border-radius: 10px;
                text-align: center;
                font-size: 30px;
                z-index: 99999;
            }
        
            .fab-icon-holder:hover {
                opacity: 0.8;
            }
        
            .fab-icon-holder i {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                font-size: 25px;
                color: #ffffff;
            }
        
            .fab-options {
                list-style-type: none;
                margin: 0;
                position: absolute;
                bottom: 48px;
                left: -45px;
                opacity: 0;
                transition: all 0.3s ease;
                transform: scale(0);
                transform-origin: 85% bottom;
            }
        
            .fab:hover+.fab-options,
            .fab-options:hover {
                opacity: 1;
                transform: scale(1);
            }
        
            .fab-options li {
                display: flex;
                justify-content: flex-start;
                padding: 5px;
            }
        
            .fab-label {
                padding: 2px 5px;
                align-self: center;
                user-select: none;
                white-space: nowrap;
                border-radius: 3px;
                font-size: 16px;
                background: #666666;
                color: #ffffff;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
                margin-left: 10px;
            }
        
            .text-decoration-none {
            text-decoration: none!important; }
            }      
            .card-title2 {
                min-height: 30px !important;
                margin-top: -25px !important;
                font-weight: 600 !important;
                font-size: 10px !important;
                color: #fff !important;
                background: #000000 !important;
                padding-top: 8px !important;
                margin-bottom: 0px !important;
            } 
            
            .backdrop {
                margin: -51px 3px 0px 3px;
                font-weight: 600 !important;
                font-size: 0.7rem !important;
                color: #fff !important;
                background-color: rgba(243,244,246,.1);
                border-radius: 0.75rem;
                padding: 5px 0px 5px 0px;
                --tw-backdrop-saturate: saturate(2);
                backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-saturate);
                --tw-backdrop-blur: blur(12px);
                display: flex;
                flex-direction: column;
                justify-content: center;
                    
            }
            .container {
                max-width: 1200px !important;
            }
            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                font-weight: 600;
                color: #fff;
            }
        .shadow-form {
                box-shadow: 0 4px 80px hsl(0deg 0% 77% / 13%), 0 1.6711px 33.4221px hsl(0deg 0% 77% / 9%), 0 0.893452px 17.869px hsl(0deg 0% 77% / 8%), 0 0.500862px 10.0172px hsl(0deg 0% 77% / 7%), 0 0.266004px 5.32008px hsl(0deg 0% 77% / 5%), 0 0.11069px 2.21381px hsl(0deg 0% 77% / 4%);
            }
        .section-game {
                border: 1px solid #e3e7ea;
                box-shadow: 0px 2px 1px #c9c9c9;
            }
            .card {
                background-color: #32323e !important;
            }

            
        </style>

        <?php $this->renderSection('css'); ?>
    </head>
    <body>
        <div class="content">
            <header>
                <nav class="navbar navbar-expand-lg fixed-top navbar-dark  bg-custom shadow-navbar">
                    <div class="container">
                        <a class="navbar-brand" href="<?= base_url(); ?>">
                            <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="130" alt="logo icon" class="rounded">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse menu-utama" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link <?= $menu_active == 'Home' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Cek' ? 'active' : ''; ?>" href="<?= base_url(); ?>/payment">Cek Pesanan</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Harga' ? 'active' : ''; ?>" href="<?= base_url(); ?>/tabelharga" >Daftar Harga</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Price' ? 'active' : ''; ?>" href="<?= base_url(); ?>/price" hidden>Daftar Harga</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Method' ? 'active' : ''; ?>" href="<?= base_url(); ?>/method" hidden>Metode Pembayaran</a>
                                <a class="nav-item nav-link <?= $menu_active == 'postingan' ? 'active' : ''; ?>" href="<?= base_url(); ?>/postingan" hidden>Artikel</a>
                                <div class="dropdown">
                                    <style>
                                    .dropdown-toggle::after {
                                        display:none;
                                        
                                    }
                                    </style>
									   <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
									    	<a class="nav-item nav-link" >Kalkulator ML<img src="https://galagamestore.com/assets/images/down-arrow.png" alt="" width="15" style="vertical-align:center"></a>
									    </span>
									    <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton" style="left: auto;right: 0;box-shadow: none !important;background: var(--warna_2) !important;">
									        <a class="dropdown-item text-white <?= $menu_active == 'kalkulatorwr' ? 'active' : ''; ?>" href="<?= base_url(); ?>/kalkulatorwr">Kalkulator WR</a>
									        <a class="dropdown-item text-white <?= $menu_active == 'hpmagicwheel' ? 'active' : ''; ?>" href="<?= base_url(); ?>/hpmagicwheel">HP Magic Wheel</a>
									    </div>
								</div>
                                <a class="nav-item nav-link <?= $menu_active == 'Login' ? 'active' : ''; ?>" href="<?= base_url(); ?>/login" >Login Member</a>
                                <?php if ($admin !== false): ?>
                                <a class="nav-item nav-link" href="<?= base_url(); ?>/admin">Administrator</a>
                                <?php endif ?>
                                <?php if ($users !== false): ?>
                                <a class="nav-item nav-link" href="<?= base_url(); ?>/user">Beranda</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            
            



        <?php $this->renderSection('content'); ?>

            
        </div>
        
            <footer id="aboutus" class="bg-footer">
                <img src="<?= base_url(); ?>/assets/images/waves.png" alt="" width="100%" hidden>
                <div style="background: var(--warna_2);margin-top: -4px;">
                    <div class="pt-5 pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" height="40" alt="logo icon" class="mb-3">
                                    <h5 class="mb-2"><?= $web['name']; ?></h5>
                                    <?= $web['description']; ?>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <h5 class="pb-2">Halaman</h5>
                                    <ul class="menu-list">
                                        <li><a href="<?= base_url(); ?>/">Halaman Utama</a></li>
                                        <li><a href="<?= base_url(); ?>/payment">Cek Pesanan</a></li>
                                        <li><a href="<?= base_url(); ?>/price" hidden>Daftar Harga</a></li>
                                        <li><a href="<?= base_url(); ?>/syarat-ketentuan">Syarat & Ketentuan</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <h5 class="pb-2">Sosial Media Kami</h5>
                                    <a href="<?= $sm['ig']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-instagram pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['yt']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-youtube pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['fb']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-facebook pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['tw']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fab-container">
                    <div class="fab fab-icon-holder" style="background-color:#FFF; padding:5px">
                      <img src="https://aoshimarket.com/assets/img/logos/callcenter.png" class="img-fluid2" alt="">
                    </div>
                    
                    <ul class="fab-options">
                      <li>
                        <a href="<?= $sm['ig']; ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
                        <i class="fa fa-instagram"></i>
                        </div>
                      </a>
                      </li>
                      <li>
                        <a href="<?= $sm['wa']; ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background-color: #25D366;">
                        <i class="fa fa-whatsapp"></i>
                        </div>
                        </a>
                      </li>
                    </ul>
                    
                 </div>
                <div class="bg-theme1 text-center pb-4"> Copyright © 2022 <?= $web['name']; ?>. All Rights Reserved </div>
            </footer>


        <a href="javaScript:void();" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>

        <!--End wrapper-->
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- simplebar js -->
        <script src="<?= base_url(); ?>/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- Custom scripts -->
        <script src="<?= base_url(); ?>/assets/js/app-script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@activix/double-scroll@1.0.2/jquery.doubleScroll.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <!--Select Plugins Js-->
        <script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.min.js"></script>
        <!--Data Tables js-->
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
       <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>

        <script>
            // $(document).ready(function() {
            //     $('#default-datatable').DataTable();
            // });

            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <script>
            <?php if ($admin !== false): ?>
            function hapus(link) {
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data akan dihapus permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Tetap hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                });
            }
            <?php endif; ?>

        </script>
        
        <script>
    function goBack() {
        window.history.back();
    }
</script>
        <?php $this->renderSection('js'); ?>
    </body>
</html>