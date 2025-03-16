@extends('layouts.app')
@section('content')


  <div class="card-body">
    <h5 class="card-title">Delete a Recipe</h5>
    <form method="POST" action="{{route('recipes.destroy')}}">
        @csrf 
        <div class="form-group">
            <label for="IdRecipe">Recipe ID:</label>
            <input type="text" id="IdRecipe" name="IdRecipe"class="form-control" required>
        </div>
       
        <button type="Submit" class="form-control">Delete</button>
    
    </form>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            {{ session('error') }}
        </div>
    @endif
        

  </div>


@endsection