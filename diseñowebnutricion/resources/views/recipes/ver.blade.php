@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">{{ $recipe->recipename }}</h1>
            <p class="lead">Detalles de la receta</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('recipes.leer') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title">Descripción</h5>
                    <p class="card-text">{{ $recipe->descripcion }}</p>

                    <h5 class="card-title mt-4">Ingredientes</h5>
                    <p class="card-text">{{ $recipe->ingredients }}</p>

                    <h5 class="card-title mt-4">Instrucciones</h5>
                    <p class="card-text">{{ $recipe->instructions }}</p>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">Información Nutricional</h5>
                            <ul class="list-unstyled">
                                <li><strong>Calorías:</strong> {{ $recipe->calories }} kcal</li>
                                <li><strong>Proteínas:</strong> {{ $recipe->protein }}g</li>
                                <li><strong>Carbohidratos:</strong> {{ $recipe->carbs }}g</li>
                                <li><strong>Grasas:</strong> {{ $recipe->fats }}g</li>
                            </ul>
                            <h5 class="card-title mt-3">Categoría</h5>
                            <p class="card-text">{{ $recipe->category }}</p>
                        </div>
                    </div>

                    @if(auth()->id() === $recipe->userID)
                        <div class="mt-3">
                            <a href="{{ route('recipes.actualizar', $recipe) }}" class="btn btn-warning w-100">
                                <i class="fas fa-edit me-2"></i>Editar Receta
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 