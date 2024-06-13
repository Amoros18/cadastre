<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NouveauDossier;

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

    //Liste des statistiques
    public function statistique(Request $request){
        return view('chef.statistique.statistique');
    }

    //Statistiques generales
    public function general(Request $request){
        $date_debut = "";
        $date_fin = "";

        if($request->recherche){
            //Nb dossier
            $dossier = NouveauDossier::whereBetween('date_ouverture', [$request->date_debut, $request->date_fin])->get();
            $nombre_create = $dossier->count();

            //Nature
            $nature = NouveauDossier::select('nature_dossier')->whereBetween('date_ouverture', [$request->date_debut, $request->date_fin])->get();
            $nature_count = $nature->groupBy('nature_dossier')->map->count();

            //Arrondissement
            $arrondissement = NouveauDossier::select('arrondissement')->whereBetween('date_ouverture', [$request->date_debut, $request->date_fin])->get();
            $arrondissement_count = $arrondissement->groupBy('arrondissement')->map->count();

            //Sexe
            $sexe = NouveauDossier::select('sexe_requerant')->whereBetween('date_ouverture', [$request->date_debut, $request->date_fin])->get();
            $sexe_count = $sexe->groupBy('sexe_requerant')->map->count();
            
            //Dates
            $date_debut = $request->date_debut;
            $date_fin = $request->date_fin;
        } else {
            //Nb dossier
            $Listes = $this->searchCount($request);
            $nombre_create =$Listes['Listes']->count();

            //Nature
            $nature = NouveauDossier::select('nature_dossier')->get();
            $nature_count = $nature->groupBy('nature_dossier')->map->count();

            //Arrondissement
            $arrondissement = NouveauDossier::select('arrondissement')->get();
            $arrondissement_count = $arrondissement->groupBy('arrondissement')->map->count();

            //Sexe
            $sexe = NouveauDossier::select('sexe_requerant')->get();
            $sexe_count = $sexe->groupBy('sexe_requerant')->map->count();
        }

        //Return view
        return view('chef.statistique.general',[
            'nombre_create' => $nombre_create,
            'natures' => $nature_count,
            'arrondissements' => $arrondissement_count,
            'sexes' => $sexe_count,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin
        ]);
    }

    //Cotation par geometre
    public function cotation(){
        $geometre = NouveauDossier::select('geometre')->get();
        $geometre_count = $geometre->groupBy('geometre')->map->count();

        $nombre_create = NouveauDossier::all()->count();

        return view('chef.statistique.cotation',[
            'nombre_create'=>$nombre_create,
            'geometres' => $geometre_count,
        ]);
    }
}
