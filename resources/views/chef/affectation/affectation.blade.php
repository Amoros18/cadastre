<h1 class="text-primary text-center">
    @if ($table->numero_dossier)
        Modifier Les Informations Du Dossier
    @else
        Enter Les Informations Relatives Au Dossier
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information De Viser</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label">Numero dossier:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}">
                    @error("numero_dossier")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
        </div>

        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->numero_dossier)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>