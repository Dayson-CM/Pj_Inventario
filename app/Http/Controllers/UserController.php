<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); // Obtiene todos los usuarios de la base de datos
        return view('users.usuarios', compact('users')); // Envía los datos a la vista
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|string|in:user,admin'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.usuarios')->with('success', 'Usuario creado correctamente');
    }

    public function destroy($id)
    {
        // Buscar al usuario por su ID
        $user = User::find($id);

        if ($user) {
            $user->delete(); // Eliminar al usuario
            return redirect()->route('users.usuarios')->with('success', 'Usuario eliminado correctamente.');
        }

        return redirect()->route('users.usuarios')->with('error', 'Usuario no encontrado.');
    }
}
