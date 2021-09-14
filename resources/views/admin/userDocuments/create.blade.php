
<button class="btn btn-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    {{ trans('global.create') }} {{ trans('cruds.userDocument.title_singular') }}
</button>

<div class="card">

    <div class="card-body collapse" id="collapseExample">
        <div class="alert alert-danger" style="display: none" id="jquery-error-user-document">

        </div>
        <form method="POST" action="{{ route('admin.user-documents.store') }}" enctype="multipart/form-data"
            id="add-document">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required" for="title">{{ trans('cruds.userDocument.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.userDocument.fields.title_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="number">{{ trans('cruds.userDocument.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text"
                        name="number" id="number" value="{{ old('number', '') }}" required>
                    @if ($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.userDocument.fields.number_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required"
                        for="end_date">{{ trans('cruds.userDocument.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text"
                        name="end_date" id="end_date" value="{{ old('end_date', '') }}" required>
                    @if ($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.userDocument.fields.end_date_helper') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label class="required" for="file">{{ trans('cruds.userDocument.fields.file') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}"
                        id="file-dropzone2">
                    </div>
                    @if ($errors->has('file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.userDocument.fields.file_helper') }}</span>
                </div>
            </div>
            <div class="form-group" id="loading">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        Dropzone.options.fileDropzone2 = {
            url: '{{ route('admin.user-documents.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function(file, response) {
                $('form').find('input[name="file"]').remove()
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($userDocument) && $userDocument->file)
                    var file = {!! json_encode($userDocument->file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
