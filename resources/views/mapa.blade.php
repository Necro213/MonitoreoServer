@extends('layout.admin')

@section('styles')
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <div id="map"></div>
@endsection

@section('scripts')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh7zVjsEpOH0rEHs5OkXfrLkJzWjPCUco">
    </script>
    <script src="{{asset('js/mapa.js')}}"></script>
@endsection