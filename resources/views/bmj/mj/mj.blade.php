<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de mise à jour</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

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
                    <input type="text" name="numero_mj" required class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
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
                    <input type="text" name="avis_mj" required class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
                    @error("avis_mj")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
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