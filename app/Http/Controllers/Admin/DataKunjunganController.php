<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataKunjunganRequest;
use App\Http\Requests\StoreDataKunjunganRequest;
use App\Http\Requests\UpdateDataKunjunganRequest;
use App\Models\DataKunjungan;
use App\Models\Dataprofil;
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
                ['dataprofil_id', '=', $user->dataprofil_id]
            ];
        }

        $dataKunjungans = DataKunjungan::with(['dataprofil'])->where($filters)->get();
        $dataprofils = Dataprofil::get();

        return view('admin.dataKunjungans.index', compact('dataKunjungans', 'dataprofils'));
    }

    public function create()
    {
        abort_if(Gate::denies('data_kunjungan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataKunjungans.create', compact('dataprofils'));
    }

    public function store(StoreDataKunjunganRequest $request)
    {
        $dataKunjungan = DataKunjungan::create($request->all());

        return redirect()->route('admin.data-kunjungans.index');
    }

    public function edit(DataKunjungan $dataKunjungan)
    {
        abort_if(Gate::denies('data_kunjungan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dataprofils = Dataprofil::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $dataKunjungan->load('dataprofil');

        return view('admin.dataKunjungans.edit', compact('dataKunjungan', 'dataprofils'));
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
