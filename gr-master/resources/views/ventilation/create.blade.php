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
            <h4 class="title">Création d'une traitement ventilation : </h4>
        </div>
        <div class="container">
        <form action="{{ route('ventilation.store') }}" class="form-inline" method="post" role="form">
            {!! csrf_field() !!}
            <div class="form-group col-sm-6">
                <label for="date" class="sr-only">Choisir la date :</label>
              De :  <input type="date" name="dated" class="form-control">

                Jusqu'à :
                <input type="date" name="datef" class="form-control">
            </div>

            <div class="form-group  col-sm-6">
                <label for="serre">Choisir la serre : </label>
                <select name="serre" id="" class="form-control">
                    @foreach($serres as $serre)
                        <option value="{{ $serre->id }}"> {{ $serre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="pull-left">
                        <label for="type_vent">Choisir le type :</label>
                    </div>
                    <div class="pull-right">
                        <input type="radio" name="type_vent" checked class="form-control"> : L’ouverture et en toiture ou en position latérale </br>
                        <input type="radio" name="type_vent" class="form-control"> : L’ouverture et en toiture et en position latérale
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cpch">
                            CPCH :
                        </label>
                        <input type="text" name="cpch" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cprv">
                            CPCH :
                        </label>
                        <input type="text" name="corv" class="form-control">
                    </div>
                </div>
            </div>

            <!--    Type de coefficient de transfert thermique :
              <select name="type" id="chauff_type" class="form-control">
                   <option value="0" selected>Kittas, 1987</option>
                   <option value="1">Bot, 1983</option>
                   <option value="2">Von Elsner, 1982</option>
                   <option value="3">Kanthak, 1970</option>
                   <option value="4">Takami et al, 1977</option>
                   <option value="5">Mac Adams, 1954</option>
                   <option value="6">Masmoudi</option>
               </select>-->

            <div class="form-group pull-right">
                <input type="submit" value="Enregistrer" class="btn btn-success">
            </div>
        </form>
        </div>
        <div class="container">
            <table class="table table-responsive table-striped text-center">
                <tr>
                    <th class="text-center">CPch</th>
                    <th class="text-center">CPrv</th>
                    <th class="text-center">Tint-Th</th>
                    <th class="text-center">V</th>
                    <th class="text-center">Caractéristiques de la serre</th>

                    <th>Source</th>
                </tr>
                <tr>
                    <td> 0.64            </td>
                    <td>0.07-0.01</td>
                    <td>0.8-12</td>
                    <td>0-2</td>
                    <td>416 m2 2-span Filclair;
                        roof vents only; 20°</td>
                    <td>
                        Boulard and
                        Baille (1995)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.43
                    </td>
                    <td>0.07-0.01</td>
                    <td>0.8-12</td>
                    <td>2-4</td>
                    <td>416 m2 2-span Filclair;
                        roof vents only; 20°</td>
                    <td>
                        Boulard and
                        Baille (1995)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.75
                    </td>
                    <td>0.07</td>
                    <td>1-10</td>
                    <td>0.1-7</td>
                    <td>416 m2 2-span Filclair;
                        roof vents only; 20°</td>
                    <td>
                        Kittas et al. (1997)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.253
                    </td>
                    <td>0.075</td>
                    <td>0.9</td>
                    <td>4.9</td>
                    <td>149 m2, mono-span, screened side vents</td>
                    <td>
                        Teitel et al. (2008)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.127
                    </td>
                    <td>0.038</td>
                    <td>1-8</td>
                    <td>2</td>
                    <td>504 m2, 3-span; screened roof and side vents</td>
                    <td>
                        Liu et al. (2005)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.363
                    </td>
                    <td>0.07</td>
                    <td>1.6</td>
                    <td>2.2</td>
                    <td>160m2 mono-span arch, screened roof and side vents</td>
                    <td>
                        Katsoulas et al. (2006)
                    </td>
                </tr>
                <tr>
                    <td>
                        0.644
                    </td>
                    <td>0.09</td>
                    <td></td>
                    <td><2</td>
                    <td>416m2, 2span plastic house, Continious roof vents </td>
                    <td>
                        Wang and boulard, 1999
                    </td>
                </tr>
            </table>
        </div>

    </div>

@endsection

