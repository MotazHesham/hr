<?php

namespace App\Http\Requests;

use App\Models\UserDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUserDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:user_documents,id',
        ];
    }
}
