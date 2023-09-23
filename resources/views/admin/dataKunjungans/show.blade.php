@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datakunjungan/data_kunjungan_show.css') }}">
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.dataKunjungan.title') }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="row">
            <canvas id="chartCanvas" class="canvas-left"></canvas>
            <canvas id="chartCanvas2" class="canvas-right"></canvas>
        </div>
        <div class="chart-container">
            <div class="chart">
                <canvas id="aseanPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="asiaPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="timurTengahPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="eropaPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="amerikaPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="oseaniaPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="afrikaPieChart"></canvas>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('asean')">
                            KATEGORI ASEAN
                        </th>
                        <td>
                            {{ $dataKunjungan->asean }}
                        </td>
                    </tr>
                    <tr class="asean-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Malaysia
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->malaysia }}
                                    </td>
                                    <th>
                                        Filipina
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->filipina }}
                                    </td>
                                    <th>
                                        Singapura
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->singapura }}
                                    </td>
                                    <th>
                                        Thailand
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->thailand }}
                                    </td>
                                    <th>
                                        Vietnam
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->vietnam }}
                                    </td>
                                    <th>
                                        ASEAN Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->aseanlainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('asia')">
                            KATEGORI ASIA
                        </th>
                        <td>
                            {{ $dataKunjungan->asia }}
                        </td>
                    </tr>
                    <tr class="asia-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Hong Kong
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->hongkong }}
                                    </td>
                                    <th>
                                        India
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->india }}
                                    </td>
                                    <th>
                                        Jepang
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jepang }}
                                    </td>
                                    <th>
                                        Korea Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->korea_selatan }}
                                    </td>
                                    <th>
                                        Taiwan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->taiwan }}
                                    </td>
                                    <th>
                                        Tiongkok
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->tiongkok }}
                                    </td>
                                    <th>
                                        Timor Leste
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->timor_leste }}
                                    </td>
                                    <th>
                                        ASIA Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->asia_lainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('timur_tengah')">
                            KATEGORI TIMUR TENGAH
                        </th>
                        <td>
                            {{ $dataKunjungan->timur_tengah }}
                        </td>
                    </tr>
                    <tr class="timur_tengah-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Arab Saudi
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->arab_saudi }}
                                    </td>
                                    <th>
                                        Kuwait
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kuwait }}
                                    </td>
                                    <th>
                                        Mesir
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->mesir }}
                                    </td>
                                    <th>
                                        Uni Emirat Arab
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->uae }}
                                    </td>
                                    <th>
                                        Yaman
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->yaman }}
                                    </td>
                                    <th>
                                        Timur Tengah Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->timur_tengah_lain }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('eropa')">
                            KATEGORI EROPA
                        </th>
                        <td>
                            {{ $dataKunjungan->eropa }}
                        </td>
                    </tr>
                    <tr class="eropa-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Perancis
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->perancis }}
                                    </td>
                                    <th>
                                        Jerman
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jerman }}
                                    </td>
                                    <th>
                                        Belanda
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->belanda }}
                                    </td>
                                    <th>
                                        Inggris
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->inggris }}
                                    </td>
                                    <th>
                                        Rusia
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->rusia }}
                                    </td>
                                    <th>
                                        Eropa Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->eropa_lainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('amerika')">
                            KATEGORI AMERIKA
                        </th>
                        <td>
                            {{ $dataKunjungan->amerika }}
                        </td>
                    </tr>
                    <tr class="amerika-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Amerika Serikat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->amerika_serikat }}
                                    </td>
                                    <th>
                                        Kanada
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kanada }}
                                    </td>
                                    <th>
                                        Brazil
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->brazil }}
                                    </td>
                                    <th>
                                        Meksiko
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->meksiko }}
                                    </td>
                                    <th>
                                        Amerika Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->amerika_lainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('oseania')">
                            KATEGORI OSEANIA
                        </th>
                        <td>
                            {{ $dataKunjungan->oseania }}
                        </td>
                    </tr>
                    <tr class="oseania-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Australia
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->australia }}
                                    </td>
                                    <th>
                                        Selandia Baru
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->selandia_baru }}
                                    </td>
                                    <th>
                                        Papua Nugini
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_nugini }}
                                    </td>
                                    <th>
                                        Oseania Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->oseania_lainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('afrika')">
                            KATEGORI AFRIKA
                        </th>
                        <td>
                            {{ $dataKunjungan->afrika }}
                        </td>
                    </tr>
                    <tr class="afrika-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Afrika Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->afrika_selatan }}
                                    </td>
                                    <th>
                                        Afrika Lainnya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->afrika_lainnya }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="chart-container">
            <div class="chart">
                <canvas id="jawaPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="kalimantanPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="sumateraPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="sulawesiPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="baliNusraPieChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="papuaPieChart"></canvas>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('jawa')">
                            KATEGORI JAWA
                        </th>
                        <td>
                            {{ $dataKunjungan->jawa }}
                        </td>
                    </tr>
                    <tr class="jawa-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Jawa Timur
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jawa_timur }}
                                    </td>
                                    <th>
                                        Jawa Barat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jawa_barat }}
                                    </td>
                                    <th>
                                        Jawa Tengah
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jawa_tengah }}
                                    </td>
                                    <th>
                                        DI Yogyakarta
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->diy }}
                                    </td>
                                    <th>
                                        DKI Jakarta
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->dki }}
                                    </td>
                                    <th>
                                        Banten
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->banten }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('kalimantan')">
                            KATEGORI KALIMANTAN
                        </th>
                        <td>
                            {{ $dataKunjungan->kalimantan }}
                        </td>
                    </tr>
                    <tr class="kalimantan-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Kalimantan Utara
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kaltara }}
                                    </td>
                                    <th>
                                        Kalimantan Timur
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kaltim }}
                                    </td>
                                    <th>
                                        Kalimantan Tengah
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kalteng }}
                                    </td>
                                    <th>
                                        Kalimantan Barat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kalbar }}
                                    </td>
                                    <th>
                                        Kalimantan Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kalsel }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('sumatera')">
                            KATEGORI SUMATERA
                        </th>
                        <td>
                            {{ $dataKunjungan->sumatera }}
                        </td>
                    </tr>
                    <tr class="sumatera-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Aceh
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->aceh }}
                                    </td>
                                    <th>
                                        Sumatera Utara
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sumut }}
                                    </td>
                                    <th>
                                        Riau
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->riau }}
                                    </td>
                                    <th>
                                        Kepulauan Riau
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->kep_riau }}
                                    </td>
                                    <th>
                                        Jambi
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->jambi }}
                                    </td>
                                    <th>
                                        Sumatera Barat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sumbar }}
                                    </td>
                                    <th>
                                        Sumatera Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sumsel }}
                                    </td>
                                    <th>
                                        Bangka Belitung
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->bangka }}
                                    </td>
                                    <th>
                                        Bengkulu
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->bengkulu }}
                                    </td>
                                    <th>
                                        Lampung
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->lampung }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('sulawesi')">
                            KATEGORI SULAWESI
                        </th>
                        <td>
                            {{ $dataKunjungan->sulawesi }}
                        </td>
                    </tr>
                    <tr class="sulawesi-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Sulawesi Utara
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sulut }}
                                    </td>
                                    <th>
                                        Sulawesi Barat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sulbar }}
                                    </td>
                                    <th>
                                        Sulawesi Tengah
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sulteng }}
                                    </td>
                                    <th>
                                        Sulawesi Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sulsel }}
                                    </td>
                                    <th>
                                        Sulawesi Tenggara
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->sulgara }}
                                    </td>
                                    <th>
                                        Gorontalo
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->gorontalo }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('bali_nustra')">
                            KATEGORI BALINUSTRA
                        </th>
                        <td>
                            {{ $dataKunjungan->bali_nustra }}
                        </td>
                    </tr>
                    <tr class="bali_nustra-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Bali
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->bali }}
                                    </td>
                                    <th>
                                        NTB
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->ntb }}
                                    </td>
                                    <th>
                                        NTT
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->ntt }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th class="category-header" onclick="toggleCategory('papuaa')">
                            KATEGORI PAPUA
                        </th>
                        <td>
                            {{ $dataKunjungan->papuaa }}
                        </td>
                    </tr>
                    <tr class="papuaa-content category-content">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <th>
                                        Maluku
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->maluku }}
                                    </td>
                                    <th>
                                        Maluku Utara
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->maluku_utara }}
                                    </td>
                                    <th>
                                        Papua
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua }}
                                    </td>
                                    <th>
                                        Papua Barat
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_barat }}
                                    </td>
                                    <th>
                                        Papua Barat Daya
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_baratdaya }}
                                    </td>
                                    <th>
                                        Papua Selatan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_selatan }}
                                    </td>
                                    <th>
                                        Papua Tengah
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_tengah }}
                                    </td>
                                    <th>
                                        Papua Pegunungan
                                    </th>
                                    <td>
                                        {{ $dataKunjungan->papua_pegunungan }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.data-kunjungans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleCategory(category) {
            const content = document.querySelector(`.${category}-content`);
            content.style.display = content.style.display === 'none' ? 'block' : 'none';
        }
    </script>
    <script>
        // Get the canvas element and its context
        var ctx = document.getElementById('chartCanvas').getContext('2d');

        // Prepare your data (replace this with your actual data)
        var regions = ['ASEAN', 'Asia', 'Timur Tengah', 'Eropa', 'Amerika', 'Oseania', 'Afrika', ];
        var regionTotals = [{{ $dataKunjungan->asean }}, {{ $dataKunjungan->asia }},
            {{ $dataKunjungan->timur_tengah }},
            {{ $dataKunjungan->eropa }}, {{ $dataKunjungan->amerika }}, {{ $dataKunjungan->oseania }},
            {{ $dataKunjungan->afrika }},
        ];

        // Create the chart
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regions,
                datasets: [{
                    label: 'Mancanegara',
                    data: regionTotals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regions2,
                datasets: [{
                    label: 'Region Totals',
                    data: region2Totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('aseanPieChart').getContext('2d');

        var regions = ['Malaysia', 'Filipina', 'Singapura', 'Thailand', 'Vietnam', 'ASEAN Lainnya'];
        var populations = [
            {{ $dataKunjungan->malaysia }},
            {{ $dataKunjungan->filipina }},
            {{ $dataKunjungan->singapura }},
            {{ $dataKunjungan->thailand }},
            {{ $dataKunjungan->vietnam }},
            {{ $dataKunjungan->aseanlainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ];

        var aseanPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di ASEAN'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('asiaPieChart').getContext('2d');

        var regions = ['Hong Kong', 'India', 'Japan', 'Korea Selatan', 'Taiwan', 'Tiongkok', 'Timor Leste', 'Asia Lainnya'];
        var populations = [
            {{ $dataKunjungan->hongkong }},
            {{ $dataKunjungan->india }},
            {{ $dataKunjungan->jepang }},
            {{ $dataKunjungan->korea_selatan }},
            {{ $dataKunjungan->taiwan }},
            {{ $dataKunjungan->tiongkok }},
            {{ $dataKunjungan->timor_leste }},
            {{ $dataKunjungan->asia_lainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(0, 255, 0, 0.5)'
        ];

        var asiaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Asia'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('timurTengahPieChart').getContext('2d');

        var regions = ['Arab Saudi', 'Kuwait', 'Mesir', 'UAE', 'Yaman', 'Timur Tengah Lain'];
        var populations = [
            {{ $dataKunjungan->arab_saudi }},
            {{ $dataKunjungan->kuwait }},
            {{ $dataKunjungan->mesir }},
            {{ $dataKunjungan->uae }},
            {{ $dataKunjungan->yaman }},
            {{ $dataKunjungan->timur_tengah_lain }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ];

        var timurTengahPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Timur Tengah'
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('eropaPieChart').getContext('2d');

        var regions = ['Perancis', 'Jerman', 'Belanda', 'Inggris', 'Rusia', 'Eropa Lainnya'];
        var populations = [
            {{ $dataKunjungan->perancis }},
            {{ $dataKunjungan->jerman }},
            {{ $dataKunjungan->belanda }},
            {{ $dataKunjungan->inggris }},
            {{ $dataKunjungan->rusia }},
            {{ $dataKunjungan->eropa_lainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)'
        ];

        var eropaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Eropa'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('amerikaPieChart').getContext('2d');

        var regions = ['Amerika Serikat', 'Kanada', 'Brazil', 'Meksiko', 'Amerika Lainnya'];
        var populations = [
            {{ $dataKunjungan->amerika_serikat }},
            {{ $dataKunjungan->kanada }},
            {{ $dataKunjungan->brazil }},
            {{ $dataKunjungan->meksiko }},
            {{ $dataKunjungan->amerika_lainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)'
        ];

        var amerikaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Amerika'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('oseaniaPieChart').getContext('2d');

        var regions = ['Australia', 'Selandia Baru', 'Papua Nugini', 'Oseania Lainnya'];
        var populations = [
            {{ $dataKunjungan->australia }},
            {{ $dataKunjungan->selandia_baru }},
            {{ $dataKunjungan->papua_nugini }},
            {{ $dataKunjungan->oseania_lainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)'
        ];

        var oseaniaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Oseania'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('afrikaPieChart').getContext('2d');

        var regions = ['Afrika Selatan', 'Afrika Lainnya'];
        var populations = [
            {{ $dataKunjungan->afrika_selatan }},
            {{ $dataKunjungan->afrika_lainnya }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)'
        ];

        var afrikaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Afrika'
                }
            }
        });
    </script>

    <script>
        // Get the canvas element and its context
        var ctx = document.getElementById('chartCanvas2').getContext('2d');

        var regions2 = ['Jawa', 'Kalimantan', 'Sumatera', 'Sulawesi', 'Balinustra', 'Papua'];
        var region2Totals = [{{ $dataKunjungan->jawa }}, {{ $dataKunjungan->kalimantan }},
            {{ $dataKunjungan->sumatera }}, {{ $dataKunjungan->sulawesi }}, {{ $dataKunjungan->bali_nustra }},
            {{ $dataKunjungan->papuaa }}
        ];

        // Create the chart
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regions2,
                datasets: [{
                    label: 'Nusantara',
                    data: region2Totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: regions2,
                datasets: [{
                    label: 'Region Totals',
                    data: region2Totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('jawaPieChart').getContext('2d');

        var regions = ['Jawa Timur', 'Jawa Barat', 'Jawa Tengah', 'DIY', 'DKI Jakarta', 'Banten'];
        var populations = [
            {{ $dataKunjungan->jawa_timur }},
            {{ $dataKunjungan->jawa_barat }},
            {{ $dataKunjungan->jawa_tengah }},
            {{ $dataKunjungan->diy }},
            {{ $dataKunjungan->dki }},
            {{ $dataKunjungan->banten }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)' // Add more colors as needed
        ];

        var jawaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Jawa'
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('kalimantanPieChart').getContext('2d');

        var regions = ['Kaltara', 'Kaltim', 'Kalteng', 'Kalbar', 'Kalsel'];
        var populations = [
            {{ $dataKunjungan->kaltara }},
            {{ $dataKunjungan->kaltim }},
            {{ $dataKunjungan->kalteng }},
            {{ $dataKunjungan->kalbar }},
            {{ $dataKunjungan->kalsel }}
        ];


        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)'
        ];

        var kalimantanPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Kalimantan'
                }

            }

        });
    </script>
    <script>
        var ctx = document.getElementById('sumateraPieChart').getContext('2d');

        var regions = ['Aceh', 'Sumatera Utara', 'Riau', 'Kepulauan Riau', 'Jambi', 'Sumatera Barat', 'Sumatera Selatan',
            'Kepulauan Bangka Belitung', 'Bengkulu', 'Lampung'
        ];
        var populations = [
            {{ $dataKunjungan->aceh }},
            {{ $dataKunjungan->sumut }},
            {{ $dataKunjungan->riau }},
            {{ $dataKunjungan->kep_riau }},
            {{ $dataKunjungan->jambi }},
            {{ $dataKunjungan->sumbar }},
            {{ $dataKunjungan->sumsel }},
            {{ $dataKunjungan->bangka }},
            {{ $dataKunjungan->bengkulu }},
            {{ $dataKunjungan->lampung }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(0, 255, 0, 0.5)',
            'rgba(0, 0, 255, 0.5)',
            'rgba(128, 128, 128, 0.5)' // Add more colors as needed
        ];

        var sumateraPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Sumatera'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('sulawesiPieChart').getContext('2d');

        var regions = ['Sulawesi Utara', 'Sulawesi Barat', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara',
            'Gorontalo'
        ];
        var populations = [
            {{ $dataKunjungan->sulut }},
            {{ $dataKunjungan->sulbar }},
            {{ $dataKunjungan->sulteng }},
            {{ $dataKunjungan->sulsel }},
            {{ $dataKunjungan->sulgara }},
            {{ $dataKunjungan->gorontalo }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)' // Add more colors as needed
        ];

        var sulawesiPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Sulawesi'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('baliNusraPieChart').getContext('2d');

        var regions = ['Bali', 'Nusa Tenggara Barat (NTB)', 'Nusa Tenggara Timur (NTT)'];
        var populations = [
            {{ $dataKunjungan->bali }},
            {{ $dataKunjungan->ntb }},
            {{ $dataKunjungan->ntt }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var baliNusraPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Bali & Nusa Tenggara'
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('papuaPieChart').getContext('2d');

        var regions = ['Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Papua Barat Daya', 'Papua Selatan',
            'Papua Tengah', 'Papua Pegunungan'
        ];
        var populations = [
            {{ $dataKunjungan->maluku }},
            {{ $dataKunjungan->maluku_utara }},
            {{ $dataKunjungan->papua }},
            {{ $dataKunjungan->papua_barat }},
            {{ $dataKunjungan->papua_baratdaya }},
            {{ $dataKunjungan->papua_selatan }},
            {{ $dataKunjungan->papua_tengah }},
            {{ $dataKunjungan->papua_pegunungan }}
        ];

        var totalPopulation = populations.reduce((a, b) => a + b, 0);
        var percentages = populations.map(population => ((population / totalPopulation) * 100).toFixed(2));

        var backgroundColors = [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(0, 255, 0, 0.5)'
        ];

        var papuaPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: regions,
                datasets: [{
                    data: percentages,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Persentase Populasi Wilayah di Papua'
                }
            }
        });
    </script>
@endsection
