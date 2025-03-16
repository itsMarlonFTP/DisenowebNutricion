@extends('layouts.app')

@section('content')
<h1>Crear Usuario</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Guardar</button>
</form>
@endsection
