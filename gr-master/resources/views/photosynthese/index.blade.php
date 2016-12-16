<?php
/**
 * Created by PhpStorm.
 * User: ghdj
 * Date: 22/09/16
 * Time: 13:30
 */
?>

@extends('template.dashboard')

@section('title',"Les traitements du photosynthese")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('photosynthese.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Ajouter traitement synthese</a>

        </div>
    </div>
    <br>
    <div class="card">
        <div class="header">
            <h4 class="title">La liste des traitement photosynthese disponibles</h4>
        </div>
        <div class="container">
        <form action="{{ route('photosynthese.show') }}" class="form-horizontal" method="post" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="dated" >Choisir la date :</label>
                <input type="date" name="dated" class="form-control">

                <label for="datef">Jusqu'à</label>
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


            <div class="form-group">
                <input type="submit" value="Afficher" class="btn btn-success">
            </div>
        </form>

    </div>
    </div>

@endsection