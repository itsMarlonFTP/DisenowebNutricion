@extends('layouts.app')

@section('content')
<h1>Editar Alergia</h1>
<form action="{{ route('allergies.update', $allergy->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="allergy">Alergia:</label>
    <input type="text" name="allergy" value="{{ $allergy->allergy }}" required>

    <label for="severity">Severidad:</label>
    <input type="text" name="severity" value="{{ $allergy->severity }}" required>

    <button type="submit">Actualizar</button>
</form>
@endsection
