<br><div class="container-fluid card p-0">
    <div class=" container-fluid card-header shadow" style="background: linear-gradient(to right, #4bc5f6, #077cab)">
    <h1 class="text-center" style="color: white">

    Numéro de dossier
</h1>
    </div>
    <div class=" card-body container-fluid shadow">
    <form id="formulaire_ancien_dossier" enctype="multipart/form-data" method="POST">
        @csrf

        <div >

            <div >
                <label for="numero_dossier" class="control-label" style="color: black">Numero du dossier:</label>
                    <input type="text" required name="numero_dossier" class="form-control" value="{{old('numero_dossier',$table->numero_dossier)}}" placeholder="Entrez le numéro de dossier">
                    @error("numero_dossier")
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
           
        

        <button class="btn btn-success mt-3 w-100" type="submit" >
            @if($table->numero_dossier)
                Valider
            @else
                Enregistrer
            @endif
            </div>

    </form>
</div>