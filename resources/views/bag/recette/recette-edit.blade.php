@extends('chef/accueil')

@section('title', 'Ancien dossier')

@section('content')
    @include('info-ouverture')
    @include('bag.recette.recette')
@endsection