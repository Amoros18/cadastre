<div class="container-fluid card">
    <div id= "Rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations du courrier</h1>
</div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="numero_ccp" class="control-label" style="color: black;">Expediteur:</label>
            <input type="text" required name="expediteur" placeholder="Entrez le nom de l'expediteur" class="form-control" value="{{old('expediteur',$table->expediteur)}}">
            @error("expediteur")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        
        <div class="row">
            <div class="col-md form-group">
                <label for="dao" class="control-label" style="color: black;">Date D'Arrivée:</label>
                <input type="date" required name="date_arrive" class="form-control" value="{{old('date_arrive',$table->date_arrive)}}">
                @error("date_arrive")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Date Correspondance:</label>
                <input type="date" required name="date_correspondance" class="form-control" value="{{old('date_correspondance',$table->date_correspondance)}}">
                @error("date_correspondance")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md form-group">
                <label for="numero_correspondance" class="control-label" style="color: black;">Numero Correspondance:</label>
                <input type="text" name="numero_correspondance" placeholder="Entrez le numero de Correspondance" required class="form-control" value="{{old('numero_correspondance',$table->numero_correspondance)}}">
                @error("numero_correspondance")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_reponse" class="control-label" style="color: black;">Numero Reponse:</label>
                <input type="text" name="numero_reponse" placeholder="Entrez le numero de la reponse" class="form-control" value="{{old('numero_reponse',$table->numero_reponse)}}">
                @error("numero_reponse")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="objet" class="control-label" style="color: black;">Objet: </label>
            <input type="text" name="objet" required placeholder="Entrez l'objet" class="form-control" value="{{old('objet',$table->objet)}}">
            @error("objet")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        @if ($table->image)
            <div class="form-group">
                <div class="col-md-3 center bg-danger text-light">Scanne deja introduit</div>
            </div>
            <div class="form-group">
                <label for="data" class="control-label" style="color: black;">Insere le fichier de courrier:</label>
                <input type="file" name="data" class="form-control" value="{{old('data')}}">
                @error("data")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        @else
            <div class="form-group">
                <label for="data" class="control-label" style="color: black;">Insere le fichier de courrier:</label>
                <input type="file" name="data" class="form-control" required value="{{old('data')}}">
                @error("data")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        @endif


            <button class="btn btn-success mt-3 w-100" type="submit" >
                @if($table->date_correspondance)
                    Valider
                @else
                    Enregistrer
                @endif
            </button>
            <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small> -->

    </form>
</div>