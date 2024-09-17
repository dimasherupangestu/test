<?php $this->extend('template-user'); ?>

<?php $this->section('css'); ?>
<style>
.input-group-text {
    color: #000;
    background-color: #fff;
    border-radius: 0.25rem 0rem 0rem 0.25rem;
    padding: 0 1rem;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content" style="min-height: 580px;">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="pb-4">
                    <div class="float-right mt-2">
                        <a href="<?= base_url(); ?>/user/topup/riwayat">
                            <h6><i class="fa fa-history mr-2"></i> Riwayat</h6>
                        </a>
                    </div>
                    <h5>Top Up</h5>
                    <span class="strip-primary"></span>
                </div>

                <form action="" method="POST">
                    <div class="pb-3 pt-3">
                        <div class="card mb-3">
                            <div class="card-body rounded-2xl">
                                <div class="form-group">
                                    <?= alert(); ?>
                                    <label class="text-white">Nominal Topup</label>
                                    <p class=""><i>Minimal Topup Rp 10.000</i></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp </span>
                                        <input id="inputText" type="number" class="form-control" autocomplete="off"
                                            name="nominal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-3">
                        <div class="card mb-3">
                            <div class="card-body rounded-2xl">
                                <div class="row" id="topuprow">
                                    <h5 class="col-sm-6 col-12 pb-2">Pilih Metode Pembayaran</h5>
                                    <?php foreach ($method as $loop): ?>
                                    <div class="col-sm-4 col-12">
                                        <input class="radio-nominal" type="radio" name="method"
                                            value="<?= $loop['id']; ?>" id="method-<?= $loop['id']; ?>">
                                        <label for="method-<?= $loop['id']; ?>">
                                            <div class="ml-2 mr-2 pb-0">
                                                <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>"
                                                    class="img-fluid mb-1" style="height: 20px;">
                                            </div>
                                            <div class="ml-2 mt-2">
                                                <p class="mb-0 price-method" style="font-weight: normal;"
                                                    id="price-method-<?= $loop['provider']; ?>-<?= $loop['code']; ?><?= $loop['tambahan']; ?>"></p>
                                            </div>
                                            <div class="ml-2 mt-2">
                                                <p class="m-0" style="font-weight: normal;">
                                                    <?= $loop['method']; ?>
                                                </p>
                                            </div>
                                        </label>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-3">
                        <div class="section mb-3">
                            <div class="card-body rounded-2xl">
                                <div class="text-right">
                                    <button class="btn text-white" type="reset" hidden>Batal</button>
                                    <button class="btn btn-primary btn-block" type="submit" name="tombol"
                                        value="submit">Topup
                                        Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
#topuprow .col-sm-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 100%;
    max-width: 100%;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
document.getElementById("inputText").addEventListener("input", function() {
    const value = this.value;
    const submitButtons = document.querySelectorAll("#submitButton");
    const nominal = [0, 0, 0];

    var BCATransfer = document.getElementById("price-method-Manual-BCATransfer");
                var BNITransfer = document.getElementById("price-method-Manual-BNITransfer");
                var BRITransfer = document.getElementById("price-method-Manual-BRITransfer");
                var MandiriTransfer = document.getElementById("price-method-Manual-Gopay");
                var BCAQRIS = document.getElementById("price-method-Manual-QRIS");

                var qrisc = document.getElementById("price-method-Tripay-QRISC");
                var qris1 = document.getElementById("price-method-Tripay-QRIS");
                var ovo = document.getElementById("price-method-Tripay-OVO");
                var shopee = document.getElementById("price-method-Tripay-SHOPEEPAY");
                var vabsi = document.getElementById("price-method-Tripay-BSIVA");
                var vabni = document.getElementById("price-method-Tripay-BNIVA");
                var vapermata = document.getElementById("price-method-Tripay-PERMATAVA");
                var vamandiri = document.getElementById("price-method-Tripay-MANDIRIVA");
                var vabri = document.getElementById("price-method-Tripay-BRIVA");
                var vabca = document.getElementById("price-method-Tripay-BCAVA");
                var indomaret = document.getElementById("price-method-Tripay-INDOMARET");
                var alfamart = document.getElementById("price-method-Tripay-ALFAMART");
                var alfamidi = document.getElementById("price-method-Tripay-ALFAMIDI");


                var qrisd = document.getElementById("price-method-Duitku-SP");
                var ovod = document.getElementById("price-method-Duitku-OV");
                var danad = document.getElementById("price-method-Duitku-DA");
                var shopeed = document.getElementById("price-method-Duitku-SA");
                var linkajad = document.getElementById("price-method-Duitku-LA");
                var vaatmd = document.getElementById("price-method-Duitku-A1");
                var vabnid = document.getElementById("price-method-Duitku-I1");
                var dvabri = document.getElementById("price-method-Duitku-BR");
                var vamayd = document.getElementById("price-method-Duitku-VA");
                var vapermatad = document.getElementById("price-method-Duitku-BT");
                var vacimbd = document.getElementById("price-method-Duitku-B1");
                var vaagd = document.getElementById("price-method-Duitku-AG");
                var vabncd = document.getElementById("price-method-Duitku-NC");
                var alfamartd = document.getElementById("price-method-Duitku-FT");
                var vamandirid = document.getElementById("price-method-Duitku-M1");

                var qrissl = document.getElementById("price-method-Smartlink-WALLET_QRIS");
                var ovosl = document.getElementById("price-method-Smartlink-WALLET_OVO");
                var danasl = document.getElementById("price-method-Smartlink-WALLET_DANA");
                var shopeesl = document.getElementById("price-method-Smartlink-WALLET_SHOPEEPAY");
                var linkajasl = document.getElementById("price-method-Smartlink-WALLET_LINKAJA");
                var ccvisasl = document.getElementById("price-method-Smartlink-CC_VISA");
                var alfamartsl = document.getElementById("price-method-Smartlink-OTC_ALFAMART");
                var indomaretsl = document.getElementById("price-method-Smartlink-OTC_INDOMARET");
                var vabnisl = document.getElementById("price-method-Smartlink-VA_BNI");
                var vabrisl = document.getElementById("price-method-Smartlink-VA_BRI");
                var vabncsl = document.getElementById("price-method-Smartlink-VA_BNC");
                var vacimbsl = document.getElementById("price-method-Smartlink-VA_CIMB");
                var vamandirisl = document.getElementById("price-method-Smartlink-VA_MANDIRI");
                var vapermatasl = document.getElementById("price-method-Smartlink-VA_PERMATA");
                
                var qrislq = document.getElementById("price-method-Linkqu-QRIS");
                var ovolq = document.getElementById("price-method-Linkqu-PAYOVO");
                var danalq = document.getElementById("price-method-Linkqu-PAYDANA");
                var shopeelq = document.getElementById("price-method-Linkqu-PAYSHOPEE");
                var linkajalq = document.getElementById("price-method-Linkqu-PAYLINKAJA");
                var alfamartlq = document.getElementById("price-method-Linkqu-ALFAMART");
                var indomaretlq = document.getElementById("price-method-Linkqu-INDOMARET");
                var vapermatalq = document.getElementById("price-method-Linkqu-013");
                var vacimblq = document.getElementById("price-method-Linkqu-022");
                var vadanamonq = document.getElementById("price-method-Linkqu-011");
                var vamandirilq = document.getElementById("price-method-Linkqu-008");
                var vabrilq = document.getElementById("price-method-Linkqu-002");
                var vaneolq = document.getElementById("price-method-Linkqu-490");
                var vabsilq = document.getElementById("price-method-Linkqu-451");
                var vabnilq = document.getElementById("price-method-Linkqu-009");
                var vabcalq = document.getElementById("price-method-Linkqu-014");
                var vamaybanklq = document.getElementById("price-method-Linkqu-016");

                var qrisx = document.getElementById("price-method-Xendit-ID_DANAqris");
                var ovox = document.getElementById("price-method-Xendit-ID_OVO");
                var danax = document.getElementById("price-method-Xendit-ID_DANAewallet");
                var shopeex = document.getElementById("price-method-Xendit-ID_SHOPEEPAY");
                var linkajax = document.getElementById("price-method-Xendit-ID_LINKAJA");
                var astrapayx = document.getElementById("price-method-Xendit-ID_ASTRAPAY");
                var vabcax = document.getElementById("price-method-Xendit-BCA");
                var vabnix = document.getElementById("price-method-Xendit-BNI");
                var vamandirix = document.getElementById("price-method-Xendit-MANDIRI");
                var vabrix = document.getElementById("price-method-Xendit-BRI");
                var vapermatax = document.getElementById("price-method-Xendit-PERMATA");
                var vaBJBx = document.getElementById("price-method-Xendit-BJB");
                var vaBSIx = document.getElementById("price-method-Xendit-BSI");
                var vaSAHABAT_SAMPOERNA = document.getElementById("price-method-Xendit-SAHABAT_SAMPOERNA");
                var indomaretx = document.getElementById("price-method-Xendit-INDOMARET");
                var alfamartx = document.getElementById("price-method-Xendit-ALFAMART");

                if (qrisd !== null) {
                    qrisd.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovod !== null) {
                    ovod.innerHTML = 'Rp ' + (Math.round(value * 1.0167)).toLocaleString('id-ID');
                }
                if (danad !== null) {
                    danad.innerHTML = 'Rp ' + (Math.round(value * 1.0167)).toLocaleString('id-ID');
                }
                if (shopeed !== null) {
                    shopeed.innerHTML = 'Rp ' + (Math.round(value * 1.04)).toLocaleString('id-ID');
                }
                if (linkajad !== null) {
                    linkajad.innerHTML = 'Rp ' + (Math.round(value * 1.0167)).toLocaleString('id-ID');
                }
                if (vaatmd !== null) {
                    vaatmd.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vaagd !== null) {
                    vaagd.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vabncd !== null) {
                    vabncd.innerHTML = 'Rp ' + (Math.round(value + 4000)).toLocaleString('id-ID');
                }
                if (vabnid !== null) {
                    vabnid.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (dvabri !== null) {
                    dvabri.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vamayd !== null) {
                    vamayd.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vapermatad !== null) {
                    vapermatad.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vacimbd !== null) {
                    vacimbd.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (alfamartd !== null) {
                    alfamartd.innerHTML = 'Rp ' + (Math.round(value) + 2500).toLocaleString('id-ID');
                }
                if (vamandirid !== null) {
                    vamandirid.innerHTML = 'Rp ' + (Math.round(value + 4000)).toLocaleString('id-ID');
                }

                if (qrisx !== null) {
                    qrisx.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovox !== null) {
                    ovox.innerHTML = 'Rp ' + (Math.round(value * 1.015)).toLocaleString('id-ID');
                }
                if (shopeex !== null) {
                    shopeex.innerHTML = 'Rp ' + (Math.round(value * 1.015)).toLocaleString('id-ID');
                }
                if (danax !== null) {
                    danax.innerHTML = 'Rp ' + (Math.round(value * 1.015)).toLocaleString('id-ID');
                }
                if (linkajax !== null) {
                    linkajax.innerHTML = 'Rp ' + (Math.round(value * 1.015)).toLocaleString('id-ID');
                }
                if (astrapayx !== null) {
                    astrapayx.innerHTML = 'Rp ' + (Math.round(value * 1.015)).toLocaleString('id-ID');
                }
                if (vabnix !== null) {
                    vabnix.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vapermatax !== null) {
                    vapermatax.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vamandirix !== null) {
                    vamandirix.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vabrix !== null) {
                    vabrix.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vabcax !== null) {
                    vabcax.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vaBJBx !== null) {
                    vaBJBx.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vaBSIx !== null) {
                    vaBSIx.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString('id-ID');
                }
                if (vaSAHABAT_SAMPOERNA !== null) {
                    vaSAHABAT_SAMPOERNA.innerHTML = 'Rp ' + (Math.round(value) + 5000).toLocaleString(
                        'id-ID');
                }
                if (indomaretx !== null) {
                    indomaretx.innerHTML = 'Rp ' + (Math.round(value) + 6000).toLocaleString('id-ID');
                }
                if (alfamartx !== null) {
                    alfamartx.innerHTML = 'Rp ' + (Math.round(value) + 6000).toLocaleString('id-ID');
                }

                if (qrissl !== null) {
                    qrissl.innerHTML = 'Rp ' + (Math.round((value * 1.01) + 0)).toLocaleString('id-ID');
                }
                if (ovosl !== null) {
                    ovosl.innerHTML = 'Rp ' + (Math.round(value * 1.04)).toLocaleString('id-ID');
                }
                if (danasl !== null) {
                    danasl.innerHTML = 'Rp ' + (Math.round(value * 1.04)).toLocaleString('id-ID');
                }
                if (shopeesl !== null) {
                    shopeesl.innerHTML = 'Rp ' + (Math.round(value * 1.04)).toLocaleString('id-ID');
                }
                if (linkajasl !== null) {
                    linkajasl.innerHTML = 'Rp ' + (Math.round(value * 1.04)).toLocaleString('id-ID');
                }
                if (ccvisasl !== null) {
                    ccvisasl.innerHTML = 'Rp ' + (Math.round(value * 1.0275)).toLocaleString('id-ID');
                }
                if (alfamartsl !== null) {
                    alfamartsl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (indomaretsl !== null) {
                    indomaretsl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vabnisl !== null) {
                    vabnisl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vabrisl !== null) {
                    vabrisl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vabncsl !== null) {
                    vabncsl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vacimbsl !== null) {
                    vacimbsl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vamandirisl !== null) {
                    vamandirisl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vapermatasl !== null) {
                    vapermatasl.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                
                
                if (qrislq !== null) {
                    qrislq.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovolq !== null) {
                    ovolq.innerHTML = 'Rp ' + (Math.round(value * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (danalq !== null) {
                    danalq.innerHTML = 'Rp ' + (Math.round(value * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (shopeelq !== null) {
                    shopeelq.innerHTML = 'Rp ' + (Math.round(value * 1.023) + 1000).toLocaleString('id-ID');
                }
                if (linkajalq !== null) {
                    linkajalq.innerHTML = 'Rp ' + (Math.round(value * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (alfamartlq !== null) {
                    alfamartlq.innerHTML = 'Rp ' + (Math.round(value) + 1500).toLocaleString('id-ID');
                }
                if (indomaretlq !== null) {
                    indomaretlq.innerHTML = 'Rp ' + (Math.round(value) + 1500).toLocaleString('id-ID');
                }
                if (vapermatalq !== null) {
                    vapermatalq.innerHTML = 'Rp ' + (Math.round(value) + 2500).toLocaleString('id-ID');
                }
                if (vacimblq !== null) {
                    vacimblq.innerHTML = 'Rp ' + (Math.round(value) + 2500).toLocaleString('id-ID');
                }
                if (vadanamonq !== null) {
                    vadanamonq.innerHTML = 'Rp ' + (Math.round(value) + 2500).toLocaleString('id-ID');
                }
                if (vamandirilq !== null) {
                    vamandirilq.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vabrilq !== null) {
                    vabrilq.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vaneolq !== null) {
                    vaneolq.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vabsilq !== null) {
                    vabsilq.innerHTML = 'Rp ' + (Math.round(value) + 3000).toLocaleString('id-ID');
                }
                if (vabnilq !== null) {
                    vabnilq.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vabcalq !== null) {
                    vabcalq.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (vamaybanklq !== null) {
                    vamaybanklq.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }



                if (BCATransfer !== null) {
                    BCATransfer.innerHTML = 'Rp ' + (Math.round((value * 1))).toLocaleString('id-ID');
                }
                if (BNITransfer !== null) {
                    BNITransfer.innerHTML = 'Rp ' + (Math.round((value * 1))).toLocaleString('id-ID');
                }
                if (BRITransfer !== null) {
                    BRITransfer.innerHTML = 'Rp ' + (Math.round((value * 1))).toLocaleString('id-ID');
                }
                if (MandiriTransfer !== null) {
                    MandiriTransfer.innerHTML = 'Rp ' + (Math.round((value * 1))).toLocaleString('id-ID');
                }
                if (BCAQRIS !== null) {
                    BCAQRIS.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 800)).toLocaleString('id-ID');
                }
                

                if (qrisc !== null) {
                    qrisc.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 800)).toLocaleString('id-ID');
                }
                if (qris1 !== null) {
                    qris1.innerHTML = 'Rp ' + (Math.round((value * 1.007) + 750)).toLocaleString('id-ID');
                }
                if (ovo !== null) {
                    ovo.innerHTML = 'Rp ' + (Math.round(value * 1.03)).toLocaleString('id-ID');
                }
                if (shopee !== null) {
                    shopee.innerHTML = 'Rp ' + (Math.round(value * 1.03)).toLocaleString('id-ID');
                }
                if (vabsi !== null) {
                    vabsi.innerHTML = 'Rp ' + (Math.round(value) + 4250).toLocaleString('id-ID');
                }
                if (vabni !== null) {
                    vabni.innerHTML = 'Rp ' + (Math.round(value) + 4250).toLocaleString('id-ID');
                }
                if (vabca !== null) {
                    vabca.innerHTML = 'Rp ' + (Math.round(value) + 5500).toLocaleString('id-ID');
                }
                if (vapermata !== null) {
                    vapermata.innerHTML = 'Rp ' + (Math.round(value) + 4250).toLocaleString('id-ID');
                }
                if (vamandiri !== null) {
                    vamandiri.innerHTML = 'Rp ' + (Math.round(value) + 4250).toLocaleString('id-ID');
                }
                if (vabri !== null) {
                    vabri.innerHTML = 'Rp ' + (Math.round(value) + 4250).toLocaleString('id-ID');
                }
                if (indomaret !== null) {
                    indomaret.innerHTML = 'Rp ' + (Math.round(value) + 3500).toLocaleString('id-ID');
                }
                if (alfamart !== null) {
                    alfamart.innerHTML = 'Rp ' + (Math.round(value) + 6000).toLocaleString('id-ID');
                }
                if (alfamidi !== null) {
                    alfamidi.innerHTML = 'Rp ' + (Math.round(value) + 6000).toLocaleString('id-ID');
                }

    for (let i = 0; i < submitButtons.length; i++) {
        submitButtons[i].innerHTML = "Rp " + ((parseFloat(value) * 1.1) + nominal[i]).toLocaleString();
    }
});
</script>

<?php $this->endSection(); ?>