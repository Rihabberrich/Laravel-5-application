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
                    <h4 class="title">Description de la serre <strong>{{ $serre->name }}</strong> </h4>
                </div>
                <div class="content">
                </div>

            <table class="table table-striped">
                <tr>
                    <th>
                        Nom
                    </th>
                    <td>
                        {{ $serre->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Nombre de chapelles
                    </th>
                    <td>
                        {{ $serre->nbr }}
                    </td>

                </tr>
                <tr>
                    <th>Type</th>
                    <td>

                                <label>
                                    <input disabled type="radio" name="type" value="1" {{ ($serre->type == 1) ? 'checked' :'' }}>
                                    <img class="img-type" src="/assets/img/type1.jpg"  alt="">
                                </label>


                                <label>
                                    <input disabled type="radio" name="type"  value="2" {{ ($serre->type == 2) ? 'checked' :'' }}>
                                    <img class="img-type" src="/assets/img/type2.jpg" alt="">
                                </label>

                            @if($errors->has('type'))
                                <span class="help-block">{{ $errors->first('type') }}</span>
                            @endif
                        </td>
                </tr>
                <tr>
                    <th>
                        Zone
                    </th>
                    <td>
                        {{ $serre->zone_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Description de l'environnement
                    </th>
                    <td>
                        Alpha : {{ $serre->alpha }}
                        Beta : {{ $serre->beta }}
                    </td>
                </tr>
                <tr>
                    <th>
                        C
                    </th>
                    <td>
                        {{ $serre->c }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Largeur de la serre
                    </th>
                    <td>
                        {{ $serre->w }}m
                    </td>
                </tr>
                <tr>
                    <th>
                        Longueur de la serre
                    </th>
                    <td>
                        {{ $serre->l }}m
                    </td>
                </tr>
                <tr>
                    <th>
                        Hauteur de la serre
                    </th>
                    <td>
                        {{ $serre->h }}m
                    </td>
                </tr>
                <tr>
                    <th>Hauteur latérale de la paroi</th>
                    <td>{{ $serre->e }}m</td>
                </tr>
                <tr>
                    <th>Arrêt du triangle</th>
                    <td>{{ $serre->d }}m</td>
                </tr>
                <tr>
                    <th>Coefficient de transmission de la paroi</th>
                    <td>{{ $serre->ctz }}</td>
                </tr>
                <tr>
                    <th>la température de cosigne agronomique</th>
                    <td>{{ $serre->tc }}°c</td>
                </tr>
                <tr>
                    <th>Hauteur vertical des ouvrants </th>
                    <td>{{ $serre->hvouv }}m</td>
                </tr>
                <tr>
                    <th>Surface total de l’ouverture</th>
                    <td>{{ $serre->stouv }}m²</td>
                </tr>
                <tr>
                    <th>Surface des ouvrants en toiture</th>
                    <td>{{ $serre->srf }}m²</td>
                </tr>
                <tr>
                    <th>Surface des ouvrants latéraux</th>
                    <td>{{ $serre->ssd }}m²</td>
                </tr>
                <tr>
                    <th>Surface du sol</th>
                    <td>{{ $serre->w * $serre->l }}m²</td>
                </tr>
                <tr>
                    <th>Volume de la serre</th>
                    <td><?php
                       echo App('Helper')->calc_volume_serre($serre->id);
                        ?>m<sup>3</sup></td>
                </tr>
                <tr>
                    <th>Surface de la serre</th>
                    <td><?php
                        echo App('Helper')->calc_ac($serre->id);
                        ?>m<sup>2</sup></td>
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