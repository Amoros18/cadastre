<?php

namespace App\Http\Controllers;

use App\Http\Requests\CcpRequest;
use App\Http\Requests\Controle1Request;
use App\Http\Requests\Controle2Request;
use App\Http\Requests\CotationRequest;
use App\Http\Requests\MainCouranteRequest;
use App\Http\Requests\MjRequest;
use App\Http\Requests\OuvertueDossierRequest;
use App\Http\Requests\RattachementRequest;
use App\Http\Requests\RecetteRequest;
use App\Http\Requests\VisaRequest;
use App\Http\Services\SearchService;
use App\Models\AncienData;
use App\Models\Archivage;
use App\Models\Decisions;
use App\Models\NouveauDossier;
use App\Models\Natures;
use App\Models\Points;
use App\Models\RejetControlle;
use App\Models\RejetMj;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class DossierController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    // ouverture de dossier
    public function createOuvertureDossier(){
        $table = new NouveauDossier();
        $decision = Decisions::all('id', 'numero_decision');
        $nature = Natures::all();
        return view('bag.ouverture.ouverture-dossier-create',[
            'table'=>$table, 
            'decisions' => $decision,
            'natures' => $nature,
        ]);
    }

    public function create_OuvertureDossier(OuvertueDossierRequest $request){
        $table = NouveauDossier::create($request->validated());
        // $decision = Decisions::get();
        $table->status = 'nouveau';
        $table->save();        
        return redirect()->route('create.ouverture-dossier',['table'=>$table])->with('success',"Enregistrement effectuer avec succes");
    }

    public function editOuvertureDossier(NouveauDossier $table){
        $decision = Decisions::get();
        $nature = Natures::all();

        return view('bag.ouverture.ouverture-dossier-edit',[
            'table' => $table,
            'decisions' => $decision,
            'natures' => $nature
        ]);
    }

    public function edit_OuvertureDossier(NouveauDossier $table, OuvertueDossierRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.ouverture-dossier',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function listOuvertureDossier(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
        }
        return view ('bag.ouverture.ouverture-liste',[
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

    // recette
    public function listeRecette(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('montant_recette','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('montant_recette','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
        }
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
        return view('bag.recette.recette-create',[
            'table'=>$table
        ]);
    }
    public function create_Recette(NouveauDossier $table, RecetteRequest $request){
        $table->update($request->validated());
        return redirect()->route('create.recette',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editRecette(NouveauDossier $table){
        return view('bag.recette.recette-edit',[
            'table' => $table
        ]);
    }
    public function edit_Recette(NouveauDossier $table, RecetteRequest $request){
      
        $table->update($request->validated());
        return redirect()->route('edit.recette',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

   // Cotation
    public function listCotation(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('geometre','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('geometre','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
        }
        return view ('chef.cotation.cotation-liste',[
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
    public function createCotation(NouveauDossier $table){
        return view('chef.cotation.cotation-create',[
            'table'=>$table,
        ]);
    }
    public function create_Cotation(NouveauDossier $table, CotationRequest $request){
        $table->update($request->validated());
        return redirect()->route('create.cotation',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editCotation(NouveauDossier $table){
        return view('chef.cotation.cotation-edit',[
            'table' => $table
        ]);
    }
    public function edit_Cotation(NouveauDossier $table, CotationRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.cotation',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    //Rattachement
    public function listRattachement(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('montant_rattachement','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('bag.rattachement.rattachement-liste',[
                'Listes'=>$Listes['Listes'],
                'numero_dossier'=>$Listes['numero_dossier'],
                'nom_requerant'=>$Listes['nom_requerant'],
                'date_less'=>$Listes['date_less'],
                'date_more'=>$Listes['date_more'],
                'arrondissement'=>$Listes['arrondissement'],
                'nature_dossier'=>$Listes['nature_dossier'],
                'modifier'=>$modifier,
            ]);
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('montant_rattachement','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
            //$Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);

            return view ('bag.rattachement.rattachement-liste-intro',[
                'Listes'=>$Listes['Listes'],
                'numero_dossier'=>$Listes['numero_dossier'],
                'nom_requerant'=>$Listes['nom_requerant'],
                'date_less'=>$Listes['date_less'],
                'date_more'=>$Listes['date_more'],
                'arrondissement'=>$Listes['arrondissement'],
                'nature_dossier'=>$Listes['nature_dossier'],
                'modifier'=>$modifier,
            ]);

        }
       
    }
    public function createRattachement(NouveauDossier $table){
        return view('bag.rattachement.rattachement-create',[
            'table'=>$table
        ]);
    }
    public function create_Rattachement(NouveauDossier $table, RattachementRequest $request){
        $table->update($request->validated());
        return redirect()->route('create.rattachement',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editRattachement(NouveauDossier $table){
        return view('bag.rattachement.rattachement-edit',[
            'table' => $table
        ]);
    }
    public function edit_Rattachement(NouveauDossier $table, RattachementRequest $request){
      
        $table->update($request->validated());
        return redirect()->route('edit.rattachement',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    //Affectation numero de dossier
    public function createAffectation(NouveauDossier $table){
        return view('chef.affectation.affectation-create',[
            'table'=>$table
    ]);  
    }
    public function create_Affectation(NouveauDossier $table,Request $request ){
        $validated = $request->validate([
            'numero_dossier'=>'string|required|unique:nouveau_dossiers',
        ]);
        $numero_dossier = $validated['numero_dossier'];
        $table->update([
            'numero_dossier'=>$numero_dossier,
        ]);
        return redirect()->route('create.affectation',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function listAffectation(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','=',null);
        }
        return view ('chef.affectation.affectation-liste',[
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
    public function editAffectation(NouveauDossier $table){
        return view('chef.affectation.affectation-create',[
            'table'=>$table
    ]);  
    }
    public function edit_Affectation(NouveauDossier $table,Request $request ){
        $validated = $request->validate([
            'numero_dossier'=>'string|required',
        ]);
        $numero_dossier = $validated['numero_dossier'];
        $table->update([
            'numero_dossier'=>$numero_dossier,
        ]);
        return redirect()->route('create.affectation',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    // CCP
    public function listCcp(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('echelle','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('geometre.ccp.ccp-liste',[
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
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('echelle','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_dossier','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');

            return view ('geometre.ccp.ccp-liste-intro',[
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
    public function createCcp(NouveauDossier $table){
        return view('geometre.ccp.ccp-create',[
            'table'=>$table
        ]);
    }
    public function create_Ccp(NouveauDossier $table, CcpRequest $request){
        $table->update($request->validated());
        $data = $request->file('data');
        if($data != null){
            $filePath = $data->store('point','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $numero_dossier = $table->numero_dossier;
            $new_numero = str_replace("/","-",$numero_dossier);
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/point/{$names}"));
            $table->point = $names;    
        }
        $table->save();
        return redirect()->route('create.ccp',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editCcp(NouveauDossier $table){
        return view('geometre.ccp.ccp-edit',[
            'table' => $table
        ]);
    }
    public function edit_Ccp(NouveauDossier $table, CcpRequest $request){
        $data = $request->file('data');
        $old_point = $table->point;
        if($data != null){
            $filePath = $data->store('point','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $numero_dossier = $table->numero_dossier;
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
        $table->update($request->validated());
        return redirect()->route('edit.ccp',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    //Main courante
    public function listMainCourante(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_ccp','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('geometre.main.main-courante-liste',[
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
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('mise_en_valeur','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
            $Listes['Listes'] = $Listes['Listes']->where('geometre','!=',null);

            return view ('geometre.main.main-courante-liste-intro',[
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
    public function createMainCourante(NouveauDossier $table){
        return view('geometre.main.main-courante-create',[
            'table'=>$table
        ]);
    }
    public function create_Maincourante(NouveauDossier $table, MainCouranteRequest $request){
        $table->update($request->validated());
        return redirect()->route('create.main-courante',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editMainCourante(NouveauDossier $table){
        return view('geometre.main.main-courante-edit',[
            'table' => $table
        ]);
    }
    public function edit_MainCourante(NouveauDossier $table, MainCouranteRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.main-courante',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    //Controle
    public function listcontrole1(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('bc.controle1.controle1-liste',[
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
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
            $Listes['Listes'] = $Listes['Listes']->where('geometre','!=',null);

            return view ('bc.controle1.controle1-liste-intro',[
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
    public function createControle1(NouveauDossier $table){
        if($table->numero_controle == null){
            $time = Carbon::now();
            $year = $time->year;
            $yy = strrchr($year,"2");
            $last_numero = AncienData::where('name','=','numero_controle')->get()->first();
            $last_numero = str_getcsv($last_numero->last_value,"/")[0];
            $numero = $last_numero +1;
            $numero = sprintf('%04d',$numero);
            //$table->numero_controle = "BC{$numero}/{$yy}";
        }
        return view('bc.controle1.controle1-create',[
            'table'=>$table
        ]);
    }
    public function create_Controle1(NouveauDossier $table, Controle1Request $request){
        //$last_numero = str_getcsv($request->input('numero_controle'),"C")[1];
        //$numero = AncienData::where('name','=','numero_controle')->get()->first();
        //$numero->last_value = $last_numero;
        //$numero->save();
        $table->update($request->validated());

        // modification du status des rejet 
        $numero_dossier = $table->numero_dossier;
        $rejet = RejetControlle::where('numero_dossier',$numero_dossier);
        $rejet->update([
            'etat'=>'Traiter',
        ]);

        return redirect()->route('create.controle1',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editControle1(NouveauDossier $table){
        return view('bc.controle1.controle1-edit',[
            'table' => $table
        ]);
    }
    public function edit_Controle1(NouveauDossier $table, Controle1Request $request){
        $table->update($request->validated());
        return redirect()->route('edit.controle1',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function listcontrole2(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('controlleur_2','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('bc.controle2.controle2-liste',[
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
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('controlleur_2','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('point','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');

            return view ('bc.controle2.controle2-liste-intro',[
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
    public function createControle2(NouveauDossier $table){
        return view('bc.controle2.controle2-create',[
            'table'=>$table
        ]);
    }
    public function create_Controle2(NouveauDossier $table, Controle2Request $request){
        $table->update($request->validated());
        
        // modification du status des rejet 
        $numero_dossier = $table->numero_dossier;
        $rejet = RejetControlle::where('numero_dossier',$numero_dossier);
        $rejet->update([
            'etat'=>'Traiter',
        ]);
        return redirect()->route('create.controle2',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editControle2(NouveauDossier $table){
        return view('bc.controle2.controle2-edit',[
            'table' => $table
        ]);
    }
    public function edit_Controle2(NouveauDossier $table, Controle2Request $request){
        $table->update($request->validated());
        return redirect()->route('edit.controle2',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    // Mise a jour
    public function listMj(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_mj','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);

            return view ('bmj.mj.mj-liste',[
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
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_mj','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','!=',null);

            return view ('bmj.mj.mj-liste-intro',[
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
    public function createMj(NouveauDossier $table){
        return view('bmj.mj.mj-create',[
            'table'=>$table
        ]);
    }
    public function create_Mj(NouveauDossier $table, MjRequest $request){
        //mise a jour du status dans des rejets
        $numero_dossier = $table->numero_dossier;
        $rejet = RejetMj::where('numero_dossier',$numero_dossier);
        $rejet->update([
            'etat'=>'Traiter',
        ]);
        $table->update($request->validated());
        return redirect()->route('create.mj',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editMj(NouveauDossier $table){
        return view('bmj.mj.mj-edit',[
            'table' => $table
        ]);
    }
    public function edit_Mj(NouveauDossier $table, MjRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.mj',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    
    // registre de visa
    public function listVisa(Request $request){
        $modifier = $request->input('modifier');
        if($modifier==1){
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','!=',null);
        }
        else{
            $Listes = $this->service->searchListe($request);
            $Listes['Listes'] = $Listes['Listes']->where('numero_visa','=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_mj','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_ccp','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('point','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('numero_controle','!=',null);
            $Listes['Listes'] = $Listes['Listes']->where('status','!=','ancien');
        }
        return view ('chef.visa.visa-liste',[
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
    public function createVisa(NouveauDossier $table){
        if($table->numero_visa == null){
            $time = Carbon::now();
            $year = $time->year;
            $yy = strrchr($year,"2");
            $last_numero = AncienData::where('name','=','numero_visa')->get()->first();
            $last_numero = str_getcsv($last_numero->last_value,"/")[0];
            $numero = $last_numero +1;
            $numero = sprintf('%04d',$numero);
            //$table->numero_visa = "{$yy}/{$numero}";
        }
        return view('chef.visa.visa-create',[
            'table'=>$table,
        ]);
    }
    public function create_Visa(NouveauDossier $table, VisaRequest $request){
        //$last = str_getcsv($request->input('numero_visa'),"/")[1];
        //$yy = str_getcsv($request->input('numero_visa'),"/")[0];
        //$last_numero = "{$last}/{$yy}";
        //dd($last_numero);
        //$numero = AncienData::where('name','=','numero_visa')->get()->first();

        //$numero->last_value = $last_numero;

        //$numero->save();
        $table->update($request->validated());
        return redirect()->route('create.visa',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editVisa(NouveauDossier $table){
        return view('chef.visa.visa-edit',[
            'table' => $table
        ]);
    }
    public function edit_Visa(NouveauDossier $table, VisaRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.visa',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    // modificateion de donnees
    public function mofifictionDonnees(){
        return view('chef.modifier');
    }

    public function generateurRegistre(){
        $user = Auth::user();
        if($user->bureau != 'Chef'){
            return Redirect::back();
        }
        //dd($user);
        return view('registres.accueil');
    }

    public function listDossier(Request $request){
        $Listes = $this->service->searchListe($request);
        return view ('chef.listDossier',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }

    public function consultDossier(NouveauDossier $table, Request $request){
        $numero_dossier = $table->numero_dossier;
        $content1 = '';
        $content2 = '';
        $content3 = '';
        $content4 = '';
        $content5 ='';
        $archive = Archivage::where('numero_dossier','=',$numero_dossier)->first();
        if($archive != null){
            $content1 ="Dossier est deja archiver: OUI. numero tirroir = {$archive->numero_tirroir}";
        }
        else{
            $content1 ="Dossier est deja archiver: NON.";
        }
        if ($table->numero_visa != null){
            $content2 ="  Dossier viser par le chef: OUI ";
        }
        else{
            $content2 ="  Dossier viser par le chef: NON ";
        }
        if($table->point != null){
            $content3 ="  Registre de CCP effectuer: OUI.  numero ccp ={$table->numero_ccp}";
        }
        else{
            $content3 ="  Registre de CCP effectuer: NON.";
        }
        if($table->controlleur_2 != null){
            $content4 ="  controle 2 effectuer sur ce dossier: OUI";
        }
        else{
            $content4 ="  controle 2 effectuer sur ce dossier: NON";
        }
        if($table->numero_mj != null){
            $content5 ="  Mise a jour effectuer sur ce dossier: OUI.";
        }
        else{
            $content5 ="  Mise a jour effectuer sur ce dossier: NON.";
        }
        $rejet_mj = RejetMj::where('numero_dossier','=',$numero_dossier)->first();
        if($rejet_mj != null){
            $content6 ="  Dossier Rejeter par la mise a jour: OUI.   date rejet ={$rejet_mj->date_rejet}, motif={$rejet_mj->motif}, status = {$rejet_mj->status}";
        }
        else{
            $content6 ="  Dossier Rejeter par la mise a jour: NON";
        }
        if($table->numero_ccp != null){
            $content7 ="  Registre ccp effectuer: OUI. numero ccp = {$table->numero_ccp} ";
        }
        else{
            $content7 ="  Registre ccp effectuer: NON";
        }

        $rejet_controle = RejetControlle::where('numero_dossier','=',$numero_dossier)->get()->last();
        if($rejet_controle != null){
            $content8 ="  Dossier Rejeter par le controle: OUI  date rejet ={$rejet_mj->date_rejet}, motif={$rejet_mj->motif}, status = {$rejet_mj->status}";
        }
        else{
            $content8 ="  Dossier Rejeter par le controle: NON";
        }


        if($table->date_bornage != null){
            $content9 ="  Main Courante effectuer sur ce dossier: OUI";
        }
        else{
            $content9 ="  Main Courante effectuer sur ce dossier: NON";
        }
        if($table->observation_rattachement != null){
            $content10 ="  Rattachement effectuer sur ce dossier: OUI";
        }
        else{
            $content10 ="  Rattachement effectuer sur ce dossier: OUI";
        }
        if($table->geometre != null){
            $content11 ="  Cotation effectuer sur ce dossier: OUI.   geometre = {$table->geometre}";
        }
        else{
            $content11 ="  Cotation effectuer sur ce dossier: NON";
        }
        if($table->numero_dossier){
            $content12 ="numero de dossier inscrit: OUI";
        }
        else{
            $content12 ="numero de dossier inscrit: NON";
        }
        if($table->montant_recette){
            $content13 ="  Recette inscrit: OUI ";
        }
        else{
            $content13 ="  Recette inscrit: NON ";
        }
        
        $point = Points::where('numero_dossier','=',$numero_dossier)->get();
        if($point->get(0)==null){
            $content5 = "Points non inscrits";
        }
        return view ('dossier',[
            'table'=>$table,
            'content1'=>$content1,
            'content2'=>$content2,
            'content3'=>$content3,
            'content4'=>$content4,
            'content5'=>$content5,
            'content6'=>$content6,
            'content7'=>$content7,
            'content8'=>$content8,
            'content9'=>$content9,
            'content10'=>$content10,
            'content11'=>$content11,
            'content12'=>$content12,
            'content13'=>$content13,
        ]);
    }

    public function downloadFile(NouveauDossier $table){
        
        if(file_exists(storage_path("app/public/point/{$table->point}")) ){
            return  response()->download(storage_path("app/public/point/{$table->point}"));
        }
        else{
            return "pas de point";
        }

    }

    public function position(){
        
    }

    //Recherche dossier
    public function rechercherDossier(Request $request){
        $user = $request->user()->bureau;
        $nom = $request->input('nom_requerant');
        switch($user){
            case('Chef'):
                $layout = 'chef/accueil';
                $c1 = '#4bc5f6';
                $c2 = '#077cab';
                break;
        
            case('Bureau des affaires generale'):
                $layout = 'bag/accueil';
                $c1 = '#E100FF';
                $c2 = '#7F00FF';
                break;

            case('Bureau de mise a jour'):
                $layout = 'bmj/accueil';
                $c1 = '#00CDAC';
                $c2 = '02AAB0';
                break;

            case('Bureau de controle'):
                $layout = 'bc/accueil';
                $c1 = '#FF6347';
                $c2 = '#b31217';
                break;

            case('Archivage'):
                $layout = 'archivage/accueil';
                $c1 = '#004e92';
                $c2 = '#000428';
                break;

            case($user == 'Bureau de geometre'):
                $layout = 'geometre/accueil';
                $c1 = '#F9D423';
                $c2 = '#e65c00';
                break;
        }

        if($request->recherche){
            $dossier = NouveauDossier::where('nom_requerant', 'like', '%'.$request->nom_requerant.'%')->get();
            return view('recherche', ['dossiers' => $dossier, 'layout' => $layout, 'c1' => $c1, 'c2' => $c2, 'nom' => $nom]);
        } else {
            return view('recherche', ['layout' => $layout, 'c1' => $c1, 'c2' => $c2, 'nom' => $nom]);
        }
    }
}
