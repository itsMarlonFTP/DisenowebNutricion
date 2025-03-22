<!-- Modal -->
<div class="modal fade" id="modal{{ $recipe->id }}" tabindex="-1" aria-labelledby="recipeModalLabel{{ $recipe->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="recipeModalLabel{{ $recipe->id }}">
          <i class="fas fa-edit me-2"></i>Edit Recipe: {{ $recipe->recipename }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body p-4">
        <form method="POST" action="{{ route('recipes.update', $recipe) }}" id="updateForm{{ $recipe->id }}">
          @csrf 
          @method('PUT')

          <!-- Basic Info Section -->
          <div class="mb-4">
            <h6 class="border-bottom border-primary pb-2 text-primary"><i class="fas fa-info-circle me-2"></i>Basic Information</h6>
            
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="recipename" class="form-label fw-bold">Recipe Name:</label>
                <input type="text" id="recipename" name="recipename" value="{{ $recipe->recipename }}" class="form-control" required>
              </div>
              
              <div class="col-md-6">
                <label for="category" class="form-label fw-bold">Category:</label>
                <input type="text" id="category" name="category" value="{{ $recipe->category }}" class="form-control" required>
              </div>
            </div>
            
            <div class="mb-3">
              <label for="descripcion" class="form-label fw-bold">Description:</label>
              <textarea id="descripcion" name="descripcion" class="form-control" rows="2" required>{{ $recipe->descripcion }}</textarea>
            </div>
          </div>
          
          <!-- Recipe Content Section -->
          <div class="mb-4">
            <h6 class="border-bottom border-primary pb-2 text-primary"><i class="fas fa-utensils me-2"></i>Recipe Content</h6>
            
            <div class="mb-3">
              <label for="ingredients" class="form-label fw-bold">Ingredients:</label>
              <textarea id="ingredients" name="ingredients" class="form-control" rows="3" required>{{ $recipe->ingredients }}</textarea>
            </div>
            
            <div class="mb-3">
              <label for="instructions" class="form-label fw-bold">Instructions:</label>
              <textarea id="instructions" name="instructions" class="form-control" rows="3" required>{{ $recipe->instructions }}</textarea>
            </div>
          </div>
          
          <!-- Nutritional Info Section -->
          <div class="mb-4">
            <h6 class="border-bottom border-primary pb-2 text-primary"><i class="fas fa-heartbeat me-2"></i>Nutritional Information</h6>
            
            <div class="row g-3">
              <div class="col-md-3 col-6">
                <label for="calories" class="form-label fw-bold">Calories:</label>
                <div class="input-group">
                  <input type="number" id="calories" name="calories" value="{{ $recipe->calories }}" class="form-control" required>
                  <span class="input-group-text">kcal</span>
                </div>
              </div>
              
              <div class="col-md-3 col-6">
                <label for="protein" class="form-label fw-bold">Protein:</label>
                <div class="input-group">
                  <input type="number" id="protein" name="protein" value="{{ $recipe->protein }}" class="form-control" required>
                  <span class="input-group-text">g</span>
                </div>
              </div>
              
              <div class="col-md-3 col-6">
                <label for="carbs" class="form-label fw-bold">Carbs:</label>
                <div class="input-group">
                  <input type="number" id="carbs" name="carbs" value="{{ $recipe->carbs }}" class="form-control" required>
                  <span class="input-group-text">g</span>
                </div>
              </div>
              
              <div class="col-md-3 col-6">
                <label for="fats" class="form-label fw-bold">Fats:</label>
                <div class="input-group">
                  <input type="number" id="fats" name="fats" value="{{ $recipe->fats }}" class="form-control" required>
                  <span class="input-group-text">g</span>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="fas fa-times me-1"></i>Close
        </button>
        <button type="submit" form="updateForm{{ $recipe->id }}" class="btn btn-primary">
          <i class="fas fa-save me-1"></i>Update Recipe
        </button>
      </div>
    </div>
  </div>
</div>