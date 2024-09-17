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
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			        <div class="row">
			            <div class="col-md-12">
			            	<div class="pb-4">
			                    <h5>Riwayat</h5>
			                    <span class="strip-primary"></span>
			                </div>
			                <div class="pb-3">
			                    <div class="card">
			                        <div class="card-body">
    			                        <div class="table-responsive">
    			                        	<table id="table" data-search="true" data-advanced-search="true" data-id-field="id" data-click-to-select="true"
                                            data-show-toggle="true" data-show-columns="true" data-searchable="true"data-pagination="true"
                                            data-filter-control="true" data-show-search-clear-button="true" data-page-size="100"
                                            data-url="<?= base_url(); ?>/user/get_riwayat_pesanan">
                                            <thead>
                                                <tr>
                                                    <th data-field="order_id" >No Trx</th>
                                                    <th data-field="product">Produk</th>
                                                    <th data-field="user_id">ID Player</th>
                                                    <th data-field="price">Harga</th>
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
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

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
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>
// <script>
// function detail(order_id) {
//     $.ajax({
//         url: '<?= base_url(); ?>/admin/pesanan/detail/' + order_id,
//         success: function(result) {
//             $("#modal-detail div div .modal-body").html(result);

//             $("#modal-detail").modal('show');
//         }
//     });
// }
// </script>
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
var $table = $('#table')

$(function() {
    $('#toolbar').find('select').change(function() {
        $table.bootstrapTable('destroy').bootstrapTable({
            columns: [
                {
                    field: 'order_id',
                    title: 'No'
                }, {
                    field: 'trx_id',
                    title: 'Tanggal'
                }, {
                    field: 'product',
                    title: 'Waktu'
                }
            ]
        })
    }).trigger('change')
})
</script>
			<?php $this->endSection(); ?>