@extends('bag/accueil')

@section('title', 'Transmissions')
@section('content')
<!-- @include('search') -->
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to right, #7F00FF, #E100FF)">
        <h1 class=" text-center" style="color: white">Choisir un dossier</h1>
    </div>
    <div class="table-responsive card-body shadow">
    <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Numero Dossier</th>
                <th>Non Requerant</th>
                <th>nature dossier</th>
                <th>Date Transmissio</th>
                <th>Date Reception</th>
                <th>Motif</th>
                <th>Statut</th>

            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="{{route('transmission.delegue.edit',['table'=>$Liste->id])}} ">
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->date_transmission}}</td>
                        <td>{{$Liste->date_reception}}</td>
                        <td>{{$Liste->motif}}</td>
                        <td>{{$Liste->statut}}</td>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection