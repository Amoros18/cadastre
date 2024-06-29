@extends('chef/accueil')

@section('title', 'CHEF')

@section('content')
<h2  class="container-fluid d-flex ">CONSULTER UN DOSSIER</h2>
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#"><span >DOSSIERS\Consulter un dossier</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<div class="row-center container-fluid">
<button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #4bc5f6, #077cab)" href="{{route('map',['numero_dossier'=>$table->numero_dossier])}}">
    <!--    <a href="http://google.com/maps/place/{{$table->latitude}},{{$table->longitude}}">click here</a>
    -->   
            Localiser le terrain dans la MAP
            </button>

            <button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #4bc5f6, #077cab)" href="{{route('download',['table'=>$table])}}">Telecharger le fichier de point
            </button>   
  
  <button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #4bc5f6, #077cab)" href="{{route('lien-google-map',['numero_dossier'=>$table->numero_dossier])}}">Lien Google Map
    </button>

   <button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #4bc5f6, #077cab)" href="#" id="open-modal"> Interoger la position du dossier
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
    </button>
   
    </div><br>


    <div class="container-fluid">
    <div class=" container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
    <h1 class="text-center" style="color: white">
    Informations du dossier numéro: {{$table->numero_dossier}}
</h1>
    </div>
    <div class=" card-body container-fluid shadow">
    <form id="formulaire_ancien_dossier"  method="POST" >
        @csrf
        
        <div>
            <div class="form-group">
                <label for="nom" class="control-label" style="color: black">Nom Requerant:</label>
                <input type="text" name="nom_requerant" class="form-control @error('nom_requerant') is-invalid @enderror" value="{{old('nom_requerant',$table->nom_requerant)}}">
                    @error('nom_requerant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="numero_dossier" class="control-label" style=" color: black">Numero Dossier:</label>
                <input type="text" name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}">
            </div>
            <div class="form-group">
                <label for="numero_dossier" class="control-label" style="color: black">Numero Decision:</label>
                <input type="text" name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}">
            </div>
    
            <div class="form-group">
                <label for="nature" class="control-label" style="color: black">Nature du dossier:</label>
                <input type="text" name="nature_dossier" class="form-control" value="{{old('nature_dossier',$table->nature_dossier)}}">
            </div>
            <div class="form-group">
                <label for="telephone" class="control-label" style="color: black">Telephone:</label>
                <input type="text" name="telephone" class="form-control" value="{{old('telephone',$table->telephone)}}">
            </div>
        
            <div class="form-group">
                <label for="arrondissement" class="control-label" style=" color: black">Arrondissement:</label>
                <input type="text" name="arrondissement" class="form-control" value="{{old('arrondissement',$table->arrondissement)}}">
            </div>
            <div class="form-group">
                <label for="quartier" class="control-label" style="color: black">Quartier:</label>
                <input type="text" name="quartier" class="form-control" value="{{old('quartier',$table->quartier)}}">
            </div>
            <div class="form-group">
                <label for="date_ouverture" class="control-label" style="color: black">Date Ouverture:</label>
                <input type="date" name="date_ouverture" class="form-control" value="{{old('date_ouverture',$table->date_ouverture)}}">
            </div>
    
            <div class="form-group">
                <label for="lieu" class="control-label" style="color: black">Lieu Dit:</label>
                <input type="text" name="lieu_dit" class="form-control" value="{{old('lieu_dit',$table->lieu_dit)}}">
            </div>
            <div class="form-group">
                <label for="mappe" class="control-label" style="color: black">Mappe:</label>
                <input type="text" name="mappe" class="form-control" value="{{old('mappe',$table->mappe)}}">
            </div>
            <div class="form-group">
                <label for="bloc" class="control-label" style="color: black">Bloc:</label>
                <input type="text" name="bloc" class="form-control" value="{{old('bloc',$table->bloc)}}">
            </div>
            
            <div class="form-group">
                <label for="numero-feuille" class="control-label" style="color: black">Numero De Feuille:</label>
                <input type="text" name="numero_feuille" class="form-control" value="{{old('numero_feuille',$table->numero_feuille)}}">
            </div>
            <div class="form-group">
                <label for="lot" class="control-label" style="color: black">Lot:</label>
                <input type="text" name="lot" class="form-control" value="{{old('lot',$table->lot)}}">
            </div>
            <div class="form-group">
                <label for="zone" class="control-label" style="color: black">Zone:</label>
                <select name="zone" id="zone"  class="form-select">
                        <option selected>{{old('zone',$table->zone)}}</option>
                        <option>zone urbaine</option>
                        <option>zone rurale</option>

                    </select>
            </div>
    
        </div>

        <div >
            <div class="form-group">
                <label for="geometre" class="control-label" style="color: black">Nom du geometre:</label>
                <input type="text" name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}">
            </div>
            <div class="form-group">
                <label for="date_rattachement" class="control-label" style="color: black">Date Rattachemet:</label>
                <input type="date" name="date_rattachement" class="form-control" value="{{old('date_rattachement',$table->date_rattachement)}}">
            </div>
            <div class="form-group">
                <label for="montant_rattachement" class="control-label" style="color: black">Montant Rattachemet:</label>
                <input type="text" name="montant_rattachement" class="form-control" value="{{old('montant_rattachement',$table->montant_rattachement)}}">
            </div>
            <div class="form-group">
                <label for="observation_rattachement" class="control-label" style="color: black">Observation Rattachement:</label>
                <input type="text" name="observation_rattachement" class="form-control" value="{{old('observation_rattachement',$table->observation_rattachement)}}">
            </div>
        </div>

        <div>
            <div >
                <div class="form-group">
                    <label for="superficie_recette" class="control-label" style="color: black">Superficie Recette:</label>
                    <input type="text" name="superficie_recette" class="form-control" value="{{old('superficie_recette',$table->superficie_recette)}}">
                </div>
                <div class="form-group">
                    <label for="montant_recette" class="control-label" style="color: black">Montant Recette:</label>
                    <input type="text" name="montant_recette" class="form-control" value="{{old('montant_recette',$table->montant_recette)}}">
                </div>
                <div class="form-group">
                    <label for="cumule" class="control-label" style="color: black">Cumule:</label>
                    <input type="text" name="cumule" class="form-control" value="{{old('cumule',$table->cumule)}}">
                </div>

                <div class="form-group">
                    <label for="date_cession" class="control-label" style="color: black">Date Cession:</label>
                    <input type="date" name="date_cession" class="form-control" value="{{old('date_cession',$table->date_cession)}}">
                </div>
                <div class="form-group">
                    <label for="montant_recette" class="control-label" style="color: black">Numero Quittance:</label>
                    <input type="text" name="numero_quittance" class="form-control" value="{{old('numero_quittance',$table->numero_quittance)}}">
                </div>
                <div class="form-group">
                    <label for="date_quittance" class="control-label" style="color: black">Date Quittance:</label>
                    <input type="date" name="date_quittance" class="form-control" value="{{old('date_quittance',$table->date_quittance)}}">
                </div>

                <div class="form-group">
                    <label for="observation_recette" class="control-label" style="color: black">Observation Recette:</label>
                    <input type="text" name="observation_recette" class="form-control" value="{{old('observation_recette',$table->observation_recette)}}">
                </div>

            </div>
        </div>
        <div>
            
        </div>
        <div>
            <div class="form-group">
                <label for="dao" class="control-label" style="color: black">Nom DAO:</label>
                <input type="text" name="dao" class="form-control" value="{{old('dao',$table->dao)}}">
            </div>
            <div class="form-group">
                <label for="numero_dossier" class="control-label" style="color: black">Echelle:</label>
                <input type="text" name="echelle" class="form-control" value="{{old('echelle',$table->echelle)}}">

            </div>

            <div class="form-group">
                <label for="superficie" class="control-label" style="color: black">Superficie:</label>
                <input type="text" name="superficie" class="form-control" value="{{old('superficie',$table->superficie)}}">
            </div>
            <div class="form-group">
                <label for="date_ccp" class="control-label" style="color: black">Date CCP:</label>
                <input type="date" name="date_ccp" class="form-control" value="{{old('date_ccp',$table->date_ccp)}}">
            </div>
            <div class="form-group">
                <label for="longitude" class="control-label" style="color: black">Longitude:</label>
                <input type="text" name="longitude" class="form-control" value="{{old('longitude',$table->longitude)}}">
            </div>
            <div class="form-group">
                <label for="latitude" class="control-label" style="color: black">Latitude:</label>
                <input type="text" name="latitude" class="form-control" value="{{old('latitude',$table->latitude)}}">
            </div>
            <div class="form-group">
                <label for="latitude" class="control-label" style="color: black">Type de coordonnees:</label>
                <input type="text" name="type_coordonnees" class="form-control" value="{{old('type_coordonnees',$table->type_coordonnees)}}">
            </div>

            <div class="form-group">
                @if ($table->point)
                        <div class="col-md-12 center bg-danger text-light">coordonnees du point inscrit</div>
                @else
                    <div class="row mt-1">
                        <div class="col-md-12 center bg-danger text-light">coordonnees du point non inscrit</div>
                    </div>
                @endif

            </div>
        <div>

            <div class="form-group">
                <label for="numero_ccp" class="control-label" style="color: black">Numero CCP:</label>
                <input type="text" name="numero_ccp" class="form-control" value="{{old('numero_ccp',$table->numero_ccp)}}">
            </div>

            <div class="form-group">
                <label for="message_porter" class="control-label" style="color: black">Message Porter:</label>
                <input type="text" name="message_porter" class="form-control" value="{{old('message_porter',$table->message_porter)}}">
            </div>
            <div class="form-group">
                <label for="avis_main_courante" class="control-label" style="color: black">Avis:</label>
                <input type="text" name="avis_main_courante" class="form-control" value="{{old('avis_main_courante',$table->avis_main_courante)}}">
            </div>
            <div class="form-group">
                <label for="mise_en_valeur" class="control-label" style="color: black">Mise en valeur:</label>
                <input type="text" name="mise_en_valeur" class="form-control" value="{{old('mise_en_valeur',$table->mise_en_valeur)}}">
            </div>

            <div class="form-group">
                <label for="observation_main_courante" class="control-label" style="color: black">Observation:</label>
                <input type="text" name="observation_main_courante" class="form-control" value="{{old('observation_main_courante',$table->observation_main_courante)}}">
            </div>
            <div class="form-group">
                <label for="date_bornage" class="control-label" style="color: black">Date Bornage:</label>
                <input type="date" name="date_bornage" class="form-control" value="{{old('date_bornage',$table->date_bornage)}}">
            </div>
            <div class="form-group">
                <label for="s_c" class="control-label" style="color: black">S/C:</label>
                <input type="text" name="s_c" class="form-control" value="{{old('s_c',$table->s_c)}}">
            </div>

        </div>

        <div>

            <div class="form-group">
                <label for="numero_controle" class="control-label" style="color: black">Numero Code Controle:</label>
                <input type="text" name="numero_controle" class="form-control" value="{{old('numero_controle',$table->numero_controle)}}">
            </div>

            <div class="form-group">
                <label for="controlleur_1" class="control-label" style="color: black">Non Controlleur 1:</label>
                <input type="text" name="controlleur_1" class="form-control" value="{{old('controlleur_1',$table->controlleur_1)}}">
            </div>
            <div class="form-group">
                <label for="date_controle_1" class="control-label" style="color: black">Date controle 1:</label>
                <input type="date" name="date_controle_1" class="form-control" value="{{old('date_controle_1',$table->date_controle_1)}}">
            </div>

            <div class="form-group">
                <label for="controlleur_2" class="control-label" style="color: black">Non Controlleur 2:</label>
                <input type="text" name="controlleur_2" class="form-control" value="{{old('controlleur_2',$table->controlleur_2)}}">
            </div>
            <div class="form-group">
                <label for="date_controle_2" class="control-label" style="color: black">Date controle 2:</label>
                <input type="date" name="date_controle_2" class="form-control" value="{{old('date_controle_2',$table->date_controle_2)}}">
            </div>
        
        </div>
        
        <div >

            <div class="form-group">
                <label for="verificateur" class="control-label" style="color: black">Verificateur:</label>
                <input type="text" name="verificateur" class="form-control" value="{{old('verificateur',$table->verificateur)}}">
            </div>
            <div class="form-group">
                <label for="numero_mj" class="control-label" style="color: black">Code Mise A Jour:</label>
                <input type="text" name="numero_mj" class="form-control" value="{{old('numero_mj',$table->numero_mj)}}">
            </div>

            <div class="form-group">
                <label for="avis_mj" class="control-label" style="color: black">Avis du verificateur:</label>
                <input type="text" name="avis_mj" class="form-control" value="{{old('avis_mj',$table->avis_mj)}}">
            </div>

        </div>

        <div >

            <div class="form-group">
                <label for="numero_visa" class="control-label" style="left: 10%; color: black">Numero Visa:</label>
                <input type="text" name="numero_visa" class="form-control" value="{{old('numero_visa',$table->numero_visa)}}">
            </div>
            <div class="form-group">
                <label for="date_visa" class="control-label" style="color: black">Date Visa:</label>
                <input type="date" name="date_visa" class="form-control" value="{{old('date_visa',$table->date_visa)}}">
            </div>
            <div class="form-group">
                @error("nom_requerant")
                    {{"Erreur"}}
                @enderror
            </div>
            <button class="btn btn-success mt-3 w-100" type="submit" href="{{route('edit.ancien-dossier',['table'=>$table])}}">Valider les modifications</button>
    
        </div>
        <!-- <small class="text-left">creat by Amoros </small> -->
    </form>
    </div>
</div>

@endsection