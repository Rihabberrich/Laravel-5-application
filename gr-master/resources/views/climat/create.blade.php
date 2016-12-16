@extends('template.dashboard')

@section('title',"Ajouter un climat")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <h4 class="title">Formulaire d'ajout du climat d'une journée</h4>
                </div>
                <div class="content">
                    @include('climat._form', [
                        'url'           => route('climat.store'),
                        'method'        => 'POST',
                        'name'          => old('name'),
                        'zones'        => $zones,
                        'zone_id'       => old('zone_id'),
                        'envirenement'   => old('envirenement'),
                        'tmax'           => old('tmax'),
                        'tmin'           => old('tmin'),
                        //'text'           => old('text'),
                        'hmes'           => old('hmes'),
                        'vmes'           => old('vmes'),
                        'rs'             => old('rs'),
                        'dinst'          => old('dinst'),
                        'krs'            => old('krs'),
                        'date'           => old('date'),
                    ])
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        $('#rs').click(function () {
            $('input[name=rs]').attr('enabled','enabled');
            $('input[name=krs]').attr('disabled','disabled');
            $('input[name=dinst]').attr('disabled','disabled');
        });
        $('#krs').click(function () {
            $('input[name=rs]').attr('disabled','disabled');
            $('input[name=krs]').attr('enabled','enabled');
            $('input[name=dinst]').attr('disabled','disabled');
        });
        $('#dinst').click(function () {
            $('input[name=rs]').attr('disabled','disabled');
            $('input[name=krs]').attr('disabled','disabled');
            $('input[name=dinst]').attr('enabled','enabled');
        });
    </script>
@endsection
