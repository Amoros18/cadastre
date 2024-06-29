@extends('geometre/accueil')

@section('title', 'Enregistrer')

@section('content')
<h2  class="container-fluid d-flex "> REMPLIR MAIN COURANTE</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('liste.ccp')}}"><span >Géometres</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >MAIN COURANTE</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
    @include('info-ouverture')
    @include('geometre.main.main-courante')
    <style>
        #info{ background: linear-gradient(to right, #F9D423, #e65c00);}

        #rattach{ background: linear-gradient(to right, #F9D423, #e65c00);}
    </style>
@endsection