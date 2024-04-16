<h1 class="text-primary text-center">
    @if ($table->nouveau_dossier_id)
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
                <h5 class="text-center">Information de sortie des geometres</h5>
            </div>
            @if ($nouveau_dossier_id)
            <div class="row mt-1">
                <label for="nouveau_dossier_id" class="label col-md-2 control-label">ID du dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
                </div>
            </div>
            @else
            <div class="row mt-1">
                <label for="nouveau_dossier_id" class="label col-md-2 control-label">Numero de dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$sortie->nouveau_dossier_id)}}">
                    @error("nouveau_dossier_id")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @endif
            <div class="row mt-1">
                <label for="message_porter" class="label col-md-2 control-label">date de travaux:</label>
                <div class="col-md-3">
                    <input type="date" name="date_travaux" class="form-control" value="{{old('date_travaux',$sortie->date_travaux)}}">
                    @error("date_travaux")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="avis_main_courante" class="label col-md-1 control-label">liste de materiaux:</label>
                <div class="col-md-2">
                    <input type="text" name="liste_materiaux" class="form-control" value="{{old('liste_materiaux',$sortie->liste_materiaux)}}">
                    @error("liste_materiaux")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="mise_en_valeur" class="label col-md-1 control-label">Observation:</label>
                <div class="col-md-3">
                    <input type="text" name="observation" class="form-control" value="{{old('observation',$sortie->observation)}}">
                    @error("observation")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="observation_main_courante" class="label col-md-2 control-label">Liste Geometre:</label>
                <div class="col-md-10">
                    <input type="text" name="liste_geometre" class="form-control" value="{{old('liste_geometre',$sortie->liste_geometre)}}">
                    @error("liste_geometre")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
        </div>
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >Enregistrer
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>