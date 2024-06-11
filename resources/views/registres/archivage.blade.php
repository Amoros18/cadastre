@extends('chef/accueil')

@section('title', 'Registre MJ')

@section('content')
<!-- @include('registres.search') -->
    
<h1 class="text-primary text-center">Registre d'Archivage</h1>
<div class="container card shadow">


        <div class="col-md-5" style="margin: 15px">
            <a href="{{route('registre.archivage_pdf',[
                'nature_dossier'=>$nature_dossier,
                'arrondissement'=>$arrondissement,
                'date_less'=>$date_less,
                'date_more'=>$date_more,
                ])}}" class="btn btn-primary">Convertir en pdf</a>
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