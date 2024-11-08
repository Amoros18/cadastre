<h1 class="text-primary text-center">
    @if ($table->montant_rattachement)
        Modifier Les Informations Du Dossier
    @else
        Enter Les Informations Relatives Au Dossier
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        
        <div class="row">
            <div class="col">
                <h5 class="text-center">Entrer les informations du dossier</h5>
            </div>
        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information De Rattachement</h5>
            </div>
            <div class="row mt-1">
                <label for="geometre" class="label col-md-2 control-label">Nom du geometre:</label>
                <div class="col-md-3">
                    <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}" @if ($table->geometre) readonly @endif>
                    @error("geometre")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_rattachement" class="label col-md-1 control-label">Date Rattachemet:</label>
                <div class="col-md-2">
                    <input type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
                    @error("date_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="montant_rattachement" class="label col-md-1 control-label">Montant Rattachemet:</label>
                <div class="col-md-2">
                    <input type="text" name="montant_rattachement" required class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
                    @error("montant_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-1">
                <label for="observation_rattachement" class="label col-md-2 control-label">Observation Rattachement:</label>
                <div class="col-md-10">
                    <input type="text" name="observation_rattachement" required class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
                    @error("observation_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>


        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->montant_rattachement)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>