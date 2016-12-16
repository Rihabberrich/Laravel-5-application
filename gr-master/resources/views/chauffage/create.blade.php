<?php
/**
 * Created by PhpStorm.
 * User: ghdj
 * Date: 16/09/16
 * Time: 15:04
 */

?>

@extends('template.dashboard')

@section('title',"Les traitements du chauffage")

@section('content')



    <div class="card">
        <div class="header">
            <h4 class="title">Création d'une traitement chauffage : </h4>
        </div>
        <div class="container-fluid">
            <form action="{{ route('chauffage.store') }}" method="post" role="form">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="form-group">
                            <label for="serre" class="label">Choisir la serre : </label>
                            <select name="serre" class="form-control">
                                @foreach($serres as $serre)
                                    <option value="{{ $serre->id }}"> {{ $serre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <label for="type" class="label">
                            Type de coefficient de transfert thermique :
                        </label>
                        <select name="type" id="chauff_type" class="form-control">
                            <option value="0" selected>Kittas, 1987</option>
                            <option value="1">Bot, 1983</option>
                            <option value="2">Von Elsner, 1982</option>
                            <option value="3">Kanthak, 1970</option>
                            <option value="4">Takami et al, 1977</option>
                            <option value="5">Mac Adams, 1954</option>
                            <option value="6">Masmoudi</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <label for="date">Choisir la période :</label>

                            <input type="date" name="dated" class="form-control col-md-6">

                        </div>


                    </div>
                    <div class="col-md-6 text-center">
                        <div class="form-group">
                            <label for="date">Jusqu'à</label>

                            <input type="date" name="datef" class="form-control col-md-6">
                        </div>


                    </div>
                </div>

                <div class="row">

                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <input type="submit" value="Enregistrer" class="btn btn-success">
                        </div>
                    </div>

                </div>

            </form>
        </div>


    </div>

@endsection
