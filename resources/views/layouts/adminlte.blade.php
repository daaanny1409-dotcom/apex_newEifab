<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EIFAB') - Sistema Académico</title>
    <link rel="icon" type="image/png" href="{{ asset('images/escudo.png') }}">
    
    {{-- AdminLTE 3 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- Google Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
        }

        /* Sidebar personalizado con el azul EIFAB */
        .main-sidebar {
            background-color: #003354 !important;
        }
        .main-sidebar .brand-link {
            background-color: #003354 !important;
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        }
        .main-sidebar .nav-sidebar .nav-link {
            color: rgba(255,255,255,0.85) !important;
        }
        .main-sidebar .nav-sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.08) !important;
            color: white !important;
        }
        .main-sidebar .nav-sidebar .nav-link.active {
            background-color: #004173 !important;
            color: white !important;
            box-shadow: 0 0 1px rgba(255,255,255,0.5) !important;
        }
        .main-sidebar .nav-header {
            color: rgba(255,255,255,0.5) !important;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        /* Navbar con el azul EIFAB */
        .main-header.navbar {
            background-color: white !important;
            border-bottom: 3px solid #003354;
        }

        /* Sidebar toggle */
        .brand-link .brand-image {
            max-height: 38px;
            background: white;
            padding: 3px;
            border-radius: 4px;
        }

        .content-header h1 {
            color: #003354;
            font-weight: 700;
        }

        /* Botones con azul EIFAB */
        .btn-primary {
            background-color: #004173 !important;
            border-color: #004173 !important;
        }
        .btn-primary:hover {
            background-color: #003354 !important;
            border-color: #003354 !important;
        }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- NAVBAR SUPERIOR --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        {{-- Botón de colapsar sidebar --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        {{-- Título del módulo --}}
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i> Panel Principal
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle"></i>
                    {{ auth()->user()->name ?? auth()->user()->login }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    {{-- SIDEBAR LATERAL --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('images/escudo.png') }}" alt="EIFAB" class="brand-image elevation-3">
            <span class="brand-text font-weight-light">EIFAB</span>
        </a>

        {{-- Menú --}}
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fas fa-user-circle fa-2x text-white"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block text-white">
                        {{ auth()->user()->name ?? auth()->user()->login }}
                    </a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-header">GESTIÓN ACADÉMICA</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->is('academico')) active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard Académico</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>Busqueda Estudiante</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-check"></i> 
                            <p>Calificacion Nivel ALC</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-award"></i>
                            <p>Calificacion Nivel Pearson</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Control Periodos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Cursos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>Docentes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Evaluaciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>Operaciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Programacion</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Rangos Nivel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>Reg. Unico Personas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sync-alt"></i>
                            <p>Relacion Review</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>Reportes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Turno Clases</p>
                        </a>
                    </li>


                    <li class="nav-header">CONFIGURACIÓN</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Tarifas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Cuotas</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="content-wrapper">
        {{-- Cabecera del contenido --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">@yield('breadcrumb', 'Módulo')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contenido de cada módulo --}}
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- FOOTER --}}
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Sistema Académico v1.0
        </div>
        <strong>© {{ date('Y') }} EIFAB</strong> · Escuela de Idiomas de la Fuerza Aérea Boliviana
    </footer>

</div>

{{-- SCRIPTS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
