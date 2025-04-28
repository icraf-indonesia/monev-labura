<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
            z-index: 1;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
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
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>


<body>
    <div class="container">
        <h1>Unit Perencanaan</h1>
        <div id="map">
            <div class="loading">Loading map data...</div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/shpjs@latest/dist/shp.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            try {
                // Initialize the map centered on Indonesia
                const map = L.map('map').setView([-2.0, 118.0], 5);

                // Add tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Discrete color function for your categories
                function getCategoryColor(category) {
                    const colorMap = {
                        "Kawasan Lindung": "#2E8B57", // SeaGreen
                        "Kawasan Lindung – PS Definitif": "#3CB371", // MediumSeaGreen
                        "Kawasan Lindung – PS Pencadangan": "#20B2AA", // LightSeaGreen
                        "Kawasan Lindung – PS Potensi": "#5F9EA0", // CadetBlue
                        "Kawasan Lindung – LSD": "#4682B4", // SteelBlue
                        "Area Produksi": "#FF8C00", // DarkOrange
                        "Area Produksi – PS Definitif": "#FFA500", // Orange
                        "Area Produksi – PS Pencadangan": "#FFD700", // Gold
                        "Area Produksi – PS Potensi": "#DAA520", // GoldenRod
                        "Area Produksi – PS Pencadangan, LSD": "#B8860B", // DarkGoldenRod
                        "Area Produksi – LSD": "#CD853F", // Peru
                        "Area Pertanian": "#32CD32", // LimeGreen
                        "Area Pertanian – PS Definitif": "#9ACD32", // YellowGreen
                        "Area Pertanian – LSD": "#6B8E23", // OliveDrab
                        "Area Penggunaan Lain": "#A0522D", // Sienna
                        "Area Penggunaan Lain – PS Pencadangan": "#D2691E", // Chocolate
                        "Area Penggunaan Lain – LSD": "#8B4513", // SaddleBrown
                        "Area Penggunaan Lain – PS Potensi": "#A52A2A", // Brown
                        "Lainnya": "#696969" // DimGray
                    };

                    return colorMap[category] || "#CCCCCC"; // Default gray for unknown categories
                }

                // Style function using PUv2 attribute
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

                // Create legend
                const legend = L.control({
                    position: 'bottomright'
                });

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

                legend.addTo(map);

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
                    L.marker([-2.0, 118.0]).addTo(map)
                        .bindPopup('Gagal memuat data shapefile')
                        .openPopup();
                });

            } catch (error) {
                console.error('Map initialization error:', error);
                alert('Gagal menginisialisasi peta: ' + error.message);
            }
        });
    </script>

</html>
