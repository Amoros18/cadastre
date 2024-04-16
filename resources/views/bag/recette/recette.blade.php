
<h1 class="text-primary text-center">
    @if ($table->montant_recette)
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
                <h5 class="text-center">Information de la recette</h5>
            </div>
            <div class="row mt-1">
                <div class="row mt-1">
                    @if ($table->zone == 'zone urbaine')
                    <label for="superficie_recette" class="label col-md-2 control-label">Superficie Recette en m2:</label>
                    <div class="col-md-3">
                        <select name="superficie_recette" id="zone"  class="form-select">
                            <option selected>{{old('superficie_recette',$table->superficie_recette)}}</option>
                            <option>Sup <= 5000m2</option>
                            <option>Sup >= 5000m2</option>
                        </select>
                        @error("superficie_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    @elseif ($table->zone == 'zone urbaine')
                    <label for="superficie_recette" class="label col-md-2 control-label">Superficie Recette en m2:</label>
                    <div class="col-md-3">
                        <select name="superficie_recette" id="zone"  class="form-select">
                            <option selected>{{old('superficie_recette',$table->superficie_recette)}}</option>
                            <option>Sup <= 5000m2</option>
                            <option>5000m2 <= sup <= 5ha</option>
                            <option>5ha <= sup <= 20ha</option>
                            <option>Sup >= 20ha</option>
                        </select>
                        @error("superficie_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    @else
                    <label for="superficie_recette" class="label col-md-2 control-label">Superficie Recette en m2:</label>
                    <div class="col-md-3">
                        <select name="superficie_recette" id="zone"  class="form-select">
                            <option selected>{{old('superficie_recette',$table->superficie_recette)}}</option>
                            <option>Sup <= 5000m2</option>
                            <option>Sup >= 5000m2</option>
                            <option>5000m2 <= sup <= 5ha</option>
                            <option>5ha <= sup <= 20ha</option>
                            <option>Sup >= 20ha</option>
                        </select>
                        @error("superficie_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif

                    <label for="montant_recette" class="label col-md-1 control-label">Montant Recette:</label>
                    <div class="col-md-2">
                        <input type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$table->montant_recette)}}">
                        @error("montant_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="cumule" class="label col-md-1 control-label">Cumule:</label>
                    <div class="col-md-3">
                        <input type="text" name="cumule" class="form-control" value="{{old('cumule',$table->cumule)}}">
                        @error("cumule")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="date_cession" class="label col-md-2 control-label">Date Cession:</label>
                    <div class="col-md-3">
                        <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$table->date_cession)}}">
                        @error("date_cession")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror    
                    </div>
                    <label for="montant_recette" class="label col-md-1 control-label">Numero Quittance:</label>
                    <div class="col-md-2">
                        <input type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$table->numero_quittance)}}">
                        @error("numero_quittance")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="date_quittance" class="label col-md-1 control-label">Date Quittance:</label>
                    <div class="col-md-3">
                        <input type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$table->date_quittance)}}">
                        @error("date_quittance")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="observation_recette" class="label col-md-2 control-label">Observation Recette:</label>
                    <div class="col-md-10">
                        <input type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$table->observation_recette)}}">
                        @error("observation_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->montant_recette)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>