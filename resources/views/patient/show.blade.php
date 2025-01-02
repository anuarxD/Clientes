@extends('layouts.app')

@section('template_title')
    {{ $patient->name ?? __('Show') . " " . __('Patient') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Patient</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('patients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Usuario Id:</strong>
                                    {{ $patient->usuario_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Nacimiento:</strong>
                                    {{ $patient->fecha_nacimiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $patient->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $patient->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $patient->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tutor Nombre:</strong>
                                    {{ $patient->tutor_nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tutor Relacion:</strong>
                                    {{ $patient->tutor_relacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tutor Telefono:</strong>
                                    {{ $patient->tutor_telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Historial Medico:</strong> <br>
                                    {!! nl2br(e($patient->historial_medico)) !!}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alergias:</strong> <br>
                                    {{ $patient->alergias }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
