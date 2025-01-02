@extends('layouts.app')

@section('template_title')
    Patients
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Patients') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Género</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Tutor Nombre</th>
                                        <th>Tutor Relación</th>
                                        <th>Tutor Teléfono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $patient->user->name ?? 'N/A' }}</td>
                                            <td>{{ $patient->user->email ?? 'N/A' }}</td>
                                            <td>{{ $patient->fecha_nacimiento }}</td>
                                            <td>{{ $patient->genero }}</td>
                                            <td>{{ $patient->direccion }}</td>
                                            <td>{{ $patient->telefono ? substr($patient->telefono, 0, 3) . '-' . substr($patient->telefono, 3, 3) . '-' . substr($patient->telefono, 6) : '' }}</td>
                                            <td>{{ $patient->tutor_nombre }}</td>
                                            <td>{{ $patient->tutor_relacion }}</td>
                                            <td>{{ $patient->tutor_telefono ? substr($patient->tutor_telefono, 0, 3) . '-' . substr($patient->tutor_telefono, 3, 3) . '-' . substr($patient->tutor_telefono, 6) : '' }}</td>
                                            <td>
                                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('patients.show', $patient->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('patients.edit', $patient->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-warning" href="">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Expediente') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-info" href="">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Cita') }}
                                                    </a>
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $patients->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
