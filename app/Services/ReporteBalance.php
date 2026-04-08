<?php

namespace App\Services;

use App\Models\Entrada;
use App\Models\Salida;

class ReporteBalance
{
    public float $totalEntradas;
    public float $totalSalidas;
    public float $balance;
    public $entradas;
    public $salidas;

    public function __construct()
    {
        $this->entradas      = Entrada::obtenerTodas();
        $this->salidas       = Salida::obtenerTodas();
        $this->totalEntradas = (float) Entrada::obtenerTotal();
        $this->totalSalidas  = (float) Salida::obtenerTotal();
        $this->balance       = $this->totalEntradas - $this->totalSalidas;
    }

    // Obtener todos los datos del reporte
    public function obtenerDatos(): array
    {
        return [
            'entradas'      => $this->entradas,
            'salidas'       => $this->salidas,
            'totalEntradas' => $this->totalEntradas,
            'totalSalidas'  => $this->totalSalidas,
            'balance'       => $this->balance
        ];
    }
}