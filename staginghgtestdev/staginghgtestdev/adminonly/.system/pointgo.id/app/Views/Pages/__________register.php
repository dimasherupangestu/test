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
                                       <img class="pointgo" src="<?= base_url(); ?>/assets/images/pointgo.svg">
                                       <h5 class="text-center pb-3">Daftar Member</h5>
                                            <div class="form-group mb-2">
                                                <p class="text-white">Username</p>
                                                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required autocomplete="off">
                                            </div>
                                            <div class="form-group mb-2">
                                                <p class="text-white">Nomor WhatsApp</p>
                                                <input type="number" name="wa" placeholder="Masukkan Nomor WhatsApp" class="form-control" required autocomplete="off">
                                            </div>
                                            <div class="form-group mb-3">
                                                <p class="text-white">Password</p>
                                                <input type="password" name="password" placeholder="Masukkan Password" class="form-control" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <p class="text-white">Konfirmasi Password</p>
                                                <input type="password" name="passwordb" placeholder="Masukkan Konfirmasi Password" class="form-control" required>
                                            </div>
                                                              
                                            <button type="submit" name="tombol" value="submit" class="btn btn-primary btn-block">Daftar Akun Member</button>
                                        </form>

					                    <p class="mt-3" style="font-size: 12px;">Dengan mendaftar, anda setuju dengan <a href="<?= base_url(); ?>/syarat-ketentuan" style="color: var(--warna_5);">Persyaratan dan Ketentuan</a> kami.</p>
					                </div>
					            </div>
                                    <div class="d-flex justify-content-center flex-col">
                                        <p class="mt-3 normal">Sudah Memiliki akun?</p>
                                    </div>
                                    <div class="d-flex justify-content-center flex-col">
                                        <a href="<?= base_url(); ?>/login" class="btn btn-primary masuk normal">Masuk Member</a>
                                    </div>
					        </div>
					    </div>
					</div>
			    </div>
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
			<script>
    $(document).ready(function() {
        $("#send-otp").click(function() {
            var phone = $("input[name='wa']").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('register/send_otp'); ?>",
                data: {
                    "phone": phone
                },
                success: function(data) {
                    if(data.status == "success") {
                        // set OTP code and expire time to hidden input fields
                        $("#otp-code").val(data.otp);
                        $("#otp-expire").val(data.expire);
                        alert("Kode OTP telah dikirimkan ke nomor Whatsapp anda.");
                    } else {
                        alert("Gagal mengirimkan kode OTP.");
                    }
                },
                error: function() {
                    alert("Terjadi kesalahan.");
                }
            });
        });
    });
</script>
			<?php $this->endSection(); ?>