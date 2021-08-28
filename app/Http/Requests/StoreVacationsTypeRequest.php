<?php

namespace App\Http\Requests;

use App\Models\VacationsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVacationsTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacations_type_create');
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
