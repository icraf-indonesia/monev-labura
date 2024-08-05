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
            <h1 align="center" style="color:#80b441; padding-bottom:30px;"><b>Monitoring dan Evaluasi Labuhan Batu Utara</b></h1>
            {{-- <div
                class="swiffy-slider slider-nav-visible slider-nav-autoplay slider-nav-autopause slider-nav-animation slider-nav-animation-fadein slider-nav-animation-slow" data-slider-nav-autoplay-interval="7000">
                <ul class="slider-container">
                    <li class="slide-visible">
                        <img src="dist/assets/img/1.png">
                    </li>
                    <li><img src="dist/assets/img/2.png"></li>
                    <li><img src="dist/assets/img/3.png"></li>
                    <li><img src="dist/assets/img/4.png"></li>
                </ul>

                <button type="button" class="slider-nav"></button>
                <button type="button" class="slider-nav slider-nav-next"></button>

                <ul class="slider-indicators">
                    <li class="active"></li>
                    <li class=""></li>
                    <li class=""></li>
                    <li class=""></li>
                </ul>
            </div> --}}
            <div class="hidden-xs hidden-sm">
                <h2 style="padding-bottom:20px;">Pelaksanaan Rencana Aksi</h2>
                <p>Kakao merupakan salah satu komoditas unggulan perkebunan di Indonesia yang menempati peringkat kelima dalam produksi terbesar setelah kelapa sawit, karet, kopi, dan kelapa (BPS, 2019). Sebagai komoditas ekspor yang penting, produksi kakao memberikan kontribusi yang signifikan terhadap perekonomian sektor pertanian. Indonesia merupakan eksportir terbesar ketiga kakao di dunia setelah Ghana dan Pantai Gading. Namun, dalam rentang waktu 2013 hingga 2017, produksi kakao di Indonesia mengalami penurunan baik dari segi luas lahan maupun volume ekspor. Penurunan ini disebabkan oleh pengelolaan kebun yang belum optimal, serangan hama yang tinggi, serta penurunan produksi dan pendapatan petani kakao (Wijayanto, 2019).
                </p>
                <p>
                    Di Indonesia, salah satu provinsi dengan produksi kakao terbesar adalah Sulawesi Selatan, dan Luwu Utara menjadi salah satu kabupaten yang berkontribusi signifikan dalam produksi kakao. Sebagai kabupaten terluas di Sulawesi Selatan, Luwu Utara sangat bergantung pada sektor ekonomi berbasis lahan, termasuk kakao yang menyumbang sekitar 47,02% terhadap PDRB tahun 2020.
                </p>
                <p>
                    Kejayaan kakao Luwu Utara mencapai puncaknya pada tahun 2011 ketika diresmikan sebagai daerah sentra kakao Indonesia. Pada tahun 2009, luas lahan kakao di Kabupaten Luwu Utara mencapai 56.000 hektar, namun saat ini luas lahan kakao berkurang menjadi 38.435 hektar. Namun, kakao tetap menjadi sumber penghidupan utama bagi sebagian besar petani.
                </p>
            </div>
            <div class="dct-dashbd-lft hidden-xs hidden-sm">
                <h2 style="padding-bottom:20px;">Monitoring Rencana Aksi</h2>
                <table id="tabel-data" class="table table-bordered table-striped"
                                        style="width:100%; border:0; font-size:12;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Program</th>
                                                <th>Kegiatan</th>
                                                <th>Subkegiatan</th>
                                                <th>Indikator Keluaran</th>
                                                <th>% (2020) (Sem 1)</th>
                                                <th>Kategori (2020) (Sem 1)</th>
                                                <th>Nilai (2020) (Sem 1)</th>
                                                <th>% (2020) (Sem 2)</th>
                                                <th>Kategori (2020) (Sem 2)</th>
                                                <th>Nilai (2020) (Sem 2)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if (count($tables))
                                                @foreach ($tables as $table)
                                                    <tr>
                                                        <td width="1%">{{ (($tables->currentPage() * 10) - 10) + $loop->iteration }}</td>
                                                        <td width="10%">{{ $table->indikator }}</td>
                                                        <td width="1%">{{ $table->tahun }}</td>
                                                        <td width="1%">{{ $table->target }}</td>
                                                        <td width="2%">{{ $table->capaian }}</td>
                                                        <td width="2%">{{ $table->satuan }}</td>
                                                        @if (empty($table->dokumen))
                                                            <td width="2%">Belum ada dokumen</td>
                                                        @else
                                                            <td width="2%"><a href="{{url('/dokumen/'.$table->dokumen)}}" target="_blank">{{$table->dokumen}}</a></td>
                                                        @endif
                                                        <td width="1%">
                                                            @if($table->status === 0)
                                                                <span class="badge rounded-pill" style="background-color: #0d6efd !important;color: #fff;">Menunggu</span>
                                                            @elseif($table->status === 1)
                                                                <span class="badge rounded-pill" style="background-color: #198754 !important;color: #fff;">Diterima</span>
                                                            @else
                                                                <a class="custom-badge status-green text-right" href="/kontributor/capaian/{{ $table->id }}">
                                                                    Revisi
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tbody>
                                                    <tr>
                                                        <td>Tidak ada data</td>
                                                    </tr>
                                                </tbody>
                                            @endif --}}
                                        </tbody>
                                    </table>
            </div>
            <div class="hidden-xs hidden-sm">
                <h2 style="padding-bottom:20px;">Monitoring Dampak</h2>
                <div id='map'></div>
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

