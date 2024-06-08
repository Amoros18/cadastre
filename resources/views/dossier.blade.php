@extends('base')

@section('title', 'CHEF')

@section('content')

<div>
    <div class="col">
        <label for="">Localiser le terrain dans la MAP</label>
    <!--    <a href="http://google.com/maps/place/{{$table->latitude}},{{$table->longitude}}">click here</a>
    -->   
            <a href="{{route('map',['numero_dossier'=>$table->numero_dossier])}}">Map</a>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Telecharger le fichier de point</label>
            <a href="{{route('download',['table'=>$table])}}">telecharger</a>    
        </div>
        <!-- <div class="text-left col">
            <a href="{{route('edit.ancien-dossier',['table'=>$table])}}">Modifier information</a>    
        </div> -->
    </div>
    <div class="col">
        <label for="">Lien Google Map</label>
        <a href="{{route('lien-google-map',['numero_dossier'=>$table->numero_dossier])}}">Google Map</a>
    </div>
    <div class="col">
        <label for="">Interoger la position du dossier</label>
        <button id="open-modal" type="button" class="btn btn-primary"> Interoger</button>
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
    </div>
</div>


<div class="container-fluid">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col">
                <h3 class="text-center">Information du dossier numero: {{$table->numero_dossier}}</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="row mt-1">
                <label for="nom" class="label col-md-3 control-label">Nom Requerant:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="nom_requerant" class="form-control @error('nom_requerant') is-invalid @enderror" value="{{old('nom_requerant',$table->nom_requerant)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="nom" class="label col-md-3 control-label">Sexe du Requerant:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="sexe_requerant" class="form-control @error('sexe_requerant') is-invalid @enderror" value="{{old('sexe_requerant',$table->sexe_requerant)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label">Numero Dossier:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label">Numero Decision:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="nature" class="label col-md-3 control-label">Nature du dossier:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="nature_dossier" class="form-control" value="{{old('nature_dossier',$table->nature_dossier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="telephone" class="label col-md-3 control-label">Telephone:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}">
                </div>
            </div>
        
            <div class="row mt-1">
                <label for="arrondissement" class="label col-md-3 control-label">Arrondissement:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="arrondissement" class="form-control" value="{{old('arrondissement',$table->arrondissement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="quartier" class="label col-md-3 control-label">Quartier:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_ouverture" class="label col-md-3 control-label">Date Ouverture:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
                </div>
            </div>
    
            <div class="row mt-1">
                <label for="lieu" class="label col-md-3 control-label">Lieu Dit:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="mappe" class="label col-md-3 control-label">Mappe:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="bloc" class="label col-md-3 control-label">Bloc:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}">
                </div>
            </div>
            
            <div class="row mt-1">
                <label for="numero-feuille" class="label col-md-3 control-label">Numero De Feuille:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="lot" class="label col-md-3 control-label">Lot:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="zone" class="label col-md-3 control-label">Zone:</label>
                <div class="col-md-9">
                    <input readonly type="text" class="form-control" value="{{old('zone',$table->zone)}}"/>
                </div>
            </div>
    
        </div>

        <div class="row mt-3">
            <div class="row mt-1">
                <label for="geometre" class="label col-md-3 control-label">Nom du geometre:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_rattachement" class="label col-md-3 control-label">Date Rattachemet:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="montant_rattachement" class="label col-md-3 control-label">Montant Rattachemet:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="montant_rattachement" class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="observation_rattachement" class="label col-md-3 control-label">Observation Rattachement:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="observation_rattachement" class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- <div class="row mt-1"> -->
                <div class="row mt-1">
                    <label for="superficie_recette" class="label col-md-3 control-label">Superficie Recette:</label>
                    <div class="col-md-9">
                        <input readonly type="text" name="superficie_recette" class="form-control" value="{{old('superficie_recette',$table->superficie_recette)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="montant_recette" class="label col-md-3 control-label">Montant Recette:</label>
                    <div class="col-md-9">
                        <input readonly type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$table->montant_recette)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="cumule" class="label col-md-3 control-label">Cumule:</label>
                    <div class="col-md-9">
                        <input readonly type="text" name="cumule" class="form-control" value="{{old('cumule',$table->cumule)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="date_cession" class="label col-md-3 control-label">Date Cession:</label>
                    <div class="col-md-9">
                        <input readonly type="date" name="date_cession" class="form-control" value="{{old('date_cession',$table->date_cession)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="montant_recette" class="label col-md-3 control-label">Numero Quittance:</label>
                    <div class="col-md-9">
                        <input readonly type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$table->numero_quittance)}}">
                    </div>
                </div>
                <div class="row mt-1">
                    <label for="date_quittance" class="label col-md-3 control-label">Date Quittance:</label>
                    <div class="col-md-9">
                        <input readonly type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$table->date_quittance)}}">
                    </div>
                </div>

                <div class="row mt-1">
                    <label for="observation_recette" class="label col-md-3 control-label">Observation Recette:</label>
                    <div class="col-md-9">
                        <input readonly type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$table->observation_recette)}}">
                    </div>
                </div>

            <!-- </div> -->
        </div>
        <div>
            
        </div>
        <div class="row mt-3">
            <div class="row mt-1">
                <label for="dao" class="label col-md-3 control-label">Nom DAO:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="dao" class="form-control" value="{{old('dao',$table->dao)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_dossier" class="label col-md-3 control-label">Echelle:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="echelle" class="form-control" value="{{old('echelle',$table->echelle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="superficie" class="label col-md-3 control-label">Superficie:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="superficie" class="form-control" value="{{old('superficie',$table->superficie)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_ccp" class="label col-md-3 control-label">Date CCP:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="longitude" class="label col-md-3 control-label">Longitude:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="latitude" class="label col-md-3 control-label">Latitude:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="latitude" class="label col-md-3 control-label">Type de coordonnees:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="type_coordonnees" class="form-control" value="{{old('type_coordonnees',$table->type_coordonnees)}}">
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
        </div>
        <div class="row mt-3">

            <div class="row mt-1">
                <label for="numero_ccp" class="label col-md-3 control-label">Numero CCP:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_ccp" class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="message_porter" class="label col-md-3 control-label">Message Porter:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="message_porter" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="avis_main_courante" class="label col-md-3 control-label">Avis:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="avis_main_courante" class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="mise_en_valeur" class="label col-md-3 control-label">Mise en valeur:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="mise_en_valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="observation_main_courante" class="label col-md-3 control-label">Observation:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="observation_main_courante" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_bornage" class="label col-md-3 control-label">Date Bornage:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_bornage" class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="s_c" class="label col-md-3 control-label">S/C:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="s_c" class="form-control" value="{{old('s_c',$table->s_c)}}">
                </div>
            </div>

        </div>

        <div class="row mt-3">

            <div class="row mt-1">
                <label for="numero_controle" class="label col-md-3 control-label">Numero Code Controle:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_controle" class="form-control" value="{{old('numero_controle',$table->numero_controle)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_1" class="label col-md-3 control-label">Non Controlleur 1:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="controlleur_1" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_controle_1" class="label col-md-3 control-label">Date controle 1:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="controlleur_2" class="label col-md-3 control-label">Non Controlleur 2:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="controlleur_2" class="form-control" value="{{old('controlleur_2',$table->controlleur_2)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_controle_2" class="label col-md-3 control-label">Date controle 2:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_controle_2" class="form-control" value="{{old('date_controle_2',$table->date_controle_2)}}">
                </div>
            </div>
        
        </div>
        
        <div class="row mt-3">

            <div class="row mt-1">
                <label for="verificateur" class="label col-md-3 control-label">Verificateur:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="numero_mj" class="label col-md-3 control-label">Code Mise A Jour:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_mj" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
                </div>
            </div>

            <div class="row mt-1">
                <label for="avis_mj" class="label col-md-3 control-label">Avis du verificateur:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="avis_mj" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
                </div>
            </div>

        </div>

        <div class="row mt-3">

            <div class="row mt-1">
                <label for="numero_visa" class="label col-md-3 control-label">Numero Visa:</label>
                <div class="col-md-9">
                    <input readonly type="text" name="numero_visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}">
                </div>
            </div>
            <div class="row mt-1">
                <label for="date_visa" class="label col-md-3 control-label">Date Visa:</label>
                <div class="col-md-9">
                    <input readonly type="date" name="date_visa" class="form-control" value="{{old('date_visa',$table->date_visa)}}">
                </div>
            </div>
            <div class="row mt-1">
                @error("nom_requerant")
                    {{"Erruer"}}
                @enderror
            </div>

        </div>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>

@endsection