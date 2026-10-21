@extends('layouts.adminlte')

@section('title', 'Editar Turno')
@section('page-title', 'Editar Turno')
@section('breadcrumb', 'Gestión Académica / Turnos / Editar')

@section('content')

    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit mr-2"></i>
                Editando: {{ $turno->descripcion }}
            </h3>
        </div>

        <form action="{{ route('academico.curso-turno.update', $turno) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <h5 class="text-primary mb-3"><i class="fas fa-info-circle"></i> Información del Turno</h5>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripción <span class="text-danger">*</span></label>
                            <input type="text" name="descripcion"
                                   class="form-control @error('descripcion') is-invalid @enderror"
                                   value="{{ old('descripcion', $turno->descripcion) }}" required>
                            @error('descripcion')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hora de Inicio</label>
                            <input type="time" name="hora_inicio"
                                   class="form-control"
                                   value="{{ old('hora_inicio', $turno->hora_inicio ? \Carbon\Carbon::parse($turno->hora_inicio)->format('H:i') : '') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hora de Fin</label>
                            <input type="time" name="hora_fin"
                                   class="form-control"
                                   value="{{ old('hora_fin', $turno->hora_fin ? \Carbon\Carbon::parse($turno->hora_fin)->format('H:i') : '') }}">
                        </div>
                    </div>
                </div>

                <h5 class="text-primary mb-3 mt-4"><i class="fas fa-calendar-week"></i> Días de clase</h5>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="lunes" id="lunes" class="custom-control-input"
                                       {{ old('lunes', $turno->lunes) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="lunes">Lunes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="martes" id="martes" class="custom-control-input"
                                       {{ old('martes', $turno->martes) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="martes">Martes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="miercoles" id="miercoles" class="custom-control-input"
                                       {{ old('miercoles', $turno->miercoles) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="miercoles">Miércoles</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="jueves" id="jueves" class="custom-control-input"
                                       {{ old('jueves', $turno->jueves) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="jueves">Jueves</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="viernes" id="viernes" class="custom-control-input"
                                       {{ old('viernes', $turno->viernes) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="viernes">Viernes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="sabado" id="sabado" class="custom-control-input"
                                       {{ old('sabado', $turno->sabado) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sabado">Sábado</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="domingo" id="domingo" class="custom-control-input"
                                       {{ old('domingo', $turno->domingo) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="domingo">Domingo</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="activo" id="activo" class="custom-control-input"
                                   {{ $turno->activo ? 'checked' : '' }}>
                            <label class="custom-control-label" for="activo">Turno activo</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="{{ route('academico.curso-turno.index') }}" class="btn btn-default">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@endsection