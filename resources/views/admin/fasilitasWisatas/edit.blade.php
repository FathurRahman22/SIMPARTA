@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.fasilitasWisata.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.fasilitasWisatas.update', [$fasilitasWisata->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                div class="form-group">
                <label for="tag_id">{{ trans('cruds.fasilitasWisata.fields.tag') }}</label>
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
                <span class="help-block">{{ trans('cruds.fasilitasWisata.fields.tag_helper') }}</span>
            </div>
                <div class="form-group">
                    <label class="required"
                        for="nama_fasilitasWisata">{{ trans('cruds.fasilitasWisata.fields.nama_fasilitasWisata') }}</label>
                    <input class="form-control {{ $errors->has('nama_fasilitasWisata') ? 'is-invalid' : '' }}"
                        type="text" name="nama_fasilitasWisata" id="nama_fasilitasWisata"
                        value="{{ old('nama_fasilitasWisata', $fasilitasWisata->nama_fasilitasWisata) }}" required>
                    @if ($errors->has('nama_fasilitasWisata'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama_fasilitasWisata') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.fasilitasWisata.fields.nama_fasilitasWisata_helper') }}</span>

                </div>
                <div class="form-group">
                    <label
                        for="deskripsi_fasilitasWisata">{{ trans('cruds.fasilitasWisata.fields.deskripsi_fasilitasWisata') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('deskripsi_fasilitasWisata') ? 'is-invalid' : '' }}"
                        name="deskripsi_fasilitasWisata" id="deskripsi_fasilitasWisata">{!! old('deskripsi_fasilitasWisata', $fasilitasWisata->deskripsi_fasilitasWisata) !!}</textarea>
                    @if ($errors->has('deskripsi_fasilitasWisata'))
                        <div class="invalid-feedback">
                            {{ $errors->first('deskripsi_fasilitasWisata') }}
                        </div>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.fasilitasWisata.fields.deskripsi_fasilitasWisata_helper') }}</span>

                </div>
                <div class="form-group">
                    <label class="required"
                        for="gambar_fasilitasWisata">{{ trans('cruds.fasilitasWisata.fields.gambar_fasilitasWisata') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('gambar_fasilitasWisata') ? 'is-invalid' : '' }}"
                        id="gambar_fasilitasWisata-dropzone">
                    </div>
                    @if ($errors->has('gambar_fasilitasWisata'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gambar_fasilitasWisata') }}
                        </div>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.fasilitasWisata.fields.gambar_fasilitasWisata_helper') }}</span>
                </div>
                {{-- <div class="form-group">
                <label class="required" for="kode_fasilitasWisata">{{ trans('cruds.fasilitasWisata.fields.kode_fasilitasWisata') }}</label>
                <input class="form-control {{ $errors->has('kode_fasilitasWisata') ? 'is-invalid' : '' }}" type="text" name="kode_fasilitasWisata" id="kode_fasilitasWisata" value="{{ old('kode_fasilitasWisata', $fasilitasWisata->kode_fasilitasWisata) }}" required>
                @if ($errors->has('kode_fasilitasWisata'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kode_fasilitasWisata') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fasilitasWisata.fields.kode_fasilitasWisata_helper') }}</span>
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
        var uploadedGambarFasilitasWisataMap = {}
        Dropzone.options.gambarFasilitasWisataDropzone = {
            url: '{{ route('admin.fasilitasWisatas.storeMedia') }}',
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
            success: function(file, response) {
                $('form').append('<input type="hidden" name="gambar_fasilitasWisata[]" value="' + response.name +
                    '">')
                uploadedGambarFasilitasWisataMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedGambarFasilitasWisataMap[file.name]
                }
                $('form').find('input[name="gambar_fasilitasWisata[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($fasilitasWisata) && $fasilitasWisata->gambar_fasilitasWisata)
                    var files = {!! json_encode($fasilitasWisata->gambar_fasilitasWisata) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="gambar_fasilitasWisata[]" value="' + file
                            .file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
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
