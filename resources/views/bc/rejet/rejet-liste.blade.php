@extends('base')

@section('title', 'Controle')
@section('content')
@include('search')

<h1 class="text-primary text-center">Selectionner le dossier a modifier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero Dossier</th>
                <th>Nom requerant</th>
                <th>Nature dossier</th>
                <th>Date Rejet</th>
                <th>Motif</th>
                <th>observation</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->date_rejet}}</td>
                        <td>{{$Liste->motif}}</td>
                        <td>{{$Liste->etat}}</td>

                        <td><a  href = "{{route('edit.controle-rejet',['table'=>$Liste->id])}} ">
                            <button type="edit">Modifier</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection