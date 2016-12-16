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
            <a href="{{ route('ventilation.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Ajouter traitement Ventilation</a>

        </div>
    </div>
    <br>
    <div class="card">
        <div class="header">
            <h3 class="title">Affichage d'une traitement ventilation : </h3>
        </div>

        <div class="container">



                @for ($j = 1; $j <= count($ventilations); $j++)

                    <div class="panel">
                        <div class="container">
                            <div class="row">
                                <div id="chart{{ $j }}" class="ct-chart"></div>
                            </div>
                        </div>

                    </div>

                @endfor

</div></div>
    <div class="card">
        <div class="container">
            <table class="table table-striped text-center table-bordered">
                <tr class="text-center">
                   <!-- <th class="text-center">Tint</th>-->
                    <th class="text-center">Heure</th>
                    <th class="text-center">R</th>

                </tr>
                @foreach($ventilations as $key=>$item)
                @for($i=0; $i<count($item);$i++)
                    <tr>

                        <td>{{ $item[$i]->heure }}</td>
                        <td>{{ $item[$i]->R }}</td>
                    </tr>
                    @endfor
                    @endforeach
            </table>


        </div>


    </div>

@endsection


@section('script')
    <script type="text/javascript">



        // demo.initChartist();

        var dataSales = {
            labels:   @for ($j = 1; $j <= count($ventilations); $j++)[@for($i = 0; $i < 23;$i++){{ $ventilations[$j][$i]->heure }}@if($i != 22),@endif @endfor] @endfor
            ,
            series: [
                    @for ($j = 1; $j <= count($ventilations); $j++)[@for($i = 0; $i < 23;$i++){{ floor($ventilations[$j][$i]->R) }}@if($i != 22),@endif @endfor], @endfor]
        };




        var optionsSales = {
            low: -5,
            high: 35,
            height: "350px",
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

        @for ($j = 1; $j <= count($ventilations); $j++)

                   Chartist.Line('#chart{{ $j }}', dataSales, optionsSales, responsiveSales);

        @endfor

        //Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);




    </script>


@endsection