<div class="container-fluid card-body shadow">
    <form id="formulaire" method="POST">
        @csrf


        <div class="form-group">
            <label for="nom" class="control-label" style="color: black">Nom</label>
                <input type="text" name="nom" required class="form-control" value="{{old('nom',$table->nom)}}" placeholder=" Entrez le nom du @yield('employer')">
                @error("nom")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="prenom" class="control-label" style="color: black">Statut:</label>
                <input type="text" name="statut" required class="form-control" value="{{old('statut',$table->statut)}}" placeholder="Entrez le statut">
                @error("statut")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
    
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->id)
                Valider
            @else
                Enregistrer
            @endif
          </button> 
    </form>
</div></div>