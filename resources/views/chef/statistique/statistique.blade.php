@extends('chef/accueil')

@section('title', 'Statistique')

@section('content')
    <div class="container-fluid d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Statistiques</h1>
    </div>
    <div class="row container-fluid">

        <!-- Dossiers ouverts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dossiers ouverts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nombre_create }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dossiers vises -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dossiers visés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nombre</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pen-fancy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dossiers archives -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Dossiers archivés</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nombre</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courriers reçus -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Courriers reçus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Nombre</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Second Row -->

    <div class="row container-fluid">
        <!-- Tableau sexe -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <a href=".sexeCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sexeCard">
                    <h6 class="m-0 font-weight-bold text-primary">Sexe requerant</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show sexeCard">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sexe</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($sexes->count() != 0)
                                        @foreach($sexes as $sexe => $count)
                                            <tr>
                                                <td>{{ $sexe }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Aucune donnée trouvée</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphe Sexe -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <a href=".sexeCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sexeCard">
                    <h6 class="m-0 font-weight-bold text-primary">Sexe requerant</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show sexeCard">
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row container-fluid">
        <!-- Tableau nature de dossier -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <a href=".natureCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="natureCard">
                    <h6 class="m-0 font-weight-bold text-primary">Nature de dossier</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show natureCard">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nature</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($natures->count() != 0)
                                        @foreach($natures as $nature => $count)
                                            <tr>
                                                <td>{{ $nature }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Aucune donnée trouvée</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphe Nature de dossier -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <a href=".natureCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="natureCard">
                    <h6 class="m-0 font-weight-bold text-primary">Nature de dossier</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show natureCard">
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row container-fluid">
        <!-- Tableau arrondissement -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <a href=".arrondCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="arrondCard">
                    <h6 class="m-0 font-weight-bold text-primary">Arrondissement</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show arrondCard">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Arrondissement/th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($arrondissements->count() != 0)
                                        @foreach($arrondissements as $arrondissement => $count)
                                            <tr>
                                                <td>{{ $arrondissement }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Aucune donnée trouvée</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphe Arrondissement -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <a href=".arrondCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="arrondCard">
                    <h6 class="m-0 font-weight-bold text-primary">Arrondissement</h6>
                </a>
                <!-- Card Body -->
                <div class="collapse show arrondCard">
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row container-fluid">
        <!-- Cotation par geometre -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cotation par géomètre</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Géomètre</th>
                                    <th>Dossiers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mahamat</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dossiers par zone -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header-->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Zone</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Zone</th>
                                    <th>Dossiers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($zones->count() != 0)
                                        @foreach($zones as $zone => $count)
                                            <tr>
                                                <td>{{ $zone }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Aucune donnée trouvée</td>
                                        </tr>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection