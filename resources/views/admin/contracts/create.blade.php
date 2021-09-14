@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contracts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="required" for="user_id">{{ trans('cruds.contract.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                        @foreach($users as $id => $entry)
                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.contract.fields.user_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="salery">{{ trans('cruds.contract.fields.salery') }}</label>
                    <input class="form-control {{ $errors->has('salery') ? 'is-invalid' : '' }}" type="number" name="salery" id="salery" value="{{ old('salery', '') }}" step="0.01" required>
                    @if($errors->has('salery'))
                        <div class="invalid-feedback">
                            {{ $errors->first('salery') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.contract.fields.salery_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="start_date">{{ trans('cruds.contract.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.contract.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="end_date">{{ trans('cruds.contract.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.contract.fields.end_date_helper') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label class="required" for="job_tasks">{{ trans('cruds.contract.fields.job_tasks') }}</label>
                    <textarea class="form-control {{ $errors->has('job_tasks') ? 'is-invalid' : '' }}" name="job_tasks" id="job_tasks" required>{{ old('job_tasks') }}</textarea>
                    @if($errors->has('job_tasks'))
                        <div class="invalid-feedback">
                            {{ $errors->first('job_tasks') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.contract.fields.job_tasks_helper') }}</span>
                </div>
                
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