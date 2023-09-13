<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Http\Resources\Admin\PaketResource;
use App\Models\Paket;
use App\Models\Dataprofil;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PaketController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('paket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaketResource(Paket::with(['dataprofil'])->get());
    }

    public function store(StoreDataprofilRequest $request)
    {
        $paket = Paket::create($request->all());

        if ($request->input('dataprofil_photo', false)) {
            $paket->addMedia(storage_path('tmp/uploads/' . basename($request->input('dataprofil_photo'))))->toMediaCollection('dataprofil_photo');
        }
        foreach ($request->input('pdf_paketWisata', []) as $file) {
            $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pdf_paketWisata');
        }

        return (new PaketResource($paket))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paket $paket)
    {
        abort_if(Gate::denies('dataprofil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaketResource($paket);
    }

    public function update(UpdateDataprofilRequest $request, Paket $paket)
    {
        $paket->update($request->all());

        if ($request->input('dataprofil_photo', false)) {
            if (!$paket->dataprofil_photo || $request->input('dataprofil_photo') !== $paket->dataprofil_photo->file_name) {
                if ($paket->dataprofil_photo) {
                    $paket->dataprofil_photo->delete();
                }
                $paket->addMedia(storage_path('tmp/uploads/' . basename($request->input('dataprofil_photo'))))->toMediaCollection('dataprofil_photo');
            }
        } elseif ($paket->dataprofil_photo) {
            $paket->dataprofil_photo->delete();
        }
         // Handle uploaded PDFs
    foreach ($request->input('pdf_paketWisata', []) as $file) {
        $paket->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pdf_paketWisata');
    }

    // Handle deleted PDFs
    $pdfsToRemove = array_diff($paket->pdf_paketWisata->pluck('file_name')->toArray(), $request->input('pdf_paketWisata', []));
    foreach ($pdfsToRemove as $pdf) {
        $media = $paket->pdf_paketWisata->where('file_name', $pdf)->first();
        if ($media) {
            $media->delete();
        }
    }
        return (new PaketResource($paket))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paket $paket)
    {
        abort_if(Gate::denies('dataprofil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paket->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
