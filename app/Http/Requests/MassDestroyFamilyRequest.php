<?php

namespace App\Http\Requests;

use App\Models\Family;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFamilyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('family_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:families,id',
        ];
    }
}
