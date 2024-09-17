<?php $this->extend('template-user'); ?>

<?php $this->section('css'); ?>
<style>
p {
    font-size: 12px;
}

.text-align-kanan {
    text-align: right;
}
</style>
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
#total-profit, #total-sales {
    display: none;
}
.card {
    margin-bottom: 2rem;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title">Filter</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="get" action="<?= base_url('user/laporan') ?>">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="start_date">Pilih Games</label>
                                                <select name="games_id" class="form-control" id="pickGamesSelect">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="all" selected>Semua Games</option>
                                                    <?php foreach ($pick_games as $loop): ?>
                                                    <option value="<?= $loop['games_id']; ?>"><?= $loop['games']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" hidden>
                                            <div class="form-group">
                                                <label for="start_date">Pilih Provider</label>
                                                <select name="pick_provider" class="form-control" id="pickProviderSelect">
                                                    <option value="all" selected>Semua Provider</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="start_date">Pilih Metode</label>
                                                <select name="pick_method" class="form-control" id="pickMethodSelect">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="all" selected>Semua Metode</option>
                                                    <?php foreach ($pick_method as $loop): ?>
                                                    <option value="<?= $loop['method_id']; ?>"><?= $loop['method']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="start_date">Pilih Status</label>
                                                <select name="pick_status" class="form-control" id="pickStatusSelect" >
                                                    <option value="Success" selected>Success</option>
                                                    <option value="Processing" >Processing</option>
                                                    <option value="Canceled" >Canceled</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" name="start_date" id="start_date" value="<?= $start_date; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" name="end_date" id="end_date" value="<?= $end_date; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 d-flex align-items-center gap-2">
                                            <button type="submit" class="btn btn-primary">GET DATA</button>
                                            <?php
                                            $params = $_GET;
                                            $paramString = http_build_query($params);
                                            ?>
                                            <a href="<?= base_url() ?>/user/exportDataFilter?<?= $paramString ?>" id="exportLink" class="btn btn-success">Export Data to CSV</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body" id="total-trx">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="bg-soft-success rounded p-2 text-center">
                                                <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z" fill="currentColor"></path>
                                                    <path d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <p class="m-1">Total Pesanan</p>
                                            <h4><?= number_format(array_sum(array_column($gamesx, 'total_sales')), 0, ',', '.'); ?></h4>
                                            
                                        </div>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <div class="avatar-content">
                                            <i class="tf-icons bx-md bx bx-send"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body" id="total-sales">
                                <div class="align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="bg-soft-success rounded p-2 text-center">
                                                <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <p class="m-1">Total Belanja</p>
                                            <h4>Rp <?= number_format(array_sum(array_column($gamesx, 'sales')), 0, ',', '.'); ?></h4>
                                        </div>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <div class="avatar-content">
                                            <i class="tf-icons bx-md bx bx-bar-chart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Tabel Pesanan</h5>

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
                        data-url="<?= base_url(); ?>/user/get_orders_data?<?= $paramString ?>" data-show-export="true" 
                        data-export-types="['excel']" data-side-pagination="server">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="no" data-sortable="true">No</th>
                                <th data-field="date_create" data-sortable="true">Tanggal</th>
                                <th data-field="time">Waktu</th>
                                <th data-field="games">Games</th>
                                <th data-field="username">Username</th>
                                <th data-field="product">Product</th>
                                <th data-field="order_id">Order ID</th>
                                <th data-field="price">Price</th>
                                <th data-field="method" data-filter-control="input">Method</th>
                                <th data-field="status">Status</th>
                            </tr>
                        </thead>
                    </table>
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
document.addEventListener("DOMContentLoaded", function () {
    // Mendapatkan nilai dari parameter URL 'games_id'
    const urlParams = new URLSearchParams(window.location.search);
    const gamesIdParam = urlParams.get("games_id");

    if (gamesIdParam) {
        // Mencari opsi dengan nilai yang sesuai dan mengatur atribut 'selected'
        const selectElement = document.getElementById("pickGamesSelect");
        const options = selectElement.options;

        for (let i = 0; i < options.length; i++) {
            if (options[i].value === gamesIdParam) {
                options[i].selected = true;
                break;
            }
        }
    }
    
    const providerParam = new URLSearchParams(window.location.search).get("pick_provider");
    if (providerParam) {
        const providerSelect = document.getElementById("pickProviderSelect");
        for (let i = 0; i < providerSelect.options.length; i++) {
            if (providerSelect.options[i].value === providerParam) {
                providerSelect.options[i].selected = true;
                break;
            }
        }
    }

    // Mendapatkan nilai dari parameter URL untuk pick_method
    const methodParam = new URLSearchParams(window.location.search).get("pick_method");
    if (methodParam) {
        const methodSelect = document.getElementById("pickMethodSelect");
        for (let i = 0; i < methodSelect.options.length; i++) {
            if (methodSelect.options[i].value === methodParam) {
                methodSelect.options[i].selected = true;
                break;
            }
        }
    }

    // Mendapatkan nilai dari parameter URL untuk pick_status
    const statusParam = new URLSearchParams(window.location.search).get("pick_status");
    if (statusParam) {
        const statusSelect = document.getElementById("pickStatusSelect");
        for (let i = 0; i < statusSelect.options.length; i++) {
            if (statusSelect.options[i].value === statusParam) {
                statusSelect.options[i].selected = true;
                break;
            }
        }
    }
});
</script>
<script>
    document.getElementById('exportButton').addEventListener('click', function() {
        // Ambil seluruh parameter dari URL saat ini
        const urlParams = new URLSearchParams(window.location.search);

        // Inisialisasi string yang akan menyimpan parameter-parameter
        let paramString = '';

        // Loop melalui parameter-parameter dalam URL dan tambahkan ke string 'paramString'
        for (const [key, value] of urlParams.entries()) {
            paramString += `${key}=${value}&`;
        }

        // Buat permintaan AJAX ke endpoint 'exportDataFilter' dengan parameter-parameter
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '<?= base_url() ?>/user/exportDataFilter?' + paramString, true);

        // Tangani respons permintaan
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Redirect ke URL hasil ekspor (CSV)
                window.location.href = xhr.responseText;
            }
        };

        // Kirim permintaan
        xhr.send();
    });
</script>
<script>
    // Fungsi untuk mengecek parameter dalam URL
    function checkParams() {
        // Ambil URL saat ini
        const currentUrl = window.location.href;

        // Periksa apakah URL mengandung parameter dengan nama games_id
        if (currentUrl.includes('games_id=')) {
            // Biarkan tindakan bawaan link berjalan
        } else {
            // Hentikan tindakan bawaan link
            document.getElementById('exportLink').addEventListener('click', function(e) {
                e.preventDefault();
            });
        }
    }

    // Panggil fungsi saat halaman dimuat
    checkParams();
</script>
<script>
        var pickStatusSelect = document.getElementById("pickStatusSelect");
        var totalSalesDiv = document.getElementById("total-sales");
        var totalProfitDiv = document.getElementById("total-profit");

        function hideDivs() {
            totalSalesDiv.style.display = "none";
            totalProfitDiv.style.display = "none";
        }

        function showDivs() {
            totalSalesDiv.style.display = "block";
            totalProfitDiv.style.display = "block";
        }

        var urlParams = new URLSearchParams(window.location.search);
        var pickStatus = urlParams.get("pick_status");

        if (pickStatus === "Success") {
            showDivs();
        } else {
            hideDivs();
        }

</script>
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