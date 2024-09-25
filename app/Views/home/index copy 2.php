<?php $this->extend('layout/template'); ?>

<?php $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/home.css">
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="container">
    <div class="PB-5 pt-5" style="border-radius: 10px;padding: 10px; overflow: hidden;margin-top: -50px;">
        <ul class="nav nav-pills tab-category gap-2 pb-2" id="pills-tab" role="tablist"
            style="flex-wrap: nowrap;justify-content: flex-start;overflow-y: hidden; padding-bottom: 0px; margin-top:30px">
            <li class="nav-item">
                <a style="white-space: pre;font-weight: 600;" class="nav-link active" id="pills-all-tab"
                    data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all"
                    aria-selected="true">All</a>
            </li>
            <?php $no = 1;
            foreach ($games as $game): ?>
                <?php if ($game['category'] !== 'Flashsale' && $game['category'] !== 'Influencer' && $game['category'] !== 'Games Populer' && $game['category'] !== 'Joki Rank'): ?>
                    <li class="nav-item">
                        <a style="white-space: pre;font-weight: 600;" class="nav-link "
                            id="pills-<?= url_title($game['category'], '-', true); ?>-tab" data-toggle="pill"
                            href="#pills-<?= url_title($game['category'], '-', true); ?>" role="tab"
                            aria-controls="pills-<?= url_title($game['category'], '-', true); ?>"
                            aria-selected="true"><?= $game['category']; ?></a>
                    </li>
                <?php endif; ?>
            <?php $no++;
            endforeach ?>
        </ul>

        <a class="d-flex leaderboard-flex align-items-center mt-2" href="<?= base_url(); ?>/leaderboard" style="display:none !important;">

            <p class="mb-0 leaderboard d-flex">
                <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">Sultan Hidden Game
                <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">
            </p>
        </a>
    </div>
</div>



<div class="tab-content" id="pills-tabContent">
    <!-- Tab All -->
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
        <?php foreach ($games as $game): ?>
            <div class="container pt-2 pb-2">
                <div class="row">
                    <div class="col-12">
                        <?php if ($game['category'] != 'Influencer' && $game['category'] != 'Games Populer' && $game['category'] != 'Joki Rank'): ?>
                            <h5 class="font-proximanovabldddd" style="font-size: 28px;color:var(--warna_2) !important; font-weight: 700; text-transform:uppercase;"><?= $game['category']; ?></h5>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div class="container">
                    <div class="row game">

                        <!-- Influencer Produk -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/influencer-2.png" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JASA INFLUENCER</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button id="toggleModal3Button" class="btn btn-transparent" onclick="toggleModal3()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Joki Produk -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/joki.webp" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JOKI MOBILE LEGENDS</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button id="toggleModal5Button" class="btn btn-transparent" onclick="toggleModal5()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Modal Influencer -->
                        <div class="modal-container-3" onclick="toggleModal3()"></div>
                        <div class="modal-window-3 hidden-category" id="modal-content-3">
                            <h2 style="text-align:center">
                                <img src="<?= base_url(); ?>/assets/images/talent-title.png" class="talent-title">
                            </h2>
                            <div class="infl-body">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['category'] == 'Influencer' && $loop['status'] == 'On'): ?>
                                        <div class="infl-body-item">
                                            <div style="margin-bottom: 0px;" class="card-infl">
                                                <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>">
                                                    <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-infl" style="border-radius: 10px;">
                                                    <div data-v-16b318a8="" class="product-tile__clip-path-infl">
                                                        <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                        <div class="card-title2-infl" style="font-weight:bold;"><?= $loop['games']; ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Modal Joki -->
                        <div class="modal-container-5" onclick="toggleModal5()"></div>
                        <div class="modal-window-5 hidden-category" id="modal-content-5">
                            <div class="infl-body">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['category'] == 'Joki Rank' && $loop['status'] == 'On'): ?>
                                        <div class="infl-body-item">
                                            <div style="margin-bottom: 0px;" class="card-infl">
                                                <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>">
                                                    <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-infl" style="border-radius: 10px;">
                                                    <div data-v-16b318a8="" class="product-tile__clip-path-infl">
                                                        <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                        <div class="card-title2-infl" style="font-weight:bold;"><?= $loop['games']; ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Start Game -->

                        <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On' && $loop['category'] != 'Influencer' && $game['category'] != 'Joki Rank' && $game['category'] != 'Games'): ?>
                                <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                    <div class="card mb-3" style="">
                                        <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="product_list">
                                            <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>"
                                                    class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                                <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                                                    <div class="diskon">-<?= $loop['discount']; ?>%</div>
                                                <?php endif; ?>
                                                <div data-v-16b318a8="" class="product-tile__clip-path">
                                                    <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                    <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                                                </div>
                                                <div class="card-subtitle" bis_skin_checked="1"></div>
                                                <div class="card-topup" bis_skin_checked="1" hidden>
                                                    <div class="btn-topup" style="font-size: 0.60rem!important;"
                                                        bis_skin_checked="1"> TOP UP </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <!-- End Of Game -->

                        <!-- Start Load more -->
                        <?php if ($game['category'] === 'Games'): ?>
                            <div class="row game" id="gamesContainer">
                                <?php foreach ($game['games'] as $loop): ?>
                                    <?php if ($loop['status'] == 'On' && $loop['category'] != 'Influencer' && $game['category'] != 'Joki Rank' && $game['category'] != 'Games Populer'): ?>
                                        <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                            <div class="card mb-3" style="">
                                                <a href="<?= base_url(); ?>games/<?= $loop['slug']; ?>" class="product_list">
                                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
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
                            </div>
                        <?php endif ?>
                        <!-- End Load more And Show More -->
                        <?php if ($game['category'] === 'Games'): ?>
                            <div class="text-center mt-4">
                                <!-- Ubah id button menjadi "showless" dan "loadmore" -->
                                <button class="btn btn-secondary" id="showless" style="display:none;">Show Less</button>
                                <button class="btn btn-primary" style="color: red;" id="loadmore">Load more</button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Start Category Game -->

    <?php $no = 1;
    foreach ($games as $game): ?>
        <div class="tab-pane fade " id="pills-<?= url_title($game['category'], '-', true); ?>" role="tabpanel"
            aria-labelledby="pills-<?= url_title($game['category'], '-', true); ?>-tab">
            <div class="container pt-4 pb-4">
                <div class="row">
                    <div class="col-12">
                        <h5 class="font-proximanovabldddd" style="font-size: 28px;color:var(--warna_2) !important; font-weight: 700; text-transform:uppercase;"><?= $game['category']; ?></h5>

                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div class="container">
                    <div class="row game">

                        <!-- Card Influencer -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/influencer-2.png"
                                            class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JASA INFLUENCER</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button class="btn btn-transparent" onclick="toggleModal4()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Card Joki -->
                        <?php if ($game['category'] == 'Produk Populer'): ?>
                            <div style="margin-bottom:30px; display:flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                <div class="card mb-3" style="">
                                    <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                        <img src="<?= base_url(); ?>/assets/images/joki.webp"
                                            class="img-fluid img-games" style="border-radius: 15px 15px 15px 15px; display: block;">
                                        <div data-v-16b318a8="" class="product-tile__clip-path">
                                            <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                            <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1">JOKI MOBILE LEGENDS</div>
                                        </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden>
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <button class="btn btn-transparent" onclick="toggleModal6()" type="button" aria-haspopup="true" aria-expanded="false" style="width: 100%; height: 100%; opacity: 0;">Open Modal</button>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On'): ?>
                                <div style="margin-bottom: 30px;display: flex;" class="col-sm-3 col-lg-2 col-4 text-center">
                                    <div class="card mb-3 " style="">
                                        <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="product_list">
                                            <div style="margin-bottom: 0px;" class="card" bis_skin_checked="1">
                                                <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>"
                                                    class="img-fluid img-games" style="border-radius: 10px; display: block;">
                                                <?php if (!empty($loop['discount']) && $loop['discount'] !== '0'): ?>
                                                    <div class="diskon">-<?= $loop['discount']; ?>%</div>
                                                <?php endif; ?>
                                                <div data-v-16b318a8="" class="product-tile__clip-path">
                                                    <img src="<?= base_url(); ?>/assets/images/favicon-hiddengame.png" alt="card-img" class="card-img">
                                                    <div class="card-title2" style="font-weight:bold;" bis_skin_checked="1"><?= $loop['games']; ?></div>
                                                </div>
                                                <div class="card-subtitle" bis_skin_checked="1"></div>
                                                <div class="card-topup" bis_skin_checked="1" hidden>
                                                    <div class="btn-topup" style="font-size: 0.60rem!important;"
                                                        bis_skin_checked="1"> TOP
                                                        UP </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $no++;
    endforeach ?>

    <!-- End Of Category Game -->

    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="animation: newsTitle 3s infinite;">
            <img src="<?= base_url(); ?>/assets/images/news-title.png" style="justify-content:center" id="news-title">
        </div>
    </div>
    <section class="swiper-banner">
        <div class="recipe-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($post as $loop): ?>
                        <?php if (strpos($loop['category'], 'Popular') !== false): ?>
                            <div class="swiper-slide post">
                                <a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>" class="post-link">
                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="post-img" href="<?= base_url(); ?>/post/<?= $loop['id']; ?>">
                                    <div class="post-body">
                                        <div class="post-detail">
                                            <h2 class="post-name"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></h2>
                                            <p class="post-author">Hiddengame - <i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="button-container-more">
            <a type="button" href="<?= base_url(); ?>/postingan">Selengkapnya</a>
        </div>
    </section>
</div>

<div class="mb-5">

    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div style="border-radius:25px;padding:15px;">-->
    <!--            <h5 class="font-proximanovabl" style="font-size: 28px; color:var(--warna_7) !important;text-transform: uppercase;">PROMO </h5>-->
    <!--            <div class="d-flex element-scroll" style="overflow-x: scroll;">-->
    <!--                <?php foreach ($post as $loop): ?>-->
    <!--                <div class="col-sm-12 col-lg-4 col-12 text-center" style="display: grid;">-->
    <!--                    <div class="card tes-card"-->
    <!--                        style="margin-bottom: 2.5rem!important;margin-top: 1.5rem;padding: 0.4rem !important;background: var(--warna_8);">-->
    <!--                        <div href="<?= base_url(); ?>/post/<?= $loop['id']; ?>" class="category-artikel">-->
    <!--                            <div class="card-game pb-3">-->
    <!--                                <div class="img-promo">-->
    <!--                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>"-->
    <!--                                        class="img-fluid">-->
    <!--                                </div>-->
    <!--                                <h5 style="padding: 18px 18px 18px 18px;text-align: left;margin-bottom: 0rem;" class="text-white">-->
    <!--                                    <?= $loop['title']; ?></h5>-->
    <!--                                <div class="promo text-left text-white" style="padding: 0px 18px 0px 18px;color:var(--warna_hitam);">-->
    <!--                                    <?= htmlspecialchars_decode($loop['content']); ?>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <?php endforeach ?>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<div class="container" style="padding-bottom: 100px;" hidden>
    <div data-v-3917c69b="" class="home__feeds-items">

        <div data-v-24b86abb="" data-v-3917c69b="" class="coda-about__container">
            <div data-v-24b86abb="" class="coda-about__content">
                <h1 data-v-24b86abb="" class="coda-about__header"><?= $title; ?></h1>
                <h2 data-v-24b86abb="" class="coda-about__sub-header"><?= $title; ?>: <?= $web['title']; ?></h2>
                <p data-v-24b86abb="" class="coda-about__short-description">Setiap bulannya, jutaan gamers menggunakan
                    <?= $title; ?> untuk melakukan pembelian kredit game dengan lancar: tanpa registrasi ataupun log-in,
                    dan kredit permainan akan ditambahkan secara instan. Top-up Mobile Legends, Free Fire, Ragnarok M,
                    dan berbagai game lainnya!</p>
                <article data-v-24b86abb="" class="coda-about__card-group">
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Quick icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Bayar dalam hitungan detik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Hanya dibutuhkan beberapa detik
                                saja untuk menyelesaikan pembayaran di <?= $title; ?> karena situs kami berfungsi dengan
                                baik dan mudah untuk digunakan.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Delivery icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Pengiriman instan</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Ketika kamu melakukan top-up di
                                <?= $title; ?>, item atau barang yang kamu beli akan selalu dikirim ke akun kamu secara
                                instan dan cepat, tanpa tertunda.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Payments icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Metode pembayaran terbaik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Kami menawarkan begitu banyak
                                pilihan pembayaran mulai dari potong pulsa, e-wallet, bank transfer, dan pembayaran di
                                mini market terdekat.</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Customer Support"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Layanan Pelanggan</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Tim support siap membantu Anda
                                dari pukul 9 pagi hingga 10 malam, 7 hari seminggu. Kirimkan <a
                                    href="https://id.support.codashop.com/hc/id-id/requests/new" target="_blank">
                                    Support Request Form </a> dan kami akan segera menghubungi Anda!</p>
                        </div>
                    </div>
                    <div data-v-7e34a1fb="" data-v-24b86abb="" class="coda-about__card-container">
                        <div data-v-7e34a1fb="" class="coda-about__card-icon-container">
                            <img data-v-7e34a1fb="" alt="Promo icon"
                                src=""
                                height="36" width="36" class="coda-about__card-icon">
                        </div>
                        <div data-v-7e34a1fb="" class="coda-about__card-content">
                            <h3 data-v-7e34a1fb="" class="coda-about__card-title">Promosi-promosi menarik</h3>
                            <p data-v-7e34a1fb="" class="coda-about__card-description">Penggemar game dapat bergantung
                                pada HIDDENGAME karena kami memberikan penawaran menarik, diskon dan kode item dari promosi
                                game yang disukai kamu.</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<div class="container pt-4 pb-4" style="padding: 1.5rem !important;" hidden>
    <div class="row">
        <div class="row col-sm-6 col-12">
            <h5 style="font-size: 40px; color:#292929;text-transform: uppercase;">Ikuti Kami</h5>
            <p><br>Dapatkan Informasi Dan Promo Menarik Dengan Cara Mengikuti Media Sosial kami.</p>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/instagram.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['ig']; ?>">
                <a href="<?= $sm['ig']; ?>" class="text-center mb-4"
                    style="font-weight:bold;font-size:17px">Instagram</a>
            </div>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/tiktok.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['tw']; ?>">
                <a href="<?= $sm['tw']; ?>" class="text-center mb-4" style="font-weight:bold;font-size:17px">Tiktok</a>
            </div>
            <div class="col-3 card m-2" style="background-color:#32323E!important;align-items: center;">
                <img src="<?= base_url(); ?>/assets/images/youtube.svg" class="pt-4 img-fluid text-center"
                    style="border-radius: 10px; display: block; width: 80px" href="<?= $sm['yt']; ?>">
                <a href="<?= $sm['yt']; ?>" class="text-center mb-4" style="font-weight:bold;font-size:17px">Youtube</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal111" aria-labelledby="modalInformationsLabel" tabindex="-1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content " style="background-color: #06142f !important;box-shadow:0 0 2rem #000000 !important">
            <div class="modal-body">
                <div class="row" id="textInfo">
                    <div class="col-12 mb-2">
                        <div class="card"
                            style="border:1px solid #4b4d50;background-color: #484d52;box-shadow:0px 0px 0px #e7e7e7 !important">
                            <div class="card-header">
                                <h5 style="color: #fff;font-size;1.25rem">Perhatian !</h5>
                            </div>
                            <div class="card-body pb-1" style="background-color: #06142f !important">
                                <div class="col-12" style="text-align:center">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="70%" class="mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: right!important;">
                        <button type="submit" data-dismiss="modal"
                            style="font-size:12px;background-color: #fff !important;color:#06142F !important;padding:10px;font-size:12px;font-weight:500"
                            class="close btn btn-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($popup['status'] == 'On'): ?>
    <div class="modal fade" id="PopUpText" tabindex="-1" role="dialog" aria-labelledby="PopUpTextTitle" aria-hidden="true"
        style="z-index: 99999; margin-top: -35px;">
        <div class="modal-dialog modal-dialog-centered" role="document" style="justify-content:center">
            <div class="modal-content shadow-lg" style="background-color: #fff; width:80%; border-radius:18px">
                <div class="btn-close-popup" style="text-align:right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:0;background: #fff;color: red; width:10%; justify-content:flex-end; border-radius:100px"><i class="fa fa-times text-red" aria-hidden="true" style="font-size:1.3rem; margin-top:10px; "></i></button>
                </div>
                <div class="modal-body text-white" style="font-size: 13px; padding:.75rem !important">
                    <?php if (!empty($popup['image']) && $popup['image'] !== '-'): ?>
                        <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/<?= $popup['image']; ?>"
                            width="100%" class="text-center img-fluid" style="border-radius: 5px;margin-bottom:20px">
                    <?php endif; ?>
                </div>
                <?php if ($users === false): ?>
                    <div class="modal-footer" style="justify-content:center !important">
                        <div class="popup-bt">
                            <a href="<?= base_url(); ?>/login">
                                <button type="button" class="login-bt">Login</button>
                            </a>
                            <a href="<?= base_url(); ?>/register">
                                <button type="button" class="signup-bt">Daftar</button>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($popup['status'] == 'On'): ?>
    <!-- Modal -->
    <!--<div class="modal fade" id="PopUpText" tabindex="-1" role="dialog" aria-labelledby="PopUpTextTitle" aria-hidden="true"-->
    <!--    style="z-index: 99999; margin-top: -35px;">-->
    <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--        <div class="modal-content shadow-lg" style="background-color: var(--warna_2);">-->
    <!--            <div class="modal-header" style="background-color: var(--warna_2);">-->
    <!--                <h5 class="modal-title text-white"><b><?= $popup['title']; ?></b></h5>-->
    <!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"-->
    <!--                    style="border:0;background: var(--warna_2);color: #fff;"><i class="fa fa-times text-white" aria-hidden="true"></i></button>-->
    <!--            </div>-->
    <!--            <div class="modal-body text-white" style="font-size: 13px;">-->
    <!--                <?php if (!empty($popup['image']) && $popup['image'] !== '-'): ?>-->
    <!--                    <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/<?= $popup['image']; ?>"-->
    <!--                        width="100%" class="text-center img-fluid" style="border-radius: 5px;margin-bottom:20px">-->
    <!--                <?php endif; ?>-->
    <!--                <?= $popup['desc']; ?>-->
    <!--                <span style="font-size: 11px; color: rgba(37, 99, 235, 1);"><?= $popup['date']; ?></span>-->
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <button type="button" id="popupButton" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Saya sudah-->
    <!--                    membaca</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
