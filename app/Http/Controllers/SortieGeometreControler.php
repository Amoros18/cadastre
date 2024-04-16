<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortieGeometreRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\SortiGeometre;
use Illuminate\Http\Request;

class SortieGeometreControler extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function listSortieIntro(Request $request){
        $Listes = $this->service->searchListe($request);
        $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
        $Listes['Listes'] = $Listes['Listes']->where('numero_controle','=',null);
        $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);

        $sorties = SortiGeometre::all();
 /*       foreach ($sorties as $sortie){
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',$sortie->numero_dossier);
        }
   */     return view('geometre.sortie.sortie-intro-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }
    public function listSortie(){
        $Listes = SortiGeometre::join('nouveau_dossiers','nouveau_dossiers.id','=','sorti_geometres.nouveau_dossier_id')
        ->select('sorti_geometres.*','nouveau_dossiers.numero_dossier')->paginate(25);
        //$Listes=SortiGeometre::paginate(25);
        return view('geometre.sortie.sortie-liste',[
            'Listes'=>$Listes,
        ]);
    }
    public function createSortie(Request $request){
        $nouveau_dossier_id =$request->input('id');
        $table = NouveauDossier::find($nouveau_dossier_id);
        $sortie = new SortiGeometre();
        return view('geometre.sortie.sortie-create',[
            'table'=>$table,
            'nouveau_dossier_id'=>$nouveau_dossier_id,
            'sortie'=>$sortie,
        ]);
    }
    public function create_Sortie(SortieGeometreRequest $request){
        $table = SortiGeometre::create($request->validated());        
        return redirect()->route('create.sortie-geometre',['id'=>$table->nouveau_dossier_id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editSortieGeometre(SortiGeometre $table){
        $nouveau_dossier_id = $table->nouveau_dossier_id;
        $sortie = $table;
        $table = NouveauDossier::find($nouveau_dossier_id);
        return view('geometre.sortie.sortie-edit',[
            'table' => $table,
            'nouveau_dossier_id'=>$table->nouveau_dossier_id,
            'sortie'=>$sortie,
        ]);
    }
    public function edit_SortieGeometre(SortiGeometre $table, SortieGeometreRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.sortie-geometre',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
}
