<style>
        input[type="date"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 6px 10px;
            border: 1px solid #212121;
            border-radius: 4px;
            outline: none;
            box-sizing: border-box;
        }
        
        input[type="time"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 6px 10px;
            border: 1px solid #212121;
            border-radius: 4px;
            outline: none;
            box-sizing: border-box;
        }

        /* Safari khusus */
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        /* Safari khusus */
        input[type="time"]::-webkit-inner-spin-button,
        input[type="time"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
</style>

<div class="form-row pt-3">
    
    <div class="col-lg-6 mb-1">
        <input type="text" name="jokigendong[userid]" class="form-control mb-2 name-jokigendong" placeholder="Masukkan User ID" autocomplete="off">
    </div>
    <div class="col-lg-6 mb-1">
        <input type="text" name="jokigendong[server]" class="form-control mb-2 name-jokigendong" placeholder="Masukkan Server" autocomplete="off">
    </div>
    <div class="col-lg-6 mb-1">
        <input type="text" name="jokigendong[nickname]" class="form-control mb-2 name-jokigendong" placeholder="Masukkan Nickname" autocomplete="off">
    </div>
    <div class="col-lg-6 mb-1">
        <select name="jokigendong[role]" class="form-control name-jokigendong">
            <option value="Pilih Role">Pilih Role</option>
            <option value="Roamer">Roamer</option>
            <option value="ExpLane">Exp Lane</option>
            <option value="MidLane">Mid Lane</option>
            <option value="GoldLane">Gold Lane</option>
            <option value="Jungler">Jungler</option>
        </select>
    </div>
    
    <div class="col-lg-6 mb-1">
        <input type="text" name="jokigendong[catatan]" class="form-control mb-2 name-jokigendong" placeholder="Catatan untuk Penjoki" autocomplete="off">
    </div>
    <div class="col-lg-6">
        <input type="text" name="wa" placeholder="Masukan No. Whatsapp" class="form-control" value="" required>
    </div>
    
    <div class="container">
        <div class="row" style="justify-content:center">

    <label for="tanggal" class="col-lg-6 mb-1 col-form-label" style="color:#000000; font-size:14px;">Masukkan Tanggal : </label>

    <div class="col-lg-6 mb-1">
        <input type="date" name="jokigendong[tanggal]" class="form-control mb-2 name-jokigendong" placeholder="Masukkan Tanggal :" autocomplete="off">
    </div>

    <label for="tanggal" class="col-lg-6 mb-1 col-form-label" style="color:#000000; font-size:14px">Masukkan Jam : </label>

    <div class="col-lg-6 mb-1">
        <input type="time" name="jokigendong[jam]" class="form-control mb-2 name-jokigendong" placeholder="Masukkan Jam (HH:MM)" autocomplete="off">
    </div>
        </div>
    </div>


    <!-- <p class="col-12 mt-2" style="font-size: 10px">Untuk mengetahui User ID Anda, silahkan klik menu profile dibagian kiri atas pada menu utama game. User ID akan terlihat dibagian bawah Nama karakter game Anda. Silahkan masukan User ID dan Server ID Anda untuk menyelesaikan transaksi. <b>Contoh: 12345678(1234)</b>. </p> -->
</div>
 
 <script>
$('.datepicker').datepicker({
    format: {
        toDisplay: function (date, format, language) {
            var d = new Date(date);
            d.setDate(d.getDate() - 7);
            return d.toISOString();
        },
        toValue: function (date, format, language) {
            var d = new Date(date);
            d.setDate(d.getDate() + 7);
            return new Date(d);
        }
    }
});
</script>