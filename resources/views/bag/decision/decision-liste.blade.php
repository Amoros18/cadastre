@extends('chef/accueil')

@section('title', 'Decision')
@section('content')
<!-- @include('bag.decision.search') -->
<h1 class="text-primary text-center">Séléctionner la decision à Modifier</h1>

<div class="container card shadow">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Numero Decision</th>
                <th>Date decision</th>

                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->numero_decision}}</td>
                        <td>{{$Liste->date_decision}}</td>

                        <td><a  href = "{{route('edit.decision',['table'=>json_decode(json_encode($Liste->id),true)])}} ">
                            <button type="edit">Enregistrer</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection