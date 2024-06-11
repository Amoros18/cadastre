@extends('chef/accueil')

@section('title', 'Liste des anciens dossier')
@section('content')

<h1 class="text-primary text-center">Liste des utilisateurs</h1>

<div class="container card shadow">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th >Bureau</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Derniere connexion</th>
                
                <th>Modifier</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->name}}</td>
                        <td>{{$Liste->email}}</td>
                        <td>{{$Liste->password}}</td>
                        <td>{{$Liste->email_verified_at}}</td>
                        
                        <td><a  style="color: blue" href = "{{route('edit.user',['table'=>$Liste])}} ">
                        <!-- <button class="btn btn-success mt-3 w-100" type="edit">Modifier</button> -->
                            Modifier</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><br><br>

@endsection