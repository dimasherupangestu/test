<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>

    body {

        background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
    }
    
    @keyframes newsTitle {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0);
        }
    }
    
    #news-title {
        width: 25%;
    }
    
    #news-title-p {
        position: relative;
        bottom: 1rem;
    }
    
    @media (max-width:480px) {
     
        #news-title {
        width: 65%;
    }
    
        #news-title-p {
            font-size: 14px !important;
        }
}

    /* SLIDER CSS */
    
.swiper-banner {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: 0 60px 60px 60px;
}

.news-body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  padding: 0 60px 60px 60px;
}

.recipe-container {
  background: transparent;
  /*box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);*/
  /*backdrop-filter: blur(20px);*/
  /*-webkit-backdrop-filter: blur(20px);*/
  /*border: 1px solid rgba(255, 255, 255, 0.3);*/
  border-radius: 25px;
  padding: 30px 0;
  width: min(1440px, 100%);
}

.recipe-container h1 {
  font-size: 2rem;
  font-weight: 600;
  text-align: center;
  color: #dda3b6;
  margin: 20px 0 40px;
}

.swiper {
  width: 100%;
  height: 100%;
  margin-bottom: 30px;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
}

.swiper-scrollbar {
  --swiper-scrollbar-bottom: 0;
  --swiper-scrollbar-drag-bg-color: #89F473;
  --swiper-scrollbar-size: 5px;
}

.post {
  max-width: 800px;
  font-size: 1rem;
  font-weight: 500;
  color: var(--clr-text);
  /*background: rgba(233, 244, 227, 0.8);*/
  background: rgb(218 237 207 / 80%);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 16px 16px 0;
  margin-bottom: 16px;
}

.post-img {
  width: 100%;
  /*max-width: 480px;*/
  object-fit: cover;
  overflow: hidden;
  border-radius: 6px;
  user-select: none;
  /*pointer-events: none;*/
}

.post-body {
  display: grid;
  /*grid-template-columns: 15% 60% 20%;*/
  align-items: center;
  gap: 8px;
  padding: 15px 0;
  cursor: default;
}

.post-name {
  font-size: 0.9rem;
  font-weight: 600;
  margin-bottom: 2px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.post-author {
  width: fit-content;
  font-size: 0.8rem;
  font-weight: 600;
  opacity: 0.6;
  color: var(--clr-text);
}

.post-avatar {
  width: 40px;
  aspect-ratio: 1/1;
  object-fit: cover;
  border-radius: 5px;
  cursor: pointer;
}

.post-actions {
  position: relative;
}

.post-actions-content {
  position: absolute;
  bottom: 130%;
  right: 0;
  padding: 8px;
  border-radius: 8px;
  background: rgba(172, 172, 172, 0.2);
  /*backdrop-filter: blur(10px);*/
  /*-webkit-backdrop-filter: blur(10px);*/
  box-shadow: 2px 2px 10px 2px hsl(0, 0%, 0%, 0.25);
  transition: opacity 0.25s, scale 0.25s;
  transform-origin: bottom right;
}

.post-actions-content[data-visible="false"] {
  pointer-events: none;
  opacity: 0;
  scale: 0;
}

.post-actions-content[data-visible="true"] {
  pointer-events: unset;
  scale: 1;
  opacity: 1;
}

.post-actions-content li {
  padding: 0.5rem 0.65rem;
  border-radius: 0.25rem;
  list-style: none;
}

.post-actions-content li:is(:hover, :focus-within) {
  background-color: rgba(248, 132, 169, 0.7);
}

.post-actions-link {
  width: max-content;
  display: grid;
  grid-template-columns: 1rem 1fr;
  align-items: center;
  gap: 0.6rem;
  color: inherit;
  text-decoration: none;
  cursor: pointer;
}

.post-like {
  text-decoration: none;
  color: var(--clr-text);
  margin-right: 5px;
  font-size: 1.1rem;
  opacity: 0.65;
  border-radius: 50%;
  overflow: hidden;
  transition: all 0.35s ease;
}

.post-actions-controller {
  border: 0;
  background: none;
  color: var(--clr-text);
  cursor: pointer;
  opacity: 0.65;
}

.post-like:hover,
.post-actions-controller:hover {
  opacity: 1;
}

.post-like:focus {
  outline: none;
}

.post-like.active {
  color: rgb(255, 0, 0);
  opacity: 1;
  transform: scale(1.2);
}

/* MEDIA QUERIES */

@media (max-width: 1200px) { 
  .swiper {
      width: 100%;
    }
}

@media (max-width: 900px) {
  #recipes {
    padding: 60px 80px;
  }

  .swiper {
    width: 50%;
  }
}

