<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

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
    
    
//     public function store(Request $request)
// {
//     $validated = $request->validate([
//         'firstName' => 'required|string|max:255',
//         'lastName' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required',
//     ]);

//     $validated['password'] = bcrypt($validated['password']);

//     $user = User::create($validated);

//     Auth::login($user);

//     return redirect()->route('home');
// }

public function store(Request $request)
{
    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            function ($attribute, $value, $fail) use ($request) {
                $senha = strtolower($value);
                $firstName = strtolower($request->firstName);
                $lastName = strtolower($request->lastName);
                $email = strtolower($request->email);

                if (strpos($senha, $firstName) !== false) {
                    $fail('A senha não pode conter o primeiro nome.');
                }
                if (strpos($senha, $lastName) !== false) {
                    $fail('A senha não pode conter o sobrenome.');
                }
                if (strpos($senha, $email) !== false) {
                    $fail('A senha não pode conter o e-mail.');
                }
            },
        ],
    ]);

    $validated['password'] = bcrypt($validated['password']);

    $user = User::create($validated);

    Auth::login($user);

    return redirect()->route('home');
}



    // Metodo utilizado pelo estudo
    
    /**  public function store(Request $request)
    *{
     *   $user = $request->all();
     *  $user['password'] = bcrypt($request->password);
     *  $user = User::create($user); */

    //    Auth::login($user);

    //    return redirect()->route('admin.dashboard');
    // }

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
