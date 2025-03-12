<?php

use App\Http\Controllers\LogarUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarUsuarioController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', [RegistrarUsuarioController::class, 'showForm']);
Route::post('/registro', [RegistrarUsuarioController::class, 'registro']);

Route::post('/client_painel', [LogarUsuarioController::class, 'login']);

Route::get('/client_list', function () {
    return view('client_list');
})->name('client_list');
