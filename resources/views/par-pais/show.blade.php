@extends('layouts.adminlte')

@section('title', 'Ver País')
@section('page-title', 'Detalle del País')
@section('breadcrumb', 'Opciones Generales / Países / Ver')

@section('content')

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-globe-americas mr-2"></i>
                {{ $pais->nombre }}
            </h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">ID</th>
                    <td>{{ $pais->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $pais->nombre }}</td>
                </tr>
                <tr>
                    <th>Código</th>
                    <td><span class="badge badge-info">{{ $pais->codigo }}</span></td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>
                        @if($pais->activo)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-danger">Inactivo</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Creado</th>
                    <td>{{ $pais->created_at?->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Modificado</th>
                    <td>{{ $pais->updated_at?->format('d/m/Y H:i') }}</td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="{{ route('par-pais.edit', $pais) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('par-pais.index') }}" class="btn btn-default">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

@endsection