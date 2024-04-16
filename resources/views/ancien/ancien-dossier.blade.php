
<h1 class="text-primary text-center">
    @if ($table->id)
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
        
        <div class="row">
            <div class="bg-primary">
                <h5 class="text-center">Information d'ouverture du dossier</h5>
            </div>

            <div class="row mt-1">
                <label for="nom" class="label col-md-2 control-label">Nom Requerant:</label>
                <div class="col-md-5">
                    <input type="text" name="nom_requerant" class="form-control @error('nom_requerant') is-invalid @enderror" value="{{old('nom_requerant',$table->nom_requerant)}}">
                    @error('nom_requerant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="numero_dossier" class="label col-md-2 control-label">Numero Dossier:</label>
                <div class="col-md-3">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="nature" class="label col-md-2 control-label">Nature du dossier:</label>
                <div class="col-md-5">
                    <input type="text" name="nature_dossier" class="form-control" value="{{old('nature_dossier',$table->nature_dossier)}}">
                </div>
                <label for="telephone" class="label col-md-2 control-label">Telephone:</label>
                <div class="col-md-3">
                    <input type="text" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}">
                </div>
            </div>
        
            <div class="row mt-1">
                <label for="telephone" class="label col-md-2 control-label">numero_decision:</label>
                <div class="col-md-5">
                    <input type="text" name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}">
                </div>
                @error("numero_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

                <label for="arrondissement" class="label col-md-2 control-label">Arrondissement:</label>
                <div class="col-md-3">
                    <select name="arrondissement" id="zone"  class="form-select">
                        <option selected>{{old('arrondissement',$table->arrondissement)}}</option>
                        <option>Maroua 1</option>
                        <option>Maroua 2</option>
                        <option>Maroua 3</option>
                        <option>Bogo</option>
                        <option>Dargala</option>
                        <option>Meri</option>
                        <option>Ndoukoula</option>
                        <option>PETTE</option>
                        <option>Gazawa</option>
                    </select>
                    @error("arrondissement")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-1">
                <label for="quartier" class="label col-md-2 control-label">Quartier:</label>
                <div class="col-md-5">
                    <input type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}">
                </div>
                <label for="date_ouverture" class="label col-md-2 control-label">Date Ouverture:</label>
                <div class="col-md-3">
                    <input type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="lieu" class="label col-md-2 control-label">Lieu Dit:</label>
                <div class="col-md-3">
                    <input type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}">
                </div>
                <label for="mappe" class="label col-md-1 control-label">Mappe:</label>
                <div class="col-md-2">
                    <input type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}">
                </div>
                <label for="bloc" class="label col-md-1 control-label">Bloc:</label>
                <div class="col-md-3">
                    <input type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}">
                </div>
            </div>
            
            <div class="row mt-1">
                <label for="numero-feuille" class="label col-md-2 control-label">Numero De Feuille:</label>
                <div class="col-md-3">
                    <input type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}">
                </div>
                <label for="lot" class="label col-md-1 control-label">Lot:</label>
                <div class="col-md-2">
                    <input type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}">
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

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information De Rattachement</h5>
            </div>
            <div class="row mt-1">
                <label for="geometre" class="label col-md-2 control-label">Nom du geometre:</label>
                <div class="col-md-3">
                    <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}">
                </div>
                <label for="date_rattachement" class="label col-md-1 control-label">Date Rattachemet:</label>
                <div class="col-md-2">
                    <input type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
                </div>
                <label for="montant_rattachement" class="label col-md-1 control-label">Montant Rattachemet:</label>
                <div class="col-md-2">
                    <input type="text" name="montant_rattachement" class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="observation_rattachement" class="label col-md-2 control-label">Observation Rattachement:</label>
                <div class="col-md-10">
                    <input type="text" name="observation_rattachement" class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information de la recette</h5>
            </div>
            <div class="row mt-1">
                <div class="row mt-1">
                    <label for="superficie_recette" class="label col-md-2 control-label">Superficie Recette:</label>
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
                    <label for="montant_recette" class="label col-md-1 control-label">Montant Recette:</label>
                    <div class="col-md-2">
                        <input type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$table->montant_recette)}}">
                    </div>
                    <label for="cumule" class="label col-md-1 control-label">Cumule:</label>
                    <div class="col-md-3">
                        <input type="text" name="cumule" class="form-control" value="{{old('cumule',$table->cumule)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="date_cession" class="label col-md-2 control-label">Date Cession:</label>
                    <div class="col-md-3">
                        <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$table->date_cession)}}">
                    </div>
                    <label for="montant_recette" class="label col-md-1 control-label">Numero Quittance:</label>
                    <div class="col-md-2">
                        <input type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$table->numero_quittance)}}">
                    </div>
                    <label for="date_quittance" class="label col-md-1 control-label">Date Quittance:</label>
                    <div class="col-md-3">
                        <input type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$table->date_quittance)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="observation_recette" class="label col-md-2 control-label">Observation Recette:</label>
                    <div class="col-md-10">
                        <input type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$table->observation_recette)}}">
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information du CCP</h5>
            </div>
           
            <div class="row mt-1">
                <label for="dao" class="label col-md-2 control-label">Nom DAO:</label>
                <div class="col-md-5">
                    <input type="text" name="dao" class="form-control" value="{{old('dao',$table->dao)}}">
                </div>
                <label for="numero_dossier" class="label col-md-2 control-label">Echelle:</label>
                <div class="col-md-3">
                    <input type="text" name="echelle" class="form-control" value="{{old('echelle',$table->echelle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="superficie" class="label col-md-2 control-label">Superficie:</label>
                <div class="col-md-5">
                    <input type="text" name="superficie" class="form-control" value="{{old('superficie',$table->superficie)}}">
                </div>
                <label for="date_ccp" class="label col-md-2 control-label">Date CCP:</label>
                <div class="col-md-3">
                    <input type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}">
                </div>
            </div>

            @if ($table->point)
                <div class="row mt-1">
                    <div class="col-md-3 center bg-danger text-light">coordonnees du point inscrit</div>
                </div>
                <div class="row mt-1">
                    <label for="data" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                    <div class="col-md-8">
                        <input type="file" name="data" class="form-control" value="{{old('data')}}">
                        @error("data")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @else
                <label for="data" class="label col-md-4 control-label">Insere le fichier des coordonnees:</label>
                <div class="col-md-8">
                    <input type="file" name="data" class="form-control" value="{{old('data')}}">
                    @error("data")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            @endif
            <div class="row mt-1">
                <label for="longitude" class="label col-md-2 control-label">Longitude:</label>
                <div class="col-md-5">
                    <input type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}">
                    @error("longitude")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="latitude" class="label col-md-2 control-label">Latitude:</label>
                <div class="col-md-3">
                    <input type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}">
                    @error("latitude")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information du registre MAIN COURANTE</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_ccp" class="label col-md-2 control-label">Numero CCP:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_ccp" class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="message_porter" class="label col-md-2 control-label">Message Porter:</label>
                <div class="col-md-3">
                    <input type="text" name="message_porter" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
                </div>
                <label for="avis_main_courante" class="label col-md-1 control-label">Avis:</label>
                <div class="col-md-2">
                    <input type="text" name="avis_main_courante" class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
                </div>
                <label for="mise_en_valeur" class="label col-md-1 control-label">Mise en valeur:</label>
                <div class="col-md-3">
                    <input type="text" name="mise_en_valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="observation_main_courante" class="label col-md-2 control-label">Observation:</label>
                <div class="col-md-3">
                    <input type="text" name="observation_main_courante" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
                </div>
                <label for="date_bornage" class="label col-md-1 control-label">Date Bornage:</label>
                <div class="col-md-2">
                    <input type="date" name="date_bornage" class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
                </div>
                <label for="s_c" class="label col-md-1 control-label">S/C:</label>
                <div class="col-md-3">
                    <input type="text" name="s_c" class="form-control" value="{{old('s_c',$table->s_c)}}">
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information du controle</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-2 control-label">Numero Code Controle:</label>
                <div class="col-md-10">
                    <input type="text" name="numero_controle" class="form-control" value="{{old('numero_controle',$table->numero_controle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="label col-md-2 control-label">Non Controlleur 1:</label>
                <div class="col-md-5">
                    <input type="text" name="controlleur_1" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
                </div>
                <label for="date_controle_1" class="label col-md-2 control-label">Date controle 1:</label>
                <div class="col-md-3">
                    <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_2" class="label col-md-2 control-label">Non Controlleur 2:</label>
                <div class="col-md-5">
                    <input type="text" name="controlleur_2" class="form-control" value="{{old('controlleur_2',$table->controlleur_2)}}">
                </div>
                <label for="date_controle_2" class="label col-md-2 control-label">Date controle 2:</label>
                <div class="col-md-3">
                    <input type="date" name="date_controle_2" class="form-control" value="{{old('date_controle_2',$table->date_controle_2)}}">
                </div>
            </div>
        
        </div>
        
        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information de la Mise A Jour</h5>
            </div>

            <div class="row mt-1">
                <label for="verificateur" class="label col-md-2 control-label">Verificateur:</label>
                <div class="col-md-5">
                    <input type="text" name="verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
                </div>
                <label for="numero_mj" class="label col-md-2 control-label">Code Mise A Jour:</label>
                <div class="col-md-3">
                    <input type="text" name="numero_mj" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="avis_mj" class="label col-md-2 control-label">Avis du verificateur:</label>
                <div class="col-md-10">
                    <input type="text" name="avis_mj" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information De Viser</h5>
            </div>

            <div class="row mt-1">
                <label for="numero_visa" class="label col-md-2 control-label">Numero Visa:</label>
                <div class="col-md-5">
                    <input type="text" name="numero_visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}">
                </div>
                @error("numero_visa")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
                <label for="date_visa" class="label col-md-2 control-label">Date Visa:</label>
                <div class="col-md-3">
                    <input type="date" name="date_visa" class="form-control" value="{{old('date_visa',$table->date_visa)}}">
                </div>
                <div class="row mt-1">
                @error("date_visa")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>
        
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->id)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>