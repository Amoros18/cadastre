<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
    <script defer src="{{asset('welcome.js')}}"></script>
</head>

<header>
    <nav id="1" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <div class="site-logo">
                <a href="/" rel="home">
                    <img src="{{asset('favicon.ico')}}" alt="LOGO" width="50" height="50" class="header image is-logo-image lazy loaded">
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <div id="menu0" class="dropdown">
                        <button id="bouton-affiche-masquer" class="btn btn-secondary dropdown-toggle" >
                            Service
                        </button>
                        <div id="deroulante" class="">
                            <a class="dropdown-item " href="{{route('user.chef')}}">CHEF</a>
                            <a class="dropdown-item" href="{{route('user.bag')}}">BAG</a>
                            <a class="dropdown-item" href="{{route('user.bc')}}">BC</a>    
                        </div>
                    </div>
                </ul>
                <div class="navbar-nav ms-auto">
                    @auth
                        <button class="btn btn-medium">{{Auth::user()->name}}</button>
                        <form class="nav-item" action="{{route('auth.logout')}}" method="POST">
                            @method("delete")
                            @csrf
                            <button class="btn btn-black">se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <div class="nav-item">
                            <a href="{{route('auth.login')}}">se connecter</a>
                        </div>
                    @endguest
                </div>
            </div>  
        </div>
    </nav>
</header>

<body>

<section id="billboard" class="padding-large no-padding-top position-relative">
  <div class="image-holder">
    <img src="{{asset('fond.jpg')}}" alt="banner" class="banner-image rounded img-fluid img-thumbnail background-size: cover">
    <div class="banner-content style2 text-center">
      <div class="row mt-1 banner-content">
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.chef')}}">CHEF</a>
          </div>
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.bag')}}">BAG</a>
          </div>
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.bmj')}}">BMJ</a>
          </div>
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.bc')}}">BC</a>
          </div>
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.geometre')}}">GEOMETRE</a>
          </div>
          <div class="col-mt-1">
              <a class="btn btn-medium btn-new btn-content" href = "{{route('user.archivage')}}">ARCHIVAGE</a>
          </div>
          <div class="col-mt-1">
            <a class="btn btn-medium btn-new btn-content" href = "{{route('user.ancien-dossier')}}">Ancien Dossier</a>
        </div>
      </div>
    </div>

  </div>
</section>

<footer id="footer" class="overflow-hidden">
    <div class="container mt-5">
        <div class="row">
            <div class="footer-top-area">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-menu menu-001">
                            <h5 class="widget-title">INFORMATION UTILE</h5>
                                <p>Ceci un une plateforme pour l'enregistre des dossiers du Cadastre. Si vous avez des suggesstion d'amelioration veuillez
                                 entrer votre adresse e-mail.</p>
                        <div class="newsletter-button d-flex flex-wrap align-items-center justify-content-between border-bottom widget-menu">
                            <input type="text" name="Subscribe" placeholder="Enter your email address...">
                            <a href="#">
                                <i class="icon icon-send"></i>
                            </a>
                        </div>
                    <div class="social-links">
                        <ul class="d-flex list-unstyled">
                        <li>
                          <a href="#">
                            <i class="icon icon-facebook"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icon icon-twitter"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icon icon-instagram1"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icon icon-youtube"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="icon icon-behance"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                  <div class="footer-menu menu-002">
                    <h5 class="widget-title">Lien Rapide</h5>
                    <ul class="menu-list list-unstyled text-uppercase">
                      <li class="menu-item">
                        <a href="#">Home</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">Consulter dossier</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">Ouverture Dossier</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">BAG</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">CHEF</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="footer-menu text-uppercase menu-003">
                    <h5 class="widget-title">AIDE</h5>
                    <ul class="menu-list list-unstyled">
                      <li class="menu-item">
                        <a href="#">-</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">-</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">-</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">Contacter nous</a>
                      </li>
                      <li class="menu-item">
                        <a href="#">Faqs</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="footer-menu contact-item menu-004">
                    <h5 class="widget-title">Contacter Nous</h5>
                    <p>Aviez-vous des suggestions? <a href="mailto:">noukelois18@gmail.com</a>
                    </p>
                    <p>Vous aviez besoin d'assistance? contacter nous. <a href="">+236 52 51 76 10</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </footer>
    


    
     <script type="text/javascript" src="{{asset('javascript/cache.js')}}"></script>
    
  <!--  <div id="loading" style="background-image: url('{{asset('fond.jpg')}}'); background-repeat: no-repeat;background-position: center;background-size: cover">
  -->  <div class="container d-flex">

            </div>    
        
</body>
</html>