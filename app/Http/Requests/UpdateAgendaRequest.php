<?php

namespace App\Http\Requests;

use App\Models\Agenda;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAgendaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agenda_edit');
    }

    public function rules()
    {
        return [
            'tag_id' => [
                'required',
            ],
            'nama_agenda' => [
                'string',
                'required',
            ],
            'gambar_agenda' => [
                'array',
                'required',
            ],
            'gambar_agenda.*' => [
                'required',
            ],
        ];
    }
}
