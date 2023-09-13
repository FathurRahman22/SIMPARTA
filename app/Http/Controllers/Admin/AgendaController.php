<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgendaRequest;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Models\Agenda;
use App\Models\Dataprofil;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AgendaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agenda_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['dataprofil_id', '=', $user->dataprofil_id]
            ];
        }

        $agendas = Agenda::with(['media', 'dataprofil'])->where($filters)->get();
        $dataprofils = Dataprofil::get();

        return view('admin.agendas.index', compact('agendas', 'dataprofils'));
    }

    public function create()
    {
        abort_if(Gate::denies('agenda_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.agendas.create', compact('dataprofils'));
    }

    public function store(StoreAgendaRequest $request)
    {
        $agenda = Agenda::create($request->all());

        foreach ($request->input('gambar_agenda', []) as $file) {
            $agenda->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_agenda');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agenda->id]);
        }

        return redirect()->route('admin.agendas.index');
    }

    public function edit(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $agenda->load('dataprofil');

        return view('admin.agendas.edit', compact('agenda', 'dataprofils'));
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $agenda->update($request->all());

        if (count($agenda->gambar_agenda) > 0) {
            foreach ($agenda->gambar_agenda as $media) {
                if (!in_array($media->file_name, $request->input('gambar_agenda', []))) {
                    $media->delete();
                }
            }
        }
        $media = $agenda->gambar_agenda->pluck('file_name')->toArray();
        foreach ($request->input('gambar_agenda', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $agenda->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gambar_agenda');
            }
        }

        return redirect()->route('admin.agendas.index');
    }

    public function show(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agendas.show', compact('agenda'));
    }

    public function destroy(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenda->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgendaRequest $request)
    {
        Agenda::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agenda_create') && Gate::denies('agenda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Agenda();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
