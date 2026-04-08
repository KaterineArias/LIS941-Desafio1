<?php

namespace App\Http\Controllers;

use App\Services\ReporteBalance;

class BalanceController extends Controller
{
    public function index()
    {
        $reporte = new ReporteBalance();
        $datos   = $reporte->obtenerDatos();

        return view('balance', $datos);
    }
}