<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPaketRequest;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Models\Paket;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Auth;

use function PHPUnit\Framework\isNull;

class PaketController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('paket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['dataprofil_id', '=', $user->dataprofil_id]
            ];
        }
       
        $pakets = Paket::with(['media', 'dataprofil'])->where($filters)->get();
        $dataprofils = Dataprofil::get();

        return view('admin.pakets.index', compact('pakets', 'dataprofils'));
    }

    public function create()
    {
        abort_if(Gate::denies('paket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.pakets.create', compact('dataprofils'));
    }

    public function store(StorePaketRequest $request)
    {
        $paket = Paket::create($request->all());

        foreach ($request->input('gambar_paketWisata', []) as $file) {
            $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_paketWisata');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $paket->id]);
        }

        foreach ($request->input('pdf_paketWisata', []) as $file) {
            $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pdf_paketWisata');
        }
        if ($request->hasFile('pdf_paketWisata')) {
            $pdfFile = $request->file('pdf_paketWisata');
            $pdfPath = $pdfFile->store('pdfs', 'tmp'); // 'pdfs' adalah nama folder penyimpanan sementara

            // $pdfPath adalah path ke file PDF yang diunggah, Anda bisa menggunakannya sesuai kebutuhan
        }


        return redirect()->route('admin.pakets.index');
    }

    public function edit(Paket $paket)
    {
        $pdf_paketWisata = $paket->getMedia('pdf_paketWisata');
        abort_if(Gate::denies('paket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $paket->load('dataprofil');

        return view('admin.pakets.edit', compact('paket', 'dataprofils', 'pdf_paketWisata'));
    }

    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        $paket->update($request->all());

        if ($paket->gambar_paketWisata) {
            foreach ($paket->gambar_paketWisata as $media) {
                if (!in_array($media->file_name, $request->input('gambar_paketWisata', []))) {
                    $media->delete();
                }
            }
            $media = $paket->gambar_paketWisata->pluck('file_name')->toArray();
            foreach ($request->input('gambar_paketWisata', []) as $file) {
                if (count($media) === 0 || !in_array($file, $media)) {
                    $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_paketWisata');
                }
            }
        }
        $requestPdfFiles = $request->input('pdf_paketWisata', []);
        $existingPdfFiles = $paket->pdf_paketWisata->pluck('file_name')->toArray();
        if ($paket->pdf_paketWisata) {
            foreach ($paket->pdf_paketWisata as $media) {
                if (!in_array($media->file_name, $request->input('pdf_paketWisata', []))) {
                    $media->delete();
                }
            }
        }
        foreach ($existingPdfFiles as $existingFile) {
            if (!in_array($existingFile, $requestPdfFiles)) {
                $paket->clearMediaCollection($existingFile);
            }
        }

        // Tambahkan file PDF yang baru jika ada
        foreach ($requestPdfFiles as $pdfFile) {
            if (!in_array($pdfFile, $existingPdfFiles)) {
                $paket->addMedia(storage_path('tmp/uploads/' . basename($pdfFile)))->toMediaCollection('pdf_paketWisata');
            }
        }

        // Mengelola media terkait
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $paket->id]);
        }

        // if ($paket->pdf_paketWisata) {
        //     foreach ($paket->pdf_paketWisata as $media) {
        //         if (!in_array($media->file_name, $request->input('pdf_paketWisata', []))) {
        //             $media->delete();
        //         }
        //     }
        // }
        // foreach ($request->input('pdf_paketWisata', []) as $file) {
        //     if (!$paket->hasMedia($file)) {
        //         $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pdf_paketWisata');
        //     }
        // }

        // // Mengelola media terkait
        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $paket->id]);
        // }

        return redirect()->route('admin.pakets.index');
    }


    public function show(Paket $paket)
    {
        abort_if(Gate::denies('paket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pakets.show', compact('paket'));
    }

    public function destroy(Paket $paket)
    {
        abort_if(Gate::denies('paket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paket->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaketRequest $request)
    {
        Paket::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('paket_create') && Gate::denies('paket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Paket();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
