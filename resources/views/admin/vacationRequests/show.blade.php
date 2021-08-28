@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vacationRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacation-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $vacationRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.reason') }}
                        </th>
                        <td>
                            {{ $vacationRequest->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.start_date') }}
                        </th>
                        <td>
                            {{ $vacationRequest->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.end_date') }}
                        </th>
                        <td>
                            {{ $vacationRequest->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\VacationRequest::STATUS_SELECT[$vacationRequest->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacationRequest.fields.vacation_type') }}
                        </th>
                        <td>
                            {{ $vacationRequest->vacation_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacation-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection