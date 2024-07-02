@extends('chef/accueil')

@section('title', 'Controle')
@section('content')
<!-- @include('search') -->
<h2  class="container-fluid d-flex ">MODIFIER REJET CONTRÔLE </h2>
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span>Chef</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span>Bureau de contrôle</span>
                <i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i>
            </a></li>
            <li><a href="#">
                <span>Modifier Rejet Contrôle</span>
            </a></li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class=" text-center" style="color: white">Choisir un dossier</h1>
    </div>
    <div class="table-responsive card-body shadow">

        <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Numero Dossier</th>
                <th>Nom requerant</th>
                <th>Sexe</th>
                <th>Nature dossier</th>
                <th>Date Rejet</th>
                <th>Motif</th>
                <th>observation</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="{{route('edit.controle-rejet',['table'=>$Liste->id])}} ">
                        <td>{{$Liste->numero_dossier}}</td>
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->sexe_requerant}}</td>
                        <td>{{$Liste->nature_dossier}}</td>
                        <td>{{$Liste->date_rejet}}</td>
                        <td>{{$Liste->motif}}</td>
                        <td>{{$Liste->etat}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection