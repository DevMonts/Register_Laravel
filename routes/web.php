<?php

use App\Http\Controllers\LogarUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarUsuarioController;

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/registro', [RegistrarUsuarioController::class, 'showForm']);
Route::post('/registro', [RegistrarUsuarioController::class, 'registro']);

Route::view('/painel', 'dashboard')->middleware('auth')->name('painel');
Route::post('/client_painel', [LogarUsuarioController::class, 'login']);