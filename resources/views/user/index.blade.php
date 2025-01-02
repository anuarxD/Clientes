@extends('layouts.app')

@section('template_title')
Users
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Users') }}
                        </span>

                        <div class="float-right">
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal"> Create User </button>

                            <!-- Incluir el modal -->
                            @include('user.modal-create')


                        </div>

                    </div>
                </div>

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th> Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm {{ $user->status == 'activo' ? 'btn-success' : 'btn-danger' }}">
                                                {{ $user->status == 'activo' ? 'Activo' : 'Inactivo' }}
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            <button type="button" class="btn btn-success btn-sm" onclick="showUser('{{ $user->id }}')" data-bs-toggle="modal" data-bs-target="#showUserModal"> <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</button>
                                            <button type="button" class="btn btn-warning btn-sm" onclick="showUserEditModal('{{ $user->id }}')" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</button>

                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault(); deleteUser(this)"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $users->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection


<script>
    document.getElementById('createUserForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Cerrar el modal
                    bootstrap.Modal.getInstance(document.getElementById('createUserModal')).hide();
                    // Refrescar la página o actualizar la tabla
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>



<script>
    function showUser(id) {
        fetch(`/users/${id}`)
            .then(response => {
                // Asegúrate de que la respuesta sea exitosa (código de estado 200)
                if (!response.ok) {
                    throw new Error('No se pudo obtener la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                // Verifica que los datos sean correctos
                if (data && data.name && data.email) {
                    document.getElementById('showName').textContent = data.name;
                    document.getElementById('showEmail').textContent = data.email;
                    document.getElementById('showRole').textContent = data.role;
                } else {
                    toastr.error('Datos del usuario no encontrados');
                }
            })
            .catch(error => {
                toastr.error('Error al cargar los datos del usuario: ' + error.message);
            });
    }
</script>

<script>
    function deleteUser(button) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                button.closest('form').submit();
            }
        });
    }
</script>


@include('user.modal-edit')
@include('user.modal-show')