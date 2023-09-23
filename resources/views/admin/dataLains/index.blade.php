@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datalainnya/data_lainnya_index.css') }}">
    @can('data_lain_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.data-lains.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.dataLain.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
        {{ trans('global.list') }} {{ trans('cruds.dataLain.title_singular') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-DataLain">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.tag') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.idproyek') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.nib') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.npwp') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.nama_perusahaan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.statuspm') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.jenis_perusahaan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.risiko_proyek') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.skala_usaha') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.alamat_usaha') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.kecamatan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.kelurahan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.kbli') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.judul_kbli') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.sektor') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.nama_user') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.nik') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.telp') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.mesin_peralatan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.mesin_import') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.pembelian_tanah') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.bangunan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.modal_kerja') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.lain_lain') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.investasi') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.laki_laki') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.perempuan') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataLain.fields.tki') }}
                            </th>
                            @unless (Auth::user()->roles[0]->title === 'Admin')
                                <th style="display: none;">
                                    {{ trans('cruds.dataLain.fields.statusizin') }}
                                </th>
                            @else
                                <th>
                                    {{ trans('cruds.dataLain.fields.statusizin') }}
                                </th>
                            @endunless


                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataLains as $key => $dataLain)
                            <tr data-entry-id="{{ $dataLain->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $dataLain->id ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->tag->name ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->idproyek ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->nib ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->npwp ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->nama_perusahaan ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\DataLain::STATUS_PM_SELECT[$dataLain->statuspm] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\DataLain::JENIS_PERUSAHAAN_SELECT[$dataLain->jenis_perusahaan] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\DataLain::RISIKO_PROYEK_SELECT[$dataLain->risiko_proyek] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\DataLain::SKALA_USAHA_SELECT[$dataLain->skala_usaha] ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->alamat_usaha ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->kecamatan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->kelurahan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->kbli ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->judul_kbli ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\DataLain::SEKTOR_SELECT[$dataLain->sektor] ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->nama_user ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->nik ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->email ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->telp ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->mesin_peralatan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->mesin_import ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->pembelian_tanah ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->bangunan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->modal_kerja ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->lain_lain ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->investasi ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->laki_laki ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->perempuan ?? '' }}
                                </td>
                                <td>
                                    {{ $dataLain->tki ?? '' }}
                                </td>
                                @unless (Auth::user()->roles[0]->title === 'Admin')
                                    <td style="display: none;"></td>
                                @else
                                    <td>
                                        @if ($dataLain->idproyek != null)
                                            Berizin
                                        @else
                                            Tidak Berizin
                                        @endif
                                    </td>
                                @endunless


                                <td>
                                    @can('data_lain_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.data-lains.show', $dataLain->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('data_lain_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.data-lains.edit', $dataLain->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('data_lain_delete')
                                        <form action="{{ route('admin.data-lains.destroy', $dataLain->id) }}" method="POST"
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
            @can('data_lain_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.data-lains.massDestroy') }}",
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
            let table = $('.datatable-DataLain:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
