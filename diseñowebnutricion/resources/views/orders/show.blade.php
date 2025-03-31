@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Detalles de la Orden #{{ $order->id }}</h5>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Volver
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Información del Cliente</h6>
                            <p><strong>Nombre:</strong> {{ $order->user->name }}</p>
                            <p><strong>Email:</strong> {{ $order->user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Estado de la Orden</h6>
                            <span class="badge bg-{{ $order->status === 'delivered' ? 'success' : 
                                ($order->status === 'cancelled' ? 'danger' : 
                                ($order->status === 'in_progress' ? 'primary' : 
                                ($order->status === 'in_route' ? 'warning' : 'secondary'))) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Detalles del Plan</h6>
                            <p><strong>Tipo de Plan:</strong> {{ $order->plan_type }}</p>
                            <p><strong>Precio:</strong> ${{ number_format($order->price, 2) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Fechas</h6>
                            <p><strong>Fecha de Creación:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            @if($order->delivered_at)
                                <p><strong>Fecha de Entrega:</strong> {{ $order->delivered_at->format('d/m/Y H:i') }}</p>
                            @endif
                            @if($order->cancelled_at)
                                <p><strong>Fecha de Cancelación:</strong> {{ $order->cancelled_at->format('d/m/Y H:i') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted">Requisitos Específicos</h6>
                        <p class="border rounded p-3 bg-light">{{ $order->requirements }}</p>
                    </div>

                    @if($order->route_photo || $order->delivery_photo)
                        <div class="mb-4">
                            <h6 class="text-muted">Evidencias</h6>
                            <div class="row">
                                @if($order->route_photo)
                                    <div class="col-md-6 mb-3">
                                        <h6>Foto en Ruta</h6>
                                        <img src="{{ Storage::url($order->route_photo) }}" alt="Foto en Ruta" class="img-fluid rounded">
                                    </div>
                                @endif
                                @if($order->delivery_photo)
                                    <div class="col-md-6 mb-3">
                                        <h6>Foto de Entrega</h6>
                                        <img src="{{ Storage::url($order->delivery_photo) }}" alt="Foto de Entrega" class="img-fluid rounded">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if($order->status !== 'cancelled' && $order->status !== 'delivered')
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta orden?')">
                                    <i class="fas fa-trash me-2"></i>Eliminar Orden
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 