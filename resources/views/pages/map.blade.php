<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
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
            line-height: 18px;
            color: #555;
            padding: 6px 8px;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('storage/geojson/us-states.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            try {
                // Initialize the map
                const map = L.map('map').setView([37.8, -96], 4);

                // Verify map container
                const mapContainer = document.getElementById('map');
                if (!mapContainer || mapContainer.offsetHeight === 0) {
                    throw new Error('Map container not properly initialized');
                }

                // Add tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Color function
                function getColor(d) {
                    return d > 1000 ? '#800026' :
                        d > 500 ? '#BD0026' :
                        d > 200 ? '#E31A1C' :
                        d > 100 ? '#FC4E2A' :
                        d > 50 ? '#FD8D3C' :
                        d > 20 ? '#FEB24C' :
                        d > 10 ? '#FED976' :
                        '#FFEDA0';
                }

                // Style function
                function style(feature) {
                    return {
                        fillColor: getColor(feature.properties.density),
                        weight: 2,
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
                    this._div.innerHTML = props ?
                        `<b>${props.name}</b><br/>${props.density} people / mi<sup>2</sup>` :
                        'Hover over a state';
                };

                info.addTo(map);

                // Legend
                const legend = L.control({
                    position: 'bottomright'
                });

                legend.onAdd = function(map) {
                    const div = L.DomUtil.create('div', 'legend');
                    const grades = [0, 10, 20, 50, 100, 200, 500, 1000];

                    for (let i = 0; i < grades.length; i++) {
                        div.innerHTML +=
                            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
                    }

                    return div;
                };

                legend.addTo(map);

                // Check if the GeoJSON data was loaded
                if (typeof statesData !== 'undefined') {
                    // Store the GeoJSON layer reference for resetStyle
                    const geojson = L.geoJSON(statesData, {
                        style: style,
                        onEachFeature: function(feature, layer) {
                            layer.on({
                                mouseover: function(e) {
                                    const layer = e.target;
                                    layer.setStyle({
                                        weight: 5,
                                        color: '#666',
                                        dashArray: '',
                                        fillOpacity: 0.7
                                    });
                                    layer.bringToFront();
                                    info.update(layer.feature.properties);
                                },
                                mouseout: function(e) {
                                    geojson.resetStyle(e.target);
                                    info.update();
                                },
                                click: function(e) {
                                    map.fitBounds(e.target.getBounds());
                                }
                            });
                        }
                    }).addTo(map);
                } else {
                    throw new Error('statesData not found. Check your us-states.js file.');
                }

            } catch (error) {
                console.error('Map initialization error:', error);
                alert('Map failed to initialize: ' + error.message);
            }
        });
    </script>
</body>

</html>
