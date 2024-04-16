@extends('base')

@section('title', 'Registre Recette')

@section('content')
@include('registres.search')
<div class="container">
    <h3 >Generer le registre de recette</h3>
    <div class="row">
        <div class="col-md-7">
            <h4>Registre de Recette</h4>
        </div>
        <div class="col-md-5">
            <a href="{{route('registre.recette_pdf',[
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
                    <th >Lieu Dit</th>
                    <th >Nature Dossier</th>
                    <th >Montant</th>
                    <th >Zone</th>
                    <th >Superficie</th>
                    <th >Date Etat Session</th>
                    <th >Numero Quittance</th>
                    <th >Date Quittance</th>
                    <th >Observation</th>
                </tr>
            </thead>
            <body>
                @foreach($registre as $enregistrement)
                    <tr>
                        <td>{{$enregistrement->nom_requerant}}</td>
                        <td>{{$enregistrement->lieu_dit}}</td>
                        <td>{{$enregistrement->nature_dossier}}</td>
                        <td>{{$enregistrement->montant_recette}}</td>
                        <td>{{$enregistrement->zone}}</td>
                        <td>{{$enregistrement->superficie_recette}}</td>
                        <td>{{$enregistrement->date_cession}}</td>
                        <td>{{$enregistrement->numero_quittance}}</td>
                        <td>{{$enregistrement->date_quittance}}</td>
                        <td>{{$enregistrement->observation_recette}}</td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</div>


@endsection