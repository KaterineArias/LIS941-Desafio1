<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    public function create()
    {
        return view('entradas.registrar', ['error' => null, 'success' => null]);
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
            $nombre  = 'entrada_' . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move(public_path('uploads'), $nombre);
            $facturaRuta = 'uploads/' . $nombre;
        }

        Entrada::create([
            'tipo'         => $request->tipo,
            'monto'        => $request->monto,
            'fecha'        => $request->fecha,
            'factura_ruta' => $facturaRuta,
        ]);

        return view('entradas.registrar', [
            'error'   => null,
            'success' => 'Entrada registrada correctamente'
        ]);
    }

    public function index()
    {
        $entradas = Entrada::obtenerTodas();
        return view('entradas.listado', compact('entradas'));
    }
}