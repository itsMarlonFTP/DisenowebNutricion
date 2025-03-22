@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-utensils me-2"></i>Recipe Collection</h4>
        </div>
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Recipe Name</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Ingredientes</th>
                            <th scope="col">Instrucciones</th>
                            <th scope="col" class="text-center">Nutritional Info</th>
                            <th scope="col">Categoría</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                        <tr>
                            <td class="fw-bold">{{ $recipe->recipename }}</td>
                            <td>{{ Str::limit($recipe->descripcion, 50) }}</td>
                            <td>{{ Str::limit($recipe->ingredients, 50) }}</td>
                            <td>{{ Str::limit($recipe->instructions, 50) }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="badge bg-info text-dark me-1" title="Calories">
                                        <i class="fas fa-fire me-1"></i>{{ $recipe->calories }}
                                    </div>
                                    <div class="badge bg-success me-1" title="Protein">
                                        <i class="fas fa-dumbbell me-1"></i>{{ $recipe->protein }}g
                                    </div>
                                    <div class="badge bg-warning text-dark me-1" title="Carbs">
                                        <i class="fas fa-bread-slice me-1"></i>{{ $recipe->carbs }}g
                                    </div>
                                    <div class="badge bg-danger" title="Fats">
                                        <i class="fas fa-cheese me-1"></i>{{ $recipe->fats }}g
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-secondary">{{ $recipe->category }}</span></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $recipe->id }}">
                                    <i class="fas fa-edit me-1"></i>Update
                                </button>
                                @include('recipes.actualizar')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .card {
        border-radius: 0.75rem;
        overflow: hidden;
    }
    
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table {
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    
    .table td {
        vertical-align: middle;
        padding: 0.75rem;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }
</style>
@endsection