@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.barang.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.barangs.update", [$barang->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama_paketWisata">{{ trans('cruds.barang.fields.nama_paketWisata') }}</label>
                <input class="form-control {{ $errors->has('nama_paketWisata') ? 'is-invalid' : '' }}" type="text" name="nama_paketWisata" id="nama_paketWisata" value="{{ old('nama_paketWisata', $barang->nama_paketWisata) }}" required>
                @if($errors->has('nama_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barang.fields.nama_paketWisata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi_paketWisata">{{ trans('cruds.barang.fields.deskripsi_paketWisata') }}</label>
                <input class="form-control {{ $errors->has('deskripsi_paketWisata') ? 'is-invalid' : '' }}" type="text" name="deskripsi_paketWisata" id="deskripsi_paketWisata" value="{{ old('deskripsi_paketWisata', $barang->deskripsi_paketWisata) }}">
                @if($errors->has('deskripsi_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deskripsi_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barang.fields.deskripsi_paketWisata_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gambar_paketWisata">{{ trans('cruds.barang.fields.gambar_paketWisata') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gambar_paketWisata') ? 'is-invalid' : '' }}" id="gambar_paketWisata-dropzone">
                </div>
                @if($errors->has('gambar_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gambar_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barang.fields.gambar_paketWisata_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="kode_barang">{{ trans('cruds.barang.fields.kode_barang') }}</label>
                <input class="form-control {{ $errors->has('kode_barang') ? 'is-invalid' : '' }}" type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                @if($errors->has('kode_barang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_barang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barang.fields.kode_barang_helper') }}</span>
            </div> --}}
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
    var uploadedGambarPaketWisataMap = {}
Dropzone.options.gambarPaketWisataDropzone = {
    url: '{{ route('admin.barangs.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="gambar_paketWisata[]" value="' + response.name + '">')
      uploadedGambarPaketWisataMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGambarPaketWisataMap[file.name]
      }
      $('form').find('input[name="gambar_paketWisata[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($barang) && $barang->gambar_paketWisata)
      var files = {!! json_encode($barang->gambar_paketWisata) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gambar_paketWisata[]" value="' + file.file_name + '">')
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