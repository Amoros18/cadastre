@extends('chef/accueil')

@section('title', 'Liste des anciens dossier')
@section('content')
<h2  class="container-fluid d-flex ">MODIFIER UTILISATEUR</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >UTILISATEURS\Modifier utilisateur</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class=" text-center" style="color: white">Choisir un utilisateur</h1>
    </div>
    <div class="table-responsive card-body shadow">

        <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th >Bureau</th>
                <th>Email</th>
                <th>Mot de passe</th>

            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="{{route('edit.user',['table'=>$Liste])}}">
                    <td>{{$Liste->name}}</td>
                        <td>{{$Liste->email}}</td>
                        <td>{{$Liste->password}}</td>
                        <!-- <td>{{$Liste->email_verified_at}}</td> -->
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><br><br>

@endsection