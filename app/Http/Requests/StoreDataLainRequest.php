<?php

namespace App\Http\Requests;

use App\Models\DataLain; // Mengganti OrderTicket dengan DataLain
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataLainRequest extends FormRequest // Mengganti nama kelas StoreOrderTicketRequest menjadi StoreDataLainRequest
{
    public function authorize()
    {
        return Gate::allows('data_lain_create'); // Mengganti 'order_ticket_create' menjadi 'data_lain_create'
    }

    public function rules()
    {
        return [
            'idproyek' => [
                'nullable',
                'regex:/^R-\d+$/',
            ],
            'nib' => [
                'nullable',
                'regex:/^\d+$/',
            ],
            'npwp' => [
                'nullable',
                'regex:/^\d{13,16}$/',
            ],
            'nama_perusahaan' => [
                'required',
                'string',
            ],
            'statuspm' => [
                'nullable',
            ],
            'jenis_perusahaan' => [
                'nullable',
            ],
            'risiko_proyek' => [
                'nullable',
            ],
            'skala_usaha' => [
                'nullable',
            ],
            'alamat_usaha' => [
                'nullable',
            ],
            'kecamatan' => [
                'nullable',
            ],
            'kelurahan' => [
                'nullable',
            ],
            'kbli' => [
                'integer',
            ],
            'judul_kbli' => [
                'nullable',
                'string'
            ],
            'sektor' => [
                'nullable',
            ],
            'nama_user' => [
                'string',
            ],
            'nik' => [
                'nullable',
                'regex:/^[0-9]{16}$/',
            ],
            'email' => [
                'required',
                'email',
            ],
            'telp' => [
                'required',
                'string',
                'max:20',
            ],
            'mesin_peralatan' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'mesin_import' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'pembelian_tanah' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'bangunan' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'modal_kerja' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'lain_lain' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'investasi' => [
                'nullable',
                // 'regex:/^(Rp\s?)?[0-9.,]+$/i',
            ],
            'laki_laki' => [
                'nullable',
                'min:-12345678910111213',
                'max:12345678910111213',
            ],
            'perempuan' => [
                'nullable',
                'min:-12345678910111213',
                'max:12345678910111213',
            ],
            'tki' => [
                'integer',
                'min:-12345678910111213',
                'max:12345678910111213',
            ],
            'statusizin' => [
                'nullable',
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Harap masukkan alamat email yang valid.',
        ];
    }
}
