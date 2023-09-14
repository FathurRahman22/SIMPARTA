@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.agenda.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agendas.update", [$agenda->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tag_id">{{ trans('cruds.agenda.fields.tag') }}</label>
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
                <span class="help-block">{{ trans('cruds.agenda.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_agenda">{{ trans('cruds.agenda.fields.nama_agenda') }}</label>
                <input class="form-control {{ $errors->has('nama_agenda') ? 'is-invalid' : '' }}" type="text" name="nama_agenda" id="nama_agenda" value="{{ old('nama_agenda', $agenda->nama_agenda) }}" required>
                @if($errors->has('nama_agenda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_agenda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenda.fields.nama_agenda_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi_agenda">{{ trans('cruds.agenda.fields.deskripsi_agenda') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('deskripsi_agenda') ? 'is-invalid' : '' }}" name="deskripsi_agenda" id="deskripsi_agenda">{!! old('deskripsi_agenda', $agenda->deskripsi_agenda) !!}</textarea>
                @if($errors->has('deskripsi_agenda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deskripsi_agenda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenda.fields.deskripsi_agenda_helper') }}</span>
                
            </div>
            <div class="form-group">
                <label class="required" for="gambar_agenda">{{ trans('cruds.agenda.fields.gambar_agenda') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gambar_agenda') ? 'is-invalid' : '' }}" id="gambar_agenda-dropzone">
                </div>
                @if($errors->has('gambar_agenda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gambar_agenda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenda.fields.gambar_agenda_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="kode_agenda">{{ trans('cruds.agenda.fields.kode_agenda') }}</label>
                <input class="form-control {{ $errors->has('kode_agenda') ? 'is-invalid' : '' }}" type="text" name="kode_agenda" id="kode_agenda" value="{{ old('kode_agenda', $agenda->kode_agenda) }}" required>
                @if($errors->has('kode_agenda'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_agenda') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agenda.fields.kode_agenda_helper') }}</span>
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
    var uploadedGambarAgendaMap = {}
Dropzone.options.gambarAgendaDropzone = {
    url: '{{ route('admin.agendas.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="gambar_agenda[]" value="' + response.name + '">')
      uploadedGambarAgendaMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGambarAgendaMap[file.name]
      }
      $('form').find('input[name="gambar_agenda[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($agenda) && $agenda->gambar_agenda)
      var files = {!! json_encode($agenda->gambar_agenda) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gambar_agenda[]" value="' + file.file_name + '">')
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