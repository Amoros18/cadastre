@extends('base')

@section('title', 'Statistique')

@section('content')
    <!-- <div class="card"> -->
        <!-- @include('chef.statistique.searchCount') -->
    <!-- </div> -->

    <div class="container-fluid">
        <h4 class="text-center">Nombre de total de dossiers: {{$nombre_create}}</h4>

        <!-- Par nature de dossier -->
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

        <!-- Par sexe -->
        <div class="container-fluid mt-3">
            <h3>Statistique par sexe</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Sexe du requerant</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sexes as $sexe => $count)
                        <tr>
                            @if(empty($sexe))
                                <td>Non defini</td>
                            @else
                                <td>{{ $sexe }}</td>
                            @endif
                            <td>{{ $count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Par arrondissement -->
        <div class="container-fluid mt-3">
            <h3>Statistique par arrondissement</h3>
            <table class="table bg-dark">
                <thead>
                    <tr>
                        <td>Arrondissement</td>
                        <td>Nombre de dossiers</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arrondissements as $arrondissement => $count)
                        <tr>
                            @if(empty($arrondissement))
                                <td>Non defini</td>
                            @else
                                <td>{{ $arrondissement }}</td>
                            @endif
                            <td>{{ $count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection