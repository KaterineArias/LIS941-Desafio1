<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class Login
{
    // Autenticar usuario con username y password
    public static function autenticar(string $username, string $password): bool
    {
        return Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);
    }

    // Cerrar sesión
    public static function cerrarSesion(): void
    {
        Auth::logout();
    }

    // Verificar si hay sesión activa
    public static function estaLogueado(): bool
    {
        return Auth::check();
    }

    // Obtener usuario actual
    public static function usuarioActual()
    {
        return Auth::user();
    }
}