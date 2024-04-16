@extends('base')

@section('title', 'GENERATEUR DE REGISTRE')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Ajouter un Geometre:</label>
            <a  href = "{{route('create.employer.geometre')}}"> <button class=" action-button" type="edit">Ajouter</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Ajouter un DAO:</label>
            <a  href = "{{route('create.employer.dao')}}"> <button class=" action-button" type="edit">Ajouter</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Ajouter un Controlleur:</label>
            <a  href = "{{route('create.employer.controlleur')}}"> <button class=" action-button" type="edit">Ajouter</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Consulter/modifier les infos des Geometre:</label>
            <a  href = "{{route('visualiser.liste-geometre')}}"> <button class=" action-button" type="edit">Consulter</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Consulter/modifier les infos des dao:</label>
            <a  href = "{{route('visualiser.liste-dao')}}"> <button class=" action-button" type="edit">Consulter</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Consulter/modifier les infos des controlleurs:</label>
            <a  href = "{{route('visualiser.liste-controlleur')}}"> <button class=" action-button" type="edit">Consulter</button></a>
        </div>

    </div>
</div>


@endsection