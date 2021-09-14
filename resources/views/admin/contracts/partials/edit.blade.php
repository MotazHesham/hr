

<form method="POST" action="{{ route("admin.contracts.update", [$contract->id]) }}" enctype="multipart/form-data"  id="edit-contract">
    @method('PUT')
    @csrf

    <input type="hidden" name="user_id" value="{{ $contract->user->id ?? '' }}">
    <input type="hidden" name="partials">

    <div class="form-group">
        <label class="required" for="salery">{{ trans('cruds.contract.fields.salery') }}</label>
        <input class="form-control {{ $errors->has('salery') ? 'is-invalid' : '' }}" type="number" name="salery" id="salery" value="{{ old('salery', $contract->salery) }}" step="0.01" required>
        @if($errors->has('salery'))
            <div class="invalid-feedback">
                {{ $errors->first('salery') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.contract.fields.salery_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="start_date">{{ trans('cruds.contract.fields.start_date') }}</label>
        <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $contract->start_date) }}" required>
        @if($errors->has('start_date'))
            <div class="invalid-feedback">
                {{ $errors->first('start_date') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.contract.fields.start_date_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="end_date">{{ trans('cruds.contract.fields.end_date') }}</label>
        <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $contract->end_date) }}" required>
        @if($errors->has('end_date'))
            <div class="invalid-feedback">
                {{ $errors->first('end_date') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.contract.fields.end_date_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="job_tasks">{{ trans('cruds.contract.fields.job_tasks') }}</label>
        <textarea class="form-control {{ $errors->has('job_tasks') ? 'is-invalid' : '' }}" name="job_tasks" id="job_tasks" required>{{ old('job_tasks', $contract->job_tasks) }}</textarea>
        @if($errors->has('job_tasks'))
            <div class="invalid-feedback">
                {{ $errors->first('job_tasks') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.contract.fields.job_tasks_helper') }}</span>
    </div> 
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form> 