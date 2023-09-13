@extends('layouts.admin')
@section('content')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/opencagedata/leaflet-opencage-geocoding@v2.0.0/dist/css/L.Control.OpenCageGeocoding.min.css" />
    <script
        src="https://cdn.jsdelivr.net/gh/opencagedata/leaflet-opencage-geocoding@v2.0.0/dist/js/L.Control.OpenCageGeocoding.min.js">
    </script>


    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.dataprofil.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.dataprofils.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
    <label class="" for="daftar_usaha_pariwisata">{{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata') }}</label>
    <select class="form-control" name="daftar_usaha_pariwisata" id="daftar_usaha_pariwisata">
        <option value="Hotel dan Akomodasi Lainnya" {{ old('daftar_usaha_pariwisata') == 'Hotel dan Akomodasi Lainnya' ? 'selected' : '' }}>Hotel dan Akomodasi Lainnya</option>                    
        <option value="Daya Tarik Wisata" {{ old('daftar_usaha_pariwisata') == 'Daya Tarik Wisata' ? 'selected' : '' }}>Daya Tarik Wisata </option>
        <option value="Restoran" {{ old('daftar_usaha_pariwisata') == 'Restoran' ? 'selected' : '' }}>Restoran</option>
        <option value="Kafe" {{ old('daftar_usaha_pariwisata') == 'Kafe' ? 'selected' : '' }}>Kafe</option>
        <option value="Usaha Makanan" {{ old('daftar_usaha_pariwisata') == 'Usaha Makanan' ? 'selected' : '' }}>Usaha Makanan</option>
        <option value="Usaha Minuman" {{ old('daftar_usaha_pariwisata') == 'Usaha Minuman' ? 'selected' : '' }}>Usaha Minuman</option>
        <option value="Bar, Klub Malam, dan Karaoke" {{ old('daftar_usaha_pariwisata') == 'Bar, Klub Malam, dan Karaoke' ? 'selected' : '' }}>Bar, Klub Malam, dan Karaoke</option>
        <option value="SPA dan Rumah Pijat" {{ old('daftar_usaha_pariwisata') == 'SPA dan Rumah Pijat' ? 'selected' : '' }}>SPA dan Rumah Pijat</option>
        <option value="Jasa Pariwisata" {{ old('daftar_usaha_pariwisata') == 'Jasa Pariwisata' ? 'selected' : '' }}>Jasa Pariwisata</option>
        <option value="Perkemahan dan Pondok Wisata" {{ old('daftar_usaha_pariwisata') == 'Perkemahan dan Pondok Wisata' ? 'selected' : '' }}>Perkemahan dan Pondok Wisata</option>
        <option value="Taman Rekreasi dan Hiburan" {{ old('daftar_usaha_pariwisata') == 'Taman Rekreasi dan Hiburan' ? 'selected' : '' }}>Taman Rekreasi dan Hiburan</option>
        <option value="Aktivitas Desain dan Fotografi" {{ old('daftar_usaha_pariwisata') == 'Aktivitas Desain dan Fotografi' ? 'selected' : '' }}>Aktivitas Desain dan Fotografi</option>
        <option value="Seni Pertunjukan" {{ old('daftar_usaha_pariwisata') == 'Seni Pertunjukan' ? 'selected' : '' }}>Seni Pertunjukan</option>
        <option value="Fasilitas Olahraga" {{ old('daftar_usaha_pariwisata') == 'Fasilitas Olahraga' ? 'selected' : '' }}>Fasilitas Olahraga</option>
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
                    <!-- {{-- <select class="form-control {{ $errors->has('daftar_sub_jenis_usaha') ? 'is-invalid' : '' }}" name="daftar_sub_jenis_usaha" id="daftar_sub_jenis_usaha" >
                    <option value disabled {{ old('daftar_sub_jenis_usaha', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\OrderTicket::daftar_sub_jenis_usaha_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('daftar_sub_jenis_usaha', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}} -->
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
                        name="name" id="name" value="{{ old('name', '') }}" required>
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
                        <option value="Batu">Batu</option>                    
                        <option value="Bumiaji">Bumiaji</option>
                        <option value="Junrejo">Junrejo</option>
                    </select>
                    {{-- <select class="form-control {{ $errors->has('dataprofil_type2') ? 'is-invalid' : '' }}" name="dataprofil_type2" id="dataprofil_type2" >
                    <option value disabled {{ old('dataprofil_type2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\OrderTicket::dataprofil_type2_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dataprofil_type2', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
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
                    {{-- <select class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}" name="kelurahan" id="kelurahan" >
                    <option value disabled {{ old('kelurahan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\OrderTicket::kelurahan_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kelurahan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                    @if ($errors->has('kelurahan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kelurahan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataprofil.fields.kelurahan_helper') }}</span>
                </div>

                <!-- <div class="form-group">
                                <label for="description">{{ trans('cruds.dataprofil.fields.description') }}</label>
                                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                                @if ($errors->has('description'))
                <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataprofil.fields.description_helper') }}</span>
                            </div> -->

                <div class="form-group">
                    <label class="required" for="start_time">{{ trans('cruds.dataprofil.fields.start_time') }}</label>
                    <input class="form-control time {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="time"
                        name="start_time" id="start_time" value="{{ old('start_time') }}" required>
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
                        name="end_time" id="end_time" value="{{ old('end_time') }}" required>
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
                        name="latitude" id="latitude" value="{{ old('latitude', '') }}" require>
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
                        name="longitude" id="longitude" value="{{ old('longitude', '') }}" require>
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
                        name="alamat" id="alamat" value="{{ old('alamat', '') }}" require>
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
<!-- <script>
    Dropzone.options.dataprofilPhotoDropzone = {
    url: '{{ route('admin.dataprofils.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="dataprofil_photo"]').remove()
      $('form').append('<input type="hidden" name="dataprofil_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="dataprofil_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($dataprofil) && $dataprofil->dataprofil_photo)
      var file = {!! json_encode($dataprofil->dataprofil_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="dataprofil_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
</script> -->
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
<script>
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
</script>

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
                // if ("{{ old('daftar_sub_jenis_usaha') }}" === subJenisUsaha) {
                //  option.selected = true;
                // }

                daftarSubJenisUsahaSelect.appendChild(option);
            });
        }

        // Panggil fungsi populateSubJenisUsaha saat halaman dimuat dan ketika pilihan daftar usaha pariwisata berubah
        populateSubJenisUsaha();
        daftarUsahaPariwisataSelect.addEventListener('change', populateSubJenisUsaha);
</script>
    <script>
        // Ambil elemen select untuk kecamatan dan kelurahan
        var kecamatanSelect = document.getElementById('kecamatan');
        var kelurahanSelect = document.getElementById('kelurahan');

        // Daftar kelurahan berdasarkan kecamatan
        var kelurahanByKecamatan = {
            "Batu": ['Oro-oro Ombo', 'Pesanggrahan', 'Sidomulyo', 'Sumberejo', 'Ngaglik', 'Sisir', 'Songgokerto',
                'Temas'
            ],
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
        var mymap = L.map('mapid').setView([-7.870039, 112.524013], 15);

L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        tileSize: 512,
        zoomOffset: -1,
    }).addTo(mymap);

var popup = L.popup();

var customIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [0, -30]
});

var marker; // Tandai (marker) variabel global

// function onMapClick(e) {
//     if (marker) {
//         mymap.removeLayer(marker); // Hapus tanda sebelumnya jika ada
//     }

//     popup
//         .setLatLng(e.latlng)
//         .setContent("Koordinatnya adalah " + e.latlng.toString())
//         .openOn(mymap);

//     document.getElementById('latitude').value = e.latlng.lat;
//     document.getElementById('longitude').value = e.latlng.lng;

//     // Tambahkan tanda dengan ikon kustom di lokasi yang diklik
//     marker = L.marker(e.latlng, {
//         icon: customIcon
//     }).addTo(mymap);
// }

function onMapClick(e) {
    if (marker) {
        mymap.removeLayer(marker);
    }

    popup
        .setLatLng(e.latlng)
        .setContent("Koordinatnya adalah " + e.latlng.toString())
        .openOn(mymap);

    document.getElementById('latitude').value = e.latlng.lat;
    document.getElementById('longitude').value = e.latlng.lng;

    // Lakukan geocoding untuk mendapatkan alamat dari latitude dan longitude
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}&zoom=18&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            const address = data.display_name;
            document.getElementById('alamat').value = address;
        })
        .catch(error => {
            console.error('Error geocoding:', error);
        });

    marker = L.marker(e.latlng, {
        icon: customIcon
    }).addTo(mymap);
}

mymap.on('click', onMapClick);

// Fungsi untuk mendapatkan lokasi GPS saat ini
        //    popup
        //       .setLatLng(e.latlng)
        //       .setContent("koordinatnya adalah " + e.latlng
        //             .toString()
        //             ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
        //       .openOn(mymap);

        //    document.getElementById('latitude').value = e.latlng.lat
        //    document.getElementById('longitude').value = e.latlng.lng
        // }
        // mymap.on('click', onMapClick); 
        //jalankan fungsi   
    </script>
@endsection
