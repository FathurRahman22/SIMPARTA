<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataKunjunganRequest;
use App\Http\Requests\StoreDataKunjunganRequest;
use App\Http\Requests\UpdateDataKunjunganRequest;
use App\Models\DataKunjungan;
use App\Http\Controllers\DataprofilController;
use App\Models\Dataprofil;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class DataKunjunganController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_kunjungan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $filters = [];
        if (!is_null($user->roles[0]->title) && $user->roles[0]->title !== 'Admin') {
            $filters = [
                ['tag_id', '=', $user->tag_id]
            ];
        }

        $dataKunjungans = DataKunjungan::with(['tag'])->where($filters)->get();
        $tags = Tag::get();
        $dataprofils = Dataprofil::get();

        return view('admin.dataKunjungans.index', compact('dataKunjungans', 'tags', 'dataprofils'));
    }

    public function create()
{
    abort_if(Gate::denies('data_kunjungan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $tags = Tag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    $dataprofils = Dataprofil::get();

    // Ambil tag_id yang dipilih (jika ada)
    $selectedTagId = request('tag_id');

    // Inisialisasi daftar_jenis_usaha dengan nilai default jika tag_id tidak terpilih
    $daftarJenisUsaha = '';

    // Cek apakah tag_id terpilih, jika iya, ambil daftar_jenis_usaha dari Dataprofil
    if ($selectedTagId) {
        $dataprofil = Dataprofil::where('tag_id', $selectedTagId)->first();
        if ($dataprofil) {
            $daftarJenisUsaha = $dataprofil->tag->daftar_jenis_usaha;
        }
    }

    return view('admin.dataKunjungans.create', compact('tags', 'dataprofils', 'daftarJenisUsaha'));
}




    public function store(StoreDataKunjunganRequest $request)
    {
        $dataKunjungan = DataKunjungan::create($request->all());

        return redirect()->route('admin.data-kunjungans.index');
    }

    public function edit(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tags = Tag::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $dataKunjungan->load('tag');

        return view('admin.dataKunjungans.edit', compact('dataKunjungan', 'tags'));
        //return view('admin.dataKunjungans.edit', compact('dataKunjungan'));
    }

    public function update(UpdateDataKunjunganRequest $request, DataKunjungan $dataKunjungan)
    {
        $dataKunjungan->update($request->all());

        return redirect()->route('admin.data-kunjungans.index');
    }

    public function show(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataKunjungans.show', compact('dataKunjungan'));
    }

    public function destroy(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataKunjungan->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataKunjunganRequest $request)
    {
        DataKunjungan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function filter(Request $request)
    {
        // Ambil input tanggal dari permintaan
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Filter data berdasarkan tanggal yang sesuai
        $dataKunjungans = DataKunjungan::query();

        if ($startDate && $endDate) {
            $dataKunjungans->whereBetween('start_date', [$startDate, $endDate])
                ->whereBetween('end_date', [$startDate, $endDate]);
        }

        $dataKunjungans = $dataKunjungans->get();

        return view('admin.dataKunjungans.index', compact('dataKunjungans'));
    }
}
