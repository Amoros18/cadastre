<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de rejet contrôle </h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            <div class="form-group">
                <label for="numero_controle" class="control-label" style="color: black;">Motif de rejet:</label>
                <input type="text" required placeholder="Entrez le motif du rejet" name="motif" class="form-control" value="{{old('motif',$rejet->motif)}}">
                @error("motif")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label for="controlleur_1" class="control-label" style="color: black;">Date Rejet:</label>
                    <input type="date" name="date_rejet" required class="form-control" value="{{old('date_rejet',$rejet->date_rejet)}}">
                    @error("date_rejet")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                @if ($numero_dossier)
                <div class="col-md form-group">
                    <label for="numero_dossier" class="control-label" style="color: black;">Numero de dossier:</label>
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$numero_dossier)}}" readonly>
                    @error("numero_dossier")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                @else
                <div class="col-md form-group">
                    <label for="numero_dossier" class="control-label" style="color: black;">Numero de dossier:</label>
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$rejet->numero_dossier)}}">
                    @error("numero_dossier")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                @endif
            </div>
        
       
        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($rejet->motif)
                valider
            @else
                Enregistrer
            @endif
</button>

    </form>
</div> </div>