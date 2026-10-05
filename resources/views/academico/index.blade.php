@extends('layouts.adminlte')

@section('title', 'Gestión Académica')
@section('page-title', 'Gestión Académica')
@section('breadcrumb', 'Académico')

@section('content')

    {{-- Tarjetas de estadísticas --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['alumnos'] }}</h3>
                    <p>Alumnos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['cursos'] }}</h3>
                    <p>Cursos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['materias'] }}</h3>
                    <p>Materias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['docentes'] }}</h3>
                    <p>Docentes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    {{-- Bienvenida --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Módulo de Gestión Académica
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="mb-3">Bienvenido al módulo académico</h5>
                    <p class="text-muted">
                        Desde aquí podrá gestionar <strong>alumnos</strong>, <strong>cursos</strong>, <strong>materias</strong>,
                        <strong>evaluaciones</strong>, <strong>notas</strong> y todo lo relacionado con la gestión académica
                        del instituto.
                    </p>
                    <p class="text-muted mb-0">
                        Seleccione una opción del menú lateral para comenzar a trabajar.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Gráfico de ejemplo --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Alumnos por curso</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Próximamente: gráfico de alumnos por curso</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notas por materia</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Próximamente: gráfico de notas por materia</p>
                </div>
            </div>
        </div>
    </div>

@endsection