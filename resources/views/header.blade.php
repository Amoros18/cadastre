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
</head>

<header>
<nav class="navbar navbar-expand-sm">
  <div class="container-fluid row d-flex p=0 m-0">
    <a class="navbar-brand col-3 border-end border-grey border-2 text-decoration-none" href="/" id="brand">Edje'el</a>
    @auth
    <div class="container-fluid col-7 d-flex justify-content-start">
        <span class="ms-0">Bienvenue, {{Auth::user()->name}}</span>
    </div>
    <div class="container-fluid col-2">
        <form class="d-flex justify-content-end" action="{{route('auth.logout')}}" method="POST">
            @method("delete")
            @csrf
            <button class="btn text-white" id="logout">Se deconnecter</button>
        </form>
    </div>
    @endauth
  </div>
</nav>
</header>