@extends('base')

@section('title', 'Registre Courrier')

@section('content')
@include('courrier.search')
<div class="container">
    <h3 >Generer le registre de courrier</h3>
    <div class="row">
        <div class="col-md-7">
            <h4>Registre de Courrier</h4>
        </div>
        <div class="col-md-5">
            <a href="{{route('registre.courrier_pdf',[
                'numero_correspondance'=>$numero_correspondance,
                'expediteur'=>$expediteur,
                'date_less'=>$date_less,
                'date_more'=>$date_more,
                'numero_reponse'=>$numero_reponse,
                ])}}" class="btn btn-primary">Convertir en pdf</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
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