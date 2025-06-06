<?php

namespace App\Http\Controllers;

use App\Models\Postagens;
use Illuminate\Http\Request;


class PostagensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postagens = Postagens::all();
         return dd($postagens);
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
    public function show(Postagens $postagens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postagens $postagens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postagens $postagens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postagens $postagens)
    {
        //
    }
}
