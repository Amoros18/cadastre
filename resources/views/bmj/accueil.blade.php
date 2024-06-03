@extends('base')

@section('title', 'MISE A JOUR')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre MJ:</label>
            <a  href = "{{route('liste.mj')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Rejeter un dossier:</label>
            <a  href = "{{route('liste.mj-intro-rejet')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Rechercher un dossier:</label>
            <a  href = "{{route('liste.recherche')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection