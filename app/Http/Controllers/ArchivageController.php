<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchivageRequest;
use App\Http\Services\SearchService;
use App\Models\Archivage;
use App\Models\NouveauDossier;
use Illuminate\Http\Request;

class ArchivageController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    public function listArchivageIntro(Request $request){
        $Listes = $this->service->searchRejet($request);
        $Listes['Listes'] = $Listes['Listes']->where('numero_visa','!=',null);
        $Listes['Listes'] = $Listes['Listes']->join('points','nouveau_dossiers.numero_dossier','=','points.numero_dossier')
        ->select('nouveau_dossiers.*')->groupBy('nouveau_dossiers.id')->get();
        $archives = Archivage::all();
        foreach ($archives as $archive){
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',$archive->numero_dossier);
            //$Listes['Listes'] = $Listes['Listes']->join('archivages','nouveau_dossiers.numero_dossier','=','archivages.numero_dossier')->get();
        }
        return view('archivage.archivage-intro-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }
    public function listArchivage(){
        $Listes=Archivage::paginate(2);
        return view('archivage.archivage-liste',[
            'Listes'=>$Listes,
        ]);
    }
    public function createArchivage(Request $request){
        $numero_dossier =$request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier',$numero_dossier)->first();
        $archive = Archivage::where('numero_dossier',$numero_dossier)->first();
        if($archive == null){
            $archive = new Archivage();
        }
        return view('archivage.archivage-create',[
            'table'=>$table,
            'archive'=>$archive,
            'numero_dossier'=>$numero_dossier,
        ]);
    }
    public function create_Archivage(ArchivageRequest $request){
        $numero_dossier =$request->input('numero_dossier');
        if($numero_dossier != null){
            $archive = Archivage::where('numero_dossier',$numero_dossier)->first();
            if($archive != null){
                return "Dossier deja inscrit ";
            }
        }
        $table = Archivage::create($request->validated());        
        return redirect()->route('create.archivage',['numero_dossier'=>$table->numero_dossier])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editArchivage(Archivage $table){
        $numero_dossier = $table->numero_dossier;
        $archive = $table;
        $table = NouveauDossier::where('numero_dossier',$numero_dossier)->first();
        return view('archivage.archivage-edit',[
            'table' => $table,
            'numero_dossier'=>$table->numero_dossier,
            'archive'=>$archive,
        ]);
    }
    public function edit_Archivage(Archivage $table, ArchivageRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.archivage',[
            'table'=>$table->id,
        ])->with('success',"Enregistrement effectuer avec succes");
    }
}
