<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrarClienteController
{
    public function showForm()
    {
        return view('dashboard');
    }
    public function registro_cliente(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users, email',
                'password' => 'required|confirmed|min:8'
            ],
            [
                'name.required' => 'Nome do cliente obrigatório.',
                'password.confirmed' => 'As senhas não correspondem.',
                'password.min' => 'Sua senha deve ter no múnimo 8 caractéres.'
            ]
        );
        $client = User::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_password' => $request->client_password
        ]);
        Auth::login($client);
        return redirect()->route('client_list');
    }
}
