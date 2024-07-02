<br><div class="container-fluid p-0 card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de recette</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf
        @if ($nouveau_dossier_id)
        <div class="form-group">
            <label for="nouveau_dossier_id" class="control-label" style="color: black;">ID du dossier:</label>
            <input type="text" name="nouveau_dossier_id" readonly  class="form-control" value="{{old('nouveau_dossier_id',$nouveau_dossier_id)}}" readonly>
        </div>

        @else
        <div class="form-group">
            <label for="nouveau_dossier_id" class="control-label" style="color: black;">Numero de dossier:</label>
            <input type="text" name="nouveau_dossier_id" readonly class="form-control" value="{{old('nouveau_dossier_id',$quittance->nouveau_dossier_id)}}">
            @error("nouveau_dossier_id")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        @endif
                
        @if ($table->zone == 'zone urbaine')
        <div class="form-group">
            <label for="superficie_recette" class="control-label" style="color: black;">Superficie Recette en m2:</label>
            <select name="superficie_recette" id="zone"  class="form-control">
                @if(old('superficie_recette',$quittance->superficie_recette) != '')
                    <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
                @else
                    <option selected hidden disabled>Selectionnez la superficie</option>
                @endif
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
        <div class="form-group">
            <label for="superficie_recette" class="control-label" style="color: black;">Superficie Recette en m2:</label>
            <select name="superficie_recette" required id="zone"  class="form-control">
                @if(old('superficie_recette',$quittance->superficie_recette) != '')
                    <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
                @else
                    <option selected hidden disabled>Selectionnez la superficie</option>
                @endif
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
        <div class="form-group">
            <label for="superficie_recette" class="control-label" style="color: black;">Superficie Recette en m2:</label>
            <select name="superficie_recette" required id="zone"  class="form-control">
                @if(old('superficie_recette',$quittance->superficie_recette) != '')
                    <option selected>{{old('superficie_recette',$quittance->superficie_recette)}}</option>
                @else
                    <option selected hidden disabled>Selectionnez la superficie</option>
                @endif
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

        <div class="form-group">
            <label for="montant_recette" class="control-label" style="color: black;">Montant Recette:</label>
            <input type="number" required name="montant_recette" placeholder="Entrez le montant de la recette" class="form-control" value="{{old('montant_recette',$quittance->montant_recette)}}">
            @error("montant_recette")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cumule" class="control-label" style="color: black;">Cumule:</label>
            <input type="text" name="cumule" placeholder="Entrez le cumule" class="form-control" value="{{old('cumule',$quittance->cumule)}}">
            @error("cumule")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_cession" class="control-label" style="color: black;">Date Cession:</label>
            <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$quittance->date_cession)}}">
            @error("date_cession")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror 
        </div>

        <div class="form-group">
            <label for="montant_recette" class="control-label" style="color: black;">Numero Quittance:</label>
            <input type="text" name="numero_quittance" placeholder="Entrez le numero de quittance" required class="form-control" value="{{old('numero_quittance',$quittance->numero_quittance)}}">
            @error("numero_quittance")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_quittance" class="control-label" style="color: black;">Date Quittance:</label>
            <input type="date" name="date_quittance" required class="form-control" value="{{old('date_quittance',$quittance->date_quittance)}}">
            @error("date_quittance")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
            
        <div class="form-group">
            <label for="observation_recette" class="control-label" style="color: black;">Observation Recette:</label>
            <input type="text" name="observation_recette" placeholder="Entrez l'observation" class="form-control" value="{{old('observation_recette',$quittance->observation_recette)}}">
            @error("observation_recette")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        
        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->montant_recette)
                Valider
            @else
                Enregistrer
            @endif
        </button>
                   
    </form>
</div></div>