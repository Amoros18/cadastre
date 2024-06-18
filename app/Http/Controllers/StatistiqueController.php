<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\NouveauDossier;
use App\Models\Courrier;
use App\Models\Archivage;

class StatistiqueController extends Controller
{
    public function searchCount(Request $request){
        if ($request->input('nature_dossier')){
            $nature_dossier =$request->input('nature_dossier');
        }
        else{
            $nature_dossier = null;
        }
        if($request->input('date_less')){
            $date_less = $request->input('date_less');
        }
        else{
            $date_less = null;
        }
        if($request->input('date_more')){
            $date_more = $request->input('date_more');
        }
        else{
            $date_more = null;
        }
        if ($request->input('date_exact')){
            $date_exact = $request->input('date_exact');
        }
        else {
            $date_exact = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }
        if ($request->input('arrondissement')){
            $arrondissement = $request->input('arrondissement');
        }
        else {
            $arrondissement = null;
        }

        $table = DB::table('nouveau_dossiers');
        $table2 = DB::table('nouveau_dossiers');

        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
            $table2 = $table2->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->whereDate('created_at','<=',$date_less);
            $table2 = $table2->whereDate('updated_at','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->whereDate('created_at','>=',$date_more);
            $table2 = $table2->whereDate('updated_at','>=',$date_more);
        }
        if ($date_exact != null){
            $table = $table->whereDate('created_at',$date_exact);
            $table2 = $table2->whereDate('updated_at',$date_exact);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
            $table2 = $table2->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
            $table2 = $table2->where('arrondissement',$arrondissement);
        }
        $update = $table;
        $update = $update->pluck('id');
        $updaoeOnly = $table2->whereNotIn('id',$update)->get();
        $table = $table->get();
        $table2 = $table2->get();
        $response = [
            'Listes'=>$table,
            'Listes2'=>$table2,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'date_exact'=>$date_exact,
            'nom_requerant'=>$nom_requerant,
            'arrondissement'=>$arrondissement,
        ];
        return $response;
    }

    public function general(Request $request){
        $Listes = $this->searchCount($request);
        $nombre_craete =$Listes['Listes']->count(); 
        $nombre_update =$Listes['Listes2']->count(); 
        return view('chef.statistique.statistique',[
            'Listes'=>$Listes['Listes'],   // create
            'Listes2'=>$Listes['Listes2'],  // update
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'date_exact'=>$Listes['date_exact'],
            'nature_dossier'=>$Listes['nature_dossier'],
            'arrondissement'=>$Listes['arrondissement'],
            'nombre_create'=>$nombre_craete,
            'nombre_update'=>$nombre_update,
        ]);
    }

    public function statistique(Request $request){
        $date_debut = '';
        $date_fin = '';

        if($request->filtrer){
            $date_debut = $request->date_debut;
            $date_fin = $request->date_fin;
            $dossiers = NouveauDossier::whereBetween('date_ouverture', [$date_debut, $date_fin])->get();

            //Nb dossier        
            $nombre_create = $dossiers->count();

            //Dossier vises
            $nb_visa = $dossiers->where('date_visa', '!=', null)->count();

            //Archivage
            $nb_arch = Archivage::all()->count();

            //Courrier
            $nb_courrier = Courrier::all()->count();

            //Nature
            $nature_count = $dossiers->where('nature_dossier', '!=', null)->groupBy('nature_dossier')->map->count();

            //Arrondissement
            $arrondissement_count = $dossiers->where('arrondissement', '!=', null)->groupBy('arrondissement')->map->count();

            //Sexe
            $sexe_count = $dossiers->where('sexe_requerant', '!=', null)->groupBy('sexe_requerant')->map->count();

            //Zone
            $zone_count = $dossiers->where('zone', '!=', null)->groupBy('zone')->map->count();

            //Geometre
            $geometre_count = $dossiers->where('geometre', '!=', null)->groupBy('geometre')->map->count();
        } else {
            $dossiers = NouveauDossier::all();

            //Nb dossier        
            $nombre_create = $dossiers->count();

            //Dossier vises
            $nb_visa = $dossiers->where('date_visa', '!=', null)->count();

            //Archivage
            $nb_arch = Archivage::all()->count();

            //Courrier
            $nb_courrier = Courrier::all()->count();

            //Nature
            $nature_count = $dossiers->where('nature_dossier', '!=', null)->groupBy('nature_dossier')->map->count();

            //Arrondissement
            $arrondissement_count = $dossiers->where('arrondissement', '!=', null)->groupBy('arrondissement')->map->count();

            //Sexe
            $sexe_count = $dossiers->where('sexe_requerant', '!=', null)->groupBy('sexe_requerant')->map->count();

            //Zone
            $zone_count = $dossiers->where('zone', '!=', null)->groupBy('zone')->map->count();

            //Geometre
            $geometre_count = $dossiers->where('geometre', '!=', null)->groupBy('geometre')->map->count();
        }
        //Return view
        return view('chef.statistique.statistique',[
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'nombre_create' => $nombre_create,
            'nb_visa' => $nb_visa,
            'nb_arch' => $nb_arch,
            'nb_courrier' => $nb_courrier,
            'natures' => $nature_count,
            'arrondissements' => $arrondissement_count,
            'sexes' => $sexe_count,
            'geometres' => $geometre_count,
            'zones' => $zone_count,
        ]);
    }
}
