<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name ?? '') }}" 
                id="name" 
                placeholder="Name"
            >
            @error('name')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        
        <div class="form-group mb-2">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input 
                type="text" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $user->email ?? '') }}" 
                id="email" 
                placeholder="Email"
            >
            @error('email')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="role" class="form-label">{{ __('Role') }}</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                <option value="">Seleccione un rol</option>
                <option value='Psicologo' {{ old('role', $user->role ?? '') == 'Psicólogo' ? 'selected' : '' }}>Psicólogo</option>
                <option value="Paciente" {{ old('role', $user->role ?? '') == 'Paciente' ? 'selected' : '' }}>Paciente</option>
            </select>
            @error('role')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>

<!-- Mostrar campo de contraseña solo cuando se crea un nuevo usuario -->
@if (auth()->user()->role === 'Administrador')
            <div class="form-group mb-2 mb20">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password">
                {!! $errors->first('password_confirmation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        @endif
</div>
