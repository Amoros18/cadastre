@extends('base')

@section('title', 'GEOMETRE')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Remplir le CCP:</label>
            <a  href = "{{route('liste.ccp')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Remplir la Main Courante:</label>
            <a  href = "{{route('liste.main-courante')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Liste Sortie de geometre:</label>
            <a  href = "{{route('liste.sortie-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Renseigner Les points:</label>
            <a  href = "{{route('liste.points-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection