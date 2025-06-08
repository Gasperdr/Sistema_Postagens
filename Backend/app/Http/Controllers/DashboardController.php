<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    // -- Uma maneira de usar Middleware 

    // public function __construct() {
    //     $this->middleware('auth')->only('index');
        
    // }
    
    public function index(Request $request) {
        return view('admin.dashboard');
    }
}
