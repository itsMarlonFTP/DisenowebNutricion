@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Órdenes Archivadas</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left me-2"></i>Volver a Órdenes Activas
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Tipo de Plan</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Fecha de Archivado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->plan_type }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->status === 'delivered' ? 'success' : 
                                        ($order->status === 'cancelled' ? 'danger' : 
                                        ($order->status === 'in_progress' ? 'primary' : 
                                        ($order->status === 'in_route' ? 'warning' : 'secondary'))) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>${{ number_format($order->price, 2) }}</td>
                                <td>{{ $order->deleted_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('orders.restore', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay órdenes archivadas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection 