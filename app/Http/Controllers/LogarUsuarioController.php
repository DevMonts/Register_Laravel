<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LogarUsuarioController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            $messages = [
                'email.required' => 'Digite seu email.',
                'email.email' => 'Email inválido.',
                'password.required' => 'Digite sua senha.',
                'password.min' => 'A senha tem que ter pelo menos 8 digitos.'
            ]
        );
        return Auth::attempt($credentials)
            ? redirect()->route('home')
            : back()->withErrors(['email' => 'Credenciais incorretas.'])->withInput();
    }
}
