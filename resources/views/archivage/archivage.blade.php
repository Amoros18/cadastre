<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations d'archivage</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            @if ($numero_dossier)
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-2 control-label">Numero de dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$numero_dossier)}}" readonly>
                </div>
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @else
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-2 control-label">Numero de dossier:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$archive->numero_dossier)}}">
                </div>
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif

            <div class="row mt-1">
                <label for="date_reception" class="label col-md-2 control-label">Date Reception:</label>
                <div class="col-md-3">
                    <input type="date" name="date_reception" class="form-control" value="{{old('date_reception',$archive->date_reception)}}">
                </div>
                @error("date_reception")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                <label for="numero_tirroir" class="label col-md-1 control-label">Numero Tirroir:</label>
                <div class="col-md-2">
                    <input type="text" name="numero_tirroir" class="form-control" value="{{old('numero_tirroir',$archive->numero_tirroir)}}">
                </div>
                @error("numero_tirroir")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                
            </div>
            <div class="row mt-1">
                <label for="observation" class="label col-md-2 control-label">Observation:</label>
                <div class="col-md-10">
                    <input type="text" name="observation" class="form-control" value="{{old('observation',$archive->observation)}}">
                </div>
                @error("observation")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        

        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->observation)
                Valider
            @else
                Enregistrer
            @endif
            </button>
            <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small> -->

    </form></div>
</div>