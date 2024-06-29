<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(){
        $table = new User();
        return view('user.user-create',['table'=>$table]);
    }
    public function add_User(UserRequest $request){
        $table = User::create($request->validated());
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        // return redirect()->route('create.user')->with('success',"Enregistrement effectuer avec succes");
        return redirect()->route('visualiser.liste-user')->with('success',"Utilisateur enregistré avec succès.");
    }
    public function listUser(){
        $Listes =User::paginate(25);
        return view ('user.user-list',['Listes'=>$Listes]);
    }

    public function editUser(User $table){
        return view('user.user-edit',[
            'table' => $table
        ]);
    }

    public function edit_User(User $table, UserRequest $request){
        $table->update($request->validated());
        $password = $request->input('password');
        $table->password = Hash::make($password);
        $table->save();
        return redirect()->route('edit.user',['table'=>$table->id])->with('success',"Enregistrement effectuer avec succes");

    }


    // definition des vues principale de chaque service

    public function bag(){
        return view('bag.accueil');
    }

    public function chef(){
        return view('chef.accueil');
    }

    public function geometre(){
        return view('geometre.accueil');
    }

    public function bc(){
        return view('bc.accueil');
    }

    public function bmj(){
        return view('bmj.accueil');
    }

    public function archivage(){
        return view('archivage.accueil');
    }

    public function employer(){
        return view('employer.accueil');
    }
}
