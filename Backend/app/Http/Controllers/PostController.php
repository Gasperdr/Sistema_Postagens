<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    
    public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('edit', compact('post'));
}
    
public function update(Request $request,$id)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'imagem' => 'required|url',
    ]);

    $post = Post::findOrFail($id);
    $post->titulo = $request->titulo;
    $post->descricao = $request->descricao;
    $post->imagem = $request->imagem;
    $post->save();

    return redirect()->route('home')->with('status', 'Postagem atualizada com sucesso!');
}
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        // Gate::authorize('ver-post');
        return view('home', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    $request->validate([
        'titulo' => 'required',
        'descricao' => 'required',
        'imagem' => 'required|url',
    ]);

    Post::create([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'imagem' => $request->imagem,
        'slug' => Str::slug($request->titulo),
        'id_user' => Auth::id(),
    ]);

    return redirect()->intended('home')->with('success', 'Post criado!');
    
    
        //     $post = $request->all();

    //     if($request->image) {
    //        $post['imagem'] = $request->image->store('post');
    //     }

    //    $post['slug'] = Str::slug($request->titulo);     

    //     $post = Post::create($post);
        
        
    //     return redirect()->route('home')->with('sucesso', 'Postado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }
}
