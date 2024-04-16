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
                            <label for="nature_dossier" class="label control-label">Arrondissement:</label>
                            <input type="text" name="arrondissement" class="text" value="{{old('arrondissement',$arrondissement)}}">    
                        </div>
                        <div class="col-md">
                            <label for="nature_dossier" class="label control-label">Nature dossier:</label>
                            <input type="text" name="nature_dossier" class="text" value="{{old('nature_dossier',$nature_dossier)}}">        
                        </div>
                        <div class="col-md">
                            <label for="date_less" class="label control-label">Date Fin:</label>
                            <input type="date" name="date_less" class="text" value="{{old('date_less',$date_less)}}">    
                        </div>
                        <div class="col-md">
                            <label for="date_more" class="label control-label">Date Debut:</label>
                            <input type="date" name="date_more" class="text" value="{{old('date_more', $date_more)}}">        
                        </div>
                    </div>
                    <div class="text-center">
                        </button > <input type="submit" class="btn btn-primary" value="Recherche"><br><br></center>
                    </div>
                </form>         
            </div>
        </div>    
    </nav>
