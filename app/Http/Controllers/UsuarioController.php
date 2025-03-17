<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all(); // trae datos de la dbb
        return view('usuarios.index', compact('usuarios')); // envia datos a la vista
    }

    public function create()
    {
        return view('usuarios.create'); // envia datos a la vista
    }

    
    public function store(Request $request)
    {
        // valida datos entrantes
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email|max:255',
            'password' => 'required|string|min:6',
        ]);
    
        // Crea un usuario
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password), // encripta contraseña
        ]);
    
        // regresa a lista de usuario on mensaje exitoso
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }

    
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id); // Buscar al usuario por ID o lanzar un error 404
        return view('usuarios.edit', compact('usuario')); 
    }

    public function update(Request $request, $id)
    {
         // Validar los datos ingresados
        $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email,' . $id,
        'password' => 'nullable|min:6', 
    ]);

        // Buscar al usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Actualizar los datos del usuario
        $usuario->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => $request->password ? bcrypt($request->password) : $usuario->password, // Actualizar contraseña si se envía
        'created_at' => $request->created_at,
        'updated_at' => $request->updated_at,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id); // Buscar al usuario, lanzar 404 si no existe
        $usuario->delete(); // Eliminar el usuario
    
        // Redirigir a la lista de usuarios con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
