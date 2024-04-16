<h1 class="text-primary text-center">
    @if ($table->date_bornage)
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
                <h5 class="text-center">Information du registre MAIN COURANTE</h5>
            </div>

            <div class="row mt-1">
                <label for="message_porter" class="label col-md-2 control-label">Message Porter:</label>
                <div class="col-md-3">
                    <input type="text" name="message_porter" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
                    @error("message_porter")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="avis_main_courante" class="label col-md-1 control-label">Avis:</label>
                <div class="col-md-2">
                    <input type="text" name="avis_main_courante" class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
                    @error("avis_main_courante")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="mise_en_valeur" class="label col-md-1 control-label">Mise en valeur:</label>
                <div class="col-md-3">
                    <input type="text" name="mise_en_valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
                    @error("mise_en_valeur")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="observation_main_courante" class="label col-md-2 control-label">Observation:</label>
                <div class="col-md-3">
                    <input type="text" name="observation_main_courante" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
                    @error("observation_main_courante")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_bornage" class="label col-md-1 control-label">Date Bornage:</label>
                <div class="col-md-2">
                    <input type="date" name="date_bornage" class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
                    @error("date_bornage")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="s_c" class="label col-md-1 control-label">S/C:</label>
                <div class="col-md-3">
                    <input type="text" name="s_c" class="form-control" value="{{old('s_c',$table->s_c)}}">
                    @error("s_c")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->date_bornage)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>