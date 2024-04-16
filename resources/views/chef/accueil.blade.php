@extends('base')

@section('title', 'CHEF')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Ajouter un utilisateur:</label>
            <a  href = "{{route('create.user')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Coter un dossier:</label>
            <a  href = "{{route('liste.cotation')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Viser le document:</label>
            <a  href = "{{route('liste.visa')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Afecter Numero De Dossier:</label>
            <a  href = "{{route('liste.affectation')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Modifier des information:</label>
            <a  href = "{{route('modifier')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Generateur de registre:</label>
            <a  href = "{{route('registre.generateur')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Consulter un dossier:</label>
            <a  href = "{{route('liste.dossier')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Consulter un courrier:</label>
            <a  href = "{{route('liste.courrier',['modifier'=>0])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection