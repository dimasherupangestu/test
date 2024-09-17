<style>
.pagination {
    justify-content: center;
}

.card-pagination.active {
    padding: 5px 13px;
    background: var(--warna_4);
    border-radius: 9px;
    border: 1px solid var(--warna_4);
}

.card-pagination {
    padding: 5px 13px;
    background: transparent;
    border-radius: 9px;
    border: 1px solid #3e3e3e;
}

.card-pagination.disabled {
    background: #81818147;
}

.card-pagination.disabled p {
    color: #ffffff3b !Important;
}

.card-pagination p {
    color: var(--warna_4) !Important;
}

.card-pagination.active p {
    color: #000 !Important;
}

#datatable_wrapper {
    padding: 0;
}

#datatable_wrapper .row:nth-child(1),
#datatable_wrapper .row:nth-child(3) {
    padding: 20px 15px;
}

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

.border-bottom {
    border-bottom: 1px solid rgba(65, 65, 65, 1) !important;
}

.border-bottom-pointgo {
    border-bottom: 1px solid var(--warna_4) !important;
}

@media (min-width:481px) {

    p,
    a {
        font-size: 16px;
    }
}

@media (max-width:480px) {

    p,
    a {
        font-size: 13px;
    }
}



.body-games-in2 {
    background: var(--warna_2);
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 11px;
    box-shadow: 0 10px 30px 0 rgb(0 0 0 / 11%);
}

a .body-games-in2:hover {
    opacity: 0.8;
    transition: 0.3s ease;
}


.body-games-green {
    background: var(--warna_3) !important;
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 11px;
    color: #000;
}

.body-games-green:hover {
    opacity: 0.8;
    transition: 0.3s ease;
}

.text-secondary-pointgo {
    color: var(--warna_4) !important;
}

.font-md {
    font-size: 12px;
}

.body-games-in {
    background:  var(--warna_2) !important;
    padding: 1.25rem;
    border-radius: 12px;
    box-shadow: 0 0px 7px 0 rgb(0 0 0 / 10%);
}

.waves-card {
    /*background: linear-gradient(180deg, #f0f0f0 0%, #ececec 100%) !important;*/
    background: #fff !important;
    border: 1px solid #E6E6E6;
    flex: 1 1 auto;
    padding: 1.25rem;
    border-radius: 11px;
}

.waves-card:after {
    position: absolute;
    bottom: 0px;
    right: 6px;
    width: 100px;
    height: 96px;
    content: "";
    background: url(https://hanzglobal.my.id/pointgo/assets/images/new-assets/waves-card.svg) top/cover;
    text-align: center;
    border-radius: 0 5px 0 0;
}


.table-dark {
    color: #fff;
    background: var(--warna_2);
}

@media (min-width: 1200px) {
    .container {
        max-width: 1200px;
    }
}

.section-game {
    border: 0px solid !important;
}


.dropdown-menu-dark {
    color: rgb(222, 226, 230);
    background-color: rgb(52, 58, 64);
    border-color: rgba(0, 0, 0, 0.15);
}

h6 {
    color: #fff;
}

.shadow-md {
    --tw-shadow: 0 4px 16px 1px rgb(0 0 0 / 0.1), 0 2px 4px 2px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.price-via {
    background: #707feb;
    display: grid;
    margin-bottom: 10px !important;
    padding: 5px 0px;
}

.saldo-user-up {
    background: #707feb;
    text-align: center;
    border-radius: 11px 11px 0px 0px !important;
    color: #fff !important;
}

.saldo-user-down {
    text-align: center;
    border-radius: 0px 0px 11px 11px !important;
}

.total-pesanan-bg {
    background-color: #707feb;
    border-radius: 50%;
}

.total-belanja-bg {
    background-color: #74ad28;
    border-radius: 50%;
}

.pesanan-tertunda-bg {
    background-color: #d77701;
    border-radius: 50%;
}
</style>
<script>
$('#akunuser').css('display', 'block')
</script>