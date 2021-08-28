@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facility.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.id') }}
                        </th>
                        <td>
                            {{ $facility->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.name') }}
                        </th>
                        <td>
                            {{ $facility->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.phone') }}
                        </th>
                        <td>
                            {{ $facility->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.mailbox') }}
                        </th>
                        <td>
                            {{ $facility->mailbox }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.post_code') }}
                        </th>
                        <td>
                            {{ $facility->post_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.building_number') }}
                        </th>
                        <td>
                            {{ $facility->building_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.unit_number') }}
                        </th>
                        <td>
                            {{ $facility->unit_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.neighborhood') }}
                        </th>
                        <td>
                            {{ $facility->neighborhood }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.street_number') }}
                        </th>
                        <td>
                            {{ $facility->street_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.comrl_reg_num') }}
                        </th>
                        <td>
                            {{ $facility->comrl_reg_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.comrl_reg_expiry') }}
                        </th>
                        <td>
                            {{ $facility->comrl_reg_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.chamber_commerce_num') }}
                        </th>
                        <td>
                            {{ $facility->chamber_commerce_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.chamber_commerce_expiry') }}
                        </th>
                        <td>
                            {{ $facility->chamber_commerce_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.municipal_license_num') }}
                        </th>
                        <td>
                            {{ $facility->municipal_license_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.municcipal_license_expiry') }}
                        </th>
                        <td>
                            {{ $facility->municcipal_license_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.civil_defense_license') }}
                        </th>
                        <td>
                            {{ $facility->civil_defense_license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.civil_defense_license_expiry') }}
                        </th>
                        <td>
                            {{ $facility->civil_defense_license_expiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.facility_num_in_work_office') }}
                        </th>
                        <td>
                            {{ $facility->facility_num_in_work_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.facility_num_in_insurance') }}
                        </th>
                        <td>
                            {{ $facility->facility_num_in_insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.tax_num') }}
                        </th>
                        <td>
                            {{ $facility->tax_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.logo') }}
                        </th>
                        <td>
                            @if($facility->logo)
                                <a href="{{ $facility->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $facility->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.comrl_reg_image') }}
                        </th>
                        <td>
                            @if($facility->comrl_reg_image)
                                <a href="{{ $facility->comrl_reg_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $facility->comrl_reg_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.chamber_of_commerce_image') }}
                        </th>
                        <td>
                            @if($facility->chamber_of_commerce_image)
                                <a href="{{ $facility->chamber_of_commerce_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $facility->chamber_of_commerce_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.vat_registeration_cerftificate') }}
                        </th>
                        <td>
                            @if($facility->vat_registeration_cerftificate)
                                <a href="{{ $facility->vat_registeration_cerftificate->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $facility->vat_registeration_cerftificate->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facility.fields.city') }}
                        </th>
                        <td>
                            {{ $facility->city->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facilities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection