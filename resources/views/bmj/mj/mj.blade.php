<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de mise à jour</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col-md form-group">
                <label for="verificateur" class="control-label" style="color: black;">Verificateur:</label>
                <input type="text" name="verificateur" placeholder="Entrez le nom du verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
                @error("verificateur")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_mj" class="control-label" style="color: black;">Code Mise A Jour:</label>
                <input type="text" name="numero_mj" required placeholder="Entrez le code de la mise a jour" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
                @error("numero_mj")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="avis_mj" class="control-label" style="color: black;">Avis du verificateur:</label>
            <input type="text" name="avis_mj" required placeholder="Entrez l'avis du verificateur" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
            @error("avis_mj")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

       

            <button class="btn btn-success mt-3 w-100" type="submit" >
                @if($table->verificateur)
                    Valider
                @else
                    Enregistrer
                @endif
           </button > 


    </form>
</div> </div>