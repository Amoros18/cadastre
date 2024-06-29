<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de contrôle 2</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="row mt-1">
                <label for="numero_controle" class="control-label">Numero Code Contrôle:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_controle" class="form-control" value="{{old('numero_controle',$table->numero_controle)}}" readonly>
                    @error("numero_controle")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="control-label">Nom Contrôleur 1:</label>
                <div class="col-md-5">
                    <input type="text" name="controlleur_1" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}" readonly>
                    @error("controlleur_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror 
                </div>
                <label for="date_controle_1" class="control-label">Date contrôle 1:</label>
                <div class="col-md-3">
                    <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}" readonly>
                    @error("date_controle_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_2" class="control-label">Nom Contrôleur 2:</label>
                <div class="col-md-5">
                    <input type="text" name="controlleur_2" required class="form-control" value="{{old('controlleur_2',$table->controlleur_2)}}">
                    @error("controlleur_2")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_controle_2" class="control-label">Date contrôle 2:</label>
                <div class="col-md-3">
                    <input type="date" name="date_controle_2" class="form-control" value="{{old('date_controle_2',$table->date_controle_2)}}">
                    @error("date_controle_2")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->controlleur_2)
                Valider
            @else
                Enregistrer
            @endif
            </button>
    </form>
</div></div>