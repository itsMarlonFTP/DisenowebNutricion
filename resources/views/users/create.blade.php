<!-- Modal para Crear Usuario -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Crear Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('users.store') }}">
          @csrf
          <div class="form-group mb-3">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="form-group mb-3">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
