@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.paket.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.pakets.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.paket.fields.id') }}
                            </th>
                            <td>
                                {{ $paket->id }}
                            </td>
                        </tr>
                        <tr>
                        <th>
                                {{ trans('cruds.paket.fields.tag') }}
                            </th>
                            <td>
                                    {{ $paket->tag->name ?? '' }}
                                </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paket.fields.nama_paketWisata') }}
                            </th>
                            <td>
                                {{ $paket->nama_paketWisata }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paket.fields.deskripsi_paketWisata') }}
                            </th>
                            <td>
                                {{ $paket->deskripsi_paketWisata }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paket.fields.gambar_paketWisata') }}
                            </th>
                            <td>
                                @foreach ($paket->gambar_paketWisata as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.paket.fields.pdf_paketWisata') }}
                            </th>
                            <td>
                                @foreach ($paket->getMedia('pdf_paketWisata') as $pdf)
                                    <a href="{{ $pdf->getUrl() }}" download="{{ $pdf->name }}">
                                        {{ $pdf->name }}
                                    </a><br>
                                @endforeach
                            </td>
                        </tr>
                        {{-- <tr>
                        <th>
                            {{ trans('cruds.paket.fields.kode_paket') }}
                        </th>
                        <td>
                            {{ $paket->kode_paket }}
                        </td>
                    </tr> --}}
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.pakets.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
