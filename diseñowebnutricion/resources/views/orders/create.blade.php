@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Crear Nueva Orden de Plan de Nutrición</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('orders.store') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="plan_type" class="form-label">Tipo de Plan</label>
                            <select id="plan_type" name="plan_type" class="form-select @error('plan_type') is-invalid @enderror" required>
                                <option value="">Selecciona un plan</option>
                                <option value="Plan Básico">Plan Básico - $49.99</option>
                                <option value="Plan Premium">Plan Premium - $99.99</option>
                                <option value="Plan Personalizado">Plan Personalizado - $149.99</option>
                            </select>
                            @error('plan_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="requirements" class="form-label">Requisitos Específicos</label>
                            <textarea id="requirements" name="requirements" class="form-control @error('requirements') is-invalid @enderror" rows="4" required placeholder="Describe tus objetivos, restricciones alimentarias y cualquier otra información relevante"></textarea>
                            @error('requirements')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" required min="0" step="0.01">
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Crear Orden</button>
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