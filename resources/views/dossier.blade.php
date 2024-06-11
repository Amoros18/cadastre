@extends('chef/accueil')

@section('title', 'CHEF')

@section('content')

<div>
        <li>
    <!--    <a href="http://google.com/maps/place/{{$table->latitude}},{{$table->longitude}}">click here</a>
    -->   
            <a href="{{route('map',['numero_dossier'=>$table->numero_dossier])}}">Localiser le terrain dans la MAP</a>
            </li>

            <li>
            <a href="{{route('download',['table'=>$table])}}">Telecharger le fichier de point</a>    
            </li>   
  
    <li>
        <a href="{{route('lien-google-map',['numero_dossier'=>$table->numero_dossier])}}">Lien Google Map</a>
    </li>

    <li>
        <a href="#" id="open-modal"> Interoger la position du dossier</a>
        <div class="modal" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Information du dossier
                        </h4>
                    </div>
                    <div class="modal-body">
                        {{$content1}} <br>
                        {{$content2}} <br>
                        {{$content3}} <br>
                        {{$content4}} <br>
                        {{$content5}} <br>
                        {{$content6}} <br>
                        {{$content7}} <br>
                        {{$content8}} <br>
                        {{$content9}} <br>
                        {{$content10}} <br>
                        {{$content11}} <br>
                        {{$content12}} <br>
                        {{$content13}} <br>
                    </div>
                    <div class="modal-footer">
                        sgbg-diamare
                    </div>
                </div>
            </div>
        </div>
    </li>
    <button class="btn btn-primary" type="button" style=" float: right;" href="{{route('edit.ancien-dossier',['table'=>$table])}}">Valider les modifications</button> 
    </ul>
</div>

<div class="row">
            <div class="col">
                <h3 class="text-center" style="color: blue">Informations du dossier numéro: {{$table->numero_dossier}}</h3>
            </div>
        </div>
