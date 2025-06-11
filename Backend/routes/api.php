<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/postagens', [PostController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::put('/postagens/{id}', [PostController::class, 'update']);
Route::get('/home', [PostController::class, 'index'])->name('home');