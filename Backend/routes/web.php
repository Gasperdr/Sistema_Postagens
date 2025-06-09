<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AlterarSenhaController;
use App\Http\Controllers\Auth\RecuperarSenhaController;



Route::resource('users', UserController::class);
Route::resource('post', PostController::class);

Route::get('/', [LoginController::class, 'create']);

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');

Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::delete('/admin/post/delete/{id}', [PostController::class, 'destroy'])->name('admin.delete');
Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.store');
Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/recuperarsenha', [AlterarSenhaController::class, 'form'])->name('recuperar.senha');
Route::post('/linkderecuperacao', [AlterarSenhaController::class, 'link'])->name('link.senha');
Route::get('/alterarsenha', [AlterarSenhaController::class, 'index'])->name('auth.senha');

Route::post('/novasenha', [RecuperarSenhaController::class, 'novaSenha'])->name('senha.nova');
Route::get('/senha/redefinir', [RecuperarSenhaController::class, 'form'])->name('senha.form');
// Route::get('/senha/redefinir/{token}', [RecuperarSenhaController::class, 'form'])->name('senha.form');
Route::get('/token', [AlterarSenhaController::class, 'index'])->name('token');