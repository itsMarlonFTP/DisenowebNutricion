<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;

class RecipeController extends Controller
{
    public function crear()
    {
        return view ("recipes.crear");
    }

    public function leer()
    {
        $recipes = Recipes::all();

        return view ("recipes.leer", compact('recipes'));
    }

    public function store(Request $request){
        $request->validate([
            'recipename'   => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'ingredients'  => 'required|string',
            'instructions' => 'required|string',
            'calories'     => 'required|integer|min:0',
            'protein'      => 'required|numeric|min:0',
            'carbs'        => 'required|numeric|min:0',
            'fats'         => 'required|numeric|min:0',
            'category'     => 'required|string|max:255',
        ]);

        $recipe = new Recipes();
        $recipe->recipename = $request->recipename;
        $recipe->descripcion = $request->descripcion;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->calories = $request->calories;
        $recipe->protein = $request->protein;
        $recipe->carbs = $request->carbs;
        $recipe->fats = $request->fats;
        $recipe->category = $request->category;

        $recipe->save();


        return redirect()->back()->with('success', 'Recipe created successfully!');
    }
}
