<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;
use App\Http\Requests\OuvertueDossierRequest;
use App\Models\ListeControlleur;
use App\Models\ListeDAO;
use App\Models\ListeGeometre;
use App\Models\OuvertureDossier;

class EmployerController extends Controller
{
    // Geometre
    public function createGeometre(){
        $table = new ListeGeometre();
        return view ('employer.geometre-create',['table'=>$table]);
    }
    public function create_Geometre(EmployerRequest $request){
        $table = ListeGeometre::create($request->validated());
        return redirect()->route('create.employer.geometre')->with('success',"Enregistrement effectuer avec succes");
    }
    public function editGeometre(ListeGeometre $table){
        return view ('employer.geometre-edit',['table' => $table]);
    }
    public function edit_Geometre(ListeGeometre $table, EmployerRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.employer.geometre',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function listGeometre(){
        $Listes =ListeGeometre::paginate(2);
        $nb=1;
        return view ('employer.geometre-list',['Listes'=>$Listes,'nb'=>$nb]);
    }

    // controlleur
    public function createControlleur(){
        $table = new ListeControlleur();
        return view ('employer.controlleur-create',['table'=>$table]);
    }
    public function create_Controlleur(EmployerRequest $request){
        $table = ListeControlleur::create($request->validated());
        return redirect()->route('create.employer.controlleur')->with('success',"Enregistrement effectuer avec succes");
    }
    public function editControlleur(ListeControlleur $table){
        return view ('employer.controlleur-edit',['table' => $table]);
    }
    public function edit_Controlleur(ListeControlleur $table, EmployerRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.employer.controlleur',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function listControlleur(){
        $Listes =ListeControlleur::paginate(1);
        $nb=2;
        return view ('employer.controlleur-list',['Listes'=>$Listes,'nb'=>$nb]);
    }

    // DAO
    public function createDAO(){
        $table = new ListeDAO();
        return view ('employer.dao-create',['table'=>$table]);
    }
    public function create_DAO(EmployerRequest $request){
        $table = ListeDAO::create($request->validated());
        return redirect()->route('create.employer.dao')->with('success',"Enregistrement effectuer avec succes");
    }
    public function editDAO(ListeDAO $table){
        return view ('employer.dao-edit',['table' => $table]);
    }
    public function edit_DAO(ListeDAO $table, EmployerRequest $request){
        $table->update($request->validated());
        return redirect()->route('edit.employer.dao',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }
    public function listDAO(){
        $Listes =ListeDAO::paginate(25);
        $nb=3;
        return view ('employer.dao-list',['Listes'=>$Listes,'nb'=>$nb]);
    }

        // Suspression
    public function deleteGeometre(){

    }

    public function deleteDAO(){

    }

    public function deleteControlleur(){
        
    }
}
