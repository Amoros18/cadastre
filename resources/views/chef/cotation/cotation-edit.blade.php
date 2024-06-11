@extends('chef/accueil')

@section('title', 'Cotation')

@section('content')
    @include('info-ouverture')
    @include('chef.cotation.cotation')
@endsection