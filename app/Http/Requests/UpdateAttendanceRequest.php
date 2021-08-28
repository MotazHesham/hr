<?php

namespace App\Http\Requests;

use App\Models\Attendance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendance_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
