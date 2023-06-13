@extends('base')

@section('css')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <p class="font-weight-bold mb-0" style="font-size: 20px">Halaman Dashboard</p>
            <ol class="breadcrumb breadcrumb-transparent mb-0">
                <li class="breadcrumb-item active" aria-current="page">Dashboard
                </li>
            </ol>
        </div>
        <div class="w-100 p-2">
            <div id="map" style="height: 100vh; width: 100%;"></div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('/js/helper.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap"
            async
            defer></script>
    <script type="text/javascript">

        var map;

        function initMap() {
            const myLatLng = {lat: -7.5589494045543475, lng: 110.85658809673708};
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 13
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello World!",
            });
        }

        async function getAllLocation() {
            const svgMarkerODC = {
                path: "M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z",
                fillColor: "blue",
                fillOpacity: 1,
                strokeWeight: 0,
                rotation: 0,
                scale: 1.5,
                anchor: new google.maps.Point(15, 30),
            };

            try {
                let response = await $.get('/sample-map/data');
                let payload = response['payload'];
                $.each(payload, function (k, v) {
                    let position = {lat: v['latitude'], lng: v['longitude']};
                    new google.maps.Marker({
                        position: position,
                        map,
                        title: "Hello World!",
                        icon: svgMarkerODC,
                        label: {text: v['nama'], color: "green", fontWeight: "bold"}
                    });
                });
                console.log(response);
            } catch (e) {
                console.log(e);
            }
        }

        $(document).ready(function () {
            getAllLocation();
        })
    </script>
@endsection
