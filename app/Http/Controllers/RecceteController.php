<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecceteEditRequest;
use App\Http\Requests\RecetteRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\Quittances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecceteController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    public function searchQuittance(Request $request){
        if ($request->input('numero_quittance')){
            $numero_quittance =$request->input('numero_quittance');
        }
        else{
            $numero_quittance = null;
        }
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
        if ($request->input('arrondissement')){
            $arrondissement = $request->input('arrondissement');
        }
        else {
            $arrondissement = null;
        }
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
        }
        else{
            $numero_dossier = null;
        }
        if($request->input('nom_requerant')){
            $nom_requerant = $request->input('nom_requerant');
        }
        else{
            $nom_requerant = null;
        }
        //$table = NouveauDossier::join('quittances','quittances.nouveau_dossier_id','=','nouveau_dossiers.id')->select('nouveau_dossiers.*','quittances.*');

        $table = Quittances::join('nouveau_dossiers','nouveau_dossiers.id','=','quittances.nouveau_dossier_id')->select('quittances.*',
        'nouveau_dossiers.numero_dossier',
        'nouveau_dossiers.nature_dossier',
        'nouveau_dossiers.date_ouverture',
        'nouveau_dossiers.arrondissement',
        'nouveau_dossiers.nom_requerant',
    );
        if ($numero_dossier != null){
            $table = $table->where('numero_dossier', 'like','%'.$numero_dossier.'%');
        }
        if ($nature_dossier != null){
            $table = $table->where('nature_dossier', 'like','%'.$nature_dossier.'%');
        }
        if ($date_less !=null){
            $table = $table->where('date_ouverture','<=',$date_less);
        }
        if ($date_more != null){
            $table = $table->where('date_ouverture','>=',$date_more);
        }
        if ($arrondissement != null){
            $table = $table->where('arrondissement',$arrondissement);
        }
        if ($nom_requerant != null){
            $table = $table->where('nom_requerant', 'like','%'.$nom_requerant.'%');
        }
        if ($numero_quittance != null){
            $table = $table->where('numero_quittance',$numero_quittance);
        }
        //$table = $table->get();
        //dd($table->get());
        $response = [
            'Listes'=>$table,
            'numero_dossier'=>$numero_dossier,
            'nature_dossier'=>$nature_dossier,
            'date_less'=>$date_less,
            'date_more'=>$date_more,
            'arrondissement'=>$arrondissement,
            'nom_requerant'=>$nom_requerant,
        ];
        return $response;
        
    }
    // recette
    public function listRecette(Request $request){
        $Listes = $this->searchQuittance($request);

      //  $Listes = Quittances::join('nouveau_dossiers','nouveau_dossiers.id','=','quittances.nouveau_dossier_id')
      //  ->select('quittances.*','nouveau_dossiers.*')->paginate(25);
        //$Listes=SortiGeometre::paginate(25);
        return view('bag.recette.recette-liste',[
            'Listes'=>$Listes['Listes']->paginate(25),
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);

    }
    public function listeRecetteIntro(Request $request){
        $modifier = $request->input('modifier');
        $Listes = $this->service->searchListe($request);
        $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

        return view ('bag.recette.recette-liste-intro',[
            'Listes'=>$Listes['Listes'],
            'modifier'=>$modifier,
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }
    public function createRecette(NouveauDossier $table){
        $nouveau_dossier_id =$table->id;
        $quittance = new Quittances();
        return view('bag.recette.recette-create',[
            'table'=>$table,
            'nouveau_dossier_id'=>$nouveau_dossier_id,
            'quittance'=>$quittance,
        ]);
    }
    public function create_Recette(RecetteRequest $request){
        $table = Quittances::create($request->validated());
        return redirect()->route('create.recette',['table'=>$table->nouveau_dossier_id])->with('success',"Enregistrement effectuer avec succes");    
    }
    public function editRecette(Quittances $table){
        //$quittance = Quittances::where('numero_quittance',$table)->first();
        //dd($quittance);
        $nouveau_dossier_id = $table->nouveau_dossier_id;
        $quittance = $table;
        $table = NouveauDossier::find($nouveau_dossier_id);
        return view('bag.recette.recette-edit',[
            'table' => $table,
            'nouveau_dossier_id'=>$table->nouveau_dossier_id,
            'quittance'=>$quittance,
        ]);
    }
    public function edit_Recette(Quittances $table, RecceteEditRequest $request){
        //$quittance = Quittances::where('numero_quittance',$table)->first();
        $table->update($request->validated());
        return redirect()->route('edit.recette',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

}
