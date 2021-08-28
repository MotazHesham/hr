@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vacationRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vacation-requests.update", [$vacationRequest->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="reason">{{ trans('cruds.vacationRequest.fields.reason') }}</label>
                <textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason" required>{{ old('reason', $vacationRequest->reason) }}</textarea>
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vacationRequest.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.vacationRequest.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $vacationRequest->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vacationRequest.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.vacationRequest.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $vacationRequest->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vacationRequest.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.vacationRequest.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\VacationRequest::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $vacationRequest->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vacationRequest.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vacation_type_id">{{ trans('cruds.vacationRequest.fields.vacation_type') }}</label>
                <select class="form-control select2 {{ $errors->has('vacation_type') ? 'is-invalid' : '' }}" name="vacation_type_id" id="vacation_type_id" required>
                    @foreach($vacation_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('vacation_type_id') ? old('vacation_type_id') : $vacationRequest->vacation_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('vacation_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vacation_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vacationRequest.fields.vacation_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection