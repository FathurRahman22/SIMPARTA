<?php

namespace App\Http\Requests;

use App\Models\Dataprofil;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDataprofilRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dataprofil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dataprofils,id',
        ];
    }
}
