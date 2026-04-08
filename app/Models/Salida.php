<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = ['tipo', 'monto', 'fecha', 'factura_ruta'];

    // Obtener total de salidas
    public static function obtenerTotal()
    {
        return self::sum('monto') ?? 0;
    }

    // Obtener todas ordenadas por fecha
    public static function obtenerTodas()
    {
        return self::orderBy('fecha', 'desc')->get();
    }
}