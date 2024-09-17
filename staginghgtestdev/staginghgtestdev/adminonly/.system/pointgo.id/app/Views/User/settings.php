			<?php $this->extend('template-user'); ?>
			
			<?php $this->section('css'); ?>
			<style>
			    .tab-category.nav-pills .nav-link {
    color: var(--warna_text2);
    background-color: var(--bs-primary);
    filter: brightness(0.8);
}

.tab-category.nav-pills .nav-link:hover {
    color: var(--warna_text2);
    filter: brightness(1);
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: var(--warna_text2);
    background-color: var(--bs-primary);
    filter: brightness(1);
}

.game-item {
    padding: 10px 0px;
}
.nav-pills .nav-link {
    border-radius: 0.25rem;
    color: #4c4c4c;
    font-size: 12px;
    text-align: center;
    letter-spacing: 1px;
    font-weight: 600;
    text-transform: uppercase;
    margin: 3px;
    padding: 12px 20px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.nav-pills.tab-category {
    background: transparent !important;
}
			</style>

			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			        <div class="row">
			            

			            <div class="col-md-12">
			            	<div class="pb-4">
			                    <h5>Settings</h5>
			                    <span class="strip-primary mb-3"></span>
			                </div>

			                <?= alert(); ?>
			                    <div class="card mb-4">
			                        <div class="card-body">
			                        	<form action="" method="POST">
			                        		<div class="form-group">
			                        			<label class="">Username</label>
			                        			<input type="text" class="form-control" readonly="" value="<?= $users['username']; ?>">
			                        			<small>Username tidak dapat diganti</small>
			                        		</div>
			                        		<div class="form-group">
			                        			<label class="">Whatsapp</label>
			                        			<input type="number" class="form-control" value="<?= $users['wa']; ?>" name="wa">
			                        		</div>
			                        		<div class="text-right">
			                        			<button class="btn " type="reset">Batal</button>
			                        			<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
			                        		</div>
			                        	</form>
			                        </div>
			                    </div>
			                    <div class="pb-4">
			                    <h5>Ganti Password</h5>
			                    </div>
			                    <div class="card mb-4">
			                        <div class="card-body">
			                        	<form action="" method="POST">
			                        		<div class="form-group">
			                        			<label class="">Password Lama</label>
			                        			<input type="password" class="form-control" name="passwordl">
			                        		</div>
			                        		<div class="form-group">
			                        			<label class="">Password Baru</label>
			                        			<input type="password" class="form-control" name="passwordb">
			                        		</div>
			                        		<div class="form-group">
			                        			<label class="">Ulangi Password Baru</label>
			                        			<input type="password" class="form-control" name="passwordbb">
			                        		</div>
			                        		<div class="text-right">
			                        			<button class="btn " type="reset">Batal</button>
			                        			<button class="btn btn-primary" type="submit" name="btn_password" value="password">Simpan</button>
			                        		</div>
			                        	</form>
			                        </div>
			                    </div>
			                    
			                    <div class="pb-4">
			                    <h5>Ganti PIN</h5>
			                    </div>
			                    <div class="card mb-4">
			                        <div class="card-body">
			                        	<form action="" method="POST">
			                        		<div class="form-group">
			                        			<label class="">PIN Lama</label>
			                        			<input type="text" class="form-control" name="pin_lama">
			                        			<small id="pin-error1" class="text-danger"></small>
			                        		</div>
			                        		<div class="form-group">
			                        			<label class="">PIN Baru</label>
			                        			<input type="text" class="form-control" name="pin_baru">
			                        			<small id="pin-error" class="text-danger"></small>
			                        		</div>
			                        		<div class="form-group">
			                        			<label class="">Ulangi PIN Baru</label>
			                        			<input type="text" class="form-control" name="pin_baru2">
			                        			<small id="pin-errorb" class="text-danger"></small>
			                        		</div>
			                        		<div class="text-right">
			                        			<button class="btn " type="reset">Batal</button>
			                        			<button class="btn btn-primary" type="submit" name="btn_ganti_pin" value="pin">Simpan</button>
			                        		</div>
			                        	</form>
			                        </div>
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
    var maxPinLength = 6;
    
    $('input[name="pin_lama"]').on('input', function() {
        var pin_lama = $(this).val();
        var errorElement = $('#pin-error1');

        if (pin_lama.length > maxPinLength) {
            $(this).val(pin_lama.substr(0, maxPinLength)); // Potong karakter setelah 6 karakter
        }

        if (pin_lama.length !== maxPinLength) {
            errorElement.text('PIN harus terdiri dari 6 angka');
        } else if (!(/^\d+$/.test(pin_lama))) {
            errorElement.text('PIN hanya boleh berisi angka');
        } else {
            errorElement.text('');
        }
    });

    $('input[name="pin_baru"]').on('input', function() {
        var pin_baru = $(this).val();
        var errorElement = $('#pin-error');

        if (pin_baru.length > maxPinLength) {
            $(this).val(pin_baru.substr(0, maxPinLength)); // Potong karakter setelah 6 karakter
        }

        if (pin_baru.length !== maxPinLength) {
            errorElement.text('PIN harus terdiri dari 6 angka');
        } else if (!(/^\d+$/.test(pin_baru))) {
            errorElement.text('PIN hanya boleh berisi angka');
        } else {
            errorElement.text('');
        }
    });
    
    $('input[name="pin_baru2"]').on('input', function() {
        var pin_baru2 = $(this).val();
        var errorElementb = $('#pin-errorb');

        if (pin_baru2.length > maxPinLength) {
            $(this).val(pin_baru2.substr(0, maxPinLength));
        }

        if (pin_baru2.length !== maxPinLength) {
            errorElementb.text('PIN harus terdiri dari 6 angka');
        } else if (!(/^\d+$/.test(pin_baru2))) {
            errorElementb.text('PIN hanya boleh berisi angka');
        } else {
            errorElementb.text('');
        }
        validatePinMatch();
    });
    
    $('input[name="pin_baru2"]').on('input', function() {
        validatePinMatch();
    });

    function validatePinMatch() {
        var pin_baru = $('input[name="pin_baru"]').val();
        var pin_baru2 = $('input[name="pin_baru2"]').val();
        var errorElementb = $('#pin-errorb');

        if (pin_baru === pin_baru2) {
            errorElementb.text('');
        } else {
            errorElementb.text('PIN tidak cocok');
        }
    }
});
</script>

    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>

			<?php $this->endSection(); ?>