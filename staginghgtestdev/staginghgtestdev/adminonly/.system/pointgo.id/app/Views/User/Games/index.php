<?php $this->extend('template-user'); ?>

<?php $this->section('css'); ?>
<style>
.mb-1,
.my-1 {
    margin-bottom: 0.75rem !important;
}

.container {
    max-width: 1300px;
}

.h3,
h3 {
    font-size: 25px;
}

.h2,
h2 {
    font-size: 14px;
    line-height: 42px;
}

.align-items-center {
    padding-bottom: 10px;
}

.accordion-item {
    border: 1px solid #adadad82;
    border-radius: 7px;
}

.accordion-item:hover {
    border: 2px solid var(--warna_border);
}

button.accordion-button {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

.text-end {
    text-align: right !important;
}

.icon-diamondx {
    height: 2rem;
    float: right;
}

.accordion {
    --bs-accordion-color: #000;
    --bs-accordion-bg: #fff;
    --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
    --bs-accordion-border-color: var(--bs-border-color);
    --bs-accordion-border-width: 1px;
    --bs-accordion-border-radius: 0.375rem;
    --bs-accordion-inner-border-radius: calc(0.375rem - 1px);
    --bs-accordion-btn-padding-x: 1.25rem;
    --bs-accordion-btn-padding-y: 1rem;
    --bs-accordion-btn-color: var(--bs-body-color);
    --bs-accordion-btn-bg: var(--bs-accordion-bg);
    --bs-accordion-btn-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='var%28--bs-body-color%29'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-icon-width: 1.25rem;
    --bs-accordion-btn-icon-transform: rotate(-180deg);
    --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
    --bs-accordion-btn-active-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
    --bs-accordion-btn-focus-border-color: #86b7fe;
    --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    --bs-accordion-body-padding-x: 1.25rem;
    --bs-accordion-body-padding-y: 1rem;
    --bs-accordion-active-color: #0c63e4;
    --bs-accordion-active-bg: #e7f1ff;
}

.accordion-button::after {
    flex-shrink: 0;
    width: var(--bs-accordion-btn-icon-width);
    height: var(--bs-accordion-btn-icon-width);
    margin-left: auto;
    content: "";
    background-image: var(--bs-accordion-btn-icon);
    background-repeat: no-repeat;
    background-size: var(--bs-accordion-btn-icon-width);
    transition: var(--bs-accordion-btn-icon-transition);
}

.accordion-body {
    padding: var(--bs-accordion-body-padding-y) var(--bs-accordion-body-padding-x);
    background: var(--warna_4);
}

.accordion-button {
    box-shadow: none !important;
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
    font-size: 1rem;
    color: var(--bs-accordion-btn-color);
    text-align: left;
    background-color: var(--bs-accordion-btn-bg);
    border: 0;
    border-radius: 0;
    overflow-anchor: none;
    transition: var(--bs-accordion-transition);
}

.accordion-button.collapsed::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.boks {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 6px;
}

.discount-price {
    font-size: 10px;
    color: red;
    font-weight: 500;
    font-style: italic;
    text-decoration: line-through
}

.grid {
    display: grid;
}

.banner-games {
    width: -webkit-fill-available;
    height: 14rem;
    object-fit: cover;
}

.btn-category {
    border-radius: 8px;
    color: var(--warna_text2);
    background-color: var(--warna_3);
    cursor: pointer;

}

.btn-category p {
    font-size: 14px;
    font-weight: bold;
}

.btn-category.active {
    color: var(--warna_text2);
    background-color: var(--warna_3);
    filter: brightness(0.7);

}
</style>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="modal fade" id="petunjukModal" tabindex="-1" aria-labelledby="petunjukModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" hidden>
                <i class="fa fa-times" aria-hidden="true" style="float: right;position: absolute;right: 13px;top: 10px;"></i>
            </div>
            <div class="modal-body" style="padding:1rem !important">
                <span class="cat-button-title mb-2">Cara Pembelian <?= $games['games']; ?></span>
                <span style="font-size: 0.8rem;"><?= $games['content']; ?></span>
            </div>

            <div class="modal-footer" style="justify-content: center;" hidden>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="">X</button>
            </div>
        </div>

    </div>

</div>

<div class="pb-5" style="padding-bottom: 0rem!important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pb-3">
                <div class="card">
                <div class="justify-content-center">
                    <div class="d-md-flex justify-content-between align-items-center bg-dark mb-3 p-4" style="background: var(--warna) !important;">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" style="max-height: 8rem; border-radius: 15px">
                            <span class="ml-3 fw-bold" style="font-size: 1.5rem;"><?= $games['games']; ?>
                                <br>
                                <span style="font-size: 0.8rem;"><?= $games['subtitle']; ?></span>
                            </span>
                        </div>
                        <!--<div class="d-flex flex-column justify-content-center">-->
                        <!--    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#petunjukModal">-->
                        <!--        <span><i class="fa fa-question-circle"></i></span>-->
                        <!--        <span class="cat-button-title">Cara Pembelian</span>-->
                        <!--    </button>-->
                        <!--</div>-->
                    </div>
                </div>
                </div>
            </div>

            <div class="col-sm-8">

                <?= alert(); ?>

                <div class="pb-3 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="kios-card-title text-dark judulpulsa judulgame">
                                <?php if ($games['target'] == 'custom'): ?>
                                <?= $games['st_title']; ?>
                                <?php else: ?>
                                Lengkapi Data
                                <?php endif ?> </h5>
                            <?php if ($games['target'] == 'custom'): ?>


                            <div class="form-row pt-3 judulgame">

                                <?php if ($games['st_col'] == 1): ?>
                                <div class="col">
                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control" placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                    <input type="hidden" name="zone_id" value="1">
                                </div>
                                <p class="col-12 mt-2" style="font-size: 10px">
                                    <?= $games['st_desc']; ?>
                                </p>



                                <?php elseif ($games['st_col'] == 2): ?>

                                <?php if ($games['st2_type'] == 'dropdown'): ?>
                                <div class="col">
                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control" placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                </div>

                                <div class="col">
                                    <select name="zone_id" id="Server" class="form-control">
                                        <option value="<?= $games['st2_text']; ?>">
                                            <?= $games['st2_text']; ?></option>
                                        <?php
                                                    $options = explode(',', $games['st2_data']);
                                                    foreach ($options as $option) {
                                                        $parts = explode('///', $option);
                                                        $value = trim($parts[1]);
                                                        $label = trim($parts[0]);
                                                        echo "<option value=\"$value\">$label</option>";
                                                    }
                                                    ?>
                                    </select>
                                </div>
                                <?php else: ?>
                                <div class="col">
                                    <input type="<?= $games['st1_type']; ?>" name="user_id" class="form-control" placeholder="<?= $games['st1_text']; ?>" autocomplete="off">
                                </div>

                                <div class="col">
                                    <input type="<?= $games['st2_type']; ?>" name="zone_id" class="form-control" placeholder="<?= $games['st2_text']; ?>" autocomplete="off">
                                </div>
                                <?php endif ?>
                                <p class="col-12 mt-2" style="font-size: 10px">
                                    <?= $games['st_desc']; ?>
                                </p>

                                <?php endif ?>
                            </div>
                            <?php else: ?>
                            <?= $this->include('Target/' . $games['target']); ?>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="kios-card-title text-dark">Pilih Nominal Layanan </h5>

                            <div class="row px-2 pt-3 <?= count($category) == 0 ? 'd-none' : ''; ?>">
                                <?php $no = 1;
                                foreach ($category as $loop): ?>
                                <div class="col-md-3 col-6 mb-3" style="display: grid;">
                                    <div class="text-center px-3 pt-2 pb-2 btn-category <?= $no == 1 ? 'active' : ''; ?>" id="btn-category-<?= $loop['id']; ?>" onclick="select_product_category('<?= $loop['id']; ?>');" style="align-items: center;display: flex;justify-content: center;">
                                        <p style="line-height: 16px;margin-bottom: 0;">
                                            <?= $loop['category']; ?></p>
                                    </div>
                                </div>
                                <?php $no++; endforeach ?>
                            </div>

                            <?php $no = 1;
                            foreach ($products as $key => $value): ?>
                            <div class="row pl-2 pr-2 <?= $no !== 1 ? 'd-none' : ''; ?> row-category" id="product-category-<?= $key; ?>">
                                <?php foreach ($value as $loop): ?>
                                <div class="col-sm-4 col-6 grid" style="padding-right: 5px;padding-left: 5px;">
                                    <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);">
                                    <label for="product-<?= $loop['id']; ?>" style="display: flex;justify-content: space-between;">
                                        <div>
                                            <a style="display: flex;font-weight: bold;font-size: 12px;" for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>

                                            <?php
                                                $price = null;
                                                $discountPrice = null;

                                                if ($loop['discount_price'] != 0) {
                                                    $price = $loop['price'];
                                                    $discountPrice = $loop['discount_price'];
                                                } else {
                                                    if ($users !== false) {
                                                        switch ($users['level']) {
                                                            case 'Silver':
                                                                $price = ($loop['price_silver'] != 0) ? $loop['price_silver'] : $loop['price'];
                                                                break;
                                                            case 'Gold':
                                                                 $price = ($loop['price_gold'] != 0) ? $loop['price_gold'] : $loop['price'];
                                                                break;
                                                            case 'Platinum':
                                                                 $price = ($loop['price_platinum'] != 0) ? $loop['price_platinum'] : $loop['price'];
                                                                break;
                                                            case 'Member':
                                                                $price = ($loop['price_bronze'] != 0) ? $loop['price_bronze'] : $loop['price'];
                                                                break;
                                                            default:
                                                                $price = $loop['price'];
                                                                break;
                                                        }
                                                    } else if ($price == 0 or empty($price)) {
                                                        $price = $loop['price'];
                                                    } else {
                                                        $price = $loop['price'];
                                                    }
                                                }

                                                ?>
                                            <a style="font-size: 10px; font-weight:500;" class="currency-idr">
                                                <?= $price; ?>
                                            </a>

                                            <?php if ($discountPrice != null): ?>
                                            <br>
                                            <p class="currency-idr-2 discount-price mb-0"><?= $discountPrice; ?>
                                            </p>
                                            <?php endif; ?>

                                        </div>

                                        <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>" loading="lazy" class="icon-diamondx">
                                        </input>

                                    </label>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <?php $no++; endforeach ?>

                        </div>

                        <div class="card-body <?= count($category) >= 1 ? 'd-none' : ''; ?>">
                            <div class="row pt-3 pl-2 pr-2 mb-2">
                                <?php if (count($product) == 0): ?>
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible mt-2 mb-0" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="alert-message">
                                            <strong>Information!</strong> Produk sedang tidak tersedia.
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                <?php foreach ($product as $loop): ?>
                                <div class="col-sm-4 col-6 grid" style="padding-right: 5px;padding-left: 5px;">
                                    <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);">
                                    <label for="product-<?= $loop['id']; ?>" style="display: flex;justify-content: space-between;">
                                        <div>
                                            <a style="display: flex;font-weight: bold;font-size: 12px;" for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>

                                            <?php
                                                $price = null;
                                                $discountPrice = null;

                                                if ($loop['discount_price'] != 0) {
                                                    $price = $loop['price'];
                                                    $discountPrice = $loop['discount_price'];
                                                } else {
                                                    if ($users !== false) {
                                                        switch ($users['level']) {
                                                             case 'Silver':
                                                                    $price = ($loop['price_silver'] != 0) ? $loop['price_silver'] : $loop['price'];
                                                                    break;
                                                                case 'Gold':
                                                                     $price = ($loop['price_gold'] != 0) ? $loop['price_gold'] : $loop['price'];
                                                                    break;
                                                                case 'Platinum':
                                                                     $price = ($loop['price_platinum'] != 0) ? $loop['price_platinum'] : $loop['price'];
                                                                    break;
                                                                case 'Member':
                                                                    $price = ($loop['price_bronze'] != 0) ? $loop['price_bronze'] : $loop['price'];
                                                                    break;
                                                                default:
                                                                    $price = $loop['price'];
                                                                    break;
                                                        }
                                                    } else if ($price == 0) {
                                                        $price = $loop['price'];
                                                    } else {
                                                        $price = $loop['price'];
                                                    }
                                                }

                                                ?>
                                            <a style="font-size: 10px; font-weight:500;" class="currency-idr">
                                                <?= $price; ?>
                                            </a>

                                            <?php if ($discountPrice != null): ?>
                                            <br>
                                            <p class="currency-idr-2 discount-price mb-0"><?= $discountPrice; ?>
                                            </p>
                                            <?php endif; ?>

                                        </div>

                                        <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>" loading="lazy" class="icon-diamondx">
                                        </input>

                                    </label>
                                </div>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-detail">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-dark animated bounceIn" style="background: var(--warna_2);">
                            <div class="card-header border-bottom-0">
                                <h5 class="text-dark">Detail Pembelian</h5>
                            </div>
                            <div class="modal-body pt-0">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-loading" hidden>
                    <div class="modal-dialog modal-dialog-centered text-center" style="max-width: 100px;">
                        <img src="<?= base_url(); ?>/assets/images/loading.gif" alt="" width="150" style="border-radius: 40px;">
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                
                <div class="pb-3" hidden>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="kios-card-title text-white">Kode Voucher </h5>
                            <div class="form-group pt-3">
                                <div class="input-group">
                                    <input type="text" name="voucher" placeholder="Optional" class="form-control">
                                    <button class="btn btn-primary" type="button" onclick="cek_voucher();">Cek</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if ($games['target'] !== 'joki' OR $games['target'] !== 'videomontage' OR $games['slug'] == 'char-point-blank-zepetto'): ?>
                <?php if ($games['category'] == 'Voucher' OR $games['target'] == 'voucher'): ?>
                <input value="1" type="hidden" name="quantity" id="quantity"class="form-control">
                <?php else: ?>
                
                <div class="pb-3" style="visibility: hidden;position: absolute;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="kios-card-title text-dark">Jumlah Pesanan</h5>
                            <div class="form-group pt-3">
                                <div class="input-group">
                                    <input value="1" type="number" name="quantity" id="quantity" placeholder="" class="form-control" onchange="update_total();">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php endif ?>
                <?php endif ?>
                
                <div class="pb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="kios-card-title text-dark">Harga</h5>
                                    <b class="mb-2" style="font-weight: 600; font-size: 23px;" id="price-method-balance"></b>
                        </div>
                    </div>
                </div>
                
                <div class="pb-3">
                    <div class="card">
                        <div class="card-body">
                            <!--<h5 class="kios-card-title text-dark">Pilih Pembayaran </h5>-->
                            <?php if ($pay_balance === 'Y'): ?>
                            <div class="accordion mb-3 mt-3 boks" id="bsaldo" hidden>
                                <div class="accordion-item">
                                    <h2 class="accordion-header mb-0" id="heading-saldo">
                                        <button class="accordion-button collapsed" style="background-color: var(--warna);height: 0;padding: 25px;border-radius: 7px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-saldo" aria-expanded="false" aria-controls="collapse-saldo">
                                            <div class="left">
                                                <i class="fa fa-address-card"></i> Saldo Akun
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse-saldo" class="accordion-collapse collapse" aria-labelledby="heading-saldo" data-bs-parent="bsaldo">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-lg-6 ceklis">
                                                    <input class="radio-nominal" type="radio" name="method" value="balance" id="method-balance">
                                                    <label for="method-balance">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="mr-2 pb-0">
                                                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" class="rounded mb-1" style="height: 20px;width:auto">
                                                                </div>
                                                            </div>
                                                            <div class="col-8 ">
                                                                <div class="mt-1 text-right">
                                                                    <b class="mb-2" style="font-weight: 600; font-size: 10px;" id="price-method-balance"></b>
                                                                </div>
                                                            </div>
                                                            <div style="font-size: 12px;" class="col-12 border-top">
                                                                <b class="d-block mb-2 mx-1">Saldo Akun</b>
                                                                <p class="d-block mb-2 mx-1">Bebas Biaya Admin</p>
                                                                <b class="d-block"></b>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 text-end border-top-0" style="border-radius: 0 0 6px 6px;background: #E8E8E8;">
                                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" height="30">
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>

                            <input type="hidden" name="wa" placeholder="Masukan No. Whatsapp" class="form-control" value="<?= $users['wa'] ?>" required>
                            <h5 class="kios-card-title text-dark">Buat Pesanan</h5>
                            <div style="position: absolute;visibility: hidden;">
                                <h5 class="kios-card-title text-dark">PIN Keamanan</h5>
                                <div class="form-row pt-3">
                                    <div class="col-lg-12">
    
                                        <input type="text" name="pin" value="111111" placeholder="Masukan PIN" class="form-control" required>
                                        <small id="pin-error" class="text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <small class="mt-2 d-block mb-3">
                                    Dengan membeli otomatis saya menyutujui <a href="<?= base_url(); ?>/syarat-ketentuan/" target="_blank" class="text-warning">Ketentuan Layanan</a>.
                                </small>
                                <button type="button" class="btn btn-primary text-white" onclick="verify();">Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if ($games['popup_status'] == 'On'): ?>
<!-- Modal -->
<div class="modal fade" id="PopUpText" tabindex="-1" role="dialog" aria-labelledby="PopUpTextTitle" aria-hidden="true" style="z-index: 99999; margin-top: -35px;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg" hidden>
            <div class="modal-header" style="background-color: var(--warna)">
                <h5 class="modal-title text-dark"><b><?= $games['popup_title']; ?></b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:0"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body text-dark" style="font-size: 13px;color:">
                <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/games/<?= $games['popup_image']; ?>" width="100%" class="text-center img-fluid" style="border-radius: 5px;margin-bottom:20px">
                <?= $games['popup_desc']; ?>
                <span style="font-size: 11px; color: rgba(37, 99, 235, 1);"><?= $games['popup_date']; ?></span>
            </div>
            <div class="modal-footer">
                <button type="button" id="popupButton" class="btn btn-sm btn-danger text-white" data-bs-dismiss="modal">Saya sudah membaca</button>
            </div>
        </div>
    </div>
</div>


<?php endif ?>


<input type="hidden" id="product_id" value="0">
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

<script>
$(document).ready(function() {
    // Pilih radio button dengan id "method-balance" dan tandai sebagai "checked"
    $("#method-balance").prop("checked", true);
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        function updatePrice() {
            var selectedProduct = $('input[name="product"]:checked');
            var quantity = $('#quantity').val();
            
            if (selectedProduct.length > 0) {
                var price = selectedProduct.siblings('label').find('.currency-idr').text();
                var totalPrice = price;
                $('#nominal-text').val(totalPrice);
            }
        }

        updatePrice();

        // Update price when product is changed
        $('input[name="product"]').on('change', updatePrice);

        // Update price when quantity is changed
        $('#quantity').on('input change', updatePrice);
    });
</script>
<?php if ($games['target'] == 'voucher'): ?>
<script>
$(document).ready(function() {
    $('input[name="wa"]').on('input', function() {
        var waValue = $(this).val();
        $('input[name="user_id"]').val(waValue);
    });
});
</script>
<?php endif ?>
<script>
// Get the value of the diamonds parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const diamonds = urlParams.get('diamonds');

// If the diamonds parameter is present, find the corresponding radio button and check it
if (diamonds) {
    const radio = document.querySelector(`input[type=radio][value="${diamonds}"]`);
    if (radio) {
        radio.checked = true;
        // Scroll to the selected product
        const productDiv = radio.closest('.col-sm-4');
        if (productDiv) {
            const rect = productDiv.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            if (rect.bottom > windowHeight) {
                // The bottom of the product div is below the bottom of the viewport,
                // so adjust the scroll position to align the bottom of the div with
                // the bottom of the viewport
                window.scrollTo(0, window.scrollY + rect.bottom - windowHeight);
            } else if (rect.top < 0) {
                // The top of the product div is above the top of the viewport,
                // so adjust the scroll position to align the top of the div with
                // the top of the viewport
                window.scrollTo(0, window.scrollY + rect.top);
            }
        }
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(window).on('load', function() {

    var popupLastShown = localStorage.getItem('popupLastShown-<?= $games['slug']; ?>');
    var time_left = popupLastShown ? Math.round((popupLastShown - Date.now()) / 1000) : 0;

    if (!popupLastShown || time_left <= 0) {
        $('#PopUpText').modal('show');
    } else {
        $('#PopUpText').modal('hide');
    }

    // When the button is clicked, hide the popup and store the current time
    $('#popupButton').click(function() {
        localStorage.setItem("popupLastShown-<?= $games['slug']; ?>", Date.now() + (24 * 60 * 60 *
            1000));
        $('#PopUpText').modal('hide');
    });
});
</script>
<script>
$('.currency-idr').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(monetary_value);
    $(this).text(i);
});

$('.currency-idr-2').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(monetary_value);
    $(this).text(i);
});

function parseNumber(strg) {
    var strg = strg || "";
    var decimal = '.';
    strg = strg.replace(/[^0-9$.,]/g, '');
    if (strg.indexOf(',') > strg.indexOf('.')) decimal = ',';
    if ((strg.match(new RegExp("\\" + decimal, "g")) || []).length > 1) decimal = "";
    if (decimal !== "" && (strg.length - strg.indexOf(decimal) - 1 == 3) && strg.indexOf("0" + decimal) !== 0) decimal =
        "";
    strg = strg.replace(new RegExp("[^0-9$" + decimal + "]", "g"), "");
    strg = strg.replace(',', '.');
    return parseFloat(strg);
}



function get_price(id = null) {

    <?php if ($games['target'] == 'joki'): ?>
    var jumlah = $("n").val();
    <?php elseif ($games['target'] == 'jokigendong'): ?>
    var jumlah = $("#jumlah_star_poin").val();
    <?php elseif ($games['target'] == 'videomontage'): ?>
    var jumlah = $("#jumlah_menit").val();
    <?php else: ?>
    var jumlah = $("#quantity").val();
    <?php endif; ?>


    $("#product_id").val(id);

    $.ajax({
        url: '<?= base_url(); ?>/user/games/order/get-price/' + id,
        type: 'POST',
        data: 'jumlah=' + jumlah,
        dataType: 'JSON',
        success: function(result) {
            for (let price in result) {
                $("#price-method-" + result[price].method).text('Rp ' + result[price].price);


                var harga = parseNumber(result[price].price);
                var textinfo = (result[price].info);

                var balance = document.getElementById("price-method-balance");

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


                var qrisd = document.getElementById("price-method-Duitku-LQ");
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

                var infoproduct = document.getElementById("info_product_div");

                if (textinfo !== null && textinfo !== '') {
                    $('#info_product_div').css('display', 'block').html('<b>Informasi Penting :</b>' + '<br>' + textinfo);
                } else {
                    $('#info_product_div').css('display', 'none').html('');
                }


                if (balance !== null) {
                    balance.innerHTML = 'Rp ' + (Math.round((harga))).toLocaleString('id-ID');
                }

                if (qrisd !== null) {
                    qrisd.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovod !== null) {
                    ovod.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (danad !== null) {
                    danad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (shopeed !== null) {
                    shopeed.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (linkajad !== null) {
                    linkajad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (vaatmd !== null) {
                    vaatmd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vaagd !== null) {
                    vaagd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabncd !== null) {
                    vabncd.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                }
                if (vabnid !== null) {
                    vabnid.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (dvabri !== null) {
                    dvabri.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vamayd !== null) {
                    vamayd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vapermatad !== null) {
                    vapermatad.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vacimbd !== null) {
                    vacimbd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (alfamartd !== null) {
                    alfamartd.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vamandirid !== null) {
                    vamandirid.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                }

                if (qrisx !== null) {
                    qrisx.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovox !== null) {
                    ovox.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (shopeex !== null) {
                    shopeex.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (danax !== null) {
                    danax.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (linkajax !== null) {
                    linkajax.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (astrapayx !== null) {
                    astrapayx.innerHTML = 'Rp ' + (Math.round(harga * 1.015)).toLocaleString('id-ID');
                }
                if (vabnix !== null) {
                    vabnix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vapermatax !== null) {
                    vapermatax.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vamandirix !== null) {
                    vamandirix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vabrix !== null) {
                    vabrix.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vabcax !== null) {
                    vabcax.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaBJBx !== null) {
                    vaBJBx.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaBSIx !== null) {
                    vaBSIx.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString('id-ID');
                }
                if (vaSAHABAT_SAMPOERNA !== null) {
                    vaSAHABAT_SAMPOERNA.innerHTML = 'Rp ' + (Math.round(harga + 5000)).toLocaleString(
                        'id-ID');
                }
                if (indomaretx !== null) {
                    indomaretx.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }
                if (alfamartx !== null) {
                    alfamartx.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }

                if (qrissl !== null) {
                    qrissl.innerHTML = 'Rp ' + (Math.round((harga * 1.01) + 0)).toLocaleString('id-ID');
                }
                if (ovosl !== null) {
                    ovosl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (danasl !== null) {
                    danasl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (shopeesl !== null) {
                    shopeesl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (linkajasl !== null) {
                    linkajasl.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (ccvisasl !== null) {
                    ccvisasl.innerHTML = 'Rp ' + (Math.round(harga * 1.0275)).toLocaleString('id-ID');
                }
                if (alfamartsl !== null) {
                    alfamartsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (indomaretsl !== null) {
                    indomaretsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vabnisl !== null) {
                    vabnisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vabrisl !== null) {
                    vabrisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vabncsl !== null) {
                    vabncsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vacimbsl !== null) {
                    vacimbsl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vamandirisl !== null) {
                    vamandirisl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vapermatasl !== null) {
                    vapermatasl.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                
                
                if (qrislq !== null) {
                    qrislq.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovolq !== null) {
                    ovolq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (danalq !== null) {
                    danalq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (shopeelq !== null) {
                    shopeelq.innerHTML = 'Rp ' + (Math.round(harga * 1.023) + 1000).toLocaleString('id-ID');
                }
                if (linkajalq !== null) {
                    linkajalq.innerHTML = 'Rp ' + (Math.round(harga * 1.018) + 1000).toLocaleString('id-ID');
                }
                if (alfamartlq !== null) {
                    alfamartlq.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                }
                if (indomaretlq !== null) {
                    indomaretlq.innerHTML = 'Rp ' + (Math.round(harga + 1500)).toLocaleString('id-ID');
                }
                if (vapermatalq !== null) {
                    vapermatalq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vacimblq !== null) {
                    vacimblq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vadanamonq !== null) {
                    vadanamonq.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vamandirilq !== null) {
                    vamandirilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabrilq !== null) {
                    vabrilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vaneolq !== null) {
                    vaneolq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabsilq !== null) {
                    vabsilq.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabnilq !== null) {
                    vabnilq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vabcalq !== null) {
                    vabcalq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (vamaybanklq !== null) {
                    vamaybanklq.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }



                if (BCATransfer !== null) {
                    BCATransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (BNITransfer !== null) {
                    BNITransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (BRITransfer !== null) {
                    BRITransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (MandiriTransfer !== null) {
                    MandiriTransfer.innerHTML = 'Rp ' + (Math.round((harga * 1))).toLocaleString('id-ID');
                }
                if (BCAQRIS !== null) {
                    BCAQRIS.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 800)).toLocaleString('id-ID');
                }
                

                if (qrisc !== null) {
                    qrisc.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 800)).toLocaleString('id-ID');
                }
                if (qris1 !== null) {
                    qris1.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 750)).toLocaleString('id-ID');
                }
                if (ovo !== null) {
                    ovo.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (shopee !== null) {
                    shopee.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (vabsi !== null) {
                    vabsi.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabni !== null) {
                    vabni.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabca !== null) {
                    vabca.innerHTML = 'Rp ' + (Math.round(harga + 5500)).toLocaleString('id-ID');
                }
                if (vapermata !== null) {
                    vapermata.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vamandiri !== null) {
                    vamandiri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabri !== null) {
                    vabri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (indomaret !== null) {
                    indomaret.innerHTML = 'Rp ' + (Math.round(harga + 3500)).toLocaleString('id-ID');
                }
                if (alfamart !== null) {
                    alfamart.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }
                if (alfamidi !== null) {
                    alfamidi.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }




            }

        }
    });
}

function update_total() {
    get_price($("#product_id").val());
}

$(document).ready(function() {
    var maxPinLength = 6;

    $('input[name="pin"]').on('input', function() {
        var pin = $(this).val();
        var errorElement = $('#pin-error');

        if (pin.length > maxPinLength) {
            $(this).val(pin.substr(0, maxPinLength)); // Potong karakter setelah 6 karakter
        }

        if (pin.length !== maxPinLength) {
            errorElement.text('PIN harus terdiri dari 6 angka');
        } else if (!(/^\d+$/.test(pin))) {
            errorElement.text('PIN hanya boleh berisi angka');
        } else {
            errorElement.text('');
        }
    });
});

function verify() {
    var enteredPIN = document.getElementsByName('pin')[0].value;
    var product = $("input[name=product]:checked").val();

    if (!isNaN(enteredPIN)) {
        $.post('<?= base_url(); ?>/user/games/order/verify/' + product, { pin: enteredPIN }, function(response) {
            if (response.isValid) {
                // PIN benar, lakukan tindakan atau panggil fungsi lain
                process_order();
            } else {
                Swal.fire('Gagal', 'PIN tidak sesuai', 'error');
            }
        }, 'json')
        .fail(function() {
            Swal.fire('Gagal', 'Terjadi kesalahan saat memeriksa PIN', 'error');
        });
    } else {
        Swal.fire('Gagal', 'Masukkan PIN dengan benar', 'error');
    }
}

function process_order() {

    <?php if ($games['target'] == 'joki'): ?>
    var user_id = $('.name-joki').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'skinml'): ?>
    var user_id = $('.name-skinml').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'videomontage'): ?>
    var user_id = $('.name-videomontage').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'topuplogin'): ?>
    var user_id = $('.name-topuplogin').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-ragnarox'): ?>
    var user_id = $('.name-lg-ragnarox').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-dragonhunter'): ?>
    var user_id = $('.name-lg-dragonhunter').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-fourgods'): ?>
    var user_id = $('.name-lg-fourgods').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-genshinimpact'): ?>
    var user_id = $('.name-lg-genshinimpact').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-ninokuni'): ?>
    var user_id = $('.name-lg-ninokuni').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-neverafter'): ?>
    var user_id = $('.name-lg-neverafter').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-clashofclans'): ?>
    var user_id = $('.name-lg-clashofclans').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginapex'): ?>
    var user_id = $('.name-loginapex').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginefootball'): ?>
    var user_id = $('.name-loginefootball').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginff'): ?>
    var user_id = $('.name-loginff').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logingenshin'): ?>
    var user_id = $('.name-logingenshin').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginml'): ?>
    var user_id = $('.name-loginml').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginninokuni'): ?>
    var user_id = $('.name-loginninokuni').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginpokemon'): ?>
    var user_id = $('.name-loginpokemon').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginraven'): ?>
    var user_id = $('.name-loginraven').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logintiktok'): ?>
    var user_id = $('.name-logintiktok').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logintower'): ?>
    var user_id = $('.name-logintower').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginwildrift'): ?>
    var user_id = $('.name-loginwildrift').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'tournament'): ?>
    var user_id = $('.name-tournament').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php else: ?>
    var user_id = $("input[name=user_id]").val();
    var zone_id = $("input[name=zone_id]").val();
    <?php endif; ?>

    if (zone_id == undefined) {
        zone_id = $("select[name=zone_id]").val();
    }

    var product = $("input[name=product]:checked").val();
    var method = $("input[name=method]:checked").val();
    var wa = $("input[name=wa]").val();
    var quantity = $("input[name=quantity]").val();
    var voucher = $("input[name=voucher]").val();

    if (user_id == '' || user_id == ' ') {
        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
    } else if (zone_id == '' || zone_id == ' ') {
        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
    } else if (product == '' || product == ' ') {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else if (method == '' || method == ' ') {
        Swal.fire('Gagal', 'Pilih metode pembayaran', 'error');
    } else if (quantity == '' || quantity == 0) {
        Swal.fire('Gagal', 'Isi Jumlah Pesanan', 'error');
    } else if (wa.length < 10 || wa.length > 14) {
        Swal.fire('Gagal', 'Nomor Whatsapp tidak sesuai', 'error');
    } else {
        $.ajax({
            url: '<?= base_url(); ?>/user/games/order/get-detail/' + product,
            data: 'user_id=' + user_id + '&zone_id=' + zone_id + '&method=' + method + '&wa=' + wa + '&quantity=' + quantity +
                '&voucher=' + voucher + '&target=<?= $games['target']; ?>',
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $("#modal-loading").modal('hide');
            },
            success: function(result) {

                $("#modal-loading").modal('hide');

                if (result.status == true) {
                    $("#modal-detail div div .modal-body").html(result.msg);

                    $("#modal-detail").modal('show');
                } else {
                    Swal.fire('Gagal', result.msg, 'error');
                }
            }
        });
    }
}

function nonaktif_button() {
                document.getElementById('1xorder').innerHTML = 'Menunggu...';
                document.getElementById('1xorder').style.pointerEvents = 'none';
            }

function cek_voucher() {

    var product = $("input[name=product]:checked").val();
    var voucher = $("input[name=voucher]").val();

    if (voucher == '' || voucher == ' ') {
        Swal.fire('Gagal', 'Kode voucher harus diisi', 'error');
    } else if (product == '' || product == ' ') {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else if (product == undefined) {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else {
        $.ajax({
            url: '<?= base_url(); ?>/user/games/voucher/' + product,
            data: 'voucher=' + voucher,
            type: 'POST',
            dataType: 'JSON',
            success: function(result) {
                if (result.success) {
                    Swal.fire('Berhasil', result.msg, 'success');
                } else {
                    Swal.fire('Gagal', result.msg, 'error');
                }
            }
        });
    }
}

function select_product_category(id) {
    $(".row-category").addClass('d-none');
    $("#product-category-" + id).removeClass('d-none');

    $(".btn-category").removeClass('active');
    $("#btn-category-" + id).addClass('active');
}
</script>
<?php $this->endSection(); ?>