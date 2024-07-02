<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de main courante</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            <div class="row">
                <div class="col-md form-group">
                    <label for="message_porter" class="control-label" style="color: black;">Message Porter:</label>
                    <input type="text" name="message_porter" placeholder="Entrez le message" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
                    @error("message_porter")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="avis_main_courante" class="control-label" style="color: black;">Avis:</label>
                    <input type="text" name="avis_main_courante" placeholder="Entrez l'avis" required class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
                    @error("avis_main_courante")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="mise_en_valeur" class="control-label" style="color: black;">Mise en valeur:</label>
                    <input type="text" name="mise_en_valeur" required placeholder="Entrez la mise en valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
                    @error("mise_en_valeur")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label for="observation_main_courante" class="control-label" style="color: black;">Observation:</label>
                    <input type="text" name="observation_main_courante" placeholder="Entrez l'observation" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
                    @error("observation_main_courante")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="date_bornage" class="control-label" style="color: black;">Date Bornage:</label>
                    <input type="date" name="date_bornage" required class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
                    @error("date_bornage")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="s_c" class="control-label" style="color: black;">S/C:</label>
                    <input type="text" name="s_c" placeholder="Entrez le S/C" class="form-control" value="{{old('s_c',$table->s_c)}}">
                    @error("s_c")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    
                </div>
            </div>
            <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->date_bornage)
                Valider
            @else
                Enregistrer
            @endif
          </button>
        </div>

        
        

    </form>
</div>