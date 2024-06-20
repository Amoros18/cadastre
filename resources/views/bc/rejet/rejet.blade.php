<h1 class="text-primary text-center">
    @if ($rejet->motif)
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
                <h5 class="text-center">Rejet du dossier par le controle</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-2 control-label">Motif de rejet:</label>
                <div class="col-md-10">
                    <input type="text" required name="motif" class="form-control" value="{{old('motif',$rejet->motif)}}">
                    @error("motif")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="label col-md-2 control-label">Date Rejet:</label>
                <div class="col-md-5">
                    <input type="date" name="date_rejet" required class="form-control" value="{{old('date_rejet',$rejet->date_rejet)}}">
                    @error("date_rejet")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
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
                        <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$rejet->numero_dossier)}}">
                    </div>
                    @error("numero_dossier")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                @endif
            </div>
        
        </div>
        
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($rejet->motif)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>