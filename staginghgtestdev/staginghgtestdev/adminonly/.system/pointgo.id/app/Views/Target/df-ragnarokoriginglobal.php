<div class="form-row pt-3">
  <div class="col-md-4 col-4">
    <input type="text" class="form-control" id="id" placeholder="Masukkan Secret Code" name="user_id" required="">
  </div>

  <div class="col-md-4 col-4">

  <select class="form-control" id="more_id" name="zone_id_1" required="">
      <option value="">Pilih Server</option><option value="Prontera-1">Prontera-1</option><option value="Prontera-2">Prontera-2</option><option value="Prontera-3">Prontera-3</option><option value="Prontera-4">Prontera-4</option><option value="Prontera-5">Prontera-5</option><option value="Prontera-6">Prontera-6</option><option value="Prontera-7">Prontera-7</option><option value="Prontera-8">Prontera-8</option><option value="Prontera-9">Prontera-9</option><option value="Prontera-10">Prontera-10</option><option value="Izlude-1">Izlude-1</option><option value="Izlude-2">Izlude-2</option><option value="Izlude-3">Izlude-3</option><option value="Izlude-4">Izlude-4</option><option value="Izlude-5">Izlude-5</option><option value="Izlude-6">Izlude-6</option><option value="Izlude-7">Izlude-7</option><option value="Izlude-8">Izlude-8</option><option value="Izlude-9">Izlude-9</option><option value="Izlude-10">Izlude-10</option><option value="Morroc-1">Morroc-1</option><option value="Morroc-2">Morroc-2</option><option value="Morroc-3">Morroc-3</option><option value="Morroc-4">Morroc-4</option><option value="Morroc-5">Morroc-5</option><option value="Morroc-6">Morroc-6</option><option value="Morroc-7">Morroc-7</option><option value="Morroc-8">Morroc-8</option><option value="Morroc-9">Morroc-9</option><option value="Morroc-10">Morroc-10</option><option value="Geffen-1">Geffen-1</option><option value="Geffen-2">Geffen-2</option><option value="Geffen-3">Geffen-3</option><option value="Geffen-4">Geffen-4</option><option value="Geffen-5">Geffen-5</option><option value="Geffen-6">Geffen-6</option><option value="Geffen-7">Geffen-7</option><option value="Geffen-8">Geffen-8</option><option value="Geffen-9">Geffen-9</option><option value="Geffen-10">Geffen-10</option><option value="Payon-1">Payon-1</option><option value="Payon-2">Payon-2</option><option value="Payon-3">Payon-3</option><option value="Payon-4">Payon-4</option><option value="Payon-5">Payon-5</option><option value="Payon-6">Payon-6</option><option value="Payon-7">Payon-7</option><option value="Payon-8">Payon-8</option><option value="Payon-9">Payon-9</option><option value="Payon-10">Payon-10</option><option value="Poring Island-1">Poring Island-1</option><option value="Poring Island-2">Poring Island-2</option><option value="Poring Island-3">Poring Island-3</option><option value="Poring Island-4">Poring Island-4</option><option value="Poring Island-5">Poring Island-5</option><option value="Poring Island-6">Poring Island-6</option><option value="Poring Island-7">Poring Island-7</option><option value="Poring Island-8">Poring Island-8</option><option value="Poring Island-9">Poring Island-9</option><option value="Poring Island-10">Poring Island-10</option>
  </select>
   </div>

  <div class="col-md-4 col-4">
    <input type="text" class="form-control" id="other_id" placeholder="Nickname" name="zone_id_2" required="">
  </div>
</div>

<input type="hidden" name="zone_id" id="zone_id">


<script type="text/javascript">
  var zoneId1 = document.getElementsByName('zone_id_1')[0];
  var zoneId2 = document.getElementsByName('zone_id_2')[0];
  var userId = document.getElementsByName('user_id')[0];
  var zoneId = document.getElementsByName('zone_id')[0];

  zoneId1.addEventListener('change', function () {
    updateZoneId();
  });

  zoneId2.addEventListener('change', function () {
    updateZoneId();
  });

  userId.addEventListener('input', function () {
    updateZoneId();
  });

  function updateZoneId() {
    var zoneIdValue = '|' + zoneId1.value + '|' + zoneId2.value;

    zoneId.value = zoneIdValue;
  }
</script>