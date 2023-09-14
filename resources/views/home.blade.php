@extends('layouts.admin')
@section('content')
<!-- Add Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<!-- Add Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<div class="content">
    <div class="card">
        <div class="card-header">
            Dashboard
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        Map <!-- Ganti dengan teks yang Anda inginkan -->
                    </div>
                    <div class="card-body">
                        <div id="mapid"></div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" type="button" id="get-current-location">Ambil Lokasi Saat Ini</button>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header">
                        Keterangan Simbol
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/hotel.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Hotel dan Akomodasi Lainnya</p>
                                </td>
                            </tr>
                            <tr class="category" id="categoryRow">
            <td class="col-lg-2">
                <img src="/images/dtw.png" id="categoryImage">
            </td>
            <td class="col-lg-10">
                <p>Daya Tarik Wisata</p>
            </td>
        </tr>
        <tr class="subcategory">
            <td class="col-lg-2">
                <img src="/images/1.png"> <!-- Use an appropriate image for subcategories -->
            </td>
            <td class="col-lg-10">
                <p>Daya Tarik Wisata Alam</p>
            </td>
        </tr>
        <tr class="subcategory">
            <td class="col-lg-2">
                <img src="/images/2.png">
            </td>
            <td class="col-lg-10">
                <p>Daya Tarik Wisata Buatan/Binaan Manusia</p>
            </td>
        </tr>
        <tr class="subcategory">
            <td class="col-lg-2">
                <img src="/images/3.png">
            </td>
            <td class="col-lg-10">
                <p>Daya Tarik Wisata Pemandian Alam</p>
            </td>
        </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/restoran.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Restoran</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/kafe.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Kafe</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/usaha makanan.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Usaha makanan</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/usaha minuman.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Usaha Minuman</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/bar.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Bar, Klub Malam, dan Karaoke</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/rumah pijat.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Spa dan Rumah Pijat</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/jasa pariwisata.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Jasa Pariwisata</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/perkemahan.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Perkemahan dan Pondok Wisata</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/rekreasi.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Taman Rekreasi dan Hiburan</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/kamera.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Aktivitas Desain dan Fotografi</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/seni.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Seni Pertunjukan</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-2">
                                    <img src="/images/olahraga.png">
                                </td>
                                <td class="col-lg-10">
                                    <p>Fasilitas Olahraga</p>
                                </td>
                            </tr>
                            <!-- Tambahkan entri lainnya sesuai kebutuhan -->
                        </table>
                    </div>
                </div>
            </div>           
        </div>
        <div class="card mt-4">
            <div class="card-header">
                DATA SEKARANG
            </div>
        </div>
    
    <section class="statis mt-4 text-center">
                <div class="slider-container">
                    <div class="slider">
                        <div class="card-item" id="card1">
                            <i class="uil-eye"></i>
                            <h3>{{ $categoryTotals['hotelTotal'] }}</h3>
                            <p class="lead">Hotel dan Akomodasi Lainnya</p>
                            <!-- Anda dapat menambahkan elemen lain sesuai kebutuhan, seperti gambar atau teks tambahan -->
                        </div>
                        <div class="card-item" id="card2">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['dtwTotal'] }}</h3>
                            <p class="lead">Daya Tarik Wisata</p>
                            <!-- Anda juga dapat menambahkan elemen lain sesuai kebutuhan -->
                        </div>
                        <div class="card-item" id="card3">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['restoTotal'] }}</h3>
                            <p class="lead">Restoran</p>
                            <!-- Dan seterusnya, sesuaikan dengan data Anda -->
                        </div>
                        <div class="card-item" id="card4">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['kafeTotal'] }}</h3>
                            <p class="lead">Kafe</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card5">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['makananTotal'] }}</h3>
                            <p class="lead">Usaha Makanan</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card6">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['minumanTotal'] }}</h3>
                            <p class="lead">Usaha Minuman</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card7">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['barTotal'] }}</h3>
                            <p class="lead">Bar, Klub Malam, dan Karaoke</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card8">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['spaTotal'] }}</h3>
                            <p class="lead">Spa dan Rumah Pijat</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card9">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['jasaTotal'] }}</h3>
                            <p class="lead">Jasa Pariwisata</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card10">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['perkemahanTotal'] }}</h3>
                            <p class="lead">Perkemahan dan Pondok Wisata</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card11">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['tamanTotal'] }}</h3>
                            <p class="lead">Taman Rekreasi dan Hiburan</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card12">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['fotografiTotal'] }}</h3>
                            <p class="lead">Aktvitas Desain dan Fotografi</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card13">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['seniTotal'] }}</h3>
                            <p class="lead">Seni Pertunjukan</p>
                            <!-- Card items go here -->
                        </div>
                        <div class="card-item" id="card14">
                            <i class="uil-user"></i>
                            <h3>{{ $categoryTotals['olahragaTotal'] }}</h3>
                            <p class="lead">Fasilitas Olahraga</p>
                            <!-- Card items go here -->
                        </div>
                    </div>
                </div>
                {{-- <button id="scroll-left">←</button>
                <button id="scroll-right">→</button> --}}
            </section>
    </div>
