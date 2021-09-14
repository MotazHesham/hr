<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'mailbox' => [
                'string',
                'required',
            ],
            'post_code' => [
                'string',
                'required',
            ],
            'building_number' => [
                'string',
                'required',
            ],
            'unit_number' => [
                'string',
                'required',
            ],
            'neighborhood' => [
                'string',
                'required',
            ],
            'street_number' => [
                'string',
                'required',
            ],
            'comrl_reg_num' => [
                'string',
                'required',
            ],
            'comrl_reg_expiry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'chamber_commerce_num' => [
                'string',
                'required',
            ],
            'chamber_commerce_expiry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'municipal_license_num' => [
                'string',
                'required',
            ],
            'municcipal_license_expiry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'civil_defense_license' => [
                'required',
                'string',
            ],
            'civil_defense_license_expiry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'facility_num_in_work_office' => [
                'string',
                'required',
            ],
            'facility_num_in_insurance' => [
                'string',
                'required',
            ],
            'tax_num' => [
                'string',
                'required',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'manager_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
