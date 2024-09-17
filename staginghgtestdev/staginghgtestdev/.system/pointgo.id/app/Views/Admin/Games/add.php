<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Tambah Games</h5>

                                <?= alert(); ?>

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Games</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="games">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Gambar</label>
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-image" name="image">
                                                <label class="custom-file-label" for="games-image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group row" hidden>
                                        <label class="col-form-label col-md-4 text-white">Gambar Info Petunjuk</label>
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-infoimage" name="infoimage">
                                                <label class="custom-file-label" for="games-infoimage">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kategori</label>
                                        <div class="col-md-8">
                                            <select name="category" class="form-control">
                                                <?php foreach ($category as $loop): ?>
                                                <option value="<?= $loop['category']; ?>"><?= $loop['category']; ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Games Provider</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="code">
                                            <p>Kode Games Lapakgaming diisi sesuai code di link ini <a href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning" target="_blank">disini</a> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Provider Games</label>
                                        <div class="col-md-8">
                                            <select name="provider" class="form-control">
                                                <option value="default">General</option>
                                                <option value="AG" >Api Games</option>
                                                <option value="LG" >Lapakgaming</option>
                                                <option value="VG">Vocagame</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Urutan</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" autocomplete="off" name="sort">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Deskripsi</label>
                                        <div class="col-md-8">
                                            <textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Sistem Target</label>
                                        <div class="col-md-8">
                                            <select name="target" class="form-control">
                                                <option value="default">Default</option>
                                                <option value="custom">Custom Sistem Target</option>
                                                <option value="rorigin">RO ORIGIN</option>
                                                <option value="ml">Mobile Legends</option>
                                                <option value="gi">VOCA-Genshin Impact</option>
                                                <option value="tof">DF Tower of Fantasy</option>
                                                <option value="la">DF Life After</option>
                                                <option value="joki">Joki ML</option>
                                                <option value="skinml">Skin ML</option>
                                                <option value="videomontage">Video Montage</option>
                                                <option value="topuplogin">Top Up via Login</option>
                                                <option value="tournament">ML Tournament</option>
                                                <option value="logincustomfield">Top up Login Custom Field</option>
                                                <option value="voucher">Voucher</option>
                                                <option value="pulsa">Pulsa</option>
                                                <option value="data">Data</option>
                                                <option value="pln">PLN</option>
                                                <option value="ppob">PPOB</option>

                                                <option value="loginapex">Apex via Login</option>
                                                <option value="loginefootball">Fifa Mobile via Login</option>
                                                <option value="loginff">Freefire via Login</option>
                                                <option value="logingenshin">Genshin via Login</option>
                                                <option value="loginml">ML via Login</option>
                                                <option value="loginninokuni">Ni No Kuni via Login</option>
                                                <option value="loginpokemon">Pokemon via Login</option>
                                                <option value="loginraven">Gray Raven via Login</option>
                                                <option value="logintiktok">Tiktok via Login</option>
                                                <option value="logintower">Tower of Fantasy via Login</option>
                                                <option value="loginwildrift">Wild Rift via Login</option>

                                                <option value="lg1-atlanticarebirth">Lapakgaming Atlantica Rebirth</option>
                                                <option value="lg1-betheking">Lapakgaming Be The King</option>
                                                <option value="lg1-bleach">Lapakgaming Bleach Mobile 3D</option>
                                                <option value="lg1-chimeraland">Lapakgaming Chimeraland</option>
                                                <option value="lg1-dekaron">Lapakgaming Dekaron G</option>
                                                <option value="lg1-echocalypse">Lapakgaming Echocalypse</option>
                                                <option value="lg1-eraofcelestials">Lapakgaming Era Of Celestials</option>
                                                <option value="lg1-eudemonsonline">Lapakgaming Eudemons Online</option>
                                                <option value="lg1-fourgods">Lapakgaming Four Gods On Wemix</option>
                                                <option value="lg1-genshinimpact">Lapakgaming Genshin Impact</option>
                                                <option value="lg1-goddessofvictory">Lapakgaming Goddess of Victory : Nikke</option>
                                                <option value="lg1-heroesevolved">Lapakgaming Heroes Evolved</option>
                                                <option value="lg1-hyperfront">Lapakgaming Hyper Front</option>
                                                <option value="lg1-idlelegends">Lapakgaming Idle Legends : GODS SAGA</option>
                                                <option value="lg1-ldcloud">Lapakgaming LDCloud</option>
                                                <option value="lg1-lifeafter">Lapakgaming LifeAfter</option>
                                                <option value="lg1-lokapala">Lapakgaming Lokapala</option>
                                                <option value="lg1-lostsagaorigin">Lapakgaming Lost Saga Origin</option>
                                                <option value="lg1-mikoera">Lapakgaming Miko Era: Twelve Myths</option>
                                                <option value="lg1-mir4">Lapakgaming MIR4</option>
                                                <option value="lg1-mirageperfectskyline">Lapakgaming Mirage Perfect Skyline</option>
                                                <option value="lg1-ninokuni">Lapakgaming Ni no Kuni</option>
                                                <option value="lg1-perfectworld">Lapakgaming Perfect World</option>
                                                <option value="lg1-ragnarokforeverlove">Lapakgaming Ragnarok Forever Love</option>
                                                <option value="lg1-ragnarokmeternallove">Lapakgaming Clash of Clans</option>
                                                <option value="lg1-ragnarokretro">Lapakgaming Ragnarok Retro</option>
                                                <option value="lg1-returnofcondorheroes">Lapakgaming Return of Condor Heroes</option>
                                                <option value="lg1-rfclassic">Lapakgaming RF Classic</option>
                                                <option value="lg1-rfremastered">Lapakgaming RF Remastered</option>
                                                <option value="lg1-saintseiya">Lapakgaming Saint Seiya</option>
                                                <option value="lg1-toweroffantasy">Lapakgaming Tower of Fantasy</option>
                                                <option value="lg1-aceracer">Lapakgaming Ace Racer</option>
                                                <option value="lg1-avatara">Lapakgaming Avatara</option>
                                                <option value="lg1-clashofclans">Lapakgaming Clash Of Clans</option>
                                                <option value="lg1-clashroyale">Lapakgaming Clash Royale</option>
                                                <option value="lg1-diablo">Lapakgaming Diablo: Immortal</option>
                                                <option value="lg1-dragonhunter">Lapakgaming Dragon Hunter</option>
                                                <option value="lg1-fifamobile">Lapakgaming FIFA Mobile</option>
                                                <option value="lg1-ragnarokarena">Lapakgaming Ragnarok Arena</option>
                                                <option value="lg1-ragnarokoriginnew">Lapakgaming Ragnarok Origin</option>
                                                <option value="lg1-ragnarokxlogin">Lapakgaming Ragnarok X</option>
                                                <option value="lg1-stateofsurvival">Lapakgaming State of Survival: Zombie War</option>
                                                <option value="lg1-summonerwar">Lapakgaming Summoner War : Chronicles</option>
                                                <option value="lg1-undecember">Lapakgaming Undecember</option>
                                                <option value="sosmed" hidden>Sosmed VR</option>

                                                <option value="vr-genshinimpact">VR Genshin Impact</option>
                                                <option value="vr-genshin">VR-Genshin Impact 2</option>
                                                <option value="vr-chimeraland">VR Chimeraland</option>
                                                <option value="vr-ragnarokmeternallove">VR Ragnarok M Eternal Love</option>
                                                <option value="vr-lifeafter">VR LifeAfter</option>
                                                <option value="vr-onepunchman">VR One Punch Man</option>
                                                <option value="vr-hyperfront">VR Hyper Front</option>
                                                <option value="vr-toweroffantasy">VR Tower Of Fantasy</option>
                                                <option value="vr-betheking">VR Be The King</option>

                                                <option value="tv-genshinimpact">TV Genshin Impact</option>
                                                <option value="tv-chimeraland">TV Chimeraland</option>
                                                <option value="tv-lifeafter">TV LifeAfter</option>
                                                <option value="tv-onepunchman">TV One Punch Man</option>
                                                <option value="tv-hyperfront">TV Hyper Front</option>
                                                <option value="tv-toweroffantasy">TV Tower Of Fantasy</option>
                                                <option value="tv-betheking">TV Be The King</option>
                                                <option value="tv-narutoslugfest">TV Naruto Slugfest X</option>

                                                <option value="bj-genshinimpact">BJ Genshin Impact</option>
                                                <option value="bj-chimeraland">BJ Chimeraland</option>
                                                <option value="bj-lifeafter">BJ LifeAfter</option>
                                                <option value="bj-onepunchman">BJ One Punch Man</option>
                                                <option value="bj-hyperfront">BJ Hyper Front</option>
                                                <option value="bj-toweroffantasy">BJ Tower Of Fantasy</option>
                                                <option value="bj-betheking">BJ Be The King</option>
                                                <option value="bj-narutoslugfest">BJ Naruto Slugfest X</option>
                                                <option value="bj-goddessofvictory">BJ Goddess Of Victory</option>
                                                <option value="bj-heroesevolved">BJ Heroes Evolved</option>
                                                <option value="bj-perfectworld">BJ Perfect World</option>
                                                <option value="bj-ragnarokmeternallove">BJ Ragnarok M Eternal Love</option>

                                                <option value="valo">Valorant</option>
                                                
                                                <option value="joki" >Joki Rank ML</option>
												<option value="jokigendong" >Joki Gendong</option>
												<option value="jokimc" >Joki Magic Chess</option>
												<option value="jokicl" >Joki Classic</option>
												<option value="jokiv" >Joki Valorant</option>
												<option value="roomtr" >Room Tournament</option>
												<option value="js-universal" >Jasa Influencer</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Validasi Player</label>
                                        <div class="col-md-8">
                                            <select name="check_status" class="form-control">
                                                <option value="N">Tidak</option>
                                                <option value="Y">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Validasi</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="check_code">
                                            <small>Kosongkan jika tidak menggunakan sistem validasi player</small><br>
                                            <small>Kode validasi bisa di cek <a href="https://hanz-digital.gitbook.io/admin-web-top-up-game/panduan-admin/kode-validasi-cek-id-game" class="text-warning" target="_blank">disini</a></small>

                                        </div>
                                    </div>
                                    
                                    <h5 class="mb-3">---Custom Sistem Target---</h5>
									<p>Hanya aktif untuk Sistem Target "Custom Sistem Target"</p>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Jumlah Kolom</label>
										<div class="col-md-8">
											<select name="st_col" class="form-control">
												<option value="1" >1</option>
												<option value="2" >2</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Judul Sistem Target</label>
										<div class="col-md-8">
											<input type="text" class="form-control" autocomplete="off" name="st_title" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Deskripsi Sistem Target</label>
										<div class="col-md-8">
											<textarea name="st_desc" id="" cols="30" rows="5" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Placeholder Input 1 (User ID) </label>
										<div class="col-md-8">
											<input type="text" class="form-control" autocomplete="off" name="st1_text" value="">
										</div>
									
									</div>
									<div class="form-group row">
									
										<label class="col-form-label col-md-4 text-white">Tipe Data Input 1</label>
										<div class="col-md-8">
											<select name="st1_type" class="form-control">
												<option value="text" >Text</option>
												<option value="number" >Number</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Placeholder Input 2 (Server ID) </label>
										<div class="col-md-8">
											<input type="text" class="form-control" autocomplete="off" name="st2_text" value="">
										</div>
										
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Tipe Data Input 2</label>
										<div class="col-md-8">
											<select name="st2_type" class="form-control">
												<option value="text" >Text</option>
												<option value="number" >Number</option>
												<option value="dropdown">Dropdown List Server</option>
											</select>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Data List Server (Jika Tipe Data Dropdown List Server)</label>
										<div class="col-md-8">
											<textarea name="st2_data" id="" cols="30" rows="25" class="form-control"></textarea>
										<br><p>Masukkan dalam format : value1///name1,value2///name2,value3///name3,value4///name4</p>
										<p>Contoh : America///America,Asia///Asia,Europe///Europe,TW_HK_MO///TW_HK_MO</p>
										<p>Note : Value dan Name terkadang bisa berbeda untuk Games/Provider tertentu, harap check dan ikuti detail penamaan server di Web Provider dengan klik Kanan Inspect pada bagian dropdown list server</p>
										<p>Data Server Lapakgaming dapat dicopy sesuai link ini <a href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning" target="_blank">disini</a> </p>
										</div>
										
										
									</div>
                                    
                                    <a href="<?= base_url(); ?>/admin/games" class="btn btn-warning float-left">Kembali</a>
                                    <div class="text-right">
                                        <button class="btn text-white" type="reset">Batal</button>
                                        <button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
                                    </div>
                                </form>
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
<script>
CKEDITOR.replace('content');
CKEDITOR.replace('st_desc');
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php $this->endSection(); ?>