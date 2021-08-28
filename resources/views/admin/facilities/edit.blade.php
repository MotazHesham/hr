@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.facility.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facilities.update", [$facility->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.facility.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $facility->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.facility.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $facility->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mailbox">{{ trans('cruds.facility.fields.mailbox') }}</label>
                <input class="form-control {{ $errors->has('mailbox') ? 'is-invalid' : '' }}" type="text" name="mailbox" id="mailbox" value="{{ old('mailbox', $facility->mailbox) }}" required>
                @if($errors->has('mailbox'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mailbox') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.mailbox_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="post_code">{{ trans('cruds.facility.fields.post_code') }}</label>
                <input class="form-control {{ $errors->has('post_code') ? 'is-invalid' : '' }}" type="text" name="post_code" id="post_code" value="{{ old('post_code', $facility->post_code) }}" required>
                @if($errors->has('post_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.post_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="building_number">{{ trans('cruds.facility.fields.building_number') }}</label>
                <input class="form-control {{ $errors->has('building_number') ? 'is-invalid' : '' }}" type="text" name="building_number" id="building_number" value="{{ old('building_number', $facility->building_number) }}" required>
                @if($errors->has('building_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.building_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_number">{{ trans('cruds.facility.fields.unit_number') }}</label>
                <input class="form-control {{ $errors->has('unit_number') ? 'is-invalid' : '' }}" type="text" name="unit_number" id="unit_number" value="{{ old('unit_number', $facility->unit_number) }}" required>
                @if($errors->has('unit_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.unit_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="neighborhood">{{ trans('cruds.facility.fields.neighborhood') }}</label>
                <input class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" type="text" name="neighborhood" id="neighborhood" value="{{ old('neighborhood', $facility->neighborhood) }}" required>
                @if($errors->has('neighborhood'))
                    <div class="invalid-feedback">
                        {{ $errors->first('neighborhood') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.neighborhood_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="street_number">{{ trans('cruds.facility.fields.street_number') }}</label>
                <input class="form-control {{ $errors->has('street_number') ? 'is-invalid' : '' }}" type="text" name="street_number" id="street_number" value="{{ old('street_number', $facility->street_number) }}" required>
                @if($errors->has('street_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.street_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comrl_reg_num">{{ trans('cruds.facility.fields.comrl_reg_num') }}</label>
                <input class="form-control {{ $errors->has('comrl_reg_num') ? 'is-invalid' : '' }}" type="text" name="comrl_reg_num" id="comrl_reg_num" value="{{ old('comrl_reg_num', $facility->comrl_reg_num) }}" required>
                @if($errors->has('comrl_reg_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comrl_reg_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.comrl_reg_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comrl_reg_expiry">{{ trans('cruds.facility.fields.comrl_reg_expiry') }}</label>
                <input class="form-control date {{ $errors->has('comrl_reg_expiry') ? 'is-invalid' : '' }}" type="text" name="comrl_reg_expiry" id="comrl_reg_expiry" value="{{ old('comrl_reg_expiry', $facility->comrl_reg_expiry) }}" required>
                @if($errors->has('comrl_reg_expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comrl_reg_expiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.comrl_reg_expiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="chamber_commerce_num">{{ trans('cruds.facility.fields.chamber_commerce_num') }}</label>
                <input class="form-control {{ $errors->has('chamber_commerce_num') ? 'is-invalid' : '' }}" type="text" name="chamber_commerce_num" id="chamber_commerce_num" value="{{ old('chamber_commerce_num', $facility->chamber_commerce_num) }}" required>
                @if($errors->has('chamber_commerce_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chamber_commerce_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.chamber_commerce_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="chamber_commerce_expiry">{{ trans('cruds.facility.fields.chamber_commerce_expiry') }}</label>
                <input class="form-control date {{ $errors->has('chamber_commerce_expiry') ? 'is-invalid' : '' }}" type="text" name="chamber_commerce_expiry" id="chamber_commerce_expiry" value="{{ old('chamber_commerce_expiry', $facility->chamber_commerce_expiry) }}" required>
                @if($errors->has('chamber_commerce_expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chamber_commerce_expiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.chamber_commerce_expiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="municipal_license_num">{{ trans('cruds.facility.fields.municipal_license_num') }}</label>
                <input class="form-control {{ $errors->has('municipal_license_num') ? 'is-invalid' : '' }}" type="text" name="municipal_license_num" id="municipal_license_num" value="{{ old('municipal_license_num', $facility->municipal_license_num) }}" required>
                @if($errors->has('municipal_license_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municipal_license_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.municipal_license_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="municcipal_license_expiry">{{ trans('cruds.facility.fields.municcipal_license_expiry') }}</label>
                <input class="form-control date {{ $errors->has('municcipal_license_expiry') ? 'is-invalid' : '' }}" type="text" name="municcipal_license_expiry" id="municcipal_license_expiry" value="{{ old('municcipal_license_expiry', $facility->municcipal_license_expiry) }}" required>
                @if($errors->has('municcipal_license_expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('municcipal_license_expiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.municcipal_license_expiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="civil_defense_license">{{ trans('cruds.facility.fields.civil_defense_license') }}</label>
                <input class="form-control date {{ $errors->has('civil_defense_license') ? 'is-invalid' : '' }}" type="text" name="civil_defense_license" id="civil_defense_license" value="{{ old('civil_defense_license', $facility->civil_defense_license) }}" required>
                @if($errors->has('civil_defense_license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('civil_defense_license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.civil_defense_license_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="civil_defense_license_expiry">{{ trans('cruds.facility.fields.civil_defense_license_expiry') }}</label>
                <input class="form-control date {{ $errors->has('civil_defense_license_expiry') ? 'is-invalid' : '' }}" type="text" name="civil_defense_license_expiry" id="civil_defense_license_expiry" value="{{ old('civil_defense_license_expiry', $facility->civil_defense_license_expiry) }}" required>
                @if($errors->has('civil_defense_license_expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('civil_defense_license_expiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.civil_defense_license_expiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facility_num_in_work_office">{{ trans('cruds.facility.fields.facility_num_in_work_office') }}</label>
                <input class="form-control {{ $errors->has('facility_num_in_work_office') ? 'is-invalid' : '' }}" type="text" name="facility_num_in_work_office" id="facility_num_in_work_office" value="{{ old('facility_num_in_work_office', $facility->facility_num_in_work_office) }}" required>
                @if($errors->has('facility_num_in_work_office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facility_num_in_work_office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.facility_num_in_work_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="facility_num_in_insurance">{{ trans('cruds.facility.fields.facility_num_in_insurance') }}</label>
                <input class="form-control {{ $errors->has('facility_num_in_insurance') ? 'is-invalid' : '' }}" type="text" name="facility_num_in_insurance" id="facility_num_in_insurance" value="{{ old('facility_num_in_insurance', $facility->facility_num_in_insurance) }}" required>
                @if($errors->has('facility_num_in_insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facility_num_in_insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.facility_num_in_insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax_num">{{ trans('cruds.facility.fields.tax_num') }}</label>
                <input class="form-control {{ $errors->has('tax_num') ? 'is-invalid' : '' }}" type="text" name="tax_num" id="tax_num" value="{{ old('tax_num', $facility->tax_num) }}" required>
                @if($errors->has('tax_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.tax_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.facility.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comrl_reg_image">{{ trans('cruds.facility.fields.comrl_reg_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('comrl_reg_image') ? 'is-invalid' : '' }}" id="comrl_reg_image-dropzone">
                </div>
                @if($errors->has('comrl_reg_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comrl_reg_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.comrl_reg_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="chamber_of_commerce_image">{{ trans('cruds.facility.fields.chamber_of_commerce_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('chamber_of_commerce_image') ? 'is-invalid' : '' }}" id="chamber_of_commerce_image-dropzone">
                </div>
                @if($errors->has('chamber_of_commerce_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chamber_of_commerce_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.chamber_of_commerce_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_registeration_cerftificate">{{ trans('cruds.facility.fields.vat_registeration_cerftificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('vat_registeration_cerftificate') ? 'is-invalid' : '' }}" id="vat_registeration_cerftificate-dropzone">
                </div>
                @if($errors->has('vat_registeration_cerftificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat_registeration_cerftificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.vat_registeration_cerftificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.facility.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $facility->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facility.fields.city_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.facilities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($facility) && $facility->logo)
      var file = {!! json_encode($facility->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.comrlRegImageDropzone = {
    url: '{{ route('admin.facilities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="comrl_reg_image"]').remove()
      $('form').append('<input type="hidden" name="comrl_reg_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="comrl_reg_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($facility) && $facility->comrl_reg_image)
      var file = {!! json_encode($facility->comrl_reg_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="comrl_reg_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.chamberOfCommerceImageDropzone = {
    url: '{{ route('admin.facilities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="chamber_of_commerce_image"]').remove()
      $('form').append('<input type="hidden" name="chamber_of_commerce_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="chamber_of_commerce_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($facility) && $facility->chamber_of_commerce_image)
      var file = {!! json_encode($facility->chamber_of_commerce_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="chamber_of_commerce_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.vatRegisterationCerftificateDropzone = {
    url: '{{ route('admin.facilities.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="vat_registeration_cerftificate"]').remove()
      $('form').append('<input type="hidden" name="vat_registeration_cerftificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="vat_registeration_cerftificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($facility) && $facility->vat_registeration_cerftificate)
      var file = {!! json_encode($facility->vat_registeration_cerftificate) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="vat_registeration_cerftificate" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection