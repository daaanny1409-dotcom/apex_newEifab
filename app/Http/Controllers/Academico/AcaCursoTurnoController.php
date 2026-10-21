<?php

namespace App\Http\Controllers\Academico;

use App\Http\Controllers\Controller;
use App\Models\AcaCursoTurno;
use Illuminate\Http\Request;

class AcaCursoTurnoController extends Controller
{
    public function index(Request $request)
    {
        $query = AcaCursoTurno::query()->orderBy('descripcion');

        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            $query->where('descripcion', 'like', "%{$buscar}%");
        }

        $turnos = $query->paginate(15);

        return view('academico.curso-turno.index', compact('turnos'));
    }

    public function create()
    {
        return view('academico.curso-turno.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:50|unique:AcaCursoTurnos,descripcion',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
        ]);

        AcaCursoTurno::create([
            'descripcion' => strtoupper($request->descripcion),
            'lunes' => $request->has('lunes'),
            'martes' => $request->has('martes'),
            'miercoles' => $request->has('miercoles'),
            'jueves' => $request->has('jueves'),
            'viernes' => $request->has('viernes'),
            'sabado' => $request->has('sabado'),
            'domingo' => $request->has('domingo'),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'activo' => true,
        ]);

        return redirect()
            ->route('academico.curso-turno.index')
            ->with('success', 'Turno creado correctamente.');
    }

    public function show(AcaCursoTurno $cursoTurno)
    {
        return view('academico.curso-turno.show', ['turno' => $cursoTurno]);
    }

    public function edit(AcaCursoTurno $cursoTurno)
    {
        return view('academico.curso-turno.edit', ['turno' => $cursoTurno]);
    }

    public function update(Request $request, AcaCursoTurno $cursoTurno)
    {
        $request->validate([
            'descripcion' => 'required|string|max:50|unique:AcaCursoTurnos,descripcion,' . $cursoTurno->id,
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after:hora_inicio',
        ]);

        $cursoTurno->update([
            'descripcion' => strtoupper($request->descripcion),
            'lunes' => $request->has('lunes'),
            'martes' => $request->has('martes'),
            'miercoles' => $request->has('miercoles'),
            'jueves' => $request->has('jueves'),
            'viernes' => $request->has('viernes'),
            'sabado' => $request->has('sabado'),
            'domingo' => $request->has('domingo'),
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'activo' => $request->has('activo'),
        ]);

        return redirect()
            ->route('academico.curso-turno.index')
            ->with('success', 'Turno actualizado correctamente.');
    }

    public function destroy(AcaCursoTurno $cursoTurno)
    {
        $cursoTurno->delete();

        return redirect()
            ->route('academico.curso-turno.index')
            ->with('success', 'Turno eliminado correctamente.');
    }
}