@media (max-width: 765px) {
  .swiper {
    width: 70%;
  }
}

@media (max-width: 550px) {
  #recipes {
    padding: 40px 40px;
  }
}

.promo-hr {
    display: flex;
    width: calc(100% - 250px); /* Adjust this value as needed */
    position: absolute;
    bottom: 0.2rem;
    left: 14rem;
}

.popular-title {
    position: relative;
    text-align: center;
}

.popular-hr {
    display: flex;
    width: calc(100% - 150px); /* Adjust this value as needed */
    position: absolute;
    bottom: 0.2rem;
    left: 2rem;
}

.popular-news{
    width: 40%;
    display: flex;
    flex-direction: column;
    max-height: 53%;
}

.popular-news-list{
    width: 100%;
    border-left: 1px solid #7BB55A;
    padding: 0 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    overflow-y: scroll;
    max-height: 30rem;
}

.popular-news-list>div{
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: row-reverse;
}

.popular-news-list>div:hover{
    transform: scale(1.01);
    cursor: pointer;
}

.popular-news-list>div .popular-news-img{
    height: 100%;
    width: 30%;
    object-fit: cover;
    border-radius: 15px;
}

.promo-news-list>div .promo-news-img {
    display: flex;
    height: 100%;
    width: 30%;
    object-fit: cover;
    border-radius: 15px;
}

/* OVER HERE */
.popular-news-list>div .popular-content{
    width: 50%;
    position: absolute;
    bottom: 1%;
    left: 1%;
    border-bottom: 1px solid white;
    padding: 0.3rem;
}

.popular-news-list>div .popular-content:hover{
    border-bottom: 1px solid #7BB55A;
}

.popular-news-heading{
    font-size: 1rem;
    font-weight: 600;
}

.popular-news-date{
    font-size: .8rem;
}

.promo-news-item {
    display: flex;
    margin-bottom: 1rem;
}

.promo-news-heading {
    font-weight: 600;
    font-size: 1rem;
}

.promo-content {
    margin: 0 10px 10px 10px;
}

.games-news-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; 
    margin-left: 1.3rem ;
}

.games-news-item {
    flex: 0 1 calc(33.33% - 20px); 
    box-sizing: border-box; 
    display: flex;
    flex-direction: column;
    overflow: hidden; 
}

.games-news-img {
    width: 100%;
    height: 200px; 
    object-fit: cover;
    border-radius: 15px;
}

.games-content {
    padding: 10px; 
    display: flex;
    flex-direction: column;
}

.games-news-heading a {
    color: #333;
    text-decoration: none;
    font-size: 1.2em;
    margin-bottom: 5px;
}

.games-news-date {
    font-size: 0.9em;
    color: #666;
    margin-top: auto; 
}

.games-news-game {
    font-size: 0.9em;
    color: #6DAE60;
    margin-top: auto; 
    text-transform: uppercase;
}
.button-container {
    display: flex;
    justify-content: center;
    gap: 10px; /* Space between the buttons */
}

.button-container button {
    color: #fff !important;
    background: var(--warna_3) !important;
    width: 10%;
    position: relative;
    text-align: center;
}

.button-container button::after {
    content: '';
    position: absolute;
    /*right: 5px;*/
    margin-left: 5px;
    top: 50%;
    width: 0; 
    height: 0; 
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    transform: translateY(-50%);
}

#load-more::after {
    border-top: 5px solid white; /* Dropdown icon */
}

#load-less::after {
    border-bottom: 5px solid white; /* Dropup icon */
}

#news-title-p {
    margin-bottom: 0 !important;
}

.button-container-promo {
    display: flex;
    justify-content: center;
    gap: 10px; /* Space between the buttons */
}
 
 .button-container-promo button {
    color: #fff !important;
    background: var(--warna_3) !important;
    width: 20%;
    position: relative;
    text-align: center;
}

.button-container-promo button::after {
    content: '';
    position: absolute;
    /*right: 5px;*/
    margin-left: 5px;
    top: 50%;
    width: 0; 
    height: 0; 
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    transform: translateY(-50%);
}

#load-more-promo::after {
    border-top: 5px solid white; /* Dropdown icon */
}

#load-less-promo::after {
    border-bottom: 5px solid white; /* Dropup icon */
}

.post-link {
    width: 100% !important;
}

@media (max-width:550px) {
    .swiper-banner {
        padding: 0 10px 10px 10px;
    }
    .swiper {
        width: 100%;
    }
    .news-body {
        padding: 0 10px 10px 10px !important;
    }
    .promo-news-list p {
        display: none !important;
    }
    .promo-news-img {
        width: 55% !important;
    }
    .promo-news-heading {
        font-size: 0.9rem !important;
    }
    .promo-news-item {
        margin-bottom: 1rem !important;
    }
    .button-container-promo button {
        width: 40% !important;
    }
    .popular-title {
        margin: 2rem 1rem;
    }
    .popular-news-list {
        padding: 1rem 1rem !important;
        gap: 1.3rem !important;
        max-height: 30rem !important;
    }
    .popular-news-img {
        width: 40% !important;
    }
    .popular-news-heading {
        font-size: 0.8rem !important;
        
    }
    .games-title {
        padding: 1rem;
    }
    .games-news-item {
        flex: 0 1 calc(100% - 0px) !important;
    }
    .button-container button {
        width: 40% !important;
    }
  
}

@media (max-width:900px) {
    .swiper-banner {
        padding: 0 10px 10px 10px;
    }
    .swiper {
        width: 100%;
    }
    .news-body {
        padding: 0 10px 10px 10px !important;
    }
    .promo-news-list p {
        display: none !important;
    }
    .promo-news-img {
        width: 55% !important;
    }
    .promo-news-heading {
        font-size: 0.9rem !important;
    }
    .promo-news-item {
        margin-bottom: 1rem !important;
    }
    .button-container-promo button {
        width: 40% !important;
    }
    .popular-title {
        margin-bottom: 1rem;
    }
    .popular-news-list {
        padding: 2rem 1rem !important;
        gap: 3rem !important;
        max-height: 25rem !important;
    }
    .popular-news-img {
        width: 50% !important;
        position: relative;
        bottom: 1rem;
        right: -.5rem;
    }
    .popular-news-heading {
        font-size: 0.7rem !important;
    }
    .popular-news-date {
        font-size: .7rem;
    }
    .games-title {
        padding: 1rem;
    }
    .games-news-item {
        flex: 0 1 calc(50% - 10px) !important;
    }
    .button-container button {
        width: 40% !important;
    }
  
}

