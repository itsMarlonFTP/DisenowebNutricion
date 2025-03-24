@extends('layouts.app')

@section('title', 'Dashboard - NutriFit')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="display-4">Dashboard</h1>
            <p class="lead">Bienvenido, {{ Auth::user()->name }}. Aquí podrás gestionar tu plataforma de nutrición.</p>
        </div>
        <div class="col-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-share-alt me-2"></i>Compartir
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-download me-2"></i>Exportar
                </button>
            </div>
        </div>
    </div>

    <!-- Tarjetas de Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Usuarios</h6>
                            <h2 class="mt-2 mb-0">{{ \App\Models\User::count() }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Recetas Activas</h6>
                            <h2 class="mt-2 mb-0">{{ \App\Models\Recipe::count() }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-utensils"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Planes Activos</h6>
                            <h2 class="mt-2 mb-0">12</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actividad Reciente -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actividad Reciente</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Nuevo usuario registrado</h6>
                                <small>Hace 3 minutos</small>
                            </div>
                            <p class="mb-1">Juan Pérez se ha unido a la plataforma</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Nueva receta agregada</h6>
                                <small>Hace 1 hora</small>
                            </div>
                            <p class="mb-1">Ensalada Mediterránea</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Plan de nutrición actualizado</h6>
                                <small>Hace 2 horas</small>
                            </div>
                            <p class="mb-1">Plan Premium - María González</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Próximos Eventos</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Taller de Nutrición</h6>
                                <small>Mañana, 10:00 AM</small>
                            </div>
                            <p class="mb-1">Sesión informativa sobre hábitos saludables</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Actualización del Sistema</h6>
                                <small>Próxima semana</small>
                            </div>
                            <p class="mb-1">Nuevas características y mejoras</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                    <h5>Gestionar Usuarios</h5>
                    <p class="text-muted">Añade, edita o elimina usuarios del sistema</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Ir a Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-utensils fa-3x text-success mb-3"></i>
                    <h5>Gestionar Recetas</h5>
                    <p class="text-muted">Administra el catálogo de recetas</p>
                    <a href="{{ route('recipes.leer') }}" class="btn btn-success">Ir a Recetas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-chart-bar fa-3x text-info mb-3"></i>
                    <h5>Ver Estadísticas</h5>
                    <p class="text-muted">Analiza el rendimiento de la plataforma</p>
                    <a href="#" class="btn btn-info text-white">Ver Estadísticas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 