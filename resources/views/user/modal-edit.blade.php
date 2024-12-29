<!-- Modal Edit -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">{{ __('Edit User') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to edit user -->
                <form method="POST" action="" id="editUserForm" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <!-- Name Input -->
                    <div class="form-group mb-2">
                        <label for="editName" class="form-label">{{ __('Name') }}</label>
                        <input type="text" id="editName" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="form-group mb-2">
                        <label for="editEmail" class="form-label">{{ __('Email') }}</label>
                        <input type="email" id="editEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Role Input -->
                    <div class="form-group mb-2">
                        <label for="editRole" class="form-label">{{ __('Role') }}</label>
                        <select id="editRole" name="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="Psicologo">Psicólogo</option>
                            <option value="Paciente">Paciente</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para mostrar el modal de edición con los datos del usuario
    function showUserEditModal(id) {
        fetch(`/users/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editName').value = data.name;
                document.getElementById('editEmail').value = data.email;
                
                // Asegurarse de que el valor seleccionado de role se actualice correctamente
                document.getElementById('editRole').value = data.role;

                // Actualizar la acción del formulario con la URL de la actualización
                document.getElementById('editUserForm').action = `/users/${id}`;
            })
            .catch(error => {
                toastr.error('Error al cargar los datos del usuario: ' + error.message);
            });

        var modal = new bootstrap.Modal(document.getElementById('editUserModal'));
        modal.show();
    }
</script>
