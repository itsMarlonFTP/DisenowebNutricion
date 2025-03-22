@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-danger">
                <div class="card-header bg-danger text-white d-flex align-items-center">
                    <i class="fas fa-trash-alt me-2 fs-4"></i>
                    <h5 class="card-title mb-0">Delete a Recipe</h5>
                </div>
                
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="alert alert-warning mb-4">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Warning:</strong> This action cannot be undone. Please be certain before deleting a recipe.
                    </div>
                    
                    <form method="POST" action="{{ route('recipes.destroy') }}">
                        @csrf 
                        <div class="form-group mb-4">
                            <label for="IdRecipe" class="form-label fw-bold">Recipe ID:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <input type="text" id="IdRecipe" name="IdRecipe" class="form-control" required placeholder="Enter the recipe ID">
                            </div>
                            <div class="form-text text-muted">Enter the ID of the recipe you want to delete</div>
                        </div>
                       
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-secondary mb-2" onclick="window.history.back()">
                                <i class="fas fa-arrow-left me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt me-2"></i>Delete Recipe
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
        border-width: 1px;
    }
    
    .card-header {
        border-top-left-radius: calc(0.75rem - 1px) !important;
        border-top-right-radius: calc(0.75rem - 1px) !important;
    }
    
    .btn {
        border-radius: 0.5rem;
        padding: 0.5rem 1.5rem;
    }
    
    .alert {
        border-radius: 0.5rem;
    }
    
    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }
</style>
@endsection