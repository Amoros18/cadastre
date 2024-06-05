@extends('base')

@section('title', 'GENERATEUR DE REGISTRE')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Les Utilisateur:</label>
            <a  href = "{{route('visualiser.liste-user',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Ouverture de dossier:</label>
            <a  href = "{{route('liste.ouverture-dossier',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Registre de Recette:</label>
            <a  href = "{{route('liste.recette',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Registre de Cotation:</label>
            <a  href = "{{route('liste.cotation',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Registre de Rattachement:</label>
            <a  href = "{{route('liste.rattachement',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Numero Dossier:</label>
            <a  href = "{{route('liste.affectation',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Nature de Dossier:</label>
            <a  href = "{{route('liste.nature',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier CCP:</label>
            <a  href = "{{route('liste.ccp',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Main Courante:</label>
            <a  href = "{{route('liste.main-courante',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Controle 1:</label>
            <a  href = "{{route('liste.controle1',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Controle 2:</label>
            <a  href = "{{route('liste.controle2',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Registre Mise a Jour:</label>
            <a  href = "{{route('liste.mj',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Registre de Visa</label>
            <a  href = "{{route('liste.visa',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Sortie des Geometre</label>
            <a  href = "{{route('liste.sortie-geometre',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier l'Archivage</label>
            <a  href = "{{route('liste.archivage',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Rejet Controle</label>
            <a  href = "{{route('liste.controle-rejet',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Rejet MJ</label>
            <a  href = "{{route('liste.mj-rejet',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Les Points</label>
            <a  href = "{{route('liste.points-modif',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier Le Courrier</label>
            <a  href = "{{route('liste.courrier',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Modifier La decision</label>
            <a  href = "{{route('liste.decision',['modifier'=>1])}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>

        
    </div>
</div>
@endsection