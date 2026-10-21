<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha - {{ $estudiante->nombre }} {{ $estudiante->paterno }}</title>
    <style>
        @page { margin: 30px 40px; }
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 11px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #004173;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #004173;
            font-size: 18px;
            margin: 0;
            letter-spacing: 1px;
        }
        .header h2 {
            color: #666;
            font-size: 12px;
            margin: 4px 0 0 0;
            font-weight: normal;
        }
        .foto-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .foto {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #004173;
        }
        .foto-placeholder {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #ccc;
            background: #f0f0f0;
            display: inline-block;
            line-height: 110px;
            text-align: center;
            color: #999;
            font-size: 40px;
        }
        .nombre {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color: #003354;
            margin-bottom: 4px;
        }
        .ci {
            text-align: center;
            font-size: 11px;
            color: #666;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 7px 10px;
            text-align: left;
            font-size: 11px;
        }
        table th {
            background-color: #e8f0f7;
            color: #003354;
            width: 180px;
            font-weight: bold;
        }
        .section-title {
            background-color: #004173;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 0;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    @php
        $fotoBase64 = null;
        if ($estudiante->foto && \Storage::disk('public')->exists($estudiante->foto)) {
            $rutaAbsoluta = storage_path('app/public/' . $estudiante->foto);
            $extension = strtolower(pathinfo($rutaAbsoluta, PATHINFO_EXTENSION));
            $mime = $extension === 'png' ? 'image/png' : 'image/jpeg';
            $contenido = file_get_contents($rutaAbsoluta);
            $fotoBase64 = 'data:' . $mime . ';base64,' . base64_encode($contenido);
        }
    @endphp

    <div class="header">
        <h1>ESCUELA DE IDIOMAS DE LA FUERZA AÉREA</h1>
        <h2>FICHA DEL ESTUDIANTE</h2>
    </div>

    <div class="foto-container">
        @if($fotoBase64)
            <img src="{{ $fotoBase64 }}" class="foto" alt="Foto">
        @else
            <div class="foto-placeholder">?</div>
        @endif
    </div>

    <div class="nombre">
        {{ $estudiante->nombre }} {{ $estudiante->paterno }} {{ $estudiante->materno }}
    </div>
    <div class="ci">
        C.I. {{ $estudiante->nro_documento }}
    </div>

    <div class="section-title">DATOS PERSONALES</div>
    <table>
        <tr>
            <th>Nombre completo</th>
            <td>{{ $estudiante->nombre }} {{ $estudiante->paterno }} {{ $estudiante->materno }}</td>
        </tr>
        <tr>
            <th>Documento de Identidad</th>
            <td>{{ $estudiante->nro_documento }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>
                @if($estudiante->sexo === 'M') Masculino
                @elseif($estudiante->sexo === 'F') Femenino
                @else Otro
                @endif
            </td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td>
                {{ $estudiante->fecha_nacimiento?->format('d/m/Y') ?? '-' }}
                @if($estudiante->fecha_nacimiento)
                    ({{ $estudiante->fecha_nacimiento->age }} años)
                @endif
            </td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ ucfirst($estudiante->tipo_persona) }}</td>
        </tr>
    </table>

    <div class="section-title">INFORMACIÓN DE CONTACTO</div>
    <table>
        <tr>
            <th>Email</th>
            <td>{{ $estudiante->email ?? '-' }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $estudiante->telefono ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $estudiante->direccion ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">DATOS ACADÉMICOS</div>
    <table>
        <tr>
            <th>Cursos inscritos</th>
            <td>Próximamente disponible</td>
        </tr>
        <tr>
            <th>Promedio general</th>
            <td>Próximamente disponible</td>
        </tr>
    </table>

    <div class="footer">
        Documento generado el {{ date('d/m/Y H:i') }} - Sistema Académico EIFAB
    </div>

</body>
</html>