</div>


<style>
/* Gaya umum */
    body {
        font-family: Verdana, sans-serif;
        background-color: #f7f7f7; /* Warna latar belakang halaman */
        padding: 20px;
    }

    /* Gaya untuk header kartu */
    .card-header {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        background-color: #1067aa; /* Warna latar belakang header */
        color: #fff; /* Warna teks header */
    }

    /* Gaya untuk map */
#mapid {
    height: 90em; /* Sesuaikan dengan ukuran yang Anda inginkan, dalam contoh ini tingginya setara dengan 105% dari tinggi viewport (vh) */
}

    /* Gaya untuk tabel */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan tabel */
        background-color: #fff; /* Warna latar belakang tabel */
    }

    .table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    /* Gaya untuk gambar dalam kolom */
    .table td img {
        max-width: 100%;
        height: auto;
        display: block; /* Membuat gambar berada di tengah kolom */
        margin: 0 auto; /* Pusatkan gambar horizontal */
    }

    /* Gaya animasi saat gambar diklik */
    .table td img:hover {
        transform: scale(1.1); /* Mengubah ukuran gambar saat diklik */
        transition: transform 0.3s ease; /* Efek transisi untuk animasi */
    }

    /* Gaya untuk teks dalam kolom */
    .table td p {
        font-weight: bold;
        color: #333; /* Warna teks dalam kolom */
        font-size: 16px;
        text-align: center;
        margin-top: 10px;
    }

    /* Responsif pada tablet */
    @media (max-width: 768px) {
        @media (max-width: 768px) {
            .card-item {
                flex: 0 0 calc(50% - 20px);
            }
}

        .card-header {
            font-size: 20px;
        }

        .table td {
            padding: 10px;
        }

        .table td img {
            width: 70px;
            height: 70px;
        }

        .table td p {
            font-size: 14px;
            margin-top: 5px;
        }
    }

    /* Responsif pada ponsel */
    @media (max-width: 480px) {
        .card-header {
            font-size: 18px;
        }

        .table td {
            padding: 10px;
        }

        .table td img {
            width: 50px;
            height: 50px;
        }

        .table td p {
            font-size: 12px;
            margin-top: 5px;
        }
    }

    .statis {
            overflow-x: hidden;
        }

        .slider-container {
            overflow-x: hidden;
            white-space: nowrap;
        }

        .slider {
            display: flex;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            animation: scrollRight 20s linear infinite;
            /* Atur animasi */
        }

        .card-item:nth-child(odd) {
            background: linear-gradient(30deg, #fc9d9d, #B8C1EC);
        }

        .card-item:nth-child(even) {
            background: linear-gradient(25deg, #4db1d2, #ECC1B8);
        }

        .card-item {
            flex: 0 0 calc(20% - 20px);
            margin-right: 20px;
            scroll-snap-align: start;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
        }

        .card-item:last-child {
            margin-right: 0;
        }

        h3,
        p {
            color: white;
        }

        /* Keyframes untuk scrolling ke kanan */
        @keyframes scrollRight {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-230%);
                /* Geser ke kiri sejauh 100% */
            }
        }

        /* Add this to your CSS */
        .stop-animation {
            animation-play-state: paused !important;
        }

