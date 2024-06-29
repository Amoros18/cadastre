<?php

namespace App\Http\Controllers;

use App\Http\Requests\RejetRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\RejetControlle;
use App\Models\RejetMj;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class RejetController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    public function listRejetControle(Request $request){
        $table = DB::table('nouveau_dossiers');
        $table = $table->join('rejet_controlles','rejet_controlles.numero_dossier','=','nouveau_dossiers.numero_dossier')
        ->select('nouveau_dossiers.*','rejet_controlles.*');

        $Listes = $this->service->searchRejet($request,$table);
        //dd($Listes['Listes']);
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier', 'like',$numero_dossier);
        }
        
        return view ('bc.rejet.rejet-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }

    public function listIntroRejetControle(Request $request){
        $numero_controle = $request->input('controle');
        $Listes = $this->service->searchListe($request);
        if($numero_controle == 1){   // Liste des rejet pour le controle 1
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_ccp','!=',null);    
        }
        if($numero_controle == 2){    // Liste des rejet pour le controle 2
            $Listes['Listes'] = $Listes['Listes']->where('controlleur_2','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('point','!=',null);    
        }
        $modifier = $request->input('modifier');
        $rejets = RejetControlle::all();
        foreach ($rejets as $rejet){
            //$Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',$rejet->numero_dossier);
        }
        if($modifier == 1){
            $modifier = $request->input('modifier');
      /*      $Listes = $this->service->searchRejet ($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_ccp','!=',null);
            $rejets = RejetControlle::all();
                $Listes['Listes'] = $Listes['Listes']->join('rejet_controlles','rejet_controlles.numero_dossier','=','nouveau_dossiers.numero_dossier')
                ->select('nouveau_dossiers.*','rejet_controlles.*')->get();
        */    //dd($Listes['Listes']);
            $table = DB::table('nouveau_dossiers');
            $table = $table->join('rejet_controlles','rejet_controlles.numero_dossier','=','nouveau_dossiers.numero_dossier')
            ->select('nouveau_dossiers.*','rejet_controlles.*')->get();

            $Listes = $this->service->searchRejet1($request,$table);
            //dd($Listes['Listes']);
            if($request->input('numero_dossier')){
                $numero_dossier = $request->input('numero_dossier');
                $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','=',$numero_dossier);
            }    

        }
        return view ('bc.rejet.rejet-intro-liste',[
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
    public function createRejetControle(Request $request){
        $numero_dossier =$request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier',$numero_dossier)->first();
        $rejet = new RejetControlle(); // on peut rejeter plusieur fois tant que le controle n'est pas effectif
        //$rejet = RejetControlle::where('numero_dossier',$numero_dossier)->first();
        if($rejet == null){
            $rejet = new RejetControlle();
        }
        return view('bc.rejet.rejet-create',[
            'table'=>$table,
            'rejet'=>$rejet,
            'numero_dossier'=>$numero_dossier,
        ]);
    }
    public function create_RejetControle(RejetRequest $request){
        $table = RejetControlle::create($request->validated());
        $table->etat = 'Non traiter';
        $table->save();
        return redirect()->route('create.controle-rejet',['numero_dossier'=>$table->numero_dossier])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editRejetControle(RejetControlle $table){
        $rejet = $table;
        $table = NouveauDossier::where('numero_dossier',$rejet->numero_dossier)->first();
        return view('bc.rejet.rejet-edit',[
            'table' => $table,
            'rejet'=>$rejet,
            'numero_dossier' => $rejet->numero_dossier,
        ]);
    }
    public function edit_RejetControle(RejetControlle $table, RejetRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.controle-rejet',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    // Rejet Mise a jour
    public function listRejetMj(Request $request){
        $table = DB::table('nouveau_dossiers');
        $table = $table->join('rejet_mjs','nouveau_dossiers.numero_dossier','=','rejet_mjs.numero_dossier')
        ->select('nouveau_dossiers.*','rejet_mjs.*');

        $Listes = $this->service->searchRejet($request,$table);
        //dd($Listes['Listes']);
        if($request->input('numero_dossier')){
            $numero_dossier = $request->input('numero_dossier');
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier', 'like',$numero_dossier);
        }

        return view('bmj.rejet.rejet-liste',[
            'Listes'=>$Listes['Listes'],
            //'modifier'=>$modifier,
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],

        ]);
    }

    public function listIntroRejetMj(Request $request){
        $modifier = $request->input('modifier');
        $Listes = $this->service->searchListe($request);
        $Listes['Listes'] = $Listes['Listes']->where('numero_controle','!=',null);
        $Listes['Listes'] = $Listes['Listes']->where('numero_mj','=',null);
        $rejets = RejetMj::all();
        foreach ($rejets as $rejet){
            //$Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',$rejet->numero_dossier);
        }
        if($modifier == 1){
        }
        return view ('bmj.rejet.rejet-intro-liste',[
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
    public function createRejetMj(Request $request){
        $numero_dossier =$request->input('numero_dossier');
        $table = NouveauDossier::where('numero_dossier',$numero_dossier)->first();
        $rejet = new RejetMj();
        //$rejet = RejetMj::where('numero_dossier',$numero_dossier)->first();
        if($rejet == null){
            $rejet = new RejetMj();
        }
        return view('bmj.rejet.rejet-create',[
            'table'=>$table,
            'rejet'=>$rejet,
            'numero_dossier'=>$numero_dossier,
        ]);
    }
    public function create_RejetMj(RejetRequest $request){
        $table = RejetMj::create($request->validate([
            'numero_dossier'=>['string', 'required', Rule::exists('nouveau_dossiers', 'numero_dossier')],
            'motif'=>'string|required',
            'date_rejet'=>'nullable|required'
        ]));
        $table->etat = 'Non traiter';
        $table->save();
        return redirect()->route('create.mj-rejet',['numero_dossier'=>$table->numero_dossier])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editRejetMj(RejetMj $table){
        $rejet = $table;
        $table = NouveauDossier::where('numero_dossier',$rejet->numero_dossier)->first();
        return view('bmj.rejet.rejet-edit',[
            'table' => $table,
            'rejet'=>$rejet,
            'numero_dossier' => $rejet->numero_dossier,
        ]);
    }
    public function edit_RejetMj(RejetMj $table, RejetRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.mj-rejet',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

}