@section('js')
    <script src="path_to_jquery.js"></script>
    <script src="path_to_slick.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick();
        });
    </script>
@stop

@section('customJSLibrary')
<script src="https://unpkg.com/shpjs@latest/dist/shp.js"></script>
<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
@stop

@section('customJS')
let map, markers = [];

function initMap() {
    map = L.map('map', {
        center: {
            lat: -2.412288070373402,
            lng: 120.08931533060061,
        },
        zoom: 9
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
        this._div.innerHTML = '<h4>Peta Intervensi</h4>' +  (props ?
            '<b>' + props.Intrv + '</b>'
            : 'Arahkan pointer ke peta');
    };

    info.addTo(map);

    var geo = L.geoJson({features:[]}, {
        style,
        onEachFeature: function popUp(f, l) {
            //var out = [];
            //if (f.properties){
            //    for(var key in f.properties){
            //        out.push(key + ": " + f.properties[key]);
            //    }
            //    l.bindPopup(out.join("<br />"));
            //}
            l.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }
    }).addTo(map);

    var base = '{{url('')}}/shp/Invervention_map_v1_J_F.zip';
    shp(base).then(function(data){
        geo.addData(data);
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

function getColor(i) {
    return i === 0 ? '#b2182b' :
           i === 1 ? '#d6604d' :
           i === 2 ? '#f4a582' :
           i === 3 ? '#fddbc7' :
           i === 4 ? '#f7f7f7' :
           i === 5 ? '#d1e5f0' :
           i === 6 ? '#92c5de' :
           i === 7 ? '#4393c3' :
                    '#2166ac';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.Value)
    };
}

function generateMarker(data, index) {
    return L.marker(data.position, {
            draggable: data.draggable
        })
        .on('click', (event) => markerClicked(event, index))
        .on('dragend', (event) => markerDragEnd(event, index));
}

/* ------------------------- Handle Map Click Event ------------------------- */
function mapClicked($event) {
    console.log(map);
    console.log($event.latlng.lat, $event.latlng.lng);
}

/* ------------------------ Handle Marker Click Event ----------------------- */
function markerClicked($event, index) {
    console.log(map);
    console.log($event.latlng.lat, $event.latlng.lng);
}

/* ----------------------- Handle Marker DragEnd Event ---------------------- */
function markerDragEnd($event, index) {
    console.log(map);
    console.log($event.target.getLatLng());
}
@stop
