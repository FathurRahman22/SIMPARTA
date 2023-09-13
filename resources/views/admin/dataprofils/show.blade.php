@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataprofil.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dataprofils.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.id') }}
                        </th>
                        <td>
                            {{ $dataprofil->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata') }}
                        </th>
                        <td>
                            {{ $dataprofil->daftar_usaha_pariwisata }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.daftar_sub_jenis_usaha') }}
                        </th>
                        <td>
                            {{ $dataprofil->daftar_sub_jenis_usaha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.name') }}
                        </th>
                        <td>
                            {{ $dataprofil->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.alamat') }}
                        </th>
                        <td>
                            {{ $dataprofil->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.kecamatan') }}
                        </th>
                        <td>
                            {{ $dataprofil->kecamatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.kelurahan') }}
                        </th>
                        <td>
                            {{ $dataprofil->kelurahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.start_time') }}
                        </th>
                        <td>
                            {{ $dataprofil->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.end_time') }}
                        </th>
                        <td>
                            {{ $dataprofil->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Maps
                        </th>
                        <td>
                            <a href="https://www.google.com/maps/search/?api=1&query={{$dataprofil->latitude}},{{$dataprofil->longitude}}">Buka</a>
                                <!-- {{ $dataprofil->latitude ?? '' }}
                                {{ $dataprofil->longitude ?? '' }} -->
                        </td>
                        {{-- <script>
                            L.marker([{{$dataprofil->latitude}}, {{$dataprofil->longitude}}]).addTo(mymap)
                .bindPopup("<p><strong><ahref='https://www.google.com/maps/search/?api=1&query={{$dataprofil->latitude}},{{$dataprofil->longitude}}' target='_blank'>Buka di Google Maps</a></p>");
                        </script> --}}
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.longitude') }}
                        </th>
                        <td>
                            {{ $dataprofil->longitude }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.dataprofil.fields.dataprofil_photo') }}
                        </th>
                        <td>
                        @foreach($dataprofil->dataprofil_photo as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dataprofils.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
