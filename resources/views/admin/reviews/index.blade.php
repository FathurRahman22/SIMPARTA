@extends('layouts.admin')
@section('content')
<!-- Add Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<!-- Add Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<div class="container">
    <div id="mapid" style="height: 60vh"></div>
    <button class="btn btn-primary" type="button" id="get-current-location">Ambil Lokasi Saat Ini</button> <br>
</div>

<script>
    var mymap = L.map('mapid').setView([-7.870039, 112.524013], 15);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            tileSize: 512,
            zoomOffset: -1,
        }).addTo(mymap);

    var customIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [0, -30]
    });

    var iconOptions = {
    "Hotel dan Akomodasi Lainnya": L.icon({ iconUrl: '/images/hotel.png', iconSize: [50, 70] }),
    "Daya Tarik Wisata": L.icon({ iconUrl: '/images/dtw.png', iconSize: [50, 70] }),
    "Restoran": L.icon({ iconUrl: '/images/restoran.png', iconSize: [50, 70] }),
    "Kafe": L.icon({ iconUrl: '/images/kafe.png', iconSize: [50, 70] }),
    "Usaha Makanan": L.icon({ iconUrl: '/images/usaha makanan.png', iconSize: [50, 70] }),
    "Usaha Minuman": L.icon({ iconUrl: '/images/usaha minuman.png', iconSize: [50, 70] }),
    "Bar, Klub Malam, dan Karaoke": L.icon({ iconUrl: '/images/bar.png', iconSize: [50, 70] }),
    "SPA dan Rumah Pijat": L.icon({ iconUrl: '/images/rumah pijat.png', iconSize: [50, 70] }),
    "Jasa Pariwisata": L.icon({ iconUrl: '/images/jasa pariwisata.png', iconSize: [50, 70] }),
    "Perkemahan dan Pondok Wisata": L.icon({ iconUrl: '/images/perkemahan.png', iconSize: [50, 70] }),
    "Taman Rekreasi dan Hiburan": L.icon({ iconUrl: '/images/rekreasi.png', iconSize: [50, 70] }),
    "Aktivitas Desain dan Fotografi": L.icon({ iconUrl: '/images/kamera.png', iconSize: [50, 70] }),
    "Seni Pertunjukan": L.icon({ iconUrl: '/images/seni.png', iconSize: [50, 70] }),
    "Fasilitas Olahraga": L.icon({ iconUrl: '/images/olahraga.png', iconSize: [50, 70] })
};

@foreach($events as $event)
var marker = L.marker([{{ $event->latitude }}, {{ $event->longitude }}], {
    icon: iconOptions["{{ $event->daftar_usaha_pariwisata }}"]
}).addTo(mymap);

marker.bindPopup("<b>Kategori : {{ $event->daftar_usaha_pariwisata }} <br> Sub-Kategori : {{ $event->daftar_sub_jenis_usaha }} <br> Nama : {{ $event->name }} <br> Alamat : {{ $event->alamat }} <br> Kecamatan : {{ $event->kecamatan }} <br> Kelurahan / Desan : {{ $event->kelurahan }} <br> Jam Buka : {{ $event->start_time }} <br> Jam Tutup : {{ $event->end_time }} <br> Lat: {{ $event->latitude }}, Lng: {{ $event->longitude }}</b>");
@endforeach


    // Tambahkan event listener untuk tombol Ambil Lokasi Saat Ini
    document.getElementById('get-current-location').addEventListener('click', function () {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                mymap.setView([latitude, longitude], 15);
            });
        } else {
            alert("Geolocation tidak didukung di peramban Anda.");
        }
    });
</script>
@endsection
@section('scripts')
@parent

@endsection
