<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5">
    <div class="wrapper pt-4">
        <br>
        
        <style>
        
        .container-content {
        /*background: linear-gradient(to bottom, rgba(108, 174, 95, 1) 0%, rgba(150, 195, 83, 0.5) 100%);*/
        /*background: linear-gradient(to bottom, #6cae5f 0%, #96c353 100%);*/
        /*background: var(--warna_3);*/
        /*background: url('<?= base_url(); ?>/assets/images/bg-kalkulator-3-HG.webp');*/
        background: ;
        background-size: cover;
        padding: 40px;
        border-radius: 100px; 
        border: 2px solid #fff;
        margin-left: 10%;
        margin-right: 10%;
        
        --background-color: rgba(255, 255, 255, 0.5);
        --s: 40px; /* control the size */
        --c1: #6cae5f;
        --c2: #96c353;
          
        --_g: 
        var(--c2) 6%  14%,var(--c1) 16% 24%,var(--c2) 26% 34%,var(--c1) 36% 44%,
        var(--c2) 46% 54%,var(--c1) 56% 64%,var(--c2) 66% 74%,var(--c1) 76% 84%,var(--c2) 86% 94%;
        
        background:
        radial-gradient(100% 100% at 100% 0,var(--c1) 4%,var(--_g),#0008 96%,#0000),
        radial-gradient(100% 100% at 0 100%,#0000, #0008 4%,var(--_g),var(--c1) 96%)
        var(--c1);
        background-size: var(--s) var(--s);
        background-color: var(--background-color);
    }
        
        .container-content:before {
            
        }
        
        @media (max-width:768px){
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
        </style>
        
        <div class="container-content">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="text-center mb-3">
                        <div class="video-background">
                        <video autoplay muted loop id="bg-video">
                            <source src="<?= base_url(); ?>/assets/images/daun3.webm" type="video/webm">
                        </video>
                        </div>
                        <img src="<?= base_url(); ?>/assets/images/Logo-Hidden-Game-09.png" style="width:80% ;">
                    </div>
                    <form class="mb-3">
                        <div class="mb-3"><label class="mb-1 " for="idMatch">Total Pertandingan Anda</label>
                            <input type="number" placeholder="Contoh: 351" autofocus="" autocomplete="off" id="tMatch"
                                class="form-control">
                        </div>
                        <div class="mb-3"><label class="mb-1 " for="tWr">Total Win Rate Anda</label>
                            <input type="number" placeholder="Contoh: 51.4%" step="any" autocomplete="off" id="tWr"
                                class="form-control">
                        </div>
                        <div class="mb-3"><label class="mb-1 " for="wrReq">Win Rate yang anda
                                inginkan</label>
                            <input type="number" placeholder="Contoh: 70%" step="any" autocomplete="off" id="wrReq"
                                class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary d-block w-100" type="button" id="hasil">Hasil</button>
                            </div>
                        </div>
                    </form>
                    <span id="resultText" class="text-center d-block" style="color:#fff"> </span>
                </div>
            </div>
        </div>
        <style>
            label {
                color: #fff;}
        </style>
        <script>
            // Variables
            const tMatch = document.querySelector("#tMatch");
            const tWr = document.querySelector("#tWr");
            const wrReq = document.querySelector("#wrReq");
            const hasil = document.querySelector("#hasil");
            const resultText = document.querySelector("#resultText");

            // Functions
            function res() {
                const resultNum = rumus(tMatch.value, tWr.value, wrReq.value);
                const text =
                    `Kamu memerlukan sekitar <b>${resultNum}</b> win tanpa lose untuk mendapatkan win rate <b>${wrReq.value}%</b>`;
                resultText.innerHTML = text;
            }

            function rumus(tMatch, tWr, wrReq) {
                let tWin = tMatch * (tWr / 100);
                let tLose = tMatch - tWin;
                let sisaWr = 100 - wrReq;
                let wrResult = 100 / sisaWr;
                let seratusPersen = tLose * wrResult;
                let final = seratusPersen - tMatch;
                return Math.round(final);
            }

            // Main
            window.addEventListener("load", init);

            function init() {
                load();
                eventListener();
            }

            function load() { }

            function eventListener() {
                hasil.addEventListener("click", res);
            }
        </script>
    </div>
</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>