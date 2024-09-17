<?php $this->extend('template-user'); ?>

<?php $this->section('css'); ?>
<style>
    .btn.btn-secondary {
        color: var(--bs-white);
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-5 content" style="padding-bottom:150px">
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-lg-12">
                <div class="pt-3 pb-4">
                    <h5>Daftar Harga</h5>
                    <span class="strip-primary"></span>
                </div>
                <p>Geser tabel untuk melihat lebih detail</p>
                <div class="row">
    <div class="col-lg-12 flex justify-content-end">
        <div id="filter">
            <select class="form-control bootstrap-table-filter-control-games">
                <option value="">Select Product</option>
                <?php
                // Mengurutkan array $games1 berdasarkan kunci 'games' secara alfabetis
                usort($games1, function ($a, $b) {
                    return strcmp($a['games'], $b['games']);
                });

                foreach ($games1 as $loop):
                ?>
                <option value="<?= $loop['games']; ?>" <?= $loop['games'] == $loop['games'] ? 'selected' : ''; ?>>
                    <?= $loop['games']; ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
</div>

<div class="section mt-3 p-3">
    <div class="table-responsive table-white ">
        <table id="table" data-toggle="table" data-search-highlight="true" data-mobile-responsive="true"
            data-search="true" data-sort-name="games" data-filter-control="true" data-toolbar="#toolbar"
            data-filter-control-container="#filter" data-sort-select-options="true" data-pagination="true"
            class="table table-white table-striped" data-show-toggle="true" data-show-export="true"
            data-export-types="['excel', 'csv']">
            <thead>
                <tr>
                    <th data-field="sku" class="product-column">Code</th>
                    <th data-field="games" class="product-column-hidden" hidden>Games</th>
                    <th class="product-column">Produk</th>
                    <th  class="product-column">Publik</th>
                    <th  class="product-column">Silver</th>
                    <th  class="product-column">Gold</th>
                    <th data-field="status">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tabel as $product): ?>
                <tr class="product-row">
                    <td>
                        <?= $product['sku']; ?>
                    </td>
                    <td class="product-column-hidden">
                        <?= $product['games']; ?>
                    </td>
                    <td width="20%">
                        <?= $product['product']; ?>
                    </td>
                    <td >Rp <?= number_format($product['price']['member'], 0, ',', '.'); ?></td>
                    <td >Rp <?= number_format($product['price']['silver'], 0, ',', '.'); ?></td>
                    <td >Rp <?= number_format($product['price']['gold'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($product['status'] == 'On'): ?>
                        <div class="whitespace-nowrap pt-1 pb-1">
                            <span class="available text-xs font-bold px-2 p-1">On</span>
                        </div>
                        <?php elseif ($product['status'] == 'Off'): ?>
                        <div class="whitespace-nowrap pt-1 pb-1">
                            <span class="unavailable text-xs font-bold px-2 p-1">Off</span>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    var $table = $('#table');
    
    // Enable card view by default in mobile view
    function enableCardViewInMobileView() {
      if ($(window).width() < 768) {  // Change the breakpoint as per your requirements
        $table.bootstrapTable('toggleView', 'cardView');
        $table.bootstrapTable('refreshOptions', {
          showToggle: true
        });
        $('.toggle').trigger('click'); // Trigger click event on the show toggle button
      } else {
        $table.bootstrapTable('toggleView', 'tableView');
        $table.bootstrapTable('refreshOptions', {
          showToggle: false
        });
      }
    }

    // Call the function on page load
    enableCardViewInMobileView();

    // Call the function on window resize
    $(window).resize(function() {
      enableCardViewInMobileView();
    });
  });
</script>

<?php $this->endSection(); ?>