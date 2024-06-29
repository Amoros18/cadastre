<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de transmission</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div >
           
            @if ($nouveau_dossier_id)
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-2 control-label">ID du dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
                </div>
                @error("nouveau_dossier_id")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @else
            <div class="row mt-1">
                <label for="nouveau_dossier_id" class="label col-md-2 control-label">ID du dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$transmission->nouveau_dossier_id)}}">
                </div>
                @error("nouveau_dossier_id")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif

            <div class="row mt-1">
                <label for="date_transmission" class="label col-md-2 control-label">Date Transmission:</label>
                <div class="col-md-3">
                    <input type="date" name="date_transmission" class="form-control" value="{{old('date_transmission',$transmission->date_transmission)}}">
                </div>
                @error("date_transmission")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                <label for="statut" class="label col-md-1 control-label">Statut:</label>
                <div class="col-md-2">
                    <select name="statut" id="">
                        <option value="{{old('statut',$transmission->statut)}}">{{old('statut',$transmission->statut)}}</option>
                        <option value="ENVOYER">ENVOYER</option>
                        <option value="RECUPERER">RECUPERER</option>
                    </select>
                </div>
                @error("statut")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <label for="date_reception" class="label col-md-2 control-label">Date Reception:</label>
                <div class="col-md-2">
                    <input type="date" name="date_reception" class="form-control" value="{{old('date_reception',$transmission->date_reception)}}">
                </div>
                @error("date_reception")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
            </div>
            <div class="row mt-1">
                <label for="motif" class="label col-md-2 control-label">motif:</label>
                <div class="col-md-10">
                    <input type="text" name="motif" class="form-control" value="{{old('motif',$transmission->motif)}}">
                </div>
                @error("motif")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <center class="mt-1"><button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->motif)
                Valider
            @else
                Enregistrer
            @endif
         </center>

    </form>
</div></div>