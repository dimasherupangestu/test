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
    background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
    font-family: 'Poppins', sans-serif;
}

label {
    color: var(--warna_text);
}

.table {
    color: var(--warna_text);
}

.doubleScroll-scroll-wrapper {
    display: none;
}

.dropdown-menu-dark {
    color: rgb(222, 226, 230);
    background-color: rgb(52, 58, 64);
    border-color: rgba(0, 0, 0, 0.15);
}

.menu-bottom p {
    color: #7294a5;
}

.pagination {
    display: block;
    width: 100%;
    margin: 1em auto;
    text-align: center;
}

.pagination:after {
    content: '';
    clear: both;
}

.pagination-button {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #e0e0e0;
    background-color: #eee;
    color: #333;
    cursor: pointer;
    transition: background 0.1s, color 0.1s;
}

.pagination-button:hover {
    background: var(--warna_3);
    color: var(--warna_2);
}

.pagination-button.active {
    background-color: #bbb;
    border-color: #bbb;
    color: var(--warna_2) !important;
}

/* arbitrary styles */
.heading {
    text-align: center;
    max-width: 500px;
    margin: 20px auto;
}

thead tr {
    background: rgba(255, 255, 255, 0.10);
}

.table td,
.table th {
    border-top: 0px;
    padding: 0.25rem 1rem !important;
    text-transform: capitalize !important;

}

.name-games-table-card {
    background: rgba(255, 255, 255, 0.10);
}

.pagination-button.active {
    padding: 5px 13px;
    background: var(--warna_3);
    border-radius: 9px;
    border: 1px solid var(--warna_3);
}

.pagination-button {
    padding: 5px 13px;
    background: var(--warna_6);
    border-radius: 9px;
    border: 1px solid #dedede;
    color: var(--warna_4);
}

.pagination-button.disabled {
    background: #81818147;
}

.pagination-button.disabled p {
    color: #ffffff3b !Important;
}

.pagination-button p {}

.pagination-button.active p {}

