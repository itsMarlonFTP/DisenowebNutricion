@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">Bienvenido a NutriFit</h1>
                    <p class="lead">Tu plataforma personalizada para una vida más saludable</p>
                    <div class="mt-4">
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg me-3">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Registrarse</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/600x400" alt="Nutrición Saludable" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <!-- Características -->
    <div class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">¿Por qué elegir NutriFit?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                            <h3>Planes Personalizados</h3>
                            <p>Recibe planes de alimentación adaptados a tus necesidades y objetivos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                            <h3>Seguimiento de Progreso</h3>
                            <p>Monitorea tu evolución y alcanza tus metas de manera efectiva.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>
                            <h3>Comunidad Activa</h3>
                            <p>Únete a una comunidad de personas comprometidas con su salud.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-light py-5">
        <div class="container text-center">
            <h2>¿Listo para comenzar tu viaje hacia una vida más saludable?</h2>
            <p class="lead">Únete a NutriFit hoy y comienza tu transformación</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Crear Cuenta Gratuita</a>
        </div>
    </div>
</div>
@endsection 