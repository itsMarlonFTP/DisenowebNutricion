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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($recipes as $recipe)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $recipe->image_url ?? 'https://source.unsplash.com/random/300x200/?food,' . urlencode($recipe->category) }}" 
                         class="card-img-top" 
                         alt="{{ $recipe->recipename }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->recipename }}</h5>
                        <p class="card-text">{{ Str::limit($recipe->descripcion, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">{{ $recipe->category }}</span>
                            <button type="button" 
                                    class="btn btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#recipeModal{{ $recipe->id }}">
                                Ver Detalles
                            </button>
                        </div>
                    </div>
                    @if(auth()->user()->role === 'admin')
                        <div class="card-footer">
                            <div class="btn-group w-100" role="group">
                                <button type="button" 
                                        class="btn btn-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal{{ $recipe->id }}">
                                    <i class="fas fa-edit me-1"></i>Actualizar
                                </button>
                                <form action="{{ route('recipes.eliminar', $recipe->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger" 
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta receta?')">
                                        <i class="fas fa-trash me-1"></i>Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Modal para ver detalles -->
            <div class="modal fade" id="recipeModal{{ $recipe->id }}" tabindex="-1" aria-labelledby="recipeModalLabel{{ $recipe->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="recipeModalLabel{{ $recipe->id }}">{{ $recipe->recipename }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $recipe->image_url ?? 'https://source.unsplash.com/random/600x400/?food,' . urlencode($recipe->category) }}" 
                                         class="img-fluid rounded mb-3" 
                                         alt="{{ $recipe->recipename }}">
                                </div>
                                <div class="col-md-6">
                                    <h6>Información Nutricional</h6>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Calorías
                                            <span class="badge bg-primary rounded-pill">{{ $recipe->calories }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Proteína
                                            <span class="badge bg-primary rounded-pill">{{ $recipe->protein }}g</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Carbohidratos
                                            <span class="badge bg-primary rounded-pill">{{ $recipe->carbs }}g</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Grasas
                                            <span class="badge bg-primary rounded-pill">{{ $recipe->fats }}g</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h6>Ingredientes</h6>
                                    <p>{{ $recipe->ingredients }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Instrucciones</h6>
                                    <p>{{ $recipe->instructions }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(auth()->user()->role === 'admin')
                @include('recipes.actualizar')
            @endif
        @endforeach
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-4" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection