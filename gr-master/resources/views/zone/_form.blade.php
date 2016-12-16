<form action="{{ $url }}" method="POST">
    <input type="hidden" name="_method" value="{{ $method }}">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('nom')) ? 'has-error' : '' }}">
                <label for="nom">Nom de l’exploitation </label>
                <input type="text"
                       name="nom"
                       class="form-control"
                       placeholder="nom de la zone"
                       value="{{ $nom }}">
                @if($errors->has('nom'))
                    <span class="help-block">{{ $errors->first('nom') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('emplacement')) ? 'has-error' : '' }}">
                <label>L'emplacement</label>
                <input type="text"
                       id="searchBox"
                       name="emplacement"
                       class="form-control"
                       placeholder="nom de la l'emplacement"
                       value="{{ $emplacement }}">
                @if($errors->has('nom'))
                    <span class="help-block">{{ $errors->first('emplacement') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('envirenement')) ? 'has-error' : '' }}">
                <label>Description d'envirenement</label>
                <select name="envirenement" class="form-control">
                    <option value="1" {{ ($envirenement == 1)? 'selected' : '' }}>Océan ou Lac</option>
                    <option value="2" {{ ($envirenement == 2)? 'selected' : '' }}>Terain plat</option>
                    <option value="3" {{ ($envirenement == 3)? 'selected' : '' }}>Zone rurale</option>
                    <option value="4" {{ ($envirenement == 4)? 'selected' : '' }}>zone urbaine</option>
                    <option value="5" {{ ($envirenement == 5)? 'selected' : '' }}>centre d'une grande ville</option>
                </select>
                @if($errors->has('envirenement'))
                    <span class="help-block">{{ $errors->first('envirenement') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ ($errors->has('latitude')) ? 'has-error' : '' }}">
                <label>Choisir un emplacement dans la map</label>
                <div id="map" ></div>
            </div>
        </div>
    </div>

    <input type="hidden" id="latitude" name="latitude" value="{{ $latitude }}">
    <input type="hidden" id="longitude" name="longitude" value="{{ $longitude }}">

    <button type="submit" class="btn btn-success btn-fill pull-right">Enregistrer</button>
    <div class="clearfix"></div>
</form>