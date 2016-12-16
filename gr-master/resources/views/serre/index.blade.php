@extends('template.dashboard')

@section('title',"Gestion de Serre")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('serre.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Nouveau serre</a>
            <form action="" method="GET" class="form-inline  pull-right" role="form">
                <div class="form-group">
                    <label class="sr-only" for="zone">Choisir la zone</label>
                    <select name="zone" id="zone" class="form-control">
                        @foreach($zones as $zone)
                            <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success"><i class="pe-7s-search"></i></button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="header">
            <h4 class="title">La liste des serres disponible</h4>
            <p class="category">Here is a subtitle for this table</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de la serre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serres as $item)
                        <tr>
                            <td width="50">
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td width="110">
                                <a href="{{ route('serre.show', $item) }}"
                                   class="btn btn-xs btn-warning btn-fill"><i class="pe-7s-look"></i></a>
                                <a href="{{ route('serre.edit', $item) }}"
                                   class="btn btn-xs btn-success btn-fill"><i class="pe-7s-pen"></i></a>
                                <form action="{{ route('serre.destroy', $item) }}" method="POST" class="pull-right">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-xs btn-danger btn-fill"><i class="pe-7s-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection