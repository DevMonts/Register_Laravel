<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\LogarUsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', [RegistrarUsuarioController::class, 'showForm']);
Route::post('/registro', [RegistrarUsuarioController::class, 'registro']);

Route::post('/home', [LogarUsuarioController::class, 'login']);
Route::get('/home', [ProdutoController::class, 'index'])->name('home')->middleware('auth');

Route::post('/logout', [LogarUsuarioController::class, 'logout'])->name('logout');
