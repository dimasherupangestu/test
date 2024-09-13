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
            <div class="col-md-12 my-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="my-3">Games</h5>
                        <div class="card-tools">
                            <a href="<?= base_url(); ?>admin/games/create" class="btn btn-primary btn-sm">Tambah Games</a>
                        </div>

                    </div>
                    <div class="table-responsive table-white ">
                        <table id="table" data-sort-select-options="true" data-page-size="100" data-sort-name="games" data-sort-order="asc" data-toggle="table" data-search-highlight="true" data-filter-control="true" data-pagination="true" class="table table-white table-striped">
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
                                <?php $i = 1; ?>
                                <?php foreach ($games as $game) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <!-- <td><img src="" width="50px" alt=""></td> -->
                                        <td><img src="/assets/images/games/<?= $game['image']; ?>" alt="" width="50" class="mr-1 rounded"></td>
                                        <td><?= $game['games']; ?></td>
                                        <td><?= $game['category']; ?></td>
                                        <td><?= $game['code']; ?></td>
                                        <td><?= $game['provider']; ?></td>
                                        <td><?= $game['status']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/games/edit/<?= $game['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?= base_url(); ?>admin/games/delete/<?= $game['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>