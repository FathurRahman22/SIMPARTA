<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataLain extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const STATUS_PM_SELECT = [
        'PMDN'     => 'PMDN',
    ];

    public const JENIS_PERUSAHAAN_SELECT = [
        'cv'     => 'Persekutuan Komanditer (CV / Commanditaire Vennootschap)',
        'pt' => 'Perseroan Terbatas (PT)',
        'perorangan' => 'Perorangan',
        'koperasi' => 'Koperasi',
        'badan_hukum' => 'Badan Hukum Lainnya',
    ];

    public const RISIKO_PROYEK_SELECT = [
        'rendah'     => 'Rendah',
        'menengah_rendah' => 'Menengah Rendah',
        'menengah_tinggi' => 'Menengah Tinggi',
        'tinggi' => 'Tinggi',
    ];

    public const SKALA_USAHA_SELECT = [
        'usaha_kecil'     => 'Usaha Kecil',
        'usaha_mikro' => 'Usaha Mikro',
        'usaha_menengah' => 'Usaha Menengah',
        'tinggi' => 'Usaha Besar',
    ];


    public const KECAMATAN_SELECT = [
        // 'batu'     => 'Batu',
        // 'junrejo'     => 'Junrejo',
        // 'bumiaji'     => 'Bumiaji',
    ];

    public const KELURAHAN_SELECT = [
        // 'oro-oro_ombo'     => 'oro-oro_ombo',
        // 'pesanggrahan'     => 'pesanggrahan',
        // 'sidomulyo'        => 'sidomulyo',
        // 'sumberejo'        => 'Sumberejo',
        // 'ngaglik'          => 'Ngaglik',
        // 'sisir'            => 'Sisir',
        // 'songgokerto'      => 'Songgokerto',
        // 'temas'            => 'Temas',
        // 'bulukerto'        => 'Bulukerto',
        // 'giripurno'        => 'Giripurno',
        // 'gunungsari	'      => 'Gunungsari',
        // 'punten'           => 'Punten',
        // 'sumbergondo'	   => 'Sumbergondo',
        // 'tulungrejo'	   => 'Tulungrejo',
        // 'sumber_brantas'   => 'Sumber Brantas',
        // 'beji'	           => 'Beji',
        // 'dadaprejo'	       => 'dadaprejo',
        // 'junrejo'	       => 'junrejo',
        // 'mojorejo'         => 'mojorejo',
        // 'pendem'	       => 'pendem',
        // 'tlekung'	       => 'tlekung',
        // 'torongrejo'	   => 'torongrejo',
    ];

    public const SEKTOR_SELECT = [
        'kementerian_pariwisata'     => 'Kementerian Pariwisata',
    ];

    // public const DAFTAR_USAHA_SELECT = [
    //     'penginapan' => 'Penginapan',
    //     'dtw' => 'Daya Tarik Wisata',
    //     'restoran' => 'Restoran',
    //     'cafe' => 'Cafe',
    //     'karaoke' => 'Karaoke/Bar',
    //     'spa' => 'Spa/Rumah Pijat',
    //     'mice' => 'MICE',
    // ];

    // public const SUB_USAHA_SELECT = [
    //     'hotel'     => 'Hotel',
    //     'dtw_alam' => 'Daya Tarik Wisata Alam',
    // ];


    public $table = 'data_lains';

    // protected $appends = [
    //     'bukti_pembayaran',
    // ];

    protected $dates = [
        // 'tanggal_pemesanan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        // 'status_izin',
        'tag_id',
        'idproyek',
        'nib',
        'npwp',
        'nama_perusahaan',
        'statuspm',
        'jenis_perusahaan',
        'risiko_proyek',
        'skala_usaha',
        'alamat_usaha',
        'kecamatan',
        'kelurahan',
        'kbli',
        'judul_kbli',
        'sektor',
        'nama_user',
        'nik',
        'email',
        'telp',
        'mesin_peralatan',
        'mesin_import',
        'pembelian_tanah',
        'bangunan',
        'modal_kerja',
        'lain_lain',
        'investasi',
        'jumlah_pegawai',
        'laki_laki',
        'perempuan',
        'tki',
        'statusizin',
        // 'jumlah_tiket',
        // 'tanggal_pemesanan',
        // 'valid',
        // 'status_tiket',
        // 'status_izin',
        // 'created_at',
        // 'updated_at',
        // 'deleted_at',
    ];
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //     $this->addMediaConversion('preview')->fit('crop', 120, 120);
    // }

    // public function getTanggalPemesananAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setTanggalPemesananAttribute($value)
    // {
    //     $this->attributes['tanggal_pemesanan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    // }

    // public function getBuktiPembayaranAttribute()
    // {
    //     return $this->getMedia('bukti_pembayaran')->last();
    // }

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }
}
