@extends('base')

@section('title', 'GENERATEUR DE REGISTRE')

@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre Visa:</label>
            <a  href = "{{route('registre.visa')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre Recette:</label>
            <a  href = "{{route('registre.recette')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre Rattachement:</label>
            <a  href = "{{route('registre.rattachement')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre MJ:</label>
            <a  href = "{{route('registre.mj')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre CCP:</label>
            <a  href = "{{route('registre.ccp')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre Main Courante:</label>
            <a  href = "{{route('registre.main_courante')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre de Controle:</label>
            <a  href = "{{route('registre.controle')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre dosier recu:</label>
            <a  href = "{{route('registre.dossier_recu')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre transmission delegue:</label>
            <a  href = "{{route('registre.transmis_delegue')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre dossier non cote:</label>
            <a  href = "{{route('registre.non_cote')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre d'Archivage:</label>
            <a  href = "{{route('registre.archivage')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre de Rejet Controle:</label>
            <a  href = "{{route('registre.rejet_bc')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre de Rejet Mise a jour:</label>
            <a  href = "{{route('registre.rejet_bmj')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Registre de Courrier:</label>
            <a  href = "{{route('registre.courrier')}}"> <button class=" action-button" type="edit">GENERER</button></a>
        </div>
    </div>
</div>


@endsection