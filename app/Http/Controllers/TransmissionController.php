<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransmissionRequest;
use App\Http\Services\SearchService;
use App\Models\NouveauDossier;
use App\Models\TransmissionArchivage;
use App\Models\TransmissionDelegue;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }
    public function accueilTransmission(){
        return view('bag.transmission.accueil');
    }
    /* 

        Transmission au delegue

    */
    public function listTransmissionDelegueIntro(Request $request){
        $table = NouveauDossier::query();

        $Listes = $this->service->searchInfoOuverture($request,$table);

        return view('bag.transmission.transmission-intro-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }
    public function listTransmissionDelegue(Request $request){
        $table = TransmissionDelegue::join('nouveau_dossiers','nouveau_dossiers.id','=','transmission_delegues.nouveau_dossier_id')->select('transmission_delegues.*',
        'nouveau_dossiers.numero_dossier',
        'nouveau_dossiers.nature_dossier',
        'nouveau_dossiers.date_ouverture',
        'nouveau_dossiers.arrondissement',
        'nouveau_dossiers.nom_requerant',);
        
        $Listes = $this->service->searchInfoOuverture($request,$table);

        return view('bag.transmission.transmission-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_dossier'=>$Listes['numero_dossier'],
            'nom_requerant'=>$Listes['nom_requerant'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'arrondissement'=>$Listes['arrondissement'],
            'nature_dossier'=>$Listes['nature_dossier'],
        ]);
    }
    public function createTransmissionDelegue(NouveauDossier $table)
    {
        $t = TransmissionDelegue::where('nouveau_dossier_id',$table->id)->latest()->first();

        if($t==null){
            $transmission = new TransmissionDelegue(); 
        }
        else{
            $transmission = $t;
            if($t->date_reception == null){
                // si une date de reception n'est pa ajouter
            }
        };
        $nouveau_dossier_id =$table->id;

        return view('bag.transmission.transmission-create',[
            'table'=>$table,
            'transmission'=>$transmission,
            'nouveau_dossier_id'=>$nouveau_dossier_id,
        ]);
    }
    public function create_TransmissionDelegue( TransmissionRequest $request){
        $id = $request->input('nouveau_dossier_id');
        if($id){
            $transmisision = TransmissionDelegue::where('nouveau_dossier_id',$id)->latest()->first();
            if($transmisision != null){
                if($transmisision->date_reception == null){
                    return 'Dossier deja transmis et non reception le '.$transmisision->date_transmission;
                }
            }
        }
    
        $table = TransmissionDelegue::create($request->validated());
        return redirect()->route('transmission.delegue.create',['table'=>$table->nouveau_dossier_id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editTransmissionDelegue(TransmissionDelegue $table){
        
        return view('archivage.archivage-edit',[
            'table' => $table,
        ]);
    }
    public function edit_Archivage(TransmissionDelegue $table, TransmissionRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.archivage',[
            'table'=>$table->id,
        ])->with('success',"Enregistrement effectuer avec succes");
    }

    /*

        Reception

    */
    public function accueilReception(){
        return view('bag.transmission.reception');
    }
    public function listreceptionDelegue(){
        
    }
}




