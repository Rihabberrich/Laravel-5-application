<?php
/**
 * Created by PhpStorm.
 * User: ghdj
 * Date: 21/09/16
 * Time: 12:02
 */

?>

@extends('template.dashboard')

@section('title',"Les traitements du ventilation")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('photosynthese.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Ajouter traitement Photosynthése</a>

            <form action="" method="GET" class="form-inline  pull-right" role="form">
                <div class="form-group">
                    <label class="sr-only" for="">Recherche</label>
                    <input type="search" class="form-control" name="search" placeholder="chercher ici">
                </div>
                <button type="submit" class="btn btn-success"><i class="pe-7s-search"></i></button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="header">
            <h4 class="title">Affichage d'une traitement photosynthése : </h4>
        </div>
        <h3>Serre : {{ $phs[1]->serre_id }}</h3>
        <div class="card">
            @for ($j = 1; $j <= 1; $j++)

                <div class="panel">
                    <div class="container">
                        <div class="row">
                            <div id="chart{{ $j }}" class="ct-chart"></div>
                        </div>
                    </div>

                </div>

            @endfor
        </div>
        <div class="container">
            <table class="table table-responsive table-striped text-center">
                <tr class="text-center">
                    <th class="text-center">Heure</th>
                    <th class="text-center">Tint</th>
                    <th class="text-center">PAR</th>
                    <th class="text-center">LAI</th>
                    <th class="text-center">PB</th>

                </tr>
                @foreach($phs as $key=>$item)
                        <tr>
                            <td>{{ $item->heure }}</td>
                            <td>{{ $item->tint }}</td>
                            <td>{{ $item->par }}</td>
                            <td>{{ $item->lai }}</td>
                            <td>{{ $item->pb }}</td>
                        </tr>

                @endforeach
            </table>


        </div>


    </div>

@endsection

@section('script')
    <script type="text/javascript">



        // demo.initChartist();

        var dataSales = {
            labels:
                [@foreach($phs as $item) {{ number_format($item->heure,2) }}, @endforeach
            ],
            series: [[@foreach($phs as $item) {{ $item->pb }}, @endforeach]]
        };




        var optionsSales = {
            low: -20,
            high: 30,
            height: "600px",
            axisX: {
                showGrid: true,
            },
            showLine: true,
            showPoint: true,
        };

        var responsiveSales = [
            ['screen and (max-width: 640px)', {
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];



        Chartist.Line('#chart1', dataSales, optionsSales, responsiveSales);




    </script>


@endsection