</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
        const slider = document.querySelector('.slider');
        //  
        let isAnimationStopped = false;

        // Fungsi untuk menghentikan animasi saat card diklik
        function stopAnimation() {
            if (!isAnimationStopped) {
                slider.classList.add('stop-animation');
                isAnimationStopped = true;
            } else {
                slider.classList.remove('stop-animation');
                isAnimationStopped = false;
            }
        }

        // Tambahkan event listener pada setiap card item
        const card1 = document.getElementById('card1');
        const card2 = document.getElementById('card2');
        const card3 = document.getElementById('card3');
        const card4 = document.getElementById('card4');
        const card5 = document.getElementById('card5');
        const card6 = document.getElementById('card6');
        const card7 = document.getElementById('card7');
        const card8 = document.getElementById('card8');
        const card9 = document.getElementById('card9');
        const card10 = document.getElementById('card10');
        const card11 = document.getElementById('card11');
        const card12 = document.getElementById('card12');
        const card13 = document.getElementById('card13');
        const card14 = document.getElementById('card14');

        card1.addEventListener('click', stopAnimation);
        card2.addEventListener('click', stopAnimation);
        card3.addEventListener('click', stopAnimation);
        card4.addEventListener('click', stopAnimation);
        card5.addEventListener('click', stopAnimation);
        card6.addEventListener('click', stopAnimation);
        card7.addEventListener('click', stopAnimation);
        card8.addEventListener('click', stopAnimation);
        card9.addEventListener('click', stopAnimation);
        card10.addEventListener('click', stopAnimation);
        card11.addEventListener('click', stopAnimation);
        card12.addEventListener('click', stopAnimation);
        card13.addEventListener('click', stopAnimation);
        card14.addEventListener('click', stopAnimation);

        // Fungsi untuk memulai kembali animasi saat klik dilepaskan
        function startAnimation() {
            setTimeout(() => {
                isPaused = false;
            }, 2000);
        }

        // Tambahkan event listener "mouseup" pada card item
        card1.addEventListener('mouseup', startAnimation);
        card2.addEventListener('mouseup', startAnimation);
        card3.addEventListener('mouseup', startAnimation);
        card4.addEventListener('mouseup', startAnimation);
        card5.addEventListener('mouseup', startAnimation);
        card6.addEventListener('mouseup', startAnimation);
        card7.addEventListener('mouseup', startAnimation);
        card8.addEventListener('mouseup', startAnimation);
        card9.addEventListener('mouseup', startAnimation);
        card10.addEventListener('mouseup', startAnimation);
        card11.addEventListener('mouseup', startAnimation);
        card12.addEventListener('mouseup', startAnimation);
        card13.addEventListener('mouseup', startAnimation);
        card14.addEventListener('mouseup', startAnimation);

        // Dan seterusnya untuk setiap card yang Anda miliki
    </script>
  
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
"Fasilitas Olahraga": L.icon({ iconUrl: '/images/olahraga.png', iconSize: [50, 70] }),
"Daya Tarik Wisata Alam": L.icon({ iconUrl: '/images/1.png', iconSize: [50, 70] }),
"Daya Tarik Wisata Buatan/Binaan Manusia": L.icon({ iconUrl: '/images/2.png', iconSize: [50, 70] }),
"Daya Tarik Wisata Pemandian Alam": L.icon({ iconUrl: '/images/3.png', iconSize: [50, 70] }),
};

    // Tambahkan dataprofil listener untuk tombol Ambil Lokasi Saat Ini
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
    @foreach($dataprofils as $dataprofil)
    var iconCategory = "{{ $dataprofil->daftar_usaha_pariwisata }}";
var iconSubCategory = "{{ $dataprofil->daftar_sub_jenis_usaha }}";
var icon;

