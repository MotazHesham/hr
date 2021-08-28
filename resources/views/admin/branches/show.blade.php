@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.branch.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.id') }}
                        </th>
                        <td>
                            {{ $branch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.name') }}
                        </th>
                        <td>
                            {{ $branch->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.phone') }}
                        </th>
                        <td>
                            {{ $branch->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.mailbox') }}
                        </th>
                        <td>
                            {{ $branch->mailbox }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.post_code') }}
                        </th>
                        <td>
                            {{ $branch->post_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.building_number') }}
                        </th>
                        <td>
                            {{ $branch->building_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.unit_number') }}
                        </th>
                        <td>
                            {{ $branch->unit_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.neighborhood') }}
                        </th>
                        <td>
                            {{ $branch->neighborhood }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.street_number') }}
                        </th>
                        <td>
                            {{ $branch->street_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.comrl_reg_num') }}
                        </th>
                        <td>
                            {{ $branch->comrl_reg_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.comrl_reg_expiry') }}
                        </th>
                        <td>
                            {{ $branch->comrl_reg_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.chamber_commerce_num') }}
                        </th>
                        <td>
                            {{ $branch->chamber_commerce_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.chamber_commerce_expiry') }}
                        </th>
                        <td>
                            {{ $branch->chamber_commerce_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.municipal_license_num') }}
                        </th>
                        <td>
                            {{ $branch->municipal_license_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.municcipal_license_expiry') }}
                        </th>
                        <td>
                            {{ $branch->municcipal_license_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.civil_defense_license') }}
                        </th>
                        <td>
                            {{ $branch->civil_defense_license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.civil_defense_license_expiry') }}
                        </th>
                        <td>
                            {{ $branch->civil_defense_license_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.facility_num_in_work_office') }}
                        </th>
                        <td>
                            {{ $branch->facility_num_in_work_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.facility_num_in_insurance') }}
                        </th>
                        <td>
                            {{ $branch->facility_num_in_insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.tax_num') }}
                        </th>
                        <td>
                            {{ $branch->tax_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.logo') }}
                        </th>
                        <td>
                            @if($branch->logo)
                                <a href="{{ $branch->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $branch->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.comrl_reg_image') }}
                        </th>
                        <td>
                            @if($branch->comrl_reg_image)
                                <a href="{{ $branch->comrl_reg_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $branch->comrl_reg_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.chamber_of_commerce_image') }}
                        </th>
                        <td>
                            @if($branch->chamber_of_commerce_image)
                                <a href="{{ $branch->chamber_of_commerce_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $branch->chamber_of_commerce_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.vat_registeration_cerftificate') }}
                        </th>
                        <td>
                            @if($branch->vat_registeration_cerftificate)
                                <a href="{{ $branch->vat_registeration_cerftificate->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $branch->vat_registeration_cerftificate->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.city') }}
                        </th>
                        <td>
                            {{ $branch->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.facility') }}
                        </th>
                        <td>
                            {{ $branch->facility->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.manager') }}
                        </th>
                        <td>
                            {{ $branch->manager->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection