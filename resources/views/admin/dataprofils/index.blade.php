@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataprofil/data_profil_index.css') }}">
    @can('dataprofil_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.dataprofils.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.dataprofil.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
        {{ trans('global.list') }} {{ trans('cruds.dataprofil.title_singular') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-dataprofil">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.tag') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.daftar_sub_jenis_usaha') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.alamat') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.kecamatan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.kelurahan') }}
                            </th>
                            <!-- <th>
                                    {{ trans('cruds.dataprofil.fields.description') }}
                                </th> -->
                            <th>
                                {{ trans('cruds.dataprofil.fields.start_time') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.end_time') }}
                            </th>
                            <th> Map
                                <!-- {{ trans('cruds.dataprofil.fields.latitude') }}
                                    {{ trans('cruds.dataprofil.fields.longitude') }} -->
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.dataprofil_photo') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataprofils as $key => $dataprofil)
                            <tr data-entry-id="{{ $dataprofil->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $dataprofil->id ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->tag->name ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->daftar_usaha_pariwisata ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->daftar_sub_jenis_usaha ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->alamat ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->kecamatan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->kelurahan ?? '' }}
                                </td>
                                <!-- <td>
                                        {{ $dataprofil->description ?? '' }}
                                    </td> -->
                                <td>
                                    {{ $dataprofil->start_time ?? '' }}
                                </td>
                                <td>
                                    {{ $dataprofil->end_time ?? '' }}
                                </td>
                                <td>
                                    <a
                                        href="https://www.google.com/maps/search/?api=1&query={{ $dataprofil->latitude }},{{ $dataprofil->longitude }}">BUKA</a>
                                    <!-- {{ $dataprofil->latitude ?? '' }}
                                        {{ $dataprofil->longitude ?? '' }} -->
                                </td>
                                <td>
                                    @foreach ($dataprofil->dataprofil_photo as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('dataprofil_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.dataprofils.show', $dataprofil->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('dataprofil_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.dataprofils.edit', $dataprofil->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('dataprofil_delete')
                                        <form action="{{ route('admin.dataprofils.destroy', $dataprofil->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('dataprofil_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.dataprofils.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-dataprofil:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
