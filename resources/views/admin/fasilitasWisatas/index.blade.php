@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fasilitaswisata/fasilitas_wisata_index.css') }}">
    @can('fasilitasWisata_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.fasilitasWisatas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.fasilitasWisata.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
        {{ trans('global.list') }} {{ trans('cruds.fasilitasWisata.title_singular') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-fasilitasWisata">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.tag') }}
                            </th>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.nama_fasilitasWisata') }}
                            </th>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.deskripsi_fasilitasWisata') }}
                            </th>
                            <th>
                                {{ trans('cruds.fasilitasWisata.fields.gambar_fasilitasWisata') }}
                            </th>

                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitasWisatas as $key => $fasilitasWisata)
                            <tr data-entry-id="{{ $fasilitasWisata->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $fasilitasWisata->id ?? '' }}
                                </td>
                                <td>
                                    {{ $fasilitasWisata->tag->name ?? '' }}
                                </td>
                                <td>
                                    {{ $fasilitasWisata->nama_fasilitasWisata ?? '' }}
                                </td>
                                <td>
                                    {{ $fasilitasWisata->deskripsi_fasilitasWisata ?? '' }}
                                </td>
                                <td>
                                    @foreach ($fasilitasWisata->gambar_fasilitasWisata as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @can('fasilitasWisata_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.fasilitasWisatas.show', $fasilitasWisata->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('fasilitasWisata_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.fasilitasWisatas.edit', $fasilitasWisata->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('fasilitasWisata_delete')
                                        <form action="{{ route('admin.fasilitasWisatas.destroy', $fasilitasWisata->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
            @can('fasilitasWisata_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.fasilitasWisatas.massDestroy') }}",
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
            let table = $('.datatable-fasilitasWisata:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
