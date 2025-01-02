<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientModalLabel">{{ __('Patient Details') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body bg-white">
    <div class="form-group mb-2 mb20">
        <strong>Nombre:</strong>
        <span id="showName">{{ $patient->name }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Telefono:</strong>
        <span id="showTelefono">{{ $patient->telefono }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Fecha de Nacimiento:</strong>
        <span id="showFechaNacimiento">{{ $patient->fecha_nacimiento }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Genero:</strong>
        <span id="showGenero">{{ $patient->genero }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Direccion:</strong>
        <span id="showDireccion">{{ $patient->direccion }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Tutor Nombre:</strong>
        <span id="showTutorNombre">{{ $patient->tutor_nombre }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Tutor Relación:</strong>
        <span id="showTutorRelacion">{{ $patient->tutor_relacion }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Tutor Teléfono:</strong>
        <span id="showTutorTelefono">{{ $patient->tutor_telefono }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Historial Médico:</strong>
        <span id="showHistorialMedico">{{ $patient->historial_medico }}</span>
    </div>
    <div class="form-group mb-2 mb20">
        <strong>Alergias:</strong>
        <span id="showAlergias">{{ $patient->alergias }}</span>
    </div>
</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
