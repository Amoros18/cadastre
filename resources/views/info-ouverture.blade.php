

<div class="container-fluid">

    <div class="row">
        <div class="bg-primary">
            <h5 class="text-center">Information d'ouverture du dossier</h5>
        </div>

        <div class="row mt-1">
            <label for="nom" class="label col-md-2 control-label">Nom Requerant:</label>
            <div class="col-md-5">
                <input type="text" name="nom_requerant" class="form-control" readonly value="{{old('nom_requerant',$table->nom_requerant)}}">
                @error('nom_requerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <label for="numero_dossier" class="label col-md-2 control-label">Numero Dossier:</label>
            <div class="col-md-3">
                <input type="text" name="numero_dossier" class="form-control" readonly value="{{old('numero_dossier',$table->numero_dossier)}}">
            </div>
        </div>

        <div class="row mt-1">
            <label for="nature" class="label col-md-2 control-label">Nature du dossier:</label>
            <div class="col-md-5">
                <input type="text" name="nature_dossier" class="form-control" readonly value="{{old('nature_dossier',$table->nature_dossier)}}">
            </div>
            <label for="telephone" class="label col-md-2 control-label">Telephone:</label>
            <div class="col-md-3">
                <input type="text" name="telephone" class="form-control" readonly value="{{old('telephone',$table->telephone)}}">
            </div>
        </div>
    
        <div class="row mt-1">
            <label for="arrondissement" class="label col-md-2 control-label">Arrondissement:</label>
            <div class="col-md-3">
                <input type="text" name="arrondissement" class="form-control" readonly value="{{old('arrondissement',$table->arrondissement)}}">
            </div>
            <label for="quartier" class="label col-md-1 control-label">Quartier:</label>
            <div class="col-md-2">
                <input type="text" name="quartier" class="form-control" readonly value="{{old('quartier',$table->quartier)}}">
            </div>
            <label for="date_ouverture" class="label col-md-1 control-label">Date Ouverture:</label>
            <div class="col-md-3">
                <input type="date" name="date_ouverture" class="form-control" readonly value="{{old('date_ouverture',$table->date_ouverture)}}">
            </div>
        </div>

        <div class="row mt-1">
            <label for="lieu" class="label col-md-2 control-label">Geometre:</label>
            <div class="col-md-3">
                <input type="text" name="geometre" class="form-control" readonly value="{{old('geometre',$table->geometre)}}">
            </div>
            <label for="numero_controle" class="label col-md-1 control-label">Numero Controle:</label>
            <div class="col-md-2">
                <input type="text" name="numero_controle" class="form-control" readonly value="{{old('numero_controle',$table->numero_controle)}}">
            </div>
            <label for="numero_ccp" class="label col-md-1 control-label">Numero CCP:</label>
            <div class="col-md-3">
                <input type="text" name="numero_ccp" class="form-control" readonly value="{{old('numero_ccp',$table->numero_ccp)}}">
            </div>
        </div>
        
        <div class="row mt-1">
            <label for="numero-feuille" class="label col-md-2 control-label">Numero MJ:</label>
            <div class="col-md-3">
                <input type="text" name="numero_mj" class="form-control" readonly value="{{old('numero_mj',$table->numero_mj)}}">
            </div>
            <label for="lot" class="label col-md-1 control-label">Lot:</label>
            <div class="col-md-2">
                <input type="text" name="lot" class="form-control" readonly value="{{old('lot',$table->lot)}}">
            </div>
            <label for="zone" class="label col-md-1 control-label">Zone:</label>
            <div class="col-md-3">
                <select name="zone" id="zone"  class="form-select">
                    <option selected>{{old('zone',$table->zone)}}</option>
                    <option>zone urbaine</option>
                    <option>zone rurale</option>

                </select>
            </div>
        </div>
    </div>
</div>    