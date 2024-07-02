<br>
<div class="container-fluid p-0">
    <div class=" container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
        <h1 class="text-center" style="color: white">
            Informations de cotation
        </h1>
    </div>
    
    <div class=" card-body container-fluid shadow">
        <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
            @csrf

            <div>
                <label for="geometre" class="control-label">Nom du geometre:</label>
                <input type="text" required name="geometre" class="form-control" value="{{old('geometre',$table->geometre)}}" placeholder="Entrez le nom du géomètre">
                @error("geometre")
                <span class="text-danger" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>


            <button class="btn btn-success mt-3 w-100" type="submit" >
                @if($table->geometre)
                    Valider
                @else
                    Enregistrer
                @endif
            </button>
                <!-- </button > <input type="reset" class="btn btn-primary" value="Annuler"><br><br></center>
            <small class="text-left">creat by Amoros </small> -->

        </form>
    </div>
</div>       
