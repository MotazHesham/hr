<?php

namespace App\Http\Requests;

use App\Models\VacationRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVacationRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacation_request_create');
    }

    public function rules()
    {
        return [
            'reason' => [
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'status' => [
                'required',
            ],
            'vacation_type_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
