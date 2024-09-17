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

ul li,
b,
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

.btn-secondary {
    --bs-btn-bg: #3a57e8 !important;
}

.btn:hover {
    background-color: #0022cf !important;
    border-color: #0022cf !important;
}

.btn-check:checked+.btn,
.btn-check:active+.btn,
.btn:active,
.btn.active,
.btn.show {
    background-color: #0022cf !important;
    border-color: #0022cf !important;
}

#toolbar {
    margin: 0;
}

.fixed-table-toolbar {
    margin: 0px 20px 0px 20px;
}

.date-filter-control {
    font-size: 0.7rem;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
  
<div class="content" style="min-height: 590px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Pesanan Processing</h5>
                        <div class="alert alert-success" role="alert" style="padding:20px">
                            <h5 class="alert-heading">Cara Mengatasi Orderan Gagal</h5>
                            <p>Cek di link berikut <a
                                    href="https://hanz-digital.gitbook.io/cara-mengatasi-orderan-gagal/"
                                    style="color:#000000;text-decoration:underline">Cara Mengatasi Orderan Gagal</a></p>
                        </div>
                        <b class="d-block mb-1">Keterangan Status</b>
                        <ul class="mb-0 pl-4">
                            <li><b>Processing</b> : Pesanan dalam proses oleh provider / manual</li>

                        </ul>
                        <?= alert(); ?>
                        <br>
                        <div id="toolbar" class="select" style="display: flex;gap: 10px;">
                            <select class="form-control">
                                <option value="">Export Basic</option>
                                <option value="all">Export All</option>
                                <option value="selected">Export Selected</option>
                            </select>
                            <button type="button" id="bulkActionBtn" class="btn btn-primary" style="flex: none;">Bulk Success</button>
                        </div>
                    </div>

                    <button id="remove" class="btn btn-danger" hidden>
                        <i class="fa fa-trash"></i> Delete
                    </button>
                    
                    

                    <!--data-side-pagination="server"--> 
                    <!--data-auto-refresh="true" data-auto-refresh-interval="15" -->

                    <table id="table" data-search="true" data-advanced-search="true" data-id-field="id"
                        data-checkbox-header="true" data-click-to-select="true" data-toolbar="#toolbar"
                        data-show-toggle="true" data-show-columns="true" data-searchable="true" data-show-refresh="true"
                        data-pagination="true"
                        data-filter-control="true" data-show-search-clear-button="true"
                        data-url="<?= base_url(); ?>/admin/pesanan/get_orders_data_processing">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="no" data-sortable="true">No</th>
                                <th data-field="date_create" data-sortable="true" data-filter-control="datepicker">
                                    Tanggal</th>
                                <th data-field="time">Waktu</th>
                                <th data-field="username">Username</th>
                                <th data-field="games" data-filter-control="select">Games</th>
                                <th data-field="product">Product</th>
                                <th data-field="order_id" data-formatter="orderFormatter">Order ID</th>
                                <th data-field="raw_price" data-visible="false" data-force-export="true">Raw Price</th>
                                <th data-field="product_price" data-visible="false" data-force-export="true">Product Price</th>
                                <th data-field="fee" data-visible="false" data-force-export="true">Fee</th>
                                <th data-field="price">Final Price</th>
                                <th data-field="tujuan" data-formatter="tujuanFormatter">Tujuan</th>
                                <th data-field="method" data-filter-control="input">Method</th>
                                <th data-field="status">Status</th>
                                <th data-field="action" data-formatter="actionFormatter">Action</th>
                            </tr>
                        </thead>
                    </table>
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
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js">
</script>
<script
    src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script>
    $(document).ready(function() {
        
    $('#table').bootstrapTable();

    // Sembunyikan tombol saat halaman dimuat
    $('#bulkActionBtn').hide();

    // Tangani perubahan pemilihan baris pada tabel
    $('#table').on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
        var selectedRows = $('#table').bootstrapTable('getSelections');
        if (selectedRows.length > 0) {
            // Jika ada data yang dipilih, tampilkan tombol
            $('#bulkActionBtn').show();
        } else {
            // Jika tidak ada yang dipilih, sembunyikan tombol
            $('#bulkActionBtn').hide();
        }
    });

        // Tangani klik pada tombol "Eksekusi Bulk Action"
        $('#bulkActionBtn').click(function() {
            var selectedRows = $('#table').bootstrapTable('getSelections');
            var base_url = '<?= base_url(); ?>';
            var approveUrls = [];

            if (selectedRows.length > 0) {
                // Loop melalui baris yang dipilih dan kumpulkan URL yang sesuai
                for (var i = 0; i < selectedRows.length; i++) {
                    var row = selectedRows[i];
                    if (row.status === 'Processing') {
                        var url = base_url + '/admin/pesanan/approve/' + row.id;
                        console.log('URL yang akan diapprove:', url);
                        approveUrls.push(url);
                    }
                }

                // Tampilkan SweetAlert konfirmasi sekali
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Pesanan yang dipilih akan menjadi Sukses',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jalankan fungsi approveBulk dengan array URL yang dikumpulkan
                        approveBulk(approveUrls);
                    }
                });
            } else {
                // Tampilkan pesan jika tidak ada baris yang dipilih
                Swal.fire('Info', 'Pilih setidaknya satu pesanan.', 'info');
            }
        });

        // Fungsi approveBulk yang akan menjalankan fungsi approve untuk setiap URL dalam array
        function approveBulk(links) {
    // Jalankan fungsi approve secara berurutan untuk setiap URL
    function runNext(index) {
        if (index < links.length) {
            approve(links[index], function() {
                runNext(index + 1);
            });
        } else {
            // Panggil callback setelah semua URL selesai dieksekusi
            if (typeof callback === 'function') {
                callback();
            }
            // Setelah semua URL selesai dieksekusi, refresh halaman
            window.location.href = window.location.href; // Memuat ulang halaman
        }
    }

    runNext(0);
}

        // Fungsi approve yang akan memanggil URL yang sesuai menggunakan AJAX
        function approve(link, callback) {
            // Menggunakan AJAX untuk memanggil URL
            $.ajax({
                type: 'GET',
                url: link,
                success: function(response) {
                    // Panggil callback setelah pemanggilan AJAX selesai
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            });
        }
    });
