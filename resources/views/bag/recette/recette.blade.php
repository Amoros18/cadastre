<br><div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de recette</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
<div>
            @if ($nouveau_dossier_id)
                <label for="nouveau_dossier_id" class="control-label">ID du dossier:</label>
                    <input type="text" name="nouveau_dossier_id" readonly  class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
                </div>

            @else
            <div>
                <label for="nouveau_dossier_id" class="control-label">Numero de dossier:</label>
                    <input type="text" name="nouveau_dossier_id" readonly class="form-control" value="{{old('nouveau_dossier_id',$quittance->nouveau_dossier_id)}}">
                    @error("nouveau_dossier_id")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            @endif
            
                
                    @if ($table->zone == 'zone urbaine')
                    <label for="superficie_recette" class="control-label">Superficie Recette en m2:</label>
                    
                        <select name="superficie_recette" id="zone"  class="form-control">
                            <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
                            <option>Sup <= 5000m2</option>
                            <option>Sup >= 5000m2</option>
                        </select>
                        @error("superficie_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    
                    @elseif ($table->zone == 'zone urbaine')
                    <label for="superficie_recette" class="control-label">Superficie Recette en m2:</label>
                        <select name="superficie_recette" id="zone"  class="form-control">
                            <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
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
                    @else
                    <label for="superficie_recette" class="control-label">Superficie Recette en m2:</label>
                        <select name="superficie_recette" id="zone"  class="form-control">
                            <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
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
 
                    @endif

                    <label for="montant_recette" class="control-label">Montant Recette:</label>
                        <input type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$quittance->montant_recette)}}">
                        @error("montant_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    <label for="cumule" class="control-label">Cumule:</label>
                        <input type="text" name="cumule" class="form-control" value="{{old('cumule',$quittance->cumule)}}">
                        @error("cumule")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror



                    <label for="date_cession" class="control-label">Date Cession:</label>
                        <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$quittance->date_cession)}}">
                        @error("date_cession")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror    
                    <label for="montant_recette" class="control-label">Numero Quittance:</label>
                        <input type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$quittance->numero_quittance)}}">
                        @error("numero_quittance")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    <label for="date_quittance" class="control-label">Date Quittance:</label>
                   
                        <input type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$quittance->date_quittance)}}">
                        @error("date_quittance")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
       
                

   
                    <label for="observation_recette" class="control-label">Observation Recette:</label>
                        <input type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$quittance->observation_recette)}}">
                        @error("observation_recette")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror


        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->montant_recette)
                Valider
            @else
                Enregistrer
            @endif
            </button>
                   
    </form>
</div></div>