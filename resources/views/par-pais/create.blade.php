@extends('layouts.adminlte')

@section('title', 'Nuevo País')
@section('page-title', 'Nuevo País')
@section('breadcrumb', 'Opciones Generales / Países / Nuevo')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-plus mr-2"></i> Registrar Nuevo País
            </h3>
        </div>

        <form action="{{ route('par-pais.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" id="nombre"
                           class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre') }}"
                           placeholder="Ej: BOLIVIA" required autofocus>
                    @error('nombre')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" id="codigo"
                           class="form-control @error('codigo') is-invalid @enderror"
                           value="{{ old('codigo') }}"
                           placeholder="Ej: BOL" maxlength="5">
                    @error('codigo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{ route('par-pais.index') }}" class="btn btn-default">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@endsection