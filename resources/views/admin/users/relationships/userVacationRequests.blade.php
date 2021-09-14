@can('vacation_request_create')
    @include('admin.vacationRequests.partials.create')
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
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacationRequests as $key => $vacationRequest)
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
                                {{ trans('global.vacation_status.'.$vacationRequest->status) ?? '' }}
                            </td>
                            <td>
                                {{ $vacationRequest->vacation_type->name ?? '' }}
                            </td> 
                            <td>
                                @can('vacation_request_edit')
                                    <button onclick="editModal('{{ route('admin.vacation-requests.editPartials', $vacationRequest->id) }}')"
                                        title="{{ trans('global.edit') }}"
                                        class="btn btn-outline-success btn-pill action-buttons-edit">
                                        <i class="fa fa-edit actions-custom-i"></i>
                                    </button>
                                @endcan
        
                                @can('vacation_request_delete')
                                    <?php $route = route('admin.vacation-requests.destroy', $vacationRequest->id); ?>
                                    <button onclick="deleteConfirmation('{{ $route }}','#user_vacation_requests',true)"
                                        class="btn btn-outline-danger btn-pill action-buttons-delete">
                                        <i class="fa fa-trash actions-custom-i"></i>
                                    </button>
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
        $(document).on('submit', '#add-vacation', function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $('#jquery-error-vacation').html(null);
            $('#jquery-error-vacation').css('display', 'none');
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                success: function(data) {
                    showFrontendAlert('success', '{{ trans('global.flash.created') }}', '');
                    $('#user_vacation_requests').html(null);
                    $('#user_vacation_requests').html(data);
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#jquery-error-vacation').css('display', 'block');
                        let response = $.parseJSON(data.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#jquery-error-vacation').append("<p> " + value + " </p>");
                        });
                    }
                }
            })
        })

        $(document).on('submit', '#edit-vacation', function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $('#jquery-error-edit-modal').html(null);
            $('#jquery-error-edit-modal').css('display', 'none');
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                success: function(data) {
                    $('#editModal').modal('hide');
                    showFrontendAlert('success', '{{ trans('global.flash.updated') }}', '');
                    $('#user_vacation_requests').html(null);
                    $('#user_vacation_requests').html(data);
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#jquery-error-edit-modal').css('display', 'block');
                        let response = $.parseJSON(data.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#jquery-error-edit-modal').append("<p> " + value + " </p>");
                        });
                    }
                }
            })
        })
    </script>
@endsection
