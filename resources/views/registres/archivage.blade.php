@extends('chef/accueil')

@section('title', 'Registre MJ')

@section('content')
<!-- @include('registres.search') -->
    
<h2  class="container-fluid">REGISTRE ARCHIVAGE</h2>

<div class="container-fluid">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >REGISTRES ARCHIVAGE\Registre archivage</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<div class="container card shadow">


        <div class="container-fluid m-3 d-flex me-0 justify-content-end">
            <a href="{{route('registre.archivage_pdf',[
                'nature_dossier'=>$nature_dossier,
                'arrondissement'=>$arrondissement,
                'date_less'=>$date_less,
                'date_more'=>$date_more,
                ])}}" class="btn btn-primary" style="background: linear-gradient(to right, #4bc5f6, #077cab)">Convertir en pdf</a>
        </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="color: black">
                <tr>
                    <th >Nom Requerant</th>
                    <th >Nature Dossier</th>
                    <th >Arrondissement</th>
                    <th >Zone</th>
                    <th >Lieu Dit</th>
                    <th >Superficie</th>
                    <th >Geometre</th>
                    <th >Numero Quittance</th>
                    <th >Date Ouverture</th>
                </tr>
            </thead>
            <body>
                @foreach($registre as $enregistrement)
                    <tr>
                        <td>{{$enregistrement->nom_requerant}}</td>
                        <td>{{$enregistrement->nature_dossier}}</td>
                        <td>{{$enregistrement->arrondissement}}</td>
                        <td>{{$enregistrement->zone}}</td>
                        <td>{{$enregistrement->lieu_dit}}</td>
                        <td>{{$enregistrement->superficie_recette}}</td>
                        <td>{{$enregistrement->geometre}}</td>
                        <td>{{$enregistrement->numero_quittance}}</td>
                        <td>{{$enregistrement->date_ouverture}}</td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</div>


@endsection