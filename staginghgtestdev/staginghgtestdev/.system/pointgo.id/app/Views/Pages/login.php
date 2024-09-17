			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
                .section {
                    max-width: 370px;
					height: auto;
                    margin: auto;
                }

                .text-dark {
                    font-weight: 700;
                }

                .masuk {
                    background: transparent;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                    color: var(--warna_5) !important;
                }

                .masuk:hover {
                    background: var(--warna_3) !important;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                    color: #fff !important;
                }

                .normal {
                    text-transform: none;
                }
                
                .card-bg-1-img {
                    width: 65%;
                    position: absolute;
                    z-index: -999;
                    animation: upDown 3s infinite;
                }
                
                @media (max-width:768px) {
                    .card-bg-1-img {
                        display: none;
                    }
                }
                
                @keyframes upDown {
                    0% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-30px);
                    }
                    100% {
                        transform: translateY(0);
                    }
                }
                body {
                    background: #F7F7F7 !important;
                }
                
                .video-background {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                overflow: hidden;
                z-index: -1;
            }
            
            #bg-leaf-top-left {
                display: none;
            }
                            
            #bg-leaf-top-right {
                display: none;
            }
                            
            #bg-leaf-bottom-left {
                display: none;
            }
                            
            #bg-leaf-bottom-right {
                display: none;
            }
            
            .loader {
            left: 0;
            right: 0;
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
            width: 40px; /* Ukuran lebih kecil untuk daun dengan index ganjil */
            height: 40px;
            animation-name: loader-ccw; /* Animasi rotasi berlawanan arah jarum jam */
        }
        .loader span:nth-child(even) {
            width: 70px; /* Ukuran lebih besar untuk daun dengan index genap */
            height: 70px;
            animation-name: loader; /* Animasi rotasi searah jarum jam */
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


            </style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="video-background">
                        <!--<video autoplay muted loop id="bg-video">-->
                        <!--    <source src="<?= base_url(); ?>/assets/images/daun3.webm" type="video/webm">-->
                        <!--</video>-->
                        <div class="loader">
                            <span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span>
                            <span></span><span></span><span></span><span></span><span></span>
                        </div>
                        </div>
			    <div class="container">
			    	<div class="row justify-content-end">
			    	    <div class="col-lg-6">
			    	        <div class="card-bg">
			    	            <img src="<?= base_url(); ?>/assets/images/card-bg-1.png" class="card-bg-1-img">
			    	        </div>
			    	    </div>
					    <div class="col-lg-5">
					    	<div class="pt-3 pb-4">
					            <h5 hidden>Login Member</h5>
					            <span class="strip-primary" hidden></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">

					                	<?= alert(); ?>

					                    <form role="form" action="" method="POST">
										<img class="pointgo" src="<?= base_url(); ?>/assets/images/logo-hidden.png">
										<h5 class="text-left pb-3" style="color:var(--warna_5); padding-top:2rem; font-size:30px">Login Member</h5>
					                        <div class="form-group mb-2">
					                            <p style="color:var(--warna_hitam)!important;font-weight: bold;">Username</p>
					                            <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required autocomplete="off">
					                        </div>
					                        <div class="form-group mb-3">
					                            <p style="color:var(--warna_hitam)!important;font-weight: bold;">Password</p>
					                            <input type="password" name="password" placeholder="Masukkan Password" class="form-control" required>
					                        </div>
					                        <div class="g-recaptcha mt-3 mb-3" data-sitekey="<?= $sitekey ?>" id="recaptcha"></div>
					                        <button type="submit" name="tombol" value="submit" class="btn btn-primary btn-block normal" style="color:#fff !important;">Masuk</button>
					                    </form>
					                    <p class="mt-3 text-center" ><a href="<?= base_url(); ?>/forgotpass" style="color: var(--warna_5);">Lupa password?</a></p>
									    <hr style="margin:0 !important;">
									    <div class="d-flex justify-content-center flex-col">
        									<p class="mt-3 normal" style="color:var(--warna_5)">Belum Memiliki akun?</p>
        								</div>
        								<div class="d-flex justify-content-center flex-col">
        									<a href="<?= base_url(); ?>/register" class="btn btn-primary masuk normal">Daftar</a>
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