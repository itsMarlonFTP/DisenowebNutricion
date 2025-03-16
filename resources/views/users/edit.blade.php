@extends('layouts.app')

@section('content')
<h1>Editar Usuario</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    
    <button type="submit">Actualizar</button>
</form>
@endsection
