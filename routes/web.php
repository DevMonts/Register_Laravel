<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\LogarUsuarioController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', [RegistrarUsuarioController::class, 'showForm']);
Route::post('/registro', [RegistrarUsuarioController::class, 'registro']);

Route::post('/home', [LogarUsuarioController::class, 'login']);
Route::get('/home', [ClienteController::class, 'index'])->name('home');

Route::resource('clients', ClienteController::class);
