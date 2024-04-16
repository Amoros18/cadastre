@extends('base')

@section('title', 'Registre Dossier Recu')
@section('content')
@include('registres.search')
<div class="container">
    <h3 >Generer le registre dossier recu</h3>
    <div class="row">
        <div class="col-md-7">
            <h4>Registre de dossier recu</h4>
        </div>
        <div class="col-md-5">
            <a href="{{route('registre.dossier_recu_pdf',[
                'nature_dossier'=>$nature_dossier,
                'arrondissement'=>$arrondissement,
                'date_less'=>$date_less,
                'date_more'=>$date_more,
                ])}}" class="btn btn-primary">Convertir en pdf</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
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