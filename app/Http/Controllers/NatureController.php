<?php

namespace App\Http\Controllers;

use App\Http\Requests\NatureRequest;
use App\Http\Services\SearchService;
use App\Models\Natures;
use Illuminate\Http\Request;

class NatureController extends Controller
{
    private SearchService $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }


    public function createNature(){
        $table = new Natures();
        return view('bag.nature.nature-create',[
            'table'=>$table
        ]);
    }

    public function create_nature(NatureRequest $request){
        $table = Natures::create($request->validated());
        $nature = $request->input('nature');
        $table->save();
        return redirect()->route('create.nature',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");
    }

    public function editNature(Natures $table){
        return view('bag.nature.nature-edit',[
            'table' => $table
        ]);
    }

    public function edit_Nature(NatureRequest $request, Natures $table){
        $nature = $request->input('nature');
        $table->update($request->validated());
       
        return redirect()->route('edit.nature',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");

    }

    public function listNature(Request $request){
        $nature = Natures::all();
        $modifier = $request->input('modifier');
        return view ('bag.nature.nature-list',[
        'natures'=>$nature,
        'modifier'=>$modifier,
        ]);
    }
}
