<h1 class="text-primary text-center">
    @if ($table->numero_visa)
        Modifier Les Informations Du Dossier
    @else
        Enter Les Informations Relatives Au Dossier
    @endif
</h1>

<div class="container-fluid card shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Informations De Visa</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_visa" class="label col-md-2 control-label">Numéro Visa:</label>
                <div class="col-md-5">
                    <input type="text" name="numero_visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}" required>
                    @error("numero_visa")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="date_visa" class="label col-md-2 control-label">Date Visa:</label>
                <div class="col-md-3">
                    <input type="date" name="date_visa" class="form-control" value="{{old('date_visa',$table->date_visa)}}" required>
                    @error("date_visa")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
        </div>

        <center class="mt-1"> <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->numero_visa)
                Valider
            @else
                Enregistrer
            @endif
            <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center> -->
        <!-- <small class="text-left">creat by Amoros </small> -->

    </form>
</div>