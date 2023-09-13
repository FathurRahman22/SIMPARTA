<?php

namespace App\Http\Requests;

use App\Models\FasilitasWisata;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFasilitasWisataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fasilitasWisata_edit');
    }

    public function rules()
    {
        return [
            'nama_fasilitasWisata' => [
                'string',
                'required',
            ],
            'gambar_fasilitasWisata' => [
                'array',
                'required',
            ],
            'gambar_fasilitasWisata.*' => [
                'required',
            ],
        ];
    }
}
