@extends('chef/accueil')

@section('title', 'Cotation')
@section('content')

<h2  class="container-fluid d-flex "> MODIFIER SORTIE GEOMETRE</h2>

<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span>Chef</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span>Géomètre</span>
                <i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i>
            </a></li>
            <li><a href="#">
                <span>Modifier sortie géomètres</span>
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
                <th>Numero dossier</th>
                <th>Date travaux</th>
                <th>Liste Materiaux</th>
                <th>Observation</th>
                <th>Liste de geometre</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr class="table-row" data-href="{{route('edit.sortie-geometre',['table'=>$Liste])}} ">
                        <td>{{$Liste->numero_dossier}}</a></td>
                        <td>{{$Liste->date_travaux}}</a></td>
                        <td>{{$Liste->liste_tableteriaux}}</a></td>
                        <td>{{$Liste->observation}}</a></td>
                        <td>{{$Liste->liste_geometre}}</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$Listes->links()}}

@endsection