<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Verifica si el usuario actual es administrador
     */
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Muestra la lista de recetas
     */
    public function leer()
    {
        $recipes = Recipe::latest()->paginate(10);
        return view('recipes.leer', compact('recipes'));
    }

    /**
     * Muestra el formulario para crear una nueva receta
     */
    public function crear()
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }
        return view('recipes.crear');
    }

    /**
     * Guarda una nueva receta
     */
    public function guardarNueva(Request $request)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $validated = $request->validate([
            'recipename' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'calories' => 'required|numeric',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string'
        ]);

        $validated['userID'] = auth()->id();
        
        Recipe::create($validated);

        return redirect()->route('recipes.leer')
            ->with('success', '¡Receta creada exitosamente!');
    }

    /**
     * Muestra los detalles de una receta
     */
    public function ver(Recipe $recipe)
    {
        return view('recipes.ver', compact('recipe'));
    }

    /**
     * Muestra el formulario para editar una receta
     */
    public function actualizar(Recipe $recipe)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }
        return view('recipes.actualizar', compact('recipe'));
    }

    /**
     * Actualiza una receta existente
     */
    public function guardar(Request $request, Recipe $recipe)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $validated = $request->validate([
            'recipename' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'calories' => 'required|numeric',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string'
        ]);

        $recipe->update($validated);

        return redirect()->route('recipes.leer')
            ->with('success', '¡Receta actualizada exitosamente!');
    }

    /**
     * Elimina una receta
     */
    public function eliminar(Recipe $recipe)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $recipe->delete();

        return redirect()->route('recipes.leer')
            ->with('success', '¡Receta eliminada exitosamente!');
    }
}
