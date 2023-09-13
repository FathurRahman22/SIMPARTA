@extends('layouts.admin')
@section('content')
@can('agenda_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.agendas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.agenda.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.agenda.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Agenda">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.dataprofil') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.nama_agenda') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.deskripsi_agenda') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.gambar_agenda') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.agenda.fields.end_date') }}
                        </th>
                  
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendas as $key => $agenda)
                        <tr data-entry-id="{{ $agenda->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $agenda->id ?? '' }}
                            </td>
                            <td>
                                {{ $agenda->dataprofil->name ?? '' }}
                            </td>
                            <td>
                                {{ $agenda->nama_agenda ?? '' }}
                            </td>
                            <td>
                                {{ $agenda->deskripsi_agenda ?? '' }}
                            </td>
                            <td>
                                @foreach($agenda->gambar_agenda as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $agenda->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $agenda->end_date ?? '' }}
                            </td>
                            <td>
                                @can('agenda_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agendas.show', $agenda->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agenda_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agendas.edit', $agenda->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agenda_delete')
                                    <form action="{{ route('admin.agendas.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agenda_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agendas.massDestroy') }}",
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
  let table = $('.datatable-Agenda:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection