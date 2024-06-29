@extends('chef/accueil')

@section('title', 'Enregistrer')

@section('content')
<h2  class="container-fluid d-flex ">
@if ($table->numero_dossier)MODIFIER NUMERO DE DOSSIER
@else
AFFECTER NUMERO DE DOSSIER
@endif
</h2>
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
            <span >
                @if ($table->numero_dossier)
                        DOSSIERS\Modifier numero de dossier
                @else
                        DOSSIERS\Affecter numero de dossier
                @endif
            </span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
    @include('info-ouverture')
    @include('chef.affectation.affectation')
    <style>
        #info{ background: linear-gradient(to right, #4bc5f6, #077cab);}

        #Rattach{ background: linear-gradient(to right, #4bc5f6, #077cab);}
    </style>
@endsection