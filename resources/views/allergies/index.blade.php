@extends('layouts.app')

@section('content')
<h1>Lista de Alergias</h1>
<a href="{{ route('allergies.create') }}">Registrar nueva alergia</a>
<table>
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
                <a href="{{ route('allergies.edit', $allergy) }}">Editar</a>
                <form action="{{ route('allergies.destroy', $allergy) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
