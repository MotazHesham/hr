@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.last_name') }}
                        </th>
                        <td>
                            {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.job_number') }}
                        </th>
                        <td>
                            {{ $user->job_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $user->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.identity_end_date') }}
                        </th>
                        <td>
                            {{ $user->identity_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.birthday') }}
                        </th>
                        <td>
                            {{ $user->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\User::GENDER_SELECT[$user->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.image') }}
                        </th>
                        <td>
                            @if($user->image)
                                <a href="{{ $user->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_families" role="tab" data-toggle="tab">
                {{ trans('cruds.family.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.userDocument.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_contracts" role="tab" data-toggle="tab">
                {{ trans('cruds.contract.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_attendances" role="tab" data-toggle="tab">
                {{ trans('cruds.attendance.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_rewards" role="tab" data-toggle="tab">
                {{ trans('cruds.reward.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_families">
            @includeIf('admin.users.relationships.userFamilies', ['families' => $user->userFamilies])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_documents">
            @includeIf('admin.users.relationships.userUserDocuments', ['userDocuments' => $user->userUserDocuments])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_contracts">
            @includeIf('admin.users.relationships.userContracts', ['contracts' => $user->userContracts])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_attendances">
            @includeIf('admin.users.relationships.userAttendances', ['attendances' => $user->userAttendances])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_rewards">
            @includeIf('admin.users.relationships.userRewards', ['rewards' => $user->userRewards])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection