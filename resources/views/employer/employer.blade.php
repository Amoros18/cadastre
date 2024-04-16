
<h1 class="text-primary text-center">
    @if ($table->id)
        Modifier Les Information
    @else
        Enter Les Information
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire" method="POST">
        @csrf


        <div class="row">
            <div class="col">
                <h5 class="text-center">Entrer les informations relatives au @yield('employer')</h5>
            </div>
        </div>

        
        <div class="row mt-1">
            <label for="nom" class="label col-md-2 control-label">Nom du @yield('employer')</label>
            <div class="col-md-10">
                <input type="text" name="nom" required class="form-control" value="{{old('nom',$table->nom)}}">
                @error("nom")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="prenom" class="label col-md-2 control-label">Statut:</label>
            <div class="col-md-10">
                <input type="text" name="statut" required class="form-control" value="{{old('statut',$table->statut)}}">
                @error("statut")
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