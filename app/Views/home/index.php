<?php $this->extend('layout/template'); ?>

<?php $this->section('css'); ?>
<!-- <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/home.css"> -->
<style>
    .diskon {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        width: 68px;
        height: 30px;
        color: #fff;
        background: #ff3956;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
        -webkit-font-smoothing: antialiased;
        position: absolute;
        top: 0;
        right: 0;
        font-size: .875rem;
        line-height: 1.25rem;
        border-radius: 0px 10px 0px 20px;
        border-bottom: 3px solid #fff;
        border-left: 3px solid #fff;
    }


    @media (max-width: 768px) {
        .diskon {
            padding-left: 0rem;
            padding-right: 0rem;
            width: 45px;
            font-size: .75rem;
        }

        .leaderboard-flex {
            justify-content: center !important;
        }
    }

    .diskon-flashsale {
        position: absolute;
        padding: 0.25rem 0.75rem;
        width: 130px;
        height: 30px;
        font-weight: bold;
        right: 0;
        top: 0;
        font-size: .875rem;
        font-style: italic;
        line-height: 1.25rem;
        border-radius: 0px 20px 0px 20px;
        border-bottom: 3px solid #fff;
        border-left: 3px solid #fff;
        background: #ff3956;

    }

    .show-animation {
        background: linear-gradient(45deg, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, rgba(255, 255, 255, 0.9) 50%, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956, #ff3956);
        background-size: 700% 200%;
        animation: gradientAnimation 1.5s linear infinite;
        /*animation-delay: 5s;*/

    }

    @keyframes gradientAnimation {
        0% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }

    }

    .limit-text {
        font-size: 13px;
        text-shadow: 1px 1px #000;
        color: #fff;
    }

    @media (max-width:480px) {
        .limit-text {
            font-size: 11px;
        }
    }


    @media (max-width: 768px) {
        .diskon-flashsale {
            padding-left: 0rem;
            padding-right: 0rem;
            width: 90px;
            font-size: .75rem;
        }

    }

    @media screen and (min-width: 768px) {
        .coda-about__card-container {
            width: 50%;
            display: inline-flex;
        }

        .banner-skeleton {
            height: 400px !important;
            /* Tinggi yang sesuai */
        }
    }

    /*@media (max-width: 480px) {*/
    /*    .card-title2 {*/
    /*        font-size: 0.6rem !important;*/
    /*        font-weight: 800 !important;*/
    /*    }*/

    /*}*/

    @media (min-width:320px) and (max-width: 575px) {
        .card-title2 {
            font-size: 0.6rem !important;
            font-weight: 800 !important;
            padding: 8px 8px 16px;
            letter-spacing: 1px;
        }

    }

    @media (min-width:768px) and (max-width: 1024px) {
        .card-title2 {
            font-size: 0.68rem !important;
            font-weight: 800 !important;
            padding: 8px 18px 30px;
            letter-spacing: 1px;
        }

    }

    @media (min-width:1025px) and (max-width: 1440px) {
        .card-title2 {
            font-size: 0.75rem !important;
            font-weight: 800 !important;
            padding: 8px 21px 30px;
            letter-spacing: 1px;
        }

    }

    @media (min-width:900px) {
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .card img.img-games {
            width: 15rem;
        }
    }


    .coda-about__card-icon-container[data-v-7e34a1fb] {
        max-width: 60px;
        max-height: 60px;
        width: 20%;
        padding: 10px;
        background-color: #eae8f7;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .coda-about__card-container[data-v-7e34a1fb] {
        padding: 10px 0;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .coda-about__card-content[data-v-7e34a1fb] {
        padding-left: 10px;
    }

    .coda-about__sub-header[data-v-24b86abb] {
        word-break: break-word;
        font-size: 1rem;
    }

    .coda-about__header[data-v-24b86abb] {
        font-size: 3rem;
        font-weight: bold;
        padding: 5px 0 10px 0;
        margin: 0;
        word-break: break-word;
        line-height: 40px;
    }

    .coda-about__card-title[data-v-7e34a1fb] {
        margin: 0 0 10px;
        font-size: .875rem;
    }

    .tab-category.nav-pills .nav-link {
        color: var(--warna_2);
        border: 1px solid var(--warna_11);
        border-radius: 10px;
        /*background: #f9f9f9;*/
        background: transparent;
    }

    .tab-category.nav-pills .nav-link:hover {
        color: var(--warna_hitam);
        border: 1px solid var(--warna_6);
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: var(--warna_2);
        background: var(--warna_3);
        border: 1px solid var(--warna_11);
    }

    .nav-pills .nav-link {
        margin: 0px !important;
        font-size: 11px;
    }

    .swiper-container {
        width: 100%;
        position: relative;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 48px;
        font-weight: bold;
        color: #fff;
        transition: transform 0.3s ease;
        z-index: 1;
    }

    .swiper-slide.sold-out {
        pointer-events: none;
        filter: grayscale(100%);
        cursor: not-allowed;
    }


    .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        margin: 0 8px;
        background-color: #fff;
        opacity: 0.5;
        border-radius: 50%;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .swiper-pagination-bullet.swiper-pagination-bullet-active {
        opacity: 1;
        background-color: var(--warna_11);
    }

    .swiper-pagination {
        bottom: inherit !important;
        padding-top: 0px !important;
    }

    .swiper-slide-active {
        transform: scale(1);
        z-index: 2;
    }

    @media(min-width: 700px) {
        .swiper-slide {
            height: 100% !important;
            margin-right: 10px !important;
            display: block;
            object-fit: contain;
        }
    }

    .swiper-slide {
        margin-right: 10px !important;
        display: block;
        object-fit: contain;

    }

    .swiper-button-next,
    .swiper-button-prev {
        backdrop-filter: brightness(0.4);
        border: 1px solid var(--warna_11);
        padding: 25px 25px 25px 25px;
        border-radius: 99px;
        color: var(--warna_11);
        /*color: #FBE31F;*/
        top: var(--swiper-navigation-top-offset, 45%);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-family: swiper-icons;
        font-size: 18px;
        font-weight: 600;
        text-transform: none !important;
        letter-spacing: 0;
        font-variant: initial;
        line-height: 1;
    }


    .produk-flash-sale {
        position: relative;
        top: -1rem;
        text-align: left;
        font-size: 19px;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #fff !important;
        width: 75%;
    }

    .harga-disc {
        text-align: left;
        font-size: 15px;
        font-weight: 600px;
    }

    .harga-coret {
        text-align: left;
        font-size: 12px;
        font-weight: 500;
        text-decoration: line-through;
        color: red;
        padding-left: 10px;
    }

    .pl-title2 {
        font-size: 10px;
        padding-top: 5px;
        font-weight: 200;
        text-align: center;
        line-height: 15px;
        overflow: hidden;
    }

    .card-game {
        padding: 0rem;
    }

    .card.mb-3:hover {
        border: 1px solid var(--warna_3);
        transition: 0.3s ease
    }

    .card.mb-3 {
        border: 1px solid transparent;
    }


    .artikel-tanda {
        display: inline-flex;
        flex-direction: column;
        position: absolute;
        top: 0px;
        background-color: #707feb;
        padding: 4px 8px 4px;
        width: 100%;
        height: 45px;
        justify-content: center;
        right: -43%;
        transform: rotate(45deg);
    }

    .category-artikel {
        display: inline-flex;
        justify-content: center;
        overflow-wrap: break-word;
        word-break: break-word;
        overflow: hidden;
        position: relative;
        border-radius: 16px;
        width: 100%;
    }

    .gap-2 {
        gap: 0.5rem;
    }

    .readMore,
    .readLess {
        color: #eee;
        cursor: pointer;
        font-weight: 600;
    }

    .img-promo {
        width: 100%;
        height: 150px;
    }

    .img-promo img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        object-position: top;
    }


    .slick-list {
        padding-top: 5% !important;
        padding-bottom: 5% !important;
        padding-left: 15% !important;
        padding-right: 15% !important;
        overflow: visible;
    }

    .slick-dots {
        text-align: right;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .slick-track {
        max-width: 100% !important;
        transform: translate3d(0, 0, 0) !important;
        perspective: 100px;
    }



    .slick-slide {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        opacity: 0;
        width: 100% !important;
        transform: translate3d(0, 0, 0);
        transition: transform 1s, opacity 1s;
    }

    .slick-arrow {
        cursor: pointer;
        background: linear-gradient(to bottom, #72B15D, #8EBF56);
        padding: 35px 12px 35px 12px;
        border-radius: 10px;
        color: #FBE31F;
        font-size: 30px;
        font-style: normal;
        top: var(--swiper-navigation-top-offset, 40%);
        font-variant: initial;
        position: relative;
        z-index: 1;
    }

    i.slick-arrow-prev.slick-arrow {
        position: absolute;
        left: -220px;
    }

    i.slick-arrow-next.slick-arrow {
        position: absolute;
        right: -220px;
    }

    .slick-snext,
    .slick-sprev {
        display: block;
        opacity: 0.7;
        filter: contrast(0.8);
    }

    .slick-current {
        opacity: 1;
        position: relative;
        display: block;
        transform: translate3d(0, 0, 20px);
        z-index: 2;
    }

    .slick-snext {
        transform: translate3d(60%, 0, 0px);
        z-index: 1;
    }

    .slick-sprev {
        transform: translate3d(-60%, 0, 0px);
    }

    .img-banner-slick {
        border-radius: 20px;
    }

    .slick-slide {
        border-radius: 20px;
        margin-right: 20px;
    }

    .bg-flashsale-up {
        position: absolute;
        bottom: 28px;
        right: 0;
        font-size: 13px;
        font-weight: 300;
    }

    .bg-flashsale-up .price-cor-fs {
        text-decoration: line-through;
    }

    .price-cor-fs {
        color: white;
    }

    .bg-flashsale-up-m {
        position: absolute;
        bottom: 28px;
        right: 0;
        font-size: 13px;
        font-weight: 300;
    }

    .bg-flashsale-up-m .price-cor-fs {
        text-decoration: line-through;
    }

    .bg-flashsale-down-m {
        position: absolute;
        bottom: 0;
        right: 0;
        text-align: right;
        font-size: 15px;
    }

    @media (min-width:481px) {
        .bg-flashsale-down-m {
            display: none;
        }

        .bg-flashsale-up-m {
            display: none;
        }
    }

    @media (max-width:480px) {
        .bg-flashsale-down {
            bottom: -1rem !important;
        }

        .bg-flashsale-up {
            bottom: .5rem !important;
        }
    }

    .bg-flashsale-down {
        position: absolute;
        bottom: 0;
        right: 0;
        text-align: right;
        font-size: 15px;
    }

    .justify-between {
        justify-content: space-between;
    }

    .flex-col {
        flex-direction: column;
    }

    .banner-pad {
        padding: 0px 300px;
    }

    @media (max-width: 600px) {
        .banner-pad {
            padding: 0px 0px !important;
        }

        .rev_slider {
            overflow: hidden;
        }
    }

    .banner-skeleton {
        background-color: #e1e1e1;
        /* Warna latar belakang yang cocok */
        border-radius: 16px;
        /* Sudut bulat sesuai desain Anda */
        height: 175px;
        /* Tinggi yang sesuai */
        width: 100%;
        /* Lebar penuh */
        animation: pulse 1.5s infinite;
        /* Animasi pulsasi dengan durasi 1.5 detik dan berulang tak terbatas */
    }

    @keyframes pulse {
        0% {
            opacity: 1;
            /* Opasitas penuh pada awal animasi */
        }

        50% {
            opacity: 0.6;
            /* Opasitas sedikit lebih rendah di tengah animasi */
        }

        100% {
            opacity: 1;
            /* Kembali ke opasitas penuh pada akhir animasi */
        }
    }

    .rev_slider:not(.loaded) {
        display: none;
        /* Sembunyikan konten banner sebenarnya selama "skeleton" banner ditampilkan */
    }

    .leaderboard-flex {
        justify-content: flex-start;
    }

    .leaderboard {
        align-items: flex-end;
        gap: 0.25rem;
        font-size: 13px;
        font-weight: 600;
        color: #000000 !important;
        text-transform: uppercase;
        background: #f9f9f9;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid var(--warna_4);
    }

    .leaderboard:hover {
        background: var(--warna_3);
    }

    .flashsaletitle {
        display: inline-block;
        font-size: 25px;
        /*text-shadow:1px 1px 1px #FFFFFF;*/
        /*2px 2px 2px #FFDFCA,*/
        /*3px 3px 2px #F9F871;*/
        /*font-weight:800*/
    }

    .countdown-time {
        text-align: center;
        display: inline-block;
        font-size: 25px;
        font-weight: 700;
        text-shadow: 0.5px 0.5px 0.5px #000000;
        color: #FFFFFF;
        background: #FF3956;
    }


    .flash-sale-container {
        /*margin: 20px;*/
        /*padding: 10px;*/
        /*border: 1px solid #ccc;*/
        width: 100%;
        box-sizing: border-box;
    }

    .flash-sale-item {
        margin-bottom: 10px;
    }

    .hidden {
        display: none;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .flash-sale-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .button-wrapper {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        text-align: center;
        /*margin-top: 20px; */
        margin-bottom: 10px;
    }

    .button-wrapper .btn-flashsale {
        position: relative;
        top: 0;
        font-weight: 700;
        left: 0;
        width: 250px;
        height: 50px;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .button-wrapper .btn-flashsale a {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #FF3956;
        transition: 0.5s;
        /*transform: skewX(0deg) translate(0);*/
        box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
        border: 1px solid #fff;
        border-radius: 30px;
        padding: 10px;
        letter-spacing: 1px;
        text-decoration: none;
        overflow: hidden;
        color: #fff;
        font-weight: 400px;
        z-index: 1;
        transition: 0.5s;
        filter: blur(0px);
    }

    .button-wrapper .btn-flashsale:hover a {
        letter-spacing: 3px;
        color: #fff !important;
    }

    .button-wrapper .btn-flashsale a::before {
        /*content: "";*/
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        /*background: #FF3956;*/
        /*background: linear-gradient(to left, rgba(247, 255, 30, 0.8), transparent);*/
        /*transform: skewX(45deg) translate(0);*/
        transition: 0.5s;
        filter: blur(0px);
    }

    .button-wrapper .btn-flashsale:hover a::before {
        transform: skewX(45deg) translate(200px);
    }

    .button-wrapper .btn-flashsale::before {
        content: "";
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
        bottom: -1px;
        width: 30px;
        height: 10px;
        background: #f00;
        border-radius: 10px;
        transition: 0.5s;
        transition-delay: 0.5;
    }

    .button-wrapper .btn-flashsale:hover::before

    /*lightup button*/
        {
        bottom: 0;
        height: 50%;
        width: 80%;
        border-radius: 30px;
    }

    .button-wrapper .btn-flashsale::after {
        content: "";
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
        top: -1px;
        width: 30px;
        height: 10px;
        background: #f00;
        border-radius: 10px;
        transition: 0.5s;
        transition-delay: 0.5;
    }

    .button-wrapper .btn-flashsale:hover::after

    /*lightup button*/
        {
        top: 0;
        height: 50%;
        width: 80%;
        border-radius: 30px;
    }

    .button-wrapper .btn-flashsale:nth-child(1)::before,
    /*chnage 1*/
    .button-wrapper .btn-flashsale:nth-child(1)::after {
        background: #FF3956;
        box-shadow: 0 0 5px #FF3956, 0 0 15px #FF3956, 0 0 30px #FF3956,
            0 0 60px #FF3956;

    }

    .button-wrapper .btn-flashsale:nth-child(2)::before,
    /* 2*/
    .button-wrapper .btn-flashsale:nth-child(2)::after {
        background: #FF3956;
        box-shadow: 0 0 5px #FF3956, 0 0 15px #FF3956, 0 0 30px #FF3956,
            0 0 60px #FF3956;
    }

    .button-wrapper .btn-flashsale:nth-child(3)::before,
    /* 3*/
    .button-wrapper .btn-flashsale:nth-child(3)::after {
        background: #FF3956;
        box-shadow: 0 0 5px #FF3956, 0 0 15px #FF3956, 0 0 30px #FF3956,
            0 0 60px #FF3956;
    }

    @media screen and (max-width: 768px) {
        .button-wrapper .btn-flashsale {
            width: 32%;
            margin-bottom: 10px;
        }
    }

    @media screen and (max-width: 576px) {


        .button-wrapper .btn-flashsale {
            height: 40px;
        }

        .button-wrapper .btn-flashsale a {
            font-size: 11px;
        }

        .button-wrapper .btn-flashsale:hover a {
            font-size: 9px;
        }
    }

    @media screen and (max-width: 402px) {
        .button-wrapper .btn-flashsale a {
            font-size: 13px;
        }

        .button-wrapper .btn-flashsale:hover a {
            font-size: 13px;
        }
    }


    .button-wrapper .btn-flashsale.active a {
        letter-spacing: 2px;
        color: #fff;
        background: var(--warna_3);
    }

    .button-wrapper .btn-flashsale.active a::before {
        transform: skewX(45deg) translate(200px);
    }

    .button-wrapper .btn-flashsale.active::before {
        bottom: 0;
        height: 50%;
        width: 80%;
        border-radius: 30px;
        color: #FFAFB7;
    }

    .button-wrapper .btn-flashsale.active::after {
        top: 0;
        height: 50%;
        width: 80%;
        border-radius: 30px;
    }

    .button-wrapper .btn-flashsale.active:nth-child(1)::before,
    .button-wrapper .btn-flashsale.active:nth-child(1)::after,
    .button-wrapper .btn-flashsale.active:nth-child(2)::before,
    .button-wrapper .btn-flashsale.active:nth-child(2)::after,
    .button-wrapper .btn-flashsale.active:nth-child(3)::before,
    .button-wrapper .btn-flashsale.active:nth-child(3)::after {
        background: #9bda5f;
        box-shadow: 0 0 5px #9bda5f, 0 0 15px #9bda5f, 0 0 30px #9bda5f, 0 0 60px #9bda5f;
    }

    @media screen and (max-width: 576px) {
        .button-wrapper .btn-flashsale.active {
            height: 40px;
        }

        .button-wrapper .btn-flashsale.active a {
            font-size: 10px;
            font-weight: 500;
        }

        .button-wrapper .btn-flashsale.active:hover a {
            font-size: 8px;
        }
    }

    @media screen and (max-width: 402px) {
        .button-wrapper .btn-flashsale.active a {
            font-size: 13px;
        }

        .button-wrapper .btn-flashsale.active:hover a {
            font-size: 13px;
        }
    }

    .disabled {
        filter: grayscale(100%);
        pointer-events: none;
        /*cursor: not-allowed;*/
    }

    .flashsale-title {
        text-align: left;
        /*background: var(--warna_3);*/
        background: transparent;
        border-radius: 10px;

    }

    .svg-flashsale {
        margin-left: 5px;
    }

    @media (max-width:555px) {
        .flashsale-title {
            text-align: center;
        }

        .countdown-time {
            font-size: 18px;
            top: -.1rem;
        }

        .flashsaletitle {
            font-size: 18px;
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
        padding: 10px 50px 10px 50px;
        margin-right: 20px;
    }

    .signup-bt {
        background: var(--warna_7);
        border-radius: 10px;
        font-size: 12px;
        color: var(--warna_text);
        font-weight: 600;
        border: none;
        padding: 10px 50px 10px 50px;
        margin-left: 20px;
    }

    @media (max-width:575px) {
        .login-bt {
            padding: 10px 30px 10px 30px;
        }

        .signup-bt {
            padding: 10px 30px 10px 30px;
        }
    }


    .flashsale-title img {
        width: 20%;
        /*padding-bottom: 20px;*/
        /*margin-left: 35px;*/
    }

    .countdownf img {
        width: 15%;
        padding-bottom: 20px;
    }

    @media only screen and (max-width: 600px) {
        .flashsale-title img {
            width: 60%;
            padding-bottom: 5px;
            margin-left: 20px;
        }

        .countdownf img {
            width: 35%;
            padding-bottom: 5px;
        }
    }

    #back-to-top {
        display: block;
        width: 40px;
        height: 45px;
        cursor: pointer;
        font-size: 24px;
        padding: 0 10px 0 10px !important;
        color: #fff;
        /*margin-right: 20px;*/
        background: var(--warna_3);
        border: 1px solid #ccc;
        border-radius: 10%;
        transition: opacity 0.4s;
        align-self: center;
    }

    #back-to-top:hover {
        /*opacity: 0.7;*/
        box-shadow: 0 0 5px #6cae5f, 0 0 15px #6cae5f, 0 0 30px #6cae5f, 0 0 60px #6cae5f;
    }

    .gif-background img {
        position: relative;
        width: 3%;
        top: -3rem;
        z-index: 1;
    }

    @media (min-width:320px) {
        .gif-background img {
            top: -2.1rem;
            width: 8%;
        }
    }

    @media (min-width:575px) {
        .gif-background img {
            top: -3rem;
            width: 9%;
        }
    }

    @media (min-width:768px) {
        .gif-background img {
            top: -4rem;
            width: 8%;
        }
    }

    @media (min-width:1024px) {
        .gif-background img {
            top: -3rem;
            width: 5%;
        }
    }

    @media (min-width:1440px) {
        .gif-background img {
            top: -5rem;
            width: 5%;
        }
    }

    @media (min-width:1870px) {
        .gif-background img {
            top: -3rem;
            width: 3%;
        }
    }

    .gif-background {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        text-align: center;
        height: 10px;
    }

    .games-title-fs {
        display: none;
        padding-top: 1rem;
        font-size: 1rem;
        /*align-content: center;*/
        margin-left: 1rem;
        color: #fff !important;
    }

    @media(max-width:480px) {
        .games-title-fs {
            font-size: 0.8rem;
        }
    }

    .video-background {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 40px;
        left: 0;
        overflow: hidden;
        z-index: -1;
    }

    @media(max-width:480px) {
        #bg-video {
            width: 150%;
            position: absolute;
            bottom: 170px;
        }
    }

    @media(min-width:481px) {
        .video-background {
            position: absolute;
            bottom: 20rem;
            z-index: -9999;
        }
    }

    .loader {
        /*left: 5%;*/
        /*right: 5%;*/
        /*text-align: center;*/
        position: absolute;
        z-index: -999;
    }

    .loader span {
        display: inline-block;
        width: 80px;
        height: 80px;
        margin: -280px 40px 54px -34px;
        background: url(<?= base_url(); ?>/assets/images/leaf-banner-2.png);
        background-size: cover;
        animation: loader 5s infinite linear;
    }

    .loader span:nth-child(odd) {
        width: 40px;
        /* Ukuran lebih kecil untuk daun dengan index ganjil */
        height: 40px;
        animation-name: loader-ccw;
        /* Animasi rotasi berlawanan arah jarum jam */
    }

    .loader span:nth-child(even) {
        width: 70px;
        /* Ukuran lebih besar untuk daun dengan index genap */
        height: 70px;
        animation-name: loader;
        /* Animasi rotasi searah jarum jam */
    }

    .loader span:nth-child(5n+5) {
        animation-delay: 1.3s;
        animation-duration: 6s;
    }

    .loader span:nth-child(3n+2) {
        animation-delay: 1.5s;
        animation-duration: 5.5s;
    }

    .loader span:nth-child(2n+5) {
        animation-delay: 1.7s;
        animation-duration: 5s;
    }

    .loader span:nth-child(3n+10) {
        animation-delay: 2.7s;
        animation-duration: 6.5s;
    }

    .loader span:nth-child(7n+2) {
        animation-delay: 3.5s;
        animation-duration: 7s;
    }

    .loader span:nth-child(4n+5) {
        animation-delay: 5.5s;
        animation-duration: 8s;
    }

    .loader span:nth-child(3n+7) {
        animation-delay: 8s;
        animation-duration: 6s;
    }

    @keyframes loader {
        0% {
            opacity: 1;
            transform: translate(0, 0px) rotateZ(0deg);
        }

        75% {
            opacity: 1;
            transform: translate(150px, 800px) rotateZ(270deg);
        }

        100% {
            opacity: 0;
            transform: translate(200px, 1000px) rotateZ(360deg);
        }
    }

    @keyframes loader-ccw {
        0% {
            opacity: 1;
            transform: translate(0, 0px) rotateZ(0deg);
        }

        75% {
            opacity: 1;
            transform: translate(100px, 700px) rotateZ(-270deg);
        }

        100% {
            opacity: 0;
            transform: translate(100px, 900px) rotateZ(-360deg);
        }
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .loader {
            top: -5rem;
            left: 0 !important;
            right: 0 !important;
        }

        @keyframes loader {
            0% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(50px, 600px) rotateZ(270deg);
            }

            100% {
                width: 50px;
                height: 50px;
                opacity: 0;
                transform: translate(50px, 800px) rotateZ(360deg);
            }
        }

        @keyframes loader-ccw {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(50px, 600px) rotateZ(-270deg);
            }

            100% {
                width: 30px;
                height: 30px;
                opacity: 0;
                transform: translate(50px, 800px) rotateZ(-360deg);
            }
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .loader {
            top: -5rem;
            left: 15% !important;
            right: 10% !important;
        }

        @keyframes loader {
            0% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(100px, 600px) rotateZ(270deg);
            }

            100% {
                width: 50px;
                height: 50px;
                opacity: 0;
                transform: translate(100px, 800px) rotateZ(360deg);
            }
        }

        @keyframes loader-ccw {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(100px, 600px) rotateZ(-270deg);
            }

            100% {
                width: 30px;
                height: 30px;
                opacity: 0;
                transform: translate(100px, 800px) rotateZ(-360deg);
            }
        }
    }

    @media (min-width: 1025px) and (max-width: 1440px) {
        .loader {
            top: -5rem;
            left: 15% !important;
            right: 10% !important;
        }

        @keyframes loader {
            0% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 50px;
                height: 50px;
                opacity: 1;
                transform: translate(100px, 600px) rotateZ(270deg);
            }

            100% {
                width: 50px;
                height: 50px;
                opacity: 0;
                transform: translate(100px, 800px) rotateZ(360deg);
            }
        }

        @keyframes loader-ccw {
            0% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(0, 0px) rotateZ(0deg);
            }

            75% {
                width: 30px;
                height: 30px;
                opacity: 1;
                transform: translate(100px, 600px) rotateZ(-270deg);
            }

            100% {
                width: 30px;
                height: 30px;
                opacity: 0;
                transform: translate(100px, 800px) rotateZ(-360deg);
            }
        }
    }

    #bg-leaf-bottom-left {
        display: none;
    }

    #bg-leaf-bottom-right {

        display: none;
    }

    .talent-title {
        width: 40%;
    }

    .swiper-banner {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 0 60px 60px 60px;
    }

    .news-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 0 60px 60px 60px;
    }

    .recipe-container {
        background: transparent;
        /*box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);*/
        /*backdrop-filter: blur(20px);*/
        /*-webkit-backdrop-filter: blur(20px);*/
        /*border: 1px solid rgba(255, 255, 255, 0.3);*/
        border-radius: 25px;
        padding: 10px 0 0 0;
        width: min(1440px, 100%);
    }

    .recipe-container h1 {
        font-size: 2rem;
        font-weight: 600;
        text-align: center;
        color: #dda3b6;
        margin: 20px 0 40px;
    }

    .swiper {
        width: 100%;
        height: 100%;
        margin-bottom: 30px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .swiper-scrollbar {
        --swiper-scrollbar-bottom: 0;
        --swiper-scrollbar-drag-bg-color: #89F473;
        --swiper-scrollbar-size: 5px;
    }

    @media (max-width: 1200px) {
        .swiper {
            width: 100%;
        }
    }

    @media (max-width: 900px) {
        #recipes {
            padding: 60px 80px;
        }

        .swiper {
            width: 50%;
        }
    }

    @media (max-width: 765px) {
        .swiper {
            width: 70%;
        }
    }

    .post {
        max-width: 800px;
        font-size: 1rem;
        font-weight: 500;
        color: var(--clr-text);
        /*background: rgba(233, 244, 227, 0.8);*/
        background: rgb(218 237 207 / 80%);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 16px 16px 0;
        margin-bottom: 16px;
        margin-left: 8px;
    }

    .post-img {
        width: 100%;
        /*max-width: 480px;*/
        object-fit: cover;
        overflow: hidden;
        border-radius: 6px;
        user-select: none;
        /*pointer-events: none;*/
    }

    .post-body {
        display: grid;
        /*grid-template-columns: 15% 60% 20%;*/
        align-items: center;
        gap: 8px;
        padding: 15px 0;
        cursor: default;
    }

    .post-name {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 2px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 275px;
    }

    .post-author {
        width: fit-content;
        font-size: 0.8rem;
        font-weight: 600;
        opacity: 0.6;
        color: var(--clr-text);
    }

    .post-avatar {
        width: 40px;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 5px;
        cursor: pointer;
    }

    .post-actions {
        position: relative;
    }

    .post-actions-content {
        position: absolute;
        bottom: 130%;
        right: 0;
        padding: 8px;
        border-radius: 8px;
        background: rgba(172, 172, 172, 0.2);
        /*backdrop-filter: blur(10px);*/
        /*-webkit-backdrop-filter: blur(10px);*/
        box-shadow: 2px 2px 10px 2px hsl(0, 0%, 0%, 0.25);
        transition: opacity 0.25s, scale 0.25s;
        transform-origin: bottom right;
    }

    .post-actions-content[data-visible="false"] {
        pointer-events: none;
        opacity: 0;
        scale: 0;
    }

    .post-actions-content[data-visible="true"] {
        pointer-events: unset;
        scale: 1;
        opacity: 1;
    }

    .post-actions-content li {
        padding: 0.5rem 0.65rem;
        border-radius: 0.25rem;
        list-style: none;
    }

    .post-actions-content li:is(:hover, :focus-within) {
        background-color: rgba(248, 132, 169, 0.7);
    }

    .post-actions-link {
        width: max-content;
        display: grid;
        grid-template-columns: 1rem 1fr;
        align-items: center;
        gap: 0.6rem;
        color: inherit;
        text-decoration: none;
        cursor: pointer;
    }

    .post-like {
        text-decoration: none;
        color: var(--clr-text);
        margin-right: 5px;
        font-size: 1.1rem;
        opacity: 0.65;
        border-radius: 50%;
        overflow: hidden;
        transition: all 0.35s ease;
    }

    .post-actions-controller {
        border: 0;
        background: none;
        color: var(--clr-text);
        cursor: pointer;
        opacity: 0.65;
    }

    .post-like:hover,
    .post-actions-controller:hover {
        opacity: 1;
    }

    .post-like:focus {
        outline: none;
    }

    .post-like.active {
        color: rgb(255, 0, 0);
        opacity: 1;
        transform: scale(1.2);
    }

    #news-title {
        width: 40%;
    }

    @media (max-width:480px) {

        #news-title {
            width: 55%;
        }
    }

    @media (max-width: 550px) {
        #recipes {
            padding: 40px 40px;
        }
    }

    @media (max-width:550px) {
        .swiper-banner {
            padding: 0 10px 10px 10px;
        }

        .swiper {
            width: 100%;
        }

        .post {
            margin-left: 0 !important;
        }

        .button-container-more a {
            font-size: .9rem;
            font-weight: 600;
        }

        .post-name {
            font-size: .8rem;
            max-width: 170px;
        }

        .post-author {
            font-size: .75rem;
            margin: 0 !important;
        }


    }

    .button-container-more {
        display: flex;
        position: relative;
        top: -1rem;
    }

    .button-container-more a {
        color: #fff !important;
        background: var(--warna_3);
        padding: 10px;
        border-radius: 15px;
        font-size: 1rem;
        font-weight: 600;
    }

    @media (max-width:900px) {
        .swiper-banner {
            padding: 0 10px 10px 10px;
        }

        .swiper {
            width: 100%;
        }

        .post-name {
            font-size: 1rem;
            max-width: 200px;
        }

    }

    .modal-container-3 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
        opacity: 0;
        visibility: hidden;
        transform: scale(1, 1);
        transition: 0.5s;
        z-index: 99;
        background: rgba(0, 0, 0, 0.1) !important;
    }

    body.open-modal-3 .modal-container-3 {
        visibility: visible;
        opacity: 1;
        animation: modal-container-3-in 1s both;
    }

    .modal-window-3 {
        position: fixed;
        top: 30%;
        left: 50%;
        background: #ffffff;
        color: #000000;
        padding: 10px 10px;
        width: 450px;
        max-height: 40vh;
        overflow-y: auto;
        height: auto;
        border-radius: 12px;
        translate: -50% 0%;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
        z-index: 999;
        box-shadow: 0 0 0 5px #ffffff;
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .modal-window-3 {
            width: 400px;
        }
    }

    body.open-modal-3 .modal-window-3 {
        opacity: 1;
        visibility: visible;
        animation: modal-window-3-in 1s;
    }

    body.closed-modal-3 .modal-window-3 {
        opacity: 0;
        visibility: hidden;
        translate: -50% -50%;
    }

    @keyframes modal-container-3-in {
        0% {
            scale: 0 0.005;
        }

        33% {
            scale: 1 0.005;
        }

        66%,
        100% {
            scale: 1 1;
        }
    }

    @keyframes modal-window-3-in {

        0%,
        66% {
            opacity: 0;
            visibility: hidden;
            translate: -50% -30%;
        }

        100% {
            opacity: 1;
            visibility: visible;
        }
    }

    .modal-container-5 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
        opacity: 0;
        visibility: hidden;
        transform: scale(1, 1);
        transition: 0.5s;
        z-index: 99;
        background: rgba(0, 0, 0, 0.1) !important;
    }

    body.open-modal-5 .modal-container-5 {
        visibility: visible;
        opacity: 1;
        animation: modal-container-5-in 1s both;
    }

    .modal-window-5 {
        position: fixed;
        top: 30%;
        left: 50%;
        background: #ffffff;
        color: #000000;
        padding: 10px 10px;
        width: 450px;
        max-height: 40vh;
        overflow-y: auto;
        height: auto;
        border-radius: 12px;
        translate: -50% 0%;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
        z-index: 999;
        box-shadow: 0 0 0 5px #ffffff;
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .modal-window-5 {
            width: 400px;
        }
    }

    body.open-modal-5 .modal-window-5 {
        opacity: 1;
        visibility: visible;
        animation: modal-window-5-in 1s;
    }

    body.closed-modal-5 .modal-window-5 {
        opacity: 0;
        visibility: hidden;
        translate: -50% -50%;
    }

    @keyframes modal-container-5-in {
        0% {
            scale: 0 0.005;
        }

        33% {
            scale: 1 0.005;
        }

        66%,
        100% {
            scale: 1 1;
        }
    }

    @keyframes modal-window-5-in {

        0%,
        66% {
            opacity: 0;
            visibility: hidden;
            translate: -50% -30%;
        }

        100% {
            opacity: 1;
            visibility: visible;
        }
    }


    .infl-body {
        position: relative;
        top: 1rem;
        display: flex;
        flex-wrap: wrap;
    }

    .infl-body-item {
        flex: 0 0 50%;
        box-sizing: border-box;
        padding: 10px;
        justify-content: space-evenly;
    }

    .img-infl {
        width: 85%;
    }

    .infl-item {
        font-weight: 600;
        font-size: 1.2rem;
    }

    .product-tile__clip-path-infl[data-v-16b318a8] {
        -webkit-clip-path: polygon(15% 0%, 100% 0, 100% 50%, 100% 100%, 0 100%, 0% 35%);
        background: linear-gradient(45deg, #8CBF4B, #4C921E, #227400);
        width: 85%;
        height: 65px;
        margin-top: -15px;
        border-radius: 0 0 10px 10px;
        position: relative;
        /*left: 8%;*/
    }

    /* Mobile Medium (min-width: 321px and max-width: 480px) */
    @media (min-width: 320px) and (max-width: 425px) {
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
            content: '';
            position: absolute;
            left: 12px;
            width: 3px;
            height: 35%;
            background: #F9D001;
            transform: rotate(54deg);
            border-radius: 7px 0 7px 0;
            top: 1px;
        }
    }

    /* Mobile Large (min-width: 481px and max-width: 768px) */
    @media (min-width: 426px) and (max-width: 768px) {
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
            content: '';
            position: absolute;
            left: 15px;
            width: 5px;
            height: 40%;
            background: #F9D001;
            transform: rotate(43deg);
            border-radius: 10px 0 10px 0;
            top: 1px;
        }
    }

    /* Tablet (min-width: 769px and max-width: 1024px) */
    @media (min-width: 769px) and (max-width: 1024px) {
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
            content: '';
            position: absolute;
            left: 16px;
            width: 5px;
            height: 40%;
            background: #F9D001;
            transform: rotate(46deg);
            border-radius: 12px 0 12px 0;
            top: 1px;
        }
    }

    /* Laptop (min-width: 1025px and max-width: 1440px) */
    @media (min-width: 1025px) and (max-width: 1440px) {
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
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
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
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
        .product-tile__clip-path-infl[data-v-16b318a8]::before {
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
        .product-tile__clip-path-infl[data-v-16b318a8] {
            -webkit-clip-path: polygon(15% 0%, 100% 0, 100% 50%, 100% 100%, 0 100%, -10% 50%);
            background: linear-gradient(45deg, #8CBF4B, #4C921E, #227400);
            width: 85%;
            height: 50px;
            /*left: 8%;*/
        }

        .product-tile__clip-path-infl img.card-img {
            width: 50% !important;
            margin-top: 10px;
        }

    }

    .product-tile__clip-path-infl img.card-img {
        position: absolute;
        width: 50%;
        right: 5px;
        z-index: -1;
        opacity: 0.5;
    }

    .card-infl {
        margin-left: 7%;
        width: 100%;
        filter: drop-shadow(7px 7px 10px #333333);
    }

    .card-title2-infl {
        min-height: 35px !important;
        margin: 5px 5px 5px 5px !important;
        font-weight: 700 !important;
        font-size: .875rem;
        color: white;
        padding: 8px 16px 16px 30px;
        font-family: 'Poppins', sans-serif !important;
        letter-spacing: 2px;
        text-align: center;
    }

    @media (max-width:480px) {
        .card-title2-infl {
            min-height: 35px !important;
            margin: 5px 5px 5px 5px !important;
            font-weight: 600 !important;
            font-size: .7rem;
            color: white;
            padding: 8px 16px 16px 30px;
            letter-spacing: 1px;
        }
    }
</style>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>


<div class="mb-4" style="padding-top: 10px;margin-bottom: 1rem !important; background:red">
    <div class="pt-0" style="">
        <div class="container banner-pad">
            <div class="loader">
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
                <span></span><span></span><span></span><span></span><span></span>
            </div>
            <!-- Skeleton Loading Banner -->
            <div class="banner-skeleton">
                <!-- Placeholder gambar atau teks -->
            </div>
            <div class="rev_slider">
                <?php $no = 1;
                foreach ($banner as $loop): ?>
                    <a class="rev_slide" href="<?= $loop['url']; ?>">
                        <img style="border-radius: 16px;" class="d-block w-100 test"
                            src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt="First slide">
                    </a>
                <?php $no++;
                endforeach ?>
            </div>
        </div>
    </div>
</div>

<!-- Start Flashsale -->
<div class="container mb-3 mt-3">
    <div class="flashsale-title">
        <img src="<?= base_url(); ?>/assets/images/flashsale-part-3.png">
        <h5 style="display: inline-block;" id="expired_time_flash_sale" class="countdown-time"></h5>
    </div>
    <div class="swiper-container two">
        <div class="swiper-wrapper">
            <?php foreach ($flashsale as $flashsales) : ?>
                <div class="swiper-slide slide-container <?= ($flashsales['limitflashsale'] == 0) ? 'sold-out' : ''; ?>" id="flashsale_card_<?= $flashsales['id']; ?>">
                    <div class="slide-content">
                        <?php if ($flashsales['limitflashsale'] > 0) : ?>
                            <a href="<?= base_url() . '/games/' . $flashsales['game_slug'] . '?diamonds=' . $flashsales['product_id'] . '#' . $flashsales['product_id']; ?>" class="product-link">
                            <?php else : ?>
                                <a class="product-link">
                                <?php endif; ?>

                                <!-- Konten slide -->
                                <div style="background: linear-gradient(180deg, rgba(0,0,0,.00) 0%, #000), url(<?= base_url(); ?>/assets/images/flashsale/<?= $flashsales['image']; ?>);background-size: cover;" alt="slide <?= $no; ?>" class="card-flashsale">
                                    <div class="row swiper-wrapper">
                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $flashsales['game_image']; ?>" alt="flashsales <?= $title; ?> <?= $flashsales['title']; ?>" class="mb-2 img-games-fs" style="display: block; border-radius: 999px !important;object-position: left;border: 1px solid #fff; margin-left:10px">
                                        <p class="games-title-fs"> <?= $flashsales['game_game']; ?></p>
                                    </div>
                                    <div style="background: linear-gradient(45deg, rgba(140, 191, 75, 0.7), rgba(76, 146, 30, 0.7), rgba(34, 116, 0, 0.7))" alt="slide <?= $no; ?>" class="card-flashsale-bottom">
                                        <div class="col-12 pb-2 justify-between flex-col d-flex">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img-fs" style="position:absolute; width:30%; right:-10px; opacity:0.5">
                                            <p class="produk-flash-sale"><?= $flashsales['title']; ?></p>
                                            <div class="bg-flashsale-up">
                                                <p class="price-cor-fs">Rp <?= number_format($flashsales['discount_price'], 0, ',', '.'); ?></p>
                                            </div>
                                            <div class="bg-flashsale-down">
                                                <p class="price-fs" style="color:#EFFF39">Rp <?= number_format($flashsales['price'], 0, ',', '.'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="diskon-flashsale <?= ($flashsales['limitflashsale'] > 0) ? 'show-animation' : ''; ?>">
                                    <span class="limit-text" style="color:#fff;">
                                        <?php if ($flashsales['limitflashsale'] > 0) : ?>
                                            Tersisa : <span class="fire-effect"><?= $flashsales['limitflashsale']; ?> </span>
                                        <?php else : ?>
                                            Sold Out !
                                        <?php endif; ?>
                                    </span>
                                </div>
                                </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<!-- End Flashsale -->
<div class="container">
    <div class="PB-5 pt-5" style="border-radius: 10px;padding: 10px; overflow: hidden;margin-top: -50px;">
        <ul class="nav nav-pills tab-category gap-2 pb-2" id="pills-tab" role="tablist"
            style="flex-wrap: nowrap;justify-content: flex-start;overflow-y: hidden; padding-bottom: 0px; margin-top:30px">
            <li class="nav-item">
                <a style="white-space: pre;font-weight: 600;" class="nav-link active" id="pills-all-tab"
                    data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all"
                    aria-selected="true">All</a>
            </li>
            <?php $no = 1;
            foreach ($games as $game): ?>
                <?php if ($game['category'] !== 'Flashsale' && $game['category'] !== 'Influencer' && $game['category'] !== 'Games Populer' && $game['category'] !== 'Joki Rank'): ?>
                    <li class="nav-item">
                        <a style="white-space: pre;font-weight: 600;" class="nav-link "
                            id="pills-<?= url_title($game['category'], '-', true); ?>-tab" data-toggle="pill"
                            href="#pills-<?= url_title($game['category'], '-', true); ?>" role="tab"
                            aria-controls="pills-<?= url_title($game['category'], '-', true); ?>"
                            aria-selected="true"><?= $game['category']; ?></a>
                    </li>
                <?php endif; ?>
            <?php $no++;
            endforeach ?>
        </ul>

        <a class="d-flex leaderboard-flex align-items-center mt-2" href="<?= base_url(); ?>/leaderboard" style="display:none !important;">

            <p class="mb-0 leaderboard d-flex">
                <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">Sultan Hidden Game
                <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">
            </p>
        </a>
    </div>
</div>



<div class="tab-content" id="pills-tabContent">
    <!-- Tab All -->
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
        <?php foreach ($games as $game): ?>
            <div class="container pt-2 pb-2">
                <div class="row">
                    <div class="col-12">
                        <?php if ($game['category'] != 'Influencer' && $game['category'] != 'Games Populer' && $game['category'] != 'Joki Rank'): ?>
                            <h5 class="font-proximanovabldddd" style="font-size: 28px;color:var(--warna_2) !important; font-weight: 700; text-transform:uppercase;"><?= $game['category']; ?></h5>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div class="container">
                    <div class="row game">

                        <!-- Influencer Produk -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/influencer-2.png" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JASA INFLUENCER</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button id="toggleModal3Button" class="btn btn-transparent" onclick="toggleModal3()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Joki Produk -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/joki.webp" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JOKI MOBILE LEGENDS</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button id="toggleModal5Button" class="btn btn-transparent" onclick="toggleModal5()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Modal Influencer -->
                        <div class="modal-container-3" onclick="toggleModal3()"></div>
                        <div class="modal-window-3 hidden-category" id="modal-content-3">
                            <h2 style="text-align:center">
                                <img src="<?= base_url(); ?>/assets/images/talent-title.png" class="talent-title">
                            </h2>
                            <div class="infl-body">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['category'] == 'Influencer' && $loop['status'] == 'On'): ?>
                                        <div class="infl-body-item">
                                            <div style="margin-bottom: 0px;" class="card-infl">
                                                <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>">
                                                    <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-infl" style="border-radius: 10px;">
                                                    <div data-v-16b318a8="" class="product-tile__clip-path-infl">
                                                        <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                        <div class="card-title2-infl" style="font-weight:bold;"><?= $loop['games']; ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Modal Joki -->
                        <div class="modal-container-5" onclick="toggleModal5()"></div>
                        <div class="modal-window-5 hidden-category" id="modal-content-5">
                            <div class="infl-body">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['category'] == 'Joki Rank' && $loop['status'] == 'On'): ?>
                                        <div class="infl-body-item">
                                            <div style="margin-bottom: 0px;" class="card-infl">
                                                <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>">
                                                    <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-infl" style="border-radius: 10px;">
                                                    <div data-v-16b318a8="" class="product-tile__clip-path-infl">
                                                        <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                        <div class="card-title2-infl" style="font-weight:bold;"><?= $loop['games']; ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <!-- Start Game -->

                        <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On' && $loop['category'] != 'Influencer' && $game['category'] != 'Joki Rank' && $game['category'] != 'Games'): ?>
                                <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                    <div class="card mb-3" style="">
                                        <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="product_list">
                                            <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>"
                                                    class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                                <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                                                    <div class="diskon">-<?= $loop['discount']; ?>%</div>
                                                <?php endif; ?>
                                                <div data-v-16b318a8="" class="product-tile__clip-path">
                                                    <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                    <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                                                </div>
                                                <div class="card-subtitle" bis_skin_checked="1"></div>
                                                <div class="card-topup" bis_skin_checked="1" hidden>
                                                    <div class="btn-topup" style="font-size: 0.60rem!important;"
                                                        bis_skin_checked="1"> TOP UP </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <!-- End Of Game -->

                        <!-- Start Load more -->
                        <?php if ($game['category'] === 'Games'): ?>
                            <div class="row game" id="gamesContainer">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['status'] == 'On' && $loop['category'] != 'Influencer' && $game['category'] != 'Joki Rank' && $game['category'] != 'Games Populer'): ?>
                                        <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                            <div class="card mb-3" style="">
                                                <a href="<?= base_url(); ?>games/<?= $loop['slug']; ?>" class="product_list">
                                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                                        <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                                                            <div class="diskon">-<?= $loop['discount']; ?>%</div>
                                                        <?php endif; ?>
                                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                                                        </div>
                                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        <!-- End Load more And Show More -->
                        <?php if ($game['category'] === 'Games'): ?>
                            <div class="text-center mt-2">
                                <!-- Ubah id button menjadi "showless" dan "loadmore" -->
                                <button class="btn btn-secondary" id="showless" style="display:none;">Show Less</button>
                                <button style="color:#fff; background-color:rgba(112, 176, 93, 0.9);" class="btn " id="loadmore">Load more</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Start Category Game -->

    <?php $no = 1;
    foreach ($games as $game): ?>
        <div class="tab-pane fade " id="pills-<?= url_title($game['category'], '-', true); ?>" role="tabpanel"
            aria-labelledby="pills-<?= url_title($game['category'], '-', true); ?>-tab">
            <div class="container pt-4 pb-4">
                <div class="row">
                    <div class="col-12">
                        <h5 class="font-proximanovabldddd" style="font-size: 28px;color:var(--warna_2) !important; font-weight: 700; text-transform:uppercase;"><?= $game['category']; ?></h5>

                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div class="container">
                    <div class="row game">

                        <!-- Card Influencer -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/influencer-2.png"
                                            class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JASA INFLUENCER</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button class="btn btn-transparent" onclick="toggleModal4()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Card Joki -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/joki.webp"
                                            class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JOKI MOBILE LEGENDS</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button class="btn btn-transparent" onclick="toggleModal6()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On'): ?>
                                <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                    <div class="card mb-3 " style="">
                                        <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="product_list">
                                            <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>"
                                                    class="img-fluid img-games" style="border-radius: 10px; display: block;">
                                                <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                                                    <div class="diskon">-<?= $loop['discount']; ?>%</div>
                                                <?php endif; ?>
                                                <div data-v-16b318a8="" class="product-tile__clip-path">
                                                    <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                    <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                                                </div>
                                                <div class="card-subtitle" bis_skin_checked="1"></div>
                                                <div class="card-topup" bis_skin_checked="1" hidden>
                                                    <div class="btn-topup" style="font-size: 0.60rem!important;"
                                                        bis_skin_checked="1"> TOP
                                                        UP </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $no++;
    endforeach ?>

    <!-- End Of Category Game -->

    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="animation: newsTitle 3s infinite;">
            <img src="<?= base_url(); ?>/assets/images/news-title.png" style="justify-content:center" id="news-title">
        </div>
    </div>
    <section class="swiper-banner">
        <div class="recipe-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($post as $loop): ?>
                        <?php if (strpos($loop['category'], 'Popular') !== false): ?>
                            <div class="swiper-slide post">
                                <a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>" class="post-link">
                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="post-img" href="<?= base_url(); ?>/post/<?= $loop['id']; ?>">
                                    <div class="post-body">
                                        <div class="post-detail">
                                            <h2 class="post-name"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></h2>
                                            <p class="post-author">Hiddengame - <i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="button-container-more">
            <a type="button" href="<?= base_url(); ?>/postingan">Selengkapnya</a>
        </div>
    </section>
</div>

<div class="mb-5">

    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div style="border-radius:25px;padding:15px;">-->
    <!--            <h5 class="font-proximanovabl" style="font-size: 28px; color:var(--warna_7) !important;text-transform: uppercase;">PROMO </h5>-->
    <!--            <div class="d-flex element-scroll" style="overflow-x: scroll;">-->
    <!--                <?php foreach ($post as $loop): ?>-->
    <!--                <div class="col-sm-12 col-lg-4 col-12 text-center" style="display: grid;">-->
    <!--                    <div class="card tes-card"-->
    <!--                        style="margin-bottom: 2.5rem!important;margin-top: 1.5rem;padding: 0.4rem !important;background: var(--warna_8);">-->
    <!--                        <div href="<?= base_url(); ?>/post/<?= $loop['id']; ?>" class="category-artikel">-->
    <!--                            <div class="card-game pb-3">-->
    <!--                                <div class="img-promo">-->
    <!--                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>"-->
    <!--                                        class="img-fluid">-->
    <!--                                </div>-->
    <!--                                <h5 style="padding: 18px 18px 18px 18px;text-align: left;margin-bottom: 0rem;" class="text-white">-->
    <!--                                    <?= $loop['title']; ?></h5>-->
    <!--                                <div class="promo text-left text-white" style="padding: 0px 18px 0px 18px;color:var(--warna_hitam);">-->
    <!--                                    <?= htmlspecialchars_decode($loop['content']); ?>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <?php endforeach ?>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<div class="container" style="padding-bottom: 100px;" hidden>
    <div data-v-3917c69b="" class="home__feeds-items">
        <!---->
        <!---->
        <!---->
        <!---->
        <div data-v-24b86abb="" data-v-3917c69b="" class="coda-about__container">
            <div data-v-24b86abb="" class="coda-about__content">
                <h1 data-v-24b86abb="" class="coda-about__header"><?= $title; ?></h1>
                <h2 data-v-24b86abb="" class="coda-about__sub-header"><?= $title; ?>: <?= $web['title']; ?></h2>
                <p data-v-24b86abb="" class="coda-about__short-description">Setiap bulannya, jutaan gamers menggunakan
                    <?= $title; ?> untuk melakukan pembelian kredit game dengan lancar: tanpa registrasi ataupun log-in,
                    dan kredit permainan akan ditambahkan secara instan. Top-up Mobile Legends, Free Fire, Ragnarok M,
                    dan berbagai game lainnya!</p>
                <article data-v-24b86abb="" class="coda-about__card-group">
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Quick icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Bayar dalam hitungan detik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Hanya dibutuhkan beberapa detik
                                saja untuk menyelesaikan pembayaran di <?= $title; ?> karena situs kami berfungsi dengan
                                baik dan mudah untuk digunakan.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Delivery icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Pengiriman instan</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Ketika kamu melakukan top-up di
                                <?= $title; ?>, item atau barang yang kamu beli akan selalu dikirim ke akun kamu secara
                                instan dan cepat, tanpa tertunda.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Payments icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Metode pembayaran terbaik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Kami menawarkan begitu banyak
                                pilihan pembayaran mulai dari potong pulsa, e-wallet, bank transfer, dan pembayaran di
                                mini market terdekat.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Customer Support"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Layanan Pelanggan</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Tim support siap membantu Anda
                                dari pukul 9 pagi hingga 10 malam, 7 hari seminggu. Kirimkan <a
                                    href="https://id.support.codashop.com/hc/id-id/requests/new" target="_blank">
                                    Support Request Form </a> dan kami akan segera menghubungi Anda!</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Promo icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Promosi-promosi menarik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Penggemar game dapat bergantung
                                pada HIDDENGAME karena kami memberikan penawaran menarik, diskon dan kode item dari promosi
                                game yang disukai kamu.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<div class="container pt-4 pb-4" style="padding: 1.5rem !important;" hidden>
    <div class="row">
        <div class="row col-sm-6 col-12">
            <h5 style="font-size: 40px; color:#292929;text-transform: uppercase;">Ikuti Kami</h5>
            <p><br>Dapatkan Informasi Dan Promo Menarik Dengan Cara Mengikuti Media Sosial kami.</p>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/instagram.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['ig']; ?>">
                <a href="<?= $sm['ig']; ?>" class="text-center mb-4"
                    style="font-weight:bold;font-size:17px">Instagram</a>
            </div>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/tiktok.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['tw']; ?>">
                <a href="<?= $sm['tw']; ?>" class="text-center mb-4" style="font-weight:bold;font-size:17px">Tiktok</a>
            </div>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/youtube.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['yt']; ?>">
                <a href="<?= $sm['yt']; ?>" class="text-center mb-4" style="font-weight:bold;font-size:17px">Youtube</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal111" aria-labelledby="modalInformationsLabel" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content " style="background-color: #06142f !important;box-shadow:0 0 2rem #000000 !important">
            <div class="modal-body">
                <div class="row" id="textInfo">
                    <div class="col-12 mb-2">
                        <div class="card"
                            style="border:1px solid #4b4d50;background-color: #484d52;box-shadow:0px 0px 0px #e7e7e7 !important">
                            <div class="card-header">
                                <h5 style="color: #fff;font-size:1.25rem">Perhatian !</h5>
                            </div>
                            <div class="card-body pb-1" style="background-color: #06142f !important">
                                <div class="col-12" style="text-align:center">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="70%" class="mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: right!important;">
                        <button type="submit" data-dismiss="modal"
                            style="font-size:12px;background-color: #fff !important;color:#06142F !important;padding:10px;font-size:12px;font-weight:500"
                            class="close btn btn-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($popup['status'] == 'On'): ?>
    <div class="modal fade" id="PopUpText" tabindex="-1" role="dialog" aria-labelledby="PopUpTextTitle" aria-hidden="true"
        style="z-index: 99999; margin-top: -35px;">
        <div class="modal-dialog modal-dialog-centered" role="document" style="justify-content:center">
            <div class="modal-content shadow-lg" style="background-color: #fff; width:80%; border-radius:18px">
                <div class="btn-close-popup" style="text-align:right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:0;background: #fff;color: red; width:10%; justify-content:flex-end; border-radius:100px"><i class="fa fa-times text-red" aria-hidden="true" style="font-size:1.3rem; margin-top:10px; "></i></button>
                </div>
                <div class="modal-body text-white" style="font-size: 13px; padding:.75rem !important">
                    <?php if (!empty($popup['image']) && $popup['image'] !== '-'): ?>
                        <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/<?= $popup['image']; ?>"
                            width="100%" class="text-center img-fluid" style="border-radius: 5px;margin-bottom:20px">
                    <?php endif; ?>
                </div>
                <?php if ($users === false): ?>
                    <div class="modal-footer" style="justify-content:center !important">
                        <div class="popup-bt">
                            <a href="<?= base_url(); ?>/login">
                                <button type="button" class="login-bt">Login</button>
                            </a>
                            <a href="<?= base_url(); ?>/register">
                                <button type="button" class="signup-bt">Daftar</button>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($popup['status'] == 'On'): ?>
    <!-- Modal -->
    <!--<div class="modal fade" id="PopUpText" tabindex="-1" role="dialog" aria-labelledby="PopUpTextTitle" aria-hidden="true"-->
    <!--    style="z-index: 99999; margin-top: -35px;">-->
    <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--        <div class="modal-content shadow-lg" style="background-color: var(--warna_2);">-->
    <!--            <div class="modal-header" style="background-color: var(--warna_2);">-->
    <!--                <h5 class="modal-title text-white"><b><?= $popup['title']; ?></b></h5>-->
    <!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"-->
    <!--                    style="border:0;background: var(--warna_2);color: #fff;"><i class="fa fa-times text-white" aria-hidden="true"></i></button>-->
    <!--            </div>-->
    <!--            <div class="modal-body text-white" style="font-size: 13px;">-->
    <!--                <?php if (!empty($popup['image']) && $popup['image'] !== '-'): ?>-->
    <!--                    <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/<?= $popup['image']; ?>"-->
    <!--                        width="100%" class="text-center img-fluid" style="border-radius: 5px;margin-bottom:20px">-->
    <!--                <?php endif; ?>-->
    <!--                <?= $popup['desc']; ?>-->
    <!--                <span style="font-size: 11px; color: rgba(37, 99, 235, 1);"><?= $popup['date']; ?></span>-->
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <button type="button" id="popupButton" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Saya sudah-->
    <!--                    membaca</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
<?php endif ?>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>


<script>
    $(document).ready(function() {
        let offset = <?= $limit; ?>;
        let limit = 12;
        let new_limit = limit - offset;

        const category = 'Games'; // Anda dapat mengganti ini sesuai kebutuhan

        $('#loadmore').click(function() {
            $.ajax({
                url: '<?= base_url('home/loadMoreGames') ?>',
                method: 'POST',
                data: {
                    category: category,
                    offset: offset
                },
                success: function(response) {
                    // Append new games to the existing list
                    $('#gamesContainer').append(response.html);
                    // Update offset
                    offset = response.new_offset;
                    $('html, body').animate({
                        scrollTop: $('#gamesContainer div.col-sm-3:last').offset().top
                    }, 1000);
                    // Check if end_of_games is true, hide the 'Load More' button if so
                    if (response.end_of_games) {
                        $('#loadmore').hide();
                    }
                    // Show 'Show Less' button
                    $('#showless').show();
                }
            });
        });

        $('#showless').click(function() {
            $.ajax({
                url: '<?= base_url('home/showLessGames') ?>',
                method: 'POST',
                data: {
                    category: category
                },
                success: function(response) {
                    // console.log('res', response);
                    $('#gamesContainer').html(response.html); // Ganti isi container dengan data awal
                    offset = response.new_offset;
                    $('html, body').animate({
                        scrollTop: $('#gamesContainer').offset().top
                    }, 1000);

                    $('#loadmore').show(); // Tampilkan tombol Load More
                    $('#showless').hide(); // Sembunyikan tombol Show Less
                }
            });
        });
    });
</script>

<script>
    const toggleModal3 = () => {
        const bodyClassList = document.body.classList;
        if (bodyClassList.contains("open-modal-3")) {
            bodyClassList.remove("open-modal-3");
            bodyClassList.add("closed-modal-3");
        } else {
            resetModalClasses();
            bodyClassList.remove("closed-modal-3");
            bodyClassList.add("open-modal-3");
        }
        document.body.classList.toggle("no-scroll");
        document.getElementById('modal-content-3').classList.toggle('hidden-category');
    };

    const toggleModal4 = () => {
        // Pindah ke tab "all"
        document.querySelector('#pills-all-tab').click();

        // Scroll ke bagian modal dan aktifkan modal
        setTimeout(() => {
            document.querySelector('#toggleModal3Button').click();
        }, 100); // Menunda sedikit agar perpindahan tab sempat selesai
    };

    const toggleModal5 = () => {
        const bodyClassList = document.body.classList;
        if (bodyClassList.contains("open-modal-5")) {
            bodyClassList.remove("open-modal-5");
            bodyClassList.add("closed-modal-5");
        } else {
            resetModalClasses();
            bodyClassList.remove("closed-modal-5");
            bodyClassList.add("open-modal-5");
        }
        document.body.classList.toggle("no-scroll");
        document.getElementById('modal-content-5').classList.toggle('hidden-category');
    };

    const toggleModal6 = () => {
        // Pindah ke tab "all"
        document.querySelector('#pills-all-tab').click();

        // Scroll ke bagian modal dan aktifkan modal
        setTimeout(() => {
            document.querySelector('#toggleModal5Button').click();
        }, 100); // Menunda sedikit agar perpindahan tab sempat selesai
    };

    const resetModalClasses = () => {
        const bodyClassList = document.body.classList;
        bodyClassList.remove("open-modal-3", "closed-modal-3", "open-modal-5", "closed-modal-5");
        document.getElementById('modal-content-3').classList.add('hidden-category');
        document.getElementById('modal-content-5').classList.add('hidden-category');
    };
</script>

<script>
    var swiper = new Swiper(".swiper", {
        grabCursor: true,
        speed: 400,
        loop: true,
        mousewheel: {
            invert: false,
        },
        scrollbar: {
            el: ".swiper-scrollbar",
            draggable: true,
        },
        slidesPerView: 2,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
            700: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            900: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        autoplay: {
            delay: 3000, // 2000ms = 2 detik
            disableOnInteraction: false,
        },
    });
</script>

<script>
    var rev = $('.rev_slider');
    rev.on('init', function(event, slick, currentSlide) {
        var cur = $(slick.$slides[slick.currentSlide]),
            next = cur.next(),
            prev = cur.prev();
        prev.addClass('slick-sprev');
        next.addClass('slick-snext');
        cur.removeClass('slick-snext').removeClass('slick-sprev');
        slick.$prev = prev;
        slick.$next = next;
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        // console.log('beforeChange');
        var cur = $(slick.$slides[nextSlide]);
        // console.log(slick.$prev, slick.$next);
        slick.$prev.removeClass('slick-sprev');
        slick.$next.removeClass('slick-snext');
        next = cur.next(),
            prev = cur.prev();
        prev.prev();
        prev.next();
        prev.addClass('slick-sprev');
        next.addClass('slick-snext');
        slick.$prev = prev;
        slick.$next = next;
        cur.removeClass('slick-next').removeClass('slick-sprev');
    });

    rev.slick({
        speed: 1000,
        arrows: true,
        dots: false,
        focusOnSelect: true,
        infinite: true,
        centerMode: true,
        prevArrow: '<i class="slick-arrow-prev"><</i>',
        nextArrow: '<i class="slick-arrow-next">></i>',
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '0',
        swipe: true,
        customPaging: function(slider, i) {
            return '';
        },
        /*infinite: false,*/
        autoplay: true, // Add autoplay
        autoplaySpeed: 2000, // Set autoplay speed (in milliseconds)
    }).on('setPosition', function() {
        $('.banner-skeleton').hide();
        $('.rev_slider').addClass('loaded');
    });
</script>

<script>
    function truncateContent(contentClass, maxLength) {
        var contentDivs = document.getElementsByClassName(contentClass);

        Array.from(contentDivs).forEach(function(contentDiv) {
            var content = contentDiv.textContent.trim();
            var truncatedContent = content.slice(0, maxLength);

            if (content.length > maxLength) {
                contentDiv.innerHTML = truncatedContent + '... <a href="#" class="readMore">Selengkapnya</a>';
            }

            contentDiv.addEventListener('click', function(event) {
                if (event.target.classList.contains('readMore')) {
                    event.preventDefault();
                    contentDiv.innerHTML = content + ' <a href="#" class="readLess">lebih sedikit</a>';
                } else if (event.target.classList.contains('readLess')) {
                    event.preventDefault();
                    contentDiv.innerHTML = truncatedContent +
                        '... <a href="#" class="readMore">Selengkapnya</a>';
                }
            });
        });
    }

    truncateContent('promo', 130);
</script>
<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '{938473200580408}');
    fbq('init', '{9532506813488688}');
    fbq('init', '{584979920420062}');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={938473200580408}&ev=PageView&noscript=1" />
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={9532506813488688}&ev=PageView&noscript=1" />
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={584979920420062}&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript">
    $(window).on('load', function() {

        var popupLastShown = localStorage.getItem('popupLastShown');
        var time_left = popupLastShown ? Math.round((popupLastShown - Date.now()) / 1000) : 0;

        if (!popupLastShown || time_left <= 0) {
            $('#PopUpText').modal('show');
        } else {
            $('#PopUpText').modal('hide');
        }

        // When the button is clicked, hide the popup and store the current time
        $('#popupButton').click(function() {
            localStorage.setItem("popupLastShown", Date.now() + (24 * 60 * 60 * 1000));
            $('#PopUpText').modal('hide');
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

            if (distance > 0) {
                $("#expired_time_flash_sale").text(`${days}:${hours}:${minutes}:${seconds}`);
            } else {
                clearInterval(x);
                $("#expired_time_flash_sale").text("Flash Sale Berakhir");
                $(".swiper-slide.slide-container").addClass("sold-out");
            }
        }, 1000);
    });
