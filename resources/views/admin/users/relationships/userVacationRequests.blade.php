@can('vacation_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vacation-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vacationRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.vacationRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userVacationRequests">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.reason') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.vacation_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vacationRequests as $key => $vacationRequest)
                        <tr data-entry-id="{{ $vacationRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vacationRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->reason ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->end_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\VacationRequest::STATUS_SELECT[$vacationRequest->status] ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->vacation_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->user->email ?? '' }}
                            </td>
                            <td>
                                @can('vacation_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vacation-requests.show', $vacationRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vacation_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vacation-requests.edit', $vacationRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vacation_request_delete')
                                    <form action="{{ route('admin.vacation-requests.destroy', $vacationRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vacation_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vacation-requests.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-userVacationRequests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection