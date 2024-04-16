@extends('base')

@section('title', 'COURRIER')
@section('content')
@include('courrier.search')
<h1 class="text-primary text-center">Selectionner le courrier a modifier</h1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-responsible table-striped">
            <thead>
                <th>Date D'arrive</th>
                <th>Date Correspondance</th>
                <th>Numero Correspondance</th>
                <th>Expediteur</th>
                <th>Objet</th>
                <th>Numero De Reponse</th>

                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($Listes as $Liste )
                    <tr>
                        <td>{{$Liste->date_arrive}}</td>
                        <td>{{$Liste->date_correspondance}}</td>
                        <td>{{$Liste->numero_correspondance}}</td>
                        <td>{{$Liste->expediteur}}</td>
                        <td>{{$Liste->objet}}</td>
                        <td>{{$Liste->numero_reponse}}</td>

                        <td><a  href = "
                            @if ($modifier ==1)
                                {{route('edit.courrier',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                <button type="edit">Modifier</button></a></td>
    
                            @else
                                {{route('visualiser.courrier',['table'=>json_decode(json_encode($Liste->id),true)])}}
                                ">
                                <button type="edit">Visualiser</button></a></td>
                            @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection