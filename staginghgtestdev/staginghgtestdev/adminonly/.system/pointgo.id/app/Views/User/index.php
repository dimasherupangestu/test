<?php $this->extend('template-user'); ?>

<?php $this->section('css'); ?>
<style>
.form-control.search {
    border-bottom: 1px solid #d3d3d3;
    border-top: 1px solid #58585800;
    border-right: 1px solid #58585800;
    border-left: 1px solid #58585800;
    padding: 1.5rem 0.75rem;
    background: var(--warna);
}
.search-container {
    width: 400px;
    background: var(--warna);
    list-style: none;
    position: absolute;
    z-index: 999;
    overflow-y: scroll;
    overflow-x: hidden;
    max-height: 400px;
}
.dropdown-item:focus,
.dropdown-item:hover {
    padding: 0.7rem 1.7rem;
    background-color: #00000040 !important;
}

.dropdown-item {
    padding: 0.7rem 1.7rem;
}

.dropdown-divider {
    border-color: #be8dbf !important;
    border-top: 1px solid #be8dbf;
}

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
                    <h5>Info Profile</h5>
                    <span class="strip-primary mb-3"></span>
                </div>
            	<div class="pb-4">
                    <a>
                        Tipe Membership : 
                        <b>
                        <?php
						if ($users['level'] == 'Member') {
							echo "<span style='color: #FF7A00;'>Member Biasa</span>";
						} else if ($users['level'] == 'Silver') {
							echo "<span style='color: #000;'>Reseller Silver</span>";														
						} else if ($users['level'] == 'Gold') {
							echo "<span style='color: gold;'>Reseller Gold</span>";
						} else if ($users['level'] == 'Platinum') {
							echo "<span class='shine'>Reseller Platinum</span>";
						} else if ($users['level'] == 'Diamond') {
							echo "<span class='shine'>Reseller Diamond</span>";
						} else {
							echo "<span style='color: white;'>Reseller Member</span>";
						}
						?>
                        </b>
                    </a>
                </div>

                <?= alert(); ?>

                <div class="pb-3">
                    
                    
                	<div class="row pb-3">
                		<div class="col-md-6 py-2">
                		    <div class="card">
                                <div class="card-body">
                                    <p>Saldo Saya</p>
            						<h4 class="m-0">Rp <?= number_format($users['balance'],0,',','.'); ?></h4>
                                </div>
						    </div>
						</div>
						<div class="col-md-6 py-2">
							<div class="card">
                                <div class="card-body">
                                    <p>Pesanan Saya</p>
									<h4 class="m-0"><?= number_format($orders,0,',','.'); ?></h4>
                                </div>
						    </div>
						</div>
                	
                	
                	<div class="mb-4">
                        <div class="card-body">
                            <div class="container">
    <div class="row">
        <div class="col-md-8 px-0">
            <ul class="nav nav-pills mb-3 tab-category" id="pills-tab" role="tablist">
                <?php $no = 1;
                foreach ($games as $game): ?>
                <li class="nav-item">
                    <a class="nav-bg nav-link <?= $no == 1 ? 'active' : ''; ?>" id="pills-<?= url_title
                    ($game['category'], '-', true); ?>-tab" data-toggle="pill" href="#pills-<?= url_title
                    ($game['category'], '-', true); ?>" role="tab" aria-controls="pills-<?= url_title
                    ($game['category'], '-', true); ?>" aria-selected="true"><?= ($game['category'] == 'TERPOPULER') ? 'ALL GAMES' : $game['category']; ?></a>
                </li>
                <?php $no++; endforeach ?>
            </ul>
        </div>
        <div class="col-md-4">
            <form action="" method="POST" id="searchForm">
                <div class="input-group">
                    <span class="input-group-text bg-search text-white border-0">
                        <i id="search-icon" class="fa fa-search"></i>
                    </span>
                    <input type="text" class="form-control search" autocomplete="off" placeholder="Mau topup games apa?" id="searchInput" name="searchInput" value="<?= $search; ?>">
                </div>
            </form>
            <div class="search-container" id="searchResultsContainer"></div>
        </div>
    </div>
</div>
    </div>
</div>


                        	<div class="container">
    <div class="tab-content" id="pills-tabContent">
        <?php $no = 1;
        foreach ($games as $game): ?>
        <div class="tab-pane fade <?= $no == 1 ? 'show active' : ''; ?>" id="pills-<?= url_title($game['category'], '-', true); ?>" role="tabpanel" aria-labelledby="pills-<?= url_title($game['category'], '-', true); ?>-tab">

            <div class="row game mt-4">
                <?php foreach ($game['games'] as $loop): ?>
                <?php if ($loop['status'] == 'On'): ?>
                <div class="col-sm-6 col-lg-2 col-6 text-center p-1" style="display: grid;">
                    <div class="card mb-3 mgs-card">
                        <a href="<?= base_url(); ?>/user/games/<?= $loop['slug']; ?>" class="product_list">
                            <div style="padding: 0rem;" class="card-game" bis_skin_checked="1">
                                <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-fluid mgs-img" style="border-radius: 10px 10px 0px 0px; display: block;">
                            </div>
                            <div class="card-title mgs-card-title" bis_skin_checked="1">
                                <?= $loop['games']; ?> </div>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <?php $no++; endforeach ?>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $("#searchInput").keyup(function() {
        var searchQuery = $("#searchInput").val();
        if (searchQuery.length >= 2) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/User/search",
                data: {
                    searchQuery: searchQuery
                },
                success: function(data) {
                    $("#searchResultsContainer").html(data);
                }
            });
        } else {
            $("#searchResultsContainer").empty();
        }
    });
});
</script>

<?php $this->endSection(); ?>