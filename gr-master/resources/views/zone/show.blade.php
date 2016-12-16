@extends('template.dashboard')

@section('title',"La zone " . $zone->nom)

@section('content')

    <div class="card col-sm-8 col-sm-offset-2">
        <div class="header">
            <div class="row">
                <div class="col-sm-6">
                    <h4>{{ $zone->nom }}</h4>
                </div>
                <div class="col-sm-6">
                    <h4> {{ $zone->emplacement }}</h4>
                </div>
            </div>
            <div class="row">
                <div id="map"></div>
            </div>
        </div>
        <div class="content table-responsive table-full-width">


        </div>
    </div>

@endsection