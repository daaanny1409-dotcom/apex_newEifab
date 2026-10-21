<?php

namespace App\Http\Controllers\Academico;

use App\Http\Controllers\Controller;
use App\Models\AdmPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusquedaEstudianteController extends Controller
{
    /**
     * Listado con búsqueda de estudiantes.
     */
    public function index(Request $request)
    {
        $query = AdmPersona::where('tipo_persona', 'estudiante');

        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('paterno', 'like', "%{$buscar}%")
                  ->orWhere('materno', 'like', "%{$buscar}%")
                  ->orWhere('nro_documento', 'like', "%{$buscar}%")
                  ->orWhere('email', 'like', "%{$buscar}%");
            });
        }

        if ($request->filled('activo')) {
            $query->where('activo', $request->input('activo') === 'S');
        }

        $estudiantes = $query->orderBy('paterno')
                             ->orderBy('nombre')
                             ->paginate(15);

        return view('academico.busqueda-estudiante.index', compact('estudiantes'));
    }

    /**
     * Ver ficha completa del estudiante.
     */
    public function show($id)
    {
        $estudiante = AdmPersona::where('tipo_persona', 'estudiante')->findOrFail($id);

        return view('academico.busqueda-estudiante.show', compact('estudiante'));
    }

    /**
     * Formulario de edición.
     */
    public function edit($id)
    {
        $estudiante = AdmPersona::where('tipo_persona', 'estudiante')->findOrFail($id);

        return view('academico.busqueda-estudiante.edit', compact('estudiante'));
    }

    /**
     * Guardar cambios de edición.
     */
    public function update(Request $request, $id)
    {
        $estudiante = AdmPersona::where('tipo_persona', 'estudiante')->findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'paterno' => 'required|string|max:100',
            'materno' => 'nullable|string|max:100',
            'sexo' => 'required|in:M,F,O',
            'fecha_nacimiento' => 'nullable|date',
            'nro_documento' => 'required|string|max:25|unique:AdmPersonas,nro_documento,' . $id,
            'email' => 'nullable|email|max:100',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:200',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $datos = [
            'nombre' => strtoupper($request->nombre),
            'paterno' => strtoupper($request->paterno),
            'materno' => $request->materno ? strtoupper($request->materno) : null,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nro_documento' => $request->nro_documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'activo' => $request->has('activo'),
        ];

        // Si subió nueva foto
        if ($request->hasFile('foto')) {
            // Borrar foto anterior si existe
            if ($estudiante->foto && Storage::disk('public')->exists($estudiante->foto)) {
                Storage::disk('public')->delete($estudiante->foto);
            }

            // Guardar la nueva foto
            $ruta = $request->file('foto')->store('fotos', 'public');
            $datos['foto'] = $ruta;
        }

        $estudiante->update($datos);

        return redirect()
            ->route('academico.busqueda-estudiante.show', $id)
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Generar PDF con la ficha del estudiante.
     */
         public function pdf($id)
    {
        $estudiante = AdmPersona::where('tipo_persona', 'estudiante')->findOrFail($id);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
            'academico.busqueda-estudiante.pdf',
            compact('estudiante')
        );

        $pdf->setPaper('A4', 'portrait');

        $nombreArchivo = 'ficha_' . $estudiante->nro_documento . '.pdf';

        return $pdf->download($nombreArchivo);
    }
}