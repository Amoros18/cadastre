<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Accueil</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EDJE'L</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href = "{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Acceuil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href = "{{route('statistique')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Statistiques</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href = "{{route('liste.visa')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Viser un document</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href = "{{route('liste.courrier',['modifier'=>0])}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Consulter un courier</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>UTILISATEURS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href = "{{route('create.user')}}">Ajouter utilisateur</a>
                        <a class="collapse-item" href = "{{route('visualiser.liste-user',['modifier'=>1])}}">Modifier utilisateur</a>
                    </div>
                </div>
            </li>
            
             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDossiers"
                    aria-expanded="true" aria-controls="collapseDossiers">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DOSSIERS</span>
                </a>
                <div id="collapseDossiers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('liste.cotation')}}">Coter un dossier</a>
                        <a class="collapse-item" href = "{{route('liste.dossier')}}">Consulter un dossier</a>
                        <a class="collapse-item" href = "{{route('liste.affectation')}}">Affecter numero de dossier</a>
                        <a class="collapse-item" href = "{{route('liste.affectation',['modifier'=>1])}}">Modifier numéro de dossier</a>
                    </div>
                </div>
            </li>
             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsBMJ"
                    aria-expanded="true" aria-controls="collapsBMJ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>BMJ</span>
                </a>
                <div id="collapsBMJ" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.mj')}}">Mises à jour</a>
                        <a class="collapse-item" href = "{{route('registre.rejet_bmj')}}">Rejets mises à jour</a>
                        <a class="collapse-item" href = "{{route('liste.mj',['modifier'=>1])}}">Modifier mise à jour</a>
                        <a class="collapse-item" href = "{{route('liste.mj-rejet',['modifier'=>1])}}">Modifier rejet mise à jour</a>
                    </div>
                </div>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsBAG"
                    aria-expanded="true" aria-controls="collapsBAG">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>BAG</span>
                </a>
                <div id="collapsBAG" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.transmis_delegue')}}">Transmission délégué</a>
                        <a class="collapse-item" href = "{{route('registre.rattachement')}}"> Rattachement</a>
                        <a class="collapse-item" href = "{{route('liste.ouverture-dossier',['modifier'=>1])}}">Modifier Ouverture dossier</a>
                        <a class="collapse-item" href = "{{route('liste.recette',['modifier'=>1])}}">Modifier recettes </a>
                        <a class="collapse-item" href = "{{route('liste.rattachement',['modifier'=>1])}}">Modifier Rattachement</a>
                        <a class="collapse-item" href = "{{route('liste.decision',['modifier'=>1])}}"> Modifier Décision</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRPropres"
                    aria-expanded="true" aria-controls="collapseRPropres">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>REGISTRES PROPRES </span>
                </a>
                <div id="collapseRPropres" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.visa')}}"> Registre Visa</a>
                        <a class="collapse-item" href = "{{route('registre.non_cote')}}"> Dossiers non cotés</a>
                        <a class="collapse-item" href = "{{route('registre.courrier')}}"> Registre de courrier</a>
                        <a class="collapse-item" href = "{{route('registre.dossier_recu')}}"> Registre dossiers reçus </a>
                        <a class="collapse-item" href = "{{route('liste.cotation',['modifier'=>1])}}"> Modifier cotations</a>
                        <a class="collapse-item" href = "{{route('liste.visa',['modifier'=>1])}}"> Modifier Registre Visa</a>
                        <a class="collapse-item" href = "{{route('liste.courrier',['modifier'=>1])}}"> Modifier le courrier</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRArchives"
                    aria-expanded="true" aria-controls="collapseRArchives">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>REGISTRES ARCHIVAGE </span>
                </a>
                <div id="collapseRArchives" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.archivage')}}">Registre Archivage </a>
                        <a class="collapse-item" href = "{{route('liste.archivage',['modifier'=>1])}}">Modifier Archivage </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGeometres"
                    aria-expanded="true" aria-controls="collapseGeometres">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>GEOMETRES </span>
                </a>
                <div id="collapseGeometres" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.ccp')}}">Registre ccp</a>
                        <a class="collapse-item" href = "{{route('registre.main_courante')}}"> Registre Main Courante</a>
                        <a class="collapse-item" href = "{{route('liste.ccp',['modifier'=>1])}}">Modifier CCP</a>
                        <a class="collapse-item" href = "{{route('liste.main-courante',['modifier'=>1])}}">Modifier Main Courante </a>
                        <a class="collapse-item" href = "{{route('liste.sortie-geometre',['modifier'=>1])}}">Modifier sortis géomètres </a>
                        <a class="collapse-item" href = "{{route('liste.points-modif',['modifier'=>1])}}"> Modifier les points</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContrôle"
                    aria-expanded="true" aria-controls="collapseContrôle">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>BUREAU DE CONTROLE </span>
                </a>
                <div id="collapseContrôle" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href = "{{route('registre.controle')}}">Registre Contrôle</a>
                        <a class="collapse-item" href = "{{route('registre.rejet_bc')}}">Registre Rejet Contrôle</a>
                        <a class="collapse-item" href = "{{route('liste.controle1',['modifier'=>1])}}">Modifier Contrôle 1 </a>
                        <a class="collapse-item" href = "{{route('liste.controle2',['modifier'=>1])}}">Modifier Contrôle 2 </a>
                        <a class="collapse-item" href = "{{route('liste.controle-rejet',['modifier'=>1])}}">Modifier Rejet Contrôle</a>
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
        
        <button class="btn btn-primary" type="submit">Se deconnecter</button>
      </form>
 
    @endauth
  </div>
<!-- </nav> -->
<!-- <form class="d-flex" action="{{route('auth.logout')}}" method="POST" style="float: right; margin: 15px">
        @method("delete")
        @csrf
        <ul>
    <a href="{{route('home')}}">Accueil</a>
    <a href="{{route('user.chef')}}" style="margin: 60px"> Statistiques </a>
   </ul> 
        <button class="btn btn-primary" type="submit" >Se deconnecter</button>
      </form> -->
</nav>
<div>
@yield('content')
</div>

        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
       
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>