<?php

namespace App\Http\Requests;

use App\Models\Paket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaketRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paket_edit');
    }

    public function rules()
    {
        return [
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
            'pdf_paketWisata' => [
                'array',
            ],
            // 'kode_paket' => [
            //     'string',
            //     'required',
            //     'unique:pakets,kode_paket,' . request()->route('paket')->id,
            // ],
        ];
    }
}
