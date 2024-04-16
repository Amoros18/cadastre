@extends('base')

@section('title', 'Cotation')

@section('content')
    @include('info-ouverture')
    @include('chef.cotation.cotation')
@endsection