</script>

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: var(--warna_2);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>
<script>
function detail(order_id) {
    $.ajax({
        url: '<?= base_url(); ?>/admin/pesanan/detail/' + order_id,
        success: function(result) {
            $("#modal-detail div div .modal-body").html(result);

            $("#modal-detail").modal('show');
        }
    });
}
</script>
<script>
$(function() {
    $('#table').bootstrapTable()
        .on('refresh.bs.table', function() {
            console.timeEnd()
            console.time()
        })
})
</script>
<script>
function actionFormatter(value, row, index) {
    if (row.status === 'Pending') {
        return '<button type="button" onclick="approvePending(\'<?= base_url(); ?>/admin/pesanan/approvePending/' +
            row.id +
            '\');" class="btn btn-warning btn-sm"><i class="fa fa-check"></i></button> ' +
            '<button type="button" onclick="cancelPending(\'<?= base_url(); ?>/admin/pesanan/cancelPending/' +
            row.id +
            '\');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button> ' +
            '<a href="<?= base_url(); ?>/admin/pesanan/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ' +
            '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/pesanan/delete/' +
            row.id +
            '\');" class="btn btn-danger btn-sm" hidden><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>';

    } else if (row.status === 'Processing') {
        return '<div class="btn-group-horizontal">' +
            '<button type="button" style="margin-right: 3px;" onclick="approve(\'<?= base_url(); ?>/admin/pesanan/approve/' +
            row.id +
            '\');" class="btn tomboltable btn-success btn-sm"><i class="fa fa-check"> success</i></button>' +
            '<button type="button" style="margin-right: 3px;" onclick="cancel(\'<?= base_url(); ?>/admin/pesanan/cancel/' +
            row.id +
            '\');" class="btn tomboltable btn-danger btn-sm"><i class="fa fa-times"> canceled</i></button>' +
            '<a href="<?= base_url(); ?>/admin/pesanan/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a>' +
            '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/pesanan/delete/' +
            row.id +
            '\');" class="btn btn-danger btn-sm" hidden><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>' +
            '</div>';
    } else {
        return '<a href="<?= base_url(); ?>/admin/pesanan/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ' +
            '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/pesanan/delete/' +
            row.id +
            '\');" class="btn btn-danger btn-sm" hidden><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>';
    }
}


function orderFormatter(value, row, index) {
    var orderIdClass = '';
    if (row.status === 'Success') {
        orderIdClass = 'text-success';
    } else if (row.status === 'Pending') {
        orderIdClass = 'text-warning';
    } else if (row.status === 'Processing') {
        orderIdClass = 'text-warning';
    } else if (row.status === 'Canceled') {
        orderIdClass = 'text-danger';
    }
    return ' <span class="' + orderIdClass +
        '" style="cursor: pointer" onclick="detail(\'' + row.order_id + '\')">' + 'No Trx Sistem: ' + row.order_id + 
        '<br>' + 'No Trx Provider: ' + row.trx_id +'</span>';
}
function tujuanFormatter(value, row, index) {
    return 'Tujuan: ' + row.tujuan + 
           '<br>' + 'Ket: ' + row.keterangan +'</span>';
}
</script>

<script>
var $table = $('#table')

$(function() {
    $('#toolbar').find('select').change(function() {
        $table.bootstrapTable('destroy').bootstrapTable({
            exportDataType: $(this).val(),
            exportTypes: ['csv', 'excel'],
            columns: [
                {
                    field: 'no',
                    title: 'No'
                }, {
                    field: 'date_create',
                    title: 'Tanggal'
                }, {
                    field: 'time',
                    title: 'Waktu'
                }
            ]
        })
    }).trigger('change')
})
</script>

<?php $this->endSection(); ?>