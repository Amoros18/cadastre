@extends('base')

@section('title', 'Archivage')
@section('content')
@include('search')

<h1 class="text-primary text-center">Selectionner le dossier a rattacher</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Numero Dossier</th>
                <th>Date Reception</th>
                <th>Numero Tirroir</th>
                <th>observation</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->date_reception}}</td>
                        <td>{{$Liste->numero_tirroir}}</td>
                        <td>{{$Liste->observation}}</td>

                        <td><a  href = "{{route('edit.archivage',['table'=>$Liste])}} ">
                            <button type="edit">Modifier</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection