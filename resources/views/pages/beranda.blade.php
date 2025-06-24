@extends('header')

@section('page_title', 'Beranda')

@section('css')
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
        }

        /* Float four columns side by side */
        .column {
            float: center;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* this adds the "card" effect */
            padding: 16px;
            margin-top: 15px;
            text-align: center;
            background-color: #f1f1f1;
            height: 1000px;
        }

        p {
            text-align: left;
        }

        /* Map specific styles */
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

        .info.legend {
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 7px rgba(0,0,0,0.4);
            font: 12px/14px Arial, Helvetica, sans-serif;
        }

        .info.legend h4 {
            margin: 0 0 10px;
            color: #333;
            font-size: 14px;
            font-weight: bold;
        }

        .legend-row {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
        }

        .legend-color {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            border: 1px solid #999;
            opacity: 0.8;
        }

        .legend-label {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Optional: Add scroll if too many items */
        .legend-scroll {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 5px;
        }
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: rgba(255,255,255,0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
        .chart-container {
        position: relative;
        height: 300px; 
        min-height: 300px;
        width: 100%;
        }
        
        .card {
            min-height: 400px;
        }

        .card-body {
            padding-bottom: 20px;
        }

        .card-header h4 a {
            color: white;
            text-decoration: none;
        }
        
        .card-header h4 a.collapsed i.fa-chevron-down {
            transform: rotate(-90deg);
            transition: transform 0.3s ease;
        }
        
        .card-header h4 a:not(.collapsed) i.fa-chevron-down {
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        /* Style untuk icon toggle */
        .toggle-icon {
            transition: transform 0.3s ease;
        }
        
        /* Rotasi icon ketika card expanded */
        [aria-expanded="true"] .toggle-icon {
            transform: rotate(180deg);
        }

        [data-toggle="collapse"] .toggle-icon {
            transition: transform 0.3s ease;
        }
        
        [data-toggle="collapse"][aria-expanded="true"] .toggle-icon {
            transform: rotate(180deg);
        }
        
        /* Warna teks dan icon */
        .card-header a {
            color: white;
            text-decoration: none;
        }
        
        .card-header a:hover {
            color: #f8f9fa;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid" style="max-width: 1170px; margin: auto;">
        <div class="row">
            <h1 align="center" style="color:#80b441; padding-bottom:30px;"><b>Monitoring dan Evaluasi Rencana Aksi Daerah
                    Kelapa Sawit Berkelanjutan (RAD KSB) di Kabupaten Labuhanbatu Utara</b></h1>
            <div
                class="swiffy-slider slider-item-ratio slider-item-ratio-21x9 slider-item-nogap slider-nav-autoplay slider-nav-autopause slider-indicators-round slider-nav-animation slider-nav-animation-fadein slider-nav-animation-slow" data-slider-nav-autoplay-interval="8000">
                <ul class="slider-container">
                    <li class="slide-visible">
                        <img src="dist/assets/img/slider labura.jpg">
                    </li>
                    <li><img src="dist/assets/img/slider labura2.jpg"></li>
                    <li><img src="dist/assets/img/slider labura3.jpg"></li>
                    <li><img src="dist/assets/img/slider labura4.jpg"></li>
                </ul>

                <button type="button" class="slider-nav"></button>
                <button type="button" class="slider-nav slider-nav-next"></button>

                <ul class="slider-indicators">
                    <li class="active"></li>
                    <li class=""></li>
                    <li class=""></li>
                    <li class=""></li>
                </ul>
            </div>
            <div>
                <h2 style="padding-bottom:20px;">Pelaksanaan Rencana Aksi</h2>
                <p>Kelapa sawit merupakan komoditas strategis yang berperan penting dalam perekonomian Indonesia, tidak
                    hanya sebagai sumber devisa negara tetapi juga sebagai penyedia lapangan pekerjaan bagi jutaan
                    masyarakat. Kabupaten Labuhanbatu Utara, sebagai salah satu sentra perkebunan kelapa sawit di Sumatera
                    Utara, memiliki luas tanaman kelapa sawit mencapai 93.221 hektar, yang memberikan kontribusi signifikan
                    terhadap produksi kelapa sawit. Dengan dominasi tutupan lahan kelapa sawit, sektor ini menjadi tulang
                    punggung perekonomian dan sumber penghidupan utama masyarakat. Namun, pengelolaan kelapa sawit di
                    Indonesia, termasuk di Labuhanbatu Utara, masih menghadapi berbagai tantangan yang memerlukan perbaikan
                    tata kelola dan praktik yang berkelanjutan.
                </p>
                <p>
                    Merespon Instruksi Presiden Nomor 6 Tahun 2019 tentang Rencana Aksi Nasional Perkebunan Kelapa Sawit
                    Berkelanjutan (RAN KSB) 2019-2024, Kabupaten Labuhanbatu Utara menunjukkan komitmen dalam pengelolaan
                    perkebunan yang berkelanjutan dengan menyusun Dokumen Rencana Aksi Daerah Perkebunan Kelapa Sawit
                    Berkelanjutan (RAD KSB). Dokumen ini dirancang untuk mengintegrasikan prinsip keberlanjutan ke dalam
                    perencanaan pembangunan daerah, mengedepankan sinergi antara aspek ekonomi, sosial budaya, dan ekologi.
                </p>
                <p>
                    Untuk memastikan implementasi RAD KSB berjalan sesuai rencana, diperlukan sebuah sistem monitoring dan
                    evaluasi (Monev) yang andal dan kolaboratif. Sistem Monev ini bertujuan untuk memantau efektivitas
                    pelaksanaan program, mengevaluasi dampaknya, dan mengidentifikasi peluang perbaikan berkelanjutan.
                    Dengan melibatkan semua pemangku kepentingan, termasuk pemerintah, pelaku usaha, dan masyarakat, sistem
                    ini diharapkan mampu memberikan rekomendasi berbasis data guna mendorong pengelolaan kelapa sawit yang
                    lebih berkelanjutan di Kabupaten Labuhanbatu Utara.
                </p>
            </div>
            <div class="dct-dashbd-lft hidden-xs hidden-sm">
                <h2 style="padding-bottom:20px;">Monitoring Rencana Aksi</h2>
                {{-- <form method="GET" action="{{ route('beranda') }}" class="mb-4" style="padding-bottom:10px;">
                    <label for="tahun" class="fw-bold me-2">Filter Tahun:</label>
                    <select name="tahun" id="tahun" class="form-select d-inline-block" style="width: 150px;"
                        onchange="this.form.submit()">
                        <option value="">Semua Tahun</option>
                        @foreach ($tahun_list as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </form> --}}
                <table id="tabeldata" class="table table-bordered table-striped" style="width:100%; font-size:12px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th>Subkegiatan</th>
                            <th>Indikator Keluaran</th>
                            <th>Target*</th>
                            <th>Capaian*</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($keluaran_tables->count())
                            @foreach ($keluaran_tables as $keluaran_table)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keluaran_table->program }}</td>
                                    <td>{{ $keluaran_table->kegiatan }}</td>
                                    <td>{{ $keluaran_table->subkegiatan }}</td>
                                    <td>{{ $keluaran_table->indikator_keluaran }}</td>
                                    <td>{{ $keluaran_table->target }}</td>
                                    <td>{{ $keluaran_table->capaian }}</td>
                                    <td>{{ $keluaran_table->tahun }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <p>* Angka pada kolom ini masih data contoh</p>
            </div>
            <h2 style="padding-bottom:20px;">Ketercapaian Komponen Indikator Kunci RAD KSB</h2>
            <p>RAD KSB Labuhanbatu Utara mencakup lima (5) komponen utama, yaitu:</p>
            <ul>
                <li>Komponen A: Penguatan data, koordinasi, dan infrastruktur (14 indikator)</li>
                <li>Komponen B: Peningkatan kapasitas dan kapabilitas pekebun (12 indikator)</li>
                <li>Komponen C: Pengelolaan dan pemantauan lingkungan (21 indikator)</li>
                <li>Komponen D: Tata kelola perkebunan dan penanganan sengketa (9 indikator)</li>
                <li>Komponen E: Dukungan percepatan pelaksanaan sertifikasi ISPO dan peningkatan akses pasar produk kelapa
                    sawit (6 indikator)</li>
            </ul>
            <canvas id="grafikKomponen" style="display: none;"></canvas>
            <p>Setiap grafik capaian tahunan dari lima komponen utama penguatan sektor perkebunan kelapa sawit menampilkan:</p>
            <ul>
                <li>Progres peningkatan sistem informasi, koordinasi lintas pihak, dan infrastruktur pendukung perkebunan.
                </li>
                <li>Capaian pelatihan, pendampingan, dan penguatan kelembagaan pekebun.
                </li>
                <li>Upaya perlindungan ekosistem dan pengurangan emisi dengan pengelolaan sawit berkelanjutan.
                </li>
                <li>Perkembangan pelaksanaan kemitraan, penyelesaian sengketa, dan penguatan tata kelola perkebunan sawit.
                </li>
                <li>Tingkat sosialisasi, pendampingan sertifikasi ISPO, dan penguatan akses pasar sawit berkelanjutan.
                </li>
            </ul>
            <div class="card card-primary">
                <div class="card-header" style="background:#80B441;">
                    <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse-komponen-grafik" aria-expanded="false">
                            <i class="fas fa-chart-line mr-2"></i>Grafik Capaian Indikator per Tahun
                            <i class="fas fa-chevron-down float-right toggle-icon"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse-komponen-grafik" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            @foreach($componentData as $komponen => $data)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chartKomponen{{ $loop->index }}"></canvas>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <p>Sedangkan di bawah ini adalah grafik capaian 15 indikator kunci dari 5 komponen strategis dalam rangka mencapai pengelolaan perkebunan kelapa sawit yang berkelanjutan di Kabupaten Labuhanbatu Utara: </p>
            <div class="card card-primary">
                <div class="card-header" style="background:#80B441;">
                    <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse-indikator-grafik" aria-expanded="false">
                            <i class="fas fa-chart-line me-2"></i>Grafik Capaian Indikator per Tahun
                            <i class="fas fa-chevron-down float-right toggle-icon"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse-indikator-grafik" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            @foreach($indikatorData as $indikator => $data)
                            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                                <div class="card w-100" style="height: 250px;">
                                    <div class="card-header">
                                        <h5 class="card-title">{{ $indikator }}</h5>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <div class="chart-container flex-grow-1">
                                            <canvas id="chartIndikator{{ $loop->index }}" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <h2 style="padding-bottom:20px;">Peta Intervensi Kelapa Sawit Berkelanjutan</h2>
            <div id="map" style="">
                <div class="loading">Memuat data peta...</div>
            </div>
            <h2 style="padding-bottom:20px;">StoryMap Kelapa Sawit Berkelanjutan</h2>
            <iframe src="https://storymaps.arcgis.com/stories/98e32ecb2192427090d37358c80f23c4" frameborder="0" style="width:100%; height:500px;"></iframe>
            <a href="https://storymaps.arcgis.com/stories/98e32ecb2192427090d37358c80f23c4" target="_blank" class="storymap-preview">
                <div>Tautan menuju StoryMap</div>
            </a>
        </div>
        <div class="row" style="padding-top: 50px;">
            <div>
                <h4 style="text-align: center"><b>Didukung oleh</b></h4>
                <p align="center"><img src="dist/assets/img/logoall-fin.png" alt="" style="max-width:50%;"></p>
            </div>
        </div>
    </div>
@stop

@section('customJSLibrary')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@stop

@section('js')
    <script src="path_to_jquery.js"></script>
    <script src="path_to_slick.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick();
        });
    </script>
@stop

@section('customJS')
    // Chart for Komponen
    const ctx = document.getElementById('grafikKomponen').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($grafik->pluck('komponen')) !!},
            datasets: [{
                label: 'Persentase Capaian',
                data: {!! json_encode($grafik->pluck('persentase')) !!},
                backgroundColor: [
                    '#4e79a7', // Komponen 1
                    '#f28e2b', // Komponen 2
                    '#e15759', // Komponen 3
                    '#76b7b2', // Komponen 4
                    '#59a14f', // Komponen 5
                ]
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        font: {
                            size: 14 // Change x-axis font size
                        }
                    },
                    title: {
                        display: true,
                        text: 'Capaian (%)', // X-axis label
                        font: {
                            size: 16 // X-axis label font size
                        }
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 14 // Change x-axis font size
                        },
                        callback: function(value, index) {
                            return String.fromCharCode(65 + index); // Override labels
                        }
                    },
                    title: {
                        display: true,
                        text: 'Komponen', // Y-axis label
                        font: {
                            size: 16 // Y-axis label font size
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Hides the legend
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y.toFixed(1) + '%';
                        }
                    }
                }
            }
        }
    });

    // Chart for 5 Komponen
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($componentData as $komponen => $data)
        const ctx{{ $loop->index }} = document.getElementById('chartKomponen{{ $loop->index }}').getContext('2d');
        const chart{{ $loop->index }} = new Chart(ctx{{ $loop->index }}, {
            type: 'bar',
            data: {
                labels: {!! json_encode($data->pluck('tahun')) !!},
                datasets: [{
                    label: 'Persentase Capaian',
                    data: {!! json_encode($data->pluck('persentase')) !!},
                    backgroundColor: '#4e79a7',
                    borderColor: '#4e79a7',
                    borderWidth: 1
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
                    title: {
                        display: true,
                        text: 'Komponen {{ $komponen }}'
                    },
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toFixed(1) + '%';
                            }
                        }
                    }
                }
            }
        });
        @endforeach
    });

    // Chart for Indikator Kunci
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($indikatorData as $indikator => $data)
        const ctx{{ $loop->index }} = document.getElementById('chartIndikator{{ $loop->index }}').getContext('2d');
        new Chart(ctx{{ $loop->index }}, {
            type: 'line',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Persentase Capaian',
                    data: @json($data['data']),
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 10,
                            callback: function(value) {
                                return value;
                            }
                        },
                        title: {
                            display: true,
                            text: 'Capaian (%)',
                            font: {
                                weight: 'bold'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun',
                            font: {
                                weight: 'bold'
                            }
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false 
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toFixed(1) + '%';
                            }
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 4,
                        hoverRadius: 6,
                        backgroundColor: 'white',
                        borderWidth: 2
                    }
                }
            }
        });
        @endforeach
        
        {{-- Jika ingin section terbuka secara default, tambahkan: --}}
        $('#collapse-indikator-grafik').collapse('show');
    });
    
    // Interactive Map Script
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Initialize the map centered on Labuhanbatu Utara
            const map = L.map('map').setView([2.3333, 99.75], 10); // Coordinates for Labuhanbatu Utara
            
            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Discrete color function for intervention categories
            function getInterventionColor(intervention) {
                const colorMap = {
                    "Tidak diintervensi": "#CCCCCC",
                    "Intervensi 1 - Perlindungan hutan terutama dalam zonasi ruang lindung dan konservasi": "#2E8B57",
                    "Intervensi 2 - Restorasi hutan pada area kritis dan terdegradasi di luar area perkebunan": "#3CB371",
                    "Intervensi 3 - Pengembangan sawah sebagai bagian strategi ketahanan pangan lokal": "#32CD32",
                    "Intervensi 4 - Intensifikasi kelapa sawit melalui penerapan praktik pertanian baik": "#FF8C00",
                    "Intervensi 5 - Intensifikasi budidaya karet berbasis praktik pertanian baik": "#FFA500",
                    "Intervensi 6 - Intensifikasi kelapa melalui pendekatan praktik pertanian baik": "#FFD700",
                    "Pengembangan agroforestri kelapa sawit, karet, dan kelapa dengan mempertimbangkan kesesuaian lahan": "#9ACD32",
                    "Intervensi 8 - Revitalisasi budidaya sawit, karet, dan kelapa dengan menggunakan benih unggul": "#DAA520",
                    "Intervensi 9 - Kemitraan usaha perkebunan dengan fasilitasi praktik pertanian berkelanjutan": "#6B8E23",
                    "Badan air": "#4682B4"
                };
                
                return colorMap[intervention] || "#696969";
            }

            // Style function
            function style(feature) {
                const intervention = feature.properties.PUv2;
                return {
                    fillColor: getInterventionColor(intervention),
                    weight: 0,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7
                };
            }

            // Info control
            const info = L.control();

            info.onAdd = function(map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function(props) {
                this._div.innerHTML = '<h4>Intervensi Labuhanbatu Utara</h4>' + (props ?
                    `<span style="font-size: 16px; font-weight: bold; color: #2E8B57; display: inline-block;">
                        ${props.PUv2}
                    </span>` :
                    '<h5>Arahkan kursor ke area</h5>');
            };

            info.addTo(map);

            // Load shapefile
            const shapefileUrl = "{{ asset('storage/shapefiles/Intervensi_Labura_j_dis_simple.zip') }}";
            const loadingElement = document.querySelector('.loading');
            
            loadingElement.textContent = 'Memuat data shapefile...';
            
            shp(shapefileUrl).then(function(geojson) {
                // Remove loading indicator
                loadingElement.remove();
                
                // Add GeoJSON layer
                const geojsonLayer = L.geoJSON(geojson, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        layer.on({
                            mouseover: function(e) {
                                const layer = e.target;
                                layer.setStyle({
                                    weight: 0,
                                    color: '#666',
                                    dashArray: '',
                                    fillOpacity: 0.9
                                });
                                layer.bringToFront();
                                info.update(layer.feature.properties);
                            },
                            mouseout: function(e) {
                                geojsonLayer.resetStyle(e.target);
                                info.update();
                            },
                            click: function(e) {
                                map.fitBounds(e.target.getBounds());
                            }
                        });
                    }
                }).addTo(map);

                // Fit map to layer bounds
                map.fitBounds(geojsonLayer.getBounds());

            }).catch(function(error) {
                console.error('Error loading shapefile:', error);
                loadingElement.textContent = 'Gagal memuat data peta. Silakan cek konsol.';
                loadingElement.style.color = 'red';
                
                // Add a fallback marker
                L.marker([2.3333, 99.75]).addTo(map)
                    .bindPopup('Gagal memuat data shapefile')
                    .openPopup();
            });

        } catch (error) {
            console.error('Map initialization error:', error);
            alert('Gagal menginisialisasi peta: ' + error.message);
        }
    });

    $(document).ready(function() {
        $('#tabeldata').DataTable({
            initComplete: function() {
                // Add sort indicators to headers (excluding the "No." column)
                this.api().columns().every(function() {
                    var column = this;
                    var title = $(column.header()).text();
                    
                    if (title !== 'No.') {
                        $(column.header()).append('');
                    }
                });
            },
            ordering: true,
            paging: true,
            lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
        });
    });
@stop