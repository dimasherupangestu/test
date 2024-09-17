			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>

			<style>
                .section {
                    max-width: 370px;
                    height: auto;
                    margin: auto;
                }

                .text-white {
                    font-weight: 700;
                }

                .masuk {
                    color: var(--warna_5) !important;
                    background: transparent;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                }

                .masuk:hover {
                    color: #000 !important;
                    background: var(--warna_3) !important;
                    border: 1px solid var(--warna_5);
                    display: flex;
                    width: 153px;
                    padding: 10px 20px;
                    justify-content: center;
                    align-items: center;
                }

                .normal {
                    text-transform: none;
                }

            </style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			    	<div class="row justify-content-center">
					    <div class="col-lg-9">
					    	<div class="pt-3 pb-4">
					            <h5 hidden>Register Member</h5>
					            <span class="strip-primary" hidden></span>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">

					                	<?= alert(); ?>

					                   <form role="form" action="" method="POST">
                                            <div class="form-group mb-2">
											<img class="pointgo" src="<?= base_url(); ?>/assets/images/pointgo.svg">
                                       		<h5 class="text-center pb-3">Verifikasi OTP</h5>
											<p>Masukan kode OTP yang telah kami kirimkan ke Whatsapp Anda untuk mengaktifkan akun</p>
                                                <input type="number" name="otp" placeholder="Masukkan Kode OTP" class="form-control mb-3" required autocomplete="off">
                                            </div>
                                                              
                                            <button type="submit" name="submit_otp" value="submit" class="btn btn-primary btn-block normal">Verifikasi</button>
                                        </form>


					                    <p class="mt-3" hidden>Sudah memiliki akun? <a href="<?= base_url(); ?>/login">Login</a></p>
					                </div>
					            </div>
									<div class="d-flex justify-content-center flex-col">
                                        <p class="mt-3 normal">Sudah Memiliki akun?</p>
                                    </div>
                                    <div class="d-flex justify-content-center flex-col">
                                        <a href="<?= base_url(); ?>/login" class="btn btn-primary masuk normal">Masuk</a>
                                    </div>
					        </div>
					    </div>
					</div>
			    </div>
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
    <!-- Facebook Pixel Code -->
   <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  
  fbq('init', '{1348541312730113}');
  fbq('init', '{9532506813488688}');
  fbq('init', '{584979920420062}');
  fbq('track', 'CompleteRegistration');
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={1348541312730113}&ev=CompleteRegistration&noscript=1"/>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={9532506813488688}&ev=CompleteRegistration&noscript=1"/>
	   <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={584979920420062}&ev=CompleteRegistration&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

			<?php $this->endSection(); ?>