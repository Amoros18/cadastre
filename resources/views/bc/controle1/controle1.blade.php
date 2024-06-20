<h1 class="text-primary text-center">
    @if ($table->numero_controle)
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
                <h5 class="text-center">Information du controle</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-2 control-label">Numero Code Controle:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_controle" class="form-control" required value="{{old('numero_controle',$table->numero_controle)}}">
                    @error("numero_controle")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="label col-md-2 control-label">Non Controlleur 1:</label>
                <div class="col-md-5">
                    <input type="text" name="controlleur_1" required class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
                    @error("controlleur_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_controle_1" class="label col-md-2 control-label">Date controle 1:</label>
                <div class="col-md-3">
                    <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
                    @error("date_controle_1")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
        </div>
        
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->numero_controle)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>