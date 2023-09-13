<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDataprofilRequest;
use App\Http\Requests\StoreDataprofilRequest;
use App\Http\Requests\UpdateDataprofilRequest;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class DataprofilController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dataprofil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofils = Dataprofil::with(['media'])->get();


        return view('admin.dataprofils.index', compact('dataprofils'));
    }

    public function create()
    {
        abort_if(Gate::denies('dataprofil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataprofils.create');
    }

    public function store(StoreDataprofilRequest $request)
    {
        $dataprofil = Dataprofil::create($request->all());

        foreach ($request->input('dataprofil_photo', []) as $file) {
            $dataprofil->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('dataprofil_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dataprofil->id]);
        }

        return redirect()->route('admin.dataprofils.index');
    }
    // public function store(StoreEventRequest $request)
    // {
    //     $event = Event::create($request->all());

    //     foreach ($request->input('event_photo', []) as $file) {
    //         $event->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('event_photo');
    //     }

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $event->id]);
    //     }

    //     return redirect()->route('admin.events.index');
    // }

    public function edit(Dataprofil $dataprofil)
    {
        abort_if(Gate::denies('dataprofil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataprofils.edit', compact('dataprofil'));
    }

    public function update(UpdateDataprofilRequest $request, Dataprofil $dataprofil)
    {

        $dataprofil->update($request->all());

        if (count($dataprofil->dataprofil_photo) > 0) {
            foreach ($dataprofil->dataprofil_photo as $media) {
                if (!in_array($media->file_name, $request->input('dataprofil_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dataprofil->dataprofil_photo->pluck('file_name')->toArray();
        foreach ($request->input('dataprofil_photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dataprofil->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('dataprofil_photo');
            }
        }

        return redirect()->route('admin.dataprofils.index');
    }

    public function show(Dataprofil $dataprofil)
    {
        abort_if(Gate::denies('dataprofil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataprofils.show', compact('dataprofil'));
    }

    public function destroy(Dataprofil $dataprofil)
    {
        abort_if(Gate::denies('dataprofil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofil->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataprofilRequest $request)
    {
        Dataprofil::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dataprofil_create') && Gate::denies('dataprofil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Dataprofil();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function getDataprofilData()
    {
        $dataprofils = Dataprofil::select('id', 'daftar_usaha_pariwisata', 'daftar_sub_jenis_usaha', 'name', 'alamat', 'kecamatan', 'kelurahan', 'start_time', 'end_time', 'latitude', 'longitude')->get();

        return $dataprofils;
    }
    public function getCategoryTotals()
    {
        $hotelTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Hotel dan Akomodasi Lainnya')->count();
        $dtwTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Daya Tarik Wisata')->count();
        $restoTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Restoran')->count();
        $kafeTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Kafe')->count();
        $makananTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Usaha Makanan')->count();
        $minumanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Usaha Minuman')->count();
        $barTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Bar, Klub Malam, dan Karaoke')->count();
        $spaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Spa dan Rumah Pijat')->count();
        $jasaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Jasa Pariwisata')->count();
        $perkemahanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Perkemahan dan Pondok Wisata')->count();
        $tamanTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Taman Rekreasi dan Hiburan')->count();
        $fotografiTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Aktivitas Desain dan Fotografi')->count();
        $seniTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Seni Pertunjukan')->count();
        $olahragaTotal = Dataprofil::where('daftar_usaha_pariwisata', 'Fasilitas Olahraga')->count();

        return [
            'hotelTotal' => $hotelTotal,
            'dtwTotal' => $dtwTotal,
            'restoTotal' => $restoTotal,
            'kafeTotal' => $kafeTotal,
            'makananTotal' => $makananTotal,
            'minumanTotal' => $minumanTotal,
            'barTotal' => $barTotal,
            'spaTotal' => $spaTotal,
            'jasaTotal' => $jasaTotal,
            'perkemahanTotal' => $perkemahanTotal,
            'tamanTotal' => $tamanTotal,
            'fotografiTotal' => $fotografiTotal,
            'seniTotal' => $seniTotal,
            'olahragaTotal' => $olahragaTotal,
        ];
    }
}
