<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caso;
use App\Models\Usuario;

class CasoController extends Controller
{
    public function index()
    {
        $casos = Caso::with('usuario')->get();
        return view('casos.index', compact('casos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('casos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'usuario_id' => 'required',
            'facturacion' => 'required',
            
        ]);

        try {
            $caso = Caso::create($request->all());
            return redirect()->route('casos.index')->with('success', 'Caso creado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el caso: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $caso = Caso::findOrFail($id);
        $usuarios = Usuario::all();
        return view('casos.edit', compact('caso', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $caso = Caso::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'estado' => 'required|in:abierto,en proceso,cerrado',
            'facturacion' => 'required',
        ]);

        $caso->update($request->all());

        return redirect()->route('casos.index')->with('success', 'Caso actualizado correctamente.');
    }

    public function destroy($id)
    {
        Caso::findOrFail($id)->delete();
        return redirect()->route('casos.index')->with('success', 'Caso eliminado correctamente.');
    }
}
