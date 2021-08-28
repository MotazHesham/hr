<?php

namespace App\Http\Requests;

use App\Models\VacationsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVacationsTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacations_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
