<div class="form-row pt-3">
    <div class="col-md-4 col-4">
        <input type="text" name="user_id" class="form-control" placeholder="Masukkan User ID" autocomplete="off">
    </div>
              <div class="col-md-4 col-4">
            <input type="text" class="form-control" id="other_id" placeholder="Masukkan Username" name="zone_id_1" required="">
          </div>
    <div class="col-md-4 col-4">
        <select placeholder="Pilih Server" name="zone_id_2" class="form-control">
            <option value="">Server</option><option value="S1 Pegasus">S1 Pegasus</option><option value="S2 Draco">S2 Draco</option><option value="S3 Cygnus">S3 Cygnus</option><option value="S4 Andromeda">S4 Andromeda</option><option value="S5 Phoenix">S5 Phoenix</option><option value="S6 Scorpio">S6 Scorpio</option><option value="S7 Cancer">S7 Cancer</option><option value="S8 Taurus">S8 Taurus</option><option value="S9 Gemini">S9 Gemini</option><option value="S10 Leo">S10 Leo</option><option value="S11 Sagittarius">S11 Sagittarius</option><option value="S12 Aries">S12 Aries</option><option value="S13 Pisces">S13 Pisces</option><option value="S14 Capricorn">S14 Capricorn</option><option value="S15 Virgo">S15 Virgo</option><option value="S16 Aquarius">S16 Aquarius</option><option value="S17 Libra">S17 Libra</option><option value="S18 Sagitta">S18 Sagitta</option><option value="S19 Lizard">S19 Lizard</option><option value="S20 Ara">S20 Ara</option><option value="S21 Volans">S21 Volans</option><option value="S22 Wolf">S22 Wolf</option><option value="S23 Hydra">S23 Hydra</option><option value="S24 Bear">S24 Bear</option><option value="S25 Lionet">S25 Lionet</option><option value="S26 UrsaMinor">S26 UrsaMinor</option><option value="S27 Cassiopeia">S27 Cassiopeia</option><option value="S28 Apus">S28 Apus</option><option value="S29 Delphinus">S29 Delphinus</option><option value="S30 Eagle">S30 Eagle</option><option value="S31 Ophiuchus">S31 Ophiuchus</option><option value="S32 Hound">S32 Hound</option><option value="S33 GiantCetus">S33 GiantCetus</option><option value="S34 Crow">S34 Crow</option><option value="S35 Perseus">S35 Perseus</option><option value="S36 Auriga">S36 Auriga</option><option value="S37 Cepheus">S37 Cepheus</option><option value="S38 Crane">S38 Crane</option><option value="S39 Pavo">S39 Pavo</option><option value="S40 Unicorn">S40 Unicorn</option><option value="S41 Sextans">S41 Sextans</option><option value="S42 Centaurus">S42 Centaurus</option><option value="S43 Cerberus">S43 Cerberus</option><option value="S44 SeaFish">S44 SeaFish</option><option value="S45 Scepter">S45 Scepter</option><option value="S46 Cetus">S46 Cetus</option><option value="S47 Scutum">S47 Scutum</option><option value="S48 Horologium">S48 Horologium</option><option value="S49 Serpens">S49 Serpens</option><option value="S50 Orion">S50 Orion</option><option value="S51 Crux">S51 Crux</option><option value="S52 Grus">S52 Grus</option><option value="S53 Lynx">S53 Lynx</option><option value="S54 Lyra">S54 Lyra</option><option value="S55 Vela">S55 Vela</option><option value="S56 Indus">S56 Indus</option><option value="S57 Lepus">S57 Lepus</option><option value="S58 Mensa">S58 Mensa</option><option value="S59 Norma">S59 Norma</option><option value="S60 Pyxis">S60 Pyxis</option>
                                      </select>
                                    </select>
    </div>
</div>        

<script>
    // Add event listener to the form submit button
    document.querySelector("form").addEventListener("submit", function(event) {
        // Get the values of zone_id_1 and zone_id_2
        var zone_id_1 = document.querySelector('input[name="zone_id_1"]').value;
        var zone_id_2 = document.querySelector('select[name="zone_id_2"]').value;

        // Concatenate the values and set the value of the hidden input field
        document.querySelector('input[name="zone_id"]').value = zone_id_1 + " | " + zone_id_2;
    });
</script>