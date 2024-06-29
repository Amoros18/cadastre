@extends('bag/accueil')

@section('title', 'Transmission')

@section('content')

<div class="container-fluid card shadow">
    <div class="row">
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Reception Delegue:</label>
            <a  href = "{{route('transmission.delegue.liste')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Reception Conservatoire:</label>
            <a  href = "{{route('liste.recette-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Reception Archivage:</label>
            <a  href = "{{route('liste.rattachement')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection