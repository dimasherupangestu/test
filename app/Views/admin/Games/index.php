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

    .btn-toggle {
        margin: 0 4rem;
        padding: 0;
        position: relative;
        border: none;
        height: 1.5rem;
        width: 3rem;
        border-radius: 1.5rem;
        color: #6b7381;
        background: #bdc1c8;
    }

    .btn-toggle:focus,
    .btn-toggle:focus.active,
    .btn-toggle.focus,
    .btn-toggle.focus.active {
        outline: none;
    }

    .btn-toggle:before,
    .btn-toggle:after {
        line-height: 1.5rem;
        width: 4rem;
        text-align: center;
        font-weight: 600;
        font-size: .75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        transition: opacity .25s;
    }

    .btn-toggle:before {
        content: 'Off';
        left: -4rem;
    }

    .btn-toggle:after {
        content: 'On';
        right: -4rem;
        opacity: .5;
    }

    .btn-toggle>.handle {
        position: absolute;
        top: 0.1875rem;
        left: 0.1875rem;
        width: 1.125rem;
        height: 1.125rem;
        border-radius: 1.125rem;
        background: #fff;
        transition: left .25s;
    }

    .btn-toggle.active {
        transition: background-color .25s;
    }

    .btn-toggle.active>.handle {
        left: 1.6875rem;
        transition: left .25s;
    }

    .btn-toggle.active:before {
        opacity: .5;
    }

    .btn-toggle.active:after {
        opacity: 1;
    }

    .btn-toggle.btn-sm:before,
    .btn-toggle.btn-sm:after {
        line-height: -0.5rem;
        color: #fff;
        letter-spacing: .75px;
        left: 0.4125rem;
        width: 2.325rem;
    }

    .btn-toggle.btn-sm:before {
        text-align: right;
    }

    .btn-toggle.btn-sm:after {
        text-align: left;
        opacity: 0;
    }

    .btn-toggle.btn-sm.active:before {
        opacity: 0;
    }

    .btn-toggle.btn-sm.active:after {
        opacity: 1;
    }

    .btn-toggle.btn-xs:before,
    .btn-toggle.btn-xs:after {
        display: none;
    }

    .btn-toggle:before,
    .btn-toggle:after {
        color: #6b7381;
    }

    .btn-toggle.active {
        background-color: #29b5a8;
    }

    .btn-toggle.btn-sm {
        margin: 0 .5rem;
        padding: 0;
        position: relative;
        border: none;
        height: 1.5rem;
        width: 3rem;
        border-radius: 1.5rem;
    }

    .btn-toggle.btn-sm:focus,
    .btn-toggle.btn-sm:focus.active,
    .btn-toggle.btn-sm.focus,
    .btn-toggle.btn-sm.focus.active {
        outline: none;
    }

    .btn-toggle.btn-sm:before,
    .btn-toggle.btn-sm:after {
        line-height: 1.5rem;
        width: .5rem;
        text-align: center;
        font-weight: 600;
        font-size: .55rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        transition: opacity .25s;
    }

    .btn-toggle.btn-sm:before {
        content: 'Off';
        left: -0.5rem;
    }

    .btn-toggle.btn-sm:after {
        content: 'On';
        right: -0.5rem;
        opacity: .5;
    }

    .btn-toggle.btn-sm>.handle {
        position: absolute;
        top: 0.1875rem;
        left: 0.1875rem;
        width: 1.125rem;
        height: 1.125rem;
        border-radius: 1.125rem;
        background: #fff;
        transition: left .25s;
    }

    .btn-toggle.btn-sm.active {
        transition: background-color .25s;
    }

    .btn-toggle.btn-sm.active>.handle {
        left: 1.6875rem;
        transition: left .25s;
    }

    .btn-toggle.btn-sm.active:before {
        opacity: .5;
    }

    .btn-toggle.btn-sm.active:after {
        opacity: 1;
    }

    .btn-toggle.btn-sm.btn-sm:before,
    .btn-toggle.btn-sm.btn-sm:after {
        line-height: -0.5rem;
        color: #fff;
        letter-spacing: .75px;
        left: 0.4125rem;
        width: 2.325rem;
    }

    .btn-toggle.btn-sm.btn-sm:before {
        text-align: right;
    }

    .btn-toggle.btn-sm.btn-sm:after {
        text-align: left;
        opacity: 0;
    }

    .btn-toggle.btn-sm.btn-sm.active:before {
        opacity: 0;
    }

    .btn-toggle.btn-sm.btn-sm.active:after {
        opacity: 1;
    }

    .btn-toggle[data-status="Off"]:active,
    .btn-toggle[data-status="Off"]:hover,
    .btn-toggle[data-status="Off"]:focus {
        background: #bdc1c8;
    }

    #popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
    }

    #popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        width: 60%;
        height: 60%;
    }

    #close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        padding: 4px 13px 6px 13px;
        font-weight: 600;
        font-size: 17px;
    }

    @media (max-width: 600px) {
        #popup-content {
            width: 100% !important;
            height: 70% !important;
        }

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
                    <div class="table-responsive table-white">
                        <div class="my-2 mx-4 d-flex justify-content-end">
                        </div>
                        <table id="table"
                            data-sort-select-options="true"
                            data-page-size="100"
                            data-sort-name="games"
                            data-sort-order="asc"
                            data-toggle="table"
                            data-search-highlight="true"
                            data-filter-control="true"
                            data-pagination="true"
                            class="table table-white table-striped"
                            data-search="true"
                            data-advanced-search="true"
                            data-id-field="id"
                            data-toolbar="#toolbar"
                            data-show-toggle="true"
                            data-show-columns="true"
                            data-searchable="true"
                            data-show-search-clear-button="true"
                            data-url="<?= base_url(); ?>/admin/games/getData">
                            <thead>
                                <tr>
                                    <th data-field="no" width="10">No</th>
                                    <th data-field="image" data-formatter="imageFormatter" data-sortable="true">Img</th>
                                    <th data-field="games" data-searchable="true">Games</th>
                                    <th data-sortable="true" data-filter-control="select" data-field="category">Category</th>
                                    <th data-sortable="true" data-field="product">Product</th>
                                    <th data-sortable="true" data-filter-control="select" data-field="status">Status</th>
                                    <th data-field="action" data-formatter="actionFormatter">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
