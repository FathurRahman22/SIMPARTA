<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Review extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'overview_description_image',
        'design_description_image',
        'performa_description_image',
        'layar_description_image',
        'baterai_description_image',
        'konektifitas_description_image',
    ];

    protected $fillable = [
        'title',
        'gadget_name',
        'overview_description',
        'desain_description',
        'performa_description',
        'layar_description',
        'baterai_description',
        'konektivitas_description',
        'kesimpulan',
        'tag_id',
        'read_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getOverviewDescriptionImageAttribute()
    {
        $file = $this->getMedia('overview_description_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDesignDescriptionImageAttribute()
    {
        $files = $this->getMedia('design_description_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getPerformaDescriptionImageAttribute()
    {
        $files = $this->getMedia('performa_description_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getLayarDescriptionImageAttribute()
    {
        $files = $this->getMedia('layar_description_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getBateraiDescriptionImageAttribute()
    {
        $files = $this->getMedia('baterai_description_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getKonektifitasDescriptionImageAttribute()
    {
        $files = $this->getMedia('konektifitas_description_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getMarkerColor()
{
    $colorMap = [
        'Hotel dan Akomodasi Lainnya' => 'https://e7.pngegg.com/pngimages/181/125/png-clipart-hotel-spa-real-ciudad-de-zaragoza-location-barumini-n6h-3e3-hotel-logo-london.png',
        'Daya Tarik Wisata' => 'https://w7.pngwing.com/pngs/124/659/png-transparent-homes-n-land-real-estate-computer-icons-map-map-icon-angle-grass-location.png',
        // Add more colors and business types as needed
    ];

    return $colorMap[$this->business_type] ?? 'default-marker-url.png';
}


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
