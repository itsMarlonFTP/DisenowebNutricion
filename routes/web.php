<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes/crear', [RecipeController::class, 'crear'])->name('recipes.crear');
Route::post('/recipes/store', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/leer', [RecipeController::class, 'leer'])->name('recipes.leer');
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');

Route::get('/recipes/eliminar', [RecipeController::class, 'eliminar'])->name('recipes.eliminar');
Route::post('/recipes/destroy', [RecipeController::class, 'destroy'])->name('recipes.destroy');

Route::get('/users/crear', [UserController::class, 'create'])->name('users.crear');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/leer', [UserController::class, 'index'])->name('users.leer');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::get('/users/eliminar', [UserController::class, 'edit'])->name('users.eliminar');
Route::post('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
