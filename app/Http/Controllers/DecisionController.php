<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecisionRequest;
use App\Http\Services\SearchService;
use App\Models\Decisions;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }


    public function createDecision(){
        $table = new Decisions();
        return view('bag.decision.decision-create',[
            'table'=>$table
        ]);
    }

    public function create_Decision(DecisionRequest $request){
        $data = $request->file('data');
        $table = Decisions::create($request->validated());
        $numero_decision = $request->input('numero_decision');
        if($data != null){
            $filePath = $data->store('decisions','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $new_numero = str_replace("/","-",$numero_decision);    
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/decision/{$names}"));
            $table->lien_decision = $names;    
        }
        $table->save();
        return redirect()->route('create.decision',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function editDecision(Decisions $table){
        return view('bag.decision.decision-edit',[
            'table' => $table
        ]);
    }

    public function edit_Decision(DecisionRequest $request, Decisions $table){
        $data = $request->file('data');
        $old_decision = $table->lien_decision;
        $numero_decision = $request->input('numero_decision');
        $table->update($request->validated());
        if($data != null){
            $filePath = $data->store('decision','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $new_numero = str_replace("/","-",$numero_decision);    
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/decision/{$names}")) ;
            $table->lien_decision = $names;
            $table->save();
            if($old_decision != null){
                if(file_exists(storage_path("app/public/decision/{$old_decision}")) ){
                    rename(storage_path("app/public/decision/{$old_decision}") , storage_path("app/public/decision/old/{$old_decision}")) ;
                }       
            }
        }
        return redirect()->route('edit.decision',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");

    }

    public function listDecision(Request $request){
        $Listes = $this->service->searchDecision($request);
        $modifier = $request->input('modifier');
        return view ('bag.decision.decision-liste',[
        'Listes'=>$Listes['Listes'],
        'numero_decision'=>$Listes['numero_decision'],
        'date_less'=>$Listes['date_less'],
        'date_more'=>$Listes['date_more'],
        'modifier'=>$modifier,
        ]);
    }
}
