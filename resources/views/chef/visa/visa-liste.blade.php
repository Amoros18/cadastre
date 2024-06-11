@extends('chef/accueil')

@section('content')
<!-- @include('search') -->
<h1 class="text-primary text-center">Sélectionner le dossier à enregistrer</h1>
<div class="container card shadow">

    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Nom requerant</th>
                <th>nature dossier</th>
                <th>téléphone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>quartier</th>
                <th>map</th>
                <th>bloc</th>
                <th>lot</th>
                <th>N° feuille</th>
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
                                {{route('edit.visa',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                Modifier</a></td>
    
                            @else
                                {{route('create.visa',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                Effectuer</a></td>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection