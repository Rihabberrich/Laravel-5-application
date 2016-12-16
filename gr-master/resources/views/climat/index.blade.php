@extends('template.dashboard')

@section('title',"Gestion de climat")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('climat.create') }}" class="btn btn-success btn-fill"><i class="pe-7s-plus"></i> Nouveau donnée climat</a>
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
            <h4 class="title">La liste des climats disponible</h4>
            <p class="category">Here is a subtitle for this table</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <tr>


                    <th>Date</th>
                    <th>Zone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($climats as $item)
                    <tr>
                        <td>
                            {{ $item->date_string }}
                        </td>

                        <td>{{ $zones[$item->zone_id-1]->nom }}</td>
                        <td width="110">
                            <a href="{{ route('climat.show', $item) }}"
                               class="btn btn-xs btn-warning btn-fill"><i class="pe-7s-look"></i></a>
                            <a href="{{ route('climat.edit', $item) }}"
                               class="btn btn-xs btn-success btn-fill"><i class="pe-7s-pen"></i></a>
                            <form action="{{ route('climat.destroy', $item) }}" method="POST" class="pull-right">
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