@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.dataLain.title_singular') }}
        </div>

        <div class="card-body">
            @php
                $dataprofilsExist = App\Models\Dataprofil::count() > 0;
            @endphp
            @if ($dataprofilsExist)
                <form method="POST" action="{{ route('admin.data-lains.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- CREATE ID --}}
                    <div class="form-group">
                        <label for="dataprofil_id">{{ trans('cruds.dataLain.fields.dataprofil') }}</label>
                        <select class="form-control select2 {{ $errors->has('dataprofil') ? 'is-invalid' : '' }}" name="dataprofil_id"
                            id="dataprofil_id">
                            @foreach ($dataprofils as $id => $entry)
                                <option value="{{ $id }}" {{ old('dataprofil_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('dataprofil_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dataprofil_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.dataprofil_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="" for="idproyek">{{ trans('cruds.dataLain.fields.idproyek') }}</label>
                        <input class="form-control {{ $errors->has('idproyek') ? 'is-invalid' : '' }}" type="text"
                            name="idproyek" id="idproyek" pattern="^R-\d+$" value="{{ old('idproyek') }}">
                        @if ($errors->has('idproyek'))
                            <div class="invalid-feedback">
                                {{ $errors->first('idproyek') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.idproyek_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="" for="nib">{{ trans('cruds.dataLain.fields.nib') }}</label>
                        <input class="form-control {{ $errors->has('nib') ? 'is-invalid' : '' }}" type="number"
                            name="nib" id="nib" value="{{ old('nib', '') }}" pattern="\d{13,16}">
                        @if ($errors->has('nib'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nib') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.nib_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="npwp">{{ trans('cruds.dataLain.fields.npwp') }}</label>
                        <input class="form-control {{ $errors->has('npwp') ? 'is-invalid' : '' }}" type="number"
                            name="npwp" id="npwp" value="{{ old('npwp', '') }}" pattern="\d{13,16}">
                        @if ($errors->has('npwp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('npwp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.npwp_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="nama_perusahaan">{{ trans('cruds.dataLain.fields.nama_perusahaan') }}</label>
                        <input class="form-control {{ $errors->has('nama_perusahaan') ? 'is-invalid' : '' }}"
                            type="text" name="nama_perusahaan" id="nama_perusahaan"
                            value="{{ old('nama_perusahaan', '') }}">
                        @if ($errors->has('nama_perusahaan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nama_perusahaan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.nama_perusahaan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="statuspm">{{ trans('cruds.dataLain.fields.statuspm') }}</label>
                        <select class="form-control {{ $errors->has('statuspm') ? 'is-invalid' : '' }}" name="statuspm"
                            id="statuspm">
                            <option value disabled {{ old('statuspm', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\dataLain::STATUS_PM_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('statuspm', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('statuspm'))
                            <div class="invalid-feedback">
                                {{ $errors->first('status_pm') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.statuspm_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="jenis_perusahaan">{{ trans('cruds.dataLain.fields.jenis_perusahaan') }}</label>
                        <select class="form-control {{ $errors->has('jenis_perusahaan') ? 'is-invalid' : '' }}"
                            name="jenis_perusahaan" id="jenis_perusahaan">
                            <option value disabled {{ old('jenis_perusahaan', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\dataLain::JENIS_PERUSAHAAN_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('jenis_perusahaan', '') === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('jenis_perusahaan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('jenis_perusahaan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.jenis_perusahaan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="risiko_proyek">{{ trans('cruds.dataLain.fields.risiko_proyek') }}</label>
                        <select class="form-control {{ $errors->has('risiko_proyek') ? 'is-invalid' : '' }}"
                            name="risiko_proyek" id="risiko_proyek">
                            <option value disabled {{ old('risiko_proyek', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\DataLain::RISIKO_PROYEK_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('risiko_proyek', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('risiko_proyek'))
                            <div class="invalid-feedback">
                                {{ $errors->first('risiko_proyek') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.risiko_proyek_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="skala_usaha">{{ trans('cruds.dataLain.fields.skala_usaha') }}</label>
                        <select class="form-control {{ $errors->has('skala_usaha') ? 'is-invalid' : '' }}"
                            name="skala_usaha" id="skala_usaha">
                            <option value disabled {{ old('skala_usaha', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\DataLain::SKALA_USAHA_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('skala_usaha', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('skala_usaha'))
                            <div class="invalid-feedback">
                                {{ $errors->first('skala_usaha') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.skala_usaha_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="alamat_usaha">{{ trans('cruds.dataLain.fields.alamat_usaha') }}</label>
                        <input class="form-control {{ $errors->has('alamat_usaha') ? 'is-invalid' : '' }}" type="text"
                            name="alamat_usaha" id="alamat_usaha" value="{{ old('alamat_usaha', '') }}">
                        @if ($errors->has('alamat_usaha'))
                            <div class="invalid-feedback">
                                {{ $errors->first('alamat_usaha') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.alamat_usaha_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="kecamatan">{{ trans('cruds.dataLain.fields.kecamatan') }}</label>
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="Batu">Batu</option>
                            <option value="Bumiaji">Bumiaji</option>
                            <option value="Junrejo">Junrejo</option>
                        </select>
                        {{-- <select class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" name="kecamatan" id="kecamatan" >
                    <option value disabled {{ old('kecamatan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\dataLain::KECAMATAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kecamatan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                        @if ($errors->has('kecamatan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('kecamatan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.kecamatan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="kelurahan">{{ trans('cruds.dataLain.fields.kelurahan') }}</label>
                        <select class="form-control" name="kelurahan" id="kelurahan">
                            <!-- Opsi kelurahan diisi menggunakan JavaScript -->
                        </select>
                        {{-- <select class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}" name="kelurahan" id="kelurahan" >
                    <option value disabled {{ old('kelurahan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach (App\Models\dataLain::KELURAHAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kelurahan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select> --}}
                        @if ($errors->has('kelurahan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('kelurahan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.kelurahan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="kbli">{{ trans('cruds.dataLain.fields.kbli') }}</label>
                        <input class="form-control {{ $errors->has('kbli') ? 'is-invalid' : '' }}" type="number"
                            name="kbli" id="kbli" value="{{ old('kbli', '') }}" step="1">
                        @if ($errors->has('kbli'))
                            <div class="invalid-feedback">
                                {{ $errors->first('kbli') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.kbli_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="judul_kbli">{{ trans('cruds.dataLain.fields.judul_kbli') }}</label>
                        <input class="form-control {{ $errors->has('judul_kbli') ? 'is-invalid' : '' }}" type="text"
                            name="judul_kbli" id="judul_kbli" value="{{ old('judul_kbli', '') }}" step="1">
                        @if ($errors->has('judul_kbli'))
                            <div class="invalid-feedback">
                                {{ $errors->first('judul_kbli') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.judul_kbli_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="sektor">{{ trans('cruds.dataLain.fields.sektor') }}</label>
                        <select class="form-control {{ $errors->has('sektor') ? 'is-invalid' : '' }}" name="sektor"
                            id="sektor">
                            <option value disabled {{ old('sektor', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Models\DataLain::SEKTOR_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('sektor', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('sektor'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sektor') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.sektor_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="nama_user">{{ trans('cruds.dataLain.fields.nama_user') }}</label>
                        <input class="form-control {{ $errors->has('nama_user') ? 'is-invalid' : '' }}" type="text"
                            name="nama_user" id="nama_user" value="{{ old('nama_user', '') }}">
                        @if ($errors->has('nama_user'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nama_user') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.nama_user_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="nik">{{ trans('cruds.dataLain.fields.nik') }}</label>
                        <input class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" type="number"
                            name="nik" id="nik" value="{{ old('nik', '') }}">
                        @if ($errors->has('nik'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nik') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.nik_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="email">{{ trans('cruds.dataLain.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email', '') }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.email_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="telp">{{ trans('cruds.dataLain.fields.telp') }}</label>
                        <input class="form-control {{ $errors->has('telp') ? 'is-invalid' : '' }}" type="tel"
                            name="telp" id="telp" value="{{ old('telp', '') }}">
                        @if ($errors->has('telp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('telp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.telp_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="mesin_peralatan">{{ trans('cruds.dataLain.fields.mesin_peralatan') }}</label>
                        <input class="form-control {{ $errors->has('mesin_peralatan') ? 'is-invalid' : '' }}"
                            type="text" name="mesin_peralatan" id="mesin_peralatan"
                            value="{{ old('mesin_peralatan', '') }}">
                        @if ($errors->has('mesin_peralatan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('mesin_peralatan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.mesin_peralatan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="mesin_import">{{ trans('cruds.dataLain.fields.mesin_import') }}</label>
                        <input class="form-control {{ $errors->has('mesin_import') ? 'is-invalid' : '' }}"
                            type="text" name="mesin_import" id="mesin_import"
                            value="{{ old('mesin_import', '') }}">
                        @if ($errors->has('mesin_import'))
                            <div class="invalid-feedback">
                                {{ $errors->first('mesin_import') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.mesin_import_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="pembelian_tanah">{{ trans('cruds.dataLain.fields.pembelian_tanah') }}</label>
                        <input class="form-control {{ $errors->has('pembelian_tanah') ? 'is-invalid' : '' }}"
                            type="text" name="pembelian_tanah" id="pembelian_tanah"
                            value="{{ old('pembelian_tanah', '') }}">
                        @if ($errors->has('pembelian_tanah'))
                            <div class="invalid-feedback">
                                {{ $errors->first('pembelian_tanah') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.pembelian_tanah_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="bangunan">{{ trans('cruds.dataLain.fields.bangunan') }}</label>
                        <input class="form-control {{ $errors->has('bangunan') ? 'is-invalid' : '' }}" type="text"
                            name="bangunan" id="bangunan" value="{{ old('bangunan', '') }}">
                        @if ($errors->has('bangunan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bangunan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.bangunan_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class=""
                            for="modal_kerja">{{ trans('cruds.dataLain.fields.modal_kerja') }}</label>
                        <input class="form-control {{ $errors->has('modal_kerja') ? 'is-invalid' : '' }}" type="text"
                            name="modal_kerja" id="modal_kerja" value="{{ old('modal_kerja', '') }}">
                        @if ($errors->has('modal_kerja'))
                            <div class="invalid-feedback">
                                {{ $errors->first('modal_kerja') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.modal_kerja_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="lain_lain">{{ trans('cruds.dataLain.fields.lain_lain') }}</label>
                        <input class="form-control {{ $errors->has('lain_lain') ? 'is-invalid' : '' }}" type="text"
                            name="lain_lain" id="lain_lain" value="{{ old('lain_lain', '') }}">
                        @if ($errors->has('lain_lain'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lain_lain') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.lain_lain_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="" for="investasi">{{ trans('cruds.dataLain.fields.investasi') }}</label>
                        <input class="form-control {{ $errors->has('investasi') ? 'is-invalid' : '' }}" type="text"
                            name="investasi" id="investasi" value="{{ old('investasi', '') }}">
                        @if ($errors->has('investasi'))
                            <div class="invalid-feedback">
                                {{ $errors->first('investasi') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.investasi_helper') }}</span>
                    </div>

                    {{-- <div class="form-group">
                        <label class="" for="tki">{{ trans('cruds.dataLain.fields.tki') }}</label>
                        <input class="form-control {{ $errors->has('tki') ? 'is-invalid' : '' }}" type="number"
                            name="tki" id="tki" value="{{ old('tki', '') }}">
                        @if ($errors->has('tki'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tki') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.tki_helper') }}</span>
                    </div> --}}

                    <div class="form-group">
                        <label class=""
                            for="jumlah_pegawai">{{ trans('cruds.dataLain.fields.jumlah_pegawai') }}</label>
                    </div>
                    <div class="form-group">
                        <label class="" for="laki-laki">{{ trans('cruds.dataLain.fields.laki_laki') }}</label>
                        <input class="form-control {{ $errors->has('laki_laki') ? 'is-invalid' : '' }}" type="number"
                            name="laki_laki" id="laki_laki" value="{{ old('laki_laki', '') }}" step="1">
                        @if ($errors->has('laki_laki'))
                            <div class="invalid-feedback">
                                {{ $errors->first('laki_laki') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.laki_laki_helper') }}</span>

                        <label class="" for="perempuan">{{ trans('cruds.dataLain.fields.perempuan') }}</label>
                        <input class="form-control {{ $errors->has('perempuan') ? 'is-invalid' : '' }}" type="number"
                            name="perempuan" id="perempuan" value="{{ old('perempuan', '') }}" step="1">
                        @if ($errors->has('perempuan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('perempuan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.perempuan_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class=""
                            for="tki">{{ trans('cruds.dataLain.fields.tki') }}</label>
                        <input class="form-control {{ $errors->has('tki') ? 'is-invalid' : '' }}"
                            type="number" name="tki" id="tki"
                            value="{{ old('tki', '') }}" step="1">
                        @if ($errors->has('tki'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tki') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.dataLain.fields.tki_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            @else
                <div class="alert alert-danger">
                    Data Belum Ada
                </div>
            @endif
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        // Ambil elemen select untuk kecamatan dan kelurahan
        var kecamatanSelect = document.getElementById('kecamatan');
        var kelurahanSelect = document.getElementById('kelurahan');

        // Daftar kelurahan berdasarkan kecamatan
        var kelurahanByKecamatan = {
            "Batu": ['Oro-oro Ombo', 'Pesanggrahan', 'Sidomulyo', 'Sumberejo', 'Ngaglik', 'Sisir', 'Songgokerto',
                'Temas'],
            "Bumiaji": ['Bumiaji', 'Bulukerto', 'Giripurno', 'Gunungsari', 'Punten', 'Sumbergondo', 'Tulungrejo',
                'Sumber Brantas'
            ],
            "Junrejo": ['Beji', 'Dadaprejo', 'Junrejo', 'Mojorejo', 'Pendem', 'Tlekung', 'Torongrejo'],
        };

        // Fungsi untuk mengisi opsi kelurahan berdasarkan kecamatan yang dipilih
        function populateKelurahan() {
            var selectedKecamatan = kecamatanSelect.value;
            var kelurahanOptions = kelurahanByKecamatan[selectedKecamatan] || [];

            // Kosongkan opsi kelurahan sebelum mengisi yang baru
            kelurahanSelect.innerHTML = '';

            // Buat opsi kelurahan baru berdasarkan daftar kelurahan
            kelurahanOptions.forEach(function(kelurahan) {
                var option = document.createElement('option');
                option.value = kelurahan;
                option.text = kelurahan;
                kelurahanSelect.appendChild(option);
            });
        }

        // Panggil fungsi populateKelurahan saat halaman dimuat dan ketika pilihan kecamatan berubah
        populateKelurahan();
        kecamatanSelect.addEventListener('change', populateKelurahan);

        $(document).ready(function() {
            $('#laki_laki, #perempuan').on('input', function() {
                var lakiLakiValue = parseInt($('#laki_laki').val()) || 0;
                var perempuanValue = parseInt($('#perempuan').val()) || 0;
                var totalTki = lakiLakiValue + perempuanValue;
                $('#tki').val(totalTki);
            });
        });
    </script>

    {{-- <script>
        // Format inputan ke format Rupiah saat input berubah
        var pembelianTanahInput = document.getElementById("pembelian_tanah");
        pembelianTanahInput.addEventListener("input", function() {
            // Mengambil nilai input
            var value = this.value.replace(/\D/g, "");

            // Mengubah nilai menjadi format Rupiah dengan angka desimal
            var formattedValue = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            }).format(value);

            // Mengganti nilai input dengan format Rupiah
            this.value = formattedValue;
        });
    </script> --}}
    <script>
    // Fungsi untuk mengubah input menjadi format Rupiah
    function formatRupiah(inputElement) {
        // Mengambil nilai input
        var value = inputElement.value.replace(/\D/g, "");
        
        // Mengubah nilai menjadi format Rupiah dengan angka desimal
        var formattedValue = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        }).format(value);
        
        // Mengganti nilai input dengan format Rupiah
        inputElement.value = formattedValue;
    }

    // Mendapatkan elemen input untuk kolom yang membutuhkan format Rupiah
    var mesinPeralatanInput = document.getElementById("mesin_peralatan");
    var mesinImportInput = document.getElementById("mesin_import");
    var pembelianTanahInput = document.getElementById("pembelian_tanah");
    var bangunanInput = document.getElementById("bangunan");
    var modalKerjaInput = document.getElementById("modal_kerja");
    var lainLainInput = document.getElementById("lain_lain");
    var investasiInput = document.getElementById("investasi");

    // Menambahkan event listener untuk setiap elemen input yang membutuhkan format Rupiah
    mesinPeralatanInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    mesinImportInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    pembelianTanahInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    bangunanInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    modalKerjaInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    lainLainInput.addEventListener("input", function() {
        formatRupiah(this);
    });

    investasiInput.addEventListener("input", function() {
        formatRupiah(this);
    });
</script>
    
    
@endsection
