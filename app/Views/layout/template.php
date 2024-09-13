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
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fonts/stylesheet.css" type="text/css" />
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?compat=recaptcha" async defer></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16667136110"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16667136110');
    </script>


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
            color: var(--warna_hitam);
            /*color: var(--warna_2);*/
            margin-top: .65rem !important;
            margin-bottom: .65rem !important;
            font-family: 'Poppins', sans-serif !important;
        }

        .navbar-dark .navbar-toggler {
            background: transparent;
        }

        a {
            color: var(--warna_text);
        }

        a:hover {
            color: var(--warna_text) !important;
        }

        body {
            background: url(<?= base_url();
                            ?>/assets/images/bg-neon-white-pointgo-new-7.jpeg);
            color: var(--warna_text);
            /*font-family: 'Inter', sans-serif;*/
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            background-size: cover;

        }

        .righteous-regular {
            font-family: "Righteous", sans-serif;
            font-weight: 400;
            font-style: normal;
        }


        @font-face {
            font-family: 'Alphakind';
            src: url('<?= base_url(); ?>/assets/fonts/Alphakind.otf');
        }

        .font-alphakind {
            font-family: 'AlphaKind';
        }

        /*.font-rigteous {*/
        /*  font-family: 'Rigteous';*/
        /*}*/

        .font-proximanovabl {
            font-family: 'Proxima Nova Bl';
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
            /*box-shadow: 0 100px 80px hsl(0deg 0% 89% / 7%), 0 41.7776px 33.4221px hsl(0deg 0% 89% / 65%), 0 22.3363px 17.869px hsl(0deg 0% 89% / 4%), 0 12.5216px 10.0172px hsl(0deg 0% 89% / 4%), 0 6.6501px 5.32008px hsl(0deg 0% 89% / 3%), 0 2.76726px 2.21381px hsl(0deg 0% 89% / 2%);*/
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

        @media (min-width:992px) {
            .nav-link {
                display: inherit !important;
                /* Menggunakan !important untuk memastikan aturan ini diutamakan */
            }
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
            background: #F6F6F6;
            border: 0.1px solid rgba(51, 51, 51, 0.4) !important;
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
            background: #F6F6F6;
            color: var(--warna_text);
            font-size: 14px;
            border: 2px solid var(--warna_4) !important;
            border-radius: 6px;
            /*box-shadow: 0 0 200px rgb(182 187 43 / 47%) inset;*/

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
            box-shadow: 0 0 200px rgb(182 187 43 / 47%) inset;

        }



        .owl-dot {
            display: none;
        }

        .strip-primary {
            background: var(--warna_3);
        }

        .btn-primary {
            background: var(--warna_3);
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
            color: var(--warna_hitam);
            /*font-family: 'Proxima Nova Bl';*/
            /*font-family: 'Righteous', sans-serif !important;*/
            font-family: 'Poppins', sans-serif !important;
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

        .radio-nominal:checked+label:after {
            position: absolute;
            bottom: 0px;
            left: 0px;
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
            color: var(--warna_hitam);
        }

        .section-game {
            border: 1px solid #e3e7ea;
            box-shadow: 0px 2px 1px #c9c9c9;
        }

        .card {
            /*background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;*/
            /*background-image: url('<?= base_url(); ?>/assets/images/flame-fl-1.gif');        */
            background: transparent;
        }


        .bg-theme2 {
            background: #000 !important;
            padding: 20px 20px 20px 20px;
            color: #fff;
        }

        .product-tile__clip-path[data-v-16b318a8] {
            /*-webkit-clip-path: polygon(0 48%, 9% 48%, 18% 65%, 27% 49%, 36% 72%, 45% 58%, 55% 70%, 64% 58%, 73% 86%, 82% 48%, 91% 63%, 100% 70%, 100% calc(100% + 1px), 0 calc(100% + 1px));*/
            /*-webkit-clip-path: polygon(0 0%, 100% 100%, 100% 0, 0 0);*/
            /*-webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 15% 100%);*/
            -webkit-clip-path: polygon(15% 0%, 100% 0, 100% 50%, 100% 100%, 0 100%, 0% 35%);
            /*background: linear-gradient(to right, var(--warna_11), var(--warna_13)) !important;*/
            background: linear-gradient(45deg, #8CBF4B, #4C921E, #227400);
            width: 100%;
            height: 75px;
            margin-top: -15px;
            /*padding: 10px 10px 10px;*/
            border-radius: 0 0 10px 10px;
            position: relative;
        }

        /*    .product-tile__clip-path[data-v-16b318a8]::before {*/
        /*content: '';*/
        /*position: absolute;*/
        /*    left: 20px;*/
        /*    width: 5px;*/
        /*    height: 45%;*/
        /*    background: #F9D001;*/
        /*    transform: rotate(52deg);*/
        /*    border-radius: 10px 0 10px 0 ;*/
        /*    top: 1px;*/
        /*}*/

        /* Mobile Medium (min-width: 321px and max-width: 480px) */
        @media (min-width: 320px) and (max-width: 425px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 12px;
                width: 3px;
                height: 35%;
                background: #F9D001;
                transform: rotate(49deg);
                border-radius: 7px 0 7px 0;
                top: 1px;
            }
        }

        /* Mobile Large (min-width: 481px and max-width: 768px) */
        @media (min-width: 426px) and (max-width: 768px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 15px;
                width: 5px;
                height: 40%;
                background: #F9D001;
                transform: rotate(40deg);
                border-radius: 10px 0 10px 0;
                top: 1px;
            }
        }

        /* Tablet (min-width: 769px and max-width: 1024px) */
        @media (min-width: 769px) and (max-width: 1024px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 16px;
                width: 5px;
                height: 40%;
                background: #F9D001;
                transform: rotate(37deg);
                border-radius: 12px 0 12px 0;
                top: 1px;
            }
        }

        /* Laptop (min-width: 1025px and max-width: 1440px) */
        @media (min-width: 1025px) and (max-width: 1440px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 20px;
                width: 5px;
                height: 45%;
                background: #F9D001;
                transform: rotate(47deg);
                border-radius: 15px 0 15px 0;
                top: 1px;
            }
        }

        /* Desktop (min-width: 1441px and max-width: 2560px) */
        @media (min-width: 1441px) and (max-width: 2560px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 20px;
                width: 6px;
                height: 50%;
                background: #F9D001;
                transform: rotate(52deg);
                border-radius: 18px 0 18px 0;
                top: 1px;
            }
        }

        /* 4K (min-width: 2561px) */
        @media (min-width: 2561px) {
            .product-tile__clip-path[data-v-16b318a8]::before {
                content: '';
                position: absolute;
                left: 20px;
                width: 7px;
                height: 50%;
                background: #F9D001;
                transform: rotate(52deg);
                border-radius: 20px 0 20px 0;
                top: 2px;
            }
        }



        @media (max-width:575px) {
            .product-tile__clip-path[data-v-16b318a8] {
                -webkit-clip-path: polygon(15% 0%, 100% 0, 100% 50%, 100% 100%, 0 100%, -10% 50%);
                background: linear-gradient(45deg, #8CBF4B, #4C921E, #227400);
                width: 100%;
                height: 55px;
            }

            .product-tile__clip-path img.card-img {
                width: 70% !important;
                margin-top: 10px;
            }

        }

        .product-tile__clip-path img.card-img {
            position: absolute;
            width: 50%;
            right: 5px;
            z-index: -1;
            opacity: 0.5;
        }

        .card-title2 {
            min-height: 35px !important;
            margin: 5px 5px 15px 5px !important;
            font-weight: 700 !important;
            font-size: .875rem;
            color: white;
            padding: 8px 30px 16px;
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
            position: relative;
            top: .3rem;
            left: -1rem;
            border-radius: 4px;
            min-width: 85px;
            text-align: center;
            min-height: 20px;
            background: linear-gradient(180deg, #CD0000 0%, #A70000 100%);
            margin-left: 1px;
            /*margin-right: 5px;*/
            padding: 5px;
            color: var(--warna_6);
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
                margin-right: 0;
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
                width: 27%;
                height: auto;
                max-height: 35%;
                object-fit: cover;
            }

            .card-flashsale {
                height: 150px;
                padding: 14px;
                background-size: cover;
                border-radius: 20px;
            }

            .card-flashsale-bottom {
                /*display: none;*/
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 70px;
                padding: 10px;
                background-size: cover;
                overflow: hidden;
                border-radius: 0 0 20px 20px;
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
                display: flex;
                padding: 25px 25px 25px 25px !important;
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
                bottom: 390px;
            }

            .card-flashsale {
                height: 190px;
                padding: 20px;
                background-size: cover;
                border-radius: 20px;
            }

            .card-flashsale-bottom {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 85px;
                padding: 20px;
                background-size: cover;
                overflow: hidden;
                border-radius: 0 0 20px 20px;
            }

            .radio-nominal+label {
                padding: 14px 30px;
            }
        }

        @media (min-width:768px) and (max-width:1024px) {
            .img-games-fs {
                width: 25%;
                height: auto;
                max-height: 32%;
                object-fit: cover;
            }
        }

        @media (min-width:1025px) and (max-width:1440px) {
            .img-games-fs {
                width: 25%;
                height: auto;
                max-height: 46%;
                object-fit: cover;
            }
        }

        @media (min-width:992px) {
            .img-games-fs {
                width: 17% !important;
                height: fit-content !important;
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
            border-radius: 999px !important;
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
            color: var(--warna_5) !important;
            background: transparent;
            border: 0px;
            box-shadow: none !Important;
        }

        .search-sm.btn-secondary:not(:disabled):not(.disabled):active {
            color: var(--warna_5) !important;
            background: transparent;
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
            transition: opacity 0.5 ease-in-out;
            position: fixed !important;
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

        .fixed {
            position: fixed;
            z-index: 999;
            left: 0;
            right: 0;
            /*display: none;*/
            transition: top 0.5s;
        }

        @media (max-width: 425px) {
            .navbar-brand {
                width: 25%;
            }

            .rounded {
                height: 40px;
            }
        }

        .tree-footer-img {
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 10;
            /* Pastikan gambar berada di atas elemen lain jika diperlukan */
            width: 25%;
            margin-right: -3rem;
            bottom: -8rem;
        }

        @media (min-width:320px) and (max-width:575px) {
            .tree-footer-img {
                width: 50%;
                margin-right: -3rem;
                bottom: -3rem;
            }

            .text-center {
                position: relative;
                z-index: 11;
                padding: 0px;
                left: 5px;
                bottom: -1rem;
            }
        }

        @media (min-width:768px) and (max-width:1024px) {
            .tree-footer-img {
                width: 35%;
                margin-right: -5rem;
                bottom: -5rem;
            }

            .text-center {
                position: relative;
                z-index: 11;
                padding: 0px;
                left: 5px;
                bottom: -1rem;
            }
        }

        footer.bg-footer {
            position: relative;
            overflow: hidden;
            /* Sembunyikan bagian yang keluar dari frame */
        }

        span.navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='%23333333' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;

        }

        .card {
            width: 95%;
        }

        #bg-leaf-top-left {
            position: absolute;
            top: 5rem;
            left: 0;
            width: 20%;
        }

        #bg-leaf-top-right {
            position: absolute;
            top: 5rem;
            right: 0;
            width: 20%;
            transform: scaleX(-1);
        }

        #bg-leaf-bottom-left {
            position: absolute;
            left: 0;
            width: 20%;
            transform: rotate(180deg) scaleX(-1);
            z-index: -1;
        }

        #bg-leaf-bottom-right {
            position: absolute;
            right: 0;
            width: 20%;
            transform: rotate(180deg) scaleX(1);
            z-index: -1;
        }

        @media(min-width:320px) and (max-width:480px) {
            #bg-leaf-top-left {
                width: 45%;
                top: 4rem;
                left: 0;
            }

            #bg-leaf-top-right {
                width: 45%;
                top: 4rem;
                right: 0;
            }

            #bg-leaf-bottom-left {
                width: 45%;
                top: -3rem;
                left: 0;
            }

            #bg-leaf-bottom-right {
                width: 45%;
                top: -3rem;
                right: 0;
            }
        }

        @media(min-width:768px) and (max-width:1024px) {
            #bg-leaf-top-left {
                width: 30%;
                top: 4rem;
                left: 0;
            }

            #bg-leaf-top-right {
                width: 30%;
                top: 4rem;
                right: 0;
            }

            #bg-leaf-bottom-left {
                width: 30%;
                top: -9rem;
                left: 0;
            }

            #bg-leaf-bottom-right {
                width: 30%;
                top: -9rem;
                right: 0;
            }
        }

        @media(min-width:1025px) and (max-width:1440px) {
            #bg-leaf-top-left {
                width: 25%;
                top: 4rem;
                left: 0;
            }

            #bg-leaf-top-right {
                width: 25%;
                top: 4rem;
                right: 0;
            }

            #bg-leaf-bottom-left {
                width: 25%;
                top: -12rem;
                left: 0;
            }

            #bg-leaf-bottom-right {
                width: 25%;
                top: -12rem;
                right: 0;
                ;
            }
        }

        @media(min-width:1441px) and (max-width:2560px) {
            #bg-leaf-top-left {
                width: 25%;
                top: 4rem;
                left: 0;
            }

            #bg-leaf-top-right {
                width: 25%;
                top: 4rem;
                right: 0;
            }

            #bg-leaf-bottom-left {
                width: 25%;
                top: -17rem;
                left: 0;
            }

            #bg-leaf-bottom-right {
                width: 25%;
                top: -17rem;
                right: 0;
                ;
            }
        }

        .crown-header-sm {
            width: 40px;
            position: relative;
            left: 0px;
            bottom: 0px;
            margin-right: .4rem !important;
            margin-left: .4rem !important;
        }

        .crown-header-lg {
            width: 25px;
            position: relative;
            left: 14px;
            bottom: 4px;
            height: fit-content;
            margin-right: 1.2rem !important;
        }

        @media (min-width:768px) {
            .crown-header-sm {
                display: none;
            }

            a.nav-item.nav-link-harga {
                display: none;

            }

            a.nav-item.nav-link-kalkulator {
                display: none;
            }
        }

        @media (max-width:480px) {
            .crown-header-lg {
                display: none;
            }

            a.nav-item.nav-link-harga {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: .8rem !important;
                padding-left: .8rem !important;
                font-size: 14px;
            }

            a.nav-item.nav-link-kalkulator {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: .8rem !important;
                padding-left: .8rem !important;
                font-size: 14px;
            }

            a.nav-item.nav-link-leaderboard {
                display: none;
            }

            .hamburger-container {
                display: none;
            }

            .signup-bt-nav {
                display: none;
            }

            .login-bt-nav {
                display: none;
            }
        }

        .login-bt-nav {
            background: var(--warna_3) !important;
            border-radius: 20px !important;
            color: var(--warna_2) !important;
            /*font-weight: 100 !important;*/
            border: none !important;
            padding: 10px 25px 10px 25px;
            /*margin-top: 30px;*/
        }

        .signup-bt-nav {
            background: transparent !important;
            border-radius: 20px !important;
            color: var(--warna_11) !important;
            border: 1px solid var(--warna_11) !important;
            padding: 10px 25px 10px 25px !important;
        }

        .profil-bt-nav {
            background: transparent !important;
            border-radius: 20px !important;
            color: var(--warna_11) !important;
            border: 1px solid var(--warna_11) !important;
            padding: 8px 30px 8px 30px !important;
        }
    </style>

    <?php $this->renderSection('css'); ?>
