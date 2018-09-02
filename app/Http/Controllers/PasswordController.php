<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function forget(Request $request)
    {
        return view('pages.forget', [
            'title' => 'Mot de passe oublié'
        ]);
    }

    public function postForget(Request $request)
    {
        $request->validate([
            'mail' => 'required|email|exists:users,mail'
        ]);
        $mail = $request['mail'];
        $token  = str_random(60);
        User::where('mail', $mail)->update([
            'token' => $token
        ]);
        Mail::to($mail)->send(new ResetPassword($token));
        return redirect('/')->with('success', 'Un mail vous a été envoyé avec le lien de réinitialisation de votre mot de passe !');
    }

    public function reset(Request $request, $token)
    {
        $user = User::where('token', $token)->first();
        if(!$user){
            return redirect('/reset')
                ->with('danger', 'Token invalide');
        }
        return view('pages.reset', [
            'title' => 'Réinitialisation du mot de passe',
            'token' => $token
        ]);
    }

    public function postReset(Request $request, $token)
    {
        $request->validate([
            'new_password' => 'required|alphaNum|same:password_confirmation',
            'password_confirmation' => 'required|alphaNum'
        ]);
        User::where('token', $token)->update([
            'pass' => \Hash::make($request['password_confirmation']),
            'token' => null
        ]);
        return redirect('/')
            ->with('success', 'Votre mot de passe a bien été réinitialisé !');
    }

    public function noReset(Request $request){
        return view('pages.forget', [
            'title' => 'Mot de passe oublié'
        ]);
    }
}
