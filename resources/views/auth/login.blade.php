@extends('base')

@section('title', 'Se connecter')

@section('content')

<h1 class="text-primary text-center">Se connecter</h1>

<div class="card">
    <div class="card-body text-black">
        <form action="" method="POST" class="vstack gap 3">
            @csrf

            <div class="form-group">
                <label for="email" class="control-label">Email:</label>
                <input type="email" name="email" class="form-control " value="{{old('email')}}">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control " value="{{old('password')}}">
                @error('password')
                    <span class="text-danger" role="alert">
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    </span> 
                @enderror
            </div>
            <center class="mt-1">
                <button class="btn btn-primary me-2" type="submit" >se connecter</button >
                <input type="reset" class="btn btn-primary" value="Effacer">
            </center>
            
        </form>
    </div>
    <small class="text-left">creat by Amoros </small>
</div>



@endsection