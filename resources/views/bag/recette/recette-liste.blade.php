@extends('base')

@section('title', 'Quittances')
@section('content')

@include('search')
<h1 class="text-primary text-center">Selectionner la quittance a modifier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero dossier</th>
                <th>Numero Quittance</th>
                <th>Date Quittance</th>
                <th>Superficie</th>
                <th>Date Cession</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->numero_quittance}}</td>
                        <td>{{$Liste->date_quittance}}</td>
                        <td>{{$Liste->superficie_recette}}</td>
                        <td>{{$Liste->date_cession}}</td>

                        <td><a  href = "{{route('edit.recette',['table'=>$Liste->id])}} ">
                            <button type="edit">Modifier</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$Listes->links()}}

@endsection