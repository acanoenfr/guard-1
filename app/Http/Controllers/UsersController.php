<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Auth::check()){
            return redirect('/login');
        }elseif(session()->get('role') < 2){
            return redirect('/dashboard');
        }
        $users = User::all();
        return view('pages.users.index', [
            'title' => 'Liste des utilisateurs',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Auth::check()){
            return redirect('/login');
        }elseif(session()->get('role') < 2){
            return redirect('/dashboard');
        }
        return view('pages.users.create', [
            'title' => 'Ajouter un utilisateur'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mail' => 'required|email|unique:users',
            'pass' => 'required|min:6|alphaNum'
        ]);
        User::create([
            'name' => $request['name'],
            'mail' => $request['mail'],
            'pass' => bcrypt($request['pass']),
            'role' => $request['role']
        ]);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!\Auth::check()){
            return redirect('/login');
        }elseif(session()->get('role') < 2){
            return redirect('/dashboard');
        }
        $user = User::findOrFail($id);
        return view('pages.users.show', [
            'title' => "Profil de {$user['name']}",
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!\Auth::check()){
            return redirect('/login');
        }elseif(session()->get('role') < 2){
            return redirect('/dashboard');
        }
        $user = User::findOrFail($id);
        if($id == \Session::get('auth') || $id == 1){
            return redirect('/users');
        }
        return view('pages.users.edit', [
            'title' => 'Editer un utilisateur',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(empty($request['pass'])){
            $request->validate([
                'name' => 'required|string',
                'mail' => 'required|email'
            ]);
            User::where('id', $id)->update([
                'name' => $request['name'],
                'mail' => $request['mail'],
                'pass' => $user['pass'],
                'role' => $request['role']
            ]);
        }else{
            $request->validate([
                'name' => 'required|string',
                'mail' => 'required|email',
                'pass' => 'min:6|alphaNum'
            ]);
            User::where('id', $id)->update([
                'name' => $request['name'],
                'mail' => $request['mail'],
                'pass' => bcrypt($request['pass']),
                'role' => $request['role']
            ]);
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == \Session::get('auth') || $id == 1){
            return redirect('/users');
        }
        User::where('id', $id)->delete();
        return redirect('/users');
    }
}
