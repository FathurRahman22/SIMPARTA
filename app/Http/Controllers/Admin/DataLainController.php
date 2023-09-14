<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDataLainRequest;
use App\Http\Requests\StoreDataLainRequest;
use App\Http\Requests\UpdateDataLainRequest;
use App\Models\DataLain;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class DataLainController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('data_lain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['tag_id', '=', $user->tag_id]
            ];
        }

        $dataLains = DataLain::with(['media', 'tag'])->where($filters)->get();
        $tags = Tag::get();

        return view('admin.dataLains.index', compact('dataLains', 'tags'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_lain_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataLains.create', compact('tags'));
    }

    public function store(StoreDataLainRequest $request)
    {
        $dataLain = DataLain::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dataLain->id]);
        }

        return redirect()->route('admin.data-lains.index');
    }

    public function edit(DataLain $dataLain)
    {
        abort_if(Gate::denies('data_lain_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $dataLain->load('tag');

        return view('admin.dataLains.edit', compact('dataLain', 'tags'));
    }

    public function update(UpdateDataLainRequest $request, DataLain $dataLain)
    {
        $dataLain->update($request->all());

        return redirect()->route('admin.data-lains.index');
    }

    public function show(DataLain $dataLain)
    {
        abort_if(Gate::denies('data_lain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataLains.show', compact('dataLain'));
    }

    public function destroy(DataLain $dataLain)
    {
        abort_if(Gate::denies('data_lain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataLain->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataLainRequest $request)
    {
        DataLain::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('data_lain_create') && Gate::denies('data_lain_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DataLain();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
