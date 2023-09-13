<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Http\Resources\Admin\AgendaResource;
use App\Models\Agenda;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgendaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agenda_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgendaResource(Agenda::with(['dataprofil'])->get());
    }

    public function store(StoreAgendaRequest $request)
    {
        $agenda = Agenda::create($request->all());

        if ($request->input('image', false)) {
            $agenda->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new AgendaResource($agenda))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgendaResource($agenda);
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $agenda->update($request->all());

        if ($request->input('image', false)) {
            if (!$agenda->image || $request->input('image') !== $agenda->image->file_name) {
                if ($agenda->image) {
                    $agenda->image->delete();
                }
                $agenda->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($agenda->image) {
            $agenda->image->delete();
        }

        return (new AgendaResource($agenda))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenda->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
