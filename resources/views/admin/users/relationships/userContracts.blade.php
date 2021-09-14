@can('contract_create')
    @include('admin.contracts.partials.create')
@endcan

    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.salery') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.job_tasks') }}
                    </th> 
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $key => $contract)
                    <tr data-entry-id="{{ $contract->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $contract->id ?? '' }}
                        </td>
                        <td>
                            {{ $contract->salery ?? '' }}
                        </td>
                        <td>
                            {{ $contract->start_date ?? '' }}
                        </td>
                        <td>
                            {{ $contract->end_date ?? '' }}
                        </td>
                        <td>
                            {{ $contract->job_tasks ?? '' }}
                        </td> 
                        <td> 

                            @can('contract_edit')
                                <button onclick="editModal('{{ route('admin.contracts.editPartials', $contract->id) }}')" title="{{ trans('global.edit') }}" class="btn btn-outline-success btn-pill action-buttons-edit">
                                    <i  class="fa fa-edit actions-custom-i"></i>
                                </button>
                            @endcan

                            @can('contract_delete') 
                                <?php $route = route('admin.contracts.destroy', $contract->id); ?>
                                <button  onclick="deleteConfirmation('{{$route}}','#user_contracts',true)" class="btn btn-outline-danger btn-pill action-buttons-delete">
                                    <i  class="fa fa-trash actions-custom-i"></i>
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
    $(document).on('submit','#add-contract',function(event){ 
		event.preventDefault(); //prevent default action 
		var post_url = $(this).attr("action"); //get form action url
		var request_method = $(this).attr("method"); //get form GET/POST method
		var form_data = $(this).serialize(); //Encode form elements for submission
        $('#jquery-error-contract').html(null);
        $('#jquery-error-contract').css('display','none');
		$.ajax({
			url:post_url,
			method:request_method,
			data:form_data,
			success:function(data){
                showFrontendAlert('success', '{{trans('global.flash.created')}}', '');
                $('#user_contracts').html(null);
                $('#user_contracts').html(data);
			},
            error: function( data ){
                if(data.status === 422){
                    $('#jquery-error-contract').css('display','block');
                    let response = $.parseJSON(data.responseText);
                    $.each(response.errors, function (key, value){
                        $('#jquery-error-contract').append("<p> " + value + " </p>");
                    });
                }
            }
		})
    })  

    $(document).on('submit','#edit-contract',function(event){ 
		event.preventDefault(); //prevent default action 
		var post_url = $(this).attr("action"); //get form action url
		var request_method = $(this).attr("method"); //get form GET/POST method
		var form_data = $(this).serialize(); //Encode form elements for submission
        $('#jquery-error-edit-modal').html(null);
        $('#jquery-error-edit-modal').css('display','none');
		$.ajax({
			url:post_url,
			method:request_method,
			data:form_data,
			success:function(data){
                $('#editModal').modal('hide');
                showFrontendAlert('success', '{{trans('global.flash.updated')}}', '');
                $('#user_contracts').html(null);
                $('#user_contracts').html(data);
			},
            error: function( data ){
                if(data.status === 422){
                    $('#jquery-error-edit-modal').css('display','block');
                    let response = $.parseJSON(data.responseText);
                    $.each(response.errors, function (key, value){
                        $('#jquery-error-edit-modal').append("<p> " + value + " </p>");
                    });
                }
            }
		})
    })  
</script>

@endsection