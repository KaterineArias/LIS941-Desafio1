<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\BalanceController;

// Rutas públicas
Route::get('/',      [AuthController::class, 'showLogin']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $totalEntradas = (float) \App\Models\Entrada::obtenerTotal();
        $totalSalidas  = (float) \App\Models\Salida::obtenerTotal();
        $balance       = $totalEntradas - $totalSalidas;
        $numEntradas   = \App\Models\Entrada::count();
        $numSalidas    = \App\Models\Salida::count();
        return view('dashboard', compact(
            'totalEntradas', 'totalSalidas',
            'balance', 'numEntradas', 'numSalidas'
        ));
    });

    Route::get('/entradas/registrar',  [EntradaController::class, 'create']);
    Route::post('/entradas/registrar', [EntradaController::class, 'store']);
    Route::get('/entradas',            [EntradaController::class, 'index']);

    Route::get('/salidas/registrar',   [SalidaController::class, 'create']);
    Route::post('/salidas/registrar',  [SalidaController::class, 'store']);
    Route::get('/salidas',             [SalidaController::class, 'index']);

    Route::get('/balance',             [BalanceController::class, 'index']);
});