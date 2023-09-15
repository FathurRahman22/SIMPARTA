<?php

namespace App\Http\Requests;

use App\Models\DataKunjungan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDataKunjunganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('data_kunjungan_create');
    }

    public function rules()
    {
        return [
            'tag_id' => [
                'required'
            ],
            'dataprofil_id' => [
                'nullable'
            ],
            'asean' => [
                'nullable', 'integer'
            ],
            'malaysia' => [
                'nullable', 'integer'
            ],
            'filipina' => [
                'nullable', 'integer'
            ],
            'singapura' => [
                'nullable', 'integer'
            ],
            'thailand' => [
                'nullable', 'integer'
            ],
            'vietnam' => [
                'nullable', 'integer'
            ],
            'aseanlainnya' => [
                'nullable', 'integer'
            ],
            'asia' => [
                'nullable', 'integer'
            ],
            'hongkong' => [
                'nullable', 'integer'
            ],
            'india' => [
                'nullable', 'integer'
            ],
            'jepang' => [
                'nullable', 'integer'
            ],
            'korea_selatan' => [
                'nullable', 'integer'
            ],
            'taiwan' => [
                'nullable', 'integer'
            ],
            'tiongkok' => [
                'nullable', 'integer'
            ],
            'timor_leste' => [
                'nullable', 'integer'
            ],
            'asia_lainnya' => [
                'nullable', 'integer'
            ],
            'timur_tengah' => [
                'nullable', 'integer'
            ],
            'arab_saudi' => [
                'nullable', 'integer'
            ],
            'kuwait' => [
                'nullable', 'integer'
            ],
            'mesir' => [
                'nullable', 'integer'
            ],
            'uae' => [
                'nullable', 'integer'
            ],
            'yaman' => [
                'nullable', 'integer'
            ],
            'timur_tengah_lain' => [
                'nullable', 'integer'
            ],
            'eropa' => [
                'nullable', 'integer'
            ],
            'perancis' => [
                'nullable', 'integer'
            ],
            'jerman' => [
                'nullable', 'integer'
            ],
            'belanda' => [
                'nullable', 'integer'
            ],
            'inggris' => [
                'nullable', 'integer'
            ],
            'rusia' => [
                'nullable', 'integer'
            ],
            'eropa_lainnya' => [
                'nullable', 'integer'
            ],
            'amerika' => [
                'nullable', 'integer'
            ],
            'amerika_serikat' => [
                'nullable', 'integer'
            ],
            'kanada' => [
                'nullable', 'integer'
            ],
            'brazil' => [
                'nullable', 'integer'
            ],
            'meksiko' => [
                'nullable', 'integer'
            ],
            'amerika_lainnya' => [
                'nullable', 'integer'
            ],
            'oseania' => [
                'nullable', 'integer'
            ],
            'australia' => [
                'nullable', 'integer'
            ],
            'selandia_baru' => [
                'nullable', 'integer'
            ],
            'papua_nugini' => [
                'nullable', 'integer'
            ],
            'oseania_lainnya' => [
                'nullable', 'integer'
            ],
            'afrika' => [
                'nullable', 'integer'
            ],
            'afrika_selatan' => [
                'nullable', 'integer'
            ],
            'afrika_lainnya' => [
                'nullable', 'integer'
            ],
            'total_mancanegara' => [
                'nullable', 'integer'
            ],
            'jawa' => [
                'nullable', 'integer'
            ],
            'jawa_timur' => [
                'nullable', 'integer'
            ],
            'jawa_barat' => [
                'nullable', 'integer'
            ],
            'jawa_tengah' => [
                'nullable', 'integer'
            ],
            'diy' => [
                'nullable', 'integer'
            ],
            'dki' => [
                'nullable', 'integer'
            ],
            'banten' => [
                'nullable', 'integer'
            ],
            'kalimantan' => [
                'nullable', 'integer'
            ],
            'kaltim' => [
                'nullable', 'integer'
            ],
            'kalteng' => [
                'nullable', 'integer'
            ],
            'kalbar' => [
                'nullable', 'integer'
            ],
            'kalsel' => [
                'nullable', 'integer'
            ],
            'kaltara' => [
                'nullable', 'integer'
            ],
            'sumatera' => [
                'nullable', 'integer'
            ],
            'aceh' => [
                'nullable', 'integer'
            ],
            'sumut' => [
                'nullable', 'integer'
            ],
            'riau' => [
                'nullable', 'integer'
            ],
            'kep_riau' => [
                'nullable', 'integer'
            ],
            'jambi' => [
                'nullable', 'integer'
            ],
            'sumbar' => [
                'nullable', 'integer'
            ],
            'sumsel' => [
                'nullable', 'integer'
            ],
            'bangka' => [
                'nullable', 'integer'
            ],
            'bengkulu' => [
                'nullable', 'integer'
            ],
            'lampung' => [
                'nullable', 'integer'
            ],
            'sulawesi' => [
                'nullable', 'integer'
            ],
            'sulut' => [
                'nullable', 'integer'
            ],
            'sulbar' => [
                'nullable', 'integer'
            ],
            'sulteng' => [
                'nullable', 'integer'
            ],
            'sulsel' => [
                'nullable', 'integer'
            ],
            'sulgara' => [
                'nullable', 'integer'
            ],
            'gorontalo' => [
                'nullable', 'integer'
            ],
            'bali_nustra' => [
                'nullable', 'integer'
            ],
            'bali' => [
                'nullable', 'integer'
            ],
            'ntb' => [
                'nullable', 'integer'
            ],
            'ntt' => [
                'nullable', 'integer'
            ],
            'papua' => [
                'nullable', 'integer'
            ],
            'maluku' => [
                'nullable', 'integer'
            ],
            'maluku_utara' => [
                'nullable', 'integer'
            ],
            'papua' => [
                'nullable', 'integer'
            ],
            'papua_barat' => [
                'nullable', 'integer'
            ],
            'papua_baratdaya' => [
                'nullable', 'integer'
            ],
            'papua_selatan' => [
                'nullable', 'integer'
            ],
            'papua_tengah' => [
                'nullable', 'integer',
            ],
            'papua_pengunungan' => [
                'nullable', 'integer'
            ],
            'total_nusantara' => [
                'nullable', 'integer'
            ],
        ];
    }
}