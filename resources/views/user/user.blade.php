<h1 class="text-primary text-center"> Ajout d'un utilisateur</h1>

<div class="card">
    <div class="card-body">
        <form action="" method="POST" class="vstack gap 3 text-black">
            @csrf

            <div class="form-group">
                <label for="name" class="control-label">Nom:</label>
                <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="bureau">Bureau occuper:</label>
                    <select name="bureau" id="bureau"  class="form-select">
                        <option selected>{{old('name',$table->name)}}</option>
                        <option>Bureau des affaires generale</option>
                        <option>Bureau de controle</option>
                        <option>Bureau de mise a jour</option>
                        <option>Archivage</option>
                        <option>Bureau de geometre</option>
                    </select>
                    @error('bureau')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>                      
                    @enderror
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email:</label>
                <input type="email" name="email" class="form-control ">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Mot de passe:</label>
                <input type="password" name="password" class="form-control ">
                @error('password')
                    <span class="text-danger" role="alert">
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    </span> 
                @enderror
            </div>
            <center class="mt-1">
                <button class="btn btn-new me-2" type="submit" >
                    @if($table->id)
                        Modifier
                    @else
                        Enregistrer
                    @endif
                </button >
                <input type="reset" class="btn btn-new" value="Effacer">
            </center>
            
        </form>
    </div>
    <small class="text-left">creat by Amoros </small>
</div>

