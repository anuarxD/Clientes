<div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="showUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Ver') }} Usuario</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="card-body bg-white">
                    <div class="form-group mb-2 mb20">
                        <strong>Name:</strong>
                        <span id="showName">{{ $user->name }}</span>
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Email:</strong>
                        <span id="showEmail">{{ $user->email }}</span>
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Role:</strong>
                        <span id="showRole">{{ $user->role }}</span>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
