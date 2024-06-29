
<h1 class="text-primary text-center">
    @if ($table->id)
    <div class="row">
        <div class="col">
            <p class="text-center text-white">Editer une nature de dossier</p>
        </div>
    </div>
    @else
        
    <div class="row">
        <div class="col">
            <p class="text-center text-white">Enregistrer une nature de dossier</p>
        </div>
    </div>
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire" enctype="multipart/form-data" method="POST">
        @csrf


        <div class="row mt-1">
            <label for="prenom" class="label col-md-2 control-label">Nature du dossier:</label>
            <div class="col-md-10">
                <input type="text" name="nature" class="form-control" value="{{old('nature',$table->nature)}}">
                @error("nature")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>  
    
        <div class="mt-1 text-end">
            <button class="btn btn-success w-25" type="submit" >
            @if($table->id)
                Modifier
            @else
                Enregistrer
            @endif
            </button >
        </div>
    </form>
</div>