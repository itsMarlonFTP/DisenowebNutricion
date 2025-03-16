@extends('layouts.app')

@section('content')
<h1>Detalles del Usuario</h1>
<p><strong>ID:</strong> {{ $user->userID }}</p>
<p><strong>Nombre:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<a href="{{ route('users.index') }}">Volver a la lista</a>
@endsection
