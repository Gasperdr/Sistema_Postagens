<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;



Route::resource('users', UserController::class);
Route::resource('post', PostController::class);

Route::get('/', [PostController::class, 'index']);

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');

Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::delete('/admin/post/delete/{id}', [PostController::class, 'destroy'])->name('admin.delete');
Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.store');
Route::get('/admin/create', [PostController::class, 'create'])->name('admin.create');