@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.orderTicket.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-tickets.store") }}" enctype="multipart/form-data">
            @csrf
            {{-- CREATE STATUS IZIN --}}
            <div class="form-group">
                        {{-- ASEAN --}}
                        <div class="form-group">
                            <label class="font-weight-bold" for="asean">{{ trans('cruds.submissionLink.fields.asean') }}</label>
                            <input class="form-control {{ $errors->has('asean') ? 'is-invalid' : '' }}" type="number" name="asean" id="asean" value="{{ old('asean','') }}" step="1" >
                            @if($errors->has('asean'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asean') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionLink.fields.asean_helper') }}</span> 
                        </div>

            {{-- CREATE ID --}}
            <div class="row">
                            <div class="col-md-4">
                                <label class for="malaysia">{{ trans('cruds.submissionLink.fields.malaysia') }}</label>
                                <input class="form-control {{ $errors->has('malaysia') ? 'is-invalid' : '' }}" type="number" name="malaysia" id="malaysia" value="{{ old('malaysia','') }}" step="1" >
                                @if($errors->has('malaysia'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('malaysia') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.malaysia_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="filipina">{{ trans('cruds.submissionLink.fields.filipina') }}</label>
                                <input class="form-control {{ $errors->has('filipina') ? 'is-invalid' : '' }}" type="number" name="filipina" id="filipina" value="{{ old('filipina','') }}" step="1" >
                                @if($errors->has('filipina'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('filipina') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.filipina_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="singapura">{{ trans('cruds.submissionLink.fields.singapura') }}</label>
                                <input class="form-control {{ $errors->has('singapura') ? 'is-invalid' : '' }}" type="number" name="singapura" id="singapura" value="{{ old('singapura', '') }}" step="1" >
                                @if($errors->has('singapura'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('singapura') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.singapura_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="thailand">{{ trans('cruds.submissionLink.fields.thailand') }}</label>
                                <input class="form-control {{ $errors->has('thailand') ? 'is-invalid' : '' }}" type="number" name="thailand" id="thailand" value="{{ old('thailand', '') }}" step="1" >
                                @if($errors->has('thailand'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('thailand') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.thailand_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="vietnam">{{ trans('cruds.submissionLink.fields.vietnam') }}</label>
                                <input class="form-control {{ $errors->has('vietnam') ? 'is-invalid' : '' }}" type="number" name="vietnam" id="vietnam" value="{{ old('vietnam', '') }}" step="1" >
                                @if($errors->has('vietnam'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('vietnam') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.vietnam_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="aseanlainnya">{{ trans('cruds.submissionLink.fields.aseanlainnya') }}</label>
                                <input class="form-control {{ $errors->has('aseanlainnya') ? 'is-invalid' : '' }}" type="number" name="aseanlainnya" id="aseanlainnya" value="{{ old('aseanlainnya', '') }}" step="1" >
                                @if($errors->has('aseanlainnya'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('aseanlainnya') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.aseanlainnya_helper') }}</span><br>
                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold" for="asia">{{ trans('cruds.submissionLink.fields.asia') }}</label>
                            <input class="form-control {{ $errors->has('asia') ? 'is-invalid' : '' }}" type="number" name="asia" id="asia" value="{{ old('asia','') }}" step="1" >
                            @if($errors->has('asia'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asia') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionLink.fields.asia_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class for="hongkong">{{ trans('cruds.submissionLink.fields.hongkong') }}</label>
                                <input class="form-control {{ $errors->has('hongkong') ? 'is-invalid' : '' }}" type="number" name="hongkong" id="hongkong" value="{{ old('hongkong','') }}" step="1" >
                                @if($errors->has('hongkong'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('hongkong') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.hongkong_helper') }}</span>
                            </div>
                            <div class="col-md-3">
                                <label class for="india">{{ trans('cruds.submissionLink.fields.india') }}</label>
                                <input class="form-control {{ $errors->has('india') ? 'is-invalid' : '' }}" type="number" name="india" id="india" value="{{ old('india','') }}" step="1" >
                                @if($errors->has('india'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('india') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.india_helper') }}</span>
                            </div>
                            <div class="col-md-3">
                                <label class for="jepang">{{ trans('cruds.submissionLink.fields.jepang') }}</label>
                                <input class="form-control {{ $errors->has('jepang') ? 'is-invalid' : '' }}" type="number" name="jepang" id="jepang" value="{{ old('jepang', '') }}" step="1" >
                                @if($errors->has('jepang'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jepang') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.jepang_helper') }}</span>
                            </div>
                            <div class="col-md-3">
                                <label class for="korea_selatan">{{ trans('cruds.submissionLink.fields.korea_selatan') }}</label>
                                <input class="form-control {{ $errors->has('korea_selatan') ? 'is-invalid' : '' }}" type="number" name="korea_selatan" id="korea_selatan" value="{{ old('korea_selatan', '') }}" step="1" >
                                @if($errors->has('korea_selatan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('korea_selatan') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.korea_selatan_helper') }}</span><br>
                            </div>
                            <div class="col-md-3">
                                <label class for="taiwan">{{ trans('cruds.submissionLink.fields.taiwan') }}</label>
                                <input class="form-control {{ $errors->has('taiwan') ? 'is-invalid' : '' }}" type="number" name="taiwan" id="taiwan" value="{{ old('taiwan', '') }}" step="1" >
                                @if($errors->has('taiwan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('taiwan') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.taiwan_helper') }}</span>
                            </div>
                            <div class="col-md-3">
                                <label class for="tiongkok">{{ trans('cruds.submissionLink.fields.tiongkok') }}</label>
                                <input class="form-control {{ $errors->has('tiongkok') ? 'is-invalid' : '' }}" type="number" name="tiongkok" id="tiongkok" value="{{ old('tiongkok', '') }}" step="1" >
                                @if($errors->has('tiongkok'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('tiongkok') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.tiongkok_helper') }}</span>
                            </div>
                            <div class="col-md-3">
                                <label class for="timor_leste">{{ trans('cruds.submissionLink.fields.timor_leste') }}</label>
                                <input class="form-control {{ $errors->has('timor_leste') ? 'is-invalid' : '' }}" type="number" name="timor_leste" id="timor_leste" value="{{ old('timor_leste', '') }}" step="1" >
                                @if($errors->has('timor_leste'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('timor_leste') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.timor_leste_helper') }}</span><br>
                            </div>
                            <div class="col-md-3">
                                <label class for="asia_lainnya">{{ trans('cruds.submissionLink.fields.asia_lainnya') }}</label>
                                <input class="form-control {{ $errors->has('asia_lainnya') ? 'is-invalid' : '' }}" type="number" name="asia_lainnya" id="asia_lainnya" value="{{ old('asia_lainnya', '') }}" step="1" >
                                @if($errors->has('asia_lainnya'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('asia_lainnya') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.asia_lainnya_helper') }}</span><br>
                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold" for="timur_tengah">{{ trans('cruds.submissionLink.fields.timur_tengah') }}</label>
                            <input class="form-control {{ $errors->has('timur_tengah') ? 'is-invalid' : '' }}" type="number" name="timur_tengah" id="timur_tengah" value="{{ old('timur_tengah','') }}" step="1" >
                            @if($errors->has('timur_tengah'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('timur_tengah') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionLink.fields.timur_tengah_helper') }}</span> 
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="arab_saudi">{{ trans('cruds.submissionLink.fields.arab_saudi') }}</label>
                                <input class="form-control {{ $errors->has('arab_saudi') ? 'is-invalid' : '' }}" type="number" name="arab_saudi" id="arab_saudi" value="{{ old('arab_saudi','') }}" step="1" >
                                @if($errors->has('arab_saudi'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('arab_saudi') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.arab_saudi_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="kuwait">{{ trans('cruds.submissionLink.fields.kuwait') }}</label>
                                <input class="form-control {{ $errors->has('kuwait') ? 'is-invalid' : '' }}" type="number" name="kuwait" id="kuwait" value="{{ old('kuwait','') }}" step="1" >
                                @if($errors->has('kuwait'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kuwait') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.kuwait_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="mesir">{{ trans('cruds.submissionLink.fields.mesir') }}</label>
                                <input class="form-control {{ $errors->has('mesir') ? 'is-invalid' : '' }}" type="number" name="mesir" id="mesir" value="{{ old('mesir', '') }}" step="1" >
                                @if($errors->has('mesir'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('mesir') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.mesir_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="uae">{{ trans('cruds.submissionLink.fields.uae') }}</label>
                                <input class="form-control {{ $errors->has('uae') ? 'is-invalid' : '' }}" type="number" name="uae" id="uae" value="{{ old('uae', '') }}" step="1" >
                                @if($errors->has('uae'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('uae') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.uae_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="yaman">{{ trans('cruds.submissionLink.fields.yaman') }}</label>
                                <input class="form-control {{ $errors->has('yaman') ? 'is-invalid' : '' }}" type="number" name="yaman" id="yaman" value="{{ old('yaman', '') }}" step="1" >
                                @if($errors->has('yaman'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('yaman') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.yaman_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="timur_tengah_lain">{{ trans('cruds.submissionLink.fields.timur_tengah_lain') }}</label>
                                <input class="form-control {{ $errors->has('timur_tengah_lain') ? 'is-invalid' : '' }}" type="number" name="timur_tengah_lain" id="timur_tengah_lain" value="{{ old('timur_tengah_lain', '') }}" step="1" >
                                @if($errors->has('timur_tengah_lain'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('timur_tengah_lain') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.timur_tengah_lain_helper') }}</span><br>
                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold" for="eropa">{{ trans('cruds.submissionLink.fields.eropa') }}</label>
                            <input class="form-control {{ $errors->has('eropa') ? 'is-invalid' : '' }}" type="number" name="eropa" id="eropa" value="{{ old('eropa','') }}" step="1" >
                            @if($errors->has('eropa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('eropa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionLink.fields.eropa_helper') }}</span> 
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="perancis">{{ trans('cruds.submissionLink.fields.perancis') }}</label>
                                <input class="form-control {{ $errors->has('perancis') ? 'is-invalid' : '' }}" type="number" name="perancis" id="perancis" value="{{ old('perancis', '') }}" step="1" >
                                @if($errors->has('perancis'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('perancis') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.perancis_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="jerman">{{ trans('cruds.submissionLink.fields.jerman') }}</label>
                                <input class="form-control {{ $errors->has('jerman') ? 'is-invalid' : '' }}" type="number" name="jerman" id="jerman" value="{{ old('jerman','') }}" step="1" >
                                @if($errors->has('jerman'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jerman') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.jerman_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="belanda">{{ trans('cruds.submissionLink.fields.belanda') }}</label>
                                <input class="form-control {{ $errors->has('belanda') ? 'is-invalid' : '' }}" type="number" name="belanda" id="belanda" value="{{ old('belanda','') }}" step="1" >
                                @if($errors->has('belanda'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('belanda') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.belanda_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="inggris">{{ trans('cruds.submissionLink.fields.inggris') }}</label>
                                <input class="form-control {{ $errors->has('inggris') ? 'is-invalid' : '' }}" type="number" name="inggris" id="inggris" value="{{ old('inggris', '') }}" step="1" >
                                @if($errors->has('inggris'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('inggris') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.inggris_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="rusia">{{ trans('cruds.submissionLink.fields.rusia') }}</label>
                                <input class="form-control {{ $errors->has('rusia') ? 'is-invalid' : '' }}" type="number" name="rusia" id="rusia" value="{{ old('rusia', '') }}" step="1" >
                                @if($errors->has('rusia'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('rusia') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.rusia_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="eropa_lainnya">{{ trans('cruds.submissionLink.fields.eropa_lainnya') }}</label>
                                <input class="form-control {{ $errors->has('eropa_lainnya') ? 'is-invalid' : '' }}" type="number" name="eropa_lainnya" id="eropa_lainnya" value="{{ old('eropa_lainnya', '') }}" step="1" >
                                @if($errors->has('eropa_lainnya'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('eropa_lainnya') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.eropa_lainnya_helper') }}</span><br>
                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold" for="amerika">{{ trans('cruds.submissionLink.fields.amerika') }}</label>
                            <input class="form-control {{ $errors->has('amerika') ? 'is-invalid' : '' }}" type="number" name="amerika" id="amerika" value="{{ old('amerika','') }}" step="1" >
                            @if($errors->has('amerika'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amerika') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.submissionLink.fields.amerika_helper') }}</span> 
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="amerika_serikat">{{ trans('cruds.submissionLink.fields.amerika_serikat') }}</label>
                                <input class="form-control {{ $errors->has('amerika_serikat') ? 'is-invalid' : '' }}" type="number" name="amerika_serikat" id="amerika_serikat" value="{{ old('amerika_serikat', '') }}" step="1" >
                                @if($errors->has('amerika_serikat'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amerika_serikat') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.amerika_serikat_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="kanada">{{ trans('cruds.submissionLink.fields.kanada') }}</label>
                                <input class="form-control {{ $errors->has('kanada') ? 'is-invalid' : '' }}" type="number" name="kanada" id="kanada" value="{{ old('kanada','') }}" step="1" >
                                @if($errors->has('kanada'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kanada') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.kanada_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="brazil">{{ trans('cruds.submissionLink.fields.brazil') }}</label>
                                <input class="form-control {{ $errors->has('brazil') ? 'is-invalid' : '' }}" type="number" name="brazil" id="brazil" value="{{ old('brazil','') }}" step="1" >
                                @if($errors->has('brazil'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('brazil') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.brazil_helper') }}</span><br>
                            </div>

                    
                </div>
            </div>
            
            <div class="col-md-6">
                                <label class for="meksiko">{{ trans('cruds.submissionLink.fields.meksiko') }}</label>
                                <input class="form-control {{ $errors->has('meksiko') ? 'is-invalid' : '' }}" type="number" name="meksiko" id="meksiko" value="{{ old('meksiko', '') }}" step="1" >
                                @if($errors->has('meksiko'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meksiko') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.meksiko_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class for="amerika_lainnya">{{ trans('cruds.submissionLink.fields.amerika_lainnya') }}</label>
                                <input class="form-control {{ $errors->has('amerika_lainnya') ? 'is-invalid' : '' }}" type="number" name="amerika_lainnya" id="amerika_lainnya" value="{{ old('amerika_lainnya', '') }}" step="1" >
                                @if($errors->has('amerika_lainnya'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amerika_lainnya') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.submissionLink.fields.amerika_lainnya_helper') }}</span><br>
                            </div>
            {{-- Sampai Sini --}}
 
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
    $(document).ready(function () {
        $('#laki_laki, #perempuan').on('input', function () {
            var lakiLakiValue = parseInt($('#laki_laki').val()) || 0;
            var perempuanValue = parseInt($('#perempuan').val()) || 0;
            var totalPegawai = lakiLakiValue + perempuanValue;
            $('#total_pegawai').val(totalPegawai);
        });
    });

    Dropzone.options.buktiPembayaranDropzone = {
    url: '{{ route('admin.order-tickets.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="bukti_pembayaran"]').remove()
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_pembayaran"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($orderTicket) && $orderTicket->bukti_pembayaran)
      var file = {!! json_encode($orderTicket->bukti_pembayaran) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + file.file_name + '">')
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
</script>

@endsection