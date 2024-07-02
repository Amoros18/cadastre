<div class="container-fluid card">
    <div id= "Rattach" class=" container-fluid card-header shadow">
        <h1 class="text-center" style="color: white">Informations de la nature</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire" enctype="multipart/form-data" method="POST">
        @csrf


        <div class="form-group">
            <label for="nature" class="control-label" style="color: black;">Nature du dossier:</label>
            <input type="text" name="nature" required placeholder="Entrez la nature du dossier" class="form-control" value="{{old('nature',$table->nature)}}">
            @error("nature")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>  
    
        <div class="row">
            <button class="btn btn-success w-100" type="submit" >
            @if($table->id)
                Valider
            @else
                Enregistrer
            @endif
            </button >
        </div>
    </form>
</div>