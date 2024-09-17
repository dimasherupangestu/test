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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
    
<div class="content" style="min-height: 590px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Topup Pending (Max 30.000 data terakhir)</h5>
                        <div class="alert alert-success" role="alert" style="padding:20px">
                            <h5 class="alert-heading">Cara Mengatasi Orderan Gagal</h5>
                            <p>Cek di link berikut <a
                                    href="https://hanz-digital.gitbook.io/cara-mengatasi-orderan-gagal/"
                                    style="color:#000000;text-decoration:underline">Cara Mengatasi Orderan Gagal</a></p>
                        </div>
                        <b class="d-block mb-1">Keterangan Status</b>
                        <ul class="mb-0 pl-4">
                            <li><b>Pending</b> : Topup belum dibayar / menunggu pembayaran</li>

                        </ul>
                        <?= alert(); ?>
                        <br>
                        <div id="toolbar" class="select">
                            <select class="form-control">
                                <option value="">Export Basic</option>
                                <option value="all">Export All</option>
                                <option value="selected">Export Selected</option>
                            </select>
                        </div>
                    </div>

                    <button id="remove" class="btn btn-danger" hidden>
                        <i class="fa fa-trash"></i> Delete
                    </button>

                    <!--data-side-pagination="server"-->

                    <table id="table" data-search="true" data-advanced-search="true" data-id-field="id"
                        data-checkbox-header="true" data-click-to-select="true" data-show-columns="true"
                        data-searchable="true" data-show-refresh="true" data-auto-refresh="true"
                        data-auto-refresh-interval="15" data-pagination="true" data-filter-control="true"
                        data-show-search-clear-button="true"
                        data-url="<?= base_url(); ?>/admin/Topup/get_topup_data_pending" data-show-export="true"
                        data-export-types="['excel']">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="no" data-sortable="true">No</th>
                                <th data-field="date_create" data-sortable="true" data-filter-control="datepicker">
                                    Tanggal</th>
                                <th data-field="time">Waktu</th>
                                <th data-field="username">Username</th>
                                <th data-field="topup_id" data-formatter="orderFormatter">Topup ID</th>
                                <th data-field="product">Product</th>
                                <th data-field="method" data-filter-control="input">Method</th>
                                <th data-field="amount">Amount</th>
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

<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js">
</script>
<script
    src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: var(--warna_2);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Topup</h5>
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
function detail(topup_id) {
    $.ajax({
        url: '<?= base_url(); ?>/admin/Topup/detail/' + topup_id,
        success: function(result) {
            $("#modal-detail .modal-body").html(result);
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
        return '<button type="button" onclick="terima(\'<?= base_url(); ?>/admin/Topup/accept/' +
            row.id +
            '\');" class="btn tomboltable btn-success btn-sm"><i class="fa fa-check"> Accept</i></button><br> ' +
            '<a href="<?= base_url(); ?>/admin/Topup/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ';

    } else {
        return '<a href="<?= base_url(); ?>/admin/Topup/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ';
    }
}
// function actionFormatter(value, row, index) {
//         return '<a href="<?= base_url(); ?>/admin/Topup/edit/' + row.id +
//             '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ';
// }


function orderFormatter(value, row, index) {
    var topupIdClass = '';
    if (row.status === 'Success') {
        topupIdClass = 'text-success';
    } else if (row.status === 'Pending') {
        topupIdClass = 'text-warning';
    } else if (row.status === 'Processing') {
        topupIdClass = 'text-warning';
    } else if (row.status === 'Canceled') {
        topupIdClass = 'text-danger';
    }
    return ' <span class="' + topupIdClass +
        '" style="cursor: pointer" onclick="detail(\'' + row.topup_id + '\')">' +
            'No Trx Sistem: ' + row.topup_id + '</span>';
}
</script>
<script>
					function terima(link) {
						Swal.fire({
		                    title: 'Terima topup?',
		                    text: "Saldo akan dikirim ke pengguna",
		                    icon: 'warning',
		                    showCancelButton: true,
		                    confirmButtonColor: '#3085d6',
		                    cancelButtonColor: '#d33',
		                    cancelButtonText: 'Batal',
		                    confirmButtonText: 'Terima'
		                }).then((result) => {
		                    if (result.isConfirmed) {
		                        window.location.href = link;
		                    }
		                });
					}
				</script>



<!--<script>-->
<!--var $table = $('#table')-->
<!--var $remove = $('#remove')-->

<!--$(function() {-->
<!--    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {-->
<!--        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)-->
<!--    })-->
<!--    $remove.click(function() {-->
<!--        var ids = $.map($table.bootstrapTable('getSelections'), function(row) {-->
<!--            return row.id-->
<!--        })-->

<!--        $table.bootstrapTable('remove', {-->
<!--            field: 'id',-->
<!--            values: ids-->
<!--        })-->
<!--        $remove.prop('disabled', true)-->
<!--    })-->
<!--})-->
<!--</script>-->



<script>
var $table = $('#table')

$(function() {
    $('#toolbar').find('select').change(function() {
        $table.bootstrapTable('destroy').bootstrapTable({
            exportDataType: $(this).val(),
            exportTypes: ['csv', 'excel'],
            columns: [{
                    field: 'state',
                    checkbox: true,
                    visible: $(this).val() === 'selected'
                },
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