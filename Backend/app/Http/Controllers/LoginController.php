<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' =>'O campo email é obrigatório!',
            'password.required' =>'O campo senha é obrigatório',
            'email.email' => 'o email não é valido',
        ]);

        if(Auth::attempt($credenciais, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('erro', 'Usuário ou senha inválido');
        }

    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login.form');
    }

    public function create() {
        return view('login.create');
        
    }


}
