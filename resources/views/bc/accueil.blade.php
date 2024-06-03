@extends('base')

@section('title', 'CONTROLE')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Controle 1:</label>
            <a  href = "{{route('liste.controle1')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">controle 2:</label>
            <a  href = "{{route('liste.controle2')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Rejet Dossier Au Controle 1:</label>
            <a  href = "{{route('liste.controle-intro-rejet',['controle'=>'1'])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Rejet Dossie Au Controle 2:</label>
            <a  href = "{{route('liste.controle-intro-rejet',['controle'=>'2'])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action  action-div">
            <label for="nom" class="action-label">Rechercher un dossier:</label>
            <a  href = "{{route('liste.recherche')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection