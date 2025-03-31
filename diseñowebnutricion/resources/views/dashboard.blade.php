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
                            <h6 class="card-title mb-0">Tickets Pendientes</h6>
                            <h2 class="mt-2 mb-0">{{ \App\Models\Ticket::where('status', 'pending')->count() }}</h2>
                        </div>
                        <div class="fs-1">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actividad Reciente y Gráfica -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tickets Recientes</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach(\App\Models\Ticket::with('user')->latest()->take(5)->get() as $ticket)
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $ticket->title }}</h6>
                                    <small>{{ $ticket->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ $ticket->user->name }} - {{ $ticket->description }}</p>
                                <span class="badge bg-{{ $ticket->status === 'completed' ? 'success' : ($ticket->status === 'in_progress' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Estado de Recetas</h5>
                </div>
                <div class="card-body">
                    <canvas id="recipesChart" height="200"></canvas>
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
                    <i class="fas fa-ticket-alt fa-3x text-info mb-3"></i>
                    <h5>Gestionar Tickets</h5>
                    <p class="text-muted">Administra las solicitudes de recetas</p>
                    <a href="{{ route('tickets.index') }}" class="btn btn-info text-white">Ir a Tickets</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('recipesChart').getContext('2d');
    const recipesData = {
        labels: ['Pendientes', 'En Progreso', 'Completadas'],
        datasets: [{
            data: [
                {{ \App\Models\Ticket::where('status', 'pending')->count() }},
                {{ \App\Models\Ticket::where('status', 'in_progress')->count() }},
                {{ \App\Models\Ticket::where('status', 'completed')->count() }}
            ],
            backgroundColor: [
                '#6c757d',
                '#ffc107',
                '#198754'
            ]
        }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: recipesData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
@endsection 