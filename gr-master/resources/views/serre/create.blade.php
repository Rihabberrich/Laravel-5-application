@extends('template.dashboard')

@section('title',"Creation d'une serre")

@section('head')
    <style>
        .radio{
            display: inline-block;
            width:150px;
        }
        .img-type{
            height:200px;
            width:auto;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h3 class="title">Ajouter serre</h3>
                </div>
                <div class="content">
                    @include('serre._form', [
                        'url'           => route('serre.store'),
                        'method'        => 'POST',
                        'name'           => old('name'),
                        'zones'         => $zones,
                        'zone_id'       => old('zone_id'),
                        'envirenement'  => old('envirenement'),
                        'nbr'           => old('nbr', 1),
                        'ctz'           => old('ctz'),
                        'c'             => old('c'),
                        'w'             => old('w'),
                        'l'             => old('l'),
                        'h'             => old('h'),
                        'e'             => old('e'),
                        'd'             => old('d'),
                        'tc'            => old('tc'),
                        'enviroment_alpha' =>old('enviroment_alpha'),
                        'enviroment_beta'   =>old('enviroment_beta'),
                        'hvouv'         =>old('hvouv'),
                        'stouv'         =>old('stouv'),
                        'srf'           =>old('srf'),
                        'ssd'           =>old('ssd'),
                        'y'           =>old('y'),
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
        $("select[name=envirenement]").change(function () {
         //   $('input[name=enviroment_alpha').val();
         //   $('input[name=enviroment_alpha').val();
            switch ($("select[name=envirenement]").val()) {
                case "1":
                    //$alpha = 0.1;
                    $('input[name=enviroment_alpha').val(0.1);
                    // $beta  = 1.3;
                    $('input[name=enviroment_beta').val(1.3);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
                case "2":
                    // $alpha = 1.15;
                    $('input[name=enviroment_alpha').val(1.15);
                    //  $beta  = 1;
                    $('input[name=enviroment_beta').val(1);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
                case "3":
                    // $alpha = 0.2;
                    $('input[name=enviroment_alpha').val(0.2);
                    //  $beta  = 0.85;
                    $('input[name=enviroment_beta').val(0.85);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
                case "4":
                    //  $alpha = 0.25;
                    $('input[name=enviroment_alpha').val(0.25);
                    // $beta  = 0.67;
                    $('input[name=enviroment_beta').val(0.67);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
                case "5":
                    //  $alpha = 0.35;
                    $('input[name=enviroment_alpha').val(0.35);
                    // $beta  = 0.47;
                    $('input[name=enviroment_beta').val(0.47);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
                default:
                    // $alpha = null;
                    $('input[name=enviroment_alpha').val(0);
                    // $beta  = null;
                    $('input[name=enviroment_beta').val(0);
                    console.log($('input[name=enviroment_alpha').val());
                    break;
            }
        });

        $("select[name=ctz]").change(function () {
            //   $('input[name=enviroment_alpha').val();
            //   $('input[name=enviroment_alpha').val();
            switch ($("select[name=ctz]").val()) {
                case "1":
                    //$alpha = 0.1;
                    $('input[name=tcf]').val(0.9);
                    break;
                case "2":
                    // $alpha = 1.15;
                    $('input[name=tcf]').val(0.95);
                    //  $beta  = 1;
                    break;
                case "3":
                    // $alpha = 0.2;
                    $('input[name=tcf]').val(0.8);
                    break;
                case "4":
                    //  $alpha = 0.25;
                    $('input[name=tcf]').val(0.65);
                    break;
                case "5":
                    //  $alpha = 0.35;
                    $('input[name=tcf]').val(0.33);
                    break;
                case "6":
                    // $alpha = null;
                    $('input[name=tcf]').val(0.21);
                    break;
                case "7":
                    //  $alpha = 0.35;
                    $('input[name=tcf]').val(0.13);
                    break;
                default:
                    $('input[name=tcf]').val(0);
                    break;
            }
        });

    </script>

@endsection