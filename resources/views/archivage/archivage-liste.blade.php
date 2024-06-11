@extends('chef/accueil')

@section('title', 'Archivage')
@section('content')
<!-- @include('search') -->

<h1 class="text-primary text-center">Séléctionner le dossier à rattacher</h1>

<div class="container card shadow">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead style="color: black">
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
                            Modifier</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection