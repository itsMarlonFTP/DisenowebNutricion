<!-- Modal para Editar Usuario -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
          @csrf
          @method('PUT')
          <div class="form-group mb-3">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
