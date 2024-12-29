<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserModalLabel">{{ __('Create') }} User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data" id="createUserForm">
                    @csrf
                    @include('user.form')
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="createUserForm">Guardar</button>
            </div>
        </div>
    </div>
</div>