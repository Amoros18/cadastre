<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de la sortie</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            @if ($nouveau_dossier_id)
            <div class="form-group">
                <label for="nouveau_dossier_id" class="control-label" style="color: black;">ID du dossier:</label>
                <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
            </div>
            @else
            <div class="form-group">
                <label for="nouveau_dossier_id" class="control-label" style="color: black;">Numero de dossier:</label>
                <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$sortie->nouveau_dossier_id)}}">
                @error("nouveau_dossier_id")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif
            <div class="row">
                <div class="col-md form-group">
                    <label for="message_porter" class="control-label" style="color: black;">Date des travaux:</label>
                    <input type="date" name="date_travaux" class="form-control" required value="{{old('date_travaux',$sortie->date_travaux)}}">
                    @error("date_travaux")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md form-group">
                    <label for="avis_main_courante" class="control-label" style="color: black;">Liste de materiaux:</label>
                        <input type="text" name="liste_materiaux" placeholder="Entrez la liste des materiaux" class="form-control" required value="{{old('liste_materiaux',$sortie->liste_materiaux)}}">
                        @error("liste_materiaux")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="mise_en_valeur" class="control-label" style="color: black;">Observation:</label>
                <input type="text" name="observation" class="form-control" placeholder="Entrez l'observation" required value="{{old('observation',$sortie->observation)}}">
                @error("observation")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="observation_main_courante" class="control-label" style="color: black;">Liste Geometre:</label>
                <input type="text" name="liste_geometre" class="form-control" placeholder="Entrez la liste des geometres" required value="{{old('liste_geometre',$sortie->liste_geometre)}}">
                @error("liste_geometre")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
       
       <button class="btn btn-success mt-3 w-100" type="submit" >Enregistrer</button >

    </form>
</div> </div>