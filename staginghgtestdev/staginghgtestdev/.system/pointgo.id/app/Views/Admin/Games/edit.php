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
                                <h5 class="mb-3">Edit Games</h5>

                                <?= alert(); ?>

                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Games</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="games"
                                                value="<?= $games['games']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Gambar</label>
                                        <div class="col-md-8">
                                            <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image'] ?>"
                                                alt="" width="140" class="mb-3 rounded">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-image"
                                                    name="image">
                                                <label class="custom-file-label" for="games-image">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Banner Gambar</label>
                                        <div class="col-md-8">
                                            <img src="<?= base_url(); ?>/assets/images/games/banner_img/<?= $games['banner_img'] ?>"
                                                alt="" width="140" class="mb-3 rounded">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="games-banner_img"
                                                    name="banner_img">
                                                <label class="custom-file-label" for="games-banner_img">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
										<label class="col-form-label col-md-4 text-white">Gambar Info Petunjuk</label>
										<div class="col-md-8">
											<img src="<?= base_url(); ?>/assets/images/games/infoimage/<?= $games['infoimage'] ?>" alt="" width="140" class="mb-3 rounded">
											<div class="custom-file">
											    <input type="file" class="custom-file-input" id="games-infoimage" name="infoimage">
											    <label class="custom-file-label" for="games-infoimage">Choose file</label>
											</div>
										</div>
									</div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kategori</label>
                                        <div class="col-md-8">
                                            <select name="category" class="form-control">
                                                <?php foreach ($category as $loop): ?>
                                                <option value="<?= $loop['category']; ?>"
                                                    <?= $loop['category'] == $games['category'] ? 'selected' : ''; ?>>
                                                    <?= $loop['category']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Games
                                            Provider</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="code"
                                                value="<?= $games['code']; ?>">
                                            <p>Kode Games Lapakgaming diisi sesuai code di link ini <a
                                                    href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning"
                                                    target="_blank">disini</a> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Provider Games</label>
                                        <div class="col-md-8">
                                            <select name="provider" class="form-control">
                                                <option value="default"
                                                    <?= $games['provider'] == 'default' ? 'selected' : ''; ?>>
                                                    General</option>
                                                <option value="AG" <?= $games['provider'] == 'AG' ? 'selected' : ''; ?> >
                                                    Api Games
                                                </option>
                                                <option value="LG" <?= $games['provider'] == 'LG' ? 'selected' : ''; ?> >
                                                    Lapakgaming
                                                </option>
                                                <option value="VG" <?= $games['provider'] == 'VG' ? 'selected' : ''; ?>>
                                                    Vocagame
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Urutan</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" autocomplete="off" name="sort"
                                                value="<?= $games['sort']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Deskripsi</label>
                                        <div class="col-md-8">
                                            <textarea name="content" id="" cols="30" rows="5"
                                                class="form-control"><?= $games['content']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Diskon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="discount"
                                                value="<?= $games['discount']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Sistem Target</label>
                                        <div class="col-md-8">
                                            <select name="target" class="form-control">
                                                <option value="default"
                                                    <?= $games['target'] == 'default' ? 'selected' : ''; ?>>Default
                                                </option>
                                                <option value="custom" <?= $games['target'] == 'custom' ? 'selected' : '' ?>>Custom Sistem Target</option>
                                                <option value="df-ragnarokoriginglobal"
                                                    <?= $games['target'] == 'df-ragnarokoriginglobal' ? 'selected' : ''; ?>>
                                                    RO Origin</option>
                                                <option value="ml" <?= $games['target'] == 'ml' ? 'selected' : ''; ?>>
                                                    Mobile
                                                    Legends</option>
                                                <option value="gi" <?= $games['target'] == 'gi' ? 'selected' : ''; ?>>
                                                    VOCA-Genshin
                                                    Impact</option>
                                                <option value="la" <?= $games['target'] == 'la' ? 'selected' : ''; ?>>
                                                    Life After
                                                </option>
                                                <option value="joki"
                                                    <?= $games['target'] == 'joki' ? 'selected' : ''; ?>>Joki ML
                                                </option>
                                                <option value="jokicl" <?= $games['target'] == 'jokicl' ? 'selected' : ''; ?>>Joki Classic
                                                </option>
                                                <option value="jokimc" <?= $games['target'] == 'jokimc' ? 'selected' : ''; ?>>Joki Magic Chess
                                                </option>
                                                <option value="roomtr" <?= $games['target'] == 'roomtr' ? 'selected' : ''; ?>>Sewa Room Tournamnet
                                                </option>
                                                 <option value="jokiv" <?= $games['target'] == 'jokiv' ? 'selected' : ''; ?>>Joki V
                                                </option>
                                                <option value="growtopia"
                                                    <?= $games['target'] == 'growtopia' ? 'selected' : ''; ?>>Growtopia
                                                </option>
                                                <option value="skinml"
                                                    <?= $games['target'] == 'skinml' ? 'selected' : ''; ?>>Skin ML
                                                </option>
                                                <option value="videomontage"
                                                    <?= $games['target'] == 'videomontage' ? 'selected' : ''; ?>>
                                                    Video Montage</option>
                                                <option value="topuplogin"
                                                    <?= $games['target'] == 'topuplogin' ? 'selected' : ''; ?>>Top
                                                    Up via Login</option>
                                                <option value="voucher"
                                                    <?= $games['target'] == 'voucher' ? 'selected' : ''; ?>>Voucher
                                                </option>
                                                <option value="pulsa"
                                                    <?= $games['target'] == 'pulsa' ? 'selected' : ''; ?>>Pulsa
                                                </option>
                                                <option value="data"
                                                    <?= $games['target'] == 'data' ? 'selected' : ''; ?>>Data
                                                </option>
                                                <option value="pln" <?= $games['target'] == 'pln' ? 'selected' : ''; ?>>
                                                    PLN</option>
                                                <option value="ppob"
                                                    <?= $games['target'] == 'ppob' ? 'selected' : ''; ?>>PPOB
                                                </option>
                                                <option value="loginapex"
                                                    <?= $games['target'] == 'loginapex' ? 'selected' : ''; ?>>Apex
                                                    via Login</option>
                                                <option value="loginefootball"
                                                    <?= $games['target'] == 'loginefootball' ? 'selected' : ''; ?>>
                                                    E-Football via Login</option>
                                                <option value="loginff"
                                                    <?= $games['target'] == 'loginff' ? 'selected' : ''; ?>>Freefire
                                                    via Login</option>
                                                <option value="logingenshin"
                                                    <?= $games['target'] == 'logingenshin' ? 'selected' : ''; ?>>
                                                    Genshin via Login</option>
                                                <option value="loginml"
                                                    <?= $games['target'] == 'loginml' ? 'selected' : ''; ?>>ML via
                                                    Login</option>
                                                <option value="loginninokuni"
                                                    <?= $games['target'] == 'loginninokuni' ? 'selected' : ''; ?>>Ni
                                                    No Kuni via Login</option>
                                                <option value="loginpokemon"
                                                    <?= $games['target'] == 'loginpokemon' ? 'selected' : ''; ?>>
                                                    Pokemon via Login</option>
                                                <option value="loginraven"
                                                    <?= $games['target'] == 'loginraven' ? 'selected' : ''; ?>>Gray
                                                    Raven via Login</option>
                                                <option value="logintiktok"
                                                    <?= $games['target'] == 'logintiktok' ? 'selected' : ''; ?>>
                                                    Tiktok via Login</option>
                                                <option value="logintower"
                                                    <?= $games['target'] == 'logintower' ? 'selected' : ''; ?>>Tower
                                                    of Fantasy via Login</option>
                                                <option value="loginwildrift"
                                                    <?= $games['target'] == 'loginwildrift' ? 'selected' : ''; ?>>
                                                    Wild Rift via Login</option>
                                                <option value="tournament"
                                                    <?= $games['target'] == 'tournament' ? 'selected' : ''; ?>>ML
                                                    Tournament</option>
                                                <option value="lg1-astralguardians"
                                                    <?= $games['target'] == 'lg1-astralguardians' ? 'selected' : ''; ?>>
                                                    Lapakgaming Astral Guardians</option>
                                                <option value="lg1-atlanticarebirth"
                                                    <?= $games['target'] == 'lg1-atlanticarebirth' ? 'selected' : ''; ?>>
                                                    Lapakgaming Atlantica Rebirth</option>
                                                <option value="lg1-betheking"
                                                    <?= $games['target'] == 'lg1-betheking' ? 'selected' : ''; ?>>
                                                    Lapakgaming Be The King</option>
                                                <option value="lg1-bleach"
                                                    <?= $games['target'] == 'lg1-bleach' ? 'selected' : ''; ?>>
                                                    Lapakgaming Bleach Mobile 3D</option>
                                                <option value="lg1-chimeraland"
                                                    <?= $games['target'] == 'lg1-chimeraland' ? 'selected' : ''; ?>>
                                                    Lapakgaming Chimeraland</option>
                                                <option value="lg1-dekaron"
                                                    <?= $games['target'] == 'lg1-dekaron' ? 'selected' : ''; ?>>
                                                    Lapakgaming Dekaron G</option>
                                                <option value="lg1-echocalypse"
                                                    <?= $games['target'] == 'lg1-echocalypse' ? 'selected' : ''; ?>>
                                                    Lapakgaming Echocalypse</option>
                                                <option value="lg1-eraofcelestials"
                                                    <?= $games['target'] == 'lg1-eraofcelestials' ? 'selected' : ''; ?>>
                                                    Lapakgaming Era Of Celestials</option>
                                                <option value="lg1-eudemonsonline"
                                                    <?= $games['target'] == 'lg1-eudemonsonline' ? 'selected' : ''; ?>>
                                                    Lapakgaming Eudemons Online</option>
                                                <option value="lg1-fourgods"
                                                    <?= $games['target'] == 'lg1-fourgods' ? 'selected' : ''; ?>>
                                                    Lapakgaming Four Gods On Wemix</option>
                                                <option value="lg1-genshinimpact"
                                                    <?= $games['target'] == 'lg1-genshinimpact' ? 'selected' : ''; ?>>
                                                    Lapakgaming Genshin Impact</option>
                                                <option value="lg1-goddessofvictory"
                                                    <?= $games['target'] == 'lg1-goddessofvictory' ? 'selected' : ''; ?>>
                                                    Lapakgaming Goddess of Victory : Nikke</option>
                                                <option value="lg1-heroesevolved"
                                                    <?= $games['target'] == 'lg1-heroesevolved' ? 'selected' : ''; ?>>
                                                    Lapakgaming Heroes Evolved</option>
                                                <option value="lg1-hyperfront"
                                                    <?= $games['target'] == 'lg1-hyperfront' ? 'selected' : ''; ?>>
                                                    Lapakgaming Hyper Front</option>
                                                <option value="lg1-idlelegends"
                                                    <?= $games['target'] == 'lg1-idlelegends' ? 'selected' : ''; ?>>
                                                    Lapakgaming Idle Legends : GODS SAGA</option>
                                                <option value="lg1-ldcloud"
                                                    <?= $games['target'] == 'lg1-ldcloud' ? 'selected' : ''; ?>>
                                                    Lapakgaming LDCloud</option>
                                                <option value="lg1-lifeafter"
                                                    <?= $games['target'] == 'lg1-lifeafter' ? 'selected' : ''; ?>>
                                                    Lapakgaming LifeAfter</option>
                                                <option value="lg1-lokapala"
                                                    <?= $games['target'] == 'lg1-lokapala' ? 'selected' : ''; ?>>
                                                    Lapakgaming Lokapala</option>
                                                <option value="lg1-lostsagaorigin"
                                                    <?= $games['target'] == 'lg1-lostsagaorigin' ? 'selected' : ''; ?>>
                                                    Lapakgaming Lost Saga Origin</option>
                                                <option value="lg1-mikoera"
                                                    <?= $games['target'] == 'lg1-mikoera' ? 'selected' : ''; ?>>
                                                    Lapakgaming Miko Era: Twelve Myths</option>
                                                <option value="lg1-mir4"
                                                    <?= $games['target'] == 'lg1-mir4' ? 'selected' : ''; ?>>
                                                    Lapakgaming MIR4</option>
                                                <option value="lg1-mirageperfectskyline"
                                                    <?= $games['target'] == 'lg1-mirageperfectskyline' ? 'selected' : ''; ?>>
                                                    Lapakgaming Mirage Perfect Skyline</option>
                                                <option value="lg1-ninokuni"
                                                    <?= $games['target'] == 'lg1-ninokuni' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ni no Kuni</option>
                                                <option value="lg1-perfectworld"
                                                    <?= $games['target'] == 'lg1-perfectworld' ? 'selected' : ''; ?>>
                                                    Lapakgaming Perfect World</option>
                                                <option value="lg1-ragnarokforeverlove"
                                                    <?= $games['target'] == 'lg1-ragnarokforeverlove' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok Forever Love</option>
                                                <option value="lg1-ragnarokmeternallove"
                                                    <?= $games['target'] == 'lg1-ragnarokmeternallove' ? 'selected' : ''; ?>>
                                                    Lapakgaming Clash of Clans</option>
                                                <option value="lg1-ragnarokretro"
                                                    <?= $games['target'] == 'lg1-ragnarokretro' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok Retro</option>
                                                <option value="lg1-returnofcondorheroes"
                                                    <?= $games['target'] == 'lg1-returnofcondorheroes' ? 'selected' : ''; ?>>
                                                    Lapakgaming Return of Condor Heroes</option>
                                                <option value="lg1-rfclassic"
                                                    <?= $games['target'] == 'lg1-rfclassic' ? 'selected' : ''; ?>>
                                                    Lapakgaming RF Classic</option>
                                                <option value="lg1-rfremastered"
                                                    <?= $games['target'] == 'lg1-rfremastered' ? 'selected' : ''; ?>>
                                                    Lapakgaming RF Remastered</option>
                                                <option value="lg1-saintseiya"
                                                    <?= $games['target'] == 'lg1-saintseiya' ? 'selected' : ''; ?>>
                                                    Lapakgaming Saint Seiya</option>
                                                <option value="lg1-toweroffantasy"
                                                    <?= $games['target'] == 'lg1-toweroffantasy' ? 'selected' : ''; ?>>
                                                    Lapakgaming Tower of Fantasy</option>
                                                <option value="lg1-aceracer"
                                                    <?= $games['target'] == 'lg1-aceracer' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ace Racer</option>
                                                <option value="lg1-avatara"
                                                    <?= $games['target'] == 'lg1-avatara' ? 'selected' : ''; ?>>
                                                    Lapakgaming Avatara</option>
                                                <option value="lg1-clashofclans"
                                                    <?= $games['target'] == 'lg1-clashofclans' ? 'selected' : ''; ?>>
                                                    Lapakgaming Clash Of Clans</option>
                                                <option value="lg1-clashroyale"
                                                    <?= $games['target'] == 'lg1-clashroyale' ? 'selected' : ''; ?>>
                                                    Lapakgaming Clash Royale</option>
                                                <option value="lg1-diablo"
                                                    <?= $games['target'] == 'lg1-diablo' ? 'selected' : ''; ?>>
                                                    Lapakgaming Diablo: Immortal</option>
                                                <option value="lg1-dragonhunter"
                                                    <?= $games['target'] == 'lg1-dragonhunter' ? 'selected' : ''; ?>>
                                                    Lapakgaming Dragon Hunter</option>
                                                <option value="lg1-fifamobile"
                                                    <?= $games['target'] == 'lg1-fifamobile' ? 'selected' : ''; ?>>
                                                    Lapakgaming FIFA Mobile</option>
                                                <option value="lg1-ragnarokarena"
                                                    <?= $games['target'] == 'lg1-ragnarokarena' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok Arena</option>
                                                <option value="lg1-ragnarokxlogin"
                                                    <?= $games['target'] == 'lg1-ragnarokxlogin' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok X</option>
                                                <option value="lg1-ragnarokorigin"
                                                    <?= $games['target'] == 'lg1-ragnarokorigin' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok Origin</option>
                                                <option value="lg1-ragnarokoriginnew"
                                                    <?= $games['target'] == 'lg1-ragnarokoriginnew' ? 'selected' : ''; ?>>
                                                    Lapakgaming Ragnarok Origin Global</option>
                                                <option value="lg1-stateofsurvival"
                                                    <?= $games['target'] == 'lg1-stateofsurvival' ? 'selected' : ''; ?>>
                                                    Lapakgaming State of Survival: Zombie War</option>
                                                <option value="lg1-summonerwar"
                                                    <?= $games['target'] == 'lg1-summonerwar' ? 'selected' : ''; ?>>
                                                    Lapakgaming Summoner War : Chronicles</option>
                                                <option value="lg1-undecember"
                                                    <?= $games['target'] == 'lg1-undecember' ? 'selected' : ''; ?>>
                                                    Lapakgaming Undecember</option>


                                                <option value="valo"
                                                    <?= $games['target'] == 'valo' ? 'selected' : ''; ?>>Valorant
                                                </option>
                                                <option value="all-server"
                                                    <?= $games['target'] == 'all-server' ? 'selected' : ''; ?>>LG
                                                    All Server</option>

                                                <option value="lg-dragonhunter"
                                                    <?= $games['target'] == 'lg-dragonhunter' ? 'selected' : ''; ?>>LG
                                                    RO Login</option>
                                                <option value="lg-neverafter"
                                                    <?= $games['target'] == 'lg-neverafter' ? 'selected' : ''; ?>>LG
                                                    Honkai Rail Login</option>

                                                <option value="joki"
                                                    <?= $games['target'] == 'joki' ? 'selected' : ''; ?>>
                                                    Joki ML</option>
                                                <option value="jokigendong"
                                                    <?= $games['target'] == 'jokigendong' ? 'selected' : ''; ?>>Joki
                                                    Gendong</option>
                                                <option value="jokimc"
                                                    <?= $games['target'] == 'jokimc' ? 'selected' : ''; ?>>Joki
                                                    Magic Chess</option>
                                                <option value="jokicl"
                                                    <?= $games['target'] == 'jokicl' ? 'selected' : ''; ?>>Joki
                                                    Classic</option>
                                                <option value="jokiv"
                                                    <?= $games['target'] == 'jokiv' ? 'selected' : ''; ?>>Joki
                                                    Rank Valorant</option>
                                                <option value="roomtr"
                                                    <?= $games['target'] == 'roomtr' ? 'selected' : ''; ?>>Room
                                                    Tournament</option>
                                                <option value="js-universal"
                                                    <?= $games['target'] == 'js-universal' ? 'selected' : ''; ?>>Jasa Influencer
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Validasi Player</label>
                                        <div class="col-md-8">
                                            <select name="check_status" class="form-control">
                                                <option value="N"
                                                    <?= $games['check_status'] == 'N' ? 'selected' : ''; ?>>Tidak
                                                </option>
                                                <option value="Y"
                                                    <?= $games['check_status'] == 'Y' ? 'selected' : ''; ?>>Ya
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Kode Validasi</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" autocomplete="off" name="check_code"
                                                value="<?= $games['check_code']; ?>">
                                            <small>Kosongkan jika tidak menggunakan sistem validasi
                                                player</small><br>
                                            <small>Kode validasi bisa di cek <a
                                                    href="https://hanz-digital.gitbook.io/admin-web-top-up-game/panduan-admin/kode-validasi-cek-id-game"
                                                    class="text-warning" target="_blank">disini</a></small>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 text-white">Status</label>
                                        <div class="col-md-8">
                                            <select name="status" class="form-control">
                                                <option value="On" <?= $games['status'] == 'On' ? 'selected' : ''; ?>>On
                                                </option>
                                                <option value="Off" <?= $games['status'] == 'Off' ? 'selected' : ''; ?>>
                                                    Off</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h5 class="mb-3">---Custom Sistem Target---</h5>
                                        <p>Hanya aktif untuk Sistem Target "Custom Sistem Target"</p>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Jumlah Kolom</label>
                                            <div class="col-md-8">
                                                <select name="st_col" class="form-control">
                                                    <option value="1" <?= $games['st_col'] == '1' ? 'selected' : '' ?>>1</option>
                                                    <option value="2" <?= $games['st_col'] == '2' ? 'selected' : '' ?>>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Judul Sistem Target</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" autocomplete="off" name="st_title" value="<?= $games['st_title'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Deskripsi Sistem Target</label>
                                            <div class="col-md-8">
                                                <textarea name="st_desc" id="" cols="30" rows="5" class="form-control"><?= $games['st_desc'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Placeholder Input 1 (User ID) </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" autocomplete="off" name="st1_text" value="<?= $games['st1_text'] ?>">
                                            </div>
                                        
                                        </div>
                                        <div class="form-group row">
                                        
                                            <label class="col-form-label col-md-4 text-white">Tipe Data Input 1</label>
                                            <div class="col-md-8">
                                                <select name="st1_type" class="form-control">
                                                    <option value="text" <?= $games['st1_type'] == 'text' ? 'selected': '' ?>>Text</option>
                                                    <option value="number" <?= $games['st1_type'] == 'number' ? 'selected': '' ?>>Number</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Placeholder Input 2 (Server ID) </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" autocomplete="off" name="st2_text" value="<?= $games['st2_text'] ?>">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Tipe Data Input 2</label>
                                            <div class="col-md-8">
                                                <select name="st2_type" class="form-control">
                                                    <option value="text" <?= $games['st2_type'] == 'text' ? 'selected': '' ?>>Text</option>
                                                    <option value="number" <?= $games['st2_type'] == 'number' ? 'selected': '' ?>>Number</option>
                                                    <option value="dropdown" <?= $games['st2_type'] == 'dropdown' ? 'selected': '' ?>>Dropdown List Server</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 text-white">Data List Server (Jika Tipe Data Dropdown List Server)</label>
                                            <div class="col-md-8">
                                                <textarea name="st2_data" id="" cols="30" rows="25" class="form-control"><?= $games['st2_data'] ?></textarea>
                                            <br><p>Masukkan dalam format : value1///name1,value2///name2,value3///name3,value4///name4</p>
    										<p>Contoh : America///America,Asia///Asia,Europe///Europe,TW_HK_MO///TW_HK_MO</p>
                                            <p>Note : Value dan Name terkadang bisa berbeda untuk Games/Provider tertentu, harap check dan ikuti detail penamaan server di Web Provider dengan klik Kanan Inspect pada bagian dropdown list server</p>
                                            <p>Data Server Lapakgaming dapat dicopy sesuai link ini <a href="<?= base_url() ?>/sistem/gameslgdata" class="text-warning" target="_blank">disini</a> </p>
                                            </div>
                                            
                                            
                                        </div>

                                    <a href="<?= base_url(); ?>/admin/games"
                                        class="btn btn-warning float-left">Kembali</a>
                                    <div class="text-right">
                                        <button class="btn text-white" type="reset">Batal</button>
                                        <button class="btn btn-primary" type="submit" name="tombol"
                                            value="submit">Simpan</button>
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