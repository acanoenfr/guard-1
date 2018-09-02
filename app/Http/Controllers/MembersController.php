<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Auth::check()) {
            return redirect('/login');
        }elseif(session()->get('role') === 0){
            return redirect('/dashboard');
        }
        $members = Member::all();
        return view('pages.members.index', [
            'title' => 'Liste des membres',
            'members' => $members
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
        }elseif(session()->get('role') === 0){
            return redirect('/dashboard');
        }
        return view('pages.members.create', [
            'title' => 'Ajouter un membre'
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
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'group' => 'required',
            'formation' => 'required',
            'entry_year' => 'required'
        ]);
        Member::create($request->all());
        return redirect('/members');
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
        }elseif(session()->get('role') === 0){
            return redirect('/dashboard');
        }
        $member = Member::findOrFail($id);
        $obtaining = isset($member['obtaining_year']) ? $member['obtaining_year'] : 'En cours';
        return view('pages.members.show', [
            'title' => "Profil de {$member['surname']} {$member['firstname']}",
            'member' => $member,
            'obtaining' => $obtaining
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
        }elseif(session()->get('role') === 0){
            return redirect('/dashboard');
        }
        $member = Member::findOrFail($id);
        return view('pages.members.edit', [
            'title' => 'Editer un membre',
            'member' => $member
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
        Member::where('id', $id)->update($request->except('_token', '_method'));
        return redirect('/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::where('id', $id)->delete();
        return redirect('/members');
    }
}
