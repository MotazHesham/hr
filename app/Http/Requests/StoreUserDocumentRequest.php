<?php

namespace App\Http\Requests;

use App\Models\UserDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_document_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'number' => [
                'string',
                'required',
            ],
            'end_date' => [
                'string',
                'required',
            ],
            'file' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
