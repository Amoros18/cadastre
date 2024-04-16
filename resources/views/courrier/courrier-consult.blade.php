@extends('base')

@section('title', 'Modifier')

@section('content')

<div class="container-fluid">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="bg-primary">
                <h5 class="text-center">Information du Courrier</h5>
            </div>
            <div class="row mt-1">
                <label for="numero_ccp" class="label col-md-2 control-label">Expediteur:</label>
                <div class="col-md-10">
                    <input type="text" name="expediteur" class="form-control" value="{{old('expediteur',$table->expediteur)}}">
                    @error("expediteur")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
            <div class="row mt-1">
                <label for="dao" class="label col-md-2 control-label">Date D'Arriver:</label>
                <div class="col-md-5">
                    <input type="date" name="date_arrive" class="form-control" value="{{old('date_arrive',$table->date_arrive)}}">
                    @error("date_arrive")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="numero_dossier" class="label col-md-2 control-label">Date Correspondance:</label>
                <div class="col-md-3">
                    <input type="date" name="date_correspondance" class="form-control" value="{{old('date_correspondance',$table->date_correspondance)}}">
                    @error("date_correspondance")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="numero_correspondance" class="label col-md-2 control-label">Numero Correspondance:</label>
                <div class="col-md-5">
                    <input type="text" name="numero_correspondance" class="form-control" value="{{old('numero_correspondance',$table->numero_correspondance)}}">
                    @error("numero_correspondance")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <label for="numero_reponse" class="label col-md-2 control-label">Numero Reponse:</label>
                <div class="col-md-3">
                    <input type="text" name="numero_reponse" class="form-control" value="{{old('numero_reponse',$table->numero_reponse)}}">
                    @error("numero_reponse")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <label for="objet" class="label col-md-2 control-label">Objet: </label>
                <div class="col-md-5">
                    <input type="text" name="objet" class="form-control" value="{{old('objet',$table->objet)}}">
                    @error("objet")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if ($table->image)
                <div class="row mt-1">
                    <div class="col-md-3 center bg-danger text-light">Scanne deja introduit</div>
                </div>
                <div class="row mt-1">
                </div>
            @else
                <label for="data" class="label col-md-4 control-label">Scanne non inscrit:</label>
                </div>
            @endif

        </div>
        <small class="text-left">creat by Amoros </small>

    </form>
</div>
@endsection