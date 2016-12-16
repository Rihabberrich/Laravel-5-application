<?php
/**
 * Created by PhpStorm.
 * User: ghdj
 * Date: 16/09/16
 * Time: 15:04
 */

?>

@extends('template.dashboard')

@section('title',"Les traitements du photosynthése")

@section('content')


    <br>
    <div class="card">
        <div class="header">
            <h4 class="title">Création d'une traitement photosynthése : </h4>
        </div>
        <div class="container">
        <form action="{{ route('photosynthese.store') }}" method="post" role="form">

            {!! csrf_field() !!}

            <div class="form-group">
                <label for="serre">Choisir la serre : </label>
                <select name="serre" id="" class="form-control">
                    @foreach($serres as $serre)
                        <option value="{{ $serre->id }}"> {{ $serre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="dated">Choisir la date :</label>
                        <input type="date" name="dated" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="datef">Jusqu'à</label>
                        <input type="date" name="datef" class="form-control">
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <label for="type_serre" class="col-sm-4">Choisir le type de la serre : </label>
                    <div class="col-sm-8">
                        <input type="radio" class="" name="type_serre" value="1" checked>  Serre fermée et non chauffée <br>
                        <input type="radio" class="" name="type_serre" value="2">  Serre cultivée et ventilée naturellement
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="co2">CO2 en PPM: </label>
                        <input type="text" name="co2" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="k"> K : </label>
                        <input type="text" name="k" class="form-control" value="0.58" placeholder="0.58">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="qe"> Qe : </label>
                        <input type="text" name="qe" class="form-control" value="0.0645" placeholder="0.0645">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="lai"> LAI : </label>
                        <input type="text" name="lai" class="form-control">

                    </div>
                </div>
            </div>

        <!--    CO2 en PPM :
            <select name="type" id="chauff_type" class="form-control">
                <option value="0" selected>Période nocture</option>
                <option value="1">Serre bien ventilé</option>
                <option value="2">Serre peu ventilé + une forte intensité lumineuse</option>
                <option value="3">Serre fermée + une forte intensité lumineuse</option>

            </select>-->

            <table class="table table-responsive table-striped text-center">
                <tr>
                    <th class="text-center">Description de la serre</th>
                    <th class="text-center">CO2 en PPM</th>
                </tr>
                <tr>
                    <td>Période nocturne</td>
                    <td>400-700</td>
                </tr>
                <tr>
                    <td>Serre bien ventilée</td>
                    <td>350</td>
                </tr>

                <tr>
                    <td>Serre peu ventilée + une forte intensité lumineuse</td>
                    <td>300</td>
                </tr>

                <tr>
                    <td>Serre fermée + une forte intensité lumineuse</td>
                    <td>250-200</td>
                </tr>
            </table>

            <div class="form-group pull-right">
                <input type="submit" value="Enregistrer" class="btn btn-success">
            </div>
        </form>
        </div>

    </div>

@endsection
