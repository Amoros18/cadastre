<?php

namespace App\Http\Controllers;

use App\Http\Requests\AncienDossierRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\Quittances;
use Illuminate\Http\Request;

class AncienDossierController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function viewAncienDossier(){
        return view('ancien.accueil');
    }

    public function createAncienDossier(){
        $table = new NouveauDossier();
        return view('ancien.ancien-dossier-create',['table'=>$table]);
    }
    public function viewAncienDossierSuite(NouveauDossier $table){
        return view('ancien.suite',['table'=>$table]);
    }
    public function create_AncienDossier(AncienDossierRequest $request){
        $data = $request->file('data');
        $table = NouveauDossier::create($request->validated());
        if($request->input('numero_quittance')){
            $quittance = new Quittances($request->validated());
            $quittance->nouveau_dossier_id = $table->id;
            $quittance->save();
        }
        if ($data != null){
            $filePath = $data->store('point','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $numero_dossier = $request->input('numero_dossier');
            $new_numero = str_replace("/","-",$numero_dossier);
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/point/{$names}"));
            $table->point = $names;
        }

        $table->status = 'ancien';
        $table->save();
        return redirect()->route('user.ancien-dossier.suite',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editAncienDossier(NouveauDossier $table){
        return view('ancien.ancien-dossier-edit',[
            'table' => $table
        ]);
    }
    
    public function edit_AncienDossier(NouveauDossier $table,AncienDossierRequest $request){
        $data = $request->file('data');
        $table->update($request->validated());
        $old_point = $table->point;
        if($data){
            $filePath = $data->store('point','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $numero_dossier = $request->input('numero_dossier');
            $new_numero = str_replace("/","-",$numero_dossier);    
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/point/{$names}")) ;
            $table->point = $names;
            $table->save();
            if($old_point != null){
                if(file_exists(storage_path("app/public/point/{$old_point}")) ){
                    rename(storage_path("app/public/point/{$old_point}") , storage_path("app/public/point/old/{$old_point}")) ;
                }    
            }
        }
        
        $table->save();
        return redirect()->route('edit.ancien-dossier',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function listAncienDossier(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','nouveau');
        }
        return view('ancien.ancien-dossier-list',[
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
}
