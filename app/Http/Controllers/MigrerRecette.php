<?php

namespace App\Http\Controllers;

use App\Models\NouveauDossier;
use App\Models\Quittances;
use Illuminate\Http\Request;

class MigrerRecette extends Controller
{ 
    /*    ******
     Cette fonction est la pour permettre la migration efficace des donnees 
    
     *****         */
    
    public function migrer(){
        $oldRecettes = NouveauDossier::all();
        foreach($oldRecettes as $oldRecette){
            $newRecette = new Quittances();
            $newRecette->nouveau_dossier_id = $oldRecette->id;
            $newRecette->montant_recette = $oldRecette->montant_recette;
            $newRecette->cumule = $oldRecette->cumule;
            $newRecette->superficie_recette = $oldRecette->superficie_recette;
            $newRecette->date_cession = $oldRecette->date_cession;
            $newRecette->numero_quittance = $oldRecette->numero_quittance;
            $newRecette->date_quittance = $oldRecette->date_quittance;
            $newRecette->observation_recette = $oldRecette->observation_recette;
            $newRecette->save();
        }
    }
}
