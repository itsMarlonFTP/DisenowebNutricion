@extends('layouts.app')

@section('content')
<h1>Detalles de Alergia</h1>
<p><strong>ID:</strong> {{ $allergy->allergyID }}</p>
<p><strong>Alergia:</strong> {{ $allergy->allergy }}</p>
<p><strong>Severidad:</strong> {{ $allergy->severity }}</p>
<a href="{{ route('allergies.index') }}">Volver a la lista</a>
@endsection
