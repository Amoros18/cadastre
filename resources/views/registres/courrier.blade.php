@extends('chef/accueil')

@section('title', 'Registre Courrier')

@section('content')
<!-- @include('courrier.search') -->
<h2  class="container-fluid">REGISTRE DE COURRIER</h2>

<div class="container-fluid">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span >Chef</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span >REGISTRES PROPRES\Registre de courrier</span></a><i class="fas fa-solid fa-chevron-right ml-md-3 ml-1"></i> </li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<div class="container card shadow">
 
        <div class="container-fluid m-3 d-flex me-0 justify-content-end">
            <a href="{{route('registre.courrier_pdf',[
                'numero_correspondance'=>$numero_correspondance,
                'expediteur'=>$expediteur,
                'date_less'=>$date_less,
                'date_more'=>$date_more,
                'numero_reponse'=>$numero_reponse,
                ])}}" class="btn btn-primary" style="background: linear-gradient(to right, #4bc5f6, #077cab)">Convertir en pdf</a>
        </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="color: black">
                <tr>
                    <th >Date D'Arrive</th>
                    <th >Date Correspondance</th>
                    <th >Numero Correspondance</th>
                    <th >Expediteur</th>
                    <th >Objet</th>
                    <th >Numero de reponse</th>
                </tr>
            </thead>
            <body>
                @foreach($registre as $enregistrement)
                    <tr>
                        <td>{{$enregistrement->date_arrive}}</td>
                        <td>{{$enregistrement->date_correspondance}}</td>
                        <td>{{$enregistrement->numero_correspondance}}</td>
                        <td>{{$enregistrement->expediteur}}</td>
                        <td>{{$enregistrement->objet}}</td>
                        <td>{{$enregistrement->numero_reponse}}</td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</div>


@endsection