@extends('base')

@section('title', 'Statistiques')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Statistiques Generales:</label>
            <a  href = "{{route('stats.general')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
        <div class="col-mt-1 action action-div">
            <label for="nom" class="action-label">Cotation par geometre:</label>
            <a  href = "{{route('stats.cotation')}}"> <button class=" action-button" type="edit">Effectuer</button></a>
        </div>
    </div>
</div>
@endsection