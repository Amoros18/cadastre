@extends('base')

@section('title', 'Controle')
@section('content')
@include('search')
<h1 class="text-primary text-center">
    @if ($modifier ==1)
        Selectionner le dossier a modifier
    @else
        Selectionner le dossier a rejeter
    @endif</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Nom requerant</th>
                <th>Numero dossier</th>
                <th>nature dossier</th>
                <th>telephone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>numero feuille</th>
                <th>date ouverture</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->telephone}}</td>
                        <td>{{$Liste->zone}}</td>
                        <td>{{$Liste->lieu_dit}}</td>
                        <td>{{$Liste->numero_feuille}}</td>
                        <td>{{$Liste->date_ouverture}}</td>

                        <td><a  href = "
                            @if ($modifier ==1)
                                {{route('edit.controle-rejet',['table'=>$Liste->id])}}
                                ">
                                <button type="edit">Modifier</button></a></td>
    
                            @else
                                {{route('create.controle-rejet',['numero_dossier'=>$Liste->numero_dossier])}}
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