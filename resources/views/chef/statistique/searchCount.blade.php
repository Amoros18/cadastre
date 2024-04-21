<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <div class="button-div">
            <a class="navbar-brand" >Filtrage</a>
            <button id="bouton-affiche-masquer-recherche" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div  id="recherche" class="">
            <form action="" method="POST">
                @csrf
                <div class="row mt-1">
                    <div class="col-md">
                        <label for="date_exact" class="label col-3 control-label">Date Exact:</label>
                        <input type="date" name="date_exact" class="text" value="{{old('date_exact',$date_exact)}}">    
                    </div>
                    <div class="col-md">
                        <label for="date_more" class="label col-3 control-label">Date Debut:</label>
                        <input type="date" name="date_more" class="text" value="{{old('date_more', $date_more)}}">        
                    </div>
                    <div class="col-md">
                        <label for="date_less" class="label col-3 control-label">Date Fin:</label>
                        <input type="date" name="date_less" class="text" value="{{old('date_less',$date_less)}}">    
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md">
                        <label for="nature_dossier" class="label col-3 control-label">Nature dossier:</label>
                        <input type="text" name="nature_dossier" class="text" value="{{old('nature_dossier',$nature_dossier)}}">        
                    </div>
                    <div class="col-md">
                        <label for="nom_requerant" class="label col-3 control-label">Nom Requerant:</label>
                        <input type="text" name="nom_requerant" class="text" value="{{old('nom_requerant',$nom_requerant)}}">            
                    </div>
                    <div class="col-md">
                        <label for="arrondissement" class="label col-3">Arrondissemet</label>
                        <input type="text" name="arrondissement" class="text" value="{{old('arrondissemet',$arrondissement)}}">
                    </div>
                </div>
                <div class="space-top"></div>
                <div class="text-center">
                    </button > <input type="submit" class="btn btn-primary" value="Filtre"><br><br></center>
                </div>
            </form>         
        </div>
    </div>    
</nav>
