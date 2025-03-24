<!-- Modal -->
<div class="modal fade" id="modal{{ $recipe->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Receta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('recipes.guardar', $recipe) }}">
          @csrf 
          @method('PUT')

          <div class="form-group">
            <label for="recipename">Recipe Name:</label>
            <input type="text" id="recipename" name="recipename" value="{{ $recipe->recipename }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $recipe->descripcion }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="ingredients">Ingredientes:</label>
            <input type="text" id="ingredients" name="ingredients" value="{{ $recipe->ingredients }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="instructions">Instructions:</label>
            <input type="text" id="instructions" name="instructions" value="{{ $recipe->instructions }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="calories">Calories:</label>
            <input type="number" id="calories" name="calories" value="{{ $recipe->calories }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="protein">Protein:</label>
            <input type="number" id="protein" name="protein" value="{{ $recipe->protein }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="carbs">Carbs:</label>
            <input type="number" id="carbs" name="carbs" value="{{ $recipe->carbs }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="fats">Fats:</label>
            <input type="number" id="fats" name="fats" value="{{ $recipe->fats }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="{{ $recipe->category }}" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
