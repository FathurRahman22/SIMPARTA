@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.fasilitasWisata.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.fasilitasWisatas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.id') }}
                            </th>
                            <td>
                                {{ $fasilitasWisata->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.dataprofil') }}
                            </th>
                            <td>
                                {{ $fasilitasWisata->dataprofil->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.nama_fasilitasWisata') }}
                            </th>
                            <td>
                                {{ $fasilitasWisata->nama_fasilitasWisata }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.deskripsi_fasilitasWisata') }}
                            </th>
                            <td>
                                {{ $fasilitasWisata->deskripsi_fasilitasWisata }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.gambar_fasilitasWisata') }}
                            </th>
                            <td>
                                @foreach ($fasilitasWisata->gambar_fasilitasWisata as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.fasilitasWisatas.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