</head>

<body>
    <div class="content" style="padding-top: 0px;">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark  bg-custom shadow-navbar fixed" id="navbar" style="top:0px">
                <div class="container">

                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" height="50" alt="logo icon"
                            class="rounded">
                    </a>



                    <div class="d-flex">

                        <a class="search-sm btn btn-secondary" onclick="openSearch()">
                            <i class="fa fa-search" aria-hidden="true" style="font-size: 23px; margin-top:1px"></i>
                        </a>
                        <a <?= $menu_active == 'leaderboard' ? 'active' : ''; ?>
                            href="<?= base_url(); ?>/leaderboard"><img src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" class="crown-header-sm"></a>
                        <form action="" method="POST" id="searchForm1" class="search-lg" style="border: 1px solid #8DBE51; border-radius: 20px;">
                            <div class="input-group search">
                                <div class="icon-voucher"><i class="fa fa-search icon-voucher2"></i></div>
                                <input type="text" placeholder="Cari game atau voucher" class="form-control pl-10"
                                    id="searchInput1" name="searchInput1" value="<?php
                                                                                    //  $search;
                                                                                    ?>">
                            </div>
                        </form>
                        <div class="search-container" id="searchResultsContainer1"></div>

                        <!-- MEMBER -->

                        <div class="dropdown d-lg-none">
                            <style>
                                .dropdown-toggle::after {
                                    display: none;
                                }
                            </style>

                            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--<a class="nav-item nav-link"><i class="fa fa-user" style="font-size:1.5rem; padding-left:1px" aria-hidden="true"></i></a>-->
                                <a class="nav-item nav-link"><i class="fa fa-user-circle" style="font-size:1.5rem; padding-left:1px; color:var(--warna_5)" aria-hidden="true"></i></a>
                            </span>

                            <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton" style="left: auto;right: 0;box-shadow: none !important;background: var(--warna_2) !important;">
                                <?php if ($users === false) : ?>
                                    <a class="dropdown-item text-dark <?= $menu_active == 'Register' ? 'active' : ''; ?>" href="<?= base_url(); ?>/register" style="font-weight:400">Daftar Member</a>
                                    <a class="dropdown-item text-dark <?= $menu_active == 'Login' ? 'active' : ''; ?>" href="<?= base_url(); ?>/login" style="font-weight:400">Login Member</a>
                                <?php endif ?>

                                <?php if ($users !== false): ?>
                                    <a class="nav-item nav-link text-dark <?= $menu_active == 'Beranda' ? 'active' : ''; ?>"
                                        href="<?= base_url(); ?>/user">Profil</a>
                                <?php endif ?>

                            </div>
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse menu-utama" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link <?= $menu_active == 'Home' ? 'active' : ''; ?>"
                                href="<?= base_url(); ?>">Home</a>
                            <a class="nav-item nav-link <?= $menu_active == 'Cek' ? 'active' : ''; ?>"
                                href="<?= base_url(); ?>/payment">Cek Pesanan</a>
                            <a class="nav-item nav-link-harga <?= $menu_active == 'Harga' ? 'active' : ''; ?>"
                                href="<?= base_url(); ?>/tabelharga">Daftar Harga</a>
                            <a class="nav-item nav-link-harga <?= $menu_active == 'Postingan' ? 'active' : ''; ?>"
                                href="<?= base_url(); ?>/postingan">News</a>
                            <a class="nav-item nav-link-leaderboard <?= $menu_active == 'leaderboard' ? 'active' : ''; ?>"
                                href="<?= base_url(); ?>/leaderboard" style="color: var(--warna_hitam); padding-top:10px"><img src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" class="crown-header-lg">Leaderboard</a>
                            <?php if ($users === false) : ?>
                                <a href="<?= base_url(); ?>/register"><button type="button" class="signup-bt-nav">Daftar Member</button></a>
                                <a href="<?= base_url(); ?>/login"><button type="button" class="login-bt-nav">Login Member</button></a>
                            <?php else: ?>
                                <a href="<?= base_url(); ?>/user"> <button type="button" class="profil-bt-nav">Profil</button></a>
                            <?php endif; ?>
                            <!--<a class="nav-item nav-link <?= $menu_active == 'Reseller' ? 'active' : ''; ?>"-->
                            <!--    href="<?= base_url(); ?>/reseller" hidden>Daftar Reseller</a>-->
                            <!--<a class="nav-item nav-link <?= $menu_active == 'Price' ? 'active' : ''; ?>"-->
                            <!--    href="<?= base_url(); ?>/price" hidden>Daftar Harga</a>-->
                            <!--<a class="nav-item nav-link <?= $menu_active == 'Method' ? 'active' : ''; ?>"-->
                            <!--    href="<?= base_url(); ?>/method" hidden>Metode Pembayaran</a>-->
                            <!--<a class="nav-item nav-link <?= $menu_active == 'postingan' ? 'active' : ''; ?>"-->
                            <!--    href="<?= base_url(); ?>/postingan" hidden>Artikel</a>-->

                            <div class="dropdown">
                                <style>
                                    .dropdown-toggle::after {
                                        display: none;

                                    }
                                </style>
                                <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="navbar-nav ml-auto">
                                        <a class="nav-item nav-link-kalkulator" style="cursor:pointer;">Kalkulator</a>
                                    </div>
                                </span>
                                <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton"
                                    style="left: auto;right: 0;box-shadow: none !important;background: var(--warna_2) !important;">
                                    <a class="dropdown-item text-dark <?= $menu_active == 'kalkulatorwr' ? 'active' : ''; ?>"
                                        href="<?= base_url(); ?>/kalkulatorwr" style="font-weight:400;">Kalkulator WR</a>
                                    <a class="dropdown-item text-dark <?= $menu_active == 'hpmagicwheel' ? 'active' : ''; ?>"
                                        href="<?= base_url(); ?>/hpmagicwheel" style="font-weight:400;">HP Magic Wheel</a>
                                    <a class="dropdown-item text-dark <?= $menu_active == 'kalkulatorzodiac' ? 'active' : ''; ?>"
                                        href="<?= base_url(); ?>/kalkulatorzodiac" style="font-weight:400;">Kalukulator Zodiac</a>
                                </div>
                            </div>
                            <!--<?php if ($users !== false): ?>-->
                            <!--<style>-->
                            <!--a.nav-item.nav-link.text-dark.active{-->
                            <!--   display: none; -->
                            <!--}-->
                            <!--</style>-->
                            <!--<a class="nav-item nav-link text-dark <?= $menu_active == 'Beranda' ? 'active' : ''; ?>"-->
                            <!--    href="<?= base_url(); ?>/user">Profil</a>-->
                            <!--<?php endif ?>-->

                            <div class="dropdown-member">
                                <style>
                                    @media (max-width: 991px) {
                                        .dropdown-member {
                                            display: none !important;
                                        }
                                    }

                                    @media (max-width: 991px) {
                                        i.fa.fa-user {
                                            color: var(--warna_5);

                                        }
                                    }
                                </style>

                                <!--<span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                <!--    <a class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true" style="font-size:2.5rem; cursor:pointer; color:#8BBE57;"></i></a>-->
                                <!--</span>-->
                                <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton" style="left: auto;right: 0;box-shadow: none !important;background: var(--warna_2) !important;">
                                    <?php if ($users === false) : ?>
                                        <a class="dropdown-item text-dark <?= $menu_active == 'Register' ? 'active' : ''; ?>" href="<?= base_url(); ?>/register" style="font-weight:400">Daftar Member</a>
                                        <a class="dropdown-item text-dark <?= $menu_active == 'Login' ? 'active' : ''; ?>" href="<?= base_url(); ?>/login" style="font-weight:400">Login Member</a>
                                    <?php endif ?>

                                </div>
                            </div>

                            <style>
                                .hamburger-container {
                                    position: relative;
                                    margin-left: .8rem;
                                }

                                .hamburger-icon {
                                    cursor: pointer;
                                    display: block;
                                    padding-top: 8px;
                                    z-index: 2;
                                    /* Make sure it's above the menu */
                                }

                                .hamburger-icon .line {
                                    width: 25px;
                                    height: 2px;
                                    background-color: #333333;
                                    margin: 5px 0;
                                    transition: transform 0.3s ease, opacity 0.3s ease;
                                }

                                .hamburger-icon.active .line:nth-child(1) {
                                    transform: translateY(8px) rotate(45deg);
                                }

                                .hamburger-icon.active .line:nth-child(2) {
                                    opacity: 0;
                                }

                                .hamburger-icon.active .line:nth-child(3) {
                                    transform: translateY(-8px) rotate(-45deg);
                                }

                                #hamburger-nav {
                                    list-style-type: none;
                                    padding: 10px;
                                    margin: 0;
                                    position: absolute;
                                    top: 50px;
                                    /* Adjust as needed */
                                    right: 10px;
                                    /* Adjust as needed */
                                    background-color: white;
                                    border: 1px solid #ccc;
                                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                                    z-index: 1;
                                    max-height: 0;
                                    overflow: hidden;
                                    transition: max-height 0.5s ease-out, opacity 0.5s ease-out, visibility 0.5s ease-out, transform 0.5s ease-out;
                                    opacity: 0;
                                    visibility: hidden;
                                    transform: translateY(-20px);
                                    /* Start slightly above */
                                }

                                #hamburger-nav.show {
                                    max-height: fit-content;
                                    /* Adjust as needed for content height */
                                    opacity: 1;
                                    /* Show menu */
                                    visibility: visible;
                                    /* Show menu */
                                    transform: translateY(0);
                                    /* Slide down */
                                }

                                #hamburger-nav li {
                                    margin: 0;
                                    opacity: 0;
                                    /* Start hidden */
                                    transform: translateY(-10px);
                                    /* Start slightly above */
                                    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
                                }

                                #hamburger-nav.show li {
                                    opacity: 1;
                                    /* Show items */
                                    transform: translateY(0);
                                    /* Move to position */
                                }

                                #hamburger-nav li a {
                                    text-decoration: none;
                                    color: black;
                                    display: block;
                                    padding: 10px;
                                    white-space: nowrap;
                                }

                                #hamburger-nav li a.active {
                                    font-weight: bold;
                                }
                            </style>

                            <div class="hamburger-container">
                                <div class="hamburger-icon" id="hamburger-icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                                <ul id="hamburger-nav" class="hidden">
                                    <li>
                                        <a <?= $menu_active == 'Harga' ? 'class="active"' : ''; ?> href="<?= base_url(); ?>/tabelharga">Daftar Harga</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-dark <?= $menu_active == 'kalkulatorwr' ? 'active' : ''; ?>"
                                            href="<?= base_url(); ?>/kalkulatorwr" style="font-weight:400;">Kalkulator WR</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-dark <?= $menu_active == 'hpmagicwheel' ? 'active' : ''; ?>"
                                            href="<?= base_url(); ?>/hpmagicwheel" style="font-weight:400;">HP Magic Wheel</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-dark <?= $menu_active == 'kalkulatorzodiac' ? 'active' : ''; ?>"
                                            href="<?= base_url(); ?>/kalkulatorzodiac" style="font-weight:400;">Kalukulator Zodiac</a>
                                    </li>
                                    <li><a class="dropdown-item text-dark <?= $menu_active == 'news' ? 'active' : ''; ?>"
                                            href="<?= base_url(); ?>/postingan" style="font-weight:400;">News</a></li>
                                </ul>
                            </div>

                            <?php if ($admin !== false): ?>
                                <a class="nav-item nav-link" href="<?= base_url(); ?>/admin" hidden>Administrator</a>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </nav>
            <br><br><br><br>
        </header>





        <?php $this->renderSection('content'); ?>


    </div>

    <div class="search-containerb position-absolute shadow-sm" id="searchContainerb">
        <div class="container" style=" padding:0px !important;">
            <div class="col-12">

                <div class="search-container" id="searchResultsContainer"></div>
            </div>
        </div>
    </div>


    <footer id="aboutus" class="bg-footer">
        <div class="bg-leaf">
            <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-bottom-left">
            <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-bottom-right">
        </div>
        <img src="<?= base_url(); ?>/assets/images/footer-template-pointgo-white-green-2.png" width="100%"
            class="bg-footer-lg"></img>
        <img src="<?= base_url(); ?>/assets/images/bg-footer-up-mobile-white-green.png" width="100%"
            class="bg-footer-sm"></img>
        <div style="background: var(--warna_2);margin-top: -4px;">
            <div class="pt-5 pb-1">
                <div class="container" style="max-width: 1700px !important;">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" height="80" alt="logo icon"
                                class="mb-3 logo-footer-sm-lg">
                            <h5 class="mb-2" style="color:var(--warna_hitam);"><?= $web['name']; ?></h5>
                            <?= $web['description']; ?>
                            <div class="col-lg-12 col-sm-12 my-4">
                                <a href=" <?= $sm['ig']; ?>" class="mr-1">
                                    <iconify-icon icon="skill-icons:instagram" style="font-size: 35px;"></iconify-icon>
                                </a>
                                <a href="<?= $sm['wa']; ?>" class="mr-1">
                                    <iconify-icon icon="logos:whatsapp-icon" style="font-size: 35px;"></iconify-icon>
                                </a>
                                <a href="<?= $sm['fb']; ?>" class="mr-1">
                                    <iconify-icon icon="devicon:facebook" style="font-size: 35px;"></iconify-icon>
                                </a>
                                <a href="<?= $sm['tw']; ?>" class="mr-1">
                                    <iconify-icon icon="logos:tiktok-icon" style="font-size: 35px;"></iconify-icon>
                                </a>
                                <a href="<?= $sm['yt']; ?>" class="mr-1">
                                    <iconify-icon icon="logos:youtube-icon" style="font-size: 35px;"></iconify-icon>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-sm-3">
                            <h5 class="pb-2" style="color:var(--warna_hitam);">Halaman</h5>
                            <ul class="menu-list">
                                <li><a href="<?= base_url(); ?>/" style="color:var(--warna_hitam);">Halaman Utama</a></li>
                                <li><a href="<?= base_url(); ?>/payment" style="color:var(--warna_hitam);">Cek Pesanan</a></li>
                                <li><a href="<?= base_url(); ?>/tabelharga" style="color:var(--warna_hitam);">Daftar Harga</a></li>
                                <li><a href="<?= base_url(); ?>/leaderboard" style="color:var(--warna_hitam);">Leaderboard</a></li>
                                <li><a href="<?= base_url(); ?>/syarat-ketentuan" style="color:var(--warna_hitam);">Syarat & Ketentuan</a></li>
                                <li><a href="<?= base_url(); ?>/kalkulatorwr" style="color:var(--warna_hitam);">Kalkulator WR</a></li>
                                <li><a href="<?= base_url(); ?>/hpmagicwheel" style="color:var(--warna_hitam);">HP Magic Wheel</a></li>
                                <li><a href="<?= base_url(); ?>/kalkulatorzodiac" style="color:var(--warna_hitam);">Kalkulator Zodiac</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <h5 class="pb-2" style="color:var(--warna_hitam);">Kontak</h5>
                            <ul class="menu-list">
                                <li><a><i class="fa fa-instagram" aria-hidden="true"></i> hiddengame.id</a></li>
                                <li><a><i class="fa fa-whatsapp" aria-hidden="true"></i> +62 895-3204-23181</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-3">
                            <h5 class="pb-2" style="color:var(--warna_hitam);">Member</h5>
                            <ul class="menu-list">
                                <li><a href="<?= base_url(); ?>/register" style="color:var(--warna_hitam);">Daftar Member</a></li>
                                <li><a href="<?= base_url(); ?>/login" style="color:var(--warna_hitam);">Login Member</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-3" hidden>
                            <h5 class="pb-2" style="color:var(--warna_hitam);"></h5>
                            <ul class="menu-list">
                                <li><a href="<?= base_url(); ?>/reseller" style="color:var(--warna_hitam);">Daftar Reseller</a></li>
                                <li><a href="<?= base_url(); ?>/loginreseller" style="color:var(--warna_hitam);">Login Reseller</a></li>
                            </ul>
                        </div>
                        <!--<div class="col-lg-2 col-sm-3">-->
                        <!--    <h5 class="pb-2">Layanan</h5>-->
                        <!--    <ul class="menu-list">-->
                        <!--        <li><a href="<?= base_url(); ?>/">Diamond Games</a></li>-->
                        <!--        <li><a href="<?= base_url(); ?>/">Voucher</a></li>-->
                        <!--        <li><a href="<?= base_url(); ?>/">Pulsa</a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="text-center pt-5 pb-4" style="color:var(--warna_hitam);"> Copyright © 2024 PT Hidden Digital Indonesia. All Rights Reserved </div>
            </div>
        </div>
        <div class="fab-container">
            <div class="fab fab-icon-holder" style="background-color:#FFF; padding:5px">
                <img src="https://turbowoii.com/assets/images/callcenter.webp" class="img-fluid2" alt="">
            </div>

            <ul class="fab-options">
                <li>
                    <a href="<?= $sm['ig']; ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder"
                            style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
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

        <img src="<?= base_url(); ?>/assets/images/tree-footer-2.png" class="tree-footer-img">
    </footer>


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

    <!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.8/sweetalert2.all.min.js" async></script>


    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


    <script>
        document.getElementById('bg-video').play();
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var hamburgerIcon = document.getElementById('hamburger-icon');
            var navMenu = document.getElementById('hamburger-nav');
            var navItems = navMenu.querySelectorAll('li');

            hamburgerIcon.addEventListener('click', function() {
                navMenu.classList.toggle('hidden');
                navMenu.classList.toggle('show');
                hamburgerIcon.classList.toggle('active');

                // Add a slight delay to stagger the animation of each link
                if (navMenu.classList.contains('show')) {
                    navItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, index * 100); // Stagger the animation by 100ms per item
                    });
                } else {
                    navItems.forEach((item) => {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(-10px)';
                    });
                }
            });
        });
    </script>

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
        // function openSearch() {
        //     var searchContainerb = document.getElementById("searchContainerb");
        //     searchContainerb.classList.add("show");
        // }

        // function closeSearch() {
        //     var searchContainerb = document.getElementById("searchContainerb");
        //     searchContainerb.classList.remove("show");
        // }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navbar = document.getElementById("navbar");
            var searchContainerb = document.getElementById("searchContainerb");
            var lastScrollTop = 0;
            var deltaHide = 200; // Jarak scroll yang cukup jauh sebelum navbar menutup
            var deltaShow = 0; // Jarak scroll yang sedikit untuk menampilkan navbar
            var navbarHeight = navbar.offsetHeight;

            window.addEventListener("scroll", function() {
                var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                // Cek apakah cukup jauh untuk menyembunyikan navbar
                if (currentScroll > lastScrollTop && currentScroll > deltaHide) {
                    // Scroll down and passed the hide threshold
                    navbar.style.top = `-${navbarHeight + 300}px`; // Navbar will hide further up (adjust 50px as needed)

                    // Jika search container sedang aktif, panggil closeSearch
                    if (searchContainerb.classList.contains("show")) {
                        closeSearch();
                    }
                }
                // Cek apakah cukup sedikit untuk menampilkan navbar kembali
                else if (lastScrollTop - currentScroll > deltaShow) {
                    // Scroll up and passed the show threshold
                    navbar.style.top = "0";
                }

                lastScrollTop = currentScroll; // Update lastScrollTop dengan currentScroll saat ini
            }, false);
        });

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
        // var prevScrollpos = window.pageYOffset;
        // var windowHeight = window.innerHeight;
        // var timer;

        // window.onscroll = function() {
        //   var currentScrollPos = window.pageYOffset;
        //   var searchContainerb = document.getElementById("searchContainerb");
        //   var navbar = document.querySelector(".navbar");

        //   // Mengatur posisi navbar
        //   if (prevScrollpos > currentScrollPos || currentScrollPos < windowHeight / 8) {
        //     navbar.style.top = "0";
        //   } else {
        //     navbar.style.top = "-300px"; // Sesuaikan dengan tinggi navbar Anda
        //   }

        //   // Menghapus kelas "show" dari searchContainerb saat scroll down
        //   if (prevScrollpos < currentScrollPos && currentScrollPos > windowHeight / 8) {
        //     closeSearchAfterDelay();
        //   } else {
        //     clearTimeout(timer); // Jika pengguna scroll ke atas, reset timer
        //   }

        //   prevScrollpos = currentScrollPos;
        // }

        // function openSearch() {
        //   var searchContainerb = document.getElementById("searchContainerb");
        //   searchContainerb.classList.add("show");
        // }

        // function closeSearch() {
        //   var searchContainerb = document.getElementById("searchContainerb");
        //   searchContainerb.classList.remove("show");
        // }

        // function closeSearchAfterDelay() {
        //   timer = setTimeout(closeSearch, 1000); // Menunggu 1 detik sebelum menutup searchContainerb
        // }
        // 
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