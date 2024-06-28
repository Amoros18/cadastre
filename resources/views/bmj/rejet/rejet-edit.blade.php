@extends('chef/accueil')

@section('title', 'Modifier')

@section('content')
<h2  class="container-fluid d-flex ">MODIFIER REJET DOSSIER</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >BMJ\Modifier rejet mise à jour</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
    @include('info-ouverture')
    @include('bmj.rejet.rejet')
    <style>
        #info{background: linear-gradient(to right, #4bc5f6, #077cab)}
        #rattach{background: linear-gradient(to right, #4bc5f6, #077cab)}
    </style>
    
@endsection