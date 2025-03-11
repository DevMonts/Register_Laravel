<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogarUsuarioController extends Controller
{
    public function showLoginForm()
    {
        return view('client_list');
    }
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('client_list');
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Credenciais incorretas.']);
        }
    }
}
