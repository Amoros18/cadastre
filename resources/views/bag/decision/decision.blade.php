
<div class="container-fluid card">
    <div id= "Rattach" class=" container-fluid card-header shadow">
    <h1 class="text-center" style="color: white">Informations de le décision</h1>
    </div>

<div class="container-fluid card-body shadow">
    <form id="formulaire" enctype="multipart/form-data" method="POST">
        @csrf


        <div class="row">

        </div>

        <div class="row mt-1">
            <label for="prenom" class="control-label" style="color: black">Numero decision:</label>
                <input type="text" name="numero_decision" class="form-control" value="{{old('numero_decision',$table->numero_decision)}}" placeholder="Entrez le numéro de décision">
                @error("numero_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>

        <div class="row mt-1">
            <label for="age" class="control-label" style="color: black">Date decision:</label>
                <input type="date" name="date_decision" class="form-control" value="{{old('date_decision',$table->date_decision)}}">
                @error("date_decision")
                    <span class="text-danger" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
        @if ($table->lien_decision)
                <div class="row mt-1">
                    <div class="col-md-3 center bg-danger text-light">decision inscrite</div>
                </div>
                <div class="row mt-1">
                    <label for="data" class="control-label" style="color: black">Remplacer la decision:</label>
                        <input type="file" name="data" class="form-control" value="{{old('data')}}">
                        @error("data")
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>
            @else
            <div class="row mt-1">
                <label for="data" class="control-label" style="color: black">Inserer la decision:</label>
                    <input type="file" name="data" class="form-control" required value="{{old('data')}}">
                    @error("data")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    </div>
            @endif
  
    
        <center class="mt-1"><button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->id)
                Valider
            @else
                Enregistrer
            @endif
            <!-- </button > <input type="reset" class="btn btn-primary" value="Effacer"><br><br></center>
        <small class="text-left">creat by Amoros </small> -->
    </form>
</div></div>