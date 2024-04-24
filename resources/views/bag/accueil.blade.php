@extends('base')

@section('title', 'BAG')

@section('content')

<div class="container d-flex">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Ouverture du dossier:</label>
            <a  href = "{{route('create.ouverture-dossier')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Registre de recette:</label>
            <a  href = "{{route('liste.recette-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Registre de Rattachement:</label>
            <a  href = "{{route('liste.rattachement')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Ajout/modifier des collegues:</label>
            <a  href = "{{route('user.employer')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Inserer un courrier:</label>
            <a  href = "{{route('create.courrier')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Inserer une decision:</label>
            <a  href = "{{route('create.decision')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Transmission Dossier:</label>
            <a  href = "{{route('transmission.accueil')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Signaler la reception du dossier:</label>
            <a  href = "{{route('reception.accueil')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>

    </div>

</div>

@endsection