</script>


<script>
    var swiper = new Swiper(".swiper-container.two", {
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // when window width is >= 640px
            640: {

                slidesPerView: 3,
                spaceBetween: 10

            }
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
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
</script> -->

<!-- <script>
        // Get the button
        var btn = document.getElementById("back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        btn.onclick = function() {
            topFunction();
        };

        function topFunction() {
            // Using smooth scroll method
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>
    
<script> -->

<script>
    // let timerInterval;

    // function showCountdownTimer(endHour) {
    // const countdownContainer = document.getElementById('expired_time_flash_sale');
    // countdownContainer.innerHTML = '';

    // const countdownText = document.createElement('p');
    // countdownText.classList.add('countdown-time');

    // function setCountdownTimer() {
    // const currentTime = new Date();
    // const currentHour = currentTime.getHours();
    // const currentMinute = currentTime.getMinutes();
    // const currentSecond = currentTime.getSeconds();

    // const end = new Date();
    // end.setHours(endHour, 0, 0, 0);
    // if (end < currentTime) {
    // end.setDate(end.getDate() + 1); // Menambahkan satu hari jika waktu akhir sudah berlalu
    // }


    // let remainingTime;

    // if (currentHour===endHour || (currentHour> endHour && currentHour < endHour + 8) || (currentHour===0 && currentMinute < 60 && endHour===17)) {
    // const nextEnd=new Date(end);
    // nextEnd.setHours(nextEnd.getHours() + 8);
    // remainingTime=nextEnd - currentTime;
    // console.log("Flash sale is ongoing");

    // document.getElementById('hoursf').style.display='inline-block' ;
    // document.getElementById('minutesf').style.display='inline-block' ;
    // document.getElementById('secondsf').style.display='inline-block' ;
    // document.getElementById('expired_time_flash_sale').style.display='inline-block' ;
    // document.getElementById('countdown-start1').style.display='none' ;
    // document.getElementById('countdown-start2').style.display='none' ;
    // document.getElementById('countdown-end').style.display='none' ;
    // } else if (currentHour < endHour && endHour===9) {
    // remainingTime=currentTime - end;
    // console.log("Before flash sale part 2 starts");

    // document.getElementById('hoursf').style.display='none' ;
    // document.getElementById('minutesf').style.display='none' ;
    // document.getElementById('secondsf').style.display='none' ;
    // document.getElementById('expired_time_flash_sale').style.display='inline-block' ;
    // document.getElementById('countdown-start1').style.display='inline-block' ;
    // document.getElementById('countdown-start2').style.display='none' ;
    // document.getElementById('countdown-end').style.display='none' ;
    // } else if (currentHour < endHour && endHour===17) {
    // remainingTime=currentTime - end;
    // console.log("Before flash sale part 3 starts");

    // document.getElementById('hoursf').style.display='none' ;
    // document.getElementById('minutesf').style.display='none' ;
    // document.getElementById('secondsf').style.display='none' ;
    // document.getElementById('expired_time_flash_sale').style.display='none' ;
    // document.getElementById('countdown-start1').style.display='none' ;
    // document.getElementById('countdown-start2').style.display='inline-block' ;
    // document.getElementById('countdown-end').style.display='none' ;
    // } else {
    // remainingTime=0;
    // console.log("Flash sale has ended");

    // clearInterval(timerInterval);
    // document.getElementById('hoursf').style.display='none' ;
    // document.getElementById('minutesf').style.display='none' ;
    // document.getElementById('secondsf').style.display='none' ;
    // document.getElementById('expired_time_flash_sale').style.display='none' ;
    // document.getElementById('countdown-start1').style.display='none' ;
    // document.getElementById('countdown-start2').style.display='none' ;
    // document.getElementById('countdown-end').style.display='inline-block' ;
    // }

    // let remainingHours, remainingMinutes, remainingSeconds;

    // if (remainingTime>= 24 * 60 * 60 * 1000) {
    // remainingHours = Math.floor(remainingTime / (24 * 60 * 60 * 1000));
    // remainingMinutes = Math.floor((remainingTime % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
    // remainingSeconds = Math.floor((remainingTime % (60 * 60 * 1000)) / (60 * 1000));
    // } else {
    // remainingHours = Math.floor(remainingTime / (60 * 60 * 1000));
    // remainingMinutes = Math.floor((remainingTime % (60 * 60 * 1000)) / (60 * 1000));
    // remainingSeconds = Math.floor((remainingTime % (60 * 1000)) / 1000);
    // }


    // const countdownText = document.querySelector('.countdown-time');
    // countdownText.innerHTML = `${remainingHours.toString().padStart(2, '0')}:${remainingMinutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
    // }

    // function formatTime(time) {
    // let seconds = Math.floor(time / 1000);
    // let minutes = Math.floor(seconds / 60);
    // let hours = Math.floor(minutes / 60);

    // minutes %= 60;
    // seconds %= 60;

    // return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    // }

    // setCountdownTimer();
    // timerInterval = setInterval(setCountdownTimer, 1000);

    // countdownContainer.appendChild(countdownText);
    // }

    // function showFlashSale(containerId, endHour) {
    // const allContainers = document.querySelectorAll('.flash-sale-container');
    // allContainers.forEach(container => {
    // container.classList.add('hidden');
    // });

    // const selectedContainer = document.getElementById(containerId);
    // selectedContainer.classList.remove('hidden');

    // showCountdownTimer(endHour);

    // const allButtons = document.querySelectorAll('.btn-flashsale');
    // allButtons.forEach(button => {
    // button.classList.remove('active');
    // });

    // const selectedButton = document.getElementById(`part${containerId.charAt(containerId.length - 1)}Button`);
    // selectedButton.classList.add('active');

    // const currentTime = new Date();
    // const currentHour = currentTime.getHours();
    // const currentMinute = currentTime.getMinutes();
    // console.log(`Flash Sale Part ${containerId.charAt(containerId.length - 1)} - Current Time: ${currentHour}:${currentMinute}`);

    // let isDisabled;
    // if (endHour === 17) {
    // isDisabled = (currentHour >= 1 && currentHour < 17);
    // } else {
    // isDisabled=currentHour < endHour || currentHour>= endHour + 8;
    // }
    // console.log(`Flash Sale Part ${containerId.charAt(containerId.length - 1)} isDisabled: ${isDisabled}`);

    // const allItems = document.querySelectorAll('.swiper-slide');
    // allItems.forEach(item => {
    // if (isDisabled) {
    // item.classList.add('disabled');
    // const diskonFlashSale = item.querySelector('.diskon-flashsale');
    // if (diskonFlashSale) {
    // diskonFlashSale.style.display = 'none';
    // }
    // } else {
    // item.classList.remove('disabled');
    // const diskonFlashSale = item.querySelector('.diskon-flashsale');
    // if (diskonFlashSale) {
    // diskonFlashSale.style.display = 'block';
    // }
    // }
    // });
    // }

    // function scrollToMiddleOfContent() {
    // const activeTab = document.querySelector('.tab-pane.active');
    // if (activeTab.id !== 'pills-all') {
    // document.querySelector('a[href="#pills-all"]').click();
    // setTimeout(() => {
    // const flashSaleWrapper = document.querySelector('.flash-sale-wrapper');
    // flashSaleWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
    // }, 300); // Delay 300ms
    // } else {
    // const flashSaleWrapper = document.querySelector('.flash-sale-wrapper');
    // flashSaleWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
    // }
    // }

    // document.getElementById('part1Button').addEventListener('click', function() {
    // clearInterval(timerInterval);
    // showFlashSale('flashSalePart1', 1);
    // scrollToMiddleOfContent();
    // });

    // document.getElementById('part2Button').addEventListener('click', function() {
    // clearInterval(timerInterval);
    // showFlashSale('flashSalePart2', 9);
    // scrollToMiddleOfContent();
    // });

    // document.getElementById('part3Button').addEventListener('click', function() {
    // clearInterval(timerInterval);
    // showFlashSale('flashSalePart3', 17);
    // scrollToMiddleOfContent();
    // });

    // const currentHour = new Date().getHours();
    // const currentMinute = new Date().getMinutes();
    // console.log(`Current time: ${currentHour}:${currentMinute}`);

    // if ((currentHour === 1 && currentMinute >= 0) || (currentHour > 1 && currentHour < 9)) {
    // console.log("Activating Flash Sale Part 1");
    // showFlashSale('flashSalePart1', 1);
    // } else if ((currentHour===9 && currentMinute>= 0) || (currentHour > 9 && currentHour < 17)) {
    // console.log("Activating Flash Sale Part 2");
    // showFlashSale('flashSalePart2', 9);
    // } else if ((currentHour===17 && currentMinute>= 0) || (currentHour > 17 && currentHour < 24) || (currentHour===0 && currentMinute < 60)) {
    // console.log("Activating Flash Sale Part 3");
    // showFlashSale('flashSalePart3', 17);
    // } else {
    // console.log("Flash Sale has ended");
    // const countdownContainer=document.getElementById('expired_time_flash_sale');
    // countdownContainer.innerHTML='Flash Sale Telah Berakhir' ;
    // }
</script>
<?php $this->endSection(); ?>