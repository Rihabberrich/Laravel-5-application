<form action="{{ $url }}" method="POST">
    <input type="hidden" name="_method" value="{{ $method }}">
    {!! csrf_field() !!}

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('zone_id')) ? 'has-error' : '' }}">
                <label>Choisir une zone</label>
                <select name="zone_id" class="form-control">
                    @foreach($zones as $item)
                        <option value="{{ $item->id }}" {{ ($zone_id == $item->id)? 'selected' : '' }}>{{ $item->nom }}</option>
                    @endforeach
                </select>
                @if($errors->has('zone_id'))
                    <span class="help-block">{{ $errors->first('zone_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }}">
                <label for="date">Date </label>
                <div id="datetimepicker1" class="input-append date">
                <input data-format="dd-mm-yyyy" type="date"
                       name="date"
                       class="form-control"
                       value="{{ $date }}">
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
                </div>
                @if($errors->has('date'))
                    <span class="help-block">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="header modal-title"><h3 class="title">
                Températures
            </h3></div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('tmax')) ? 'has-error' : '' }}">
                <label for="tmax">Température de l’air extérieur maximale (°C)</label>
                <input type="text"
                       name="tmax"
                       class="form-control"
                       value="{{ $tmax }}">
                @if($errors->has('tmax'))
                    <span class="help-block">{{ $errors->first('tmax') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('tmin')) ? 'has-error' : '' }}">
                <label for="tmin">Température de l’air extérieur minimale (°C)</label>
                <input type="text"
                       name="tmin"
                       class="form-control"
                       value="{{ $tmin }}">
                @if($errors->has('tmin'))
                    <span class="help-block">{{ $errors->first('tmin') }}</span>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="card">
        <div class="header modal-title"><h3 class="title">
                Vitesse du vent
            </h3></div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('hmes')) ? 'has-error' : '' }}">
                <label for="hmes">Hauteur de mesure (m)</label>
                <input type="hmes"
                       name="hmes"
                       class="form-control"
                       value="{{ $hmes }}">
                @if($errors->has('hmes'))
                    <span class="help-block">{{ $errors->first('hmes') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('vmes')) ? 'has-error' : '' }}">
                <label for="vmes">Vitesse du vent (m.s<sup>-1</sup>)</label>
                <input type="vmes"
                       name="vmes"
                       class="form-control"
                       value="{{ $vmes }}">
                @if($errors->has('vmes'))
                    <span class="help-block">{{ $errors->first('vmes') }}</span>
                @endif
            </div>
        </div>
    </div>
    </div>
        </div>
    <div class="card">
        <div class="header modal-title"><h3 class="title">
               Rayonnement Solaire
            </h3></div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div  id="rs"  class="form-group {{ ($errors->has('rs')) ? 'has-error' : '' }}">
                <label for="rs">Rayonnement solaire global horizontal (w.m <sup>-2</sup>)</label>

                <input type="rs"
                       name="rs"
                       class="form-control"

                       value="{{ $rs }}">
                @if($errors->has('rs'))
                    <span class="help-block">{{ $errors->first('rs') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div id="dinst"  class="form-group {{ ($errors->has('dinst')) ? 'has-error' : '' }}">
                <label for="dinst">Durée d’insolation (h)</label>
                <input type="text"
                       name="dinst"
                       class="form-control"

                       value="{{ $dinst }}">
                @if($errors->has('dinst'))
                    <span class="help-block">{{ $errors->first('dinst') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div id="krs" class="form-group {{ ($errors->has('krs')) ? 'has-error' : '' }}">
                <label for="krs">krs</label>
                <input type="text"
                       name="krs"
                       class="form-control"

                       value="{{ $krs }}">
                @if($errors->has('krs'))
                    <span class="help-block">{{ $errors->first('krs') }}</span>
                @endif
            </div>
        </div>
    </div>
            </div>
        </div>


    <button type="submit" class="btn btn-success btn-fill">Enregistrer</button>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="clearfix"></div>
</form>

