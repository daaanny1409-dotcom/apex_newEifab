@extends('layouts.adminlte')

@section('title', 'Búsqueda Estudiante')
@section('page-title', 'Búsqueda Estudiante')
@section('breadcrumb', 'Gestión Académica / Búsqueda Estudiante')

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
                <i class="fas fa-user-graduate mr-2"></i>
                Búsqueda de Estudiantes
            </h3>
        </div>

        <div class="card-body">
            {{-- Filtros --}}
            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="buscar" class="form-control"
                               placeholder="Buscar por nombre, apellido, C.I. o email..."
                               value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="activo" class="form-control">
                            <option value="">-- Todos los estados --</option>
                            <option value="S" {{ request('activo') === 'S' ? 'selected' : '' }}>Activos</option>
                            <option value="N" {{ request('activo') === 'N' ? 'selected' : '' }}>Inactivos</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('academico.busqueda-estudiante.index') }}" class="btn btn-default">
                            <i class="fas fa-times"></i> Limpiar
                        </a>
                    </div>
                </div>
            </form>

            {{-- Tabla --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="60">#</th>
                            <th width="100">C.I.</th>
                            <th>Nombre completo</th>
                            <th>Email</th>
                            <th width="120">Teléfono</th>
                            <th width="100">Estado</th>
                            <th width="180" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estudiantes as $est)
                            <tr>
                                <td>{{ $est->id }}</td>
                                <td><span class="badge badge-secondary">{{ $est->nro_documento }}</span></td>
                                <td>{{ $est->nombre }} {{ $est->paterno }} {{ $est->materno }}</td>
                                <td>{{ $est->email ?? '-' }}</td>
                                <td>{{ $est->telefono ?? '-' }}</td>
                                <td>
                                    @if($est->activo)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('academico.busqueda-estudiante.show', $est) }}"
                                       class="btn btn-info btn-sm" title="Ver ficha">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('academico.busqueda-estudiante.edit', $est) }}"
                                       class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('academico.busqueda-estudiante.pdf', $est) }}"
                                       class="btn btn-danger btn-sm" title="PDF" target="_blank">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-2"></i><br>
                                    No se encontraron estudiantes.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-3">
                {{ $estudiantes->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

@endsection