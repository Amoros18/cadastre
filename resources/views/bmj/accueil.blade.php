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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    
    <link rel="stylesheet" href="{{asset('css/dataTables.css')}}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to top, #00CDAC, #02AAB0)">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: " href = "{{route('home')}}">
                
                <div class="sidebar-brand-text mx-3">EDJE'L</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href = "{{route('home')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>ACCUEIL</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href = "{{route('liste.mj-intro')}}">
                    <i class="fas fa-fw fa-stop"></i>
                    <span>REGISTRE MISE A JOUR</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link"  href = "{{route('liste.mj-intro-rejet')}}">
                    <i class="fas fa-fw fa-stop"></i>
                    <span>REJETER UN DOSSIER</span></a>
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
        
        <button class="btn btn-primary" type="submit" style="background: linear-gradient(to right, #00CDAC, #02AAB0)">Se deconnecter</button>
      </form>
 
    @endauth
  </div>

</nav>
<div>
@yield('content')
</div>

        </div>
            <!-- End of main Content -->

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
    <script>
                        $(document).ready(function(){
                            $(".table-row").click(function(){
                                window.location=$(this).data("href");
                            });
                        });
                    </script>

<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
                    <script src="{{asset('js/dataTables.js')}}"></script>
                    <script>
                        $(document).ready( function () {
                        $('#table').DataTable();
                        } );
                    </script>
</body>

</html>