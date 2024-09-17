			<?php $this->extend('template'); ?>

			<?php $this->section('css'); ?>
			<style>
#datatable_wrapper {
    padding: 0;
}

#datatable_wrapper .row:nth-child(1),
#datatable_wrapper .row:nth-child(3) {
    padding: 20px 15px;
}

body {
    font-size: 11px !important;
    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
}

label {
    color: #fff;
}

.table thead th {
    font-size: .52rem;
}

.form-select {
    padding: 5px;
    margin: 5px;
    overflow: hidden;
    font-size: 11px;
}

.filter-control .form-select {
    width: 90% !important;
}

.table-dark {
    color: #fff;
    background: var(--warna_2);
}

.tab-category.nav-pills .nav-link {
    color: var(--warna_4);
    background-color: #0000;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.10);
    text-transform: capitalize;
    border: 2px solid var(--warna_4);
}

.tab-category.nav-pills .nav-link:hover {
    color: var(--warna_4);
    background-color: #0000;
    border: 2px solid var(--warna_4);
}

.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
    color: var(--warna_4);
    background-color: #0000;
    border: 2px solid var(--warna_4);
    box-shadow: 0 0 200px #ddd41c80 inset;
}

.nav-pills .nav-link {
    margin: 0px !important;
    font-size: 11px;
}

p.text-riwayat {
    font-size: 12px;
    color: var(--warna_text);
}

p.text-riwayat-2 {
    font-size: 14px;
    font-weight: 600;
}

.badge-green-pointgo {
    padding: 5px 15px;
    border: 1px solid rgba(189, 252, 80, 0.10);
    background: rgba(189, 252, 80, 0.10);
    border-radius: 999px;
    color: var(--warna_4);
}

.badge-yellow-pointgo {
    padding: 5px 15px;
    border: 1px solid rgb(252 215 80 / 10%);
    background: rgb(252 207 80 / 10%);
    border-radius: 999px;
    color: rgb(252 183 80);
}

