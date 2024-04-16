@extends('base')

@section('title', 'Ancien Dossier')

@section('content')

<div class="container d-flex">

    <div class="row">

        <div class="col-mt-1  action-div">
            <label for="nom" class="action-label">Numeriser un ancien dossier:</label>
            <a  href = "{{route('create.ancien-dossier')}}"> <button class=" action-button"type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1  action-div">
            <label for="nom" class="action-label">Modifier un ancien dossier:</label>
            <a  href = "{{route('liste.ancien-dossier')}}"> <button class=" action-button"type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection