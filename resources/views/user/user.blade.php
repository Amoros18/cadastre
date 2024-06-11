
<h1 class="text-primary text-center"> @if($table->id)
                        Modification d'un utilisateur
                    @else
                    Ajout d'un utilisateur
                    @endif
                </h1>
<div class="card shadow" style="margin-left:200px; margin-right:200px;" >
    <div class="card-body">
        <form action="" method="POST" class="vstack gap 3 text-black">
            @csrf
            

            <div class="form-group">
                <label for="name" class="control-label" style="color: black">Nom:</label>
                <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}" required>
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="bureau" style="color: black">Bureau occupé:</label>
                    <select class="form-control " name="bureau" id="bureau"  class="form-select" required>
                        <option selected>{{old('name',$table->name)}}</option>
                        <option>Bureau des affaires generales</option>
                        <option>Bureau de contrôle</option>
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
                <label for="email" class="control-label" style="color: black">Email:</label>
                <input type="email" name="email" class="form-control " required>
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label" style="color: black">Mot de passe:</label>
                <input type="password" name="password" class="form-control " required>
                @error('password')
                    <span class="text-danger" role="alert">
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    </span> 
                @enderror
            </div>
            <center class="mt-1">
            <button class="btn btn-success mt-3 w-100" type="submit" >
                    @if($table->id)
                        Valider
                    @else
                        Enregistrer
                    @endif
                </button >
            </center>
            
        </form>
    </div>
   
</div>

