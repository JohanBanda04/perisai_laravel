<style>
    #map { height: 250px; }
</style>
<div id="map"></div>
<script>
    var lokasi = "{{ $presensi->lokasi_in }}";
    var lok = lokasi.split(',');
    var latitude = lok[0];
    var longitude = lok[1];
    //alert(latitude);
    var map = L.map('map').setView([latitude,longitude], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker([latitude,longitude]).addTo(map);
    //ruang PH
    var circle = L.circle([-8.5924703 , 116.0972109], {
        //RUANG HAM
        //var circle = L.circle([-8.5919439 , 116.097714], {
        // RUANG OPERATOR
        // var circle = L.circle([-8.5924694 , 116.0974354], {
        /*RUMAH SAYANG2*/
        //var circle = L.circle([-8.5652286 , 116.1421924], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 30 /*2 meters*/
    }).addTo(map);

    var popup = L.popup()
        .setLatLng([latitude, longitude])
        .setContent("{{ $presensi->nama_lengkap }}")
        .openOn(map);
</script>