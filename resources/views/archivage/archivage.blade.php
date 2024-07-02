<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations d'archivage</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            @if ($numero_dossier)
            <div class="form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Numero de dossier:</label>
                <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$numero_dossier)}}" readonly>
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @else
            <div class="form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Numero de dossier:</label>
                <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$archive->numero_dossier)}}">
                @error("numero_dossier")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            @endif

            <div class="row">
                <div class="col-md">
                    <label for="date_reception" class="control-label" style="color: black;">Date Reception:</label>
                    <input type="date" name="date_reception" required class="form-control" value="{{old('date_reception',$archive->date_reception)}}">
                    @error("date_reception")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md">
                    <label for="numero_tirroir" class="control-label" style="color: black;">Numero Tirroir:</label>
                    <input type="text" name="numero_tirroir" required class="form-control" value="{{old('numero_tirroir',$archive->numero_tirroir)}}">
                    @error("numero_tirroir")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="observation" class="control-label" style="color: black;">Observation:</label>
                <input type="text" name="observation" required class="form-control" value="{{old('observation',$archive->observation)}}">
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