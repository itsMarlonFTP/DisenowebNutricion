<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Mostrar una lista de los usuarios.
     */
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 usuarios por página
        return view('users.index', compact('users'));
    }

    /**
     * Mostrar el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Guardar un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'activity_level' => 'nullable|string',
            'allergies' => 'nullable|array',
            'goals' => 'nullable|array',
            'restrictions' => 'nullable|array',
        ]);

        // Crear usuario y cifrar la contraseña
        $validated['password'] = bcrypt($validated['password']);
        $validated['allergies'] = json_encode($validated['allergies']);
        $validated['goals'] = json_encode($validated['goals']);
        $validated['restrictions'] = json_encode($validated['restrictions']);
        
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Mostrar el formulario para editar un usuario existente.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Actualizar un usuario existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'activity_level' => 'nullable|string',
            'allergies' => 'nullable|array',
            'goals' => 'nullable|array',
            'restrictions' => 'nullable|array',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $validated['allergies'] = json_encode($validated['allergies']);
        $validated['goals'] = json_encode($validated['goals']);
        $validated['restrictions'] = json_encode($validated['restrictions']);
        
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar un usuario de la base de datos.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
