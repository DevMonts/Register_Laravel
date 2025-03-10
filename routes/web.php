<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'showForm']);
Route::post('/register', [RegisteredUserController::class, 'register']);
