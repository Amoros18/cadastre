
<h1 class="text-primary text-center">
    @if ($table->id)
        Modifier Information de la decision
    @else
        Enter les information relatif a la decision
    @endif
</h1>

<div class="container-fluid">
    <form id="formulaire" enctype="multipart/form-data" method="POST">
        @csrf


        <div class="row">
            <div class="col">
                <h5 class="text-center">Entrer les informations de la decision</h5>
            </div>
        </div>

        <div class="row mt-1">
            <label for="prenom" class="label col-md-2 control-label">Numero decision:</label>
            <div class="col-md-10">
                <input type="text" required name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}">
                @error("numero_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-1">
            <label for="age" class="label col-md-2 control-label">Date decision:</label>
            <div class="col-md-10">
                <input type="date" required name="date_decision" class="form-control" value="{{old('date_decision',$table->date_decision)}}">
                @error("date_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if ($table->lien_decision)
                <div class="row mt-1">
                    <div class="col-md-3 center bg-danger text-light">decision inscrit</div>
                </div>
                <div class="row mt-1">
                    <label for="data" class="label col-md-4 control-label">Remplacer la decision:</label>
                    <div class="col-md-8">
                        <input type="file" name="data" class="form-control" value="{{old('data')}}">
                        @error("data")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @else
                <label for="data" class="label col-md-4 control-label">Insere la decision:</label>
                <div class="col-md-8">
                    <input type="file" name="data" class="form-control" required value="{{old('data')}}">
                    @error("data")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            @endif
  
    
        <center class="mt-1"><button class="btn btn-primary me-2" type="submit" >
            @if($table->id)
                Modifier
            @else
                Enregistrer
            @endif
            </button > <input type="reset" class="btn btn-primary" value="Effacer"><br><br></center>
        <small class="text-left">creat by Amoros </small>
    </form>
</div>