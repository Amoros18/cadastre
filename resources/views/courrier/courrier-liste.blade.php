@extends('chef/accueil')

@section('title', 'COURRIER')
@section('content')
<!-- @include('courrier.search') -->
<h2 class="container-fluid d-flex ">
    @if ($modifier==1)
        MODIFIER COURRIER
    @else
        CONSULTER COURRIER
    @endif
</h2>

<!-- Breadcrumbs -->
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
        <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span>Chef</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i></li>
            @if ($modifier==1)
                <li ><a class="black-text active-2  " href="#">
                    <span>Registres propres</span>
                    <i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i>
                </a></li>
                <li><a href="#">
                    <span>Modifier un courrier</span>
                </a></li>
            @else
                <li ><a class="black-text active-2  " href="#">
                    <span>Consulter un courrier</span>
                </a></li>
            @endif
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<!-- Body -->
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class=" text-center" style="color: white">Choisir un courrier</h1>
    </div>
    <div class="table-responsive card-body shadow">

        <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Date arrivée</th>
                <th>Date Correspondance</th>
                <th>Numero Correspondance</th>
                <th>Expediteur</th>
                <th>Objet</th>
                <th>Numero De Reponse</th>

            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="@if ($modifier ==1)
                                {{route('edit.courrier',['table'=>json_decode(json_encode($Liste->id),true)])}}
                            @else
                                {{route('visualiser.courrier',['table'=>json_decode(json_encode($Liste->id),true)])}}
                            @endif
                                ">
                        <td>{{$Liste->date_arrive}}</td>
                        <td>{{$Liste->date_correspondance}}</td>
                        <td>{{$Liste->numero_correspondance}}</td>
                        <td>{{$Liste->expediteur}}</td>
                        <td>{{$Liste->objet}}</td>
                        <td>{{$Liste->numero_reponse}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection