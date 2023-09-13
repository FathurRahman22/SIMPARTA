@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agenda.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agendas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.id') }}
                        </th>
                        <td>
                            {{ $agenda->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.dataprofil') }}
                        </th>
                        <td>
                            {{ $agenda->dataprofil->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.nama_agenda') }}
                        </th>
                        <td>
                            {{ $agenda->nama_agenda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.deskripsi_agenda') }}
                        </th>
                        <td>
                            {{ $agenda->deskripsi_agenda }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.gambar_agenda') }}
                        </th>
                        <td>
                            @foreach($agenda->gambar_agenda as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.kode_agenda') }}
                        </th>
                        <td>
                            {{ $agenda->kode_agenda }}
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agendas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection