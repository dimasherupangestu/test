<?php $this->extend('layout/template'); ?>

<?php $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/home.css" ?>">
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<!-- TABS CATEGORY -->
<div class="container pt-5">
    <div class="PB-5 pt-5" style="border-radius: 10px;padding: 10px; overflow: hidden;margin-top: -50px;">
        <ul class="nav nav-pills tab-category gap-2 pb-2" id="pills-tab" role="tablist" style="flex-wrap: nowrap;justify-content: flex-start;overflow-y: hidden; padding-bottom: 0px; margin-top:30px">
            <li class="nav-item">
                <a style="white-space: pre;font-weight: 600;" class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
            </li>
            <?php $no = 1;
            foreach ($games as $game): ?>
                <?php if ($game['category'] !== 'Flashsale' && $game['category'] !== 'Influencer' && $game['category'] !== 'Games Populer' && $game['category'] !== 'Joki Rank'): ?>
                    <li class="nav-item">
                        <a style="white-space: pre;font-weight: 600;" class="nav-link " id="pills-<?= url_title($game['category'], '-', true); ?>-tab" data-toggle="pill" href="#pills-<?= url_title($game['category'], '-', true); ?>" role="tab" aria-controls="pills-<?= url_title($game['category'], '-', true); ?>" aria-selected="true"><?= $game['category']; ?></a>
                    </li>
                <?php endif; ?>
            <?php $no++;
            endforeach ?>
        </ul>
        <a class="d-flex leaderboard-flex align-items-center mt-2" href="<?= base_url(); ?>/leaderboard" style="display:none !important;">
            <p class="mb-0 leaderboard d-flex">
                <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">Sultan Hidden Game <img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="23" width="23" style="z-index:100;">
            </p>
        </a>
    </div>
</div>
<!-- END TABS CATEGORY -->

<!-- TAB CONTENT -->
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
                    <!-- Tambahkan id "gamesContainer" untuk memudahkan manipulasi DOM -->
                    <div class="row game" id="gamesContainer">
                        <!-- Start Game -->
                        <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On' && $loop['category'] != 'Influencer' && $game['category'] != 'Joki Rank'): ?>
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
                        <!-- End Of Game -->
                    </div>
                    <?php if ($game['category'] === 'Games'): ?>
                        <div class="text-center mt-4">
                            <!-- Ubah id button menjadi "showless" dan "loadmore" -->
                            <button class="btn btn-secondary" id="showless" style="display:none;">Show Less</button>
                            <button class="btn btn-primary" id="loadmore">Load more</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- Start Category Game -->
    <?php $no = 1;
    foreach ($games as $game): ?>
        <div class="tab-pane fade " id="pills-<?= url_title($game['category'], '-', true); ?>" role="tabpanel" aria-labelledby="pills-<?= url_title($game['category'], '-', true); ?>-tab">
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
                        <?php foreach ($game['games'] as $loop): ?>
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
                    </div>
                </div>
            </div>
        </div>
    <?php $no++;
    endforeach ?>
    <!-- End Of Category Game -->
</div>
<!-- END TAB CONTENT -->


<?php $this->endSection(); ?>
<?php $this->section('js'); ?>

<!-- Tambahkan kode JavaScript untuk fungsi Load More dan Show Less -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var offset = <?= $limit; ?>;
        var limit = <?= $limit; ?>;
        var category = 'Games'; // Anda dapat mengganti ini sesuai kebutuhan

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
                    category: category,

                },
                success: function(response) {
                    // Replace games list with the initial games
                    $('#gamesContainer').html(response.html);
                    // Reset offset
                    offset = limit;
                    // Show 'Load More' button
                    $('#loadmore').show();
                    // Hide 'Show Less' button
                    $('#showless').hide();
                }
            });
        });
    });
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
        console.log('beforeChange');
        var cur = $(slick.$slides[nextSlide]);
        console.log(slick.$prev, slick.$next);
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