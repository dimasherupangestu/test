<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5">
<style>
    .slidecontainer {
        width: 100%;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #bb7e00;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
        border-radius: 12px;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #FFFF00;
        cursor: pointer;
        border-radius: 12px;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #000000;
        cursor: pointer;
    }
    
    .container-content {
        /*background: linear-gradient(to right, #6cae5f 0%, #96c353 100%);*/
        background: var(--warna_3);
        /*background: url('<?= base_url(); ?>/assets/images/bg-kalkulator-HG-4.jpg');*/
        border-radius: 50px;
        border: 2px solid #fff;
        background-size: cover;
        padding: 40px;
        margin-left: 10%;
        margin-right: 10%;
        background-size: cover;
        }
        
        @media only screen and (max-width: 768px) {
        .container-content {
        background-size: cover ;
        border-radius: 60px 60px 60px 60px;
        margin-left: 5%;
        margin-right: 5%
        }
    }
    
        @media (min-width:769px){
            .container-content {
                /*margin-left: 25%;*/
                /*margin-right: 25%;*/
            }
        }
    
        @media (max-width:768px) {
            /*img {*/
            /*    width: 75%;*/
            /*}*/
        }
        
        .video-background {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }
        
/*        
        
        

</style>
    <div class="wrapper pt-4">
        <br>
        <div class="container-content" style="text-align:center;">
            <!--<img src="<?= base_url(); ?>/assets/images/Logo-Hidden-Game-09.png" style="width:40%; z-index:-1; position:relative">-->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="text-center mb-3">
                        <div class="video-background">
                        <video autoplay muted loop id="bg-video">
                            <source src="<?= base_url(); ?>/assets/images/daun3.webm" type="video/webm">
                        </video>
                        </div>
                        <img src="<?= base_url(); ?>/assets/images/Logo-Hidden-Game-09.png" style="width:80%;">
                        <h5 class="mt-3 mb-1" style="color:#fff; text-shadow: 2px 2px 4px #000000">Kalkulator Zodiac</h5>
                        <p class="text-white" style="text-shadow: 2px 2px 4px #000000">Kalkulator Zodiac ini berfungsi untuk mengetahui total maksimal diamond yang kamu butuhkan untuk mendapatkan skin Zodiac.<br></p>
                    </div>
                    <form method="post" target="">
                        <div class="row justify-content-center">
                            <h5 class="text-white mt-3 mb-1" style="text-shadow: 2px 2px 4px #000000">Geser Sesuai Point Zodiac Anda</h5>
                            <div class="col-12 col-lg-8 mb-5">
                            </div>
                        </div>
                    </form>
                    <span id="resultText" class="text-center d-block"> </span>
                    <div class="slidecontainer">
                        <span>
                        <span class="text-white" style="text-shadow: 2px 2px 4px #000000">Star Point Anda : </span>
                        </span> <span id="f" style="font-weight:bold;color:#fff; text-shadow: 2px 2px 4px #000000">59</span><br>
                        <input type="range" min="0" max="99" value="50" name="sld6" class="slider" id="myRange" onchange="show_value2(this.value)">
                        <span style="text-shadow: 2px 2px 4px #000000; color:#fff;">Membutuhkan Maksimal : </span><span id="slider_value2" style="color:white;font-weight:bold; text-shadow: 2px 2px 4px #000000">697 </span> <span style="color:#fff; font-weight:bold; text-shadow: 2px 2px 4px #000000"> Diamond</span>
                        <p>&nbsp;</p>
                        <!--<img src="https://pointgo.id/assets/images/product/1707479138_73ca2be4e7105270a311.webp">-->
                    </div>
                </div>
            </div>
        </div>


        <script>
            function show_value2(x) {

                if (x < 90) {
                    yz = Math.ceil((2000 - x * 20) * 850 / 1000);
                }

                if (x > 89) {
                    yz = Math.ceil((2000 - x * 20));
                }

                document.getElementById("slider_value2").innerHTML = yz;

            }
        </script>
        <script>
            var slideCol = document.getElementById("myRange");
            var y = document.getElementById("f");
            y.innerHTML = slideCol.value;

            slideCol.oninput = function() {
                y.innerHTML = this.value;
            }
        </script>

    </div>
</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>