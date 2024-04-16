@extends('base')

@section('title', 'Controle')
@section('content')
@include('search')

<h1 class="text-primary text-center">Selectionner le dossier a ennegistre</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Nom requerant</th>
                <th>nature dossier</th>
                <th>telephone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>quartier</th>
                <th>mappe</th>
                <th>bloc</th>
                <th>lot</th>
                <th>numero feuille</th>
                <th>date ouverture</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->telephone}}</td>
                        <td>{{$Liste->zone}}</td>
                        <td>{{$Liste->lieu_dit}}</td>
                        <td>{{$Liste->quartier}}</td>
                        <td>{{$Liste->mappe}}</td>
                        <td>{{$Liste->bloc}}</td>
                        <td>{{$Liste->lot}}</td>
                        <td>{{$Liste->numero_feuille}}</td>
                        <td>{{$Liste->date_ouverture}}</td>

                        <td><a  href = "
                            @if ($modifier ==1)
                                {{route('edit.controle2',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                <button type="edit">Modifier</button></a></td>
    
                            @else
                                {{route('create.controle2',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                <button type="edit">Effectuer</button></a></td>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection