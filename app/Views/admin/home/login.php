<?php
// $this->extend('templateadmin');
?>
<?php $this->section('css'); ?>

<?php $this->endSection(); ?>

<style>
   #layout-menu {
      display: none !important;
   }

   .layout-page .bg-navbar-theme {
      visibility: hidden;
   }

   @media (min-width: 1200px) {
      .container-xxl {
         margin-left: 30%
      }
   }

   .sidebar,
   .iq-banner,
   .btn-setting {
      display: none;

   }

   .main-content {
      margin-left: 0 !important;
   }
</style>
<link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon-hiddengame.png">

<meta name="description" content="" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

<!-- Library / Plugin Css Build -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/core/libs.min.css" />

<!-- Aos Animation Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//vendor/aos/dist/aos.css" />

<!-- Hope Ui Design System Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/hope-ui.min.css?v=2.0.0" />

<!-- Custom Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/custom.min.css?v=2.0.0" />

<!-- Dark Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/dark.min.css" />

<!-- Customizer Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/customizer.min.css" />

<!-- RTL Css -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/rtl.min.css" />

<!-- AddOn -->
<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">

<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css">

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?compat=recaptcha" async defer></script>



<div class="wrapper">
   <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
         <div class="col-md-6">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                     <div class="card-body">
                        <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
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





                        </a>
                        <h4 class="logo-title ms-3 text-center"><?= $web['name']; ?></h4>
                        <h2 class="mb-2 text-center">Login Administrator</h2>
                        <p class="text-center">Silahkan login dengan akun kamu</p>

                        <form action="" method="POST">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" autocomplete="off" name="username">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                 </div>
                              </div>
                           </div>

                           <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary" name="tombol" value="submit">Login Sekarang</button>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <!-- <img src="https://i.ibb.co/rpj563Z/01.png" class="img-fluid gradient-main animated-scaleX" alt="images"> -->
         </div>
      </div>
   </section>
</div>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>