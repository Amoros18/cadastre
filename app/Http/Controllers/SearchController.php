<?php

namespace App\Http\Controllers;

use App\Models\NouveauDossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $table = DB::table('nouveau_dossiers');
        if ($request->input('numero_dossier')!= null){
            $table = $table->where('numero_dossier',$request->input('numero_dossier'));
            return $table;
        }
        if ($request->input('nature_dossier')!= null){
            $table = $table->where('nature_dossier',$request->input('nature_dossier'));
        }
        if ($request->input('date_less')!=null){
            $table = $table->where('date_ouverture','<=',$request->input('date_less'));
        }
        if ($request->input('date_more')!= null){
            $table = $table->where('date_ouverture','>=',$request->input('date_more'));
        }
        if ($request->input('arrondissement')!= null){
            $table = $table->where('arrondissement',$request->input('nature_dossier'));
        }
        if ($request->input('nom_requerant') != null){
            $nom = $request->input('nom_requerant');
            $table = $table->where('nom_requerant', 'like','%'.$nom.'%');
        }
        $table = $table->get();
  /*      dd(Redirect::back()->with([
            'Listes'=>$table,
            'nom_requerant'=> $request->input('nom_requerant'),
            'date_less'=>$request->input('date_less'),
            'date_more'=>$request->input('date_more'),
            'nature_dossier'=>$request->input('nature_dossier'),
        ]));
       */ //$table = json_decode(json_encode($table),true);
        //return view ('chef.visa.visa-liste',[
        return redirect::back()->with([
            'Listes'=>$table,
            'nom_requerant'=> $request->input('nom_requerant'),
            'date_less'=>$request->input('date_less'),
            'date_more'=>$request->input('date_more'),
            'nature_dossier'=>$request->input('nature_dossier'),
        ]);

        //dd($table);
        //return redirect()->intended(route('auth.login'));
    }
}