.badge-red-pointgo {
    padding: 5px 15px;
    border: 1px solid rgb(252 80 80 / 10%);
    background: rgb(252 80 80 / 10%);
    border-radius: 999px;
    color: rgb(252 80 80);
}
			</style>
			<?php $this->endSection(); ?>

			<?php $this->section('content'); ?>
			<div class="bg-leaf">
        	    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
        	    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
            </div>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			        <div class="row d-flex justify-content-center">


			            <?= $this->include('header-user'); ?>
			            <div class="col-sm-6">
			                <a class="box-back" href="<?= base_url(); ?>/user">
			                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
			                        <path d="M11.4375 18.75L4.6875 12L11.4375 5.25M5.625 12H19.3125" stroke="white"
			                            stroke-opacity="0.6" stroke-width="2.15625" stroke-linecap="round"
			                            stroke-linejoin="round" />
			                    </svg>
			                </a>
			                <?= alert(); ?>
			                <div class="pb-3">
			                    <div class="section">
			                        <div class="body-games shadow-form pb-2">
			                            <div class="row d-flex justify-content-center border-bottom">
			                                <div
			                                    class="col-sm-3 col-6 d-flex align-items-center gap-2 py-3 justify-content-center ">
			                                    <a href="<?= base_url(); ?>/user" style="font-size: 13px;">
			                                        <svg class="user" xmlns="http://www.w3.org/2000/svg" width="12" height="16"
			                                            viewBox="0 0 12 16" fill="none">
			                                            <path
			                                                d="M8.24999 0.5H3.74999V2H2.24999V6.5H3.74999V2H8.24999V0.5ZM8.24999 6.5H3.74999V8H8.24999V6.5ZM8.24999 2H9.74999V6.5H8.24999V2ZM-7.62939e-06 11H1.49999V9.5H10.5V11H1.49999V14H10.5V11H12V15.5H-7.62939e-06V11Z"
			                                                fill="var(--warna_4)" />
			                                        </svg>
			                                        Info Pribadi
			                                    </a>
			                                </div>
			                                <div
			                                    class="col-sm-3 col-6 d-flex align-items-center gap-2 py-3 justify-content-center border-bottom-pointgo">
			                                    <a href="<?= base_url(); ?>/user/riwayat" class="text-secondary-pointgo"
			                                        style="font-size: 13px;">
			                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
			                                            viewBox="0 0 18 18" fill="none">
			                                            <path
			                                                d="M14.625 2.25H3.375C3.07663 2.25 2.79048 2.36853 2.5795 2.5795C2.36853 2.79048 2.25 3.07663 2.25 3.375V14.625C2.25 14.9234 2.36853 15.2095 2.5795 15.4205C2.79048 15.6315 3.07663 15.75 3.375 15.75H14.625C14.9234 15.75 15.2095 15.6315 15.4205 15.4205C15.6315 15.2095 15.75 14.9234 15.75 14.625V3.375C15.75 3.07663 15.6315 2.79048 15.4205 2.5795C15.2095 2.36853 14.9234 2.25 14.625 2.25Z"
			                                                stroke="var(--warna_4)" stroke-width="1.5" stroke-linecap="round"
			                                                stroke-linejoin="round" />
			                                            <path
			                                                d="M7.875 11.625L9.75 13.125L12.75 9.375M5.25 5.625H12.75M5.25 8.625H8.25"
			                                                stroke="var(--warna_4)" stroke-width="1.5" stroke-linecap="round"
			                                                stroke-linejoin="round" />
			                                        </svg>
			                                        Transaksi Saya
			                                    </a>
			                                </div>
			                            </div>
			                            <div class="text-center">
			                                <div class="">
			                                    <div class=" pt-3" style="overflow: hidden;">
			                                        <ul class="nav nav-pills tab-category gap-2 pb-2 justify-content-center"
			                                            id="myTab" role="tablist" style="flex-wrap: nowrap;">
			                                            <li class="nav-item">
			                                                <a style="font-weight: 600;"
			                                                    class="nav-link <?php echo ($_GET['status'] == 'Pending') ? 'active' : ''; ?>"
			                                                    id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab"
			                                                    aria-controls="pills-1" aria-selected="true">Menunggu
			                                                    Pembayaran</a>
			                                            </li>
			                                            <li class="nav-item">
			                                                <a style="font-weight: 600;"
			                                                    class="nav-link <?php echo ($_GET['status'] == 'Success') ? 'active' : ''; ?>"
			                                                    id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab"
			                                                    aria-controls="pills-2" aria-selected="true">Sukses</a>
			                                            </li>
			                                            <li class="nav-item">
			                                                <a style="font-weight: 600;"
			                                                    class="nav-link <?php echo ($_GET['status'] == 'Gagal') ? 'active' : ''; ?>"
			                                                    id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab"
			                                                    aria-controls="pills-3" aria-selected="true">Gagal</a>
			                                            </li>

			                                        </ul>
			                                    </div>
			                                </div>
			                                <div class="tab-content pt-4" id="myTabContent">
			                                    <div class="tab-pane fade <?php echo ($_GET['status'] == 'Pending') ? 'show active' : ''; ?>"
			                                        id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
			                                        <div class="row">
			                                            <?php
$itemsPerPagePending = 8; // Jumlah item per halaman
$totalItemsPending = 0; // Total jumlah item Pending

$pendingRiwayats = array_filter($riwayat, function ($item) {
    return $item['status'] == 'Pending';
});

$totalItemsPending = count($pendingRiwayats); // Hitung total jumlah item Pending
$totalPagesPending = ceil($totalItemsPending / $itemsPerPagePending); // Total jumlah halaman

$pagePending = isset($_GET['pagePending']) ? $_GET['pagePending'] : 1; // Mendapatkan nomor halaman dari parameter URL (query string)

$startIndexPending = ($pagePending - 1) * $itemsPerPagePending; // Indeks awal item yang akan ditampilkan
$endIndexPending = $startIndexPending + $itemsPerPagePending - 1; // Indeks akhir item yang akan ditampilkan
$endIndexPending = min($endIndexPending, $totalItemsPending - 1); // Memastikan indeks akhir tidak melebihi jumlah item
?>

			                                            <?php for ($i = $startIndexPending; $i <= $endIndexPending; $i++) : ?>
			                                            <?php if ($i >= $totalItemsPending) break; ?>
			                                            <?php $loop = array_values($pendingRiwayats)[$i]; ?>
			                                            <div class="col-12 col-lg-6 pb-2"
			                                                style="padding-right: 5px;padding-left: 5px;display:grid;">
			                                                <div class="body-games-in shadow-form">
			                                                    <div class="d-flex justify-content-between mb-2">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">No. Transaksi</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important">
			                                                                <?= $loop['order_id']; ?>
			                                                            </p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <div class="badge-yellow-pointgo"> Menunggu
			                                                                Pembayaran
			                                                            </div>
			                                                        </div>
			                                                    </div>
			                                                    <div class="d-flex justify-content-between align-items-end">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">Total Pembayaran</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important">Rp
			                                                                <?= number_format($loop['price'],0,',','.'); ?>
			                                                            </p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <p class="mb-0 text-riwayat">
			                                                                <?= $loop['date_create']; ?>
			                                                            </p>
			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>
			                                            <?php endfor; ?>

			                                        </div>
			                                        <div class="pagination gap-2 py-4">
			                                            <?php if ($pagePending > 1): ?>
			                                            <a class="card-pagination prev first"
			                                                href="?status=Pending&pagePending=1">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination prev"
			                                                href="?status=Pending&pagePending=<?php echo ($pagePending - 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination prev first disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination prev disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>

			                                            <?php for ($i = 1; $i <= $totalPagesPending; $i++) : ?>
			                                            <?php $activeClass = ($i == $pagePending) ? "active" : ""; ?>
			                                            <a class="card-pagination <?php echo $activeClass; ?>"
			                                                href="?status=Pending&pagePending=<?php echo $i; ?>">
			                                                <p class="mb-1"><?php echo $i; ?></p>
			                                            </a>
			                                            <?php endfor; ?>

			                                            <?php if ($pagePending < $totalPagesPending): ?>
			                                            <a class="card-pagination next"
			                                                href="?status=Pending&pagePending=<?php echo ($pagePending + 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination next last"
			                                                href="?status=Pending&pagePending=<?php echo $totalPagesPending; ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination next disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination next last disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>
			                                        </div>

			                                    </div>
			                                    <div class="tab-pane fade <?php echo ($_GET['status'] == 'Success') ? 'show active' : ''; ?>"
			                                        id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
			                                        <div class="row">
			                                            <?php
$itemsPerPageSuccess = 8; // Jumlah item per halaman
$totalItemsSuccess = 0; // Total jumlah item Success

$successRiwayats = array_filter($riwayat, function ($item) {
    return $item['status'] == 'Success';
});

$totalItemsSuccess = count($successRiwayats); // Hitung total jumlah item Success
$totalPagesSuccess = ceil($totalItemsSuccess / $itemsPerPageSuccess); // Total jumlah halaman

$pageSuccess = isset($_GET['pageSuccess']) ? $_GET['pageSuccess'] : 1; // Mendapatkan nomor halaman dari parameter URL (query string)

