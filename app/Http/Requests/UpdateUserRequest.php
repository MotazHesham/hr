<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'job_number' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'identity_number' => [
                'string',
                'required',
            ],
            'identity_end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'birthday' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
