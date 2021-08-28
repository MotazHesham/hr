@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.family.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.id') }}
                        </th>
                        <td>
                            {{ $family->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.name') }}
                        </th>
                        <td>
                            {{ $family->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.relation') }}
                        </th>
                        <td>
                            {{ $family->relation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.birthday') }}
                        </th>
                        <td>
                            {{ $family->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.family.fields.user') }}
                        </th>
                        <td>
                            {{ $family->user->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection