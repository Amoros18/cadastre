<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de la sortie</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

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
                    <input type="date" name="date_travaux" class="form-control" required value="{{old('date_travaux',$sortie->date_travaux)}}">
                    @error("date_travaux")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="avis_main_courante" class="label col-md-1 control-label">liste de materiaux:</label>
                <div class="col-md-2">
                    <input type="text" name="liste_materiaux" class="form-control" required value="{{old('liste_materiaux',$sortie->liste_materiaux)}}">
                    @error("liste_materiaux")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="mise_en_valeur" class="label col-md-1 control-label">Observation:</label>
                <div class="col-md-3">
                    <input type="text" name="observation" class="form-control" required value="{{old('observation',$sortie->observation)}}">
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
                    <input type="text" name="liste_geometre" class="form-control" required value="{{old('liste_geometre',$sortie->liste_geometre)}}">
                    @error("liste_geometre")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
       
       <button class="btn btn-success mt-3 w-100" type="submit" >Enregistrer
            </button >

    </form>
</div> </div>