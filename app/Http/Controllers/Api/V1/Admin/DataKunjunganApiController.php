<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataKunjunganRequest;
use App\Http\Requests\StoreDataKunjunganRequest;
use App\Http\Requests\UpdateDataKunjunganRequest;
use App\Models\DataKunjungan;
use App\Models\Dataprofils;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataKujunganApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_kunjungan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKunjunganResource(DataKunjungan::with(['dataprofil'])->get());
    }

    public function store(StoreDataKunjunganRequest $request)
    {
        $dataKunjungan = DataKunjungan::create($request->all());

        return (new DataKunjunganResource($dataKunjungan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataKunjunganResource($dataKunjungan);
    }

    public function update(UpdateSubmissionLinkRequest $request, DataKunjungan $dataKunjungan)
    {
        $dataKunjungan->update($request->all());

        return (new DataKunjunganResource($dataKunjungan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataKunjungan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
