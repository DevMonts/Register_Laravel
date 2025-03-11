<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarUsuarioController;

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/registro', [RegistrarUsuarioController::class, 'showForm']);
Route::post('/registro', [RegistrarUsuarioController::class, 'registro']);
Route::view('/painel', 'dashboard')->middleware('auth')->name('painel');