$startIndexSuccess = ($pageSuccess - 1) * $itemsPerPageSuccess; // Indeks awal item yang akan ditampilkan
$endIndexSuccess = $startIndexSuccess + $itemsPerPageSuccess - 1; // Indeks akhir item yang akan ditampilkan
$endIndexSuccess = min($endIndexSuccess, $totalItemsSuccess - 1); // Memastikan indeks akhir tidak melebihi jumlah item
?>
			                                            <?php for ($i = $startIndexSuccess; $i <= $endIndexSuccess; $i++) : ?>
			                                            <?php if ($i >= $totalItemsSuccess) break; ?>
			                                            <?php $loop = array_values($successRiwayats)[$i]; ?>
			                                            <div class="col-12 col-lg-6 pb-2"
			                                                style="padding-right: 5px;padding-left: 5px;display:grid;">
			                                                <div class="body-games-in shadow-form">
			                                                    <div class="d-flex justify-content-between mb-2">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">No. Transaksi</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important"><?= $loop['order_id']; ?>
			                                                            </p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <div class="badge-green-pointgo"> Sukses
			                                                            </div>
			                                                        </div>
			                                                    </div>
			                                                    <div class="d-flex justify-content-between align-items-end">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">Total Pembayaran</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important">Rp
			                                                                <?= number_format($loop['price'],0,',','.'); ?></p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <p class="mb-0 text-riwayat"><?= $loop['date_create']; ?>
			                                                            </p>
			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>
			                                            <?php endfor; ?>
			                                        </div>
			                                        <div class="pagination gap-2 py-4">
			                                            <?php if ($pageSuccess > 1): ?>
			                                            <a class="card-pagination prev first"
			                                                href="?status=Success&pageSuccess=1">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination prev"
			                                                href="?status=Success&pageSuccess=<?php echo ($pageSuccess - 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination prev first disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination prev disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>

			                                            <?php for ($i = 1; $i <= $totalPagesSuccess; $i++) : ?>
			                                            <?php $activeClass = ($i == $pageSuccess) ? "active" : ""; ?>
			                                            <a class="card-pagination <?php echo $activeClass; ?>"
			                                                href="?status=Success&pageSuccess=<?php echo $i; ?>">
			                                                <p class="mb-1"><?php echo $i; ?></p>
			                                            </a>
			                                            <?php endfor; ?>

			                                            <?php if ($pageSuccess < $totalPagesSuccess): ?>
			                                            <a class="card-pagination next"
			                                                href="?status=Success&pageSuccess=<?php echo ($pageSuccess + 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination next last"
			                                                href="?status=Success&pageSuccess=<?php echo $totalPagesSuccess; ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination next disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination next last disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>
			                                        </div>
			                                    </div>

			                                    <div class="tab-pane fade <?php echo ($_GET['status'] == 'Gagal') ? 'show active' : ''; ?>"
			                                        id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
			                                        <div class="row">
			                                            <?php
$itemsPerPageGagal = 8;
$totalItemsGagal = 0; 

$gagalRiwayats = array_filter($riwayat, function ($item) {
    return $item['status'] == 'Canceled';
});

$totalItemsGagal = count($gagalRiwayats); 
$totalPagesGagal = ceil($totalItemsGagal / $itemsPerPageGagal);

$pageGagal = isset($_GET['pageGagal']) ? $_GET['pageGagal'] : 1; 