td {
    color: var(--warna_hitam) !important;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="bg-leaf">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
</div>
<div class="container pt-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="pb-3">
                <div class="section">
                    <div class="body-games shadow-form">
                        <img class="pointgo" src="<?= base_url(); ?>/assets/images/logo-hidden.png">
                        <h5 style="margin-top: 40px;">Daftar Harga</h5>

                        <?php
                        $previous_game = null; // Variabel untuk menyimpan informasi game sebelumnya

                        foreach ($games as $game):
                            if ($game['games'] !== $previous_game): // Memeriksa apakah game berbeda dari game sebelumnya
                                if ($previous_game !== null) {
                                    // Menutup <tbody> dan <table> dari game sebelumnya jika bukan iterasi pertama
                                    echo '</tbody></table></div></div></div>';
                                }
                        ?>
                                <div class="table-harga-pointgo">
                                    <div class="row px-2 mt-4 <?= count($games) == 0 ? 'd-none' : ''; ?>">
                                        <div class="name-games-table-card p-3 mb-1">
                                            <b class="m-0" style="color:var(--warna_hitam)!important;"><?= $game['games']; ?></b>
                                        </div>
                                    </div>
                                    <div class="row pl-2 pr-2 row-games" id="product-games-<?= $game['games']; ?>">
                                        <div class="table-responsive">
                                            <table id="table" data-toggle="table" data-search="true" data-filter-control="true"
                                                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar"
                                                class="table table-striped" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th width="50%" style="color:var(--warna_hitam)!important;">Produk</th>
                                                        <th style="color:var(--warna_hitam)!important;">Publik</th>
                                                        <th style="color:var(--warna_hitam)!important;">
                                                            <iconify-icon icon="fluent:crown-20-filled" style="vertical-align: sub;font-size: 17px;">
                                                            </iconify-icon> Reseller Silver
                                                        </th>
                                                        <th style="color:var(--warna_hitam)!important;">
                                                            <iconify-icon icon="fluent:crown-20-filled" style="vertical-align: sub;font-size: 17px;color:#FFDD55">
                                                            </iconify-icon> Reseller Gold
                                                        </th>
                                                        <th style="color:var(--warna_hitam)!important;">
                                                            <iconify-icon icon="noto:crown" style="vertical-align: sub;font-size: 17px;color:#FFDD55">
                                                            </iconify-icon> Reseller Platinum
                                                        </th>
                                                        <th style="color:var(--warna_hitam)!important;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                            <?php endif; ?>

                            <?php foreach ($products as $key => $value): ?>
                                <?php foreach ($value as $loop): ?>
                                    <?php if ($loop['games_id'] != $game['id']) {
                                        continue;
                                    } ?>
                                    <tr>
                                        <td width="50%"><?= $loop['product']; ?></td>
                                        <td>Rp <?= number_format($loop['price'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= ($loop['price_silver'] != 0) ? number_format($loop['price_silver'], 0, ',', '.') : number_format($loop['price'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= ($loop['price_gold'] != 0) ? number_format($loop['price_gold'], 0, ',', '.') : number_format($loop['price'], 0, ',', '.'); ?></td>
                                        <td>Rp <?= ($loop['price_platinum'] != 0) ? number_format($loop['price_platinum'], 0, ',', '.') : number_format($loop['price'], 0, ',', '.'); ?></td>
                                        <td><?= $loop['status']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        <?php
                        $previous_game = $game['games'];
                        endforeach;

                        // Menutup <tbody> dan <table> untuk game terakhir
                        if ($previous_game !== null) {
                            echo '</tbody></table></div></div></div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php $this->endSection(); ?>

        <?php $this->section('js'); ?>
        <script>
        (function($) {

            var paginate = {
                startPos: function(pageNumber, perPage) {
                    // determine what array position to start from
                    // based on current page and # per page
                    return pageNumber * perPage;
                },

                getPage: function(items, startPos, perPage) {
                    // declare an empty array to hold our page items
                    var page = [];

                    // only get items after the starting position
                    items = items.slice(startPos, items.length);

                    // loop remaining items until max per page
                    for (var i = 0; i < perPage; i++) {
                        page.push(items[i]);
                    }

                    return page;
                },

                totalPages: function(items, perPage) {
                    // determine total number of pages
                    return Math.ceil(items.length / perPage);
                },

                createBtns: function(totalPages, currentPage) {
                    // create buttons to manipulate current page
                    var pagination = $('<div class="pagination" />');

                    // add a "first" button
                    pagination.append('<span class="pagination-button mx-1">&laquo;</span>');

                    // add pages inbetween
                    for (var i = 1; i <= totalPages; i++) {
                        // truncate list when too large
                        if (totalPages > 3 && currentPage !== i) {
                            // if on first two pages
                            if (currentPage === 1) {
                                // show first 3 pages
                                if (i > 3) continue;
                                // if on last two pages
                            } else if (currentPage === totalPages || currentPage ===
                                totalPages - 1) {
                                // show last 3 pages
                                if (i < totalPages - 2) continue;
                                // otherwise show 3 pages w/ current in middle
                            } else {
                                if (i < currentPage - 1 || i > currentPage + 1) {
                                    continue;
                                }
                            }
                        }

                        // markup for page button
                        var pageBtn = $('<span class="pagination-button page-num mx-1" />');

                        // add active class for current page
                        if (i == currentPage) {
                            pageBtn.addClass('active');
                        }

                        // set text to the page number
                        pageBtn.text(i);

                        // add button to the container
                        pagination.append(pageBtn);
                    }

                    // add a "last" button
                    pagination.append($('<span class="pagination-button">&raquo;</span>'));

                    return pagination;
                },

                createPage: function(items, currentPage, perPage) {
                    // remove pagination from the page
                    $('.pagination').remove();

                    // set context for the items
                    var container = items.parent(),
                        // detach items from the page and cast as array
                        items = items.detach().toArray(),
                        // get start position and select items for page
                        startPos = this.startPos(currentPage - 1, perPage),
                        page = this.getPage(items, startPos, perPage);

                    // loop items and readd to page
                    $.each(page, function() {
                        // prevent empty items that return as Window
                        if (this.window === undefined) {
                            container.append($(this));
                        }
                    });

                    // prep pagination buttons and add to page
                    var totalPages = this.totalPages(items, perPage),
                        pageButtons = this.createBtns(totalPages, currentPage);

                    container.after(pageButtons);
                }
            };

            // stuff it all into a jQuery method!
            $.fn.paginate = function(perPage) {
                var items = $(this);

                // default perPage to 5
                if (isNaN(perPage) || perPage === undefined) {
                    perPage = 5;
                }

                // don't fire if fewer items than perPage
                if (items.length <= perPage) {
                    return true;
                }

                // ensure items stay in the same DOM position
                if (items.length !== items.parent()[0].children.length) {
                    items.wrapAll('<div class="pagination-items" />');
                }

                // paginate the items starting at page 1
                paginate.createPage(items, 1, perPage);

                // handle click events on the buttons
                $(document).on('click', '.pagination-button', function(e) {
                    // get current page from active button
                    var currentPage = parseInt($('.pagination-button.active').text(), 10),
                        newPage = currentPage,
                        totalPages = paginate.totalPages(items, perPage),
                        target = $(e.target);

                    // get numbered page
                    newPage = parseInt(target.text(), 10);
                    if (target.text() == '«') newPage = 1;
                    if (target.text() == '»') newPage = totalPages;

                    // ensure newPage is in available range
                    if (newPage > 0 && newPage <= totalPages) {
                        paginate.createPage(items, newPage, perPage);
                    }
                });
            };

        })(jQuery);

        /* This part is just for the demo,
        not actually part of the plugin */
        $('.table-harga-pointgo').paginate(5);
        </script>
        <script>
        $("#datatable").DataTable({
            ordering: false,
        });

        $('.double-scroll').doubleScroll();

        $(document).ready(function() {
            $('#table').DataTable();
        });
        </script>
        <?php $this->endSection(); ?>