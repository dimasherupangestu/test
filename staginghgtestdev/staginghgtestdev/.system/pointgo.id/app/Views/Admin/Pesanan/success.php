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
                        <h5 class="mb-3">All Pesanan</h5>

                        <?= alert(); ?>
                        <br>
                        <div id="toolbar" class="select" hidden>
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
                        data-toolbar="#toolbar"
                        data-show-toggle="true" data-show-columns="true" data-searchable="true" data-pagination="true"
                        data-filter-control="true" data-show-search-clear-button="true"
                        data-url="<?= base_url(); ?>/admin/pesanan/get_orders_data_success" data-show-export="true" 
                        data-export-types="['excel']" data-side-pagination="server">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="no" data-sortable="true">No</th>
                                <th data-field="date_create" data-sortable="true" data-filter-control="datepicker">
                                    Tanggal</th>
                                <th data-field="time">Waktu</th>
                                <th data-field="username">Username</th>
                                <th data-field="games">Games</th>
                                <th data-field="product">Product</th>
                                <th data-field="order_id" data-formatter="orderFormatter">Order ID</th>
                                <th data-field="raw_price" data-visible="false" data-force-export="true">Raw Price</th>
                                <th data-field="product_price" data-visible="false" data-force-export="true">Product Price</th>
                                <th data-field="fee" data-visible="false" data-force-export="true">Fee</th>
                                <th data-field="diskon" data-visible="false" data-force-export="true">Diskon</th>
                                <th data-field="price">Final Price</th>
                                <th data-field="tujuan">Tujuan</th>
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
<script>
function copy_userid(userid) {
    navigator.clipboard.writeText(userid);

    Swal.fire('Berhasil', 'User ID ' + userid + ' berhasil di salin', 'success');
}

function copy_zoneid(zoneid) {
    navigator.clipboard.writeText(zoneid);

    Swal.fire('Berhasil', 'Zone/Server ID ' + zoneid + ' berhasil di salin', 'success');
}
</script>
<link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
<script
    src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
</script>
<!--<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>-->
<!--<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>-->

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: var(--warna_2);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
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
   function queryParams(params) {
       return {
           offset: params.offset || 0, // Default offset is 0
           limit: params.limit || 10 // Default limit is 10
       };
   }
</script>
<script>
function actionFormatter(value, row, index) {
        return '<a href="<?= base_url(); ?>/admin/pesanan/edit/' + row.id +
            '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ' 
            + '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/pesanan/delete/' + row.id +
            '\');" class="btn btn-danger btn-sm" hidden><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>';
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
        '" style="cursor: pointer" onclick="detail(\'' + row.order_id + '\')">' +
        'No Trx Sistem: ' + row.order_id + 
        '<br>' + 'No Trx Provider: ' + row.trx_id +'</span>';
}
</script>
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


<script>
    function copyTable() {
        var table = document.getElementById("myTable");
        var data = "";
        var rows = table.getElementsByTagName("tr");
        
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            for (var j = 0; j < cells.length; j++) {
                data += cells[j].innerText.trim() + "\n";
            }
        }
        
        navigator.clipboard.writeText(data)
            .then(function() {
                alert("Data copied!");
            })
            .catch(function(error) {
                console.error("Copy failed:", error);
            });
    }
</script>
<?php $this->endSection(); ?>