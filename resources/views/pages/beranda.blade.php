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
    .legend {
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
@stop

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
                            <th>Target</th>
                            <th>Capaian</th>
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
            <div id="map" style="height: 600px;"></div>
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
    <script src="https://unpkg.com/shpjs@latest/dist/shp.js"></script>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    let map, markers = [], geo;

    function initMap() {
    map = L.map('map', {
    center: {
    lat: 2.3300,
    lng: 99.8125,
    },
    zoom: 10
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
    }).addTo(map);

    const info = L.control();

    info.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
    }

    info.update = function (props) {
    this._div.innerHTML = '<h4>Peta Unit Perencanaan</h4>' + (props ?
    '<b>' + props.PUv2 + '</b>'
    : 'Arahkan pointer ke peta');
    };

    info.addTo(map);

    geo = L.geoJson({features:[]}, {
    style: style,
    onEachFeature: function popUp(f, l) {
    l.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature
    });
    }
    }).addTo(map);

    var base = 'storage/shapefiles/PU_LBU_F_v2_F.zip';
    shp(base).then(function(data){
    geo.addData(data);

    // Debug: Check the first feature's properties
    if(data.features && data.features.length > 0) {
    console.log("First feature properties:", data.features[0].properties);
    }
    });

    map.on('click', mapClicked);
    }

    initMap();

    function highlightFeature(e) {
    const layer = e.target;
    layer.setStyle({
    weight: 5,
    color: '#666',
    dashArray: '',
    fillOpacity: 0.7
    });

    layer.bringToFront();

    info.update(layer.feature.properties);
    }

    function resetHighlight(e) {
    geo.resetStyle(e.target);
    info.update();
    }

    function zoomToFeature(e){
    map.fitBounds(e.target.getBounds());
    }

    function getColor(value) {
    // If value is undefined or null, return a default color
    if(value === undefined || value === null) {
    return '#CCCCCC'; // Light gray default
    }

    // Convert value to number if it's a string
    const i = typeof value === 'string' ? parseInt(value) : value;

    // Return color based on value
    return i === 0 ? '#b2182b' :
    i === 1 ? '#d6604d' :
    i === 2 ? '#f4a582' :
    i === 3 ? '#fddbc7' :
    i === 4 ? '#f7f7f7' :
    i === 5 ? '#d1e5f0' :
    i === 6 ? '#92c5de' :
    i === 7 ? '#4393c3' :
    i === 8 ? '#2166ac' :
    i === 9 ? '#053061' :
    i === 10 ? '#67001f' :
    i === 11 ? '#980043' :
    i === 12 ? '#ce1256' :
    i === 13 ? '#e7298a' :
    i === 14 ? '#df65b0' :
    i === 15 ? '#c994c7' :
    i === 16 ? '#d4b9da' :
    i === 17 ? '#e7e1ef' :
    i === 18 ? '#f7f4f9' :
    '#000000'; // default color for other values
    }

    function style(feature) {
    // Debug: Check the feature properties
    console.log("Feature properties:", feature.properties);

    // Get the value - using 'Value' property or default to 0 if not found
    const value = feature.properties.Value !== undefined ? feature.properties.Value : 0;

    return {
    weight: 2,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7,
    fillColor: getColor(value)
    };
    }

    function generateMarker(data, index) {
    return L.marker(data.position, {
    draggable: data.draggable
    })
    .on('click', (event) => markerClicked(event, index))
    .on('dragend', (event) => markerDragEnd(event, index));
    }

    function mapClicked($event) {
    console.log(map);
    console.log($event.latlng.lat, $event.latlng.lng);
    }

    function markerClicked($event, index) {
    console.log(map);
    console.log($event.latlng.lat, $event.latlng.lng);
    }

    function markerDragEnd($event, index) {
    console.log(map);
    console.log($event.target.getLatLng());
    }
@stop
