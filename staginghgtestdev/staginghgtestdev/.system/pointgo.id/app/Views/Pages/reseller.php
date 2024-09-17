			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
.platinum-section {
    background: url(<?= base_url();?>/assets/images/background-mobile-platinum.png) center/cover !important;
}
.section {
    border-radius: 26px;
}
.d-grid {
    display: grid;
}
.text-end {
    text-align: end;
}
.card-bg-half-white {
    background: #FFFFFF0D;
    padding: 13px;
    margin: 10px 0;
    border-radius: 10px;
}
.badge-blue {
    background: #4031B3;
    padding: 5px 13px;
    margin: 10px 0;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 600;
}
p, h1, h2, h3, h4, h5, h6 {
    margin-bottom: 0;
}
.text-primary {
    color: var(--warna_4) !important;
}

ul {
    list-style: none;
}

.menu-list-reseller li::before  {
    position: absolute;
    width: 30px;
    height: 30px;
    content: "";
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C19.9936 4.47982 15.5202 0.00642897 10 0Z" fill="%235243C2" fill-opacity="0.103693"/><path d="M15.7722 6.83362L10.068 14.5745C9.93197 14.7549 9.72912 14.8732 9.50503 14.9027C9.28094 14.9321 9.05441 14.8703 8.87634 14.7311L4.80301 11.4745C4.44356 11.1868 4.38536 10.6622 4.67301 10.3028C4.96066 9.94334 5.48523 9.88514 5.84468 10.1728L9.24134 12.8903L14.4305 5.84778C14.6007 5.59244 14.8974 5.45127 15.2029 5.48032C15.5083 5.50936 15.7731 5.70393 15.8921 5.98676C16.0111 6.2696 15.965 6.59494 15.7722 6.83362Z" fill="%235243C2"/></svg>');
    background-repeat: no-repeat;
}
.menu-list-reseller li p {
    margin-left: 30px;
}
.menu-list-reseller li {
    margin-bottom: 10px;
}
.menu-list-reseller.menu-list-platinum li::before  {
    position: absolute;
    width: 30px;
    height: 30px;
    content: "";
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path opacity="0.1" d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C19.9936 4.47982 15.5202 0.00642897 10 0Z" fill="white"/><path d="M15.7722 6.83362L10.068 14.5745C9.93197 14.7549 9.72912 14.8732 9.50503 14.9027C9.28094 14.9321 9.05441 14.8703 8.87634 14.7311L4.80301 11.4745C4.44356 11.1868 4.38536 10.6622 4.67301 10.3028C4.96066 9.94334 5.48523 9.88514 5.84468 10.1728L9.24134 12.8903L14.4305 5.84778C14.6007 5.59244 14.8974 5.45127 15.2029 5.48032C15.5083 5.50936 15.7731 5.70393 15.8921 5.98676C16.0111 6.2696 15.965 6.59494 15.7722 6.83362Z" fill="white"/></svg>'); 
    background-repeat: no-repeat;
}

.btn-primary-transparant {
    color: var(--warna_2) !important;
    background: var(--warna_3);
    border: 1px solid var(--warna_5);
    padding: 10px 20px;
    justify-content: center;
    align-items: center;
    border-radius: 999px;
}

.btn-primary-transparant:hover {
    color: #eee !important;
}
.silver-img:before  {
    position: absolute;
    bottom: 0;
    width: 40px;
    height: 40px;
    content: "";
    background: url(<?= base_url();
    ?>/assets/images/silver-medal.png) top/cover;
    text-align: center;
    border-radius: 0 5px 0 0;
}
.gold-img:before  {
    position: absolute;
    bottom: 0;
    width: 40px;
    height: 40px;
    content: "";
    background: url(<?= base_url();
    ?>/assets/images/gold-medal.png) top/cover;
    text-align: center;
    border-radius: 0 5px 0 0;
}
.platinum-img:before  {
    position: absolute;
    bottom: 0;
    width: 40px;
    height: 40px;
    content: "";
    background: url(<?= base_url();
    ?>/assets/images/platinum.png) top/cover;
    text-align: center;
    border-radius: 0 5px 0 0;
}
    
            </style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
