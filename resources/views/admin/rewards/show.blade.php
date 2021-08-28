@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reward.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rewards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reward.fields.id') }}
                        </th>
                        <td>
                            {{ $reward->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reward.fields.value') }}
                        </th>
                        <td>
                            {{ $reward->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reward.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Reward::TYPE_RADIO[$reward->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reward.fields.user') }}
                        </th>
                        <td>
                            {{ $reward->user->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rewards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection