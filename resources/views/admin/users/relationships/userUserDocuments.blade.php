@can('user_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.userDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.userDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userUserDocuments">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.userDocument.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userDocuments as $key => $userDocument)
                        <tr data-entry-id="{{ $userDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $userDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $userDocument->title ?? '' }}
                            </td>
                            <td>
                                {{ $userDocument->number ?? '' }}
                            </td>
                            <td>
                                {{ $userDocument->end_date ?? '' }}
                            </td>
                            <td>
                                @if($userDocument->file)
                                    <a href="{{ $userDocument->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $userDocument->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $userDocument->user->email ?? '' }}
                            </td>
                            <td>
                                @can('user_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.user-documents.show', $userDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user-documents.edit', $userDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_document_delete')
                                    <form action="{{ route('admin.user-documents.destroy', $userDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-documents.massDestroy') }}",
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
  let table = $('.datatable-userUserDocuments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection