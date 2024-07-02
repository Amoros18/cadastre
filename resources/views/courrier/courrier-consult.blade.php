@extends('chef/accueil')

@section('title', 'Modifier')

@section('content')
<!-- Breadcrumbs -->
<h2  class="container-fluid d-flex ">
    CONSULTER UN COURRIER
</h2>
<div class="container-fluid d-flex ">
    <nav aria-label="breadcrumb " class="first  d-md-flex" >
        <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
            <li><a class="black-text active-2" href="{{route('home')}}"><i class="fas fa-fw fa-solid fa-home mr-md-2 mr-1 mb-1"></i><span>Accueil</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i> </li>
            <li><a class="black-text active-2" href="{{route('statistique')}}"><span>Chef</span></a><i class="fas fa-solid fa-chevron-right mx-md-3 mx-1"></i></li>
            <li ><a class="black-text active-2  " href="#">
                <span>Consulter un courrier</span>
            </a></li>
            <!-- <li class="breadcrumb-item  mr-0 pr-0"><a class="black-text active-1 active-2" href="#"><span >Bread shape</span></a> </li> -->
        </ol>
    </nav>
</div>

<div class="container-fluid card">
    <div id= "Rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations du courrier</h1>
</div>
<div class="container-fluid card-body shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="numero_ccp" class="control-label" style="color: black;">Expediteur:</label>
            <input type="text" name="expediteur" class="form-control" readonly value="{{old('expediteur',$table->expediteur)}}">
            @error("expediteur")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        
        <div class="row">
            <div class="col-md form-group">
                <label for="dao" class="control-label" style="color: black;">Date D'Arriver:</label>
                <input type="date" name="date_arrive" class="form-control" readonly value="{{old('date_arrive',$table->date_arrive)}}">
                @error("date_arrive")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_dossier" class="control-label" style="color: black;">Date Correspondance:</label>
                <input type="date" name="date_correspondance" class="form-control" readonly value="{{old('date_correspondance',$table->date_correspondance)}}">
                @error("date_correspondance")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md form-group">
                <label for="numero_correspondance" class="control-label" style="color: black;">Numero Correspondance:</label>
                <input type="text" name="numero_correspondance" class="form-control" readonly value="{{old('numero_correspondance',$table->numero_correspondance)}}">
                @error("numero_correspondance")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md form-group">
                <label for="numero_reponse" class="control-label" style="color: black;">Numero Reponse:</label>
                <input type="text" name="numero_reponse" class="form-control" readonly value="{{old('numero_reponse',$table->numero_reponse)}}">
                @error("numero_reponse")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="objet" class="control-label" style="color: black;">Objet: </label>
            <input type="text" name="objet" class="form-control" readonly value="{{old('objet',$table->objet)}}">
            @error("objet")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        @if ($table->image)
            <div class="form-group">
                <div class="col-md-3 center bg-danger text-light">Scanne deja introduit</div>
            </div>
        @else
            <div class="form-group">
                <label for="data" class="label col-md-4 control-label">Scanne non inscrit:</label>
            </div>
        @endif

    </form>
</div>
@endsection