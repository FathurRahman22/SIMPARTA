@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dataLain.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-lains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>

                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.id') }}
                        </th>
                        <td>
                            {{ $dataLain->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.dataprofil') }}
                        </th>
                        <td>
                            {{ $dataLain->dataprofil->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.idproyek') }}
                        </th>
                        <td>
                            {{ $dataLain->idproyek }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.nib') }}
                        </th>
                        <td>
                            {{ $dataLain->nib }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.npwp') }}
                        </th>
                        <td>
                            {{ $dataLain->npwp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.nama_perusahaan') }}
                        </th>
                        <td>
                            {{ $dataLain->nama_perusahaan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.statuspm') }}
                        </th>
                        <td>
                            {{ App\Models\DataLain::STATUS_PM_SELECT[$dataLain->statuspm] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.jenis_perusahaan') }}
                        </th>
                        <td>
                            {{ App\Models\DataLain::JENIS_PERUSAHAAN_SELECT[$dataLain->jenis_perusahaan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.risiko_proyek') }}
                        </th>
                        <td>
                            {{ App\Models\DataLain::RISIKO_PROYEK_SELECT[$dataLain->risiko_proyek] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.skala_usaha') }}
                        </th>
                        <td>
                            {{ App\Models\DataLain::SKALA_USAHA_SELECT[$dataLain->skala_usaha] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.alamat_usaha') }}
                        </th>
                        <td>
                            {{ $dataLain->alamat_usaha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.kecamatan') }}
                        </th>
                        <td>
                            {{ $dataLain->kecamatan}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.kelurahan') }}
                        </th>
                        <td>
                            {{ $dataLain->kelurahan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.kbli') }}
                        </th>
                        <td>
                            {{ $dataLain->kbli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.judul_kbli') }}
                        </th>
                        <td>
                            {{ $dataLain->judul_kbli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.sektor') }}
                        </th>
                        <td>
                            {{ $dataLain->sektor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.nama_user') }}
                        </th>
                        <td>
                            {{ $dataLain->nama_user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.nik') }}
                        </th>
                        <td>
                            {{ $dataLain->nik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.email') }}
                        </th>
                        <td>
                            {{ $dataLain->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.telp') }}
                        </th>
                        <td>
                            {{ $dataLain->telp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.mesin_peralatan') }}
                        </th>
                        <td>
                            {{ $dataLain->mesin_peralatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.mesin_peralatan') }}
                        </th>
                        <td>
                            {{ $dataLain->mesin_peralatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.mesin_import') }}
                        </th>
                        <td>
                            {{ $dataLain->mesin_import }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.pembelian_tanah') }}
                        </th>
                        <td>
                            {{ $dataLain->pembelian_tanah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.bangunan') }}
                        </th>
                        <td>
                            {{ $dataLain->bangunan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.modal_kerja') }}
                        </th>
                        <td>
                            {{ $dataLain->modal_kerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.lain_lain') }}
                        </th>
                        <td>
                            {{ $dataLain->lain_lain }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.investasi') }}
                        </th>
                        <td>
                            {{ $dataLain->investasi }}
                        </td>
                    </tr>                   
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.laki_laki') }}
                        </th>
                        <td>
                            {{ $dataLain->laki_laki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.perempuan') }}
                        </th>
                        <td>
                            {{ $dataLain->perempuan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dataLain.fields.tki') }}
                        </th>
                        <td>
                            {{ $dataLain->tki }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-lains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection