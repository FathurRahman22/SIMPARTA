<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDataprofilRequest;
use App\Http\Requests\UpdateDataprofilRequest;
use App\Http\Resources\Admin\DataprofilResource;
use App\Models\Dataprofil;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataprofilApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dataprofil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return new DataprofilResource(Dataprofil::all());
        return new DataprofilResource(Dataprofil::with(['tag'])->get());
    }

    public function store(StoreDataprofilRequest $request)
    {
        $dataprofil = Dataprofil::create($request->all());

        if ($request->input('dataprofil_photo', false)) {
            $dataprofil->addMedia(storage_path('tmp/uploads/' . basename($request->input('dataprofil_photo'))))->toMediaCollection('dataprofil_photo');
        }

        return (new DataprofilResource($dataprofil))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Dataprofil $dataprofil)
    {
        abort_if(Gate::denies('dataprofil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return new DataprofilResource($dataprofil);
        return new  DataprofilResource($dataprofil->load(['tag']));
    }

    public function update(UpdateDataprofilRequest $request, Dataprofil $dataprofil)
    {
        $dataprofil->update($request->all());

        if ($request->input('dataprofil_photo', false)) {
            if (!$dataprofil->dataprofil_photo || $request->input('dataprofil_photo') !== $dataprofil->dataprofil_photo->file_name) {
                if ($dataprofil->dataprofil_photo) {
                    $dataprofil->dataprofil_photo->delete();
                }
                $dataprofil->addMedia(storage_path('tmp/uploads/' . basename($request->input('dataprofil_photo'))))->toMediaCollection('dataprofil_photo');
            }
        } elseif ($dataprofil->dataprofil_photo) {
            $dataprofil->dataprofil_photo->delete();
        }

        return (new DataprofilResource($dataprofil))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Dataprofil $dataprofil)
    {
        abort_if(Gate::denies('dataprofil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofil->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
