<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal - EIFAB</title>
    <link rel="icon" type="image/png" href="{{ asset('images/escudo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: #f5f7fa;
            color: #1a2332;
        }

        /* ====== HEADER FIJO ====== */
        .dash-header {
            background: linear-gradient(135deg, #003354 0%, #004173 100%);
            color: white;
            padding: 0 40px;
            height: 70px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-bottom: 3px solid #b8860b;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .dash-header .logo-box {
            background: white;
            padding: 4px;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .dash-header img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            display: block;
        }

        .dash-header .titles {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .dash-header .title {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .dash-header .subtitle {
            font-size: 11px;
            opacity: 0.75;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .dash-header .user-info {
            margin-left: auto;
            text-align: right;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .dash-header .user-info .user-text {
            font-size: 13px;
            line-height: 1.3;
        }

        .dash-header .user-name { font-weight: 600; }
        .dash-header .user-role { font-size: 11px; opacity: 0.7; }

        .dash-header .user-info button {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .dash-header .user-info button:hover {
            background: rgba(255,255,255,0.2);
        }

        /* ====== CARRUSEL HERO ====== */
        .hero-carousel {
            position: relative;
            height: 70vh;
            min-height: 500px;
            margin-top: 70px;
            overflow: hidden;
        }

        .hero-carousel .swiper {
            width: 100%;
            height: 100%;
        }

        .hero-carousel .swiper-slide {
            position: relative;
            overflow: hidden;
        }

        .hero-carousel .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-carousel .swiper-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0, 51, 84, 0.85) 0%, rgba(0, 65, 115, 0.65) 100%);
        }

        .hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            z-index: 10;
            padding: 0 20px;
            pointer-events: none;
        }

        .hero-content h1 {
            font-size: 64px;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 16px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            line-height: 1;
        }

        .hero-content p {
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 40px;
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.6);
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            pointer-events: auto;
            font-family: inherit;
        }

        .hero-btn:hover {
            background: white;
            color: #004173;
            border-color: white;
            transform: translateY(-2px);
        }

        .hero-btn .arrow {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(4px); }
            60% { transform: translateY(2px); }
        }

        /* Paginación del carrusel */
        .hero-carousel .swiper-pagination {
            z-index: 11;
        }

        .hero-carousel .swiper-pagination-bullet {
            background: white;
            opacity: 0.5;
            width: 10px;
            height: 10px;
        }

        .hero-carousel .swiper-pagination-bullet-active {
            opacity: 1;
            width: 30px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        /* ====== CONTENEDOR DE SERVICIOS ====== */
        .dash-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 60px 32px;
        }

        .page-header {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e5eb;
            text-align: center;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            color: #003354;
            letter-spacing: -0.3px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #64748b;
            margin-top: 6px;
        }

        /* ====== GRID DE SERVICIOS ====== */
        .servicios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 32px 24px;
        }

        .servicio-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #1a2332;
            transition: all 0.25s ease;
            padding: 8px;
            border-radius: 12px;
        }

        .servicio-icon-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: white;
            border: 2px solid #e1e5eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #004173;
            transition: all 0.3s ease;
            margin-bottom: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }

        .servicio-card:hover .servicio-icon-circle {
            border-color: #004173;
            background: #004173;
            color: white;
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 65, 115, 0.25);
        }

        .servicio-icon-circle svg {
            width: 48px;
            height: 48px;
            stroke-width: 1.5;
        }

        .servicio-name {
            font-size: 15px;
            font-weight: 700;
            color: #003354;
            margin-bottom: 6px;
            text-align: center;
            letter-spacing: -0.2px;
            line-height: 1.3;
        }

        .servicio-card:hover .servicio-name {
            color: #004173;
        }

        .servicio-desc {
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.5;
            text-align: center;
            max-width: 220px;
        }

        .dash-footer {
            margin-top: 70px;
            padding-top: 24px;
            border-top: 1px solid #e1e5eb;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            letter-spacing: 0.3px;
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .dash-header { padding: 0 20px; }
            .dash-header .title { font-size: 14px; }
            .dash-header .subtitle { font-size: 10px; }
            .dash-header .user-info .user-text { display: none; }

            .hero-carousel { height: 50vh; min-height: 400px; }
            .hero-content h1 { font-size: 36px; letter-spacing: 2px; }
            .hero-content p { font-size: 13px; letter-spacing: 2px; }
            .hero-btn { padding: 12px 28px; font-size: 11px; }

            .dash-container { padding: 40px 16px; }
            .servicios-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px 12px;
            }
            .servicio-icon-circle { width: 80px; height: 80px; }
            .servicio-icon-circle svg { width: 36px; height: 36px; }
            .servicio-name { font-size: 13px; }
            .servicio-desc { display: none; }
        }
    </style>
</head>
<body>

    {{-- HEADER INSTITUCIONAL FIJO --}}
    <header class="dash-header">
        <div class="logo-box">
            <img src="{{ asset('images/escudo.png') }}" alt="EIFAB">
        </div>
        <div class="titles">
            <div class="title">APEX EIFAB</div>
            <div class="subtitle">Escuela de Idiomas · Fuerza Aérea Boliviana</div>
        </div>
        <div class="user-info">
            <div class="user-text">
                <div class="user-name">{{ auth()->user()->name ?? auth()->user()->login }}</div>
                <div class="user-role">{{ auth()->user()->email ?? 'Administrador' }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </header>

    {{-- CARRUSEL HERO --}}
    <section class="hero-carousel">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/carrusel/carrusel-1.jpg') }}" alt="EIFAB">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carrusel/carrusel-2.jpg') }}" alt="EIFAB">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carrusel/carrusel-3.jpg') }}" alt="EIFAB">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="hero-content">
            <h1>Escuela de Idiomas</h1>
            <p>Fuerza Aérea Boliviana</p>
            <a href="#modulos" class="hero-btn">
                Ver Módulos
                <span class="arrow">▼</span>
            </a>
        </div>
    </section>

    {{-- CONTENIDO (GRID DE SERVICIOS) --}}
    <div class="dash-container" id="modulos">
        <div class="page-header">
            <div class="page-title">Panel Principal</div>
            <div class="page-subtitle">Seleccione un módulo del sistema para comenzar</div>
        </div>

        <div class="servicios-grid">
            @foreach($servicios as $servicio)
                <a href="{{ $servicio['ruta'] }}" class="servicio-card">
                    <div class="servicio-icon-circle">
                        {!! $servicio['icono'] !!}
                    </div>
                    <div class="servicio-name">{{ $servicio['nombre'] }}</div>
                    <div class="servicio-desc">{{ $servicio['descripcion'] }}</div>
                </a>
            @endforeach
        </div>

        <div class="dash-footer">
            © {{ date('Y') }} EIFAB · Sistema Académico · Escuela de Idiomas de la Fuerza Aérea Boliviana
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1200,
        });

        // Scroll suave al hacer clic en "Ver Módulos"
        document.querySelector('.hero-btn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('modulos').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    </script>

</body>
</html>