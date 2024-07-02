<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de transmission</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div >
           
            @if ($nouveau_dossier_id)
            <div class="form-group">
                <label for="numero_dossier" class="control-label">ID du dossier:</label>
                <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
                @error("nouveau_dossier_id")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            @else
            <div class="form-group">
                <label for="nouveau_dossier_id" class="control-label">ID du dossier:</label>
                <input type="text" name="nouveau_dossier_id" class="form-control" value="{{old('nouveau_dossier_id',$transmission->nouveau_dossier_id)}}">
                @error("nouveau_dossier_id")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif

            <div class="row">
                <div class="col-md form-group">
                    <label for="date_transmission" class="control-label">Date Transmission:</label>
                    <input type="date" name="date_transmission" required class="form-control" value="{{old('date_transmission',$transmission->date_transmission)}}">
                </div>
                @error("date_transmission")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror

                 <div class="col-md form-group">
                    <label for="statut" class="control-label">Statut:</label>
                    <select name="statut" id="" class="form-control" required>
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

                <div class="col-md form-group">
                    <label for="date_reception" class="control-label">Date Reception:</label>
                    <input type="date" name="date_reception" class="form-control" value="{{old('date_reception',$transmission->date_reception)}}">
                </div>
                @error("date_reception")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="motif" class="control-label">motif:</label>
                <input type="text" name="motif" required class="form-control" value="{{old('motif',$transmission->motif)}}">
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