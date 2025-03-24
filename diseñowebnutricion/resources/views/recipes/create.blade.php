@extends('layouts.app')

@section('title', 'Nueva Receta - NutriFit')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Nueva Receta</h1>
            <p class="lead">Crea una nueva receta para tu catálogo</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('recipes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="recipename" class="form-label">Nombre de la Receta</label>
                            <input type="text" class="form-control @error('recipename') is-invalid @enderror" 
                                id="recipename" name="recipename" value="{{ old('recipename') }}" required>
                            @error('recipename')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredientes</label>
                            <textarea class="form-control @error('ingredients') is-invalid @enderror" 
                                id="ingredients" name="ingredients" rows="5" required>{{ old('ingredients') }}</textarea>
                            <small class="text-muted">Ingresa cada ingrediente en una nueva línea</small>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instrucciones</label>
                            <textarea class="form-control @error('instructions') is-invalid @enderror" 
                                id="instructions" name="instructions" rows="5" required>{{ old('instructions') }}</textarea>
                            <small class="text-muted">Ingresa cada paso en una nueva línea</small>
                            @error('instructions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="preparation_time" class="form-label">Tiempo de Preparación (min)</label>
                                <input type="number" class="form-control @error('preparation_time') is-invalid @enderror" 
                                    id="preparation_time" name="preparation_time" value="{{ old('preparation_time') }}" required>
                                @error('preparation_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cooking_time" class="form-label">Tiempo de Cocción (min)</label>
                                <input type="number" class="form-control @error('cooking_time') is-invalid @enderror" 
                                    id="cooking_time" name="cooking_time" value="{{ old('cooking_time') }}" required>
                                @error('cooking_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="servings" class="form-label">Porciones</label>
                                <input type="number" class="form-control @error('servings') is-invalid @enderror" 
                                    id="servings" name="servings" value="{{ old('servings') }}" required>
                                @error('servings')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="calories" class="form-label">Calorías</label>
                                <input type="number" class="form-control @error('calories') is-invalid @enderror" 
                                    id="calories" name="calories" value="{{ old('calories') }}" required>
                                @error('calories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="protein" class="form-label">Proteínas (g)</label>
                                <input type="number" step="0.1" class="form-control @error('protein') is-invalid @enderror" 
                                    id="protein" name="protein" value="{{ old('protein') }}" required>
                                @error('protein')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="carbs" class="form-label">Carbohidratos (g)</label>
                                <input type="number" step="0.1" class="form-control @error('carbs') is-invalid @enderror" 
                                    id="carbs" name="carbs" value="{{ old('carbs') }}" required>
                                @error('carbs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="fats" class="form-label">Grasas (g)</label>
                                <input type="number" step="0.1" class="form-control @error('fats') is-invalid @enderror" 
                                    id="fats" name="fats" value="{{ old('fats') }}" required>
                                @error('fats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Categoría</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                    id="category" name="category" value="{{ old('category') }}" required>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="difficulty_level" class="form-label">Nivel de Dificultad</label>
                                <select class="form-select @error('difficulty_level') is-invalid @enderror" 
                                    id="difficulty_level" name="difficulty_level" required>
                                    <option value="">Selecciona un nivel</option>
                                    <option value="fácil" {{ old('difficulty_level') == 'fácil' ? 'selected' : '' }}>Fácil</option>
                                    <option value="medio" {{ old('difficulty_level') == 'medio' ? 'selected' : '' }}>Medio</option>
                                    <option value="difícil" {{ old('difficulty_level') == 'difícil' ? 'selected' : '' }}>Difícil</option>
                                </select>
                                @error('difficulty_level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">URL de la Imagen</label>
                            <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                                id="image_url" name="image_url" value="{{ old('image_url') }}">
                            @error('image_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Guardar Receta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 