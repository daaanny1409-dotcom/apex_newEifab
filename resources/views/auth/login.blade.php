




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Ingreso</title>
    <link rel="icon" type="image/png" href="{{ asset('images/escudo.png') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #004173;
        }

        .login-container {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.30);
        }

        .logo {
            width: 140px;
            height: 140px;
            object-fit: contain;
            display: block;
            margin: 0 auto 20px;
        }

        h1 {
            text-align: center;
            color: #004173;
            margin-bottom: 30px;
            font-size: 30px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            border: 2px solid #dcdcdc;
            border-radius: 12px;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #004173;
        }

        .input-error {
            border: 2px solid #d32f2f !important;
        }

        .error-text {
            color: #d32f2f;
            margin-top: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: #004173;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #002f53;
        }

        .link {
            margin-top: 18px;
            display: block;
            text-align: center;
            color: #004173;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            color: #777;
            font-size: 14px;
            line-height: 22px;
        }

        .alerta {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 320px;
            padding: 18px;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            z-index: 9999;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .success {
            background: #2e7d32;
        }

        .error {
            background: #c62828;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
        }

        .remember-me input {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    @if (session('status'))
        <div class="alerta success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alerta error">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="login-container">

        <img src="{{ asset('images/escudo.png') }}" class="logo" alt="Logo EIFAB">

        <h1>Área de Ingreso</h1>

        <form method="POST" action="{{ route('login') }}" autocomplete="on">
            @csrf

            <div class="input-group">
                <label for="login">Usuario</label>
                <input
                    type="text"
                    name="login"
                    id="login"
                    value="{{ old('login') }}"
                    autocomplete="username"
                    required
                    autofocus
                    @error('login') class="input-error" @enderror
                >
                @error('login')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="current-password"
                    required
                    @error('password') class="input-error" @enderror
                >
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me" style="margin: 0; font-weight: normal;">Recordarme</label>
            </div>

            <button type="submit" class="btn-login">Ingresar</button>
        </form>

        @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">
                ¿Olvidó su contraseña?
            </a>
        @endif

        <div class="footer">
            Sistema Académico 2026
            <br>
            @Jtarqui
        </div>

    </div>

    <script>
        setTimeout(function () {
            let alerta = document.querySelector('.alerta');
            if (alerta) alerta.style.display = 'none';
        }, 5000);
    </script>

</body>
</html>
