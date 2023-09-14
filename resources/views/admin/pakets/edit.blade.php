@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paket.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pakets.update", [$paket->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tag_id">{{ trans('cruds.paket.fields.tag') }}</label>
                <select class="form-control select2 {{ $errors->has('tag') ? 'is-invalid' : '' }}" name="tag_id" id="tag_id">
                    @foreach($tags as $id => $entry)
                    @if(auth()->user()->roles[0]->title == 'Admin' || auth()->user()->tag_id == $id)
                        <option value="{{ $id }}" {{ old('tag_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endif
                    @endforeach
                </select>
                @if($errors->has('tag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.paket.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_paketWisata">{{ trans('cruds.paket.fields.nama_paketWisata') }}</label>
                <input class="form-control {{ $errors->has('nama_paketWisata') ? 'is-invalid' : '' }}" type="text" name="nama_paketWisata" id="nama_paketWisata" value="{{ old('nama_paketWisata', $paket->nama_paketWisata) }}" required>
                @if($errors->has('nama_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paket.fields.nama_paketWisata_helper') }}</span>
        
                </div>
            <div class="form-group">
                <label for="deskripsi_paketWisata">{{ trans('cruds.paket.fields.deskripsi_paketWisata') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('deskripsi_paketWisata') ? 'is-invalid' : '' }}" name="deskripsi_paketWisata" id="deskripsi_paketWisata">{!! old('deskripsi_paketWisata', $paket->deskripsi_paketWisata) !!}</textarea>
                @if($errors->has('deskripsi_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deskripsi_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paket.fields.deskripsi_paketWisata_helper') }}</span>

            </div>
            <div class="form-group">
                <label class="required" for="gambar_paketWisata">{{ trans('cruds.paket.fields.gambar_paketWisata') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gambar_paketWisata') ? 'is-invalid' : '' }}" id="gambar_paketWisata-dropzone">
                </div>
                @if($errors->has('gambar_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gambar_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paket.fields.gambar_paketWisata_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="pdf_paketWisata">{{ trans('cruds.paket.fields.pdf_paketWisata') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pdf_paketWisata') ? 'is-invalid' : '' }}" id="pdf_paketWisata-dropzone">
                </div>
                @if($errors->has('pdf_paketWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pdf_paketWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.paket.fields.pdf_paketWisata_helper') }}</span>
            </div>
            
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
<link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>
<script>
    var uploadedGambarPaketWisataMap = {}
    Dropzone.options.gambarPaketWisataDropzone = {
    url: '{{ route('admin.pakets.storeMedia') }}',
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
@if(isset($paket) && $paket->gambar_paketWisata)
      var files = {!! json_encode($paket->gambar_paketWisata) !!}
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
var uploadedPdfPaketWisataMap = {};

Dropzone.options.pdfPaketWisataDropzone = {
    url: '{{ route('admin.pakets.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.pdf',
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
        size: 2
    },
    success: function (file, response) {
        $('form').append('<input type="hidden" name="pdf_paketWisata[]" value="' + response.name + '">');
        uploadedPdfPaketWisataMap[file.name] = response.name;
    },
    removedfile: function (file) {
        console.log(file);
        file.previewElement.remove();
        var name = '';
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name;
        } else {
            name = uploadedPdfPaketWisataMap[file.name];
        }
        $('form').find('input[name="pdf_paketWisata[]"][value="' + name + '"]').remove();
    },
    init: function () {
        @if(isset($paket) && $paket->pdf_paketWisata)
            var files = {!! json_encode($paket->pdf_paketWisata) !!};
            for (var i in files) {
                var file = files[i];
                this.options.addedfile.call(this, file);
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url);
                file.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="pdf_paketWisata[]" value="' + file.file_name + '">');
            }
        @endif
    },
    error: function (file, response) {
        var message = (typeof response === 'string') ? response : response.errors.file;
        file.previewElement.classList.add('dz-error');
        var _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
        var _results = [];
        for (var _i = 0, _len = _ref.length; _i < _len; _i++) {
            var node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    }
};


</script>
@endsection