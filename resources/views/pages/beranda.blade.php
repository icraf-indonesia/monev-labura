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
        #map { 
            height: 600px; 
            width: 100%;
            z-index: 1;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
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
        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
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
    </style>
@stop

@section('content')
    <div class="container-fluid" style="max-width: 1170px; margin: auto;">
        <div class="row">
            <h1 align="center" style="color:#80b441; padding-bottom:30px;"><b>Monitoring dan evaluasi Rencana Aksi Daerah
                    Kelapa Sawit Berkelanjutan (RAD KSB) di Kabupaten Labuhanbatu Utara</b></h1>
            <div
                class="swiffy-slider slider-item-ratio slider-item-ratio-21x9 slider-item-nogap slider-nav-autoplay slider-indicators-round slider-nav-animation slider-nav-animation-fadein slider-nav-animation-slow">
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
            <div class="hidden-xs hidden-sm">
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
                <form method="GET" action="{{ route('beranda') }}" class="mb-4" style="padding-bottom:10px;">
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
                </form>
                <table id="tabel-data" class="table table-bordered table-striped" style="width:100%; font-size:12px;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th>Subkegiatan</th>
                            <th>Indikator Keluaran</th>
                            <th>Target*</th>
                            <th>Capaian*</th>
                            <!-- <th>Tahun</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @if ($keluaran_tables->count())
                            @foreach ($keluaran_tables as $keluaran_table)
                                <tr>
                                    <td>{{ ($keluaran_tables->currentPage() - 1) * $keluaran_tables->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $keluaran_table->program }}</td>
                                    <td>{{ $keluaran_table->kegiatan }}</td>
                                    <td>{{ $keluaran_table->subkegiatan }}</td>
                                    <td>{{ $keluaran_table->indikator_keluaran }}</td>
                                    <td>{{ $keluaran_table->target }}</td>
                                    <td>{{ $keluaran_table->capaian }}</td>
                                    <!-- <td>{{ $keluaran_table->tahun }}</td> -->
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

                <!-- Pagination -->
                <!-- <div class="d-flex justify-content-center">
                                {{ $keluaran_tables->appends(['tahun' => request('tahun')])->links() }}
                            </div> -->
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link"
                            href="{{ $keluaran_tables->url($keluaran_tables->onFirstPage()) }}">Awal</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $keluaran_tables->previousPageUrl() }}">Sebelum</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">{{ $keluaran_tables->currentPage() }}</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ $keluaran_tables->nextPageUrl() }}">Selanjutnya</a>
                    </li>
                    <li class="page-item"><a class="page-link"
                            href="{{ $keluaran_tables->url($keluaran_tables->lastPage()) }}">Akhir</a></li>
                </ul>
            </nav>
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
            <canvas id="grafikKomponen"></canvas>
            <h2 style="padding-bottom:20px;">Peta Kelapa Sawit Berkelanjutan</h2>
            <div id="map">
                <div class="loading">Memuat data peta...</div>
            </div>
        </div>
        <div class="row" style="padding-top: 50px;">
            <div class="hidden-xs hidden-sm">
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
            labels: {!! json_encode($data->pluck('komponen')) !!},
            datasets: [{
                label: '',
                data: {!! json_encode($data->pluck('persentase')) !!},
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
                    max: 100
                }
            },
            plugins: {
                legend: {
                    display: false // Hides the legend
                }
            }
        }
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

            // Discrete color function for categories
            function getCategoryColor(category) {
                const colorMap = {
                    "Kawasan Lindung": "#2E8B57",
                    "Kawasan Lindung – PS Definitif": "#3CB371",
                    "Kawasan Lindung – PS Pencadangan": "#20B2AA",
                    "Kawasan Lindung – PS Potensi": "#5F9EA0",
                    "Kawasan Lindung – LSD": "#4682B4",
                    "Area Produksi": "#FF8C00",
                    "Area Produksi – PS Definitif": "#FFA500",
                    "Area Produksi – PS Pencadangan": "#FFD700",
                    "Area Produksi – PS Potensi": "#DAA520",
                    "Area Produksi – PS Pencadangan, LSD": "#B8860B",
                    "Area Produksi – LSD": "#CD853F",
                    "Area Pertanian": "#32CD32",
                    "Area Pertanian – PS Definitif": "#9ACD32",
                    "Area Pertanian – LSD": "#6B8E23",
                    "Area Penggunaan Lain": "#A0522D",
                    "Area Penggunaan Lain – PS Pencadangan": "#D2691E",
                    "Area Penggunaan Lain – LSD": "#8B4513",
                    "Area Penggunaan Lain – PS Potensi": "#A52A2A",
                    "Lainnya": "#696969"
                };
                
                return colorMap[category] || "#CCCCCC";
            }

            // Style function
            function style(feature) {
                const category = feature.properties.PUv2;
                return {
                    fillColor: getCategoryColor(category),
                    weight: 1,
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
                this._div.innerHTML = '<h4>Unit Perencanaan</h4>' + (props ?
                    `<b>ID: ${props.IDSv2}</b><br/>
                    Kategori: ${props.PUv2}` :
                    'Arahkan kursor ke area');
            };

            info.addTo(map);

            {{-- // Create legend
            const legend = L.control({position: 'bottomright'});

            legend.onAdd = function(map) {
                const div = L.DomUtil.create('div', 'legend');
                div.innerHTML = '<h4>Kategori</h4>';
                
                const categories = [
                    "Kawasan Lindung",
                    "Kawasan Lindung – PS Definitif",
                    "Kawasan Lindung – PS Pencadangan",
                    "Kawasan Lindung – PS Potensi",
                    "Kawasan Lindung – LSD",
                    "Area Produksi",
                    "Area Produksi – PS Definitif",
                    "Area Produksi – PS Pencadangan",
                    "Area Produksi – PS Potensi",
                    "Area Produksi – PS Pencadangan, LSD",
                    "Area Produksi – LSD",
                    "Area Pertanian",
                    "Area Pertanian – PS Definitif",
                    "Area Pertanian – LSD",
                    "Area Penggunaan Lain",
                    "Area Penggunaan Lain – PS Pencadangan",
                    "Area Penggunaan Lain – LSD",
                    "Area Penggunaan Lain – PS Potensi",
                    "Lainnya"
                ];
                
                categories.forEach(category => {
                    div.innerHTML += 
                        `<i style="background:${getCategoryColor(category)}"></i> ${category}<br>`;
                });

                return div;
            };

            legend.addTo(map); --}}

            // Load shapefile
            const shapefileUrl = "{{ asset('storage/shapefiles/PU_LBU_F_v2_F.zip') }}";
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
                                    weight: 3,
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
@stop