<?php endif ?>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>


<script>
    $(document).ready(function() {
        let offset = <?= $limit; ?>;
        let limit = 12;
        let new_limit = limit - offset;

        const category = 'Games'; // Anda dapat mengganti ini sesuai kebutuhan

        $('#loadmore').click(function() {
            $.ajax({
                url: '<?= base_url('home/loadMoreGames') ?>',
                method: 'POST',
                data: {
                    category: category,
                    offset: offset
                },
                success: function(response) {
                    // Append new games to the existing list
                    $('#gamesContainer').append(response.html);
                    // Update offset
                    offset = response.new_offset;
                    $('html, body').animate({
                        scrollTop: $('#gamesContainer div.col-sm-3:last').offset().top
                    }, 1000);
                    // Check if end_of_games is true, hide the 'Load More' button if so
                    if (response.end_of_games) {
                        $('#loadmore').hide();
                    }
                    // Show 'Show Less' button
                    $('#showless').show();
                }
            });
        });

        $('#showless').click(function() {
            $.ajax({
                url: '<?= base_url('home/showLessGames') ?>',
                method: 'POST',
                data: {
                    category: category
                },
                success: function(response) {
                    // console.log('res', response);
                    $('#gamesContainer').html(response.html); // Ganti isi container dengan data awal
                    offset = response.new_offset;
                    $('html, body').animate({
                        scrollTop: $('#gamesContainer').offset().top
                    }, 1000);

                    $('#loadmore').show(); // Tampilkan tombol Load More
                    $('#showless').hide(); // Sembunyikan tombol Show Less
                }
            });
        });
    });
</script>

<script>
    const toggleModal3 = () => {
        const bodyClassList = document.body.classList;
        if (bodyClassList.contains("open-modal-3")) {
            bodyClassList.remove("open-modal-3");
            bodyClassList.add("closed-modal-3");
        } else {
            resetModalClasses();
            bodyClassList.remove("closed-modal-3");
            bodyClassList.add("open-modal-3");
        }
        document.body.classList.toggle("no-scroll");
        document.getElementById('modal-content-3').classList.toggle('hidden-category');
    };

    const toggleModal4 = () => {
        // Pindah ke tab "all"
        document.querySelector('#pills-all-tab').click();

        // Scroll ke bagian modal dan aktifkan modal
        setTimeout(() => {
            document.querySelector('#toggleModal3Button').click();
        }, 100); // Menunda sedikit agar perpindahan tab sempat selesai
    };

    const toggleModal5 = () => {
        const bodyClassList = document.body.classList;
        if (bodyClassList.contains("open-modal-5")) {
            bodyClassList.remove("open-modal-5");
            bodyClassList.add("closed-modal-5");
        } else {
            resetModalClasses();
            bodyClassList.remove("closed-modal-5");
            bodyClassList.add("open-modal-5");
        }
        document.body.classList.toggle("no-scroll");
        document.getElementById('modal-content-5').classList.toggle('hidden-category');
    };

    const toggleModal6 = () => {
        // Pindah ke tab "all"
        document.querySelector('#pills-all-tab').click();

        // Scroll ke bagian modal dan aktifkan modal
        setTimeout(() => {
            document.querySelector('#toggleModal5Button').click();
        }, 100); // Menunda sedikit agar perpindahan tab sempat selesai
    };

    const resetModalClasses = () => {
        const bodyClassList = document.body.classList;
        bodyClassList.remove("open-modal-3", "closed-modal-3", "open-modal-5", "closed-modal-5");
        document.getElementById('modal-content-3').classList.add('hidden-category');
        document.getElementById('modal-content-5').classList.add('hidden-category');
    };
</script>

<script>
    var swiper = new Swiper(".swiper", {
        grabCursor: true,
        speed: 400,
        loop: true,
        mousewheel: {
            invert: false,
        },
        scrollbar: {
            el: ".swiper-scrollbar",
            draggable: true,
        },
        slidesPerView: 2,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
            700: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            900: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        autoplay: {
            delay: 3000, // 2000ms = 2 detik
            disableOnInteraction: false,
        },
    });
</script>

<script>
    var rev = $('.rev_slider');
    rev.on('init', function(event, slick, currentSlide) {
        var cur = $(slick.$slides[slick.currentSlide]),
            next = cur.next(),
            prev = cur.prev();
        prev.addClass('slick-sprev');
        next.addClass('slick-snext');
        cur.removeClass('slick-snext').removeClass('slick-sprev');
        slick.$prev = prev;
        slick.$next = next;
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        // console.log('beforeChange');
        var cur = $(slick.$slides[nextSlide]);
        // console.log(slick.$prev, slick.$next);
        slick.$prev.removeClass('slick-sprev');
        slick.$next.removeClass('slick-snext');
        next = cur.next(),
            prev = cur.prev();
        prev.prev();
        prev.next();
        prev.addClass('slick-sprev');
        next.addClass('slick-snext');
        slick.$prev = prev;
        slick.$next = next;
        cur.removeClass('slick-next').removeClass('slick-sprev');
    });

    rev.slick({
        speed: 1000,
        arrows: true,
        dots: false,
        focusOnSelect: true,
        infinite: true,
        centerMode: true,
        prevArrow: '<i class="slick-arrow-prev"><</i>',
        nextArrow: '<i class="slick-arrow-next">></i>',
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '0',
        swipe: true,
        customPaging: function(slider, i) {
            return '';
        },
        /*infinite: false,*/
        autoplay: true, // Add autoplay
        autoplaySpeed: 2000, // Set autoplay speed (in milliseconds)
    }).on('setPosition', function() {
        $('.banner-skeleton').hide();
        $('.rev_slider').addClass('loaded');
    });
