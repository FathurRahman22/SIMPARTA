@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.dataKunjungan.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.data-kunjungans.update', [$dataKunjungan->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="tag_id">{{ trans('cruds.dataKunjungan.fields.tag') }}</label>
                    <select class="form-control select2 {{ $errors->has('tag') ? 'is-invalid' : '' }}" name="tag_id"
                        id="tag_id">
                        @foreach ($tags as $id => $entry)
                            @if (auth()->user()->roles[0]->title == 'Admin' || auth()->user()->tag_id == $id)
                                <option value="{{ $id }}" {{ old('tag_id') == $id ? 'selected' : '' }}>
                                    {{ $entry }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('tag'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tag') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.dataKunjungan.fields.tag_helper') }}</span>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- ASEAN --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="asean">{{ trans('cruds.dataKunjungan.fields.asean') }}</label>
                                <input class="form-control {{ $errors->has('asean') ? 'is-invalid' : '' }}" type="number"
                                    name="asean" id="asean" value="{{ old('asean', $dataKunjungan->asean) }}"
                                    step="1">
                                @if ($errors->has('asean'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('asean') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.asean_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class for="malaysia">{{ trans('cruds.dataKunjungan.fields.malaysia') }}</label>
                                    <input class="form-control {{ $errors->has('malaysia') ? 'is-invalid' : '' }}"
                                        type="number" name="malaysia" id="malaysia"
                                        value="{{ old('malaysia', $dataKunjungan->malaysia) }}" step="1">
                                    @if ($errors->has('malaysia'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('malaysia') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.malaysia_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="filipina">{{ trans('cruds.dataKunjungan.fields.filipina') }}</label>
                                    <input class="form-control {{ $errors->has('filipina') ? 'is-invalid' : '' }}"
                                        type="number" name="filipina" id="filipina"
                                        value="{{ old('filipina', $dataKunjungan->filipina) }}" step="1">
                                    @if ($errors->has('filipina'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('filipina') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.filipina_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class
                                        for="singapura">{{ trans('cruds.dataKunjungan.fields.singapura') }}</label>
                                    <input class="form-control {{ $errors->has('singapura') ? 'is-invalid' : '' }}"
                                        type="number" name="singapura" id="singapura"
                                        value="{{ old('singapura', $dataKunjungan->singapura) }}" step="1">
                                    @if ($errors->has('singapura'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('singapura') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.singapura_helper') }}</span><br>
                                </div>
                                <div class="col-md-4">
                                    <label class for="thailand">{{ trans('cruds.dataKunjungan.fields.thailand') }}</label>
                                    <input class="form-control {{ $errors->has('thailand') ? 'is-invalid' : '' }}"
                                        type="number" name="thailand" id="thailand"
                                        value="{{ old('thailand', $dataKunjungan->thailand) }}" step="1">
                                    @if ($errors->has('thailand'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thailand') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.thailand_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="vietnam">{{ trans('cruds.dataKunjungan.fields.vietnam') }}</label>
                                    <input class="form-control {{ $errors->has('vietnam') ? 'is-invalid' : '' }}"
                                        type="number" name="vietnam" id="vietnam"
                                        value="{{ old('vietnam', $dataKunjungan->vietnam) }}" step="1">
                                    @if ($errors->has('vietnam'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('vietnam') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.vietnam_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class
                                        for="aseanlainnya">{{ trans('cruds.dataKunjungan.fields.aseanlainnya') }}</label>
                                    <input class="form-control {{ $errors->has('aseanlainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="aseanlainnya" id="aseanlainnya"
                                        value="{{ old('aeanlainnya', $dataKunjungan->aseanlainnya) }}" step="1">
                                    @if ($errors->has('aseanlainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('aseanlainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.aseanlainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- ASIA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="asia">{{ trans('cruds.dataKunjungan.fields.asia') }}</label>
                                <input class="form-control {{ $errors->has('asia') ? 'is-invalid' : '' }}" type="number"
                                    name="asia" id="asia" value="{{ old('asia', $dataKunjungan->asia) }}"
                                    step="1">
                                @if ($errors->has('asia'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('asia') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.asia_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class for="hongkong">{{ trans('cruds.dataKunjungan.fields.hongkong') }}</label>
                                    <input class="form-control {{ $errors->has('hongkong') ? 'is-invalid' : '' }}"
                                        type="number" name="hongkong" id="hongkong"
                                        value="{{ old('hongkong', $dataKunjungan->hongkong) }}" step="1">
                                    @if ($errors->has('hongkong'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('hongkong') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.hongkong_helper') }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label class for="india">{{ trans('cruds.dataKunjungan.fields.india') }}</label>
                                    <input class="form-control {{ $errors->has('india') ? 'is-invalid' : '' }}"
                                        type="number" name="india" id="india"
                                        value="{{ old('india', $dataKunjungan->india) }}" step="1">
                                    @if ($errors->has('india'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('india') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.dataKunjungan.fields.india_helper') }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label class for="jepang">{{ trans('cruds.dataKunjungan.fields.jepang') }}</label>
                                    <input class="form-control {{ $errors->has('jepang') ? 'is-invalid' : '' }}"
                                        type="number" name="jepang" id="jepang"
                                        value="{{ old('jepang', $dataKunjungan->jepang) }}" step="1">
                                    @if ($errors->has('jepang'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jepang') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.jepang_helper') }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label class
                                        for="korea_selatan">{{ trans('cruds.dataKunjungan.fields.korea_selatan') }}</label>
                                    <input class="form-control {{ $errors->has('korea_selatan') ? 'is-invalid' : '' }}"
                                        type="number" name="korea_selatan" id="korea_selatan"
                                        value="{{ old('korea_selatan', $dataKunjungan->korea_selatan) }}" step="1">
                                    @if ($errors->has('korea_selatan'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('korea_selatan') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.korea_selatan_helper') }}</span><br>
                                </div>
                                <div class="col-md-3">
                                    <label class for="taiwan">{{ trans('cruds.dataKunjungan.fields.taiwan') }}</label>
                                    <input class="form-control {{ $errors->has('taiwan') ? 'is-invalid' : '' }}"
                                        type="number" name="taiwan" id="taiwan"
                                        value="{{ old('taiwan', $dataKunjungan->taiwan) }}" step="1">
                                    @if ($errors->has('taiwan'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('taiwan') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.taiwan_helper') }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label class for="tiongkok">{{ trans('cruds.dataKunjungan.fields.tiongkok') }}</label>
                                    <input class="form-control {{ $errors->has('tiongkok') ? 'is-invalid' : '' }}"
                                        type="number" name="tiongkok" id="tiongkok"
                                        value="{{ old('tiongkok', $dataKunjungan->tiongkok) }}" step="1">
                                    @if ($errors->has('tiongkok'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('tiongkok') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.tiongkok_helper') }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label class
                                        for="timor_leste">{{ trans('cruds.dataKunjungan.fields.timor_leste') }}</label>
                                    <input class="form-control {{ $errors->has('timor_leste') ? 'is-invalid' : '' }}"
                                        type="number" name="timor_leste" id="timor_leste"
                                        value="{{ old('timor_leste', $dataKunjungan->timor_leste) }}" step="1">
                                    @if ($errors->has('timor_leste'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('timor_leste') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.timor_leste_helper') }}</span><br>
                                </div>
                                <div class="col-md-3">
                                    <label class
                                        for="asia_lainnya">{{ trans('cruds.dataKunjungan.fields.asia_lainnya') }}</label>
                                    <input class="form-control {{ $errors->has('asia_lainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="asia_lainnya" id="asia_lainnya"
                                        value="{{ old('asia_lainnya', $dataKunjungan->asia_lainnya) }}" step="1">
                                    @if ($errors->has('asia_lainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('asia_lainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.asia_lainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- TIMUR TENGAH --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="timur_tengah">{{ trans('cruds.dataKunjungan.fields.timur_tengah') }}</label>
                                <input class="form-control {{ $errors->has('timur_tengah') ? 'is-invalid' : '' }}"
                                    type="number" name="timur_tengah" id="timur_tengah"
                                    value="{{ old('timur_tengah', $dataKunjungan->timur_tengah) }}" step="1">
                                @if ($errors->has('timur_tengah'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('timur_tengah') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.timur_tengah_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class
                                        for="arab_saudi">{{ trans('cruds.dataKunjungan.fields.arab_saudi') }}</label>
                                    <input class="form-control {{ $errors->has('arab_saudi') ? 'is-invalid' : '' }}"
                                        type="number" name="arab_saudi" id="arab_saudi"
                                        value="{{ old('arab_saudi', $dataKunjungan->arab_saudi) }}" step="1">
                                    @if ($errors->has('arab_saudi'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('arab_saudi') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.arab_saudi_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="kuwait">{{ trans('cruds.dataKunjungan.fields.kuwait') }}</label>
                                    <input class="form-control {{ $errors->has('kuwait') ? 'is-invalid' : '' }}"
                                        type="number" name="kuwait" id="kuwait"
                                        value="{{ old('kuwait', $dataKunjungan->kuwait) }}" step="1">
                                    @if ($errors->has('kuwait'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kuwait') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.kuwait_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="mesir">{{ trans('cruds.dataKunjungan.fields.mesir') }}</label>
                                    <input class="form-control {{ $errors->has('mesir') ? 'is-invalid' : '' }}"
                                        type="number" name="mesir" id="mesir"
                                        value="{{ old('mesir', $dataKunjungan->mesir) }}" step="1">
                                    @if ($errors->has('mesir'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('mesir') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.mesir_helper') }}</span><br>
                                </div>
                                <div class="col-md-4">
                                    <label class for="uae">{{ trans('cruds.dataKunjungan.fields.uae') }}</label>
                                    <input class="form-control {{ $errors->has('uae') ? 'is-invalid' : '' }}"
                                        type="number" name="uae" id="uae"
                                        value="{{ old('uae', $dataKunjungan->uae) }}" step="1">
                                    @if ($errors->has('uae'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('uae') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.dataKunjungan.fields.uae_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="yaman">{{ trans('cruds.dataKunjungan.fields.yaman') }}</label>
                                    <input class="form-control {{ $errors->has('yaman') ? 'is-invalid' : '' }}"
                                        type="number" name="yaman" id="yaman"
                                        value="{{ old('yaman', $dataKunjungan->yaman) }}" step="1">
                                    @if ($errors->has('yaman'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('yaman') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.yaman_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class
                                        for="timur_tengah_lain">{{ trans('cruds.dataKunjungan.fields.timur_tengah_lain') }}</label>
                                    <input
                                        class="form-control {{ $errors->has('timur_tengah_lain') ? 'is-invalid' : '' }}"
                                        type="number" name="timur_tengah_lain" id="timur_tengah_lain"
                                        value="{{ old('timur_tengah_lain', $dataKunjungan->timur_tengah_lain) }}"
                                        step="1">
                                    @if ($errors->has('timur_tengah_lain'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('timur_tengah_lain') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.timur_tengah_lain_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- EROPA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="eropa">{{ trans('cruds.dataKunjungan.fields.eropa') }}</label>
                                <input class="form-control {{ $errors->has('eropa') ? 'is-invalid' : '' }}"
                                    type="number" name="eropa" id="eropa"
                                    value="{{ old('eropa', $dataKunjungan->eropa) }}" step="1">
                                @if ($errors->has('eropa'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('eropa') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.eropa_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class
                                        for="perancis">{{ trans('cruds.dataKunjungan.fields.perancis') }}</label>
                                    <input class="form-control {{ $errors->has('perancis') ? 'is-invalid' : '' }}"
                                        type="number" name="perancis" id="perancis"
                                        value="{{ old('perancis', $dataKunjungan->perancis) }}" step="1">
                                    @if ($errors->has('perancis'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('perancis') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.perancis_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="jerman">{{ trans('cruds.dataKunjungan.fields.jerman') }}</label>
                                    <input class="form-control {{ $errors->has('jerman') ? 'is-invalid' : '' }}"
                                        type="number" name="jerman" id="jerman"
                                        value="{{ old('jerman', $dataKunjungan->jerman) }}" step="1">
                                    @if ($errors->has('jerman'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jerman') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.jerman_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="belanda">{{ trans('cruds.dataKunjungan.fields.belanda') }}</label>
                                    <input class="form-control {{ $errors->has('belanda') ? 'is-invalid' : '' }}"
                                        type="number" name="belanda" id="belanda"
                                        value="{{ old('belanda', $dataKunjungan->belanda) }}" step="1">
                                    @if ($errors->has('belanda'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('belanda') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.belanda_helper') }}</span><br>
                                </div>
                                <div class="col-md-4">
                                    <label class for="inggris">{{ trans('cruds.dataKunjungan.fields.inggris') }}</label>
                                    <input class="form-control {{ $errors->has('inggris') ? 'is-invalid' : '' }}"
                                        type="number" name="inggris" id="inggris"
                                        value="{{ old('inggris', $dataKunjungan->inggris) }}" step="1">
                                    @if ($errors->has('inggris'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('inggris') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.inggris_helper') }}</span><br>
                                </div>
                                <div class="col-md-4">
                                    <label class for="rusia">{{ trans('cruds.dataKunjungan.fields.rusia') }}</label>
                                    <input class="form-control {{ $errors->has('rusia') ? 'is-invalid' : '' }}"
                                        type="number" name="rusia" id="rusia"
                                        value="{{ old('rusia', $dataKunjungan->rusia) }}" step="1">
                                    @if ($errors->has('rusia'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('rusia') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.rusia_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class
                                        for="eropa_lainnya">{{ trans('cruds.dataKunjungan.fields.eropa_lainnya') }}</label>
                                    <input class="form-control {{ $errors->has('eropa_lainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="eropa_lainnya" id="eropa_lainnya"
                                        value="{{ old('eropa_lainnya', $dataKunjungan->eropa_lainnya) }}"
                                        step="1">
                                    @if ($errors->has('eropa_lainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('eropa_lainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.eropa_lainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- AMERIKA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="amerika">{{ trans('cruds.dataKunjungan.fields.amerika') }}</label>
                                <input class="form-control {{ $errors->has('amerika') ? 'is-invalid' : '' }}"
                                    type="number" name="amerika" id="amerika"
                                    value="{{ old('amerika', $dataKunjungan->amerika) }}" step="1">
                                @if ($errors->has('amerika'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amerika') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.amerika_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class
                                        for="amerika_serikat">{{ trans('cruds.dataKunjungan.fields.amerika_serikat') }}</label>
                                    <input class="form-control {{ $errors->has('amerika_serikat') ? 'is-invalid' : '' }}"
                                        type="number" name="amerika_serikat" id="amerika_serikat"
                                        value="{{ old('amerika_serikat', $dataKunjungan->amerika_serikat) }}"
                                        step="1">
                                    @if ($errors->has('amerika_serikat'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amerika_serikat') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.amerika_serikat_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="kanada">{{ trans('cruds.dataKunjungan.fields.kanada') }}</label>
                                    <input class="form-control {{ $errors->has('kanada') ? 'is-invalid' : '' }}"
                                        type="number" name="kanada" id="kanada"
                                        value="{{ old('kanada', $dataKunjungan->kanada) }}" step="1">
                                    @if ($errors->has('kanada'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('kanada') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.kanada_helper') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class for="brazil">{{ trans('cruds.dataKunjungan.fields.brazil') }}</label>
                                    <input class="form-control {{ $errors->has('brazil') ? 'is-invalid' : '' }}"
                                        type="number" name="brazil" id="brazil"
                                        value="{{ old('brazil', $dataKunjungan->brazil) }}" step="1">
                                    @if ($errors->has('brazil'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('brazil') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.brazil_helper') }}</span><br>
                                </div>
                                <div class="col-md-6">
                                    <label class for="meksiko">{{ trans('cruds.dataKunjungan.fields.meksiko') }}</label>
                                    <input class="form-control {{ $errors->has('meksiko') ? 'is-invalid' : '' }}"
                                        type="number" name="meksiko" id="meksiko"
                                        value="{{ old('meksiko', $dataKunjungan->meksiko) }}" step="1">
                                    @if ($errors->has('meksiko'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('meksiko') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.meksiko_helper') }}</span><br>
                                </div>
                                <div class="col-md-6">
                                    <label class
                                        for="amerika_lainnya">{{ trans('cruds.dataKunjungan.fields.amerika_lainnya') }}</label>
                                    <input class="form-control {{ $errors->has('amerika_lainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="amerika_lainnya" id="amerika_lainnya"
                                        value="{{ old('amerika_lainnya', $dataKunjungan->amerika_lainnya) }}"
                                        step="1">
                                    @if ($errors->has('amerika_lainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amerika_lainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.amerika_lainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- OSEANIA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="oseania">{{ trans('cruds.dataKunjungan.fields.oseania') }}</label>
                                <input class="form-control {{ $errors->has('oseania') ? 'is-invalid' : '' }}"
                                    type="number" name="oseania" id="oseania"
                                    value="{{ old('oseania', $dataKunjungan->oseania) }}" step="1">
                                @if ($errors->has('oseania'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('oseania') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.oseania_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class
                                        for="australia">{{ trans('cruds.dataKunjungan.fields.australia') }}</label>
                                    <input class="form-control {{ $errors->has('australia') ? 'is-invalid' : '' }}"
                                        type="number" name="australia" id="australia"
                                        value="{{ old('australia', $dataKunjungan->australia) }}" step="1">
                                    @if ($errors->has('australia'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('australia') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.australia_helper') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class
                                        for="selandia_baru">{{ trans('cruds.dataKunjungan.fields.selandia_baru') }}</label>
                                    <input class="form-control {{ $errors->has('selandia_baru') ? 'is-invalid' : '' }}"
                                        type="number" name="selandia_baru" id="selandia_baru"
                                        value="{{ old('selandia_baru', $dataKunjungan->selandia_baru) }}"
                                        step="1">
                                    @if ($errors->has('selandia_baru'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('selandia_baru') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.selandia_baru_helper') }}</span><br>
                                </div>
                                <div class="col-md-6">
                                    <label class
                                        for="papua_nugini">{{ trans('cruds.dataKunjungan.fields.papua_nugini') }}</label>
                                    <input class="form-control {{ $errors->has('papua_nugini') ? 'is-invalid' : '' }}"
                                        type="number" name="papua_nugini" id="papua_nugini"
                                        value="{{ old('papua_nugini', $dataKunjungan->papua_nugini) }}" step="1">
                                    @if ($errors->has('papua_nugini'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('papua_nugini') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_nugini_helper') }}</span><br>
                                </div>
                                <div class="col-md-6">
                                    <label class
                                        for="oseania_lainnya">{{ trans('cruds.dataKunjungan.fields.oseania_lainnya') }}</label>
                                    <input class="form-control {{ $errors->has('oseania_lainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="oseania_lainnya" id="oseania_lainnya"
                                        value="{{ old('oseania_lainnya', $dataKunjungan->oseania_lainnya) }}"
                                        step="1">
                                    @if ($errors->has('oseania_lainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('oseania_lainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.oseania_lainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- AFRIKA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="afrika">{{ trans('cruds.dataKunjungan.fields.afrika') }}</label>
                                <input class="form-control {{ $errors->has('afrika') ? 'is-invalid' : '' }}"
                                    type="number" name="afrika" id="afrika"
                                    value="{{ old('afrika', $dataKunjungan->afrika) }}" step="1">
                                @if ($errors->has('afrika'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('afrika') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.afrika_helper') }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class
                                        for="afrika_selatan">{{ trans('cruds.dataKunjungan.fields.afrika_selatan') }}</label>
                                    <input class="form-control {{ $errors->has('afrika_selatan') ? 'is-invalid' : '' }}"
                                        type="number" name="afrika_selatan" id="afrika_selatan"
                                        value="{{ old('afrika_selatan', $dataKunjungan->afrika_selatan) }}"
                                        step="1">
                                    @if ($errors->has('afrika_selatan'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('afrika_selatan') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.afrika_selatan_helper') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class
                                        for="afrika_lainnya">{{ trans('cruds.dataKunjungan.fields.afrika_lainnya') }}</label>
                                    <input class="form-control {{ $errors->has('afrika_lainnya') ? 'is-invalid' : '' }}"
                                        type="number" name="afrika_lainnya" id="afrika_lainnya"
                                        value="{{ old('afrika_lainnya', $dataKunjungan->afrika_lainnya) }}"
                                        step="1">
                                    @if ($errors->has('afrika_lainnya'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('afrika_lainnya') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.dataKunjungan.fields.afrika_lainnya_helper') }}</span><br>
                                </div>
                            </div>
                            {{-- TOTAL MANCANEGARA --}}
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="total_mancanegara">{{ trans('cruds.dataKunjungan.fields.total_mancanegara') }}</label>
                                <input
                                    class="form-control {{ $errors->has('total_mancanegara') ? 'is-invalid' : '' }} bg-secondary text-black"
                                    type="number" name="total_mancanegara" id="total_mancanegara"
                                    value="{{ old('total_mancanegara', $dataKunjungan->total_mancanegara) }}"
                                    step="1">
                                @if ($errors->has('total_mancanegara'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('total_mancanegara') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block text-black">{{ trans('cruds.dataKunjungan.fields.total_mancanegara_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="start_date">{{ trans('cruds.dataKunjungan.fields.start_date') }}</label>
                                <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                    type="date" name="start_date" id="start_date"
                                    value="{{ old('start_date', $dataKunjungan->start_date) }}">
                                @if ($errors->has('start_date'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('start_date') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Isi form-group pertama di sini -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="jawa">{{ trans('cruds.dataKunjungan.fields.jawa') }}</label>
                            <input class="form-control {{ $errors->has('jawa') ? 'is-invalid' : '' }}" type="number"
                                name="jawa" id="jawa" value="{{ old('jawa', $dataKunjungan->jawa) }}"
                                step="1">
                            @if ($errors->has('jawa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jawa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.jawa_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class
                                    for="jawa_timur">{{ trans('cruds.dataKunjungan.fields.jawa_timur') }}</label>
                                <input class="form-control {{ $errors->has('jawa_timur') ? 'is-invalid' : '' }}"
                                    type="number" name="jawa_timur" id="jawa_timur"
                                    value="{{ old('jawa_timur', $dataKunjungan->jawa_timur) }}" step="1">
                                @if ($errors->has('jawa_timur'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jawa_timur') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.jawa_timur_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="jawa_barat">{{ trans('cruds.dataKunjungan.fields.jawa_barat') }}</label>
                                <input class="form-control {{ $errors->has('jawa_barat') ? 'is-invalid' : '' }}"
                                    type="number" name="jawa_barat" id="jawa_barat"
                                    value="{{ old('jawa_barat', $dataKunjungan->jawa_barat) }}" step="1">
                                @if ($errors->has('jawa_barat'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jawa_barat') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.jawa_barat_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="jawa_tengah">{{ trans('cruds.dataKunjungan.fields.jawa_tengah') }}</label>
                                <input class="form-control {{ $errors->has('jawa_tengah') ? 'is-invalid' : '' }}"
                                    type="number" name="jawa_tengah" id="jawa_tengah"
                                    value="{{ old('jawa_tengah', $dataKunjungan->jawa_tengah) }}" step="1">
                                @if ($errors->has('jawa_tengah'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jawa_tengah') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.jawa_tengah_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="diy">{{ trans('cruds.dataKunjungan.fields.diy') }}</label>
                                <input class="form-control {{ $errors->has('diy') ? 'is-invalid' : '' }}" type="number"
                                    name="diy" id="diy" value="{{ old('diy', $dataKunjungan->diy) }}"
                                    step="1">
                                @if ($errors->has('diy'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('diy') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.diy_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="dki">{{ trans('cruds.dataKunjungan.fields.dki') }}</label>
                                <input class="form-control {{ $errors->has('dki') ? 'is-invalid' : '' }}" type="number"
                                    name="dki" id="dki" value="{{ old('dki', $dataKunjungan->dki) }}"
                                    step="1">
                                @if ($errors->has('dki'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('dki') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.dki_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="banten">{{ trans('cruds.dataKunjungan.fields.banten') }}</label>
                                <input class="form-control {{ $errors->has('banten') ? 'is-invalid' : '' }}"
                                    type="number" name="banten" id="banten"
                                    value="{{ old('banten', $dataKunjungan->banten) }}" step="1">
                                @if ($errors->has('banten'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('banten') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.banten_helper') }}</span><br>
                            </div>
                        </div>
                        {{-- KALIMANTAN --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="kalimantan">{{ trans('cruds.dataKunjungan.fields.kalimantan') }}</label>
                            <input class="form-control {{ $errors->has('kalimantan') ? 'is-invalid' : '' }}"
                                type="number" name="kalimantan" id="kalimantan"
                                value="{{ old('kalimantan', $dataKunjungan->kalimantan) }}" step="1">
                            @if ($errors->has('kalimantan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kalimantan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.kalimantan_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="kaltara">{{ trans('cruds.dataKunjungan.fields.kaltara') }}</label>
                                <input class="form-control {{ $errors->has('kaltara') ? 'is-invalid' : '' }}"
                                    type="number" name="kaltara" id="kaltara"
                                    value="{{ old('kaltara', $dataKunjungan->kaltara) }}" step="1">
                                @if ($errors->has('kaltara'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kaltara') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.kaltara_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="kaltim">{{ trans('cruds.dataKunjungan.fields.kaltim') }}</label>
                                <input class="form-control {{ $errors->has('kaltim') ? 'is-invalid' : '' }}"
                                    type="number" name="kaltim" id="kaltim"
                                    value="{{ old('kaltim', $dataKunjungan->kaltim) }}" step="1">
                                @if ($errors->has('kaltim'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kaltim') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.kaltim_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="kalteng">{{ trans('cruds.dataKunjungan.fields.kalteng') }}</label>
                                <input class="form-control {{ $errors->has('kalteng') ? 'is-invalid' : '' }}"
                                    type="number" name="kalteng" id="kalteng"
                                    value="{{ old('kalteng', $dataKunjungan->kalteng) }}" step="1">
                                @if ($errors->has('kalteng'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kalteng') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.kalteng_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class for="kalbar">{{ trans('cruds.dataKunjungan.fields.kalbar') }}</label>
                                <input class="form-control {{ $errors->has('kalbar') ? 'is-invalid' : '' }}"
                                    type="number" name="kalbar" id="kalbar"
                                    value="{{ old('kalbar', $dataKunjungan->kalbar) }}" step="1">
                                @if ($errors->has('kalbar'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kalbar') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.kalbar_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class for="kalsel">{{ trans('cruds.dataKunjungan.fields.kalsel') }}</label>
                                <input class="form-control {{ $errors->has('kalsel') ? 'is-invalid' : '' }}"
                                    type="number" name="kalsel" id="kalsel"
                                    value="{{ old('kalsel', $dataKunjungan->kalsel) }}" step="1">
                                @if ($errors->has('kalsel'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kalsel') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.kalsel_helper') }}</span>
                            </div>
                        </div>
                        {{-- SUMATERA --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="sumatera">{{ trans('cruds.dataKunjungan.fields.sumatera') }}</label>
                            <input class="form-control {{ $errors->has('sumatera') ? 'is-invalid' : '' }}"
                                type="number" name="sumatera" id="sumatera"
                                value="{{ old('sumatera', $dataKunjungan->sumatera) }}" step="1">
                            @if ($errors->has('sumatera'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sumatera') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sumatera_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="aceh">{{ trans('cruds.dataKunjungan.fields.aceh') }}</label>
                                <input class="form-control {{ $errors->has('aceh') ? 'is-invalid' : '' }}"
                                    type="number" name="aceh" id="aceh"
                                    value="{{ old('aceh', $dataKunjungan->aceh) }}" step="1">
                                @if ($errors->has('aceh'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('aceh') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.aceh_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="sumut">{{ trans('cruds.dataKunjungan.fields.sumut') }}</label>
                                <input class="form-control {{ $errors->has('sumut') ? 'is-invalid' : '' }}"
                                    type="number" name="sumut" id="sumut"
                                    value="{{ old('sumut', $dataKunjungan->sumut) }}" step="1">
                                @if ($errors->has('sumut'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sumut') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sumut_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="riau">{{ trans('cruds.dataKunjungan.fields.riau') }}</label>
                                <input class="form-control {{ $errors->has('riau') ? 'is-invalid' : '' }}"
                                    type="number" name="riau" id="riau"
                                    value="{{ old('riau', $dataKunjungan->riau) }}" step="1">
                                @if ($errors->has('riau'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('riau') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.riau_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="kep_riau">{{ trans('cruds.dataKunjungan.fields.kep_riau') }}</label>
                                <input class="form-control {{ $errors->has('kep_riau') ? 'is-invalid' : '' }}"
                                    type="number" name="kep_riau" id="kep_riau"
                                    value="{{ old('kep_riau', $dataKunjungan->kep_riau) }}" step="1">
                                @if ($errors->has('kep_riau'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('kep_riau') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.kep_riau_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="jambi">{{ trans('cruds.dataKunjungan.fields.jambi') }}</label>
                                <input class="form-control {{ $errors->has('jambi') ? 'is-invalid' : '' }}"
                                    type="number" name="jambi" id="jambi"
                                    value="{{ old('jambi', $dataKunjungan->jambi) }}" step="1">
                                @if ($errors->has('jambi'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('jambi') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.jambi_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="sumbar">{{ trans('cruds.dataKunjungan.fields.sumbar') }}</label>
                                <input class="form-control {{ $errors->has('sumbar') ? 'is-invalid' : '' }}"
                                    type="number" name="sumbar" id="sumbar"
                                    value="{{ old('sumbar', $dataKunjungan->sumbar) }}" step="1">
                                @if ($errors->has('sumbar'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sumbar') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sumbar_helper') }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class for="sumsel">{{ trans('cruds.dataKunjungan.fields.sumsel') }}</label>
                                <input class="form-control {{ $errors->has('sumsel') ? 'is-invalid' : '' }}"
                                    type="number" name="sumsel" id="sumsel"
                                    value="{{ old('sumsel', $dataKunjungan->sumsel) }}" step="1">
                                @if ($errors->has('sumsel'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sumsel') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.sumsel_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class for="bangka">{{ trans('cruds.dataKunjungan.fields.bangka') }}</label>
                                <input class="form-control {{ $errors->has('bangka') ? 'is-invalid' : '' }}"
                                    type="number" name="bangka" id="bangka"
                                    value="{{ old('bangka', $dataKunjungan->bangka) }}" step="1">
                                @if ($errors->has('bangka'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bangka') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.bangka_helper') }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class for="bengkulu">{{ trans('cruds.dataKunjungan.fields.bengkulu') }}</label>
                                <input class="form-control {{ $errors->has('bengkulu') ? 'is-invalid' : '' }}"
                                    type="number" name="bengkulu" id="bengkulu"
                                    value="{{ old('bengkulu', $dataKunjungan->bengkulu) }}" step="1">
                                @if ($errors->has('bengkulu'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bengkulu') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.bengkulu_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class for="lampung">{{ trans('cruds.dataKunjungan.fields.lampung') }}</label>
                                <input class="form-control {{ $errors->has('lampung') ? 'is-invalid' : '' }}"
                                    type="number" name="lampung" id="lampung"
                                    value="{{ old('lampung', $dataKunjungan->lampung) }}" step="1">
                                @if ($errors->has('lampung'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('lampung') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.lampung_helper') }}</span><br>
                            </div>
                        </div>
                        {{-- SULAWESI --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="sulawesi">{{ trans('cruds.dataKunjungan.fields.sulawesi') }}</label>
                            <input class="form-control {{ $errors->has('sulawesi') ? 'is-invalid' : '' }}"
                                type="number" name="sulawesi" id="sulawesi"
                                value="{{ old('sulawesi', $dataKunjungan->sulawesi) }}" step="1">
                            @if ($errors->has('sulawesi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sulawesi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sulawesi_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="sulut">{{ trans('cruds.dataKunjungan.fields.sulut') }}</label>
                                <input class="form-control {{ $errors->has('sulut') ? 'is-invalid' : '' }}"
                                    type="number" name="sulut" id="sulut"
                                    value="{{ old('sulut', $dataKunjungan->sulut) }}" step="1">
                                @if ($errors->has('sulut'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sulut') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sulut_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="sulbar">{{ trans('cruds.dataKunjungan.fields.sulbar') }}</label>
                                <input class="form-control {{ $errors->has('sulbar') ? 'is-invalid' : '' }}"
                                    type="number" name="sulbar" id="sulbar"
                                    value="{{ old('sulbar', $dataKunjungan->sulbar) }}" step="1">
                                @if ($errors->has('sulbar'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sulbar') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sulbar_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="sulteng">{{ trans('cruds.dataKunjungan.fields.sulteng') }}</label>
                                <input class="form-control {{ $errors->has('sulteng') ? 'is-invalid' : '' }}"
                                    type="number" name="sulteng" id="sulteng"
                                    value="{{ old('sulteng', $dataKunjungan->sulteng) }}" step="1">
                                @if ($errors->has('sulteng'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sulteng') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.sulteng_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="sulsel">{{ trans('cruds.dataKunjungan.fields.sulsel') }}</label>
                                <input class="form-control {{ $errors->has('sulsel') ? 'is-invalid' : '' }}"
                                    type="number" name="sulsel" id="sulsel"
                                    value="{{ old('sulsel', $dataKunjungan->sulsel) }}" step="1">
                                @if ($errors->has('sulsel'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sulsel') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.sulsel_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class for="sulgara">{{ trans('cruds.dataKunjungan.fields.sulgara') }}</label>
                                <input class="form-control {{ $errors->has('sulgara') ? 'is-invalid' : '' }}"
                                    type="number" name="sulgara" id="sulgara"
                                    value="{{ old('sulgara', $dataKunjungan->sulgara) }}" step="1">
                                @if ($errors->has('sulgara'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sulgara') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.sulgara_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="gorontalo">{{ trans('cruds.dataKunjungan.fields.gorontalo') }}</label>
                                <input class="form-control {{ $errors->has('gorontalo') ? 'is-invalid' : '' }}"
                                    type="number" name="gorontalo" id="gorontalo"
                                    value="{{ old('gorontalo', $dataKunjungan->gorontalo) }}" step="1">
                                @if ($errors->has('gorontalo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gorontalo') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.gorontalo_helper') }}</span><br>
                            </div>
                        </div>
                        {{-- BALINUSTRA --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="bali_nustra">{{ trans('cruds.dataKunjungan.fields.bali_nustra') }}</label>
                            <input class="form-control {{ $errors->has('bali_nustra') ? 'is-invalid' : '' }}"
                                type="number" name="bali_nustra" id="bali_nustra"
                                value="{{ old('bali_nustra', $dataKunjungan->bali_nustra) }}" step="1">
                            @if ($errors->has('bali_nustra'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bali_nustra') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.bali_nustra_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="bali">{{ trans('cruds.dataKunjungan.fields.bali') }}</label>
                                <input class="form-control {{ $errors->has('bali') ? 'is-invalid' : '' }}"
                                    type="number" name="bali" id="bali"
                                    value="{{ old('bali', $dataKunjungan->bali) }}" step="1">
                                @if ($errors->has('bali'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bali') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.bali_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="ntb">{{ trans('cruds.dataKunjungan.fields.ntb') }}</label>
                                <input class="form-control {{ $errors->has('ntb') ? 'is-invalid' : '' }}" type="number"
                                    name="ntb" id="ntb" value="{{ old('ntb', $dataKunjungan->ntb) }}"
                                    step="1">
                                @if ($errors->has('ntb'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ntb') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.ntb_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="ntt">{{ trans('cruds.dataKunjungan.fields.ntt') }}</label>
                                <input class="form-control {{ $errors->has('ntt') ? 'is-invalid' : '' }}" type="number"
                                    name="ntt" id="ntt" value="{{ old('ntt', $dataKunjungan->ntt) }}"
                                    step="1">
                                @if ($errors->has('ntt'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ntt') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.dataKunjungan.fields.ntt_helper') }}</span><br>
                            </div>
                        </div>
                        {{-- PAPUA --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="papuaa">{{ trans('cruds.dataKunjungan.fields.papuaa') }}</label>
                            <input class="form-control {{ $errors->has('papuaa') ? 'is-invalid' : '' }}" type="number"
                                name="papuaa" id="papuaa" value="{{ old('papuaa', $dataKunjungan->papuaa) }}"
                                step="1">
                            @if ($errors->has('papuaa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('papuaa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataKunjungan.fields.papuaa_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class for="maluku">{{ trans('cruds.dataKunjungan.fields.maluku') }}</label>
                                <input class="form-control {{ $errors->has('maluku') ? 'is-invalid' : '' }}"
                                    type="number" name="maluku" id="maluku"
                                    value="{{ old('maluku', $dataKunjungan->maluku) }}" step="1">
                                @if ($errors->has('maluku'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('maluku') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.maluku_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="maluku_utara">{{ trans('cruds.dataKunjungan.fields.maluku_utara') }}</label>
                                <input class="form-control {{ $errors->has('maluku_utara') ? 'is-invalid' : '' }}"
                                    type="number" name="maluku_utara" id="maluku_utara"
                                    value="{{ old('maluku_utara', $dataKunjungan->maluku_utara) }}" step="1">
                                @if ($errors->has('maluku_utara'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('maluku_utara') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.maluku_utara_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class for="papua">{{ trans('cruds.dataKunjungan.fields.papua') }}</label>
                                <input class="form-control {{ $errors->has('papua') ? 'is-invalid' : '' }}"
                                    type="number" name="papua" id="papua"
                                    value="{{ old('papua', $dataKunjungan->papua) }}" step="1">
                                @if ($errors->has('papua'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="papua_barat">{{ trans('cruds.dataKunjungan.fields.papua_barat') }}</label>
                                <input class="form-control {{ $errors->has('papua_barat') ? 'is-invalid' : '' }}"
                                    type="number" name="papua_barat" id="papua_barat"
                                    value="{{ old('papua_barat', $dataKunjungan->papua_barat) }}" step="1">
                                @if ($errors->has('papua_barat'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua_barat') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_barat_helper') }}</span><br>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="papua_baratdaya">{{ trans('cruds.dataKunjungan.fields.papua_baratdaya') }}</label>
                                <input class="form-control {{ $errors->has('papua_baratdaya') ? 'is-invalid' : '' }}"
                                    type="number" name="papua_baratdaya" id="papua_baratdaya"
                                    value="{{ old('papua_baratdaya', $dataKunjungan->papua_baratdaya) }}"
                                    step="1">
                                @if ($errors->has('papua_baratdaya'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua_baratdaya') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_baratdaya_helper') }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class
                                    for="papua_selatan">{{ trans('cruds.dataKunjungan.fields.papua_selatan') }}</label>
                                <input class="form-control {{ $errors->has('papua_selatan') ? 'is-invalid' : '' }}"
                                    type="number" name="papua_selatan" id="papua_selatan"
                                    value="{{ old('papua_selatan', $dataKunjungan->papua_selatan) }}" step="1">
                                @if ($errors->has('papua_selatan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua_selatan') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_selatan_helper') }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class
                                    for="papua_tengah">{{ trans('cruds.dataKunjungan.fields.papua_tengah') }}</label>
                                <input class="form-control {{ $errors->has('papua_tengah') ? 'is-invalid' : '' }}"
                                    type="number" name="papua_tengah" id="papua_tengah"
                                    value="{{ old('papua_tengah', $dataKunjungan->papua_tengah) }}" step="1">
                                @if ($errors->has('papua_tengah'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua_tengah') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_tengah_helper') }}</span><br>
                            </div>
                            <div class="col-md-6">
                                <label class
                                    for="papua_pegunungan">{{ trans('cruds.dataKunjungan.fields.papua_pegunungan') }}</label>
                                <input class="form-control {{ $errors->has('papua_pegunungan') ? 'is-invalid' : '' }}"
                                    type="number" name="papua_pegunungan" id="papua_pegunungan"
                                    value="{{ old('papua_pegunungan', $dataKunjungan->papua_pegunungan) }}"
                                    step="1">
                                @if ($errors->has('papua_pegunungan'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('papua_pegunungan') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.dataKunjungan.fields.papua_pegunungan_helper') }}</span><br>
                            </div>
                        </div>
                        {{-- TOTAL NUSANTARA --}}
                        <div class="form-group">
                            <label class="font-weight-bold"
                                for="total_nusantara">{{ trans('cruds.dataKunjungan.fields.total_nusantara') }}</label>
                            <input
                                class="form-control {{ $errors->has('total_nusantara') ? 'is-invalid' : '' }} bg-secondary text-black"
                                type="number" name="total_nusantara" id="total_nusantara"
                                value="{{ old('total_nusantara', $dataKunjungan->total_nusantara) }}" step="1">
                            @if ($errors->has('total_nusantara'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_nusantara') }}
                                </div>
                            @endif
                            <span
                                class="help-block text-black">{{ trans('cruds.dataKunjungan.fields.total_nusantara_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="end_date">{{ trans('cruds.dataKunjungan.fields.end_date') }}</label>
                            <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                type="date" name="end_date" id="end_date"
                                value="{{ old('end_date', $dataKunjungan->end_date) }}">
                            @if ($errors->has('end_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="range_type">Pilih Range Waktu</label>
                    <select class="form-control" id="range_type">
                        <option value="custom">Custom</option>
                        <option value="1_week">1 Minggu</option>
                        <option value="1_month">1 Bulan</option>
                    </select>
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
    <script>
        // MANCANEGARA
        //ASEAN
        $(document).ready(function() {
            $('#malaysia, #filipina, #singapura, #thailand, #vietnam, #aseanlainnya').on('input', function() {
                var malaysiaValue = parseInt($('#malaysia').val()) || 0;
                var filipinaValue = parseInt($('#filipina').val()) || 0;
                var singapuraValue = parseInt($('#singapura').val()) || 0;
                var thailandValue = parseInt($('#thailand').val()) || 0;
                var vietnamValue = parseInt($('#vietnam').val()) || 0;
                var aseanLainnyaValue = parseInt($('#aseanlainnya').val()) || 0;

                var totalAsean = malaysiaValue + filipinaValue + singapuraValue + thailandValue +
                    vietnamValue + aseanLainnyaValue;
                $('#asean').val(totalAsean);
            });
        });
        // ASIA
        $(document).ready(function() {
            $('#hongkong, #india, #jepang, #korea_selatan, #taiwan, #tiongkok, #timor_leste, #asia_lainnya').on(
                'input',
                function() {
                    var hongkongValue = parseInt($('#hongkong').val()) || 0;
                    var indiaValue = parseInt($('#india').val()) || 0;
                    var jepangValue = parseInt($('#jepang').val()) || 0;
                    var koreaSelatanValue = parseInt($('#korea_selatan').val()) || 0;
                    var taiwanValue = parseInt($('#taiwan').val()) || 0;
                    var tiongkokValue = parseInt($('#tiongkok').val()) || 0;
                    var timorLesteValue = parseInt($('#timor_leste').val()) || 0;
                    var asiaLainnyaValue = parseInt($('#asia_lainnya').val()) || 0;

                    var totalAsia = hongkongValue + indiaValue + jepangValue + koreaSelatanValue + taiwanValue +
                        tiongkokValue + timorLesteValue + asiaLainnyaValue;
                    $('#asia').val(totalAsia);
                });
        });
        // TIMUR TENGAH
        $(document).ready(function() {
            $('#arab_saudi, #kuwait, #mesir, #uae, #yaman, #timur_tengah_lain, #asean_lainnya').on('input',
                function() {
                    var arabSaudiValue = parseInt($('#arab_saudi').val()) || 0;
                    var kuwaitValue = parseInt($('#kuwait').val()) || 0;
                    var mesirValue = parseInt($('#mesir').val()) || 0;
                    var uaeValue = parseInt($('#uae').val()) || 0;
                    var yamanValue = parseInt($('#yaman').val()) || 0;
                    var timurTengahLainValue = parseInt($('#timur_tengah_lain').val()) || 0;
                    var aseanLainnyaValue = parseInt($('#asean_lainnya').val()) || 0;

                    var totalTimurTengah = arabSaudiValue + kuwaitValue + mesirValue + uaeValue + yamanValue +
                        timurTengahLainValue + aseanLainnyaValue;
                    $('#timur_tengah').val(totalTimurTengah);
                });
        });
        // EROPA
        $(document).ready(function() {
            $('#perancis, #jerman, #belanda, #inggris, #rusia, #eropa_lainnya').on('input', function() {
                var perancisValue = parseInt($('#perancis').val()) || 0;
                var jermanValue = parseInt($('#jerman').val()) || 0;
                var belandaValue = parseInt($('#belanda').val()) || 0;
                var inggrisValue = parseInt($('#inggris').val()) || 0;
                var rusiaValue = parseInt($('#rusia').val()) || 0;
                var eropaLainnyaValue = parseInt($('#eropa_lainnya').val()) || 0;

                var totalEropa = perancisValue + jermanValue + belandaValue + inggrisValue + rusiaValue +
                    eropaLainnyaValue;
                $('#eropa').val(totalEropa);
            });
        });
        // AMERIKA
        $(document).ready(function() {
            $('#amerika_serikat, #kanada, #brazil, #meksiko, #amerika_lainnya').on('input', function() {
                var amerikaSerikatValue = parseInt($('#amerika_serikat').val()) || 0;
                var kanadaValue = parseInt($('#kanada').val()) || 0;
                var brazilValue = parseInt($('#brazil').val()) || 0;
                var meksikoValue = parseInt($('#meksiko').val()) || 0;
                var amerikaLainnyaValue = parseInt($('#amerika_lainnya').val()) || 0;

                var totalAmerika = amerikaSerikatValue + kanadaValue + brazilValue + meksikoValue +
                    amerikaLainnyaValue;
                $('#amerika').val(totalAmerika);
            });
        });
        // OSEANIA
        $(document).ready(function() {
            $('#australia, #selandia_baru, #papua_nugini, #oseania_lainnya').on('input', function() {
                var australiaValue = parseInt($('#australia').val()) || 0;
                var selandiaBaruValue = parseInt($('#selandia_baru').val()) || 0;
                var papuaNuginiValue = parseInt($('#papua_nugini').val()) || 0;
                var oseaniaLainnyaValue = parseInt($('#oseania_lainnya').val()) || 0;

                var totalOseania = australiaValue + selandiaBaruValue + papuaNuginiValue +
                    oseaniaLainnyaValue;
                $('#oseania').val(totalOseania);
            });
        });
        // AFRIKA
        $(document).ready(function() {
            $('#afrika_selatan, #afrika_lainnya').on('input', function() {
                var afrikaSelatanValue = parseInt($('#afrika_selatan').val()) || 0;
                var afrikaLainnyaValue = parseInt($('#afrika_lainnya').val()) || 0;

                var totalAfrika = afrikaSelatanValue + afrikaLainnyaValue;
                $('#afrika').val(totalAfrika);
            });
        });
        // TOTAL MANCANEGARA
        $(document).ready(function() {
            function calculateTotalMancanegara() {
                var totalAsean = parseInt($('#asean').val()) || 0;
                var totalAsia = parseInt($('#asia').val()) || 0;
                var totalTimurTengah = parseInt($('#timur_tengah').val()) || 0;
                var totalEropa = parseInt($('#eropa').val()) || 0;
                var totalAmerika = parseInt($('#amerika').val()) || 0;
                var totalOseania = parseInt($('#oseania').val()) || 0;
                var totalAfrika = parseInt($('#afrika').val()) || 0;

                var totalMancanegara = totalAsean + totalAsia + totalTimurTengah + totalEropa + totalAmerika +
                    totalOseania + totalAfrika;
                $('#total_mancanegara').val(totalMancanegara);
            }

            // Panggil fungsi calculateTotalMancanegara setiap kali ada perubahan nilai pada input fields
            $('input').on('input', calculateTotalMancanegara);
        });

        //NUSANTARA
        //JAWA
        $(document).ready(function() {
            $('#jawa_timur, #jawa_barat, #jawa_tengah, #diy, #dki, #banten').on('input', function() {
                var jawaTimurValue = parseInt($('#jawa_timur').val()) || 0;
                var jawaBaratValue = parseInt($('#jawa_barat').val()) || 0;
                var jawaTengahValue = parseInt($('#jawa_tengah').val()) || 0;
                var diyValue = parseInt($('#diy').val()) || 0;
                var dkiValue = parseInt($('#dki').val()) || 0;
                var bantenValue = parseInt($('#banten').val()) || 0;

                var totalJawa = jawaTimurValue + jawaBaratValue + jawaTengahValue + diyValue + dkiValue +
                    bantenValue;
                $('#jawa').val(totalJawa);
            });
        });
        //KALIMANTAN
        $(document).ready(function() {
            $('#kaltara, #kaltim, #kalteng, #kalbar, #kalsel').on('input', function() {
                var kaltaraValue = parseInt($('#kaltara').val()) || 0;
                var kaltimValue = parseInt($('#kaltim').val()) || 0;
                var kaltengValue = parseInt($('#kalteng').val()) || 0;
                var kalbarValue = parseInt($('#kalbar').val()) || 0;
                var kalselValue = parseInt($('#kalsel').val()) || 0;

                var totalKalimantan = kaltaraValue + kaltimValue + kaltengValue + kalbarValue + kalselValue;
                $('#kalimantan').val(totalKalimantan);
            });
        });
        //SUMATERA
        $(document).ready(function() {
            $('#aceh, #sumut, #riau, #kep_riau, #jambi, #sumbar, #sumsel, #bangka, #bengkulu, #lampung').on('input',
                function() {
                    var acehValue = parseInt($('#aceh').val()) || 0;
                    var sumutValue = parseInt($('#sumut').val()) || 0;
                    var riauValue = parseInt($('#riau').val()) || 0;
                    var kepRiauValue = parseInt($('#kep_riau').val()) || 0;
                    var jambiValue = parseInt($('#jambi').val()) || 0;
                    var sumbarValue = parseInt($('#sumbar').val()) || 0;
                    var sumselValue = parseInt($('#sumsel').val()) || 0;
                    var bangkaValue = parseInt($('#bangka').val()) || 0;
                    var bengkuluValue = parseInt($('#bengkulu').val()) || 0;
                    var lampungValue = parseInt($('#lampung').val()) || 0;

                    var totalSumatera = acehValue + sumutValue + riauValue + kepRiauValue + jambiValue +
                        sumbarValue + sumselValue + bangkaValue + bengkuluValue + lampungValue;
                    $('#sumatera').val(totalSumatera);
                });
        });
        //SULAWESI
        $(document).ready(function() {
            $('#sulut, #sulbar, #sulteng, #sulsel, #sulgara, #gorontalo').on('input', function() {
                var sulutValue = parseInt($('#sulut').val()) || 0;
                var sulbarValue = parseInt($('#sulbar').val()) || 0;
                var sultengValue = parseInt($('#sulteng').val()) || 0;
                var sulselValue = parseInt($('#sulsel').val()) || 0;
                var sulgaraValue = parseInt($('#sulgara').val()) || 0;
                var gorontaloValue = parseInt($('#gorontalo').val()) || 0;

                var totalSulawesi = sulutValue + sulbarValue + sultengValue + sulselValue + sulgaraValue +
                    gorontaloValue;
                $('#sulawesi').val(totalSulawesi);
            });
        });
        //BALINUSTRA
        $(document).ready(function() {
            $('#bali, #ntb, #ntt').on('input', function() {
                var baliValue = parseInt($('#bali').val()) || 0;
                var ntbValue = parseInt($('#ntb').val()) || 0;
                var nttValue = parseInt($('#ntt').val()) || 0;

                var totalBaliNustra = baliValue + ntbValue + nttValue;
                $('#bali_nustra').val(totalBaliNustra);
            });
        });
        //PAPUA
        $(document).ready(function() {
            $('#maluku, #maluku_utara, #papua, #papua_barat, #papua_baratdaya, #papua_selatan, #papua_tengah, #papua_pegunungan')
                .on('input', function() {
                    var malukuValue = parseInt($('#maluku').val()) || 0;
                    var malukuUtaraValue = parseInt($('#maluku_utara').val()) || 0;
                    var papuaValue = parseInt($('#papua').val()) || 0;
                    var papuaBaratValue = parseInt($('#papua_barat').val()) || 0;
                    var papuaBaratdayaValue = parseInt($('#papua_baratdaya').val()) || 0;
                    var papuaSelatanValue = parseInt($('#papua_selatan').val()) || 0;
                    var papuaTengahValue = parseInt($('#papua_tengah').val()) || 0;
                    var papuaPegununganValue = parseInt($('#papua_pegunungan').val()) || 0;

                    var totalPapuaa = malukuValue + malukuUtaraValue + papuaValue + papuaBaratValue +
                        papuaBaratdayaValue + papuaSelatanValue + papuaTengahValue + papuaPegununganValue;
                    $('#papuaa').val(totalPapuaa);
                });
        });
        //TOTAL MANCANEGARA
        $(document).ready(function() {
            function calculateTotalNusantara() {
                var totalJawa = parseInt($('#jawa').val()) || 0;
                var totalKalimantan = parseInt($('#kalimantan').val()) || 0;
                var totalSumatera = parseInt($('#sumatera').val()) || 0;
                var totalSulawesi = parseInt($('#sulawesi').val()) || 0;
                var totalBaliNustra = parseInt($('#bali_nustra').val()) || 0;
                var totalPapuaa = parseInt($('#papuaa').val()) || 0;
                var totalNusantara = totalJawa + totalKalimantan + totalSumatera + totalSulawesi + totalBaliNustra +
                    totalPapuaa;
                $('#total_nusantara').val(totalNusantara);
            }

            // Panggil fungsi calculateTotalNusantara setiap kali ada perubahan nilai pada input fields
            $('input').on('input', calculateTotalNusantara);
        });
    </script>

    <!-- <script>
        // Calculate totalMancanegara based on the date range inputs
        $(document).ready(function() {
            function calculateTotalMancanegara() {
                var totalAsean = parseInt($('#asean').val()) || 0;
                var totalAsia = parseInt($('#asia').val()) || 0;
                // ... (other calculations)
                var totalMancanegara = totalAsean + totalAsia + /* ... */ ;

                $('#total_mancanegara').val(totalMancanegara);
            }

            // Call the calculateTotalMancanegara function whenever there's a change in input fields or date range inputs
            $('input').on('input', calculateTotalMancanegara);
            $('input[type="date"]').on('change', calculateTotalMancanegara);
        });
    </script> -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rangeTypeSelect = document.getElementById("range_type");
            const startDateInput = document.getElementById("start_date");
            const endDateInput = document.getElementById("end_date");

            rangeTypeSelect.addEventListener("change", function() {
                const selectedValue = rangeTypeSelect.value;

                if (selectedValue === "1_week") {
                    const startDate = new Date();
                    const endDate = new Date();
                    endDate.setDate(startDate.getDate() + 7);

                    startDateInput.value = startDate.toISOString().substr(0, 10);
                    endDateInput.value = endDate.toISOString().substr(0, 10);
                } else if (selectedValue === "1_month") {
                    const startDate = new Date();
                    const endDate = new Date(startDate);
                    endDate.setMonth(startDate.getMonth() + 1);

                    startDateInput.value = startDate.toISOString().substr(0, 10);
                    endDateInput.value = endDate.toISOString().substr(0, 10);
                } else {
                    startDateInput.value = "";
                    endDateInput.value = "";
                }
            });
        });
    </script>
@endsection
