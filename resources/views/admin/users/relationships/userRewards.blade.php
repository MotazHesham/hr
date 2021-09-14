@can('reward_create') 
    @include('admin.rewards.partials.create')
@endcan

<div class="card"> 
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userRewards">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reward.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reward.fields.value') }}
                        </th>
                        <th>
                            {{ trans('cruds.reward.fields.type') }}
                        </th> 
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rewards as $key => $reward)
                        <tr data-entry-id="{{ $reward->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reward->id ?? '' }}
                            </td>
                            <td>
                                {{ $reward->value ?? '' }}
                            </td>
                            <td>
                                {{ trans('global.reward_type.'.$reward->type)?? '' }}
                            </td> 
                            <td> 

                                @can('reward_edit')
                                    <button onclick="editModal('{{ route('admin.rewards.editPartials', $reward->id) }}')"
                                        title="{{ trans('global.edit') }}"
                                        class="btn btn-outline-success btn-pill action-buttons-edit">
                                        <i class="fa fa-edit actions-custom-i"></i>
                                    </button>
                                @endcan
        
                                @can('reward_delete')
                                    <?php $route = route('admin.rewards.destroy', $reward->id); ?>
                                    <button onclick="deleteConfirmation('{{ $route }}','#user_rewards',true)"
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

        $(document).on('submit', '#add-reward', function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $('#jquery-error-reward').html(null);
            $('#jquery-error-reward').css('display', 'none');
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                success: function(data) {
                    showFrontendAlert('success', '{{ trans('global.flash.created') }}', '');
                    $('#user_rewards').html(null);
                    $('#user_rewards').html(data);
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#jquery-error-reward').css('display', 'block');
                        let response = $.parseJSON(data.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#jquery-error-reward').append("<p> " + value + " </p>");
                        });
                    }
                }
            })
        })

        $(document).on('submit', '#edit-reward', function(event) {
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
                    $('#user_rewards').html(null);
                    $('#user_rewards').html(data);
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