@media (max-width:1100px) {
    .swiper-banner {
        padding: 0 10px 10px 10px;
    }
    .swiper {
        width: 100%;
    }
    .news-body {
        padding: 0 10px 10px 10px !important;
    }
    .promo-news-img {
        width: 50% !important;
    }
    .promo-news-heading {
        font-size: 0.9rem !important;
    }
    .promo-news-item {
        margin-bottom: 1rem !important;
    }
    .button-container-promo button {
        width: 40% !important;
    }
    .popular-title {
        margin-bottom: 1rem;
    }
    .popular-news-list {
        gap: 1.3rem !important;
        max-height: 30rem !important;
    }
    .popular-news-img {
        width: 40% !important;
    }
    .popular-news-heading {
        font-size: 0.8rem !important;
    }
    .popular-news-date {
        font-size: .7rem;
    }
    .games-title {
        padding: 1rem;
    }
    .games-news-item {
        flex: 0 1 calc(33.33% - 20px);
    }
    .button-container button {
        width: 40% !important;
    }
  
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

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="bg-leaf">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
</div>

<div class="pt-4 pb-5" style="min-height: 500px;">
    <div class="container">
        <div class="video-background">
                        <video autoplay muted loop id="bg-video">
                            <!--<source src="<?= base_url(); ?>/assets/images/mingo.webm" type="video/webm">-->
                        </video>
                        </div>
        <div class="d-flex justify-content-center align-items-center" style="animation: newsTitle 3s infinite;">
                <img src="<?= base_url(); ?>/assets/images/news-title.png" style="justify-content:center" id="news-title">
        </div>
        <p class="mb-5 text-center text-hp" id="news-title-p"style="font-size: 16px;font-weight: 400;color: #666666; !important; animation: newsTitle 3s infinite;">Penasaran apa aja berita terkini terkait Hiddengame? Yuk cek Blog/Berita dibawah ini!</p>
    </div>
    
    <!-- SLIDER -->
    
    <?php
$popular_posts = array_filter($post, function($loop) {
    return strpos($loop['category'], 'Popular') !== false;
});
$jumlah_item = count($popular_posts);
?>

<!--<p>Jumlah item di Swiper: <?= $jumlah_item; ?></p>-->
    
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
                                    <p class="post-author">Labiii - <i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></p>
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
</section>
    
    <!-- NEWS -->
    
    <section class="news-body">
        <div class="container">
            <div class="row">
                <div class="mb-3 col-md-7">
                    <div class="news-promo">
                        <h5 class="promo-title" style="color:#6DAE60;">PROMO HIDDENGAME</h5>
                    </div>
                    <div class="news-promo">
                        <div class="promo-news-list" id="promo-news-list">
                            <?php foreach ($post as $loop): ?>
                                <?php if (strpos($loop['category'], 'Promo') !== false): ?>
                                    <div class="promo-news promo-news-item" data-url="<?= base_url(); ?>/post/<?= $loop['id']; ?>">
                                        <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="promo-news-img">
                                        <div class="promo-content">
                                            <div class="promo-news-heading"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></div>
                                            <div class="promo-news-date"><i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></div>
                                            <div class="promo-post-text"><?= substr(str_replace("<br>", ' ', $loop['content']), 0, 120); ?>...</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="button-container-promo">
                            <button id="load-more-promo" class="btn btn-primary mt-3 py-3" onclick="loadMorePostsPromo()">Lebih Banyak</button>
                            <button id="load-less-promo" class="btn btn-primary mt-3 py-3" onclick="loadLessPostsPromo()" style="display: none;">Lebih Sedikit</button>
                        </div>
                    </div>
                </div>
            <div class="mb-3 col-md-5">
                <div class="popular-header">
                        <h5 class="popular-title"style="color:#6DAE60;">UPCOMING EVENT</h5>
                    </div>
                <div class="news-popular">
                <div class="popular-news-list">
                    <?php foreach ($post as $loop): ?>
                    <?php if (strpos($loop['category'], 'Upcoming Event') !== false): ?>
                        <div class="popular-news popular-news-item" data-url="<?= base_url(); ?>/post/<?= $loop['id']; ?>">
                           <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="popular-news-img" href="<?= base_url(); ?>/post/<?= $loop['id'];?>">
                            <div class="popular-content">
                                <div class="popular-news-heading"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></div> 
                                    <div class="popular-news-date"><i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></div> 
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container" style="margin-top:2rem">
            <div class="row">
                <div class="mb-3 col-md-12">
                    <div class="news-games">
                        <h5 class="games-title" style="color:#6DAE60;">ARTIKEL LAINNYA</h5>
                    </div>
                    <div class="news-games">
                        <div class="games-news-list" id="games-news-list">
                            <?php foreach ($post as $index => $loop): ?>
                                <div class="games-news games-news-item" data-index="<?= $index; ?>" href="<?= base_url(); ?>/post/<?= $loop['id'];?>">
                                    <a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>">
                                        <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="games-news-img">
                                    </a>
                                    <div class="games-content">
                                        <div class="games-news-game"><?= $loop['game']; ?></div>
                                        <div class="games-news-heading"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></div>
                                        <div class="games-news-date"><i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="button-container">
                            <button id="load-more" class="btn btn-primary mt-3 py-3" onclick="loadMorePosts()">Lebih Banyak</button>
                            <button id="load-less" class="btn btn-primary mt-3 py-3" onclick="loadLessPosts()" style="display: none;">Lebih Sedikit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js">
</script>
<script
    src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const promoItems = document.querySelectorAll('.promo-news-item, .promo-news-heading, .popular-news-item');
    promoItems.forEach(function(item) {
        item.addEventListener('click', function() {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
});
</script>

<script>
    
    // ARTIKEL LAINNYA

    let currentRow = 2; // Number of rows to display initially
    const postsPerRow = 3; // Number of posts per row
    const totalPosts = <?= count($post); ?>; // Total number of posts
    const loadMoreButton = document.getElementById('load-more');
    const loadLessButton = document.getElementById('load-less');
    const postsList = document.getElementById('games-news-list');

    // Function to show the posts based on the current row count
    function showPosts() {
        const posts = postsList.querySelectorAll('.games-news-item');
        posts.forEach((post, index) => {
            if (index < currentRow * postsPerRow) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });

        // Toggle visibility of the buttons
        if (currentRow * postsPerRow >= totalPosts) {
            loadMoreButton.style.display = 'none';
            loadLessButton.style.display = 'block';
        } else {
            loadMoreButton.style.display = 'block';
        }

        if (currentRow <= 2) {
            loadLessButton.style.display = 'none';
        } else {
            loadLessButton.style.display = 'block';
        }
    }

    // Function to load more posts
    function loadMorePosts() {
        currentRow += 2; // Increase the number of rows by 2
        showPosts();
    }

    // Function to load less posts
    function loadLessPosts() {
        currentRow -= 2; // Decrease the number of rows by 2
        showPosts();
    }

    // Initialize the display of posts
    document.addEventListener('DOMContentLoaded', showPosts);
</script>

<script>
    let currentRowPromo = 2; // Number of rows to display initially
    const postsPerRowPromo = 1.5; // Number of posts per row
    const totalPostsPromo = <?= count(array_filter($post, fn($loop) => strpos($loop['category'], 'Promo') !== false)); ?>; 
    const loadMorePromoButton = document.getElementById('load-more-promo');
    const loadLessPromoButton = document.getElementById('load-less-promo');
    const postsListPromo = document.getElementById('promo-news-list');

    // Function to show the posts based on the current row count
    function showPostsPromo() {
        const postsPromo = postsListPromo.querySelectorAll('.promo-news-item');
        postsPromo.forEach((postPromo, index) => {
            if (index < currentRowPromo * postsPerRowPromo) {
                postPromo.style.display = 'flex';
            } else {
                postPromo.style.display = 'none';
            }
        });

        // Toggle visibility of the buttons
        if (currentRowPromo * postsPerRowPromo >= totalPostsPromo) {
            loadMorePromoButton.style.display = 'none';
            loadLessPromoButton.style.display = 'block';
        } else {
            loadMorePromoButton.style.display = 'block';
        }

        if (currentRowPromo <= 2) {
            loadLessPromoButton.style.display = 'none';
        } else {
            loadLessPromoButton.style.display = 'block';
        }
    }

    // Function to load more posts
    function loadMorePostsPromo() {
        currentRowPromo += 2; // Increase the number of rows by 2
        showPostsPromo();
    }

    // Function to load less posts
    function loadLessPostsPromo() {
        currentRowPromo -= 2; // Decrease the number of rows by 2
        showPostsPromo();
    }

    // Initialize the display of posts
    document.addEventListener('DOMContentLoaded', showPostsPromo);
</script>





<script>
    const postActionsControllers = document.querySelectorAll(
  ".post-actions-controller"
);

postActionsControllers.forEach((btn) => {
  btn.addEventListener("click", () => {
    const targetId = btn.getAttribute("data-target");
    const postActionsContent = document.getElementById(targetId);

    if (postActionsContent) {
      const isVisible = postActionsContent.getAttribute("data-visible");

      if (isVisible === "false") {
        postActionsContent.setAttribute("data-visible", "true");
        postActionsContent.setAttribute("aria-hidden", "false");
        btn.setAttribute("aria-expanded", "true");
      } else {
        postActionsContent.setAttribute("data-visible", "false");
        postActionsContent.setAttribute("aria-hidden", "true");
        btn.setAttribute("aria-expanded", "false");
      }
    }
  });
});

function handleClickOutside(event) {
  postActionsControllers.forEach((btn) => {
    const targetId = btn.getAttribute("data-target");
    const postActionsContent = document.getElementById(targetId);

    if (postActionsContent && postActionsContent.getAttribute("data-visible") === "true") {
      if (!postActionsContent.contains(event.target) && event.target !== btn) {
        postActionsContent.setAttribute("data-visible", "false");
        postActionsContent.setAttribute("aria-hidden", "true");
        btn.setAttribute("aria-expanded", "false");
      }
    }
  });
}

document.addEventListener("click", handleClickOutside);

postActionsControllers.forEach((btn) => {
  btn.addEventListener("click", (event) => {
    event.stopPropagation();
  });
});

const likeBtns = document.querySelectorAll(".post-like");

likeBtns.forEach((likeBtn) => {
  likeBtn.addEventListener("click", () => {
    if (likeBtn.classList.contains("active")) {
      likeBtn.classList.remove("active");
    } else {
      likeBtn.classList.add("active");
    }
  });
});

// // Swiper

// var swiper = new Swiper(".swiper", {
//   grabCursor: true,
//   speed: 400,
//   loop: true,
//   mousewheel: {
//     invert: false,
//   },
//   scrollbar: {
//     el: ".swiper-scrollbar",
//     draggable: true,
//   },
//   slidesPerView: 1,
//   spaceBetween: 10,
//   // Responsive breakpoints
//   breakpoints: {
//     900: {
//       slidesPerView: 2,
//       spaceBetween: 20,
//     },
//     1200: {
//       slidesPerView: 2,
//       spaceBetween: 20,
//     },
//   },
// });

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
    slidesPerView: 1,
    spaceBetween: 10,
    // Responsive breakpoints
    breakpoints: {
        700: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        900: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
    autoplay: {
        delay: 2000, // 2000ms = 2 detik
        disableOnInteraction: false,
    },
});
</script>


<?php $this->endSection(); ?>