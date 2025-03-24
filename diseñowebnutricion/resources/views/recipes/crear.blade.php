@extends('layouts.app')
@section('content')


  <div class="card-body">
    <h5 class="card-title">Add a Recipe</h5>
    <form method="POST" action="{{route('recipes.guardarNueva')}}">
        @csrf 
        <div class="form-group">
            <label for="recipename">Recipe Name:</label>
            <input type="text" id="recipename" name="recipename"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredientes:</label>
            <input type="text" id="ingredients" name="ingredients"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="instructions">Instructions:</label>
            <input type="text" id="instructions" name="instructions"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="calories">Calories:</label>
            <input type="number" id="calories" name="calories"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="protein">Protein:</label>
            <input type="number" id="protein" name="protein"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="carbs">Carbs:</label>
            <input type="number" id="carbs" name="carbs"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fats">Fats:</label>
            <input type="text" id="fats" name="fats"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category"class="form-control" required>
        </div>
        <button type="Submit" class="form-control">Guardar</button>
    
    </form>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        

  </div>


@endsection