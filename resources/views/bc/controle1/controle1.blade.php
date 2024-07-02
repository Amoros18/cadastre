<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de contrôle 1</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            <div class="form-group">
                <label for="numero_controle" class="control-label" style="color: black;">Numero Code Contrôle:</label>
                <input type="text" name="numero_controle" placeholder="Entrez le numero du code contrôle" class="form-control" required value="{{old('numero_controle',$table->numero_controle)}}">
                @error("numero_controle")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label for="controlleur_1" class="control-label" style="color: black;">Nom Contrôleur 1:</label>
                    <input type="text" name="controlleur_1" required placeholder="Entrez le nom du contrôleur" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
                    @error("controlleur_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="date_controle_1" class="control-label" style="color: black;">Date contrôle 1:</label>
                    <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
                    @error("date_controle_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
       
        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->numero_controle)
                Valider
            @else
                Enregistrer
            @endif
        </button>
    </form>
</div></div>