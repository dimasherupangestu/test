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
                        font-size:11px !important;
                    }

                    .table thead th {
                    font-size: .52rem;}
                    
                    .form-select {
                    padding: 5px;
                    margin: 5px;
                    overflow: hidden;
                    font-size: 11px;
                    }
                    .filter-control .form-select {
                        width:90% !important;
                    }
.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    padding: 4px 13px 6px 13px;
    font-weight: 600;
    font-size: 17px;
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
									    
									    
										<h5 class="mb-0"><?= $title ?></h5>
										<div class="card-tools">
											

											
										</div>
										

                        <?= alert(); ?>
                        <br>
                        <div class="row">
                            <div class="col-lg-3 col-6 select">
                                <label for="games-filter">Games:</label>
                                <select id="filterGames" class="form-control">
                                    <?php foreach ($categoriesData as $loop): ?>
                                    <option value="<?= $loop['code']; ?>"><?= $loop['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <button type="button" onclick="showPopupMassal();" class="btn btn-primary btn-sm my-2">Tambah Massal</button>
                            </div>
                            
                        </div>
                        

									</div>

                                        <table id="table" data-search="true" data-advanced-search="true" data-id-field="id"
                        data-toolbar="#toolbar" data-page-size="100"
                        data-show-toggle="true" data-show-columns="true" data-searchable="true" data-pagination="true"
                        data-filter-control="true" data-show-search-clear-button="true"
                        data-url="<?= base_url(); ?>/admin/produk/get_products_data_voca" data-show-export="true" 
                        data-export-types="['excel']" data-side-pagination="server" data-query-params="queryParams" data-response-handler="responseHandler">
                                            <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="product">Produk</th>
                                                <th data-field="sku">Kode</th>
                                                <th data-field="price">Harga Modal</th>
                                                <th data-field="status" data-formatter="statusFormatter">Status</th>
                                                <th data-field="added" data-formatter="addedFormatter">Ditambahkan</th>
                                                <th data-field="action" data-formatter="actionFormatter">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div id="myModal" class="modal fade" role="dialog" style="position: absolute;justify-content: center;align-items: center;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-danger close-button" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        <h5 class="modal-title">Tambah</h5>
      </div>
      <div class="modal-body">
          <h5 class="modal-title">Pilih Game</h5>
            <select id="gameSelect" class="form-control">
              <!-- Opsi diisi dari database -->
              <?php foreach ($gameslg as $game): ?>
              <option value="<?= $game['id']; ?>"><?= $game['games']; ?></option>
              <?php endforeach ?>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addProduct();" data-dismiss="modal">Tambah</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog" style="position: absolute;justify-content: center;align-items: center;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-danger close-button" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        <h5 class="modal-title">Tambah Massal</h5>
      </div>
      <div class="modal-body">
          <label for="games-filter">Produk Games Voca</label>
            <select id="filterGames2" class="form-control">
                <?php foreach ($categoriesData as $loop): ?>
                <option value="<?= $loop['code']; ?>"><?= $loop['name']; ?></option>
                <?php endforeach ?>
            </select>
          <label for="games-filter">Tambah Produk ke Games</label>  
            <select id="gameSelect2" class="form-control">
              <!-- Opsi diisi dari database -->
              <?php foreach ($gameslg as $game): ?>
              <option value="<?= $game['games']; ?>"><?= $game['games']; ?></option>
              <?php endforeach ?>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="addProductMassal();" data-dismiss="modal">Tambah</button>
      </div>
    </div>

  </div>
</div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
<link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
<script
    src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
</script>
<!--<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>-->
<!--<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/extensions/export/bootstrap-table-export.min.js"></script>-->


<script>
      
function actionFormatter(value, row, index) {
    if (row.added === 'N') {
        return '<button type="button" \
                        data-product="' + row.product + '" \
                        data-sku="' + row.sku + '" \
                        data-price="' + row.price + '" \
                        onclick="showPopup(this);" \
                        class="btn btn-primary btn-sm">Tambah</button> ';
    } else {
        return ' ';
    }
}


function showPopupMassal(buttonElement) {
    $('#myModal2').modal('show');  // Menampilkan modal
}

function addProductMassal() {
    var games_voca = $('#filterGames2').val();
    var games_db = $('#gameSelect2').val();

    $.ajax({
            url: '<?= base_url(); ?>/admin/Produk/insert_pergames_product_voca',
            type: 'POST',  // Metode HTTP
            data: {
                gamesvoca: games_voca,
                gamesdb: games_db
            },
            success: function(response) {
                // Menangani respon sukses dari server
                console.log('Respon sukses:', response);
                $('#myModal2').modal('hide');  // Menyembunyikan modal
                $('#table').bootstrapTable('refresh');
                // Anda mungkin ingin memperbarui tabel atau melakukan sesuatu yang lain di sini
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Menangani kesalahan dari server atau kesalahan jaringan
                console.error('Kesalahan:', textStatus, errorThrown);
            }
        });
}

function showPopup(buttonElement) {
    var product = $(buttonElement).data('product');
    var sku = $(buttonElement).data('sku');    var priceString = $(buttonElement).data('price');
    var price = parseInt(priceString.replace(/[^0-9]/g, ''), 10);

    // Menyimpan data di modal untuk referensi selanjutnya
    $('#myModal').data('product', product);
    $('#myModal').data('sku', sku);
    $('#myModal').data('price', price);

    $('#myModal').modal('show');  // Menampilkan modal
}

function addProduct() {
    var product = $('#myModal').data('product');
    var sku = $('#myModal').data('sku');
    var price = $('#myModal').data('price');
    var gameId = $('#gameSelect').val();  // Mendapatkan ID game yang dipilih
    var selectedGame = $('#filterGames').val();

    $.ajax({
            url: '<?= base_url(); ?>/admin/Produk/addprodukapi_voca',  // URL endpoint di server
            type: 'POST',  // Metode HTTP
            data: {
                game_id: gameId,
                product: product,
                productid: selectedGame,
                sku: sku,
                price: price
            },
            success: function(response) {
                // Menangani respon sukses dari server
                console.log('Respon sukses:', response);
                $('#myModal').modal('hide');  // Menyembunyikan modal
                $('#table').bootstrapTable('refresh');
                // Anda mungkin ingin memperbarui tabel atau melakukan sesuatu yang lain di sini
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Menangani kesalahan dari server atau kesalahan jaringan
                console.error('Kesalahan:', textStatus, errorThrown);
            }
        });
}


function addedFormatter(value, row, index) {
    if (row.added === 'Y') {
        return 'Sudah';
    } else {
        return 'Belum ';
    }
}  

function statusFormatter(value, row, index) {
    var statusText = '';
    var statusClass = '';
    if (row.status == true) {
        statusText = 'Tersedia';
        statusClass = 'text-success';
    } else if (row.status == false) {
        statusText = 'Kosong';
        statusClass = 'text-danger';
    }
    return '<span class="' + statusClass + '">' + statusText + '</span>';
}
</script>
<script>
var $table = $('#table');

function queryParams(params) {

    var selectedGame = $('#filterGames').val();

    params.games = selectedGame;

    return params;
}

function responseHandler(res) {
    if ($('#table').bootstrapTable('getOptions').sortOrder === 'desc') {
      res.rows = res.rows.reverse()
    }
    return res
  }

$(function() {
    $table.bootstrapTable({
        toolbar: '.toolbar',
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
            }
            
        ]
    }).trigger('change');
    
    $('#filterGames, #filterProvider, #filterStatus').change(function() {
        $('#table').bootstrapTable('refresh');
    });

   

    
})
</script>


				<?php $this->endSection(); ?>