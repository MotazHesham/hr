@extends('layouts.admin')

@section('styles')
    <style>
        .nav-tabs .nav-item .nav-link {
            padding: 12px;
            color: #5D6D7E
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .user-image {
            border-radius: 100px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.5);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.5);
            margin-bottom: 20px
        }

    </style>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                @if ($user->image)
                                    <a href="{{ $user->image->getUrl() }}" target="_blank">
                                        <img src="{{ $user->image->getUrl('preview') }}" width="120" height="120"
                                            class="user-image">
                                    </a>
                                @else
                                    <a href="{{ asset('user.png') }}" target="_blank">
                                        <img src="{{ asset('user.png') }}" width="120" height="120"
                                            class="user-image">
                                    </a>
                                @endif
                                <br>
                                {{ $user->name }} {{ $user->last_name }}
                            </div>
                            <div class="card-body">
                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.email') }}
                                    </span>
                                    <span>
                                        {{ $user->email }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.job_number') }}
                                    </span>
                                    <span>
                                        {{ $user->job_number }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.phone') }}
                                    </span>
                                    <span>
                                        {{ $user->phone }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.identity_number') }}
                                    </span>
                                    <span>
                                        {{ $user->identity_number }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.identity_end_date') }}
                                    </span>
                                    <span>
                                        {{ $user->identity_end_date }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.birthday') }}
                                    </span>
                                    <span>
                                        {{ $user->birthday }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.gender') }}
                                    </span>
                                    <span>
                                        {{ App\Models\User::GENDER_SELECT[$user->gender] ?? '' }}
                                    </span>
                                </div>

                                <br>

                                <div>
                                    <span class="badge badge-info">
                                        {{ trans('cruds.user.fields.roles') }}
                                    </span>
                                    <span>
                                        @foreach ($user->roles as $key => $roles)
                                            <span class="badge badge-success">{{ $roles->title }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#user_contracts" role="tab" data-toggle="tab">
                                        <i class="fas fa-file-signature"></i>
                                        {{ trans('cruds.contract.title') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_user_documents" role="tab" data-toggle="tab">
                                        <i class="fas fa-file-import"></i>
                                        {{ trans('cruds.userDocument.title') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_families" role="tab" data-toggle="tab">
                                        <i class="fas fa-child"></i>
                                        {{ trans('cruds.family.title') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_attendances" role="tab" data-toggle="tab">
                                        <i class="far fa-calendar-check"></i>
                                        {{ trans('cruds.attendance.title') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_rewards" role="tab" data-toggle="tab">
                                        <i class="fas fa-trophy"></i>
                                        {{ trans('cruds.reward.title') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_vacation_requests" role="tab" data-toggle="tab">
                                        <i class="far fa-bookmark"></i>
                                        {{ trans('cruds.vacationRequest.title') }}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" style="padding: 20px">
                                <div class="tab-pane active" role="tabpanel" id="user_contracts">
                                    @includeIf('admin.users.relationships.userContracts', ['contracts' =>
                                    $user->userContracts()->orderBy('created_at','desc')->get()])
                                </div>
                                <div class="tab-pane" role="tabpanel" id="user_user_documents">
                                    @includeIf('admin.users.relationships.userUserDocuments', ['userDocuments' =>
                                    $user->userUserDocuments()->orderBy('created_at','desc')->get()])
                                </div>
                                <div class="tab-pane" role="tabpanel" id="user_families">
                                    @includeIf('admin.users.relationships.userFamilies', ['families' =>
                                    $user->userFamilies()->orderBy('created_at','desc')->get()])
                                </div>
                                <div class="tab-pane" role="tabpanel" id="user_attendances">
                                    @includeIf('admin.users.relationships.userAttendances', ['attendances' =>
                                    $user->userAttendances()->orderBy('created_at','desc')->get()])
                                </div>
                                <div class="tab-pane" role="tabpanel" id="user_rewards">
                                    @includeIf('admin.users.relationships.userRewards', ['rewards' =>
                                    $user->userRewards()->orderBy('created_at','desc')->get()])
                                </div>
                                <div class="tab-pane" role="tabpanel" id="user_vacation_requests">
                                    @includeIf('admin.users.relationships.userVacationRequests', ['vacationRequests' =>
                                    $user->userVacationRequests()->orderBy('created_at','desc')->get()])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        function editModal(route) {
            var errorContainer =
                '<div class="alert alert-danger" style="display: none" id="jquery-error-edit-modal">  </div>';
            $.ajax({
                url: route,
                method: 'GET',
                success: function(data) {
                    $('#editModal').modal('show'); 
                    $('#editModal .modal-body').html(errorContainer + data); 
                }
            });
        } 
    </script>

@endsection
