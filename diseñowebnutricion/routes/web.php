<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes/crear', [RecipeController::class, 'crear'])->name('recipes.crear');
Route::post('/recipes/store', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/leer', [RecipeController::class, 'leer'])->name('recipes.leer');