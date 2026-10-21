<?php

namespace App\Http\Controllers;

use App\Models\ParPais;
use Illuminate\Http\Request;

class ParPaisController extends Controller
{
    public function index(Request $request)
    {
        $query = ParPais::query()->orderBy('nombre');

        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('codigo', 'like', "%{$buscar}%");
            });
        }

        $paises = $query->paginate(15);

        return view('par-pais.index', compact('paises'));
    }

    public function create()
    {
        return view('par-pais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:ParPaises,nombre',
            'codigo' => 'nullable|string|max:5',
        ]);

        ParPais::create([
            'nombre' => strtoupper($request->nombre),
            'codigo' => $request->codigo ? strtoupper($request->codigo) : null,
            'activo' => true,
        ]);

        return redirect()
            ->route('par-pais.index')
            ->with('success', 'País creado correctamente.');
    }

    public function show(ParPais $parPais)
    {
        return view('par-pais.show', ['pais' => $parPais]);
    }

    public function edit(ParPais $parPais)
    {
        return view('par-pais.edit', ['pais' => $parPais]);
    }

    public function update(Request $request, ParPais $parPais)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:ParPaises,nombre,' . $parPais->id,
            'codigo' => 'nullable|string|max:5',
        ]);

        $parPais->update([
            'nombre' => strtoupper($request->nombre),
            'codigo' => $request->codigo ? strtoupper($request->codigo) : null,
            'activo' => $request->has('activo'),
        ]);

        return redirect()
            ->route('par-pais.index')
            ->with('success', 'País actualizado correctamente.');
    }

    public function destroy(ParPais $parPais)
    {
        $parPais->delete();

        return redirect()
            ->route('par-pais.index')
            ->with('success', 'País eliminado correctamente.');
    }
}