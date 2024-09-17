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
        width: 55%;
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
  background: rgba(189, 181, 181, 0.1);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  /*backdrop-filter: blur(20px);*/
  /*-webkit-backdrop-filter: blur(20px);*/
  border: 1px solid rgba(255, 255, 255, 0.3);
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
  width: 80%;
  height: 100%;
  margin-bottom: 30px;
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
  #recipes {
    padding: 40px 40px;
  }

  .swiper {
    width: 80%;
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
    text-align: right;
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

    border-left: 1px solid;
    padding: 0 1rem;

    display: flex;
    flex-direction: column;
    gap: 0.5rem;

    overflow-y: scroll;
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
    border-bottom: 1px solid red;
}

.popular-news-heading{
    font-size: 1rem;
}

.popular-news-date{
    font-size: .8rem;
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
        <div class="d-flex justify-content-center align-items-center" style="animation: newsTitle 3s infinite;">
                <img src="<?= base_url(); ?>/assets/images/news-title.png" style="justify-content:center" id="news-title">
        </div>
        <p class="mb-5 text-center text-hp" id="news-title-p"style="font-size: 16px;font-weight: 400;color: #666666; !important; animation: newsTitle 3s infinite;">Penasaran apa aja berita terkini terkait Hiddengame? Yuk cek Blog/Berita dibawah ini!</p>
    </div>
    
    <!-- SLIDER -->
    
    <section class="swiper-banner">
      <div class="recipe-container">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide post">
              <img
                class="post-img"
                src="https://editors.dexerto.com/wp-content/uploads/2022/02/17/mobile-legends-adventure-codes.jpg"
                alt="recipe" />

              <div class="post-body">
                <div class="post-detail">
                  <h2 class="post-name">Mobile Legend</h2>
                  <p class="post-author">Labiii - <span>June 16 2024</span></p>
                </div>
              </div>
            </div>

            <div class="swiper-slide post">
              <img class="post-img" src="https://cdn1-production-images-kly.akamaized.net/WpgELLoud4xm00phHnMxAktQ8Gg=/1200x675/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4318543/original/000521900_1675919156-kv-idmpl-s11-2.jpg" alt="recipe" />

              <div class="post-body">
                <div class="post-detail">
                  <h2 class="post-name">Mobile Legend</h2>
                  <p class="post-author">Labiii - <span>June 16 2024</span></p>
                </div>
              </div>
            </div>

            <div class="swiper-slide post">
              <img class="post-img" src="https://i.ytimg.com/vi/Fm9BaSbW8Ug/maxresdefault.jpg" alt="recipe" />

              <div class="post-body">
                <div class="post-detail">
                  <h2 class="post-name">Genshin Impact</h2>
                  <p class="post-author">Labiii - <span>June 16 2024</span></p>
                </div>
              </div>
            </div>

            <div class="swiper-slide post">
              <img
                class="post-img"
                src="https://ldcdn.ldmnq.com/rms/ldplayer/process/img/06ca3d688b5f44febeff677f393985b61692793130.webp?1692793146743"
                alt="recipe" />

              <div class="post-body">
                <div class="post-detail">
                  <h2 class="post-name">Wuthering Waves</h2>
                  <p class="post-author">Labiii - <span>June 16 2024</span></p>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-scrollbar"></div>
        </div>
      </div>
    </section>
    
    <section class="news-body">
        <div class="container">
            <div class="row">
            <div class="mb-3 col-md-7">
                <div class="news-promo">
                    <h5 class="promo-title"style="color:#6DAE60;">PROMO HIDDENGAME</h5>
                    <hr class="promo-hr">
                </div>
            </div>

            <div class="mb-3 col-md-5">
                <div class="popular-header">
                        <h5 class="popular-title"style="color:#6DAE60;">POPULAR</h5>
                        <hr class="popular-hr">
                    </div>
                <div class="news-popular">
                <div class="popular-news-list">
                    <div class="popular-news-1 popular-news-item">
                        <img src="https://editors.dexerto.com/wp-content/uploads/2022/02/17/mobile-legends-adventure-codes.jpg" class="popular-news-img">
                        <div class="popular-content">
                            <div class="popular-news-heading">Lorem Ipsum Dolor Sit Amet</div> 
                                <div class="popular-news-date">26th May '24</div> 
                        </div>
                    </div>
                    <div class="popular-news-2 popular-news-item">
                        <img src="https://cdn1-production-images-kly.akamaized.net/WpgELLoud4xm00phHnMxAktQ8Gg=/1200x675/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4318543/original/000521900_1675919156-kv-idmpl-s11-2.jpg" class="popular-news-img">
                        <div class="popular-content">
                            <div class="popular-news-heading">Lorem Ipsum Dolor Sit Amet</div> 
                                <div class="popular-news-date">26th May '24</div>
                        </div>
                    </div>
                    <div class="popular-news-3 popular-news-item">
                        <img src="https://i.ytimg.com/vi/Fm9BaSbW8Ug/maxresdefault.jpg" class="popular-news-img">
                        <div class="popular-content">
                            <div class="popular-news-heading">Lorem Ipsum Dolor Sit Amet</div> 
                                <div class="popular-news-date">26th May '24</div>
                        </div>
                    </div>
                    <div class="popular-news-4 popular-news-item">
                        <img src="https://ldcdn.ldmnq.com/rms/ldplayer/process/img/06ca3d688b5f44febeff677f393985b61692793130.webp?1692793146743" class="popular-news-img">
                        <div class="popular-content">
                            <div class="popular-news-heading">Lorem Ipsum Dolor Sit Amet</div> 
                                <div class="popular-news-date">26th May '24</div>
                        </div>
                    </div>
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

// Swiper

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
    900: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
  },
});

</script>


<?php $this->endSection(); ?>