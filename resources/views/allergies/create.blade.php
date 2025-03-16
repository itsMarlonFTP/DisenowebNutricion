@extends('layouts.app')

@section('content')
<h1>Registrar Alergia</h1>
<form action="{{ route('allergies.store') }}" method="POST">
    @csrf
    <label for="allergy">Alergia:</label>
    <input type="text" name="allergy" required>

    <label for="severity">Severidad:</label>
    <input type="text" name="severity" required>

    <button type="submit">Guardar</button>
</form>
@endsection
