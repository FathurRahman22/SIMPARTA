<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFasilitasWisataRequest;
use App\Http\Requests\UpdateFasilitasWisataRequest;
use App\Http\Resources\Admin\FasilitasWisataResource;
use App\Models\FasilitasWisata;
use App\Models\Event;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FasilitasWisataApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fasilitasWisata_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FasilitasWisataResource(FasilitasWisata::with(['event'])->get());
    }

    public function store(StoreFasilitasWisataRequest $request)
    {
        $fasilitasWisata = FasilitasWisata::create($request->all());

        if ($request->input('overview_fasilitasWisata_image', false)) {
            $fasilitasWisata->addMedia(storage_path('tmp/uploads/' . basename($request->input('overview_fasilitasWisata_image'))))->toMediaCollection('overview_fasilitasWisata_image');
        }

        return (new FasilitasWisataResource($fasilitasWisata))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FasilitasWisata $fasilitasWisata)
    {
        abort_if(Gate::denies('fasilitasWisata_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FasilitasWisataResource($fasilitasWisata->load(['tag']));
    }

    public function update(UpdateFasilitasWisataRequest $request, FasilitasWisata $fasilitasWisata)
    {
        $fasilitasWisata->update($request->all());

        if ($request->input('overview_fasilitasWisata_image', false)) {
            if (!$fasilitasWisata->overview_fasilitasWisata_image || $request->input('overview_fasilitasWisata_image') !== $fasilitasWisata->overview_fasilitasWisata_image->file_name) {
                if ($fasilitasWisata->overview_fasilitasWisata_image) {
                    $fasilitasWisata->overview_fasilitasWisata_image->delete();
                }
                $fasilitasWisata->addMedia(storage_path('tmp/uploads/' . basename($request->input('overview_fasilitasWisata_image'))))->toMediaCollection('overview_fasilitasWisata_image');
            }
        } elseif ($fasilitasWisata->overview_fasilitasWisata_image) {
            $fasilitasWisata->overview_fasilitasWisata_image->delete();
        }

        return (new FasilitasWisataResource($fasilitasWisata))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FasilitasWisata $fasilitasWisata)
    {
        abort_if(Gate::denies('fasilitasWisata_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fasilitasWisata->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