<div class="container-fluid card shadow" >
    <form id="formulaire_ancien_dossier"  method="POST">
        @csrf
        
        <div>
            <div class="row mt-1">
                <label for="nom" class="label col-md-3 control-label" style="left: 10%; color: black">Nom Requerant:</label>
                <div class="col-md-9">
                    <input type="text" name="nom_requerant" class="form-control @error('nom_requerant') is-invalid @enderror" value="{{old('nom_requerant',$table->nom_requerant)}}">
                    @error('nom_requerant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label" style="left: 10%; color: black">Numero Dossier:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label" style="left: 10%; color: black">Numero Decision:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="nature" class="label col-md-3 control-label" style="left: 10%; color: black">Nature du dossier:</label>
                <div class="col-md-9">
                    <input type="text" name="nature_dossier" class="form-control" value="{{old('nature_dossier',$table->nature_dossier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="telephone" class="label col-md-3 control-label" style="left: 10%; color: black">Telephone:</label>
                <div class="col-md-9">
                    <input type="text" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}">
                </div>
            </div>
        
            <div class="row mt-1">
                <label for="arrondissement" class="label col-md-3 control-label" style="left: 10%; color: black">Arrondissement:</label>
                <div class="col-md-9">
                    <input type="text" name="arrondissement" class="form-control" value="{{old('arrondissement',$table->arrondissement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="quartier" class="label col-md-3 control-label" style="left: 10%; color: black">Quartier:</label>
                <div class="col-md-9">
                    <input type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_ouverture" class="label col-md-3 control-label" style="left: 10%; color: black">Date Ouverture:</label>
                <div class="col-md-9">
                    <input type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="lieu" class="label col-md-3 control-label" style="left: 10%; color: black">Lieu Dit:</label>
                <div class="col-md-9">
                    <input type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="mappe" class="label col-md-3 control-label" style="left: 10%; color: black">Mappe:</label>
                <div class="col-md-9">
                    <input type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="bloc" class="label col-md-3 control-label" style="left: 10%; color: black">Bloc:</label>
                <div class="col-md-9">
                    <input type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}">
                </div>
            </div>
            
            <div class="row mt-1" >
                <label for="numero-feuille" class="label col-md-3 control-label" style="left: 10%; color: black">Numero De Feuille:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="lot" class="label col-md-3 control-label" style="left: 10%; color: black">Lot:</label>
                <div class="col-md-9">
                    <input type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="zone" class="label col-md-3 control-label" style="left: 10%; color: black">Zone:</label>
                <div class="col-md-9">
                    <select name="zone" id="zone"  class="form-select">
                        <option selected>{{old('zone',$table->zone)}}</option>
                        <option>zone urbaine</option>
                        <option>zone rurale</option>

                    </select>
                </div>
            </div>
    
        </div>

        <div >
            <div class="row mt-1">
                <label for="geometre" class="label col-md-3 control-label" style="left: 10%; color: black">Nom du geometre:</label>
                <div class="col-md-9">
                    <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_rattachement" class="label col-md-3 control-label" style="left: 10%; color: black">Date Rattachemet:</label>
                <div class="col-md-9">
                    <input type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
                </div>
            </div>
            <div class="row mt-1" >
                <label for="montant_rattachement" class="label col-md-3 control-label" style="left: 10%; color: black">Montant Rattachemet:</label>
                <div class="col-md-9">
                    <input type="text" name="montant_rattachement" class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="observation_rattachement" class="label col-md-3 control-label" style="left: 10%; color: black">Observation Rattachement:</label>
                <div class="col-md-9">
                    <input type="text" name="observation_rattachement" class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
                </div>
            </div>
        </div>

        <div>
            <div >
                <div class="row mt-1">
                    <label for="superficie_recette" class="label col-md-3 control-label" style="left: 10%; color: black">Superficie Recette:</label>
                    <div class="col-md-9">
                        <input type="text" name="superficie_recette" class="form-control" value="{{old('superficie_recette',$table->superficie_recette)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="montant_recette" class="label col-md-3 control-label" style="left: 10%; color: black">Montant Recette:</label>
                    <div class="col-md-9">
                        <input type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$table->montant_recette)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="cumule" class="label col-md-3 control-label" style="left: 10%; color: black">Cumule:</label>
                    <div class="col-md-9">
                        <input type="text" name="cumule" class="form-control" value="{{old('cumule',$table->cumule)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="date_cession" class="label col-md-3 control-label" style="left: 10%; color: black">Date Cession:</label>
                    <div class="col-md-9">
                        <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$table->date_cession)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="montant_recette" class="label col-md-3 control-label" style="left: 10%; color: black">Numero Quittance:</label>
                    <div class="col-md-9">
                        <input type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$table->numero_quittance)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="date_quittance" class="label col-md-3 control-label" style="left: 10%; color: black">Date Quittance:</label>
                    <div class="col-md-9">
                        <input type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$table->date_quittance)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="observation_recette" class="label col-md-3 control-label" style="left: 10%; color: black">Observation Recette:</label>
                    <div class="col-md-9">
                        <input type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$table->observation_recette)}}">
                    </div>
                </div>

            </div>
        </div>
        <div>
            
        </div>
        <div>
            <div class="row mt-1">
                <label for="dao" class="label col-md-3 control-label" style="left: 10%; color: black">Nom DAO:</label>
                <div class="col-md-9">
                    <input type="text" name="dao" class="form-control" value="{{old('dao',$table->dao)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label" style="left: 10%; color: black">Echelle:</label>
                <div class="col-md-9">
                    <input type="text" name="echelle" class="form-control" value="{{old('echelle',$table->echelle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="superficie" class="label col-md-3 control-label" style="left: 10%; color: black">Superficie:</label>
                <div class="col-md-9">
                    <input type="text" name="superficie" class="form-control" value="{{old('superficie',$table->superficie)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_ccp" class="label col-md-3 control-label" style="left: 10%; color: black">Date CCP:</label>
                <div class="col-md-9">
                    <input type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="longitude" class="label col-md-3 control-label" style="left: 10%; color: black">Longitude:</label>
                <div class="col-md-9">
                    <input type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="latitude" class="label col-md-3 control-label" style="left: 10%; color: black">Latitude:</label>
                <div class="col-md-9">
                    <input type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="latitude" class="label col-md-3 control-label" style="left: 10%; color: black">Type de coordonnees:</label>
                <div class="col-md-9">
                    <input type="text" name="type_coordonnees" class="form-control" value="{{old('type_coordonnees',$table->type_coordonnees)}}">
                </div>
            </div>

            <div class="row mt-1">
                @if ($table->point)
                    <div class="row mt-1">
                        <div class="col-md-12 center bg-danger text-light">coordonnees du point inscrit</div>
                    </div>
                @else
                    <div class="row mt-1">
                        <div class="col-md-12 center bg-danger text-light">coordonnees du point non inscrit</div>
                    </div>
                @endif

            </div>
        <div>

            <div class="row mt-1">
                <label for="numero_ccp" class="label col-md-3 control-label" style="left: 10%; color: black">Numero CCP:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_ccp" class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="message_porter" class="label col-md-3 control-label" style="left: 10%; color: black">Message Porter:</label>
                <div class="col-md-9">
                    <input type="text" name="message_porter" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="avis_main_courante" class="label col-md-3 control-label" style="left: 10%; color: black">Avis:</label>
                <div class="col-md-9">
                    <input type="text" name="avis_main_courante" class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="mise_en_valeur" class="label col-md-3 control-label" style="left: 10%; color: black">Mise en valeur:</label>
                <div class="col-md-9">
                    <input type="text" name="mise_en_valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="observation_main_courante" class="label col-md-3 control-label" style="left: 10%; color: black">Observation:</label>
                <div class="col-md-9">
                    <input type="text" name="observation_main_courante" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_bornage" class="label col-md-3 control-label" style="left: 10%; color: black">Date Bornage:</label>
                <div class="col-md-9">
                    <input type="date" name="date_bornage" class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="s_c" class="label col-md-3 control-label" style="left: 10%; color: black">S/C:</label>
                <div class="col-md-9">
                    <input type="text" name="s_c" class="form-control" value="{{old('s_c',$table->s_c)}}">
                </div>
            </div>

        </div>

        <div>

            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-3 control-label" style="left: 10%; color: black">Numero Code Controle:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_controle" class="form-control" value="{{old('numero_controle',$table->numero_controle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="label col-md-3 control-label" style="left: 10%; color: black">Non Controlleur 1:</label>
                <div class="col-md-9">
                    <input type="text" name="controlleur_1" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_controle_1" class="label col-md-3 control-label" style="left: 10%; color: black">Date controle 1:</label>
                <div class="col-md-9">
                    <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_2" class="label col-md-3 control-label" style="left: 10%; color: black">Non Controlleur 2:</label>
                <div class="col-md-9">
                    <input type="text" name="controlleur_2" class="form-control" value="{{old('controlleur_2',$table->controlleur_2)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_controle_2" class="label col-md-3 control-label" style="left: 10%; color: black">Date controle 2:</label>
                <div class="col-md-9">
                    <input type="date" name="date_controle_2" class="form-control" value="{{old('date_controle_2',$table->date_controle_2)}}">
                </div>
            </div>
        
        </div>
        
        <div >

            <div class="row mt-1">
                <label for="verificateur" class="label col-md-3 control-label" style="left: 10%; color: black">Verificateur:</label>
                <div class="col-md-9">
                    <input type="text" name="verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_mj" class="label col-md-3 control-label" style="left: 10%; color: black">Code Mise A Jour:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_mj" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="avis_mj" class="label col-md-3 control-label" style="left: 10%; color: black">Avis du verificateur:</label>
                <div class="col-md-9">
                    <input type="text" name="avis_mj" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
                </div>
            </div>

        </div>

        <div >

            <div class="row mt-1">
                <label for="numero_visa" class="label col-md-3 control-label" style="left: 10%; color: black">Numero Visa:</label>
                <div class="col-md-9">
                    <input type="text" name="numero_visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_visa" class="label col-md-3 control-label" style="left: 10%; color: black">Date Visa:</label>
                <div class="col-md-9">
                    <input type="date" name="date_visa" class="form-control" value="{{old('date_visa',$table->date_visa)}}">
                </div>
            </div>
            <div class="row mt-1">
                @error("nom_requerant")
                    {{"Erruer"}}
                @enderror
            </div>

        </div>
        <!-- <small class="text-left">creat by Amoros </small> -->
    </form>
</div>

@endsection