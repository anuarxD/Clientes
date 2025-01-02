<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20" style="display: none">
            <label for="usuario_id" class="form-label">{{ __('Usuario Id') }}</label>
            <input type="text" name="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror" value="{{ old('usuario_id', $patient?->usuario_id) }}" id="usuario_id" placeholder="Usuario Id">
            {!! $errors->first('usuario_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fecha de Nacimiento') }}</label>
            <input
                type="date"
                name="fecha_nacimiento"
                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                value="{{ old('fecha_nacimiento', $patient?->fecha_nacimiento ?? date('d-m-Y')) }}"
                id="fecha_nacimiento"
                placeholder="Fecha de Nacimiento">
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="genero" class="form-label">{{ __('Género') }}</label>
            <select name="genero" id="genero" class="form-control @error('genero') is-invalid @enderror">
                <option value="Masculino" {{ old('genero', $patient?->genero) === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero', $patient?->genero) === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ old('genero', $patient?->genero) === 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            {!! $errors->first('genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $patient?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $patient?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tutor_nombre" class="form-label">{{ __('Tutor Nombre') }}</label>
            <input type="text" name="tutor_nombre" class="form-control @error('tutor_nombre') is-invalid @enderror" value="{{ old('tutor_nombre', $patient?->tutor_nombre) }}" id="tutor_nombre" placeholder="Tutor Nombre">
            {!! $errors->first('tutor_nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tutor_relacion" class="form-label">{{ __('Relación con el Tutor') }}</label>
            <select name="tutor_relacion" id="tutor_relacion" class="form-control @error('tutor_relacion') is-invalid @enderror">
                <option value="Padre" {{ old('tutor_relacion', $patient?->tutor_relacion) === 'Padre' ? 'selected' : '' }}>Padre</option>
                <option value="Madre" {{ old('tutor_relacion', $patient?->tutor_relacion) === 'Madre' ? 'selected' : '' }}>Madre</option>
                <option value="Tutor/a" {{ old('tutor_relacion', $patient?->tutor_relacion) === 'Tutor/a' ? 'selected' : '' }}>Tutor/a</option>
            </select>
            {!! $errors->first('tutor_relacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tutor_telefono" class="form-label">{{ __('Tutor Telefono') }}</label>
            <input type="text" name="tutor_telefono" class="form-control @error('tutor_telefono') is-invalid @enderror" value="{{ old('tutor_telefono', $patient?->tutor_telefono) }}" id="tutor_telefono" placeholder="Tutor Telefono">
            {!! $errors->first('tutor_telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="historial_medico" class="form-label">{{ __('Historial Medico') }}</label>
            <textarea name="historial_medico" class="form-control @error('historial_medico') is-invalid @enderror" id="historial_medico" placeholder="Historial Medico" rows="5">{{ old('historial_medico', $patient?->historial_medico) }}</textarea>
            {!! $errors->first('historial_medico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="alergias" class="form-label">{{ __('Alergias') }}</label>
            <input type="text" name="alergias" class="form-control @error('alergias') is-invalid @enderror" value="{{ old('alergias', $patient?->alergias) }}" id="alergias" placeholder="Alergias">
            {!! $errors->first('alergias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>