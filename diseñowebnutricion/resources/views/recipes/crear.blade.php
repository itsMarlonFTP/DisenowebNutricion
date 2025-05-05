@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Crear Nueva Receta</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('recipes.guardarNueva') }}" class="needs-validation" novalidate>
                        @csrf 
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="recipename" class="form-label">Nombre de la Receta</label>
                                <input type="text" id="recipename" name="recipename" class="form-control @error('recipename') is-invalid @enderror" required value="{{ old('recipename') }}">
                                @error('recipename')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Categoría</label>
                                <select id="category" name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Selecciona una categoría</option>
                                    <option value="Desayuno">Desayuno</option>
                                    <option value="Almuerzo">Almuerzo</option>
                                    <option value="Cena">Cena</option>
                                    <option value="Snack">Snack</option>
                                    <option value="Postre">Postre</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3" required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredientes</label>
                            <textarea id="ingredients" name="ingredients" class="form-control @error('ingredients') is-invalid @enderror" rows="4" required placeholder="Escribe cada ingrediente en una nueva línea">{{ old('ingredients') }}</textarea>
                            @error('ingredients')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instrucciones de Preparación</label>
                            <textarea id="instructions" name="instructions" class="form-control @error('instructions') is-invalid @enderror" rows="4" required placeholder="Escribe cada paso en una nueva línea">{{ old('instructions') }}</textarea>
                            @error('instructions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="calories" class="form-label">Calorías (kcal)</label>
                                <input type="number" id="calories" name="calories" class="form-control @error('calories') is-invalid @enderror" required min="0" step="1" value="{{ old('calories') }}">
                                @error('calories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="protein" class="form-label">Proteínas (g)</label>
                                <input type="number" id="protein" name="protein" class="form-control @error('protein') is-invalid @enderror" required min="0" step="0.1" value="{{ old('protein') }}">
                                @error('protein')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="carbs" class="form-label">Carbohidratos (g)</label>
                                <input type="number" id="carbs" name="carbs" class="form-control @error('carbs') is-invalid @enderror" required min="0" step="0.1" value="{{ old('carbs') }}">
                                @error('carbs')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fats" class="form-label">Grasas (g)</label>
                                <input type="number" id="fats" name="fats" class="form-control @error('fats') is-invalid @enderror" required min="0" step="0.1" value="{{ old('fats') }}">
                                @error('fats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('recipes.leer') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Receta</button>
                        </div>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection