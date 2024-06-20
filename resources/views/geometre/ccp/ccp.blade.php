<h1 class="text-primary text-center">
    @if ($table->echelle)
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
                <h5 class="text-center">Information du CCP</h5>
            </div>
            <div class="row mt-1">
                <label for="numero_ccp" class="label col-md-2 control-label">Numero CCP:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_ccp" required class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}">
                    @error("numero_ccp")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
            <div class="row mt-1">
                <label for="dao" class="label col-md-2 control-label">Nom DAO:</label>
                <div class="col-md-5">
                    <input type="text" name="dao" required class="form-control" value="{{old('dao',$table->dao)}}">
                    @error("dao")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="numero_dossier" class="label col-md-2 control-label">Echelle:</label>
                <div class="col-md-3">
                    <input type="text" name="echelle" required class="form-control" value="{{old('echelle',$table->echelle)}}">
                    @error("echelle")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="superficie" class="label col-md-2 control-label">Superficie:</label>
                <div class="col-md-5">
                    <input type="text" name="superficie" required class="form-control" value="{{old('superficie',$table->superficie)}}">
                    @error("superficie")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_ccp" class="label col-md-2 control-label">Date CCP:</label>
                <div class="col-md-3">
                    <input type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}">
                    @error("date_ccp")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="longitude" class="label col-md-2 control-label">Longitude:</label>
                <div class="col-md-5">
                    <input type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}">
                    @error("superficie")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="latitude" class="label col-md-2 control-label">Latitude:</label>
                <div class="col-md-3">
                    <input type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}">
                    @error("date_ccp")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if ($table->point)
                <div class="row mt-1">
                    <div class="col-md-3 center bg-danger text-light">coordonnees du point inscrit</div>
                </div>
                <div class="row mt-1">
                    <label for="data" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                    <div class="col-md-8">
                        <input type="file" name="data" class="form-control" value="{{old('data')}}">
                        @error("data")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @else
                <label for="data" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                <div class="col-md-8">
                    <input type="file" name="data" class="form-control" required value="{{old('data')}}">
                    @error("data")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            @endif

        </div>

        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->echelle)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>