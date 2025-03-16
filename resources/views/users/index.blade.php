@extends('layouts.app')

@section('title', 'Lista de Alergias')

@section('content')
<h1>Lista de Alergias</h1>
<a href="{{ route('allergies.create') }}" class="btn btn-primary">Registrar nueva alergia</a>
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Alergia</th>
            <th>Severidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allergies as $allergy)
        <tr>
            <td>{{ $allergy->allergyID }}</td>
            <td>{{ $allergy->allergy }}</td>
            <td>{{ $allergy->severity }}</td>
            <td>
                <a href="{{ route('allergies.edit', $allergy) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('allergies.destroy', $allergy) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
