<?php

namespace App\Http\Requests;

use App\Models\Paket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paket_create');
    }

    public function rules()
    {
        return [
            'dataprofil_id' => [
                'required',
            ],
            'nama_paketWisata' => [
                'string',
                'required',
            ],
            'gambar_paketWisata' => [
                'array',
                'required',
            ],
            'gambar_paketWisata.*' => [
                'required',
            ],
            // 'kode_paket' => [
            //     'string',
            //     'required',
            //     'unique:pakets',
            // ],
        ];
    }
}
