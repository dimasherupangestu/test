<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
    body {
        /*font-family: 'Proxima Nova Rg';*/
        font-family: 'Poppins', sans-serif;
        font-weight: normal;
        background: linear-gradient(to bottom, #E7F2DF, #EBF5E7, #E4EFDC);
    }
    
    .table {
        margin-bottom: 0px;
        border-radius: 10px ;
        color: black;
    }
    .bootstrap-table .fixed-table-container {
        background: var(--warna_6);
    }
    .table-responsive {
        border-radius: 0 0 10px 10px;
    }
    .table-dark td, .table-dark th, .table-dark thead th {
        border-color: rgb(244 245 250 / 0%);
    }
    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgb(43 46 47);;
    }
    .table-dark.table-striped tbody tr:nth-of-type(even) {
        background-color: rgb(41 44 45);
    }
    .bootstrap-table .auto-refresh, .fixed-table-toolbar, button[name="refresh"] {
        display: none;
    }
    .bootstrap-table .fixed-table-container .table td, .bootstrap-table .fixed-table-container .table th {
        border-color: rgb(244 245 250 / 0%);
    }
    .table-hover tbody tr:hover {
    color: black;
    background-color: rgba(0,0,0,.075);
    }
    
    td:first-child {
    padding:15px;
    margin-bottom: 10px;
    border-radius: 40px 0 0 40px ;
    }
    
    tr:first-child {
        padding: 100px;
    }
    
    td:last-child {
        border-radius: 0 40px 40px 0;
    }
    
    
    [data-index="0"] {
        font-weight: 500;
        background: linear-gradient(to bottom, #5F13B0, #6929AE, #7644AB);
        color: #fff !important;
        width: 100px !important;
        border-bottom: 5px solid #F9F9F9;
        border-top: 5px solid #F9F9F9;
    }
     [data-index="0"]:hover {
             font-weight: 500;
    }
    [data-index="1"] {
        font-weight: 500;
        background: linear-gradient(to bottom, #17D6FF, #0CBFFE, #01AAFC);
        color: #fff !important;
        border-bottom: 5px solid #F9F9F9;
        border-top: 5px solid #F9F9F9;
    }
    
     [data-index="1"]:hover {
    font-weight: 500;
    }
    
    [data-index="2"] {
        font-weight: 500;
        background: linear-gradient(to bottom, #FA7D25, #E36C18, #CC5B0A);
        color: #fff !important;
        border-bottom: 5px solid #F9F9F9;
        border-top: 5px solid #F9F9F9;
    }
     [data-index="2"]:hover {
    font-weight: 500;
    }
    .fixed-table-header {
        background: #F9F9F9 !important;
    }
    .fixed-table-container.fixed-height {
        border: none !important;
    }
    thead tr {
        border: none !important;
    }
    thead th {
        border-top: none !important;
        border-bottom: none !important;
        background-color: var(--warna_3);
        color: black;
    }
    
    .top-3{
        margin-top: 1rem;
    }
    
    @media (max-width: 760px) {
        .text-hp {
            font-size: 14px !important;
        }
        .text-hp-h3 {
            font-size: 16px !important;
        }
        .hp-image {
            width: 30px ;
            height: 30px ;
        }
        .top-3{
            margin: 0px !important;
        }
    }
    
/* General Styles for Top 3 Containers */
.top3-container {
    background: var(--warna_3);
    padding: 20px;
    display: flex;
    border-radius: 20px 20px 0 0;
    justify-content: space-between; /* Distribute space evenly */
    align-items: flex-end; /* Align items to the bottom */
    position: relative; /* For absolute positioning */
    padding-top: 80px;
    padding-bottom: 50px;
}

.top3-container .user {
    align-items: center;
    margin: 0 10px;
    text-align: center;
    position: relative; /* For adjusting the first rank position */
}

.top3-container .user img {
    border-radius: 50%;
    border: 5px solid #F4F4F4;
}

.top3-container .user.first-rank {
    position: absolute;
    left: 48%;
    transform: translate(-50%, 40px); /* Center horizontally and move down */
}

.top3-container .user.first-rank img {
    width: 80px; /* Adjust the size of the first rank image */
    height: 80px;
    border: 5px solid #FFCA28;
}

.top3-container .username {
    font-size: 17px;
    font-weight: 500;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100px;
}

.top3-container .total {
    color: #000;
}

.rank-circle {
    position: absolute;
    bottom: 40px; /* Position at the bottom of the image */
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    color: #000;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    border: 3px solid #000;
}

.crown {
    position: absolute;
    border-radius: 0 !important;
    border: none;
    top: -40px; 
    left: 50%;
    transform: translateX(-50%);
    width: 60px !important; 
    height: auto !important; 
    z-index: 1; 
    border: none !important;
}

@media (max-width: 768px) {
            .desktop-view {
                display: none;
            }
            .mobile-view {
                display: block;
            }
            .nav-buttons {
                display: flex;
                justify-content: center;
                background: #6F9C62;
                border-radius: 30px;
                border: 5px solid #6F9C62;
            }
            .nav-buttons button {
                margin: 0;
                padding: 15px 15px;
                background-color: var(--warna_3);
                color: var(--warna_2);
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .nav-buttons button.active {
                background-color: var(--warna_13);
                border-radius: 30px;
            }
            .content-section {
                display: none;
            }
            .content-section.active {
                display: block;
            }
            #leaderboard-banner {
                filter: drop-shadow(5px 5px 5px #333333);
                width: 100%;
            }
            #leaderboard-p {
                filter: drop-shadow(5px 5px 5px #333333);
                width: 60%;
                position: relative;
                bottom: 1rem;
            }
        }

        /* Style untuk tampilan desktop */
        @media (min-width: 769px) {
            .mobile-view {
                display: none;
            }
            .desktop-view {
                display: flex;
            }
            #leaderboard-banner {
                filter: drop-shadow(50px 5px 5px #333333);
                width: 60%;
            }
            #leaderboard-p {
                filter: drop-shadow(5px 5px 5px #333333);
                width: 30%;
                position: relative;
                bottom: 2rem;
            }
        }
        
        @keyframes upDownLeaderboard {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-30px);
            }
            100% {
                transform: translateY(0);
            }
        }
        

</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="bg-leaf">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-left">
    <img src="<?= base_url(); ?>/assets/images/bg-leaf.png" id="bg-leaf-top-right">
</div>
<div class="pt-4 pb-5" style="min-height: 500px;">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="animation: upDownLeaderboard 3s infinite;">
            <img src="<?= base_url(); ?>/assets/images/leaderboard.png" style="justify-content:center" id="leaderboard-banner">
            <!--<div class="background-flex row align-items-center pr-3 pl-3" style="background:transparent;border-radius:10px;padding:10px;gap:0.25rem;">-->
                <!--<img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="62" width="62" style="z-index:100;">-->
                <!--<h3 class="text-center text-hp-h3 font-proximanovabl top-3" style="color: #81B958;font-size:28px; font-weight:700;">LEADERBOARD PARA SULTAN</h3>-->
                <!--<img class="hp-image" src="<?= base_url(); ?>/assets/images/new-assets/crown2.png" height="62" width="62" style="z-index:100;">-->
            <!--</div>-->
        </div>
        <div class="d-flex justify-content-center align-items-center" style="animation: upDownLeaderboard 3s infinite;">
            <img src="<?= base_url(); ?>/assets/images/leaderboard-p.png" id="leaderboard-p">
        </div>
        <!--<p class="mb-5 text-center text-hp" style="font-size: 18px;font-weight: 600;color: var(--warna_4); !important; animation: upDownLeaderboard 3s infinite; -webkit-text-stroke:0.1px #333333">Berikut adalah nama para Sultan-Sultan di Hidden Game!</p>-->
        
        <!-- Mobile View -->
        <div class="mobile-view">
            <div class="nav-buttons">
                <button id="btn-daily" class="active" onclick="showContent('daily')">Top 50 Daily</button>
                <button id="btn-weekly" onclick="showContent('weekly')">Top 50 Weekly</button>
                <button id="btn-monthly" onclick="showContent('monthly')">Top 50 Monthly</button>
            </div>
            <div id="content-daily" class="content-section active">
                <!-- Top 50 Daily Content -->
                <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff!important; position:relative; bottom:-70px; z-index:1; text-align:center; font-size:24px !important">Top 50 Daily</h4>
                <div id="top3-daily-m" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table1-m" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" 
                               data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_daily">
                            <thead>
                                <tr style="background: #F9F9F9;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 5 menit sekali</p>
            </div>
            <div id="content-weekly" class="content-section">
                <!-- Top 50 Weekly Content -->
                <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff!important; position:relative; bottom:-70px; z-index:1; text-align:center; font-size:24px !important">Top 50 Weekly</h4>
                <div id="top3-weekly-m" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table2-m" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_weekly">
                            <thead>
                                <tr style="background: #F9F9F9;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 15 menit sekali</p>
            </div>
            <div id="content-monthly" class="content-section">
                <!-- Top 50 Monthly Content -->
                <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff!important; position:relative; bottom:-70px; z-index:1; text-align:center; font-size:24px !important">Top 50 Monthly</h4>
                <div id="top3-monthly-m" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table3-m" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_monthly">
                            <thead>
                                <tr style="background: #F9F9F9;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 1 jam sekali</p>
            </div>
        </div>
        
        <!-- Desktop View -->
        <div class="desktop-view row justify-content-center">
            <div class="mb-3 col-md-4">
                 <div class="d-flex justify-content-center align-items-center mb-2 text">
                        <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff!important; position:relative; bottom:-80px; z-index:1">Top 50 Daily</h4>
                    </div>
                <div id="top3-daily" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table1" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" 
                               data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_daily">
                            <thead>
                                <tr style="background: #fff;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 5 menit sekali</p>
            </div>

            <div class="mb-3 col-md-4">
                <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff !important; position:relative; bottom:-80px; z-index:1">Top 50 Weekly</h4>
                </div>
                <div id="top3-weekly" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table2" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_weekly">
                            <thead>
                                <tr style="background: #fff;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 15 menit sekali</p>
            </div>

            <div class="mb-3 col-md-4">
                <div class="d-flex justify-content-center align-items-center mb-2">
                        <h4 class="mb-4 text-hp-h3 font-proximanovabl" style="color:#fff !important; position:relative; bottom:-80px; z-index:1">Top 50 Monthly</h4>
                </div>
                <div id="top3-monthly" class="top3-container"></div>
                <div class="card-bodyss">
                    <div class="table-responsive">
                        <table class="table" id="table3" data-id-field="id" data-toolbar="#toolbar" data-show-refresh="true"
                               data-auto-refresh="true" data-auto-refresh-interval="15" data-show-search-clear-button="true" data-height="520" data-show-footer="false"
                               data-url="<?= base_url(); ?>/Pages/get_top_sepuluh_monthly">
                            <thead>
                                <tr style="background: #fff;">
                                    <th data-field="no">No</th>
                                    <th data-field="username" data-formatter="usernameFormatter">Nickname</th>
                                    <th data-field="total">Total Topup</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <p class="mt-2" style="font-weight:500; color: #84BA55">*) Data ini akan direfresh setiap 1 jam sekali</p>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
   
<script>
    function showContent(period) {
        document.getElementById('content-daily').classList.remove('active');
        document.getElementById('content-weekly').classList.remove('active');
        document.getElementById('content-monthly').classList.remove('active');

        document.getElementById('btn-daily').classList.remove('active');
        document.getElementById('btn-weekly').classList.remove('active');
        document.getElementById('btn-monthly').classList.remove('active');

        if (period === 'daily') {
            document.getElementById('content-daily').classList.add('active');
            document.getElementById('btn-daily').classList.add('active');
        } else if (period === 'weekly') {
            document.getElementById('content-weekly').classList.add('active');
            document.getElementById('btn-weekly').classList.add('active');
        } else if (period === 'monthly') {
            document.getElementById('content-monthly').classList.add('active');
            document.getElementById('btn-monthly').classList.add('active');
        }
    }
</script>   

<script>
    // Simpan posisi scroll sebelum tabel diperbarui
    var scrollPosition = 0;

    $(document).ready(function() {
        // Event listener untuk mengambil posisi scroll saat tabel di-scroll
        $('.table-responsive').on('scroll', function() {
            // Simpan posisi scroll saat tabel di-scroll
            scrollPosition = $(this).scrollTop();
        });

        // Panggil fungsi untuk menjaga posisi scroll setelah tabel diperbarui
        keepScrollPosition();
    });

    // Fungsi untuk menjaga posisi scroll setelah tabel diperbarui
    function keepScrollPosition() {
        // Atur kembali posisi scroll ke nilai yang disimpan setelah tabel diperbarui
        $('.table-responsive').scrollTop(scrollPosition);
    }
</script>

<script>
    function loadTop3Data(url, containerId) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var data = response.rows;

            $(containerId).empty();

            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                var tr = $('<tr>').appendTo('tbody');
                
                if (i === 0) {
                    tr.addClass('first-rank');
                } else if (i === 1) {
                    tr.addClass('second-rank');
                } else if (i === 2) {
                    tr.addClass('third-rank');
                }

                var initial = item.username.charAt(0).toUpperCase();

                var img = $('<img>').attr('alt', 'Profile Image');

                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                canvas.width = 60;
                canvas.height = 60;

                function createGradient(ctx, rank) {
                    var gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
                    if (rank === 1) {
                        gradient.addColorStop(0, '#5D10AF');
                        gradient.addColorStop(0.33, '#6623AE');
                        gradient.addColorStop(0.66, '#7037AC');
                        gradient.addColorStop(1, '#7745AB');
                    } else if (rank === 2) {
                        gradient.addColorStop(0, '#31DDFE');
                        gradient.addColorStop(0.5, '#2FCDFE');
                        gradient.addColorStop(1, '#2DBBFE');
                    } else if (rank === 3) {
                        gradient.addColorStop(0, '#FC7F26');
                        gradient.addColorStop(0.5, '#DF6915');
                        gradient.addColorStop(1, '#C65606');
                    } else {
                        gradient.addColorStop(0, '#ffffff');
                        gradient.addColorStop(1, '#ffffff');
                    }
                    return gradient;
                }

                function drawBackground(ctx, rank) {
                    var gradient = createGradient(ctx, rank);
                    ctx.fillStyle = gradient;
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                }

                drawBackground(ctx, i + 1);

                ctx.font = '30px Proxima Nova Rg';
                ctx.fillStyle = '#fff';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(initial, canvas.width / 2, canvas.height / 2 + 3);

                var imageUrl = canvas.toDataURL();

                img.attr('src', imageUrl);

                var userDiv = $('<div>').addClass('user');
                if (i === 0) {
                    userDiv.addClass('first-rank'); // Add class for the first rank
                    userDiv.append('<img src="<?= base_url(); ?>/assets/images/leaderboard-crown.png" class="crown">');
                }
                userDiv.append(img);
                userDiv.append('<div class="username">' + item.username + '</div>');
                userDiv.append('<div class="total">' + item.total + '</div>');
                
                // Add rank circle with different background colors based on rank
                var rankCircle = $('<span>').addClass('rank-circle').text(i + 1);
                if (i === 0) {
                    rankCircle.css('background-color', '#FFCA28');
                } else if (i === 1) {
                    rankCircle.css('background-color', '#F4F4F4');
                } else if (i === 2) {
                    rankCircle.css('background-color', '#FF8228');
                }
                userDiv.append(rankCircle);

                $(containerId).append(userDiv);
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function() {
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_daily', '#top3-daily');
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_daily', '#top3-daily-m');
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_weekly', '#top3-weekly');
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_weekly', '#top3-weekly-m');
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_monthly', '#top3-monthly');
    loadTop3Data('<?= base_url(); ?>/Pages/get_top_3_monthly', '#top3-monthly-m');
});





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
  var $table = $('#table1')
  var $table = $('#table1-m')
   var $table = $('#table2')
   var $table = $('#table2-m')
    var $table = $('#table3')
    var $table = $('#table3-m')

  $(function() {
    $('#toolbar').find('select').change(function () {
      $table.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['csv', 'excel'],
        columns: [
          {
            field: 'no',
            title: 'No'
          }
        ]
      })
    }).trigger('change')
  })
</script>

<script>
    function usernameFormatter(value, row, index) {

        if (index == 0) {
            return '<span><iconify-icon icon="fluent:crown-20-filled" style="vertical-align: sub;font-size: 17px;color: #ffcc00;"></iconify-icon> ' + value + '</span>';
        } else if (index == 1) {
            return '<span><iconify-icon icon="fluent:crown-20-filled" style="vertical-align: sub;font-size: 17px;"></iconify-icon> ' + value + '</span>';
        } else if (index == 2) {
            return '<span><iconify-icon icon="fluent:crown-20-filled" style="vertical-align: sub;font-size: 17px;color: #ae5533;"></iconify-icon> ' + value + '</span>';
        } else {
            return value;
        }
    }

    $(function () {
        $('#table1').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
    $(function () {
        $('#table1-m').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
    
    $(function () {
        $('#table2').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
    $(function () {
        $('#table2-m').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
    
    $(function () {
        $('#table3').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
    $(function () {
        $('#table3-m').bootstrapTable({
            // Konfigurasi atau opsi lainnya disini
        });
    });
</script>

<?php $this->endSection(); ?>