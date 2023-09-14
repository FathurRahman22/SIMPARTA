<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Dataprofil extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'dataprofils';

    protected $appends = [
        'dataprofil_photo',
    ];

    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'daftar_usaha_pariwisata',
        'daftar_sub_jenis_usaha',
        'tag_id',
        'alamat',
        'kecamatan',
        'kelurahan',
        'latitude',
        'longitude',
        'description',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const KECAMATAN_SELECT = [
        // 'BATU'           => 'BATU',
        // 'BUMIAJI'        => 'BUMIAJI',
        // 'JUNREJO'        => 'JUNREJO',
    ];

    public const KELURAHAN_SELECT = [
        // 'OROOROOMBO'        => 'ORO-ORO OMBO',
        // 'BULUKERTO'         => 'BUKUKERTO',
        // 'JUNREJO'           => 'JUNREJO',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('H:i') : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat('H:i', $value)->format('H:i') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('H:i') : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat('H:i', $value)->format('H:i') : null;
    }

    public function getDataprofilPhotoAttribute()
    {
        $files = $this->getMedia('dataprofil_photo');

        $files->each(function ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        });

        return $files;
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('H:i');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
