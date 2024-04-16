<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourrierRequest;
use App\Http\Services\SearchService;
use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourrierController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function listCourrier(Request $request){
            $Listes = $this->service->searchCourrier($request);
            $modifier = $request->input('modifier');
            return view ('courrier.courrier-liste',[
            'Listes'=>$Listes['Listes'],
            'numero_correspondance'=>$Listes['numero_correspondance'],
            'expediteur'=>$Listes['expediteur'],
            'date_less'=>$Listes['date_less'],
            'date_more'=>$Listes['date_more'],
            'numero_reponse'=>$Listes['numero_reponse'],
            'modifier'=>$modifier,
        ]);
    }
    public function createCourrier(){
        $table = new Courrier();
        return view('courrier.courrier-create',[
            'table'=>$table
        ]);
    }
    public function create_Courrier(CourrierRequest $request){
        $table =Courrier::create($request->validated());
        $data = $request->file('data');
        if($data != null){
            $filePath = $data->store('courrier','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $new_numero = str_replace("/","-",$table->numero_correspondance);
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/courrier/{$names}"));
            $table->image = $names;    
        }
        $table->save();
        return redirect()->route('create.courrier',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function editCourrier(Courrier $table){
        return view('courrier.courrier-edit',[
            'table' => $table
        ]);
    }
    public function edit_Courrier(Courrier $table,CourrierRequest $request){
        $data = $request->file('data');
        $old_image = $table->image;
        if($data != null){
            $filePath = $data->store('courrier','public');
            $name = $_FILES['data']['name'];
            $extension = strrchr($name,".");
            $new_numero = str_replace("/","-",$table->numero_correspondance);    
            $aleatoire = md5(substr('0123456789',rand(0,5)));
            $names = "{$new_numero}-{$aleatoire}{$extension}";
            rename(storage_path("app/public/{$filePath}") , storage_path("app/public/courrier/{$names}")) ;
            $table->image = $names;
            $table->save();
            if($old_image != null){
                if(file_exists(storage_path("app/public/courrier/{$old_image}")) ){
                    rename(storage_path("app/public/courrier/{$old_image}") , storage_path("app/public/courrier/old/{$old_image}")) ;
                }       
            }
        }
        $table->update($request->validated());
        return redirect()->route('edit.courrier',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function consultCourrier(Courrier $table){
        return view('courrier.courrier-consult',[
            'table'=>$table,
        ]);
    }
}
