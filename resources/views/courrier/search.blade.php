    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="button-div">
                <a class="navbar-brand" >Filtrage de donnees</a>
                <button id="bouton-affiche-masquer-recherche" class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div  id="recherche" class=" ">
                <form action="" method="POST">
                    @csrf
                    <div class="row mt-1">
                        <div class="col-md">
                            <label for="" class="label control-label">Numero Correspondance:</label>
                            <input type="text" name="numero_correspondance" class="text" value="{{old('numero_correspondance',$numero_correspondance)}}">    
                        </div>
                        <div class="col-md">
                            <label for="" class="label control-label">Expediteur:</label>
                            <input type="text" name="expediteur" class="text" value="{{old('expediteur',$expediteur)}}">        
                        </div>
                        <div class="col-md">
                            <label for="date_less" class="label control-label">Date Arrive Fin:</label>
                            <input type="date" name="date_less" class="text" value="{{old('date_less',$date_less)}}">    
                        </div>
                        <div class="col-md">
                            <label for="date_more" class="label control-label">Date Arrive Debut:</label>
                            <input type="date" name="date_more" class="text" value="{{old('date_more', $date_more)}}">        
                        </div>
                        <div class="col-md">
                            <label for="" class="label control-label">Numero Reponse:</label>
                            <input type="text" name="numero_reponse" class="text" value="{{old('numero_reponse', $numero_reponse)}}">        
                        </div>
                    </div>
                    <div style="height: 10px"></div>
                    <div class="text-center">
                        </button > <input type="submit" class="btn btn-primary" value="Recherche"><br><br></center>
                    </div>
                </form>         
            </div>
        </div>    
    </nav>
