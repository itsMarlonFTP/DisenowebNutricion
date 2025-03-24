<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Rutas públicas
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage');

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    
    // Rutas de recetas
    Route::get('/recipes', [RecipeController::class, 'leer'])->name('recipes.leer');
    Route::get('/recipes/crear', [RecipeController::class, 'crear'])->name('recipes.crear');
    Route::post('/recipes', [RecipeController::class, 'guardarNueva'])->name('recipes.guardarNueva');
    Route::get('/recipes/{recipe}', [RecipeController::class, 'ver'])->name('recipes.ver');
    Route::get('/recipes/{recipe}/actualizar', [RecipeController::class, 'actualizar'])->name('recipes.actualizar');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'guardar'])->name('recipes.guardar');
    Route::post('/recipes/eliminar', [RecipeController::class, 'eliminar'])->name('recipes.eliminar');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
