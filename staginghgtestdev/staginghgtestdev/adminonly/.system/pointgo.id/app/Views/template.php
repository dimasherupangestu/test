<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - <?= $web['title']; ?></title>
    <meta name="description" content="<?= strip_tags($web['description']); ?>">
    <meta name="keywords" content="<?= strip_tags($web['keywords']); ?>">
    <meta name="theme-color" content="#32323E">

    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon-hiddengame.png">


    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app-style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style-main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?compat=recaptcha" async defer></script>

    
            <!-- Facebook Pixel Code -->
			<!--<script>-->
			<!--!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?-->
			<!--n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;-->
			<!--n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;-->
			<!--t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,-->
			<!--document,'script','https://connect.facebook.net/en_US/fbevents.js' );-->
			<!--fbq( 'init', '938473200580408' );fbq( 'init', '9532506813488688' )	;fbq( 'init', '584979920420062' )		-->
			<!--</script>-->
			<!-- DO NOT MODIFY -->
			<!-- End Facebook Pixel Code -->


    <style>
    :root {
        --warna: #282828;
        --warna_2: #fff;
        --warna_3: linear-gradient(to bottom, var(--warna_11) 0%, var(--warna_13) 100%) !important;
        --warna_4: #7bac67;
        --warna_5: #7bac67;
        --warna_6: #f9f9f9;
        --warna_7: #f7ff1e;
        --warna_8: #986c2c;
        --warna_9: #a7d08b;
        --warna_10: #546c44;
        --warna_11: #6cae5f;
        --warna_12: #9bda5f;
        --warna_13: #96c353;
        --warna_14: linear-gradient(to bottom, #ffed00 0%, #c3ca12 100%) !important;
        --warna_hitam: #000;
        --warna_text: #292929;
    }

    #promoContent {
        height: 1000px;

    }
    
    .background-lineaer-coklat {
        background: linear-gradient(to right, #d1a849, #ac8428) !important;
        border-radius: 12px
    }
    
    p {
        color: var(--warna_hitam) !important;
    }
    
    .navbar-dark .navbar-toggler {
        background: var(--warna_3) !important;
    }
    
    a {
    color: var(--warna_text);
}

    a:hover {
        color: var(--warna_10) !important;
    }

    body {
        background: url(<?= base_url();
        ?>/assets/images/bg-neon-white-pointgo-green.jpg);
        color: var(--warna_text);
        font-family: 'Inter', sans-serif;
        -webkit-font-smoothing: antialiased;
        background-size: cover;
    }
    
    @font-face {
      font-family: 'Alphakind';
      src: url('<?= base_url(); ?>/assets/fonts/Alphakind.otf');
    }
    
    .font-alphakind {
      font-family: 'AlphaKind';
    }

    .opacity-100 {
        opacity: 1;
    }

    .from-gray-800 {
        --tw-gradient-from: #1f2937;
        --tw-gradient-to: rgba(31, 41, 55, 0);
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
    }

    .bg-gradient-to-t {
        background-image: linear-gradient(to top, var(--tw-gradient-stops));
    }

    .shadow-navbar {
        box-shadow: 0 100px 80px hsl(0deg 0% 89% / 7%), 0 41.7776px 33.4221px hsl(0deg 0% 89% / 5%), 0 22.3363px 17.869px hsl(0deg 0% 89% / 4%), 0 12.5216px 10.0172px hsl(0deg 0% 89% / 4%), 0 6.6501px 5.32008px hsl(0deg 0% 89% / 3%), 0 2.76726px 2.21381px hsl(0deg 0% 89% / 2%);
    }

    .content {
        min-height: 446px;
        padding-top: 50px;
    }

    .table-white tr th,
    .table-white tr td {
        color: var(--warna_text);
        border-color: var(--warna_4);
    }

    .rotateback {
        transform: rotate(-45deg) !important;
        font-size: 16px;
    }

    .kotakmiring {
        transform: rotate(45deg);
        border-radius: 0px !important;
        display: flex;
        justify-content: center;
        height: 25px;
        width: 25px;
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

    .daterangepicker td,
    .daterangepicker th {
        color: #626262;
    }

    .circle-primary {
        background: #000000;
        color: #212529;
    }

    .bg-footer {
        background-color: #000;
    }

    .bg-custom {
        background: var(--warna_2) !important;
        padding: 10px 20px 10px 20px;
        box-shadow: 0 100px 80px hsl(0deg 0% 89% / 7%), 0 41.7776px 33.4221px hsl(0deg 0% 89% / 65%), 0 22.3363px 17.869px hsl(0deg 0% 89% / 4%), 0 12.5216px 10.0172px hsl(0deg 0% 89% / 4%), 0 6.6501px 5.32008px hsl(0deg 0% 89% / 3%), 0 2.76726px 2.21381px hsl(0deg 0% 89% / 2%);
    }
    
    .bg-footer {
        position: relative;
        background: transparent !important;
        width: 100%;
        border-top: 1px;
    }

    .navbar-collapse {
        background: var(--warna_2);
    }

    .btn-topup,
    .back-to-top {
        background: var(--warna_3);
    }

    .section {
        background: var(--warna_2);
        border-radius: 12px;
        box-shadow: 0 0px 7px 0 rgb(0 0 0 / 10%);
        border: 2px solid;
        border-color: rgb(238 237 237);
    }

    .radio-nominale+label {
        background: #ffffffc9;
        border: 2px solid;
        border-color: rgb(238 237 237);
        font-size: 14px;
        color: var(--warna_text);
        font-weight: 600;
        overflow: hidden;
        border-radius: 6px;
        transition: 0.3s ease;
        box-shadow: 0 0px 7px 0 rgb(0 0 0 / 10%);
    }

    .radio-nominale:checked+label {
        background: #ffffffcf;
        color: var(--warna_text);
        font-size: 14px;
        border: 2px solid var(--warna_4);
        border-radius: 6px;
        box-shadow: 0 0 200px rgb(182 187 43 / 47%) inset;

    }

    .radio-nominal+label {
        background: #ffffffc9;
        border: 0px;
        font-size: 14px;
        color: var(--warna_text);
        font-weight: 600;
        overflow: hidden;
        border-radius: 6px;
        box-shadow: 0 0px 7px 0 rgb(0 0 0 / 10%);
        border: 2px solid rgb(238 237 237);
        /* padding: 14px 30px; */
    }

    .radio-nominal:checked+label {
        background: #ffffffcf;
        color: var(--warna_text);
        font-size: 14px;
        border: 0px;
        box-shadow: 0 0 200px rgb(123 172 103 / 47%) inset;

    }



    .owl-dot {
        display: none;
    }

    .strip-primary {
        background: var(--warna_3);
    }

    .btn-primary {
        background: var(--warna_14);
        color: #000 !important;
        border-radius: 10px;
        border-color: #6daf5e !important;
    }

    .sidenav {
        background: var(--warna_2);
    }

    .menu-utama div a {
        margin: 0 4px;
    }

    .menu-utama div a:hover,
    .menu-utama div a.active {
        background: transparent;
        border-radius: 14px 4px;
    }

    .menu-list {
        list-style: none;
        padding-left: 0;
    }

    .menu-list li a {
        display: block;
        padding: 10px 0;
    }

    .menu-list li a:hover {}

    .row-search {
        margin-right: -12.5px;
        margin-left: -12.5px;
        padding-bottom: 20px;
    }

    .tes-card {
        padding: 1rem;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 10%), 0 2px 4px -1px rgb(0 0 0 / 6%);
        border-radius: 0.5rem;
        text-align: center;
        background: #fff;
        display: block;
        text-decoration: none;
        color: var(--warna_text);
        margin-bottom: 3.5rem !important;
    }

    .tes-img {
        border-radius: 10px;
        display: block;
        transform: translate(-50%, -70%) !important;
        left: 50% !important;
        position: absolute !important;
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
        color: #292929 !important;
        background-color: #fcfcfc;
        background-clip: padding-box;
        border: 1px solid #e1e1e1;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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
        -webkit-transform: translate3d(0, 0, 0);
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
        font-size: 25px;
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
        padding-right: 0.5rem !important;
        padding-left: 0.5rem !important;
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

    a:hover .userpath {
        fill: var(--warna_4);
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

    .mdi:before,
    .mdi-set {
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
        padding-bottom: 4rem !important;
    }

    .section-game {
        background: rgba(51, 51, 51, 1);
    }

    .game-desc-1 {
        padding-bottom: 1rem !important;
        padding-left: 15px;
        padding-right: 15px;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--warna_hitam) !important;
        font-family: 'Adventure', sans-serif;
    }
    
    @font-face {
    font-family: 'Adventure';
    src: url('<?= base_url(); ?>/assets/fonts/Adventure.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
}

    .body-games {
        /*background: var(--warna_6);*/
        flex: 1 1 auto;
        padding: 1.25rem;
        border-radius: 12px;
        box-shadow: 0 10px 30px 0 rgb(0 0 0 / 11%);
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

    .radio-nominale:checked+label:after {
        position: absolute;
        bottom: 10px;
        left: 0.382rem;
        width: 30px;
        height: 30px;
        content: url(" data:image/svg+xml, <svg stroke='currentColor' fill='black' stroke-width='0' viewBox='0 0 16 16' height='12' width='12' xmlns='http://www.w3.org/2000/svg' ><path d='M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z' ></path></svg>");
        background: linear-gradient(to bottom, #ffed00 0%, #c3ca12 100%) top/cover !important;
        text-align: center;
        border-radius: 5px;
        padding-top: 5px;
    }

    .section {
        position: relative;
    }

    .pointgo {
        position: absolute;
        top: -10px;
        left: -10px;
        width: 45px;
        height: 45px;
        padding: 6px !important;
        background: var(--warna_3);
        border-radius: 13px 0px 13px 0px;
    }

    border- .after-payment {
        padding-bottom: 1.5rem !important;
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
        z-index: 999;
    }

    .fa-angle-left {
        z-index: 999
    }

    .pb-3-details {
        padding-bottom: 0px !important;
        padding: 0px 10px 0px 10px !important;
        border-radius: 15px;
    }

    .p-3-detail {
        border-radius: 15px;
    }

    .body-games-details {
        border-radius: 0px 0px 10px 10px;
        margin-bottom: 8px;
    }

    .fab-container {
        position: fixed;
        bottom: 70px;
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
        color: var(--warna_6);
    }
    
    .card-pagination.active p {
        color: #fff !important;
    }
    
    b {
        color: var(--warna_hitam) !important;
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
        color: var(--warna_6);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        margin-left: 10px;
    }

    .text-decoration-none {
        text-decoration: none !important;
    }
    }

    .card-title2 {
        min-height: 30px !important;
        margin-top: -25px !important;
        font-weight: 600 !important;
        font-size: 10px !important;
        color: white !important;
        background: #000000 !important;
        padding-top: 8px !important;
        margin-bottom: 0px !important;

    }

    @media (min-width: 900px) {
        .backdrop {
            margin: -51px 3px 0px 3px;
            font-weight: 600 !important;
            font-size: 0.7rem !important;
            color: #fff !important;
            background-color: rgb(40 40 40 / 36%);
            border-radius: 0.75rem;
            padding: 5px 0px 5px 0px;
            --tw-backdrop-saturate: saturate(2);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-saturate);
            --tw-backdrop-blur: blur(12px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 45px;

        }
        .bhahah {
            width: 50%;
        }


    }

    @media (max-width: 900px) {
        .backdrop {
            margin: -39px 3px 0px 3px;
            font-weight: 600 !important;
            font-size: 0.6rem !important;
            color: #fff !important;
            background-color: rgb(40 40 40 / 36%);
            border-radius: 0.75rem;
            padding: 2px 2px 2px 2px;
            --tw-backdrop-saturate: saturate(2);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-saturate);
            --tw-backdrop-blur: blur(12px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 36px;

        }

    }

    .container {
        max-width: 1650px !important;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 600;
        color: var(--warna_hitam) !important;
    }

    .section-game {
        border: 1px solid #e3e7ea;
        box-shadow: 0px 2px 1px #c9c9c9;
    }

    .card {
        background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;
    }
    

    .bg-theme2 {
        background: #000 !important;
        padding: 20px 20px 20px 20px;
        color: #fff;
    }

    .product-tile__clip-path[data-v-16b318a8] {
        /*-webkit-clip-path: polygon(0 48%, 9% 48%, 18% 65%, 27% 49%, 36% 72%, 45% 58%, 55% 70%, 64% 58%, 73% 86%, 82% 48%, 91% 63%, 100% 70%, 100% calc(100% + 1px), 0 calc(100% + 1px));*/
        -webkit-clip-path: polygon(0 0%, 100% 100%, 100% 0, 0 0);
        transform: scaleY(-1);
        background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;
        width: 100%;
        height: 25px;
        margin-top: -23px;
    } 

    .card-title2 {
        min-height: 35px !important;
        margin: 5px 5px 15px 5px !important;
        font-weight: bold !important;
        font-size: .875rem;
        color: white;
        padding: 8px 8px 16px;
        font-family: 'Inter', sans-serif;
        letter-spacing: 2px;
        
    }

    .footer__clip-path[data-v-1da71fac] {
        display: flex;
        padding: 0;
        margin-top: -39px;
        width: 100%;
        height: 40px;
        background-color: var(--warna_2);
    }

    @media screen and (min-width: 768px) {
        .footer__clip-path[data-v-1da71fac] {
            clip-path: polygon(0 23%, 2% 55%, 4% 32%, 6% 50%, 8% 30%, 10% 75%, 13% 40%, 15% 62%, 17% 96%, 19% 50%, 21% 93%, 23% 46%, 25% 89%,
                    27% 64%, 29% 87%, 31% 76%, 33% 59%, 35% 96%, 38% 48%, 40% 82%, 42% 65%, 44% 48%, 46% 82%, 48% 66%, 50% 44%, 52% 56%, 54% 100%, 56% 65%,
                    58% 93%, 60% 49%, 63% 99%, 65% 44%, 67% 97%, 69% 87%, 71% 43%, 73% 68%, 75% 48%, 77% 67%, 79% 95%, 81% 64%, 83% 38%, 85% 85%,
                    88% 51%, 90% 81%, 92% 38%, 94% 80%, 96% 61%, 98% 40%, 100% 72%, 100% calc(100% + 1px), 0 calc(100% + 1px));
        }
    }

    .form-control:focus {
        border: 1px solid #e1e1e1;
        background-color: #eeeeee;
        color: black !important;
    }

    .countdown-time {
        border-radius: 4px;
        min-width: 85px;
        text-align: center;
        min-height: 20px;
        background: linear-gradient(180deg, #CD0000 0%, #A70000 100%);
        margin-left: 10px;
        padding: 5px;
        color: var(--warna_6) !important;
    }

    .flash-sale-head {
        background-color: transparent;
        border-radius: 10px;
        padding: 10px;
        overflow: hidden;
        margin-bottom: 50px;
        padding: 30px 20px 10px 20px;
    }

    .game-item {
        padding: 10px 0px;
    }

    .search-container {
        width: 400px;
        background: var(--warna_2);
        list-style: none;
        position: absolute;
        z-index: 999;
        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 400px;
        top: 59px;
    }

    @media (max-width: 480px) {
        .search-container {
            width: 325px;
            top: 53px;
            left: 25px;
        }

        .search-lg {
            display: none;
        }

        .search-sm {
            display: block;
            margin-right: 6px;
        }

        .bg-footer-sm {
            display: block;
        }

        .bg-footer-lg {
            display: none;
        }

        .logo-footer-sm-lg {
            position: absolute;
            bottom: 225px;
        }

        .card-title2 {
            font-size: .460rem;
        }

        .img-games-fs {
            width: 25%;
        }

        .card-flashsale {
            padding: 14px;
            background-size: cover;
            border-radius: 20px;
        }

        .produk-flash-sale {
            font-size: 13px !important;
            color: #fff !important;
        }

        .row.swiper-wrapper {
            padding-bottom: 33px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }

        .text-small-sm {
            font-size: 12px;
        }

        .alert-custom {
            left: 15px !Important;
            right: 15px;
        }
        
        .bhahah {
            width: 60px;
        }
    }

    @media (min-width: 481px) {
        .search-sm {
            display: none;
        }

        .bg-footer-sm {
            display: none;
        }

        .bg-footer-lg {
            display: block;
        }

        .logo-footer-sm-lg {
            position: absolute;
            bottom: 190px;
        }

        .img-games-fs {
            width: 17%;
        }

        .card-flashsale {
            height: 190px;
            padding: 20px;
            background-size: cover;
            border-radius: 20px;
        }

        .radio-nominal+label {
            padding: 14px 30px;
        }
    }

    .dropdown-item:focus,
    .dropdown-item:hover {
        padding: 0.7rem 1.7rem;
        background-color: #00000040 !important;
    }

    .dropdown-item {
        padding: 0.7rem 1.7rem;
    }

    .dropdown-divider {
        border-color: #ffffff4a;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 7px;
        height: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #fff;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;
        height: 32px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;
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


    .input-group>.custom-select:not(:first-child),
    .input-group>.form-control:not(:first-child) {
        border-radius: 999px;
        background: rgb(0 0 0 / 3%);
        border: 0px;
    }

    .input-group>.custom-select:not(:last-child),
    .input-group>.form-control:not(:last-child) {
        border-radius: 999px 0px 0px 999px;
        background: rgb(0 0 0 / 3%);
        border: 0px;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: var(--warna_hitam);
    }

    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: var(--warna_10);
        font-weight: 500;
    }

    .navbar-dark .navbar-nav .nav-link.active {
        color: var(--warna_10);
        font-weight: 500;
    }

    /*.form-control.pl-10 {*/
    /*    color: #ffffff !important;*/
    /*}*/

    /*.form-control.search {*/
    /*    color: #ffffff !important;*/
    /*}*/

    .search-sm.btn-secondary {
        color: rgba(255, 255, 255, 1) !important;
        background: var(--warna_3);
        border: 0px;
    }

    .search-sm.btn-secondary:not(:disabled):not(.disabled):active {
        color: rgba(255, 255, 255, 1) !important;
        background: var(--warna_3);
        border: 0px;
    }

    #searchButton {
        position: sticky;
        top: 0;
        z-index: 999;
    }

    #searchContainerb {
        top: 0;
        z-index: 1050;
        transform: translateY(-100%);
        transition: transform 0.3s ease;
        width: 100%;
    }

    #searchContainerb.show {
        transform: translateY(70px);
    }

    .search-containerb {
        display: block;
        padding: 25px 10px;
        background: var(--warna_2) !important;
    }

    .gap-2 {
        gap: 0.5rem;
    }

    .box-back {
        width: 32px;
        height: 32px;
        background: #0000;
        text-align: center;
        border-radius: .75rem;
        display: inline-block;
        transition: 0.5s;
        margin-left: 20px;
        margin-top: 20px;
        position: absolute;
        cursor: pointer;
        z-index: 999;
    }

    .box-back:hover {
        background: #0000;
    }

    .box-back:hover svg path {
        stroke-opacity: 1;
        transition: 0.3s ease;
    }

    .text-secondary-pointgo {
        color: var(--warna_4) !important;
    }

    /*div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {*/
    /*    color: #333333 !Important;*/
    /*}*/

    .alert-custom {
        border-radius: 10px;
        box-shadow: 0px 4px 40px 0px rgba(0, 0, 0, 0.40);
        position: fixed;
        top: 100px;
        left: 60px;
        padding: 10px 10px 10px 26px !important;
        align-items: center;
        z-index: 9999;
    }

    .alert-success {
        color: #333333;
        background-color: #BDFC50;
        border-color: #BDFC50;
    }

    .alert-danger {
        color: #fff;
        background-color: #FF543E;
        border-color: #FF543E;
    }

    .alert-custom .btn-close {
        box-shadow: none;
        padding: 5px;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Sesuaikan nilai alpha untuk transparansi */
        z-index: 9998;
        /* Menempatkan overlay di bawah alert, tapi di atas konten lainnya */
    }

    </style>

    <?php $this->renderSection('css'); ?>
</head>

<body>
    <div class="content" style="padding-top: 0px;">

        <?php $this->renderSection('content'); ?>


    </div>


    <a href="javaScript:void();" class="back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>

    <!--End wrapper-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.bundle.min.js"></script>
    <!-- simplebar js -->
    <!-- Custom scripts -->
    <script src="<?= base_url(); ?>/assets/js/app-script.js"></script>
    <!--Select Plugins Js-->
    <script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.min.js"></script>
    <!--Data Tables js-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


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
    function goBack() {
        window.history.back();
    }
    </script>

    <script>
    // Mereferensikan form
    var searchForm = document.getElementById("searchForm");

    // Mereset form saat halaman dimuat ulang
    window.onload = function() {
        searchForm.reset();
    };
    </script>
    <script>
    function openSearch() {
        var searchContainerb = document.getElementById("searchContainerb");
        searchContainerb.classList.add("show");
    }

    function closeSearch() {
        var searchContainerb = document.getElementById("searchContainerb");
        searchContainerb.classList.remove("show");
    }
    </script>

    <script>
    $(document).ready(function() {
        $("#searchInput").keyup(function() {
            var searchQuery = $("#searchInput").val();
            if (searchQuery.length >= 2) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>/home/search",
                    data: {
                        searchQuery: searchQuery
                    },
                    success: function(data) {
                        $("#searchResultsContainer").html(data);
                    }
                });
            } else {
                $("#searchResultsContainer").empty();
            }
        });
    });
    </script>
    <script>
    const searchContainer = document.getElementById('searchResultsContainer');

    // Tambahkan event listener ke elemen dokumen
    document.addEventListener('click', function(event) {
        // Cek apakah elemen yang diklik adalah bagian dari kontainer pencarian atau tidak
        if (!searchContainer.contains(event.target)) {
            // Jika tidak, sembunyikan kontainer pencarian
            searchContainer.innerHTML = '';
        }
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#searchInput1").keyup(function() {
            var searchQuery = $("#searchInput1").val();
            if (searchQuery.length >= 2) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>/home/search",
                    data: {
                        searchQuery: searchQuery
                    },
                    success: function(data) {
                        $("#searchResultsContainer1").html(data);
                    }
                });
            } else {
                $("#searchResultsContainer1").empty();
            }
        });
    });
    </script>
    <script>
    const searchContainer = document.getElementById('searchResultsContainer1');

    // Tambahkan event listener ke elemen dokumen
    document.addEventListener('click', function(event) {
        // Cek apakah elemen yang diklik adalah bagian dari kontainer pencarian atau tidak
        if (!searchContainer.contains(event.target)) {
            // Jika tidak, sembunyikan kontainer pencarian
            searchContainer.innerHTML = '';
        }
    });
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

    document.addEventListener('DOMContentLoaded', function() {
        const closeButtons = document.querySelectorAll('.alert-custom .btn-close');
        const overlay = document.querySelector('.overlay');

        closeButtons.forEach((button) => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                this.closest('.alert-custom').remove();
                overlay.remove();
            });
        });

        if (overlay) {
            overlay.addEventListener('click', function() {
                document.querySelector('.alert-custom').remove();
                this.remove();
            });
        }
    });
    </script>
    <?php $this->renderSection('js'); ?>
</body>

</html>