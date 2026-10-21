@extends('layouts.adminlte')

@section('title', 'Turnos de Curso')
@section('page-title', 'Turnos de Curso')
@section('breadcrumb', 'Gestión Académica / Turnos')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-clock mr-2"></i>
                Listado de Turnos
            </h3>
            <div class="card-tools">
                <a href="{{ route('academico.curso-turno.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nuevo Turno
                </a>
            </div>
        </div>

        <div class="card-body">
            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="buscar" class="form-control"
                               placeholder="Buscar por descripción..."
                               value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('academico.curso-turno.index') }}" class="btn btn-default">
                            <i class="fas fa-times"></i> Limpiar
                        </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="60">#</th>
                            <th>Descripción</th>
                            <th>Días</th>
                            <th width="150">Horario</th>
                            <th width="100">Estado</th>
                            <th width="150" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($turnos as $turno)
                            <tr>
                                <td>{{ $turno->id }}</td>
                                <td><strong>{{ $turno->descripcion }}</strong></td>
                                <td>
                                    <small class="text-muted">{{ $turno->dias }}</small>
                                </td>
                                <td>
                                    @if($turno->hora_inicio && $turno->hora_fin)
                                        <span class="badge badge-info">
                                            {{ \Carbon\Carbon::parse($turno->hora_inicio)->format('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($turno->hora_fin)->format('H:i') }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($turno->activo)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('academico.curso-turno.show', $turno) }}"
                                       class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('academico.curso-turno.edit', $turno) }}"
                                       class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('academico.curso-turno.destroy', $turno) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar este turno?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-2"></i><br>
                                    No se encontraron turnos.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $turnos->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

@endsection
