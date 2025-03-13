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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/clients', [ClienteController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClienteController::class, 'create'])->name('clients.create');
Route::get('/clients', [ClienteController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClienteController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClienteController::class, 'edit'])->name('clients.edit');
Route::get('/clients/{client}', [ClienteController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}', [ClienteController::class, 'destroy'])->name('clients.destroy');