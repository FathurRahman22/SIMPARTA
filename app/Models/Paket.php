<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Paket extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'pakets';

    protected $appends = [
        'gambar_paketWisata',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dataprofil_id',
        'nama_paketWisata',
        'deskripsi_paketWisata',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getGambarPaketWisataAttribute()
    {
        $files = $this->getMedia('gambar_paketWisata');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }
    public function getPdfPaketWisataAttribute()
    {
        $pdfFiles = $this->getMedia('pdf_paketWisata');
        $pdfFiles->each(function ($item) {
            $item->url = $item->getUrl();
            // Jika Anda ingin menambahkan konversi untuk PDF juga, Anda dapat melakukannya di sini.
        });
    
        return $pdfFiles;
    }
    public function dataprofil()
    {
        return $this->belongsTo(Dataprofil::class, 'dataprofil_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
