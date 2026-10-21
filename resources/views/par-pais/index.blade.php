@extends('layouts.adminlte')

@section('title', 'Países')
@section('page-title', 'Países')
@section('breadcrumb', 'Opciones Generales / Países')

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
                <i class="fas fa-globe-americas mr-2"></i>
                Listado de Países
            </h3>
            <div class="card-tools">
                <a href="{{ route('par-pais.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nuevo País
                </a>
            </div>
        </div>

        <div class="card-body">
            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="buscar" class="form-control"
                               placeholder="Buscar por nombre o código..."
                               value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="{{ route('par-pais.index') }}" class="btn btn-default">
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
                            <th>Nombre</th>
                            <th width="120">Código</th>
                            <th width="100">Estado</th>
                            <th width="150" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paises as $pais)
                            <tr>
                                <td>{{ $pais->id }}</td>
                                <td>{{ $pais->nombre }}</td>
                                <td><span class="badge badge-info">{{ $pais->codigo }}</span></td>
                                <td>
                                    @if($pais->activo)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('par-pais.show', $pais) }}"
                                       class="btn btn-info btn-sm" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('par-pais.edit', $pais) }}"
                                       class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('par-pais.destroy', $pais) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar este país?')">
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
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-3x mb-2"></i><br>
                                    No se encontraron países.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $paises->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

@endsection