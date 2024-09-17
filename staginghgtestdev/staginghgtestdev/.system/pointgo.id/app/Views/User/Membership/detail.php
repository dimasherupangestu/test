			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="clearfix pt-5"></div>
			<div class="pt-5 pb-5">
			    <div class="container">
			        <div class="row">
					    <div class="col-lg-3">
					        <div class="pt-3 pb-4">
					            <h5>Pembayaran</h5>
					            <span class="strip-primary"></span>
					        </div>
					    </div>
					    <div class="col-lg-9">
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <h4>Terima Kasih</h4> Invoice Upgrade Level anda berhasil dibuat. Masa berlaku untuk No. Transaksi ini 24 jam, segera lakukan pembayaran agar pesanan segera diproses. <br>
					                    <br> Simpan No. Transaksi anda untuk Cek Upgrade Level Anda!
					                </div>
					            </div>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <div class="row">
					                        <div class="col-sm-6">
					                            
					                            <?php 
                							     if ($topup['payment_gateway'] == 'Tripay') { 
                                                    if ( in_array($topup['method_code'], array('QRIS','QRISC')) ) { 
                                                         $fee = 800 ; 
                                                         $harga = ($topup['amount']*1.007) + $fee ; 
                                                     } else if ( in_array($topup['method_code'], array('OVO','SHOPEEPAY')) ) { 
                                                         $fee = 0 ; 
                                                         $harga = ($topup['amount']*1.03) + $fee ; 
                                                     } else if ( in_array($topup['method_code'], array('BSIVA','BNIVA','PERMATAVA','MANDIRIVA','BRIVA')) ) { 
                                                         $fee = 4250 ; 
                                                         $harga = $topup['amount'] + $fee ; 
                                                     } else if ($topup['payment_code'] == 'INDOMARET') { 
                                                         $fee = 6500 ; 
                                                         $harga = ($topup['amount']*1.03) + $fee ; 
                                                     } else if ( in_array($topup['method_code'], array('ALFAMART','ALFAMIDI')) ) { 
                                                         $fee = 6000 ; 
                                                         $harga = $topup['amount'] + $fee ;  
                                                     } else { 
                                                         $harga = $topup['amount'] ;  }
                                                    
                                                 } else if ($topup['payment_gateway'] == 'Duitku') { 
                                                     if ( in_array($topup['method_code'], array('SP','NQ')) ) { 
                                                         $harga = ($topup['amount']*1.007) ; 
                                                     } else if ($topup['payment_code'] == 'LQ') { 
                                                         $harga = ($topup['amount']*1.0078) ; 
                                                     } else if ( in_array($topup['method_code'], array('OV','DA','LA')) ) { 
                                                         $harga = ($topup['amount']*1.0167) ; 
                                                     } else if ($topup['payment_code'] == 'SA') { 
                                                         $harga = ($topup['amount']*1.04) ; 
                                                     }  else if ($topup['payment_code'] == 'BC') { 
                                                         $fee = 5000 ; 
                                                         $harga = $topup['amount'] + $fee ;
                                                     }  else if ($topup['payment_code'] == 'M2') { 
                                                         $fee = 4000 ; 
                                                         $harga = $topup['amount'] + $fee ;
                                                     }  else if ( in_array($topup['method_code'], array('VA','I1','B1','BT','A1','BR')) ) { 
                                                         $fee = 3000 ; 
                                                         $harga = $topup['amount'] + $fee ; 
                                                     }  else if ($topup['payment_code'] == 'FT') { 
                                                         $fee = 2500 ; 
                                                         $harga = $topup['amount'] + $fee ;  
                                                     } else { 
                                                         $harga = $topup['amount'] ;  }
                                                    
                                                 } else if ($topup['payment_gateway'] == 'Xendit') { 
                                                     $harga = $topup['amount'];
                                                 } else {
                                                     $harga = $topup['amount'];
                                                 }
                                                 ?>

					                            <div class="pb-4"> Metode Pembayaran <h5><?= $topup['method']; ?></h5>
					                            </div>
					                            
					                            
					                           
					                            <?php if ($topup['status'] == 'Pending'): ?>

                    								<?php if (($topup['payment_type'] == 'QRIS' && $topup['payment_gateway'] == 'Xendit') || (in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Duitku') || ($topup['payment_type'] == 'QRIS' && $topup['payment_gateway'] == 'Smartlink')) : ?>
                                                        
                                                        <div class="pb-4"><b> SCAN QR CODE dibawah ini </b> <br>
                                                                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $topup['payment_code']; ?>&amp;size=250x250" class="mt-3 mb-1 p-4 bg-white" style="border-radius:15px;" alt="" title="" />
                                                        </div>
                                                        
                                                    <?php elseif ((in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Tripay') || (in_array($topup['payment_type'], ['QRIS']) && $topup['payment_gateway'] == 'Linkqu')) : ?>
                                                        
                                                        <div class="pb-4"><b> SCAN QR CODE dibawah ini </b> <br>
                        									<img src="<?= $topup['payment_code']; ?>" class="mt-3" width="250" alt="" title="" />
                        								</div>
                        								
                                                    <?php elseif ($topup['payment_type'] == 'Virtual Account' ) : ?>
                                                    
                                                        <div class="pb-4"><b> No Virtual Account</b> <br>
    
                                                        <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i class="fa fa-clone pl-2 clip" onclick="copy_rek()" data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>
                                                        
                                                        </div>
                                                    
                                                    <?php elseif ($topup['payment_type'] == 'Convenience Store' ) : ?>
                                                    
                                                        <div class="pb-4"><b> No Pembayaran Retail </b> <br>
                                                        
                                                        <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i class="fa fa-clone pl-2 clip" onclick="copy_rek()" data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>
                                                        
                                                        </div>
                                                    
                                                    <?php elseif ($topup['payment_type'] == 'Bank Transfer' ) : ?>
                                                    
                                                        <div class="pb-4"><b> No Rekening </b> <br>
                                                        
                                                        <h5><b class="d-block mt-2"><?= $topup['payment_code']; ?><i class="fa fa-clone pl-2 clip" onclick="copy_rek()" data-clipboard-text="<?= $topup['payment_code']; ?>"></i></b></h5>
                                                        
                                                        </div>
    
                                                   <?php elseif ($topup['payment_type'] == 'E-Wallet' ) : ?>
                                                   
                                                        <div class="pb-4"> Klik tombol untuk melakukan Pembayaran <br>
                        									<a href="<?= $topup['payment_code']; ?>" class="btn btn-primary mt-2" target="_blank">Bayar Sekarang</a>
                        							    </div>
                                                            
                									<?php else: ?>
                									
                									    <div class="pb-4"> Klik tombol untuk melakukan Pembayaran <br>
                        									<a href="<?= $topup['payment_code']; ?>" class="btn btn-primary mt-2" target="_blank">Bayar Sekarang</a>
                        							    </div>
                        							    
                								    <?php endif ?>
                									
                									
					                            
					                            
					                            <div class="pb-4"> 
					                            	Jumlah Pembayaran <h5>Rp. <?= number_format($harga,0,',','.'); ?></h5>
					                            </div>
					                            
					                            <?php else: ?>
            									<div class="border p-2 rounded">Status : <b><?= $topup['status']; ?></b></div>
            									<div class="pb-4 pt-4"> 
					                            	Level Membership yang dituju <h5><?= $level ; ?></h5>
					                            </div>
            									<?php endif ?>
					                        </div>
					                        <div class="col-sm-6">
					                            <div class="pb-4"> No. Transaksi 
					                            	<h5>
					                            		TP<?= $topup['topup_id']; ?> <i class="fa fa-clone pl-2 clip" onclick="copy_trxaku()" data-clipboard-text="TP<?= $topup['topup_id']; ?>"></i>
					                                </h5>
					                            </div>
					                            <div class="pb-4"> Waktu Transaksi <h5><?= $topup['date_create']; ?></h5>
					                            </div>
					                            <div class="pb-4"> 
					                            	Rincian Transaksi <h5>Upgrade Level Membership</h5>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <div class="pb-3">
					            <div class="section">
					                <div class="card-body">
					                    <h4>Informasi Cara Pembayaran</h4>
					                    <?= htmlspecialchars_decode($topup['instruksi']); ?>
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
			    <script>
    function downloadQRImage() {
        var qrImageUrl =
            'https://api.qrserver.com/v1/create-qr-code/?data=<?= $orders['payment_code']; ?>&amp;size=250x250';
        var xhr = new XMLHttpRequest();
        xhr.open('GET', qrImageUrl, true);
        xhr.responseType = 'blob';
        xhr.onload = function(e) {
            if (this.status == 200) {
                var blob = new Blob([this.response], {
                    type: 'image/png'
                });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'qr-image.png';
                link.click();
            }
        };
        xhr.send();
    }
    </script>
    <script>
function copy_trx() {
    navigator.clipboard.writeText('<?= $topup['topup_id']; ?>');

    Swal.fire('Berhasil', 'No Transaksi berhasil di salin', 'success');
}

function copy_price() {
    navigator.clipboard.writeText('<?= $topup['amount']; ?>');

    Swal.fire('Berhasil', 'Harga berhasil di salin', 'success');
}

function copy_rek() {
    navigator.clipboard.writeText('<?= $topup['payment_code']; ?>');

    Swal.fire('Berhasil', 'No Rekening / No VA / Kode Pembayaran berhasil di salin', 'success');
}
			</script>
			</script>
			<?php $this->endSection(); ?>