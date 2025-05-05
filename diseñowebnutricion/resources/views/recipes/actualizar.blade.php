<!-- Modal -->
<div class="modal fade" id="modal{{ $recipe->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Receta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('recipes.guardar', $recipe->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="recipename" class="form-label">Nombre de la Receta</label>
            <input type="text" class="form-control @error('recipename') is-invalid @enderror" id="recipename" name="recipename" value="{{ old('recipename', $recipe->recipename) }}" required>
            @error('recipename')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $recipe->descripcion) }}</textarea>
            @error('descripcion')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredientes</label>
            <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" rows="3" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
            @error('ingredients')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="instructions" class="form-label">Instrucciones</label>
            <textarea class="form-control @error('instructions') is-invalid @enderror" id="instructions" name="instructions" rows="3" required>{{ old('instructions', $recipe->instructions) }}</textarea>
            @error('instructions')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="calories" class="form-label">Calorías</label>
                <input type="number" class="form-control @error('calories') is-invalid @enderror" id="calories" name="calories" value="{{ old('calories', $recipe->calories) }}" required>
                @error('calories')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="protein" class="form-label">Proteína (g)</label>
                <input type="number" class="form-control @error('protein') is-invalid @enderror" id="protein" name="protein" value="{{ old('protein', $recipe->protein) }}" required>
                @error('protein')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="carbs" class="form-label">Carbohidratos (g)</label>
                <input type="number" class="form-control @error('carbs') is-invalid @enderror" id="carbs" name="carbs" value="{{ old('carbs', $recipe->carbs) }}" required>
                @error('carbs')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="fats" class="form-label">Grasas (g)</label>
                <input type="number" class="form-control @error('fats') is-invalid @enderror" id="fats" name="fats" value="{{ old('fats', $recipe->fats) }}" required>
                @error('fats')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $recipe->category) }}" required>
            @error('category')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Imagen de la Receta</label>
            @if($recipe->image_url)
              <div class="mb-2">
                <img src="{{ $recipe->image_url }}" alt="Imagen actual" class="img-thumbnail" style="max-height: 200px;">
              </div>
            @endif
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            <div class="form-text">Formatos aceptados: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Actualizar Receta</button>
            <a href="{{ route('recipes.leer') }}" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
