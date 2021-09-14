@can('user_document_create')
    @include('admin.userDocuments.create')
@endcan

<div class="card"> 

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover">
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
                                @can('user_document_edit')
                                    <button onclick="editModal('{{ route('admin.user-documents.edit', $userDocument->id) }}')" title="{{ trans('global.edit') }}" class="btn btn-outline-success btn-pill action-buttons-edit">
                                        <i  class="fa fa-edit actions-custom-i"></i>
                                    </button>
                                @endcan
        
                                @can('user_document_delete') 
                                    <?php $route = route('admin.user-documents.destroy', $userDocument->id); ?>
                                    <button  onclick="deleteConfirmation('{{$route}}','#user_user_documents',true)" class="btn btn-outline-danger btn-pill action-buttons-delete">
                                        <i  class="fa fa-trash actions-custom-i"></i>
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
    $(document).on('submit','#add-document',function(event){ 
		event.preventDefault(); //prevent default action 
		var post_url = $(this).attr("action"); //get form action url
		var request_method = $(this).attr("method"); //get form GET/POST method
		var form_data = $(this).serialize(); //Encode form elements for submission
        $('#jquery-error-user-document').html(null);
        $('#jquery-error-user-document').css('display','none');

        var loading = '<div class="d-flex justify-content-center"> <div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
        $('#add-document #loading').html(loading);
        var submit = '<button class="btn btn-danger" type="submit"> {{ trans('global.save') }} </button>';
		$.ajax({
			url:post_url,
			method:request_method,
			data:form_data,
			success:function(data){
                showFrontendAlert('success', '{{trans('global.flash.created')}}', '');
                $('#user_user_documents').html(null);
                $('#user_user_documents').html(data);
			},
            error: function( data ){
                $('#add-document #loading').html(submit);
                if(data.status === 422){
                    $('#jquery-error-user-document').css('display','block');
                    let response = $.parseJSON(data.responseText);
                    $.each(response.errors, function (key, value){
                        $('#jquery-error-user-document').append("<p> " + value + " </p>");
                    });
                }
            }
		})
    })  

    $(document).on('submit','#edit-document',function(event){ 
		event.preventDefault(); //prevent default action 
		var post_url = $(this).attr("action"); //get form action url
		var request_method = $(this).attr("method"); //get form GET/POST method
		var form_data = $(this).serialize(); //Encode form elements for submission
        $('#jquery-error-edit-modal').html(null);
        $('#jquery-error-edit-modal').css('display','none');
        var loading = '<div class="d-flex justify-content-center"> <div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
        $('#editModal .modal-body #loading0').html(loading);
        var submit = '<button class="btn btn-danger" type="submit"> {{ trans('global.save') }} </button>';
		$.ajax({
			url:post_url,
			method:request_method,
			data:form_data,
			success:function(data){
                $('#editModal').modal('hide');
                showFrontendAlert('success', '{{trans('global.flash.updated')}}', '');
                $('#user_user_documents').html(null);
                $('#user_user_documents').html(data);
			},
            error: function( data ){
                $('#add-document #loading').html(submit);
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