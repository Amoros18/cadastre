@extends('base')

@section('title', 'Points')
@section('content')
@include('search')
<h1 class="text-primary text-center">Selectionner le dossier a Modifier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero Dossier</th>
                <th>Nom requerant</th>
                <th>nature dossier</th>
                <th>telephone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>quartier</th>
                <th>lot</th>
                <th>date ouverture</th>
                <th>geometre</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->telephone}}</td>
                        <td>{{$Liste->zone}}</td>
                        <td>{{$Liste->lieu_dit}}</td>
                        <td>{{$Liste->quartier}}</td>
                        <td>{{$Liste->lot}}</td>
                        <td>{{$Liste->date_ouverture}}</td>
                        <td>{{$Liste->geometre}}</td>

                        <td><a  href = "{{route('edit.points',['numero_dossier'=>$Liste->numero_dossier])}} ">
                            <button type="edit">Enregistrer</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection