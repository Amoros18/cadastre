@extends('base')

@section('title', 'Transmissions')
@section('content')
@include('search')
<h1 class="text-primary text-center">Selectionner le dossier a Transmettre</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero Dossier</th>
                <th>Non Requerant</th>
                <th>nature dossier</th>
                <th>Date Transmissio</th>
                <th>Date Reception</th>
                <th>Motif</th>
                <th>Statut</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->date_transmission}}</td>
                        <td>{{$Liste->date_reception}}</td>
                        <td>{{$Liste->motif}}</td>
                        <td>{{$Liste->statut}}</td>

                        <td><a  href = "{{route('transmission.delegue.edit',['table'=>$Liste->id])}} ">
                            <button type="edit">Enregistrer</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection