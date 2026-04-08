<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;

class SalidaController extends Controller
{
    public function create()
    {
        return view('salidas.registrar', ['error' => null, 'success' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo'  => 'required|string',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $facturaRuta = null;
        if ($request->hasFile('factura')) {
            $archivo = $request->file('factura');
            $nombre  = 'salida_' . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads'), $nombre);
            $facturaRuta = 'uploads/' . $nombre;
        }

        Salida::create([
            'tipo'         => $request->tipo,
            'monto'        => $request->monto,
            'fecha'        => $request->fecha,
            'factura_ruta' => $facturaRuta,
        ]);

        return view('salidas.registrar', [
            'error'   => null,
            'success' => 'Salida registrada correctamente'
        ]);
    }

    public function index()
    {
        $salidas = Salida::obtenerTodas();
        return view('salidas.listado', compact('salidas'));
    }
}