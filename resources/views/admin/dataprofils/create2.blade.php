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
            {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="tag_id">{{ trans('cruds.event.fields.tag') }}</label>
                <select class="form-control select2 {{ $errors->has('tag') ? 'is-invalid' : '' }}" name="tag_id" id="tag_id">
                    @foreach($tags as $id => $entry)
                        <option value="{{ $id }}" {{ old('tag_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.tag_helper') }}</span>
            </div>  
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.event.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alamat">{{ trans('cruds.event.fields.alamat') }}</label>
                    <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text"
                        name="alamat" id="alamat" value="{{ old('alamat', '') }}" require>
                    @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.alamat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="" for="kecamatan">{{ trans('cruds.event.fields.kecamatan') }}</label>
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <option value="batu">Batu</option>                    
                        <option value="bumiaji">Bumiaji</option>
                        <option value="junrejo">Junrejo</option>
                    </select>
                    {{-- <select class="form-control {{ $errors->has('event_type2') ? 'is-invalid' : '' }}" name="event_type2" id="event_type2" >
                    <option value disabled {{ old('event_type2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\OrderTicket::event_type2_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('event_type2', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                    @if ($errors->has('kecamatan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kecamatan') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.kecamatan_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="" for="kelurahan">{{ trans('cruds.event.fields.kelurahan') }}</label>
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
                    <span class="help-block">{{ trans('cruds.event.fields.kelurahan_helper') }}</span>
                </div>

                <!-- <div class="form-group">
                                <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                                @if ($errors->has('description'))
                <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
                            </div> -->

                <div class="form-group">
                    <label class="required" for="start_time">{{ trans('cruds.event.fields.start_time') }}</label>
                    <input class="form-control time {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="time"
                        name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                    @if ($errors->has('start_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.start_time_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="end_time">{{ trans('cruds.event.fields.end_time') }}</label>
                    <input class="form-control time {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="time"
                        name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                    @if ($errors->has('end_time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.end_time_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="event_photo">{{ trans('cruds.event.fields.event_photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('event_photo') ? 'is-invalid' : '' }}"
                        id="event_photo-dropzone">
                    </div>
                    @if ($errors->has('event_photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('event_photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.event_photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="latitude">{{ trans('cruds.event.fields.latitude') }}</label>
                    <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text"
                        name="latitude" id="latitude" value="{{ old('latitude', '') }}" require>
                    @if ($errors->has('latitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('latitude') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.latitude_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="longitude">{{ trans('cruds.event.fields.longitude') }}</label>
                    <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text"
                        name="longitude" id="longitude" value="{{ old('longitude', '') }}" require>
                    @if ($errors->has('longitude'))
                        <div class="invalid-feedback">
                            {{ $errors->first('longitude') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.latitude_helper') }}</span>
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
    Dropzone.options.eventPhotoDropzone = {
    url: '{{ route('admin.events.storeMedia') }}',
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
      $('form').find('input[name="event_photo"]').remove()
      $('form').append('<input type="hidden" name="event_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="event_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($event) && $event->event_photo)
      var file = {!! json_encode($event->event_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="event_photo" value="' + file.file_name + '">')
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
    var uploadedeventPhotoMap = {}
    Dropzone.options.eventPhotoDropzone = {
    url: '{{ route('admin.events.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="event_photo[]" value="' + response.name + '">')
      uploadedeventPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedeventPhotoMap[file.name]
      }
      $('form').find('input[name="event_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($event) && $event->event_photo)
      var files = {!! json_encode($event->event_photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="event_photo[]" value="' + file.file_name + '">')
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
        // Ambil elemen select untuk kecamatan dan kelurahan
        var kecamatanSelect = document.getElementById('kecamatan');
        var kelurahanSelect = document.getElementById('kelurahan');

        // Daftar kelurahan berdasarkan kecamatan
        var kelurahanByKecamatan = {
            batu: ['Oro-oro Ombo', 'Pesanggrahan', 'Sidomulyo', 'Sumberejo', 'Ngaglik', 'Sisir', 'Songgokerto',
                'Temas'
            ],
            bumiaji: ['Bumiaji', 'Bulukerto', 'Giripurno', 'Gunungsari', 'Punten', 'Sumbergondo', 'Tulungrejo',
                'Sumber Brantas'
            ],
            junrejo: ['Beji', 'Dadaprejo', 'Junrejo', 'Mojorejo', 'Pendem', 'Tlekung', 'Torongrejo'],
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


        function previewKtp(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("KTP");
                var input = document.getElementById("input-ktp");
                preview.src = src;
                preview.style.display = "block";
                input.style.marginTop = "10px";
            }
        }

        function previewFoto(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
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

function onMapClick(e) {
    if (marker) {
        mymap.removeLayer(marker); // Hapus tanda sebelumnya jika ada
    }

    popup
        .setLatLng(e.latlng)
        .setContent("Koordinatnya adalah " + e.latlng.toString())
        .openOn(mymap);

    document.getElementById('latitude').value = e.latlng.lat;
    document.getElementById('longitude').value = e.latlng.lng;

    // Tambahkan tanda dengan ikon kustom di lokasi yang diklik
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
