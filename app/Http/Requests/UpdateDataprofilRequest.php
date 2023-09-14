<?php

namespace App\Http\Requests;

use App\Models\Dataprofil;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataprofilRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dataprofil_edit');
    }

    public function rules()
    {
        return [
            'tag_id' => [
                'required'
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
