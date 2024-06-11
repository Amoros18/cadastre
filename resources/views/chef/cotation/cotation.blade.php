<h1 class="text-primary text-center">
    @if ($table->geometre)
        Modifier Les Informations Du Dossier
    @else
        Enter Les Informations Relatives Au Dossier
    @endif
</h1>

<div class="container-fluid card shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div class="row">
            <div class="col">
                <h5 class="text-center">Entrer les informations du dossier</h5>
            </div>
        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information De Cotation</h5>
            </div>
            <div class="row mt-1">
                <label for="geometre" class="label col-md-2 control-label">Nom du geometre:</label>
                <div class="col-md-10">
                    <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}">
                    @error("geometre")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <center class="mt-1"><button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->geometre)
                Valider
            @else
                Enregistrer
            @endif
            <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small> -->

    </form>
</div>