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
    <canvas id="grafikKomponen"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('grafikKomponen').getContext('2d');
const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($data->pluck('komponen')) !!},
        datasets: [{
            label: 'Tercapai (%)',
            data: {!! json_encode($data->pluck('persentase')) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.7)'
        }]
    },
    options: {
        indexAxis: 'y',
        scales: {
            x: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});
</script>

@stop