$startIndexGagal = ($pageGagal - 1) * $itemsPerPageGagal; 
$endIndexGagal = $startIndexGagal + $itemsPerPageGagal - 1; 
$endIndexGagal = min($endIndexGagal, $totalItemsGagal - 1); 
?>
			                                            <?php for ($i = $startIndexGagal; $i <= $endIndexGagal; $i++) : ?>
			                                            <?php if ($i >= $totalItemsGagal) break; ?>
			                                            <?php $loop = array_values($gagalRiwayats)[$i]; ?>
			                                            <div class="col-12 col-lg-6 pb-2"
			                                                style="padding-right: 5px;padding-left: 5px;display:grid;">
			                                                <div class="body-games-in shadow-form">
			                                                    <div class="d-flex justify-content-between mb-2">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">No. Transaksi</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important"><?= $loop['order_id']; ?>
			                                                            </p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <div class="badge-red-pointgo"> Gagal
			                                                            </div>
			                                                        </div>
			                                                    </div>
			                                                    <div class="d-flex justify-content-between align-items-end">
			                                                        <div class=" text-left">
			                                                            <p class="mb-0 text-riwayat">Total Pembayaran</p>
			                                                            <p class="mb-0 text-riwayat-2" style="color:#333333 !important">Rp
			                                                                <?= number_format($loop['price'],0,',','.'); ?></p>
			                                                        </div>
			                                                        <div class="text-end">
			                                                            <p class="mb-0 text-riwayat"><?= $loop['date_create']; ?>
			                                                            </p>
			                                                        </div>
			                                                    </div>
			                                                </div>
			                                            </div>
			                                            <?php endfor; ?>
			                                        </div>
			                                        <div class="pagination gap-2 py-4">
			                                            <?php if ($pageGagal > 1): ?>
			                                            <a class="card-pagination prev first" href="?status=Gagal&pageGagal=1">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination prev"
			                                                href="?status=Gagal&pageGagal=<?php echo ($pageGagal - 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination prev first disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M11.727 12L12.667 11.06L9.61366 8L12.667 4.94L11.727 4L7.72699 8L11.727 12Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M7.33344 12L8.27344 11.06L5.2201 8L8.27344 4.94L7.33344 4L3.33344 8L7.33344 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination prev disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M10.06 12L11 11.06L7.94667 8L11 4.94L10.06 4L6.06 8L10.06 12Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>

			                                            <?php for ($i = 1; $i <= $totalPagesGagal; $i++) : ?>
			                                            <?php $activeClass = ($i == $pageGagal) ? "active" : ""; ?>
			                                            <a class="card-pagination <?php echo $activeClass; ?>"
			                                                href="?status=Gagal&pageGagal=<?php echo $i; ?>">
			                                                <p class="mb-1"><?php echo $i; ?></p>
			                                            </a>
			                                            <?php endfor; ?>

			                                            <?php if ($pageGagal < $totalPagesGagal): ?>
			                                            <a class="card-pagination next"
			                                                href="?status=Gagal&pageGagal=<?php echo ($pageGagal + 1); ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <a class="card-pagination next last"
			                                                href="?status=Gagal&pageGagal=<?php echo $totalPagesGagal; ?>">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </a>
			                                            <?php else: ?>
			                                            <span class="card-pagination next disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M6.94 4L6 4.94L9.05333 8L6 11.06L6.94 12L10.94 8L6.94 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <span class="card-pagination next last disabled">
			                                                <p class="mb-1">
			                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
			                                                        viewBox="0 0 16 16" fill="none">
			                                                        <path
			                                                            d="M4.27301 4L3.33301 4.94L6.38634 8L3.33301 11.06L4.27301 12L8.27301 8L4.27301 4Z"
			                                                            fill="var(--warna_4)" />
			                                                        <path
			                                                            d="M8.66656 4L7.72656 4.94L10.7799 8L7.72656 11.06L8.66656 12L12.6666 8L8.66656 4Z"
			                                                            fill="var(--warna_4)" />
			                                                    </svg>
			                                                </p>
			                                            </span>
			                                            <?php endif; ?>
			                                        </div>
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
			    <script>
			    // Mendapatkan referensi tombol "Prev" dan "Next"
			    var prevButton = document.getElementById("prevButton");
			    var nextButton = document.getElementById("nextButton");

			    // Menonaktifkan tombol "Prev" jika berada di halaman pertama
			    if (<?php echo $pagePending; ?> === 1) {
			        prevButton.disabled = true;
			    }

			    // Menonaktifkan tombol "Next" jika berada di halaman terakhir
			    if (<?php echo $pagePending; ?> === <?php echo $totalPagesPending; ?>) {
			        nextButton.disabled = true;
			    }
			    </script>
			    <?php $this->endSection(); ?>