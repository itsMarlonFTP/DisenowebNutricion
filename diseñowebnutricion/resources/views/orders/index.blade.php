@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Órdenes de Planes de Nutrición</h2>
        <div>
            <a href="{{ route('orders.create') }}" class="btn btn-primary me-2">
                <i class="fas fa-plus me-2"></i>Nueva Orden
            </a>
            <a href="{{ route('orders.archived') }}" class="btn btn-secondary">
                <i class="fas fa-archive me-2"></i>Órdenes Archivadas
            </a>
        </div>
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
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
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
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($order->status === 'in_route' || $order->status === 'delivered')
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#photoModal{{ $order->id }}">
                                                <i class="fas fa-camera"></i>
                                            </button>
                                        @endif
                                        @if($order->status !== 'cancelled' && $order->status !== 'delivered')
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal{{ $order->id }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Modal para fotos -->
                                    <div class="modal fade" id="photoModal{{ $order->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Subir Evidencia</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('orders.update', $order) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        @if($order->status === 'in_route')
                                                            <div class="mb-3">
                                                                <label class="form-label">Foto en Ruta</label>
                                                                <input type="file" name="route_photo" class="form-control" accept="image/*">
                                                            </div>
                                                        @endif
                                                        @if($order->status === 'delivered')
                                                            <div class="mb-3">
                                                                <label class="form-label">Foto de Entrega</label>
                                                                <input type="file" name="delivery_photo" class="form-control" accept="image/*">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para cancelar -->
                                    <div class="modal fade" id="cancelModal{{ $order->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cancelar Orden</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('orders.update', $order) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input type="hidden" name="status" value="cancelled">
                                                        <p>¿Está seguro de que desea cancelar esta orden?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, mantener</button>
                                                        <button type="submit" class="btn btn-danger">Sí, cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection 