<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDataLainRequest;
use App\Http\Requests\UpdateDataLainRequest;
use App\Http\Resources\Admin\DataLainResource;
use App\Models\DataLain;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataLainApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('data_lain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataLainResource(DataLain::with(['dataprofil'])->get());
    }

    public function store(StoreDataLainRequest $request)
    {
        $dataLain = DataLain::create($request->all());

        if ($request->input('bukti_pembayaran', false)) {
            $dataLain->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
        }

        return (new DataLainResource($dataLain))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataLain $dataLain)
    {
        abort_if(Gate::denies('data_lain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataLainResource($dataLain);
    }

    public function update(UpdateDataLainRequest $request, DataLain $dataLain)
    {
        $dataLain->update($request->all());

        if ($request->input('bukti_pembayaran', false)) {
            if (!$dataLain->bukti_pembayaran || $request->input('bukti_pembayaran') !== $dataLain->bukti_pembayaran->file_name) {
                if ($dataLain->bukti_pembayaran) {
                    $dataLain->bukti_pembayaran->delete();
                }
                $dataLain->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
            }
        } elseif ($dataLain->bukti_pembayaran) {
            $dataLain->bukti_pembayaran->delete();
        }

        return (new DataLainResource($dataLain))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataLain $dataLain)
    {
        abort_if(Gate::denies('data_lain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataLain->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
