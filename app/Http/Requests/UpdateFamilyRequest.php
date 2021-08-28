<?php

namespace App\Http\Requests;

use App\Models\Family;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('family_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'relation' => [
                'string',
                'required',
            ],
            'birthday' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
