<?php
/**
 * Created by PhpStorm.
 * User: ghdj
 * Date: 16/09/16
 * Time: 15:06
 */
?>





@extends('template.dashboard')

@section('title',"Les traitements du chauffage")

@section('content')



        <div class="header">
            <h3 class="title">Affichage les traitement du chauffage : </h3>
        </div>



        @for ($j = 1; $j <= count($chauffages); $j++)

            <div class="panel">
           <div class="container">
               <div class="row">
               <div id="chart{{ $j }}" class="ct-chart"></div>
               </div>
           </div>

            </div>

        @endfor


    <div class="card">
        <table class="table table-striped">
            <tr>
                <th>T (°C)</th>
                <th>RS</th>
                <th>T ext (°C)</th>
                <th>Qch (w.m<sup>-2</sup>)</th>
                <th>Qch (kw)</th>
            </tr>
            @for ($j = 1; $j <= count($chauffages); $j++)
                @for($i = 0; $i < 23;$i++)
                    <tr>
                        <td>
                            {{ $chauffages[$j][$i]->heure }}
                        </td>
                        <td>
                            {{ $climat->rs }}
                        </td>
                        <td>
                            {{ $climat->text }}
                        </td>
                        <td>
                            {{ $chauffages[$j][$i]->valeur }}
                        </td>
                        <td>
                            {{ $chauffages[$j][$i]->valeur * App('Helper')->calc_volume_serre($chauffages[$j][$i]->serre_id)/100 }}
                        </td>
                    </tr>

                @endfor
            @endfor


        </table>
    </div>


@endsection




@section('script')
    <script type="text/javascript">



           // demo.initChartist();

           var dataSales = {
               labels:  @for ($j = 1; $j <= count($chauffages); $j++)[@for($i = 0; $i < 23;$i++){{ floor($chauffages[$j][$i]->heure) }}@if($i != 22),@endif @endfor] ,@endfor
               series: [
                       @for ($j = 1; $j <= count($chauffages); $j++)[@for($i = 0; $i < 23;$i++){{ floor($chauffages[$j][$i]->valeur) }}@if($i != 22),@endif @endfor], @endfor]
           };




           var optionsSales = {
                low: -400,
                high: 400,
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

            @for ($j = 1; $j <= count($chauffages); $j++)

                       Chartist.Line('#chart{{ $j }}', dataSales, optionsSales, responsiveSales);

            @endfor

            //Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);




    </script>


@endsection