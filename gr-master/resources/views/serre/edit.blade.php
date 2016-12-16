@extends('template.dashboard')

@section('title',"Creation d'une serre")

@section('head')
    <style>
        .radio{
            display: inline-block;
            width:150px;
        }
        .img-type{
            height:50px;
            width:auto;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h4 class="title">Formulaire d'edition d'une serre</h4>
                </div>
                <div class="content">
                    @include('serre._form', [
                        'url'           => route('serre.update', $serre),
                        'method'        => 'PUT',
                        'name'           => $serre->name,
                        'zones'         => $zones,
                        'zone_id'       => $serre->zone_id,
                        'envirenement'  => old('envirenement'),
                        'nbr'           => $serre->nbr,
                        'ctz'           => $serre->ctz,
                        'c'             => $serre->c,
                        'w'             => $serre->w,
                        'l'             => $serre->l,
                        'h'             => $serre->h,
                        'e'             => $serre->e,
                        'd'             => $serre->d,
                        'tc'            => $serre->tc,
                        'enviroment_alpha' =>$serre->alpha,
                        'enviroment_beta'   =>$serre->beta,
                        'hvouv'         =>$serre->hvouv,
                        'stouv'         =>$serre->stouv,
                        'srf'           =>$serre->srf,
                        'ssd'           =>$serre->ssd,
                        'y'           =>$serre->y,
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