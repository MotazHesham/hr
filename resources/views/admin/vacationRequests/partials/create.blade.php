@php
    $vacation_types = \App\Models\VacationsType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
@endphp

<button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    {{ trans('global.create') }} {{ trans('cruds.vacationRequest.title_singular') }}
</button>

<div class="card">

    <div class="card-body collapse" id="collapseExample">
        <div class="alert alert-danger" style="display: none" id="jquery-error-vacation">

        </div>
        <form method="POST" action="{{ route("admin.vacation-requests.store") }}" enctype="multipart/form-data" id="add-vacation">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="partials">
            <input type="hidden" name="status" value="pending">

            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required" for="vacation_type_id">{{ trans('cruds.vacationRequest.fields.vacation_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('vacation_type') ? 'is-invalid' : '' }}" name="vacation_type_id" id="vacation_type_id" required>
                        @foreach($vacation_types as $id => $entry)
                            <option value="{{ $id }}" {{ old('vacation_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('vacation_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vacation_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.vacationRequest.fields.vacation_type_helper') }}</span>
                </div> 
                <div class="form-group col-md-4">
                    <label class="required" for="start_date">{{ trans('cruds.vacationRequest.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.vacationRequest.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="end_date">{{ trans('cruds.vacationRequest.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.vacationRequest.fields.end_date_helper') }}</span>
                </div> 
                <div class="form-group col-md-12">
                    <label class="required" for="reason">{{ trans('cruds.vacationRequest.fields.reason') }}</label>
                    <textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" name="reason" id="reason" required>{{ old('reason') }}</textarea>
                    @if($errors->has('reason'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reason') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.vacationRequest.fields.reason_helper') }}</span>
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