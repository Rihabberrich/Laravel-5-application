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
            <h4 class="title">Création d'une traitement ventilation : </h4>
        </div>
        <div class="container">
            <form action="{{ route('ventilation.show') }}" class="form-horizontal" method="post" role="form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="date">Choisir la date :</label>
                    De :  <input type="date" name="dated" class="form-control">

                    Jusqu'à :
                    <input type="date" name="datef" class="form-control">
                </div>

                <div class="form-group">
                    <label for="serre">Choisir la serre : </label>
                    <select name="serre" id="" class="form-control">
                        @foreach($serres as $serre)
                            <option value="{{ $serre->id }}"> {{ $serre->name }}</option>
                        @endforeach
                    </select>
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
                    <input type="submit" value="Afficher" class="btn btn-success">
                </div>
            </form>
        </div>


    </div>

@endsection

