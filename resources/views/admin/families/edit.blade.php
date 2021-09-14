


<form method="POST" action="{{ route("admin.families.update", [$family->id]) }}" enctype="multipart/form-data" id="edit-user-family">
    @method('PUT')
    @csrf

    <input type="hidden" name="user_id" value="{{ $family->user->id ?? ''}}">

    <div class="form-group">
        <label class="required" for="name">{{ trans('cruds.family.fields.name') }}</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $family->name) }}" required>
        @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.family.fields.name_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="relation">{{ trans('cruds.family.fields.relation') }}</label>
        <input class="form-control {{ $errors->has('relation') ? 'is-invalid' : '' }}" type="text" name="relation" id="relation" value="{{ old('relation', $family->relation) }}" required>
        @if($errors->has('relation'))
            <div class="invalid-feedback">
                {{ $errors->first('relation') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.family.fields.relation_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="birthday">{{ trans('cruds.family.fields.birthday') }}</label>
        <input onclick="date_after_creation(this)" class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday', $family->birthday) }}" required>
        @if($errors->has('birthday'))
            <div class="invalid-feedback">
                {{ $errors->first('birthday') }}
            </div>
        @endif
        <span class="help-block">{{ trans('cruds.family.fields.birthday_helper') }}</span>
    </div> 
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form> 
