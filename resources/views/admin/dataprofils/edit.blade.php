@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.dataprofil.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.dataprofils.update', [$dataprofil->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-group">
                      <label class="" for="daftar_usaha_pariwisata">{{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata') }}</label>
                      <select class="form-control" name="daftar_usaha_pariwisata" id="daftar_usaha_pariwisata">
                         <option value="Hotel dan Akomodasi Lainnya" {{ $dataprofil->daftar_usaha_pariwisata == 'Hotel dan Akomodasi Lainnya' ? 'selected' : '' }}>Hotel dan Akomodasi Lainnya</option>                    
                         <option value="Daya Tarik Wisata" {{ $dataprofil->daftar_usaha_pariwisata == 'Daya Tarik Wisata' ? 'selected' : '' }}>Daya Tarik Wisata </option>
                         <option value="Restoran" {{ $dataprofil->daftar_usaha_pariwisata == 'Restoran' ? 'selected' : '' }}>Restoran</option>
                         <option value="Kafe" {{ $dataprofil->daftar_usaha_pariwisata == 'Kafe' ? 'selected' : '' }}>Kafe</option>
                         <option value="Usaha Makanan" {{ $dataprofil->daftar_usaha_pariwisata == 'Usaha Makanan' ? 'selected' : '' }}>Usaha Makanan</option>
                         <option value="Usaha Minuman" {{ $dataprofil->daftar_usaha_pariwisata == 'Usaha Minuman' ? 'selected' : '' }}>Usaha Minuman</option>
                         <option value="Bar, Klub Malam, dan Karaoke" {{ $dataprofil->daftar_usaha_pariwisata == 'Bar, Klub Malam, dan Karaoke' ? 'selected' : '' }}>Bar, Klub Malam, dan Karaoke</option>
                         <option value="SPA dan Rumah Pijat" {{ $dataprofil->daftar_usaha_pariwisata == 'SPA dan Rumah Pijat' ? 'selected' : '' }}>SPA dan Rumah Pijat</option>
                         <option value="Jasa Pariwisata" {{ $dataprofil->daftar_usaha_pariwisata == 'Jasa Pariwisata' ? 'selected' : '' }}>Jasa Pariwisata</option>
                         <option value="Perkemahan dan Pondok Wisata" {{ $dataprofil->daftar_usaha_pariwisata == 'Perkemahan dan Pondok Wisata' ? 'selected' : '' }}>Perkemahan dan Pondok Wisata</option>
                         <option value="Taman Rekreasi dan Hiburan" {{ $dataprofil->daftar_usaha_pariwisata == 'Taman Rekreasi dan Hiburan' ? 'selected' : '' }}>Taman Rekreasi dan Hiburan</option>
                         <option value="Aktivitas Desain dan Fotografi" {{ $dataprofil->daftar_usaha_pariwisata == 'Aktivitas Desain dan Fotografi' ? 'selected' : '' }}>Aktivitas Desain dan Fotografi</option>
                         <option value="Seni Pertunjukan" {{ $dataprofil->daftar_usaha_pariwisata == 'Seni Pertunjukan' ? 'selected' : '' }}>Seni Pertunjukan</option>
                         <option value="Fasilitas Olahraga" {{ $dataprofil->daftar_usaha_pariwisata == 'Fasilitas Olahraga' ? 'selected' : '' }}>Fasilitas Olahraga</option>
                      </select>
                      @if ($errors->has('daftar_usaha_pariwisata'))
                        <div class="invalid-feedback">
                            {{ $errors->first('daftar_usaha_pariwisata') }}
                        </div>
                      @endif
                     <span class="help-block">{{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="" for="daftar_sub_jenis_usaha">{{ trans('cruds.dataprofil.fields.daftar_sub_jenis_usaha') }}</label>
                    <select class="form-control" name="daftar_sub_jenis_usaha" id="daftar_sub_jenis_usaha">
                        <!-- Opsi daftar_sub_jenis_usaha diisi menggunakan JavaScript -->
                    </select>
                    @if ($errors->has('daftar_sub_jenis_usaha'))
                        <div class="invalid-feedback">
                            {{ $errors->first('daftar_sub_jenis_usaha') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.daftar_sub_jenis_usaha_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.dataprofil.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', $dataprofil->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.name_helper') }}</span>

                    </div>
                <div class="form-group">
                    <label class="" for="kecamatan">{{ trans('cruds.dataprofil.fields.kecamatan') }}</label>
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <option value="Batu" {{ $dataprofil->kecamatan == 'Batu' ? 'selected' : '' }}>Batu</option>                  
                        <option value="Bumiaji" {{ $dataprofil->kecamatan == 'Bumiaji' ? 'selected' : '' }}>Bumiaji</option>
                        <option value="Junrejo" {{ $dataprofil->kecamatan == 'Junrejo' ? 'selected' : '' }}>Junrejo</option>
                    </select>
                    @if ($errors->has('kecamatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kecamatan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.kecamatan_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="" for="kelurahan">{{ trans('cruds.dataprofil.fields.kelurahan') }}</label>
                    <select class="form-control" name="kelurahan" id="kelurahan">
                        <!-- Opsi kelurahan diisi menggunakan JavaScript -->
                    </select>
                    @if ($errors->has('kelurahan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kelurahan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.kelurahan_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="start_time">{{ trans('cruds.dataprofil.fields.start_time') }}</label>
                    <input class="form-control time {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="time"
                        name="start_time" id="start_time" value="{{ old('start_time', $dataprofil->start_time) }}" required>
                    @if ($errors->has('start_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.start_time_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="end_time">{{ trans('cruds.dataprofil.fields.end_time') }}</label>
                    <input class="form-control time {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="time"
                        name="end_time" id="end_time" value="{{ old('end_time', $dataprofil->end_time) }}" required>
                    @if ($errors->has('end_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.end_time_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="dataprofil_photo">{{ trans('cruds.dataprofil.fields.dataprofil_photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('dataprofil_photo') ? 'is-invalid' : '' }}"
                        id="dataprofil_photo-dropzone">
                    </div>
                    @if ($errors->has('dataprofil_photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dataprofil_photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.dataprofil_photo_helper') }}</span>
                </div>
                
                <div class="form-group">
                    <label class="required" for="latitude">{{ trans('cruds.dataprofil.fields.latitude') }}</label>
                    <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text"
                        name="latitude" id="latitude" value="{{ old('latitude', $dataprofil->latitude) }}" require>
                    @if ($errors->has('latitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('latitude') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.latitude_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="longitude">{{ trans('cruds.dataprofil.fields.longitude') }}</label>
                    <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text"
                        name="longitude" id="longitude" value="{{ old('longitude', $dataprofil->longitude) }}" require>
                    @if ($errors->has('longitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('longitude') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.latitude_helper') }}</span>
                </div>
                
                <div class="form-group">
                    <label class="required" for="alamat">{{ trans('cruds.dataprofil.fields.alamat') }}</label>
                    <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text"
                        name="alamat" id="alamat" value="{{ old('alamat', $dataprofil->alamat) }}" require>
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.alamat_helper') }}</span>
                </div>
                <div id="mapid" style="height: 60vh"></div><br>
                <button class="btn btn-primary" type="button" id="get-current-location">Ambil Lokasi Saat Ini</button> <br>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var uploadeddataprofilPhotoMap = {}
    Dropzone.options.dataprofilPhotoDropzone = {
    url: '{{ route('admin.dataprofils.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="dataprofil_photo[]" value="' + response.name + '">')
      uploadeddataprofilPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadeddataprofilPhotoMap[file.name]
      }
      $('form').find('input[name="dataprofil_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($dataprofil) && $dataprofil->dataprofil_photo)
      var files = {!! json_encode($dataprofil->dataprofil_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="dataprofil_photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        // Ambil elemen select untuk kecamatan dan kelurahan
        var kecamatanSelect = document.getElementById('kecamatan');
        var kelurahanSelect = document.getElementById('kelurahan');

        // Daftar kelurahan berdasarkan kecamatan
        var kelurahanByKecamatan = {
            "Batu": ['Oro-oro Ombo', 'Pesanggrahan', 'Sidomulyo', 'Sumberejo', 'Ngaglik', 'Sisir', 'Songgokerto',
                'Temas'],
            "Bumiaji": ['Bumiaji', 'Bulukerto', 'Giripurno', 'Gunungsari', 'Punten', 'Sumbergondo', 'Tulungrejo',
                'Sumber Brantas'
            ],
            "Junrejo": ['Beji', 'Dadaprejo', 'Junrejo', 'Mojorejo', 'Pendem', 'Tlekung', 'Torongrejo'],
        };

        // Fungsi untuk mengisi opsi kelurahan berdasarkan kecamatan yang dipilih
        function populateKelurahan() {
            var selectedKecamatan = kecamatanSelect.value;
            var kelurahanOptions = kelurahanByKecamatan[selectedKecamatan] || [];

            // Kosongkan opsi kelurahan sebelum mengisi yang baru
            kelurahanSelect.innerHTML = '';
            
            // Buat opsi kelurahan baru berdasarkan daftar kelurahan
            kelurahanOptions.forEach(function(kelurahan) {
                var option = document.createElement('option');
                option.value = kelurahan;
                option.text = kelurahan;
                kelurahanSelect.appendChild(option);
            });
        }

        // Panggil fungsi populateKelurahan saat halaman dimuat dan ketika pilihan kecamatan berubah
        populateKelurahan();
        kecamatanSelect.addEventListener('change', populateKelurahan);
    </script>

<script>
    var mymap = L.map('mapid').setView([{{ $dataprofil->latitude }}, {{ $dataprofil->longitude }}], 15);

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

    var marker;

    // Fungsi untuk mengupdate marker dan nilai latitude/longitude saat klik di peta
    function onMapClick(e) {
        // Hapus marker sebelumnya jika ada
        if (marker) {
            mymap.removeLayer(marker);
        }

        // Tambahkan marker baru dengan koordinat yang dipilih
        marker = L.marker(e.latlng, { icon: customIcon }).addTo(mymap);

        // Perbarui input latitude dan longitude
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}&zoom=18&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            const address = data.display_name;
            document.getElementById('alamat').value = address;
        })
        .catch(error => {
            console.error('Error geocoding:', error);
        });
    }

    // Panggil onMapClick saat halaman dimuat untuk menampilkan marker awal
    onMapClick({ latlng: L.latLng({{ $dataprofil->latitude }}, {{ $dataprofil->longitude }}) });

    // Fungsi untuk mengambil lokasi saat ini dan memperbarui input latitude dan longitude
    document.getElementById('get-current-location').addEventListener('click', function () {
        getLocation();
    });

    // Fungsi untuk mendapatkan lokasi GPS saat ini
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var currentLatLng = L.latLng(position.coords.latitude, position.coords.longitude);
                mymap.setView(currentLatLng, 15); // Atur tampilan peta ke lokasi GPS saat ini
                onMapClick({ latlng: currentLatLng }); // Panggil fungsi onMapClick dengan lokasi GPS saat ini
            });
        } else {
            alert("Geolocation tidak didukung oleh peramban ini.");
        }
    }

    // Fungsi untuk mengubah posisi peta saat mengklik
    mymap.on('click', onMapClick);

    // Fungsi untuk mengubah peta berdasarkan alamat yang dimasukkan
    document.getElementById('alamat').addEventListener('change', function () {
        var alamat = this.value;
        if (alamat) {
            // Gunakan Nominatim API untuk mengambil koordinat dari alamat
            var nominatimUrl = 'https://nominatim.openstreetmap.org/search?format=json&q=' + alamat;

            fetch(nominatimUrl)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    if (data.length > 0) {
                        var latlng = L.latLng(parseFloat(data[0].lat), parseFloat(data[0].lon));
                        mymap.setView(latlng, 15); // Atur tampilan peta ke koordinat alamat
                        onMapClick({ latlng: latlng }); // Panggil fungsi onMapClick dengan koordinat alamat
                    } else {
                        alert('Alamat tidak ditemukan.');
                    }
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        }
    });
</script>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
    // Ambil elemen select untuk Daftar Usaha Pariwisata dan Daftar Sub Jenis Usaha
    var daftarUsahaPariwisataSelect = document.getElementById('daftar_usaha_pariwisata');
    var daftarSubJenisUsahaSelect = document.getElementById('daftar_sub_jenis_usaha');

    // Daftar sub jenis usaha berdasarkan daftar usaha pariwisata
    var subJenisUsahaByDaftarUsahaPariwisata = {
        "Hotel dan Akomodasi Lainnya": ['Hotel Bintang', 'Hotel Melati', 'Villa', 'Penginapan Remaja', 'Apartemen Hotel'],
// Opsi-opsi lainnya
        "Daya Tarik Wisata": ['Daya Tarik Wisata Alam', 'Daya Tarik Wisata Buatan/Binaan Manusia', 'Daya Tarik Wisata Pemandian Alam'
        ],
        "Restoran": ['Restoran'
        ],
        "Kafe": ['Kafe'
        ],
        "Usaha Makanan": ['Data Rumah/Warung Makan', 'Kedai Makan', 'Penyedia Makanan keliling/ Tempat Tidak Tetap', 'Restoran dan Penyedia Makanan Keliling Lainnya'
        ],
        "Usaha Minuman": ['Kedai Minuman', 'Penyedia Minuman Keliling/ Tempat Tidak Tetap'
        ],
        "Bar, Klub Malam, dan Karaoke": ['Bar', 'Klub Malam', 'Karaoke'
        ],
        "SPA dan Rumah Pijat": ['Aktivitas SPA', 'Rumah Pijat'
        ],
        "Jasa Pariwisata": ['Jasa Penyelenggara Pertemuan Perjalanan Insentif, Konferensi dan Pameran (MICE)', 'Jasa Penyelenggara dataprofil Khusus (Special dataprofil)', 'Jasa Boga Untuk Suatu dataprofil Tertentu (dataprofil Catering',
        'Jasa Pramuwisata', 'Jasa Informasi Daya Tarik Wisata (DTW)', 'Jasa Informasi Pariwisata', 'Jasa Interpreter Wisata', 'Jasa Reservasi Lainnya YBDI YTDL', 'Aktivitas Konsultasi Pariwisata', 
        'Penyedia Akomodasi Janhgka Pendek Lainnya', 'Penyedia Akomodasi Lainnya', 'Agen Perjalanan Wisata', 'Biro Perjalanan Wisata', 'Data Angkutan Darat Wisata'
        ],
        "Perkemahan dan Pondok Wisata": ['Bumi Perkemahan, Persinggahan Karavan, dan Taman Karavan', 'Pondok Wisata'
        ],
        "Taman Rekreasi dan Hiburan": ['Taman Rekreasi', 'Aktivitas Taman Bertema atau Taman Hiburan Lainnya', 'Usaha Area Permainan'
        ],
        "Aktivitas Desain dan Fotografi": ['Aktivitas Desain Kominikasi Visual/ Grafis', 'Aktivitas Desain Khusus Film, Video, Program TV, Animasi dan Komik', 'Aktivitas Desain Konten Kreatif Lainnya', 
        'Aktivitas Perekaman Suara', 'Aktivitas Fotografi'
        ],
        "Seni Pertunjukan": ['Aktivitas Seni Pertunjukan', 'Pelaku Kreatif Seni Pertunjukan', 'Pelaku Seni Musik', 'Aktivitas Hiburan, Seni dan Kreativitas Lainnya', 'Aktivitas Pekerja Kreatif Lainnya' 
        ],
        "Fasilitas Olahraga": ['Pengelolaan Fasilitas Olahraga Lainnnya', 'Fasilitas Gelanggang atau Arena'
        ],
    };

    // Fungsi untuk mengisi opsi sub jenis usaha berdasarkan daftar usaha pariwisata yang dipilih
    function populateSubJenisUsaha() {
            var selectedDaftarUsahaPariwisata = daftarUsahaPariwisataSelect.value;
            var subJenisUsahaOptions = subJenisUsahaByDaftarUsahaPariwisata[selectedDaftarUsahaPariwisata] || [];

            // Kosongkan opsi sub jenis usaha sebelum mengisi yang baru
            daftarSubJenisUsahaSelect.innerHTML = '';

            // Buat opsi sub jenis usaha baru berdasarkan daftar sub jenis usaha
            subJenisUsahaOptions.forEach(function(subJenisUsaha) {
                var option = document.createElement('option');
                option.value = subJenisUsaha;
                option.text = subJenisUsaha;
                if ("{{ old('daftar_sub_jenis_usaha') }}" === subJenisUsaha) {
                 option.selected = true;
                }

                daftarSubJenisUsahaSelect.appendChild(option);
            });
        }

    // Panggil fungsi populateSubJenisUsaha saat halaman dimuat dan ketika pilihan daftar usaha pariwisata berubah
    populateSubJenisUsaha();
    daftarUsahaPariwisataSelect.addEventListener('change', populateSubJenisUsaha);
</script>

    <script>
        // Fungsi untuk on dan off button kirimm
        function agreeCheckboxOnClick() {
            var element = document.getElementById("buttonKirim");
            if (element.disabled == true) {
                element.disabled = false;
            } else {
                element.disabled = true;
            }
        }


        function previewKtp(dataprofil) {
            if (dataprofil.target.files.length > 0) {
                var src = URL.createObjectURL(dataprofil.target.files[0]);
                var preview = document.getElementById("KTP");
                var input = document.getElementById("input-ktp");
                preview.src = src;
                preview.style.display = "block";
                input.style.marginTop = "10px";
            }
        }

        function previewFoto(dataprofil) {
            if (dataprofil.target.files.length > 0) {
                var src = URL.createObjectURL(dataprofil.target.files[0]);
                var preview = document.getElementById("foto-si");
                var input = document.getElementById("input-foto");
                preview.src = src;
                preview.style.display = "block";
                input.style.marginTop = "10px";
            }
        }

        // set lokasi latitude dan longitude, lokasinya kota batu
        //    var mymap = L.map('mapid').setView([-7.870039, 112.524013], 15);


    </script>
    <script>
    var uploadeddataprofilPhotoMap = {}
    Dropzone.options.dataprofilPhotoDropzone = {
    url: '{{ route('admin.dataprofils.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="dataprofil_photo[]" value="' + response.name + '">')
      uploadeddataprofilPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadeddataprofilPhotoMap[file.name]
      }
      $('form').find('input[name="dataprofil_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($dataprofil) && $dataprofil->dataprofil_photo)
      var files = {!! json_encode($dataprofil->dataprofil_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="dataprofil_photo[]" value="' + file.file_name + '">')
        }
@endif
    },  
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection
