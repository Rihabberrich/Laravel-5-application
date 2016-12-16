@extends('template.dashboard')

@section('title',"Editer le climat")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h4 class="title">Formulaire d'ajout du climat d'une journée</h4>
                </div>
                <div class="content">
                    @include('climat._form', [
                        'url'           => route('climat.update', $climat),
                        'method'        => 'PUT',
                        'name'          => old('name', $climat->name),
                        'serres'        => $serres,
                        'serre_id'       => old('serre_id', $climat->serre_id),
                        'envirenement'   => old('envirenement', $climat->envirenement),
                        'tmax'           => old('tmax', $climat->tmax),
                        'tmin'           => old('tmin', $climat->tmin),
                        'text'           => old('text', $climat->text),
                        'tint'           => old('tint', $climat->tint),
                        'hmes'           => old('hmes', $climat->hmes),
                        'vmes'           => old('vmes', $climat->vmes),
                        'rs'             => old('rs', $climat->rs),
                        'dinst'          => old('dinst', $climat->dinst),
                        'krs'            => old('krs', $climat->krs),
                        'date'           => old('date', $climat->date),
                        'zones'          =>old('zone', $zones),
                        'zone_id'        =>old('zone_id',$climat->zone_id),
                    ])
                </div>
            </div>
        </div>
    </div>

@endsection
