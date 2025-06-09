<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RecuperarSenhaController extends Controller
{
    

    public function form(Request $request)  

{
    return view('auth.novasenha', [
        'token' => $request->token,
        'email' => $request->email
    ]);
}

public function novaSenha(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
        'token' => 'required'
    ]);

    $reset = DB::table('resetar_senha')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (!$reset) {
        return back()->withErrors(['email' => 'Token inválido ou expirado']);
    }

    User::where('email', $request->email)->update([
        'password' => bcrypt($request->password)
    ]);

    DB::table('resetar_senha')->where('email', $request->email)->delete();

    return redirect()->route('login.form')->with('status', 'Senha redefinida com sucesso!');
}
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
