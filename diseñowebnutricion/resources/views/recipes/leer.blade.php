@extends('layouts.app')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Recetas</h2>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('recipes.crear') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Crear Nueva Receta
            </a>
        @endif
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Recipe Name</th>
                <th scope="col">Descripción</th>
                <th scope="col">Ingredientes</th>
                <th scope="col">Instrucciones</th>
                <th scope="col">Calorías</th>
                <th scope="col">Proteína</th>
                <th scope="col">Carbohidratos</th>
                <th scope="col">Grasas</th>
                <th scope="col">Categoría</th>
                @if(auth()->user()->role === 'admin')
                    <th scope="col">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->recipename }}</td>
                    <td>{{ $recipe->descripcion }}</td>
                    <td>{{ $recipe->ingredients }}</td>
                    <td>{{ $recipe->instructions }}</td>
                    <td>{{ $recipe->calories }}</td>
                    <td>{{ $recipe->protein }}g</td>
                    <td>{{ $recipe->carbs }}g</td>
                    <td>{{ $recipe->fats }}g</td>
                    <td>{{ $recipe->category }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $recipe->id }}">
                                <i class="fas fa-edit me-1"></i>Actualizar
                            </button>
                            @include('recipes.actualizar')
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection