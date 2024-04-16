@extends('base')

@section('title', 'Liste des anciens dossier')
@section('content')
@include('search')

<h1 class="text-primary text-center">Liste des ancien dossier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Modifier</th>

                <th>Numero dossier</th>
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
                <th>geometre</th>
                <th>montant recette</th>
                <th>cumule</th>
                <th>superficie recette</th>
                <th>date cession</th>
                <th>numero quittance</th>
                <th>date quittance</th>
                <th>montant rattachement</th>
                <th>date rattachement</th>
                <th>echelle</th>
                <th>dao</th>
                <th>point</th>
                <th>superficie</th>
                <th>date ccp</th>
                <th>date bornage</th>
                <th>S/C</th>
                <th>numero ccp</th>
                <th>numero controle</th>
                <th>controlleur 1</th>
                <th>date controle 1</th>
                <th>controlleur 2</th>
                <th>date controle 1</th>
                <th>numero mj</th>
                <th>verificateur</th>
                <th>numero visa</th>
                <th>date visa</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td><a  href = "{{route('edit.ancien-dossier',['table'=>$Liste->id])}} ">
                            <button type="edit">Modifier</button></a></td>
                        <td>{{$Liste->numero_dossier}}</td>
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
                        <td>{{$Liste->geometre}}</td>
                        <td>{{$Liste->montant_recette}}</td>
                        <td>{{$Liste->cumule}}</td>
                        <td>{{$Liste->superficie_recette}}</td>
                        <td>{{$Liste->date_cession}}</td>
                        <td>{{$Liste->numero_quittance}}</td>
                        <td>{{$Liste->date_quittance}}</td>
                        <td>{{$Liste->montant_rattachement}}</td>
                        <td>{{$Liste->date_rattachement}}</td>
                        <td>{{$Liste->echelle}}</td>
                        <td>{{$Liste->dao}}</td>
                        <td>{{$Liste->point}}</td>
                        <td>{{$Liste->superficie}}</td>
                        <td>{{$Liste->date_ccp}}</td>
                        <td>{{$Liste->date_bornage}}</td>
                        <td>{{$Liste->s_c}}</td>
                        <td>{{$Liste->numero_ccp}}</td>
                        <td>{{$Liste->numero_controle}}</td>
                        <td>{{$Liste->controlleur_1}}</td>
                        <td>{{$Liste->date_controle_1}}</td>
                        <td>{{$Liste->controlleur_2}}</td>
                        <td>{{$Liste->date_controle_1}}</td>
                        <td>{{$Liste->numero_mj}}</td>
                        <td>{{$Liste->verificateur}}</td>
                        <td>{{$Liste->numero_visa}}</td>
                        <td>{{$Liste->date_visa}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection