<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', 'Default Title')</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 600px;
            width: 100%;
        }
        .container {
            padding: 20px;
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    @stack('scripts')

    <div class="container">
        <h1>Peta Kelapa Sawit Berkelanjutan</h1>
        <div id="map"></div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Initialize the map
            const map = L.map('map').setView([-2.0, 118.0], 5);
            
            // Check if map container exists and has dimensions
            const mapElement = document.getElementById('map');
            if (!mapElement || mapElement.offsetWidth === 0 || mapElement.offsetHeight === 0) {
                throw new Error('Map container not properly sized');
            }

            // Add tile layer with error handling
            const osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19,
            }).addTo(map);

            // Fallback tile layer
            const osmHotLayer = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19
            });

            // Test marker to verify map is working
            L.marker([-2.0, 118.0]).addTo(map)
                .bindPopup("Indonesia")
                .openPopup();

            // Define your regions data
            const regions = {
                "Bergdöşü": {
                    position: [3.5, 98.5],
                    plantations: ["Benderket", "Ips", "Lügga", "Sıdakların", "Salatlı", "Sıdaklı"]
                },
                "Pemalang": {
                    position: [-6.9, 109.4],
                    plantations: ["Sıraba", "Sıdamamı", "Belirsel", "Parapuramı", "Türün", "Çerçevesi", "Bahçe",
                        "Dolok-sargarı", "Sibororo-Borong", "PANAT", "Bahçe", "Tanklang", "Sibolga",
                        "Paroları", "Sevrek"
                    ]
                }
            };

            // Add markers for each region
            Object.keys(regions).forEach(region => {
                const { position, plantations } = regions[region];
                
                L.marker(position).addTo(map)
                    .bindPopup(`<b>${region}</b><br>${plantations.join(', ')}`);
                
                L.circle(position, {
                    color: 'green',
                    fillColor: '#90EE90',
                    fillOpacity: 0.3,
                    radius: 20000
                }).addTo(map);
            });

            console.log('Map initialized successfully');
        } catch (error) {
            console.error('Map initialization error:', error);
            alert('Failed to load map. Please check console for details.');
        }
    });
</script>

</html>