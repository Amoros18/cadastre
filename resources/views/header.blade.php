<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script defer src="{{asset('welcome.js')}}"></script>
    <script defer src="{{asset('js/bootstrap.js')}}"></script>
</head>

<header>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <div class="container-fluid">
    <a class="navbar-brand text-center pe-5 border-end border-grey border-2 text-decoration-none" href="/" id="brand">Edje'l</a>
    @auth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <span class="text-white">Bienvenue, {{Auth::user()->name}}</span>
        </li>
      </ul>
      <form class="d-flex" action="{{route('auth.logout')}}" method="POST">
        @method("delete")
        @csrf
        <button class="btn btn-primary" type="button">Se deconnecter</button>
      </form>
    </div>
    @endauth
  </div>
</nav>
</header>