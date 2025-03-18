<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogarUsuarioController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        return Auth::attempt($credentials)
            ? redirect()->route('home')
            : back()->withErrors(['email' => 'Credenciais incorretas.'])->withInput();
    }
}
