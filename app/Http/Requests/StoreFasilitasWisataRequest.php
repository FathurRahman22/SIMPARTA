<?php

namespace App\Http\Requests;

use App\Models\FasilitasWisata;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFasilitasWisataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fasilitasWisata_create');
    }

    public function rules()
    {
        return [
            'dataprofil_id' => [
                'required',
            ],
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
