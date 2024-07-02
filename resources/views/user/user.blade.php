
    <div class="container-fluid">
    <div class=" container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class="text-center" style="color: white"> Informations de l'utilisateur</h1>
    </div>
    <div class=" card-body shadow">
        <form action="" method="POST" class="vstack gap 3 text-black">
            @csrf

            <div class="form-group">
                <label for="name" class="control-label" style="color: black">Nom:</label>
                <input type="text" name="name" class="form-control" required minlength="3" value="{{old('name',$table->name)}}" required placeholder="Entrez le nom">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="bureau">Bureau occupé:</label>
                <select class="form-control " name="bureau" id="bureau"  class="form-select" required placeholder="Sélectionner le bureau">
                    @if(old('bureau', $table->bureau) == '')
                        <option selected hidden disabled value="">Selectionnez le bureau</option>
                    @else
                        <option selected>{{old('bureau',$table->bureau)}}</option>
                    @endif
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
                <label for="email" class="control-label" style="color: black">Email:</label>
                <input type="email" name="email" class="form-control" minlength="7" required placeholder="Entrez l'adresse mail" value="{{old('email',$table->email)}}">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="control-label" style="color: black">Mot de passe:</label>
                <input type="text" name="password" class="form-control" minlength="5" required placeholder="Entrez le mot de passe">
                @error('password')
                    <span class="text-danger" role="alert">
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    </span> 
                @enderror
            </div>
            <button class="btn btn-success mt-3 w-100" type="submit" >
                    @if($table->id)
                        Valider
                    @else
                        Enregistrer
                    @endif
                </button >
            
        </form>
    </div>
   
</div>

