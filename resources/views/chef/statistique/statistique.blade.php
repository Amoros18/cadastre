@extends('base')

@section('title', 'Statistique')

@section('content')
    <div class="card">
        @include('chef.statistique.searchCount')
    </div>
    <div class="space-top">  </div>

    <div class="card">
        <div class="row text-black">
            <div class="row" style="margin-left: 20px;">Nombre de Dossier Ajoutes: {{$nombre_create}}</div>
            <div class="row" style="margin-left: 20px;">Nombre de Dossier Modifier: {{$nombre_update}}</div>
        </div>
    </div>
    <div class="space-top"></div>

    <div class="card" style=" background-color:black;">
        <div class="row">
            <div class="row" style="margin-left: 20px;font-size: 28px;">Dossier Ajouter</div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-stat">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="space-top"></div>

    <div class="card" style=" background-color:black;">
        <div class="row">
            <div class="row" style="margin-left: 20px;font-size: 28px;">Dossier Modifier</div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-stat">
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
                </thead>
                <tbody>
                    @foreach ($Listes2 as $Liste )
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection