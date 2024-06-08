@extends('base')

@section('title', 'Cotations')

@section('content')

    <div class="container-fluid">
        <h4 class="text-center">Nombre de total de dossiers: {{$nombre_create}}</h4>
        
        <div class="container-fluid mt-3">
            <h3>Cotation par geometre</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Geometre</td>
                        <td>Cotation</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($geometres as $geometre => $count)
                        <tr>
                            @if(empty($geometre))
                                <td>Dossiers non cotés</td>
                            @else
                                <td>{{ $geometre }}</td>
                            @endif
                            <td>{{ $count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection