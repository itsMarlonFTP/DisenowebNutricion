@extends('layouts.app')
@section('content')

<table class="table">
  <thead>
    <tr>
        <th scope="col">Recipe Name</th>
        <th scope="col">Descripción</th>
        <th scope="col">Ingredientes</th>
        <th scope="col">Instrucciones</th>
        <th scope="col">Calorías</th>
        <th scope="col">Proteína</th>
        <th scope="col">Carbohidratos</th>
        <th scope="col">Grasas</th>
        <th scope="col">Categoría</th>
        <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($recipes as $recipe)
        <tr>
                <td>{{ $recipe->recipename }}</td>
                <td>{{ $recipe->descripcion }}</td>
                <td>{{ $recipe->ingredients }}</td>
                <td>{{ $recipe->instructions }}</td>
                <td>{{ $recipe->calories }}</td>
                <td>{{ $recipe->protein }}g</td>
                <td>{{ $recipe->carbs }}g</td>
                <td>{{ $recipe->fats }}g</td>
                <td>{{ $recipe->category }}</td>
                <td><button type="button" class="btn btn-primary">Update</button></td>
            </tr>
            @endforeach
    </tr>
  </tbody>
</table>

@endsection