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
                    <h4 class="title">Formulaire d'une nouvelle zone</h4>
                </div>
                <div class="content">
                    @include('zone._form', [
                        'url'           => route('zone.store'),
                        'method'        => 'POST',
                        'nom'           => old('nom'),
                        'emplacement'   => old('emplacement'),
                        'envirenement'  => old('envirenement'),
                        'latitude'      => old('latitude'),
                        'longitude'     => old('longitude'),
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