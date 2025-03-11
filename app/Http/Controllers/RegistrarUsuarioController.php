<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrarUsuarioController
{
    public function showForm()
    {
        return view('registro');
    }

    public function registro(Request $request)
    {
        $request->validate(
            [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            ],
            [
                'name.required' => 'Nome obrigatório.',
                'password.confirmed' => 'As senhas não correspondem.',
                'password.min' => 'Sua senha deve ter no mínimo 8 caractéres.'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->route('painel');
    }
}
