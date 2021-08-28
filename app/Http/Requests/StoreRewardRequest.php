<?php

namespace App\Http\Requests;

use App\Models\Reward;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRewardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_create');
    }

    public function rules()
    {
        return [
            'value' => [
                'numeric',
                'required',
            ],
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
