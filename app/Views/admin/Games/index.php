<?php $this->extend('templateadmin'); ?>

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


    .card .table td,
    .card .table th {
        padding-right: 0px;
        padding-left: 0px;
        text-align: center;
    }

    .table td,
    .table th {
        padding: 0.45rem;
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-0">Games</h5>
                        <div class="card-tools">
                            <a href="<?= base_url(); ?>/admin/games/add" class="btn btn-primary btn-sm">Tambah Games</a>
                            <a href="<?= base_url(); ?>/admin/games/get" class="btn btn-primary btn-sm" hidden>Get Games Digiflazz</a>
                            <a href="<?= base_url(); ?>/admin/games/getbj" class="btn btn-primary btn-sm" hidden>Get Games Bangjeff</a>
                            <a href="<?= base_url(); ?>/admin/games/getlg" class="btn btn-primary btn-sm" hidden>Get Games Lapakgaming</a>
                            <a href="<?= base_url(); ?>/admin/games/getvoca" class="btn btn-primary btn-sm" hidden>Get Games Vocagame</a>
                        </div>
                    </div>

                    <div class="table-responsive table-white ">
                        <table id="table" data-sort-select-options="true" data-page-size="100" data-sort-name="games" data-sort-order="asc" data-toggle="table" data-search-highlight="true" data-filter-control="true" data-pagination="true" class="table table-white table-striped">
                            <div class="my-4 mx-4 d-flex justify-content-end">
                                <form id="searchForm" method="GET" action="">
                                    <input type="text" name="search" id="search" class="form-control filter-control w-25" placeholder="Search">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <thead>
                                <tr>
                                    <th data-sortable="true" width="10">No</th>
                                    <th>Img</th>
                                    <th data-sortable="true" data-field="games">Games</th>
                                    <th data-sortable="true" data-filter-control="select" data-field="kategori">Kategori</th>
                                    <th data-sortable="true">Produk</th>
                                    <th data-sortable="true" data-filter-control="select" data-field="provider">Provider</th>
                                    <th data-sortable="true">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($games as $loop): ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" alt="" width="40" class="mr-1 rounded"></td>
                                        <td style="text-align: left;">
                                            <?= $loop['games']; ?>
                                        </td>
                                        <td><?= $loop['category']; ?></td>
                                        <td><?= $loop['product']; ?></td>
                                        <td><?= $loop['provider']; ?></td>
                                        <td><?= $loop['status']; ?></td>
                                        <td width="10">
                                            <a href="<?= base_url(); ?>/admin/games/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <button type="button" onclick="hapus('<?= base_url(); ?>/admin/games/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
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
<script>
    $(function() {
        $('#table').bootstrapTable()
    })
</script>

<script>
    $('#searchForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        const search = $('#search').val();

        // Make AJAX call to get the filtered games
        $.get('<?= base_url('admin/games/getData') ?>', {
            search: search
        }, function(data) {
            $('#table tbody').empty();
            $.each(data.rows, function(index, game) {
                $('#table tbody').append(`
            <tr>
                <td>${index + 1}</td>
                <td><img src="<?= base_url(); ?>/assets/images/games/${game.image}" alt="" width="40" class="mr-1 rounded"></td>
                <td style="text-align: left;">${game.games}</td>
                <td>${game.category}</td>
                <td>${game.product}</td>
                <td>${game.provider}</td>
                <td>${game.status}</td>
                <td width="10">
                    <a href="<?= base_url(); ?>/admin/games/edit/${game.id}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" onclick="hapus('<?= base_url(); ?>/admin/games/delete/${game.id}');" class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        `);
            });
        }, 'json');

    });
</script>
<?php $this->endSection(); ?>