<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKunjungan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'data_kunjungans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        //Mancanegara
         'dataprofil_id',
         'asean',
         'malaysia',
         'filipina',
         'singapura',
         'thailand',
         'vietnam',
         'aseanlainnya',
         'asia',
         'hongkong',
         'india',
         'jepang',
         'korea_selatan',
         'taiwan',
         'tiongkok',
         'timor_leste',
         'asia_lainnya',
         'timur_tengah',
         'arab_saudi',
         'kuwait',
         'mesir',
         'uae',
         'yaman',
         'timur_tengah_lain',
         'eropa',
         'perancis',
         'jerman',
         'belanda',
         'inggris',
         'rusia',
         'eropa_lainnya',
         'amerika',
         'amerika_serikat',
         'kanada',
         'brazil',
         'meksiko',
         'amerika_lainnya',
         'oseania',
         'australia',
         'selandia_baru',
         'papua_nugini',
         'oseania_lainnya',
         'afrika',
         'afrika_selatan',
         'afrika_lainnya',
         'total_mancanegara',
        //Nusantara
         'jawa',
         'jawa_timur',
         'jawa_barat',
         'jawa_tengah',
         'diy',
         'dki',
         'banten',
         'kalimantan',
         'kaltim',
         'kalteng',
         'kalbar',
         'kalsel',
         'kaltara',
         'sumatera',
         'aceh',
         'sumut',
         'riau',
         'kep_riau',
         'jambi',
         'sumbar',
         'sumsel',
         'bangka',
         'bengkulu',
         'lampung',
         'sulawesi',
         'sulut',
         'sulbar',
         'sulteng',
         'sulsel',
         'sulgara',
         'gorontalo',
         'bali_nustra',
         'bali',
         'ntb',
         'ntt',
         'papuaa',
         'maluku',
         'maluku_utara',
         'papua',
         'papua_barat',
         'papua_baratdaya',
         'papua_selatan',
         'papua_tengah',
         'papua_pegunungan',
        'total_mancanegara',
        'total_nusantara',
        'created_at',
        'updated_at',
        'deleted_at',
        'start_date',
        'end_date'
    ];

    // public const SUBMISSIONLINK_TYPE2_SELECT = [
    //     'BATU'           => 'ASEAN',
    //     'BUMIAJI'        => 'TIMUR TENGAH',
    //     'JUNREJO'        => 'EROPA',
    // ];

    // public const SUBMISSIONLINK_TYPE3_SELECT = [
    //     'OROOROOMBO'        => 'KALIMATAN',
    //     'BULUKERTO'         => 'JAWA',
    //     'JUNREJO'           => 'SULAWESI',
    // ];

    public function dataprofil()
    {
        return $this->belongsTo(Dataprofil::class, 'dataprofil_id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }}