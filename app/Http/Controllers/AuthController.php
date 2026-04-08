<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Login;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Login::estaLogueado()) return redirect('/dashboard');
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (Login::autenticar($request->username, $request->password)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('error', 'Usuario o contraseña incorrectos');
    }

    public function logout(Request $request)
    {
        Login::cerrarSesion();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}