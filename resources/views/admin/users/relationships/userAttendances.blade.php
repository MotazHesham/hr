<div class="card">
    <div class="card-header">
        {{ trans('cruds.attendance.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userAttendances">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.attendance.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendance.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendance.fields.user') }}
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
                    @foreach($attendances as $key => $attendance)
                        <tr data-entry-id="{{ $attendance->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $attendance->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Attendance::TYPE_SELECT[$attendance->type] ?? '' }}
                            </td>
                            <td>
                                {{ $attendance->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $attendance->user->email ?? '' }}
                            </td>
                            <td>



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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-userAttendances:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection