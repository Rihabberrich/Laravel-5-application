<form action="{{ $url }}" method="POST">
    <input type="hidden" name="_method" value="{{ $method }}">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <label for="name">Nom de la serre</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Nom de la serre"
                       value="{{ $name }}">
                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('zone_id')) ? 'has-error' : '' }}">
                <label>CNom de l’exploitation </label>
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
        <div class="col-md-4">
            <div class="form-group {{ ($errors->has('envirenement')) ? 'has-error' : '' }}">
                <label>Description d'envirenement</label>
                <select name="envirenement" class="form-control">
                    <option value="1" selected>Océan ou Lac</option>
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
        <div class="col-md-1">
            <div class="form-group">
                <label for="enviroment_alpha">
                    Alpha
                </label>
                <input type="text" class="form-control" name="enviroment_alpha">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="enviroment_beta">
                    Beta
                </label>
                <input type="text" class="form-control" name="enviroment_beta">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group {{ ($errors->has('type')) ? 'has-error' : '' }}">
                <div class="col-sm-12">                <label>Type de serre :</label>
                    </div>
                <div class="col-sm-6">

                    <label>
                        <input type="radio" name="type" value="1" class="form-control" checked>
                        <img class="img-type" src="{{ asset('/assets/img/type1.jpg') }}"  alt="">
                    </label>
                </div>
                <div class="col-sm-6">
                    <label>
                        <input type="radio" name="type" class="form-control" value="2">
                        <img class="img-type" src="{{ asset('/assets/img/type2.jpg') }}" alt="">
                    </label>
                </div>
                @if($errors->has('type'))
                    <span class="help-block">{{ $errors->first('type') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <div class="header modal-title"><h3 class="title">
                Dimensionnement de la serre
            </h3></div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('c')) ? 'has-error' : '' }}">
                <label for="c">C</label>
                <input type="text"
                       name="c"
                       class="form-control"
                       value="{{ $c }}">
                @if($errors->has('c'))
                    <span class="help-block">{{ $errors->first('c') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('w')) ? 'has-error' : '' }}">
                <label for="w">Largeur de la serre (m)</label>
                <input type="text"
                       name="w"
                       class="form-control"
                       value="{{ $w }}">
                @if($errors->has('w'))
                    <span class="help-block">{{ $errors->first('w') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('l')) ? 'has-error' : '' }}">
                <label for="l">Longueur de la serre (m)</label>
                <input type="text"
                       name="l"
                       class="form-control"
                       value="{{ $l }}">
                @if($errors->has('l'))
                    <span class="help-block">{{ $errors->first('l') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('h')) ? 'has-error' : '' }}">
                <label for="h">Hauteur de la serre (m)</label>
                <input type="text"
                       name="h"
                       class="form-control"
                       value="{{ $h }}">
                @if($errors->has('h'))
                    <span class="help-block">{{ $errors->first('h') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group {{ ($errors->has('e')) ? 'has-error' : '' }}">
                <label for="e">Hauteur latérale de la paroi (m)</label>
                <input type="text"
                       name="e"
                       class="form-control"
                       value="{{ $e }}">
                @if($errors->has('e'))
                    <span class="help-block">{{ $errors->first('e') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group {{ ($errors->has('d')) ? 'has-error' : '' }}">
                <label for="d">Arrêt du triangle (m)</label>
                <input type="text"
                       name="d"
                       class="form-control"
                       value="{{ $d }}">
                @if($errors->has('d'))
                    <span class="help-block">{{ $errors->first('d') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group {{ ($errors->has('nbr')) ? 'has-error' : '' }}">
                <label for="nbr">Nombre de chapelles</label>
                <input type="number"
                       name="nbr"
                       class="form-control"
                       placeholder="Nombre de chapelles"
                       value="{{ $nbr }}">
                @if($errors->has('nbr'))
                    <span class="help-block">{{ $errors->first('nbr') }}</span>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="card">
        <div class="header modal-title"><h3 class="title">
                Caractéristiques de la couverture</h3>
        </div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ ($errors->has('ctz')) ? 'has-error' : '' }}">
                <label>Coefficient de transmission (Z)</label>
                <select name="ctz" class="form-control">
                    <option value="1"  selected>Verre standard 4 mm</option>
                    <option value="2">A/R Anti-réflexion 95+ </option>
                    <option value="3">seule couche de polyéthylène </option>
                    <option value="4">double polyéthylène</option>
                    <option value="5">PEbd traité anti UV</option>
                    <option value="6">PEbd + EVA </option>
                    <option value="7">PEbd + charges minerals</option>
                </select>
                @if($errors->has('ctz'))
                    <span class="help-block">{{ $errors->first('ctz') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="tcf">Valeur</label>
                <input type="text"
                       name="tcf"
                       class="form-control"
                >
                @if($errors->has('tcf'))
                    <span class="help-block">{{ $errors->first('tcf') }}</span>
                @endif
            </div>
        </div>

    </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="culture">
                            Culture
                        </label>
                        <select name="culture" id="culture" class="form-control select">
                            <option value="tomate">Tomate</option>
                            <option value="piment">Piment</option>
                            <option value="laitue">Laitue</option>
                            <option value="fraise">Fraise</option>
                            <option value="framboise">Framboise</option>
                            <option value="autres">Autres</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="variete">Variété</label>
                        <input type="text" name="variete" class="form-control">
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="card">
        <div class="header modal-title"><h3 class="title">
                Caractéristique de l’ouverture</h3>
    </div>
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('hvouv')) ? 'has-error' : '' }}">
                <label for="hvouv">Hauteur vertical des ouvrants (m)</label>
                <input type="hvouv"
                       name="hvouv"
                       class="form-control"
                       value="{{ $hvouv }}">
                @if($errors->has('hvouv'))
                    <span class="help-block">{{ $errors->first('hvouv') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('stouv')) ? 'has-error' : '' }}">
                <label for="stouv">Surface total de l’ouverture (m²)</label>
                <input type="stouv"
                       name="stouv"
                       class="form-control"
                       value="{{ $stouv }}">
                @if($errors->has('stouv'))
                    <span class="help-block">{{ $errors->first('stouv') }}</span>
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('srf')) ? 'has-error' : '' }}">
                <label for="srf">Surface des ouvrants en toiture (m²)</label>
                <input type="srf"
                       name="srf"
                       class="form-control"
                       value="{{ $srf }}">
                @if($errors->has('srf'))
                    <span class="help-block">{{ $errors->first('srf') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ ($errors->has('ssd')) ? 'has-error' : '' }}">
                <label for="ssd">Surface des ouvrants latéraux (m²)</label>
                <input type="ssd"
                       name="ssd"
                       class="form-control"
                       value="{{ $ssd }}">
                @if($errors->has('ssd'))
                    <span class="help-block">{{ $errors->first('ssd') }}</span>
                @endif
            </div>
        </div>



    </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group {{ ($errors->has('y')) ? 'has-error' : '' }}">
                        <label for="y">La hauteur verticale entre le milieu du point centrale  entre l’ouvrant de toiture et latérale (m)</label>
                        <input type="y"
                               name="y"
                               class="form-control"
                               value="{{ $y }}">
                        @if($errors->has('y'))
                            <span class="help-block">{{ $errors->first('y') }}</span>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="card">
        <div class="col-sm-12">
            <div class="form-group {{ ($errors->has('tc')) ? 'has-error' : '' }}">
                <label for="tc">Température de consigne agronomique  (TC)</label>
                <input type="text"
                       name="tc"
                       class="form-control"
                       value="{{ $tc }}">
                @if($errors->has('tc'))
                    <span class="help-block">{{ $errors->first('tc') }}</span>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-fill pull-right">Ajouter</button>
    <div class="clearfix"></div>
</form>