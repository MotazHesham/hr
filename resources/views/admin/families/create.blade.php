

<button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    {{ trans('global.create') }} {{ trans('cruds.family.title_singular') }}
</button>
<div class="card">

    <div class="card-body collapse" id="collapseExample">
        <div class="alert alert-danger" style="display: none" id="jquery-error-user-family">

        </div>
        <form method="POST" action="{{ route("admin.families.store") }}" enctype="multipart/form-data" id="add-user-family">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="required" for="name">{{ trans('cruds.family.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.family.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="relation">{{ trans('cruds.family.fields.relation') }}</label>
                    <input class="form-control {{ $errors->has('relation') ? 'is-invalid' : '' }}" type="text" name="relation" id="relation" value="{{ old('relation', '') }}" required>
                    @if($errors->has('relation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('relation') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.family.fields.relation_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="birthday">{{ trans('cruds.family.fields.birthday') }}</label>
                    <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday') }}" required>
                    @if($errors->has('birthday'))
                        <div class="invalid-feedback">
                            {{ $errors->first('birthday') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.family.fields.birthday_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <br>
                    <button class="btn btn-danger action-buttons-delete" style="border-radius: 0" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> 