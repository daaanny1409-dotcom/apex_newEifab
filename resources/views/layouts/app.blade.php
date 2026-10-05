<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema Académico EIFAB')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/escudo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f9; }

        .app-header {
            background: #004173;
            color: white;
            height: 64px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
        }

        .app-header .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: bold;
        }

        .app-header .logo img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .app-header .spacer { flex: 1; }

        .app-header .user-menu {
            position: relative;
        }

        .app-header .user-menu button {
            background: rgba(255,255,255,0.15);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .app-header .user-menu button:hover {
            background: rgba(255,255,255,0.25);
        }

        .app-sidebar {
            position: fixed;
            top: 64px;
            left: 0;
            width: 260px;
            height: calc(100vh - 64px);
            background: white;
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
            padding: 16px 0;
        }

        .app-sidebar .user-info {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 12px;
        }

        .app-sidebar .user-info .name {
            font-weight: bold;
            color: #004173;
            font-size: 14px;
        }

        .app-sidebar .user-info .company {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        .app-sidebar nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .app-sidebar nav a:hover {
            background: #f0f7fc;
            color: #004173;
            border-left-color: #004173;
        }

        .app-sidebar nav a.active {
            background: #f0f7fc;
            color: #004173;
            border-left-color: #004173;
            font-weight: 600;
        }

        .app-sidebar nav a .icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .app-sidebar nav .section-title {
            padding: 16px 20px 8px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #9ca3af;
            font-weight: 700;
        }

        .app-content {
            margin-left: 260px;
            margin-top: 64px;
            padding: 24px;
            min-height: calc(100vh - 64px - 50px);
        }

        .app-footer {
            margin-left: 260px;
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 16px 24px;
            text-align: center;
            color: #6b7280;
            font-size: 13px;
        }

        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #004173;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <header class="app-header">
        <div class="logo">
            <img src="{{ asset('images/escudo.png') }}" alt="EIFAB">
            <span>EIFAB</span>
        </div>
        <div class="spacer"></div>
        <div class="user-menu">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">
                    👤 {{ auth()->user()->name ?? auth()->user()->login }}
                    <span>|</span>
                    <span>Salir</span>
                </button>
            </form>
        </div>
    </header>

    {{-- SIDEBAR --}}
    <aside class="app-sidebar">
        <div class="user-info">
            <div class="name">{{ auth()->user()->name ?? auth()->user()->login }}</div>
            <div class="company">{{ auth()->user()->email ?? 'EIFAB' }}</div>
        </div>

        <nav>
            <div class="section-title">Principal</div>
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="icon">🏠</span> Dashboard
            </a>

            <div class="section-title">Académico</div>
            <a href="#">
                <span class="icon">📚</span> Alumnos
            </a>
            <a href="#">
                <span class="icon">🎓</span> Cursos
            </a>
            <a href="#">
                <span class="icon">📝</span> Notas
            </a>

            <div class="section-title">Administración</div>
            <a href="#">
                <span class="icon">👥</span> Personas
            </a>
            <a href="#">
                <span class="icon">🏢</span> Empresas
            </a>

            <div class="section-title">Facturación</div>
            <a href="#">
                <span class="icon">💰</span> Facturas
            </a>
            <a href="#">
                <span class="icon">💳</span> Pagos
            </a>

            <div class="section-title">Configuración</div>
            <a href="#">
                <span class="icon">⚙️</span> Parámetros
            </a>
        </nav>
    </aside>

    {{-- CONTENIDO --}}
    <main class="app-content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="app-footer">
        Sistema Académico 2026 · EIFAB · @Jtarqui
    </footer>

</body>
</html>