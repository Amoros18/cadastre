
<h1 class="text-primary text-center">
    @if ($table->id)
        Modifier Information de l'ouverture du dossier
    @else
        Enter les information relatif a l'ouverture du dossier
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire" method="POST">
        @csrf


        <div class="row">
            <div class="col">
                <h5 class="text-center">Entrer les informations relatives a l'ouverture du dossier</h5>
            </div>
        </div>

        <div class="row mt-1">
            <label for="prenom" class="label col-md-2 control-label">Nom Requerant:</label>
            <div class="col-md-10">
                <input required type="text" name="nom_requerant" class="form-control" value="{{old('nom_requerant',$table->nom_requerant)}}">
                @error("nom_requerant")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="sexe_requerant" class="label col-md-2 control-label">Sexe requerant:</label>
            <div class="col-md-10">
                <select name="sexe_requerant" id="sexe_requerant" class="form-select" required>
                    <option >{{old('sexe_requerant',$table->sexe_requerant)}}</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Mixte">Mixte</option>
                    <option value="">Non defini</option>
                </select>
                @error("sexe_requerant")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="prenom" class="label col-md-2 control-label">Numero_decision:</label>
            <div class="col-md-10">
                <select name="numero_decision" class="form-select" required>
                <option selected>{{old('numero_decision',$table->numero_decision)}}</option>
                    @foreach ($decisions as $decision)
                        <option value="{{ $decision->numero_decision }}">{{ $decision->numero_decision }}</option>
                    @endforeach
                </select>
                @error("numero_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="age" class="label col-md-2 control-label">Telephone:</label>
            <div class="col-md-10">
                <input type="text" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}">
                @error("telephone")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mt-1">
            <label for="email" class="label col-md-2 control-label">Nature du dossier:</label>
            <div class="col-md-10">
                <select name="nature_dossier" class="form-select" required>
                <option selected>{{old('nature_dossier',$table->nature_dossier)}}</option>
                    @foreach ($natures as $nature)
                        <option value="{{ $nature->nature }}">{{ $nature->nature }}</option>
                    @endforeach
                </select>
                @error("nature_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mt-1">
            <label for="adresse" class="label col-md-2 control-label">Arrondissement:</label>
            <div class="col-md-10">
                <select name="arrondissement" id="zone"  class="form-select">
                    <option selected>{{old('arrondissement',$table->arrondissement)}}</option>
                    <option>Maroua 1</option>
                    <option>Maroua 2</option>
                    <option>Maroua 3</option>
                    <option>Bogo</option>
                    <option>Dargala</option>
                    <option>Meri</option>
                    <option>Ndoukoula</option>
                    <option>PETTE</option>
                    <option>Gazawa</option>
                </select>
                @error("arrondissement")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="ville" class="label col-md-2 control-label">Quartier:</label>
            <div class="col-md-10">
                <input type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}">
                @error("quartier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="pays" class="label col-md-2 control-label">Lieu Dit:</label>
            <div class="col-md-10">
                <input type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}">
                @error("lieu_dit")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="pays" class="label col-md-2 control-label">Mappe:</label>
            <div class="col-md-10">
                <input type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}">
                @error("mappe")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="pays" class="label col-md-2 control-label">Blog:</label>
            <div class="col-md-10">
                <input type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}">
                @error("bloc")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="pays" class="label col-md-2 control-label">Lot:</label>
            <div class="col-md-10">
                <input type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}">
                @error("lot")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="pays" class="label col-md-2 control-label">Numero De Feuille:</label>
            <div class="col-md-10">
                <input type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}">
                @error("numero_feuille")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="zone" class="label col-md-2 control-label">Zone:</label>
            <div class="col-md-10">
                <select name="zone" id="zone"  class="form-select">
                    <option selected>{{old('zone',$table->zone)}}</option>
                    <option>zone urbaine</option>
                    <option>zone rurale</option>
                </select>
                @error("zone")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="date_ouverture" class="label col-md-2 control-label">Date Ouverture:</label>
            <div class="col-md-10">
                <input type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
                @error("date_ouverture")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        
    
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->id)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Effacer"><br><br></center>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>