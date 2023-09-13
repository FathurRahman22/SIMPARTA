@extends('layouts.admin')
@section('content')
@can('paket_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pakets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.paket.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.paket.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Paket">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.dataprofil') }}
                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.nama_paketWisata') }}
                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.deskripsi_paketWisata') }}
                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.gambar_paketWisata') }}
                        </th>
                        <th>
                            {{ trans('cruds.paket.fields.pdf_paketWisata') }}
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pakets as $key => $paket)
                        <tr data-entry-id="{{ $paket->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $paket->id ?? '' }}
                            </td>
                            <td>
                                {{ $paket->dataprofil->name ?? '' }}
                            </td>
                            <td>
                                {{ $paket->nama_paketWisata ?? '' }}
                            </td>
                            <td>
                                {{ $paket->deskripsi_paketWisata ?? '' }}
                            </td>
                            <td>
                                @foreach($paket->gambar_paketWisata as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
    @foreach($paket->getMedia('pdf_paketWisata') as $pdf)
        <a href="{{ $pdf->getUrl() }}" download="{{ $pdf->name }}">
            {{ $pdf->name }}
        </a><br>
    @endforeach
</td>

                           
                            <td>
                                @can('paket_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pakets.show', $paket->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('paket_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pakets.edit', $paket->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('paket_delete')
                                    <form action="{{ route('admin.pakets.destroy', $paket->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('paket_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pakets.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Paket:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection