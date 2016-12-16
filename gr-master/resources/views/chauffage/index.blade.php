@extends('template.dashboard')

@section('title',"Les traitements du chauffage")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('chauffage.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Ajouter traitement chauffage</a>
            <div class="header">
                <h4 class="title">Afficher traitement chauffages disponibles</h4>
            </div>
        </div>
    </div>
    <br>
    <div class="card">

        <div class="container">
            <div class="row">

        <form action="{{ route('chauffage.show') }}" class="form-horizontal" method="post" role="form">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="dated">Choisir la date :</label>
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
    </div>
@endsection