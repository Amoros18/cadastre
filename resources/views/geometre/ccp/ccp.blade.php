<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de CCP</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-md form-group">
                <label for="numero_ccp" class="control-label" style="color: black;">Numero CCP:</label>
                <input type="text" name="numero_ccp" class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}" placeholder="Entrez le numéro de ccp">
                @error("numero_ccp")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        
            <div class="col-md form-group">
                <label for="dao" class="control-label" style="color: black;">Nom DAO:</label>
                <input type="text" name="dao" required class="form-control" value="{{old('dao',$table->dao)}}" placeholder="Entrez le nom DAO">
                @error("dao")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Echelle:</label>
                <input type="text" name="echelle" required class="form-control" value="{{old('echelle',$table->echelle)}}" placeholder="Entrez l'echelle">
                @error("echelle")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="superficie" class="control-label" style="color: black;">Superficie:</label>
                <input type="number" name="superficie" required class="form-control" value="{{old('superficie',$table->superficie)}}" placeholder="Entrez la superficie">
                @error("superficie")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="date_ccp" class="control-label" style="color: black;">Date CCP:</label>
            <input type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}" placeholder="Entrez la date ">
            @error("date_ccp")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-md form-group">
                <label for="longitude" class="control-label" style="color: black;">Longitude:</label>
                <input type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}" placeholder="Entrez la longitude">
                @error("superficie")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="latitude" class="control-label" style="color: black;">Latitude:</label>
                <input type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}" placeholder="Entrez la latitude">
                @error("date_ccp")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="fomr-group]">
            @if ($table->point)
                <label for="data" class="control-label" style="color: black;">Inserer le fichier des coordonnees:</label>
                <input type="file" name="data" class="form-control" value="{{old('data')}}">
                @error("data")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            @else
                <label for="data" class="control-label" style="color: black;">Inserer le fichier des coordonnees:</label>
                <input type="file" name="data" class="form-control" required value="{{old('data')}}">
                @error("data")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            @endif
        </div>


        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->echelle)
                Valider
            @else
                Enregistrer
            @endif
        </button>
    </form>
</div></div>