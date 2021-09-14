<button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    {{ trans('global.create') }} {{ trans('cruds.reward.title_singular') }}
</button>
<div class="card">

    <div class="card-body collapse" id="collapseExample">
        <div class="alert alert-danger" style="display: none" id="jquery-error-reward">

        </div>
        <form method="POST" action="{{ route("admin.rewards.store") }}" enctype="multipart/form-data" id="add-reward">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="partials">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required" for="value">{{ trans('cruds.reward.fields.value') }}</label> 
                    <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value" id="value" value="{{ old('value', '') }}" step="0.01" required>
                    @if($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reward.fields.value_helper') }}</span>
                </div>
                <div class="form-group col-md-2">
                    <label class="required">{{ trans('cruds.reward.fields.type') }}</label>
                    @foreach(App\Models\Reward::TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', '') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="type_{{ $key }}">{{ trans('global.reward_type.'.$key) }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reward.fields.type_helper') }}</span>
                </div> 
                <div class="form-group col-md-2">
                    <br>
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> 