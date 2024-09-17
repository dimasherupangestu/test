<?php $this->extend('template'); ?>
				
<?php $this->section('css'); ?>

<style>
				    
body {
    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
}
				    
p {
	margin-bottom: 0.65rem;
	font-family: "Open Sans",sans-serif;
	line-height: 1.7;
    letter-spacing: .015em;
	word-wrap: break-word;
	-webkit-font-smoothing: antialiased;
}
					
post {
  max-width: 800px;
  font-size: 1rem;
  font-weight: 500;
  color: var(--clr-text);
  background: rgba(233, 244, 227, 0.8);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 16px 16px 0;
  margin-bottom: 16px;
}

.post-img {
  width: 100%;
  max-width: 480px;
  object-fit: cover;
  overflow: hidden;
  border-radius: 6px;
  user-select: none;
  pointer-events: none;
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
  .swiper-banner {
    padding: 0 10px 10px 10px;
  }
  
  .news-body {
      padding: 0 10px 10px 10px;
  }

  .swiper {
    width: 100%;
  }
  
  .promo-news-img {
      width: 50% !important ;
      height: 110px !important;
  }
  
  .promo-news-item {
      margin: 10px;
  }
  
  .promo-content p {
      display: none !important;
  }
  
  .popular-news-list {
      gap: 2rem !important;
      max-height: 29rem;
  }
  
  .games-news-item {
      flex: 0 1 calc(100% - 20px) !important; 
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
    border: 5px solid #E8F2E3;
    width: 100%;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    overflow-y: scroll;
    max-height: 30rem;
    box-shadow: 0px 0px 8px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
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
    border-bottom: 1px solid #7DB75A;
}

.popular-news-heading{
    font-size: 1rem;
}

.popular-news-date{
    font-size: .8rem;
}

.promo-news-item {
    display: flex;
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
    flex: 0 1 calc(50% - 20px); 
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


/* Untuk gambar-gambar lain yang ingin Anda atur responsif */
.responsive-img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 20px;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 10px; /* Space between the buttons */
}

.button-container button {
    color: #fff !important;
    background: var(--warna_3) !important;
    width: 20%;
    position: relative;
    text-align: center;
}

.button-container button::after {
    content: '';
    position: absolute;
    /*right: 5px;*/
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

@media (max-width:550px) {
    .button-container-promo button{
        width: 50%;
    }
    .button-container button{
        width: 50%;
    }
}

.popular-header {
    padding: 2rem 1rem;
}

.games-title {
    padding: 2rem 1rem;
}

.share-buttons {
    display: flex;
    justify-content: right;
    gap: 10px;
    margin-top: 20px;
    }
.share-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    }
    .whatsapp { background-color: #25D366; }
    .instagram { background-color: #E1306C; }
    .facebook { background-color: #0077B5; }
    
.share-title {
    display: flex;
    justify-content: left;
    gap: 10px;
    margin-top: 20px;
    font-size: 20px;
    font-weight: 600;
    position: relative;
    top: 3.3rem;
    
}
</style>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				
				<div class="bg-leaf">
                    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
                    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
                </div>
				<div class="clearfix pt-5"></div>
				<div class="pt-5 pb-5" style="min-height: 500px;">
			    <div class="container">
			        <div class="row justify-content-center">
			            <div class="col-lg-7">
                            <div class="pb-3">
                                <div class="section" style="background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);">
                                    <div class="card-body">
                                        <div class="nk-blog-post nk-blog-post-single">
                                            <div class="nk-post-text mt-0">
                                                <h1 class="nk-post-title h4" style="line-height: 36px;"><?= $post['title']; ?></h1>
                                                <?php
                                                // Mengubah format tanggal
                                                $originalDate = $post['date_create'];
                                                $formattedDate = date("d F Y", strtotime($originalDate));
                                                ?>
                                                <p class="text-dark">Hiddengame <i class="fa fa-calendar mx-2"></i> <?= $formattedDate; ?></p>
                                                <div class="nk-post-img">
                                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $post['image']; ?>" alt="" class="responsive-img">
                                                </div>
                                                <div class="nk-gap-1"></div>
                                                <div class="nk-gap"></div>
                                                <?= htmlspecialchars_decode($post['content']); ?>
                                                <div class="share-title">Share:</div>
                                                <div class="share-buttons">
                                                    <a href="#" class="share-button whatsapp" id="share-whatsapp"><i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i></a>
                                                    <a href="#" class="share-button instagram" id="share-instagram"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
                                                    <a href="#" class="share-button facebook" id="share-facebook"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

				        <div class="col-lg-5">
                            <div class="popular-header">
                                <h5 class="popular-title" style="color:#6DAE60;">UPCOMING EVENT</h5>
                            </div>
                            <div class="news-popular">
                                <div class="popular-news-list">
                                    <?php foreach ($allPosts as $loop): ?>
                                        <?php if (strpos($loop['category'], 'Upcoming Event') !== false && $loop['id'] != $post['id']): 
                                            // Mengubah format tanggal
                                            $originalDate = $loop['date_create'];
                                            $formattedDate = date("d F Y", strtotime($originalDate));
                                        ?>
                                            <div class="popular-news popular-news-item">
                                                <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="popular-news-img">
                                                <div class="popular-content">
                                                    <div class="popular-news-heading"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></div>
                                                    <div class="popular-news-date"><i class="ion ion-calendar mr-10"></i> <?= $formattedDate; ?></div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>

				    </div>
				</div>
				    <div class="container">
				        <div class="row">
				            <div class="col-lg-7">
				                <div class="news-games">
                                    <h5 class="games-title"style="color:#6DAE60;">RELATED POST</h5>
                                </div>
                                <div class="news-games">
                                    <div class="games-news-list" id="games-news-list">
                                        <?php foreach ($allPosts as $loop): ?>
                                            <?php
                                            $currentPostCategories = explode(',', $post['category']);
                                            $loopCategories = explode(',', $loop['category']);
                                            $commonCategories = array_intersect($currentPostCategories, $loopCategories);
                                            if (!empty($commonCategories) && $loop['id'] != $post['id']):
                                                // Mengubah format tanggal
                                                $originalDate = $loop['date_create'];
                                                $formattedDate = date("d F Y", strtotime($originalDate));
                                            ?>
                                                <div class="games-news games-news-item">
                                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" class="games-news-img">
                                                    <div class="games-content">
                                                        <div class="games-news-game"><?= $loop['game']; ?></div>
                                                        <div class="games-news-heading"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></div>
                                                        <div class="games-news-date"><i class="ion ion-calendar mr-10"></i> <?= $formattedDate; ?></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
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
			</div>
		</div>
	</div>
</div>

<script>
    let currentRow = 2; // Number of rows to display initially
    const postsPerRow = 2; // Number of posts per row
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
    
    // Fungsi untuk tombol share
    document.getElementById('share-whatsapp').addEventListener('click', function() {
        const postUrl = window.location.href;
        const shareText = "Lihat Artikel Ini: " + postUrl;
        window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(shareText), '_blank');
    });

    document.getElementById('share-instagram').addEventListener('click', function() {
        const postUrl = window.location.href;
        const shareText = "Check out this article: " + postUrl;
        window.open('https://www.instagram.com/direct/new/?text=' + encodeURIComponent(shareText), '_blank');
    });

    document.getElementById('share-facebook').addEventListener('click', function() {
        const postUrl = window.location.href;
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(postUrl), '_blank');
    });
</script>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<?php $this->endSection(); ?>