switch (iconCategory) {
    case "Daya Tarik Wisata":
        switch (iconSubCategory) {
            case "Daya Tarik Wisata Alam":
                icon = iconOptions["Daya Tarik Wisata Alam"];
                break;
            case "Daya Tarik Wisata Buatan/Binaan Manusia":
                icon = iconOptions["Daya Tarik Wisata Buatan/Binaan Manusia"];
                break;
            case "Daya Tarik Wisata Pemandian Alam":
                icon = iconOptions["Daya Tarik Wisata Pemandian Alam"];
                break;
            default:
                // Default icon for other sub-categories under "Daya Tarik Wisata"
                icon = iconOptions["Daya Tarik Wisata"];
        }
        break;
    case "Hotel dan Akomodasi Lainnya":
        icon = iconOptions["Hotel dan Akomodasi Lainnya"];
        break;
    case "Restoran":
        icon = iconOptions["Restoran"];
        break;
    case "Kafe":
        icon = iconOptions["Kafe"];
        break;
    case "Usaha Makanan":
        icon = iconOptions["Usaha Makanan"];
        break;
    case "Usaha Minuman":
        icon = iconOptions["Usaha Minuman"];
        break;
    case "Bar, Klub Malam, dan Karaoke":
        icon = iconOptions["Bar, Klub Malam, dan Karaoke"];
        break;
    case "SPA dan Rumah Pijat":
        icon = iconOptions["SPA dan Rumah Pijat"];
        break;
    case "Jasa Pariwisata":
        icon = iconOptions["Jasa Pariwisata"];
        break;
    case "Perkemahan dan Pondok Wisata":
        icon = iconOptions["Perkemahan dan Pondok Wisata"];
        break;
    case "Taman Rekreasi dan Hiburan":
        icon = iconOptions["Taman Rekreasi dan Hiburan"];
        break;
    case "Aktivitas Desain dan Fotografi":
        icon = iconOptions["Aktivitas Desain dan Fotografi"];
        break;
    case "Seni Pertunjukan":
        icon = iconOptions["Seni Pertunjukan"];
        break;
    case "Fasilitas Olahraga":
        icon = iconOptions["Fasilitas Olahraga"];
        break;
    default:
        // Default icon for other categories
        icon = customIcon;
}

var marker = L.marker([{{ $dataprofil->latitude }}, {{ $dataprofil->longitude }}], {
    icon: icon
}).addTo(mymap);

  // Create an empty div to hold the photos
  var photoDiv = document.createElement('div');

  @foreach($dataprofil->getMedia('dataprofil_photo') as $media)
  // Add each photo to the photoDiv
  photoDiv.innerHTML += '<img src="{{ $media->getUrl() }}" style="max-width: 100px; max-height: 100px; margin-right: 5px;" />';
  @endforeach

  var popupContent = "<b>Kategori : {{ $dataprofil->daftar_usaha_pariwisata }} <br> Sub-Kategori : {{ $dataprofil->daftar_sub_jenis_usaha }} <br> Nama : {{ $dataprofil->name }} <br> Alamat : {{ $dataprofil->alamat }} <br> Kecamatan : {{ $dataprofil->kecamatan }} <br> Kelurahan / Desan : {{ $dataprofil->kelurahan }} <br> Jam Buka : {{ $dataprofil->start_time }} <br> Jam Tutup : {{ $dataprofil->end_time }} <br> Lat: {{ $dataprofil->latitude }}, Lng: {{ $dataprofil->longitude }}</b>";

  // Add the photoDiv to the popup content
  popupContent += photoDiv.outerHTML;

  marker.bindPopup(popupContent);

  // Create a circle around the marker
  var circle = L.circle([{{ $dataprofil->latitude }}, {{ $dataprofil->longitude }}], {
    color: 'blue', // Warna garis lingkaran
    fillColor: 'blue', // Warna isian lingkaran
    fillOpacity: 0.3, // Opasitas isian lingkaran
    radius: 100 // Radius lingkaran dalam meter
  }).addTo(mymap);

  // Tambahkan kelas bounce-animation pada lingkaran ketika marker di-klik
  marker.on('click', function () {
    circle.classList.add('bounce-animation');
  });
  @endforeach
</script>
</script>
<script>
    // Get the category row and subcategories
    const categoryRow = document.getElementById("categoryRow");
    const subcategories = document.querySelectorAll(".subcategory");

    // Get the category image and arrow image
    const categoryImage = document.getElementById("categoryImage");
    const arrowImage = document.createElement("img");
    arrowImage.src = "/images/panah.png"; // Ganti dengan gambar panah yang sesuai
    arrowImage.style.marginLeft = "1px"; // Sesuaikan gaya sesuai kebutuhan

    // Create a variable to track the state (open/closed)
    let isSubcategoriesOpen = false;

    // Add a click event listener to the category row
    categoryRow.addEventListener("click", function() {
        // Toggle the visibility of subcategories
        subcategories.forEach(subcategory => {
            subcategory.style.display = isSubcategoriesOpen ? "none" : "table-row";
        });

        // Toggle the arrow image
        if (isSubcategoriesOpen) {
            arrowImage.style.transform = "rotate(0deg)";
        } else {
            arrowImage.style.transform = "rotate(90deg)";
        }

        isSubcategoriesOpen = !isSubcategoriesOpen;
    });

    // Append the arrow image to the category cell
    categoryImage.parentNode.appendChild(arrowImage);
</script>


@endsection
@section('scripts')
@parent

@endsection
