@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eliminar Usuario</h1>
    <p>¿Estás seguro de que deseas eliminar al usuario <strong>{{ $user->name }}</strong>?</p>
    <form action="{{ route('users.destroy') }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="userID" value="{{ $user->id }}">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('users.leer') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
