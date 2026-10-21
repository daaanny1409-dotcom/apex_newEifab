@extends('layouts.adminlte')

@section('title', 'Nuevo Turno')
@section('page-title', 'Nuevo Turno')
@section('breadcrumb', 'Gestión Académica / Turnos / Nuevo')

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-plus mr-2"></i>
                Registrar Nuevo Turno
            </h3>
        </div>

        <form action="{{ route('academico.curso-turno.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <h5 class="text-primary mb-3"><i class="fas fa-info-circle"></i> Información del Turno</h5>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Descripción <span class="text-danger">*</span></label>
                            <input type="text" name="descripcion"
                                   class="form-control @error('descripcion') is-invalid @enderror"
                                   value="{{ old('descripcion') }}"
                                   placeholder="Ej: MAÑANA, TARDE, SÁBADOS" required autofocus>
                            @error('descripcion')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hora de Inicio</label>
                            <input type="time" name="hora_inicio"
                                   class="form-control @error('hora_inicio') is-invalid @enderror"
                                   value="{{ old('hora_inicio') }}">
                            @error('hora_inicio')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hora de Fin</label>
                            <input type="time" name="hora_fin"
                                   class="form-control @error('hora_fin') is-invalid @enderror"
                                   value="{{ old('hora_fin') }}">
                            @error('hora_fin')<span class="invalid-feedback">{{ $message }}</span>@enderror
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
                                       {{ old('lunes') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="lunes">Lunes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="martes" id="martes" class="custom-control-input"
                                       {{ old('martes') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="martes">Martes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="miercoles" id="miercoles" class="custom-control-input"
                                       {{ old('miercoles') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="miercoles">Miércoles</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="jueves" id="jueves" class="custom-control-input"
                                       {{ old('jueves') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="jueves">Jueves</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="viernes" id="viernes" class="custom-control-input"
                                       {{ old('viernes') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="viernes">Viernes</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="sabado" id="sabado" class="custom-control-input"
                                       {{ old('sabado') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sabado">Sábado</label>
                            </div>
                            <div class="custom-control custom-checkbox d-inline-block mr-4">
                                <input type="checkbox" name="domingo" id="domingo" class="custom-control-input"
                                       {{ old('domingo') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="domingo">Domingo</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{ route('academico.curso-turno.index') }}" class="btn btn-default">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@endsection