<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

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
    Route::get('/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('toggle.admin');

    // Rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Rutas de recetas
    Route::get('/recipes', [RecipeController::class, 'leer'])->name('recipes.leer');

    // Rutas de recetas (solo admin)
    Route::middleware(['auth'])->group(function () {
        Route::get('/recipes/crear', [RecipeController::class, 'crear'])->name('recipes.crear');
        Route::post('/recipes', [RecipeController::class, 'guardarNueva'])->name('recipes.guardarNueva');
        Route::get('/recipes/{recipe}/editar', [RecipeController::class, 'actualizar'])->name('recipes.actualizar');
        Route::put('/recipes/{recipe}', [RecipeController::class, 'guardar'])->name('recipes.guardar');
        Route::delete('/recipes/{recipe}', [RecipeController::class, 'eliminar'])->name('recipes.eliminar');
    });

    // Ruta para ver detalles de una receta (debe ir después de las rutas específicas)
    Route::get('/recipes/{recipe}', [RecipeController::class, 'ver'])->name('recipes.ver');

    // Rutas de órdenes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
    Route::post('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');

    // Rutas de tickets
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
