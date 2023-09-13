@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <canvas id="chartCanvas" width="400" height="200"></canvas>
    </div>
    <div class="col-lg-6">
        <canvas id="chartCanvas2" width="400" height="200"></canvas>
    </div>
</div>

<script>
    // Get the canvas element and its context
    var ctx1 = document.getElementById('chartCanvas').getContext('2d');
    var ctx2 = document.getElementById('chartCanvas2').getContext('2d');

    // Prepare your data (replace this with your actual data)
    var submissionLink = @json($submissionLinks->first()); // Get the first SubmissionLink object

    var regions = ['ASEAN', 'Asia', 'Timur Tengah', 'Eropa', 'Amerika', 'Oseania', 'Afrika'];
    var regionTotals = [
        submissionLink.asean,
        submissionLink.asia,
        submissionLink.timur_tengah,
        submissionLink.eropa,
        submissionLink.amerika,
        submissionLink.oseania,
        submissionLink.afrika
    ];

    var regions2 = ['Jawa', 'Kalimantan', 'Sumatera', 'Sulawesi', 'Balinustra', 'Papua'];
    var region2Totals = [
        submissionLink.jawa,
        submissionLink.kalimantan,
        submissionLink.sumatera,
        submissionLink.sulawesi,
        submissionLink.balinustra,
        submissionLink.papua
    ];

    // Create the first chart
    var chart1 = new Chart(ctx1, {
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

    // Create the second chart
    var chart2 = new Chart(ctx2, {
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
</script>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
