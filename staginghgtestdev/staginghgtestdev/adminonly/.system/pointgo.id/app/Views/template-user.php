<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?= $title; ?> - <?= $web['title']; ?></title>
    
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon-hiddengame.png">

    <meta name="description" content="" />
    
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style-main.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
        
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- Library / Plugin Css Build -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/core/libs.min.css" />
  
  <!-- Aos Animation Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//vendor/aos/dist/aos.css" />
  
  <!-- Hope Ui Design System Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/hope-ui.min.css?v=2.0.0" />
  
  <!-- Custom Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/custom.min.css?v=2.0.0" />
  
  <!-- Dark Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/dark.min.css"/>
  
  <!-- Customizer Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/customizer.min.css" />
  
  <!-- RTL Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/rtl.min.css"/>
  
    <!-- AddOn -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">
    
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css">
    
    <style>
    @media (min-width: 1100px) {
    .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
        max-width: 1544px;
    }}
    
    
    @media (min-width: 900px) {
    .iq-navbar-header {
        height:80px;
    }}
    
    @media (max-width: 900px) {
    .iq-navbar-header {
        height:20px;
    }}
    
    .modal-content {
        background:#fff !important
    }
    
    .text-right {
        text-align: right; 
    }
    label, li, b {
        color:#000 !important;
    }
    .sidebar-header {
        background-color: var(--bs-primary) !important;
    }
    body#adminNew {
    font-family: var(--bs-body-font-family) !important; 
    font-size: var(--bs-body-font-size) !important;
    }
    .table thead th {
        font-size: 0.9rem !important; ;
    }
    .table tbody td {
        font-size: 0.7rem !important; ;
    }
    .form-group label, li, b {
        color: inherit !important;
    }
    .card-tools {
        margin-top:10px;
    }
    .card-tools a{
        margin-top:3px;
    }
    #orders-table {
      width: 100% !important;
    }
    </style>
    
    <style>
    :root {
        --bs-primary: #2D2D2D;
        --bs-primary-shade-20: #2D2D2D;
        --warna: #ffffff;
        --warna_2: #232946;
        --warna_3: #232946;
        --warna_4: #ffffff;
        --warna_5: #161616;
        --warna_6: #000035;
        --warna_text: black;
        --warna_text2: white;
        --warna_border: #0000001c;
    }
    
    .warna-user {
        color: var(--warna_text) !important;
    }
    
    .form-control {
        border: 1px solid var(--warna_border);
        background: #fff;
        color: var(--warna_text) !important;

    }

    option {
        border: 1px solid var(--warna_border);
        background: var(--warna_5);
        color: var(--warna_text2) !important;
    }

    .form-control:hover {
        border: 1px solid var(--warna_3);
        background: #febc3e0a;

    }

    .form-control:focus {
        border: 1px solid var(--warna_3);
        background: #febc3e0a;
        color: var(--warna_text) !important;
    }
    
    .bg-search {
        --bs-bg-opacity: 1;
        background-color: rgb(128 128 128) !important;
    }
    
    body,
    html {
        font-family: -apple-system, Plus Jakarta Sans, sans-serif;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
    }

    body {
        color: var(--warna_text);
    }

    .modal-content {
        border-radius: 0.25rem;
        font-size: 14px;
        background: var(--warna);
        border: 0px solid rgba(0, 0, 0, .1);
    }



    .h2,
    .h4,
    .h5,
    h2,
    h4,
    h5 {
        color: var(--warna_text);
    }

    label {
        font-weight: 500;
        text-transform: none;
        margin-bottom: 10px
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
    }

    .menu-user a:hover {
        background: var(--warna_2);
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

    .bg-footer {
        background-color: var(--warna);
    }

    .bg-custom {
        background: var(--warna_6) !important;
    }
    
    .bg-theme1 {
        background: var(--warna_6) !important;
    }

    .btn-topup,
    .back-to-top {
        background: var(--warna_3);
    }

    .section {
        background: var(--warna_4);
        box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%);
    }

    .radio-nominale+label {
        background: var(--warna);
        border: 2px solid #adadad43;
        color: var(--warna_text) !Important;
        transition: all 0.1s;
        border-radius: 10px;
    }

    .radio-nominale:hover+label {
        background: #adadad43;
        border: 2px solid #adadad43;
        color: var(--warna_text) !Important;
    }

    .radio-nominal+label {
        background: #d0d0d0;
        color: #767676 !important;
        transition: all 0.1s;
        filter: grayscale(1);
    }
    .radio-nominal:hover+label {
        background: #ffffff;
        color: #767676 !important;
        transition: all 0.1s;
        filter: grayscale(1);
    }

    .radio-nominale:checked+label {
        background: var(--warna);
        color: var(--warna_3) !important;
        border: 2px solid var(--warna_3);
        border-radius: 10px;
        /*box-shadow: 0 0 2.22222vw #bf5bd0, inset 0 2.40741vw 8.05556vw #ffffff00, inset 0 -8.24074vw 11.48148vw #ffffff00;*/

    }

    .radio-nominal:checked+label {
        border: 2px solid var(--bs-primary) !important;
        color: black !important;
        filter: grayscale(0);
    }
    
    .radio-nominale:checked+label:after {
        position: absolute;
        top: 0px;
        right: 5px;
        width: 28px;
        height: 28px;
        content: url(" data:image/svg+xml, <svg stroke='currentColor' fill='white' stroke-width='0' viewBox='0 0 16 16' height='12' width='12' xmlns='http://www.w3.org/2000/svg' ><path d='M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z' ></path></svg>");
        background: var(--warna_3) top/cover;
        text-align: center;
        border-radius: 0 5px 0 0;
        border-top-right-radius: 3000px;
        border-bottom-left-radius: 9999px;
        padding: 0.25rem;
        padding-left: 0.5rem;
        padding-top: 0.4rem;
    }

    .radio-nominal:checked+label:after {
        position: absolute;
        top: 0;
        right: 0;
        width: 28px;
        height: 28px;
        content: url(" data:image/svg+xml, <svg stroke='currentColor' fill='white' stroke-width='0' viewBox='0 0 16 16' height='12' width='12' xmlns='http://www.w3.org/2000/svg' ><path d='M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z' ></path></svg>");
        background: var(--bs-primary) top/cover;
        text-align: center;
        border-radius: 0 5px 0 0;
        border-top-right-radius: 1500px;
        border-bottom-left-radius: 9999px;
        padding: 0.25rem;
        padding-left: 0.5rem;
        padding-top: 0.4rem;
    }
    
    .radio-nominal:checked+label {
        border-color: var(--warna_text);
    }

    .img-fluid2 {
        max-width: 100%;
        height: auto;
        padding-bottom: 15px;
    }
    
    @media (max-width: 480px) {
        .alert-custom {
            left: 15px !Important;
            right: 15px;
        }
    }
    
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

    .card.mb-3.mgs-card {
        border-radius: 10px;
        min-height: 90px;
        position: relative;
        background: var(--warna_4);
    }
    
    .mgs-card {
        border-radius: 10px;
        min-height: 90px;
        position: relative;
        background: var(--warna_4);
    }

    .card.mb-3.mgs-card:hover {
        transform: scale(1.08);
        transition: .5s ease;
    }
    .card {
        margin-bottom: 0px;
    }

    .mgs-img {
        border-radius: 10px;
        display: block;
        width: 100%;
        opacity: 0.7;
        transition: opacity 0.3s ease-in-out;
    }

    .mgs-img:hover {
        opacity: 1;
    }

    .mgs-card-title {
        padding: 15px 5px;
        color: var(--warna_text) !important;
        margin-bottom: 0rem;
        font-size: .875rem;
    }

    .btn-topup {
        padding: 0.5rem 0.5rem;
        border-radius: 20px;
        margin-top: 10px;
        color: var(--warna_text2);
    }

    .navbar-dark .navbar-nav .nav-link.active {
        color: var(--warna_text) !important;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        color: var(--warna_text) !important;
    }

    .kios-card-title {
        font-size: 15px;
        margin: 0 0 0px 0;
        font-weight: 600;
    }

    .card-header {
        padding: 0.625rem 1.25rem;
        margin-bottom: 0;
        border-bottom: 0 solid #f6f6f6;
    }

    .fa-angle-double-up {
        color: var(--warna_text2);
    }

    .back-to-top:hover {
        color: var(--warna_text2);
        background-color: var(--warna_3);
        transition: all .5s;
    }

    .border-t {
        border-top: 1px solid #ffffff;
    }

    .text-foot {
        font-size: 1rem;
    }

    .text-sm {
        font-size: .875rem;
        line-height: 1.25rem;
    }

    .w-full {
        width: 100%;
    }

    .h-full {
        height: 100%;
    }

    .relative {
        position: relative;
    }

    .grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .grid {
        display: grid;
    }

    .text-center {
        text-align: center;
    }

    .font-medium {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .p-6 {
        padding: 1.5rem;
    }

    .rounded-2xl {
        border-radius: 1rem;
    }

    .items-center {
        align-items: center;
    }

    .gap-4 {
        gap: 1rem;
    }

    .flex-col {
        flex-direction: column;
    }

    .flex {
        display: flex;
    }

    .justify-between {
        justify-content: space-between;
    }


.orderNotif {}

        .orderNotif .item {
            position: fixed;
            bottom: 0;
            left: 43.5% !important;
            z-index: 10000;
            max-width: 500px;
            font-size: 11.3px;
            background: rgba(0, 0, 0, .85);
            padding: 9px 13px;
            border-radius: 6px;
            box-shadow: 0 10px 20px rgba(1, 1, 0, .3);
            color: #fff;
            transition: .4s;
            opacity: 0;
            visibility: hidden;
            line-height: 1.4em;
            border:3px solid var(--warna_3);
        }

        .orderNotif .item:hover {
            background: #333;
        }
        
        

        .orderNotif .item span.avaURL {
            background: #fafafa;
            background-size: cover;
            display: block;
            margin-right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50px;
            line-height: 1em;
            float: left;
            margin-bottom: 10px;
        }

        .orderNotif .item.active {
            left: 20px;
            bottom: 20px;
            opacity: 1;
            visibility: visible;
        }

        .orderNotif .item.hidden {
            left: -40px !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }

        @media only screen and (max-width: 1068px) {
            .orderNotif .item.active {
                bottom: 90px;
                left: 12px;
                max-width: 290px;
            }
            
        }
        @media only screen and (max-width: 1300px) {
            .orderNotif .item {
                left: 40% !important;
            }
        }
        
        @media only screen and (max-width: 1150px) {
            .orderNotif .item {
                left: 39% !important;
            }
        }
        @media only screen and (max-width: 950px) {
            .orderNotif .item {
                left: 37.4% !important;
            }
        }
        @media only screen and (max-width: 800px) {
            .orderNotif .item {
                left: 34% !important;
            }
        }
        @media only screen and (max-width: 700px) {
            .orderNotif .item {
                left: 32% !important;
            }
        }
        @media only screen and (max-width: 600px) {
            .orderNotif .item {
                left: 28% !important;
            }
        }
        @media only screen and (max-width: 500px) {
            .orderNotif .item {
                left: 23.5% !important;
            }
        }
        @media only screen and (max-width: 400px) {
            .orderNotif .item {
                left: 23% !important;
            }
        }

        .orderNotif .item i {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
            color: #fff;
        }

        .orderNotif .item p {
            display: inline-block;
            float: right;
            margin-top: -13px;
            margin-right: -18px;
            border-top: 0;
            border-right: 0;
            overflow: hidden;
            margin-left: 10px;
            margin-bottom: 10px;
            line-height: 1;
        }

        .orderNotif .item p a {
            display: inline-block;
            vertical-align: middle;
            padding: 5px 10px;
            border-radius: 0 0 0 6px;
            border-top: 0;
            border-right: 0;
        }

        .orderNotif .item a {
            color: var(--warna_3);
        }

        .orderNotif .item p a:active {
            background: #fafafa;
        }

        .orderNotif .item p a i {
            display: inline-block;
            vertical-align: middle;
            font-size: 150%;
            margin: 0 5px;
            color: #fff;
        }

        .border-t {
            border-top: 1px solid #ffffff;
        }

        .text-foot {
            font-size: 1rem;
        }

        .text-sm {
            font-size: .875rem;
            line-height: 1.25rem;
        }

        .shadow-navbar {
            box-shadow: 0 100px 80px hsl(0deg 0% 89% / 7%), 0 41.7776px 33.4221px hsl(0deg 0% 89% / 5%), 0 22.3363px 17.869px hsl(0deg 0% 89% / 4%), 0 12.5216px 10.0172px hsl(0deg 0% 89% / 4%), 0 6.6501px 5.32008px hsl(0deg 0% 89% / 3%), 0 2.76726px 2.21381px hsl(0deg 0% 89% / 2%);
        }

        .top-second {
            position: sticky;
            top: 0;
            right: 0;
            left: 0;
            z-index: 889;
        }

        .dropdown-toggle::after {
            display: none
        }

        .lg\:static {
            position: static;
        }

.menu-side-pros {
        position: fixed;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        z-index: 999;
    }

    @media (max-width: 780px) {
        .menu-side-pros {
            flex-direction: row;
            background: var(--warna_6) !important;
            padding: 15px 0px 5px 0;
            /* transform: translateY(-50%); */
            top: 95%;
            box-shadow: 0 4px 80px hsl(0deg 0% 77% / 13%), 0 1.6711px 33.4221px hsl(0deg 0% 77% / 9%), 0 0.893452px 17.869px hsl(0deg 0% 77% / 8%), 0 0.500862px 10.0172px hsl(0deg 0% 77% / 7%), 0 0.266004px 5.32008px hsl(0deg 0% 77% / 5%), 0 0.11069px 2.21381px hsl(0deg 0% 77% / 4%);
            width: 100%;
        }
    }
    @media (min-width:781px) {
        .menu-side-item {
    background: #ffffff29;
    padding: 17px 0px;
    border-radius: 20px;
    border: 2px solid #ffffff3b;
    margin-bottom: 10px;
    margin-left: 20px;
}
.menu-side-item p {
    margin: 0px;
}
    }

    .menu-side-item {
        flex-direction: column;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    html {
        scroll-behavior: smooth;
    }

    .menu-side-item a {
        transition: all 0.3s ease;
    }

    .menu-side-item a.active {
        color: #ff0000;
    }
    .strip-primary {
    background-color: var(--bs-primary);
    position: absolute;
    margin: 10px 0px;
    width: 40px;
    height: 5px;
    border-radius: 2px;
}
thead, tbody, tfoot, tr, td, th {
    white-space: normal;
}
@media (max-width: 767.98px) {
.iq-banner:not(.hide)+.content-inner {
    margin-top: 1em !important;
}}
.btn-setting {
    display: none;
}

label, li, b {
    color: #000 !important;
}

.btn-close {
    -webkit-box-sizing: content-box;
    /* box-sizing: content-box; */
    width: 1.5rem;
    height: 1.7rem;
    padding: 0.25em 0.25em;
    color: #000;
    background: none;
    border: 0;
    -webkit-border-radius: 0.5rem;
    border-radius: 0.5rem;
    opacity: 1;
}
    </style>
    
    <?php $this->renderSection('css'); ?>
    
  </head>

  <body id="adminNew">
    <!-- loader Start -->

    
    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="<?= base_url(); ?>/user" class="navbar-brand">
                <!--Logo start-->
                <!--logo End-->
                
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-1 mt-1 rounded" width="100">
                    </div>
                    <div class="logo-mini">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-1 mt-1 rounded" width="100">
                    </div>
                </div>
                <!--logo End-->
                
                
                
                
                <h4 class="logo-title" style="font-size:12px !important" hidden><?= $web['name']; ?></h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>/user">
                            <i class="icon">
                                <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="currentColor"></path>                                
                                </svg>                            
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item">
                        <a class="nav-link "  href="<?= base_url(); ?>/user/riwayat">
                            <i class="icon">
                                <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46583 5.23624C8.24276 5.53752 8.26838 5.96727 8.5502 6.24C8.8502 6.54 9.3402 6.54 9.6402 6.24L11.2302 4.64V8.78H12.7702V4.64L14.3602 6.24L14.4464 6.31438C14.7477 6.53752 15.1775 6.51273 15.4502 6.24C15.6002 6.09 15.6802 5.89 15.6802 5.69C15.6802 5.5 15.6002 5.3 15.4502 5.15L12.5402 2.23L12.4495 2.14848C12.3202 2.0512 12.1602 2 12.0002 2C11.7902 2 11.6002 2.08 11.4502 2.23L8.5402 5.15L8.46583 5.23624ZM6.23116 8.78512C3.87791 8.89627 2 10.8758 2 13.2875V18.2526L2.00484 18.4651C2.1141 20.8599 4.06029 22.7802 6.45 22.7802H17.56L17.7688 22.7753C20.1221 22.6641 22 20.6843 22 18.2628V13.3078L21.9951 13.0945C21.8853 10.6909 19.93 8.7802 17.55 8.7802H12.77V14.8849L12.7629 14.9922C12.7112 15.3776 12.385 15.6683 12 15.6683C11.57 15.6683 11.23 15.3224 11.23 14.8849V8.7802H6.44L6.23116 8.78512Z" fill="currentColor"></path>                            </svg>                                                   
                            </i>
                            <span class="item-name">Riwayat Pesanan</span>
                        </a>
                    </li>
                    
                    <br><br><br><br><br><br><br><br><br><br><br>
                    
                    </ul>
                    
                    

                <!-- Sidebar Menu End -->        </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>    <main class="main-content">
      <div class="position-relative iq-banner">
        <!--Nav Start-->
        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
          <div class="container-fluid navbar-inner">
            <a href="<?= base_url(); ?>/user" class="navbar-brand">
                <!--Logo start-->
                <!--logo End-->
                
                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        
                    </div>
                    <div class="logo-mini">
                        
                    </div>
                </div>
                <!--logo End-->
                
                
                
                
                <h4 class="logo-title" style="font-size:12px !important" ><?= $web['name']; ?></h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                 <svg  width="20px" class="icon-20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                </svg>
                </i>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                  <span class="mt-2 navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                <li class="nav-item dropdown">
                  <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                        <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>                                
                        </svg>                            
                    <div class="caption ms-3 d-none d-md-block ">
                        <h6 class="mb-0 caption-title"><?= $users['username']; ?></h6>
                        <!--<p class="mb-0 caption-sub-title">Profile</p>-->
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>/user/settings">Ganti Password</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>/logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>          <!-- Nav Header Component Start -->
          <div class="iq-navbar-header">
              
          </div>          <!-- Nav Header Component End -->
        <!--Nav End-->
      </div>
      
      <div class="conatiner-fluid content-inner py-0">
        <?php $this->renderSection('content'); ?>
      </div>

      <!-- Footer Section Start -->
      <footer class="footer">
          <div class="footer-body">
              <div class="right-panel">
                  ©<script>document.write(new Date().getFullYear())</script> <?= $web['name']; ?>
                  
              </div>
          </div>
      </footer>
      
      <!-- Footer Section End -->    </main>
    <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      <svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
      </svg>
    </a>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <div class="d-flex align-items-center">
          <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body data-scrollbar">
        <div class="row">
          <div class="col-lg-12">
             <h5 class="mb-3">Scheme</h5>
            <div class="d-grid gap-3 grid-cols-3 mb-4">
              <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                  <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z"></path>
                  </svg>
                <span class="ms-2 "> Auto </span>
              </div>
    
               <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z"></path>
                  </svg>
                <span class="ms-2 "> Dark  </span>
              </div>
               <div class="btn btn-border active" data-setting="color-mode" data-name="color" data-value="light">
                  <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z"></path>
                </svg>
                <span class="ms-2 "> Light</span>
              </div>
            </div>
            <hr class="hr-horizontal"> 
            <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-4 mb-3">Color Customizer</h5>
            <button class="btn btn-transparent p-0 border-0" data-value="theme-color-default" data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Default">
              <svg class="icon-18" width="18"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1"/>
                <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA"/>
              </svg>
            </button>
            </div>
            
            <div class="grid-cols-5 mb-4 d-grid gap-x-2">
              <div class="btn btn-border bg-transparent"  data-value="theme-color-blue"   data-info="#573BFF" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-1">
              <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" > <circle cx="12" cy="12" r="10" fill="#00C3F9" /> <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" /></svg>
              </div>
              <div class="btn btn-border bg-transparent" data-value="theme-color-gray" data-info="#FD8D00" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-2">
              <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" > <circle cx="12" cy="12" r="10" fill="#91969E" /> <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" /></svg>
              </div>
              <div class="btn btn-border bg-transparent"  data-value="theme-color-red" data-info="#366AF0" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-3">
              <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" > <circle cx="12" cy="12" r="10" fill="#DB5363" /> <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" /></svg>
              </div>
              <div class="btn btn-border bg-transparent"  data-value="theme-color-yellow" data-info="#6410F1" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-4">
              <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" > <circle cx="12" cy="12" r="10" fill="#EA6A12" /> <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" /></svg>
              </div>
              <div class="btn btn-border bg-transparent"  data-value="theme-color-pink" data-info="#25C799" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-5">
              <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" > <circle cx="12" cy="12" r="10" fill="#E586B3" /> <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" /></svg>
              </div>
              
            </div>

            <hr class="hr-horizontal">
            <h5 class="mt-4 mb-3">Sidebar Color</h5>
            <div class="d-grid gap-3 grid-cols-2 mb-4">
              <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-white">
                <span class=""> Default </span>
              </div>
              <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-dark">
                <span class=""> Dark </span>
              </div>
              <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-color">
                <span class=""> Color </span>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <a href="javaScript:void();" class="back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>



    <!-- Library Bundle Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="<?= base_url(); ?>/assets/admin2//vendor/aos/dist/aos.js"></script>
    
    <!-- App Script -->
    <script src="<?= base_url(); ?>/assets/admin2//js/hope-ui.js" defer></script>
    
    <!-- AddOn-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://dolphinstore.id//assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">
    
    <!--Data Tables js-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>


    <script>
        $(document).ready(function() {
      // select all the "Edit" buttons and append the SVG code to each one of them
      $('a.btn:contains("Edit")').each(function() {
        $(this).append('<span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>');
        $(this).contents().filter(function() {
          // filter the text node
          return this.nodeType === 3;
        }).remove(); // remove the text node
      });
    });
    
    </script>
    
    <script>
        $(document).ready(function() {
      // select all the "Edit" buttons and append the SVG code to each one of them
      $('button.btn:contains("Hapus")').each(function() {
        $(this).append('<span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>');
        $(this).contents().filter(function() {
          // filter the text node
          return this.nodeType === 3;
        }).remove(); // remove the text node
      });
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
