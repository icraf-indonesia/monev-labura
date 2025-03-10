@extends('header')

@section('page_title', 'Beranda')

@section('customCSS')
    .info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
    }
    .info h4 {
    margin: 0 0 5px;
    color: #777;
    }
@stop

@section('css')
    <style type="text/css">
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
        }
    </style>
@stop

@section('content')
<div class="container-fluid" style="max-width: 1170px; margin: auto;">
    <div class="row">
        <h1 align="center" style="color:#80b441; padding-bottom:30px;"><b>Monitoring dan Evaluasi RAD KSB di Labuhanbatu Utara</b></h1>
    </div>

    <div class="row">
        <!-- Capaian Kumulatif -->
        <div class="col-md-6">
            <canvas id="capaianKumulatifChart"></canvas>
        </div>
        
        <!-- Capaian Kumulatif Komponen -->
        <div class="col-md-6">
            <canvas id="komponenChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Capaian Kumulatif Chart (Doughnut)
    // const capaianKumulatifData = {
    //     labels: ["Capaian", "Sisa Target"],
    //     datasets: [{
    //         data: [{{ $capaian_kumulatif }}, {{ 100 - $capaian_kumulatif }}],
    //         backgroundColor: ["#FF914D", "#F7DED0"]
    //     }]
    // };

    // new Chart(document.getElementById('capaianKumulatifChart'), {
    //     type: 'doughnut',
    //     data: capaianKumulatifData
    // });

    // Capaian Kumulatif Chart (Doughnut)
    const capaianKumulatifData = {
        labels: ["Tercapai", "Belum Tercapai"],
        datasets: [{
            data: [{{ $capaian_kumulatif }}, {{ 100 - $capaian_kumulatif }}],
            backgroundColor: ["#1E5377", "#FF914D"]
        }]
    };

    const ctx = document.getElementById('capaianKumulatifChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: capaianKumulatifData,
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            let value = tooltipItem.raw;
                            return value.toFixed(2) + '%'; // Display value as percentage
                        }
                    }
                }
            }
        }
    });

    // Capaian Kumulatif Komponen Chart (Bar)
    const komponenLabels = @json(array_column($komponen_chart, 'komponen'));
    const komponenValues = @json(array_column($komponen_chart, 'persentase'));

    new Chart(document.getElementById('komponenChart'), {
        type: 'bar',
        data: {
            labels: komponenLabels,
            datasets: [{
                label: 'Capaian (%)',
                data: komponenValues,
                backgroundColor: "#FF914D"
            }]
        }
    });
</script>
@stop
