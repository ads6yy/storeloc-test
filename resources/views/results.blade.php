@extends('layout')
@section('content')
    @if ($stores->isNotEmpty())
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