<!-- <script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script> -->
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script>
    $(function() {
        $('#table').bootstrapTable()
    })
</script>

<script>
    $(function() {
        $('#table').bootstrapTable({
            url: '<?= base_url("/admin/games/getData"); ?>',
            search: true,
            pagination: true,
            sidePagination: 'server',
            columns: [{
                field: 'no',
                title: 'no',
                sortable: true,
                formatter: function(value, row, index) {
                    return index + 1; // Menampilkan nomor urut
                }
            }, {
                field: 'image',
                title: 'Image',
                formatter: imageFormatter,


            }, {
                field: 'games',
                title: 'Games',
                sortable: true
            }, {
                field: 'category',
                title: 'Category',
                sortable: true,
                filterControl: 'select'
            }, {
                field: 'status',
                title: 'Status',
                sortable: true
            }, {
                field: 'action',
                title: 'Action',
                formatter: actionFormatter
            }],
        });

        // Format kolom image
        function imageFormatter(value, row, index) {
            return `<img src="<?= base_url(); ?>/assets/images/games/${value}" alt="Game Image" width="40" class="mr-1 rounded">`;
        }


        // Format kolom action
        function actionFormatter(value, row, index) {
            return `<a href="<?= base_url(); ?>/admin/games/edit/${row.id}" class="btn btn-primary btn-sm">Edit</a>
            <a href="<?= base_url(); ?>/admin/games/delete/${row.id}" class="btn btn-danger btn-sm">Delete</a>`;
        }

    });
</script>
<?php $this->endSection(); ?>