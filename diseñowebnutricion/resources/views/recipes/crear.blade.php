@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-utensils me-2"></i>Add New Recipe</h4>
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('recipes.store') }}" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Basic Information -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                            
                            <div class="mb-3">
                                <label for="recipename" class="form-label">Recipe Name:</label>
                                <input type="text" id="recipename" name="recipename" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Description:</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="category" class="form-label">Category:</label>
                                <select id="category" name="category" class="form-select" required>
                                    <option value="" selected disabled>Select category...</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="Dessert">Dessert</option>
                                    <option value="Snack">Snack</option>
                                    <option value="Beverage">Beverage</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Ingredients and Instructions -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2"><i class="fas fa-list-ul me-2"></i>Preparation</h5>
                            
                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Ingredients:</label>
                                <textarea id="ingredients" name="ingredients" class="form-control" rows="4" placeholder="Enter each ingredient on a separate line" required></textarea>
                                <div class="form-text">Separate each ingredient with a new line</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="instructions" class="form-label">Instructions:</label>
                                <textarea id="instructions" name="instructions" class="form-control" rows="5" placeholder="Describe the steps to prepare the recipe" required></textarea>
                            </div>
                        </div>
                        
                        <!-- Nutritional Information -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2"><i class="fas fa-heartbeat me-2"></i>Nutritional Information</h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="calories" class="form-label">Calories (kcal):</label>
                                    <input type="number" min="0" id="calories" name="calories" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="protein" class="form-label">Protein (g):</label>
                                    <input type="number" min="0" step="0.1" id="protein" name="protein" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="carbs" class="form-label">Carbs (g):</label>
                                    <input type="number" min="0" step="0.1" id="carbs" name="carbs" class="form-control" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="fats" class="form-label">Fats (g):</label>
                                    <input type="number" min="0" step="0.1" id="fats" name="fats" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary me-md-2" onclick="window.history.back()">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Recipe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 0.75rem;
    }
    
    .card-header {
        border-top-left-radius: 0.75rem !important;
        border-top-right-radius: 0.75rem !important;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
@endsection

@section('scripts')
<script>
    // Form validation
    (function() {
        'use strict';
        
        var forms = document.querySelectorAll('.needs-validation');
        
        Array.from(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection
