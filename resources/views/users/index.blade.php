@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1>Lista de Usuarios</h1>
  <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">Agregar Usuario</button>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo Electrónico</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <!-- Botón para el modal de edición -->
          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Editar</button>

          <!-- Formulario para eliminar -->
          <form action="{{ route('users.destroy') }}" method="POST" class="d-inline">
            @csrf
            @method('POST')
            <input type="hidden" name="userID" value="{{ $user->id }}">
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      @include('users.edit', ['user' => $user]) <!-- Modal para edición -->
      @endforeach
    </tbody>
  </table>
</div>

<!-- Incluir modal para crear usuario -->
@include('users.create')
@endsection
