@extends('bag/accueil')

@section('title', 'Modifier info DAO')
@section('employer','DAO')

@section('content')
<h2  class="container-fluid d-flex ">MODIFIER DAO</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('liste.ccp')}}"><span >Géometres</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >AJOUTER COLLEGUE\Liste DAO</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<div class="container-fluid card">
    <div id= "rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations du DAO</h1>
    </div>

    @include('employer.employer')
    <style>
        #rattach{ background: linear-gradient(to right, #E100FF, #7F00FF);}
    </style>
@endsection