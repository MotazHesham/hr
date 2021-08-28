@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $userDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.title') }}
                        </th>
                        <td>
                            {{ $userDocument->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.number') }}
                        </th>
                        <td>
                            {{ $userDocument->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.end_date') }}
                        </th>
                        <td>
                            {{ $userDocument->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.file') }}
                        </th>
                        <td>
                            @if($userDocument->file)
                                <a href="{{ $userDocument->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userDocument.fields.user') }}
                        </th>
                        <td>
                            {{ $userDocument->user->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection