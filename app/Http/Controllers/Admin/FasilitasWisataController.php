<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFasilitasWisataRequest;
use App\Http\Requests\StoreFasilitasWisataRequest;
use App\Http\Requests\UpdateFasilitasWisataRequest;
use App\Models\FasilitasWisata;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class FasilitasWisataController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fasilitasWisata_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['dataprofil_id', '=', $user->dataprofil_id]
            ];
        }

        $fasilitasWisatas = FasilitasWisata::with(['media', 'dataprofil'])->where($filters)->get();
        $dataprofils = Dataprofil::get();

        return view('admin.fasilitasWisatas.index', compact('fasilitasWisatas', 'dataprofils'));
    }

    public function create()
    {
        abort_if(Gate::denies('fasilitasWisata_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fasilitasWisatas.create', compact('dataprofils'));
    }

    public function store(StoreFasilitasWisataRequest $request)
    {
        $fasilitasWisata = FasilitasWisata::create($request->all());

        foreach ($request->input('gambar_fasilitasWisata', []) as $file) {
            $fasilitasWisata->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_fasilitasWisata');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fasilitasWisata->id]);
        }

        return redirect()->route('admin.fasilitasWisatas.index');
    }

    public function edit(FasilitasWisata $fasilitasWisata)
    {
        abort_if(Gate::denies('fasilitasWisata_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $fasilitasWisata->load('dataprofil');

        return view('admin.fasilitasWisatas.edit', compact('fasilitasWisata', 'dataprofils'));
    }

    public function update(UpdateFasilitasWisataRequest $request, FasilitasWisata $fasilitasWisata)
    {
        $fasilitasWisata->update($request->all());

        if (count($fasilitasWisata->gambar_fasilitasWisata) > 0) {
            foreach ($fasilitasWisata->gambar_fasilitasWisata as $media) {
                if (!in_array($media->file_name, $request->input('gambar_fasilitasWisata', []))) {
                    $media->delete();
                }
            }
        }
        $media = $fasilitasWisata->gambar_fasilitasWisata->pluck('file_name')->toArray();
        foreach ($request->input('gambar_fasilitasWisata', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $fasilitasWisata->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_fasilitasWisata');
            }
        }

        return redirect()->route('admin.fasilitasWisatas.index');
    }

    public function show(FasilitasWisata $fasilitasWisata)
    {
        abort_if(Gate::denies('fasilitasWisata_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fasilitasWisatas.show', compact('fasilitasWisata'));
    }

    public function destroy(FasilitasWisata $fasilitasWisata)
    {
        abort_if(Gate::denies('fasilitasWisata_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fasilitasWisata->delete();

        return back();
    }

    public function massDestroy(MassDestroyFasilitasWisataRequest $request)
    {
        FasilitasWisata::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fasilitasWisata_create') && Gate::denies('fasilitasWisata_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FasilitasWisata();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
