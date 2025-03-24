<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
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
        return view('recipes.crear');
    }

    /**
     * Guarda una nueva receta
     */
    public function guardarNueva(Request $request)
    {
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
        return view('recipes.actualizar', compact('recipe'));
    }

    /**
     * Actualiza una receta existente
     */
    public function guardar(Request $request, Recipe $recipe)
    {
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
    public function eliminar(Request $request)
    {
        $recipe = Recipe::findOrFail($request->IdRecipe);
        
        if ($recipe->userID !== auth()->id()) {
            return redirect()->route('recipes.leer')
                ->with('error', 'No tiene permiso para eliminar esta receta.');
        }

        $recipe->delete();

        return redirect()->route('recipes.leer')
            ->with('success', '¡Receta eliminada exitosamente!');
    }
}
