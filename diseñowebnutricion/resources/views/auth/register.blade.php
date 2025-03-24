@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="allergies" class="col-md-4 col-form-label text-md-end">{{ __('Alergias') }}</label>
                            <div class="col-md-6">
                                <input id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" value="{{ old('allergies') }}">
                                @error('allergies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="goals" class="col-md-4 col-form-label text-md-end">{{ __('Objetivos') }}</label>
                            <div class="col-md-6">
                                <input id="goals" type="text" class="form-control @error('goals') is-invalid @enderror" name="goals" value="{{ old('goals') }}">
                                @error('goals')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="restrictions" class="col-md-4 col-form-label text-md-end">{{ __('Restricciones') }}</label>
                            <div class="col-md-6">
                                <input id="restrictions" type="text" class="form-control @error('restrictions') is-invalid @enderror" name="restrictions" value="{{ old('restrictions') }}">
                                @error('restrictions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Género') }}</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="">Seleccione un género</option>
                                    <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculino</option>
                                    <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Femenino</option>
                                    <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Peso (kg)') }}</label>
                            <div class="col-md-6">
                                <input id="weight" type="number" step="0.1" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="height" class="col-md-4 col-form-label text-md-end">{{ __('Altura (cm)') }}</label>
                            <div class="col-md-6">
                                <input id="height" type="number" step="0.1" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}">
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="activity_level" class="col-md-4 col-form-label text-md-end">{{ __('Nivel de Actividad') }}</label>
                            <div class="col-md-6">
                                <select id="activity_level" class="form-control @error('activity_level') is-invalid @enderror" name="activity_level">
                                    <option value="">Seleccione un nivel</option>
                                    <option value="sedentario" {{ old('activity_level') == 'sedentario' ? 'selected' : '' }}>Sedentario</option>
                                    <option value="ligero" {{ old('activity_level') == 'ligero' ? 'selected' : '' }}>Ligero</option>
                                    <option value="moderado" {{ old('activity_level') == 'moderado' ? 'selected' : '' }}>Moderado</option>
                                    <option value="activo" {{ old('activity_level') == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="muy_activo" {{ old('activity_level') == 'muy_activo' ? 'selected' : '' }}>Muy Activo</option>
                                </select>
                                @error('activity_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
