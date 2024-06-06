@extends('base')

@section('title', 'Statistique')

@section('content')
    <div class="card">
        @include('chef.statistique.searchCount')
    </div>

    <div class="container-fluid">
        <h4 class="text-center">Nombre de total de dossiers: {{$nombre_create}}</h4>

        <div class="container-fluid mt-3">
            <h3>Statistique par nature de dossier</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Nature de dossier</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($natures as $nature => $count)
                        <tr>
                            @if(empty($nature))
                                <td>Non defini</td>
                            @else
                                <td>{{ $nature }}</td>
                            @endif
                            <td>{{ $count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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