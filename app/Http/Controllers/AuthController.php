<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function dashboard(Request $request)
    {
        if(!\Auth::check()){
            return redirect('/login');
        }
        $members = Member::all()->sortBy('surname');
        $obtaining = isset($members[0]['obtaining_year']) ? $members[0]['obtaining_year'] : 'En cours';
        return view('pages.auth.dashboard', [
            'title' => 'Tableau de bord',
            'members' => $members,
            'obtaining' => $obtaining
        ]);
    }

    public function account(Request $request)
    {
        if(!\Auth::check()){
            return redirect('/login');
        }
        return view('pages.auth.account', [
            'title' => 'Mon compte'
        ]);
    }

    public function postAccount(Request $request)
    {
        $request->validate([
            'actual_password' => 'required|alphaNum',
            'new_password' => 'required|alphaNum|same:password_confirmation',
            'password_confirmation' => 'required|alphaNum'
        ]);
        $id = \Session::get('auth');
        $user = User::where('id', $id)->first();
        if(\Hash::check($request->get('actual_password'), $user->pass)){
            $hash = \Hash::make($request->get('password_confirmation'));
            User::where('id', $id)->update([
                'pass' => $hash
            ]);
        }else{
            return redirect('/account')
                ->withErrors('Le mot de passe actuel n\'est pas celui enregistré dans notre base de données !');
        }
        return redirect('/dashboard')->with('success', 'Votre mot de passe a bien été changé !');
    }
}
