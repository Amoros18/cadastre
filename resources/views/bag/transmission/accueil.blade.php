@extends('base')

@section('title', 'Transmission')

@section('content')

<div class="container d-flex">

    <div class="row">

        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Transmission Delegue:</label>
            <a  href = "{{route('transmission.delegue.liste-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Transmission Conservatoire:</label>
            <a  href = "{{route('liste.recette-intro')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="label col-md-4 control-label">Transmission Archivage:</label>
            <a  href = "{{route('liste.Rattachement')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection