
    <div class="container-fluid">
    <div id="info" class=" container-fluid card-header shadow">
        <h1 class="text-center" style="color: white">Informations du dossier</h1>
    </div>
    <div class="card-body shadow">
        <div class="row">
            <div class="col-md form-group">
                <label for="nom" class="control-label" style="color: black;">Nom Requerant:</label>
                <input type="text" name="nom_requerant" class="form-control" readonly value="{{old('nom_requerant',$table->nom_requerant)}}">
                @error('nom_requerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md form-group">
                <label for="sexe_requerant" class="control-label" style="color: black;">Sexe du requerant:</label>
                <input type="text" name="sexe_requerant" class="form-control" readonly value="{{old('sexe_requerant',$table->sexe_requerant)}}">
                @error('sexe_requerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Numero Dossier:</label>
                <input type="text" name="numero_dossier" class="form-control" readonly value="{{old('numero_dossier',$table->numero_dossier)}}">
            </div>
            
        </div>

        <div class="row">
            <div class="col-md form-group">
                <label for="nature" class="control-label" style="color: black;">Nature du dossier:</label>
                <input type="text" name="nature_dossier" class="form-control" readonly value="{{old('nature_dossier',$table->nature_dossier)}}">
            </div>

            <div class="col-md form-group">
                <label for="telephone" class="control-label" style="color: black;">Telephone:</label>
                <input type="text" name="telephone" class="form-control" readonly value="{{old('telephone',$table->telephone)}}">
            </div>
        </div>
    
        <div class="row">
            <div class="col-md form-group">
                <label for="arrondissement" class="control-label" style="color: black;">Arrondissement:</label>
                <input type="text" name="arrondissement" class="form-control" readonly value="{{old('arrondissement',$table->arrondissement)}}">
            </div>
            <div class="col-md form-group">
                <label for="quartier" class="control-label" style="color: black;">Quartier:</label>
                <input type="text" name="quartier" class="form-control" readonly value="{{old('quartier',$table->quartier)}}">
            </div>
            <div class="col-md form-group">
                <label for="date_ouverture" class="control-label" style="color: black;">Date Ouverture:</label>
                <input type="date" name="date_ouverture" class="form-control" readonly value="{{old('date_ouverture',$table->date_ouverture)}}">
            </div>
        </div>

        <div class="row ">
            <div class="col-md form-group">
                <label for="lieu" class="control-label" style="color: black;">Geometre:</label>
                <input type="text" name="geometre" class="form-control" readonly value="{{old('geometre',$table->geometre)}}">
            </div>

            <div class="col-md form-group">
                <label for="numero_controle" class="control-label" style="color: black;">Numero Controle:</label>
                <input type="text" name="numero_controle" class="form-control" readonly value="{{old('numero_controle',$table->numero_controle)}}">
            </div>

            <div class="col-md form-group">
                <label for="numero_ccp" class="control-label" style="color: black;">Numero CCP:</label>
                <input type="text" name="numero_ccp" class="form-control" readonly value="{{old('numero_ccp',$table->numero_ccp)}}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md form-group">
                <label for="numero-feuille" class="control-label" style="color: black;">Numero MJ:</label>
                <input type="text" name="numero_mj" class="form-control" readonly value="{{old('numero_mj',$table->numero_mj)}}">
            </div>

            <div class="col-md form-group">
                <label for="lot" class="control-label" style="color: black;">Lot:</label>
                <input type="text" name="lot" class="form-control" readonly value="{{old('lot',$table->lot)}}">
            </div>

            <div class="col-md form-group">
                <label for="zone" class="control-label" style="color: black;">Zone:</label>
                <select name="zone" id="zone"  class="form-control" readonly>
                    <option selected>{{old('zone',$table->zone)}}</option>
                    <option>zone urbaine</option>
                    <option>zone rurale</option>
                </select>
            </div>
        </div>
</div> 
