<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Post;

class AlterarSenhaController extends Controller
{
    public function form()
    {

        return view('auth.alterarsenha');
        
    }

    public function link(Request $request)
    {
        $post = Post::all();
        
        $request->validate(['email' => 'required|email']);

        $token = Str::random(60);

        DB::table('resetar_senha')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        $link = route('senha.form', ['token' => $token, 'email' => $request->email]);

        Mail::raw("Clique para redefinir sua senha: $link", function ($message) use ($request) {
            $message->to($request->email)->subject('Recuperar Senha');
        });
 
        return view('home', compact('post'))->with('status', 'Link de recuperação enviado!');
    }

    
    /**
     * Display a listing of the resource.
     */
public function index(){
    return view('auth.alterarsenha');
    
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
