<?php

namespace App\Http\Requests;

use App\Models\Dataprofil;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataprofilRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dataprofil_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
