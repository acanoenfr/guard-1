<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index', [
            'title' => 'Accueil'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        if(\Auth::check()){
            return redirect('/dashboard')->with('success', 'Votre session de navigation a été restaurée !');
        }
        return view('pages.login', [
            'title' => 'Se connecter'
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'mail' => 'required|email',
            'pass' => 'required|alphaNum'
        ]);
        $user = \App\User::where('mail', $request->get('mail'))->first();
        if($user && \Hash::check($request->get('pass'), $user->pass)){
            \Auth::login($user, $request->has('remember'));
            $request->session()->put('auth', $user->id);
            $request->session()->put('role', $user->role);
            $request->session()->put('name', $user->name);
            return redirect('/dashboard')->with('success', 'Vous êtes désormais connecté !');
        }
        return redirect('/login')
            ->withErrors('Ces identifiants ne sont pas enregistrés dans notre base de données !');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->flush('auth', 'role', 'name');
        return redirect('/');
    }
}
