<br><div class="container-fluid card p-0">
    <div id= "Rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de Rattachement</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

            <div class="row">
                <div class="col-md form-group">
                    <label for="geometre" class="control-label" style="color: black;">Nom du geometre:</label>
                    <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}" @if ($table->geometre) readonly @endif>
                    @error("geometre")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="date_rattachement" class=" control-label" style="color: black;">Date Rattachemet:</label>
                    <input type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
                    @error("date_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md form-group">
                    <label for="montant_rattachement" class=" control-label" style="color: black;">Montant Rattachemet:</label>
                    <input type="number" name="montant_rattachement" placeholder="Entrez le montant du rattachement" required class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
                    @error("montant_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="observation_rattachement" class="control-label" style="color: black;">Observation Rattachement:</label>
                    <input type="text" name="observation_rattachement"  required class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
                    @error("observation_rattachement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            
                <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->montant_rattachement)
                Valider
            @else
                Enregistrer
            @endif
            </button>
            </div>
        </div>



    </form>
</div>
