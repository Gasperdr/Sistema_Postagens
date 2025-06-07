<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostagemController;


Route::get('/', [PostagemController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('postagens', PostagemController::class);

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');

Route::get('/register', [LoginController::class, 'create'])->name('login.create');