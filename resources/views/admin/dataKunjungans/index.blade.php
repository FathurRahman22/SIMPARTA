@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datakunjungan/data_kunjungan_index.css') }}">
    @can('data_kunjungan_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.data-kunjungans.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.dataKunjungan.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('global.list') }} {{ trans('cruds.dataKunjungan.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.data-kunjungans.filter') }}" method="POST" id="filter_form">
                @csrf
                <div class="row mb-6">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="start_date">Awal Kunjungan:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                            <input type="hidden" id="hidden_start_date" name="hidden_start_date"
                                value="{{ old('start_date') }}">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="end_date">Akhir Kunjungan:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="color: white">.</label><br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <button type="button" class="btn btn-danger" id="reset_filter">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-DataKunjungan">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.dataKunjungan.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataKunjungan.fields.tag') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataprofil.fields.daftar_usaha_pariwisata') }}
                            </th>

                            <th>
                                {{ trans('cruds.dataKunjungan.fields.total_mancanegara') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataKunjungan.fields.total_nusantara') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataKunjungan.fields.start_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.dataKunjungan.fields.end_date') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKunjungans as $key => $dataKunjungan)
                            <tr data-entry-id="{{ $dataKunjungan->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $dataKunjungan->id ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->tag->name ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->dataprofil->daftar_usaha_pariwisata ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->total_mancanegara ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->total_nusantara ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->start_date ?? '' }}
                                </td>
                                <td>
                                    {{ $dataKunjungan->end_date ?? '' }}
                                </td>

                                <td>
                                    @can('data_kunjungan_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.data-kunjungans.show', $dataKunjungan->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('data_kunjungan_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.data-kunjungans.edit', $dataKunjungan->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('data_kunjungan_delete')
                                        <form action="{{ route('admin.data-kunjungans.destroy', $dataKunjungan->id) }}"
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
                    <section>
                        @if (Auth::user()->roles[0]->title === 'Admin')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3>Total Mancanegara dan Nusantara Hotel dan Akomodasi Lainnya:</h3>
                                        <p>Mancanegara: {{ $categoryTotalsDKW['hotelMancanegaraTotal'] }}</p>
                                        <p>Nusantara: {{ $categoryTotalsDKW['hotelNusantaraTotal'] }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3>Total Mancanegara dan Nusantara Daya Tarik Wisata:</h3>
                                        <p>Mancanegara: {{ $categoryTotalsDKW['dtwMancanegaraTotal'] }}</p>
                                        <p>Nusantara: {{ $categoryTotalsDKW['dtwNusantaraTotal'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->roles[0]->title === 'Admin')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3>Grafik Total Mancanegara dan Nusantara Hotel dan Akomodasi Lainnya:</h3>
                                        <canvas id="hotelChart"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3>Grafik Total Mancanegara dan Nusantara Daya Tarik Wisata:</h3>
                                        <canvas id="dtwChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </section><br>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        // Data untuk grafik pie chart Hotel dan Akomodasi Lainnya
        var hotelData = {
            labels: ["Mancanegara", "Nusantara"],
            datasets: [{
                data: [{{ $categoryTotalsDKW['hotelMancanegaraTotal'] }},
                    {{ $categoryTotalsDKW['hotelNusantaraTotal'] }}
                ],
                backgroundColor: ["#ff5733", "#33ff57"]
            }]
        };

        // Data untuk grafik pie chart Daya Tarik Wisata
        var dtwData = {
            labels: ["Mancanegara", "Nusantara"],
            datasets: [{
                data: [{{ $categoryTotalsDKW['dtwMancanegaraTotal'] }},
                    {{ $categoryTotalsDKW['dtwNusantaraTotal'] }}
                ],
                backgroundColor: ["#3366ff", "#ff33ff"]
            }]
        };

        // Inisialisasi grafik pie chart Hotel dan Akomodasi Lainnya
        var hotelChartCanvas = document.getElementById('hotelChart').getContext('2d');
        var hotelChart = new Chart(hotelChartCanvas, {
            type: 'pie',
            data: hotelData
        });

        // Inisialisasi grafik pie chart Daya Tarik Wisata
        var dtwChartCanvas = document.getElementById('dtwChart').getContext('2d');
        var dtwChart = new Chart(dtwChartCanvas, {
            type: 'pie',
            data: dtwData
        });
    </script>

    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('data_kunjungan_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.data-kunjungans.massDestroy') }}",
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
            let table = $('.datatable-DataKunjungan:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
    <script>
        // Temukan tombol Reset
        var resetButton = document.getElementById('reset_filter');

        // Tambahkan event listener untuk tombol Reset
        resetButton.addEventListener('click', function() {
            // Reset nilai input tanggal
            document.getElementById('start_date').value = '';
            document.getElementById('end_date').value = '';

            // Kirim formulir kembali untuk menghapus filter
            document.getElementById('filter_form').submit();
        });
    </script>
@endsection
