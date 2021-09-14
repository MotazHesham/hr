<form method="POST" action="{{ route('admin.rewards.update', [$reward->id]) }}" enctype="multipart/form-data" id="edit-reward">
    @method('PUT')
    @csrf

    <input type="hidden" name="user_id" value="{{ $reward->user_id ?? '' }}">
    <input type="hidden" name="partials">

    <div class="form-group">
        <label class="required" for="value">{{ trans('cruds.reward.fields.value') }}</label>
        <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="number" name="value"
            id="value" value="{{ old('value', $reward->value) }}" step="0.01" required>
        @if ($errors->has('value'))
            <div class="invalid-feedback">
                {{ $errors->first('value') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.reward.fields.value_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required">{{ trans('cruds.reward.fields.type') }}</label>
        @foreach (App\Models\Reward::TYPE_RADIO as $key => $label)
            <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type"
                    value="{{ $key }}" {{ old('type', $reward->type) === (string) $key ? 'checked' : '' }}
                    required>
                <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
            </div>
        @endforeach
        @if ($errors->has('type'))
            <div class="invalid-feedback">
                {{ $errors->first('type') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.reward.fields.type_helper') }}</span>
    </div> 
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>
