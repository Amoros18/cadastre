<br>
<div class="container-fluid">
    <div class=" container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class="text-center" style="color: white">
            Informations de visa
        </h1>
    </div>
    <div class=" card-body container-fluid shadow">
        <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row mt-1">
                <label for="numero_visa" class="label col-md-2 control-label">Numéro Visa:</label>
                <div class="col-md-5">
                    <input type="text" name="numero_visa" placeholder="Entrez le numero de visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}" required>
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

            <button class="btn btn-success mt-3 w-100" type="submit">
                @if($table->numero_visa)
                    Valider
                @else
                    Enregistrer
                @endif
            </button>
        </form>
    </div>
</div>