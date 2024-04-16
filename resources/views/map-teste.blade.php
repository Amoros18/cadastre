@extends('base')

@section('title', 'CHEF')

@section('content')
    <style>
        .text-center {
            text-align: center;
        }
        #map {
            width: '100%';
            height: 400px;
        }
    </style>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <div id='map'></div>

    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
        let map, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = L.map('map', {
                center: {
                    lat: {{$dossier->latitude}},
                    lng: {{$dossier->longitude}},
                },
                zoom: 15
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
                map.panTo(data.position);
                markers.push(marker)
            }
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
        var point =[[51.509, -0.08],[51.503, -0.06],[51.51, -0.047]];
        var marker = L.marker([{{$dossier->latitude}}, {{$dossier->longitude}}]).addTo(map);
        var points = <?php echo json_encode($points);?>;
        var polygon = L.polygon(points).addTo(map);
    </script>
    
@endsection