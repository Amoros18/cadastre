@extends('bag/accueil')

@section('title', 'Rattachement')
@section('content')
<!-- @include('search') -->
<h2  class="container-fluid d-flex ">REGISTRE RATTACHEMENT</h2>
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
         <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li ><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('create.ouverture-dossier')}}"><span >BAG</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span>Registres</span>
                <i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i>
            </a></li>
            <li><a href="#">
                Rattachement
            </a></li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>
<div class="container-fluid">
    <div class="container-fluid card-header shadow" style="background: linear-gradient(to left, #7F00FF, #E100FF)">
        <h1 class=" text-center" style="color: white">Choisir un dossier</h1>
    </div>
    <div class="table-responsive card-body shadow">
    <table id="table" class="table table-hover table-responsible table-striped">
            <thead style="color: black">
                <th>Requerant</th>
                <th>Sexe</th>
                <th>Nature dossier</th>
                <th>Téléphone</th>
                <th>Zone</th>
                <th>Lieu dit</th>
                <th>Quartier</th>
                <th>Mappe</th>
                <th>Bloc</th>
                <th>Lot</th>
                <th>Numero feuille</th>
                <th>Date ouverture</th>
                <th>Géometre</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                <tr class="table-row" data-href="@if ($modifier ==1)
                                {{route('edit.rattachement',['table'=>json_decode(json_encode($Liste->id),true)])}}  
                            @else
                                {{route('create.rattachement',['table'=>json_decode(json_encode($Liste->id),true)])}}
                            @endif
                            ">
                        <td>{{$Liste->nom_requerant}}</td>
                        <td>{{$Liste->sexe_requerant}}</td>
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