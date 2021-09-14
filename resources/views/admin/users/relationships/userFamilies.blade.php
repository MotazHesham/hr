@can('family_create')
    @include('admin.families.create')
@endcan

<div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable ">
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
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($families as $key => $family)
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

                        @can('family_edit')
                            <button onclick="editModal('{{ route('admin.families.edit', $family->id) }}')"
                                title="{{ trans('global.edit') }}"
                                class="btn btn-outline-success btn-pill action-buttons-edit">
                                <i class="fa fa-edit actions-custom-i"></i>
                            </button>
                        @endcan

                        @can('family_delete')
                            <?php $route = route('admin.families.destroy', $family->id); ?>
                            <button onclick="deleteConfirmation('{{ $route }}','#user_families',true)"
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


@section('scripts')
    @parent

    <script> 

        $(document).on('submit', '#add-user-family', function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $('#jquery-error-user-family').html(null);
            $('#jquery-error-user-family').css('display', 'none');
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                success: function(data) {
                    showFrontendAlert('success', '{{ trans('global.flash.created') }}', '');
                    $('#user_families').html(null);
                    $('#user_families').html(data);
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#jquery-error-user-family').css('display', 'block');
                        let response = $.parseJSON(data.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#jquery-error-user-family').append("<p> " + value + " </p>");
                        });
                    }
                }
            })
        })

        $(document).on('submit', '#edit-user-family', function(event) {
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
                    $('#user_families').html(null);
                    $('#user_families').html(data);
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
