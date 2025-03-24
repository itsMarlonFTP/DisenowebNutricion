@extends('layouts.app')

@section('title', 'Recetas - NutriFit')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Recetas</h1>
            <p class="lead">Gestiona tu catálogo de recetas</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Nueva Receta
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($recipes as $recipe)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($recipe->image_url)
                        <img src="{{ $recipe->image_url }}" class="card-img-top" alt="{{ $recipe->recipename }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe->recipename }}</h5>
                        <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">{{ $recipe->category }}</span>
                            <span class="badge bg-secondary">{{ $recipe->difficulty_level }}</span>
                        </div>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-fire me-1"></i>{{ $recipe->calories }} kcal
                                <i class="fas fa-drumstick-bite ms-2 me-1"></i>{{ $recipe->protein }}g
                                <i class="fas fa-bread-slice ms-2 me-1"></i>{{ $recipe->carbs }}g
                                <i class="fas fa-cheese ms-2 me-1"></i>{{ $recipe->fats }}g
                            </small>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100">
                            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-primary">
                                <i class="fas fa-eye me-2"></i>Ver
                            </a>
                            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-edit me-2"></i>Editar
                            </a>
                            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta receta?')">
                                    <i class="fas fa-trash me-2"></i>Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">
                    No hay recetas disponibles. <a href="{{ route('recipes.create') }}">Crea tu primera receta</a>.
                </div>
            </div>
        @endforelse
    </div>

    <div class="row mt-4">
        <div class="col">
            {{ $recipes->links() }}
        </div>
    </div>
</div>
@endsection 