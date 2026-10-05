<?php

namespace App\Http\Controllers;

class AcademicoController extends Controller
{
    public function index()
    {
        // Estadísticas de ejemplo (después las conectamos a la BD real)
        $stats = [
            'alumnos' => 0,
            'cursos' => 0,
            'materias' => 0,
            'docentes' => 0,
            'evaluaciones' => 0,
            'cuotas_pendientes' => 0,
        ];

        return view('academico.index', compact('stats'));
    }
}