@can('family_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.families.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.family.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.family.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userFamilies">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.family.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.family.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.family.fields.relation') }}
                        </th>
                        <th>
                            {{ trans('cruds.family.fields.birthday') }}
                        </th>
                        <th>
                            {{ trans('cruds.family.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($families as $key => $family)
                        <tr data-entry-id="{{ $family->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $family->id ?? '' }}
                            </td>
                            <td>
                                {{ $family->name ?? '' }}
                            </td>
                            <td>
                                {{ $family->relation ?? '' }}
                            </td>
                            <td>
                                {{ $family->birthday ?? '' }}
                            </td>
                            <td>
                                {{ $family->user->email ?? '' }}
                            </td>
                            <td>
                                @can('family_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.families.show', $family->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('family_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.families.edit', $family->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('family_delete')
                                    <form action="{{ route('admin.families.destroy', $family->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('family_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.families.massDestroy') }}",
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
  let table = $('.datatable-userFamilies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection