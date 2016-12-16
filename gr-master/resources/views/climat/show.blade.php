@extends('template.dashboard')

@section('title',"Description de la serre ")

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
        tr th {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h4 class="title">Description du climat <strong>{{ $climat->date_string }}</strong> </h4>
                </div>
                <div class="content">
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>
                            Date
                        </th>
                        <td>
                            {{ $climat->date_string }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Temperature max
                        </th>
                        <td>
                            {{ $climat->tmax }}
                        </td>

                    </tr>
                    <tr>
                        <th>Température min</th>
                        <td>
                            {{ $climat->tmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Hmes
                        </th>
                        <td>
                            {{ $climat->hmes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Vmes
                        </th>
                        <td>
                             {{ $climat->vmes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            rs
                        </th>
                        <td>
                            {{ $climat->rs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dinst
                        </th>
                        <td>
                            {{ $climat->dinst }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Krs
                        </th>
                        <td>
                            {{ $climat->krs }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Zone
                        </th>
                        <td>
                            {{ $zone->nom }}
                        </td>
                    </tr>


                </table>
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