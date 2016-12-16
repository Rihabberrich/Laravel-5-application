@extends('template.dashboard')

@section('title',"Creation d'une zone")

@section('head')
    <style>
        #map{
            min-height: 300px;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h4 class="title">Formulaire d'edition d'une zone</h4>
                </div>
                <div class="content">
                    @include('zone._form', [
                        'url'           => route('zone.update', $zone),
                        'method'        => "PUT",
                        'nom'           => old('nom', $zone->nom),
                        'emplacement'   => old('emplacement', $zone->emplacement),
                        'envirenement'  => old('envirenement'),
                        'latitude'      => old('latitude', $zone->latitude),
                        'longitude'     => old('longitude', $zone->longitude),
                    ])
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>

@endsection