@extends('template.dashboard')

@section('title',"Gestion de Zones")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('zone.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Nouveau zone</a>
            <form action="" method="get" class="form-inline  pull-right" role="form">
                <div class="form-group">
                    <label class="sr-only" for="">Recherche</label>
                    <input type="text" class="form-control" name="search" placeholder="chercher ici" value="{{ old('search') }}">
                </div>
                <button type="submit" class="btn btn-success"><i class="pe-7s-search"></i></button>
            </form>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="header">
            <h4 class="title">La liste des zones disponible</h4>
            <p class="category">Here is a subtitle for this table</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>Nom de la zone</th>
                    <th>Adresse</th>
                    <th width="110">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($zones as $item)
                    <tr>
                        <td width="50">
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->nom }}
                        </td>
                        <td>
                            {{ $item->emplacement }}
                        </td>
                        <td width="110">
                            <a href="{{ route('zone.show', $item) }}"
                               class="btn btn-xs btn-warning btn-fill">
                                <i class="pe-7s-look"></i>
                            </a>
                            <a href="{{ route('zone.edit', $item) }}"
                               class="btn btn-xs btn-success btn-fill">
                                <i class="pe-7s-pen"></i>
                            </a>
                            <form action="{{ route('zone.destroy', $item) }}" method="POST" class="pull-right">
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