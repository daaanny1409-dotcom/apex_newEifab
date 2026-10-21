@extends('layouts.adminlte')

@section('title', 'Ver Turno')
@section('page-title', 'Detalle del Turno')
@section('breadcrumb', 'Gestión Académica / Turnos / Ver')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-clock mr-2"></i>
                        {{ $turno->descripcion }}
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $turno->id }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td><strong>{{ $turno->descripcion }}</strong></td>
                        </tr>
                        <tr>
                            <th>Horario</th>
                            <td>
                                @if($turno->hora_inicio && $turno->hora_fin)
                                    <span class="badge badge-info" style="font-size: 14px;">
                                        {{ \Carbon\Carbon::parse($turno->hora_inicio)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($turno->hora_fin)->format('H:i') }}
                                    </span>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Días</th>
                            <td>{{ $turno->dias }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>
                                @if($turno->activo)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Creado</th>
                            <td>{{ $turno->created_at?->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ route('academico.curso-turno.edit', $turno) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('academico.curso-turno.index') }}" class="btn btn-default">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection