<?php foreach ($games as $loop): ?>
    <?php if ($loop['status'] == 'On'): ?>
        <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
            <div class="card mb-3 " style="">
                <a href="<?= base_url(); ?>games/<?= $loop['slug']; ?>" class="product_list">
                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                        <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-fluid img-games" style="border-radius: 10px; display: block;">
                        <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                            <div class="diskon">-<?= $loop['discount']; ?>%</div>
                        <?php endif; ?>
                        <div data-v-16b318a8="" class="product-tile__clip-path">
                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                        </div>
                        <div class="card-subtitle" bis_skin_checked="1"></div>
                        <div class="card-topup" bis_skin_checked="1" hidden>
                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endif ?>
<?php endforeach ?>