</script>

<script>
    function truncateContent(contentClass, maxLength) {
        var contentDivs = document.getElementsByClassName(contentClass);

        Array.from(contentDivs).forEach(function(contentDiv) {
            var content = contentDiv.textContent.trim();
            var truncatedContent = content.slice(0, maxLength);

            if (content.length > maxLength) {
                contentDiv.innerHTML = truncatedContent + '... <a href="#" class="readMore">Selengkapnya</a>';
            }

            contentDiv.addEventListener('click', function(event) {
                if (event.target.classList.contains('readMore')) {
                    event.preventDefault();
                    contentDiv.innerHTML = content + ' <a href="#" class="readLess">lebih sedikit</a>';
                } else if (event.target.classList.contains('readLess')) {
                    event.preventDefault();
                    contentDiv.innerHTML = truncatedContent +
                        '... <a href="#" class="readMore">Selengkapnya</a>';
                }
            });
        });
    }

    truncateContent('promo', 130);
</script>
<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '{938473200580408}');
    fbq('init', '{9532506813488688}');
    fbq('init', '{584979920420062}');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={938473200580408}&ev=PageView&noscript=1" />
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={9532506813488688}&ev=PageView&noscript=1" />
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={584979920420062}&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript">
    $(window).on('load', function() {

        var popupLastShown = localStorage.getItem('popupLastShown');
        var time_left = popupLastShown ? Math.round((popupLastShown - Date.now()) / 1000) : 0;

        if (!popupLastShown || time_left <= 0) {
            $('#PopUpText').modal('show');
        } else {
            $('#PopUpText').modal('hide');
        }

        // When the button is clicked, hide the popup and store the current time
        $('#popupButton').click(function() {
            localStorage.setItem("popupLastShown", Date.now() + (24 * 60 * 60 * 1000));
            $('#PopUpText').modal('hide');
        });
    });
</script>

<script>
    // Get the button
    var btn = document.getElementById("back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    btn.onclick = function() {
        topFunction();
    };

    function topFunction() {
        // Using smooth scroll method
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
</script>


<script>
    $(document).ready(function() {
        var timeParsed = '<?= $expired; ?>'.replace(' ', 'T').split(/[^0-9]/);
        var countDown = new Date(new Date(timeParsed[0], timeParsed[1] - 1, timeParsed[2], timeParsed[3],
            timeParsed[4], timeParsed[5])).getTime();

        var x = setInterval(() => {
            let nowTime = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDown - nowTime;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            if (distance > 0) {
                // document.getElementById("expired_time").innerHTML = `${minutes} minutes ${seconds} seconds`
                $("#expired_time_flash_sale").text(`${days}:${hours}:${minutes}:${seconds}`)
            }
        }, 1000);

        $("#paycode").tooltip();
        $("#paycode").click(function() {
            copyToClipboard($(this).text().trim().replace(".", ""), $(this));
        })
        $("#paycode").css('cursor', 'pointer');
    })
</script>
<script>
    var swiper = new Swiper(".swiper-container.two", {
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            // when window width is >= 640px
            640: {

                slidesPerView: 3,
                spaceBetween: 10

            }
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php $this->endSection(); ?>