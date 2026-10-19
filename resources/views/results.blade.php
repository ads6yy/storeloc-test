@extends('layout')
@section('content')
    @if ($stores->isNotEmpty())
        <div class="results-layout">
            <div class="results-table">
                <table class="results">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Horaires</th>
                        <th>Services</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->address }}</td>
                            <td>{{ $store->zipcode }}</td>
                            <td>{{ $store->city }}</td>
                            <td>{{ $store->country_code }}</td>
                            <td>{{ $store->lat }}</td>
                            <td>{{ $store->lng }}</td>
                            <td>
                                @foreach(json_decode($store->hours) as $day => $hours)
                                    <b>{{ $day }}</b>
                                    <br>
                                    @foreach($hours as $hour)
                                        {{ $hour }}
                                        <br>
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                                @foreach($store->services as $service)
                                    {{ $service->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div id="map"></div>
        </div>

        <script>
            var map = L.map('map').setView([48.8566, 2.3522], 8);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            @foreach ($stores as $store)
                L.marker([{{ $store->lat }}, {{ $store->lng }}]).addTo(map);
            @endforeach
        </script>
    @endif
@endsection
