@extends('geometre/accueil')

@section('title', 'Geometre')
@section('content')
<!-- @include('search') -->
<h2  class="container-fluid d-flex "> REGISTRE DE SORTIE</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('liste.ccp')}}"><span >Géometres</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >REGISTRE DE SORTIE</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to right, #F9D423, #e65c00)">
        <h1 class=" text-center" style="color: white">Choisir un dossier</h1>
    </div>
    <div class="table-responsive card-body shadow">

        <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Nom requerant</th>
                <th>nature dossier</th>
                <th>telephone</th>
                <th>zone</th>
                <th>lieu dit</th>
                <th>quartier</th>
                <th>mappe</th>
                <th>bloc</th>
                <th>lot</th>
                <th>numero feuille</th>
                <th>date ouverture</th>
                <th>geometre</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="{{route('create.sortie-geometre',['id'=>$Liste->id])}}">
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
                        <td>{{$Liste->geometre}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection