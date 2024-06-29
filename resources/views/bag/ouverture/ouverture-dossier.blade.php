
<div class="container-fluid ">
    <div id="info" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">

    Informations du dossier
</h1>
    </div>
<div class="container-fluid card shadow">
<div class="card-body">
    <form action="" method="POST" class="vstack gap 3 text-black">
        @csrf

        <div class="form-group">
            <label for="prenom" class="control-label" style="color: black">Nom Requerant:</label>
            <input type="text" name="nom_requerant" class="form-control" value="{{old('nom_requerant',$table->nom_requerant)}}" placeholder="Entrez le nom du requerant">
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
                    <option value="Mixte">Collectif</option>
                    <option value="Personne Morale">Personne Morale</option>
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

        <div class="form-group">
            <label for="age" class="control-label" style="color: black">Telephone:</label>
                <input type="number" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}" placeholder="Entrez le numero de téléphone">
                @error("telephone")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
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
    
        <div class="form-group">
            <label for="adresse" class="control-label" style="color: black">Arrondissement</label>
                <select name="arrondissement" id="zone"  class="form-control" placeholder="Entrez l'arrondissement">
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

        <div class="form-group">
            <label for="ville" class="control-label" style="color: black">Quartier:</label>
                <input type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}" placeholder="Entrez le nom du quartier">
                @error("quartier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="pays" class="control-label" style="color: black">Lieu Dit:</label>
                <input type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}" placeholder="Entrez le lieu">
                @error("lieu_dit")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="pays" class="control-label" style="color: black">Mappe:</label>
                <input type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}" placeholder="Entrez la mappe">
                @error("mappe")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pays" class="control-label" style="color: black">Blog:</label>
                <input type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}" placeholder="Entrez le blog">
                @error("bloc")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <label for="pays" class="control-label" style="color: black">Lot:</label>
                <input type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}" placeholder="Entrez le lot">
                @error("lot")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <label for="pays" class="control-label" style="color: black">Numero De Feuille:</label>
                <input type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}" placeholder="Entrez le numéro de feuille">
                @error("numero_feuille")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="zone" class="control-label" style="color: black">Zone:</label>
                <select name="zone" id="zone"  class="form-control" placeholder="Entrez la zone">
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
        <div class="form-group">
            <label for="date_ouverture" class="control-label" style="color: black">Date Ouverture:</label>
                <input type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
                @error("date_ouverture")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        
    
        <center class="mt-1"><button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->id)
                Valider
            @else
                Enregistrer
            @endif

    </form>
</div></div>