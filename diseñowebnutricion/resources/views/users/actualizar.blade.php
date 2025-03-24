@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Actualizar Usuario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.update', $user->userID) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña (dejar en blanco para mantener la actual)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="age">Edad</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Género</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">Seleccione un género</option>
                <option value="M" {{ old('gender', $user->gender) == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('gender', $user->gender) == 'F' ? 'selected' : '' }}>Femenino</option>
                <option value="O" {{ old('gender', $user->gender) == 'O' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Peso (kg)</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight" value="{{ old('weight', $user->weight) }}" required>
        </div>

        <div class="form-group">
            <label for="height">Altura (cm)</label>
            <input type="number" step="0.1" class="form-control" id="height" name="height" value="{{ old('height', $user->height) }}" required>
        </div>

        <div class="form-group">
            <label for="activity_level">Nivel de Actividad</label>
            <select class="form-control" id="activity_level" name="activity_level" required>
                <option value="">Seleccione un nivel</option>
                <option value="sedentary" {{ old('activity_level', $user->activity_level) == 'sedentary' ? 'selected' : '' }}>Sedentario</option>
                <option value="light" {{ old('activity_level', $user->activity_level) == 'light' ? 'selected' : '' }}>Ligero</option>
                <option value="moderate" {{ old('activity_level', $user->activity_level) == 'moderate' ? 'selected' : '' }}>Moderado</option>
                <option value="active" {{ old('activity_level', $user->activity_level) == 'active' ? 'selected' : '' }}>Activo</option>
                <option value="very_active" {{ old('activity_level', $user->activity_level) == 'very_active' ? 'selected' : '' }}>Muy Activo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="allergies">Alergias</label>
            <input type="text" class="form-control" id="allergies" name="allergies" value="{{ old('allergies', is_array($user->allergies) ? implode(', ', $user->allergies) : $user->allergies) }}" placeholder="Separadas por comas">
        </div>

        <div class="form-group">
            <label for="goals">Objetivos</label>
            <input type="text" class="form-control" id="goals" name="goals" value="{{ old('goals', is_array($user->goals) ? implode(', ', $user->goals) : $user->goals) }}" placeholder="Separados por comas">
        </div>

        <div class="form-group">
            <label for="restrictions">Restricciones Alimentarias</label>
            <input type="text" class="form-control" id="restrictions" name="restrictions" value="{{ old('restrictions', is_array($user->restrictions) ? implode(', ', $user->restrictions) : $user->restrictions) }}" placeholder="Separadas por comas">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
