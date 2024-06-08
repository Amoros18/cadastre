@extends('base')

@section('title', 'Liste Dossier')
@section('content')
@include('search')
<h1 class="text-primary text-center">Selectionner le dossier a consulter</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Nom requerant</th>
                <th>Sexe requerant</th>
                <th>Nature dossier</th>
                <th>Telephone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>quartier</th>
                <th>mappe</th>
                <th>bloc</th>
                <th>lot</th>
                <th>numero feuille</th>
                <th>date ouverture</th>

                <th>Consulter</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->nom_requerant}}</td>
                        @if(empty($Liste->sexe_requerant))
                            <td>Non defini</td>
                        @else
                            <td>{{$Liste->sexe_requerant}}</td>
                        @endif
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

                        <td><a  href = "{{route('visualiser.dossier',['table'=>json_decode(json_encode($Liste->id),true)])}}">
                                <button type="edit">Consulter</button></a></td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection