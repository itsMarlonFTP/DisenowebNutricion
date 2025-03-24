<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipes::latest()->paginate(10);
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipename' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|array',
            'instructions' => 'required|array',
            'preparation_time' => 'required|integer',
            'cooking_time' => 'required|integer',
            'servings' => 'required|integer',
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string',
            'difficulty_level' => 'required|in:fácil,medio,difícil',
            'image_url' => 'nullable|url'
        ]);

        $validated['created_by'] = auth()->id();
        
        Recipes::create($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Receta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipe)
    {
        $validated = $request->validate([
            'recipename' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|array',
            'instructions' => 'required|array',
            'preparation_time' => 'required|integer',
            'cooking_time' => 'required|integer',
            'servings' => 'required|integer',
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string',
            'difficulty_level' => 'required|in:fácil,medio,difícil',
            'image_url' => 'nullable|url'
        ]);

        $recipe->update($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Receta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Receta eliminada exitosamente.');
    }
}
