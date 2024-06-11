<h1 class="text-primary text-center">
    @if ($table->verificateur)
        Modifier Les Informations Du Dossier
    @else
        Enter Les Informations Relatives Au Dossier
    @endif
</h1>

<div class="container-fluid card shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Informations de la Mise A Jour</h5>
            </div>

            <div class="row mt-1">
                <label for="verificateur" class="label col-md-2 control-label">Verificateur:</label>
                <div class="col-md-5">
                    <input type="text" name="verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
                    @error("verificateur")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="numero_mj" class="label col-md-2 control-label">Code Mise A Jour:</label>
                <div class="col-md-3">
                    <input type="text" name="numero_mj" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
                    @error("numero_mj")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="avis_mj" class="label col-md-2 control-label">Avis du verificateur:</label>
                <div class="col-md-10">
                    <input type="text" name="avis_mj" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
                    @error("avis_mj")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        <center class="mt-1"><button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->verificateur)
                Valider
            @else
                Enregistrer
            @endif
            <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small> -->

    </form>
</div>