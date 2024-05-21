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
</head>
<style>
    body{
        background-color: #2590bb;
    }
    #formcontainer{
        margin-top: 7.8%;
    }
</style>
<body">
<div class="card border border-0 w-50 mx-auto py-5 px-5" id="formcontainer">
    <div class="container ms-1 ">
        <h3 class="text-primary">Edje'el</h3>
        <span class="text-dark">Connectez-vous !</span>
    </div>
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

            <div class="form-group mt-3">
                <label for="password" class="control-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control " value="{{old('password')}}">
                @error('password')
                    <span class="text-danger" role="alert">
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    </span> 
                @enderror
                
                <button class="btn btn-success mt-3 w-100" type="submit" >Se connecter</button>
                
            </div>
            
            
        </form>
    </div>
</div>
</body>
</html>