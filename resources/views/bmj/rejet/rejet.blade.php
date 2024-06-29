<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de rejet</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf


            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-2 control-label">Motif de rejet:</label>
                <div class="col-md-10">
                    <input type="text" name="motif" class="form-control" value="{{old('motif',$rejet->motif)}}">
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
                    <input type="date" name="date_rejet" class="form-control" value="{{old('date_rejet',$rejet->date_rejet)}}">
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
        
        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->motif)
                Valider
            @else
                Enregistrer
            @endif
        </button>
    </form>
</div></div>
        