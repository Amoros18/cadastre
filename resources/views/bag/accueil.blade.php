<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">    
    <link rel="stylesheet" href="{{asset('css/dataTables.css')}}" />

    <style>
        #Rattach{ background: linear-gradient(to right, #E100FF, #7F00FF);}
        #info{ background: linear-gradient(to right, #E100FF, #7F00FF);}
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-pritablery sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to top, #7F00FF, #E100FF)">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: " href = "{{route('home')}}"> 
                <div class="sidebar-brand-text mx-3">EDJE'L</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href = "{{route('home')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>ACCUEIL</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href = "{{route('create.ouverture-dossier')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>OUVERTURE DOSSIER</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link"  href = "{{route('create.decision')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>INSERER DECISION</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href = "{{route('create.courrier')}}">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>INSERER COURRIER</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href = "{{route('create.nature')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>INSERER NATURE</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>AJOUTER COLLEGUE</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href = "{{route('create.employer.geometre')}}">Ajouter géomètre</a>
                        <a class="collapse-item" href = "{{route('create.employer.dao')}}">Ajouter DAO</a>
                        <a class="collapse-item" href = "{{route('create.employer.controlleur')}}">Ajouter contrôleur</a>
                    </div>
                </div>
            </li>
            
             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsBMJ"
                    aria-expanded="true" aria-controls="collapsBMJ">
                    <i class="fas fa-fw fa-users"></i>
                    <span>LISTE COLLEGUES</span>
                </a>
                <div id="collapsBMJ" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('visualiser.liste-geometre')}}">Géometres</a>
                        <a class="collapse-item" href = "{{route('visualiser.liste-dao')}}">DAO</a>
                        <a class="collapse-item" href = "{{route('visualiser.liste-controlleur')}}">Contrôleurs</a>
                    </div>
                </div>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDossiers"
                    aria-expanded="true" aria-controls="collapseDossiers">
                    <i class="fas fa-fw fa-book"></i>
                    <span>REGISTRES</span>
                </a>
                <div id="collapseDossiers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('liste.recette-intro')}}">Recettes</a>
                        <a class="collapse-item" href = "{{route('liste.rattachement-intro')}}">Rattachements</a>
                    </div>
                </div>
            </li>
            
             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsBAG" aria-expanded="true" aria-controls="collapsBAG">
                    <i class="fas fa-fw fa-stop"></i>
                    <span>TRANSMISSION DOSSIER</span>
                </a>
                <div id="collapsBAG" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('transmission.delegue.liste-intro')}}">Transmission délégué</a>
                        <a class="collapse-item" href = "{{route('liste.recette-intro')}}">Transmission conservatoire</a>
                        <a class="collapse-item" href = "{{route('liste.rattachement')}}">Transmission archivage</a>
                       
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRPropres"
                    aria-expanded="true" aria-controls="collapseRPropres">
                    <i class="fas fa-fw fa-stop"></i>
                    <span>RECEPTION DOSSIER</span>
                </a>
                <div id="collapseRPropres" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('transmission.delegue.liste')}}"> Reception délégué</a>
                        <a class="collapse-item" href = "{{route('liste.recette-intro')}}"> Reception concervatoire</a>
                        <a class="collapse-item" href = "{{route('liste.rattachement')}}"> Reception archivage</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                <!-- <nav class="navbar navbar-dark  navbar-expand-sm"> -->
                <div class="container-fluid">
                <span class="text-blue nav-item" style="margin: 15px">Bienvenue {{Auth::user()->name}}</span>
                    @auth
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex" action="{{route('auth.logout')}}" method="POST" style="float: right; margin: 15px">
                        @method("delete")
                        @csrf
                        
                        <button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #E100FF, #7F00FF)">Se deconnecter</button>
                    </form>
                    @endauth
                </div>

                </nav>
                
                <!-- Page content -->
                <div>
                @yield('content')
                </div>

            </div>
            <!-- End of margin Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/dataTables.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/tables.js')}}"></script>
    
</body>

</html>