<div class="content" style="min-height: 580px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="pt-3 pb-4">
                    <h3>RESELLER <?= $web['name'] ?></h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 col-md-6 d-grid mb-3">
                        <div class="section d-flex flex-column">
                            <div class="card-body">
                                <div class="col-12 d-flex justify-content-end">
                                        <div class="badge-blue text-primary" style="background: transparent !important"></div>
                                    </div>
                                <div class="row align-items-center mb-4">
                                    <div class="col-12 silver-img">
                                        <h4 class="mb-0 ml-5">Level Silver</h4>
                                    </div>
                                </div>
                                <div class="card-bg-half-white">
                                    <p>dari harga <a style="text-decoration: line-through;">Rp 599.000</a></p>
                                    <h3 class="text-primary">Rp <?= number_format($price['silver'], 0, ',', '.'); ?></h3>
                                </div>
                                <ul class="menu-list menu-list-reseller">
                                    <li><p>Mendapatkan 2-3% harga lebih murah dari Harga Normal</p></li>
                                    <li><p>Bisa digunakan pribadi ataupun dijual kembali</p></li>
                                    <li><p>Berlaku seumur hidup</p></li>
                                    <li><p>Potongan Harga hanya berlaku untuk Kategori Game Populer</p></li>
                                </ul>
                                
                            </div>
                            <div class="mt-4 mx-4 mb-4">
									<a href="https://api.whatsapp.com/send?phone=6285600000030&text=Halo%20Min%2C%20Mau%20daftar%20jadi%20reseller" class="btn btn-block btn-primary-transparant">Daftar Sekarang</a>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 col-md-6 d-grid mb-3">
                        <div class="section d-flex flex-column">
                            <div class="card-body">
                                <div class="col-12 d-flex justify-content-end">
                                        <div class="badge-blue text-primary" style="background: transparent !important"></div>
                                    </div>
                                <div class="row align-items-center mb-4">
                                    <div class="col-12 gold-img">
                                        <h4 class="mb-0 ml-5">Level Gold</h4>
                                    </div>
                                </div>
                                <div class="card-bg-half-white">
                                    <p>dari harga <a style="text-decoration: line-through;">Rp 999.000</a></p>
                                    <h3 class="text-primary">Rp <?= number_format($price['gold'], 0, ',', '.'); ?></h3>
                                </div>
                                <ul class="menu-list menu-list-reseller">
                                    <li><p>Mendapatkan 3-5% harga lebih murah dari Harga Normal</p></li>
                                    <li><p>Bisa digunakan pribadi ataupun dijual kembali</p></li>
                                    <li><p>Berlaku seumur hidup</p></li>
                                    <li><p>Potongan Harga berlaku untuk seluruh Kategori Produk</p></li>
                                </ul>
                            </div>
                            <div class="mt-4 mx-4 mb-4">
									<a href="https://api.whatsapp.com/send?phone=6285600000030&text=Halo%20Min%2C%20Mau%20daftar%20jadi%20reseller" class="btn btn-block btn-primary-transparant">Daftar Sekarang</a>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 col-md-6 d-grid">
                            <div class="section platinum-section d-flex flex-column mb-3">
                                
                                <div class="card-body">
                                    <div class="col-12 d-flex justify-content-end">
                                        <div class="badge-blue text-primary">MOST POPULAR</div>
                                    </div>
                                <div class="row align-items-center mb-4">
                                    <div class="col-12 platinum-img">
                                        <h4 class="mb-0 ml-5 text-white">Level Platinum</h4>
                                    </div>
                                </div>
                                <div class="card-bg-half-white">
                                    <p class="text-white">dari harga <a style="text-decoration: line-through;">Rp 1.499.000</a></p>
                                    <h3 class="text-primary">Rp <?= number_format($price['platinum'], 0, ',', '.'); ?></h3>
                                </div>
                                <ul class="menu-list menu-list-reseller menu-list-platinum">
                                    <li><p class="text-white">Mendapatkan 10-15% harga lebih murah dari Harga Normal</p></li>
                                    <li><p class="text-white">Bisa digunakan pribadi ataupun dijual kembali</p></li>
                                    <li><p class="text-white">Potongan Harga berlaku untuk seluruh Kategori Produk</p></li>
                                    <li><p class="text-white">Prioritas Customer Service</p></li>
                                    <li><p class="text-white">Tips & Trick Bisnis Special dari <?= $web['name'] ?></p></li>
                                </ul>
                            </div>
                            <div class="mt-4 mx-4 mb-4">
									<a href="https://api.whatsapp.com/send?phone=6285600000030&text=Halo%20Min%2C%20Mau%20daftar%20jadi%20reseller" class="btn btn-block btn-primary-transparant">Daftar Sekarang</a>
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