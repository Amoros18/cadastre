@extends('base')

@section('title', 'Ancien Dossier')

@section('content')

<div class="container d-flex">

    <div class="row">

        <div class="col-mt-1  action-div">
            <label for="nom" class="action-label">Ajouter une quittance:</label>
            <a  href = "{{route('create.recette',['table'=>$table->id])}}"> <button class=" action-button"type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1  action-div">
            <label for="nom" class="action-label">Ajouter des coordonner:</label>
            <a  href = "{{route('create.points',['numero_dossier'=>$table->numero_dossier])}}"> <button class=" action-button"type="edit">Effectuer</button></a>
        </div>
    </div>

</div>

@endsection