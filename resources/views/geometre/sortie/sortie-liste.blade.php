@extends('base')

@section('title', 'Cotation')
@section('content')

<h1 class="text-primary text-center">Selectionner le dossier a ennegistre</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero dossier</th>
                <th>Date travaux</th>
                <th>Liste Materiaux</th>
                <th>Observation</th>
                <th>Liste de geometre</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->date_travaux}}</td>
                        <td>{{$Liste->liste_materiaux}}</td>
                        <td>{{$Liste->observation}}</td>
                        <td>{{$Liste->liste_geometre}}</td>

                        <td><a  href = "{{route('edit.sortie-geometre',['table'=>$Liste])}} ">
                            <button type="edit">Modifier</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$Listes->links()}}

@endsection