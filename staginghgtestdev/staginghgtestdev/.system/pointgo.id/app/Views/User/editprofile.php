			<?php $this->extend('template'); ?>

			<?php $this->section('css'); ?>
			<style>
@media (min-width: 1100px) {
    .fab-container {
        right: 278px;
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

.icon-right-edit {
    padding-left: 1rem;
    align-items: center;
    right: 25px;
    top: 85px;
    bottom: 0;
    position: absolute;
    pointer-events: none;
    z-index: 20;
    display: flex;
}

 </style>
			<?php $this->endSection(); ?>

			<?php $this->section('content'); ?>
			<p style="top: 20%; position: absolute; z-index: 999; left: 10%; color:#fff; font-size:32px; font-weight:700 ">Profile</p>
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
			                            <h5 class="text-center pb-4">Edit Profil</h5>
			                            <div class="pb-4 text-center">
			                                <div class="mb-2">
			                                    <img src="<?= base_url(); ?>/assets/images/new-assets/user.png"
			                                        width="80px"></img>
			                                </div>
			                                <div>
			                                    <h5><?= $users['username']; ?></h5>
			                                    <p><?= $users['fullname']; ?></p>
			                                    <p><?= $users['wa']; ?></p>
			                                </div>
			                            </div>

			                            <div class="row">
			                                <div class="col-12">
			                                    <form action="" method="POST">
			                                        <div class="form-group">
			                                            <h5>Username</h5>
			                                            <input type="text" class="form-control" disabled
			                                                value="<?= $users['username']; ?>">
			                                            <small style="color: rgba(255, 84, 62, 1);">Username tidak dapat
			                                                diganti</small>
			                                        </div>
			                                        
			                                        <!--<div class="form-group">-->
			                                        <!--    <h5>Nama Lengkap</h5>-->
                                           <!--            <input type="text" class="form-control" autocomplete="off" name="fullname"  value="<?= $users['fullname']; ?>">-->
                                           <!--          </div>-->
			                                         <!--<div class="text-right">-->
                                            <!--            <button style="color: var(--warna_4)" class="btn" type="reset">Batal</button>-->
                                            <!--            <button class="btn btn-primary" type="submit" name="namalengkap" value="submit">Simpan</button>-->
                                            <!--        </div>-->

			                                        <div class="form-group">
			                                            <h5>Whatsapp</h5>
			                                            <a href="#" class="icon-right-edit">
			                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                    viewBox="0 0 16 16" fill="none">
			                                                    <path
			                                                        d="M9.125 6.875L14.75 1.25M14.75 1.25H11M14.75 1.25V5M14.75 9.5V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V2.75C1.25 2.35218 1.40804 1.97064 1.68934 1.68934C1.97064 1.40804 2.35218 1.25 2.75 1.25H6.5"
			                                                        stroke="var(--warna_4)" stroke-width="2" stroke-linecap="round"
			                                                        stroke-linejoin="round" />
			                                                </svg>
			                                            </a>
			                                            <input type="number" disabled class="form-control"
			                                                value="<?= $users['wa']; ?>" name="wa">
			                                        </div>
			                                        <div class="text-right">
			                                            <button style="color: var(--warna_4)" class="btn"
			                                                type="reset">Batal</button>
			                                            <button class="btn btn-primary" type="submit" name="tombol"
			                                                value="submit">Simpan</button>
			                                        </div>
			                                    </form>
			                                </div>
			                            </div>
			                            <div class="row">
			                                <div class="col-12">
			                                    <h5>Ganti Password</h5>
			                                    <form action="" method="POST">
			                                        <div class="form-group">
			                                            <h6 style="color:#333333 !important">Password Lama</h6>
			                                            <a href="#" class="icon-right-edit" style="top: 0px;" hidden>
			                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                    viewBox="0 0 16 16" fill="none">
			                                                    <path
			                                                        d="M9.125 6.875L14.75 1.25M14.75 1.25H11M14.75 1.25V5M14.75 9.5V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V2.75C1.25 2.35218 1.40804 1.97064 1.68934 1.68934C1.97064 1.40804 2.35218 1.25 2.75 1.25H6.5"
			                                                        stroke="var(--warna_4)" stroke-width="2" stroke-linecap="round"
			                                                        stroke-linejoin="round" />
			                                                </svg>
			                                            </a>
			                                            <input type="password" class="form-control" name="passwordl">
			                                        </div>
			                                        <div class="form-group">
			                                            <h6 style="color:#333333 !important">Password Baru</h6>
			                                            <input type="password" class="form-control" name="passwordb">
			                                        </div>
			                                        <div class="form-group">
			                                            <h6 style="color:#333333 !important">Ulangi Password Baru</h6>
			                                            <input type="password" class="form-control" name="passwordbb">
			                                        </div>
			                                        <div class="text-right">
			                                            <button style="color: var(--warna_4)" class="btn"
			                                                type="reset">Batal</button>
			                                            <button class="btn btn-primary" type="submit" name="btn_password"
			                                                value="password">Simpan</button>
			                                        </div>
			                                    </form>
			                                </div>

			                            </div>

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