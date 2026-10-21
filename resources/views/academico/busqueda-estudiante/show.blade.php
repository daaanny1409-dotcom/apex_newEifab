@extends('layouts.adminlte')

@section('title', 'Ficha del Estudiante')
@section('page-title', 'Ficha del Estudiante')
@section('breadcrumb', 'Gestión Académica / Búsqueda Estudiante / Ficha')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($estudiante->foto)
    <img src="{{ asset('storage/' . $estudiante->foto) }}"
         alt="{{ $estudiante->nombre }}"
         style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #ddd;">
@else
    <i class="fas fa-user-circle fa-7x text-secondary"></i>
@endif
                    </div>
                    <h3 class="profile-username text-center mt-3">
                        {{ $estudiante->nombre }} {{ $estudiante->paterno }}
                    </h3>
                    <p class="text-muted text-center">{{ $estudiante->email ?? 'Sin email' }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>C.I.</b> <span class="float-right">{{ $estudiante->nro_documento }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Estado</b>
                            <span class="float-right">
                                @if($estudiante->activo)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </span>
                        </li>
                    </ul>

                    <a href="{{ route('academico.busqueda-estudiante.edit', $estudiante) }}" class="btn btn-warning btn-block">
                        <i class="fas fa-edit"></i> Editar datos
                    </a>
                    <a href="{{ route('academico.busqueda-estudiante.pdf', $estudiante) }}" class="btn btn-danger btn-block" target="_blank">
                        <i class="fas fa-file-pdf"></i> Generar PDF
                    </a>
                    <a href="{{ route('academico.busqueda-estudiante.index') }}" class="btn btn-default btn-block">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Datos Personales</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th width="200">Nombre completo</th>
                            <td>{{ $estudiante->nombre }} {{ $estudiante->paterno }} {{ $estudiante->materno }}</td>
                        </tr>
                        <tr>
                            <th>Documento de Identidad</th>
                            <td>{{ $estudiante->nro_documento }}</td>
                        </tr>
                        <tr>
                            <th>Sexo</th>
                            <td>{{ $estudiante->sexo === 'M' ? 'Masculino' : ($estudiante->sexo === 'F' ? 'Femenino' : 'Otro') }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ $estudiante->fecha_nacimiento?->format('d/m/Y') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $estudiante->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>{{ $estudiante->telefono ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $estudiante->direccion ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td><span class="badge badge-info">{{ ucfirst($estudiante->tipo_persona) }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-graduation-cap"></i> Datos Académicos</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center py-3">
                        <i class="fas fa-info-circle"></i>
                        Próximamente: cursos inscritos, notas, historial académico.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection