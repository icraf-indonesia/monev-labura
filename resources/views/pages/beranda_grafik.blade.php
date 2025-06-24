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
        canvas {
            margin-bottom: 40px;
        }
    </style>
@stop

@section('content')
<div class="container-fluid" style="max-width: 1170px; margin: auto;">
    <div class="row">
        <h1 align="center" style="color:#80b441; padding-bottom:30px;">
            <b>Monitoring dan Evaluasi RAD KSB di Labuhanbatu Utara</b>
        </h1>
    </div>

    {{-- Grafik Ringkasan Komponen --}}
    <canvas id="grafikKomponen"></canvas>

    {{-- Grafik Per Komponen Per Tahun --}}
    @foreach($data as $komponen => $records)
        @php
            $canvasId = 'grafik_' . Str::slug($komponen, '_');
        @endphp

        <h5 class="mt-4 mb-2">{{ $komponen }}</h5>
        <canvas id="{{ $canvasId }}" height="200"></canvas>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Grafik Ringkasan Komponen
    const ctx = document.getElementById('grafikKomponen').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data->keys()) !!},
            datasets: [{
                label: 'Rata-rata Capaian (%)',
                data: {!! json_encode($data->map(fn($r) => round(collect($r)->avg('persentase'), 2))->values()) !!},
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

    // Grafik Per Komponen Per Tahun
    @foreach($data as $komponen => $records)
        const ctx_{{ Str::slug($komponen, '_') }} = document.getElementById('{{ 'grafik_' . Str::slug($komponen, '_') }}').getContext('2d');
        const labels_{{ Str::slug($komponen, '_') }} = {!! json_encode(collect($records)->pluck('tahun')) !!};
        const data_{{ Str::slug($komponen, '_') }} = {!! json_encode(collect($records)->pluck('persentase')) !!};

        new Chart(ctx_{{ Str::slug($komponen, '_') }}, {
            type: 'bar',
            data: {
                labels: labels_{{ Str::slug($komponen, '_') }},
                datasets: [{
                    label: 'Capaian per Tahun (%)',
                    data: data_{{ Str::slug($komponen, '_') }},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Capaian (%)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                },
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: '{{ $komponen }}'
                    }
                }
            }
        });
    @endforeach
</script>
@stop
