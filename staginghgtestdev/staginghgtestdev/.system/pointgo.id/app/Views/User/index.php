			<?php $this->extend('template'); ?>

			<?php $this->section('css'); ?>
			<style>
@media (min-width: 1100px) {
    .fab-container {
        right: 278px;
    }
}

@media (min-width: 768px) {
    .bhahah {
        width: 100px !important;
    }
}

@media (max-width: 480px) {
    .bhahah {
        width: 60px;
    }
}

body {
    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
    background-size: contain;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    width: 100%;
    height: 90%;
    background-color: #88BC54;
    clip-path: polygon(0 0, 100% 0%, 100% 90%, 0% 100%);
    transform: translate(-50%, -50%) rotate(0deg);
    z-index: -1; /* Pastikan elemen ini berada di atas background tetapi di bawah konten lainnya */
    pointer-events: none; /* Supaya tidak mengganggu interaksi dengan konten lainnya */
}

.btn-logout {
    background: red;
    color: #fff !important;
    padding: 9px 19px;
    border-radius: 10px;
}

.btn-logout:hover {
    opacity: 0.8;
    transition: 0.3s ease;
}

.tab-success {
    background: #04b962;
    color: #fff !important;
    padding: 5px 10px;
    border-radius: 32px;
}

.tab-pending {
    background: #d3cc00;
    color: #fff !important;
    padding: 5px 10px;
    border-radius: 32px;
    ba
}

.tab-processing {
    background: orange;
    color: #fff !important;
    padding: 5px 10px;
    border-radius: 32px;
}

.tab-canceled {
    background: red;
    color: #fff !important;
    padding: 5px 10px;
    border-radius: 32px;
}

.section-game {
    border: 0px solid !important;
}

.text-misi-container {
    font-weight: 600;
    width: 80%;
}

.text-misi {
    color: #fff;
    /*text-shadow: 1px 1px #fff;*/
}

.member-img-head {
    position: relative;
    text-align: -webkit-center;
}

.member-img {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    max-width: 80vh;
    width: auto;
    border-radius: 15px !important;
}

.member-img-2 {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
}

@media (max-width:480px) {
    .member-img {
        display: none;
    }
    .member-img-2 {
        max-width: 40vh !important;
        
    }
}

@media (min-width:481px) {
    .member-img-2 {
        display: none;
    }
}

@media (min-width:768px) and (max-width:1024px) {
    .member-img {
        max-width: 60vh;
    }
}

@media (min-width:1440px) and (max-width:2560px) {
    .member-img {
        max-width: 67vh;
    }
}
			</style>
			<style>
#datatable_wrapper {
    padding: 0;
}

#datatable_wrapper .row:nth-child(1),
#datatable_wrapper .row:nth-child(3) {
    padding: 20px 15px;
}

body {
    font-size: 11px !important;
}

label {
    color: #fff;
}

.table thead th {
    font-size: .52rem;
}

.form-select {
    padding: 5px;
    margin: 5px;
    overflow: hidden;
    font-size: 11px;
}

.filter-control .form-select {
    width: 90% !important;
}

.border-bottom {
    border-bottom: 1px solid rgba(65, 65, 65, 1) !important;
}

.border-bottom-pointgo {
    border-bottom: 1px solid var(--warna_4) !important;
}

@media (min-width:481px) {

    p,
    a {
        font-size: 16px;
    }
}

@media (max-width:480px) {

    p,
    a {
        font-size: 13px;
    }
}

.body-games-green {
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 11px;
    color: #000;
}

.body-games-green {
    background: var(--warna_3) !important;
}

.body-games-green:hover {
    opacity: 0.8;
    transition: 0.3s ease;
}

.font-md {
    font-size: 12px;
}


.table-dark {
    color: #fff;
    background: var(--warna_2);
}

.shine {
  text-align: center;
  background: #767676c2 -webkit-gradient(linear, left top, right top, from(#c7c6c6), to(#c7c6c6), color-stop(0.5, #c7c6c6)) 0 0 no-repeat;
  -webkit-background-size: 150px;
  background-size: 200% auto;
  color: #000;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: shine 3s linear infinite;
  
}
@keyframes shine {
    0% {
      background-position: 200px center;
    }
    100% {
      background-position: -200px center;
    }
  }
			</style>
			<?php $this->endSection(); ?>

			<?php $this->section('content'); ?>
			<p style="top: 20%; position: absolute; z-index: 999; left: 10%; color:#fff; font-size:32px; font-weight:700 ">Profile</p>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			        <div class="row d-flex justify-content-center">

			            <div class="col-sm-6">
			                <?= alert(); ?>
			                <div class="pb-3">
			                    <div class="section">
			                        <div class="body-games shadow-form">
			                            <div class="row d-flex justify-content-center border-bottom">
			                                <div
			                                    class="col-sm-3 col-6 d-flex align-items-center gap-2 py-3 justify-content-center border-bottom-pointgo">
			                                    <a href="" style="font-size: 13px;" class="text-secondary-pointgo ">
			                                        <svg class="user" xmlns="http://www.w3.org/2000/svg" width="12" height="16"
			                                            viewBox="0 0 12 16" fill="none">
			                                            <path
			                                                d="M8.24999 0.5H3.74999V2H2.24999V6.5H3.74999V2H8.24999V0.5ZM8.24999 6.5H3.74999V8H8.24999V6.5ZM8.24999 2H9.74999V6.5H8.24999V2ZM-7.62939e-06 11H1.49999V9.5H10.5V11H1.49999V14H10.5V11H12V15.5H-7.62939e-06V11Z"
			                                                fill="var(--warna_4)" />
			                                        </svg>
			                                        Info Pribadi
			                                    </a>
			                                </div>
			                                <div
			                                    class="col-sm-3 col-6 d-flex align-items-center gap-2 py-3 justify-content-center">
			                                    <a href="<?= base_url(); ?>/user/riwayat?status=Pending"
			                                        style="font-size: 13px;">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
			                                            viewBox="0 0 18 18" fill="var(--warna_4)">
			                                            <path
			                                                d="M14.625 2.25H3.375C3.07663 2.25 2.79048 2.36853 2.5795 2.5795C2.36853 2.79048 2.25 3.07663 2.25 3.375V14.625C2.25 14.9234 2.36853 15.2095 2.5795 15.4205C2.79048 15.6315 3.07663 15.75 3.375 15.75H14.625C14.9234 15.75 15.2095 15.6315 15.4205 15.4205C15.6315 15.2095 15.75 14.9234 15.75 14.625V3.375C15.75 3.07663 15.6315 2.79048 15.4205 2.5795C15.2095 2.36853 14.9234 2.25 14.625 2.25Z"
			                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
			                                                stroke-linejoin="round" />
			                                            <path
			                                                d="M7.875 11.625L9.75 13.125L12.75 9.375M5.25 5.625H12.75M5.25 8.625H8.25"
			                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
			                                                stroke-linejoin="round" />
			                                        </svg>
			                                        Transaksi Saya
			                                    </a>
			                                </div>
			                            </div>

			                            <div class="row pb-3 pt-4 px-4">
			                                <div class="col-6 d-flex align-items-center gap-2 justify-content-start">
			                                    <p class="mb-0 text-dark">Tipe Member: <b>
			                                            <?php
									if ($users['level'] == 'Member') {
										echo "<span style='color: #FF7A00;'>Member Biasa</span>";
									} else if ($users['level'] == 'Silver') {
										echo "<span style='color: #D0D2D1;'>Reseller Silver</span>";														
									} else if ($users['level'] == 'Gold') {
										echo "<span style='color: gold;'>Reseller Gold</span>";
									} else if ($users['level'] == 'Platinum') {
										echo "<span class='shine'>Reseller Platinum</span>";
									} else {
										echo "<span style='color: white;'>Reseller Member</span>";
									}
									?>
			                                        </b></p>
			                                </div>
			                                <div class="col-6 d-flex align-items-center gap-2 justify-content-end">
			                                    <a class="text-secondary-pointgo" href="<?= base_url(); ?>/user/editprofile"><svg
			                                            xmlns="http://www.w3.org/2000/svg" width="18" height="18"
			                                            viewBox="0 0 18 18" fill="none">
			                                            <path
			                                                d="M14.475 6.69375L11.2875 3.54375L12.3375 2.49375C12.625 2.20625 12.9783 2.0625 13.3973 2.0625C13.8163 2.0625 14.1692 2.20625 14.4562 2.49375L15.5062 3.54375C15.7937 3.83125 15.9437 4.17825 15.9562 4.58475C15.9688 4.99125 15.8313 5.338 15.5438 5.625L14.475 6.69375ZM13.3875 7.8L5.4375 15.75H2.25V12.5625L10.2 4.6125L13.3875 7.8Z"
			                                                fill="var(--warna_4)" />
			                                        </svg> Edit Profil</a>
			                                </div>
			                            </div>

			                            <div class="text-center" hidden>
			                                <div class="mb-2">
			                                    <img src="<?= base_url(); ?>/assets/images/new-assets/user.svg"
			                                        width="80px"></img>
			                                </div>
			                                <div class="mb-3">
			                                    <h5><?= $users['username']; ?></h5>
			                                    <p><?= $users['fullname']; ?></p>
			                                    <p><?= $users['wa']; ?></p>
			                                    <a class="text-secondary-pointgo" href="<?= base_url(); ?>/user/membership"><i class="fa fa-star" aria-hidden="true"></i> Upgrade To Reseller</a>
			                                </div>
			                            </div>

			                            <div class="pb-3">
			                                <div class="body-games-in shadow-form">
			                                    <h5>E-Wallet Hiddengame</h5>
			                                    <div class="row">
			                                        <div class="col-12 col-lg-8 d-flex px-2 pb-2">
			                                            <div class="body-games-in2 shadow-form d-flex">
			                                                <div class="mr-2 d-flex align-items-center">
			                                                    <img src="<?= base_url(); ?>/assets/images/new-assets/HIDDENPAY1.webp" class=" bhahah"></img>
			                                                </div>
			                                                <div class="d-flex align-items-center">
			                                                    <div>
			                                                        <p class="mb-0 text-dark">Saldo HiddenPay</p>
			                                                        <p class="mb-0 text-secondary-pointgo"> Rp
			                                                            <?= number_format($users['balance'],0,',','.'); ?></p>
			                                                    </div>
			                                                </div>
			                                            </div>
			                                        </div>
			                                        <a href="<?= base_url(); ?>/user/topup/riwayat?status=Pending"
			                                            class="col-6 col-lg-2 d-flex px-2 pb-2">
			                                            <div class="body-games-in2 text-secondary-pointgo shadow-form text-center d-flex align-items-center justify-content-center"
			                                                style=" padding: 0.6rem;">
			                                                <div>
			                                                    <iconify-icon icon="tabler:history" style="font-size: 30px;">
			                                                    </iconify-icon>
			                                                    <p class="font-md mb-0 text-dark">Lihat Riwayat</p>
			                                                </div>
			                                            </div>
			                                        </a>
			                                        <a href="<?= base_url(); ?>/user/topup"
			                                            class="col-6 col-lg-2 d-flex px-2 pb-2">
			                                            <div class="body-games-green shadow-form text-center d-flex align-items-center justify-content-center"
			                                                style=" padding: 0.6rem;">
			                                                <div>
			                                                    <iconify-icon icon="uil:plus" style="font-size: 30px;color:#fff!important;">
			                                                    </iconify-icon>
			                                                    <p class="font-md mb-0 text-white">Top-up Saldo</p>
			                                                </div>
			                                            </div>
			                                        </a>
			                                    </div>
			                                </div>
			                            </div>
			                            
			                            
			                            <div class="pb-3">
			                                <div class="member-img-head">
			                                    <a href=" https://www.capcut.com/t/Zs8rqbCdt/">
			                                    <img src="<?= base_url(); ?>/assets/images/member-img.jpeg" class="member-img"></img>
			                                    <img src="<?= base_url(); ?>/assets/images/member-img-2.jpeg" class="member-img-2"></img>
			                                    </a>
			                                </div>
			                                <!--<div class="body-games-green shadow-form">-->
			                                <!--    <div class="row">-->
			                                <!--        <div class="title-misi">-->
			                                <!--            <center>-->
			                                <!--            <h3 style="font-size:25px; text-shadow:1px 1px 1px #000; color:var(--warna_7);">INI DIA MISI SEBENARNYA!</h3>-->
			                                <!--            <div class="text-misi-container" style="font-weight:600;">-->
			                                <!--                <p class="text-misi">-->
			                                <!--                     1. Hunters perlu menujukkan muka kamu, skin yang kalian beli saat Diamond Kuning, dan bukti transaksi dari Hidden Game, pakai template <a href="https://www.capcut.com/t/Zs8M2KNH5/" style="color:var(--warna_7); text-decoration:underline">https://www.capcut.com/t/Zs8M2KNH5/</a> SULTAN HIDDEN GAME-->
			                                <!--                </p>-->
			                                <!--                <p class="text-misi" style="color:#FF3956 !important; outline"> URUTANNYA HARUS BENAR, SEPERTI: VIDEO BANG ELLO- MUKA KAMU- FOTO SKIN YANG DIBELI SAAT EVENT DIAMOND KUNING- BUKTI TRANSAKSI-->
			                                <!--                </p>-->
			                                <!--                <p class="text-misi">-->
			                                <!--                     2. Unggah video tersebut di TikTok, JANGAN di private dan JANGAN lupa menyertakan #SultanHiddenGame-->
			                                <!--                </p>-->
			                                <!--                <p class="text-misi">-->
			                                <!--                     3. ⁠Pastikan kamu telah follow TikTok @hiddengameid dan Instagram @hiddengame.id ya.-->
			                                <!--                </p>-->
			                                <!--                <p class="text-misi">-->
			                                <!--                    4. Pastikan Kamu telah follow TikTok @Hiddengameid dan Instagram @Hiddengame.id ya-->
			                                <!--                </p>-->
			                                <!--                <h3 style="font-size:25px; text-shadow:1px 1px 1px #000; color:var(--warna_7); text-transform:uppercase">-->
			                                <!--                    Mau dapetin Rp 3.000.000? Ikuti Challenge Ini Sekarang-->
			                                <!--                </h3>-->
			                                <!--            </div>-->
			                                <!--            </center>-->
			                                <!--        </div>-->
			                                <!--    </div>-->
			                                <!--</div>-->
			                            </div>

			                            <div class="row">
			                                
			                                
			                                <div class="col-12 col-lg-6 mb-2" style="padding: 0px 5px 0px 5px;">
			                                    <div class="waves-card  d-flex gap-2">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
			                                            viewBox="0 0 57 57" fill="none">
			                                            <path
			                                                d="M0 28.5C0 12.7599 12.7599 0 28.5 0C44.2401 0 57 12.7599 57 28.5C57 44.2401 44.2401 57 28.5 57C12.7599 57 0 44.2401 0 28.5Z"
			                                                fill="white" />
			                                            <path
			                                                d="M2 28.5C2 13.8645 13.8645 2 28.5 2C43.1355 2 55 13.8645 55 28.5C55 43.1355 43.1355 55 28.5 55C13.8645 55 2 43.1355 2 28.5Z"
			                                                fill="#3771C8" />
			                                            <path
			                                                d="M34.25 36.5C32.8625 36.5 31.75 37.6125 31.75 39C31.75 39.663 32.0134 40.2989 32.4822 40.7678C32.9511 41.2366 33.587 41.5 34.25 41.5C34.913 41.5 35.5489 41.2366 36.0178 40.7678C36.4866 40.2989 36.75 39.663 36.75 39C36.75 38.337 36.4866 37.7011 36.0178 37.2322C35.5489 36.7634 34.913 36.5 34.25 36.5ZM14.25 16.5V19H16.75L21.25 28.4875L19.55 31.55C19.3625 31.9 19.25 32.3125 19.25 32.75C19.25 33.413 19.5134 34.0489 19.9822 34.5178C20.4511 34.9866 21.087 35.25 21.75 35.25H36.75V32.75H22.275C22.1921 32.75 22.1126 32.7171 22.054 32.6585C21.9954 32.5999 21.9625 32.5204 21.9625 32.4375C21.9625 32.375 21.975 32.325 22 32.2875L23.125 30.25H32.4375C33.375 30.25 34.2 29.725 34.625 28.9625L39.1 20.875C39.1875 20.675 39.25 20.4625 39.25 20.25C39.25 19.9185 39.1183 19.6005 38.8839 19.3661C38.6495 19.1317 38.3315 19 38 19H19.5125L18.3375 16.5M21.75 36.5C20.3625 36.5 19.25 37.6125 19.25 39C19.25 39.663 19.5134 40.2989 19.9822 40.7678C20.4511 41.2366 21.087 41.5 21.75 41.5C22.413 41.5 23.0489 41.2366 23.5178 40.7678C23.9866 40.2989 24.25 39.663 24.25 39C24.25 38.337 23.9866 37.7011 23.5178 37.2322C23.0489 36.7634 22.413 36.5 21.75 36.5Z"
			                                                fill="white" />
			                                        </svg>
			                                        <div class="d-flex align-items-center">
			                                            <div>
			                                                <p class="mb-0 text-dark" >Total Pesanan</p>
			                                                <p class="mb-0 text-secondary-pointgo">
			                                                    <?= number_format($orders,0,',','.'); ?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-12 col-lg-6 mb-2" style="padding: 0px 5px 0px 5px;">
			                                    <div class="waves-card  d-flex gap-2">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
			                                            viewBox="0 0 57 57" fill="none">
			                                            <path
			                                                d="M0 28.5C0 12.7599 12.7599 0 28.5 0C44.2401 0 57 12.7599 57 28.5C57 44.2401 44.2401 57 28.5 57C12.7599 57 0 44.2401 0 28.5Z"
			                                                fill="white" />
			                                            <path
			                                                d="M28.5 3C35.263 3 41.749 5.6866 46.5312 10.4688C51.3134 15.251 54 21.737 54 28.5C54 35.263 51.3134 41.749 46.5312 46.5312C41.749 51.3134 35.263 54 28.5 54C21.737 54 15.251 51.3134 10.4688 46.5312C5.6866 41.749 3 35.263 3 28.5C3 21.737 5.6866 15.251 10.4688 10.4688C15.251 5.6866 21.737 3 28.5 3ZM25.3234 33.5308L19.6588 27.8625C19.4557 27.6594 19.2146 27.4983 18.9493 27.3884C18.684 27.2785 18.3996 27.222 18.1124 27.222C17.8252 27.222 17.5408 27.2785 17.2755 27.3884C17.0102 27.4983 16.7691 27.6594 16.566 27.8625C16.1559 28.2726 15.9255 28.8289 15.9255 29.4089C15.9255 29.9889 16.1559 30.5452 16.566 30.9553L23.7789 38.1681C23.9814 38.3722 24.2223 38.5342 24.4877 38.6448C24.7531 38.7553 25.0377 38.8122 25.3252 38.8122C25.6128 38.8122 25.8974 38.7553 26.1628 38.6448C26.4282 38.5342 26.6691 38.3722 26.8716 38.1681L41.8074 23.2288C42.0131 23.0266 42.1769 22.7856 42.2891 22.5198C42.4012 22.2539 42.4597 21.9685 42.461 21.68C42.4624 21.3915 42.4066 21.1056 42.2969 20.8387C42.1872 20.5719 42.0257 20.3294 41.8218 20.1252C41.6179 19.9211 41.3756 19.7593 41.1089 19.6493C40.8421 19.5393 40.5563 19.4831 40.2678 19.4841C39.9792 19.4851 39.6938 19.5433 39.4278 19.6551C39.1619 19.767 38.9207 19.9305 38.7182 20.136L25.3234 33.5308Z"
			                                                fill="#86BC28" />
			                                        </svg>
			                                        <div class="d-flex align-items-center">
			                                            <div>
			                                                <p class="mb-0 text-dark">Pesanan Sukses</p>
			                                                <p class="mb-0 text-secondary-pointgo">
			                                                    <?= number_format($jumlahsukses,0,',','.'); ?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-12 col-lg-6 mb-2" style="padding: 0px 5px 0px 5px;">
			                                    <div class="waves-card  d-flex gap-2">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
			                                            viewBox="0 0 57 57" fill="none">
			                                            <path
			                                                d="M0 28.5C0 12.7599 12.7599 0 28.5 0C44.2401 0 57 12.7599 57 28.5C57 44.2401 44.2401 57 28.5 57C12.7599 57 0 44.2401 0 28.5Z"
			                                                fill="white" />
			                                            <path
			                                                d="M28.5 2.61131C14.2019 2.61131 2.61131 14.2019 2.61131 28.5C2.61131 42.7981 14.2019 54.3887 28.5 54.3887C42.7981 54.3887 54.3887 42.7981 54.3887 28.5C54.3887 14.2019 42.7981 2.61131 28.5 2.61131ZM30.7355 42.5362V46.1825H27.2478V42.5772C21.5246 41.7935 19.0184 37.091 19.0184 37.091L22.5809 34.1109C22.5809 34.1109 24.8556 38.0707 28.9703 38.0707C31.2431 38.0707 32.9674 36.8541 32.9674 34.7753C32.9674 29.9161 19.8752 30.5057 19.8752 21.4908C19.8752 17.572 22.9746 14.7487 27.246 14.0808V10.4381H30.7337V14.0808C33.7119 14.4727 37.2388 16.0402 37.2388 19.4121V21.9984H32.6147V20.7444C32.6147 19.4513 30.967 18.5891 29.1234 18.5891C26.7722 18.5891 25.0497 19.7647 25.0497 21.4106C25.0497 26.3874 38.1419 25.1726 38.1419 34.6186C38.1419 38.5017 35.242 41.8683 30.7355 42.5362Z"
			                                                fill="#86BC28" />
			                                        </svg>
			                                        <div class="d-flex align-items-center">
			                                            <div>
			                                                <p class="mb-0 text-dark">Total Belanja Sukses</p>
			                                                <p class="mb-0 text-secondary-pointgo">
			                                                    Rp <?= number_format($jumlahorder,0,',','.'); ?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-12 col-lg-6 mb-2" style="padding: 0px 5px 0px 5px;">
			                                    <div class="waves-card  d-flex gap-2">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
			                                            viewBox="0 0 57 57" fill="none">
			                                            <path
			                                                d="M0 28.5C0 12.7599 12.7599 0 28.5 0C44.2401 0 57 12.7599 57 28.5C57 44.2401 44.2401 57 28.5 57C12.7599 57 0 44.2401 0 28.5Z"
			                                                fill="white" />
			                                            <path
			                                                d="M28.5 3C42.5836 3 54 14.4164 54 28.5C54 42.5836 42.5836 54 28.5 54C14.4164 54 3 42.5836 3 28.5C3 14.4164 14.4164 3 28.5 3ZM28.5 13.2C27.8237 13.2 27.1751 13.4687 26.6969 13.9469C26.2187 14.4251 25.95 15.0737 25.95 15.75V28.5C25.9501 29.1762 26.2189 29.8247 26.6971 30.3028L34.3471 37.9529C34.8281 38.4174 35.4722 38.6744 36.1408 38.6686C36.8094 38.6628 37.449 38.3946 37.9218 37.9218C38.3946 37.449 38.6628 36.8094 38.6686 36.1408C38.6744 35.4722 38.4174 34.8281 37.9529 34.3471L31.05 27.4443V15.75C31.05 15.0737 30.7813 14.4251 30.3031 13.9469C29.8249 13.4687 29.1763 13.2 28.5 13.2Z"
			                                                fill="#F09932" />
			                                        </svg>
			                                        <div class="d-flex align-items-center">
			                                            <div>
			                                                <p class="mb-0 text-dark">Pesanan Tertunda/Dalam Proses</p>
			                                                <p class="mb-0 text-secondary-pointgo">
			                                                    <?= number_format($riwayatpen,0,',','.'); ?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>

			                            <div class="pt-4 text-right">
			                                <a class="btn btn-logout" href="<?= base_url(); ?>/logout"><i
			                                        class="fa fa-sign-out mr-2"></i> Logout
			                                </a>
			                            </div>


			                        </div>
			                    </div>
			                </div>

			                <?= $this->include('header-user'); ?>

			                <div class="col-lg-12" hidden>

			                    <div class="pb-3">
			                        <div class="section-game shadow-md " style="padding:10px">


			                            <div class="table-responsive table-dark ">
			                                <table id="table" data-page-size="20" data-toggle="table"
			                                    data-search-highlight="true" data-search="true" data-filter-control="true"
			                                    data-pagination="true" class="table table-dark table-striped">
			                                    <thead>
			                                        <tr>
			                                            <th>No</th>
			                                            <th>Tanggal</th>
			                                            <th>Username</th>
			                                            <th>Produk</th>
			                                            <th>Harga</th>
			                                            <th>Tujuan</th>
			                                            <th>Metode</th>
			                                            <th data-filter-control="select" data-field="status"
			                                                data-sortable="true">
			                                                Status</th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                        <?php $no = 1; foreach ($riwayat as $loop): ?>
			                                        <tr>
			                                            <td><?= $no++; ?></td>
			                                            <td><?= $loop['date_create']; ?></td>
			                                            <td>

			                                                <?= $loop['username']; ?><br>

			                                                <?php if (!empty($loop['username'])): ?>
			                                                Saldo Sebelum : Rp
			                                                <?= number_format($loop['saldosb'],0,',','.') ; ?><br>
			                                                Saldo Setelah : Rp
			                                                <?= number_format($loop['saldost'],0,',','.') ; ?><br>
			                                                <?php endif ?>


			                                            </td>
			                                            <td>
			                                                <p class="mb-1"><?= $loop['product']; ?></p>


			                                                <?php if (!empty($loop['voucher'])): ?>
			                                                <i class="fa fa-ticket"></i>
			                                                <?php endif ?>

			                                                <?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
			                                                <b class="cursor-pointer text-success"
			                                                    onclick="detail('<?= $loop['order_id']; ?>');">No Trx :
			                                                    <?= $loop['order_id']; ?></b><br>
			                                                <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
			                                                <b class="cursor-pointer text-warning"
			                                                    onclick="detail('<?= $loop['order_id']; ?>');">No Trx :
			                                                    <?= $loop['order_id']; ?></b><br>
			                                                <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
			                                                <b class="cursor-pointer text-warning"
			                                                    onclick="detail('<?= $loop['order_id']; ?>');">No Trx :
			                                                    <?= $loop['order_id']; ?></b><br>
			                                                <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
			                                                <b class="cursor-pointer text-danger"
			                                                    onclick="detail('<?= $loop['order_id']; ?>');">No Trx :
			                                                    <?= $loop['order_id']; ?></b><br>
			                                                <?php endif ?>




			                                            </td>

			                                            <td>Rp <?= number_format($loop['price'],0,',','.') ; ?></td>

			                                            <td>

			                                                <?php 
												    
												    if ($loop['zone_id'] == 1) {
												        echo $loop['user_id'];
												    } else {
												        echo $loop['user_id'].' ('.$loop['zone_id'].') ';
												    }
													
													?>

			                                            </td>
			                                            <td>
			                                                <?= $loop['method']; ?><br>

			                                            </td>

			                                            <td>
			                                                <?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
			                                                <?= $loop['status']; ?>
			                                                <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
			                                                <?= $loop['status']; ?>
			                                                <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
			                                                <?= $loop['status']; ?>
			                                                <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
			                                                <?= $loop['status']; ?>
			                                                <?php endif ?>



			                                            </td>
			                                        </tr>
			                                        <?php endforeach ?>
			                                    </tbody>
			                                </table>
			                            </div>

			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>

			    <?php $this->endSection(); ?>

			    <?php $this->section('js'); ?>
			    <?php $this->endSection(); ?>